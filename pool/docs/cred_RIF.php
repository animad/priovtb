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
Прио-Внешторгбанк является  партнером  некоммерческой организации &laquo;Рязанский ипотечный фонд&raquo; и выдает ипотечные кредиты для покупки жилья на вторичном рынке г. Рязани по условиям "Рязанского ипотечного фонда". 
<br/>
<br/>


<li> <a href=" http://www.rzn-ipoteka.ru/" class="hrf7" target="_blank"> Подробнее.....</a></li>



<br/>
<!-- END -->
</div>