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
$items				= $displayData['items'];
$class				= 'rspbld-progress-bars';
$title_show			= (!isset($element_options['title_show']) || (isset($element_options['title_show']) && ($element_options['title_show'] == '1'))) ? '1' : '0';
$animation_duration	= '';
$animation_delay	= '';

// Progress Bars title
if (!empty($element_options['title']) && !empty($title_show)) {
	
	// Progress Bars title style
	$title_style	= array();
	
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

// Progress Bars class
if (!empty($element_options['class'])) {
	$class .= ' '.$element_options['class'];
}

// Progress Bars animate
if (!empty($element_options['animate'])) {
	$class .= ' animate';
	
	// Progress Bars animation duration
	$animation_duration = ' data-duration="' . $element_options['animation_duration'] . '"';
	
	// Progress Bars animation delay
	$animation_delay = ' data-delay="' . $element_options['animation_delay'] . '"';
	
	// Load Progress Bars script
	$doc->addScript(JUri::root(true) . '/media/com_rspagebuilder/js/jquery.visible.min.js');
}

// Build Progress Bars content HTML
?>

<div class="<?php echo $class; ?>"<?php echo $animation_duration.$animation_delay; ?>>
	<?php if (!empty($element_options['title']) && !empty($title_show)) { ?>
	<<?php echo $element_options['title_heading']; ?> class="rspbld-title"<?php echo RSPageBuilderHelper::buildStyle($title_style); ?>>
		<?php echo $element_options['title']; ?>
	</<?php echo $element_options['title_heading']; ?>>
	<?php } ?>
	
	<?php
	if (count($items)) {
		foreach ($items as $item_index => $item) {
			$item_options			= RSPageBuilderHelper::escapeHtmlArray($item['options']);
			$item_title_show		= (!isset($item_options['item_title_show']) || (isset($item_options['item_title_show']) && ($item_options['item_title_show'] == '1'))) ? '1' : '0';
			$item_title_style		= array();
			$item_title_icon_style	= array();
			$item_bar_style			= array();
			$item_style				= array();
			
			// Progress Bars item title
			if (!empty($item_options['item_title']) && !empty($item_title_show)) {
				
				// Progress Bars item title style
				if (!empty($item_options['item_title_font_size'])) {
					$item_title_style['font-size'] = $item_options['item_title_font_size'];
				}
				if (!empty($item_options['item_title_font_weight'])) {
					$item_title_style['font-weight'] = $item_options['item_title_font_weight'];
				}
				if (!empty($item_options['item_title_text_color'])) {
					$item_title_style['color'] = $item_options['item_title_text_color'];
				}
				if (!empty($item_options['item_title_margin'])) {
					$item_title_style['margin'] = $item_options['item_title_margin'];
				}
				if (!empty($item_options['item_title_padding'])) {
					$item_title_style['padding'] = $item_options['item_title_padding'];
				}
			}
			
			// Progress Bars item title icon style
			if (!empty($item_options['item_title_icon'])) {
				if (!empty($item_options['item_title_icon_font_size'])) {
					$item_title_icon_style['font-size'] = $item_options['item_title_icon_font_size'];
				}
				if (!empty($item_options['item_title_icon_color'])) {
					$item_title_icon_style['color'] = $item_options['item_title_icon_color'];
				}
			}
			
			// Progress Bars item bar style
			if (!empty($item_options['item_width'])) {
				$item_bar_style['width'] = $item_options['item_width'];
				
				if (!empty($item_options['item_background_color'])) {
					$item_bar_style['background-color'] = $item_options['item_background_color'];
				}
			}
			
			// Progress Bars item style
			if (!empty($item_options['item_height'])) {
				$item_style['height'] = $item_options['item_height'];
				$item_title_style['line-height'] = $item_options['item_height'];
			}
			if (!empty($item_options['item_margin'])) {
				$item_style['margin'] = $item_options['item_margin'];
			}
			if (!empty($item_options['item_padding'])) {
				$item_style['padding'] = $item_options['item_padding'];
			}
			
			// Build Progress Bars item HTML
			if (!empty($item_options['item_width'])) {
	?>
				<div class="progress"<?php echo RSPageBuilderHelper::buildStyle($item_style); ?>>
					<div class="progress-bar"<?php echo RSPageBuilderHelper::buildStyle($item_bar_style); ?>>
						<?php if ((!empty($item_options['item_title']) && !empty($item_title_show)) || !empty($item_options['item_title_icon'])) { ?>
						<div class="rspbld-item-title"<?php echo (!empty($item_options['item_title']) && !empty($item_title_show)) ? RSPageBuilderHelper::buildStyle($item_title_style) : ''; ?>>
							<?php if (!empty($item_options['item_title_icon'])) { ?>
							<i class="fa fa-<?php echo $item_options['item_title_icon']; ?>"<?php echo RSPageBuilderHelper::buildStyle($item_title_icon_style); ?>></i>
							<?php } ?>
							
							<?php if (!empty($item_options['item_title']) && !empty($item_title_show)) {
								echo $item_options['item_title'];
							} ?>
						</div>
						<?php } ?>
					</div>
				</div>
	<?php
			}
		}
	}
	?>
</div>