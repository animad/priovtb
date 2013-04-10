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

<ol >
	<li ><h2>Строительная компания ООО "Северная Компания"</h2></li>
<p>объект - многоквартирный дом, расположенный на пересечении Ул.Свободы  и  ул.Подгорная</p>
<br>
	<li><h2>Строительная компания ООО "Рязанская компания СТРОЙ" </h2></li>
<p>объект - 1 и 2 очереди строительства многоэтажного жилого дома с нежилыми помещениями, расположенного по адресу: г.Рязань, район Кальное, ул. Быстрецкая (Советский район)</p>
<br>
	<li><h2>Группа компаний "ЕДИНСТВО"</h2></li>
<p>объект - многоквартирный дом с нежилыми помещениями, расположенный по адресу город Рязань, улица Октябрьская, дом 65 (1 и 2 очереди строительства) "Приокский Парк"</p>
<p>объект - Жилой дом с торгово-офисными помещениями, расположенный по адресу: г.Рязань, ул.Новоселов, дом 40а</p>
<br>
	<li><h2>Группа компаний "Зеленый Сад"</h2></li>
<p>объект -  жилой комплекс "ЕСЕНИНСКИЙ". Многоквартирный жилой дом с объектами обслуживания, расположенный по адресу: г. Рязань, ул. Есенина-Быстрецкой (адрес строительный)</p>
	
</ol>

<!-- END -->
</div>