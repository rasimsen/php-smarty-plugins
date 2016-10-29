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
 * Name: html_kose<br>
 * Purpose: standart çerçeve çizmek - sadece dis çerceve var
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_kose.html}
 * @example  {html_kose with="50" height="100"}{html_kose_kapa}, parametreleri asagidaki gibidir..
 * <table width="70%" height="" border="0" cellspacing="0" cellpadding="0" class="" style="" align="" onmousedown="" onmousemove="" onmouseout="" onmouseover="" onmouseup="">...
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_kose($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
	
	$sonuc=array();
	//stil verilmedi ise
	if(!$params['border'])
		$sonuc['border']='border="0"';

	if(!$params['cellspacing'])
		$sonuc['cellspacing']='cellspacing="0"';
		
	if(!$params['cellpadding'])
		$sonuc['cellpadding']='cellpadding="0"';
				
	if($params['width'])
		$sonuc['width']='width="'.$params['width'].'"';	
	
	if($params['heigth'])
		$sonuc['heigth']='heigth="'.$params['heigth'].'"';	
	
	$sonuc['align']='align="'.($params['align']?$params['align']:'center').'"';
	$sonuc['valign']='valign="'.($params['valign']?$params['valign']:'top').'"';			
	
		
	$sonuc_text ='<table '.implode(' ',$sonuc).'>
  <tr>
    <td style="background-image:url(images/ok_ust_sol.gif); background-repeat:no-repeat; width:5px; height:5px;"></td>
    <td style=" border-top:#6e9fd0 solid 1px"><img src="images/bos.gif" border="0"/></td>
    <td style="background-image:url(images/ok_ust_sag.gif); background-repeat:no-repeat; width:5px; height:5px;"></td>
  </tr>
  <tr>
    <td style=" border-left:#6e9fd0 solid 1px"><img src="images/bos.gif" border="0"/></td>
    <td style="text-align:'.$align.'; vertical-align:'.$valign.'" >';
	
	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
