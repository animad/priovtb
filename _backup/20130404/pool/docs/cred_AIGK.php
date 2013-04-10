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
<br/>
<UL>
Прио-Внешторгбанк является  партнером  ОАО &laquo;Рязанская ипотечная корпорация&raquo; и выдает ипотечные кредиты для покупки жилья на вторичном рынке г. Рязани по стандартам АИЖК совместно с Корпорацией.
<br/>
<br/>

<b>Основные условия кредитования:</b>
<br/>
<br/>
	<LI>максимальный срок кредита до 30 лет;</li>
	<LI>первоначальный взнос от 30% от стоимости квартиры;</li>
	<LI>ставка по кредиту &ndash; в соответствии со стандартами АИЖК;</li>
	<LI>Объект залога &ndash; квартира в г. Рязани;</li>
	<LI>тип подтверждения дохода Заемщика &ndash; официальный, справка 2 НДФЛ.</li>
</UL>
<li> <a href=" http://www.rikor.ru/" class="hrf7" target="_blank"> Подробнее.....</a></li>



<br/>
<!-- END -->
</div>