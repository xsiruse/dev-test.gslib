<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

class RSPageBuilderViewPages extends JViewLegacy
{
	public function display($tpl = null) {
		$this->items			= $this->get('Items');
		$this->pagination		= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filterForm		= $this->get('FilterForm');
		$this->activeFilters	= $this->get('ActiveFilters');
		
		if ($errors = $this->get('Errors')) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->addToolBar();
		JToolBarHelper::preferences('com_rspagebuilder');
		
		parent::display($tpl);
	}
	
	protected function addToolBar() {
		$actions = JHelperContent::getActions('com_rspagebuilder');
		
		// Title
		JToolBarHelper::title(JText::_('COM_RSPAGEBUILDER'), 'rspagebuilder');
		
		// New page button
		if ($actions->get('core.create')) {
			JToolbarHelper::addNew('page.add');
		}
		
		// Edit button
		if ($actions->get('core.edit')) {
			JToolbarHelper::editList('page.edit');
		}
		
		// Publish / Unpublish button
		if ($actions->get('core.edit.state')) {
			JToolbarHelper::publish('pages.publish');
			JToolbarHelper::unpublish('pages.unpublish');
		}
		
		// Delete and Trush button
		if ($this->state->get('filter.published') == -2 && $actions->get('core.delete')) {
			JToolbarHelper::deleteList('', 'pages.delete', 'JTOOLBAR_EMPTY_TRASH');
		} else if ($actions->get('core.edit.state')) {
			JToolbarHelper::trash('pages.trash');
		}
	}

	protected function getSortFields() {
		return array(
			'p.published'	=> JText::_('JSTATUS'),
			'p.title'		=> JText::_('JGLOBAL_TITLE'),
			'access_level'	=> JText::_('JGRID_HEADING_ACCESS'),
			'author_name'	=> JText::_('JAUTHOR'),
			'language'		=> JText::_('JGRID_HEADING_LANGUAGE'),
			'p.created'		=> JText::_('JDATE'),
			'p.id'			=> JText::_('JGRID_HEADING_ID')
		);
	}
	
	public function checkForPages() {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true)
			->select('COUNT('.$db->qn('id').')')
			->from($db->qn('#__rspagebuilder'));
        $db->setQuery($query);
        
		return $db->loadResult();
	}
	
    public function getAuthors() {
        $db		= JFactory::getDbo();
        $query	= $db->getQuery(true)
			->select($db->qn('u.id', 'value') . ', ' . $db->qn('u.name', 'text'))
			->from($db->qn('#__users', 'u'))
			->innerJoin( $db->qn('#__rspagebuilder', 'p') . ' ON ' . $db->qn('p.created_by') . ' = ' . $db->qn('u.id'))
			->group($db->qn('u.id'))
			->order($db->qn('u.name'));
        $db->setQuery($query);
        
        return $db->loadObjectList();
    }
}