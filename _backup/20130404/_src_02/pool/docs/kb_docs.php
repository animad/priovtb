<?php
	
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	
?>
<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("biz",0,"<?=$_GET['dr'];?>");</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title -->
<script type="text/javascript">pr_title();</script>
<!-- END page title -->

<!-- BEGIN -->


<ul class="smenu3">
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">����������� ������������</a></li>
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">���������� �� ���������� ������ ���������� �����</a></li>
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">����������� ������������ �� ��������� ������ ������� � 1�:�����������</a></li>
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">������ ��������\������� ����������</a></li>
</ul>

<h1>������������ �� ��������� PCard</h1>
<ul class="smenu3">
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">����������� ������������</a></li>
</ul>
	

<h1>������</h1>
<ul class="smenu3">
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">����� ������ �� ����������� � ������� ������-����</a></li>
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">����� ������ �� ���.������ �� ������� ������-����</a></li>
</ul>


<!-- END -->
</div>