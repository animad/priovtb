<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	if(!isset($_GET['m'])){ $_GET['m']='r'; }
	switch($_GET['m']){
		case 'r':
			$fln='pool/docs/vkladr.htm';
		break;
		case 'v':
			$fln='pool/docs/vkladv.htm';
		break;
		default:
			$fln='pool/docs/vkladr.htm';
		break;
	}
	ob_start();
	include($fln);
	$data2=ob_get_contents();
	ob_end_clean();
	
?>
<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("fiz",0,"<?=$_GET['dr'];?>");</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title -->
<script type="text/javascript">
	if(current_page!=null && typeof(current_page.title_p)!="undefined"){ tp=current_page.title_p+"<br />"; }else{ tp=""; }
	if(current_page!=null && typeof(current_page.title)!="undefined"){
		document.writeln("<h1>"+tp+current_page.title+"</h1>");
		document.title=document.title+" | "+(current_page!=null && typeof(current_page.title_p)!="undefined"?current_page.title_p+", ":"")+current_page.title;
	}
</script>
<!-- END page title -->

<!-- BEGIN -->

<?php
	$a['m']=array('r'=>'вклады в рублях','v'=>'вклады в валюте');
	print '<div class="block"><div class="text2">';
	while(list($key,$val)=each($a['m'])){
		print '<a href="?dr='.$_GET['dr'].'&m='.$key.'" class="cell'.(isset($_GET['m']) && $_GET['m']==$key?'2':'').'">'.$val.'</a> ';
	}
	print '</div></div>';
	print $data2;
?>

<!-- END -->
</div>