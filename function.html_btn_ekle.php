<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_btn_ekle} plugin
 *
 * Type: function<br>
 * Name: html_btn_onizle<br>
 * Purpose: standart �nizle butonu �retir
 *
 * ChangeLog:<br>
 * - 1.0 ba�lang�� versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_btn_onizle.html}
 * @example
 *
 * @version 1.0
 * @author Rasim �EN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_btn_ekle($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');

	$sonuc_text='<a href="'.$params[url].'?s=2&sadi='.$params[sadi].'&sid=" ><img src="'.$params[resim].'icons/btn_ekle_32.png" border="0" width="16"/></a>';

	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc_text);
 		echo "</pre>";
 	}

	return $sonuc_text;
}
?>
