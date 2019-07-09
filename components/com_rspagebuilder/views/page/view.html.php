<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

class RSPageBuilderViewPage extends JViewLegacy {

	public function display($tpl = null) {
		require_once (JPATH_COMPONENT . '/helpers/element-parser.php');
		require_once (JPATH_COMPONENT_ADMINISTRATOR.'/helpers/rspagebuilder.php');
		
		$doc						= JFactory::getDocument();
		$app						= JFactory::getApplication();
		$menus						= $app->getMenu();
		$menu						= $menus->getActive();

		$this->page 				= $this->get('Item');
		$this->pageclass_sfx		= '';
		$this->show_page_heading	= '';
		$this->page_heading			= 0;

		// Load Bootstrap files
		if ($this->page->bootstrap_version == '2') {
			JHtml::_('bootstrap.framework');
			JHtml::_('bootstrap.loadCss', true, $doc->direction);
		}

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

		// Active menu item
		if ($menu) {
			$this->pageclass_sfx 		= $menu->params->get('pageclass_sfx');
			$this->show_page_heading	= $menu->params->get('show_page_heading');
			$this->page_heading 		= $menu->params->get('page_heading');
		}
		if (count($errors = $this->get('Errors'))) {
			JLog::add(implode('<br />',$errors),JLog::WARNING,'jerror');
			return false;
		}
		if ($this->page->access_view == false) {
			JError::raiseWarning(403, JText::_('JERROR_ALERTNOAUTHOR'));
			return;
		}
		
		// Clear search
		$app->setUserState('rspagebuilder.search', '');
		
		$this->prepareDocument();
		parent::display($tpl);
	}

	protected function prepareDocument() {
		$config = JFactory::getConfig();
		$app	= JFactory::getApplication();
		$doc 	= JFactory::getDocument();
		$menus	= $app->getMenu();
		$menu	= $menus->getActive();
		
		$title = ($menu ? $menu->params->get('page_title', '') : '');
		if (empty($title)) {
			$title = $this->page->title;
		}
		
		// Set page title
		$page_title = $title;
		if ($config->get('sitename_pagetitles') == 2) {
			$page_title = $title . ' | ' . $config->get('sitename');
		} elseif ($config->get('sitename_pagetitles') == 1) {
			$page_title = $config->get('sitename') . ' | ' . $title;
		}
		$doc->setTitle($page_title);
		
		// Open Graph meta tags
		if ($this->page->open_graph_title) {
			$doc->setMetadata('og:title', $this->page->open_graph_title);
		} else {
			$doc->setMetadata('og:title', $title);
		}
		$doc->setMetadata('og:type', 'website');
		if ($this->page->open_graph_image) {
			$doc->setMetadata('og:image', JUri::root() . $this->page->open_graph_image);
		}
		if ($this->page->open_graph_description) {
			$doc->setMetadata('og:description', $this->page->open_graph_description);
		}
		$doc->setMetadata('og:url', JUri::current());
		
		if ($this->page->metadesc) {
			$doc->setDescription($this->page->metadesc);
		} else if ($menu && $menu->params->get('menu-meta_description')) {
			$doc->setDescription($menu->params->get('menu-meta_description'));
		}
		
		if ($this->page->metakey) {
			$doc->setMetadata('keywords', $this->page->metakey);
		} else if ($menu && $menu->params->get('menu-meta_keywords')) {
			$doc->setMetadata('keywords', $menu->params->get('menu-meta_keywords'));
		}
		
		if ($this->page->robots) {
			$doc->setMetadata('robots', $this->page->robots);
		} else if ($menu && $menu->params->get('robots')) {
			$doc->setMetadata('robots', $menu->params->get('robots'));
		}
	}
}