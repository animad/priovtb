<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	function listprn(&$var){
		for($i=0; $i<count($var); $i++){
			if($var[$i][2]=='f'){
				$fln=$var[$i][0];
				$fl_size=round(filesize($fln)/1024*10)/10;
				$data[]='<li'.colrow($i).'><a href="'.$fln.'" target="_blank" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).' (<i>'.$fl_size.' Кб</i>)</a></li>';
			}elseif($var[$i][2]=='p'){
				$data[]='<li'.colrow($i).'><a href="?dr='.$var[$i][0].'" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).'</a></li>';
			}
		}
		return '<ul class="smenu3">'.implode('',$data).'</ul>';
	}

	$list['gotchet']['years']=array(2009,2008,2007,2006,2005,2004,2003,2002,2001);

	$list['gotchet'][2009][]=array('pool/files/gotchet/msfo2009.zip','отчет по МСФО','f');
	$list['gotchet'][2009][]=array('pool/files/gotchet/g2009.zip','годовой отчет ОАО &laquo;ПРИО-ВНЕШТОРГБАНКА&raquo;','f');
	$list['gotchet'][2009][]=array('finans09.php','формы финансовой отчетности','p');
	
	$list['gotchet'][2008][]=array('pool/files/gotchet/msfo2008.zip','отчет по МСФО','f');
	$list['gotchet'][2008][]=array('pool/files/gotchet/g2008.zip','годовой отчет ОАО &laquo;ПРИО-ВНЕШТОРГБАНКА&raquo;','f');
	$list['gotchet'][2008][]=array('finans08.php','формы финансовой отчетности','p');

	$list['gotchet'][2007][]=array('pool/files/gotchet/msfo2007.zip','отчет по МСФО','f');
	$list['gotchet'][2007][]=array('pool/files/gotchet/g2007.zip','годовой отчет ОАО &laquo;ПРИО-ВНЕШТОРГБАНКА&raquo;','f');
	$list['gotchet'][2007][]=array('finans07.php','формы финансовой отчетности','p');

	$list['gotchet'][2006][]=array('pool/files/gotchet/g2006.zip','годовой отчет ОАО &laquo;ПРИО-ВНЕШТОРГБАНКА&raquo;','f');
	$list['gotchet'][2006][]=array('finans06.php','формы финансовой отчетности','p');

	$list['gotchet'][2005][]=array('pool/files/gotchet/g2005.zip','годовой отчет ОАО &laquo;ПРИО-ВНЕШТОРГБАНКА&raquo;','f');
	$list['gotchet'][2005][]=array('finans05.php','формы финансовой отчетности','p');

	$list['gotchet'][2004][]=array('pool/files/gotchet/g2004.zip','годовой отчет ОАО &laquo;ПРИО-ВНЕШТОРГБАНКА&raquo;','f');
	$list['gotchet'][2004][]=array('finans04.php','формы финансовой отчетности','p');

	$list['gotchet'][2003][]=array('finans03.php','формы финансовой отчетности','p');

	$list['gotchet'][2002][]=array('finans02.php','формы финансовой отчетности','p');

	$list['gotchet'][2001][]=array('finans01.php','формы финансовой отчетности','p');

//	$list['gotchet'][2009][]=array('kvotchet2009.zip','Квартальная отчетность за 2009 год');


	
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

<?php
	
	for($i=0; $i<count($list['gotchet']['years']); $i++){
		if(isset($list['gotchet'][$list['gotchet']['years'][$i]])){
			print '<div><strong>за '.$list['gotchet']['years'][$i].' год</strong></div><br />';
			print listprn($list['gotchet'][$list['gotchet']['years'][$i]]);
			print '<br />';
		}
	}
?>

<!-- END -->
</div>