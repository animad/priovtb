<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	function affilist(){
		$q='select * from `affilate` where `on`="1" order by `date` desc, `id` desc';
		$res=mysql_query($q);
		if(mysql_errno()<1 && mysql_num_rows($res)>0){
			while($row=mysql_fetch_assoc($res)){
				$fln='pool/files/affilate/'.trim($row['file']);
				$fl_size=round(filesize($fln)/1024*10)/10;
				$data[]='<li'.colrow($j1++).'><a href="'.$fln.'">'.output($row['title']).' <i>('.$fl_size.' Κα)</i></a></li>';
			}
		}
		
		return '<ul class="smenu3">'.implode('',$data).'</ul>';
	}
	
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
		document.title=document.title+" | "+(current_page!=null && typeof(current_page.title_p)!="undefined"?current_page.title_p+", ":"")+current_page.title;
	}
</script>
<!-- END page title -->

<!-- BEGIN -->

<?php print affilist();?>

<!-- END -->
</div>