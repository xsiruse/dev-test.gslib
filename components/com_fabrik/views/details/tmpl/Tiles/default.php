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

$fdb = FabrikWorker::getDbo(false, 2);
$jdb = JFactory::getDbo();
$g_query = $fdb->getQuery(true);

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
$RCel = $reccond->elements;
$g_pic = $RCel['GuitarPicture']->element_raw;
$g_mod = $RCel['Model']->element_raw;
$g_brand = $RCel['GuitarBrand']->element_raw;
$g_ph1 = $RCel['Pickup_highlight1'];
$g_ph2 = $RCel['Pickup_highlight2'];
$g_ph3 = $RCel['Pickup_highlight3'];
$g_ph4 = $RCel['Pickup_highlight4'];
$g_ph5 = $RCel['Pickup_highlight5'];
$g_snd1 = $RCel['Sound1'];
$g_snd2 = $RCel['Sound2'];
$g_snd3 = $RCel['Sound3'];
$g_snd4 = $RCel['Sound4'];
$g_snd5 = $RCel['Sound5'];
$g_tgl = $RCel['Pickup_switch_tgl'];

//here comes elements of databasejoin or elese with only raw values
$r_PID = $RCel['ParentID']->value;

$r_instr = $RCel['instrument']->value;
$r_inst_t = $RCel['InstrumentType']->value;
$r_string = $RCel['numberofstrings']->value;
$r_cr_by = $RCel['Created_By']->value;


//retraiving data from dbjoin
$q_instr = "SELECT name as instrname 
	FROM sp_instrument 
	WHERE id='$r_instr' ";
$instr = $fdb->setQuery($q_instr)->loadObjectList();
	
$q_inst_t = "SELECT name as instrtypename
	FROM sp_instrumenttype 
	WHERE id='$r_inst_t' ";
$inst_t = $fdb->setQuery($q_inst_t)->loadObjectList();

$q_string = "SELECT name as nomstr 
	FROM sp_numberofstrings 
	WHERE id='$r_string' ";
$string = $fdb->setQuery($q_string)->loadObjectList();

$a_joint = "SELECT NeckJoint as b_joint 
	FROM gsl_product 
	WHERE id='$r_PID' ";
$c_joint = $fdb->setQuery($a_joint)->loadObjectList();	
$d_joint = $c_joint[0]->b_joint;

	
$q_joint = "SELECT name as e_joint 
	FROM sp_neckjoint 
	WHERE id='$d_joint' ";
$f_joint = $fdb->setQuery($q_joint)->loadObjectList();

$a_fret = "SELECT NumberOfFrets as b_fret 
	FROM gsl_product 
	WHERE id='$r_PID' ";
$c_fret = $fdb->setQuery($a_fret)->loadObjectList();	
$d_fret = $c_fret[0]->b_fret;
	
$q_fret = "SELECT name as e_fret 
	FROM sp_numberoffrets 
	WHERE id='$d_fret' ";
$f_fret = $fdb->setQuery($q_fret)->loadObjectList();

$a_mensura = "SELECT Mensura as b_mensura 
	FROM gsl_product 
	WHERE id='$r_PID' ";
$c_mensura = $fdb->setQuery($a_mensura)->loadObjectList();	
$d_mensura = $c_mensura[0]->b_mensura;
	
$q_mensura = "SELECT name as e_mensura 
	FROM sp_mensura 
	WHERE id='$d_mensura' ";
$f_mensura = $fdb->setQuery($q_mensura)->loadObjectList();



//after retraiving data from dictionarys let's print data for owr raw vars upon
$g_instr = $instr[0]->instrname;
$g_inst_t= $inst_t[0]->instrtypename;
$g_string= $string[0]->nomstr;
$g_joint = $f_joint[0]->e_joint;
$g_fret = $f_fret[0]->e_fret;
$g_mensura = $f_mensura[0]->e_mensura;

//echo "<pre>"; print_r ($qjoint);
//exit;

?>
<div id="tile" class="container-fluid">
	<div id="tile-whole" class="container-fluid col-xl-8">
		<div id="tile-header" class="d-flex justify-content-between pt-2">
			<div class="col">
			<?php
	
	if ($user->guest) {
		echo "<p></p>";
	} else {
			echo '<a data-loadmethod="xhr" data-isajax="1" class="addbutton addRecord" href="/gallery/form/28/">';
			echo FabrikHelperHTML::icon('icon-plus'); 
			echo "Add</a>";
	} ?>
			</div>
			<div class="col-1 text-right"><i class="fa fa-fw fa-close" aria-hidden="true"></i></div>
		</div>
		<div id="tile-model" class=" col-md-6 offset-md-3">
			<div id="tile-model-brend" class=""> <?php
echo $g_brand; ?></div>
			<div id="tile-model-name" class=""> <?php
echo $g_mod; ?></div>
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
			  <div><?php
echo $g_inst_t; ?></div>
			  <div><?php
echo $g_string .' Strings'; ?></div>
			  <div><?php
echo $g_joint; ?></div>
			  <div><?php
echo $g_fret .'  Frets'; ?></div>
			  <div><?php
echo $g_mensura; ?></div>
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
    <div id="tile-footer-player" class="" style="min-height:65px;min-width: 100PX;">
		<div class="<?php
echo $g_snd1->containerClass; ?>" id="<?php
echo $g_snd1->id; ?>">
	  <?php	echo $g_snd1->element; ?>
		</div>
		<div class="<?php
echo $g_snd2->containerClass; ?>" id="<?php
echo $g_snd2->id; ?>">
	  <?php	echo $g_snd2->element; ?>
		</div>
		<div class="<?php
echo $g_snd3->containerClass; ?>" id="<?php
echo $g_snd3->id; ?>">
	  <?php	echo $g_snd3->element; ?>
		</div>
		<div class="<?php
echo $g_snd4->containerClass; ?>" id="<?php
echo $g_snd4->id; ?>">
	  <?php	echo $g_snd4->element; ?>
		</div>
		<div class="<?php
echo $g_snd5->containerClass; ?>" id="<?php
echo $g_snd5->id; ?>">
	  <?php	echo $g_snd5->element; ?>
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