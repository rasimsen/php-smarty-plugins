<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_btn_sil} plugin
 *
 * Type: function<br>
 * Name: html_btn_sil<br>
 * Purpose: standart sil butonu üretir
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_btn_sil.html}
 * @example
 *
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_btn_sil($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');

	$link=$params[url].'?sadi='.$params[sadi].'&sid='.$params[sid]."&sit=sil";

	$sonuc_text = '<a href="javascript://" onclick="silOnay(\''.$link.'\')" title="Kaydi sil"><img src="'.$params[resim].'icons/delete_16.gif" border="0" width="16px" height="16px"/></a>';

	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc_text);
 		echo "</pre>";
 	}

	return $sonuc_text;
}
?>
