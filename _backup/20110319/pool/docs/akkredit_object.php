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

<ol >
	<li ><h2>������������ �������� ��� "�������� ��������"</h2></li>
<p>������ - ��������������� ���, ������������� �� ����������� ��.�������  �  ��.���������</p>
<br>
	<li><h2>������������ �������� ��� "��������� �������� �����" </h2></li>
<p>������ - 1 � 2 ������� ������������� ������������� ������ ���� � �������� �����������, �������������� �� ������: �.������, ����� �������, ��. ���������� (��������� �����)</p>
<br>
	<li><h2>������ �������� "��������"</h2></li>
<p>������ - ��������������� ��� � �������� �����������, ������������� �� ������ ����� ������, ����� �����������, ��� 65 (1 � 2 ������� �������������) "��������� ����"</p>
<p>������ - ����� ��� � �������-�������� �����������, ������������� �� ������: �.������, ��.���������, ��� 40�</p>
<br>
	<li><h2>������ �������� "������� ���"</h2></li>
<p>������ -  ����� �������� "����������". ��������������� ����� ��� � ��������� ������������, ������������� �� ������: �. ������, ��. �������-���������� (����� ������������)</p>
	
</ol>

<!-- END -->
</div>