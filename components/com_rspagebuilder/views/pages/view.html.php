<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

class RSPageBuilderViewPages extends JViewLegacy {

	public function display($tpl = null) {
		require_once (JPATH_COMPONENT . '/helpers/element-parser.php');
		require_once (JPATH_COMPONENT_ADMINISTRATOR.'/helpers/rspagebuilder.php');
		
		$doc				= JFactory::getDocument();
		$app				= JFactory::getApplication();
		$menus				= $app->getMenu();
		$menu				= $menus->getActive();
		
		$this->items 		= $this->get('Items');
		$this->state		= $this->get('State');
		$this->pagination	= $this->get('Pagination');
		$this->total		= $this->get('Total');
		$this->params		= $this->state->get('params');

		// Load jQuery files
		JHtml::_('jquery.framework');

		// Load CSS files
		RSPageBuilderHelper::loadAsset('component', 'font-awesome.min.css');
		RSPageBuilderHelper::loadAsset('component', 'style.css');
		
		// IE9 or less animations fallback
		$doc->addCustomTag('<!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="media/com_rspagebuilder/css/animations-ie-fallback.css" /><![endif]-->');
		
		// Load JS files
		RSPageBuilderHelper::loadAsset('component', 'rspagebuilder.js');
		
		// Messages translations
		JText::script('COM_RSPAGEBUILDER_COUNTDOWN_TIMER_EXPIRED');
		
		JText::script('WARNING');
		
		// Elements fields translations
		JText::script('COM_RSPAGEBUILDER_LONG_DAY');
		JText::script('COM_RSPAGEBUILDER_LONG_DAYS');
		JText::script('COM_RSPAGEBUILDER_LONG_HOUR');
		JText::script('COM_RSPAGEBUILDER_LONG_HOURS');
		JText::script('COM_RSPAGEBUILDER_LONG_MINUTE');
		JText::script('COM_RSPAGEBUILDER_LONG_MINUTES');
		JText::script('COM_RSPAGEBUILDER_LONG_SECOND');
		JText::script('COM_RSPAGEBUILDER_LONG_SECONDS');
		JText::script('COM_RSPAGEBUILDER_SHORT_DAYS');
		JText::script('COM_RSPAGEBUILDER_SHORT_HOURS');
		JText::script('COM_RSPAGEBUILDER_SHORT_MINUTES');
		JText::script('COM_RSPAGEBUILDER_SHORT_SECONDS');
		
		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseWarning(500, implode("\n", $errors));
			return false;
		}
		
		parent::display($tpl);
	}
}