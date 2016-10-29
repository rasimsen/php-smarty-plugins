<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_nav} plugin
 *
 * Type: function<br>
 * Name: html_nav<br>
 * Purpose:grid lerin altina standart nav koymak için
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_nav.html}
 * @example  
 * 
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */

/*
	toplam kayit sayisi,
	sayfada listelenecek kayit sayisi,
	aktif/suanki sayfa nosu

	$param=array(
					'toplam_kayit'=>..,//toplam kayit adedi..
					'gosterilecek_kayit'=>..,//sayfada gosterilecek olan kayit miktari
					'p'=>..,//bulunulan sayfa
					'url'=>..//sayfa adresi
				);
	
*/
function smarty_function_html_nav($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');

	$t=$params[toplam_kayit];
	
	if($t==0) return;
	
	$pl=$params[gosterilecek_kayit]?$params[gosterilecek_kayit]:20;
	$p=$params[p]?$params[p]:0;//page-sayfa
	$toplam_sayfa=ceil($t/$pl);//yukari yuvarla

	//önceki kayit : (0+10-1)%10
	$onceki=$toplam_sayfa>0?(($p+$toplam_sayfa-1)%$toplam_sayfa):0;
	//sonraki:(9+10+1)%10
	$sonraki=$toplam_sayfa>0?(($p+$toplam_sayfa+1)%$toplam_sayfa):0;
	$pos = strrpos($params[url], "?");
	$params[url] = $pos === false ? $params[url].'?':$params[url];

	if($toplam_sayfa<10){//10 dan küçük ise 1 den 10 a kadar yaz, büyükse 5 öncesi 5 sonrasi geri kalan nokta nokta .. olsun
		$n='';
		for($i=0;$i<$toplam_sayfa;$i++){
			$n.='<div id="vli_nav_td"><a href="'.$params[url].'&p='.$i.'">'.$i.'</a></div>';
		}
	}else{
		if($p<5) {$po=0;$n='';$l=15;$n_bas='';$n_son='<div id="vli_nav_td">...</div>';}
		else{$po=$p-5;$l=$po+15;$n_bas='<div id="vli_nav_td">...</div>';$n_son='<div id="vli_nav_td">...</div>';}
		for($po;$po<$l;$po++){
			$n.='<div id="vli_nav_td"><a href="'.$params[url].'&p='.$po.'">'.$po.'</a></div>';		
		}
		$n=$n_bas.$n.$n_son;
	}
	$sonuc_text = 
		'<table width="100%" border="0" cellspacing="0" cellpadding="0" class="vli_nav_tbl"><tr><td align="center"><table border="0" cellspacing="0" cellpadding="0"><tr><td><div id="vli_nav">
				<div id="vli_nav_td"><a href="'.$params[url].'&p=0"><img src="images/nav/ilk.png" border="0"/></a></div>
				<div id="vli_nav_td"><a href="'.$params[url].'&p='.$onceki.'"><img src="images/nav/onceki.png" border="0"/></a></div>';

	$sonuc_text .= $n;
	
	$sonuc_text .= 
			'<div id="vli_nav_td"><a href="'.$params[url].'&p='.$sonraki.'"><img src="images/nav/sonraki.png" border="0"/></a></div>
			<div id="vli_nav_td"><a href="'.$params[url].'&p='.$toplam_sayfa.'"><img src="images/nav/son.png" border="0"/></a></div>
		</td></tr></table></td></tr></table></div>';				

	if($debug){
 		echo "<pre>";
 		var_dump($params,$sonuc_text);
 		echo "</pre>";
 	}
	
	return $sonuc_text;
}
?>
