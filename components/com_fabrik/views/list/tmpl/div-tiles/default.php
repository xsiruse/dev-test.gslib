<?php
/**
 * Fabrik List Template: Div
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2016  Media A-Team, Inc. - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

// The number of columns to split the list rows into
$columns = 3;

// Show the labels next to the data:
$this->showLabels = false;

// Show empty data
$this->showEmpty = true;


$pageClass = $this->params->get('pageclass_sfx', '');

if ($pageClass !== '') :
	echo '<div class="' . $pageClass . '">';
endif;

?>
<div id="tile_loader">
<div id="tile_def" class="container-fluid">
  <div id="tile-whole" class="container-fluid col-xl-8">
    <div id="tile-header" class="d-flex justify-content-between pt-2">
      <div class="col">
        <p></p>
      </div>
      <div class="col-1 text-right"><i class="fa fa-fw fa-close" aria-hidden="true"></i></div>
    </div>
    <div id="tile-model" class=" col-md-6 offset-md-3">
      <div id="tile-model-brend" class=""></div>
      <div id="tile-model-name" class=""></div>
    </div>
    <div id="tile-body" class="row">
      <div id="tile-body-center" class="col-sm-12 col-md-8 order-md-6">
        <div class="Pickup-highlight-section">
        </div>
        <div>
          <div id="GSLPic" style="background-image: 
url(/images/libraryv10/noguit.png);
width: 100%;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    padding: 22% 0;">
          </div>
        </div>
      </div>
      <div id="tile-body-left" class="col-sm-6 col-md-2 order-md-1 align-self-center params d-none d-md-block">
        <div>Instrument</div>
        <div>Instrument Type</div>
        <div>6 Strings</div>
        <div>Neck-through</div>
        <div>24 frets</div>
        <div>Mensura 765</div>
      </div>
      <div id="tile-body-right" class="col-sm-6 col-md-2 order-md-12 align-self-center params d-none d-md-block">
        <div>E-H-G-D-A-E</div>
        <div>10-46</div>
        <div>Cubase</div>
        <div>0.71 mm</div>
        <div>24</div>
        <div>6</div>
      </div>
    </div>
    <div id="tile-footer" class="d-flex justify-content-between">
      <div id="tile-footer-userID" class="p-2">User</div>
      <div id="tile-footer-badges" class="p-2">V V V</div>
      <div id="tile-footer-switch" class="p-2">
        <div class="fb_el_gsl_recordconditions___Pickup_switch_tgl_ro" id="gsl_recordconditions___Pickup_switch_tgl_ro"><input type="range" id="range-filter" class="slider slider1" name="points" min="1" max="5" value="1"> </div>
      </div>
      <div id="tile-footer-player" class="">
        <div class="fabrikSubElementContainer">

          <audio src="#" controls="" controlslist="nodownload">
	
</audio>
        </div>
      </div>
      <div id="variations" class="p-2"></div>
    </div>
  </div>
</div>
</div>
<?php if ($this->tablePicker != '') { ?>
	<div style="text-align:right"><?php echo FText::_('COM_FABRIK_LIST') ?>: <?php echo $this->tablePicker; ?></div>
<?php }

if ($this->params->get('show_page_heading')) :
	echo '<h1>' . $this->params->get('page_heading') . '</h1>';
endif;

if ($this->showTitle == 1) { ?>
	<h1><?php echo $this->table->label;?></h1>
<?php }?>

<?php echo $this->table->intro;?>
<form class="fabrikForm" action="<?php echo $this->table->action;?>" method="post" id="<?php echo $this->formid;?>" name="fabrikList">

<?php
if ($this->hasButtons):
	echo $this->loadTemplate('buttons');
endif;

if ($this->showFilters) {
	echo $this->layoutFilters();
}
?>

<div class="fabrikDataContainer" data-cols="<?php echo $columns;?>">

<?php foreach ($this->pluginBeforeList as $c) {
	echo $c;
}?>
<div class="fabrikList" id="list_<?php echo $this->table->renderid;?>" >

	<?php
	$gCounter = 0;
	foreach ($this->rows as $groupedBy => $group) :?>
	<?php
	if ($this->isGrouped) :
		$imgProps = array('alt' => FText::_('COM_FABRIK_TOGGLE'), 'data-role' => 'toggle', 'data-expand-icon' => 'fa fa-arrow-down', 'data-collapse-icon' => 'fa fa-arrow-right');
	?>
	<div class="fabrik_groupheading">
		<?php echo $this->layoutGroupHeading($groupedBy, $group); ?>
	</div>
	<?php
	endif;
	?>
	<div class="fabrik_groupdata">
		<div class="groupDataMsg">
			<div class="emptyDataMessage" style="<?php echo $this->emptyStyle?>">
				<?php echo $this->emptyDataMessage; ?>
			</div>
		</div>

	<?php

	$items = array();
	foreach ($group as $this->_row) :
		$items[] = $this->loadTemplate('row');
	endforeach;
	$class = 'fabrik_row well row-striped';
	echo FabrikHelperHTML::bootstrapGrid($items, $columns, $class, true, $this->_row->id);

	?>
	</div>
	<?php
	endforeach;
?>

</div>
<?php
echo $this->nav;
print_r($this->hiddenFields);?>
</div>

</form>
<?php
echo $this->table->outro;

if ($pageClass !== '') :
	echo '</div>';
endif;
?>
