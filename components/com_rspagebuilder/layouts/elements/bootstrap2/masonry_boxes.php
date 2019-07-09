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
$class				= 'rspbld-masonry-boxes';
$size				= '';
$gutter				= '';
$title_show			= (!isset($element_options['title_show']) || (isset($element_options['title_show']) && ($element_options['title_show'] == '1'))) ? '1' : '0';
$style				= array();
$image_prefix		= (JFactory::getApplication()->isSite()) ? '' : '../';

// Masonry Boxes title
if (!empty($element_options['title']) && !empty($title_show)) {
	
	// Masonry Boxes title style
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

// Masonry Boxes style
if (!empty($element_options['margin'])) {
	$style['margin'] = $element_options['margin'];
}
if (!empty($element_options['padding'])) {
	$style['padding'] = $element_options['padding'];
}

// Masonry Boxes alignment
if (!empty($element_options['alignment'])) {
	$class .= ' '.$element_options['alignment'];
}

// Masonry Boxes class
if (!empty($element_options['class'])) {
	$class .= ' '.$element_options['class'];
}

// Masonry Boxes minimum size
if (!empty($element_options['min_size'])) {
	$size .= ' data-min-size="' . $element_options['min_size'] . '"';
}

// Masonry Boxes gutter
if (!empty($element_options['gutter'])) {
	$gutter .= ' data-gutter="' . $element_options['gutter'] . '"';
}

// Build Masonry Boxes HTML
?>
<div class="<?php echo $class; ?>"<?php echo RSPageBuilderHelper::buildStyle($style); ?>>
	<?php if (!empty($element_options['title']) && !empty($title_show)) { ?>
	<<?php echo $element_options['title_heading']; ?> class="rspbld-title"<?php echo RSPageBuilderHelper::buildStyle($title_style); ?>>
		<?php echo $element_options['title']; ?>
	</<?php echo $element_options['title_heading']; ?>>
	<?php } ?>
	<?php if (count($items)) { ?>
	<div class="boxes-container"<?php echo $size . $gutter; ?>>
		<?php
		foreach ($items as $item_index => $item) {
			$item_options		= RSPageBuilderHelper::escapeHtmlArray($item['options']);
			$item_class			= '';
			$item_button_class	= 'rspbld-button btn';
			$item_title_show	= (!isset($item_options['item_title_show']) || (isset($item_options['item_title_show']) && ($item_options['item_title_show'] == '1'))) ? '1' : '0';
			$item_style			= array();
			$item_image_style	= array();
			$item_title_style	= array();
			$item_content_style	= array();
			
			// Masonry Boxes item style
			if (!empty($item_options['item_background_color'])) {
				$item_style['background-color'] = $item_options['item_background_color'];
			}
			if (!empty($item_options['item_margin'])) {
				$item_style['margin'] = $item_options['item_margin'];
			}
			if (!empty($item_options['item_padding'])) {
				$item_style['padding'] = $item_options['item_padding'];
			}
			
			// Masonry Boxes item image
			if (!empty($item_options['item_image'])) {
				$item_image_alt_text 		= '';
				$item_options['item_image'] = ' src="' . $image_prefix . $item_options['item_image'] . '"';
				
				if (!empty($item_options['item_title'])) {
					$item_image_alt_text = ' alt="'.$item_options['item_title'].'"';
				}
				
				// Masonry Boxes item image style
				if (!empty($item_options['item_image_height'])) {
					$item_image_style['height'] = $item_options['item_image_height'];
				}
				if (!empty($item_options['item_image_width'])) {
					$item_image_style['width'] = $item_options['item_image_width'];
				}
				if (!empty($item_options['item_image_margin'])) {
					$item_image_style['margin'] = $item_options['item_image_margin'];
				}
				if (!empty($item_options['item_image_padding'])) {
					$item_image_style['padding'] = $item_options['item_image_padding'];
				}
			}
			
			// Masonry Boxes item title
			if (!empty($item_options['item_title']) && !empty($item_title_show)) {
				
				// Masonry Boxes item title style
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
			
			// Masonry Boxes item content style
			if (!empty($item_options['item_content'])) {
				if ($item_options['item_content_text_color']) {
					$item_content_style['color'] = $item_options['item_content_text_color'];
				}
				if (!empty($item_options['item_content_margin'])) {
					$item_content_style['margin'] = $item_options['item_content_margin'];
				}
				if (!empty($item_options['item_content_padding'])) {
					$item_content_style['padding'] = $item_options['item_content_padding'];
				}
			}
			
			// Masonry Boxes item button
			if ((!empty($item_options['button_text']) || !empty($item_options['button_icon'])) && !empty($item_options['button_url'])) {
				if (!empty($item_options['button_size'])) {
					$item_button_class .= ' btn-'.$item_options['button_size'];
				}
				if (!empty($item_options['button_type'])) {
					$item_button_class .= ' btn-'.$item_options['button_type'];
				}
				
				// Load button style
				RSPageBuilderHelper::loadAsset('element', 'button.css');
			}
			
			// Masonry Boxes item class
			if (!empty($item_options['item_column_size']) && !empty($item_options['item_row_size'])) {
				$item_class .= ' size';
				$item_class .= $item_options['item_column_size'];
				$item_class .= $item_options['item_row_size'];
			}
		?>
		<div class="box<?php echo $item_class; ?>" <?php echo RSPageBuilderHelper::buildStyle($item_style); ?>>
			<?php if (!empty($item_options['item_image'])) { ?>
			<div class="rspbld-image"<?php echo RSPageBuilderHelper::buildStyle($item_image_style); ?>>
				<?php if (!empty($item['options']['item_url'])) { ?>
				<a href="<?php echo $item['options']['item_url']; ?>" target="<?php echo $item['options']['item_url_target']; ?>">
				<?php } ?>
					<img<?php echo $item_options['item_image'].$item_image_alt_text; ?>>
				<?php if (!empty($item['options']['item_url'])) { ?>
				</a>
				<?php } ?>
			</div>
			<?php } ?>
			
			<?php if (!empty($item_options['item_title']) && !empty($item_title_show)) { ?>
			<<?php echo $item_options['item_title_heading']; ?> class="rspbld-item-title"<?php echo RSPageBuilderHelper::buildStyle($item_title_style); ?>>
				<?php echo $item_options['item_title']; ?>
			</<?php echo $item_options['item_title_heading']; ?>>
			<?php } ?>
			
			<?php if (!empty($item_options['item_content'])) { ?>
			<div class="rspbld-item-content"<?php echo RSPageBuilderHelper::buildStyle($item_content_style); ?>>
				<?php echo $item_options['item_content']; ?>
			</div>
			<?php } ?>
			
			<?php if ((!empty($item_options['button_text']) || !empty($item_options['button_icon'])) && !empty($item_options['button_url'])) { ?>
				<a href="<?php echo $item_options['button_url']; ?>" target="<?php echo $item_options['button_target']; ?>" class="<?php echo $item_button_class; ?>">
					<?php if (!empty($item_options['button_icon'])) { ?>
						<i class="fa fa-<?php echo $item_options['button_icon']; ?>"></i>
					<?php } ?>
					<?php
					if (!empty($item_options['button_text'])) {
						echo $item_options['button_text'];
					}
					?>
				</a>
			<?php } ?>
		</div>
		<?php
		
		// Load Masonry Boxes scripts
		$doc->addScript(JUri::root(true) . '/media/com_rspagebuilder/js/masonry.pkgd.min.js');
		}
		?>
	</div>
	<?php } ?>
</div>