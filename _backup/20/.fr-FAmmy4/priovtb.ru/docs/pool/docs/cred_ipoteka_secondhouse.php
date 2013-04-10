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


<p>Банк рад предложить своим клиентам ипотечные кредиты на покупку жилья по максимально выгодным условиям.</p>
<br />
<div align="center"><strong>1. Рублевый кредит с плавающей процентной ставкой</strong></div>
<UL>
	<LI>Срок кредита &ndash; до 25 лет;</li>
	<LI>Минимальная сумма кредита &ndash; от 350 000 руб;</li>
	
<p><em><li>Подробнее : ( http://www.deltacredit.ru/program/deltaeconom/)</li></em></p>
<p><div align="center"><strong>1. Рублевый кредит с фиксированной процентной ставкой</strong></div></p>

	<LI>Срок кредита &ndash; до 25 лет;</li>
	<LI>Минимальная сумма кредита &ndash; от 350 000 руб;</li>
	
<p><em><li>Подробнее : ( http://www.deltacredit.ru/program/deltarub/)</li></em></p>

<!-- END -->
</div>