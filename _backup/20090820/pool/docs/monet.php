<?php
	
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}

	
?>
<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("fiz",0,"<?=$_GET['dr'];?>");</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title -->
<script type="text/javascript">
	pr_title();
</script>
<!-- END page title -->

<!-- BEGIN -->

<p>������� � ��� ����� ���������� ��������� �������� � �������������� ������ �� ����������� �������:</p>

<?php
	$q='select * from `monets` where `on`="1" order by `id` asc';
	$res=mysql_query($q);
	print mysql_error();
	while($row=mysql_fetch_assoc($res)){
		$data2[]='<tr'.colrow($j1++).'>'.
		             '<td>'.output($row['name']).'</td>'.
		             '<td align="center">'.output($row['quantity']).'</td>'.
		             '<td align="center">'.output($row['metal']).'</td>'.
		             '<td align="center">'.output($row['weight']).'</td>'.
		             '<td style="padding: 0;"><a href="'.output($row['url']).'" class="hrf8" target=blank>'.output($row['comments']).'</a></td>'.
				 '</tr>';
	}
	if(isset($data2)){
		print '<table border="0" cellspacing="1" cellpadding="5" class="table5" align="center">'.
		          '<tr class="header">'.
				     '<td>�����, ������������</td>'.
				     '<td>��������</td>'.
				     '<td>������, �����</td>'.
				     '<td>����������<br />��������� ������� �������<br />�� �����, �</td>'.
				     '<td>���� �������</td>'.
				  '</tr>'.
		          implode('',$data2).
			  '</table>';
	}

?>

<p>������� � 70-� ����� � ����� ������ �������������� ������� ����� �� ����������� �������� �������������� � ��������������� ����������. � ��������� ������ ��� ��� ��������������� ��� ���������� �� ������������� �����, � �� ���������� ���� ����������� ������ ����������� �� �������� �������������� ������. ���� � 90-� �����, �� ���� ������ ���� ��������������� � ���������������� �������� � �����������, ��� ������ �������� ��������������� � ������, �� ���������� ����� - ������ � ����������� ������������� ����� �����.</p>
<p>� ����� 90-� ����� ���� ������ �������� ��������� � ��������� �� ������� �������� ���������� � ��������� ����� ������� ����� (�� 1995 ���� ����������� ����� ������ �� ������� � ��������), ������ ����� 50% �� ������ ���������������� �� ������������� �����. ������� �� ��� ����� ��������� �������� � �������������� ������ �� ������, �������, ������� � �������� � ������ �������, ������� � 1975 ����.</p>
<img src="files/images/monet0.gif" align="right" hspace="20" vspace="10" border="0">
<img src="files/images/monet1.gif" align="right" hspace="20" vspace="10" width="110" height="110" border="0">

<p>�� ������������ ���������������� �������� ������� ������ ������� �� ��� �������� ������:</p>
<br />
<ul class="list2">
	<li>����������� � �������� "����" (�� ����. <b>"proof"</b>);</li>
	<li>����������� � ������� (����. <b>"uncirculated"</b>) ��� ���������� (����. <b>"brilliant uncirculated"</b>) ��������.</li>
</ul>
<p>������ �������� "����" ��������������� �������, ����������� �������� �� ����������� ������ ������, ���������� ���� � ������� ��������� ����������� � �������. ��� ������, ��� �������, �������������� ����������, �� ������ ���� �������������� � ������� � �������� �����, �������������� �������� ������� � �������������, ���� ����������� ���������� ��������� ��������, ������ ���������� �����, ������ ����������� �����. ������� �� �������� �������� ������� �� ����������, �������������; ������� ��������� �� ��������, ������� �������� ������ �����.</p>
<p>������ �������� �������� - ��� ��������� ������������� ������������������������� ��������� ������������: �������� � ��������� ������ (������������ �� ��������� � �������� �������� ��������� �������), � ����� ������ �� ����������� �������� ��������������� ����������, ������ ������� ����� ��������� ���������� ��������� ����. �� ������� ����� ���� ��� ���������� ������������, ����, ������� � ������� ����� ���������� ������������� �������, ������� �� ������������� � ������. ������� �� �������� ����� ����� �������� ���������, ������������.</p>
<p>������ ����������� �������� ���������� �� ����� �������� �������� ������� ������� ���, ��� ��� �� ����� ������ �������, ������� � ������ �����������, ������������� ������������� ������������������� ������������, ��� ����������� ����� ���������� ����������� ������������ � ���������, � ����� ������ �� ������ ����� �� ������������ ����������� ��� ������� ������� ��������� � ���������� ������� � ������ ��������������� �������� �������������� ������.</p>
<p>���� ������ ��������� ������ �������� �������� �� ����������� ��������. � ����� ������� ��������� "��������" ������� 1975-1982 �����, ������� ������ �� ����� "����� �������". �������� � ���������������� �������� �� ����������� �������� �� ���������� ������� �� ����������� ���������, � ������� �� ���������� ������, ������������� ����� �� ����������� �������� � ��������� �������. ��-�� ������������ ��������������� ��� ������ �������� ������� � �������� �������� ��������� �������� � ������.</p>
<p>�� ������ ���������� ������ � ������� ��� ��� ����� � ��������� �������������� ������ �����:</p>
<br />

<?php coord_list2(array('opk02'));?>

<!-- END -->
</div>