<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');
?>

<form action="<?php echo JRoute::_('index.php?option=com_rspagebuilder&layout=edit&id='.(int)$this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
    <?php echo JLayoutHelper::render('joomla.edit.title_alias', $this); ?>
    <div class="form-horizontal">
		<?php
		$fieldsets = $this->form->getFieldsets();
		
		reset($fieldsets);
		$first_tab = key($fieldsets);
		
		foreach ($fieldsets as $key => $attr) {
			if ($key === $first_tab) {
				echo JHtml::_('bootstrap.startTabSet', 'page', array('active' => $attr->name));
			}
			echo JHtml::_('bootstrap.addTab', 'page', $attr->name, JText::_($attr->label, true));
		?>
		<div class="rspbld row-fluid">
			<div class="span12">
				<?php
				$fields	= $this->form->getFieldset($attr->name);
				
				foreach ($fields as $field) {
				?>
				<div class="control-group">
					<div class="control-label"><?php echo $field->label; ?></div>
					<div class="controls"><?php echo $field->input; ?></div>
				</div>
				<?php
				}
				if ($key === $first_tab) {
					echo $this->loadTemplate('rows');
					echo $this->loadTemplate('settings');
				}
				?>
			</div>
		</div>
		<?php
			echo JHtml::_('bootstrap.endTab');
		}
        ?>
    </div>
    <input type="hidden" name="task" value="page.edit" />
    <?php echo JHtml::_('form.token'); ?>
</form>