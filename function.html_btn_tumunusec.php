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
 * Name: html_btn_tumunusec<br>
 * Purpose: standart tumunu sec butonu üretir
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
function smarty_function_html_btn_tumunusec($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
	if($params[icon]){
		$btn_icon = $params[icon]; 
	}else{
		$btn_icon="icons/check.png";
	}
	$sonuc_text = '<a href="javascript://" onclick="isaretleKayit(\''.$params['class'].'\')" title="'.$params[baslik].'"><img src="'.$params[resim].$btn_icon.'" border="0" width="16px" height="16px" alt="'.$params[baslik].'" title="'.$params[baslik].'"/></a>';

	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc_text);
 		echo "</pre>";
 	}

	return $sonuc_text;
}
?>
