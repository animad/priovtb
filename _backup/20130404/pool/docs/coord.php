<?php
	if(!isset($_GET['m'])){ $_GET['m']='ryazan'; }
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

<div class="block">
	<div class="text2">
<?php
	$a['towns']=array('ryazan'=>'Рязань','moscow'=>'Москва','kasimov'=>'Касимов','novomich'=>'Новомичуринск','scopin'=>'Скопин','rybnoe'=>'Рыбное','shack'=>'Шацк','sasovo'=>'Сасово');
	while(list($key,$val)=each($a['towns'])){
		print '<a href="'.$_SERVER['PHP_SELF'].'?dr=coord.php&m='.$key.'" class="cell'.(isset($_GET['m']) && $_GET['m']==$key?'2':'').'">'.$val.'</a> ';
	}
?>
</div></div>
<div style="line-height: 10px; font-size: 10px;">&nbsp;</div>
<div class="block">
	<div class="text2">
<?php
	$a['towns']=array('bankomats'=>'Банкоматы','terminals'=>'Терминалы самообслуживания');
	while(list($key,$val)=each($a['towns'])){
		print '<a href="'.$_SERVER['PHP_SELF'].'?dr=coord.php&m='.$key.'" class="cell'.(isset($_GET['m']) && $_GET['m']==$key?'2':'').'">'.$val.'</a> ';
	}
?>
	</div>
</div>
<br />

<?php
//--- подпись для ТЕРМИНАЛОВ
	if($_GET['m']=='terminals'){
		//--- карта
		if (file_exists('pool/src/coord_data/terminals.inc')){
			$v1=@file('pool/src/coord_data/terminals.inc');
			print implode("\r\n",$v1);
			print '<br />';
		}
		print '<p>Платежный терминал позволяет Вам быстро и самостоятельно осуществить следующие операции:</p>';
		print '<p>Платежи осуществляются наличными:</p>';
		print '<ul class="list2">';
			print '<li>заплатить за кредит, оформленный в другом банке. Комиссия составит 50 рублей;</li>';
			print '<li>оплатить штрафы в ГИБДД. Комиссия составит 30 рублей;</li>';
			print '<li>оплатить госпошлины и регистрацию транспортного средства;</li>';
		print '</ul>';
		print '<p>Платежи можно осуществить как наличными, так и с пластиковой карты Прио:</p>';
		print '<ul class="list2">';
			print '<li><a href="/?dr=karta.php" class="hrf7" title="Пластиковые карты">совершить операции по пластиковым картам (просмотр и пополнение баланса, дополнительный взнос на свой вклад в банке)</a>;</li>';
			print '<li>оплатить посещение детского сада, занятия ваших любимых чад в секциях и кружках во Дворце Детского Творчества и Дворце молодежи города Рязани. Комиссия составит 30 рублей;</li>';
			print '<li>провести коммунальные платежи. Платежи принимаются без комиссии;</li>';
	//		print '<li>оплатить услуги связи (как сотового оператора, так и за стационарный номер), Интернет и спутниковое телевидение. Платежи за услуги Центртелекома и Ростелекома принимаются без комиссии. Комиссия платежа за услуги МТС, Билайн, Мегафон, Скайлинк, НТВ+ и Интерлинк составляет 5 рублей вне зависимости от суммы оплаты.</li>';
			print '<li>оплатить услуги связи:</li>';
				print '<ul class="list2">';
					print '<li>оплатить услуги сотовой связи (МТС, Билайн, Мегафон, Теле2);</li>';
					print '<li>оплатить услуги телефонной связи (Ценртелеком, Ростелеком, Энлинк);</li>';
					print '<li>оплатить за интернет (Домолинк, Энлинк, Скайлинк, Интерлинк, Билайн, Спарк, Антенна-гарант, Комстар-регионы);</li>';
					print '<li>оплатить за спутниковое и кабельное телевидение (НТВ+, Билайн-ТВ, Антенна-гарант)</li>';
				print '</ul>';
			print '<br/>Комиссия платежа за услуги МТС, Билайна, Мегафона, Скайлинка, НТВ+, Комстар-регионы и Интерлинка составляет 5 рублей вне зависимости от суммы оплаты.';
			print '<br/>Платежи за услуги других операторов принимаются без комиссии.';
		print '</ul>';
	}
	
	if($_GET['m']=='bankomats'){
		//--- карта
		if (file_exists('pool/src/coord_data/bankomats.inc')){
			$v1=@file('pool/src/coord_data/bankomats.inc');
			print implode("\r\n",$v1);
			print '<br />';
		}
	}




	$fln='pool/docs/coord/'.trim($_GET['m']).'.html';
	if(file_exists($fln) && filesize($fln)){
		include($fln);
	}else{ print '<br /><div align="center">- данные не найдены -</div>'; }


//--- подпись для г.Рязань
	if(false && $_GET['m']=='ryazan'){
		print '<br />';
		print '<hr>';
		print '<ul class="smenu3">'.
		          '<li><a href="?dr=coord.php&m=terminals">Возможна оплата коммунальных платежей через платежные терминалы банка. Вам необходимо знать лишь свой лицевой счет в КВЦ.</a></li>'.
		      '</ul>';
	}


?>




<!-- END -->
</div>
