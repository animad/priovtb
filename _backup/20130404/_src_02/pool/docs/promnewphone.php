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

<p align="center">����-������������ �������� �� ��������� ���������� ������� ������������� ��������� ����-������������� (��. ����������, �.5)</p>
<br />

<table border="0" cellspacing="1" cellpadding="5" class="table5" align="center">
	<tr<?=colrow($j1++);?>>
		<td>������������ ���</td>
		<td>92-24-76</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������������ ���</td>
		<td>92-32-03</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>�������� ���</td>
		<td>96-17-63</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>�������� ��������</td>
		<td>92-31-56</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>��������� ���������</td>
		<td>96-13-05</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������� ���������</td>
		<td>92-13-56</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>��������� �����</td>
		<td>92-27-27</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>����</td>
		<td>76-22-17</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>�������� ��� �������</td>
		<td>76-22-17</td>
	</tr>
</table>
<p>�� ����� ������ �������� ����������� ����������, �������� � ������ ���������� ������ ����-������������� �� ��������: <b>24-49-24</b></p>


<!-- END -->
</div>