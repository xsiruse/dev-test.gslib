<?php
/**
* @id           $Id$
* @author       Sherza (zygopterix@gmail.com)
* @package      ZYGO Profile
* @copyright    Copyright (C) 2015 Psytronica.ru. http://psytronica.ru  All rights reserved.
* @license      GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
*/


defined('_JEXEC') or die;

use Joomla\Registry\Registry;
/**
 * Example Content Plugin
 *
 * @since  1.6
 */
class PlgContentZygo_profile extends JPlugin
{
	/**
	 * Plugin that loads module positions within content
	 *
	 * @param   string   $context   The context of the content being passed to the plugin.
	 * @param   object   &$article  The article object.  Note $article->text is also available
	 * @param   mixed    &$params   The article params
	 * @param   integer  $page      The 'page' number
	 *
	 * @return  mixed   true if there is an error. Void otherwise.
	 *
	 * @since   1.6
	 */

	protected $zygocontent = null;

    public function __construct(& $subject, $config)
    {
        parent::__construct($subject, $config);
        $this->getUserField();

        $doc = JFactory::getDocument();

        $style=$this->params->get('css', '.zygo_content_label{font-weight:bold}');
        if($style){
        	$doc->addStyleDeclaration($style);
        }	
    }

    protected function getUserField(){

    	$app = JFactory::getApplication();
    	if($app->isAdmin()) return;

		$this->zygocontent = $this->params->get("zygocontent");

		include_once (JPATH_ROOT."/plugins/user/zygo_profile/zygo_helper.php");

    }

	public function onContentPrepare($context, &$article, &$params, $page = 0)
	{	

		if(strpos($context, 'com_content.')!==0 || empty($this->zygocontent)){
			return true;
		}

		foreach($this->zygocontent as $field){
			$field = array_values((array) $field);
			if(is_object($field[1])) $field[1] = array_values((array) $field[1]);

			if( ($context== "com_content.article" && $field[3] != 1) || 
				($context!= "com_content.article" && $field[3] != 2)){


				$fid = $field[0];

				$field_html = ZygoHelper::getField($fid, $article->created_by);

				if(!trim($field_html)) continue;
				$css  = str_replace(',', ' ', $field[4]);
				$fd = str_replace("uniqueID", "", $fid);
				$fHTML = "<div class='zygo_content_field zygo_content_field_id_".$fd." ".$css."'>";

				// add label
				if($field[2]){
					$fHTML .= '<span class="zygo_content_label zygo_content_label_field_id_'.$fd.'">';
					$fHTML .= ZygoHelper::getLabel($fid).": </span>";
				}

				$fHTML .= $field_html;

				$fHTML .= "</div>";

				if($field[1][0] == "beforeContent"){
					$article->text = $fHTML.$article->text;
				}else if($field[1][0] == "afterContent"){
					$article->text .= $fHTML;
				}else if($field[1][0] == "byTag" && isset($field[1][1]) && trim($field[1][1])){
					$article->text = str_replace(trim($field[1][1]), $fHTML, $article->text);
				}
			}
		}

	}
}
