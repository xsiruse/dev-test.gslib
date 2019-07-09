<?php
/**
 * Social Login Zygo Profile Integration Plugin Profile
 *
 * @version 	1.0
 * @author		SherZa, zygopterix@gmail.com
 * @copyright	© 2013. All rights reserved.
 * @license 	GNU/GPL v.3 or later.
 */

// No direct access
defined('_JEXEC') or die;


class plgSlogin_integrationZygo_profile extends JPlugin
{
    public function onAfterSloginStoreUser($user, $provider, $info)
    {
        $this->createProfile($user, $provider, $info);
    }


    private function createProfile($user, $provider, $info)
    {
        jimport( 'joomla.filesystem.file' );

        $plugin = JPluginHelper::getPlugin('user', 'zygo_profile');
        $uParams = new JRegistry();
        $uParams->loadString($plugin->params);


        $upload_dir = "media";
        if($uParams->get('avatarfolder')) $upload_dir.="/".$uParams->get('avatarfolder');
        $upload_dir .= "/plg_zygo_profile/".$user->id;


        if(!is_dir(JPATH_ROOT.'/'.$upload_dir)) mkdir(JPATH_ROOT.'/'.$upload_dir);  

        $large_img = "large".$user->id . '.jpg';     
        $thumb_img = "thumb".$user->id . '.jpg';

        $flds = array(
            "avatar"=>$this->params->get('avatar'),
            "status"=>$this->params->get('status'),
            "gender"=>$this->params->get('gender'),
            "birthday"=>$this->params->get('birthday')
        );

        $genders = array("", $this->params->get('gender_m', "m"), $this->params->get('gender_f', "f"));

        $db = JFactory::getDbo();
        $db->setQuery("INSERT INTO `#__user_profiles` ".
            "(`user_id`, `profile_key`, `profile_value`, `ordering`) ".
            " (SELECT '".(int)$user->id."', `profile_key`, '', `ordering` FROM `#__user_profiles` ".
            " WHERE user_id=(SELECT MIN(user_id) FROM `#__user_profiles`))");
        $db->query();

        $db->setQuery("SELECT * FROM `#__plg_slogin_profile` WHERE user_id = ".(int)$user->id);
        $slogin_obj = $db->loadObject();

        if(empty($slogin_obj)) return;

        $av_image = ($slogin_obj->avatar)? $slogin_obj->avatar :
            $provider . '_' . $slogin_obj->slogin_id . '.jpg';
        $slogin_avpath = "images/avatar";
        $slogin_avpath_full = JPATH_ROOT."/".$slogin_avpath."/".$av_image;


        if($provider=="vkontakte" && $this->params->get('vkimport', 1)){
            $data = $this->zygoVkontakteGetData($user, $provider, $info);
            if($data->thumb_img){

                copy($data->thumb_img, JPATH_ROOT.'/'.$upload_dir.'/'.$thumb_img);

                $large = ($data->large_img)? $data->large_img : $data->thumb_img;

                copy($large, JPATH_ROOT.'/'.$upload_dir.'/'.$large_img);

                $db->setQuery("UPDATE `#__user_profiles` SET profile_value =  ".
                    $db->quote($upload_dir.'/'.$thumb_img."\n")." WHERE user_id= '".(int)$user->id.
                    "' AND profile_key = 'zygo_profile.".$flds['avatar']."'");
                $db->query();

            }
            if($data->birthday){
                $db->setQuery("UPDATE `#__user_profiles` SET profile_value =  ".
                    $db->quote($data->birthday)." WHERE user_id= '".(int)$user->id.
                    "' AND profile_key = 'zygo_profile.".$flds['birthday']."'");
                $db->query();            
            }

            if($data->gender && isset($genders[$data->gender+1])){
                $db->setQuery("UPDATE `#__user_profiles` SET profile_value =  ".
                    $db->quote($genders[$data->gender+1])." WHERE user_id= '".(int)$user->id.
                    "' AND profile_key = 'zygo_profile.".$flds['gender']."'");
                $db->query();
            }
            if($data->status){            
                $db->setQuery("UPDATE `#__user_profiles` SET profile_value =  ".
                    $db->quote($data->status)." WHERE user_id= '".(int)$user->id.
                    "' AND profile_key = 'zygo_profile.".$flds['status']."'");
                $db->query();
            }


        }else{

            if(file_exists($slogin_avpath_full)){


                JFile::copy($slogin_avpath_full, JPATH_ROOT.'/'.$upload_dir.'/'.$large_img);
                JFile::copy($slogin_avpath_full, JPATH_ROOT.'/'.$upload_dir.'/'.$thumb_img);

                $db->setQuery("UPDATE `#__user_profiles` SET profile_value =  ".
                    $db->quote($upload_dir.'/'.$thumb_img."\n")." WHERE user_id= '".(int)$user->id.
                    "' AND profile_key = 'zygo_profile.".$flds['avatar']."'");
                $db->query();
            }

            if($slogin_obj->birthday){
                $db->setQuery("UPDATE `#__user_profiles` SET profile_value =  ".
                    $db->quote($slogin_obj->birthday)." WHERE user_id= '".(int)$user->id.
                    "' AND profile_key = 'zygo_profile.".$flds['birthday']."'");
                $db->query();            
            }

            if($slogin_obj->gender){
                $db->setQuery("UPDATE `#__user_profiles` SET profile_value =  ".
                    $db->quote($genders[$slogin_obj->gender])." WHERE user_id= '".(int)$user->id.
                    "' AND profile_key = 'zygo_profile.".$flds['gender']."'");
                $db->query();
            }

        }
            
    }


    private function zygoVkontakteGetData($user, $provider, $info)
    {
        $controller = new SLoginController();
        $data = new StdClass();
        $ResponseUrl = 'https://api.vk.com/method/getProfiles?uid=' . $info->uid . '&fields=photo_medium,photo_big,sex,bdate,status';
        $request = json_decode($controller->open_http($ResponseUrl))->response[0];
        $data->thumb_img = (empty($request->error) && 
            substr($request->photo_medium, -12, 10000) != 'camera_b.gif') ? $request->photo_medium : '';
        $data->large_img = ($data->thumb_img)? $request->photo_big : '';
        $data->gender = $request->sex;
        $data->status = $request->status;

        $data->birthday = "";
        if(!empty($request->bdate)){
            $date = new JDate($request->bdate);
            $data->birthday = $date->toSql();
            $data->birthday = explode(" ", $data->birthday);
            $data->birthday = $data->birthday[0];
        }

        return $data;
    }

    
}
