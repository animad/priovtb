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

<UL>
	<LI>������ ��������������� �� ������������ ������� �� ��������� � ��������� ����� ������������ � ��������������� �����;</li>
	<LI>����������� ����� ������� - 100 000 ������, ������������ ����� �������- � ����������� �� ������������������ ������� � �������� ��������������� ������;</li>
	<br /><br />
	<b>���� �������- �� 15 ���</b>
     <br /><br />
<b>����������� �� �������:</b>
<UL><br >
	<b>��� �������� �����</b></br>
<br/>
<UL>
	<LI>����� ������������� ������������;</li>
	<LI>�������������� �������(�)(��� �������);</li>
	<LI>����������� �������� ������ �� ���� ���� �������� ���������� ��������, �� ����� �� ������� ����� ������� � ������������� � ���������� ��������� ��������;</li>
	<br />	
</UL>
<br>
<b>�� ����� �������������</b>
</br >
<br/>
<UL>
	<LI>����� ���� ���������� �� ���������� ����� (��� ��������������� ��������);</li>
	<LI>�������������� �������(�)(��� �������);</li>
	<br>���</br>
	<LI>����� ������������ ����� (�� ����� �������������);</li>
	<LI>�������������� �������(�)(��� �������);</li>
	<LI>����������� �������� ������ �� ���� ���� ���������� ��������, �� ����� �� ������� ����� ������� � ������������� � ���������� ��������� ��������;</li>
		
</UL>
<br /><br /></UL>
<b>���������� ������ �� �������.</b>
<br /><br />
	<TABLE  class="table3" cellspacing="1" cellpadding="5" border="0" width = "600">
		<tr >
			<td class="header">�������������� �����</td>
			<TD class="odd">10 ���</TD>
			<TD class="even">15 ���</TD>
		</TR>
		<TR  >
			<TD class="header">�������������� ����� �� 25% �� 40% ������������</TD>
			<TD class="odd">14,3</TD>
			<TD class="even">14,8</TD>
		</TR>
		<TR >
			<TD  class="header">�������������� ����� ����� 40% </TD>
			<TD class="odd">13,8</TD>
			<TD class="even">14,3</TD>
		</TR>
	</TABLE>
	<br />	
	<LI>����� �� �������������� ������� - 2% �� ����� �������</LI>
	<LI>��� ��������� �������������� ����� �������� �� ����� ����� ���������� ������ �� 1% ����</LI>
	<br /><br />
<TABLE class="table5" cellspacing="1" cellpadding="5" border="0" width = "600">
		<tr class="header">
			<td>�������� ��������������� ������ �� �������� ���������</td>
			
			<TD>������������ ����� �������</TD>
		</TR>
		<TR class="even">
			<TD>25%</TD>
			<TD>�� ����� 1500000 ���</TD>
		</TR>
		<TR class="odd">
			<TD>30%</TD>
			<TD>�� ����� 2000000 ���</TD>
		</TR>
		<TR class="even">
			<TD>40% </TD>
			<TD>�� ����� 4000000 ���</TD>
		</TR>

		<TR class="odd">
			<TD>50% </TD>
			<TD>����� 4000000 ���</TD>
		</TR>

	</TABLE>
	<br />	
	<LI>����� ������� �� ����� ��������� 90% �� ��������� ��������� ������������ ������������� �����</LI>

</UL>
<!-- END -->
</div>