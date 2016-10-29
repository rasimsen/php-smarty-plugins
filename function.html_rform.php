<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_rform} plugin
 *
 * Type: function<br>
 * Name: html_rform<br>
 * Purpose: standart form
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_rform.html}
 * @example  {html_rform}{html_rform_kapa}, parametreleri asagidaki gibidir..
 * <form id="idFrmVEG" name="frmVEG" method="post" action="" onSubmit="return frmKaydet(this);">...
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_rform($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
	
	$sonuc=array();
	//stil verilmedi ise

	if(strlen($params[name])>0){
		$formAdi = $params[name];		
	}else{
		$formAdi = 'frmVEG';;
	}
	
	if(strlen($params[id])>0){
		$formId = $params[id];
	}else{
		$formId = 'idFrmVEG';
	}
	
	$sonuc_text ='<form id="'.$formId.'" name="'.$formAdi.'" method="post" action="" onSubmit="return frmKaydet(this);">';
	
	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
