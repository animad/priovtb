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
	$a['towns']=array('ryazan'=>'������','moscow'=>'������','kasimov'=>'�������','novomich'=>'�������������','scopin'=>'������','rybnoe'=>'������','shack'=>'����','sasovo'=>'������');
	while(list($key,$val)=each($a['towns'])){
		print '<a href="'.$_SERVER['PHP_SELF'].'?dr=coord.php&m='.$key.'" class="cell'.(isset($_GET['m']) && $_GET['m']==$key?'2':'').'">'.$val.'</a> ';
	}
?>
</div></div>
<div style="line-height: 10px; font-size: 10px;">&nbsp;</div>
<div class="block">
	<div class="text2">
<?php
	$a['towns']=array('bankomats'=>'���������','terminals'=>'��������� ����������������');
	while(list($key,$val)=each($a['towns'])){
		print '<a href="'.$_SERVER['PHP_SELF'].'?dr=coord.php&m='.$key.'" class="cell'.(isset($_GET['m']) && $_GET['m']==$key?'2':'').'">'.$val.'</a> ';
	}
?>
	</div>
</div>
<br />

<?php
//--- ������� ��� ����������
	if($_GET['m']=='terminals'){
		//--- �����
		if (file_exists('pool/src/coord_data/terminals.inc')){
			$v1=@file('pool/src/coord_data/terminals.inc');
			print implode("\r\n",$v1);
			print '<br />';
		}
		print '<p>��������� �������� ��������� ��� ������ � �������������� ����������� ��������� ��������:</p>';
		print '<p>������� �������������� ���������:</p>';
		print '<ul class="list2">';
			print '<li>��������� �� ������, ����������� � ������ �����. �������� �������� 50 ������;</li>';
			print '<li>�������� ������ � �����. �������� �������� 30 ������;</li>';
			print '<li>�������� ���������� � ����������� ������������� ��������;</li>';
		print '</ul>';
		print '<p>������� ����� ����������� ��� ���������, ��� � � ����������� ����� ����:</p>';
		print '<ul class="list2">';
			print '<li><a href="/?dr=karta.php" class="hrf7" title="����������� �����">��������� �������� �� ����������� ������ (�������� � ���������� �������, �������������� ����� �� ���� ����� � �����)</a>;</li>';
			print '<li>�������� ��������� �������� ����, ������� ����� ������� ��� � ������� � ������� �� ������ �������� ���������� � ������ �������� ������ ������. �������� �������� 30 ������;</li>';
			print '<li>�������� ������������ �������. ������� ����������� ��� ��������;</li>';
	//		print '<li>�������� ������ ����� (��� �������� ���������, ��� � �� ������������ �����), �������� � ����������� �����������. ������� �� ������ ������������� � ����������� ����������� ��� ��������. �������� ������� �� ������ ���, ������, �������, ��������, ���+ � ��������� ���������� 5 ������ ��� ����������� �� ����� ������.</li>';
			print '<li>�������� ������ �����:</li>';
				print '<ul class="list2">';
					print '<li>�������� ������ ������� ����� (���, ������, �������, ����2);</li>';
					print '<li>�������� ������ ���������� ����� (�����������, ����������, ������);</li>';
					print '<li>�������� �� �������� (��������, ������, ��������, ���������, ������, �����, �������-������, �������-�������);</li>';
					print '<li>�������� �� ����������� � ��������� ����������� (���+, ������-��, �������-������)</li>';
				print '</ul>';
			print '<br/>�������� ������� �� ������ ���, �������, ��������, ���������, ���+, �������-������� � ���������� ���������� 5 ������ ��� ����������� �� ����� ������.';
			print '<br/>������� �� ������ ������ ���������� ����������� ��� ��������.';
		print '</ul>';
	}
	
	if($_GET['m']=='bankomats'){
		//--- �����
		if (file_exists('pool/src/coord_data/bankomats.inc')){
			$v1=@file('pool/src/coord_data/bankomats.inc');
			print implode("\r\n",$v1);
			print '<br />';
		}
	}




	$fln='pool/docs/coord/'.trim($_GET['m']).'.html';
	if(file_exists($fln) && filesize($fln)){
		include($fln);
	}else{ print '<br /><div align="center">- ������ �� ������� -</div>'; }


//--- ������� ��� �.������
	if(false && $_GET['m']=='ryazan'){
		print '<br />';
		print '<hr>';
		print '<ul class="smenu3">'.
		          '<li><a href="?dr=coord.php&m=terminals">�������� ������ ������������ �������� ����� ��������� ��������� �����. ��� ���������� ����� ���� ���� ������� ���� � ���.</a></li>'.
		      '</ul>';
	}


?>




<!-- END -->
</div>
