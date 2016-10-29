<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_btn_ara} plugin
 *
 * Type: function<br>
 * Name: html_btn_ara<br>
 * Purpose: standart ara butonu üretir
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_btn_ara.html}
 * @example  
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_btn_ara($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');

	$sonuc_text = '<input type="submit" name="btnAra" name="btnAra" value="  " style="background-image:url(images/button/o_ara.gif); width:68px; height:27px; border:0 solid #000000; cursor:pointer;" />';				

	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc_text);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
