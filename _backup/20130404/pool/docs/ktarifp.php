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

<div align="center">��������� ������ �������� � 1 ������� 2010 �.</div>
<br />

<table border="0" cellspacing="1" cellpadding="5" align="center" class="table5">
	<tr class="header" >
		<td colspan="3">������ �� ���������� ��������� ���������� ��� �� ������ ����-���� </td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3" align="center"><strong>1. �������� � ������� ����� �����</strong></td>
		<td>&nbsp;</td>
	<tr<?=colrow($j1++);?>>
		<td>1.1.</td>
		<td>�������� � ������� ����� ����� (����� ���������� ����)</td>
		<td>150 ������ � ���</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>1.2.</td>
		<td>�������� � ������� ����� ���������� ����� *</td>
		<td>���������</td>
				</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3" align="center"><strong> 2. ����� �������� �������� �������</strong></td>
		<td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.1.</td>
		<td>����� ��������� �������� ������� �����������, �� ����������� �������, ��������� � ������ 2.2.</td>
		<td>���������</td>
		</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.2.</td>
		<td>����c��� � �������� ����������� ������� ��������� �� 100 ������ ������������(��� ����� ����� ������� ��������� ��������� ����� 15000 ������. �������� ����������� ������ � ��������������� �� �������� ����.)</td>
		<td>0,4% �� �����, ��������� ���������� ��������� ���������</td>
		</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.3.</td>
		<td>�������� � �������� ����������� ����� ����� ����������� �� 50 ��.</td>
		<td>���������</td>
		</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.4.</td>
		<td>�������� � �������� ����������� ����� ����� ����������� ����� 50 ��.(��� ����� ���������� ����� ����� 100 ���� �������� �������������� ������ � �������� �����. ������ ����������� ������ � ��������������� �� �������� ����.)</td>
		<td>10% �� ����� ����� ��������� 1,2,5 � 10 ������; 50% �� ����� ����� ��������� 10 � 50 ���.; 90% �� ����� ����� ��������� 1 � 5 ������; ������� 20 ������</td>
				</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3" align="center"><strong>3. ����������� ���������� �������� �������</strong></td>
		<td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>3.1.</td>
		<td>���������� �������� �������, ����������� �� �������� ������ ��������� �����.</td>
		<td>��� ��������</td>
		</tr>
	<tr<?=colrow($j1++);?>>
		<td>3.2.</td>
		<td>���������� �������� �������, ����������� �� ����������� � ������������ ��������� � ������� � ������������ ����-����.</td>
		<td>� ������������ � ���������</td>
		</tr>
	<tr<?=colrow($j1++);?>>
		<td>3.3.</td>
		<td>���������� �������� �������, ����������� � ����������� ������� �� ����������, �������� �� �.3.1 � 3.2.</td>
		<td>0.5% �� ����� ����������</td>
				</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3" align="center"><strong> 4. ������ �������� �������</strong></td>
		<td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>4.1.</td>
		<td>������ ��������� �������� ������� � ���������� � ������� ������ ��������</td>
		<td>���������</td>
		</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3" align="center"><strong> 5. ������� �� ����� �� ��������� �������</strong></td>
		<td>&nbsp;</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>5.1.</td>
		<td>�� ���� ���� ������ �����</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>5.2.</td>
		<td>�� ���� ����������� ���� ������ �����</td>
		<td>70 ������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>5.3.</td>
		<td>�� ���� ������������ ���� ������ �����</td>
		<td>0.3% �� ����� �������, �� �� ����� 70 ������ � �� ����� 1500 ���.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>5.4.</td>
		<td>�� ���������������� ����</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>5.5.</td>
		<td>� ������ ���� �� ���� �����������/������������ ����</td>
		<td>0.3% �� ����� �������, �� �� ����� 70 ������ � �� ����� 1500 ���.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td colspan="3" align="center"><strong>6. ������</strong></td>
		<td>&nbsp;</td>
		</tr>
	<tr<?=colrow($j1++);?>>
		<td>6.1.</td>
		<td>�����������(���� ��������������� ���������)</td>
		<td>��������� ����� ������������ ������ �����������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>6.2.</td>
		<td>�������� �����</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>6.3.</td>
		<td>������ ������� �� ����� ��� ��������</td>
		<td>���������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>6.4.</td>
		<td>������ ������� � ����� ����������� �������� (� ��������� ����� �� �����. ����, �������� ���������� ���������, ����������� ���� ����� �� ���������� ���� � �.�.) - �� ��������� �������� ����</td>
		<td>100 ������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>6.5.</td>
		<td>������ ������� �� ����� ����������� �������� (� ��������� ����� �� �����. ����, �������� ���������� ���������, ����������� ���� ����� �� ���������� ���� � �.�.) - �� ��������� ������� ���</td>
		<td>150 ������</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>6.6.</td>
		<td>����� �� ������ �������������� ����� </td>
		<td>20 ������</td>
	</tr>
</table>

<p>* - �� ���������� �����, �������� �� ��������� �������� � ������������, ������� �� �������� � ������� ����� ����� ��������� �����������.</p>


<!-- END -->
</div>