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

<b>������ �� ������������ ���������� � ������ ���������� �������� �� ����������� ������ ����-������������� (���):</b>


<UL>
	<LI>������ ��������������� �� ������������ ��������� ����������;</li>
	<LI>����������� ����� ������� - 100 000 ���., �������������� ����� - �� 20% �� ��������� ������������� ����������;</li>
	
	<br /><br />
	<b>���� ������������- �� 5 ���</b>
	<br/>
	<br/>
	<b>���������� ������ �� �������:</b>
	<br/>
	<br/>
	<TABLE class="table3" cellspacing="1" cellpadding="5" border="0" width = "500">
		<tr>
			<td class="header"> ������������� ����������/ �������������� �����</td>
			<TD class="even">�� 20% �� 40% ������������</TD>
			<TD class="odd">����� 40%</TD>
		</TR>
		<TR>
			<TD class="header">����� ����������</TD>
			<TD class="even">15,5</TD>
			<TD class="odd">15</TD>
			</TR>
		<TR>
			<TD class="header">����������� ����������, ������� �������� �� ��������� 3-� ���</TD>
			<TD class="even">16</TD>
			<TD class="odd">15,5</TD>
			</TR>
	</TABLE>
	<br />	
	
	<LI>����� �� �������������� ������� � ������������ �� ���� ���������� - 5 000 ������</LI>

<br/>
	<br/>
	<br/>
<b>���������� � ��������:</b>
	<br/>
<br/>
	<LI>���� ������ �� ����� 6 �������;</li>
	<LI>����� ���� ������ �� ����� 18 �������;</li>
	<LI>������������ ������ ����� �������� ����������� �����;</li>
	<LI>������������� ������ �������� �� ����� 2-����;</li>
	<LI>���������� ������������ �������� ������������� ����� 60 ����</li>
	<LI>���������� ������� ������������ �����������</li>
    <LI>������� �� 21 ����, �� � �� ������ 55/60 (�������/��������) ��� �� ������ ������� �������;</li>
	<br />	
	<br/>
	<br/>

<b>���������� � �������������� ����������:</b>

<br/>
<br/>
	<LI>���������� ������������� � ����������;</li>
	<LI>����������� ����� � ����� �������������� ���������� � ������������� � ������ ��������� ��������;</li>
	<LI>������� ���������� �� ������ ������������ �� ������  3-� ���.</li>	
	<br />	

</UL>
<!-- END -->
</div>