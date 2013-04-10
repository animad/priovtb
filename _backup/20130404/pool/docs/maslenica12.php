<?php
	$path='pool/images/maslenica12';
	$d = dir($path.'/thumb');
	while (false !== ($entry = $d->read())) {
		if(strpos($entry,'.jpg')){//  $entry!='.' && $entry!='..' && is_file($path.'/thumb/'.$entry)){
			$fb=explode('.',$entry);
			$list[]='<a href="'.$path.'/preview/'.$fb[0].'.'.$fb[1].'" target="_blank"><img src="'.$path.'/thumb/'.$entry.'" class="border_01" border="0" hspace="5" vspace="5" align="middle"></a>';
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
<p>25 февраля</p>
<ul class="smenu2"><li class="even"><a href="pool/docs/maslenica12/Родной город 6 марта.jpg" target="_blank">"Родной город", 6 марта</a></li><li class="odd"><a href="pool/docs/maslenica12/Рязанские ведомости 28 февраля.pdf" target="_blank">"Рязанские ведомости", 28 февраля</a></li><li class="even"><a href="pool/docs/maslenica12/Совет директоров 5 марта.jpg" target="_blank">"Совет директоров", 5 марта</a></li></ul>

<h1>
	Фотогалерея<br />
	Праздник в городском парке
</h1>
<?php
	if(isset($list) && count($list)>0){
		print '<div align="center">'."\r\n".implode("&shy;",$list)."\r\n".'</div>';
	}
?>



<!-- END -->
</div>