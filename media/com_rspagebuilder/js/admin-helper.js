var RSPageBuilderHelper = {
	timer: null,
	
	// Make rows sortable
	sortableRows: function(obj) {
		obj.sortable({
			placeholder: 'ui-state-highlight',
			forcePlaceholderSize: true,
			axis: 'y',
			opacity: 0.8,
			tolerance: 'pointer',
			start: function(event, ui) {
				ui.item.css({
					'left'				: '50%',
					'-webkit-transform' : 'translateX(-50%)',
					'-moz-transform' 	: 'translateX(-50%)',
					'transform' 		: 'translateX(-50%)'
				});
				ui.item.closest('.rspbld-wrapper').find('.ui-state-highlight').css({
					'margin-left'	: 'auto',
					'margin-right'	: 'auto',
					'width'			: ui.item.width()
				});
			},
			stop: function(event, ui) {
				ui.item.removeAttr('style');
			}
		}).disableSelection();
	},
	
	// Make columns sortable
	sortableColumns: function(obj) {
		var width_diff = 0;
			
		if (1350 <= jQuery(window).width() <= 1750) {
			width_diff = 0.5;
		}
		
		if (jQuery(window).width() <= 768) {
			obj.sortable({
				placeholder: 'ui-state-highlight',
				forcePlaceholderSize: true,
				axis: 'y',
				opacity: 0.8,
				tolerance: 'pointer',
				start: function(event, ui) {
					var highlight = ui.item.closest('.row').find('.ui-state-highlight');
					
					ui.item.css('display', 'block');
					height	= ui.item.height();
					width	= ui.item.width();
					ui.item.css('display', 'none');
					
					ui.item.css({
						'left'				: '50%',
						'-webkit-transform' : 'translateX(-50%)',
						'-moz-transform' 	: 'translateX(-50%)',
						'transform' 		: 'translateX(-50%)'
					});
					
					highlight.addClass(ui.item.attr('class'));
					highlight.css({
						height : height,
						width  : width - width_diff
					});
				},
				stop: function(event, ui) {
					ui.item.removeAttr('style');
				}
			}).disableSelection();
		} else {
			obj.sortable({
				placeholder: 'ui-state-highlight',
				forcePlaceholderSize: true,
				helper: 'clone',
				axis: 'x',
				opacity: 0.8,
				tolerance: 'pointer',
				start: function(event, ui) {
					var highlight = ui.item.closest('.row').find('.ui-state-highlight');
						
					ui.item.css('display', 'block');
					height	= ui.item.height();
					width	= ui.item.width();
					ui.item.css('display', 'none');
					
					ui.item.css({
						left: '0px',
						top : '25px'
					});
					
					highlight.addClass(ui.item.attr('class'));
					highlight.css({
						height : height,
						width  : width - width_diff,
						margin : '0px 10px'
					});
				},
				stop: function(event, ui) {
					ui.item.removeAttr('style');
				}
			}).disableSelection();
		}
	},
	
	// Make elements sortable
	sortableElements: function(obj) {
		obj.sortable({
			connectWith: obj,
			items: '.element-container',
			placeholder: 'ui-state-highlight',
			forcePlaceholderSize: true,
			opacity: 0.8,
			tolerance: 'pointer',
			start: function(event, ui) {
				ui.item.css('margin-bottom', '0');
			},
			stop: function(event, ui) {
				ui.item.removeAttr('style');
			}
		}).disableSelection();
	},
	
	// Make items sortable
	sortableItems: function(obj) {
		obj.sortable({
			handle: '.move-item',
			placeholder: 'ui-state-highlight',
			axis: 'y',
			opacity: 0.8,
			tolerance: 'pointer',
			start: function(event, ui) {
				RSPageBuilderHelper.removeComponents(ui.item);
				ui.item.closest('.iterative-items.accordion').find('.ui-state-highlight').css({
					'height'	: ui.item.outerHeight(),
					'width'		: ui.item.width()
				});
			},
	        stop: function(event, ui) {
				RSPageBuilderHelper.initComponents(ui.item);
				RSPageBuilderHelper.changeElement();
	    	}
		});
	},
	
	// Initialize jQuery UI
	initjQueryUI: function() {
		RSPageBuilderHelper.sortableRows(jQuery('.rspbld-wrapper'));
		RSPageBuilderHelper.sortableColumns(jQuery('.rspbld-container .row .columns'));
		RSPageBuilderHelper.sortableElements(jQuery('.rspbld-container .column-content'));
	},
	
	// Edit element
	editElement: function(obj) {
		var clone = obj.clone();
		
		clone.find('.element-options').removeClass('hidden');
		clone.find('.element-json').val(JSON.stringify(RSPageBuilderHelper.buildElementJson(clone)));
		
		jQuery('#modal-element-settings .modal-body .span6:first').empty();
		jQuery('#modal-element-settings .modal-body .span6:first').append(clone);
		
		RSPageBuilderHelper.elementHtmlAjax(clone.find('.edit-element'), clone.find('.element-json').val(), '2');
		RSPageBuilderHelper.initComponents(jQuery('#modal-element-settings .element'));
		setTimeout(function() {
			RSPageBuilderHelper.fixAccordion();
			RSPageBuilderHelper.initMap(jQuery('#modal-element-settings .element-container'));
		}, 1000);
		RSPageBuilderHelper.fixMooToolsCarousel();
		RSPageBuilderHelper.sortableItems(jQuery('#modal-element-settings .accordion'));
		RSPageBuilderHelper.initOptionsTab();
		
		jQuery('#modal-element-settings .loader').fadeOut(200);
		jQuery('#modal-element-settings .row-fluid').fadeIn(200);
	},
	
	// Duplicate iterative item
	duplicateItem: function(obj) {
		RSPageBuilderHelper.removeComponents(jQuery('#modal-element-settings .accordion'));
		
		var clone			= obj.clone(),
			new_id			= RSPageBuilderHelper.randomNumber(),
			items_number	= jQuery('#modal-element-settings .iterative-items .accordion-group').length;
			
		clone.find('.accordion-heading .accordion-toggle').attr('href', '#' + new_id);
		clone.find('.accordion-body').attr('id', new_id);
		clone.find('.collapse').removeClass('in');
		clone.find('.rspbld-input, .js-editor-tinymce > .joomla-editor-tinymce, .codemirror-source, .js-editor-none > textarea').each(function() {
			var item_segments = jQuery(this).attr('data-name').split('-');
				
			jQuery(this).attr('data-name', item_segments[0] + '-' + (items_number + 1));
			jQuery(this).attr('id', jQuery(this).attr('data-name').replace('-', '_'));
		});
		obj.closest('.accordion').append(clone);
		RSPageBuilderHelper.initComponents(jQuery('#modal-element-settings .accordion'));
		RSPageBuilderHelper.sortableItems(jQuery('#modal-element-settings .accordion'));
	},
	
	// Initialize tooltip
	initTooltip: function() {
		jQuery('*[data-rel="tooltip"]').tooltip();
	},
	
	// Destroy tooltip
	destroyThisTooltip: function(obj) {
		obj.find('*[data-rel="tooltip"]').tooltip('destroy');
	},

	// Remove tooltip
	removeTooltip: function() {
		jQuery('.tooltip').remove();
	},
	
	// Initialize popover
	initPopover: function() {
		jQuery('*[data-rel="popover"]').popover({trigger: 'hover'});
	},
	
	// Destroy popover
	destroyThisPopover: function(obj) {
		obj.find('*[data-rel="popover"]').popover('destroy');
	},

	// Remove popover
	removePopover: function() {
		jQuery('.popover').remove();
	},
	
	// Remove videos
	removeVideos: function() {
		var video_container = jQuery('.rspbld-video .rspbld-video-player, .rspbld-video .rspbld-vimeo-video, .rspbld-video .rspbld-youtube-video');
		
		if (video_container.length) {
			video_container.remove();
		}
	},
	
	// Initialize Joomla/Bootstrap components
	initComponents: function(obj) {
		
		// Initialize radio btn-group
		obj.find('.rspbld-field.btn-group.radio').each(function() {
			var field = jQuery(this);
			
			if (field.closest('.tab-pane').attr('id') != 'items') {
				field.find('input[checked="checked"]').attr('data-name', field.attr('id'));
			} else {
				field.find('input[checked="checked"]').attr('data-name', field.attr('id').replace(/_(\d+)$/, '-$1'));
			}
			field.find('input[checked="checked"]').addClass('rspbld-input');
			field.find('label').addClass('btn');
			field.find('label[for="' + field.find('input[checked="checked"]').attr('id') + '"]').addClass('active');
			
			if (field.find('input[checked="checked"]').val() == 0) {
				field.find('label[for="' + field.find('input[checked="checked"]').attr('id') + '"]').addClass('btn-danger');
			} else {
				field.find('label[for="' + field.find('input[checked="checked"]').attr('id') + '"]').addClass('btn-success');
			}
			
			field.find('label').click(function() {
				if (jQuery(this).hasClass('active')) {
					return true;
				} else {
					field.find('input').checked = false;
					field.find('input').removeAttr('checked');
					field.find('input').removeAttr('data-name');
					field.find('input').removeClass('rspbld-input');
					field.find('label').removeClass('active');
					field.find('label').removeClass('btn-danger');
					field.find('label').removeClass('btn-success');
					field.find('#' + jQuery(this).attr('for')).checked = true;
					field.find('#' + jQuery(this).attr('for')).attr('checked', 'checked');
					
					if (field.closest('.tab-pane').attr('id') != 'items') {
						field.find('#' + jQuery(this).attr('for')).attr('data-name', field.attr('id'));
					} else {
						field.find('#' + jQuery(this).attr('for')).attr('data-name', field.attr('id').replace(/_(\d+)$/, '-$1'));
					}
					field.find('#' + jQuery(this).attr('for')).addClass('rspbld-input');
					
					jQuery(this).addClass('active');
					
					if (jQuery('#' + jQuery(this).attr('for')).val() == 0) {
						jQuery(this).addClass('btn-danger');
					} else {
						jQuery(this).addClass('btn-success');
					}
					
					// Showon
					field.closest('.tab-pane').find('[data-showon^="' + field.find('input').attr('name') + ':"]').each(function() {
						var showon = jQuery(this).attr('data-showon').split(':');
							
						if (showon[1] == field.find('input:checked').val()) {
							jQuery(this).slideDown();
						} else {
							jQuery(this).slideUp();
						}
					});
					
					// Dynamically change element
					if (field.closest('#modal-element-settings .element-options').length) {
						RSPageBuilderHelper.changeElement();
					}
				}
			});
		});
		
		// Initialize iterative items accordion
		obj.find('.accordion-group').each(function() {
			var id = RSPageBuilderHelper.randomNumber();
			
			jQuery(this).find('.accordion-toggle').attr('href', '#item' + id);
			jQuery(this).find('.accordion-body').attr('id', 'item' + id);
		});
		
		// Initialize element / item Joomla! calendar
		var calendar_fields = obj.find('.field-calendar');
		
		for (i = 0; i < calendar_fields.length; i++) {
			JoomlaCalendar.init(calendar_fields[i]);
		}
		
		// Initialize element / item chosen
		jQuery('select').chosen();
		
		// Initialize element / item color picker
		obj.find('.color').each(function() {
			jQuery(this).minicolors({
				control: jQuery(this).attr('data-control') || 'hue',
				position: jQuery(this).attr('data-position') || 'bottom',
				theme: 'bootstrap',
				changeDelay: 200,
				change: function() {
					RSPageBuilderHelper.changeElement();
				}
			});
		});
		
		// Initialize element / item TinyMCE editor
		obj.find('.js-editor-tinymce > .joomla-editor-tinymce').each(function () {
			var id				= 'editor-' + RSPageBuilderHelper.randomNumber(),
				pluginOptions	= Joomla.getOptions ? Joomla.getOptions('plg_editor_tinymce', {}) : (Joomla.optionsStorage.plg_editor_tinymce || {});
				
			jQuery(this).attr('id', id);
			
			if (typeof pluginOptions.tinyMCE == 'undefined') {
				pluginOptions.tinyMCE = {};
			}
			
			if (typeof pluginOptions.tinyMCE.default == 'undefined') {
				pluginOptions.tinyMCE.default = {
					setCustomDir: rspbld_root,
					suffix: '.min',
					baseURL: rspbld_root + 'media/editors/tinymce',
					directionality: jQuery('html').attr('dir'),
					language: jQuery('html').attr('lang').substr(0, 2),
					autosave_restore_when_empty: false,
					skin: 'lightgray',
					theme: 'modern',
					schema: 'html5',
					menubar: 'edit insert view format table tools',
					toolbar1: 'bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect | formatselect fontselect fontsizeselect | searchreplace | bullist numlist | outdent indent | undo redo | link unlink anchor image | code | forecolor backcolor | fullscreen | table | subscript superscript | charmap emoticons media hr ltr rtl | cut copy paste pastetext | visualchars visualblocks nonbreaking blockquote template | print preview codesample insertdatetime removeformat',
					toolbar2: null,
					plugins: 'autolink,lists,save,colorpicker,importcss,searchreplace,link,anchor,image,code,textcolor,fullscreen,table,charmap,emoticons,media,hr,directionality,paste,visualchars,visualblocks,nonbreaking,template,print,preview,codesample,insertdatetime,advlist,autosave,contextmenu',
					inline_styles: true,
					gecko_spellcheck: true,
					entity_encoding: 'raw',
					verify_html: true,
					valid_elements: '',
					extended_valid_elements: 'hr[id|title|alt|class|width|size|noshade]',
					invalid_elements: 'script,applet',
					relative_urls: true,
					remove_script_host: false,
					content_css: rspbld_root + 'templates/system/css/editor.css',
					document_base_url: rspbld_root,
					paste_data_images: true,
					importcss_append: true,
					image_title: true,
					width: '',
					resize: 'both',
					templates: [
					{
					  title: 'Layout',
					  description: 'HTML layout.',
					  url: rspbld_root + 'media/editors/tinymce/templates/layout1.html'
					},
					{
					  title: 'Simple Snippet',
					  description: 'Simple HTML snippet.',
					  url: rspbld_root + 'media/editors/tinymce/templates/snippet1.html'
					}
					],
					image_advtab: true,
					'force_br_newlines': false,
					'force_p_newlines': true,
					'forced_root_block': 'p',
					'toolbar_items_size': 'small'
				}
			}
			
			pluginOptions.tinyMCE.default.height	= jQuery(this).height;
			pluginOptions.tinyMCE.default.setup		= function(mce_editor) {
				mce_editor.on('change', function(e) {
					jQuery('#' + mce_editor.id).text(mce_editor.getContent());
					jQuery('#' + mce_editor.id).val(mce_editor.getContent());
					
					RSPageBuilderHelper.changeElement();
				});
			};
			
			if (jQuery(this).next('.toggle-editor').length) {
				jQuery(this).next('.toggle-editor').remove();
			}
			Joomla.JoomlaTinyMCE.setupEditor(document.getElementById(id), pluginOptions);
		});
		
		// Initialize element / item CodeMirror editor
		obj.find('.codemirror-source').each(function () {
			var id			= 'editor-' + RSPageBuilderHelper.randomNumber(),
				textarea	= jQuery(this);
				
			textarea.attr('id', id);
			
			if (typeof Joomla.editors.instances[id] == 'undefined') {
				Joomla.editors.instances[id] = CodeMirror.fromTextArea(this, textarea.data('options'));
				Joomla.editors.instances[id].setSize('100%', 350);
				Joomla.editors.instances[id].on('blur', function() {
					textarea.text(Joomla.editors.instances[id].getValue());
					
					RSPageBuilderHelper.changeElement();
				});
			}
		});
		
		// Initialize tooltip
		obj.find('.hasTooltip').tooltip();
		
		// Initialize popover
		obj.find('.hasPopover').popover({trigger: 'hover'});
		
		// Initialize icons list
		obj.find('.iconslist').each(function() {
			jQuery(this).iconsList();
		});
		obj.find('.icons-list').removeClass('hidden');
		
		// Initialize image upload
		obj.find('.media').each(function() {
			jQuery(this).uploadImage();
		});
		
		// Initialize Showon
		obj.find('[data-showon*=":"]').each(function() {
			var showon	= jQuery(this).attr('data-showon').split(':'),
				field	= obj.find('#' + showon[0]);
			
			if (field.length > 0) {
				if (showon[1] == field.find('input:checked').val()) {
					jQuery(this).show();
				} else {
					jQuery(this).hide();
				}
			}
		});
	},
	
	// Remove Joomla / Bootstrap components
	removeComponents: function(obj) {
		
		// Remove iterative items accordion
		obj.find('.accordion-group').each(function() {
			jQuery(this).find('.accordion-toggle').removeAttr('href');
			jQuery(this).find('.accordion-body').removeAttr('id');
		});
		
		// Remove element / item chosen
		obj.find('select').chosen('destroy');
		
		// Remove element / item color picker
		obj.find('.minicolors-input').each(function() {
			jQuery(this).minicolors('destroy');
		});
		
		// Remove element / item TinyMCE editor
		obj.find('.js-editor-tinymce > .joomla-editor-tinymce').each(function () {
			var id			= jQuery(this).attr('id'),
				mce_content	= tinyMCE.get(id).getContent();
				
			jQuery(this).text(mce_content);
			tinyMCE.execCommand('mceRemoveEditor', false, id);
		});
		
		// Remove element / item CodeMirror editor
		obj.find('.codemirror-source').each(function () {
			var id = jQuery(this).attr('id');
			
			Joomla.editors.instances[id].toTextArea();
		});
		
		// Remove element / item media
		obj.find('.media').each(function() {
			jQuery(this).find('.input-media').removeAttr('id');
			
			// Element / item image preview
			jQuery(this).find('.image-preview').removeAttr('id');
			jQuery(this).find('.image-preview').find('img').removeAttr('id');
			jQuery(this).find('a.modal').removeAttr('href');
			jQuery(this).find('a.remove-media').removeAttr('onClick');
		});
		
		// Remove tooltip
		obj.find('.hasTooltip').tooltip('destroy');
		
		// Remove popover
		obj.find('.hasPopover').popover('destroy');
		
		// Remove icons list
		obj.find('.iconslist').removeAttr('style');
		obj.find('.icons-list').addClass('hidden');
	},
	
	// Initialize Google maps
	initMap: function(obj) {
		if (obj.closest('.row-fluid').find('.map').length) {
			var map_container	= document.getElementById(obj.closest('.row-fluid').find('.map').attr('id')),
				element			= JSON.parse(JSON.stringify(eval('(' + obj.find('.element-json').val() + ')'))),
				style			= [];
			if (element.options.map_color) {
				style = [
					{
						elementType: "labels",
						stylers    : [
							{saturation: element.options.map_saturation}
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
						featureType: "road.highway",
						elementType: "labels",
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
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "poi",
						elementType: "geometry.fill",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "poi.government",
						elementType: "geometry.fill",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "poi.sport_complex",
						elementType: "geometry.fill",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "poi.attraction",
						elementType: "geometry.fill",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "poi.business",
						elementType: "geometry.fill",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "transit",
						elementType: "geometry.fill",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "transit.station",
						elementType: "geometry.fill",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "landscape",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]

					},
					{
						featureType: "road",
						elementType: "geometry.fill",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "road.highway",
						elementType: "geometry.fill",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					},
					{
						featureType: "water",
						elementType: "geometry",
						stylers    : [
							{hue: element.options.map_color},
							{visibility: "on"},
							{lightness: element.options.map_brightness},
							{saturation: element.options.map_saturation}
						]
					}
				];
			}
			var	map			= new google.maps.Map(map_container, {
					center: {
						lat: parseFloat(element.options.map_latitude),
						lng: parseFloat(element.options.map_longitude)
					},
					styles: style,
					zoom: parseInt(element.options.map_zoom),
					scrollwheel: (element.options.map_scrollwheel === "1" ? true : false),
					draggable: (element.options.map_draggable === "1" ? true : false),
					zoomControl: (element.options.map_zoomcontrol === "1" ? true : false),
					streetViewControl : (element.options.map_streetviewcontrol === "1" ? true : false),
					mapTypeControl : (element.options.map_maptypecontrol === "1" ? true : false)
				}),
				geocoder	= new google.maps.Geocoder();
				
			if (element.items.length) {
				for (var i = 0; i < element.items.length; i++) {
					var marker_options = RSPageBuilderHelper.escapeHtmlObject(element.items[i].options);
					
					marker_options.marker_index = i + 1;
					
					if (marker_options.marker_address) {
						var address_input = obj.find('#marker_address_' + (i + 1));
						
						address_input.attr('autocomplete', 'off');
						RSPageBuilderHelper.aucompleteLocation(map, address_input);
						
						geocoder.geocode({
							'address': marker_options.marker_address
						}, RSPageBuilderHelper.onGeocodeComplete(map, marker_options));
					} else if (marker_options.marker_latitude && marker_options.marker_longitude) {
						var position = {
								lat: parseFloat(marker_options.marker_latitude),
								lng: parseFloat(marker_options.marker_longitude)
							};
							
						RSPageBuilderHelper.googleMapMarkers(map, marker_options, position);
					}
				}
			}
		}
	},
	
	// Geocode (address to coordinates)
	onGeocodeComplete: function(map, marker_options) {
		var geocodeCallBack = function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				RSPageBuilderHelper.googleMapMarkers(map, marker_options, results[0].geometry.location);
			} else {
				alert ('Location geocoding failed: ' + status);
			}
		}
		return geocodeCallBack;
	},
	
	aucompleteLocation: function(map, location) {
		var geocoder = new google.maps.Geocoder();
		
		location.on('keyup', function(e) {
			
			// Disable event on 'Shift' key press
			if ( e.which == 16) {
				return true;
			}
			if (RSPageBuilderHelper.timer != null) {
				clearTimeout(RSPageBuilderHelper.timer);
			}
			
			RSPageBuilderHelper.timer = setTimeout(function() {
				location.nextAll('.location_results').remove();
				
				if (jQuery.trim(location.val())) {
					geocoder.geocode({
						'address': jQuery.trim(location.val())
					}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							results_wrapper = '<div class="location_results"><ul></ul></div>';
							
							location.after(results_wrapper);
							
							location_results = location.next('.location_results');
							
							if (results.length) {
								jQuery(results).each(function(index, item) {
									li = jQuery('<li>' + item.formatted_address + '</li>');
									
									li.click(function() {
										location.val(item.formatted_address);
										map.setCenter(item.geometry.location);
										
										location_results.remove();
									});
									
									location_results.find('ul').append(li);
								});
							} else {
								location_results.remove();
							}
							jQuery(document).click(function(event) {
								if (jQuery(event.target).parents().index(results) == -1) {
									location_results.remove();
								}
							});
						}
					});
				}
			}, 10);
		});
	},
	
	// Add Google maps markers
	googleMapMarkers: function(map, marker_options, position) {
		
		// Build marker
		var marker_title_show	= (typeof marker_options.marker_title_show == 'undefined' || (typeof marker_options.marker_title_show !== 'undefined' && marker_options.marker_title_show == 1)) ? 1 : 0,
			marker				= new google.maps.Marker({
			id: 'marker_' + marker_options.marker_index,
			position: position,
			map: map,
			icon: {
				path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0',
				fillColor: marker_options.marker_color,
				fillOpacity: parseFloat(marker_options.marker_opacity),
				scale: parseFloat(marker_options.marker_scale),
				strokeColor: marker_options.marker_stroke_color,
				strokeWeight: parseInt(marker_options.marker_stroke_weight)
			}
		});
		
		// Build infowindow
		var infowindow_content		= '',
			marker_title_style		= {},
			marker_content_style	= {};
			
		if ((marker_options.marker_title && marker_title_show) || marker_options.marker_content) {
			if (marker_options.marker_title && marker_title_show) {
				if (marker_options.marker_title_font_size) {
					marker_title_style['font-size'] = marker_options.marker_title_font_size;
				}
				if (marker_options.marker_title_text_color && marker_options.marker_title_text_color != 'none') {
					marker_title_style['color'] = marker_options.marker_title_text_color;
				}
			}
			if (marker_options.marker_content) {
				if (marker_options.marker_content_text_color) {
					marker_content_style['color'] = marker_options.marker_content_text_color;
				}
			}
			infowindow_content += '<div class="rspbld-infowindow">';
			
			if (marker_options.marker_title && marker_title_show) {
				infowindow_content += '<' + marker_options.marker_title_heading + ' class="rspbld-title"' + RSPageBuilderHelper.buildStyle(marker_title_style) + '>' + marker_options.marker_title + '</' + marker_options.marker_title_heading + '>';
			}
			if (marker_options.marker_content) {
				infowindow_content += '<div class="rspbld-content"' + RSPageBuilderHelper.buildStyle(marker_content_style) + '>' + marker_options.marker_content + '</div>';
			}
			infowindow_content += '</div>';
			
			var infowindow = new google.maps.InfoWindow({
				content: infowindow_content,
				maxWidth: 250
			});
		}
		
		// Add infowindow listener
		if (marker && infowindow) {
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map, marker);
			});
		}
	},
	
	// Initialize Animated Number
	initAnimatedNumber: function() {
		if (jQuery.isFunction(jQuery.fn.visible) && jQuery.isFunction(jQuery.fn.animateNumber)) {
			jQuery('#modal-element-settings .element-preview .rspbld-animated-number').each(function() {
				var limit		= jQuery(this).find('.rspbld-number').data('limit'),
					separator	= jQuery.animateNumber.numberStepFactories.separator(jQuery(this).find('.rspbld-number').data('separator')),
					duration	= jQuery(this).find('.rspbld-number').data('duration'),
					delay		= jQuery(this).find('.rspbld-number').data('delay');
					
				if (jQuery(this).visible('vertical')) {
					jQuery(this).find('.rspbld-number').delay(parseInt(delay)).animateNumber({	
						number: parseInt(limit),
						numberStep: separator
					}, parseInt(duration));
				}
			});
		}
	},
	
	// Initialize Animate Progress Bars
	initAnimateProgressBars: function() {
		if (jQuery.isFunction(jQuery.fn.visible) && (jQuery('#modal-element-settings .element-preview .rspbld-progress-bars.animate .progress .bar').length > 0)) {
			jQuery('#modal-element-settings .element-preview .rspbld-progress-bars.animate .progress .bar').each(function(index) {
				if (!jQuery(this).attr('data-animated')) {
					var duration	= jQuery(this).closest('.rspbld-progress-bars.animate').data('duration'),
						delay		= jQuery(this).closest('.rspbld-progress-bars.animate').data('delay');
					
					jQuery(this).css('margin-left', '-' + jQuery(this).css('width'));
					jQuery(this).css('opacity', '1');
					
					if (jQuery(this).visible('vertical')) {
						jQuery(this).delay(parseInt(index * delay)).animate({
							marginLeft: 0
						}, duration);
						
						jQuery(this).attr('data-animated', '1');
					}
				}
			});
		}
	},
	
	// Initialize Animate Progress Circles
	initAnimateProgressCircles: function() {
		if (jQuery.isFunction(jQuery.fn.visible) && (jQuery('.rspbld-progress-circles.animate .progress-circle').length > 0)) {
			jQuery('#modal-element-settings .element-preview .rspbld-progress-circles.animate .progress-circle').each(function(index) {
				var current_circle = jQuery(this);
				
				if (!current_circle.attr('data-animated')) {
					var duration				= current_circle.closest('.rspbld-progress-circles.animate').data('duration'),
						delay					= current_circle.closest('.rspbld-progress-circles.animate').data('delay'),
						item_size				= current_circle.find('.item-wrapper').width(),
						show_item_percentage	= false;
						
					if (current_circle.find('.item-wrapper > span').text().indexOf('%') >= 0) {
						show_item_percentage = true;
					}
					
					if (current_circle.visible('vertical')) {
						current_circle.prop('counter', 0);
						
						setTimeout(function() {
							current_circle.animate({
							   counter: current_circle.find('.item-wrapper').attr('data-max-width'),
							}, {
								duration: duration,
								step: function(now) {
									var current = Math.ceil(now);
										
									if (current < 50) {
										current_circle.find('.item-wrapper .bar-wrapper').css('clip', 'rect(0, ' + item_size + 'px, ' + item_size + 'px, ' + item_size / 2 + 'px)');
									} else {
										current_circle.find('.item-wrapper .bar-wrapper').css('clip', 'rect(auto, auto, auto, auto)');
									}
									current_circle.find('.item-wrapper').attr('data-width', current);
								},
								queue: false
							}).animate({
								val_counter: (typeof current_circle.find('.item-wrapper').attr('data-max-value') !== 'undefined') ? current_circle.find('.item-wrapper').attr('data-max-value') : current_circle.find('.item-wrapper').attr('data-max-width'),
							}, {
								duration: duration,
								step: function(now) {
									var current = Math.ceil(now)
										symbol	= (typeof current_circle.find('.item-wrapper').attr('data-max-value') !== 'undefined' || !show_item_percentage) ? '' : '%';
										
									current += symbol;
									
									current_circle.find('.item-wrapper > span').text(current);
								},
								queue: false
							});
							
							current_circle.attr('data-animated', '1');
						}, index * delay);
					}
				}
			});
		}
	},
	
	// Initialize Countdown Timer
	initCountdownTimer: function() {
		if (jQuery.isFunction(jQuery.fn.countdownTimer) && (jQuery('.rspbld-countdown-timer').length > 0)) {
			jQuery('.rspbld-countdown-timer').each(function() {
				jQuery(this).countdownTimer();
			});
		}
	},
	
	// Initialize Masonry Boxes
	initMasonryBoxes: function() {
		var boxes_container	= jQuery('#modal-element-settings .element-preview .rspbld-masonry-boxes .boxes-container'),
			min_size		= parseInt(boxes_container.attr('data-min-size')),
			gutter			= parseInt(boxes_container.attr('data-gutter'));
		
		boxes_container.find('.box').each(function() {
			var sizes		= parseInt(jQuery(this).attr('class').replace(/^.*size([0-9]+).*$/, '$1')).toString().split(''),
				row_size	= (jQuery.isNumeric(sizes[1])) ? parseInt(sizes[1]) : 1,
				column_size	= (jQuery.isNumeric(sizes[0])) ? parseInt(sizes[0]) : 1,
				box_height	= (gutter > 0) ? parseInt(min_size * row_size + gutter * (row_size - 1)) : parseInt(min_size * row_size);
				box_width	= (gutter > 0) ? parseInt(min_size * column_size + gutter * (column_size - 1)) : parseInt(min_size * column_size);
			
			jQuery(this).css('height', box_height);
			jQuery(this).css('width', box_width);
			jQuery(this).css('margin-bottom', gutter);
		});
		
		boxes_container.masonry({
			itemSelector: '.box',
			columnWidth: min_size,
			gutter: gutter
		});
	},
	
	// Initialize Portfolio Filtering Box
	initPortfolioFiltering: function() {
		//Initialize filterizr
		var layout = jQuery('#modal-element-settings .element-preview .rspbld-portfolio-filtering-container').attr('data-layout');
		
		jQuery('#modal-element-settings .element-preview .rspbld-portfolio-filtering-container').filterizr({layout: layout, setupControls: false});
		
		//Simple filter controls
		jQuery('#modal-element-settings .element-preview .rspbld-filter li').click(function() {
			jQuery('#modal-element-settings .element-preview .rspbld-filter li').removeClass('active');
			jQuery(this).addClass('active');
		});
	},
	
	// Initialize Vimeo video
	initVimeoVideo: function() {
		if (jQuery('#modal-element-settings .element-preview .rspbld-vimeo-video').length) {
			var video 	= jQuery('#modal-element-settings .element-preview .rspbld-vimeo-video'),
				options	= {
					id			: video.data('source'),
					autoplay	: (video.data('autoplay') == 1) ? true : false,
					loop		: (video.data('loop') == 1) ? true : false
				},
				player	= new Vimeo.Player(video.attr('id'), options);
				
			player.setVolume(video.data('volume') / 100);
			
			if (video.data('start') != 0 || video.data('end') != 0) {
				if (video.data('end') > video.data('start')) {
					player.setCurrentTime(video.data('start')).then(function(seconds) {
						player.addCuePoint(parseInt(video.data('end')));
						
						player.on('cuepoint', function() {
							player.pause();
						})
					});
				} else if (video.data('end') == 0) {
					player.setCurrentTime(video.data('start')).then(function(seconds) {
						player.getDuration().then(function(duration) {
							player.addCuePoint(parseInt(duration));
							
							player.on('cuepoint', function() {
								player.pause();
							})
						}).catch(function(error) {});
					}).catch(function(error) {});
				}
			}
		}
	},
	
	// Initialize YouTube video
	initYouTubeVideo: function() {
		if (jQuery('#modal-element-settings .element-preview .rspbld-youtube-video').length) {
			var player,
				video = jQuery('#modal-element-settings .element-preview .rspbld-youtube-video');
			
			player = new YT.Player(video.attr('id'), {
				videoId		: video.data('source'),
				playerVars	: {
					autoplay	: video.data('autoplay'),
					controls	: video.data('controls'),
					showinfo	: video.data('showinfo'),
					rel			: video.data('rel'),
					loop		: video.data('loop'),
					playlist	: video.data('playlist'),
					start		: video.data('start'),
					end			: video.data('end'),
					vq			: video.data('vq')
				},
				events		: {
					'onReady': onPlayerReady
				}
			});
			
			function onPlayerReady(event) {
				event.target.setVolume(video.data('volume'));
			}
		}
	},
	
	// Initialize video player
	initVideoPlayer: function() {
		if (jQuery('#modal-element-settings .element-preview .rspbld-video-player').length) {
			jQuery('#modal-element-settings .element-preview .rspbld-video-player').videoPlayer();
		}
	},
	
	// Initialize YouTube Background Video Boxes
	initYouTubeBackgroundVideoBoxes: function() {
		jQuery.mbYTPlayer.apiKey = jQuery('#modal-element-settings .element-preview .rspbld-youtube-player').data('apikey');
		jQuery('#modal-element-settings .element-preview .rspbld-youtube-player').YTPlayer();
	},
	
	// Random number
	randomNumber: function() {
		return Math.floor(Math.random() * (9999 - 1000 + 1) + 1000);
	},
	
	// Create id
	createId: function(string, number) {
		return string.replace(/\W/g, '').toLowerCase() + number;
	},
	
	// Escape HTML
	escapeHtml: function(str) {
		return str.replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/&/g, '&amp;');
	},
	
	// Escape HTML
	escapeHtmlObject: function(obj) {
		for (var key in obj) {
			if (key != 'item_content' && key != 'marker_content') {
				obj[key] = RSPageBuilderHelper.escapeHtml(obj[key]);
			}
		}
		
		return obj;
	},
	
	// Get location
	getLocation: function(href) {
		var new_element = document.createElement('a');
		
		new_element.href = href;
		
		return new_element;
	},
	
	// Build style
	buildStyle: function(obj) {
		var style				= '';
		
		if (Object.keys(obj).length) {
			style += ' style="';
			
			for (var key in obj) {
				if (key == 'background-image') {
					style += key + ':url(' + obj[key] + ');';
				} else {
					style += key + ':' + obj[key] + ';';
				}
			}
			style += '"';
		}
		return style;
	},
	
	// Fix for Bootstrap conflict with MooTools
	fixMooTools: function() {
		if (typeof MooTools != 'undefined' ) {
			Element.implement({
				hide: function() {
					return;
				}
			});
		}
	},
	
	// Fix for Bootstrap collapse (accordion)
	fixAccordion: function() {
		jQuery('.accordion').each(function () {
			jQuery(this).find('.accordion-toggle').each(function (i, title) {
				if (jQuery(title).parent().siblings('.accordion-body').hasClass('in') === false)
					jQuery(title).addClass('collapsed');
			});
		});
		jQuery('.accordion-toggle').click(function () {
			jQuery(this).parents('.accordion').each(function () {
				jQuery(this).find('.accordion-toggle').each(function (i, title) {
					jQuery(title).addClass('collapsed');
				});
			});
		});
	},
	
	// Fix for Bootstrap carousel conflict with MooTools
	fixMooToolsCarousel: function() {
		if (typeof MooTools != 'undefined' ) {
			Element.implement({
				slide: function(how, mode) {
					return this;
				}
			});
		}
	},
	
	// Initialize Bootstrap carousel
	initCarousel: function() {
		jQuery('#modal-element-settings .element-preview .rspbld-carousel .carousel').each(function() {
			var carousel_cycle 	  = (jQuery(this).attr('data-interval') == 0) ? false : true,
				carousel_interval = (jQuery(this).attr('data-interval') == 0) ? false : jQuery(this).attr('data-interval');
				
			jQuery(this).carousel({
				interval: carousel_interval,
				cycle: carousel_cycle
			});
		});
	},
	
	// Initialize options tab navigation
	initOptionsTab: function() {
		jQuery(document).on('click', '.options-tab .nav-tabs > li > a', function() {
			var id = jQuery(this).attr('href').replace('#', '');
			
			jQuery(this).closest('.tab').find('.tab-pane').each(function() {
				if (jQuery(this).attr('id') == id) {
					jQuery(this).addClass('active');
				} else {
					jQuery(this).removeClass('active');
				}
			});
		});
	},
	
	elementFieldToTitle: function(container_id, element_field) {
		var field_parts = element_field.split('-'),
			prefix		= '';
			
		switch(container_id) {
			case 'modal-column-settings':
				prefix = 'COLUMN_';
			break;
			case 'modal-row-settings':
				prefix = 'ROW_';
			break;
		}
		
		return Joomla.JText._('COM_RSPAGEBUILDER_' + prefix + field_parts[0].toUpperCase());
	},
	
	elementTypeToTitle: function(element_type) {
		return Joomla.JText._('COM_RSPAGEBUILDER_' + element_type.replace('rspbld_', '').toUpperCase());
	},
	
	renderRowAjax: function(row) {
		if (typeof row != 'undefined') {
			var regexp = /^<div class="\options-tab tab"\>/;
			
			jQuery.ajax({
				type: 'POST',
				dataType: 'html',
				url: rspbld_root + 'administrator/index.php?option=com_rspagebuilder&task=page.renderRow',
				data: JSON.parse(JSON.stringify(eval('(' + row + ')'))),
				success: function(html) {
					if (regexp.test(html)) {
						jQuery('#modal-row-settings .row-options').empty();
						jQuery('#modal-row-settings .row-options').append(html);
						jQuery('#modal-row-settings .row-options .rspbld-input').each(function() {
							jQuery(this).attr('data-name', jQuery(this).attr('name'));
							jQuery(this).removeAttr('name');
						});
						jQuery.find('#modal-row-settings .row-options .rspbld-field.btn-group.radio').each(function() {
							if (!jQuery(this).find('.rspbld-input').length) {
								jQuery(this).find('input[checked="checked"]').addClass('rspbld-input');
								jQuery(this).find('input[checked="checked"]').attr('data-name', jQuery(this).attr('id'));
							}
						});
						RSPageBuilderHelper.initOptionsTab();
						RSPageBuilderHelper.initComponents(jQuery('#modal-row-settings .row-options'));
						jQuery('#modal-row-settings').modal('show');
						setTimeout(function() {
							jQuery('#modal-row-settings .loader').fadeOut(200);
							jQuery('#modal-row-settings .row-fluid').fadeIn(200);
						}, 500);
					} else {
						window.location.reload();
					}
				}
			});
		}
	},
	
	renderColumnAjax: function(column) {
		if (typeof column != 'undefined') {
			var regexp = /^<div class="\options-tab tab"\>/;
			
			jQuery.ajax({
				type: 'POST',
				dataType: 'html',
				url: rspbld_root + 'administrator/index.php?option=com_rspagebuilder&task=page.renderColumn',
				data: JSON.parse(JSON.stringify(eval('(' + column + ')'))),
				success: function(html) {
					if (regexp.test(html)) {
						jQuery('#modal-column-settings .column-options').empty();
						jQuery('#modal-column-settings .column-options').append(html);
						jQuery('#modal-column-settings .column-options .rspbld-input').each(function() {
							jQuery(this).attr('data-name', jQuery(this).attr('name'));
							jQuery(this).removeAttr('name');
						});
						jQuery('#modal-column-settings .column-options .rspbld-field.btn-group.radio').each(function() {
							if (!jQuery(this).find('.rspbld-input').length) {
								jQuery(this).find('input[checked="checked"]').addClass('rspbld-input');
								jQuery(this).find('input[checked="checked"]').attr('data-name', jQuery(this).attr('id'));
							}
						});
						RSPageBuilderHelper.initOptionsTab();
						RSPageBuilderHelper.initComponents(jQuery('#modal-column-settings .column-options'));
						jQuery('#modal-column-settings').modal('show');
						setTimeout(function() {
							jQuery('#modal-column-settings .loader').fadeOut(200);
							jQuery('#modal-column-settings .row-fluid').fadeIn(200);
						}, 500);
					} else {
						window.location.reload();
					}
				}
			});
		}
	},
	
	renderElementAjax: function(container, element) {
		if (typeof element != 'undefined') {
			var regexp = /^<div class="\options-tab tab"\>/;
			
			jQuery.ajax({
				type: 'POST',
				dataType: 'html',
				url: rspbld_root + 'administrator/index.php?option=com_rspagebuilder&task=page.renderElement',
				data: JSON.parse(JSON.stringify(eval('(' + element + ')'))),
				success: function(html) {
					if (regexp.test(html)) {
						container.empty();
						container.append(html);
						
						container.find('.editor').each(function () {
							var editor_parent	= jQuery(this).closest('.controls');
								editor_clone	= jQuery(this).clone();
							
							editor_clone.attr('class', 'js-editor-tinymce');
							editor_clone.find('> textarea').attr('class', 'mce_editable joomla-editor-tinymce');
							editor_clone.children(':not(textarea)').remove();
							
							editor_parent.empty();
							editor_parent.append(editor_clone);
						});
						container.find('.js-editor-tinymce > .joomla-editor-tinymce, .codemirror-source, .js-editor-none > textarea').each(function() {
							jQuery(this).attr('data-name', jQuery(this).attr('name'));
							if (!jQuery(this).hasClass('joomla-editor-tinymce')) {
								jQuery(this).removeAttr('name');
							}
						});
						container.find('.rspbld-input').each(function() {
							jQuery(this).attr('data-name', jQuery(this).attr('name'));
							jQuery(this).removeAttr('name');
						});
						container.find('.rspbld-field.btn-group.radio').each(function() {
							if (!jQuery(this).find('.rspbld-input').length) {
								jQuery(this).find('input[checked="checked"]').addClass('rspbld-input');
								
								if (jQuery(this).closest('.tab-pane').attr('id') != 'items') {
									jQuery(this).find('input[checked="checked"]').attr('data-name', jQuery(this).attr('id'));
								} else {
									jQuery(this).find('input[checked="checked"]').attr('data-name', jQuery(this).attr('id').replace(/_(\d+)$/, '-$1'));
								}
							}
						});
						RSPageBuilderHelper.editElement(container.closest('.element-container'));
					} else {
						window.location.reload();
					}
				}
			});
		}
	},
	
	elementHtmlAjax: function(trigger, element, bootstrap_version) {
		var regexp = /class="rspbld-/;
		
		element = JSON.parse(JSON.stringify(eval('(' + element + ')')));
		element.bootstrap_version = bootstrap_version;
		
		if (trigger.hasClass('edit-element')) {
			jQuery('#modal-element-settings .modal-body .element-preview').append('<div class="preview-loader"></div>');
		}
		
		jQuery.ajax({
			type: 'POST',
			dataType: 'html',
			url: rspbld_root + 'administrator/index.php?option=com_rspagebuilder&task=page.elementHtml',
			data: element,
			success: function(html) {
				if (regexp.test(html) || html == '') {
					if (trigger.hasClass('view-element-html')) {
						var title		= '',
							subtitle	= '';
							
						if (element.options.title) {
							title = element.options.title;
						} else if (element.options.text) {
							title = element.options.text;
						} else {
							title = RSPageBuilderHelper.elementTypeToTitle(element.type);
						}
						subtitle = RSPageBuilderHelper.elementTypeToTitle(element.type);
						
						if (title != subtitle) {
							jQuery('#modal-element-view-html .modal-title').text(title + ' (' + subtitle + ')');
						} else {
							jQuery('#modal-element-view-html .modal-title').text(title);
						}
						jQuery('#modal-element-view-html .modal-body > textarea').empty();
						jQuery('#modal-element-view-html .modal-body > textarea').text(style_html(html));
						jQuery('#modal-element-view-html').modal('show');
					} else if (trigger.hasClass('edit-element')) {
						setTimeout(function() {
							jQuery('#modal-element-settings .modal-body .element-preview').empty();
							jQuery('#modal-element-settings .modal-body .element-preview').append(html);
						}, 200);
						
						setTimeout(function() {
							if (element.type == 'rspbld_animated_number') {
								RSPageBuilderHelper.initAnimatedNumber();
							} else if (element.type == 'rspbld_carousel') {
								RSPageBuilderHelper.initCarousel();
							} else if (element.type == 'rspbld_countdown_timer') {
								RSPageBuilderHelper.initCountdownTimer();
							} else if (element.type == 'rspbld_masonry_boxes') {
								RSPageBuilderHelper.initMasonryBoxes();
							} else if (element.type == 'rspbld_progress_bars') {
								RSPageBuilderHelper.initAnimateProgressBars();
							} else if (element.type == 'rspbld_progress_circles') {
								RSPageBuilderHelper.initAnimateProgressCircles();
							} else if ((element.type == 'rspbld_video')) {
								RSPageBuilderHelper.initVideoPlayer();
								RSPageBuilderHelper.initVimeoVideo();
								RSPageBuilderHelper.initYouTubeVideo();
							} else if (element.type == 'rspbld_youtube_background_video_box') {
								RSPageBuilderHelper.initYouTubeBackgroundVideoBoxes();
							} else if (element.type == 'rspbld_portfolio_filtering') {
								RSPageBuilderHelper.initPortfolioFiltering();
							}
						}, 500);
					}
				} else {
					window.location.reload();
				}
			}
		});
	},
	
	buildElementJson: function(element_container) {
		var element_type		= '',
			element_category	= '',
			element_options		= {};
		
		if (element_container.find('[data-name="title"]').length) {
			element_container.find('.element-title').text(element_container.find('[data-name="title"]').val());
		} else if (element_container.find('[data-name="text"]').length) {
			element_container.find('.element-title').text(element_container.find('[data-name="text"]').val());
		}
		if (!element_container.find('.element-title').text()) {
			element_container.find('.element-title').text(element_container.find('.element-type').text());
			element_container.find('.element-type').addClass('hidden');
		}
		if (element_container.find('.element-title').text() == element_container.find('.element-type').text()) {
			element_container.find('.element-type').addClass('hidden');
		} else {
			element_container.find('.element-type').removeClass('hidden');
		}
		
		element_container.find('.element-options .tab-content > div:not(#items) .rspbld-input, .element-options .tab-content > div:not(#items) .js-editor-tinymce > .joomla-editor-tinymce, .element-options .tab-content > div:not(#items) .codemirror-source, .element-options .tab-content > div:not(#items) .js-editor-none > textarea').each(function() {
			if (jQuery(this).data('name') == 'type') {
				element_type = jQuery(this).val();
			} else if (jQuery(this).data('name') == 'category') {
				element_category = jQuery(this).val();
			} else {
				element_options[jQuery(this).data('name')] = jQuery(this).hasClass('codemirror-source') ? jQuery(this).text() : jQuery(this).val();
			}
		});
		
		element = {
			'type': element_type,
			'category': element_category,
			'options': element_options,
			'items': []
		};
		
		element_container.find('.element-options .iterative-items .accordion-inner').each(function(index) {
			var item_options = {};
			
			jQuery(this).find('.rspbld-input, .js-editor-tinymce > .joomla-editor-tinymce, .codemirror-source, .js-editor-none > textarea').each(function() {
				var field = jQuery(this).data('name').split('-');
				
				item_options[field[0]] = jQuery(this).hasClass('codemirror-source') ? jQuery(this).text() : jQuery(this).val();
			});
			
			element.items[index] = {
				'type'		: element_type + '_item',
				'options'	: item_options
			};
		});
		return element;
	},
	
	changeElement: function () {
		var element_container = jQuery('#modal-element-settings .element-container');
		
		if (element_container.length) {
			element_container.find('.element-json').val(JSON.stringify(RSPageBuilderHelper.buildElementJson(element_container)));
			RSPageBuilderHelper.elementHtmlAjax(element_container.find('.edit-element'), element_container.find('.element-json').val(), '2');
			setTimeout(function() {
				RSPageBuilderHelper.fixAccordion();
				RSPageBuilderHelper.initMap(element_container);
			}, 1000);
			RSPageBuilderHelper.fixMooToolsCarousel();
		} else {
			return;
		}
	},
	
	sortNegativeFields: function(fields) {
		var neg_fields = [];
		
		for (var i = 0; i < fields.length; i++) {
			if (fields[i].match(/margin/)) {
				neg_fields.push(fields[i]);
			}
		}
		
		return neg_fields;
	},
	
	validateSizeInput: function(container, pixel_fields, em_fields, rem_fields, percentage_fields, multiple_mixed_fields) {
		var invalid_fields		= [],
			invalid_fields_html	= '',
			
			neg_pixel_fields			= RSPageBuilderHelper.sortNegativeFields(pixel_fields),
			neg_em_fields				= RSPageBuilderHelper.sortNegativeFields(em_fields),
			neg_rem_fields				= RSPageBuilderHelper.sortNegativeFields(rem_fields),
			neg_percentage_fields		= RSPageBuilderHelper.sortNegativeFields(percentage_fields),
			neg_multiple_mixed_fields	= RSPageBuilderHelper.sortNegativeFields(multiple_mixed_fields);
			
		container.find('.rspbld-input').each(function() {
			var pixel_regexp				= new RegExp('^(' + pixel_fields.join('|') + ')', 'i'),
				neg_pixel_regexp			= new RegExp('^(' + neg_pixel_fields.join('|') + ')', 'i'),
				
				em_regexp					= new RegExp('^(' + em_fields.join('|') + ')', 'i'),
				neg_em_regexp				= new RegExp('^(' + neg_em_fields.join('|') + ')', 'i'),
				
				rem_regexp					= new RegExp('^(' + rem_fields.join('|') + ')', 'i'),
				neg_rem_regexp				= new RegExp('^(' + neg_rem_fields.join('|') + ')', 'i'),
				
				percentage_regexp			= new RegExp('^(' + percentage_fields.join('|') + ')', 'i'),
				neg_percentage_regexp		= new RegExp('^(' + neg_percentage_fields.join('|') + ')', 'i'),
				
				multiple_mixed_regexp		= new RegExp('^(' + multiple_mixed_fields.join('|') + ')', 'i'),
				neg_multiple_mixed_regexp	= new RegExp('^(' + neg_multiple_mixed_fields.join('|') + ')', 'i'),
				
				all_regexp					= new RegExp(pixel_regexp.source + '|' + em_regexp.source + '|' + rem_regexp.source + '|' + percentage_regexp.source + '|' + multiple_mixed_regexp.source),
				
				pixel_value					= /^[0-9]+\.?[0-9]*px$/,
				neg_pixel_value				= /^-[0-9]+\.?[0-9]*px$/,
				
				em_value					= /^[0-9]+\.?[0-9]*em$/,
				neg_em_value				= /^-[0-9]+\.?[0-9]*em$/,
				
				rem_value					= /^[0-9]+\.?[0-9]*rem$/,
				neg_rem_value				= /^-[0-9]+\.?[0-9]*rem$/,
				
				percentage_value			= /^[0-9]+\.?[0-9]*\%$/,
				neg_percentage_value		= /^-[0-9]+\.?[0-9]*\%$/,
				
				multiple_mixed_values		= /^((auto)|([0-9]+\.?[0-9]*(px|em|rem|\%)))?((( )+(auto))|(( )+([0-9]+\.?[0-9]*(px|em|rem|\%))))?((( )+(auto))|(( )+([0-9]+\.?[0-9]*(px|em|rem|\%))))?((( )+(auto))|(( )+([0-9]+\.?[0-9]*(px|em|rem|\%))))?$/,
				neg_multiple_mixed_values	= /^((auto)|(-?[0-9]+\.?[0-9]*(px|em|rem|\%)))?((( )+(auto))|(( )+(-?[0-9]+\.?[0-9]*(px|em|rem|\%))))?((( )+(auto))|(( )+(-?[0-9]+\.?[0-9]*(px|em|rem|\%))))?((( )+(auto))|(( )+(-?[0-9]+\.?[0-9]*(px|em|rem|\%))))?$/,
				
				invalid						= true;
				
			if (jQuery(this).val() && all_regexp.test(jQuery(this).attr('data-name'))) {
				if (pixel_regexp.test(jQuery(this).attr('data-name')) && pixel_value.test(jQuery(this).val())) {
					invalid = false;
				} else if (neg_pixel_regexp.test(jQuery(this).attr('data-name')) && neg_pixel_value.test(jQuery(this).val())) {
					invalid = false;
				} else if (em_regexp.test(jQuery(this).attr('data-name')) && em_value.test(jQuery(this).val())) {
					invalid = false;
				} else if (neg_em_regexp.test(jQuery(this).attr('data-name')) && neg_em_value.test(jQuery(this).val())) {
					invalid = false;
				} else if (rem_regexp.test(jQuery(this).attr('data-name')) && rem_value.test(jQuery(this).val())) {
					invalid = false;
				} else if (neg_rem_regexp.test(jQuery(this).attr('data-name')) && neg_rem_value.test(jQuery(this).val())) {
					invalid = false;
				} else if (percentage_regexp.test(jQuery(this).attr('data-name')) && percentage_value.test(jQuery(this).val())) {
					invalid = false;
				} else if (neg_percentage_regexp.test(jQuery(this).attr('data-name')) && neg_percentage_value.test(jQuery(this).val())) {
					invalid = false;
				} else if (multiple_mixed_regexp.test(jQuery(this).attr('data-name')) && multiple_mixed_values.test(jQuery(this).val())) {
					invalid = false;
				} else if (neg_multiple_mixed_regexp.test(jQuery(this).attr('data-name')) && neg_multiple_mixed_values.test(jQuery(this).val())) {
					invalid = false;
				}
				
				if (invalid) {
					jQuery(this).addClass('invalid');
					jQuery(this).closest('.control-group').find('label').addClass('invalid');
					invalid_fields.push(jQuery(this));
					invalid_fields_html += '<p>' + Joomla.JText._('COM_RSPAGEBUILDER_INVALID_FIELD') + ': ' + RSPageBuilderHelper.elementFieldToTitle(container.attr('id'), jQuery(this).attr('data-name')) + '</p>';
				} else {
					jQuery(this).removeClass('invalid');
					jQuery(this).closest('.control-group').find('label').removeClass('invalid');
				}
			}
		});
		
		if (invalid_fields_html) {
			container.find('.alert.message').remove();
			container.find('.options-tab').before('<div class="alert alert-danger message"><h4>' + Joomla.JText._('COM_RSPAGEBUILDER_ERROR') + '</h4>' + invalid_fields_html + '</div>');
		} else {
			container.find('.alert.message').remove();
		}
		
		container.find('.options-tab .nav-tabs li a').removeClass('invalid');
		container.find('.iterative-items .accordion-heading a').removeClass('invalid');
		
		if (invalid_fields.length) {
			for (var i = 0; i < invalid_fields.length; i++) {
				if (!container.find('.options-tab .nav-tabs li a[href="#' + invalid_fields[i].closest('.tab-pane').attr('id') + '"]').hasClass('invalid')) {
					container.find('.options-tab .nav-tabs li a[href="#' + invalid_fields[i].closest('.tab-pane').attr('id') + '"]').addClass('invalid');
				}
				if (container.find('.iterative-items').length) {
					if (!container.find('.iterative-items .accordion-heading a[href="#' + invalid_fields[i].closest('.accordion-body').attr('id') + '"]').hasClass('invalid')) {
						container.find('.iterative-items .accordion-heading a[href="#' + invalid_fields[i].closest('.accordion-body').attr('id') + '"]').addClass('invalid');
					}
				}
			}
		}
		
		return invalid_fields.length;
	},
	
	validateFormatInput: function(container, video_fields) {
		var invalid_fields		= [],
			invalid_fields_html	= '';
			
		if (container.find('.element-preview .rspbld-video .rspbld-video-player').length) {
			container.find('.rspbld-input').each(function() {
				var video_regexp	= new RegExp('^(' + video_fields.join('|') + ')', 'i'),
					video_value		= /\.(asf|avi|flv|m4v|mp4|ogg|ogv|webm)$/,
					invalid			= true;
					
				if (jQuery(this).val() && video_regexp.test(jQuery(this).attr('data-name'))) {
					if (video_value.test(jQuery(this).val())) {
						invalid = false;
					}
					
					if (invalid) {
						jQuery(this).addClass('invalid');
						jQuery(this).closest('.control-group').find('label').addClass('invalid');
						invalid_fields.push(jQuery(this));
						invalid_fields_html += '<p>' + Joomla.JText._('COM_RSPAGEBUILDER_INVALID_FIELD') + ': ' + RSPageBuilderHelper.elementFieldToTitle(container.attr('id'), jQuery(this).attr('data-name')) + '</p>';
					} else {
						jQuery(this).removeClass('invalid');
						jQuery(this).closest('.control-group').find('label').removeClass('invalid');
					}
				}
			});
		}
		
		if (invalid_fields_html) {
			container.find('.alert.message').remove();
			container.find('.options-tab').before('<div class="alert alert-danger message"><h4>' + Joomla.JText._('COM_RSPAGEBUILDER_ERROR') + '</h4>' + invalid_fields_html + '</div>');
		} else {
			container.find('.alert.message').remove();
		}
		
		container.find('.options-tab .nav-tabs li a').removeClass('invalid');
		container.find('.iterative-items .accordion-heading a').removeClass('invalid');
		
		if (invalid_fields.length) {
			for (var i = 0; i < invalid_fields.length; i++) {
				if (!container.find('.options-tab .nav-tabs li a[href="#' + invalid_fields[i].closest('.tab-pane').attr('id') + '"]').hasClass('invalid')) {
					container.find('.options-tab .nav-tabs li a[href="#' + invalid_fields[i].closest('.tab-pane').attr('id') + '"]').addClass('invalid');
				}
				if (container.find('.iterative-items').length) {
					if (!container.find('.iterative-items .accordion-heading a[href="#' + invalid_fields[i].closest('.accordion-body').attr('id') + '"]').hasClass('invalid')) {
						container.find('.iterative-items .accordion-heading a[href="#' + invalid_fields[i].closest('.accordion-body').attr('id') + '"]').addClass('invalid');
					}
				}
			}
		}
		
		return invalid_fields.length;
	},
	
	pageToJson: function() {
		var page = [];
		
		jQuery('.rspbld-wrapper .rspbld-container').each(function(index) {
			var row				= jQuery(this),
				row_index		= index,
				row_attributes	= JSON.parse(JSON.stringify(eval('(' + jQuery(this).find('.row-json').val() + ')')));
			
			if (row_attributes.grid != 12) {
				row_attributes.grid = row_attributes.grid.split(',').join('');
			}
			
			page[row_index] = {
				'type'		: row_attributes.type,
				'grid'		: row_attributes.grid,
				'options'	: row_attributes.options,
				'columns'	: []
			};
			
			row.find('.column').each(function(index) {
				var	column				= jQuery(this),
					column_index		= index,
					column_attributes	= JSON.parse(JSON.stringify(eval('(' + jQuery(this).find('.column-json').val() + ')')));
					
				page[row_index].columns[column_index] = {
					'type' 		: column_attributes.type,
					'grid'		: column_attributes.grid,
					'options'	: column_attributes.options,
					'elements'	: []
				};
				
				column.find('.element-container').each(function(index) {
					var element				= jQuery(this),
						element_index		= index,
						element_attributes	= JSON.parse(JSON.stringify(eval('(' + jQuery(this).find('.element-json').val() + ')')));
					
					page[row_index].columns[column_index].elements[element_index] = {
						'type' 		: element_attributes.type,
						'category'	: element_attributes.category,
						'options'	: element_attributes.options,
						'items'		: element_attributes.items
					};
				});
			});
		});
		
		return JSON.stringify(page);
	},
	
	preventUnsaved: function(initialPage) {
		jQuery(window).on('beforeunload', function() {
			
			if (initialPage != RSPageBuilderHelper.pageToJson()) {
				setTimeout(function() {
					jQuery(window).off('beforeunload');
				}, 50);
				
				return Joomla.JText._('COM_RSPAGEBUILDER_LEAVE_PAGE');
			}
		});
	}
};