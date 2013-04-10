<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
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
		document.title=document.title+" | "+(current_page!=null && typeof(current_page.title_p)!="undefined"?current_page.title_p+", ":"")+current_page.title;
	}
</script>
<!-- END page title -->

<!-- BEGIN -->

<p>На 1 января 2004 г. активы банка составили 1614,5 млн.руб., или выросли за год на 343,5 млн.руб. (на 27%).</p>
<p>Капитал банка на 1.01.04г. составил 175,1 млн.руб., или вырос по сравнению с 1.01.03г. на 19,5 млн.руб. или на 12,5%.</p>
<p>Размер уставного фонда в капитале составил 35 млн.руб., резервного фонда - 5,25 млн.руб. или 15% к уставному капиталу, что полностью соответствует требованиям Центрального банка и Устава банка.</p>
<p>Прибыль банка за 2003 год получена в сумме  22,2 млн.руб. Рентабельность собственного капитала (отношение прибыли к капиталу) составила 12,7%, рентабельность активов (прибыль, отнесенная к сумме активов) - 1,15%.</p>
<p>Средства на расчетных счетах клиентов - юридических лиц составили на 1.01.04г. 498 млн.руб., или увеличились на 27 млн.руб. (на 5,7%).</p>
<p>Вклады граждан составили на 1.01.04г. 691,2 млн.руб., или выросли за год на 231 млн.руб. (в 1,5 раза).</p>
<p>Чистая ссудная и приравненная к ней задолженность составила 1206 млн.руб, или выросла на 364 млн.руб. ( на 43%).</p>
<p>На 1.01.04г. вложения в ценные бумаги, акции и участие составили 22,4 млн.руб.</p>
<p>Обязательные резервы в Центральном Банке составили 108,3 млн.руб, или увеличились за год на 16,3 млн.руб. (на 17,7%).</p>

<h1>ОТЧЕТ О ПРИБЫЛЯХ И УБЫТКАХ ЗА 2003 ГОД</h1>

<table border="0" cellspacing="1" cellpadding="5" class="table5">
 <tr class="header">
 <td WIDTH="7%">&nbsp;</td>
 <td class=small WIDTH="80%" valign="middle"><div style=margin:3>Проценты полученные и аналогичные доходы от:</div></td>
 <td class=small WIDTH="12%" valign="middle">тыс. руб.</td>
 </tr>
<TR>
<TD align="center" valign=top>
1.</TD>
<TD>Размещения средств в банках в виде кредитов, депозитов, займов и на счетах в других банках</TD>
<td align=right bgcolor=#eeeeee>4 392</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
2.</TD>
<TD bgcolor=#eeeeee>Ссуд, предоставленных другим клиентам</TD>
<td align=right bgcolor=#cccccc>174 830</TD>
</TR> 
<TR>
<TD align="center" valign=top>
3.</TD>
<TD>Средств, переданных в лизинг</TD>
<td align=right bgcolor=#eeeeee>0</TD>
</TR>  
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
4.</TD>
<TD bgcolor=#eeeeee>Ценных бумаг с фиксированным доходом</TD>
<td align=right bgcolor=#cccccc>4 374</TD>
</TR> 
<TR>
<TD align="center" valign=top>
5.</TD>
<TD>Других источников</TD>
<td align=right bgcolor=#eeeeee>630</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
6.</TD>
<TD bgcolor=#eeeeee>Итого проценты полученные и аналогичные доходы: (ст.1 + 2 + 3 + 4 + 5)</TD>
<td align=right bgcolor=#cccccc>184 226</TD>
</TR>
<tr class="header">
 <td class=small >&nbsp;</td>
 <td class=small valign="middle" ><div style=margin:3>Проценты уплаченные и аналогичные расходы по:</div></td>
 <td class=small valign="middle" >тыс. руб.</td>
 </tr>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
7.</TD>
<TD bgcolor=#eeeeee>Привлеченным средствам банков, включая займы и депозиты</TD>
<td align=right bgcolor=#cccccc>6 281</TD>
</TR>
<TR>
<TD align="center" valign=top>
8.</TD>
<TD>Привлеченным средствам других клиентов, включая займы и депозиты</TD>
<td align=right bgcolor=#eeeeee>60 123</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
9.</TD>
<TD bgcolor=#eeeeee>Выпущенным долговым ценным бумагам</TD>
<td align=right bgcolor=#cccccc>1 697</TD>
</TR>
<TR>
<TD align="center" valign=top>
10.</TD>
<TD>Арендной плате</TD>
<td align=right bgcolor=#eeeeee>54 666</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
11.</TD>
<TD bgcolor=#eeeeee>Итого проценты уплаченные и аналогичные расходы: (ст.7 + 8 + 9 + 10)</TD>
<td align=right bgcolor=#cccccc>122 767</TD>
</TR>
<TR>
<TD align="center" valign=top>
12.</TD>
<TD>Чистые процентные и аналогичные доходы (ст.6 - ст.11)</TD>
<td align=right bgcolor=#eeeeee>61 459</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
13.</TD>
<TD bgcolor=#eeeeee>Комиссионные доходы</TD>
<td align=right bgcolor=#cccccc>33 419</TD>
</TR>
<TR>
<TD align="center" valign=top>
14.</TD>
<TD>Комиссионные расходы</TD>
<td align=right bgcolor=#eeeeee>163</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
15.</TD>
<TD bgcolor=#eeeeee>Чистый комиссионный доход (ст.13 - ст.14)</TD>
<td align=right bgcolor=#cccccc>33 256</TD>
</TR>
<tr class="header">
 <td class=small valign="middle" >&nbsp;</td>
 <td class=small valign="middle" ><div style=margin:3>Прочие операционные доходы:</div></td>
 <td class=small valign="middle" >тыс. руб.</td>
 </tr>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
16.</TD>
<TD bgcolor=#eeeeee>Доходы от операций с иностранной валютой и с другими валютными ценностями, включая курсовые разницы</TD>
<td align=right bgcolor=#cccccc>124 226</TD>
</TR>
<TR>
<TD align="center" valign=top>
17.</TD>
<TD>Доходы от  операций по купле-продаже драгоценных металлов, ценных бумаг и другого имущества, положительные результаты переоценки драгоценных металлов, ценных бумаг и другого имущества</TD>
<td align=right bgcolor=#eeeeee>5 361</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
18.</TD>
<TD bgcolor=#eeeeee>Доходы, полученные в форме дивидендов</TD>
<td align=right bgcolor=#cccccc>0</TD>
</TR>
<TR>
<TD align="center" valign=top>
19.</TD>
<TD>Другие текущие доходы</TD>
<td align=right bgcolor=#eeeeee>258</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
20.</TD>
<TD bgcolor=#eeeeee>Итого прочие операционные доходы: (ст.16 + 17 + 18 + 19)</TD>
<td align=right bgcolor=#cccccc>129 845</TD>
</TR>
<TR>
<TD align="center" valign=top>
21.</TD>
<TD>Текущие доходы (ст.12 + 15 + 20)</TD>
<td align=right bgcolor=#eeeeee>224 560</TD>
</TR>
<tr class="header">
 <td class=small valign="middle" >&nbsp</td>
 <td class=small valign="middle" ><div style=margin:3>Прочие операционные расходы:</div></td>
 <td class=small valign="middle" >тыс. руб.</td>
 </tr>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
22.</TD>
<TD bgcolor=#eeeeee>Расходы по оплате труда</TD>
<td align=right bgcolor=#cccccc>61 594</TD>
</TR>
<TR>
<TD align="center" valign=top>
23.</TD>
<TD>Эксплуатационные расходы</TD>
<td align=right bgcolor=#eeeeee>33 684</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
24.</TD>
<TD bgcolor=#eeeeee>Расходы от операций с иностранной валютой и другими валютными ценностями, включая курсовые разницы</TD>
<td align=right bgcolor=#cccccc>108 178</TD>
</TR>
<TR>
<TD align="center" valign=top>
25.</TD>
<TD>Расходы от операций по купле-продаже драгоценных металлов, ценных бумаг и другого имущества, операций РЕПО, отрицательные результаты переоценки драгоценных металлов, ценных бумаг</TD>
<td align=right bgcolor=#eeeeee>1 724</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
26.</TD>
<TD bgcolor=#eeeeee>Другие текущие расходы</TD>
<td align=right bgcolor=#cccccc>6 806</TD>
</TR>
<TR>
<TD align="center" valign=top>
27.</TD>
<TD>Всего прочих операционных расходов: (ст.22 + 23 + 24 + 25 + 26)</TD>
<td align=right bgcolor=#eeeeee>211 986</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
28.</TD>
<TD bgcolor=#eeeeee>Чистые текущие доходы до формирования резервов и без учета непредвиденных доходов: (ст.21 - ст.27)</TD>
<td align=right bgcolor=#cccccc>12 574</TD>
</TR>
<TR>
<TD align="center" valign=top>
29.</TD>
<TD>Изменение величины резервов на возможные потери по ссудам</TD>
<td align=right bgcolor=#eeeeee>-12 536</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
30.</TD>
<TD bgcolor=#eeeeee>Изменение величины резервов под обесценение ценных бумаг</TD>
<td align=right bgcolor=#cccccc>0</TD>
</TR>
<TR>
<TD align="center" valign=top>
31.</TD>
<TD>Изменение величины прочих резервов</TD>
<td align=right bgcolor=#eeeeee>2 899</TD>
</TR> 
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
32.</TD>
<TD bgcolor=#eeeeee>Текущие доходы без учета непредвиденных доходов (ст.28 - 29 - 30 - 31)</TD>
<td align=right bgcolor=#cccccc>22 211</TD>
</TR>  
<TR>
<TD align="center" valign=top>
33.</TD>
<TD>Непредвиденные доходы за вычетом непредвиденных расходов</TD>
<td align=right bgcolor=#eeeeee>0</TD>
</TR>   
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
34.</TD>
<TD bgcolor=#eeeeee>Доход без учета непредвиденных расходов после налогообложения: (ст.32 + ст.33)</TD>
<td align=right bgcolor=#cccccc>22 211</TD>
</TR>  
<TR>
<TD align="center" valign=top>
35.</TD>
<TD>Налог на прибыль</TD>
<td align=right bgcolor=#eeeeee>4 189</TD>
</TR>  
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
36.</TD>
<TD bgcolor=#eeeeee>Отсроченный налог на прибыль</TD>
<TD align=right bgcolor=#cccccc>0</TD>
</TR>  
<TR>
<TD align="center" valign=top>
36а.</TD>
<TD>Непредвиденные расходы  после налогообложения</TD>
<td align=right bgcolor=#eeeeee>0</TD>
</TR>   
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
37.</TD>
<TD bgcolor=#eeeeee>Прибыль (убыток) за отчетный период: (ст.34 - ст.36 - ст.36а)</TD>
<td align=right bgcolor=#cccccc>22 211</TD>
</TR>  
</TABLE>

<h1>БАЛАНС НА 1 ЯНВАРЯ 2004 ГОДА</h1>

<table border="0" cellspacing="1" cellpadding="5" class="table5">
<tr class="header">
 <td WIDTH="7%">&nbsp;</td>
 <td class=small WIDTH="80%" valign="middle"><div style=margin:3;>Активы</td>
 <td class=small WIDTH="12%" valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>
1.</TD>
<TD bgcolor=#eeeeee>Денежные  средства и счета в Центральном банке РФ</TD>
<TD valign="top" align=right bgcolor=#cccccc>213 147</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>2.</TD>
<TD valign="top">Обязательные резервы в Центральном банке РФ  </TD>
<TD valign="top" align=right bgcolor=#eeeeee>108 337</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>3.</TD>
<TD valign="top" bgcolor=#eeeeee>Средства в кредитных организациях за вычетом резервов (ст.3.1.-ст.3.2.)</TD>
<TD valign="top" align=right bgcolor=#cccccc>15 355</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>3.1.</TD>
<TD valign="top" bgcolor=#eeeeee>Средства в кредитных организациях</TD>
<TD valign="top" align=right bgcolor=#cccccc>15 510</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>3.2.</TD>
<TD valign="top" bgcolor=#eeeeee>Резервы на возможные потери</TD>
<TD valign="top" align=right bgcolor=#cccccc>155</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>4.</TD>
<TD valign="top">Чистые вложения в ценные бумаги для перепродажи (ст.4.1-ст.4.2)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>21 595</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>4.1</TD>
<TD valign="top" bgcolor=#eeeeee>Ценные бумаги для перепродажи (балансовая стоимость)</TD>
<TD valign="top" align=right bgcolor=#cccccc>21 595</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>4.2</TD>
<TD valign="top">Резерв под обесценение ценных бумаг</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>5.</TD>
<TD valign="top" bgcolor=#eeeeee>Ссудная и приравненная к ней задолженность </TD>
<TD valign="top" align=right bgcolor=#cccccc>1 304 126</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>6.</TD>
<TD valign="top">Резервы на возможные потери по ссудам</TD>
<TD valign="top" bgcolor=#eeeeee align=right>97 933</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>7.</TD>
<TD valign="top" bgcolor=#eeeeee>Чистая ссудная задолженность (ст.5-ст.6)</TD>
<TD valign="top" align=right bgcolor=#cccccc>1 206 193</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>8.</TD>
<TD valign="top">Проценты начисленные ( включая просроченные )</TD>
<TD valign="top" bgcolor=#eeeeee align=right>6 019</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>9.</TD>
<TD valign="top" bgcolor=#eeeeee>Чистые вложения в инвестиционные ценные бумаги , удерживаемые до погашения ( ст.9.1-ст.9.2)</TD>
<TD valign="top" align=right bgcolor=#cccccc>19</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>9.1.</TD>
<TD valign="top" bgcolor=#eeeeee>Вложения в инвестиционные ценные бумаги, удерживаемые до погашения</TD>
<TD valign="top" align=right bgcolor=#cccccc>19</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>9.2.</TD>
<TD valign="top" bgcolor=#eeeeee>Резервы на возможные потери</TD>
<TD valign="top" align=right bgcolor=#cccccc>0</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>10.</TD>
<TD valign="top">Основные средства и нематериальные активы, хозяйственные материалы и малоценные и быстроизнашивающиеся предметы</TD>
<TD valign="top" bgcolor=#eeeeee align=right>35 705</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>11.</TD>
<TD valign="top" bgcolor=#eeeeee>Чистые долгосрочные вложения в ценные бумаги и доли (ст.11.1-ст.11.2)</TD>
<TD valign="top" align=right bgcolor=#cccccc>814</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>11.1</TD>
<TD valign="top">Ценные бумаги , имеющиеся в наличии для продажи </TD>
<TD valign="top" bgcolor=#eeeeee align=right>833</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>11.2</TD>
<TD valign="top" bgcolor=#eeeeee>Резерв под обесценение ценных бумаг и долей</TD>
<TD valign="top" align=right bgcolor=#cccccc>19</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>12</TD>
<TD valign="top">Расходы будущих периодов по другим операциям</TD>
<TD valign="top" bgcolor=#eeeeee align=right>1 396</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>13</TD>
<TD valign="top" bgcolor=#eeeeee>Прочие активы за вычетом резервов</TD>
<TD valign="top" align=right bgcolor=#cccccc>5 890</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>13.1</TD>
<TD valign="top" bgcolor=#eeeeee>Прочие активы</TD>
<TD valign="top" align=right bgcolor=#cccccc>6 899</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>13.2</TD>
<TD valign="top" bgcolor=#eeeeee>Резервы на возможные потери</TD>
<TD valign="top" align=right bgcolor=#cccccc>1 009</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>14</TD>
<TD valign="top">Всего активов: (ст1+2+3+4+5а+6+8+9+10+11+12+13)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>1 614 470</TD>
</TR>
<tr class="header">
 <td>&nbsp;</td>
 <td class=small valign="middle"><div style=margin:3;>Пассивы</td>
 <td class=small valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>15</TD>
<TD valign="top" bgcolor=#eeeeee>Кредиты,  полученные банками от Центрального банка РФ</TD>
<TD valign="top" align=right bgcolor=#cccccc>0</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>16.</TD>
<TD valign="top">Средства кредитных организаций</TD>
<TD valign="top" bgcolor=#eeeeee align=right>30 644</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>17.</TD>
<TD valign="top" bgcolor=#eeeeee>Средства клиентов </TD>
<TD valign="top" align=right bgcolor=#cccccc>1 378 500</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>17.1</TD>
<TD valign="top">В том числе вклады физических лиц  </TD>
<TD valign="top" align=right bgcolor=#cccccc>691 243</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>18.</TD>
<TD valign="top">Доходы будущих периодов по другим операциям</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>19.</TD>
<TD valign="top" bgcolor=#eeeeee>Выпущенные долговые обязательства</TD>
<TD valign="top" align=right bgcolor=#cccccc>29 854</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>20.</TD>
<TD valign="top">Прочие обязательства</TD>
<TD valign="top" bgcolor=#eeeeee align=right>5 855</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>21.</TD>
<TD valign="top" bgcolor=#eeeeee>Резервы на возможные потери по расчетам с дебиторами, риски и обязательства</TD>
<TD valign="top" align=right bgcolor=#cccccc>3 854</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>22.</TD>
<TD valign="top">Всего обязательств: (ст.15+16+17+18+19+20+21)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>1 448 727</TD>
</TR>
<tr class="header">
 <td >&nbsp;</td>
 <td class=small valign="middle"><div style=margin:3;>Собственные средства</td>
 <td class=small valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>23.</TD>
<TD valign="top" bgcolor=#eeeeee>Уставный капитал - (Средства акционеров (участников)), в т.ч.:</TD>
<TD valign="top" align=right bgcolor=#cccccc>34 965</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>23.1</TD>
<TD valign="top">Зарегистрированные обыкновенные акции и доли</TD>
<TD valign="top"  bgcolor=#eeeeee align=right>34 950</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>23.2</TD>
<TD valign="top" bgcolor=#eeeeee>Зарегистрированные привилегированные акции</TD>
<TD valign="top" align=right bgcolor=#cccccc>15</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>23.3</TD>
<TD valign="top">Незарегистрированный уставный капитал неакционерных банков</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>24.</TD>
<TD valign="top" bgcolor=#eeeeee>Собственные акции, выкупленные у акционеров (участников)</TD>
<TD valign="top" align=right bgcolor=#cccccc>0</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>25.</TD>
<TD valign="top">Эмиссионный доход</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>26.</TD>
<TD valign="top" bgcolor=#eeeeee>Фонды и прибыль, оставленная в распоряжении кредитной организации, разница между уставным капиталом  кредитной организации и ее собственными средствами (капиталом)</TD>
<TD valign="top" align=right bgcolor=#cccccc>113 097</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>27.</TD>
<TD valign="top">Переоценка основных средств</TD>
<TD valign="top" bgcolor=#eeeeee align=right>12 820</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>28.</TD>
<TD valign="top" bgcolor=#eeeeee>Прибыль (убыток) за отчетный  период</TD>
<TD valign="top" align=right bgcolor=#cccccc>22 211</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>29.</TD>
<TD valign="top">Дивиденды, начисленные из прибыли отчетного года</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>30.</TD>
<TD valign="top" bgcolor=#eeeeee>Распределенная прибыль (исключая дивиденды)</TD>
<TD valign="top" align=right bgcolor=#cccccc>4 189</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>31.</TD>
<TD valign="top">Нераспределенная прибыль ((ст.28-ст.29-ст.30)*)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>18 022</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>32.</TD>
<TD valign="top" bgcolor=#eeeeee>Расходы и риски,  влияющие на собственные средства</TD>
<TD valign="top" align=right bgcolor=#cccccc>13 161</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>33.</TD>
<TD valign="top">Всего собственных средств: (ст.23-23.3-24+25+26+27+31-32 - для прибыльных кредитных организаций), (ст. 23-23.3-24+25+26+27+28-32 - для убыточных кредитных организаций)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>165 743</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>34.</TD>
<TD valign="top" bgcolor=#eeeeee>Всего пассивов: (ст.22+23.3+33)</TD>
<TD valign="top" align=right bgcolor=#cccccc>1 614 470</TD>
</TR>
<tr class="header">
 <td>&nbsp;</td>
 <td class=small valign="middle"><div style=margin:3;>Внебалансовые обязательства</td>
 <td class=small valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>35.</TD>
<TD valign="top" bgcolor=#eeeeee>Безотзывные обязательства кредитной организации</TD>
<TD valign="top" align=right bgcolor=#cccccc>230 644</TD>
</tr>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>36.</TD>
<TD valign="top">Гарантии, выданные кредитной организацией</TD>
<TD valign="top" bgcolor=#eeeeee align=right>40 831</TD>
</TR>
</TABLE>
</td></tr>
</TABLE>



<!-- END -->
</div>