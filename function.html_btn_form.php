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
function smarty_function_html_btn_form($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
	if($params[icon]){
		$btn_icon = "button/".$params[icon]; 
	}else{
		$btn_icon="button/btn_kaydet.png";
	}
	if($params[baslik]){
		$baslik = $params[baslik];
	}else{
		$baslik = "Kaydetmek için týklayýnýz";
	}
	
	$sonuc_text = '<input type="submit" name="'.$params[name].'" id="id'.$params[name].'" value="  " style="background-image:url('.$params[resim_path].$btn_icon.'); width:108px; height:34px; border:0 solid #000000; cursor:pointer; margin:5px;" title="'.$baslik.'" />';
	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc_text);
 		echo "</pre>";
 	}

	return $sonuc_text;
}
?>
