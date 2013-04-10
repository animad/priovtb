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
	
	$list['ustav'][]=array('ustav2006.zip','Устав 2006 г (действующая редакция)');
	$list['ustav'][]=array('ustav1.zip','Изменения №1 к Уставу 2006 г (действующая редакция)');

	$list['polog'][]=array('sovet.zip','Положение о Cовете директоров 2004 г (действующая редакция)');
	$list['polog'][]=array('pologenie_sovet2007.zip','Положение о Совете директоров - 2007 г (старая редакция)');
	$list['polog'][]=array('prav2008.zip','Положение о Правлении и Председателе Правления 2008 г (действующая редакция)');
	$list['polog'][]=array('prav2005.zip','Положение о Правлении и Председателе Правления 2005 г (старая редакция)');
	$list['polog'][]=array('revs2008.zip','Положение о ревизионной комиссии 2008 г (действующая редакция)');
	$list['polog'][]=array('reviz2002.zip','Положение о ревизионной комиссии 2002 г (старая редакция)');
	$list['polog'][]=array('svk2006.zip','Положение о службе внутреннего контроля 2006 г (действующая редакция)');
	$list['polog'][]=array('svk.zip','Положение о службе внутреннего контроля 2004 г (старая редакция)');
	$list['polog'][]=array('skomissia.zip','Положение о счетной комиссии - 2002 г (действующая редакция)');
	$list['polog'][]=array('sobr2003.zip','Положение о собрании 2003г (действующая редакция)');
	
	$list['other'][]=array('strategy2007.zip','Краткая стратегия Банка.');
	$list['other'][]=array('politika.zip','Политика банка  в области противодействия легализации (отмыванию) доходов, полученных преступным путем, и финансированию терроризма.');
	$list['other'][]=array('taina.zip','Положение о банковской тайне  от 15 апреля 1994г');
	$list['other'][]=array('upol2009.zip','Учетная политика на 2009 г');
	$list['other'][]=array('upol2008.zip','Учетная политика на 2008 г');
	$list['other'][]=array('upol2007.zip','Учетная политика на 2007 г');
	$list['other'][]=array('d1upol2007.zip','Дополнения №1 к Учетной политике на 2007 г');
	$list['other'][]=array('candidate2008.zip','Требования к пакету документов по выдвижению кандидатов в члены Совета директоров Прио-Внешторгбанка (ОАО) в соответствии с решением Совета директоров от 26.12.2007 года протокол № 10');
	$list['other'][]=array('kodeks.zip','Кодекс чести банкира');
	$list['other'][]=array('kodex_et.zip','Кодекс корпоративной этики');

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
		document.title=document.title+" | "+(current_page!=null && typeof(current_page.title_p)!="undefined"?current_page.title_p+", ":"")+current_page.title;
	}
</script>
<!-- END page title -->

<!-- BEGIN -->

<h2>Устав Прио-Внешторгбанка (ОАО)</h2>
<?php print listprn($list['ustav'],'ustav');?>
<br />
<h2>Положения, регулирующие деятельность органов Прио-Внешторгбанка (ОАО)</h2>
<?php print listprn($list['polog'],'polog');?>
<br />
<h2>Прочие документы</h2>
<?php print listprn($list['other'],'other');?>


<!-- END -->
</div>