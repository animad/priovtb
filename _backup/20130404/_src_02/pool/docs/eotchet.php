<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	function listprn(&$var){
		for($i=0; $i<count($var); $i++){
			$fln='pool/files/eotchet/'.$var[$i][0];
			$fl_size=round(@filesize($fln)/1024*10)/10;
			$data[]='<li'.colrow($i).'><a href="'.$fln.'" target="_blank" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).' (<i>'.$fl_size.' ��</i>)</a></li>';
		}
		return '<ul class="smenu3">'.implode('',$data).'</ul>';
	}
	
	$list['eotchet'][]=array('0212q091.zip','�������������� ����� �� ������ ������� �� 1 ������� 2009 ����');
	$list['eotchet'][]=array('0212q084.zip','�������������� ����� �� ������ ������� �� 4 ������� 2008 ����');
	$list['eotchet'][]=array('0212q083.zip','�������������� ����� �� ������ ������� �� 3 ������� 2008 ����');
	$list['eotchet'][]=array('0212q082.zip','�������������� ����� �� ������ ������� �� 2 ������� 2008 ����');
	$list['eotchet'][]=array('0212q081.rar','�������������� ����� �� ������ ������� �� 1 ������� 2008 ����');
	$list['eotchet'][]=array('0212q074.rar','�������������� ����� �� ������ ������� �� 4 ������� 2007 ����');
	$list['eotchet'][]=array('0212q073.rar','�������������� ����� �� ������ ������� �� 3 ������� 2007 ����');
	$list['eotchet'][]=array('0212q072.rar','�������������� ����� �� ������ ������� �� 2 ������� 2007 ����');
	$list['eotchet'][]=array('qv1-2007_.zip','�������������� ����� �� ������ ������� �� 1 ������� 2007 ����');
	$list['eotchet'][]=array('qv4-2006.rar','�������������� ����� �� ������ ������� �� 4 ������� 2006 ����');
	$list['eotchet'][]=array('qv3-2006.rar','�������������� ����� �� ������ ������� �� 3 ������� 2006 ����');
	$list['eotchet'][]=array('qv2-2006.rar','�������������� ����� �� ������ ������� �� 2 ������� 2006 ����');
	$list['eotchet'][]=array('0212q061.rar','�������������� ����� �� ������ ������� �� 1 ������� 2006 ����');
	$list['eotchet'][]=array('qv4-2005.zip','�������������� ����� �� ������ ������� �� 4 ������� 2005 ����');
	$list['eotchet'][]=array('qv3-2005.zip','�������������� ����� �� ������ ������� �� 3 ������� 2005 ����');
	$list['eotchet'][]=array('qv2-2005.zip','�������������� ����� �� ������ ������� �� 2 ������� 2005 ����');
	$list['eotchet'][]=array('qv1-2005.zip','�������������� ����� �� ������ ������� �� 1 ������� 2005 ����');
	$list['eotchet'][]=array('qv4-2004.zip','�������������� ����� �� ������ ������� �� 4 ������� 2004 ����');
	$list['eotchet'][]=array('qv3-2004.zip','�������������� ����� �� ������ ������� �� 3 ������� 2004 ����');
	$list['eotchet'][]=array('qv2-2004.zip','�������������� ����� �� ������ ������� �� 2 ������� 2004 ����');
	$list['eotchet'][]=array('qv1-2004.zip','�������������� ����� �� ������ ������� �� 1 ������� 2004 ����');
	$list['eotchet'][]=array('qv4-2003.zip','�������������� ����� �� ������ ������� �� 4 ������� 2003 ����');
	$list['eotchet'][]=array('qv3-2003.zip','�������������� ����� �� ������ ������� �� 3 ������� 2003 ����');
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

<?php print listprn($list['eotchet']);?>

<!-- END -->
</div>