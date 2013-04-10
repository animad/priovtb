<?php
	include('files/functions/get.php');

	$kurs=get_kurs();
?>

		<script type="text/javascript" src="files/scripts/calc1.js"></script>
		<div id="col_r">
			
			<div id="info_01" style="display: none">
				<div class="text2" style="position: absolute; top: 2px; right: 5px;">единая справочная</div>
				<div class="text2" style="position: absolute; top: 53px; right: 5px;">электронная почта</div>
				<a href="mailto:post@priovtb.com" class="email" title="post@priovtb.com">&nbsp;</a>
			</div>
			
			<!-- страхование вкладов -->
			<div class="block_asv">
				<div class="btn1"><a href="?dr=strahovka.php" class="hrf1">Подробнее</a></div>
			</div>

			<!-- Курсы валют -->
			<div class="block1">
				<table class="table1" width="100%">
					<tr class="header1"><td class="tl">&nbsp;</td><td class="t">&nbsp;</td><td class="tr">&nbsp;</td></tr>
					<tr class="header1"><td class="l"></td><td class="data" style="margin-bottom: 0; padding-bottom: 0;">
						Курсы валют
					</td><td class="r"></td></tr>
					<tr class="header1"><td class="l"></td><td class="data" style="font-size: 10px; margin-top: 0; padding-top: 0;">
						<b><?=$kurs['date'];?></b>
					</td><td class="r"></td></tr>
					<tr><td class="l"></td><td class="data">
						<table class="table2" cellpadding="2">
							<tr><td></td><td align="center">купить</td><td align="center">продать</td></tr>
							<tr><td>USD&nbsp;/&nbsp;RUB</td><td><input class="s2" type="text" value="<?=$kurs['usd']['pokup'];?>" readonly></td><td><input class="s2" type="text" value="<?=$kurs['usd']['prod'];?>" readonly></td></tr>
							<tr><td>EUR&nbsp;/&nbsp;RUB</td><td><input class="s2" type="text" value="<?=$kurs['eur']['pokup'];?>" readonly></td><td><input class="s2" type="text" value="<?=$kurs['eur']['prod'];?>" readonly></td></tr>
							<tr><td>EUR&nbsp;/&nbsp;USD</td><td><input class="s2" type="text" value="<?=$kurs['ed']['pokup'];?>" readonly></td><td><input class="s2" type="text" value="<?=$kurs['ed']['prod'];?>" readonly></td></tr>
						</table>
					</td><td class="r"></td></tr>
					<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>
				</table>
			</div>

			<!-- Калькулятор -->
			<div class="block1">
				<table class="table1" width="100%">
					<tr class="header1"><td class="tl"></td><td class="t"></td><td class="tr"></td></tr>
					<tr class="header1"><td class="l"></td><td class="data">
						Калькулятор валют
					</td><td class="r"></td></tr>
					<tr><td class="l"></td><td class="data">
						<table class="table2" cellpadding="2">
							<tr><td></td><td align="center">купить</td><td align="center">продать</td></tr>
							<tr><td>RUB</td><td><input type="text" id="rur_bay" name="rur_bay" onKeyUp="calc1_key(this,'<?=$kurs['usd']['pokup'];?>','<?=$kurs['eur']['pokup'];?>',1);"></td><td><input type="text" name="rur_sale" onKeyUp="calc1_key(this,'<?=$kurs['usd']['prod'];?>','<?=$kurs['eur']['prod'];?>',4);"></td><td></td></tr>
							<tr><td>USD</td><td><input type="text" id="usd_bay" name="usd_bay" onKeyUp="calc1_key(this,'<?=$kurs['usd']['prod'];?>','<?=$kurs['ed']['pokup'];?>',2);"></td><td><input type="text" name="usd_sale" onKeyUp="calc1_key(this,'<?=$kurs['usd']['pokup'];?>','<?=$kurs['ed']['pokup'];?>',5);"></td><td>&nbsp;</td></tr>
							<tr><td>EUR</td><td><input type="text" id="eur_bay" name="eur_bay" onKeyUp="calc1_key(this,'<?=$kurs['ed']['prod'];?>','<?=$kurs['eur']['prod'];?>',3);"></td><td><input type="text" name="eur_sale" onKeyUp="calc1_key(this,'<?=$kurs['ed']['pokup'];?>','<?=$kurs['eur']['pokup'];?>',6);"></td><td><a href="#" title="Сброс" onClick="calc1_clear(); return false;">C</a></td></tr>
						</table>
					</td><td class="r"></td></tr>
					<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>
				</table>
			</div>
			
			<div class="text3">
				text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text
				<br /><br />
				text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text
				<br /><br />
				text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text
			</div>
		</div>

		<div id="data_place">
			<div id="banner_01">
<script type="text/javascript">
	document.write("<div id=\"banner_01_top"+(isIE6?"_ie6":"")+"\">&nbsp;</div>");
</script>
<!-- 740x300 -->
				<a href="?dr=quick_contact.php" class="quick_contact" title="единая справочная: +7 (4912) 24-49-24; электронная почта: post@priovtb.com">&nbsp;</a>
				<a href="?dr=western.php" class="wu_01" title="Western Union">&nbsp;</a>
				<a href="?dr=contact.php" class="contact_01" title="Contact">&nbsp;</a>
				<a href="?dr=karta.php" class="masterc_01" title="Mastercard">&nbsp;</a>
			</div>
			
			<!-- маленькие банеры -->
			<div style="position: relative; width: 710px; height: 220px; margin-bottom: 20px;">
				<div id="banner_02">&nbsp;</div>
				<div id="banner_03">&nbsp;</div>
				<a href="?dr=safe.php" id="banner_04" title="сейфовые ячейки">&nbsp;</a>
				<a href="?dr=pdd.php" id="banner_05" title="Прием платежей в оплату штрафов за нарушение правил дорожного движения"></a>
			</div>

			<div style="position: relative; height: 219px; width: 100%">
			<!-- новости 2 -->
<?php
	$news=new news;
	$news->collect(1,null,4);
	for($i=0; $i<count($news->lines); $i++){
		$news->create_row(array('hrf'=>'?dr=news.php&id='.$news->lines[$i]['id'],'date'=>$news->lines[$i]['date'],'title'=>$news->lines[$i]['title']),$i);
	}
	$news->output('Новости');
	print($news->pr);
?>
				<!-- рекламка -->
				<div id="banner_06">
					&nbsp;
				</div>
			</div>


			<div class="text3">
				text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text
				<br /><br />
				text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text text
			</div>
		</div>

