<?php
	include('files/functions/faq.php');
	
	$_GET['id']=7;
	//--- ����� ���� �/�
	
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	
?>
<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("biz",0,"<?=$_GET['dr'];?>");</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title -->
<script type="text/javascript">pr_title();</script>
<!-- END page title -->

<!-- BEGIN -->

<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<tr class="header">
		<td colspan="3">1. �������� � ������� �����</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.1.</td>
		<td>�������� ���������� �����</td>
		<td>500</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.2.</td>
		<td>�������� ����������� ��������� ������</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.3.</td>
		<td>�������� ���������� �����</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.4.</td>
		<td>���������� �������� � ��������� �������� � ������� ������ ��� �������� �����</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.4.1.</td>
		<td>�������������� � ���������� ��������� �������� � ��������� �������� � ������� ������ (���./����.)</td>
		<td>200 (*)</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.5.</td>
		<td>������� ���������� ����� ��� ������� �������� �� �����</td>
		<td>400</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.6.</td>
		<td>��������� ������� "������-����" </td>
		<td>500</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.7.</td>
		<td>������������� ������������ ����������� ������������������� �������� ����� ������� "������-����", ����������� �� ������� �������</td>
		<td>500</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.8.</td>
		<td>������������ ������� "������-����"</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.9.</td>
		<td>�������������� ������� � ������� �����, � ��������� �����, �� �������� �� ����� (���./�������)</td>
		<td>100</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.10.</td>
		<td>�������������� ������� �� ��������� �� ����� � �������, ������������� � �������� (���./�������)</td>
		<td>400</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.11.</td>
		<td>����������� �������� ������������ ������� ��������� � ������������ ���� �� ��������� ������� (**) (���./������)</td>
		<td>150</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.12.</td>
		<td>��������� ���������� ����� ������������ ��������� ��������� �� ��������� ������� (**) (���./������)</td>
		<td>100</td>
	</tr>

	<tr class="header">
		<td colspan="3">2. ����������� �������� �� �����</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>2.1.</td>
		<td>������������ ��������� � ������������ � ��� �������� � ������ � ������������ �����</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.2.</td>
		<td>������������ ������� �� ��������� ������� �� ���� ������ ����� (���./���.)</td>
		<td>7</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>��� ������������� ������� "������-����" ��� ��� "BI-PRINT"</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.3.</td>
		<td>������������ ������� �� ��������� ������� �� ���� � ������ ��������� ����������� (���./���.)</td>
		<td>15</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>��� ������������� ������� "������-����" ��� ��� "BI-PRINT"</td>
		<td>8</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.4.</td>
		<td>����� � ������� ��������� ���������� � ���� ��������� �������� (���./���.)</td>
		<td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td><b>C������������ ������� �� �����</b></td>
		<td></td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>�� 100 ���.���. </td>
		<td>70</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>101-200 ���.���. </td>
		<td>50</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>201-300 ���.���. </td>
		<td>30</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>����� 300 ���.���. </td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.4a.</td>
		<td>� ������ ������������ �� ���� ������ ����� ��� �� ���� �������� ����������� �������</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.5.</td>
		<td>���������� ��������� ���������� ����������� ����� �� ������� ������� (���./���.)</td>
		<td>60 (*)</td>
	</tr>

	<tr class="header">
		<td colspan="3">3. �������� ������������</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>3.1.</td>
		<td>�����, �������� � ���������� �� ���� �������� �������� �������, �������� ����� ��������� �����</td>
		<td>0,3 % �� �����</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>3.2.</td>
		<td>�������� � ���������� �� ���� �������� �������� �������, �������� �� ������� � ��������������� �������������� ������</td>
		<td>0,1 % �� �����</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>3.3.</td>
		<td>������ �������� �������� ������� �� ������� ���������� �����, ������� ����������� ��������� � ������������ � ��� ������� (������� 40,41,42, 50)</td>
		<td>0,5 % �� �����</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>3.4.</td>
		<td>������ �������� �������� ������� �� ���� ���� (����� �������� ��������� � �.3.3.):</td>
		<td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>- � �������� �������������� ������ (***)</td>
		<td>0,5 % �� �����</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>- ����� �������������� ������ (***)</td>
		<td>10 % �� �����</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>3.5.</td>
		<td>���������� � ������ �������� ������� ������</td>
		<td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>25 ������</td>
		<td>80 ���. (*)</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>&nbsp;</td>
		<td>50 ������</td>
		<td>120 ���. (*)</td>
	</tr>
	<tr class="header">
		<td colspan="3">4. �������� �������� �� ��������� ���������� � ������������� � ������ ��</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td colspan="3">�������� ������ �� ������������� ��������� �������� ������������ � ��������� ���������� � ��������� ������� �����</td>
	</tr>

	<tr class="header">
		<td colspan="3">����������</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td colspan="3">(*) - � �.�. ��� 18 %</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">(**) - ��������� � ������� ������ � ��� ������, ���� ������ ��������� �� �� ���� �����</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">(***) - �������� ��������������� ������ ��������������� ������ ��� �������� ����� � ������ ��������� � ������� ������������ ������� � ��� ����������� ������������� � ���������� �������. ��� ��������� ������������ ������� ����� ����� ���� �����������.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">� ����� ����������� ��� ��������� �������� ������������ �������, ��������������� ����� ����� ����� ������� �������  � �������� ��������� ������� �� ����� ��� �� 20 % �� ��������� ����������� ��������� ������� ��� � ���� ���������������� ���������� ������� ������ �� ��������-�������� ������������.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">����� ����������� ����������, ����� �� �������� ������������ �� ������������ � �������� ��������� �� ������ ������ ��� � ������ ���������� ��������.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">������������ ����������� ������������� �� �������� 50%</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">�������������� ����������� �����������, ������������ �����������, ������������ ���������, ���������, ����� �� ������������ � ���������� ��������� ��������� � ���������� ����� ��������� ������������� ��� �������� ����� �� ��������-�������� ������������.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">���������������, ������������� ���������� �������� (������, ���������� �����������, ����������) ������������� ��� �������� ����� �� ��������-�������� ������������.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">��� ��������, ������������ ���������� ����� ����-�������������, �� �� ������� ����� ���� ���������� ������ �����.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">�������� ������� ����� ����-������������� ��� ����������� ��� � ���������������� � ������ �� ������ � �������� ������ ������������ ��������� �������� ��������� ����-������������� � ������ ����������� ����� ���������� ����� � ������������� �������� �����.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3">����� �� ������ �����, �� ���������� � ������ ��������, ��������� �� ��������� ���������� ��������.</td>
	</tr>
</table>

<!-- END -->
</div>