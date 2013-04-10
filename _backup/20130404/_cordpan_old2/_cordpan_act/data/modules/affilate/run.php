<?php

	//--- переменные ПАНЕЛИ
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ОБЩИЕ переменные МОДУЛЕЙ
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc','mysql.inc','err.inc'));
	//--- переменные МОДУЛЯ
	$_modvars=vars_parse_batch($_dir['mod'],array('vars.inc'));
	
	if($mod->box[$_GET['dr']]['func']){
		while(list($key,$val)=each($mod->box[$_GET['dr']]['func'])){
			eval('$val='.$val.';');
			if(file_exists($val) && filesize($val)){ include($val); }
		}
	}
	$link=connect($_comvars['mysql']);
	
	if(!isset($_GET['m'])){ $_GET['m']=$mod->box[$_GET['dr']]['config']['default_section']; }
//	if(!isset($_SESSION['user']['status']) || trim($_SESSION['user']['status'])!='admin'){ $_GET['m']='secure_02'; } //---сюда допускается только ADMIN
	if(!isset($_SERVER['HTTP_REFERER'])){ $_GET['m']='secure_01'; } //---на страничку пришли со строки адреса

	//--- создание путей
	$ans=path_create($_modvars['place']['store']);
	$ans=path_create($_modvars['place']['log']);
	
	switch ($_GET['m']){
//--- пользовательские секции
		case 'start':
			$data1[]='<h1>Аффилированные лица</h1>';

			//--- сообщения об отработанных ошибках
			$t=array('visibility','delete','upload');
			for($i=0;$i<count($t);$i++){
				if(isset($_SESSION['er'][$t[$i]]['erm'])){
					$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
				}
			}
			
			if(isset($_SESSION['er']['upload'])){
				$new_title=isset($_SESSION['er']['upload']['title']) && trim($_SESSION['er']['upload']['title'])!=''?trim($_SESSION['er']['upload']['title']):'';
			}else{
				$new_title='';
			}
			$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=upload" method="post" style="padding: 0;">'.
						 '<p align="center"><b>Новый список</b></p>'.
//						 '<input type="hidden" name="MAX_FILE_SIZE" value="1500000">'.
			             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
						     '<tr class="odd"><td>Заголовок в списке</td><td><input type="text" name="title" style="width: 300px" value="'.$new_title.'"></td></tr>'.
						     '<tr class="even"><td>Файл</td><td><input type="file" style="width: 300px" name="file"></td></tr>'.
						 '</table>'.
						 '<p align="center"><i>ВНИМАНИЕ. Объем одного файла не должен превышать 2 Мб.</i></p>'.
						 '<p align="center"><input type="submit" value="Ок"></p>'.
					 '</form>';

			//--- список подгруженных списков
			$q='select * from `affilate` order by `date` desc, `id` desc';
			$res=mysql_query($q);
			if(mysql_errno()<1){
				if(mysql_num_rows($res)>0){
					$data1[]='<p align="center"><b>Подгруженные списки</b></p>';
					$j1=0;
					while($row=mysql_fetch_assoc($res)){
						if(($j1++)%2){
							$bg='class="odd"';
							if($row['on']==0){ $bg='class="odd_red"'; }
						}else{
							$bg='class="even"';
							if($row['on']==0){ $bg='class="even_red"'; }
						}
						
						if($row['on']==1){
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=0" class="hrf3" title="вылючить">выкл</a>';
						}else{
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=1" class="hrf3" title="включить">вкл</a>';
						}
						
						$data2[]='<tr '.$bg.'>'.
						             '<td>'.$row['id'].'</td>'.
						             '<td style="padding: 0;">'.$t_show.'</td>'.
									 '<td style="padding: 0;"><a href="http://'.$_SERVER['SERVER_NAME'].'/'.trim($_modvars['place']['store']).'/'.trim($row['file']).'" class="hrf3" target="_blank">'.output($row['title']).'</a></td>'.
									 '<td style="padding: 0;"><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=delete&id='.$row['id'].'" onClick="return confirm(\'Удалить список под номером '.$row['id'].'\')?true:false;" class="hrf4" title="Удалить">XX</a></td>'.
								 '</tr>';
					}
				}else{ $err='Список пуст'; }
			}else{ $err='Ошибка при получении списка.'; }
			
			if(isset($err)){
				$data1[]=err_show($err);
				unset($err);
			}elseif(isset($data2)){
				$data1[]='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.implode('',$data2).'</table>';
				unset($data2);
			}
			
			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;
		case 'visibility':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='update `affilate` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $err=mysql_error(); }
			}else{ $err=$_commvars['err'][3]; }
			
			if(isset($erm)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
	
		break;
		case 'delete':
			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='select * from `affilate` where `id`="'.trim($_GET['id']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_num_rows($res)>0){
						$row=mysql_fetch_assoc($res);
						
						$fln=$_dir['site'].$_modvars['place']['store'].'/'.$row['file'];
						if(file_exists($fln)){
							if(is_writeable($fln)){
								if(unlink($fln)){
									$q='delete from `affilate` where `id`="'.trim($_GET['id']).'"';
									$res=mysql_query($q);
									if(mysql_errno()<1){
										if(mysql_affected_rows()<1){ $err='Внимание! Запись о списке не удалена.'; }
									}else{ $err=mysql_error(); }
								}else{ $err='Ошибка! Невозможно удалить файл списка.'; }
							}else{ $err='Ошибка! Не удалось изменить файл списка.'; }
						}else{ $err='Ошибка! Файл списка не обнаружен.'; }
						
					}else{ $err='Внимание! Список с номером '.trim($_GET['id']).' не обнаружен.'; }
				}else{ $err='Ошибка! В процессе поиска списка.'; }
			}else{ $err=$_comvars['err'][3]; }
			
 			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'upload':
			if(isset($_POST['title']) && isset($_FILES['file'])){
				if(trim($_POST['title'])!='' && trim($_FILES['file']['name'])!=''){
					if($_FILES['file']['error']<1){
						if($_FILES['file']['size']<'1500000'){
							$ud=$_modvars['place']['store'];
							if(isset($ud) && trim($ud!='')){
								file_upload($ud);
							}else{ $err='Каталог загрузки не определен'; }
						}else{ $err='Размер файла превышает допустимые пределы'; }
					}else{ $err='Файл не загружен'; }
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }

			if(!isset($err)){
				$q='insert into `affilate` set
				    `date`=NOW(),
					`title`="'.addslashes($_POST['title']).'",
					`file`="'.$_FILES['file']['name'].'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()<1){ $err='Ошибка! Запись не добавлена.'; }
				}else{ $err=mysql_error(); }
			}
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;

//--- системные секции
		case 'secure_01': //--- пришли со строки адреса
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
		break;
		case 'secure_02': //--- допускается только ADMIN
			$data1='<p align="center">- доступ только администраторам -</p>';
		break;
		default: //стартовая секция по умолчанию
			print '<p align="center">- WELCOME screen -</p>';
		break;
	}
	if(isset($data1)){ print (is_array($data1)?implode('',$data1):$data1); }

	close($link);
	
?>
