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

<p>� ����-������������� �� ������ �������� ������������ ������ � ������ ��� "���" �� ������ ����-����.</p>
<p>�� ������ ������������ ����� ���� �� ������� � ��� ��������.</p>
<p>������  �� ������ ���������� � ������� ��� ��� ����� �� ����� ������� ����� ����������-������� � ��������� ���������� �����:</p>
<br />
<?php coord_list2(array('opk02','opk04','opk06'));?>

<!-- END -->
</div>