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
function smarty_function_html_rfoto_yukle($params, &$smarty) {
	$debug=0;
	require_once(SMARTY_PLUGINS_DIR . 'shared.escape_special_chars.php');
		
	$obj='';
	$obj .='<link href="sAraclar/jquery.fileapi-master/statics/main.css" rel="stylesheet">';
	$obj .='<script>';
	$obj .="var FileAPI = { debug: true, flashUrl: 'sAraclar/jquery.fileapi-master/FileAPI/FileAPI.flash.swf' };";
	$obj .='</script>';
	$obj .='<script src="//code.jquery.com/jquery-1.8.2.min.js"></script>';
	
	$obj .='<script>';
	$obj .='var FileAPI = {';
	$obj .='	debug: true';
	$obj .="	, staticPath: 'sAraclar/jquery.fileapi-master/FileAPI/'";
	$obj .='};';
	$obj .='</script>';
	$obj .='<script src="sAraclar/jquery.fileapi-master/FileAPI/FileAPI.min.js"></script>';
	$obj .='<script src="sAraclar/jquery.fileapi-master/FileAPI/FileAPI.exif.js"></script>';
	$obj .='<script src="sAraclar/jquery.fileapi-master/jquery.fileapi.js"></script>';
	$obj .='<script src="sAraclar/jquery.fileapi-master/jcrop/jquery.Jcrop.min.js"></script>';
	$obj .='<script src="sAraclar/jquery.fileapi-master/statics/jquery.modal.js"></script>';
	$obj .='</script>';

	
	$obj .='<div id="multiupload">';
	$obj .='<div class="b-upload b-upload_multi">';
	$obj .='<div class="b-upload__hint">foto yukleme icin "Ekle" butonuna tiklayin, sonra yukle</div>';
	$obj .='<div class="js-files b-upload__files">';
	$obj .='<div class="js-file-tpl b-thumb" data-id="<%=uid%>" title="<%-name%>, <%-sizeText%>">';
	$obj .='<div data-fileapi="file.remove" class="b-thumb__del">X</div>';
	$obj .='<div class="b-thumb__preview">';
	$obj .='<div class="b-thumb__preview__pic"></div>';
	$obj .='</div>';
	$obj .='<% if( /^image/.test(type) ){ %>';
	$obj .='<div data-fileapi="file.rotate.cw" class="b-thumb__rotate"></div>';
	$obj .='<% } %>';
	$obj .='<div class="b-thumb__progress progress progress-small"><div class="bar"></div></div>';
	$obj .='<div class="b-thumb__name"><%-name%></div>';
	$obj .='</div>';
	$obj .='</div>';
	$obj .='<hr>';
	$obj .='<div class="btn btn-success btn-small js-fileapi-wrapper">';
	$obj .='<span>Fotograf Ekle</span>';
	$obj .='<input type="file" name="filedata">';
	$obj .='</div>';
	$obj .='<div class="js-upload btn btn-success btn-small">';
	$obj .='<span>Yukle</span>';
	$obj .='</div>';
	$obj .='</div>';
	$obj .='</div>';
	
	
	$obj .='<script>';
	$obj .="$('#multiupload').fileapi({";
	$obj .="	url: 'http://rubaxa.org/FileAPI/server/ctrl.php',";
	$obj .='	multiple: true,';
	$obj .='	// autoUpload: true, ';
	$obj .='	elements: {';
	$obj .="		ctrl: { upload: '.js-upload' },";
	$obj .="		empty: { show: '.b-upload__hint' },";
	$obj .="		emptyQueue: { hide: '.js-upload' },";
	$obj .="		list: '.js-files',";
	$obj .='		file: {';
	$obj .="			tpl: '.js-file-tpl',";
	$obj .='			preview: {';
	$obj .="				el: '.b-thumb__preview',";
	$obj .='				width: 80,';
	$obj .='				height: 80';
	$obj .='			},';
	$obj .="			upload: { show: '.progress', hide: '.b-thumb__rotate' },";
	$obj .="			complete: { hide: '.progress' },";
	$obj .="			progress: '.progress .bar'";
	$obj .='		}';
	$obj .='	}';
	$obj .='});';
	$obj .='</script>';	
	
	if($debug){
 		echo "<pre>";
 		var_dump($params,$obj);
 		echo "</pre>";
 	}

	return $obj;
}
?>
