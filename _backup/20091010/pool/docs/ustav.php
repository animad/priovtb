<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	function listprn(&$var,$path=null){
		for($i=0; $i<count($var); $i++){
			$fln='pool/files/'.$path.'/'.$var[$i][0];
			$fl_size=round(filesize($fln)/1024*10)/10;
			$data[]='<li'.colrow($i).'><a href="'.$fln.'" target="_blank" title="'.stripslashes(trim($var[$i][1])).'">'.stripslashes(trim($var[$i][1])).' (<i>'.$fl_size.' ��</i>)</a></li>';
		}
		return '<ul class="smenu3">'.implode('',$data).'</ul>';
	}
	
	$list['ustav'][]=array('ustav2006.zip','����� 2006 � (����������� ��������)');
	$list['ustav'][]=array('ustav1.zip','��������� �1 � ������ 2006 � (����������� ��������)');

	$list['polog'][]=array('sovet.zip','��������� � C����� ���������� 2004 � (����������� ��������)');
	$list['polog'][]=array('pologenie_sovet2007.zip','��������� � ������ ���������� - 2007 � (������ ��������)');
	$list['polog'][]=array('prav2008.zip','��������� � ��������� � ������������ ��������� 2008 � (����������� ��������)');
	$list['polog'][]=array('prav2005.zip','��������� � ��������� � ������������ ��������� 2005 � (������ ��������)');
	$list['polog'][]=array('revs2008.zip','��������� � ����������� �������� 2008 � (����������� ��������)');
	$list['polog'][]=array('reviz2002.zip','��������� � ����������� �������� 2002 � (������ ��������)');
	$list['polog'][]=array('svk2006.zip','��������� � ������ ����������� �������� 2006 � (����������� ��������)');
	$list['polog'][]=array('svk.zip','��������� � ������ ����������� �������� 2004 � (������ ��������)');
	$list['polog'][]=array('skomissia.zip','��������� � ������� �������� - 2002 � (����������� ��������)');
	$list['polog'][]=array('sobr2003.zip','��������� � �������� 2003� (����������� ��������)');
	
	$list['other'][]=array('strategy2007.zip','������� ��������� �����.');
	$list['other'][]=array('politika.zip','�������� �����  � ������� ��������������� ����������� (���������) �������, ���������� ���������� �����, � �������������� ����������.');
	$list['other'][]=array('taina.zip','��������� � ���������� �����  �� 15 ������ 1994�');
	$list['other'][]=array('upol2009.zip','������� �������� �� 2009 �');
	$list['other'][]=array('upol2008.zip','������� �������� �� 2008 �');
	$list['other'][]=array('upol2007.zip','������� �������� �� 2007 �');
	$list['other'][]=array('d1upol2007.zip','���������� �1 � ������� �������� �� 2007 �');
	$list['other'][]=array('candidate2008.zip','���������� � ������ ���������� �� ���������� ���������� � ����� ������ ���������� ����-������������� (���) � ������������ � �������� ������ ���������� �� 26.12.2007 ���� �������� � 10');
	$list['other'][]=array('kodeks.zip','������ ����� �������');
	$list['other'][]=array('kodex_et.zip','������ ������������� �����');

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

<h2>����� ����-������������� (���)</h2>
<?php print listprn($list['ustav'],'ustav');?>
<br />
<h2>���������, ������������ ������������ ������� ����-������������� (���)</h2>
<?php print listprn($list['polog'],'polog');?>
<br />
<h2>������ ���������</h2>
<?php print listprn($list['other'],'other');?>


<!-- END -->
</div>