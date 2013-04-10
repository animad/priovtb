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

<p>Кредит предоставляется на приобретение квартиры, дома и (или) земельного участка для последующего строительства жилья, а также на строительство, ремонт и реконструкцию.</p>

	<b>Сроки кредита</b> – до 10 лет.
	</br>
	<b>Сумма кредита</b>  - не менее 100 тыс руб, но не более 80% от оценочной стоимости жилья.
	</br>
	</br>
<p><strong>Процентные ставки:</strong></p>
<table class="table5" border="0" cellspacing="1" cellpadding="5"  width = "700">
	<tr class="header">
		<td>Вид подтверждения дохода</td>
		<td>3 года</td>
		<td>5 лет</td>
		<td>7 лет</td>
		<td>10 лет</td>
	</tr>
	<tr class="odd">
		<td>Справка 2-НДФЛ</td>
		<td style="text-align: center;">15 %</td>
		<td style="text-align: center;">15,5 %</td>
		<td style="text-align: center;">16 %</td>
		<td style="text-align: center;">16,5 %</td>
	</tr>
	<tr class="even">
		<td>Справка по форме Банка</td>
		<td style="text-align: center;">16 %</td>
		<td style="text-align: center;">16,5 %</td>
		<td style="text-align: center;">17 %</td>
		<td style="text-align: center;">17,5 %</td>
	</tr>
</table>

<p><strong>Обеспечение по кредиту:</strong></p>
<ul>
	<li>залог приобретаемой недвижимости, либо другого действующего жилья;</li>
	<li>поручительство супруга (и) – при наличии;</li>
</ul>

<p><strong>Основные требования к Заемщику:</strong></p>
<ul>
	<li>Возраст от 21 года, но и не старше 55/60  (женщины/мужчины) лет на момент выплаты кредита;</li>
	<li>Стаж работы на последнем месте не менее 6 месяцев;</li>
</ul>

<p><strong>Обеспечение по кредиту:</strong></p>
<ul>
	<li>предметом залога может выступать жилое помещение (за исключением комнат, «малосемеек», «гостинок», долей в квартирах), земельный участок, расположенные на территории г. Рязани или Рязанской области;</li>
	<li>отсутствие обременений со стороны третьих лиц;</li>
	<li>собственниками недвижимости не должны быть несовершеннолетние дети;</li>
	<li>отсутствие незарегистрированных перепланировок, для земельных участков – отсутствие незарегистрированных построек.</li>
</ul>





<!-- END -->
</div>