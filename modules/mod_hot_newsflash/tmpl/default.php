<?php
/*------------------------------------------------------------------------
# "Hot Newsflash" Joomla module
# Copyright (C) 2010 HotThemes. All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Author: HotJoomlaTemplates.com
# Website: http://www.hotjoomlatemplates.com
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access'); // no direct access

// get the document object
$doc = JFactory::getDocument();

// load jQuery
JHtml::_('jquery.framework');

// load scripts
$doc->addScript($mosConfig_live_site.'/modules/mod_hot_newsflash/js/jquery-ui.min.js');

$tabHeight = $imageHeight / $tabNumber;
$infoWidth = $moduleWidth - $tabWidth - $imageWidth - 10;
$imageWidth2 = $imageWidth + 8;
$imageHeight2 = $imageHeight - 5;

$tablineheight = "";
if (!$tabMultiline) { $tablineheight = "normal"; }else { $tablineheight = floor($tabHeight)."px"; }

// add your stylesheet
$doc->addStyleSheet( 'modules/mod_hot_newsflash/tmpl/style.css' );

// style declaration
$doc->addStyleDeclaration( '

#featured ul.ui-tabs-nav li, #featured li.ui-tabs-nav-item a { 
	background:'.$tabBgColor.';
	color:'.$tabFontColor.';
	font-weight:bold;
}

#featured li.ui-tabs-nav-item a:hover { 
	background:'.$tabBgColorHover.'; 
	color:'.$tabFontColorHover.';
}

#featured ul.ui-tabs-nav li.ui-tabs-selected a { 
	background:'.$tabBgColorActive.';
	color:'.$tabFontColorActive.';
}

#featured { 
	width:'.$moduleWidth.'px;
	position:relative; 
	border:'.$borderWidth.'px solid '.$borderColor.'; 
	height:'.$imageHeight.'px;
	background: '.$moduleBackground.';
}

#featured ul.ui-tabs-nav{ 
	width:'.$tabWidth.'px;
}

#featured li.ui-tabs-nav-item a { 
	height:'.floor($tabHeight - 1).'px;
	line-height:'.$tablineheight.';
	border-bottom:1px solid '.$tabDelimiterColor.';
}

#featured .ui-tabs-panel .infotext{ 
	position:absolute; 
	top:0;
	left:'.$imageWidth2.'px;
}

#featured .infotext {
	width:'.$infoWidth.'px;
	height:'.$imageHeight2.'px;
	overflow:hidden;
}

#featured .infotext,#featured .infotext p,#featured .infotext div,#featured .infotext tr {
	color:'.$mainTextColor.';
}

#featured div.infotext h2 a {
	color:'.$headingTextColor.';
}
' );
?>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", <?php echo $speed; ?>, true);
	});
</script>

<div id="featured">
    <!-- Tabs -->
    <ul class="ui-tabs-nav">
    	<?php for ($loop = 1; $loop <= $tabNumber; $loop += 1) { ?>
        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php echo $loop; ?>"><a href="#fragment-<?php echo $loop; ?>"><?php echo $heading[$loop]; ?></a></li>
        <?php } ?>
    </ul>

    <!-- Content -->
    <?php for ($loop = 1; $loop <= $tabNumber; $loop += 1) { ?>
    <div id="fragment-<?php echo $loop; ?>" class="ui-tabs-panel<?php if ($loop!=1) { ?> ui-tabs-hide<?php } ?>">
    	<?php if($imageLink) { ?><a href="<?php echo $link[$loop]; ?>"><?php } ?><img src="<?php echo $mosConfig_live_site; ?>/<?php echo $image[$loop]; ?>" alt="" width="<?php echo $imageWidth; ?>" height="<?php echo $imageHeight; ?>" /><?php if($imageLink) { ?></a><?php } ?>
        <div class="infotext">
        	<h2><a href="<?php echo $link[$loop]; ?>"><?php echo $heading[$loop]; ?></a></h2>
        	<?php echo $info[$loop]; ?>
        	<?php if ($readMore) { ?><p><a href="<?php echo $link[$loop]; ?>" class="readon"><?php echo $readMoreText; ?></a></p><?php } ?>
        </div>
    </div>
    <?php } ?>
</div>