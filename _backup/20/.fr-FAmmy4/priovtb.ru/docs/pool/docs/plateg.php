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

<p>����-������������ ������������ �������� �������� ������� � ������ � ����������� ������ �� ��������� ���������� ���.</p>

<h1>������� ��� �������� �����</h1>

<ul class="list2">
	<li>�������� � ������� � ������ ����������� � ���������� ���, � ��� ����� ������� �� ��������, ������, ������� �������������, ��� ������� ������������, �����������, �� ��������� ��������� � ��.</li>
</ul>

<h1>��������</h1>

<ul class="list2">
	<li>�������� � ����������� ������ ��� �������� ������ �� �������</li>
	<li>�������� � ������ �� ������ "�� �������������" � �������� �� � ������ ���</li>
	<li>������� ���������</li>
</ul>

<p>������� ��� �������� ����� � �������� � <b>������</b> ����� ������� � �����  <a href="?dr=coord.php" class="hrf7">���������, ������� � ������������ �����</a> ����-�������������.</p>

<h1>�������� � <b>������</b><br />����������� � ��������� ���������� �����:</h1>

<?php coord_list2(array('opk02','moscow','rybnoe','shack','kasimov','novomich','scopin_do','sasovo'));?>

<!-- END -->
</div>