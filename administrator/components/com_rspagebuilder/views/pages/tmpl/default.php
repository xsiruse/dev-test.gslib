<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', '.multipleAuthors', null, array('placeholder_text_multiple' => JText::_('JOPTION_SELECT_AUTHOR')));
JHtml::_('formbehavior.chosen', '.multipleAccessLevels', null, array('placeholder_text_multiple' => JText::_('JOPTION_SELECT_ACCESS')));
JHtml::_('formbehavior.chosen', 'select');

$user		= JFactory::getUser();
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$sortFields	= $this->getSortFields();
?>

<form id="adminForm" name="adminForm" action="<?php echo JRoute::_('index.php?option=com_rspagebuilder&view=pages');?>" method="post">
	<div id="j-main-container span12">
<?php
// Search tools bar
echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
?>
<?php
$pages = $this->checkForPages();
	
if (empty($pages)) {
?>
		<div class="alert alert-info alert-no-items">
			<?php echo JText::_('COM_RSPAGEBUILDER_NO_PAGES_YET'); ?>
		</div>
<?php
} else {
	if (empty($this->items)) {
?>
		<div class="alert alert-no-items">
			<?php echo JText::_('COM_RSPAGEBUILDER_NO_PAGES_FOUND'); ?>
		</div>
<?php } else { ?>
		<table  class="table table-striped" id="pageList">
			<thead>
				<tr>
					<th class="hidden-phone center" width="2%">
						<?php echo JHtml::_('grid.checkall'); ?>
					</th>
					<th class="nowrap center" width="4%">
						<?php echo JHtml::_('searchtools.sort', 'JSTATUS', 'p.published', $listDirn, $listOrder); ?>
					</th>
					<th>
						<?php echo JHtml::_('searchtools.sort', 'JGLOBAL_TITLE', 'p.title', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap hidden-phone" width="10%">
						<?php echo JHtml::_('searchtools.sort',  'JAUTHOR', 'p.created_by', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap hidden-phone" width="10%">
						<?php echo JHtml::_('searchtools.sort',  'JGRID_HEADING_ACCESS', 'p.access', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap hidden-phone" width="10%">
						<?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_LANGUAGE', 'p.language', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap hidden-phone" width="10%">
						<?php echo JHtml::_('searchtools.sort',  'JDATE', 'p.created', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap hidden-phone" width="1%">
						<?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_ID', 'p.id', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($this->items as $i => $item) {
					$canEdit    = $user->authorise('core.edit', 'com_rspagebuilder');
					$canChange  = $user->authorise('core.edit.state', 'com_rspagebuilder');
				?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center hidden-phone">
						<?php echo JHtml::_('grid.id', $i, $item->id); ?>
					</td>
					<td class="center">
						<div class="btn-group">
							<?php
							echo JHtml::_('jgrid.published', $item->published, $i, 'pages.', $canChange);
							
							// Create dropdown items and render the dropdown list.
							if ($canChange) {
								JHtml::_('actionsdropdown.' . ((int) $item->published === -2 ? 'un' : '') . 'trash', 'cb' . $i, 'pages');
								echo JHtml::_('actionsdropdown.render', $this->escape($item->title));
							}
							?>
						</div>
					</td>
					<td>
						<?php if ($canEdit) { ?>
						<a href="<?php echo JRoute::_('index.php?option=com_rspagebuilder&task=page.edit&id='.$item->id);?>">
							<?php echo $this->escape($item->title); ?>
						</a>
						<?php
						} else {
							echo $this->escape($item->title);
						}
						?>
						<?php if($item->alias) { ?>
							<span class="small" title="<?php echo $this->escape($item->alias); ?>">
								<?php echo JText::sprintf('JGLOBAL_LIST_ALIAS', $this->escape($item->alias));?>
							</span>
						<?php } ?>
					</td>
					<td class="small hidden-phone">
						<a href="<?php echo JRoute::_("index.php?option=com_users&task=user.edit&id=$item->created_by"); ?>">
							<?php echo $this->escape($item->author_name); ?>
						</a>
					</td>
					<td class="small hidden-phone">
						<?php echo $this->escape($item->access_level); ?>
					</td>
					<td class="small nowrap hidden-phone">
						<?php
						if ($item->language == '*') {
							echo JText::alt('JALL', 'language');
						} else {
							echo $item->language_title ? $this->escape($item->language_title) : JText::_('JUNDEFINED');
						}
						?>
					</td>
					<td class="small hidden-phone">
						<?php
							$date = $item->created;
							echo ($date > 0) ? JHtml::_('date', $date, JText::_('DATE_FORMAT_LC4')) : '-';
						?>
					</td>
					<td class="center hidden-phone">
						<?php echo (int) $item->id; ?>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
<?php
	}
}
?>
		<?php echo $this->pagination->getListFooter(); ?>
		
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>