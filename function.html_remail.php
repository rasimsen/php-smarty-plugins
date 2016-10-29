<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_remail} plugin
 *
 * Type: function<br>
 * Name: html_rtext<br>
 * Purpose: email için kullanýlacak text alaný için gerekli kontrollere sahip textbox üretir
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
function smarty_function_html_remail($params, &$smarty) {
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
				if($_key='not_null' && $_value)
					$js_arr[$_key]='not_null(this)';
				else if($_key='onblur'){
					$js_arr[$_key]=$_value;
				}
				$js_arr[standart]='onBlur(this,\'remail\'';				
				break;
			case 'onfocus':
				$sonuc[$_key]=$_key.'="'.$_value.';onFocus(this,\'remail\')"';
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
	
	//javascript kontrolü
	$js_arr["remail"]='remail(this)';
	//stil verilmedi ise
	if(!$sonuc['class'])
		$sonuc['class']='class="remail"';

	if(!$sonuc['maxlength'])
		$sonuc['maxlength']='maxlength="128"';
		
	if(!$sonuc['size'])
		$sonuc['size']='size="48"';
		
	$sonuc["blur"]='onblur="'.implode(';',$js_arr).(count($js_arr)>0?';':'').'"';
	$sonuc["value"]=$deger[value]?$deger[value]:$deger[varsayilan];
	
	//$sonuc_text = '<input type="text" '.implode(' ',$sonuc).' />';
	if($params[mode]=="list" || $params[mode]==3){
		$url_bas='';$url_bit='';
		if($params[url]){
			$url_bas='<a href="'.$params[url].'s=2&oidn='.$params[name].'&oidv='.$params[value].'" >';
		}
		$sonuc_text = '<div '.$sonuc['class'].'>'.$url_bas.($params[value]?$params[value]:$params[varsayilan]).$url_bit.'</div>';
	}elseif($params[mode]=="view" || $params[mode]==2){
		$sonuc[readonly]='readonly="readonly"';
		$sonuc_text = '<input type="text" '.implode(' ',$sonuc).' />';		
	}else{//edit , insert ise
		$sonuc_text = '<input type="text" '.implode(' ',$sonuc).' />';
	}
		
	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
