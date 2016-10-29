<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_rtext} plugin
 *
 * Type: function<br>
 * Name: html_rtext<br>
 * Purpose: tarih için kullanýlacak text alaný için gerekli kontrollere sahip textbox üretir
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_rtext.html}
 * @example  
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_rtarih($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');

	/* gönderilen parametreler */
	/**
	<input 
		type="text" 
		name="{frm_name}" 
		id="{frm_id}" 
		maxlength="{frm_maxlength}" 
		size="{frm_size}" 
		class="{frm_class}" 
		title="{frm_title}" 
		tabindex="{frm_tabindex}" 
		{frm_readonly} 
		{frm_disabled} 
		onblur="{frm_text}" 
		onfocus="{frm_onfocus}" 
		onkeypress="{frm_onkeypress}" 
		onkeyup="{frm_onkeyup}" 
		onclick="{frm_onclick}" 
		value="{frm_value}" 
		varsayilan = "0"
		bos_gecilemez="1"		
		mode="insert" list=3,view=2,edit insert = 1
	/>
	 */
	$sonuc=array();
	$deger=array();
	$js_arr=array();
	foreach ($params as $_key=>$_value) {
		switch ($_key) {
			case 'name':
			case 'id';
			case 'maxlength';
			case 'size';
			case 'class':
			case 'title':
			case 'tabindex':
				$sonuc[$_key]=$_key.'="'.$_value.'"';
				//$$_key = (string)$_value;
				break;
			case 'value':
			case 'varsayilan':
				$deger[$_key]=$_key.'="'.$_value.'"';
				break;
			case 'readonly':
			case 'disabled':
				if($_value)//true ise
					$sonuc[$_key]=$_key.'="'.$_key.'"';
				break;
			case 'onblur':
			case 'not_null':
				if($_key='not_null' && $_value){
					$js_arr[$_key]='not_null(this)';
				}else if($_key='onblur'){
					$js_arr[$_key]=$_value;
				}
				$js_arr[standart]='onBlur(this,\'rtarih\'';				
				break;
			case 'onfocus':
				$sonuc[$_key]=$_key.'="'.$_value.';onFocus(this,\'rtarih\')"';
				break;
			case 'onkeypress':
			case 'onkeyup':
			case 'onclick':
				$js_arr[$_key]=$_key.'="'.$_value.';"';
				break;
				
			default:
				if(!is_array($_value)) {
					/*$extra_attributes.= ' '.$_key.'="'
						.smarty_function_escape_special_chars($_value).'"';*/
					$sonuc[$_key]=$_key.'="'.smarty_function_escape_special_chars($_value).'"';					
				} else {
					$smarty->trigger_error("html_rtext: ekstra özellik '$_key' dizi olamaz", E_USER_NOTICE);
				}
			break;
		}
	}

	//$js_arr['rtarih']='not_null(this)';
	
	//stil verilmedi ise
	if(!$sonuc['class'])
		$sonuc['class']='class="rtarih"';

	if(!$sonuc['maxlength'])
		$sonuc['maxlength']='maxlength="10"';
		
	if(!$sonuc['size'])
		$sonuc['size']='size="20"';			
		
	$sonuc["blur"]='onblur="'.implode(';',$js_arr).(count($js_arr)>0?';':'').'"';
	$sonuc["value"]=$deger[value]?$deger[value]:$deger[varsayilan];
	
	if($params[mode]=="list" || $params[mode]==3){
		$sonuc_text = '<div '.$sonuc['class'].'>'.$params[value]?$params[value]:$params[varsayilan].'</div>';
	}elseif($params[mode]=="view" || $params[mode]==2){
		$sonuc[readonly]='readonly="readonly"';
		$sonuc_text = '<input type="text" '.implode(' ',$sonuc).' />';		
	}else{//edit , insert ise
		$sonuc_text = '<input type="text" '.implode(' ',$sonuc).' />'
					 .'<img src="js/tarih/images/calendar.png" id="btn_'.$params['name'].'" class="btn_tarih">'
					 .'<script>'
					 .'	    new Calendar({'
					 .'        trigger    : "btn_'.$params['name'].'",'
					 .'	       dateFormat: "%d/%m/%Y",'
					 .'        inputField : "'.$params['name'].'"'
					 .'	    });'
					 .'</script>';	
	}					
				 
	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc);
 		echo "</pre>";
 	}
	return $sonuc_text;
}
?>
