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
	if(current_page!=null && typeof(current_page.title_p)!="undefined"){ tp=current_page.title_p+"<br />"; }else{ tp=""; }
	if(current_page!=null && typeof(current_page.title)!="undefined"){
		document.writeln("<h1>"+tp+current_page.title+"</h1>");
		document.title=document.title+" | "+(current_page!=null && typeof(current_page.title_p)!="undefined"?current_page.title_p+", ":"")+current_page.title;
	}
</script>
<!-- END page title -->




<!-- BEGIN -->

<p>������ ��������������� �� ������������ ��������, ���� � (���) ���������� ������� ��� ������������ ������������� �����, � ����� �� �������������, ������ � �������������.</p>

	<b>����� �������</b> � �� 10 ���.
	</br>
	<b>����� �������</b>  - �� ����� 100 ��� ���, �� �� ����� 80% �� ��������� ��������� �����.
	</br>
	</br>
<p><strong>���������� ������:</strong></p>
<table class="table5" border="0" cellspacing="1" cellpadding="5"  width = "700">
	<tr class="header">
		<td>��� ������������� ������</td>
		<td>3 ����</td>
		<td>5 ���</td>
		<td>7 ���</td>
		<td>10 ���</td>
	</tr>
	<tr class="odd">
		<td>������� 2-����</td>
		<td style="text-align: center;">15 %</td>
		<td style="text-align: center;">15,5 %</td>
		<td style="text-align: center;">16 %</td>
		<td style="text-align: center;">16,5 %</td>
	</tr>
	<tr class="even">
		<td>������� �� ����� �����</td>
		<td style="text-align: center;">16 %</td>
		<td style="text-align: center;">16,5 %</td>
		<td style="text-align: center;">17 %</td>
		<td style="text-align: center;">17,5 %</td>
	</tr>
</table>

<p><strong>����������� �� �������:</strong></p>
<ul>
	<li>����� ������������� ������������, ���� ������� ������������ �����;</li>
	<li>�������������� ������� (�) � ��� �������;</li>
</ul>

<p><strong>�������� ���������� � ��������:</strong></p>
<ul>
	<li>������� �� 21 ����, �� � �� ������ 55/60  (�������/�������) ��� �� ������ ������� �������;</li>
	<li>���� ������ �� ��������� ����� �� ����� 6 �������;</li>
</ul>

<p><strong>����������� �� �������:</strong></p>
<ul>
	<li>��������� ������ ����� ��������� ����� ��������� (�� ����������� ������, �����������, ���������, ����� � ���������), ��������� �������, ������������� �� ���������� �. ������ ��� ��������� �������;</li>
	<li>���������� ����������� �� ������� ������� ���;</li>
	<li>�������������� ������������ �� ������ ���� ������������������ ����;</li>
	<li>���������� �������������������� ��������������, ��� ��������� �������� � ���������� �������������������� ��������.</li>
</ul>





<!-- END -->
</div>