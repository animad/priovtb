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

<p>� ����-������������� �� ������ �������� ������������ ������ � ������ ��� "���" �� ������ ����-���� ���� ����� <a href="/?dr=coord.php&m=terminals" class="hrf7">��������� ��������� �����</a>.</p>
<p>�� ������ ������������ ����� ���� �� ������� � ��� ��������.</p>
<p>������ �� ������ ���������� � ������� ��� ��� ����� �� ����� ������� ����� ����������-������� � ��������� ���������� �����:</p>
<br />
<?php coord_list2(array('opk01','opk02','opk04','opk05','opk06','opk07','opk08','opk09','opk10','prom'));?>

<!-- END -->
</div>