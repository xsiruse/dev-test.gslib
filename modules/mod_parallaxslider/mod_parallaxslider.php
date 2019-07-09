<?php
/**
 * @package Parallax Slider
 * @version 1.2
 * @author ThemeXpert http://www.themexpert.com
 * @copyright Copyright (C) 2009 - 2011 ThemeXpert
 * @license GNU General Public License version 3, or later
 *
 */
 
// no direct access
defined('_JEXEC') or die('Restricted accessd');

// Check for the framework, if not found eject
include_once JPATH_LIBRARIES . '/xef/bootstrap.php';

if( !defined('XEF_INCLUDED'))
{
    echo 'Your Module installation is broken; please re-install. Alternatively, extract the installation archive and copy the xef directory inside your site\'s libraries directory.';
    return ;
}

// Include the syndicate functions only once
require_once (dirname(__FILE__). '/helper.php');

//set module id
$module_id = XEFUtility::getModuleId($module, $params);

// Content source
$content_source = $params->get('content_source','joomla');

// Import source and get the class name
$class_name = importSource($content_source);

// Create instance of the class
$instance = new $class_name($module, $params);

// Get the items
$items = $instance->getItems();

// Load Stylesheet file
XEFUtility::loadStyleSheet($module, $params);

// Load Module specific script
XEFParallaxSliderHelper::load_script($module, $params);

// Load Module specific style defination
XEFParallaxSliderHelper::load_style($module, $params);

require JModuleHelper::getLayoutPath($module->module, $params->get('layout', 'default'));
