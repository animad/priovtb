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
	������ ��������������� �� ��������������� ����.
	<b>�����������</b> ����� ������� � 100 000 ���., <b>������������</b> ����� ������� � �� ����� 70% �� ��������� ��������� ������������ ������������ � �����.
	</b>���� ������������</b>- �� 5 ���;
	<br /><br />
	
	<p><b>����������� �� �������:</b></p>
	
<UL>
	<LI>����� ������������ (����� ���� ���������� ��� ��������������� ��������);</li>
	<LI>�������������� �������/������� (��� �������).</li>

</UL>
	<p><b>���������� ������</b></p>
	<TABLE class="table3" cellspacing="1" cellpadding="5" border="0" width = "500">
		<tr >
		    <td class="header">���� �������</td>
			<td class="odd"> �� 36 ���</td>
			<TD class="even">�� 36 - 60 ���</TD>
		</TR>
		<TR >
		<TD class="header" >��������� ����������� �������</TD>
			<TD class="odd">16</TD>
			<TD class="even">17</TD>
		</TR>
		<TR >
		<TD class="header" >�������, �� ���������� �/� �� ����� �����</TD>
			<TD class="odd">16,5</TD>
			<TD class="even">17,5</TD>
		</TR>
	</TABLE>
	<br />	
	

<p><b>���������� � ��������:</b></p>

<UL>
	<LI>������� �� 21 ����, �� � �� ������ 55/60 (�������/��������) ��� �� ������ ������� �������;</li>
	<LI>���� ������ �� ��������� ����� �� ����� 6 �������;</li>
	<LI>������������� ������ �������� �� ����� 2-����.</li>
   
	<br />	
</UL>


<p><b>���������� � ������������:</b></p>

<UL>
<LI>- ��������� ������ ����� ��������� ����� ��� ������� ���������, ��������� ������� �� ���������� �.������ ��� ��������� �������;</li>
<LI>- ���������� ����������� �� ������� ������� ���;</li>
<LI>- �������������� ������������ �� ������ ���� ������������������ ����;</li>
<LI>- ���������� �������������������� ��������������, ��� ��������� �������� - ���������� �������������������� ��������.</li>
	
<br />	
</UL>

</UL>
<!-- END -->
</div>