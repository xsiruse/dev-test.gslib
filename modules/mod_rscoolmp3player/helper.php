<?php
/**
 * RS-CoolMP3Player
 * 
 * @package - Joomla
 * @subpackage - Modules
 * @link - www.rswebsols.com
 * @license - GNU/GPL
**/

class modRSCoolMP3PlayerHelper {
	public static function rswsCHR($color) {
		$color = str_replace('#', '0x', $color);
		return $color;
	}
	
	public static function rswsReturn($module_id, $params) {
		$rsws_insertSWFOBJECT = $params->get('rsws_insertSWFOBJECT', 1);
		$rsws_module_width = $params->get('rsws_module_width', 290);
		$rsws_module_margin = $params->get('rsws_module_margin', 10);
		$rsws_width = $params->get('rsws_width', 281);
		$rsws_height = $params->get('rsws_height', 78);
		$rsws_backgroundColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_backgroundColor', '#ffffff'));
		$rsws_autoplay = $params->get('rsws_autoplay', 2);
		$rsws_margin = $params->get('rsws_margin', 5);
		$rsws_strokeColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_strokeColor', '#90C84B'));
		$rsws_fillColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_fillColor', '#414042'));
		$rsws_backColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_backColor', '#FFFFFF'));
		$rsws_backOverColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_backOverColor', '#DEECBD'));
		$rsws_signStrokeColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_signStrokeColor', '#4B4B4B'));
		$rsws_signFillColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_signFillColor', '#83B04D'));
		$rsws_initLevel = $params->get('rsws_initLevel', 50);
		$rsws_backStrokeColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_backStrokeColor', '#4B4B4B'));
		$rsws_backFillColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_backFillColor', '#83B04D'));
		$rsws_signColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_signColor', '#E7E8E9'));
		$rsws_signOverColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_signOverColor', '#4B4B4B'));
		$rsws_percentTextColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_percentTextColor', '#E7E8E9'));
		$rsws_percentTextmarginX = $params->get('rsws_percentTextmarginX', 5);
		$rsws_percentTextpositionY = $params->get('rsws_percentTextpositionY', 'top');
		$rsws_visualizerbackColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_visualizerbackColor', '#4B4B4B'));
		$rsws_visualizerwavesColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_visualizerwavesColor', '#FFFFFF'));
		$rsws_artistColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_artistColor', '#E7E8E9'));
		$rsws_artistFontSize = $params->get('rsws_artistFontSize', 14);
		$rsws_songColor = modRSCoolMP3PlayerHelper::rswsCHR($params->get('rsws_songColor', '#E7E8E9'));
		$rsws_songFontSize = $params->get('rsws_songFontSize', 12);
		$rsws_artistName = $params->get('rsws_artistName', '');
		$rsws_songName = $params->get('rsws_songName', '');
		$rsws_songURL = $params->get('rsws_songURL', '');
		$rsws_use_exact_url = $params->get('rsws_use_exact_url', 2);
		$rsws_exact_url = $params->get('rsws_exact_url', '');
		
		if($rsws_use_exact_url == '1') {
			$rsws_website_url = $rsws_exact_url;
			if(substr($rsws_website_url, -1, 1) != '/') {
				$rsws_website_url = $rsws_website_url.'/';
			}
		} else {
			$rsws_website_url = JURI::root();
		}
		
		if($rsws_autoplay == '1') { 
				$rsws_autoplay = 'true';
		} else {
				$rsws_autoplay = 'false';
		}
		
		// Set FTP credentials, if given
		$rsws_module_path = JPATH_BASE.'/modules/mod_rscoolmp3player/';
		jimport('joomla.client.helper');
		JClientHelper::setCredentialsFromRequest('ftp');
		$ftp = JClientHelper::getCredentials('ftp');
		
		$rsws_file = $rsws_module_path.'xml/rscoolmp3player_'.$module_id.'.xml';
		
		$rsws_txt = '<?xml version="1.0" encoding="utf-8"?><settings width="'.$rsws_width.'" height="'.$rsws_height.'"><autoplay>'.$rsws_autoplay.'</autoplay><margin>'.$rsws_margin.'</margin><strokeColor>'.$rsws_strokeColor.'</strokeColor><fillColor>'.$rsws_fillColor.'</fillColor><playPauseButton><backColor>'.$rsws_backColor.'</backColor><backOverColor>'.$rsws_backOverColor.'</backOverColor><signStrokeColor>'.$rsws_signStrokeColor.'</signStrokeColor><signFillColor>'.$rsws_signFillColor.'</signFillColor></playPauseButton><volumeControl initLevel="'.$rsws_initLevel.'"><backStrokeColor>'.$rsws_backStrokeColor.'</backStrokeColor><backFillColor>'.$rsws_backFillColor.'</backFillColor><signColor>'.$rsws_signColor.'</signColor><signOverColor>'.$rsws_signOverColor.'</signOverColor><percentText color="'.$rsws_percentTextColor.'" marginX="'.$rsws_percentTextmarginX.'" positionY="'.$rsws_percentTextpositionY.'" /></volumeControl><visualizer backColor="'.$rsws_visualizerbackColor.'" wavesColor="'.$rsws_visualizerwavesColor.'" /><songText><artistColor>'.$rsws_artistColor.'</artistColor><artistFontSize>'.$rsws_artistFontSize.'</artistFontSize><songColor>'.$rsws_songColor.'</songColor><songFontSize>'.$rsws_songFontSize.'</songFontSize></songText></settings>';
		
		jimport('joomla.filesystem.file');
		//if (JFile::exists($rssn_file)) {
			// Try to make the params file writeable
			if (!$ftp['enabled'] && JPath::isOwner($rsws_file) && !JPath::setPermissions($rsws_file, '0755')) {
				JError::raiseNotice('SOME_ERROR_CODE', JText::_('Could not make the file writable'));
			}
		
			JFile::write($rsws_file, $rsws_txt);
		
			// Try to make the params file unwriteable
			if (!$ftp['enabled'] && JPath::isOwner($rsws_file) && !JPath::setPermissions($rsws_file, '0555')) {
				JError::raiseNotice('SOME_ERROR_CODE', JText::_('Could not make the file unwritable'));
			}
		//}
		$rsws_document = JFactory::getDocument();
		
		if($rsws_insertSWFOBJECT == '1') {
			$rsws_document->addScript( JURI::root().'modules/mod_rscoolmp3player/js/swfobject.js');
		}
		$rsws_output_return = '<div style="width:'.$rsws_module_width.'px;">';	
		$rsws_temp_artist = trim($rsws_artistName);
		$rsws_temp_song = trim($rsws_songName);
		$rsws_temp_url = trim($rsws_songURL);
		
		if(($rsws_temp_artist != '') && ($rsws_temp_song != '') && ($rsws_temp_url != '')) {
	
			$rsws_js_controller = '<script type="text/javascript">var cacheBuster = "?t=" + Date.parse(new Date()); var stageW = '.$rsws_width.'; var stageH = '.$rsws_height.'; var attributes = {}; attributes.id = \'RSCoolMp3PlayerModule_'.$module_id.'_'.$rsws_counter.'\'; attributes.name = attributes.id; var params = {}; params.wmode = "transparent"; params.allowfullscreen = "true"; params.allowScriptAccess = "always"; params.bgcolor = "#'.$rsws_backgroundColor.'"; var flashvars = {}; flashvars.componentWidth = stageW; flashvars.componentHeight = stageH; flashvars.pathToFiles = ""; flashvars.xmlPath = "'.$rsws_website_url.'modules/mod_rscoolmp3player/xml/rscoolmp3player_'.$module_id.'.xml"; flashvars.artistName = "'.$rsws_temp_artist.'"; flashvars.songName = "'.$rsws_temp_song.'"; flashvars.songURL = "'.$rsws_temp_url.'"; swfobject.embedSWF("'.$rsws_website_url.'modules/mod_rscoolmp3player/swf/preview.swf"+cacheBuster, attributes.id, stageW, stageH, "9.0.124", "'.$rsws_website_url.'modules/mod_rscoolmp3player/swf/expressInstall.swf", flashvars, params);</script>';
	
			$rsws_html_controller = '<div style="margin-bottom:'.$rsws_module_margin.'px;"><div id="RSCoolMp3PlayerModule_'.$module_id.'_'.$rsws_counter.'"><p>In order to view <a href="http://www.rswebsols.com/downloads/rs-coolmp3player">RSCoolMp3Player</a> you need Flash Player 9+ support!</p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player"/></a></div></div>';
	
			$rsws_output_return .= $rsws_js_controller;
			$rsws_output_return .= $rsws_html_controller;
		}
		$rsws_output_return .= '</div>';
		return $rsws_output_return;
    }
}
?>