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
	<li<?php print colrow($j1++); ?>><a href="/d_priovtb_kb_man.zip">����������� ������������</a></li>
	<li<?php print colrow($j1++); ?>><a href="/d_priovtb_kb_new_account.zip">���������� �� ���������� ������ ���������� �����</a></li>
	<li<?php print colrow($j1++); ?>><a href="/d_priovtb_kb_1c_exchange.zip">����������� ������������ �� ��������� ������ ������� � 1�:�����������</a></li>
	<li<?php print colrow($j1++); ?>><a href="/d_priovtb_kb_io_form.zip">������ ��������\������� ����������</a></li>
</ul>

<h1>������������ �� ��������� PCard</h1>
<ul class="smenu3">
	<li<?php print colrow($j1++); ?>><a href="/d_priovtb_pcard_man.zip">����������� ������������</a></li>
</ul>
	

<h1>������</h1>
<ul class="smenu3">
	<li<?php print colrow($j1++); ?>><a href="/d_priovtb_blank_connect.zip">����� ������ �� ����������� � ������� ������-����</a></li>
	<li<?php print colrow($j1++); ?>><a href="/d_priovtb_blank_support.zip">����� ������ �� ���.������ �� ������� ������-����</a></li>
</ul>


<!-- END -->
</div>
