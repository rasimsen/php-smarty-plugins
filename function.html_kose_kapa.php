<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_kose} plugin
 *
 * Type: function<br>
 * Name: html_kose<br>
 * Purpose: {html_kose} ile açilan çerçeveyi kapatir..
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_kose_kapa.html}
 * @example  
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_kose_kapa($params, &$smarty) {
	
	$sonuc_text ='</td>
    <td style=" border-right:#6e9fd0 solid 1px"><img src="images/bos.gif" border="0"/></td>
  </tr>
  <tr>
    <td style="background-image:url(images/ok_alt_sol.gif); background-repeat:no-repeat; width:5px; height:5px;"></td>
    <td style=" border-bottom:#6e9fd0 solid 1px"><img src="images/bos.gif" border="0"/></td>
    <td style="background-image:url(images/ok_alt_sag.gif); background-repeat:no-repeat; width:5px; height:5px;"></td>
  </tr>
</table>';
	
	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
