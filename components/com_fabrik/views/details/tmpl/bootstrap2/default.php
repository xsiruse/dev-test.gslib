<?php
/**
 * Bootstrap Details Template
 *
 * @package     Joomla
 * @subpackage  Fabrik
 * @copyright   Copyright (C) 2005-2016  Media A-Team, Inc. - All rights reserved.
 * @license     GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @since       3.1
 */

// No direct access

defined('_JEXEC') or die('Restricted access');
$form = $this->form;
$model = $this->getModel();
$user = JFactory::getUser();

if ($this->params->get('show_page_heading', 1)): ?>
	<div class="componentheading<?php
	echo $this->params->get('pageclass_sfx') ?>">
		<?php
	echo $this->escape($this->params->get('page_heading')); ?>
	</div>
<?php
endif;

if ($this->params->get('show-title', 1)): ?>
<div class="page-header">
	
</div>
<?php
endif;
echo $form->intro;

if ($this->isMambot):
	echo '<div class="fabrikForm fabrikDetails fabrikIsMambot" id="' . $form->formid . '">';
else:
	echo '<div class="fabrikForm fabrikDetails" id="' . $form->formid . '">';
endif;
echo $this->plugintop;
echo $this->loadTemplate('buttons');
echo $this->loadTemplate('relateddata');
$reccond = $this->groups['GSL_RecordConditions'];
$g_pic = $reccond->elements['GuitarPicture']->element_raw;
$g_mod = $reccond->elements['Model']->element_raw;
$g_brand = $reccond->elements['GuitarBrand']->element_raw;
$g_ph1 = $reccond->elements['Pickup_highlight1'];
$g_ph2 = $reccond->elements['Pickup_highlight2'];
$g_ph3 = $reccond->elements['Pickup_highlight3'];
$g_ph4 = $reccond->elements['Pickup_highlight4'];
$g_ph5 = $reccond->elements['Pickup_highlight5'];

$g_instr = $reccond->elements['instrument']->element;
// $g_inst_t = $reccond->elements['InstrumentType']->value;
// $g_string = reccond->elements['numberofstrings']->value;

$g_tgl = $reccond->elements['Pickup_switch_tgl'];

// $g_mod = $reccond->elements['Model']->value;
// $g_brand = $reccond->elements['GuitarBrand']->value;
// echo "<pre>"; print_r ($element);

?>
<div id="tile" class="container-fluid">
	<div id="tile-whole" class="container-fluid col-xl-8">
		<div id="tile-header" class="d-flex justify-content-between pt-2">
			<div class="col">
			<?php
	
	if ($user->guest) {
		echo "<p></p>";
	} else {
			echo '<a class="addbutton addRecord" href="/gallery/form/28/">';
			echo FabrikHelperHTML::icon('icon-plus'); 
			echo "Add</a>";
	} ?>
			</div>
			<div class="col-1 text-right"><i class="fa fa-fw fa-close" aria-hidden="true"></i></div>
		</div>
		<div id="tile-model" class=" col-md-6 offset-md-3">
			<div id="tile-model-brend" class=""> <?php
echo $g_mod; ?></div>
			<div id="tile-model-name" class=""> <?php
echo $g_brand; ?></div>
		</div>
		<div id="tile-body" class="row">
			<div id="tile-body-center" class="col-sm-12 col-md-8 order-md-6">
				<div class="Pickup-highlight-section">
					<div class="<?php
echo $g_ph1->containerClass; ?>" id="<?php
echo $g_ph1->id; ?>">
	  <?php

foreach($g_ph1->value as $g_ph)
	{
	echo $g_ph;
	}; ?>
					</div>
					<div class="<?php
echo $g_ph2->containerClass; ?>" id="<?php
echo $g_ph2->id; ?>">
	  <?php

foreach($g_ph2->value as $g_ph)
	{
	echo $g_ph;
	}; ?>
					</div>
					<div class="<?php
echo $g_ph3->containerClass; ?>" id="<?php
echo $g_ph3->id; ?>">
	  <?php

foreach($g_ph3->value as $g_ph)
	{
	echo $g_ph;
	}; ?>
					</div>
					<div class="<?php
echo $g_ph4->containerClass; ?>" id="<?php
echo $g_ph4->id; ?>">
	  <?php

foreach($g_ph4->value as $g_ph)
	{
	echo $g_ph;
	}; ?>
					</div>
					<div class="<?php
echo $g_ph5->containerClass; ?>" id="<?php
echo $g_ph5->id; ?>">
	  <?php

foreach($g_ph5->value as $g_ph)
	{
	echo $g_ph;
	}; ?>
					</div>
				</div>
				<div>
      <?php
echo $g_pic; ?></div>
			</div>
			<div id="tile-body-left" class="col-sm-6 col-md-2 order-md-1 align-self-center params d-none d-md-block">
			  <div><?php
echo $g_instr; ?></div>
			  <div>Electric</div>
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
		<div class="<?php
echo $g_tgl->className; ?>" id="<?php
echo $g_tgl->id; ?>"><?php
echo $g_tgl->value; ?>
		</div>
    </div>
    <div id="tile-footer-player" class="">
      <div class="fabrikSubElementContainer">

        <audio src="https://dev-test.gslib.ru/sound/30/______________36___.mp3" controls="" controlslist="nodownload">
	<!--[if !ie]> -->
	<object data="https://dev-test.gslib.ru/sound/30/______________36___.mp3" type="audio/x-mpeg">
		<param name="autoplay" value="false">
		<param name="width" value="100">
		<param name="height" value="40">
		<param name="controller" value="false">
		<param name="autostart" value="0">
		Oops!
	</object>
	<!--<![endif]-->
	<!--[if ie]>
	<embed
		src="https://dev-test.gslib.ru/sound/30/______________36___.mp3"
		autostart="false"
		playcount="true"
		loop="false"
		height="50"
		width="100"
		type="audio/mpeg"
		/>
	<![endif]-->
</audio>
      </div>
    </div>
    <div id="variations" class="p-2"></div>
  </div>
</div>
</div>


<?php

//echo "<pre>"; print_r ($reccond);

echo $this->pluginbottom;
echo $this->loadTemplate('actions');
echo '</div>';
echo $form->outro;
echo $this->pluginend;
?>