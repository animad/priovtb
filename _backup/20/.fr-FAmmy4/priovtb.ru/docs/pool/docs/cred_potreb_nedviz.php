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
	<LI>������ ��������������� �� ��������������� ����;</li>
	<LI>����������� ����� ������� - 200 000 ������, ������������ - �� ����� 70% �� ��������� ��������� ������������ ������������ � �����.</li>
	<br /><br />
	<p><b>���� ������������- �� 5 ���</b></p>


<p><b>����������� �� �������:</b></p>
	
<UL>
	<LI>�������������� �������(�)(��� �������);</li>
	<LI>����� ������������ (����� ���� ���������� ��� ��������������� ��������);</li>
	<br />	
</UL>

<p>
	<TABLE class="table11">
		<tr>
			<td>�����������/���� �������</td>
			<TD>�� 36 ���</TD>
			<TD>�� 60 ���</TD>
		</TR>
		<TR>
			<td>-�������������� �������(�)(��� �������)<p>-����� ������������</td>
			<TD>16</TD>
			<TD>17</TD>
		</TR>

	</TABLE>
	<br />	
	<p><b>����� �� �������������� �������- 1% �� ����� �������, �� �� ����� 5 000 ������</p>
<p><b>���������� � ��������:</b></p>
<UL>
	<LI>���� ������ �� ����� 6 �������;</li>
	<LI>����� ���� ������ �� ����� 18 �������;</li>
	<LI>������������ ������ ����� �������� ����������� �����;</li>
	<LI>������������� ������ �������� �� ����� 2-����;</li>
	<LI>���������� ������������ �������� ������������� ����� 60 ����</li>
	<LI>���������� ������� ������������ �����������</li>
    <LI>������� �� 21 ����, �� � �� ������ 55/60 (�������/��������) ��� �� ������ ������� �������;</li>
<br />	
</UL>


</UL>
<!-- END -->
</div>