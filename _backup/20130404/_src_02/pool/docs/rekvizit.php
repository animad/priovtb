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

<p align="center">Зарегистрирован в Центральном Банке Российской Федерации (Банке России) 6 декабря 1989 года, регистрационный N 212.</p>
<p align="center"><b>Прио-Внешторгбанк (ОАО)</b></p>
<br />
<table border="0" cellspacing="1" cellpadding="5" class="table5" align="center">
	<tr<?=colrow($j1++);?>>
		<td>Адрес</td>
		<td>390023 г.Рязань, ул. Есенина, 82/26.</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Почтовый адрес</td>
		<td>390023 г.Рязань, ул. Есенина, 82/26</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>ИНН</td>
		<td>6227001779</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>БИК</td>
		<td>046126708</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>к/с</td>
		<td>30101810500000000708</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Тел.</td>
		<td>(4912) 24-49-00, 24-49-01</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Факс</td>
		<td>(4912) 24-49-17</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Телекс</td>
		<td>136122 PRIO RU</td>
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
		<td><a href="mailto:post@priovtb.ru">post@priovtb.ru</a></td>
	</tr>
</table>

<br />

<table border="0" cellspacing="1" cellpadding="5" class="table5" align="center">
	<tr<?=colrow($j1++);?>>
		<td>Единая справочная служба</td>
		<td>тел. (4912) 24-49-24,<br />Факс:24-49-17</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Приемная</td>
		<td>тел. (4912) 24-49-00,24-49-01</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Управление по работе с корпоративными клиентами</td>
		<td>тел. (4912) 24-49-18</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Операционное управление Центрального офиса</td>
		<td>тел. (4912) 24-49-04,44-15-06</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Управление кредитования</td>
		<td>тел. (4912) 24-49-28,24-49-03</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Управление международных операций</td>
		<td>тел. (4912) 24-49-22,24-49-02</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Управление ценных бумаг и пассивных операций</td>
		<td>тел. (4912) 24-49-26,24-49-28</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Служба инкассации</td>
		<td>тел. (4912) 44-47-20</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Управление делами</td>
		<td>тел. (4912) 44-45-41,45-39-34</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Автоответчик курса обмена валют</td>
		<td>тел. (4912) 27-17-77</td>
	</tr>
</table>

<!-- END -->
</div>