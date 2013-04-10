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
<UL>
<h2><div align="center"><strong>"Кредитование покупки квартир в новостройках города"</strong></div></h2>
<p>
	<LI>Срок кредита &ndash; 10 или 20 лет;</li>
	<LI>Минимальная сумма кредита &ndash; от 400 000 руб;</li>
	<LI>Минимальный первоначальный взнос &ndash; от 20% от стоимости жилья по договору;</li>
	<br><li> <a href="http://www.priovtb.com/?dr=akkredit_object.php" class="hrf7" target="_blank">Аккредитованные объекты</a></li>
</p>
	<li> <a href="http://www.deltacredit.ru/program/deltanovostroyka/" class="hrf7" target="_blank">Подробнее.....</a></li>
<br/>
<br/>
<h2><div align="center"><strong>"Кредитование на вторичном рынке"</strong></div></h2>
<br/>
<strong>1. Рублевый кредит с плавающей процентной ставкой</strong>
<p>
	<LI>Срок кредита &ndash; до 25 лет;</li>
	<LI>Минимальная сумма кредита &ndash; от 350 000 руб;</li>
</p>
<li> <a href="http://www.deltacredit.ru/program/deltaeconom/" class="hrf7" target="_blank">Подробнее .....</a></li>
<br/>
<br/>
<strong>2. Рублевый кредит с фиксированной процентной ставкой</strong>
<p>
	<LI>Срок кредита &ndash; до 25 лет;</li>
	<LI>Минимальная сумма кредита &ndash; от 350 000 руб;</li>
</p>
<li> <a href=" http://www.deltacredit.ru/program/deltarub/" class="hrf7" target="_blank"> Подробнее.....</a></li>
</UL>

<!-- END -->
</div>