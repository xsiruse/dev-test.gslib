<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.zygo_profile
 *
 * @copyright   Copyright (C) 2015 irina@psytronica.ru
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('JPATH_BASE') or die;

class JFormFieldZygocontent extends JFormField
{

	protected $type = 'zygocontent';

	public function __construct()
	{
        parent::__construct();
		$this->setTemplates();

		if(defined('ZYGOCONTENT_ADDED')) return;
		define('ZYGOCONTENT_ADDED', true);

		$this->addJS();


	}
	protected function getElem($elem, $fieldname = "%fieldname%", $num = "%num%", 
		$fnum = "%fnum%", $selected = NULL){
		$funcname = "getElem".$elem;
		return $this->$funcname($fieldname, $num, $fnum, $selected);
	}

	protected function getElemField($fieldname = "%fieldname%", $num = "%num%", 
		$fnum = "%fnum%", $selected = NULL)
	{
		$plugin = JPluginHelper::getPlugin('user', 'zygo_profile');
		$uParams = new JRegistry();
		$uParams->loadString($plugin->params);

		$uinfo = $uParams->get("userinfo");
		if(empty($uinfo)){
			return "";
		}

		if(is_array($uinfo)){
			$names = $uinfo['code'];
			$ids = $uinfo['fieldName'];
		}else if(is_object($uinfo)){
			$names = $uinfo->code;
			$ids = $uinfo->fieldName;
		}else{
			return "";			
		}
		$names = array_values((array)$names);
		$ids = array_values((array)$ids);

		$state = array();

		foreach($ids as $k=>$id){
			if($id == 'uniqueID0') continue;
			$nm = $names[$k];
			$state[] = JHTML::_('select.option',$id, $nm );
		}

		return '<td>'.JHTML::_('select.genericlist', $state, 
			$name = 'jform[params]['.$fieldname.']['.$num.']['.$fnum.']', 
			$attribs = 'style="width:96%"', $key = 'value', $text = 'text', $selected ).'</td>';

	}
	protected function getElemTrigger($fieldname = "%fieldname%", $num = "%num%", 
		$fnum = "%fnum%", $selected = Null)
	{
		$triggers = array(
				"beforeContent" => JText::_('PLG_CONTENT_ZYGO_PROFILE_TRIGGER_BEFORE_CONTENT'),
				"afterContent" => JText::_('PLG_CONTENT_ZYGO_PROFILE_TRIGGER_AFTER_CONTENT'),
				"byTag" => JText::_('PLG_CONTENT_ZYGO_PROFILE_TRIGGER_BY_TAG')
			);

		if(is_object($selected)){
			$selected=array_values((array)$selected);
		}
		if(!is_array($selected) || sizeof($selected) < 2){
			$selected = array("", "");
		}
		$state = array();
		foreach($triggers as $trig_key=>$trig_val){
			$state[] = JHTML::_('select.option',$trig_key, $trig_val );
		}
		$display= ($selected[1]=="byTag")? "block" : "none";
		$html = "<div class='showHideTag' style='display:".$display."'>";
			$html .= "<div>".JText::_('PLG_USER_ZYGO_PROFILE_KEYWORD_IN_ARTICLE')."</div>";
			$html .= '<input type="text" name="jform[params]['.$fieldname.']['.$num.']['.$fnum.'][0]" '.
			' value="'.$selected[0].'" style="width:80%" />';
		$html .= "</div>";

		return '<td>'.JHTML::_('select.genericlist', $state, 
			$name = 'jform[params]['.$fieldname.']['.$num.']['.$fnum.'][1]', 
			$attribs = 'onchange = "check_trigger(this)" style="width:96%"', $key = 'value', $text = 'text', $selected[1] )
		.$html.'</td>';

	}

	protected function getElemAddLabel($fieldname = "%fieldname%", $num = "%num%", 
		$fnum = "%fnum%", $selected = NULL)
	{
		$state = array();
		$state[] = JHTML::_('select.option',0, JText::_('JNO') );
		$state[] = JHTML::_('select.option',1, JText::_('JYES') );

		return '<td>'.JHTML::_('select.genericlist', $state, 
			$name = 'jform[params]['.$fieldname.']['.$num.']['.$fnum.']', 
			$attribs = 'style="width:60px"', $key = 'value', $text = 'text', $selected ).'</td>';

	}
	protected function getElemPlace($fieldname = "%fieldname%", $num = "%num%", 
		$fnum = "%fnum%", $selected = NULL)
	{
		$state = array();
		$state[] = JHTML::_('select.option',0, JText::_('PLG_CONTENT_ZYGO_PROFILE_PLACES_EVERYWHERE') );
		$state[] = JHTML::_('select.option',1, JText::_('PLG_CONTENT_ZYGO_PROFILE_PLACES_IN_BLOG') );
		$state[] = JHTML::_('select.option',2, JText::_('PLG_CONTENT_ZYGO_PROFILE_PLACES_IN_ARTICLE') );

		return '<td>'.JHTML::_('select.genericlist', $state, 
			$name = 'jform[params]['.$fieldname.']['.$num.']['.$fnum.']', 
			$attribs = 'style="width:120px"', $key = 'value', $text = 'text', $selected ).'</td>';

	}
	protected function setTemplates()
	{

		

		$this->line_tpl = array(
			'<tr class="zygo_line zygo_line%num%">'.
				'<td><span class="sortable-handler">'.
					'<i class="icon-menu"></i>'.
				'</span></td>'
			,

			array(
				"input"=> '<td style="width:10%"><input type="text" name="jform[params][%fieldname%][%num%][%fnum%]" '.
			' value="%val%" style="width:96%" /></td>',
				"field"=> str_replace(array("\n", "'"), "", $this->getElem("field")),
				"trigger"=> str_replace(array("\n", "'"), "", $this->getElem("trigger")),
				"addlabel"=> str_replace(array("\n", "'"), "", $this->getElem("addlabel")),
				"place"=> str_replace(array("\n", "'"), "", $this->getElem("place")),
			),
			

			'<td><button type="button" class="button buttonminus btn btn-danger" '.
			' onclick="zygo_remove(this)" ><span class="icon-cancel"></span></button></td></tr>'		
		);

		$this->main_tpl = array(
			
			"<div class='zygo_wrapper' id='zygo_%fieldname%'>".
			'<div style="text-align:center"><button type="button" rel="%fieldname%" class="button buttonplus btn btn-success" '.
			' onclick="zygo_add(this)" /><span class="icon-plus"></span>'.JText::_('PLG_CONTENT_ZYGO_PROFILE_ADD_LINE').'</button></div>',

			"<table id='zygo_table_%fieldname%' class='table table-striped'><thead><tr><th></th>",

			"<th>%row%</th>",

			"</tr></thead><tbody>",

			"</tbody></table></div>"
		);

		$this->no_rows = JText::_('PLG_CONTENT_ZYGO_PROFILE_NO_ROWS');

		$this->desc_tpl = "<div style='clear:both'></div><div class='alert alert-info'>%desc%</div>";
		$this->rownames = "<div style='display:none' id='zygo_%fieldname%_rownames'>%rownames%</div>";
	}

	protected function addJS()
	{

		$doc = JFactory::getDocument();

		$tds = array();
		foreach ($this->line_tpl[1] as $inp_type=>$inp_html){
			$tds[] = "'".$inp_type."': '".$inp_html."'";
		}


		$script = "

			var ZYGO_NUMS = {}

			function zygo_remove(self){
				jQuery(self).parents('.zygo_line').remove();
			}
			function zygo_add(self){

				var fieldname = jQuery(self).attr('rel');
				var rowsnum = jQuery('#zygo_'+fieldname+' th').length-1;
				var tds = {".implode(", ", $tds)."};

				if (!ZYGO_NUMS[fieldname]){
					ZYGO_NUMS[fieldname] = jQuery('#zygo_'+fieldname+' .zygo_line').length+1;
				}

				var html = '".$this->line_tpl[0]."'.replace(/%num%/g, ZYGO_NUMS[fieldname]);

				var rownames = jQuery('#zygo_'+fieldname+'_rownames').text().split('|');

				for(i=0; i<rowsnum; i++){
					rowname = rownames[i];
					td = (tds[rowname])? tds[rowname] : tds['input'];

					td = td.replace(/%val%/g, '').replace(/%fieldname%/g, fieldname);
					td = td.replace(/%num%/g, ZYGO_NUMS[fieldname]);
					html += td.replace(/%fnum%/g, i);
				}

				html += '".$this->line_tpl[2]."';

				jQuery('#zygo_'+fieldname+' .table tbody').append(html);

				ZYGO_NUMS[fieldname]++;

				var curLine = jQuery('#zygo_'+fieldname+' .table .zygo_line').last();
				curLine.find('select').chosen({\"disable_search_threshold\":10,\"allow_single_deselect\":true});

				var sortableList = new jQuery.JSortableList('#zygo_'+fieldname+' .table tbody','', '','','','');

			}	
			function check_trigger(self){
				display = (self.value == 'byTag')? 'block' : 'none';
				jQuery(self).parent().find('.showHideTag').css('display', display);
			}		
			jQuery(document).ready(function (){
				jQuery('.zygo_wrapper').parents('.controls').css('margin-left', '0px');

				jQuery('#jform_params_calc_html, #jform_params_calc_css').css('width', '100%');

				// a little trick to avoid input value change after dragging table row
				// Method rearrangeOrderingValues of sortablelist provide this input type=text value change
				
				jQuery('.sortable-handler').mousedown(function(){
					jQuery(this).closest('.table').find('[type=text]').attr('type', 'search');
				});
				jQuery('#jform_params_css').css('width', '90%');
				
				

			});

		";

		$doc->addScriptDeclaration($script);

	}
	protected function getInput()
	{

		if(!$this->getAttribute("rows")){
			echo $this->no_rows;
			return;
		}

		JHtml::_('sortablelist.sortable', 'zygo_table_'.$this->fieldname, '', '', '');


		$html = "";

		if($this->getAttribute("desc_inline")){
			$html .= str_replace('%desc%', JText::_($this->getAttribute("desc_inline")), $this->desc_tpl);
		}


		$rows = array_map("trim", explode("|", $this->getAttribute("rows")));

		$html .= str_replace('%fieldname%', $this->fieldname, $this->main_tpl[0]);

		$line_inputs = "";

		$html .= str_replace('%fieldname%', $this->fieldname, $this->main_tpl[1]);

			foreach($rows as $row){

				$rowname = $row;
				if(ctype_alnum(str_replace('_', '', $row))){
					$rowname = JText::_('PLG_USER_ZYGO_PROFILE_TH_'.strtoupper($row));
					if($rowname == 'PLG_USER_ZYGO_PROFILE_TH_'.strtoupper($row)){
						$rowname = $row;
					}
				}
				
				$html .= str_replace(array('%row%', '%fieldname%'), 
					array($rowname, $this->fieldname), $this->main_tpl[2]);
			}
		$html .= $this->main_tpl[3];


		if(is_array($this->value) || is_object($this->value) && !empty($this->value)){

			foreach($this->value as $num=>$fields){
				$html .= str_replace('%num%', $num, $this->line_tpl[0]);

				$knum = 0;
				foreach($rows as $fnum=>$row){

					$field = "";
					
					if(is_array($fields) && isset($fields[$fnum])){
						$field = $fields[$fnum];
					}else if(is_object($fields) && isset($fields->$fnum)){
						$field = $fields->$fnum;
					}

					$from = array('%num%', '%fieldname%', '%fnum%', '%val%');
					$to = array($num, $this->fieldname, $knum, $field);

					if(isset($this->line_tpl[1][$row])){

						$html .= $this->getElem($row, $this->fieldname, $num, $knum, $field);
					}else{

						$html .= str_replace($from, $to, $this->line_tpl[1]["input"]);
					}

					$knum++;
				}
				$html .= $this->line_tpl[2];
			}

		}

		$html .= $this->main_tpl[4];

		$rownames = str_replace('%rownames%', implode('|', $rows), $this->rownames);
		$html .= str_replace('%fieldname%', $this->fieldname, $rownames);

		return $html;
	}

}