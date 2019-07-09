<?php
/**
* @id           $Id$
* @author       Sherza (zygopterix@gmail.com)
* @package      ZYGO Online
* @copyright    Copyright (C) 2015 Psytronica.ru. http://psytronica.ru  All rights reserved.
* @license      GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

if(!file_exists( JPATH_ROOT .'/plugins/user/zygo_profile/zygo_helper.php' )){
	echo JText::_("MOD_ZYGO_ONLINE_PLUGIN_NOT_INSTALLED");
	return;
}

if(!$params->get('avatar')){
	echo JText::_('MOD_ZYGO_ONLINE_NO_AVATAR_FIELD_SELECTED');
	return;
}

require_once ( dirname(__FILE__) .'/helper.php' );
$modZeOnlineHelper = new modZygoOnlineHelper();
list($users, $total, $robots)	= $modZeOnlineHelper->getUsersData( $params );

require(JModuleHelper::getLayoutPath('mod_zygo_online'));

