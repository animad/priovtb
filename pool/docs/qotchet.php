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
				$data[]='<li'.colrow($i).'><a href="'.$fln.'" target="_blank" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).' (<i>'.$fl_size.'  б</i>)</a></li>';
			}elseif($var[$i][2]=='p'){
				$data[]='<li'.colrow($i).'><a href="?dr='.$var[$i][0].'" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).'</a></li>';
			}
		}
		return '<ul class="smenu3">'.implode('',$data).'</ul>';
	}

	$list['gotchet']['years']=array(2009);
	
	$list['gotchet'][2009][]=array('pool/files/gotchet/kvotchet2009.zip',' вартальна€ отчетность за 2009 год','f');


	
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