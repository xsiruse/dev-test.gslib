<?php
/**
 * RS-CoolMP3Player
 * 
 * @package - Joomla
 * @subpackage - Modules
 * @link - www.rswebsols.com
 * @license - GNU/GPL
**/
 
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Include the syndicate functions only once
require_once( dirname(__FILE__).'/helper.php' );
 
$rswsReturn = modRSCoolMP3PlayerHelper::rswsReturn( $module->id, $params );

require( JModuleHelper::getLayoutPath( 'mod_rscoolmp3player' ) );
?>