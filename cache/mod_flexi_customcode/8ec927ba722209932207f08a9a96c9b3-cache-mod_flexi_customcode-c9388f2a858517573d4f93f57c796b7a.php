<?php die("Access Denied"); ?>#x#a:2:{s:6:"result";s:182:"		<div class="moduletable ">
							<h3 class="hidden">Login Button Popup</h3>
						<div ID="login-bor">
<div ID="login-but" onclick="toggler()" >Вход</div></div>

		</div>
	";s:6:"output";a:3:{s:4:"body";s:0:"";s:4:"head";a:3:{s:11:"styleSheets";a:1:{s:27:"/media/system/css/modal.css";a:2:{s:4:"type";s:8:"text/css";s:7:"options";a:5:{s:7:"version";s:4:"auto";s:8:"relative";b:1;s:8:"pathOnly";b:0;s:13:"detectBrowser";b:1;s:11:"detectDebug";b:1;}}}s:7:"scripts";a:3:{s:33:"/media/system/js/mootools-core.js";a:2:{s:4:"type";s:15:"text/javascript";s:7:"options";a:6:{s:7:"version";s:4:"auto";s:8:"relative";b:1;s:11:"detectDebug";s:1:"0";s:9:"framework";b:0;s:8:"pathOnly";b:0;s:13:"detectBrowser";b:1;}}s:33:"/media/system/js/mootools-more.js";a:2:{s:4:"type";s:15:"text/javascript";s:7:"options";a:6:{s:7:"version";s:4:"auto";s:8:"relative";b:1;s:11:"detectDebug";s:1:"0";s:9:"framework";b:0;s:8:"pathOnly";b:0;s:13:"detectBrowser";b:1;}}s:25:"/media/system/js/modal.js";a:2:{s:4:"type";s:15:"text/javascript";s:7:"options";a:6:{s:9:"framework";b:1;s:7:"version";s:4:"auto";s:8:"relative";b:1;s:8:"pathOnly";b:0;s:13:"detectBrowser";b:1;s:11:"detectDebug";b:1;}}}s:6:"script";a:1:{s:15:"text/javascript";s:1389:"
		jQuery(function($) {
			SqueezeBox.initialize({});
			initSqueezeBox();
			$(document).on('subform-row-add', initSqueezeBox);

			function initSqueezeBox(event, container)
			{
				SqueezeBox.assign($(container || document).find('a.modal').get(), {
					parse: 'rel'
				});
			}
		});

		window.jModalClose = function () {
			SqueezeBox.close();
		};

		// Add extra modal close functionality for tinyMCE-based editors
		document.onreadystatechange = function () {
			if (document.readyState == 'interactive' && typeof tinyMCE != 'undefined' && tinyMCE)
			{
				if (typeof window.jModalClose_no_tinyMCE === 'undefined')
				{
					window.jModalClose_no_tinyMCE = typeof(jModalClose) == 'function'  ?  jModalClose  :  false;

					jModalClose = function () {
						if (window.jModalClose_no_tinyMCE) window.jModalClose_no_tinyMCE.apply(this, arguments);
						tinyMCE.activeEditor.windowManager.close();
					};
				}

				if (typeof window.SqueezeBoxClose_no_tinyMCE === 'undefined')
				{
					if (typeof(SqueezeBox) == 'undefined')  SqueezeBox = {};
					window.SqueezeBoxClose_no_tinyMCE = typeof(SqueezeBox.close) == 'function'  ?  SqueezeBox.close  :  false;

					SqueezeBox.close = function () {
						if (window.SqueezeBoxClose_no_tinyMCE)  window.SqueezeBoxClose_no_tinyMCE.apply(this, arguments);
						tinyMCE.activeEditor.windowManager.close();
					};
				}
			}
		};
		";}}s:13:"mime_encoding";s:9:"text/html";}}