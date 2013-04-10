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

<p align="center">Прио-Внешторгбанк сообщает об изменении телефонных номеров Промышленного отделения Прио-Внешторгбанка (ул. Завражнова, д.5)</p>
<br />

<table border="0" cellspacing="1" cellpadding="5" class="table5" align="center">
	<tr<?=colrow($j1++);?>>
		<td>Операционный зал</td>
		<td>92-24-76</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Операционный зал</td>
		<td>92-32-03</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Кассовый зал</td>
		<td>96-17-63</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Вкладные операции</td>
		<td>92-31-56</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Начальник отделения</td>
		<td>96-13-05</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Главный бухгалтер</td>
		<td>92-13-56</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Кредитный отдел</td>
		<td>92-27-27</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Факс</td>
		<td>76-22-17</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>Телефоны для справок</td>
		<td>76-22-17</td>
	</tr>
</table>
<p>Вы также можете получить необходимую информацию, позвонив в единую справочную службу Прио-Внешторгбанка по телефону: <b>24-49-24</b></p>


<!-- END -->
</div>