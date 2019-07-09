!function ($) {

	"use strict"; // jshint ;_;

	/* RSModal class */

	var RSModal = function (element, options) {
		this.options	= options;
		this.$element	= $(element).delegate('[data-dismiss="modal"]', 'click.dismiss.modal', $.proxy(this.hide, this));
		
		this.options.remote && this.$element.find('.modal-body').load(this.options.remote);
	}

	RSModal.prototype = {

		constructor	: RSModal,
	  
		toggle		: function () {
			return this[!this.isShown ? 'show' : 'hide']();
		},
		
		show: function () {
			var current 	= this,
				show_event	= $.Event('show');

			this.$element.trigger(show_event);

			if (this.isShown || show_event.isDefaultPrevented()) {
				return;
			}

			this.isShown = true;

			this.escape();

			this.backdrop(function () {
				var transition = $.support.transition && current.$element.hasClass('slide');

				if (!current.$element.parent().length) {
					current.$element.appendTo(document.body) //don't move modals dom position
				}

				current.$element.show();

				if (transition) {
					current.$element[0].offsetWidth // force reflow
				}

				current.$element.addClass('drop');
				current.$element.attr('aria-hidden', false);

				current.enforceFocus();

				transition ?
					current.$element.one($.support.transition.end, function () {
						current.$element.focus().trigger('shown');
					}) :
					current.$element.focus().trigger('shown');
			});
		},

		hide: function (e) {
			var hide_event	= $.Event('hide');
			
			e && e.preventDefault();

			this.$element.trigger(hide_event);

			if (!this.isShown || hide_event.isDefaultPrevented()) return

			this.isShown = false;

			this.escape();

			$(document).off('focusin.modal');

			this.$element.removeClass('drop');
			this.$element.attr('aria-hidden', true);

			$.support.transition && this.$element.hasClass('slide') ? this.hideWithTransition() : this.hideRSModal();
		},

		enforceFocus: function () {
			var current = this;
			
			$(document).on('focusin.modal', function (e) {
				if (current.$element[0] !== e.target && !current.$element.has(e.target).length) {
					current.$element.focus();
				}
			})
		},

		escape: function () {
			var current = this;
			
			if (this.isShown && this.options.keyboard) {
				this.$element.on('keyup.dismiss.modal', function (e) {
					e.which == 27 && current.hide();
				});
			} else if (!this.isShown) {
				this.$element.off('keyup.dismiss.modal');
			}
		},

		hideWithTransition: function () {
			var current	= this,
			    timeout = setTimeout(function () {
					current.$element.off($.support.transition.end);
					current.hideRSModal();
				}, 500);

			this.$element.one($.support.transition.end, function () {
				clearTimeout(timeout);
				current.hideRSModal();
			});
		},

		hideRSModal: function () {
			var current = this;
			
			this.$element.hide()
			this.backdrop(function () {
			  current.removeBackdrop();
			  current.$element.trigger('hidden');
			});
		},

		removeBackdrop: function () {
			this.$backdrop && this.$backdrop.remove();
			this.$backdrop = null;
		},

		backdrop: function (callback) {
			var animate = this.$element.hasClass('fade') ? 'fade' : '';

			if (this.isShown && this.options.backdrop) {
				var doAnimate = $.support.transition && animate;

				this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />').appendTo(document.body);

				this.$backdrop.click(
					this.options.backdrop == 'static' ? $.proxy(this.$element[0].focus, this.$element[0]) : $.proxy(this.hide, this)
				);

				if (doAnimate) {
					this.$backdrop[0].offsetWidth; // force reflow
				}

				this.$backdrop.addClass('in');

				if (!callback) {
					return;
				}

				doAnimate ? this.$backdrop.one($.support.transition.end, callback) : callback();
			} else if (!this.isShown && this.$backdrop) {
				this.$backdrop.removeClass('in');

				$.support.transition && this.$element.hasClass('fade') ? this.$backdrop.one($.support.transition.end, callback) : callback();
			} else if (callback) {
				callback();
			}
		}
	}


	/* RSModal Plugin */

	var old = $.fn.rsmodal

	$.fn.rsmodal = function (option) {
		return this.each(function () {
			var current	= $(this),
				data	= current.data('modal'),
				options = $.extend({}, $.fn.rsmodal.defaults, current.data(), typeof option == 'object' && option);

			if (!data) {
				current.data('modal', (data = new RSModal(this, options)));
			}
			if (typeof option == 'string') {
				data[option]();
			} else if (options.show) {
				data.show();
			}
		});
	}

	$.fn.rsmodal.defaults = {
		backdrop	: true,
		keyboard	: true,
		show		: true
	}

	$.fn.rsmodal.Constructor = RSModal;


	/* RSModal no conflict */

	$.fn.rsmodal.noConflict = function () {
		$.fn.rsmodal = old;
		return this;
	}


	/* RSModal data-api */

	$(document).on('click.modal.data-api', '[data-toggle="modal"]', function (e) {
		var current = $(this),
			href	= current.attr('href'),
			target	= $(current.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) //strip for ie7
			option	= target.data('modal') ? 'toggle' : $.extend({ remote:!/#/.test(href) && href }, target.data(), current.data());

		e.preventDefault();

		target.rsmodal(option);
		target.one('hide', function () {
			current.focus()
		});
	});
}(window.jQuery);