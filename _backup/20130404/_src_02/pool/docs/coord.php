<?php
	if(!isset($_GET['m'])){ $_GET['m']='ryazan'; }
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

<div class="block">
	<div class="text2">
<?php
	$a['towns']=array('ryazan'=>'Рязань','moscow'=>'Москва','kasimov'=>'Касимов','novomich'=>'Новомичуринск','scopin'=>'Скопин','rybnoe'=>'Рыбное','shack'=>'Шацк','sasovo'=>'Сасово');
	while(list($key,$val)=each($a['towns'])){
		print '<a href="'.$_SERVER['PHP_SELF'].'?dr=coord.php&m='.$key.'" class="cell'.(isset($_GET['m']) && $_GET['m']==$key?'2':'').'">'.$val.'</a> ';
	}
?>
	</div>
</div>
<br />
<div class="block">
	<div class="text2">
<?php
	$a['towns']=array('bankomats'=>'Банкоматы','terminals'=>'Терминалы самообслуживания');
	while(list($key,$val)=each($a['towns'])){
		print '<a href="'.$_SERVER['PHP_SELF'].'?dr=coord.php&m='.$key.'" class="cell'.(isset($_GET['m']) && $_GET['m']==$key?'2':'').'">'.$val.'</a> ';
	}
?>
	</div>
</div>
<br />

<?php
	print '<pre>';
	var_export($gStore);
	print '</pre>';
	
	print '<div class="btn_customize" var="gps">настройка</div>';
	
	$fln='pool/docs/coord/'.trim($_GET['m']).'.html';
	if(file_exists($fln) && filesize($fln)){
		include($fln);
	}else{ print '<br /><div align="center">- данные не найдены -</div>'; }
?>







<!-- END -->
</div>