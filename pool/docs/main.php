<?php
	include('files/functions/get.php');

	$kurs=get_kurs();
	
	//--- ������� �������
	$uri_pwr=get_uri();
	$uri_pwr_list=parse_mmenu_js($uri_pwr);
	
//--- ���������� RANAWAY_BANNERS
	$fln='pool/blocks/runaway/banners.php';
	if (file_exists($fln) && filesize($fln)){
		ob_start();
		include($fln);
		$runaway_banners=ob_get_contents();
		ob_end_clean();
	}else{ $runaway_banners='<!-- ������� runaway_banners �� ������� -->'; }
	
?>

		<script type="text/javascript" src="files/scripts/calc1.js"></script>
		<script type="text/javascript" src="files/scripts/pwr_generate.js"></script>

		<script type="text/javascript" src="pool/scripts/banner_04.js"></script>
		<link href="pool/styles/banner_04.css" rel="stylesheet" style="text/css">

		<link href="pool/styles/main.css" rel="stylesheet" style="text/css">
		<link href="pool/blocks/main_main-banner/styles.css" rel="stylesheet" style="text/css">
		
		
		
		
		<?php print $uri_pwr_list; ?>

	<div class="main">

<!-- ������� ��������� ���� -->

		<div class="main_main-banner_box">
<!-- ������� ��������� ������ -->
			<div class="sliding_row">
				<div class="slide_01 main_building"><img src="pool/blocks/main_main-banner/main_banner_20130405_01.png" class="bg"></div>
			</div>
<!-- ���� ���������� -->
			<a href="/?dr=coord.php&m=bankomats" class="jbtn banner btn_banner_atm" title="���� ���������� - ���� ����������.">
				<div class="box">
					<div class="body"></div>
				</div>
			</a>
<!-- ���� ������� ���������� ���������� -->
			<div class="banner q-info_phone-number">
				<div class="box">
					<div class="body"></div>
				</div>
			</div>
			<a href="mailto:post@priovtb.com" class="jbtn banner q-info_email" title="�������� ���������">
				<div class="box">
					<div class="body"></div>
				</div>
			</a>

<!-- ���� ���������� -->
			<a href="/?dr=coord.php&m=terminals" class="jbtn banner btn_banner_trm" title="���� ���������� - ���� ����������.">
				<div class="box">
					<div class="body"></div>
				</div>
			</a>

<!-- ��������� ����-������ -->
			<?php print $runaway_banners; ?>
<!-- ����� ��� ������ ������� -->
			<div class="r-col_mask"></div>
		</div>
		
<!-- ������ ������� *** ������ -->

		<div class="col_r">
		
<!-- ���� � ����� �� -->
			<a href="https://pc.priovtb.com" target="_blank" class="jbtn banner btn_kb-enter" title="����� ���������� � ����-������. �������� ���� ��� ���.">
				<div class="box">
					<div class="body"></div><div class="label_new"></div><div class="priosha-hairs"></div>
				</div>
			</a>

<!-- ������ ����� ������� -->
			<div class="spacer_01"></div>

<!-- ����� ����� -->
			<div class="block1">
				<table class="table1" width="100%">
					<tr class="header1"><td class="tl">&nbsp;</td><td class="t">&nbsp;</td><td class="tr">&nbsp;</td></tr>
					<tr class="header1"><td class="l"></td><td class="data" style="margin-bottom: 0; padding-bottom: 0;">
						����� �����
 					</td><td class="r"></td></tr>
					<tr class="header1"><td class="l"></td><td class="data" style="font-size: 10px; margin-top: 0; padding-top: 0;">
						<b><?php print $kurs['date']; ?></b>
					</td><td class="r"></td></tr>
					<tr><td class="l"></td><td class="data">
						<table class="table2" cellpadding="2">
							<tr><td></td><td align="center">�������</td><td align="center">�������</td></tr>
							<tr><td>USD&nbsp;/&nbsp;RUB</td><td><input class="s2" type="text" value="<?php print $kurs['pokup_ur']; ?>" readonly></td><td><input class="s2" type="text" value="<?php print $kurs['prod_ur']; ?>" readonly></td></tr>
							<tr><td>EUR&nbsp;/&nbsp;RUB</td><td><input class="s2" type="text" value="<?php print $kurs['pokup_er']; ?>" readonly></td><td><input class="s2" type="text" value="<?php print $kurs['prod_er'];?>" readonly></td></tr>
							<tr><td>EUR&nbsp;/&nbsp;USD</td><td><input class="s2" type="text" value="<?php print $kurs['pokup_eu']; ?>" readonly></td><td><input class="s2" type="text" value="<?php print $kurs['prod_eu'];?>" readonly></td></tr>
						</table>
					</td><td class="r"></td></tr>
					<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>
				</table>
			</div>

<!-- ������ ����� ������� -->
			<div class="spacer_01"></div>
			
<!-- ����������� ������� -->
			<div class="block_asv">
				<div class="btn1"><a href="?dr=strahovka.php" class="hrf1">���������</a></div>
			</div>

<!-- ������ ����� ������� -->
			<div class="spacer_01"></div>
			
<!-- ������� -->
			<div class="text3" style="position: relative; width: 100%;">
<?php
	$news=new news;
	$news_cnt=3; //--- ���������� ��������� �����
	$news->collect(1,null,$news_cnt);
	for($i=0; $i<count($news->lines); $i++){
		$news->create_row(array('hrf'=>'?dr=news.php&id='.$news->lines[$i]['id'],'date'=>$news->lines[$i]['date'],'title'=>$news->lines[$i]['title']),$i);
	}
	$news->output('�������','240px');
	print($news->pr);
?>
			</div>

<!-- ������ ����� ������� -->
			<div class="spacer_01"></div>

<!-- �������� ���� ����� -->
			<a href="?dr=feedback.php" class="block_myasnikov" title="�������� ���� �����.">
				<div class="text1">�� ������ ��������<br />���� �����<br />� ��������<br />������������<br />� ����������<br />����-�������������.</div>
				<div class="text2">���������</div>
			</a>

<!-- ������ ����� ������� -->
			<div class="spacer_02"></div>
		</div>
		
<!-- ������ ������� *** ����� -->

<!-- ����������� ������� *** ����� -->

		<div class="col_c">
			
<!--- ����������� ���� �������� -->
			<div class="banners_block">
				
				<a href="https://pc.priovtb.com" target="_blank" class="jbtn banner banner_04" title="����� ���������� � ����-������. �������� ���� ��� ���.">
					<div class="box">
						<div class="body"></div><div class="bottom_clip"></div><div class="right_clip"></div>
					</div>
				</a>

				<a href="/?dr=coord.php&m=bankomats" class="jbtn banner banner_02" style="display: none;" title="���� ���������� - ���� ����������.">
					<div class="box">
						<div class="body"></div>
					</div>
				</a>
				<a href="/?dr=vklad.php" class="jbtn banner banner_02" title="������ ��� ���.">
					<div class="box">
						<div class="body"></div>
					</div>
				</a>
				<a href="/?dr=coord.php&m=terminals" class="jbtn banner banner_03" style="display: none;" title="���� ���������� - ���� ����������.">
					<div class="box">
						<div class="body"></div>
					</div>
				</a>
				<a href="/?dr=rko.php" class="jbtn banner banner_03" title="������ ��� ������ �������.">
					<div class="box">
						<div class="body"></div>
					</div>
				</a>

				<div class="banner banner_05" title="����� �������� ��� ������ ������� �� ��������� ������ ��������� ��������.">
					<div class="box">
						<div class="body"></div>
					</div>
				</div>

			</div>

<!-- ������ ����� ������� -->
			<div class="spacer_01"></div>

<!-- ���������� ������ -->
			<div class="block" style="text-align: left;">
				<div class="bg">
					<div style="position: relative; width: 702px;" id="box1">
						<span id="ob_collect"></span>
					</div>
					<script>pwr_generate();</script>
				</div>
			</div>

<!-- ������ ����� ������� -->
			<div class="spacer_01"></div>

<!-- ���������� ��� ������������ ���������� -->
			<div class="block1" style="display: none1;">
				<table class="table1" width="100%">
					<tr class="header1"><td class="tl">&nbsp;</td><td class="t">&nbsp;</td><td class="tr">&nbsp;</td></tr>
					<tr class="header1"><td class="l"></td><td class="data" style="font-size: 10px; margin: 3px;">
						"����������, ������������ � ������������ � ������������ ��������� � ��������� ���������� ���������� ����������� ������ �����, ������������ �������� ���� ������ �� 04 ������� 2011 �. � 11-46/��-�"
 					</td><td class="r"></td></tr>
					<tr><td class="l"></td><td class="data">
						<ul class="list4" style="margin-bottom: 0;">
							<li><a href="/?dr=eotchet.php">�������������� ����� �� ������ �������;</a></li>
							<li><a href="/?dr=facts.php">��������� � ������������ ������ � ��������, ������� ����� ������� ������������ ������� �� ��������� ������ �����;</a></li>
							<li><a href="/?dr=gotchet.php">������� ����������;</a></li>
							<li><a href="/?dr=gotchet.php">������� ������������� ����������;</a></li>
							<li><a href="/?dr=ustav.php">����� � ���� ���������� ���������;</a></li>
							<li><a href="/?dr=affil.php">�������� �� �������������� �����;</a></li>
							<li><a href="/?dr=vlijanie_na_priovtb.php">������ ���, ����������� ������������ (������ ��� ���������) ������� �� �������, ����������� �������� ���������� �����.</a></li>
						</ul>
					</td><td class="r"></td></tr>
					<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>
				</table>
			</div>
		
<!-- ������ ����� ������� -->
			<div class="spacer_02"></div>
		
		</div>

	</div>

