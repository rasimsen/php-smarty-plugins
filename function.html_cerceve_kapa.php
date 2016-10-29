<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_cerceve} plugin
 *
 * Type: function<br>
 * Name: html_cerceve<br>
 * Purpose: {html_cerceve} ile açilan çerçeveyi kapatir..
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_cerceve_kapa.html}
 * @example  
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_cerceve_kapa($params, &$smarty) {
	
	$sonuc_text ='</td>
    <td style="background-image:url(images/cerceve/oc_sagorta.gif); background-repeat:repeat-y;"></td>
  </tr>
  <tr>
    <td style="background-image:url(images/cerceve/oc_solalt.gif); background-repeat:no-repeat; width:6px; height:6px;"></td>
    <td style="background-image:url(images/cerceve/oc_abg.gif); background-repeat:repeat-x;"></td>
    <td style="background-image:url(images/cerceve/oc_sagalt.gif); background-repeat:no-repeat; width:6px; height:6px;"></td>
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
