<?php
/**
 * @package   OSDonate
 * @contact   www.joomlashack.com, help@joomlashack.com
 * @copyright 2016 Open Source Training, LLC, All rights reserved
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die();

use Alledia\Framework\AutoLoader;

if (!defined('MOD_OSDONATE_LOADED')) {
    define('MOD_OSDONATE_LOADED', 1);

    // Alledia Framework
    if (!defined('ALLEDIA_FRAMEWORK_LOADED')) {
        $allediaFrameworkPath = JPATH_SITE . '/libraries/allediaframework/include.php';

        if (file_exists($allediaFrameworkPath)) {
            require_once $allediaFrameworkPath;
        } else {
            JFactory::getApplication()
                ->enqueueMessage('[OSDonate] Alledia framework not found', 'error');
        }
    }

    AutoLoader::register('Alledia\OSDonate', JPATH_SITE . '/modules/mod_osdonate/library');
}
