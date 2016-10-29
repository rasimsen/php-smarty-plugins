<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_araccubugu} plugin
 *
 * Type: function<br>
 * Name: html_araccubugu_kapa<br>
 * Purpose: standart araç çubugu çizme
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_araccubugu_kapa.html}
 * @example  {html_araccubugu with="50" height="100"}{html_araccubugu_kapa}, parametreleri asagidaki gibidir..
 * <table width="70%" height="" border="0" cellspacing="0" cellpadding="0" class="" style="" align="" onmousedown="" onmousemove="" onmouseout="" onmouseover="" onmouseup="">...
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_araccubugu_kapa($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
	
	$bilgi='<a href="javascript://" onclick="sayfaBilgi()"><image src="images/araccubugu/ot_bilgi.gif" border="0" title="Bilgi" alt="Bilgi" class="ot_bilgi"/></a>';

	$sonuc_text = '&nbsp;</td><td align="right">'.$bilgi.'</td></tr></table>';
	$sonuc_text .='</td><td style="background-image:url(images/ot_sag.gif); background-repeat:no-repeat; width:6px; height:35px;"></td></tr></table>';

	
	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
