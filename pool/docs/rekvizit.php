<style rel="stylesheet" style="text/css" media="screen">
	.row1{
		margin: 0;
		padding: 0;
	}
	.row1 li{
		list-item-marker: none;
		display: inline;
	}
</style>

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
	}
</script>
<!-- END page title -->

<!-- BEGIN -->


<div class="block">
	<div class="text2">
<?php
	$a['anc']=array('details'=>'���������','contacts'=>'��������','licens'=>'��������');
	while(list($key,$val)=each($a['anc'])){
		print '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'#'.$key.'" class="cell'.(isset($_GET['m']) && $_GET['m']==$key?'2':'').'">'.$val.'</a> ';
	}
?>
</div></div>
<a name="details"></a>
<p align="center"><b>����-������������ (���)</b></p>
<p align="center"><b>PRIO-VNESHTORGBANK joint-stock company</b></p>
<p align="center">��������������� � ����������� ����� ���������� ��������� (����� ������) 6 ������� 1989 ����, ��������������� N 212.</p>
<br />

<table border="0" cellspacing="1" cellpadding="5" class="table5" align="center">
	<tr<?=colrow($j1++);?>>
		<td>����������� �����</td>
		<td>390023 �.������, ��. �������, 82/26.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>�������� �����</td>
		<td>390023 �.������, ��. �������, 82/26</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���</td>
		<td>6227001779</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���</td>
		<td>622701001</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���</td>
		<td>046126708</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���/��</td>
		<td>30101810500000000708<br />� ���� �� ����� ������ �� ��������� ���.</td>
	</tr>


	<tr<?=colrow($j1++);?>>
		<td rowspan="7" valign="top">����</td>
		<td>����: 09807224</td>
	</tr>
	<tr<?=colrow($j1++);?>><td>�����: 15001</td></tr>
	<tr<?=colrow($j1++);?>><td>�����: 61401000000</td></tr>
	<tr<?=colrow($j1++);?>><td>�����: 65.12</td></tr>
	<tr<?=colrow($j1++);?>><td>����: 16</td></tr>
	<tr<?=colrow($j1++);?>><td>�����: 47</td></tr>
	<tr<?=colrow($j1++);?>><td>
		����: 1026200000111
		<div style="font-size: 10px; font-style: italic;">(���� �������� � ������ ��������������� ������ ����������� ��� ������ � ��������������� ����������� ��������� ����������� 02.10.2002)</div>
	</td></tr>

	<tr<?=colrow($j1++);?>>
		<td>���.</td>
		<td>(4912) 24-49-00, 24-49-01</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>����</td>
		<td>(4912) 24-49-17</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>REUTER</td>
		<td>PRIO</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>SWIFT</td>
		<td>PRIO RU 2J</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>E-mail</td>
		<td><a href="mailto:post@priovtb.com">post@priovtb.com</a></td>
	</tr>
</table>

<br />
<a name="contacts"></a>
<p align="center"><b>��������</b></p>
<br />


<table border="0" cellspacing="1" cellpadding="5" class="table5" align="center">
	<tr<?=colrow($j1++);?>>
		<td>������ ���������� ������</td>
		<td>���. (4912) 24-49-24,<br />����:24-49-17</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>��������</td>
		<td>���. (4912) 24-49-00, 24-49-01</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>����� �� ������ � ���������</td>
		<td>���. (4912) 24-49-18</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������������ ���������� ������������ �����</td>
		<td>���. (4912) 24-49-04, 44-15-06, 44-16-49</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���������� ������������</td>
		<td>���. (4912) 24-49-47, 24-49-03,  44-54-25</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>����� ��������� ��������</td>
		<td>���. (4912) 24-49-22, 24-49-02</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���������� ������ ����� � ��������� ��������</td>
		<td>���. (4912) 24-49-26, 24-49-28</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������ ����������</td>
		<td>���. (4912) 44-47-20</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>���������� ������</td>
		<td>���. (4912) 27-54-37, 45-39-34</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������������ ����� ������ �����</td>
		<td>���. (4912) 27-17-77</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>������ ����������� ���������</td>
		<td>���. (4912) 50-44-50<br />e-mail: <a href="mailto:support@priovtb.com">support@priovtb.com</a></td>
	</tr>
</table>

<br />
<a name="licens"></a>
<p align="center"><b>��������</b></p>
<br />


<div style="text-align: center;">
	<ul class="row1">
		<li><a href="pool/images/license/lic_212.jpg" target="_blank"><img src="pool/images/license/lic_212_small.jpg" hspace="5" vspace="5" border="0"></a></li>
		<li><a href="pool/images/license/lic_212_fiz.jpg" target="_blank"><img src="pool/images/license/lic_212_fiz_small.jpg" hspace="5" vspace="5" border="0"></a></li>
		<li><a href="pool/images/license/lic_212_dragmet.jpg" target="_blank"><img src="pool/images/license/lic_212_dragmet_small.jpg" hspace="5" vspace="5" border="0"></a></li>
	</ul>
</div>

<!-- END -->
</div>