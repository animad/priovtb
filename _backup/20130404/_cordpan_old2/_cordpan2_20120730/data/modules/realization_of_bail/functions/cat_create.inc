<?php
	$j1=0;

	//--- сообщения об отработанных ошибках
	$t=array('categories_create_save');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}

	if(isset($_SESSION['er']['categories_create_save'])){
		$new_title=isset($_SESSION['er']['categories_create_save']['title']) && trim($_SESSION['er']['categories_create_save']['title'])!=''?trim($_SESSION['er']['categories_create_save']['title']):'';
	}else{
		$new_title='';
	}
	$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=categories_create_save" method="post" style="padding: 0;">'.
				 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
	             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
				     '<tr class="odd"><td>Название категории</td><td><input type="text" name="title" style="width: 300px" value="'.$new_title.'"></td></tr>'.
				 '</table>'.
				 '<p align="center"><input type="submit" value="Ок"></p>'.
			 '</form>';

?>
