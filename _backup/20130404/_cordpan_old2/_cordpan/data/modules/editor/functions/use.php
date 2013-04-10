<?php

	$this->tools[$ti['tool']]['path']='data/modules/editor';
	$this->tools[$ti['tool']]['js']['load']='<script type="text/javascript" src="'.$this->tools[$ti['tool']]['path'].'/tiny_mce/tiny_mce_src.js"></script>'.
						'<script type="text/javascript" src="_cordpan/'.$this->tools[$ti['tool']]['path'].'/lists/image_list.js"></script>';

	$this->tools[$ti['tool']]['js']['init']['minimal']='
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		language : "ru",
		plugins : "safari,pagebreak,style,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		editor_selector : "%work_element%",

		// Theme options
		theme_advanced_buttons1 : "cut,copy,paste,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,|,sub,sup,|,image,link,unlink,hr,|,cleanup,code",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_resizing : true,

		relative_urls : true, // Default value
		document_base_url : "http://'.$_SERVER['SERVER_NAME'].$_dir['site_postfix'].'/",
		forced_root_block: false,

		// Example content CSS (should be your site CSS)
		content_css : "files/skin/standart/skin2/centerdata.css?" + new Date().getTime(),
		body_class : "%css_body%",
		
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "_cordpan/'.$this->tools[$ti['tool']]['path'].'/lists/template_list.js",
		external_link_list_url : "_cordpan/'.$this->tools[$ti['tool']]['path'].'/lists/link_list.js",
		external_image_list_url : "_cordpan/'.$this->tools[$ti['tool']]['path'].'/lists/image_list.js",
		media_external_list_url : "_cordpan/'.$this->tools[$ti['tool']]['path'].'/lists/media_list.js"

	});';

	$this->tools[$ti['tool']]['js']['init']['maximal']='
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		language : "ru",
		plugins : "safari,pagebreak,style,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		editor_selector : "%work_element%",

		// Theme options
		theme_advanced_buttons1 : "print,preview,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,undo,redo,|,insertdate,inserttime,|,visualchars,|,link,unlink,anchor,image,cleanup,code,|,advhr,hr,emotions,charmap,|,help",
		theme_advanced_buttons2 : "styleprops,|,bold,italic,underline,strikethrough,|,sub,sup,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,|,bullist,numlist,|,outdent,indent,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,removeformat,visualaid,|,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_resizing : false,
		
		relative_urls : true, // Default value
		document_base_url : "http://'.$_SERVER['SERVER_NAME'].$_dir['site_postfix'].'/",

		// Example content CSS (should be your site CSS)
		content_css : "files/skin/standart/skin2/centerdata.css?" + new Date().getTime(),
		body_class : "%css_body%",
		
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "cordpan/'.$this->tools[$ti['tool']]['path'].'/lists/template_list.js",
		external_link_list_url : "_cordpan/'.$this->tools[$ti['tool']]['path'].'/lists/link_list.js",
		external_image_list_url : "_cordpan/'.$this->tools[$ti['tool']]['path'].'/lists/image_list.js",
		media_external_list_url : "_cordpan/'.$this->tools[$ti['tool']]['path'].'/lists/media_list.js"

	});';

	
	$this->tools[$ti['tool']]['html']['textarea']='<textarea class="%work_element%" name="%work_element%" style="width: %sz_width%; height: %sz_height%; background-color: yellow">%work_text%</textarea>';
	
	
?>
