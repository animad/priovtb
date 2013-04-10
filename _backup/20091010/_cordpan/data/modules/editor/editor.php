<?php
	$p1='data/modules/editor';
	
	$data_ilist=list_img('pool/images');
	$fln=$p1.'/lists/image_list.js';
	$fp=fopen($fln, 'w+');
	$ans=fwrite ($fp, $data_ilist);
	fclose ($fp);
	@chmod($fln, 0777);
	unset($data_ilist);


//	exit();
?>



<script type="text/javascript" src="<?=$p1;?>/tiny_mce/tiny_mce_src.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		language : "ru",
		plugins : "safari,pagebreak,style,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		auto_focus : "elm1",
		
		relative_urls : true, // Default value
		document_base_url : "http://<?=$_SERVER['SERVER_NAME'].$_dir['site_postfix'];?>/",

		// Theme options
		theme_advanced_buttons1 : "print,preview,|,cut,copy,paste,pastetext,pasteword,|,search,replace,|,undo,redo,|,insertdate,inserttime,|,visualchars,|,link,unlink,anchor,image,cleanup,code,|,advhr,hr,emotions,charmap,|,help",
		theme_advanced_buttons2 : "styleprops,|,bold,italic,underline,strikethrough,|,sub,sup,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,|,bullist,numlist,|,outdent,indent,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,removeformat,visualaid,|,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_resizing : false,

		// Example content CSS (should be your site CSS)
		content_css : "files/skin/standart/styles/centerdata.css?" + new Date().getTime(),
		body_class : "text2",
		
		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "cordpan/<?=$p1;?>/lists/template_list.js",
		external_link_list_url : "cordpan/<?=$p1;?>/lists/link_list.js",
		external_image_list_url : "cordpan/<?=$p1;?>/lists/image_list.js",
		media_external_list_url : "cordpan/<?=$p1;?>/lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
	
	function f_save(){
		t="f_prefix";
		t2="editorDO";
		var elem=document.createElement("input");
		elem.setAttribute("type","hidden");
		elem.setAttribute("name",t);
		elem.setAttribute("value",document.getElementById(t).value);
		document.getElementById(t2).appendChild(elem);

		t="f_name";
		var elem=document.createElement("input");
		elem.setAttribute("type","hidden");
		elem.setAttribute("name",t);
		elem.setAttribute("value",document.getElementById(t).value);
		document.getElementById(t2).appendChild(elem);

		t="f_ext";
		var elem=document.createElement("input");
		elem.setAttribute("type","hidden");
		elem.setAttribute("name",t);
		elem.setAttribute("value",document.getElementById(t).value);
		document.getElementById(t2).appendChild(elem);

		document.getElementById(t2).submit("true");
	}
</script>

<form name="editorDO" id="editorDO" method="post" action="<?=$p1;?>/save.php" onsubmit="return f_save();" style="margin: 0px; padding: 0px">
	<div align="center">
		<textarea id="elm1" name="elm1" style="width: 800px; height:600px; background-color: #112345">%page2edit%</textarea>
	</div>
</form>

<?php
	//--- удаляем файлы
//	unlink($f11_d);

?>
