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
	<LI>Кредит предоставляется на потребительские цели;</li>
	<LI>Минимальная сумма кредита - 200 000 рублей, максимальная - не более 70% от оценочной стоимости недвижимости передаваемой в залог.</li>
	<br /><br />
	<p><b>Срок кредитования- до 5 лет</b></p>


<p><b>Обеспечение по кредиту:</b></p>
	
<UL>
	<LI>поручительство супруга(и)(при наличии);</li>
	<LI>залог недвижимости (залог прав требований для аккредитованных объектов);</li>
	<br />	
</UL>

<p>
	<TABLE class="table11">
		<tr>
			<td>Обеспечение/Срок кредита</td>
			<TD>До 36 мес</TD>
			<TD>До 60 мес</TD>
		</TR>
		<TR>
			<td>-поручительство супруга(и)(при наличии)<p>-залог недвижимости</td>
			<TD>16</TD>
			<TD>17</TD>
		</TR>

	</TABLE>
	<br />	
	<p><b>Плата за предоставление кредита- 1% от суммы кредита, но не менее 5 000 рублей</p>
<p><b>Требования к заемщику:</b></p>
<UL>
	<LI>Стаж работы не менее 6 месяцев;</li>
	<LI>Общий стаж работы не менее 18 месяцев;</li>
	<LI>Соответствие дохода семьи Заемщика требованиям Банка;</li>
	<LI>Подтверждение дохода справкой по форме 2-НДФЛ;</li>
	<LI>Отсутствие просроченных платежей длительностью свыше 60 дней</li>
	<LI>Отсутствие текущей просроченной задолжности</li>
    <LI>Возраст от 21 года, но и не старше 55/60 (женщины/мужчиины) лет на момент выплаты кредита;</li>
<br />	
</UL>


</UL>
<!-- END -->
</div>