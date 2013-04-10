<script type="text/javascript">
	var act_pool=null;
	var pool=new Array("layer_s1","layer_s2","layer_s3","layer_s4","layer_s5","layer_s6","layer_s7","layer_s8","layer_s9","layer_s10","layer_s11","layer_s12","layer_s13","layer_s14","layer_s15");
</script>

<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("about",0,"<?=$_GET['dr'];?>",0,1);</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title --><script type="text/javascript">if(current_page!=null && typeof(current_page.title)!="undefined"){ document.writeln("<h1>"+current_page.title+"</h1>"); }</script><!-- END page title -->

<!-- BEGIN -->

<div id="layer_s1" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s1.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s2" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s2.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s3" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s3.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s4" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s4.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s5" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s5.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>

</div>

<div id="layer_s6" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s6.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s7" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s7.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s8" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s8.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s9" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s9.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s10" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s10.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s11" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s11.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s12" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s12.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>
</div>

<div id="layer_s13" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s13.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>

</div>

<div id="layer_s14" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s14.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>

</div>

<div id="layer_s15" style="position: relative; display: none">
<?php
	$fln='pool/docs/15let_s15.php';
	if(file_exists($fln) && filesize($fln)){ include($fln); }
?>

</div>

<div id="data_place">
<!-- BEGIN submenu -->
	<script type="text/javascript">
		submenu_create(mmenu_seek("let15"),0,null,0,2,2);
		<?=(isset($_GET['s'])?'change_layer("layer_s'.$_GET['s'].'");':'');?>
	</script>
<!-- END submenu -->
</div>
<!-- END -->
</div>