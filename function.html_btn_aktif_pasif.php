<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_btn_aktif_pasif} plugin
 *
 * Type: function<br>
 * Name: html_btn_aktif_pasif<br>
 * Purpose: standart aktif pasif butonu üretir
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_btn_aktif_pasif.html}
 * @example
 *
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_btn_aktif_pasif($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
	//pre($params);
	if($params[durum]=='PASIF' || $params[durum]==0)
		$img="PASIF";
	else
		$img="AKTIF";

	$link=$params[url].'?sadi='.$params['sadi'].'&sid='.$params[sid].'&durum='.($params[durum]=='1'?'0':'1').'&sit=durum';

	$sonuc_text = '<a href="javascript://" onclick="apOnay(\''.($params[durum]=='1'?'pasif':'aktif').'\',\''.$link.'\')" title="Kaydi '.($img=='PASIF'?'aktif et':'pasif et').'"><img src="'.$params[resim].'icons/'.$img.'.gif" border="0" width="16px" height="16px"/></a>';

	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc_text);
 		echo "</pre>";
 	}

	return $sonuc_text;
}
?>
