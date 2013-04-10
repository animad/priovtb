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
	<LI>Кредит предоставляется на приобретение квартир на первичном и вторичном рынке недвижимости в многоквартирных домах;</li>
	<LI>Минимальная сумма кредита - 100 000 рублей, максимальная сумма кредита- в зависимости от платежеспособности клиента и величины первоначального взноса;</li>
	<br /><br />
	<b>Срок кредита- до 15 лет</b>
     <br /><br />
<b>Обеспечение по кредиту:</b>
<UL><br >
	<b>Для готового жилья</b></br>
<br/>
<UL>
	<LI>залог приобретаемой недвижимости;</li>
	<LI>поручительство супруга(и)(при наличии);</li>
	<LI>страхование предмета залога на весь срок действия кредитного договора, на сумму не меньшую суммы кредита в согласованной с кредитором страховой компании;</li>
	<br />	
</UL>
<br>
<b>На этапе строительства</b>
</br >
<br/>
<UL>
	<LI>залог прав требования на строящееся жилье (для аккредитованных объектов);</li>
	<LI>поручительство супруга(и)(при наличии);</li>
	<br>ИЛИ</br>
	<LI>залог действующего жилья (на этапе строительства);</li>
	<LI>поручительство супруга(и)(при наличии);</li>
	<LI>страхование предмета залога на весь срок кредитного договора, на сумму не меньшую суммы кредита в согласованной с кредитором страховой компании;</li>
		
</UL>
<br /><br /></UL>
<b>Процентные ставки по кредиту.</b>
<br /><br />
	<TABLE  class="table3" cellspacing="1" cellpadding="5" border="0" width = "600">
		<tr >
			<td class="header">Первоначальный взнос</td>
			<TD class="odd">10 лет</TD>
			<TD class="even">15 лет</TD>
		</TR>
		<TR  >
			<TD class="header">Первоначальный взнос от 25% до 40% включительно</TD>
			<TD class="odd">14,3</TD>
			<TD class="even">14,8</TD>
		</TR>
		<TR >
			<TD  class="header">Первоначальный взнос более 40% </TD>
			<TD class="odd">13,8</TD>
			<TD class="even">14,3</TD>
		</TR>
	</TABLE>
	<br />	
	<LI>Плата за предоставление кредита - 2% от суммы кредита</LI>
	<LI>Для заемщиков подтверждающих доход справкой по форме Банка процентная ставка на 1% выше</LI>
	<br /><br />
<TABLE class="table5" cellspacing="1" cellpadding="5" border="0" width = "600">
		<tr class="header">
			<td>Величина первоначального взноса от рыночной стоимости</td>
			
			<TD>Максимальная сумма кредита</TD>
		</TR>
		<TR class="even">
			<TD>25%</TD>
			<TD>Не более 1500000 руб</TD>
		</TR>
		<TR class="odd">
			<TD>30%</TD>
			<TD>Не более 2000000 руб</TD>
		</TR>
		<TR class="even">
			<TD>40% </TD>
			<TD>Не более 4000000 руб</TD>
		</TR>

		<TR class="odd">
			<TD>50% </TD>
			<TD>Более 4000000 руб</TD>
		</TR>

	</TABLE>
	<br />	
	<LI>Сумма кредита не может превышать 90% от оценочной стоимости определяемой специалистами Банка</LI>

</UL>
<!-- END -->
</div>