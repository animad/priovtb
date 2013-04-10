<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	function smilist(){
		$q='select * from `smi` where `on`="1" order by `date` desc, `id` desc';
		$res=mysql_query($q);
		if(mysql_errno()<1 && mysql_num_rows($res)>0){
			$j1=0;
			while($row=mysql_fetch_assoc($res)){
				$fln='pool/files/smi/'.trim($row['file']);
				$fl_size=round(filesize($fln)/1024*10)/10;
				$data[]='<li'.colrow($j1++).' style="margin-bottom: 5px;">'.
				            '<a href="'.$fln.'">'.
				                ''.date2str($row['date']).' - <b>'.output($row['title'],null,30).'</b> -&nbsp;<i>скачать&nbsp;файл&nbsp;('.$fl_size.'&nbsp; б)</i><br />'.
								''.output($row['publicate']).'<br/>'.
								'<img src="files\images\point_blank.gif" height="5" border="0"><br />'.
								'<i>'.pr($row['story']).'</i>'.
							'</a>'.
						'</li>';
			}
		}
		
		return '<ul class="smenu3">'."\r\n".implode("\r\n",$data).'</ul>';
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

<?php print smilist();?>

<!-- END -->
</div>