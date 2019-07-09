<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');
?>

<div class="rspbld-pages">
	<?php
	if (count($this->items)) {
		foreach($this->items as $key => $page) {
	?>
	<div class="rspbld-page-container">
		<div class="row-fluid">
			<div class="span4 result">
				<h2><?php echo ($key + 1).'. '; ?><a href="<?php echo JRoute::_('index.php?option=com_rspagebuilder&view=page&id='.$page->id); ?>"><?php echo $page->title; ?></a></h2>
			</div>
			<div class="span8 wrapper">
				<div class="details">
					<span class="label label-info">
						<span class="fa fa-eye"></span>
						<?php echo JText::_('COM_RSPAGEBUILDER_PAGE_PREVIEW'); ?>
					</span>
					<a class="label label-success" href="<?php echo JRoute::_('index.php?option=com_rspagebuilder&view=page&id='.$page->id); ?>">
						<span class="fa fa-share"></span>
						<?php echo $page->title; ?>
					</a>
				</div>
				<div class="preview">
					<?php echo ElementParser::viewPage(json_decode($page->content), $page->bootstrap_version, true, false, (int) $page->content_plugins); ?>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if ($this->total > 1) { ?>
	<form action="<?php echo $this->escape(JURI::getInstance()); ?>" method="post" name="adminForm" id="adminForm">
		<div class="pagination">
			<p class="counter pull-right">
				<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
			<?php echo $this->pagination->getPagesLinks(); ?>
		</div>
	</form>
	<?php
		}
	} else {
	?>
	<div class="alert alert-warning">
		<?php echo JText::_('COM_RSPAGEBUILDER_NO_PAGES_FOUND'); ?>
	</div>
	<?php } ?>
</div>