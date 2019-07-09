<?php
/**
 * Kunena Plugin
 *
 * @package     Kunena.Plugins
 * @subpackage  Gravatar
 *
 * @copyright   (C) 2008 - 2017 Kunena Team. All rights reserved.
 * @license     http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link        https://www.kunena.org
 **/
defined('_JEXEC') or die();

class KunenaAvatarZygoprofile extends KunenaAvatar
{
	protected $params = null;

	/**
	 * KunenaAvatarGravatar constructor.
	 *
	 * @param $params
	 */
	public function __construct($params)
	{
		$this->params = $params;
		require_once dirname(__FILE__) . '/zygoprofile.php';
	}

	/**
	 * @return boolean
	 */
	public function getEditURL()
	{
		return KunenaRoute::_('index.php?option=com_kunena&view=user&layout=edit');
	}

	protected function _getURL($user, $sizex, $sizey)
	{
		include_once (JPATH_ROOT."/plugins/user/zygo_profile/zygo_helper.php");
		$avatar_links = ZygoHelper::getAvatar($user->id);
		return $avatar_links->link;
	}
}
