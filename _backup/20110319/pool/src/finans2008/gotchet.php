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
				$data[]='<li'.colrow($i).'><a href="'.$fln.'" target="_blank" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).' (<i>'.$fl_size.' ��</i>)</a></li>';
			}elseif($var[$i][2]=='p'){
				$data[]='<li'.colrow($i).'><a href="?dr='.$var[$i][0].'" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).'</a></li>';
			}
		}
		return '<ul class="smenu3">'.implode('',$data).'</ul>';
	}

	$list['gotchet']['years']=array(2009,2008,2007,2006,2005,2004,2003,2002,2001);

	$list['gotchet'][2009][]=array('pool/files/gotchet/msfo2009.zip','����� �� ����','f');
	$list['gotchet'][2009][]=array('pool/files/gotchet/g2009.zip','������� ����� ��� &laquo;����-�������������&raquo;','f');
	$list['gotchet'][2009][]=array('finans09.php','����� ���������� ����������','p');
	
	$list['gotchet'][2008][]=array('pool/files/gotchet/msfo2008.zip','����� �� ����','f');
	$list['gotchet'][2008][]=array('pool/files/gotchet/g2008.zip','������� ����� ��� &laquo;����-�������������&raquo;','f');
	$list['gotchet'][2008][]=array('finans08.php','����� ���������� ����������','p');

	$list['gotchet'][2007][]=array('pool/files/gotchet/msfo2007.zip','����� �� ����','f');
	$list['gotchet'][2007][]=array('pool/files/gotchet/g2007.zip','������� ����� ��� &laquo;����-�������������&raquo;','f');
	$list['gotchet'][2007][]=array('finans07.php','����� ���������� ����������','p');

	$list['gotchet'][2006][]=array('pool/files/gotchet/g2006.zip','������� ����� ��� &laquo;����-�������������&raquo;','f');
	$list['gotchet'][2006][]=array('finans06.php','����� ���������� ����������','p');

	$list['gotchet'][2005][]=array('pool/files/gotchet/g2005.zip','������� ����� ��� &laquo;����-�������������&raquo;','f');
	$list['gotchet'][2005][]=array('finans05.php','����� ���������� ����������','p');

	$list['gotchet'][2004][]=array('pool/files/gotchet/g2004.zip','������� ����� ��� &laquo;����-�������������&raquo;','f');
	$list['gotchet'][2004][]=array('finans04.php','����� ���������� ����������','p');

	$list['gotchet'][2003][]=array('finans03.php','����� ���������� ����������','p');

	$list['gotchet'][2002][]=array('finans02.php','����� ���������� ����������','p');

	$list['gotchet'][2001][]=array('finans01.php','����� ���������� ����������','p');

//	$list['gotchet'][2009][]=array('kvotchet2009.zip','����������� ���������� �� 2009 ���');


	
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
			print '<div><strong>�� '.$list['gotchet']['years'][$i].' ���</strong></div><br />';
			print listprn($list['gotchet'][$list['gotchet']['years'][$i]]);
			print '<br />';
		}
	}
?>

<!-- END -->
</div>