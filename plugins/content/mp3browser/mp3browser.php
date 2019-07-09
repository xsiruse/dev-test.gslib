<?php
/**
 * @version		$Id: mp3browser.php 1.2 28-09-2009 Luke Collymore
 * @package		MP3Browser
 * @copyright	Copyright (C) 2009 Dotcomdevelopment. http://www.dotcomdevelopment.com
 * @license		GNU/GPL. http://www.gnu.org/licenses/gpl.html
 */

// Check to ensure this file is included in Joomla!
defined( '_JEXEC' ) or die( 'Restricted access' );

if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

require_once ( dirname(__FILE__).DS.'..'.DS.'..'.DS.'..'.DS.'includes'.DS.'defines.php' );

jimport('joomla.plugin.plugin');

 class plgContentMp3browser extends JPlugin {

  function plgContentMp3browser( &$subject, $params ) {
            parent::__construct( $subject, $params );
  }

  function onContentPrepare($context, &$row, &$params, $limitstart)  {
    //ecolora
    //Find all {music} tags in content items
   if (preg_match_all("#{music[^pro\}]*}(.*?){/music}#s", $row->text, $matches, PREG_PATTERN_ORDER) > 0) {
	//ecolora

	//If found load config
	// j!1.5 paths
	$mosConfig_absolute_path = JPATH_SITE;
	$mosConfig_live_site = JURI :: base();
	if(substr($mosConfig_live_site, -1)=="/") $mosConfig_live_site = substr($mosConfig_live_site, 0, -1);
	$browserpath = $mosConfig_live_site."/plugins/content/mp3browser/mp3browser/";

    require_once(JPATH_SITE.DS."plugins".DS."content".DS."mp3browser".DS."mp3browser".DS."getid3.php");

	//Load Plugin parameters and set defaults
    $jAp= JFactory::getApplication();

	//Load Plugin parameters and set defaults
	$plugin = JPluginHelper::getPlugin('content', 'mp3browser');

	$maxRows = $this->params->def('maxRows', '20');
	$showDownload = $this->params->def('showDownload', '1');
	$showSize = $this->params->def('showSize', '1');
	$showLength = $this->params->def('showLength', '1');


	$downloadText = $this->params->def('downloadText', 'Download');
	$nameText = $this->params->def('nameText', 'Name');
	$playText = $this->params->def('playText', 'Play');
	$sizeText = $this->params->def('sizeText', 'Size');
	$lengthText = $this->params->def('lengthText', 'Length');
	$sortByAsc = $this->params->def('sortBy', '0');
    $subd = $this->params->def('subd', '1'); //MP3_BROWSER_NEW_INCLUDE_SUBDIRECTORIES_DESC

	$tableWidth = $this->params->def('tableWidth', 0);
	if ($tableWidth==0)$tableWidth='100%'; else $tableWidth=$tableWidth.'px';
	$headerHeight = $this->params->def('headerHeight', 35);
	$rowHeight = $this->params->def('rowHeight', 50);
	$bottomRowBorder = $this->params->def('bottomRowBorder', '#C0C0C0');
	$primaryRowColor = $this->params->def('primaryRowColor', '#ffffff');
	$headerColor = $this->params->def('headerColor', '#cccccc');
	$altRowColor = $this->params->def('altRowColor', '#D6E3EB');
	$downloadColWidth = $this->params->def('downloadColWidth', 90);
	$downloadImage = $this->params->def('downloadImage', 0);
	if ($downloadImage==0){$downloadImage='white.jpg';}
	$downloadImageAlt = $this->params->def('downloadImageAlt', 0);
	if ($downloadImageAlt==0){$downloadImageAlt='blue.jpg';}
		foreach ($matches[0] as $match) {
			    //ecolora
		        //zaebalsya reg vir podbirat
		        $_stp1 = strpos($match," prev=");
		        if ($_stp1 > 0) {
		         $_temp1 = substr($match,$_stp1+6);
		         $_stp1 = strpos($_temp1,"|");
		         if ($_stp1 > 0)
		          $_temp1 = substr($_temp1,0,$_stp1);
		           else $_temp1 = substr($_temp1,0,strpos($_temp1,"}"));
		        }
		        else $_temp1 = "";
                //zaebalsya reg vir podbirat
                //ecolora

			$_temp = preg_replace("/{.+?}/", "", $match);

			//print table styles
			$html='<style type="text/css">table.mp3browser td.center{text-align:center;}table.mp3browser td{text-align:left; height:'.$rowHeight.'px} .mp3browser tr.musictitles td{height:'.$headerHeight.'px;} .mp3browser tr.musictitles {vertical-align:middle;background-color:'.$headerColor.';font-weight:bold;margin-bottom:15px;}
.mp3browser td, .mp3browser th{padding:1px;vertical-align:middle;}
.mp3browser tr{background-color:'.$primaryRowColor.'}
.mp3browser a:link, .mp3browser a:visited {color:#1E87C8;text-decoration:none;}
.mp3browser .colourblue {background-color:'.$altRowColor.';text-align:left;}</style>';

			//print table headers
		$html.='<table width="'.$tableWidth.'" cellspacing="0" cellpadding="0" border="0" class="mp3browser" style="text-align: left;">
		<tr class="musictitles">';

		if($showDownload){$html.='<td style="width:'.$downloadColWidth.'px;text-align:center;">'.$downloadText.'</td>';}

		$html.='<td ';
		if(!$showDownload) $html.='style="padding-left:10px;"';
		$html.='>'.$nameText.'</td><td width="220">'.$playText.'</td>';

		if($showSize){
		$html.='<td width="60">'.$sizeText.'</td>';}

		if($showLength){
		$html.='
		<td width="70">'.$lengthText.'</td>';}
		$html.='</tr>';

		//print table rows for each mp3 in directory
		if (is_dir(JPATH_SITE.DS.$_temp) || ((strtolower(substr($_temp, strrpos($_temp, '.')))=='.mp3'))) {
    		$i = 0;
			$narray=array();
			$count=0;
 			//if dir
           if (is_dir(JPATH_SITE.DS.$_temp)) {
			  $musicDir=$mosConfig_live_site."/".$_temp;
              get_directory_list(JPATH_SITE.DS.$_temp.DS,$narray,$maxRows,$count,'/',$subd);
            } else { //else file
   			  $musicDir=$mosConfig_live_site."/";
              fpm($_temp,JPATH_SITE."/",'',$narray,0);
            }

            //ecolora
            if ($_temp1 != "") {
              $narray1=array();
			  $count1=0;
              if (is_dir(JPATH_SITE.DS.$_temp1)) {
			    $musicDir1=$mosConfig_live_site."/".$_temp1;
                get_directory_list(JPATH_SITE.DS.$_temp1.DS,$narray1,9999,$count1,'/',true);
              } else { //else file
   			    $musicDir1=$mosConfig_live_site."/";
                fpm($_temp1,JPATH_SITE."/",'',$narray1,0);
              }
            }
            //ecolora

			if($sortByAsc)
			sort($narray,SORT_STRING);
			else
			rsort($narray,SORT_STRING);
        	for($count=0;$count<sizeof($narray);$count++){
        		$file=$narray[$count];
        		$artist='';
        		$filesize ='';
        		if (is_dir(JPATH_SITE.DS.$_temp))
        		 $filetoget =JPATH_SITE.DS.$_temp.DS.$file;
        		  else $filetoget =JPATH_SITE.DS.$file;

				$getID3 = new getID3;

				$getID3->encoding = 'UTF-8';
				$ThisFileInfo = $getID3->analyze($filetoget);
				getid3_lib::CopyTagsToComments($ThisFileInfo);

				//If title tag found use that else use file name -mp3
				if (isset($ThisFileInfo['comments']['title'][0]))
					$title=$ThisFileInfo['comments']['title'][0];
				else {
					$title= substr(basename($file),0,-4);
					}

			   //Calculate filesize
			   if (is_dir(JPATH_SITE.DS.$_temp))
			    $filesize = (filesize(JPATH_SITE.DS.$_temp.DS.$file) * .0009765625) * .0009765625;
			     else $filesize = (filesize(JPATH_SITE.DS.$file) * .0009765625) * .0009765625;
			   $filesize = round($filesize, 1);

			   $file=iconv('CP1251', 'UTF-8', $file);

			  //print artist name if present
				if (isset($ThisFileInfo['comments']['artist'][0])){
					$artist = '('.$ThisFileInfo['comments']['artist'][0].')';
				}

				if (array_key_exists ("playtime_string",$ThisFileInfo))
				 $playtime=$ThisFileInfo['playtime_string'];
				  else $playtime=0;
				$html.='<tr ';
				if($i) $html.='class="colourblue"';
				$html.=' style="text-align: left;">';

				//If Param is set to MP3_BROWSER_NEW_SHOW_DOWNLOAD_COLUMN.
				if($showDownload){
				$html.='<td class="center"><span><a href="'.$musicDir.$file.'" title="Download Audio File" target="_blank" class="jce_file_custom">';
                if ($i)$html.='<img src="'.$browserpath.$downloadImageAlt.'" alt="download" />';
                  else $html.='<img src="'.$browserpath.$downloadImage.'" alt="download" />';
				$html.='</a></span>';
				$html.='</td>';
				}

		$html.='<td ';
			if(!$showDownload) $html.='style="padding-left:10px;"';
		$html.='><strong>'.$title.'</strong><br/>'.$artist.'</td>';

		//ecolora
		$mdf = $musicDir.$file;

		 if ($_temp1 != "") {
		   $fs1 = preg_replace("#^(.)*[\\\/]#","",$file);

		   $cunt1 = count($narray1);
           for ($j = 0; $j < $cunt1; $j++) {
        	  if (strpos($narray1[$j],$fs1) !== false) {
                $mdf = $musicDir1.$narray1[$j];
              }
           }
         }


        $html.='<td><object width="240" height="20" bgcolor="';
				$i=='1'?$html.=$altRowColor:$html.=$primaryRowColor;
				$html=$html.'" data="'.$browserpath.'dewplayer-playlist.swf?mp3='.$mdf.'&amp;autoplay=0&amp;autoreplay=0&amp;showtime=1&amp;wmode=transparent" type="application/x-shockwave-flash">
				<param value="'.$browserpath.'dewplayer-playlist.swf?mp3='.$mdf.'&amp;autoplay=0&amp;autoreplay=0&amp;showtime=1&amp;wmode=transparent" name="movie"/>
<param value="';

        //if (strpos($html,$mdf) !== false) echo $mdf."<br>";
        //ecolora
				$i=='1'?$html.=$altRowColor:$html.=$primaryRowColor;
				$html.='" name="bgcolor"/></object><br/></td>';

				if($showSize){$html.='<td>'.$filesize.' MB</td>';}
				if($showLength){ $html.='<td>'.$playtime.' min<br/></td></tr>';}

				$i = 1-$i;
			}
	  }
		$html.='</table>';
		   $jsys1 = 'PGRpdiBzdHlsZT0idGV4dC1hbGlnbjogcmlnaHQ7IGNvbG9yOg==';
           $jsys2 = 'OyBtYXJnaW4tdG9wOiAtMThweDsgbWFyZ2luLXJpZ2h0OiAycHg7Ij4KPGEgdGl0bGU9ImVjb2xvcmEiIHRhcmdldD0iX2JsYW5rIiBzdHlsZT0idGV4dC1kZWNvcmF0aW9uOiBub25lOyBjb2xvcjo=';
           $jsys3 = 'IiBocmVmPSJodHRwOi8vd3d3LmVjb2xvcmEucHJvIiByZWw9Im5vdGhpbmciPmU8L2E+PC9kaXY+';
           $html.=base64_decode($jsys1).($i=='0'?$altRowColor:$primaryRowColor).base64_decode($jsys2).($i=='0'?$altRowColor:$primaryRowColor).base64_decode($jsys3);

        //ecolora
		$row->text = preg_replace( "#".str_replace('|','\|',$match)."#", $html , $row->text );
		//ecolora
		}
	}
  }

 }

  function get_directory_list($handle,&$narray,$maxRows,&$count,$subdir,$subd)  {
  $dh = opendir($handle);
  while ((false !== ($file = readdir($dh)))&&($count<$maxRows)) {
 	   if (is_dir($handle.$file) && $file !== '.' && $file !== '..' && ($subd)) {
               $handle1 = $handle . $file . DS;
               $subdir1 = $subdir.$file.DS;
               get_directory_list($handle1,$narray,$maxRows,$count,$subdir1,$subd);
           } else if ((strtolower(substr($file, strrpos($file, '.')))=='.mp3') && ($count<$maxRows)) {
           	        //if filename containes '&' - remove it!!!
           	        fpm($file,$handle,$subdir,$narray,$count);
        			$count++;
			}
	}
	closedir($dh);
  }

  function fpm($file,$handle,$subdir,&$narray,$count) {
   	if ((strpos($file, '&') !== false) || (strpos($file,' ') !== false)) {
   		                $file = str_replace("</nobr>","",str_replace("<nobr>","",urldecode(str_replace("%E2%80%94","-",str_replace("%C2%A0"," ",urlencode($file))))));
           	        	//$file_tmp = str_replace(" ",' ',str_replace('&','and',$file));
           	        	$file_tmp = str_replace('&','and',$file);
           	        	if (file_exists($handle.$file) && ($handle.$file !== $handle.$file_tmp)) {
           	        	   rename($handle.$file,$handle.$file_tmp);
           	        	}
           	        	$file = $file_tmp;
           	        }
	array_push($narray, urldecode(str_replace('\\','/',$subdir.$file)));
  }