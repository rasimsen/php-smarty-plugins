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
 * Name: html_araccubugu<br>
 * Purpose: standart araç çubugu çizme
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_araccubugu.html}
 * @example  {html_araccubugu with="50" height="100"}{html_araccubugu_kapa}, parametreleri asagidaki gibidir..
 * <table width="70%" height="" border="0" cellspacing="0" cellpadding="0" class="" style="" align="" onmousedown="" onmousemove="" onmouseout="" onmouseover="" onmouseup="">...
 * 
 * default olarak arama, ileri, geri, refresh, bilgi butonlari gelecek
 *
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function smarty_function_html_araccubugu($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
	
	$sonuc=array();
	$deger=array();
	
	foreach ($params as $_key=>$_value) {
		switch ($_key) {
			case 'name':
			case 'id';
			case 'class':
			case 'title':
			case 'onblur':
				$js_arr[standart]='onBlur(this,)';				
				break;
			case 'onclick':
				$sonuc[$_key]=$_key.'="'.$_value.';"';
				break;
			case 'onmouseover':
			case 'onmousedown':
			case 'onmousemove':
			case 'onmouseout':
			case 'onmouseover':
			case 'onmouseup':
				$sonuc[$_key]=$_key.'="'.$_value.';"';
				break;
			case 'width':
			case 'height':	
			case 'border':	
			case 'cellspacing':	
			case 'cellpadding':	
			case 'align':	
			case 'style':
				$sonuc[$_key]=$_key.'="'.$_value.';"';
				break;				
			default:
				if(!is_array($_value)) {
					/*$extra_attributes.= ' '.$_key.'="'
						.smarty_function_escape_special_chars($_value).'"';*/
					$sonuc[$_key]=$_key.'="'.smarty_function_escape_special_chars($_value).'"';					
				} else {
					$smarty->trigger_error("html_rtext: ekstra özellik '$_key' dizi olamaz", E_USER_NOTICE);
				}
			break;
		}
	}
	
	//stil verilmedi ise
	if(!$params['border'])
		$sonuc['border']='border="0"';

	if(!$params['cellspacing'])
		$sonuc['cellspacing']='cellspacing="0"';
		
	if(!$params['cellpadding'])
		$sonuc['cellpadding']='cellpadding="0"';			

	if(!$params['width'])
		$sonuc['width']='width="50%"';			

	if(!$params['align'])
		$sonuc['align']='align="center"';			
		
	if(count($js_arr)>0) $sonuc["blur"]='onblur="'.implode(';',$js_arr).(count($js_arr)>0?';':'').'"';
	$sonuc["value"]=$deger[value]?$deger[value]:$deger[varsayilan];

	//$params[ara] : arama formunun çerçevesinin id sidir. göster/gizle yapacak buna göre
	//sayfada global bir js degisken tanimlanir. bu sayfa idiyi belirtir.
	$arama='<a href="javascript://" onclick="ara()"><image src="images/araccubugu/ot_ara.gif" border="0" title="Ara" alt="Ara" class="ot_ara"/></a>';
	//
	$ileri='<a href="javascript://" onclick="sayfaIleri()"><image src="images/araccubugu/ot_ileri.gif" border="0" title="Ileri" alt="Ileri" class="ot_ileri"/></a>';
	$geri='<a  href="javascript://" onclick="sayfaGeri()"><image src="images/araccubugu/ot_geri.gif" border="0" title="Geri" alt="Geri" class="ot_geri"/></a>';
	$refresh='<a href="javascript://" onclick="sayfaYenile()"><image src="images/araccubugu/ot_refresh.gif" border="0" title="Yenile" alt="Yenile" class="ot_yenile"/></a>';
	
	$sonuc_text ='<table '.implode(' ',$sonuc).'>
    <tr>
      <td style="background-image:url(images/araccubugu/ot_sol.gif); background-repeat:no-repeat; width:7px; height:35px;"></td>
      <td style="background-image:url(images/araccubugu/ot_bg.gif); background-repeat:repeat-x;"><div>';
	
	$sonuc_text.='<table border="0"  cellspacing="0" cellpadding="0" width="100%"><tr><td width="21px">'.$arama.'</td><td width="21px">'.$geri.'</td><td width="21px">'.$refresh.'</td><td width="21px">'.$ileri.'</td><td widh="*">&nbsp;';
	
	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
