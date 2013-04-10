<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	function listprn(&$var,$path=null){
		for($i=0; $i<count($var); $i++){
			$fln='pool/files/'.$path.'/'.$var[$i][0];
			$fl_size=round(filesize($fln)/1024*10)/10;
			$data[]='<li'.colrow($i).'><a href="'.$fln.'" target="_blank" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).' (<i>'.$fl_size.' Кб</i>)</a></li>';
		}
		return '<ul class="smenu3">'.implode('',$data).'</ul>';
	}
	
	$list['foc'][]=array('operu_nr.zip','Договор банковского счета для Операционного управления Прио-Внешторгбанка');
	$list['foc'][]=array('promotdel_nr.zip','Договор банковского счета для ДО «Промышленное отделение»');
	$list['foc'][]=array('moskva_nr.zip','Договор банковского счета для «Московского филиала»');
	$list['foc'][]=array('shatsk_nr.zip','Договор банковского счета для ДО «Шацкое отделение»');
	$list['foc'][]=array('kasimov_nr.zip','Договор банковского счета для ДО «Касимовское отделение»');
	$list['foc'][]=array('novomitchurinsk_nr.zip','Договор банковского счета для ДО «Новомичуринское отделение»');
	$list['foc'][]=array('rybnoe_nr.zip','Договор банковского счета для ДО «Рыбновское отделение»');
	$list['foc'][]=array('sasovo_nr.zip','Договор банковского счета для ДО «Сасовское отделение»');
	$list['foc'][]=array('scopin_nr.zip','Договор банковского счета для ДО «Скопинское отделение»');
	
?>
<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("biz",0,"<?=$_GET['dr'];?>");</script><!-- END submenu -->
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

<?php print listprn($list['foc'],'contracts');?>

<!-- END -->
</div>