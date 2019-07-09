<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

class RSPageBuilderRouter extends JComponentRouterBase {
	
	public function build(&$query) {
		$segments	= array();
		$menu		= JFactory::getApplication()->getMenu();

		if (empty($query['Itemid'])) {
			$menuItem = $menu->getActive();
			$menuItemGiven = false;
		} else {
			$menuItem = $menu->getItem($query['Itemid']);
			$menuItemGiven = true;
		}

		// Check again
		if ($menuItemGiven && isset($menuItem) && $menuItem->component != 'com_rspagebuilder') {
			$menuItemGiven = false;
			unset($query['Itemid']);
		}

		if (isset($query['layout'])) {
			unset($query['layout']);
		}

		if (isset($query['view'])) {
			$view = $query['view'];
		} else {
			return $segments;
		}

		if (($menuItem instanceof stdClass) && $menuItem->query['view'] == $query['view'] && isset($query['id']) && $menuItem->query['id'] == (int) $query['id']) {
			unset($query['view']);
			unset($query['id']);

			return $segments;
		}

		if ($view == 'page') {
			if (!$menuItemGiven) {
				$segments[] = $view;
			}

			unset($query['view']);

			if ($view == 'page') {
				if (isset($query['id'])) {
					if (strpos($query['id'], '-') === false) {
						$db = JFactory::getDbo();
						$dbQuery = $db->getQuery(true)
							->select('alias')
							->from('#__rspagebuilder')
							->where('id=' . (int) $query['id']);
						$db->setQuery($dbQuery);
						$alias = $db->loadResult();
						$query['id'] = $query['id'] . '-' . $alias;
					}
				} else {
					return $segments;
				}
			} else {
				return $segments;
			}

			$id			= $query['id'];
			$segments[]	= $id;
			unset($query['id']);
		}
		
		if ($view == 'pages') {
			$segments[] = $view;
			
			if (isset($query['view'])) {
				unset($query['view']);
			}
			if (isset($query['Itemid'])) {
				unset($query['Itemid']);
			}
		}

		return $segments;
	}

	public function parse(&$segments) {
		$vars	= array();

		// Get the active menu item.
		$menu	= JFactory::getApplication()->getMenu();
		$item	= $menu->getActive();

		// Count route segments
		$count = count($segments);
		
		if (!isset($item)) {
			$vars['view']	= $segments[0];
			$vars['id']		= $segments[$count - 1];
		}
		else {
			$vars['view']	= 'page';
			$vars['id']		= (int) $segments[0];
		}

		return $vars;
	}
}


function RSPageBuilderBuildRoute(&$query) {
	$router = new RSPageBuilderRouter;

	return $router->build($query);
}

function RSPageBuilderParseRoute($segments) {
	$router = new RSPageBuilderRouter;

	return $router->parse($segments);
}