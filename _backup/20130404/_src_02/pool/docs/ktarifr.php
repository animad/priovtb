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

<p align="center"><b>������<br />�� ��������� ���������� ���<br />� ��������� ��������� ���������� � ������ ��.</b></p>
<p align="center">��������� ������ �������� � 02 ����� 2009 ����.</p>
<br />
<table border="0" cellspacing="1" cellpadding="5" align="center" class="table5">
	<tr class="header">
		<td colspan="3">�������� ��������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.</td>
		<td><b>����� ��������</b></td>
		<td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.1.</td>
	    <td>����� �������� �������� ������� ����������</td>
	    <td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
	    <td>����� �������� �������� ������� ��������</td>
	    <td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.2</td>
	    <td>�������� � �������� ����������� ����� ����� ����������� �� 50 ��.</td>
	    <td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.3.</td>
		<td>�������� � �������� ����������� ����� ��� ���� ���-�� ����� ����� 50 ��. (��� ����� ����� ����� ����� 100 ��. �������� �������������� ������ � �������� �����. ������ ����������� ������ � ��������������� �� �������� ����.)</td>
		<td>10% �� ����� ����� �����, ������� 20 ������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.</td>
		<td><b>������ �������� �������</b></td>
		<td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.1.</td>
		<td>��������� ���������, � ������������ �� ����� ����� 3-� ����</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.2.</td>
		<td>��������� ���������, � ������������ �� ����� ����� 3-� ���� ��� ����� �������� 50 000 ������ � �����</td>
		<td>0.1%</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.3.</td>
		<td>����������� � ����������� ������� �� ������ ����������/����������� ���, ������� ����� ��, ��� ����������� �� ����� ����������� � ����������� � ����� ����� 30 ���� <i>(������ ����� ���������������� � �� ��������, ����������� �� ������, �������� � ����-�������������)</i></td>
		<td>0.4%</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.4.</td>
		<td>����������� � ����������� ������� �� ������ ����������/����������� ���, ������� ����� ��, ��� ����������� �� ����� ����������� � ����������� � ����� ����� 30 ���� <i>(������ ����� ���������������� � �� ��������, ����������� �� ������, �������� � ����-�������������)</i></td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.5.</td>
		<td>����������� � ����������� ������� � ���������� ������ ������ ����� � ����������� �� ����� ����� 30 ����</td>
		<td>3%</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.6.</td>
		<td>����������� � ����������� ������� � ���������� ������ ������ ����� � ����������� �� ����� ����� 30 ����</td>
		<td>0.5%</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.7.</td>
		<td>����������� � ��������� �������� � �� ��������� ����� ��� ����������� �� ������� ���������� �� �����, �� ����������� ��������, ��������������� ���������� �������������</td>
		<td>5%</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.8.</td>
		<td>����������� �� ���� ���������� ����������� ����������� �� ����������� ������</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.9.</td>
		<td>����������� � ����������� ������� �� ������� ������ �� ��������, ��������������� ����-�������������� � ����� ����� 1 ���. ������</td>
		<td>0.1% �� ����� �������, �� �� ����� 5000 ������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.10.</td>
		<td>����� ������� ������ �� ��� �������� �� �����������</td>
		<td>1 ����� �� 1 �������� ������������ 500 ������ � �����; 0.5 ����� �� 1 �������� ������������ ����� 500 ������.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>����� ����� �� �� �������� ��</td>
		<td>5 % �� �����, ������� 20 ������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.11.</td>
		<td>�������� � �������� ����������� ����� ����� ����������� �� 50 ��.</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.12.</td>
		<td>�������� � �������� ����������� ����� ��� ���� ���-�� ����� ����� 50 ��. (��� ����� ����� ����� ����� 100 ��. �������� �������������� ������ � �������� �����. ������ ����������� ������ � ��������������� �� �������� ����.)</td>
		<td>10% �� ����� ����� �����, ������� 20 ������</td>
	</tr>
</table>

<br />
<p align="center"><b>������ �� ����������� ��������� ���������� ��� � ������ ��.</b></p>
<p align="center">��������� ������ �������� � 11 ������� 2008 ����.</p>
<br />

<table border="0" cellspacing="1" cellpadding="5" align="center" class="table5">
	<tr class="header">
		<td colspan="3">����������� ��������</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>3.</td>
		<td>�������� �����</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>4.</td>
	    <td>���������� ������� �� ���� �������</td>
	    <td>���������</td>
	</tr>
	<tr class="header">
		<td colspan="3">�������� � �������</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>5.</td>
	    <td>������������ �� ��������� ������� ( �� ����� ��� ��� �������� �����)</td>
	    <td>&nbsp; </td>
	</tr>
	<tr<?=colrow($j1++);?>><td>5.1.</td>
	    <td>�� ���� ���� ������ �����</td>
	    <td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>5.2.</td>
	    <td>�� ���� ����������� ���� ������ �����</td>
	    <td>70 ������</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>5.3.</td>
	    <td>�� ���� ������������ ���� ������ �����</td>
	    <td>0.3% �� ����� �������, �� �� ����� 70 ������ � �� ����� 1500 ���.</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>5.4.</td>
	    <td>�� ���������������� ����</td>
	    <td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>5.5.</td>
	    <td>� ������ ���� �� ���� �����������/������������ ���� (����� ����������� �������)</td>
	    <td>0.3% �� ����� �������, �� �� ����� 70 ������ � �� ����� 1500 ���.
	</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>5.6.</td>
	    <td>� ������ ���� �� ���� �����������/������������ ���� �� ����������� ������� ����-�������������</td>
	    <td>0.3% �� ����� �������, �� �� ����� 260 ������ � �� ����� 3000 ���.</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>6.</td>
		<td>����������� (���� ��������������� ���������)</td>
	    <td>��������� ����� ������������ ������ �����������</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>7.</td>
	    <td>�������� �����</td>
	    <td>���������</td>
	</tr>
	   <tr<?=colrow($j1++);?>><td>8.</td>
	    <td>������ ������� �� ����� ��� ��������</td>
	    <td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>9.</td>
	    <td>������ �������</td>
	    <td>&nbsp; </td>
	</tr>
	<tr<?=colrow($j1++);?>><td>9.1</td>
	    <td>������ ������� �� ����� ����������� �������� (� ��������� ����� �� �����. ����, �������� ���������� ���������  � �.�.) - �� ��������� �������� ����</td>
	    <td>100 ������ �� ���� �������</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>9.2</td>
	    <td>������ ������� �� ����� ����������� �������� (� ��������� ����� �� �����. ����, �������� ���������� ���������  � �.�.) - �� ��������� ������� ���</td>
	    <td>150 ������ �� ���� �������</td>
	</tr>
</table>

<br />
<ol class="list2">
	<li>������������� ������ ����������� ������ � ���������, �������������� � ������� �������. ���� ����� ��������� ����������� ��� �������������� ����� �� ������������� ��������� ��� ������������ � ��������.</li>
	<li>���� ����� ������������� ������ ������� �������� � ������ ��������� �������������� ����� ������ � ��������.</li>
</ol>


<!-- END -->
</div>