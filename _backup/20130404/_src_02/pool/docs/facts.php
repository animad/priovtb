<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	function factslist(){
		$q='select * from `facts` where `on`="1" order by `date` desc, `id` desc';
		$res=mysql_query($q);
		if(mysql_errno()<1 && mysql_num_rows($res)>0){
			
			$pglist=new pageList;
			$pglist->get($res,20,$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),10,'desc');
			
			reset($pglist->list);
			while(list($key,$row)=each($pglist->list)){
				$data[]='<li'.colrow($j1++).'><a href="?dr='.$_GET['dr'].'&id='.$row['id'].'"><b>'.date2str($row['date']).'</b> Ц '.output($row['story'],200,15,true).'</a></li>';
			}
		}
		
		return (trim($pglist->pglist)!=''?$pglist->pglist.'<br />':'').'<ul class="smenu2">'.implode('',$data).'</ul>'.(trim($pglist->pglist)!=''?'<br />'.$pglist->pglist:'');
	}
	
	function factprn($id=null){
		if($id!=null){
			$q='select * from `facts` where `id`="'.$id.'" limit 1';
			$res=mysql_query($q);
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				$row=mysql_fetch_assoc($res);
				$data[]='<p align="right"><a href="'.(isset($_SERVER['HTTP_REFERER'])?'javascript:history.back(1);':'?dr='.$_GET['dr']).'" class="hrf6">назад</a></p>';
				$data[]=pr($row['story'],null,15,true);
				
				return implode('',$data);
			}
		}
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

<?php
	if(isset($_GET['id'])){
		print factprn($_GET['id']);
	}else{ print factslist(); }
?>

<!-- END -->
</div>