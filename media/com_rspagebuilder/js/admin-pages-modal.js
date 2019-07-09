(function() {
	"use strict";
	/**
	 * Javascript to insert the link
	 * View element calls jSelectPage when a page is clicked
	 * jSelectPage selects the clicked page and closes the select frame.
	 **/
	window.jSelectPage = function (id, title, object, link, lang) {
		window.parent.jModalClose();
	};

	document.addEventListener('DOMContentLoaded', function(){
		// Get the elements
		var elements = document.querySelectorAll('.select-link');

		for(var i = 0, l = elements.length; l>i; i++) {
			// Listen for click event
			elements[i].addEventListener('click', function (event) {
				event.preventDefault();
				var functionName = event.target.getAttribute('data-function');

				if (functionName === 'jSelectPage') {
					// Used in xtd_contacts
					window[functionName](event.target.getAttribute('data-id'), event.target.getAttribute('data-title'), null, event.target.getAttribute('data-uri'), event.target.getAttribute('data-language'));
				} else {
					// Used in com_menus
					window.parent[functionName](event.target.getAttribute('data-id'), event.target.getAttribute('data-title'), null, event.target.getAttribute('data-uri'), event.target.getAttribute('data-language'));
				}
			});
		}
	});
})();
