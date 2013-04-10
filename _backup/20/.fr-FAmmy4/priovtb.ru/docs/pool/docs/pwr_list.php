<?php

	//--- рейтинг страниц
	$uri_pwr=get_uri();
	$uri_pwr_list=parse_mmenu_js($uri_pwr);

?>

<script type="text/javascript" src="files/scripts/pwr_generate.js"></script>
<div id="data_place2">

<!-- BEGIN -->
<?php print $uri_pwr_list; ?>
<h1>Рейтинг разделов сайта</h1>
<div class="block1">
	<div style="position: relative;" id="box1">
		<span id="ob_collect"></span>
	</div>
</div>
<script>pwr_generate(2,null,null)</script>


<!-- END -->
</div>