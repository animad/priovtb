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
		document.title=document.title+" | "+(current_page!=null && typeof(current_page.title_p)!="undefined"?current_page.title_p+", ":"")+current_page.title;
	}
</script>
<!-- END page title -->

<!-- BEGIN -->

<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>�������� ���������� � ����������� ������ ��</td>
		<td width="100">���. ���.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>���������� ������� � ��������� ������������</td>
		<td>20 849</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����,  ��������������� ������ �������� (����������� ������������)</td>
		<td>515 554</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>�������� ����� �� ���������� ������ (�������)</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ����� � ������������� �������</td>
		<td>11 242</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ����������</td>
		<td>5 337</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����� ��������� ���������� � ����������� �������: (��.1 + 2 + 3 + 4 + 5)</td>
		<td>552 982</td>
	</tr>
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>�������� ���������� � ����������� ������� ��</td>
		<td>���. ���.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������������ ��������� ��������� �����������</td>
		<td>1 778</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������������ ���������  �������� (����������� �����������)</td>
		<td>229 416</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>���������� �������� ������ �������</td>
		<td>461</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����� ��������� ���������� � ����������� ��������</td>
		<td>231 655</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ���������� � ����������� ������</td>
		<td>321 327</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ������ �� �������� � ������� ��������</td>
		<td>1 037</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ������ �� �������� � ����������� �������</td>
		<td>19 011</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ������ �� �������� � ������������ ��������� � ������� ����������� �������������</td>
		<td>277</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ������ �� ���������� ����������� ������</td>
		<td>-1 095</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������������ ������</td>
		<td>171 920</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������������ �������</td>
		<td>3 334</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������  ����� �� ������� ��������</td>
		<td>56 942</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ������ ������������ ������</td>
		<td>-55 719</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>���������������-�������������� �������</td>
		<td>287 312</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������� �� ��������� ������</td>
		<td>-139 032</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������� �� ���������������</td>
		<td>84 022</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����������� ������ (������� ����� �� �������)</td>
		<td>42 771</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������� �� �������� ������</td>
		<td>41 251</td>
	</tr>
</table>

<h1>������ �� 1 ������ 2008 ����</h1>
<?php $j1=0; ?>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>������</td>
		<td width="100">���. ���.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>��������  ��������</td>
		<td>257 469</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>�������� ��������� ����������� �  ����������� ����� ���������� ���������</td>
		<td>220 603</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������������ �������</td>
		<td>59 526</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>�������� � ��������� ������������</td>
		<td>63 494</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ �������� � �������� ������ ������</td>
		<td>222 467</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ������� �������������</td>
		<td>3 979 805</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ �������� � �������������� ������ ������, ������������ �� ���������</td>
		<td>18</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ �������� � ������ ������, ��������� � ������� ��� �������</td>
		<td>800</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>�������� ��������, �������������� ������ � ������������ ������</td>
		<td>162 695</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>���������� �� ��������� ���������</td>
		<td>13 640</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ������</td>
		<td>49 838</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����� �������</td>
		<td>4 970 829</td>
	</tr>
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>�������</td>
		<td>���. ���.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������� ������������ ����� ���������� ���������</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>�������� ��������� �����������</td>
		<td>10 100</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>�������� ��������  (����������� �����������)</td>
		<td>4 312 616</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ ���������� ���</td>
		<td>2 323 390</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>���������� �������� �������������</td>
		<td>7 440</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������������� �� ������ ���������</td>
		<td>73 520</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������ �������������</td>
		<td>37 656</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������� �� ��������� ������ �� �������� �������������� ���������� ���������, ������ ��������� ������� �  �� ��������� � ����������� �������� ���</td>
		<td>28 637</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����� ������������</td>
		<td>4 469 969</td>
	</tr>
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>��������� ����������� �������</td>
		<td>���. ���.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>�������� ���������� (����������)</td>
		<td>34 965</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������������������ ������������ ����� � ����</td>
		<td>34 950</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������������������ ����������������� �����</td>
		<td>15</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>�������������������� ��������  ������� ������������� ��������� �����������</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����������� ����� , ����������� � ����������</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����������� �����</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>���������� �������� �������</td>
		<td>116 288</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>������� ������� �������� � ����������� �������,  �������� �� ����������� �������� (�������)</td>
		<td>15 818</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����� � ���������������� ������� ������� ��� � ������������ ��������� ����������� (������������ ������ ������� ���)</td>
		<td>324 174</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>�������  (������) �� ��������  ������</td>
		<td>41 251</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����� ���������� ����������� �������</td>
		<td>500 860</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����� ��������</td>
		<td>4 970 829</td>
	</tr>
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>������������� �������������</td>
		<td>���. ���.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>����������� ������������� ��������� �����������</td>
		<td>949 025</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>��������, �������� ��������� ������������</td>
		<td>137 469</td>
	</tr>
</table>
<p>��������, ���������� ��������� � ������� V "����� �������������� ����������" �� ��������������.</p>
<h1>����������� ����������</h1>
<p>�� ������  ��� "����������-���������������� �����" "����"  ������������� ������, ����� � �������� � �������, ����� �� ������ ������������� ��������, �������� �������� �� �������� ������������ ���� � ���� ����� ������� �������� ���������� �� ���� ������������ ���������� ���������� ��������� ����-�������������  (�������� ����������� ��������) �� ��������� �� 31 ������� 2007 ���� � ���������� ��� ���������-������������� ������������ �� ������ � 01 ������ 2007 ���� �� 31 ������� 2007 ���� ������������.</p>
<table border="0" cellspacing="1" cellpadding="5">
	<tr valign="top">
		<td>������������ ����������� �����������:</td><td>�������� ����������� �������� "����������-���������������� ����� "����"</td>
	</tr>
	<tr valign="top">
		<td colspan="2">��������  ������������ �������� ���������� ��������� � � 000942</td>
	</tr>
	<tr valign="top">
		<td>���� ������:</td><td>25.06.2002�.</td>
	</tr>
	<tr valign="top">
		<td>���� �������� ��������:</td><td>5 ���</td>
	</tr>
	<tr valign="top">
		<td>�������, ���, �������� ������������:</td><td>�������� ������ ����������</td>
	</tr>
	<tr valign="top">
		<td>������ ����, ����������� ����������� ����������:</td><td>����������� ��������  ��� "����������-���������������� �����" "����" �������� ������ ����������</td>
	</tr>
	<tr valign="top">
		<td>������������, ����� ���������, ��������������� ����������:</td><td>������ � ���������� � 20 �� 08.07.1997�.</td>
	</tr>
</table>


<!-- END -->
</div>