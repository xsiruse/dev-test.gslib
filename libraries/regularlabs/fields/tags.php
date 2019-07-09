<?php
/**
 * @package         Regular Labs Library
 * @version         17.10.8255
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://www.regularlabs.com
 * @copyright       Copyright © 2017 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

defined('_JEXEC') or die;

if ( ! is_file(JPATH_LIBRARIES . '/regularlabs/autoload.php'))
{
	return;
}

require_once JPATH_LIBRARIES . '/regularlabs/autoload.php';

class JFormFieldRL_Tags extends \RegularLabs\Library\Field
{
	public $type = 'Tags';

	protected function getInput()
	{
		$this->params = $this->element->attributes();

		$size        = (int) $this->get('size');
		$simple      = (int) $this->get('simple');
		$show_ignore = $this->get('show_ignore');
		$use_names   = $this->get('use_names');

		if ($show_ignore && in_array('-1', $this->value))
		{
			$this->value = ['-1'];
		}

		return $this->selectListAjax(
			$this->type, $this->name, $this->value, $this->id,
			compact('size', 'simple', 'show_ignore', 'use_names'),
			$simple
		);
	}

	function getAjaxRaw()
	{
		$input = JFactory::getApplication()->input;

		$options = $this->getOptions(
			$input->getBool('show_all'),
			$input->getBool('use_names')
		);

		$name   = $input->getString('name', $this->type);
		$id     = $input->get('id', strtolower($name));
		$value  = json_decode($input->getString('value', '[]'));
		$size   = $input->getInt('size');
		$simple = $input->getBool('simple');

		return $this->selectList($options, $name, $value, $id, $size, true, $simple);
	}

	protected function getOptions($show_ignore = false, $use_names = false, $value = [])
	{
		// assemble items to the array
		$options = [];

		if ($show_ignore)
		{
			$options[] = JHtml::_('select.option', '-1', '- ' . JText::_('RL_IGNORE') . ' -');
			$options[] = JHtml::_('select.option', '-', '&nbsp;', 'value', 'text', true);
		}

		$options = array_merge($options, $this->getTags($use_names));

		return $options;
	}

	protected function getTags($use_names)
	{
		$value = $use_names ? 'a.title' : 'a.id';

		$query = $this->db->getQuery(true)
			->select($value . ' as value, a.title as text, a.parent_id AS parent')
			->from('#__tags AS a')
			->select('COUNT(DISTINCT b.id) - 1 AS level')
			->join('LEFT', '#__tags AS b ON a.lft > b.lft AND a.rgt < b.rgt')
			->where('a.alias <> ' . $this->db->quote('root'))
			->where('a.published IN (0,1)')
			->group('a.id')
			->order('a.lft ASC');
		$this->db->setQuery($query);

		return $this->db->loadObjectList();
	}
}
