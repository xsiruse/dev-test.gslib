<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

$doc				= JFactory::getDocument();
$element_options	= RSPageBuilderHelper::escapeHtmlArray($displayData['options']);
$class				= 'rspbld-image';
$style				= array();
$image_prefix		= (JFactory::getApplication()->isSite()) ? '' : '../';

// Image
if (!empty($element_options['image'])) {
	
	// Image style
	$style = array();
	
	if (!empty($element_options['height'])) {
		$style['height'] = $element_options['height'];
	}
	if (!empty($element_options['width'])) {
		$style['width'] = $element_options['width'];
	}
	if (!empty($element_options['background_color'])) {
		$style['background-color'] = $element_options['background_color'];
	}
	if (!empty($element_options['border_style'])) {
		$style['border-style'] = $element_options['border_style'];
		
		if (!empty($element_options['border_width'])) {
			$style['border-width'] = $element_options['border_width'];
		}
		if (!empty($element_options['border_color'])) {
			$style['border-color'] = $element_options['border_color'];
		}
		if (!empty($element_options['border_radius'])) {
			$style['border-radius'] = $element_options['border_radius'];
		}
	}
	if (!empty($element_options['margin'])) {
		$style['margin'] = $element_options['margin'];
	}
	if (!empty($element_options['padding'])) {
		$style['padding'] = $element_options['padding'];
	}
	
	// Image alignment
	if (!empty($element_options['alignment'])) {
		$class .= ' '.$element_options['alignment'];
	}
	
	// Image class
	if (!empty($element_options['class'])) {
		$class .= ' '.$element_options['class'];
	}
	
	// Load Image gallery scripts
	if (!empty($element_options['tag'])) {
		$doc->addStyleSheet(JUri::root(true) . '/media/com_rspagebuilder/css/magnific-popup.css');
		$doc->addScript(JUri::root(true) . '/media/com_rspagebuilder/js/jquery.magnific-popup.min.js');
	}
	
	// Build Image HTML
?>

<div class="<?php echo $class; ?>"<?php echo RSPageBuilderHelper::buildStyle($style); ?>>
	<?php if (!empty($element_options['url']) && empty($element_options['tag'])) { ?>
	<a href="<?php echo $element_options['url']; ?>"
		<?php if (!empty($element_options['target'])) { ?>
		target="<?php echo $element_options['target']; ?>"
		<?php } ?>
	>
	<?php } else if (empty($element_options['url']) && (!empty($element_options['tag']) && JFactory::getApplication()->isSite())) { ?>
	<a class="rspbld-magnific-popup" href="<?php echo $element_options['image']; ?>" data-tag="<?php echo $element_options['tag']; ?>" title="<?php echo $element_options['caption']; ?>">
	<?php  } ?>
	
	<img src="<?php echo $image_prefix.$element_options['image'] ; ?>" alt="<?php echo $element_options['alt_text']; ?>">
	
	<?php if (!empty($element_options['url']) || (!empty($element_options['tag']) && JFactory::getApplication()->isSite())) { ?>
	</a>
	<?php } ?>
	
	<?php if (!empty($element_options['caption'])) { ?>
	<span class="rspbld-image-caption"><?php echo $element_options['caption']; ?></span>
	<?php } ?>
</div>
<?php } ?>