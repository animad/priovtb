<?php
	include('files/functions/get.php');
	


	
	$kurs=get_kurs();
	
	//--- ������� �������
	$uri_pwr=get_uri();
	$uri_pwr_list=parse_mmenu_js($uri_pwr);
	
	
	
?>

		<script type="text/javascript" src="files/scripts/calc1.js"></script>
		<script type="text/javascript" src="files/scripts/pwr_generate.js"></script>
		
		<?php print $uri_pwr_list; ?>

		<div id="col_r">
			
			<div id="info_01" style="display: none">
				<div class="text2" style="position: absolute; top: 2px; right: 5px;">������ ����������</div>
				<div class="text2" style="position: absolute; top: 53px; right: 5px;">����������� �����</div>
				<a href="mailto:post@priovtb.com" class="email" title="post@priovtb.com">&nbsp;</a>
				
			</div>
			
			<!-- ����������� ������� -->
			<div class="block_asv">
				<div class="btn1"><a href="?dr=strahovka.php" class="hrf1">���������</a></div>
			</div>
			<div class="spacer_01"></div>
			
			<!-- �������� -->
			<a href="?dr=feedback.php" class="block_myasnikov" title="�������� ���� �����.">
				<div class="text1">�� ������ ��������<br />���� �����<br />� ��������<br />������������<br />� ����������<br />����-�������������.</div>
				<div class="text2">���������</div>
			</a>
			<div class="spacer_01"></div>

			<!-- ����� ����� -->
			<div class="block1">
				<table class="table1" width="100%">
					<tr class="header1"><td class="tl">&nbsp;</td><td class="t">&nbsp;</td><td class="tr">&nbsp;</td></tr>
					<tr class="header1"><td class="l"></td><td class="data" style="margin-bottom: 0; padding-bottom: 0;">
						����� �����
 					</td><td class="r"></td></tr>
					<tr class="header1"><td class="l"></td><td class="data" style="font-size: 10px; margin-top: 0; padding-top: 0;">
						<b><?=$kurs['date'];?></b>
					</td><td class="r"></td></tr>
					<tr><td class="l"></td><td class="data">
						<table class="table2" cellpadding="2">
							<tr><td></td><td align="center">������</td><td align="center">�������</td></tr>
							<tr><td>USD&nbsp;/&nbsp;RUB</td><td><input class="s2" type="text" value="<?=$kurs['pokup_ur'];?>" readonly></td><td><input class="s2" type="text" value="<?=$kurs['prod_ur'];?>" readonly></td></tr>
							<tr><td>EUR&nbsp;/&nbsp;RUB</td><td><input class="s2" type="text" value="<?=$kurs['pokup_er'];?>" readonly></td><td><input class="s2" type="text" value="<?=$kurs['prod_er'];?>" readonly></td></tr>
							<tr><td>EUR&nbsp;/&nbsp;USD</td><td><input class="s2" type="text" value="<?=$kurs['pokup_eu'];?>" readonly></td><td><input class="s2" type="text" value="<?=$kurs['prod_eu'];?>" readonly></td></tr>
						</table>
					</td><td class="r"></td></tr>
					<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>
				</table>
			</div>
			<div class="spacer_01"></div>

			<!-- ����������� -->
			<div class="block1" style="display: none;">
				<table class="table1" width="100%">
					<tr class="header1"><td class="tl"></td><td class="t"></td><td class="tr"></td></tr>
					<tr class="header1"><td class="l"></td><td class="data">
						����������� �����
					</td><td class="r"></td></tr>
					<tr><td class="l"></td><td class="data">
						<table class="table2" cellpadding="2">
							<tr><td></td><td align="center">������</td><td align="center">�������</td></tr>
							<tr><td>RUB</td><td><input type="text" id="rur_bay" name="rur_bay" onKeyUp="calc1_key(this,'<?=$kurs['usd']['pokup'];?>','<?=$kurs['eur']['pokup'];?>',1);"></td><td><input type="text" name="rur_sale" onKeyUp="calc1_key(this,'<?=$kurs['usd']['prod'];?>','<?=$kurs['eur']['prod'];?>',4);"></td><td></td></tr>
							<tr><td>USD</td><td><input type="text" id="usd_bay" name="usd_bay" onKeyUp="calc1_key(this,'<?=$kurs['usd']['prod'];?>','<?=$kurs['ed']['pokup'];?>',2);"></td><td><input type="text" name="usd_sale" onKeyUp="calc1_key(this,'<?=$kurs['usd']['pokup'];?>','<?=$kurs['ed']['pokup'];?>',5);"></td><td>&nbsp;</td></tr>
							<tr><td>EUR</td><td><input type="text" id="eur_bay" name="eur_bay" onKeyUp="calc1_key(this,'<?=$kurs['ed']['prod'];?>','<?=$kurs['eur']['prod'];?>',3);"></td><td><input type="text" name="eur_sale" onKeyUp="calc1_key(this,'<?=$kurs['ed']['pokup'];?>','<?=$kurs['eur']['pokup'];?>',6);"></td><td><a href="#" title="�����" onClick="calc1_clear(); return false;">C</a></td></tr>
						</table>
					</td><td class="r"></td></tr>
					<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>
				</table>
			</div>
			
			<div class="text3" style="position: relative; width: 100%;">
<?php
	$news=new news;
	$news->collect(1,null,4);
	for($i=0; $i<count($news->lines); $i++){
		$news->create_row(array('hrf'=>'?dr=news.php&id='.$news->lines[$i]['id'],'date'=>$news->lines[$i]['date'],'title'=>$news->lines[$i]['title']),$i);
	}
	$news->output('�������','240px');
	print($news->pr);
?>

			</div>
			<div class="spacer_01"></div>
			
			<!-- ���� ������������ -->
<?php
	$user1=new users;
	if(isset($_SESSION['user'])){
		print $user1->form2();
	}else{ print $user1->form1(); }
?>
			<div class="spacer_01"></div>
			
		</div>

		<div id="data_place">
			<div id="banner_01">
<script type="text/javascript">
	document.write("<div id=\"banner_01_top"+(isIE6?"_ie6":"")+"\">&nbsp;</div>");
</script>        
<!-- 740x300 -->
				<a href="?dr=rekvizit.php" class="quick_contact" title="������ ����������: +7 (4912) 24-49-24; ����������� �����: post@priovtb.com">&nbsp;</a>
				<script type="text/javascript" src="files/scripts/running_ban.js"></script>
				<a href="/?dr=vklad.php" class="btn1" title="������ ��� ���">&nbsp;</a>
				<a href="/?dr=rko.php" class="btn2" title="������ ��� ������ �������">&nbsp;</a>
			</div>
			
			<!-- ��������� ������ -->
			<div style="position: relative; width: 710px; height: 220px; margin-bottom: 20px;">
				<a href="?dr=coord.php&m=bankomats" id="banner_02">&nbsp;</a>
				<a href="?dr=coord.php&m=terminals" id="banner_03">&nbsp;</a>
				<a href="?dr=info_20101220.php" id="banner_04"><span>���� �������� &mdash;<br />����������� �����<br />� ���������������� �����<br />������������� �������� ����������� �����.<br /><br /><div class="hrf5">���������</div></span></a>
				<a href="?dr=pdd.php" id="banner_05" title="����� �������� � ������ ������� �� ��������� ������ ��������� ��������"></a>
			</div>

			
			<div class="block">
				<div class="bg">
					<div style="position: relative; width: 702px;" id="box1">
						<span id="ob_collect"></span>
					</div>
					<script>pwr_generate();</script>
				</div>
			</div>

		</div>

