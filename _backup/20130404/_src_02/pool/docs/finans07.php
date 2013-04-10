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

<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>Проценты полученные и аналогичные доходы от</td>
		<td width="100">тыс. руб.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Размещения средств в кредитных организациях</td>
		<td>20 849</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Ссуд,  предоставленных другим клиентам (некредитным организациям)</td>
		<td>515 554</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Оказание услуг по финансовой аренде (лизингу)</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Ценных бумаг с фиксированным доходом</td>
		<td>11 242</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Других источников</td>
		<td>5 337</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Всего процентов полученных и аналогичных доходов: (ст.1 + 2 + 3 + 4 + 5)</td>
		<td>552 982</td>
	</tr>
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>Проценты уплаченные и аналогичные расходы по</td>
		<td>тыс. руб.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Привлеченным средствам кредитных организаций</td>
		<td>1 778</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Привлеченным средствам  клиентов (некредитных организаций)</td>
		<td>229 416</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Выпущенным долговым ценным бумагам</td>
		<td>461</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Всего процентов уплаченных и аналогичных расходов</td>
		<td>231 655</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистые процентные и аналогичные доходы</td>
		<td>321 327</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистые доходы от операций с ценными бумагами</td>
		<td>1 037</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистые доходы от операций с иностранной валютой</td>
		<td>19 011</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистые доходы от операций с драгоценными металлами и прочими финансовыми инструментами</td>
		<td>277</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистые доходы от переоценки иностранной валюты</td>
		<td>-1 095</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Комиссионные доходы</td>
		<td>171 920</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Комиссионные расходы</td>
		<td>3 334</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистый  доход от разовых операций</td>
		<td>56 942</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Прочие чистые операционные доходы</td>
		<td>-55 719</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Административно-управленческие расходы</td>
		<td>287 312</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Резервы на возможные потери</td>
		<td>-139 032</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Прибыль до налогообложения</td>
		<td>84 022</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Начисленные налоги (включая налог на прибыль)</td>
		<td>42 771</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Прибыль за отчетный период</td>
		<td>41 251</td>
	</tr>
</table>

<h1>БАЛАНС НА 1 ЯНВАРЯ 2008 ГОДА</h1>
<?php $j1=0; ?>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>Активы</td>
		<td width="100">тыс. руб.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Денежные  средства</td>
		<td>257 469</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Средства кредитных организаций в  Центральном банке Российской Федерации</td>
		<td>220 603</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Обязательные резервы</td>
		<td>59 526</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Средства в кредитных организациях</td>
		<td>63 494</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистые вложения в торговые ценные бумаги</td>
		<td>222 467</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистая ссудная задолженность</td>
		<td>3 979 805</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистые вложения в инвестиционные ценные бумаги, удерживаемые до погашения</td>
		<td>18</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Чистые вложения в ценные бумаги, имеющиеся в наличии для продажи</td>
		<td>800</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Основные средства, нематериальные активы и материальные запасы</td>
		<td>162 695</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Требования по получению процентов</td>
		<td>13 640</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Прочие активы</td>
		<td>49 838</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Всего активов</td>
		<td>4 970 829</td>
	</tr>
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>Пассивы</td>
		<td>тыс. руб.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Кредиты Центрального банка Российской Федерации</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Средства кредитных организаций</td>
		<td>10 100</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Средства клиентов  (некредитных организаций)</td>
		<td>4 312 616</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Вклады физических лиц</td>
		<td>2 323 390</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Выпущенные долговые обязательства</td>
		<td>7 440</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Обязательства по уплате процентов</td>
		<td>73 520</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Прочие обязательства</td>
		<td>37 656</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Резервы на возможные потери по условным обязательствам кредитного характера, прочим возможным потерям и  по операциям с резидентами офшорных зон</td>
		<td>28 637</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Всего обязательств</td>
		<td>4 469 969</td>
	</tr>
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>Источники собственных средств</td>
		<td>тыс. руб.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Средства акционеров (участников)</td>
		<td>34 965</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Зарегистрированные обыкновенные акции и доли</td>
		<td>34 950</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Зарегистрированные привилегированные акции</td>
		<td>15</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Незарегистрированный уставный  капитал неакционерных кредитных организаций</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Собственные акции , выкупленные у акционеров</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Эмиссионный доход</td>
		<td>0</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Переоценка основных средств</td>
		<td>116 288</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Расходы будущих периодов и предстоящие выплаты,  влияющие на собственные средства (капитал)</td>
		<td>15 818</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Фонды и нераспределенная прибыль прошлых лет в распоряжении кредитной организации (непогашенные убытки прошлых лет)</td>
		<td>324 174</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Прибыль  (убыток) за отчетный  период</td>
		<td>41 251</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Всего источников собственных средств</td>
		<td>500 860</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Всего пассивов</td>
		<td>4 970 829</td>
	</tr>
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>Внебалансовые обязательства</td>
		<td>тыс. руб.</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Безотзывные обязательства кредитной организации</td>
		<td>949 025</td>
	</tr>
	<tr<?php print (colrow($j1++));?>>
		<td width="50" align="center"><?=$j1;?></td>
		<td>Гарантии, выданные кредитной организацией</td>
		<td>137 469</td>
	</tr>
</table>
<p>Операции, подлежащие отражению в разделе V "Счета доверительного управления" не осуществлялись.</p>
<h1>Аудиторское заключение</h1>
<p>По мнению  ЗАО "Аудиторско-Консультационная фирма" "МИАН"  бухгалтерский баланс, отчет о прибылях и убытках, отчет об уровне достаточности капитала, величине резервов на покрытие сомнительных ссуд и иных видов активов отражают достоверно во всех существенных отношениях финансовое положение ПРИО-ВНЕШТОРГБАНКА  (ОТКРЫТОЕ АКЦИОНЕРНОЕ ОБЩЕСТВО) по состоянию на 31 декабря 2007 года и результаты его финансово-хозяйственной деятельности за период с 01 января 2007 года по 31 декабря 2007 года включительно.</p>
<table border="0" cellspacing="1" cellpadding="5">
	<tr valign="top">
		<td>Наименование аудиторской организации:</td><td>Закрытое акционерное общество "Аудиторско-Консультационная фирма "МИАН"</td>
	</tr>
	<tr valign="top">
		<td colspan="2">Лицензия  Министерства Финансов Российской Федерации № Е 000942</td>
	</tr>
	<tr valign="top">
		<td>Дата выдачи:</td><td>25.06.2002г.</td>
	</tr>
	<tr valign="top">
		<td>срок действия лицензии:</td><td>5 лет</td>
	</tr>
	<tr valign="top">
		<td>Фамилия, имя, отчество руководителя:</td><td>Левкович Галина Николаевна</td>
	</tr>
	<tr valign="top">
		<td>Данные лица, заверившего публикуемую отчетность:</td><td>генеральный директор  ЗАО "Аудиторско-консультационная фирма" "МИАН" Левкович Галина Николаевна</td>
	</tr>
	<tr valign="top">
		<td>наименование, номер документа, подтверждающего полномочия:</td><td>приказ о назначении № 20 от 08.07.1997г.</td>
	</tr>
</table>


<!-- END -->
</div>