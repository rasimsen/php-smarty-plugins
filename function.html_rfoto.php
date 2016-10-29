<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {html_rdosya_yukle} plugin
 *
 * Type: function<br>
 * Name: html_rfoto_yukle<br>
 * Purpose: dosya yükleme
 *
 * ChangeLog:<br>
 * - 1.0 baþlangýç versiyonu
 * @link http://www.rasimsen.com./smarty-plugins/html_btn_onizle.html}
 * @example
 *
 * @version 1.0
 * @author Rasim ÞEN
 * @param array
 * @param Smarty
 * @return string
 */
function fotoGoster($fotoDizi=array(),$params,&$smarty){
	$c=count($fotoDizi);
	
	if($c==0){
		return "";
	}
	//pre($fotoDizi);
	$fotoHtml = "<div>";
		for($i=0;$i<$c;$i++){
			$fotoHtml .= '<span style="width:64px; float:left; padding:5px;"><img src="../dosya/foto/'.$fotoDizi[$i][THUMBNAIL].'" border="0" width="64px"/></span>';
		}
	$fotoHtml .= "</div>";
	return $fotoHtml;
}
function smarty_function_html_rfoto($params, &$smarty) {	
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');

	if($params[mode]=="list" || $params[mode]==3){			
		$foto = strlen($params[value])>0?$params[value]:sURL_FOTO.SMARTY_PLUGIN_FOTOBOS;	
		$obj='<img src="'.$foto.'" width="24">';
	}elseif($params[mode]=="view" || $params[mode]==2){
		$foto = strlen($params[value])>0?$params[value]:sURL_FOTO.SMARTY_PLUGIN_FOTOBOS;
		$obj  = '<img src="'.$foto.'" width="96">';
		$obj .= fotoGoster($params[foto],$params,$smarty);
		/**
		 * todo : id ile fotolarý listeleyecek bir yapý kurulacak
		 */
	}else{	
			$obj="\n";
			$obj .="\n".'<link href="sAraclar/jquery.fileapi-master/statics/main.css" rel="stylesheet">';
			$obj .="\n".'<script>';
			$obj .="\n"."var FileAPI = { debug: true, flashUrl: 'sAraclar/jquery.fileapi-master/FileAPI/FileAPI.flash.swf' };";
			$obj .="\n".'</script>';
			$obj .="\n".'<script src="//code.jquery.com/jquery-1.8.2.min.js"></script>';
			
			$obj .="\n".'<script>';
			$obj .="\n".'var FileAPI = {';
			$obj .="\n".'	debug: true';
			$obj .="\n"."	, staticPath: 'sAraclar/jquery.fileapi-master/FileAPI/'";
			$obj .="\n".'};';
			$obj .="\n".'</script>';
			$obj .="\n".'<script src="sAraclar/jquery.fileapi-master/FileAPI/FileAPI.min.js"></script>';
			$obj .="\n".'<script src="sAraclar/jquery.fileapi-master/FileAPI/FileAPI.exif.js"></script>';
			$obj .="\n".'<script src="sAraclar/jquery.fileapi-master/jquery.fileapi.js"></script>';
			$obj .="\n".'<script src="sAraclar/jquery.fileapi-master/jcrop/jquery.Jcrop.min.js"></script>';
			$obj .="\n".'<script src="sAraclar/jquery.fileapi-master/statics/jquery.modal.js"></script>';
		
			
			$obj .="\n".'<div id="multiupload">';
			$obj .="\n".'<div class="b-upload b-upload_multi">';
			$obj .="\n".'<div class="b-upload__hint">foto yukleme icin "Ekle" butonuna tiklayin, sonra yukle</div>';
			$obj .="\n".'<div class="js-files b-upload__files">';
			$obj .="\n".'<div class="js-file-tpl b-thumb" data-id="<%=uid%>" title="<%-name%>, <%-sizeText%>">';
			$obj .="\n".'<div data-fileapi="file.remove" class="b-thumb__del">X</div>';
			$obj .="\n".'<div class="b-thumb__preview">';
			$obj .="\n".'<div class="b-thumb__preview__pic"></div>';
			$obj .="\n".'</div>';
			$obj .="\n".'<% if( /^image/.test(type) ){ %>';
			$obj .="\n".'<div data-fileapi="file.rotate.cw" class="b-thumb__rotate"></div>';
			$obj .="\n".'<% } %>';
			$obj .="\n".'<div class="b-thumb__progress progress progress-small"><div class="bar"></div></div>';
			$obj .="\n".'<div class="b-thumb__name"><%-name%><input type="hidden" name="RFOTO[]" value="<%-name%>"></div>';
			$obj .="\n".'</div>';
			$obj .="\n".'</div>';
			$obj .="\n".'<hr>';
			$obj .="\n".'<div class="btn btn-success btn-small js-fileapi-wrapper">';
			$obj .="\n".'<span>Fotoðraf Ekle</span>';
			$obj .="\n".'<input type="file" name="filedata">';
			$obj .="\n".'<input type="hidden" id="id_'.SMARTY_PLUGIN_THUMBFOTOPREFIX.$params[name].'" name="'.SMARTY_PLUGIN_THUMBFOTOPREFIX.$params[name].'" value="'.$params[value].'">';
			$obj .="\n".'<input type="hidden" id="id_'.SMARTY_PLUGIN_FOTOPREFIX.$params[name].'" name="'.SMARTY_PLUGIN_FOTOPREFIX.$params[name].'" value="'.$params[value].'">';
			$obj .="\n".'<input type="hidden" name="YUKLENEN_DOSYA_TIPI" value="FOTO">';
			$obj .="\n".'</div>';			
				
			$obj .="\n".'<div class="js-upload btn btn-success btn-small">';
			$obj .="\n".'<span>Yükle</span>';
			$obj .="\n".'</div>';
			$obj .="\n".'</div>';
			$obj .="\n".'</div>';
			$obj .= "\n".fotoGoster($params[foto],$params,$smarty);
			
			$obj .="\n".'<script>';
			$obj .="\n"."$('#multiupload').fileapi({";
			$obj .="\n"."	url: 'oasis_dosya_yukle.php',";
			$obj .="\n".'	multiple: true,';
			$obj .="\n".'	// autoUpload: true, ';
			$obj .="\n".'onFileComplete: function (evt, uiEvt){';
			$obj .="\n".'	var file = uiEvt.file;';
			$obj .="\n".'	var json = uiEvt.result;';
			
			//$obj .="\n".'	//alert(json.NAME);';
			$obj .="\n".'	var gizliFotoObj = $("#id_'.SMARTY_PLUGIN_FOTOPREFIX.$params[name].'").val();';
			$obj .="\n".'	var gizliThumbFotoObj = $("#id_'.SMARTY_PLUGIN_THUMBFOTOPREFIX.$params[name].'").val();';
			$obj .="\n".'	$("#id_'.SMARTY_PLUGIN_FOTOPREFIX.$params[name].'").val( gizliFotoObj + "'.SMARTY_PLUGIN_FOTOAYRAC.'" +json.NAME);';			
			$obj .="\n".'	$("#id_'.SMARTY_PLUGIN_THUMBFOTOPREFIX.$params[name].'").val( gizliThumbFotoObj + "'.SMARTY_PLUGIN_FOTOAYRAC.'" +json.THUMBNAIL);';			
			//$obj .="\n".'   alert($("#id_foto_var_'.$params[name].'").val());';
			
			$obj .="\n".'},';
			$obj .="\n".'	elements: {';
			$obj .="\n"."		ctrl: { upload: '.js-upload' },";
			$obj .="\n"."		empty: { show: '.b-upload__hint' },";
			$obj .="\n"."		emptyQueue: { hide: '.js-upload' },";
			$obj .="\n"."		list: '.js-files',";
			$obj .="\n".'		file: {';
			$obj .="\n"."			tpl: '.js-file-tpl',";
			$obj .="\n".'			preview: {';
			$obj .="\n"."				el: '.b-thumb__preview',";
			$obj .="\n".'				width: 80,';
			$obj .="\n".'				height: 80';
			$obj .="\n".'			},';
			$obj .="\n"."			upload: { show: '.progress', hide: '.b-thumb__rotate' },";
			$obj .="\n"."			complete: { hide: '.progress' },";
			$obj .="\n"."			progress: '.progress .bar'";
			$obj .="\n".'		}';
			$obj .="\n".'	}';
			$obj .="\n".'});';
			$obj .="\n".'</script>';	
	}
	if($debug){
 		echo "<pre>";
 		var_dump($params,$obj);
 		echo "</pre>";
 	}

	return $obj;
}
?>
