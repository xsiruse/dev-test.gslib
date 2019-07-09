<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

$app = JFactory::getApplication();

if ($app->isSite()) {
	JSession::checkToken('get') or die(JText::_('JINVALID_TOKEN'));
}

JLoader::register('RSPageBuilderHelperRoute', JPATH_ROOT . '/components/com_rspagebuilder/helpers/route.php');

JHtml::_('behavior.core');
JHtml::_('behavior.polyfill', array('event'), 'lt IE 9');
JHtml::_('script', 'com_rspagebuilder/admin-pages-modal.js', array('version' => 'auto', 'relative' => true));
JHtml::_('bootstrap.tooltip', '.hasTooltip', array('placement' => 'bottom'));
JHtml::_('bootstrap.popover', '.hasPopover', array('placement' => 'bottom'));
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', '.multipleAuthors', null, array('placeholder_text_multiple' => JText::_('JOPTION_SELECT_AUTHOR')));
JHtml::_('formbehavior.chosen', '.multipleAccessLevels', null, array('placeholder_text_multiple' => JText::_('JOPTION_SELECT_ACCESS')));
JHtml::_('formbehavior.chosen', 'select');

// Special case for the search field tooltip.
$searchFilterDesc = $this->filterForm->getFieldAttribute('search', 'description', null, 'filter');
JHtml::_('bootstrap.tooltip', '#filter_search', array('title' => JText::_($searchFilterDesc), 'placement' => 'bottom'));

$user		= JFactory::getUser();
$function  	= $app->input->getCmd('function', 'jSelectPage');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
?>

<div class="container-popup">
	<form action="<?php echo JRoute::_('index.php?option=com_rspagebuilder&view=pages&layout=modal&tmpl=component&function=' . $function . '&' .JSession::getFormToken() . '=1');?>" method="post" name="adminForm" id="adminForm">

	<?php echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this)); ?>
			
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
					<th class="center nowrap" width="2%">
						<?php echo JHtml::_('searchtools.sort', 'JSTATUS', 'p.published', $listDirn, $listOrder); ?>
					</th>
					<th>
						<?php echo JHtml::_('searchtools.sort', 'JGLOBAL_TITLE', 'p.title', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap hidden-phone" width="10%">
						<?php echo JHtml::_('searchtools.sort',  'JGRID_HEADING_ACCESS', 'p.access', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap hidden-phone" width="10%">
						<?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_LANGUAGE', 'p.language', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?>
					</th>
					<th class="nowrap hidden-phone" width="10%">
						<?php echo JHtml::_('searchtools.sort',  'JDATE', 'p.created', $listDirn, $listOrder); ?>
					</th>
					<th class="nowrap hidden-phone" width="1%">
						<?php echo JHtml::_('searchtools.sort', 'JGRID_HEADING_ID', 'p.id', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="15">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php
			$iconStates = array(
				-2 => 'icon-trash',
				0  => 'icon-unpublish',
				1  => 'icon-publish',
				2  => 'icon-archive',
			);
			
			foreach ($this->items as $i => $item) {
				if ($item->language && JLanguageMultilang::isEnabled()) {
					$tag = strlen($item->language);
					
					if ($tag == 5) {
						$lang = substr($item->language, 0, 2);
					} else if ($tag == 6) {
						$lang = substr($item->language, 0, 3);
					} else {
						$lang = '';
					}
				} else if (!JLanguageMultilang::isEnabled()) {
					$lang = '';
				}
	?>
				<tr class="row<?php echo $i % 2; ?>">
					<td class="center">
						<span class="<?php echo $iconStates[$this->escape($item->published)]; ?>" aria-hidden="true"></span>
					</td>
					<td>
						<?php
							$attribs = 'data-function="' . $this->escape($function) . '"'
								. ' data-id="' . $item->id . '"'
								. ' data-title="' . $this->escape($item->title) . '"'
								. ' data-url="' . $this->escape(RSPageBuilderHelperRoute::getPageRoute($item->id, $item->language)) . '"'
								. ' data-language="' . $lang . '"';
						?>
						<a class="select-link" href="javascript:void(0)" <?php echo $attribs; ?>>
							<?php echo $this->escape($item->title); ?>
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
		<div>
			<input type="hidden" name="task" value="" />
			<input type="hidden" name="boxchecked" value="0" />
			<?php echo JHtml::_('form.token'); ?>
		</div>
	</form>
</div>