jQuery.fn.iconsList = function() {
	var helper				= {},
		current_select		= jQuery(this),
		current_container	= current_select.closest('.controls');
		
	if (typeof RSPageBuilderHelper != 'undefined') {
		helper = RSPageBuilderHelper;
	} else if (typeof RSPageBuilderElementsHelper != 'undefined') {
		helper = RSPageBuilderElementsHelper;
	} else {
		return;
	}
	// Open / close icons list
	current_container.find('.icons-list .selected').off();
	current_container.find('.icons-list .selected').on('click', function() {
		jQuery(this).next('.icons').toggleClass('in');
	});
	
	// Filter icons
	current_container.find('.icons-list .filter').off();
	current_container.find('.icons-list .filter').on('keyup', function() {
		var value	= jQuery(this).val(),
			list	= jQuery(this).next('.list');
			
		list.find(' > li').each(function() {
			if (jQuery(this).find(' > span').text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
				jQuery(this).css('display', 'block');
			} else {
				jQuery(this).css('display', 'none');
			}
		});
	});
	
	// Change icon
	current_container.find('.icons-list .list > li').off();
	current_container.find('.icons-list .list > li').on('click', function() {
		if (jQuery(this).hasClass('active')) {
			return;
		} else {
			var selected_icon		= current_container.find('.icons-list .selected'),
				element_container	= jQuery('#modal-element-settings .element-container');
				
			selected_icon.empty();
			selected_icon.append(jQuery(this).html());
			current_container.find('.icons-list .list > li').removeAttr('class');
			jQuery(this).addClass('active');
			
			if (selected_icon.find('i').length) {
				if (selected_icon.find('i').hasClass('no-icon')) {
					current_container.find('.iconslist').val('');
				} else {
					current_container.find('.iconslist').val(selected_icon.find('i').attr('class').replace('fa fa-', ''));
				}
			}
			element_container.find('.element-json').val(JSON.stringify(helper.buildElementJson(element_container)));
			
			helper.elementHtmlAjax(element_container.find('.edit-element'), element_container.find('.element-json').val(), '2');
		}
		current_container.find('.icons').removeClass('in');
	});
}