<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

$element_options	= RSPageBuilderHelper::escapeHtmlArray($displayData['options']);
$class				= 'rspbld-alert';
$title_show			= (!isset($element_options['title_show']) || (isset($element_options['title_show']) && ($element_options['title_show'] == '1'))) ? '1' : '0';
$style 				= array();

// Alert title
if (!empty($element_options['title']) && !empty($title_show)) {
	
	// Alert title style
	$title_style = array();
	
	if (!empty($element_options['title_font_size'])) {
		$title_style['font-size'] = $element_options['title_font_size'];
	}
	if (!empty($element_options['title_font_weight'])) {
		$title_style['font-weight'] = $element_options['title_font_weight'];
	}
	if (!empty($element_options['title_text_color'])) {
		$title_style['color'] = $element_options['title_text_color'];
	}
	if (!empty($element_options['title_margin'])) {
		$title_style['margin'] = $element_options['title_margin'];
	}
	if (!empty($element_options['title_padding'])) {
		$title_style['padding'] = $element_options['title_padding'];
	}
}

// Alert content
if (!empty($element_options['content'])) {
	
	// Alert content style
	$content_style = array();
	
	if (!empty($element_options['content_background_color'])) {
		$content_style['background-color'] = $element_options['content_background_color'];
	}
	if (!empty($element_options['content_text_color'])) {
		$content_style['color'] = $element_options['content_text_color'];
	}
	if (!empty($element_options['content_border_width'])) {
		$content_style['border-width'] = $element_options['content_border_width'];
	}
	if (!empty($element_options['content_border_style'])) {
		$content_style['border-style'] = $element_options['content_border_style'];
	}
	if (!empty($element_options['content_border_color'])) {
		$content_style['border-color'] = $element_options['content_border_color'];
	}
	if (!empty($element_options['content_border_radius'])) {
		$content_style['border-radius'] = $element_options['content_border_radius'];
	}
	if (!empty($element_options['content_margin'])) {
		$content_style['margin'] = $element_options['content_margin'];
	}
	if (!empty($element_options['content_padding'])) {
		$content_style['padding'] = $element_options['content_padding'];
	}
}

// Alert style
if (!empty($element_options['margin'])) {
	$style['margin'] = $element_options['margin'];
}
if (!empty($element_options['padding'])) {
	$style['padding'] = $element_options['padding'];
}

// Alert class
if (!empty($element_options['class'])) {
	$class .= ' '.$element_options['class'];
}

// Build Alert HTML
if ((!empty($element_options['title']) && !empty($title_show)) || !empty($element_options['content'])) {
?>

<div class="<?php echo $class; ?>"<?php echo RSPageBuilderHelper::buildStyle($style); ?>>
	<?php if (!empty($element_options['title']) && !empty($title_show)) { ?>
	<<?php echo $element_options['title_heading']; ?> class="rspbld-title"<?php echo RSPageBuilderHelper::buildStyle($title_style); ?>>
		<?php echo $element_options['title']; ?>
	</<?php echo $element_options['title_heading']; ?>>
	<?php } ?>
	<?php if (!empty($element_options['content'])) { ?>
	<div class="alert alert-<?php echo $element_options['alert_type']; ?> fade in"<?php echo RSPageBuilderHelper::buildStyle($content_style); ?>>
	<?php if ($element_options['close']) { ?>
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
	<?php } ?>
	<?php echo $element_options['content']; ?>
	</div>
	<?php } ?>
</div>
<?php } ?>