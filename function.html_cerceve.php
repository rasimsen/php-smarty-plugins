<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_cerceve} plugin
 *
 * Type: function<br>
 * Name: html_cerceve<br>
 * Purpose: standart çerçeve çizmek
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_cerceve.html}
 * @example  {html_cerceve with="50" height="100"}{html_cerceve_kapa}, parametreleri asagidaki gibidir..
 * <table width="70%" height="" border="0" cellspacing="0" cellpadding="0" class="" style="" align="" onmousedown="" onmousemove="" onmouseout="" onmouseover="" onmouseup="">...
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_cerceve($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
	
	$sonuc=array();
	$deger=array();
	foreach ($params as $_key=>$_value) {
		switch ($_key) {
			case 'name':
			case 'id';
			case 'class':
			case 'title':
			case 'onblur':
				$js_arr[standart]='onBlur(this,)';				
				break;
			case 'onclick':
				$sonuc[$_key]=$_key.'="'.$_value.';"';
				break;
			case 'onmouseover':
			case 'onmousedown':
			case 'onmousemove':
			case 'onmouseout':
			case 'onmouseover':
			case 'onmouseup':
				$sonuc[$_key]=$_key.'="'.$_value.';"';
				break;
			case 'width':
			case 'height':	
			case 'border':	
			case 'cellspacing':	
			case 'cellpadding':	
			case 'align':	
			case 'style':
				$sonuc[$_key]=$_key.'="'.$_value.';"';
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
	
	//stil verilmedi ise
	if(!$sonuc['border'])
		$sonuc['border']='border="0"';

	if(!$sonuc['cellspacing'])
		$sonuc['cellspacing']='cellspacing="0"';
		
	if(!$sonuc['cellpadding'])
		$sonuc['cellpadding']='cellpadding="0"';			
		
	$sonuc["blur"]='onblur="'.implode(';',$js_arr).(count($js_arr)>0?';':'').'"';
	$sonuc["value"]=$deger[value]?$deger[value]:$deger[varsayilan];

	
	$sonuc_text ='<table '.implode(' ',$sonuc).'>
  <tr>
    <td style="background-image:url(images/cerceve/oc_solust.gif); background-repeat:no-repeat; width:6px; height:6px;"></td>
    <td style="background-image:url(images/cerceve/oc_ubg.gif); background-repeat:repeat-x;"></td>
    <td style="background-image:url(images/cerceve/oc_sagust.gif); background-repeat:no-repeat; width:6px; height:6px;"></td>
  </tr>
  <tr>
    <td style="background-image:url(images/cerceve/oc_solorta.gif); background-repeat:repeat-y;"></td>
    <td>';
	
	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
