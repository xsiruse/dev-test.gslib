/* jce - 2.6.15 | 2017-06-03 | http://www.joomlacontenteditor.net | Copyright (C) 2006 - 2017 Ryan Demmer. All rights reserved | GNU/GPL Version 2 or later - http://www.gnu.org/licenses/gpl-2.0.html */
!function($){var BrowserDialog={init:function(ed){var self=this;$("#insert").click(function(e){e.preventDefault(),self.insert()}),$("#cancel").click(function(e){e.preventDefault(),tinyMCEPopup.close()});var src=(tinyMCEPopup.window,tinyMCEPopup.getWindowArg("value"));Wf.init(),/(:\/\/|www|index.php(.*)\?option)/gi.test(src)&&(src=""),src&&(src=tinyMCEPopup.editor.convertURL(src),$(".uk-button-text","#insert").text(tinyMCEPopup.getLang("update","Update",!0))),$("#src").val(src).filebrowser().on("filebrowser:onfileclick",function(e,file){self.selectFile(file)})},insert:function(){var win=tinyMCEPopup.getWindowArg("window"),self=this,callback=($("#src").val(),tinyMCEPopup.getWindowArg("callback"));$("#src").trigger("filebrowser:insert",function(selected,data){"string"==typeof callback&&(data.length&&self.selectFile(data[0]),win.document.getElementById(callback).value=$("#src").val()),"function"==typeof callback&&callback(selected,data),tinyMCEPopup.close()})},selectFile:function(file){var src=(file.title,file.url);src&&(src=src.replace(/^\//,""),$("#src").val(src))}};$(document).ready(function(){BrowserDialog.init()})}(jQuery);