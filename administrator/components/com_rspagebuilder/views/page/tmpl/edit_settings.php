<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');
?>

<div class="modal hide fade" id="modal-row-settings" data-backdrop="static" 
   data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-row-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close-row-settings" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="modal-row-label"><?php echo JText::_('COM_RSPAGEBUILDER_ROW_SETTINGS'); ?></h3>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span12">
						<div class="row-options"></div>
					</div>
				</div>
				<div class="loader"></div>
			</div>
			<div class="modal-footer clearfix">
				<a href="javascript:void(0)" class="btn btn-success pull-left" id="save-row-settings"><?php echo JText::_('COM_RSPAGEBUILDER_SAVE'); ?></a>
				<button class="btn btn-danger pull-left" id="cancel-row-settings" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('COM_RSPAGEBUILDER_CANCEL'); ?></button>
			</div>
		</div>
	</div>
</div>
<div class="modal hide fade" id="modal-column-settings" data-backdrop="static" 
   data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-column-content-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close-column-settings" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="modal-column-content-label"><?php echo JText::_('COM_RSPAGEBUILDER_COLUMN_SETTINGS'); ?></h3>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span12">
						<div class="column-options"></div>
					</div>
				</div>
				<div class="loader"></div>
			</div>
			<div class="modal-footer clearfix">
				<a href="javascript:void(0)" class="btn btn-success pull-left" id="save-column-settings"><?php echo JText::_('COM_RSPAGEBUILDER_SAVE'); ?></a>
				<button class="btn btn-danger pull-left" id="cancel-column-settings" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('COM_RSPAGEBUILDER_CANCEL'); ?></button>
			</div>
		</div>
	</div>
</div>
<div class="modal hide fade" id="modal-elements-list" data-backdrop="static" 
   data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-elements-list-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="modal-elements-list-label"><?php echo JText::_('COM_RSPAGEBUILDER_ELEMENTS_LIST'); ?></h3>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span3">
						<div class="elements-categories">
							<ul>
								<?php foreach($this->categories as $key => $element_category) { ?>
									<li <?php echo ($key == 0) ? 'class="active"' : ''; ?> data-category="<?php echo str_replace(' ', '_', strtolower($element_category)); ?>"><a href="javascript:void(0)"><?php echo ucwords(str_replace('_', ' ', $element_category)); ?></a></li>
								<?php } ?>
							</ul>
						</div>
						<input class="elements-filter" name="elements_filter" type="text" placeholder="<?php echo JText::_('COM_RSPAGEBUILDER_SEARCH_ELEMENT'); ?>">
					</div>
					<div class="span9">
						<div class="elements-list-wrapper"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal hide fade" id="modal-element-settings" data-backdrop="static" 
   data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-element-settings-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="close-element-settings" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="modal-element-label"></h3>
			</div>
			<div class="modal-body">
				<div class="row-fluid">
					<div class="span6">
					</div>
					<div class="span6">
						<div class="element-preview">
						</div>
					</div>
				</div>
				<div class="loader"></div>
			</div>
			<div class="modal-footer clearfix">
				<a href="javascript:void(0)" class="btn btn-success pull-left" id="save-element-settings"><?php echo JText::_('COM_RSPAGEBUILDER_SAVE'); ?></a>
				<button class="btn btn-danger pull-left" id="cancel-element-settings" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('COM_RSPAGEBUILDER_CANCEL'); ?></button>
			</div>
		</div>
	</div>
</div>
<div class="modal hide fade" id="modal-element-view-html" data-backdrop="static" 
   data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-preview-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title" id="modal-preview-label"></h3>
			</div>
			<div class="modal-body"><textarea onclick="this.focus();this.select()" readonly="readonly"></textarea></div>
			<div class="modal-footer clearfix">
				<button class="btn btn-danger pull-left" data-dismiss="modal" aria-hidden="true"><?php echo JText::_('COM_RSPAGEBUILDER_CLOSE'); ?></button>
			</div>
		</div>
	</div>
</div>
<div class="modal hide fade" id="modal-upload-image" data-backdrop="static" 
   data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="modal-preview-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" aria-hidden="true">&times;</button>
				<h3><?php echo JText::_('JLIB_FORM_CHANGE_IMAGE'); ?></h3>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button class="btn btn-danger media-close"><?php echo JText::_('COM_RSPAGEBUILDER_CLOSE'); ?></button>
			</div>
		</div>
	</div>
</div>
<div class="elements-wrapper hidden">
	<ul class="elements">
	<?php
	foreach ($this->elements as $element) {
		if (!empty($element['options']['title'])) {
			$title = RSPageBuilderHelper::escapeHtml($element['options']['title']);
		} else {
			$title = RSPageBuilderHelper::elementTypeToTitle($element['type']);
		}
	?>
	<li class="<?php echo $element['category']; ?> text-center">
		<a id="<?php echo $element['type']; ?>" href="javascript:void(0)">
			<img class="image-left <?php echo $element['type'];?>" src="<?php echo RSPageBuilderHelper::getElementIcon($element['type']); ?>" alt="<?php echo $title; ?>"/>
			<h3 class="element-title"><?php echo $title; ?></h3>
		</a>
		<div class="element-container">
			<div class="element">
				<img class="element-image <?php echo $element['type'];?> pull-left" src="<?php echo RSPageBuilderHelper::getElementIcon($element['type']); ?>" alt="<?php echo $title; ?>"/>
				<h3 class="element-title"><?php echo $title; ?></h3>
				<h4 class="element-type" data-type="<?php echo $element['type'];?>"><?php echo $title; ?></h4>
				<div class="element-actions">
					<a class="edit-element hasTooltip" href="javascript:void(0)" data-rel="tooltip" data-title="<?php echo JText::_('COM_RSPAGEBUILDER_EDIT_ELEMENT'); ?>"><i class="fa fa-pencil"></i></a>
					<a class="view-element-html hasTooltip" href="javascript:void(0)" data-rel="tooltip" data-title="<?php echo JText::_('COM_RSPAGEBUILDER_VIEW_ELEMENT_HTML'); ?>"><i class="fa fa-file-code-o"></i></a>
					<a class="duplicate-element hasTooltip" href="javascript:void(0)" data-rel="tooltip" data-title="<?php echo JText::_('COM_RSPAGEBUILDER_DUPLICATE_ELEMENT'); ?>"><i class="fa fa-files-o"></i></a>
					<a class="remove-element hasTooltip" href="javascript:void(0)" data-rel="tooltip" data-title="<?php echo JText::_('COM_RSPAGEBUILDER_REMOVE_ELEMENT'); ?>"><i class="fa fa-times"></i></a>
				</div>
				<div class="element-options hidden">
				</div>
				<input class="element-json" type="hidden" value="<?php echo $this->escape(json_encode($element)); ?>">
			</div>
		</div>
	</li>
	<?php
	}
	foreach ($this->my_elements as $element) {
		if (!empty($element['options']['title'])) {
			$title = RSPageBuilderHelper::escapeHtml($element['options']['title']);
		} else if (!empty($element['options']['text'])) {
			$title = RSPageBuilderHelper::escapeHtml($element['options']['text']);
		} else {
			$title = RSPageBuilderHelper::elementTypeToTitle($element['type']);
		}
		$subtitle = RSPageBuilderHelper::elementTypeToTitle($element['type']);
	?>
	<li class="<?php echo $element['category']; ?> text-center hidden">
		<a id="<?php echo $element['type']; ?>" href="javascript:void(0)">
			<img class="image-left <?php echo $element['type'];?>" src="<?php echo RSPageBuilderHelper::getElementIcon($element['type']); ?>" alt="<?php echo $title; ?>"/>
			<h3 class="element-title"><?php echo $title; ?></h3>
			<?php if ($title != $subtitle) { ?>
				<h4 class="element-subtitle">(<?php echo $subtitle; ?>)</h4>
			<?php } ?>
		</a>
		<div class="element-container">
			<div class="element">
				<img class="element-image <?php echo $element['type'];?> pull-left" src="<?php echo RSPageBuilderHelper::getElementIcon($element['type']); ?>" alt="<?php echo $title; ?>"/>
				<h3 class="element-title"><?php echo $title; ?></h3>
				<h4 class="element-type" data-type="<?php echo $element['type'];?>"><?php echo $subtitle; ?></h4>
				<div class="element-actions">
					<a class="edit-element hasTooltip" href="javascript:void(0)" data-rel="tooltip" data-title="<?php echo JText::_('COM_RSPAGEBUILDER_EDIT_ELEMENT'); ?>"><i class="fa fa-pencil"></i></a>
					<a class="view-element-html hasTooltip" href="javascript:void(0)" data-rel="tooltip" data-title="<?php echo JText::_('COM_RSPAGEBUILDER_VIEW_ELEMENT_HTML'); ?>"><i class="fa fa-file-code-o"></i></a>
					<a class="duplicate-element hasTooltip" href="javascript:void(0)" data-rel="tooltip" data-title="<?php echo JText::_('COM_RSPAGEBUILDER_DUPLICATE_ELEMENT'); ?>"><i class="fa fa-files-o"></i></a>
					<a class="remove-element hasTooltip" href="javascript:void(0)" data-rel="tooltip" data-title="<?php echo JText::_('COM_RSPAGEBUILDER_REMOVE_ELEMENT'); ?>"><i class="fa fa-times"></i></a>
				</div>
				<div class="element-options hidden">
				</div>
				<input class="element-json" type="hidden" value="<?php echo $this->escape(json_encode($element)); ?>">
			</div>
		</div>
	</li>
	<?php } ?>
	</ul>
</div>