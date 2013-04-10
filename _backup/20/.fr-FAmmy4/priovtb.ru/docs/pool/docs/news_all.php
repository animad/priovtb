<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("about",0,null);</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title --><h1>Новости</h1><!-- END page title -->
<?php
	$news=new news;
	$news->nlist();
	print($news->pr);
?>
</div>
