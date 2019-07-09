<?php
/**
 * @version     1.0.0
 * @package     com_zesocial
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      SherZa <sherza.web@gmail.com> - http://psytronica.ru
 */

defined('JPATH_BASE') or die;

jimport('joomla.form.formfield');

/**
 * Supports an HTML select list of categories
 */
class JFormFieldZeprofilefield extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 * @since	1.6
	 */
	protected $type = 'zeprofilefield';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 * @since	1.6
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html = array();
        
       	$plugin = JPluginHelper::getPlugin('user', 'zygo_profile');
		$pluginParams = new JRegistry();
		$pluginParams->loadString($plugin->params);
		$userinfo = $pluginParams->get('userinfo');

		
		$code = '';
		$fieldname = '';
		if(is_array($userinfo)){
			if(isset($userinfo['code']) && !empty($userinfo['code'])){
				$code = $userinfo['code'];
				$fieldname = $userinfo['fieldName'];
			}
		}else if(is_object($userinfo)){
			if(isset($userinfo->code) && !empty($userinfo->code)){
				$code = $userinfo->code;
				$fieldname = $userinfo->fieldName;
			}			
		}

		if($code){
			$state=array();
			if(!$this->multiple) $state[] = JHTML::_('select.option', '', '- Выберите поле -');
			foreach($code as $k=>$name){
				$fname = (is_array($fieldname))? $fieldname[$k] : $fieldname->$k;
				if($fname!='uniqueID0'){
					$state[] = JHTML::_('select.option',  $fname, $name);
				}
			}
			$attribs=null;
			if($this->multiple) $attribs="multiple='true'";
			$html[] = JHTML::_('select.genericlist', $state, $name = $this->name, $attribs, $key = 'value', $text = 'text', $selected = $this->value );
		}

		return implode($html);
	}
}