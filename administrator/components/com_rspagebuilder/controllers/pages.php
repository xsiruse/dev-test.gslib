<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

/**
 * Pages controller.
 */
class RSPageBuilderControllerPages extends JControllerAdmin
{
    public function getModel($name = 'Page', $prefix = 'RSPageBuilderModel', $config = array('ignore_request' => true)) {
        return parent::getModel($name, $prefix, $config);
    }
}