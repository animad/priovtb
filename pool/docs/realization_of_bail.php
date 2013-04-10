<?php

	include('files/functions/realization_of_property.php');
	include('files/functions/parse_ini_string.inc');
	
	if (!isset($_GET['p'])){
//--- если залоговый объект не выбран, то отображаем КАТЕГОРИИ и ОБЪЕКТЫ
		
		//--- вставляем информацию ДО СПИСКА
		$fln='pool/docs/realization_of_bail_top-part.php';
		if(file_exists($fln) && filesize($fln)){
			$fp=fopen($fln,'a+');
			$data2[]=fread($fp,filesize($fln));
			fclose($fp);
		}

		$res=rp::property_list2();
		if (true===$res[0]){
			$data2[]='<br />';
			$data2[]=$res[1];
			$data2[]='<br /><br />';
		}
		
		//--- вставляем информацию ПОСЛЕ СПИСКА
		$fln='pool/docs/realization_of_bail_bottom-part.php';
		if(file_exists($fln) && filesize($fln)){
			$fp=fopen($fln,'a+');
			$data2[]=fread($fp,filesize($fln));
			fclose($fp);
		}
		
	}else{
//--- если выбран объект со страницей-описанием, открываем ЭТУ страницу
		
		$res=rp::property_get(array('pid'=>$_GET['p']));
		
		$data2[]='<div class="path_bar"><a href="?dr='.$_GET['dr'].'">&nbsp;&raquo;&nbsp;Назад</a></div>';
		$data2[]='<h2>'.output($res[1]['title']).'</h2>';
		$data2[]='<br />';
		$data2[]=$res[1]['page'];
		
		$p='pool/images/rp/';
		for ($i=0; $i<count($res[1]['images']); $i++){
			$img=$res[1]['images'][$i];
			if (file_exists($p.$img['filename_thumb']) && filesize($p.$img['filename_thumb'])){
				$data3[]='<li class="btn_image">'.
							 '<img src="/'.$p.$img['filename_thumb'].'" class="img_thumb" border="0">'.
							 (file_exists($p.$img['filename_preview']) && filesize($p.$img['filename_preview'])?'<img src="/'.$p.$img['filename_preview'].'" class="img_preview" border="0"">':'').
						 '</li>';
			}
		}
		if (isset($data3)){
			$data2[]='<ul class="property_pics">'.
						 implode('',$data3).
						 '<div class="preview_box"><div class="dark"></div><div class="img"></div><div class="btn_next"><div class="ico"><div class="info">далее</div></div></div><div class="btn_prev"><div class="ico"><div class="info">назад</div></div></div><div class="btn_close"><div class="ico"><div class="info">закрыть</div></div></div></div>'.
					 '</ul>';
		}
		
		
		
	}
	
	if (isset($data2)){
		if (is_array($data2)){
			$data2=implode('',$data2);
		}
	}else{
		$data2='';
	}
?>

<script type="text/javascript" src="files/scripts/jquery.js"></script>
<script type="text/javascript" src="pool/scripts/rp.js"></script>
<link href="pool/styles/rp.css" rel="stylesheet" style="text/css" media="screen">
<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("biz",0,"<?=$_GET['dr'];?>");</script><!-- END submenu -->
</div>
<div id="data_place">

<!-- BEGIN -->

<h1>Реализация залогового имущества<br />клиентами Прио-Внешторгбанка</h1>
<?php
	print $data2;
?>
	
<!-- END -->
</div>
