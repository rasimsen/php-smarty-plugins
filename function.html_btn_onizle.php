<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_btn_onizle} plugin
 *
 * Type: function<br>
 * Name: html_btn_onizle<br>
 * Purpose: standart önizle butonu üretir
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_btn_onizle.html}
 * @example
 *
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_btn_onizle($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');

	$sonuc_text='<a href="'.$params[url].'?s=1&sadi='.$params[sadi].'&sid='.$params[sid].'" ><img src="'.$params[resim].'icons/preview.gif" border="0" width="16"/></a>';

	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc_text);
 		echo "</pre>";
 	}

	return $sonuc_text;
}
?>
