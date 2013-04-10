<script type="text/javascript">
	var act_pool=null;
	var pool=new Array("layer_s1","layer_s2","layer_s3","layer_s4","layer_s5","layer_s6","layer_s7","layer_s8","layer_s9");
</script>

<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("about",0,"<?=$_GET['dr'];?>",0,1);</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title --><script type="text/javascript">if(current_page!=null && typeof(current_page.title)!="undefined"){ document.writeln("<h1>"+current_page.title+"</h1>"); }</script><!-- END page title -->

<p>6 декабря 2007 года исполняется 18 лет со дня образования первого самостоятельного рязанского банка.</p>
<p>Сегодня Прио-Внешторгбанк является одним из крупнейших региональных банков России. Его офисы можно найти практически в каждом районе города и области.</p>
<p>Сделать вклад или оплатить услуги, оформить пластиковую карту или арендовать сейфовую ячейку, отправить деньги родным и близким – все это и многое другое Вы можете сделать в Прио-Внешторгбанке.</p>
<p>К своему дню рождения Прио-Внешторгбанк начинает несколько интересных и совершенно новых проектов, посвященных истории денег и финансов, истории Прио-Внешторгбанка. Теперь у Вас появится возможность узнать о жизни банка, что называется, из первых рук. Получать ответы на интересующие вопросы от ведущих специалистов банка.</p>
<p>Ну и какой же день рождения без подарков? К своему 18-летию Прио-Внешторгбанк объявляет конкурс для знатоков. Ищите на страницах еженедельника «Телесемь» вопросы викторины, ответив на которые, Вы сможете получить призы. Из номера в номер количество вопросов будет увеличиваться, но вместе с тем, будет увеличиваться и ценность приза.</p>
<br />

<!-- BEGIN -->

<div id="layer_s1" style="position: relative; display: none">
<?php
	$fln='pool/docs/18let_s1.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s2" style="position: relative; display: none">
<?php
	$fln='pool/docs/18let_s2.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s3" style="position: relative; display: none">
<?php
	$fln='pool/docs/18let_s3.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s4" style="position: relative; display: none">
<?php
	$fln='pool/docs/18let_s4.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s5" style="position: relative; display: none">
<?php
	$fln='pool/docs/18let_s5.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>

</div>

<div id="layer_s6" style="position: relative; display: none">
<?php
	$fln='pool/docs/18let_s6.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s7" style="position: relative; display: none">
<?php
	$fln='pool/docs/18let_s7.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s8" style="position: relative; display: none">
<?php
	$fln='pool/docs/18let_s8.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s9" style="position: relative; display: none">
<?php
	$fln='pool/docs/18let_s9.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="data_place">
<!-- BEGIN submenu -->
	<script type="text/javascript">
		submenu_create(mmenu_seek("let18"),0,null,0,2,2);
		<?=(isset($_GET['s'])?'change_layer("layer_s'.$_GET['s'].'");':'');?>
	</script>
<!-- END submenu -->
</div>
<!-- END -->
</div>