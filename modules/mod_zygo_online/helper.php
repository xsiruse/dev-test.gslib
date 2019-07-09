<?php
/**
* @id           $Id$
* @author       Sherza (zygopterix@gmail.com)
* @package      ZYGO Online
* @copyright    Copyright (C) 2015 Psytronica.ru. http://psytronica.ru  All rights reserved.
* @license      GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
*/

defined('_JEXEC') or die('Restricted access');

require_once( JPATH_ROOT .'/plugins/user/zygo_profile/zygo_helper.php' );

class modZygoOnlineHelper
{
	function getUsersData( &$params )
	{
		$limit	= $params->get('count', '5');

		$app = JFactory::getApplication();
		
		// if you need use Joomla lifetime to check user, uncomment it
		// and remove the next line:
		//$from_time = time() - abs((int)$app->getCfg('lifetime', 15)) * 60 - 1;

		$from_time = time() - abs((int)$params->get('timeout', 15)) * 60 - 1;

		$robots_list = array();
		if($params->get('show_robots', 1)){
			$robots_types = $params->get('robots_types', '');
			$robots_arr = explode("\n", $robots_types);
			foreach($robots_arr as $rs){
				$rs = trim($rs);
				if(!$rs){continue;}
				$rsArr = explode('|', $rs);
				if(isset($rsArr[1])){
					$robots_list[$rsArr[1]]=$rsArr[0];
				}
				
			}
		}

        $db = JFactory::getDbo();
        $query = $db->getQuery(true);

        $query->clear()->select(
            'u.id as uid, u.name, s.guest, s.data'
        );

        $query->from($db->quoteName('#__session') . ' AS s');
        $query->join('LEFT', '#__users u ON u.id = s.userid');
       //$query->having('COUNT( DISTINCT s.userid ) > 0');
        $query->where('s.time > '.$db->quote($from_time));
        $query->where($db->quoteName('client_id') . ' = ' . $db->Quote('0'));

        $db->setQuery($query);
        $allOnline = $db->loadObjectList();
        $uidsnames=array();
        $total=new stdClass();
        $total->users=0; $total->guests=0;
        $robots=array();
        foreach($allOnline as $somebody){
        	if($somebody->uid){
        		//$total->users++;
        		$uidsnames[$somebody->uid]=$somebody->name;
        	}else if($somebody->guest==1){ 

        		if(!empty($robots_list)){
					@list($tmp, $_default) = explode('|', $somebody->data, 2);
	        		$_default = str_replace('\0\0\0', chr(0) . '*' . chr(0), $_default);
					if (!($_default = unserialize($_default))) {
						$total->guests++;
						continue;
					};
					$browser = JArrayHelper::getValue($_default, 'session.client.browser', '', 'string');
					$isRobot=false;
					foreach($robots_list as $rlFragment=>$rlAlias){
						if(strpos($browser, $rlFragment)!==FALSE){
							$isRobot=true;
							$robots[$rlAlias]=$browser;
							break;
						}
					}
					if(!$isRobot){$total->guests++;}
        		}else{
        			$total->guests++;
        		}
        	}
        }

        $uids=array_keys($uidsnames);
        $total->users=sizeof($uids);
        $uids = array_slice($uids, 0, $limit);
		$_members = array();

		if ( !empty( $uids ) ) 
		{
			$rows = ZygoHelper::getUsersInfo($uids);
			$av_field = $params->get('avatar');
		
			foreach ( $uids as $uid )
			{	
				$_obj				= new stdClass();
			    $_obj->id    		= $uid;
                $_obj->name      	= $uidsnames[$uid];
                $_obj->avatar      	= ZygoHelper::getAvatar($uid, $av_field);
				$_members[]	= $_obj;
			}
		}

		return array($_members, $total, $robots);	
	}	
	
}
