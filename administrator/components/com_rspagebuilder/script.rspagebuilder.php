<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

class com_rspagebuilderInstallerScript
{
	public function preflight($type, $parent) {
		$app		= JFactory::getApplication();
		$jversion	= new JVersion();
		
		if (!$jversion->isCompatible('3.7.0')) {
			$app->enqueueMessage('Please upgrade to at least Joomla! 3.7.0 before continuing!', 'error');
			return false;
		}
		
		return true;
	}
	
	public function postflight($type, $parent) {
		
		if ($type == 'update') {
			$db = JFactory::getDbo();
			
			// Check for the 'animate' column
			$db->setQuery("SHOW COLUMNS FROM `#__rspagebuilder` LIKE 'animate'");
			
			if (!$db->loadResult()) {
				$db->setQuery("ALTER TABLE `#__rspagebuilder` ADD `animate` tinyint(3) NOT NULL DEFAULT '1' AFTER `full_width`");
				$db->execute();
			}
			
			// Check for the 'content_plugins' column
			$db->setQuery("SHOW COLUMNS FROM `#__rspagebuilder` LIKE 'content_plugins'");
			
			if (!$db->loadResult()) {
				$db->setQuery("ALTER TABLE `#__rspagebuilder` ADD `content_plugins` tinyint(3) NOT NULL DEFAULT '0' AFTER `animate`");
				$db->execute();
			}
		} else if ($type == 'uninstall') {
			return true;
		}
?>

<style type="text/css">
.version-history {
	margin: 0 0 2em 0;
	padding: 0;
	list-style-type: none;
}
.version-history > li {
	margin: 0 0 0.5em 0;
	padding: 0 0 0 4em;
}
.version,
.version-new,
.version-fixed,
.version-upgraded {
	float: left;
	font-size: 0.8em;
	margin-left: -4.9em;
	width: 4.5em;
	color: white;
	text-align: center;
	font-weight: bold;
	text-transform: uppercase;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}
.version {
	background: #000;
}
.version-new {
	background: #7dc35b;
}
.version-fixed {
	background: #e9a130;
}
.version-upgraded {
	background: #61b3de;
}
.installer-left {
	float: left;
	width: 230px;
	margin: 30px 10px 30px 0px;
}
.installer-right {
	float: left;
	margin: 30px 0;
}
@media (max-width: 979px) {
	.installer-left {
		float: none;
		margin: 30px 0px 30px 0px;
		text-align: center;
		width: 100%;
	}
	.installer-right {
		float: none;
		margin: 0px 0px 30px 0px;
		width: 100%;
	}
}
</style>
	<div class="installer-left">
		<img src="../media/com_rspagebuilder/images/rspagebuilder.png" alt="RSPageBuilder!" />
	</div>
	<div class="installer-right">
		<h2>RSPageBuilder! v1.0.31 Changelog</h2>
		<ul class="version-history">
			<li><span class="version-fixed">Fix</span> Carousel 'Controls Font Size' option did not work properly.</li>
			<li><span class="version-fixed">Fix</span> Elements' content fields were displayed as simple textareas when the default editor was other than one of the Joomla! default editors.</li>
		</ul>
		<a class="btn btn-success" href="index.php?option=com_rspagebuilder">Start using RSPageBuilder!</a>
		<a class="btn btn-info" href="https://www.rsjoomla.com/support/documentation/rspagebuilder.html" target="_blank">Read the RSPageBuilder! User Guide</a>
		<a class="btn btn-warning" href="http://www.rsjoomla.com/customer-support/tickets.html" target="_blank">Get Support!</a>
	</div>
<?php
	}
}