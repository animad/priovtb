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

<div align="center">��������� ������ �������� � 1 ������� 2006�.</div>
<br />


<table border="0" cellspacing="1" cellpadding="5" align="center" class="table5">
	<tr class="header">
		<td colspan="5">������ �� ������������ ���� ������������� ��������� ������� Master Card</td>
	</tr>
	<tr class="header">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Maestro</td>
		<td>Standart</td>
		<td>MasterCard Gold</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>1.</td>
		<td>������������ � �������������. ��������� �����.</td>
		<td align="center">5 USD</td>
		<td align="center">20 USD</td>
		<td align="center">60 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.</td>
		<td>����������� ������� �� ����������� ����������������� �����.</td>
		<td colspan="3" align="center">0 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>3.</td>
		<td>����������� �������������� �����.</td>
		<td colspan="3" align="center">0 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>4.</td>
		<td>����������� ��������.</td>
		<td colspan="3" align="center">�����������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>5.</td>
		<td>�������� �� ������ �������� �������� �������:
			<ul class="list3">
				<li>� ������� ������ �������� ��� ���������� ���� - ������������� (���);</li>
				<li>� ������� ������ �������� ��� ���������� ������ ������. (*);</li>
			</ul>
		</td>
		<td colspan="3" valign="top" align="center">
			<div style="position: relative; margin-top: 55px;">0,5%</div>
			<div style="position: relative; margin-top: 40px;">1% (�� ����� 2.5 USD)</div>
		</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>6.</td>
		<td>�������� ��� ����������� ������ ������� � �����.</td>
		<td colspan="3" align="center">��� ��������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>7.</td>
		<td>������������ � ������������� ��  �������������� (��������������) �����. ��������� �����.</td>
		<td align="center">5 USD</td>
		<td align="center">20 USD</td>
		<td align="center">60 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>8.</td>
		<td>
			������������ � ������������� �� �����, �������������� �� 6 ������� ���� �� �������:
			<ul class="list3">
				<li>���������� �����, ������ PIN-���� (��� �������� ����������� ����� � ��� �����);</li>
				<li>�����, �����;</li>
			</ul>
		</td>
		<td align="center">5 USD</td>
		<td align="center">20 USD</td>
		<td align="center">60 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>9.</td>
		<td>
			����� �� ������� ����� ���������� ��� �������� (��� ��������� �������� ������ ����������� ������):
			<ul class="list3">
				<li>��� �����</li>
				<li>������� �����</li>
			</ul>
		</td>
		<td colspan="3" align="center">
			<div style="position: relative; margin-top: 40px;">5 USD</div>
			�� ����������� �������� ����� �� �������
		</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>10.</td>
		<td>
			������� ��������� � ������� ��������������� ������������ ������ ��� ������� �����:<br />
			<ul class="list3">
				<li>� ������� 1 ����������� ���</li>
				<li>�� ��������� ���������� ����</li>
			</ul>
		</td>
		<td colspan="3" valign="top" align="center">
			<div style="position: relative; margin-top: 46px;">60 USD</div>
			60 USD
		</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>11.</td>
		<td>���������� ����� � ���������� � ����-����.</td>
		<td colspan="3" valign="top" align="center">� ������������<br />� �������� ��������� �������</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>12.</td>
		<td valign="top">
			<ul class="list3" style="margin-bottom: 0;">
				<li>����������� ������ � ����������� ������</li>
				<li>����������� ����������� ������ � �����</li>
			</ul>
		</td>
		<td colspan="3" valign="top" align="center">
			<div style="position: relative; margin-top: 0;">����������� ���� ���� 0,1%</div>
			����������� ���� ����� 0,1%
		</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>13.</td>
		<td>���������� ��������� �� ������� ������� �� �����</td>
		<td colspan="3" align="center">�� ������������</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>14.</td>
		<td>��������� �� ����� �����.</td>
		<td colspan="3" align="center">�� ��������</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>15.</td>
		<td>
			���������� ������ ��� ����������� �������������� ����������<br />
			<ul type=disc>
				<li>������ ����� - �����</li>
				<li>������ ����� - �������</li>
				<li>������ ����� - ����</li>
			</ul>
		</td>
		<td colspan="3" align="center">
			<div style="position: relative; margin-top: 26px;">36% �������</div>
			25% �������<br />
			25% �������
		</td>
	</tr>
</table>

<p>��� �������� ����� � �������� � ������ �� ������ ������ �������������� �� ����� ����-������������� (���) �� ���� ���������� ��������.</p>
<p>* - ������������� ����� ��������� �������� ������-���������� ��������� ��� ������ ������ ��������.</p>

<!-- END -->
</div>