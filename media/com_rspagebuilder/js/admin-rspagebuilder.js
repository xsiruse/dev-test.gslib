jQuery(function() {
	jQuery(document).ready(function() {
		
		// Check for unsaved changes and ask before leaving the page
		var initialPage = RSPageBuilderHelper.pageToJson();
		
		jQuery('.navbar .container-fluid > a, .navbar .dropdown li:not(.dropdown-submenu) > a').click(function() {
			RSPageBuilderHelper.preventUnsaved(initialPage);
		});
		
		jQuery('.navbar .dropdown li.dropdown-submenu > a').click(function(e) {
			RSPageBuilderHelper.preventUnsaved(initialPage);
			e.preventDefault();
		});
		
		jQuery('.navbar .dropdown-submenu > a').hover(function() {
			jQuery('.navbar .nav-empty > li > a').click(function() {
				RSPageBuilderHelper.preventUnsaved(initialPage);
			});
		});
		
		RSPageBuilderHelper.initjQueryUI();
		RSPageBuilderHelper.fixMooTools();
		
		// Hide modals
		jQuery('#modal-elements-list').modal('hide');
		jQuery('#modal-element-settings').modal('hide');
		jQuery('#modal-element-view-html').modal('hide');
		jQuery('#modal-icons-list').modal('hide');
		jQuery('#jform_id').closest('.control-group').hide();
		
		// Prevent modal form submission on 'Enter' key press
		jQuery(window).keydown(function(e) {
			if (e.keyCode == 13) {
				e.preventDefault();
				return true;
			}
		});
		
		jQuery('select.chzn-select').each(function() {
			jQuery(this).chosen('destroy');
		});
		
		// Full width page
		if (jQuery('#jform_full_width').find('label.btn-danger').hasClass('active')) {
			jQuery('#rspbld').addClass('container');
			// remove container only rows that aren't full width
			jQuery('#rspbld').find('.columns').each(function(i,el){
				var row_settings = JSON.parse(JSON.stringify(eval('(' + jQuery(this).siblings('.row-json').val() + ')')))
				if (row_settings.options.row_full_width == 0)
					jQuery(this).removeClass('container');
			});
		}
		jQuery(document).on('change', '#jform_full_width.radio.btn-group', function() {
			if (jQuery(this).find('label.btn-success').hasClass('active')) {
				jQuery('#rspbld').removeClass('container');
				jQuery('#rspbld').find('.columns').each(function(i,el){
					var row_settings = JSON.parse(JSON.stringify(eval('(' + jQuery(this).siblings('.row-json').val() + ')')))
					if (row_settings.options.row_full_width == 0)
						jQuery(el).addClass('container');
				});
			
			} else if (jQuery(this).find('label.btn-danger').hasClass('active')) {
				jQuery('#rspbld').addClass('container');
				jQuery('#rspbld').find('.columns').each(function(i,el){
					var row_settings = JSON.parse(JSON.stringify(eval('(' + jQuery(this).siblings('.row-json').val() + ')')))
					if (row_settings.options.row_full_width == 0)
						jQuery(el).removeClass('container');
				});
			}
		});
		
		// Change selected option
		jQuery(document).on('change', '.modal select', function() {
			 var select_val = jQuery(this).val();
			 
			 jQuery(this).find('option').each(function() {
				 if (jQuery(this).attr('value') == select_val) {
					 jQuery(this).attr('selected', 'selected');
				 } else {
					 jQuery(this).removeAttr('selected');
				 }
			 });
		});
		
		// Add row
		jQuery(document).on('click','.add-row, #add-row',function() {
			var new_row = jQuery('.rspbld-container.hidden').clone();
			
			new_row.removeClass('hidden');
			jQuery('.rspbld-wrapper').append(new_row);
			RSPageBuilderHelper.initjQueryUI();
			RSPageBuilderHelper.initTooltip();
			RSPageBuilderHelper.initPopover();
			
			jQuery('html, body').animate({
				scrollTop: new_row.offset().top
			}, 1000);
		});
		
		// Duplicate row
		jQuery(document).on('click', '.duplicate-row', function() {
			var row_container	= jQuery(this).closest('.rspbld-container');
				clone			= {};
			
			RSPageBuilderHelper.destroyThisTooltip(row_container);
			RSPageBuilderHelper.destroyThisPopover(row_container);
			clone = row_container.clone();
			
			clone.insertAfter(row_container).fadeIn(500);
			
			RSPageBuilderHelper.initjQueryUI();
			RSPageBuilderHelper.removeTooltip();
			RSPageBuilderHelper.removePopover();
			RSPageBuilderHelper.initTooltip();
			RSPageBuilderHelper.initPopover();
		});
		
		// Open row settings
		jQuery(document).on('click', '.configure-row', function() {
			var row = jQuery(this).closest('.row-actions').next('.row');
			
			RSPageBuilderHelper.renderRowAjax(row.find('.row-json').val());
			
			jQuery('.row').removeClass('current-row');
			row.addClass('current-row');
		});
		
		// Remove row
		jQuery(document).on('click', '.delete-row', function() {
			if (confirm(Joomla.JText._('COM_RSPAGEBUILDER_SURE_DELETE_ROW')) == true) {
				jQuery(this).closest('.rspbld-container').fadeOut(100, function() {
					jQuery(this).remove();
				});
			}
		});
		
		// Save row settings
		jQuery(document).on('click', '#save-row-settings', function() {
			var	current_row				= jQuery('.current-row'),
				row_attributes			= {},
				row_options				= {},
				container				= jQuery('#modal-row-settings'),
				pixel_fields			= [
					'title_font_size',
					'title_margin',
					'title_padding',
					'subtitle_font_size',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				em_fields				= [
					'title_font_size',
					'title_margin',
					'title_padding',
					'subtitle_font_size',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				rem_fields				= [
					'title_font_size',
					'title_margin',
					'title_padding',
					'subtitle_font_size',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				percentage_fields		= [
					'title_margin',
					'title_padding',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				multiple_mixed_fields	= [
					'title_margin',
					'title_padding',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				invalid_fields			= RSPageBuilderHelper.validateSizeInput(container, pixel_fields, em_fields, rem_fields, percentage_fields, multiple_mixed_fields);
				
			if (!invalid_fields) {
				RSPageBuilderHelper.removeComponents(container.find('.row-options'));
				
				container.find('.row-options .rspbld-input').each(function() {
					if (jQuery(this).data('name') == 'type' || jQuery(this).data('name') == 'grid') {
						row_attributes[jQuery(this).data('name')] = jQuery(this).val();
					} else {
						row_options[jQuery(this).data('name')] = jQuery(this).val();
					}
				});
				row_attributes.options = row_options;
				current_row.find('.row-json').val(JSON.stringify(row_attributes));
				
				if (container.find('.row-options #row_full_width label.active').prev('input').val() == '1') {
					if (current_row.closest('.rspbld-container').find('.columns').hasClass('container')) {
						current_row.closest('.rspbld-container').find('.columns').removeClass('container');
					}
				} else {
					if (!current_row.closest('.rspbld-container').find('.columns').hasClass('container')) {
						current_row.closest('.rspbld-container').find('.columns').addClass('container');
					}
				}
				current_row.removeClass('current-row');
				container.modal('hide');
			}
		});
		
		// Open column settings
		jQuery(document).on('click', '.configure-column', function() {
			var column = jQuery(this).closest('.column');
			
			RSPageBuilderHelper.renderColumnAjax(column.find('.column-json').val());
			
			jQuery('.column').removeClass('current-column');
			column.addClass('current-column');
		});
		
		// Save column settings
		jQuery(document).on('click', '#save-column-settings', function() {
			var	current_column			= jQuery('.current-column'),
				column_attributes		= {},
				column_options			= {},
				
				container				= jQuery('#modal-column-settings'),
				pixel_fields			= [
					'title_font_size',
					'title_margin',
					'title_padding',
					'subtitle_font_size',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				em_fields				= [
					'title_font_size',
					'title_margin',
					'title_padding',
					'subtitle_font_size',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				rem_fields				= [
					'title_font_size',
					'title_margin',
					'title_padding',
					'subtitle_font_size',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				percentage_fields		= [
					'title_margin',
					'title_padding',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				multiple_mixed_fields	= [
					'title_margin',
					'title_padding',
					'subtitle_margin',
					'subtitle_padding',
					'margin',
					'padding'
				],
				invalid_fields			= RSPageBuilderHelper.validateSizeInput(container, pixel_fields, em_fields, rem_fields, percentage_fields, multiple_mixed_fields);
				
			if (!invalid_fields) {
				RSPageBuilderHelper.removeComponents(container.find('.column-options'));
				
				container.find('.column-options .rspbld-input').each(function() {
					if (jQuery(this).data('name') == 'type' || jQuery(this).data('name') == 'grid') {
						column_attributes[jQuery(this).data('name')] = jQuery(this).val();
					} else {
						column_options[jQuery(this).data('name')] = jQuery(this).val();
					}
				});
				column_attributes.options = column_options;
				current_column.find('.column-json').val(JSON.stringify(column_attributes));
				current_column.removeClass('current-column');
				
				container.modal('hide');
			}
		});
		
		// Add new element
		jQuery(document).on('click', '.add-element', function() {
			var columns				= jQuery('.rspbld-wrapper .column-content'),
				elements_clone		= jQuery('.elements-wrapper .elements').clone(),
				elements_wrapper	= jQuery('#modal-elements-list .elements-list-wrapper'),
				elements_categories	= jQuery('#modal-elements-list .elements-categories ul li');
			
			columns.removeClass('active-column-content');
			columns.find('.element-container').each(function() {
				jQuery(this).removeClass('create-element');
			});
			elements_categories.removeClass('active')
			elements_categories.first().addClass('active');
			jQuery(this).parent().parent().addClass('active-column-content');
			
			elements_wrapper.empty();
			elements_wrapper.append(elements_clone);
			jQuery('#modal-element-view-html').modal('hide');
			jQuery('#modal-elements-list').modal('show');
			jQuery('#modal-element-settings #save-element-settings').removeClass('edit-this-element').addClass('add-new-element');
		});
		
		// Elements categories
		jQuery(document).on('click', '#modal-elements-list .elements-categories > ul > li > a', function() {
			var elements_categories = jQuery(this).closest('ul'),
				current_list_item	= jQuery(this).closest('li');
			
			elements_categories.children().removeClass('active');
			current_list_item.addClass('active');
			
			if (current_list_item.data('category') == 'all_elements') {
				jQuery('#modal-elements-list .elements').children().removeClass('hidden');
				jQuery('#modal-elements-list .elements .my_elements').addClass('hidden');
			} else {
				jQuery('#modal-elements-list .elements').children().each(function() {
					if (jQuery(this).hasClass(current_list_item.data('category'))) {
						jQuery(this).removeClass('hidden');
					} else {
						jQuery(this).addClass('hidden');
					}
				});
			}
		});
		
		// Elements search
		jQuery(document).off('#modal-elements-list .elements-filter');
		jQuery(document).on('keyup', '#modal-elements-list .elements-filter', function() {
			var input_value			= jQuery(this).val(),
				elements_wrapper	= jQuery('#modal-elements-list .elements-list-wrapper');
				
			elements_wrapper.find('> ul > li').each(function() {
				if (jQuery(this).find('> a > .element-title').text().toLowerCase().indexOf(input_value.toLowerCase()) >= 0) {
					jQuery(this).removeClass('filter-hidden');
				} else {
					jQuery(this).addClass('filter-hidden');
				}
			});
		});
		
		// Open element settings
		jQuery(document).on('click', '#modal-elements-list .elements > li > a', function() {
			jQuery('#modal-elements-list').modal('hide');
			jQuery('#modal-element-settings').find('.modal-title').text(jQuery(this).next().find('.element-title').text());
			RSPageBuilderHelper.renderElementAjax(jQuery(this).next().find('.element-options'), jQuery(this).next().find('.element-json').val());
			setTimeout(function() {
				RSPageBuilderHelper.initMap(jQuery('#modal-element-settings .element-container'));
			}, 1000);
			jQuery('#modal-element-settings').modal('show');
		});
		
		// Edit element
		jQuery(document).on('click', '.edit-element', function() {
			var element_container = jQuery(this).closest('.element-container');
				
			element_container.addClass('create-element');
			
			if (element_container.find('.element-title').text() != element_container.find('.element-type').text()) {
				jQuery('#modal-element-settings .modal-title').text(element_container.find('.element-title').text() + ' (' + element_container.find('.element-type').text() + ')');
			} else {
				jQuery('#modal-element-settings .modal-title').text(element_container.find('.element-title').text());
			}
			RSPageBuilderHelper.renderElementAjax(element_container.find('.element-options'), element_container.find('.element-json').val());
			
			jQuery('#modal-element-settings #save-element-settings').removeClass('add-new-element').addClass('edit-this-element');
			jQuery('#modal-element-settings').modal('show');
		});
		
		// View element HTML
		jQuery(document).on('click', '.view-element-html', function() {
			RSPageBuilderHelper.elementHtmlAjax(jQuery(this), jQuery(this).closest('.element').find('.element-json').val(), jQuery('#jform_bootstrap_version').find('label.active').prev('input').val());
		});
		
		// Duplicate element
		jQuery(document).on('click', '.duplicate-element', function() {
			var element_column		= jQuery(this).closest('.column-content'),
				element_container	= jQuery(this).closest('.element-container'),
				element_clone		= {};
				
			RSPageBuilderHelper.destroyThisTooltip(element_container);
			RSPageBuilderHelper.destroyThisPopover(element_container);
			
			element_container.removeClass('create-element');
			
			element_clone = element_container.clone();
			element_clone.hide();
			element_clone.insertAfter(element_container);
			element_clone.fadeIn(500);
			
			RSPageBuilderHelper.removeTooltip();
			RSPageBuilderHelper.removePopover();
			RSPageBuilderHelper.initTooltip();
			RSPageBuilderHelper.initPopover();
		});
		
		// Remove element
		jQuery(document).on('click', '.remove-element', function() {
			if (confirm(Joomla.JText._('COM_RSPAGEBUILDER_SURE_REMOVE_ELEMENT')) == true) {
				jQuery(this).closest('.element-container').remove();
			}
		});
		
		// Add iterative item
		jQuery(document).on('click', '#modal-element-settings .add-item', function() {
			RSPageBuilderHelper.duplicateItem(jQuery(this).next().find(' > .accordion-group:first-child'));
			RSPageBuilderHelper.changeElement();
		});
		
		// Duplicate iterative item
		jQuery(document).on('click', '#modal-element-settings .duplicate-item', function() {
			RSPageBuilderHelper.duplicateItem(jQuery(this).closest('.accordion-group'));
			RSPageBuilderHelper.changeElement();
		});
		
		// Delete iterative item
		jQuery(document).on('click', '#modal-element-settings .delete-item', function() {
			if (jQuery(this).closest('.accordion').find('.accordion-group').length > 1) {
				if (confirm(Joomla.JText._('COM_RSPAGEBUILDER_SURE_REMOVE_ITEM')) == true) {
					jQuery(this).closest('.accordion-group').fadeOut(500, function() {
						jQuery(this).remove();
						
						RSPageBuilderHelper.changeElement();
					});
				}
			} else {
				alert(Joomla.JText._('COM_RSPAGEBUILDER_REMOVE_LAST_ITEM'));
				return true;
			}
		});
		
		// Close iterative item
		jQuery(document).on('click', '#modal-element-settings .close-item', function() {
			var accordion_group = jQuery(this).closest('.accordion-group');
			
			if (accordion_group.find('.accordion-body').hasClass('in')) {
				accordion_group.find('.accordion-body').removeClass('in');
				accordion_group.find('.accordion-body').animate({
					height: 0
				}, 100);
			}
		});
		
		// Dynamically change element
		jQuery(document).on('change', '#modal-element-settings .element-options .rspbld-input', function() {
			var element_container = jQuery('#modal-element-settings .element-container'),
				current_input 	  = jQuery(this);
			
			element_container.find('.element-json').val(JSON.stringify(RSPageBuilderHelper.buildElementJson(element_container)));
			
			RSPageBuilderHelper.elementHtmlAjax(jQuery('#modal-element-settings .edit-element'), element_container.find('.element-json').val(), '2');
			setTimeout(function() {
				RSPageBuilderHelper.fixAccordion();
				if (!current_input.hasClass('minicolors')) {
					RSPageBuilderHelper.initMap(element_container);
				} else if (current_input.parent().find('.minicolors-panel').css('display') == 'none') {
					RSPageBuilderHelper.initMap(element_container);
				}
			}, 1000);
			RSPageBuilderHelper.fixMooToolsCarousel();
		});
		jQuery(document).on('change', '#modal-element-settings .element-options .js-editor-none > textarea, #modal-element-settings .element-options .field-calendar .js-calendar select', function() {
			RSPageBuilderHelper.changeElement();
		});
		jQuery(document).on('click', '#modal-element-settings .element-options .field-calendar .js-calendar .day', function() {
			RSPageBuilderHelper.changeElement();
		});
		
		// Add / edit element
		jQuery(document).on('click', '#modal-element-settings #save-element-settings', function() {
			var container				= jQuery('#modal-element-settings')
				element_container		= container.find('.element-container'),
				element_container_clone	= {},
				
				pixel_fields			= [
					'border_radius',
					'border_width',
					'box_margin',
					'box_padding',
					'client_avatar_height',
					'client_avatar_margin',
					'client_avatar_padding',
					'client_avatar_width',
					'content_border_radius',
					'content_border_width',
					'content_margin',
					'content_padding',
					'controls_font_size',
					'controls_size',
					'countdown_font_size',
					'details_font_size',
					'font_size',
					'height',
					'icon_font_size',
					'icon_margin',
					'icon_padding',
					'image_height',
					'image_margin',
					'image_padding',
					'image_width',
					'indicators_size',
					'item_bar_height',
					'item_content_margin',
					'item_content_padding',
					'item_font_size',
					'item_height',
					'item_image_height',
					'item_image_width',
					'item_margin',
					'item_padding',
					'item_percentage_font_size',
					'item_size',
					'item_title_font_size',
					'item_title_icon_font_size',
					'item_title_margin',
					'item_title_padding',
					'item_width',
					'margin',
					'marker_title_font_size',
					'number_font_size',
					'padding',
					'price_font_size',
					'social_icons_font_size',
					'social_icons_margin',
					'social_icons_padding',
					'subtitle_font_size',
					'subtitle_margin',
					'subtitle_padding',
					'tag_font_size',
					'tag_margin',
					'tag_padding',
					'tags_margin',
					'tags_padding',
					'text_font_size',
					'title_font_size',
					'title_margin',
					'title_padding',
					'width'
				],
				em_fields				= [
					'border_radius',
					'border_width',
					'box_margin',
					'box_padding',
					'client_avatar_margin',
					'client_avatar_padding',
					'content_border_radius',
					'content_margin',
					'content_padding',
					'controls_font_size',
					'controls_size',
					'countdown_font_size',
					'details_font_size',
					'font_size',
					'icon_font_size',
					'icon_margin',
					'icon_padding',
					'image_margin',
					'image_padding',
					'indicators_size',
					'item_content_margin',
					'item_content_padding',
					'item_font_size',
					'item_margin',
					'item_padding',
					'item_percentage_font_size',
					'item_title_font_size',
					'item_title_icon_font_size',
					'item_title_margin',
					'item_title_padding',
					'margin',
					'marker_title_font_size',
					'number_font_size',
					'padding',
					'price_font_size',
					'social_icons_font_size',
					'social_icons_margin',
					'social_icons_padding',
					'subtitle_font_size',
					'subtitle_margin',
					'subtitle_padding',
					'tag_font_size',
					'tag_margin',
					'tag_padding',
					'tags_margin',
					'tags_padding',
					'text_font_size',
					'title_font_size',
					'title_margin',
					'title_padding'
				],
				rem_fields				= [
					'border_radius',
					'border_width',
					'box_margin',
					'box_padding',
					'client_avatar_margin',
					'client_avatar_padding',
					'content_border_radius',
					'content_margin',
					'content_padding',
					'controls_font_size',
					'controls_size',
					'countdown_font_size',
					'details_font_size',
					'font_size',
					'icon_font_size',
					'icon_margin',
					'icon_padding',
					'image_margin',
					'image_padding',
					'indicators_size',
					'item_content_margin',
					'item_content_padding',
					'item_font_size',
					'item_margin',
					'item_padding',
					'item_percentage_font_size',
					'item_title_font_size',
					'item_title_icon_font_size',
					'item_title_margin',
					'item_title_padding',
					'margin',
					'marker_title_font_size',
					'number_font_size',
					'padding',
					'price_font_size',
					'social_icons_font_size',
					'social_icons_margin',
					'social_icons_padding',
					'subtitle_font_size',
					'subtitle_margin',
					'subtitle_padding',
					'tag_font_size',
					'tag_margin',
					'tag_padding',
					'tags_margin',
					'tags_padding',
					'text_font_size',
					'title_font_size',
					'title_margin',
					'title_padding'
				],
				percentage_fields		= [
					'border_radius',
					'box_margin',
					'box_padding',
					'client_avatar_height',
					'client_avatar_margin',
					'client_avatar_padding',
					'client_avatar_width',
					'content_border_radius',
					'content_margin',
					'content_padding',
					'height',
					'icon_margin',
					'icon_padding',
					'image_height',
					'image_margin',
					'image_padding',
					'image_width',
					'item_bar_width',
					'item_content_margin',
					'item_content_padding',
					'item_height',
					'item_image_height',
					'item_image_width',
					'item_margin',
					'item_padding',
					'item_title_margin',
					'item_title_padding',
					'item_width',
					'margin',
					'padding',
					'social_icons_margin',
					'social_icons_padding',
					'subtitle_margin',
					'subtitle_padding',
					'tag_margin',
					'tag_padding',
					'tags_margin',
					'tags_padding',
					'title_margin',
					'title_padding',
					'width'
				],
				multiple_mixed_fields	= [
					'box_margin',
					'box_padding',
					'client_avatar_margin',
					'client_avatar_padding',
					'content_margin',
					'content_padding',
					'icon_margin',
					'icon_padding',
					'image_margin',
					'image_padding',
					'item_content_margin',
					'item_content_padding',
					'item_margin',
					'item_padding',
					'item_title_margin',
					'item_title_padding',
					'margin',
					'padding',
					'social_icons_margin',
					'social_icons_padding',
					'subtitle_margin',
					'subtitle_padding',
					'tag_margin',
					'tag_padding',
					'tags_margin',
					'tags_padding',
					'title_margin',
					'title_padding'
				],
				video_fields 			= [
					'url'
				],
				
				invalid_size_fields		= RSPageBuilderHelper.validateSizeInput(container, pixel_fields, em_fields, rem_fields, percentage_fields, multiple_mixed_fields);
				invalid_format_fields	= RSPageBuilderHelper.validateFormatInput(container, video_fields),
				invalid_fields			= invalid_size_fields + invalid_format_fields;
				
			if (!invalid_fields) {
				element_container.find('.element-json').val(JSON.stringify(RSPageBuilderHelper.buildElementJson(element_container)));
				RSPageBuilderHelper.removeComponents(element_container.find('.element-options'));
				element_container.find('.element-options').empty();
				element_container.find('.element-options').addClass('hidden');
				
				element_container_clone = element_container.clone();
				
				if (jQuery(this).hasClass('add-new-element')) {
					setTimeout(function() {
						jQuery('.rspbld-wrapper .column-content.active-column-content').append(element_container_clone);
					}, 100);
				} else {
					jQuery('.rspbld-wrapper .create-element .element').remove();
					jQuery('.rspbld-wrapper .create-element').append(element_container_clone.find('.element'));
					jQuery('.rspbld-wrapper .create-element').removeClass('create-element');
				}
				
				// Initialize element actions tooltip
				RSPageBuilderHelper.removeTooltip();
				RSPageBuilderHelper.initTooltip();
				
				// Initialize element actions popover
				RSPageBuilderHelper.removePopover();
				RSPageBuilderHelper.initPopover();
				
				// Remove videos
				RSPageBuilderHelper.removeVideos();
				
				container.modal('hide');
				jQuery(this).closest('.modal-content').find('.modal-body > .row-fluid').removeAttr('style');
				jQuery(this).closest('.modal-content').find('.modal-body > .loader').removeAttr('style');
			}
		});
		
		// Close element settings modal
		jQuery(document).on('click', '#modal-element-settings #close-element-settings, #modal-element-settings #cancel-element-settings', function() {
			jQuery('.create-element').removeClass('create-element');
			
			// Remove videos
			RSPageBuilderHelper.removeVideos();
		});
		
		// Iterative item title
		jQuery(document).on('keyup', '#modal-element-settings .accordion [data-name*="item_title-"], #modal-element-settings .accordion [data-name*="marker_title-"], #modal-element-settings [data-type="rspbld_price_box"] ~ .element-options .accordion [data-name*="item_text-"]', function() {
			jQuery(this).closest('.accordion-group').find('.accordion-toggle').text(jQuery(this).val());
		});

		// Change row grid
		jQuery(document).on('click', '.row-grid-list > li > a', function() {
			if (jQuery(this).hasClass('active')) {
				return true;
			} else {
				var container				= jQuery(this).closest('.rspbld-container'),
					row						= container.find('.row'),
					row_attributes			= JSON.parse(JSON.stringify(eval('(' + row.find('.row-json').val() + ')'))),
					row_options_clone		= {},
					row_json_clone			= {},
					grid_list				= jQuery(this).closest('.row-grid-list'),
					prev_data_grid			= grid_list.find('.active').data('grid'),
					prev_grid				= [],
					prev_columns			= [],
					current_data_grid		= jQuery(this).data('grid'),
					current_grid			= [],
					last_column_attributes	= JSON.parse(JSON.stringify(eval('(' + container.find('.column:last .column-json').val() + ')'))),
					new_grid				= '',
					old_grid				= {};
					
				grid_list.find('.active').removeClass('active');
				jQuery(this).addClass('active');
				
				if (prev_data_grid == 12) {
					prev_grid = ["12"];
				} else {
					prev_grid = prev_data_grid.split(',');
				}
				if (current_data_grid == 12) {
					current_grid = ["12"];
					row_attributes.grid = current_data_grid;
				} else {
					current_grid = current_data_grid.split(',');
					row_attributes.grid = current_data_grid.replace(',', '', 'g');
				}
				row.find('.row-json').val(JSON.stringify(row_attributes));
				
				container.find('.column').each(function(index) {
					jQuery(this).find('.column-content .add-element-container').remove();
					prev_columns[index] = jQuery(this).find('.column-content').html();
				});
				
				// Change row grid in one with less columns
				if (prev_grid.length > current_grid.length) {
					for (var i = 0; i < current_grid.length; i++) {
						new_grid +='<div class="column span' + current_grid[i] + '">';
						new_grid += '<div class="column-content">';
						last_column_attributes.grid = current_grid[i];
						
						if (prev_columns[i]) {
							new_grid += prev_columns[i];
						}
						
						// Move elements to last column of the grid
						if (i == (current_grid.length - 1)) {
							for (var j = i + 1; j < prev_grid.length; j++) {
								if (prev_columns[j]) {
									new_grid += prev_columns[j];
								}
							}
						}
						new_grid += '<div class="add-element-container">';
						new_grid += '<a class="add-element" href="javascript:void(0)"><i class="fa fa-plus"></i></a>';
						new_grid += '</div>';
						new_grid += '</div>';
						new_grid += '<div class="column-actions">';
						new_grid += '<a class="configure-column" href="javascript:void(0)" data-rel="tooltip" data-title="' + Joomla.JText._('COM_RSPAGEBUILDER_CONFIGURE_COLUMN') + '"><i class="fa fa-gears"></i></a>';
						new_grid += '</div>';
						new_grid += '<div class="column-options hidden">';
						new_grid += '</div>';
						new_grid += '<input class="column-json" type="hidden" value="' + JSON.stringify(last_column_attributes).replace(/\"/g, '\'') + '">';
						new_grid += '</div>';
					}
					
				// Change row grid in one with more columns
				} else {
					for (var i = 0; i < current_grid.length; i++) {
						new_grid +='<div class="column span' + current_grid[i] + '">';
						last_column_attributes.grid = current_grid[i];
						
						if (prev_columns[i]) {
							new_grid += '<div class="column-content ui-sortable">';
							new_grid += prev_columns[i];
						} else {
							new_grid += '<div class="column-content">';
						}
						new_grid += '<div class="add-element-container">';
						new_grid += '<a class="add-element" href="javascript:void(0)"><i class="fa fa-plus"></i></a>';
						new_grid += '</div>';
						new_grid += '</div>';
						new_grid += '<div class="column-actions">';
						new_grid += '<a class="configure-column" href="javascript:void(0)" data-rel="tooltip" data-title="' + Joomla.JText._('COM_RSPAGEBUILDER_CONFIGURE_COLUMN') + '"><i class="fa fa-gears"></i></a>';
						new_grid += '</div>';
						new_grid += '<div class="column-options hidden">';
						new_grid += '</div>';
						new_grid += '<input class="column-json" type="hidden" value="' + JSON.stringify(last_column_attributes).replace(/\"/g, '\'') + '">';
						new_grid += '</div>';
					}
				}
				old_grid			= container.find('.column');
				row_options_clone	= container.find('.row-options');
				row_json_clone		= container.find('.row-json');
				
				// Remove old row grid
				old_grid.remove();
				container.find('.row-options').remove();
				container.find('.row-json').remove();
				
				// Add new row grid
				container.find('.row .columns').append(new_grid);
				container.find('.row').append(row_options_clone);
				container.find('.row').append(row_json_clone);
				
				RSPageBuilderHelper.initTooltip();
				RSPageBuilderHelper.initPopover();
				RSPageBuilderHelper.initjQueryUI();
				
				return true;
			}
		});
		
		// Remove modal loader style
		jQuery(document).on('click', '#close-row-settings, #cancel-row-settings, #close-column-settings, #cancel-column-settings, #close-element-settings, #cancel-element-settings', function() {
			jQuery(this).closest('.modal-content').find('.modal-body > .row-fluid').removeAttr('style');
			jQuery(this).closest('.modal-content').find('.modal-body > .loader').removeAttr('style');
		});
		
		// Fix tinyMCE editor plugins in modal
		jQuery(document).on('focusin', function(e) {
			if (jQuery(e.target).closest('.mce-window').length) {
				e.stopImmediatePropagation();
			}
		});
	});
	
	Joomla.submitbutton = function(task) {
		jQuery('#jform_content').val(RSPageBuilderHelper.pageToJson());
		Joomla.submitform(task);
	}
	
	RSPageBuilderHelper.initTooltip();
	RSPageBuilderHelper.initPopover();
});