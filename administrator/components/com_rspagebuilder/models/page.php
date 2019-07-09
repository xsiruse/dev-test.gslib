<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

use Joomla\String\StringHelper;

class RSPageBuilderModelPage extends JModelAdmin
{
	
	/**
	 * Returns a Table object, always creating it.
	 *
	 * @param	type	The table type to instantiate
	 * @param	string	A prefix for the table class name. Optional.
	 * @param	array	Configuration array for model. Optional.
	 *
	 * @return	JTable	A database object
	*/
    public function getTable($type = 'Page', $prefix = 'RSPageBuilderTable', $config = array()) {
        return JTable::getInstance($type, $prefix, $config);
    }

	/**
	 * Method to get the record form.
	 *
	 * @param	array	$data		Data for the form.
	 * @param	boolean	$loadData	True if the form is to load its own data (default case), false if not.
	 *
	 * @return	mixed	A JForm object on success, false on failure
	 */
    public function getForm($data = array(), $loadData = true) {
        $form = $this->loadForm('com_rspagebuilder.page', 'page', array('control' => 'jform', 'load_data' => $loadData));
		
        if (empty($form)) {
			return false;
		}
		
        return $form;
    }
	
	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return	mixed	The data for the form.
	 */
    protected function loadFormData() {
        $data = JFactory::getApplication()->getUserState('com_rspagebuilder.edit.page.data', array());
		
        if (empty($data)) {
			$data = $this->getItem();
		}
        if (isset($data->alias)) {
			if ($data->alias) {
                $data->alias = JFilterOutput::stringURLSafe($data->alias);
            } else {
                $data->alias = JFilterOutput::stringURLSafe($data->title);
            }
        }
        $this->preprocessData('com_rspagebuilder.page', $data);
		
        return $data;
    }
	
	/**
	 * Method to save the form data.
	 *
	 * @param   array  $data  The form data.
	 *
	 * @return  boolean  True on success.
	 */
    public function save($data) {
        if (JFactory::getApplication()->input->get('task') == 'save2copy') {
			$table = clone $this->getTable();
			$table->load(array('alias' => $data['alias']));
			
			list($title, $alias)	= $this->generateNewTitle(null, $data['alias'], $data['title']);
			$data['alias']			= $alias;
			$data['title']			= $title;
        }
        parent::save($data);
		
        return true;
    }
	
	protected function generateNewTitle($cat, $alias, $title) {
		// Alter the title & alias
		$table = $this->getTable();
		
		while ($table->load(array('alias' => $alias))) {
			$title = StringHelper::increment($title);
			$alias = StringHelper::increment($alias, 'dash');
		}
		
		return array($title, $alias);
	}
}