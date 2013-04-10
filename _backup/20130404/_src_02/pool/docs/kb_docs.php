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
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">Руководство пользователя</a></li>
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">Инструкция по добавлению нового расчетного счета</a></li>
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">Руководство пользователя по настройке обмена данными с 1С:Предприятие</a></li>
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">Формат экспорта\импорта документов</a></li>
</ul>

<h1>Документация по программе PCard</h1>
<ul class="smenu3">
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">Руководство пользователя</a></li>
</ul>
	

<h1>Бланки</h1>
<ul class="smenu3">
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">Бланк заявки на подключение к системе клиент-банк</a></li>
	<li<?php print colrow($j1++); ?>><a href="/e_underconstruction.php" target="_blank">Бланк заявки на тех.работы по системе клиент-банк</a></li>
</ul>


<!-- END -->
</div>