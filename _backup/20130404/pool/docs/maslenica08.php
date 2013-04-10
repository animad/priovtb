<?php
	$path='pool/images/maslen08/';
	$d = dir($path);
	while (false !== ($entry = $d->read())) {
		if(strpos($entry,'.jpg')){//  $entry!='.' && $entry!='..' && is_file($path.$entry)){
			$fb=explode('.',$entry);
			$list[]='<a href="'.$path.'/big/'.$fb[0].'b.'.$fb[1].'" target="_blank"><img src="'.$path.$entry.'" class="border_01" border="0" hspace="5" vspace="5" align="middle"></a>';
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
<p>8 марта</p>
<ul class="smenu2">
	<li class="even"><a href="pool/images/maslen08/big/mas08-kom.pdf" target="_blank">Комсомольская правда</a></li>
	<li class="odd"><a href="pool/images/maslen08/big/mas08-sov.jpg" target="_blank">Совет директоров</a></li>
</ul>

<h1>
	Фотогалерея<br />
	Праздник в городском парке
</h1>
<?php
	if(isset($list) && count($list)>0){
		print '<p align="center">'.implode(' ',$list).'</p>';
	}
?>



<!-- END -->
</div>