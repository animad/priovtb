<?php
	$path='pool/images/maslenica10';
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
<p>13 февраля</p>
<ul class="smenu2"><li class="even"><a href="pool/docs/maslenica10/delov-nedelja-gray.jpg" target="_blank">"Деловая неделя", 22 февраля</a></li><li class="odd"><a href="pool/docs/maslenica10/koms-gray.jpg" target="_blank">"Комсомольская правда", 18 февраля</a></li><li class="even"><a href="pool/docs/maslenica10/rodnoj-gorod-grey.jpg" target="_blank">"Родной город", №7, 14 февраля</a></li></ul>

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