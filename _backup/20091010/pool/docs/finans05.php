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

<p>На 1 января 2006 г. активы банка в соответствии с публикуемой отчетностью составили    3 009 млн.руб., увеличившись за год на 1 048 млн.руб. (на 53%).</p>
<p>Капитал банка вырос за год со 191 млн.руб. до 266,4 млн.руб., при этом основным источником его роста является полученная банком прибыль.    <p> Чистая прибыль банка за 2005 год с учетом СПОД составила 103,4 млн.руб.,  ее рост по сравнению с 2004 годом составил 66,3 млн.руб.  Рентабельность собственного капитала (отношение прибыли к капиталу) составила 39%, рентабельность активов (прибыль, отнесенная к сумме активов) - 3,4%.</p>
<p>Основним источником доходов банка являются кредитные операции. Чистая ссудная и приравненная к ней задолженность (включая депозиты в Банке России) составила на 1.01.06г. 2 334 млн.руб. или выросла по сравнению с 1.01.05г. на 817 млн.руб. ( на 54%).</p>
<p>На 1.01.06г. вложения в ценные бумаги, акции и участие составили 75 млн.руб. (рост за год на   38 млн.руб.).</p>
<p>Рост объемов активных операций обеспечивается ростом ресурсной базы. Остатки на расчетных счетах клиентов-юридических лиц выросли по сравнению с началом года на 278 млн.руб. (на 43%) и составили  930 млн.руб.</p>
<p>Привлеченные в депозиты средства юридических лиц возросли за год с 97 млн. до 189,5 млн руб.</p>
<p>Вклады граждан выросли за год на 391 млн.руб. (в 1,4 раза) и составили на 1.01.06г. 1 368 млн.руб.</p>
<p>Размер уставного фонда в капитале банка составил 35 млн.руб., резервного фонда - 5,25 млн.руб. или 15% к уставному капиталу, что полностью соответствует требованиям Банка России и Устава банка.</p>
<p>Отчисления банка в фонд обязательных резервов в сумме  51,3 млн.руб. соответствуют нормативным требованиям Банка России.</p>

<h1>ОТЧЕТ О ПРИБЫЛЯХ И УБЫТКАХ ЗА 2005 ГОД</h1>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
 <tr class="header">
 <td WIDTH="7%">&nbsp;</td>
 <td class=small WIDTH="80%" valign="middle"><div style=margin:3>Проценты полученные и аналогичные доходы от:</div></td>
 <td class=small WIDTH="12%" valign="middle">тыс. руб.</td>
 </tr>
<TR>
<TD align="center" valign=top>
1.</TD>
<TD>Размещения средств в кредитных организациях        </TD>
<td align=right bgcolor=#eeeeee>5 471</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
2.</TD>
<TD bgcolor=#eeeeee>Ссуд,  предоставленных другим клиентам (некредитным организациям)</TD>
<td align=right bgcolor=#cccccc>322 757</TD>
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
<td align=right bgcolor=#cccccc>2 249</TD>
</TR>
<TR>
<TD align="center" valign=top>
5.</TD>
<TD>Других источников</TD>
<td align=right bgcolor=#eeeeee>1 446</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
6.</TD>
<TD bgcolor=#eeeeee>Итого проценты полученные и аналогичные доходы: (ст.1 + 2 + 3 + 4 + 5)</TD>
<td align=right bgcolor=#cccccc>331 923</TD>
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
<td align=right bgcolor=#cccccc>2 258</TD>
</TR>
<TR>
<TD align="center" valign=top>
8.</TD>
<TD>Привлеченным средствам  клиентов (некредитных организаций)  </TD>
<td align=right bgcolor=#eeeeee>86 355</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
9.</TD>
<TD bgcolor=#eeeeee>Выпущенным долговым ценным бумагам</TD>
<td align=right bgcolor=#cccccc>353</TD>
</TR>
<TR>
<TD align="center" valign=top>
10.</TD>
<TD>Всего процентов уплаченных и аналогичных расходов </TD>
<td align=right bgcolor=#eeeeee>88 966</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
11.</TD>
<TD bgcolor=#eeeeee>Чистые процентные и аналогичные доходы</TD>
<td align=right bgcolor=#cccccc>242 957</TD>
</TR>
<TR>
<TD align="center" valign=top>
12.</TD>
<TD>Чистые доходы от операций с ценными бумагами</TD>
<td align=right bgcolor=#eeeeee>398</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
13.</TD>
<TD bgcolor=#eeeeee>Чистые доходы от операций с иностранной валютой</TD>
<td align=right bgcolor=#cccccc>12 932</TD>
</TR>
<TR>
<TD align="center" valign=top>
14.</TD>
<TD>Чистые доходы от операций с драгоценными металлами и прочими финансовыми инструментами</TD>
<td align=right bgcolor=#eeeeee>193</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
15.</TD>
<TD bgcolor=#eeeeee>Чистые доходы от переоценки иностранной валюты</TD>
<td align=right bgcolor=#cccccc>307</TD>
</TR>

<TR>
<TD align="center" valign=top>
16.</TD>
<TD >Комиссионные доходы </TD>
<td align=right bgcolor=#eeeeee>61 894</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
17.</TD>
<TD bgcolor=#eeeeee>Комиссионные расходы</TD>
<td align=right bgcolor=#cccccc>2 850</TD>
</TR>
<TR>
<TD align="center" valign=top >
18.</TD>
<TD >Чистый  доход от разовых операций</TD>
<td align=right bgcolor=#eeeeee>319</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
19.</TD>
<TD bgcolor=#eeeeee>Прочие чистые операционные доходы</TD>
<td align=right bgcolor=#cccccc>8 815</TD>
</TR>
<TR>
<TD align="center" valign=top>
20.</TD>
<TD>Административно-управленческие расходы</TD>
<td align=right bgcolor=#eeeeee>171 263</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
21.</TD>
<TD bgcolor=#eeeeee>Резервы на возможные потери</TD>
<td align=right bgcolor=#cccccc>756</TD>
</TR>

<TR>
<TD align="center" valign=top>
22.</TD>
<TD>Прибыль до налогообложения</TD>
<td align=right bgcolor=#eeeeee>135 316</TD>
</TR>
<TR>
<TD align="center" valign=top bgcolor=#eeeeee>
23.</TD>
<TD bgcolor=#eeeeee>Начисленные налоги (включая налог на прибыль)</TD>
<td align=right bgcolor=#cccccc>31 886</TD>
</TR>
<TR>
<TD align="center" valign=top>
24.</TD>
<TD>Прибыль за отчетный период</TD>
<td align=right bgcolor=#eeeeee>103 430</TD>
</TR>
</TABLE>

<h1>БАЛАНС НА 1 ЯНВАРЯ 2006 ГОДА</h1>

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
<TD valign="top" align=right bgcolor=#cccccc>101 984</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>2.</TD>
<TD valign="top">Средства кредитных организаций в  Центральном банке Российской Федерации </TD>
<TD valign="top" align=right bgcolor=#eeeeee>354 233</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>2.1.</TD>
<TD valign="top">Обязательные резервы </TD>
<TD valign="top" align=right bgcolor=#eeeeee>51 283</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>3.</TD>
<TD valign="top" bgcolor=#eeeeee>Средства в кредитных организациях </TD>
<TD valign="top" align=right bgcolor=#cccccc>86 458</TD>
</TR>

<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>4.</TD>
<TD valign="top">Чистые вложения в торговые ценные бумаги</TD>
<TD valign="top" bgcolor=#eeeeee align=right>54 451</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>5.</TD>
<TD valign="top" bgcolor=#eeeeee>Чистая ссудная задолженность </TD>
<TD valign="top" align=right bgcolor=#cccccc>2 334 457</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>6.</TD>
<TD valign="top">Чистые вложения в инвестиционные ценные бумаги, удерживаемые до погашения </TD>
<TD valign="top" bgcolor=#eeeeee align=right>20 034</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>7.</TD>
<TD valign="top" bgcolor=#eeeeee>Чистые вложения в ценные бумаги, имеющиеся в наличии для продажи </TD>
<TD valign="top" align=right bgcolor=#cccccc>800</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>8.</TD>
<TD valign="top">Основные средства, нематериальные активы и материальные запасы</TD>
<TD valign="top" bgcolor=#eeeeee align=right>46 219</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>9.</TD>
<TD valign="top" bgcolor=#eeeeee>Требования по получению процентов</TD>
<TD valign="top" align=right bgcolor=#cccccc>7 241</TD>
</TR>
<TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>10.</TD>
<TD valign="top">Прочие активы </TD>
<TD valign="top" bgcolor=#eeeeee align=right>2 900</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>11.</TD>
<TD valign="top" bgcolor=#eeeeee>Всего активов</TD>
<TD valign="top" align=right bgcolor=#cccccc>3 008 777</TD>
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
<TD valign="top" align=right bgcolor=#cccccc>21 600</TD>
</TR>

<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>14</TD>
<TD valign="top">Средства клиентов  (некредитных организаций)</TD>
<TD valign="top" bgcolor=#eeeeee align=right>2 583 566</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>14.1</TD>
<TD valign="top">Вклады физических лиц  </TD>
<TD valign="top" bgcolor=#eeeeee align=right>1 368 355</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>15</TD>
<TD valign="top" bgcolor=#eeeeee>Выпущенные долговые обязательства</TD>
<TD valign="top" align=right bgcolor=#cccccc>65 188</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>16.</TD>
<TD valign="top">Обязательства по уплате процентов</TD>
<TD valign="top" bgcolor=#eeeeee align=right>53 756</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>17.</TD>
<TD valign="top" bgcolor=#eeeeee>Прочие обязательства</TD>
<TD valign="top" align=right bgcolor=#cccccc>8 966</TD>
</TR>

<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>18.</TD>
<TD valign="top">Резервы на возможные потери по условным обязательствам кредитного характера, прочим возможным потерям и  по операциям с резидентами офшорных зон</TD>
<TD valign="top" bgcolor=#eeeeee align=right>9 363</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>19.</TD>
<TD valign="top" bgcolor=#eeeeee>Всего  обязательств</TD>
<TD valign="top" align=right bgcolor=#cccccc>2 742 439</TD>
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
<TD valign="top" align=right bgcolor=#cccccc>12 703</TD>
</TR>

<TR>
<td valign="top" ><div style=margin-left:3;margin-right:3>24.</TD>
<TD valign="top">Расходы будущих периодов и предстоящие выплаты,  влияющие на собственные средства (капитал)</TD>
<TD valign="top" align=right bgcolor=#eeeeee>47 908</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>25.</TD>
<TD valign="top" bgcolor=#eeeeee>Фонды и нераспределенная прибыль прошлых лет в распоряжении кредитной организации (непогашенные убытки прошлых лет)</TD>
<TD valign="top" bgcolor=#cccccc align=right>163 148</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>26.</TD>
<TD valign="top">Прибыль к распределению (убыток) за отчетный  период</TD>
<TD valign="top" align=right bgcolor=#eeeeee>103 430</TD>
</TR>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>27.</TD>
<TD valign="top" bgcolor=#eeeeee>Всего источников собственных средств</TD>
<TD valign="top" bgcolor=#cccccc align=right>266 338</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>28.</TD>
<TD valign="top">Всего пассивов</TD>
<TD valign="top" align=right bgcolor=#eeeeee>3 008 777</TD>
</TR>
<tr class="header">
 <td>&nbsp;</td>
 <td class=small valign="middle"><div style=margin:3;>Внебалансовые обязательства</td>
 <td class=small valign="middle">тыс. руб.</td>
</tr>
<TR>
<td valign="top" bgcolor=#eeeeee><div style=margin-left:3;margin-right:3>29.</TD>
<TD valign="top" bgcolor=#eeeeee>Безотзывные обязательства кредитной организации</TD>
<TD valign="top" bgcolor=#cccccc align=right>305 696</TD>
</TR>
<TR>
<td valign="top"><div style=margin-left:3;margin-right:3>30.</TD>
<TD valign="top">Гарантии, выданные кредитной организацией</TD>
<TD valign="top" align=right bgcolor=#eeeeee>79 936</TD>
</TR>

</TABLE>
</td></tr>
</TABLE>



<!-- END -->
</div>