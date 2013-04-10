<?php
	$j1=0;
	
	function rclr($j1){ return ' class="'.($j1%2?'odd':'even').'"'; }
?>

<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("about",0,"<?=$_GET['dr'];?>");</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title -->
<script type="text/javascript">
	if(current_page!=null && typeof(current_page.title_p)!="undefined"){ tp=current_page.title_p+"<br />"; }else{ tp=""; }
	if(current_page!=null && typeof(current_page.title)!="undefined"){
		document.writeln("<h1>"+tp+current_page.title+"</h1>");
	}
</script>
<!-- END page title -->

<!-- BEGIN -->

<h2>Школа №45 (учитель Жарикова Вера Михайловна)</h2>
<table border="0" cellspacing="1" cellpadding="5" class="table4" width="100%">
	<tr class="header">
		<td width="40">№№</td>
		<td>ФИО</td>
		<td width="70">возраст</td>
		<td width="200">название работы</td>
	</tr>
	<tr<?=rclr($j1++);?>><td align="center">1</td><td>Аввакумова Катя</td><td>10 лет</td><td>Солнечный городок</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">2</td><td>Жеглов Егор</td><td>9 лет</td><td>Автодром для малышей</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">3</td><td>Кротенко Кристина</td><td>9 лет</td><td>Площадь "Три медведя"</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">4</td><td>Абашин Андрей</td><td>9 лет</td><td>Звери Африки</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">5</td><td>Юровский Дима</td><td>11 лет</td><td>Космос</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">6</td><td>Васильев Саша</td><td>11 лет</td><td>Город-Крепость</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">7</td><td>Кошелева Ира</td><td>11 лет</td><td>Детская площадка</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">8</td><td>Новикова Настя</td><td>11 лет</td><td>Египетская тематика</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">9</td><td>Лисенкова Мария</td><td>13 лет</td><td>Цветочный городок</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">10</td><td>Белокурова Юля</td><td>13 лет</td><td>Игровая площадка</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">11</td><td>Артамкина Вика</td><td>13 лет</td><td>Матрешкин домик</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">12</td><td>Авдакова Лера</td><td>13 лет</td><td>Морская площадка</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">13</td><td>Пищулина Ксения</td><td>13 лет</td><td>Корабль</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">14</td><td>Ларькина Анна</td><td>13 лет</td><td>Цветочный городок</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">15</td><td>Синицын Миша</td><td>13 лет</td><td>Детская площадка</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">16</td><td>Цуркан Юлия</td><td>14 лет</td><td>космос</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">17</td><td>Заколюкин Максим</td><td>14 лет</td><td>Три избушки</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">18</td><td>Опалева Рита</td><td>14 лет</td><td>Цветочный городок</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">19</td><td>Ермолаева Света</td><td>13 лет</td><td>Ледяной городок</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">20</td><td>Кандыба Алексей</td><td>14 лет</td><td>Космоленд</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">21</td><td>Зимина Рита</td><td>14 лет</td><td>Рыбки</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">22</td><td>Воловиченко Алена</td><td>14 лет</td><td>Кошкин дома</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">23</td><td>Гаврилов Александр</td><td>12 лет</td><td>Необычный городок</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">24</td><td>Елисеев Артем</td><td>12 лет</td><td>Город-крепость</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">25</td><td>Иванеева Таня</td><td>12 лет</td><td>Грибки</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">26</td><td>Орешкина Ира</td><td>12 лет</td><td>Игровая площадка</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">27</td><td>Мушкудиани Нино</td><td>12 лет</td><td>Городок детства</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">28</td><td>Коропетян Армене</td><td>13 лет</td><td>Детская площадка</td></tr>
</table>
<br />
<h2>ЦДТ "Октябрьский" (педагог Айсубанова А.Т.)<br />ИЗО студия "Солнышко"</h2>
<table border="0" cellspacing="1" cellpadding="5" class="table4" width="100%">
	<tr class="header">
		<td width="40">№№</td>
		<td>ФИО</td>
		<td width="70">возраст</td>
		<td width="200">название работы</td>
	</tr>
	<tr<?=rclr($j1++);?>><td align="center">29</td><td>Балакирева Аня</td><td>7 лет</td><td>Город Детства</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">30</td><td>Смирнова Яна</td><td>6 лет</td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">31</td><td>Фролова Яна</td><td>10 лет</td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">32</td><td>Дронов Глеб</td><td>9 лет</td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">33</td><td>Дронова Юлия</td><td>9 лет</td><td></td></tr>
</table>
<br />
<h2>Дизайн-студия "Каскад" ДДТ (Семакова Наталья)</h2>
<table border="0" cellspacing="1" cellpadding="5" class="table4" width="100%">
	<tr class="header">
		<td width="40">№№</td>
		<td>ФИО</td>
		<td width="70">возраст</td>
		<td width="200">название работы</td>
	</tr>
	<tr<?=rclr($j1++);?>><td align="center">35</td><td>Колесникова Ирина</td><td>7 класс</td><td>Прошлый век</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">36</td><td>Борисова Юлия</td><td>7 класс</td><td>Необитаемый остров</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">37</td><td>Рубцова Юлия</td><td>7 класс</td><td>Пиратские острова</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">38</td><td>Дорофеев Дмитрий</td><td>7 класс</td><td>Ледниковый период</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">39</td><td>Коняхина Татьяна</td><td>8 класс</td><td>Остров Сокровищ</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">40</td><td>Горнов Артем</td><td>14 лет</td><td>Фантастика</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">41</td><td>Маслова Ульяна</td><td>16 лет</td><td>Коридоры времени</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">42</td><td>Ивлева Оксана</td><td>16 лет</td><td>Египет</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">43</td><td>Юрченков Руслан</td><td>8 класс</td><td>Русская сказка</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">44</td><td>Санталов Станислав</td><td>17 лет</td><td>Средневековье</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">45</td><td>Ковальская Кристина</td><td>7 класс</td><td>В мире животных</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">46</td><td>Пискова Валерия</td><td>13 лет</td><td>Город Детства</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">47</td><td>Ягодкина Лена</td><td></td><td>"Космос"</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">48</td><td>Барсук Татьяна Анатольевна (худ.)</td><td></td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">49</td><td>Семакова Наталья Ивановна (препод.)</td><td>Преподав.</td><td>Две работы</td></tr>
</table>
<br />
<h2>Школа №13 (Родионова И.О.)</h2>
<table border="0" cellspacing="1" cellpadding="5" class="table4" width="100%">
	<tr class="header">
		<td width="40">№№</td>
		<td>ФИО</td>
		<td width="70">возраст</td>
		<td width="200">название работы</td>
	</tr>
	<tr<?=rclr($j1++);?>><td align="center">50</td><td>Мамедова Карина</td><td>6 класс</td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">51</td><td>Тевяшова Дарья</td><td>10 класс</td><td></td></tr>
</table>


<!-- END -->
</div>