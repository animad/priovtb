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

<p style="text-align: center;">�����*<br />�� ����������� �������� ��������� � ���������� ������</p>
<br />
<table border="0" cellspacing="1" cellpadding="5" class="table5" style="width: 100%;">
	<tr class="header">
		<td colspan="2">� ������</td>
	</tr>
	<tr class="header">
		<td>����� ��������</td>
		<td>�����</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>100,00 - 6 000,00</td>
		<td>150,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>6 000,01 - 10 000,00</td>
		<td>200,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>10 000,01 - 15 000,00</td>
		<td>300,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>15 000,01 - 20 000,00</td>
		<td>400,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>20 000,01 - 25 000,00</td>
		<td>500,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>25 000,01 - 30 000,00</td>
		<td>600,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>30 000,01 - 40 000,00</td>
		<td>750,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>40 000,01 - 50 000,00</td>
		<td>900,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>50 000,01 - 60 000,00</td>
		<td>1 100,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>60 000,01 - 75 000,00</td>
		<td>1 350,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>75 000,01 � �����</td>
		<td>1 500,00</td>
	</tr>
</table>
<br />
<table border="0" cellspacing="1" cellpadding="5" class="table5" style="width: 100%;">
	<tr class="header">
		<td colspan="2">� ������ �������� ��������� **</td>
	</tr>
	<tr class="header">
		<td>����� ��������</td>
		<td>�����</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>100,01 - 3 000,00</td>
		<td>100,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>3 000,01 - 6 000,00</td>
		<td>200,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>6 000,01 - 8 000,00</td>
		<td>300,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>8 000,01 - 10 000,00</td>
		<td>350,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>10 000,01 - 12 000,00</td>
		<td>450,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>12 000,01 - 18 000,00</td>
		<td>550,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>18 000,01 - 20 000,00</td>
		<td>650,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>20 000,01 - 24 000,00</td>
		<td>750,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>24 000,01 - 30 000,00</td>
		<td>850,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>30 000,01 - 36 000,00</td>
		<td>950,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>36 000,01 - 42 000,00</td>
		<td>1 050,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>42 000,01 - 48 000,00</td>
		<td>1 150,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>48 000,01 - 54 000,00</td>
		<td>1 250,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>54 000,01 - 60 000,00</td>
		<td>1 350,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>60 000,01 � �����</td>
		<td>1 500,00</td>
	</tr>
</table>
<br />
<table border="0" cellspacing="1" cellpadding="5" class="table5" style="width: 100%;">
	<tr class="header">
		<td colspan="2">� ������ �������� ��������� ***</td>
	</tr>
	<tr class="header">
		<td>����� ��������</td>
		<td>�����</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>100,00 - 2 500,00</td>
		<td>250,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>2 500,01 - 5 000,00</td>
		<td>500,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>5 000,01 - 10 000,00</td>
		<td>750,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>10 000,01 - 15 000,00</td>
		<td>1 000,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>15 000,01 - 20 000,00</td>
		<td>1 250,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>20 000,01 - 25 000,00</td>
		<td>1 500,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>25 000,01 - 30 000,00</td>
		<td>1 778,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>30 000,01 - 40 000,00</td>
		<td>2 028,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>40 000,01 - 50 000,00</td>
		<td>2 278,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>50 000,01 - 60 000,00</td>
		<td>2 528,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>60 000,01 - 75 000,00</td>
		<td>3 028,00</td>
	</tr>
</table>
<br />
<table border="0" cellspacing="1" cellpadding="5" class="table5" style="width: 100%;">
	<tr class="header">
		<td colspan="2">� ��������� �������� ����������, �������, �������, ��������, ����� � �������</td>
	</tr>
	<tr class="header">
		<td>����� ��������</td>
		<td>�����</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>100,00 - 25 000,00</td>
		<td>250,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>25 000,01 - 50 000,00</td>
		<td>528,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>50 000,01 - 75 000,00</td>
		<td>778,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>75 000,01 - 125 000,00</td>
		<td>1 280,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>125 000,01 - 175 000,00</td>
		<td>1 278,00</td>
	</tr>
</table>


<p>- ��� ������������ ���� ����� 75,000.00 ������ � ������ �������� ��������� � ������ ����������� ��������� � 15,000.00 ������ � ����� �� ����������� �������� ����������� 500 ������;</p>
<p>- ��� ������������ ���� ����� 175,000.00 ������ � ��������� �������� ����������, �������, �������, ��������, ����� � ������� � ������ ����������� ��������� � 50,000.00 ������ � ����� �� ����������� �������� ����������� 500.00 ������.</p>
<p>* ��������� ����� ����������� � 12 ������ 2012 ���� �� ���� �������� ���������, ������������ �� ������ � ������, �� ����������� �������� ���������, ������������ �� ������ �12 �����.</p>
<p>** � ������� �������� ��������� � ������ ������� ������ ���������: �����������, �������, ����������, ������, ���������, ����������, �������, �����������, ������������, ����������, �������.</p>
<p>*** � ������� �������� ��������� � ������ ������� ������ ���������: ��� ������, ����� ��������� � ������� ����� �������� ���������, ������, ��������� �������� ����������, ��������, �������, ��������, ����� � ��������.</p>




<p style="text-align: center;">�����*<br />�� ����������� �������� ������� � ����������� ������ � ������ ���������� ��� (� �������� ���)</p>
<br />
<table border="0" cellspacing="1" cellpadding="5" class="table5" style="width: 100%;">
	<tr class="header">
		<td colspan="2">� ������ �������� ���������**</td>
	</tr>
	<tr class="header">
		<td>����� ��������</td>
		<td>�����</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>3,00 - 100,00</td>
		<td>5,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>100,01 - 200,00</td>
		<td>6,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>200,01 - 300,00</td>
		<td>10,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>300,01 - 400,00</td>
		<td>14,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>400,01 - 500,00</td>
		<td>18,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>500,01 - 600,00</td>
		<td>20,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>600,01 - 800,00</td>
		<td>25,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>800,01 - 1 000,00</td>
		<td>30,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>1 000,01 - 1 200,00</td>
		<td>35,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>1 200,01 - 1 400,00</td>
		<td>40,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>1 400,01 - 1 600,00</td>
		<td>45,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>1 600,01 - 1 800,00</td>
		<td>50,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>1 800,01 - 2 000,00</td>
		<td>55,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>2 000,01 � �����</td>
		<td>60,00</td>
	</tr>
</div>
<br />
<table border="0" cellspacing="1" cellpadding="5" class="table5" style="width: 100%;">
	<tr class="header">
		<td colspan="2">� ������ �������� ���������***</td>
	</tr>
	<tr class="header">
		<td>����� ��������</td>
		<td>�����</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>3,00 - 100,00</td>
		<td>10,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>100,01 - 200,00</td>
		<td>20,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>200,01 - 400,00</td>
		<td>30,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>400,01 - 600,00</td>
		<td>40,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>600,01 - 800,00</td>
		<td>50,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>800,01 - 1 000,00</td>
		<td>60,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>1 000,01 - 1 200,00</td>
		<td>71,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>1 200,01 - 1 600,00</td>
		<td>81,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>1 600,01 - 2 000,00</td>
		<td>91,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>2 000,01 - 2 400,00</td>
		<td>101,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>2 400,01 - 3 000,00</td>
		<td>121,00</td>
	</tr>
</table>
<br />
<table border="0" cellspacing="1" cellpadding="5" class="table5" style="width: 100%;">
	<tr class="header">
		<td colspan="2">� ��������� �������� ����������, �������, �������, ��������, ����� � �������</td>
	</tr>
	<tr class="header">
		<td>����� ��������</td>
		<td>�����</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>3,00 - 1 000,00</td>
		<td>10,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>1 000,01 - 2 000,00</td>
		<td>21,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>2 000,01 - 3 000,00</td>
		<td>31,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>3 000,01 - 5 000,00</td>
		<td>41,00</td>
	</tr>
	<tr<?=colrow($j1++);?> align="center">
		<td>5 000,01 - 7 000,00</td>
		<td>51,00</td>
	</tr>
</table>

<p>- ��� ������������ ���� ����� 3,000.00 �������� ��� � ������ �������� ��������� � ������ ����������� ��������� � 600.00 �������� ��� � ����� �� ������� ����������� 20.00 �������� ���;</p>
<p>- ��� ������������ ���� ����� 7,000.00 �������� ��� � ��������� �������� ����������, �������, �������, ��������, ����� � ������� � ������ ����������� ��������� � 2,000.00 �������� ��� � ����� �� ������� ����������� 20.00 �������� ���.</p>
<p>* ��������� ����� ����������� � 12 ������ 2012 ���� �� ���� �������� ���������, ������������ �� ������ � �������� ���, �� ����������� �������� ���������, ������������ �� ������ �12 �����.</p>
<p>** � ������� �������� ��������� � ������ ������� ������ ���������: �����������, �������, ����������, ������, ���������, ����������, �������, �����������, ������������, ����������, �������.</p>
<p>*** � ������� �������� ��������� � ������ ������� ������ ���������: ��� ������, ����� ��������� � ������� ����� �������� ���������, ������, ��������� �������� ����������, ��������, �������, ��������, ����� � ��������.</p>

<p style="text-align: center;"><b>����� 12 �����</b><br />�� ����������� �������� ������� � ������ � ����������� ������ (� �������� ���) � ������ ���������� ���</p>
<br />
<p>��������� ����� ����������� � 1 ������ 2012 ����. ������� ��������� ��������, ������������� �� ������� ������, ����� �������� �� ��������� 12 ����� � ������� �����������.������������ ����� ��������� ��������, ������������� �� ������� ������, �� ����� ��������� 1,000 (������) �������� ��� 30000 ����� ������. ����� �������� � ������ ������� �� ������ ����������� <a href="pool/files/WU_01.11.pdf" target="_blank" title="������������ � ��������"><strong> �����.</strong></a></p>
	
<!-- END -->
</div>