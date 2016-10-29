<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_btn_temizle} plugin
 *
 * Type: function<br>
 * Name: html_btn_temizle<br>
 * Purpose: standart kaydet butonu üretir
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_btn_temizle.html}
 * @example  
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_btn_temizle($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');

	$sonuc_text = '<input type="reset" name="btnTemizle" id="btnTemizle" value="  " style="background-image:url(images/button/otemizle.gif); width:108px; height:34px; border:0 solid #000000; cursor:pointer; margin:5px;" />';				

	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc_text);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
