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

<p>На 1 января 2002 года активы банка составили 940 млн.руб., или выросли за год на 288 млн. руб. (на 44%).</p>
<p>Капитал банка на 1.01.2002 года - 129 млн. руб., или возрос по сравнению с 1.01.2001 г. на 5 млн. руб., или на 4,0%.</p>
<p>Размер Уставного фонда  в составе капитала составил 10,5 млн. руб., резервного фонда - 1,575 млн. руб., или 15% к уставному капиталу, что полностью соответствует нормативным требованиям  Банка России  и Устава банка.</p>
<p>Прибыль за 2001 год  получена в размере 8,3 млн. руб. Рентабельность собственного капитала (отношение прибыли к капиталу) составила 6,4%, рентабельность активов ( прибыль,  отнесенная  к сумме активов) составила 0,88%.</p>
<p>Средства на расчетных счетах клиентов-юридических лиц составили  на 1.01.2002г. 409 млн. руб., или увеличились на 164 млн. руб.(на 66,9%).</p>
<p>Вклады граждан  составили на 1.01.2002 года 261 млн. руб., или возросли за год на 106 млн. руб. (на 68,4 %).</p>
<p>Чистая ссудная задолженность составила 586 млн. руб., или возросла на 261 млн. руб. (на 80,3%).</p>
<p>На 1.01.2002 вложения в государственные ценные бумаги составили  3,4 млн. руб.</p>
<p>Обязательные резервы в Центральном банке составили 63 млн. руб., или увеличились на 23 млн. руб. (на 57,5%).</p>
<p>В течение  2001 года обязательные экономические нормативы деятельности банка на отчетные даты  выполнялись.</p>

<h1>ОТЧЕТ О ПРИБЫЛЯХ И УБЫТКАХ ЗА 2001 ГОД</h1>

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
<td align=right bgcolor=#eeeeee>5 106</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
2.</TD>
<TD bgcolor=#eeeeee>Ссуд, предоставленных другим клиентам</TD>
<td align=right bgcolor=#cccccc>95 440</TD>
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
<td align=right bgcolor=#cccccc>3 607</TD>
</TR> 
<TR>
<TD align="center" valign=top>
5.</TD>
<TD>Других источников</TD>
<td align=right bgcolor=#eeeeee>288</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
6.</TD>
<TD bgcolor=#eeeeee>Итого проценты полученные и аналогичные доходы: (ст.1 + 2 + 3 + 4 + 5)</TD>
<td align=right bgcolor=#cccccc>104 441</TD>
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
<td align=right bgcolor=#cccccc>9 200</TD>
</TR>
<TR>
<TD align="center" valign=top>
8.</TD>
<TD>Привлеченным средствам других клиентов, включая займы и депозиты</TD>
<td align=right bgcolor=#eeeeee>22 140</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
9.</TD>
<TD bgcolor=#eeeeee>Выпущенным долговым ценным бумагам</TD>
<td align=right bgcolor=#cccccc>4 073</TD>
</TR>
<TR>
<TD align="center" valign=top>
10.</TD>
<TD>Арендной плате</TD>
<td align=right bgcolor=#eeeeee>6 915</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
11.</TD>
<TD bgcolor=#eeeeee>Итого проценты уплаченные и аналогичные расходы: (ст.7 + 8 + 9 + 10)</TD>
<td align=right bgcolor=#cccccc>42 328</TD>
</TR>
<TR>
<TD align="center" valign=top>
12.</TD>
<TD>Чистые процентные и аналогичные доходы (ст.6 - ст.11)</TD>
<td align=right bgcolor=#eeeeee>62 113</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
13.</TD>
<TD bgcolor=#eeeeee>Комиссионные доходы</TD>
<td align=right bgcolor=#cccccc>16 791</TD>
</TR>
<TR>
<TD align="center" valign=top>
14.</TD>
<TD>Комиссионные расходы</TD>
<td align=right bgcolor=#eeeeee>229</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
15.</TD>
<TD bgcolor=#eeeeee>Чистый комиссионный доход (ст.13 - ст.14)</TD>
<td align=right bgcolor=#cccccc>16 562</TD>
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
<td align=right bgcolor=#cccccc>85 776</TD>
</TR>
<TR>
<TD align="center" valign=top>
17.</TD>
<TD>Доходы от  операций по купле-продаже драгоценных металлов, ценных бумаг и другого имущества, положительные результаты переоценки драгоценных металлов, ценных бумаг и другого имущества</TD>
<td align=right bgcolor=#eeeeee>14 682</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
18.</TD>
<TD bgcolor=#eeeeee>Доходы, полученные в форме дивидендов</TD>
<td align=right bgcolor=#cccccc>2</TD>
</TR>
<TR>
<TD align="center" valign=top>
19.</TD>
<TD>Другие текущие доходы</TD>
<td align=right bgcolor=#eeeeee>129</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
20.</TD>
<TD bgcolor=#eeeeee>Итого прочие операционные доходы: (ст.16 + 17 + 18 + 19)</TD>
<td align=right bgcolor=#cccccc>100 589</TD>
</TR>
<TR>
<TD align="center" valign=top>
21.</TD>
<TD>Текущие доходы (ст.12 + 15 + 20)</TD>
<td align=right bgcolor=#eeeeee>179 264</TD>
</TR>
<tr class="header">
 <td class=small valign="middle" >&nbsp;</td>
 <td class=small valign="middle" ><div style=margin:3>Прочие операционные расходы:</div></td>
 <td class=small valign="middle" >тыс. руб.</td>
 </tr>

<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
22.</TD>
<TD bgcolor=#eeeeee>Расходы по оплате труда</TD>
<td align=right bgcolor=#cccccc>30 480</TD>
</TR>
<TR>
<TD align="center" valign=top>
23.</TD>
<TD>Эксплуатационные расходы</TD>
<td align=right bgcolor=#eeeeee>18 215</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
24.</TD>
<TD bgcolor=#eeeeee>Расходы от операций с иностранной валютой и другими валютными ценностями, включая курсовые разницы</TD>
<td align=right bgcolor=#cccccc>68 504</TD>
</TR>
<TR>
<TD align="center" valign=top>
25.</TD>
<TD>Расходы от операций по купле-продаже драгоценных металлов, ценных бумаг и другого имущества, операций РЕПО, отрицательные результаты переоценки драгоценных металлов, ценных бумаг</TD>
<td align=right bgcolor=#eeeeee>4 466</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
26.</TD>
<TD bgcolor=#eeeeee>Другие текущие расходы</TD>
<td align=right bgcolor=#cccccc>5 838</TD>
</TR>
<TR>
<TD align="center" valign=top>
27.</TD>
<TD>Всего прочих операционных расходов: (ст.22 + 23 + 24 + 25 + 26)</TD>
<td align=right bgcolor=#eeeeee>127 503</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
28.</TD>
<TD bgcolor=#eeeeee>Чистые текущие доходы до формирования резервов и без учета непредвиденных доходов: (ст.21 - ст.27)</TD>
<td align=right bgcolor=#cccccc>51 761</TD>
</TR>
<TR>
<TD align="center" valign=top>
29.</TD>
<TD>Изменение величины резервов на возможные потери по ссудам</TD>
<td align=right bgcolor=#eeeeee>44 553</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
30.</TD>
<TD bgcolor=#eeeeee>Изменение величины резервов под обесценение ценных бумаг</TD>
<td align=right bgcolor=#cccccc>-1 495</TD>
</TR>
<TR>
<TD align="center" valign=top>
31.</TD>
<TD>Изменение величины прочих резервов</TD>
<td align=right bgcolor=#eeeeee>360</TD>
</TR> 
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
32.</TD>
<TD bgcolor=#eeeeee>Текущие доходы без учета непредвиденных доходов (ст.28 - 29 - 30 - 31)</TD>
<td align=right bgcolor=#cccccc>8 343</TD>
</TR>  
<TR>
<TD align="center" valign=top>
33.</TD>
<TD>Непредвиденные доходы за вычетом непредвиденных расходов</TD>
<td align=right bgcolor=#eeeeee>X</TD>
</TR>   
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
34.</TD>
<TD bgcolor=#eeeeee>Доход без учета непредвиденных расходов после налогообложения: (ст.32 + ст.33)</TD>
<td align=right bgcolor=#cccccc>8 343</TD>
</TR>  
<TR>
<TD align="center" valign=top>
35.</TD>
<TD>Налог на прибыль</TD>
<td align=right bgcolor=#eeeeee>915</TD>
</TR>  
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
36.</TD>
<TD bgcolor=#eeeeee>Отсроченный налог на прибыль</TD>
<TD align=right bgcolor=#cccccc>Х</TD>
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
<td align=right bgcolor=#cccccc>8 343</TD>
</TR>  
</TABLE>

<h1>БАЛАНС НА 1 ЯНВАРЯ 2002 ГОДА</h1>

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
<TD valign="top" align=right bgcolor=#cccccc>201 989</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>2.</TD>
<TD valign="top">Государственные долговые обязательства </TD>
<TD valign="top" align=right bgcolor=#eeeeee>3 424</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>3.</TD>
<TD valign="top" bgcolor=#eeeeee>Средства в кредитных организациях</TD>
<TD valign="top" align=right bgcolor=#cccccc>89 136</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>4.</TD>
<TD valign="top">Чистые вложения в ценные бумаги для перепродажи (ст.4.1-ст.4.2)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>4.1</TD>
<TD valign="top" bgcolor=#eeeeee>Ценные бумаги для перепродажи (балансовая стоимость)</TD>
<TD valign="top" align=right bgcolor=#cccccc>0</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>4.2</TD>
<TD valign="top">Резерв под обесценение ценных бумаг</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>5.</TD>
<TD valign="top" bgcolor=#eeeeee>Ссудная и приравненная к ней задолженность </TD>
<TD valign="top" align=right bgcolor=#cccccc>723 518</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>6.</TD>
<TD valign="top">Проценты начисленные (включая просроченные)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>6 793</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>7.</TD>
<TD valign="top" bgcolor=#eeeeee>Средства,  переданные в лизинг</TD>
<TD valign="top" align=right bgcolor=#cccccc>0</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>8.</TD>
<TD valign="top">Резервы на возможные потери</TD>
<TD valign="top" bgcolor=#eeeeee align=right>137 587</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>9.</TD>
<TD valign="top" bgcolor=#eeeeee>Чистая ссудная задолженность (ст.5-ст.7)</TD>
<TD valign="top" align=right bgcolor=#cccccc>585 931</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>10.</TD>
<TD valign="top">Основные средства и нематериальные активы, хозяйственные материалы и малоценные и быстроизнашивающиеся предметы</TD>
<TD valign="top" bgcolor=#eeeeee align=right>35 546</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>11.</TD>
<TD valign="top" bgcolor=#eeeeee>Чистые долгосрочные вложения в ценные бумаги и доли (ст.11.1-ст.11.2)</TD>
<TD valign="top" align=right bgcolor=#cccccc>823</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>11.1</TD>
<TD valign="top">Долгосрочные вложения в ценные бумаги и доли (балансовая стоимость)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>833</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>11.2</TD>
<TD valign="top" bgcolor=#eeeeee>Резерв под обесценение ценных бумаг и долей</TD>
<TD valign="top" align=right bgcolor=#cccccc>10</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>12</TD>
<TD valign="top">Расходы будущих периодов по другим операциям</TD>
<TD valign="top" bgcolor=#eeeeee align=right>193</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>13</TD>
<TD valign="top" bgcolor=#eeeeee>Прочие активы</TD>
<TD valign="top" align=right bgcolor=#cccccc>15 670</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>14</TD>
<TD valign="top">Всего активов: (ст1+2+3+4+5а+6+8+9+10+11+12+13)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>939 505</TD>
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
<TD valign="top" bgcolor=#eeeeee align=right>39 300</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>17.</TD>
<TD valign="top" bgcolor=#eeeeee>Средства клиентов </TD>
<TD valign="top" align=right bgcolor=#cccccc>669 674</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>17.1</TD>
<TD valign="top">В том числе вклады физических лиц  </TD>
<TD valign="top" align=right bgcolor=#cccccc>260 760</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>18.</TD>
<TD valign="top">Доходы будущих периодов по другим операциям</TD>
<TD valign="top" bgcolor=#eeeeee align=right>5</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>19.</TD>
<TD valign="top" bgcolor=#eeeeee>Выпущенные долговые обязательства</TD>
<TD valign="top" align=right bgcolor=#cccccc>97 853</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>20.</TD>
<TD valign="top">Прочие обязательства</TD>
<TD valign="top" bgcolor=#eeeeee align=right>3 700</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>21.</TD>
<TD valign="top" bgcolor=#eeeeee>Резервы на возможные потери по расчетам с дебиторами, риски и обязательства</TD>
<TD valign="top" align=right bgcolor=#cccccc>360</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>22.</TD>
<TD valign="top">Всего обязательств: (ст.15+16+17+18+19+20+21)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>810 892</TD>
</TR>
<tr class="header">
 <td>&nbsp;</td>
 <td class=small valign="middle"><div style=margin:3;>Собственные средства</td>
 <td class=small valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>23.</TD>
<TD valign="top" bgcolor=#eeeeee>Уставный капитал - (Средства акционеров (участников)), в т.ч.:</TD>
<TD valign="top" align=right bgcolor=#cccccc>10 500</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>23.1</TD>
<TD valign="top">Зарегистрированные обыкновенные акции и доли</TD>
<TD valign="top"  bgcolor=#eeeeee align=right>10 485</TD>
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
<TD valign="top" align=right bgcolor=#cccccc>98 418</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>27.</TD>
<TD valign="top">Переоценка основных средств</TD>
<TD valign="top" bgcolor=#eeeeee align=right>13 970</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>28.</TD>
<TD valign="top" bgcolor=#eeeeee>Прибыль (убыток) за отчетный  период</TD>
<TD valign="top" align=right bgcolor=#cccccc>8 343</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>29.</TD>
<TD valign="top">Дивиденды, начисленные из прибыли отчетного года</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>30.</TD>
<TD valign="top" bgcolor=#eeeeee>Распределенная прибыль (исключая дивиденды)</TD>
<TD valign="top" align=right bgcolor=#cccccc>1 502</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>31.</TD>
<TD valign="top">Нераспределенная прибыль ((ст.28-ст.29-ст.30)*)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>6 841</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>32.</TD>
<TD valign="top" bgcolor=#eeeeee>Расходы и риски,  влияющие на собственные средства</TD>
<TD valign="top" align=right bgcolor=#cccccc>1 116</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>33.</TD>
<TD valign="top">Всего собственных средств: (ст.23-23.3-24+25+26+27+31-32 - для прибыльных кредитных организаций), (ст. 23-23.3-24+25+26+27+28-32 - для убыточных кредитных организаций)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>128 613</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>34.</TD>
<TD valign="top" bgcolor=#eeeeee>Всего пассивов: (ст.22+23.3+33)</TD>
<TD valign="top" align=right bgcolor=#cccccc>939 505</TD>
</TR>
<tr class="header">
 <td >&nbsp;</td>
 <td class=small valign="middle"><div style=margin:3;>Внебалансовые обязательства</td>
 <td class=small valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>35.</TD>
<TD valign="top" bgcolor=#eeeeee>Безотзывные обязательства кредитной организации</TD>
<TD valign="top" align=right bgcolor=#cccccc>90 925</TD>
</tr>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>36.</TD>
<TD valign="top">Гарантии, выданные кредитной организацией</TD>
<TD valign="top" bgcolor=#eeeeee align=right>2 364</TD>
</TR>
</TABLE>
</td></tr>
</TABLE>


<!-- END -->
</div>