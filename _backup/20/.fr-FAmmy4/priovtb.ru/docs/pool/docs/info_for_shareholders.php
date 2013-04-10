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


	<p align="center"><b> Информация для акционеров</b></p>
	<br>
	<p>Лицо, осуществляющее ведение реестра владельцев именных ценных бумаг Прио-Внешторгбанка (ОАО) - Открытое акционерное общество «Реестр»</p>

	<p>Информация о регистраторе</p>
	
	<TABLE class="table" cellspacing="0" cellpadding="5" border="2" width = "600">
		<tr >
		    <td class="header">Полное фирменное наименование:</td>
			<td class="odd"> Открытое акционерное общество «Реестр» </td>
		</TR>
		<TR >
		<TD class="header">Сокращенное фирменное наименование:</TD>
			<TD class="odd">ОАО «Реестр» </TD>
		</TR>
		<TR >
		<TD class="header">Место нахождения:</TD>
			<TD class="odd">Российская федерация, 119021, г. Москва, Зубовская площадь, д. 3 стр.2</TD>
		</TR>
		<TD class="header">ИНН:</TD>
			<TD class="odd">7704028206</TD>
		</TR>
	
		<TD class="header">ОГРН:</TD>
			<TD class="odd">1027700047275</TD>
		</TR>
		<TD class="header">Контактный телефон </TD>
			<TD class="odd">(495) 617-01-01</TD>
		</TR>
	</TABLE>
	<br />
	



<p>Информация о лицензии регистратора на осуществление деятельности по ведению реестра владельцев ценных бумаг:</p>

        <TABLE class="table" cellspacing="0" cellpadding="5" border="2" width = "600">
		<tr >
		    <td class="header">номер:</td>
			<td class="odd">№ 10-000-1-00254</td>
		</TR>
		<TR >
		<TD class="header">дата выдачи:</TD>
			<TD class="odd">13.09.2002</TD>
		</TR>
		<TR >
		<TD class="header">срок действия:</TD>
			<TD class="odd">Без ограничения срока действия</TD>
		</TR>
		<TD class="header">орган, выдавший указанную лицензию:</TD>
			<TD class="odd">Федеральная служба по финансовым рынкам</TD>
		</TR>
	
		<TD class="header">дата, с которой регистратор осуществляет ведение реестра владельцев именных ценных бумаг кредитной организации - эмитента:</TD>
			<TD class="odd">02.12.2011</TD>
		</TR>
		
	</TABLE>
	<br />
<p>По месту нахождения Прио-Внешторгбанка (ОАО) работу с акционерами осуществляет Рязанский филиал  ОАО «Реестр», расположенный по адресу: 390005, г. Рязань, ул. Ленинского комсомола, д.5. Контактный телефон, факс: (4912) 98-62-77, 24-04-22.</p>
</UL>
<!-- END -->
</div>