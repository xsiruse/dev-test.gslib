<?php
/**
 * @package RSPageBuilder!
 * @copyright (C) 2016 www.rsjoomla.com
 * @license GPL, http://www.gnu.org/licenses/gpl-3.0.html
 */

// No direct access
defined ('_JEXEC') or die ('Restricted access');

$doc				= JFactory::getDocument();
$google_api_key		= JComponentHelper::getParams('com_rspagebuilder')->get('google_api_key');
$element_options	= RSPageBuilderHelper::escapeHtmlArray($displayData['options']);
$class				= 'rspbld-google-map';
$markers			= $displayData['items'];
$id					= RSPageBuilderHelper::randomNumber();
$title_show			= (!isset($element_options['title_show']) || (isset($element_options['title_show']) && ($element_options['title_show'] == '1'))) ? '1' : '0';
$style				= array();
$map_color			= '';
$map_brightness		= '';
$map_saturation		= '';
$map_style			= array();

// Google Map title
if (!empty($element_options['title']) && !empty($title_show)) {
	
	// Google Map title style
	$title_style	= array();
	$id				= RSPageBuilderHelper::createId($element_options['title'], $id);
	
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

// Google Map color
if (!empty($element_options['map_color'])) {
	$map_color = '\'' . $element_options['map_color'] . '\'';
	
	if (!empty($element_options['map_brightness'])) {
		$map_brightness = $element_options['map_brightness'];
	}
	
	if (!empty($element_options['map_saturation'])) {
		$map_saturation = $element_options['map_saturation'];
	}
}

// Google Map style
if (!empty($element_options['height'])) {
	$map_style['height'] = $element_options['height'];
}
if (!empty($element_options['width'])) {
	$map_style['width'] = $element_options['width'];
}

// Google Map container style
if (!empty($element_options['margin'])) {
	$style['margin'] = $element_options['margin'];
}
if (!empty($element_options['padding'])) {
	$style['padding'] = $element_options['padding'];
}

// Google Map class
if (!empty($element_options['class'])) {
	$class .= ' '.$element_options['class'];
}

if (!empty($google_api_key)) {
	
	// Load Google Map script
	$doc->addScript('https://maps.google.com/maps/api/js?key=' . $google_api_key, array(), array("async" => "async", "defer" => "defer"));
	
	// Build Google Map script
	$map_script = '	function initMap' . $id . '() {
							var map_container	= document.getElementById(\'' . $id . '\'),
								geodecoder_' . $id . ' = new google.maps.Geocoder(),
								map_' . $id . ' = new google.maps.Map(map_container, {
									center: {
										lat: ' . floatval($element_options['map_latitude']) . ',
										lng: ' . floatval($element_options['map_longitude']) . '
									},';
	if ($map_color) {
		$map_script .=				'styles: [
												{
													elementType: "labels",
													stylers    : [
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "poi",
													elementType: "labels",
													stylers    : [
														{visibility: "off"}
													]
												},
												{
													featureType: \'road.highway\',
													elementType: \'labels\',
													stylers    : [
														{visibility: "off"}
													]
												},
												{
													featureType: "road.local",
													elementType: "labels.icon",
													stylers    : [
														{visibility: "off"}
													]
												},
												{
													featureType: "road.arterial",
													elementType: "labels.icon",
													stylers    : [
														{visibility: "off"}
													]
												},
												{
													featureType: "road",
													elementType: "geometry.stroke",
													stylers    : [
														{visibility: "off"}
													]
												},
												{
													featureType: "transit",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "poi",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "poi.government",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "poi.sport_complex",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "poi.attraction",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "poi.business",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "transit",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "transit.station",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "landscape",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]

												},
												{
													featureType: "road",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "road.highway",
													elementType: "geometry.fill",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												},
												{
													featureType: "water",
													elementType: "geometry",
													stylers    : [
														{hue: ' . $map_color . '},
														{visibility: "on"},
														{lightness: ' . intval($map_brightness) . '},
														{saturation: ' . intval($map_saturation) . '}
													]
												}
											],';
	}
	if (isset($element_options['map_scrollwheel']))
		$map_script .=				'scrollwheel: ' . ($element_options['map_scrollwheel'] == 1 ? 'true' : 'false') . ',';
	if (isset($element_options['map_draggable']))
		$map_script .=				'draggable: ' . ($element_options['map_draggable'] == 1 ? 'true' : 'false') . ',';
	if (isset($element_options['map_zoomcontrol']))
		$map_script .=				'zoomControl: ' . ($element_options['map_zoomcontrol'] == 1 ? 'true' : 'false') . ',';
	if (isset($element_options['map_streetviewcontrol']))
		$map_script .=				'streetViewControl: ' . ($element_options['map_streetviewcontrol'] == 1 ? 'true' : 'false') . ',';
	if (isset($element_options['map_maptypecontrol']))
		$map_script .=				'mapTypeControl: ' . ($element_options['map_maptypecontrol'] == 1 ? 'true' : 'false') . ',';

	$map_script .=					'zoom: ' . intval($element_options['map_zoom']);
	$map_script .=					'});';

	if (count($markers)) {
		foreach ($markers as $marker_index => $marker) {
			$marker_options			= RSPageBuilderHelper::escapeHtmlArray($marker['options']);
			$marker_title_show		= (!isset($marker_options['marker_title_show']) || (isset($marker_options['marker_title_show']) && ($marker_options['marker_title_show'] == '1'))) ? '1' : '0';
			$marker_id				= 'marker_' . $id . '_' . $marker_index;
			$marker_title_style		= array();
			$marker_content_style	= array();
			$infowindow_content		= '';
			$infowindow_id			= 'infowindow_' . $id . '_' . $marker_index;
			
			if (!empty($marker_options['marker_address'])) {
				$map_script .= '	geodecoder_' . $id . '.geocode({
										\'address\': \''. $marker_options['marker_address'] . '\'
									}, function(results, status) {
										if (status == google.maps.GeocoderStatus.OK) {
											var ' . $marker_id . ' = new google.maps.Marker({
												position: results[0].geometry.location,
												map: map_' . $id . ',
												icon: {
													path: \'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0\',
													fillColor: \'' . $marker_options['marker_color'] . '\',
													fillOpacity: ' . floatval($marker_options['marker_opacity']) . ',
													scale: ' . floatval($marker_options['marker_scale']) . ',
													strokeColor: \'' . $marker_options['marker_stroke_color'] . '\',
													strokeWeight: ' . intval($marker_options['marker_stroke_weight']) . '
												}
											});
										} else {
											window.log(\'Location geocoding has failed: \' + google.maps.GeocoderStatus);
										}';
										
				if ((!empty($marker_options['marker_title']) && !empty($marker_title_show)) || !empty($marker_options['marker_content'])) {
					if (!empty($marker_options['marker_title']) && !empty($marker_title_show)) {
						if (!empty($marker_options['marker_title_font_size'])) {
							$marker_title_style['font-size'] = $marker_options['marker_title_font_size'];
						}
						if (!empty($marker_options['marker_title_text_color'])) {
							$marker_title_style['color'] = $marker_options['marker_title_text_color'];
						}
					}
					if (!empty($marker_options['marker_content'])) {
						if (!empty($marker_options['marker_content_text_color'])) {
							$marker_content_style['color'] = $marker_options['marker_content_text_color'];
						}
					}
					$infowindow_content .= '<div class="rspbld-infowindow">';
					
					if (!empty($marker_options['marker_title']) && !empty($marker_title_show)) {
						$infowindow_content .= '<' . $marker_options['marker_title_heading'] . ' class="rspbld-title"' . RSPageBuilderHelper::buildStyle($marker_title_style) . '>' . $marker_options['marker_title'] . '</' . $marker_options['marker_title_heading'] . '>';
					}
					if (!empty($marker_options['marker_content'])) {
						$infowindow_content .= '<div class="rspbld-content"' . RSPageBuilderHelper::buildStyle($marker_content_style) . '>' . $marker_options['marker_content'] . '</div>';
					}
					$infowindow_content .= '</div>';
					
					$map_script .= '	var ' . $infowindow_id . ' = new google.maps.InfoWindow({
											content: ' . json_encode($infowindow_content) . ',
											maxWidth: 250
										});';
										
					$map_script .= '	if (' . $marker_id . ' && ' . $infowindow_id . ') {
											google.maps.event.addListener(' . $marker_id . ', \'click\', function() {
												' . $infowindow_id . '.open(map_' . $id . ', ' . $marker_id . ');
											});
										}';
				}
				$map_script .= '});';
			} else if (!empty($marker_options['marker_latitude']) && !empty($marker_options['marker_longitude'])) {
				$map_script .= '	var ' . $marker_id . ' = new google.maps.Marker({
										position: {
											lat: ' . floatval($marker_options['marker_latitude']) . ',
											lng: ' . floatval($marker_options['marker_longitude']) . '
										},
										map: map_' . $id . ',
										icon: {
											path: \'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0\',
											fillColor: \'' . $marker_options['marker_color'] . '\',
											fillOpacity: ' . floatval($marker_options['marker_opacity']) . ',
											scale: ' . floatval($marker_options['marker_scale']) . ',
											strokeColor: \'' . $marker_options['marker_stroke_color'] . '\',
											strokeWeight: ' . intval($marker_options['marker_stroke_weight']) . '
										}
									});';
									
				if ((!empty($marker_options['marker_title']) && !empty($marker_title_show)) || !empty($marker_options['marker_content'])) {
					if (!empty($marker_options['marker_title']) && !empty($marker_title_show)) {
						if (!empty($marker_options['marker_title_font_size'])) {
							$marker_title_style['font-size'] = $marker_options['marker_title_font_size'];
						}
						if (!empty($marker_options['marker_title_text_color'])) {
							$marker_title_style['color'] = $marker_options['marker_title_text_color'];
						}
					}
					if (!empty($marker_options['marker_content'])) {
						if (!empty($marker_options['marker_content_text_color'])) {
							$marker_content_style['color'] = $marker_options['marker_content_text_color'];
						}
					}
					$infowindow_content .= '<div class="rspbld-infowindow">';
					
					if (!empty($marker_options['marker_title']) && !empty($marker_title_show)) {
						$infowindow_content .= '<' . $marker_options['marker_title_heading'] . ' class="rspbld-title"' . RSPageBuilderHelper::buildStyle($marker_title_style) . '>' . $marker_options['marker_title'] . '</' . $marker_options['marker_title_heading'] . '>';
					}
					if (!empty($marker_options['marker_content'])) {
						$infowindow_content .= '<div class="rspbld-content"' . RSPageBuilderHelper::buildStyle($marker_content_style) . '>' . $marker_options['marker_content'] . '</div>';
					}
					$infowindow_content .= '</div>';
					
					$map_script .= '	var ' . $infowindow_id . ' = new google.maps.InfoWindow({
											content: ' . json_encode($infowindow_content) . ',
											maxWidth: 250
										});';
					
					$map_script .= '	if (' . $marker_id . ' && ' . $infowindow_id . ') {
											google.maps.event.addListener(' . $marker_id . ', \'click\', function() {
												' . $infowindow_id . '.open(map_' . $id . ', ' . $marker_id . ');
											});
										}';
				}
			}
		}
	}
	$map_script .= '}';
	$map_script .= '	setTimeout(function() {
							initMap' . $id . '();
						}, 1000);';
	
	// Add Google Map script
	$doc->addScriptDeclaration($map_script);

	// Build Google Map HTML
	if ((!empty($element_options['title']) && !empty($title_show)) || !empty($markers)) {
?>
	<div class="<?php echo $class; ?>"<?php echo RSPageBuilderHelper::buildStyle($style); ?>>
		<?php if (!empty($element_options['title']) && !empty($title_show)) { ?>
		<<?php echo $element_options['title_heading']; ?> class="rspbld-title"<?php echo RSPageBuilderHelper::buildStyle($title_style); ?>>
			<?php echo $element_options['title']; ?>
		</<?php echo $element_options['title_heading']; ?>>
		<?php } ?>
		<div id="<?php echo $id; ?>" class="map"<?php echo RSPageBuilderHelper::buildStyle($map_style); ?>></div>
	</div>
<?php
	}
} else {
	echo '<div class="rspbld-error alert alert-danger">'.JText::_('COM_RSPAGEBUILDER_GOOGLE_NO_API_KEY_ERROR').'</div>';
}
?>