<?php
	$path='pool/images/childrentown/foto/';
	$d = dir($path);
	while (false !== ($entry = $d->read())) {
		if(strpos($entry,'.jpg')){//  $entry!='.' && $entry!='..' && is_file($path.$entry)){
			$fb=explode('.',$entry);
			$list[]='<a href="'.$path.'/big/'.$fb[0].'.'.$fb[1].'" target="_blank"><img src="'.$path.$entry.'" class="border_01" border="0" hspace="5" vspace="5" align="middle"></a>';
		}
	}
	$d->close();
?>

<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("about",0,"<?=$_GET['dr'];?>");</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title -->
<script type="text/javascript">
	if(current_page!=null && typeof(current_page.title_p)!="undefined"){ tp=current_page.title_p+"<br />"; }else{ tp=""; }
	if(current_page!=null && typeof(current_page.title)!="undefined"){
		document.writeln("<h1>"+tp+current_page.title+"</h1>");
	}
</script>
<!-- END page title -->

<!-- BEGIN -->

Город Детства

<h2>Фотогалерея</h2>
<?php
	print implode('',$list);
?>



<!-- END -->
</div>