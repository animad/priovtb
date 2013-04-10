<?php
	$j1=0;

	//--- сообщения об отработанных ошибках
	$t=array('category_update');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}

	if(isset($_SESSION['er']['category_update'])){
		$back['title']=isset($_SESSION['er']['category_update']['title']) && trim($_SESSION['er']['category_update']['title'])!=''?trim($_SESSION['er']['category_update']['title']):'';
		$back['pid']=isset($_SESSION['er']['category_update']['pid']) && trim($_SESSION['er']['category_update']['pid'])!=''?trim($_SESSION['er']['category_update']['pid']):'';
	}else{
		if (isset($_GET['pid'])){
			$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.input($_GET['pid']).'" limit 1';
			$res=mysql_query($q);
			print mysql_error();
			if (mysql_errno()==0 && mysql_num_rows($res)>0){
				$row=mysql_fetch_assoc($res);
				$back['title']=output($row['title']);
				$back['pid']=output($row['id']);
			}
		}
	}
	
	if (''!=trim($back['title']) && ''!=trim($back['pid'])){
		$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=category_update" method="post" style="padding: 0;">'.
					 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
					 '<input type="hidden" name="pid" value="'.$back['pid'].'">'.
			         '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
						 '<tr class="odd"><td>Название категории</td><td><input type="text" name="title" style="width: 300px" value="'.$back['title'].'"></td></tr>'.
					 '</table>'.
					 '<p align="center"><input type="submit" value="Ок"></p>'.
				 '</form>';
	}else{
		$data1[]=err_show('Данные для редактирования отсутствуют');
	}

?>
