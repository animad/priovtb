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
				$data4[]='<li'.colrow($i).'><a href="'.$fln.'" target="_blank" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).' (<i>'.$fl_size.' Кб</i>)</a></li>';
//				$data[]='<li'.colrow($i).'><a href="'.$fln.'" target="_blank" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).'</a></li>';
//				$data[]='<li>test</li>';
			}elseif($var[$i][2]=='p'){
				$data[]='<li'.colrow($i).'><a href="?dr='.$var[$i][0].'" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).'</a></li>';
			}
		}
		
		return '<ul class="smenu3">'.implode('',$data4).'</ul>';
	}
	
	$list['eotchet']['years']=array(2012,2011,2010,2009,2008,2007,2006,2005,2004,2003,2002,2001);
	
	$list['eotchet'][2012][]=array('pool/files/eotchet/0212q124.zip','за 4 квартал - отчетность по ценным бумагам','f');
	
	$list['eotchet'][2012][]=array('pool/files/eotchet/0212q123.zip','за 3 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2012][]=array('pool/files/eotchet/form806_26102012.zip','за 3 квартал - бухгалтерский баланс','f');
	$list['eotchet'][2012][]=array('pool/files/eotchet/form808_26102012.zip','за 3 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2012][]=array('pool/files/eotchet/form807_26102012.zip','за 3 квартал - отчет о прибылях и убытках','f');
	
	$list['eotchet'][2012][]=array('pool/files/eotchet/0212q122.zip','за 2 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2012][]=array('pool/files/eotchet/form806_03082012.zip','за 2 квартал - бухгалтерский баланс','f');
	$list['eotchet'][2012][]=array('pool/files/eotchet/form808_03082012.zip','за 2 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2012][]=array('pool/files/eotchet/form807_03082012.zip','за 2 квартал - отчет о прибылях и убытках','f');
	
    $list['eotchet'][2012][]=array('pool/files/eotchet/0212q121.zip','за 1 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2012][]=array('pool/files/eotchet/form806_27042012.zip','за 1 квартал - бухгалтерский баланс','f');
	$list['eotchet'][2012][]=array('pool/files/eotchet/form808_27042012.zip','за 1 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2012][]=array('pool/files/eotchet/form807_27042012.zip','за 1 квартал - отчет о прибылях и убытках','f');
	
    $list['eotchet'][2011][]=array('pool/files/eotchet/0212q114.zip','за 4 квартал - отчетность по ценным бумагам','f');
    $list['eotchet'][2011][]=array('pool/files/eotchet/0212q113.zip','за 3 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/form806_24102011.zip','за 3 квартал - бухгалтерский баланс','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/form808_24102011.zip','за 3 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/form807_24102011.zip','за 3 квартал - отчет о прибылях и убытках','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/0212q112.zip','за 2 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/form806_01082011.zip','за 2 квартал - бухгалтерский баланс','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/form808_01082011.zip','за 2 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/form807_01082011.zip','за 2 квартал - отчет о прибылях и убытках','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/0212q111.zip','за 1 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/form806_19042011.zip','за 1 квартал - бухгалтерский баланс','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/form808_19042011.zip','за 1 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2011][]=array('pool/files/eotchet/form807_19042011.zip','за 1 квартал - отчет о прибылях и убытках','f');
	
	$list['eotchet'][2010][]=array('pool/files/eotchet/0212q104.zip','за 4 квартал - отчетность по ценным бумагам','f');

	$list['eotchet'][2010][]=array('pool/files/eotchet/0212q103.zip','за 3 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2010][]=array('pool/files/eotchet/form808_01102010.zip','за 3 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2010][]=array('pool/files/eotchet/form807_01102010.zip','за 3 квартал - отчет о прибылях и убытках','f');
	$list['eotchet'][2010][]=array('pool/files/eotchet/form806_01102010.zip','за 3 квартал - бухгалтерский баланс','f');

	$list['eotchet'][2010][]=array('pool/files/eotchet/0212q102.zip','за 2 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2010][]=array('pool/files/eotchet/form808_01072010.zip','за 2 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2010][]=array('pool/files/eotchet/form807_01072010.zip','за 2 квартал - отчет о прибылях и убытках','f');
	$list['eotchet'][2010][]=array('pool/files/eotchet/form806_01072010.zip','за 2 квартал - бухгалтерский баланс','f');

	$list['eotchet'][2010][]=array('pool/files/eotchet/form808_01042010.zip','за 1 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2010][]=array('pool/files/eotchet/form807_01042010.zip','за 1 квартал - отчет о прибылях и убытках','f');
	$list['eotchet'][2010][]=array('pool/files/eotchet/form806_01042010.zip','за 1 квартал - бухгалтерский баланс','f');
	$list['eotchet'][2010][]=array('pool/files/eotchet/0212q101.zip','за 1 квартал - отчетность по ценным бумагам','f');

	$list['eotchet'][2009][]=array('pool/files/eotchet/0212q094_1.pdf','за 4 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2009][]=array('pool/files/eotchet/0212q093.zip','за 3 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2009][]=array('pool/files/eotchet/0212q092.zip','за 2 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2009][]=array('pool/files/eotchet/form_808_20090701.zip','за 2 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2009][]=array('pool/files/eotchet/form_807_20090701.zip','за 2 квартал - отчет о прибылях и убытках','f');
	$list['eotchet'][2009][]=array('pool/files/eotchet/form_806_20090701.zip','за 2 квартал - бухгалтерский баланс','f');
	$list['eotchet'][2009][]=array('pool/files/eotchet/0212q091.zip','за 1 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2009][]=array('pool/files/eotchet/form_808_20090401.zip','за 1 квартал - отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных активов','f');
	$list['eotchet'][2009][]=array('pool/files/eotchet/form_807_20090401.zip','за 1 квартал - отчет о прибылях и убытках','f');
	$list['eotchet'][2009][]=array('pool/files/eotchet/form_806_20090401.zip','за 1 квартал - бухгалтерский баланс','f');

	$list['eotchet'][2008][]=array('pool/files/eotchet/0212q084.zip','4 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2008][]=array('pool/files/eotchet/0212q083.zip','3 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2008][]=array('pool/files/eotchet/0212q082.zip','2 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2008][]=array('pool/files/eotchet/0212q081.rar','1 квартал - отчетность по ценным бумагам','f');

	$list['eotchet'][2007][]=array('pool/files/eotchet/0212q074.rar','4 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2007][]=array('pool/files/eotchet/0212q073.rar','3 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2007][]=array('pool/files/eotchet/0212q072.rar','2 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2007][]=array('pool/files/eotchet/qv1-2007_.zip','1 квартал - отчетность по ценным бумагам','f');

	$list['eotchet'][2006][]=array('pool/files/eotchet/qv4-2006.rar','4 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2006][]=array('pool/files/eotchet/qv3-2006.rar','3 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2006][]=array('pool/files/eotchet/qv2-2006.rar','2 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2006][]=array('pool/files/eotchet/0212q061.rar','1 квартал - отчетность по ценным бумагам','f');

	$list['eotchet'][2005][]=array('pool/files/eotchet/qv4-2005.zip','4 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2005][]=array('pool/files/eotchet/qv3-2005.zip','3 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2005][]=array('pool/files/eotchet/qv2-2005.zip','2 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2005][]=array('pool/files/eotchet/qv1-2005.zip','1 квартал - отчетность по ценным бумагам','f');

	$list['eotchet'][2004][]=array('pool/files/eotchet/qv4-2004.zip','4 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2004][]=array('pool/files/eotchet/qv3-2004.zip','3 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2004][]=array('pool/files/eotchet/qv2-2004.zip','2 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2004][]=array('pool/files/eotchet/qv1-2004.zip','1 квартал - отчетность по ценным бумагам','f');

	$list['eotchet'][2003][]=array('pool/files/eotchet/qv4-2003.zip','4 квартал - отчетность по ценным бумагам','f');
	$list['eotchet'][2003][]=array('pool/files/eotchet/qv3-2003.zip','3 квартал - отчетность по ценным бумагам','f');

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

	reset($list['eotchet']['years']);
	while(list($key,$val)=each($list['eotchet']['years'])){
		if(isset($list['eotchet'][$val])){
			print '<div><strong>за '.$val.' год</strong></div><br />';
			print listprn($list['eotchet'][$val]);
			print '<br />';
		}
	}

?>

<!-- END -->
</div>
