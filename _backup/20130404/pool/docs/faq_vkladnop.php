<?php
	include('files/functions/faq.php');
	
	//--- ����� ���� �/�
	$_GET['id']=8;
	
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

<?php
	$faq=new faq;
	print $faq->collect($_GET['id']);

	print $data2;
?>

</div>
<!-- END -->