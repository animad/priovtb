<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
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

<p align="center">��������������� � ����������� ����� ���������� ��������� (����� ������) 6 ������� 1989 ����, ��������������� N 212.</p>
<p align="center"><b>����-������������ (���)</b></p>
<br />
<table border="0" cellspacing="1" cellpadding="5" class="table5" align="center">
	<tr<?=colrow($j1++);?>>
		<td>�����</td>
		<td>390023 �.������, ��. �������, 82/26.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>�������� �����</td>
		<td>390023 �.������, ��. �������, 82/26</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���</td>
		<td>6227001779</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���</td>
		<td>046126708</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>�/�</td>
		<td>30101810500000000708</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���.</td>
		<td>(4912) 24-49-00, 24-49-01</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>����</td>
		<td>(4912) 24-49-17</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������</td>
		<td>136122 PRIO RU</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>REUTER</td>
		<td>PRIO</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>SWIFT</td>
		<td>PRIO RU 2J</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>E-mail</td>
		<td><a href="mailto:post@priovtb.ru">post@priovtb.ru</a></td>
	</tr>
</table>

<br />

<table border="0" cellspacing="1" cellpadding="5" class="table5" align="center">
	<tr<?=colrow($j1++);?>>
		<td>������ ���������� ������</td>
		<td>���. (4912) 24-49-24,<br />����:24-49-17</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>��������</td>
		<td>���. (4912) 24-49-00, 24-49-01</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���������� �� ������ � �������������� ���������</td>
		<td>���. (4912) 24-49-18</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������������ ���������� ������������ �����</td>
		<td>���. (4912) 24-49-04, 44-15-06, 44-16-49</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���������� ������������</td>
		<td>���. (4912) 24-49-47, 24-49-03,  44-54-25</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���������� ������������� ��������</td>
		<td>���. (4912) 24-49-22, 24-49-02, 24-49-21</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���������� ������ ����� � ��������� ��������</td>
		<td>���. (4912) 24-49-26, 24-49-28</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������ ����������</td>
		<td>���. (4912) 44-47-20</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���������� ������</td>
		<td>���. (4912) 27-54-37, 45-39-34</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������������ ����� ������ �����</td>
		<td>���. (4912) 27-17-77</td>
	</tr>
</table>

<!-- END -->
</div>