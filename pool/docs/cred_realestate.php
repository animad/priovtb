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


<UL>
	Кредит предоставляется на потребительские цели.
	<b>Минимальная</b> сумма кредита – 100 000 руб., <b>максимальная</b> сумма кредита – не более 70% от оценочной стоимости недвижимости передаваемой в залог.
	</b>Срок кредитования</b>- до 5 лет;
	<br /><br />
	
	<p><b>Обеспечение по кредиту:</b></p>
	
<UL>
	<LI>залог недвижимости (залог прав требований для аккредитованных объектов);</li>
	<LI>поручительство супруга/супруги (при наличии).</li>

</UL>
	<p><b>Процентные ставки</b></p>
	<TABLE class="table3" cellspacing="1" cellpadding="5" border="0" width = "500">
		<tr >
		    <td class="header">Срок кредита</td>
			<td class="odd"> До 36 мес</td>
			<TD class="even">От 36 - 60 мес</TD>
		</TR>
		<TR >
		<TD class="header" >Участники зарплатного проекта</TD>
			<TD class="odd">16</TD>
			<TD class="even">17</TD>
		</TR>
		<TR >
		<TD class="header" >Клиенты, не получающие з/п на карты банка</TD>
			<TD class="odd">16,5</TD>
			<TD class="even">17,5</TD>
		</TR>
	</TABLE>
	<br />	
	

<p><b>Требования к заемщику:</b></p>

<UL>
	<LI>Возраст от 21 года, но и не старше 55/60 (женщины/мужчиины) лет на момент выплаты кредита;</li>
	<LI>Стаж работы на последнем месте не менее 6 месяцев;</li>
	<LI>Подтверждение дохода справкой по форме 2-НДФЛ.</li>
   
	<br />	
</UL>


<p><b>Требования к недвижимости:</b></p>

<UL>
<LI>- предметом залога может выступать жилое или нежилое помещение, земельный участок на территории г.Рязани или Рязанской области;</li>
<LI>- отсутствие обременений со стороны третьих лиц;</li>
<LI>- собственниками недвижимости не должны быть несовершеннолетние дети;</li>
<LI>- отсутствие незарегистрированных перепланировок, для земельных участков - отсутствие незарегистрированных построек.</li>
	
<br />	
</UL>

</UL>
<!-- END -->
</div>