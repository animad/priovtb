<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("about",0,null);</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title --><h1>Новости</h1><!-- END page title -->

<?php
	$news=new news;
	$news->read($_GET['id']);

?>

<div style="position: relative;">
	<div style="margin-left: 20px;"><i><?php print date2str($news->lines[0]['date']); ?></i></div>
	<div style="position: absolute; top: 0; right: 20px;">
		<a href="/?dr=news_all.php" class="hrf9">все новости</a>
	</div>
</div>
<br />
<div><b><i><?php print pr($news->lines[0]['preview']); ?></i></b></div>
<br />
<?php print '<p>'.pr($news->pr,null,null,true).'</p>'; ?>


</div>
