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

<p>На 1 января 2005 г. активы банка составили 1961 млн.руб., или выросли за год на 347 млн.руб. (на 21,5%).</p>
<p>Капитал банка на 1.01.05г. составил 191 млн.руб., или вырос по сравнению с 1.01.04г. на 16 млн.руб. или на 9,1%.</p>
<p>Размер уставного фонда в капитале составил 35 млн.руб, резервного фонда - 5,25 млн.руб или 15% к уставному капиталу, что полностью соответствует требованиям Банка России и Устава банка.</p>
<p>Чистая прибыль банка за 2004 год с учетом СПОД составила 37,1 млн.руб.  или выросла по сравнению с 2003 годом на 19,1 млн.руб.  Рентабельность собственного капитала (отношение прибыли к капиталу) составила 19,4%, рентабельность активов (прибыль, отнесенная к сумме активов) - 1,9%.</p>
<p>Средства на расчетных счетах клиентов-юридических лиц составили на 1.01.05г. 652 млн.руб., или увеличились на 154 млн.руб. (на 31%).</p>
<p>Вклады граждан составили на 1.01.05г. 977 млн.руб., или выросли за год на 286 млн.руб. (в 1,4 раза).</p>
<p>Чистая ссудная и приравненная к ней задолженность (включая депозиты в Банке России) составила 1518 млн.руб. или выросла на 252 млн.руб. ( на 20%).</p>
<p>На 1.01.05г. вложения в ценные бумаги, акции и участие составили 37 млн.руб.</p>
<p>Отчисления банка в фонд обязательных резервов в сумме  34,6 млн.руб соответствуют нормативным требованиям Банка России.</p>

<h1>ОТЧЕТ О ПРИБЫЛЯХ И УБЫТКАХ ЗА 2004 ГОД</h1>

<table border="0" cellspacing="1" cellpadding="5" class="table5">
 <tr class="header">
 <td WIDTH="7%">&nbsp;</td>
 <td class=small WIDTH="80%" valign="middle"><div style=margin:3>Проценты полученные и аналогичные доходы от:</div></td>
 <td class=small WIDTH="12%" valign="middle">тыс. руб.</td>
 </tr>
<TR>
<TD align="center" valign=top>
1.</TD>
<TD>Размещения средств в кредитных организациях	</TD>
<td align=right bgcolor=#eeeeee>6 724</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
2.</TD>
<TD bgcolor=#eeeeee>Ссуд,  предоставленных другим клиентам (некредитным организациям)</TD>
<td align=right bgcolor=#cccccc>218 702</TD>
</TR> 
<TR>
<TD align="center" valign=top>
3.</TD>
<TD>Оказание услуг по финансовой аренде (лизингу)</TD>
<td align=right bgcolor=#eeeeee>0</TD>
</TR>  
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
4.</TD>
<TD bgcolor=#eeeeee>Ценных бумаг с фиксированным доходом </TD>
<td align=right bgcolor=#cccccc>3 489</TD>
</TR> 
<TR>
<TD align="center" valign=top>
5.</TD>
<TD>Других источников</TD>
<td align=right bgcolor=#eeeeee>1 094</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
6.</TD>
<TD bgcolor=#eeeeee>Итого проценты полученные и аналогичные доходы: (ст.1 + 2 + 3 + 4 + 5)</TD>
<td align=right bgcolor=#cccccc>230 009</TD>
</TR>
<tr class="header">
 <td class=small >&nbsp;</td>
 <td class=small valign="middle" ><div style=margin:3>Проценты уплаченные и аналогичные расходы по:</div></td>
 <td class=small valign="middle" >тыс. руб.</td>
 </tr>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
7.</TD>
<TD bgcolor=#eeeeee>Привлеченным средствам кредитных организаций</TD>
<td align=right bgcolor=#cccccc>5 312</TD>
</TR>
<TR>
<TD align="center" valign=top>
8.</TD>
<TD>Привлеченным средствам  клиентов (некредитных организаций)  </TD>
<td align=right bgcolor=#eeeeee>70 145</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
9.</TD>
<TD bgcolor=#eeeeee>Выпущенным долговым ценным бумагам</TD>
<td align=right bgcolor=#cccccc>5</TD>
</TR>
<TR>
<TD align="center" valign=top>
10.</TD>
<TD>Всего процентов уплаченных и аналогичных расходов </TD>
<td align=right bgcolor=#eeeeee>75 462</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
11.</TD>
<TD bgcolor=#eeeeee>Чистые процентные и аналогичные доходы</TD>
<td align=right bgcolor=#cccccc>154 547</TD>
</TR>
<TR>
<TD align="center" valign=top>
12.</TD>
<TD>Чистые доходы от операций с ценными бумагами</TD>
<td align=right bgcolor=#eeeeee>49</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
13.</TD>
<TD bgcolor=#eeeeee>Чистые доходы от операций с иностранной валютой</TD>
<td align=right bgcolor=#cccccc>16 534</TD>
</TR>
<TR>
<TD align="center" valign=top>
14.</TD>
<TD>Чистые доходы от операций с драгоценными металлами и прочими финансовыми инструментами</TD>
<td align=right bgcolor=#eeeeee>127</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
15.</TD>
<TD bgcolor=#eeeeee>Чистые доходы от переоценки иностранной валюты</TD>
<td align=right bgcolor=#cccccc>1 866</TD>
</TR>

<TR>
<TD align="center" valign=top>
16.</TD>
<TD >Комиссионные доходы </TD>
<td align=right bgcolor=#eeeeee>52 047</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
17.</TD>
<TD bgcolor=#eeeeee>Комиссионные расходы</TD>
<td align=right bgcolor=#cccccc>3 469</TD>
</TR>
<TR>
<TD align="center" valign=top >
18.</TD>
<TD >Чистый  доход от разовых операций</TD>
<td align=right bgcolor=#eeeeee>489</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
19.</TD>
<TD bgcolor=#eeeeee>Прочие чистые операционные доходы</TD>
<td align=right bgcolor=#cccccc>2 960</TD>
</TR>
<TR>
<TD align="center" valign=top>
20.</TD>
<TD>Административно-управленческие расходы</TD>
<td align=right bgcolor=#eeeeee>162 978</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
21.</TD>
<TD bgcolor=#eeeeee>Резервы на возможные потери</TD>
<td align=right bgcolor=#cccccc>6 861</TD>
</TR>

<TR>
<TD align="center" valign=top>
22.</TD>
<TD>Прибыль до налогообложения</TD>
<td align=right bgcolor=#eeeeee>45 561</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
23.</TD>
<TD bgcolor=#eeeeee>Начисленные налоги (включая налог на прибыль)</TD>
<td align=right bgcolor=#cccccc>8 441</TD>
</TR>
<TR>
<TD align="center" valign=top>
24.</TD>
<TD>Прибыль за отчетный период</TD>
<td align=right bgcolor=#eeeeee>37 120</TD>
</TR>
</TABLE>
</td></tr>
<tr><td>

<h1>БАЛАНС НА 1 ЯНВАРЯ 2005 ГОДА</h1>

<table border="0" cellspacing="1" cellpadding="5" class="table5">
<tr class="header">
 <td WIDTH="7%">&nbsp;</td>
 <td class=small WIDTH="80%" valign="middle"><div style=margin:3;>Активы</td>
 <td class=small WIDTH="12%" valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>
1.</TD>
<TD bgcolor=#eeeeee>Денежные  средства</TD>
<TD valign="top" align=right bgcolor=#cccccc>97 946</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>2.</TD>
<TD valign="top">Средства кредитных организаций в  Центральном банке Российской Федерации </TD>
<TD valign="top" align=right bgcolor=#eeeeee>236 047</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>2.1.</TD>
<TD valign="top">Обязательные резервы </TD>
<TD valign="top" align=right bgcolor=#eeeeee>34 595</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>3.</TD>
<TD valign="top" bgcolor=#eeeeee>Средства в кредитных организациях </TD>
<TD valign="top" align=right bgcolor=#cccccc>19 212</TD>
</TR>

<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>4.</TD>
<TD valign="top">Чистые вложения в торговые ценные бумаги</TD>
<TD valign="top" bgcolor=#eeeeee align=right>25 294</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>5.</TD>
<TD valign="top" bgcolor=#eeeeee>Чистая ссудная задолженность </TD>
<TD valign="top" align=right bgcolor=#cccccc>1 517 672</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>6.</TD>
<TD valign="top">Чистые вложения в инвестиционные ценные бумаги, удерживаемые до погашения </TD>
<TD valign="top" bgcolor=#eeeeee align=right>18</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>7.</TD>
<TD valign="top" bgcolor=#eeeeee>Чистые вложения в ценные бумаги, имеющиеся в наличии для продажи </TD>
<TD valign="top" align=right bgcolor=#cccccc>11 674</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>8.</TD>
<TD valign="top">Основные средства, нематериальные активы и материальные запасы</TD>
<TD valign="top" bgcolor=#eeeeee align=right>44 584</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>9.</TD>
<TD valign="top" bgcolor=#eeeeee>Требования по получению процентов</TD>
<TD valign="top" align=right bgcolor=#cccccc>4 196</TD>
</TR>
<TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>10.</TD>
<TD valign="top">Прочие активы </TD>
<TD valign="top" bgcolor=#eeeeee align=right>3 950</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>11.</TD>
<TD valign="top" bgcolor=#eeeeee>Всего активов</TD>
<TD valign="top" align=right bgcolor=#cccccc>1 960 593</TD>
</TR>
<tr class="header">
 <td>&nbsp;</td>
 <td class=small valign="middle"><div style=margin:3;>Пассивы</td>
 <td class=small valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>12</TD>
<TD valign="top">Кредиты Центрального банка Российской Федерации</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>13</TD>
<TD valign="top" bgcolor=#eeeeee>Средства кредитных организаций</TD>
<TD valign="top" align=right bgcolor=#cccccc>0</TD>
</TR>

<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>14</TD>
<TD valign="top">Средства клиентов  (некредитных организаций)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>1 730 037</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>14.1</TD>
<TD valign="top">Вклады физических лиц  </TD>
<TD valign="top" bgcolor=#eeeeee align=right>976 972</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>15</TD>
<TD valign="top" bgcolor=#eeeeee>Выпущенные долговые обязательства</TD>
<TD valign="top" align=right bgcolor=#cccccc>9 172</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>16.</TD>
<TD valign="top">Обязательства по уплате процентов</TD>
<TD valign="top" bgcolor=#eeeeee align=right>24 572</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>17.</TD>
<TD valign="top" bgcolor=#eeeeee>Прочие обязательства</TD>
<TD valign="top" align=right bgcolor=#cccccc>1 292</TD>
</TR>

<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>18.</TD>
<TD valign="top">Резервы на возможные потери по условным обязательствам кредитного характера, прочим возможным потерям и  по операциям с резидентами офшорных зон</TD>
<TD valign="top" bgcolor=#eeeeee align=right>4 292</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>19.</TD>
<TD valign="top" bgcolor=#eeeeee>Всего  обязательств</TD>
<TD valign="top" align=right bgcolor=#cccccc>1 769 365</TD>
</TR>
<tr class="header">
 <td >&nbsp;</td>
 <td class=small valign="middle"><div style=margin:3;>Источники собственных средств</td>
 <td class=small valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>20.</TD>
<TD valign="top">Средства акционеров (участников)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>34 965</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>20.1</TD>
<TD valign="top">Зарегистрированные обыкновенные акции и доли</TD>
<TD valign="top" bgcolor=#eeeeee align=right>34 950</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>20.2</TD>
<TD valign="top">Зарегистрированные привилегированные акции</TD>
<TD valign="top" bgcolor=#eeeeee align=right>15</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>20.3</TD>
<TD valign="top">Незарегистрированный уставный  капитал неакционерных кредитных организаций </TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>21.</TD>
<TD valign="top" bgcolor=#eeeeee>Собственные акции , выкупленные у акционеров </TD>
<TD valign="top" align=right bgcolor=#cccccc>0</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>22.</TD>
<TD valign="top">Эмиссионный доход</TD>
<TD valign="top" bgcolor=#eeeeee align=right>0</TD>
</TR>

<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>23.</TD>
<TD valign="top" bgcolor=#eeeeee>Переоценка основных средств </TD>
<TD valign="top" align=right bgcolor=#cccccc>12 719</TD>
</TR>

<TR>
<td valign="top" ><div style=margin-left:3;margin-right:3>24.</TD>
<TD valign="top">Расходы будущих периодов и предстоящие выплаты,  влияющие на собственные средства (капитал)</TD>
<TD valign="top" align=right bgcolor=#eeeeee>21 854</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>25.</TD>
<TD valign="top" bgcolor=#eeeeee>Фонды и нераспределенная прибыль прошлых лет в распоряжении кредитной организации (непогашенные убытки прошлых лет)</TD>
<TD valign="top" bgcolor=#cccccc align=right>128 278</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>26.</TD>
<TD valign="top">Прибыль к распределению (убыток) за отчетный  период</TD>
<TD valign="top" align=right bgcolor=#eeeeee>37 120</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>27.</TD>
<TD valign="top" bgcolor=#eeeeee>Всего источников собственных средств</TD>
<TD valign="top" bgcolor=#cccccc align=right>191 228</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>28.</TD>
<TD valign="top">Всего пассивов</TD>
<TD valign="top" align=right bgcolor=#eeeeee>1 960 593</TD>
</TR>
<tr class="header">
 <td>&nbsp;</td>
 <td class=small valign="middle"><div style=margin:3;>Внебалансовые обязательства</td>
 <td class=small valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>29.</TD>
<TD valign="top" bgcolor=#eeeeee>Безотзывные обязательства кредитной организации</TD>
<TD valign="top" bgcolor=#cccccc align=right>276 840</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>30.</TD>
<TD valign="top">Гарантии, выданные кредитной организацией</TD>
<TD valign="top" align=right bgcolor=#eeeeee>36 355</TD>
</TR>

</TABLE>
</td></tr>
</TABLE>



<!-- END -->
</div>