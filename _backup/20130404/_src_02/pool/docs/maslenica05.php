<?php
	$path='pool/images/maslen05/centr/';
	$d = dir($path);
	while (false !== ($entry = $d->read())) {
		if(strpos($entry,'.jpg')){//  $entry!='.' && $entry!='..' && is_file($path.$entry)){
			$fb=explode('.',$entry);
			$list1[]='<a href="'.$path.'/big/'.$fb[0].'b.'.$fb[1].'" target="_blank"><img src="'.$path.$entry.'" class="border_01" border="0" hspace="5" vspace="5" align="middle"></a>';
		}
	}
	$d->close();

	$path='pool/images/maslen05/park/';
	$d = dir($path);
	while (false !== ($entry = $d->read())) {
		if(strpos($entry,'.jpg')){//  $entry!='.' && $entry!='..' && is_file($path.$entry)){
			$fb=explode('.',$entry);
			$list2[]='<a href="'.$path.'/big/'.$fb[0].'b.'.$fb[1].'" target="_blank"><img src="'.$path.$entry.'" class="border_01" border="0" hspace="5" vspace="5" align="middle"></a>';
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

<p>12 марта</p>
<ul class="smenu2">
	<li class="even"><a href="index.php?dr=maslen05/mas-kom.php">Комсомольская правда</a></li>
	<li class="odd"><a href="index.php?dr=maslen05/mas-t7.php">Телесемь</a></li>
</ul>

<h1>
	Фотогалерея<br />
	Центральная площадка праздника
</h1>
<?php
	if(isset($list1) && count($list1)>0){
		print '<p align="center">'.implode(' ',$list1).'</p>';
	}
?>

<h1>Детская площадка праздника</h1>
<?php
	if(isset($list2) && count($list2)>0){
		print '<p align="center">'.implode(' ',$list2).'</p>';
	}
?>


<!-- END -->
</div>