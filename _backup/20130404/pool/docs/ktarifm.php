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
	pr_title();
</script>
<!-- END page title -->

<!-- BEGIN -->

<div align="center">Настоящие тарифы вводятся с 1 декабря 2006г.</div>
<br />


<table border="0" cellspacing="1" cellpadding="5" align="center" class="table5">
	<tr class="header">
		<td colspan="5">Тарифы по обслуживанию карт международной платежной системы Master Card</td>
	</tr>
	<tr class="header">
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td>Maestro</td>
		<td>Standart</td>
		<td>MasterCard Gold</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>1.</td>
		<td>Обслуживание и взаиморасчеты. Ежегодный взнос.</td>
		<td align="center">5 USD</td>
		<td align="center">20 USD</td>
		<td align="center">60 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>2.</td>
		<td>Неснижаемый остаток на специальном корреспондентском счете.</td>
		<td colspan="3" align="center">0 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>3.</td>
		<td>Минимальный первоначальный взнос.</td>
		<td colspan="3" align="center">0 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>4.</td>
		<td>Гарантийное покрытие.</td>
		<td colspan="3" align="center">Отсутствует</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>5.</td>
		<td>Комиссия за снятие наличных денежных средств:
			<ul class="list3">
				<li>в пунктах выдачи наличных или банкоматах Прио - Внешторгбанка (ОАО);</li>
				<li>в пунктах выдачи наличных или банкоматах других банков. (*);</li>
			</ul>
		</td>
		<td colspan="3" valign="top" align="center">
			<div style="position: relative; margin-top: 55px;">0,5%</div>
			<div style="position: relative; margin-top: 40px;">1% (не менее 2.5 USD)</div>
		</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>6.</td>
		<td>Комиссия при безналичной оплате товаров и услуг.</td>
		<td colspan="3" align="center">Без комиссии</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>7.</td>
		<td>Обслуживание и взаиморасчеты по  дополнительной (прилинкованной) карте. Ежегодный взнос.</td>
		<td align="center">5 USD</td>
		<td align="center">20 USD</td>
		<td align="center">60 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>8.</td>
		<td>
			Обслуживание и взаиморасчеты по карте, перевыпущенной на 6 рабочий день по причине:
			<ul class="list3">
				<li>физической порчи, утраты PIN-кода (при передаче испорченной карты в МДМ Банке);</li>
				<li>утере, кражи;</li>
			</ul>
		</td>
		<td align="center">5 USD</td>
		<td align="center">20 USD</td>
		<td align="center">60 USD</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>9.</td>
		<td>
			Штраф за изъятие карты банкоматом или кассиром (при нарушении клиентом Правил пользования картой):
			<ul class="list3">
				<li>МДМ Банка</li>
				<li>другого Банка</li>
			</ul>
		</td>
		<td colspan="3" align="center">
			<div style="position: relative; margin-top: 40px;">5 USD</div>
			по фактическим затратам Банка на изъятие
		</td>
	</tr>
	<tr<?=colrow($j1++);?>>
		<td>10.</td>
		<td>
			Срочное заведение в систему информационного обслуживания данных для выпуска карты:<br />
			<ul class="list3">
				<li>в течении 1 банковского дня</li>
				<li>на следующий банковский день</li>
			</ul>
		</td>
		<td colspan="3" valign="top" align="center">
			<div style="position: relative; margin-top: 46px;">60 USD</div>
			60 USD
		</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>11.</td>
		<td>Блокировка карты с помещением в стоп-лист.</td>
		<td colspan="3" valign="top" align="center">в соответствии<br />с тарифами платежной системы</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>12.</td>
		<td valign="top">
			<ul class="list3" style="margin-bottom: 0;">
				<li>Конвертация рублей в иностранную валюту</li>
				<li>Конвертация иностранной валюты в рубли</li>
			</ul>
		</td>
		<td colspan="3" valign="top" align="center">
			<div style="position: relative; margin-top: 0;">Официальный курс плюс 0,1%</div>
			Официальный курс минус 0,1%
		</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>13.</td>
		<td>Начисление процентов на остаток средств на счете</td>
		<td colspan="3" align="center">Не производится</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>14.</td>
		<td>Овердрафт по счету карты.</td>
		<td colspan="3" align="center">Не разрешен</td>
	</tr>

	<tr<?=colrow($j1++);?>>
		<td>15.</td>
		<td>
			Процентная ставка при наступлении неразрешенного овердрафта<br />
			<ul type=disc>
				<li>Валюта карты - рубли</li>
				<li>Валюта карты - доллары</li>
				<li>Валюта карты - ЕВРО</li>
			</ul>
		</td>
		<td colspan="3" align="center">
			<div style="position: relative; margin-top: 26px;">36% годовых</div>
			25% годовых<br />
			25% годовых
		</td>
	</tr>
</table>

<p>При открытии карты с расчетом в рублях РФ данные тарифы пересчитываютя по курсу Прио-Внешторгбанка (ОАО) на день совершения операции.</p>
<p>* - Дополнительно может взиматься комиссия банком-владельцем банкомата или пункта выдачи наличных.</p>

<!-- END -->
</div>