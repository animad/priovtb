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

	//--- данные полей и секций
	$t=array('visibility','create_save','edit_save'); //--- имена отработанных секций
	$t2=array('name','quantity','metal','weight','comments','url');

	//--- сообщения об отработанных ошибках
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){ $err_msg[$t[$i]]=err_show($_SESSION['er'][$t[$i]]['erm']); }else{ $err_msg[$t[$i]]=''; }
	}
	
	//--- служебные кнопки под разные секции
	// $_modvars['btn'][<$_GET['m']>][]=array(<ссылка кнопки>,<имя кнопки>);
	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create_ui','Создать');
	$_modvars['btn']['create_ui'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'Назад');
	$_modvars['btn']['edit'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'Назад');

	//--- заголовок страницы
	$data1[]='<h1>'.$mod->box[$_GET['dr']]['info']['title'].'</h1>';

	switch ($_GET['m']){
//--- пользовательские секции
//--- ИНТЕРФЕЙС ---
		case 'start':

			//--- создать новость
			
			//--- служебные кнопки
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}
	
			//--- создание информационного списка
			$q='select * from `monets` order by `id` desc';
			$res=mysql_query($q);
			if(mysql_errno()>0){ $err=mysql_error(); }
			
			//--- вывод ошибки или информационного списка
			if(isset($err)){
				$data1[]=err_show($err);
			}else{
				if(mysql_num_rows($res)>0){
					$j1=0;
					while($row=mysql_fetch_assoc($res)){
						if($row['on']==1){
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=0" class="hrf3" title="вылючить">выкл</a>';
						}else{
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=1" class="hrf3" title="включить">вкл</a>';
						}

						$data2[]='<tr '.colrow($j1++,$row['on']).' valign="top">'.
						             '<td>'.$row['id'].'</td>'.
									 '<td style="padding: 0;">'.$t_show.'</td>'.
//						             '<td>'.(trim($row['date'])!=''?date2str($row['date']):'').'</td>'.
						             '<td>'.output($row['name']).'</td>'.
						             '<td>'.output($row['quantity']).'</td>'.
						             '<td>'.output($row['metal']).'</td>'.
						             '<td>'.output($row['weight']).'</td>'.
						             '<td style="padding: 0;"><a href="'.stripslashes(trim($row['url'])).'" target="_blank" class="hrf3">'.output($row['comments']).'</a></td>'.
						             '<td style="padding: 0;">'.
									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit&id='.$row['id'].'" title="edit" class="hrf5">РР</a>'.
									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=delete&id='.$row['id'].'" title="delete" class="hrf5" onClick="return confirm(\'Монета &quot;'.output($row['name']).'&quot;.\r\n\r\nУдалить?\')">XX</a>'.
									 '</td>'.
								 '</tr>';
					}
					if(isset($data2)){
						$data1[]='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
						             '<tr class="header">'.
						                 '<td>#</td>'.
						                 '<td>show</td>'.
						                 '<td>наименование</td>'.
						                 '<td>качество</td>'.
						                 '<td>металл,<br />проба</td>'.
						                 '<td>содержание<br />химически чистого металла<br />не менее, г.</td>'.
										 '<td>описание монеты</td>'.
						                 '<td>&nbsp;</td>'.
									 '</tr>'.implode('',$data2).
								 '</table>';
						unset($data2);
					}
				}
			}
			
		break;
		case 'create_ui':
			$data1[]='<p align="center"><b>Создать</b></p>';

			//--- служебные кнопки
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}
			
//			$t1=array('create_save');
//			$t2=array('name','quantity','metal','weight','comments','uri');
			if(isset($_SESSION['er'][$t[1]])){
				while(list($key,$val)=each($t2)){
					$$val=isset($_SESSION['er'][$t[1]][$val])?$_SESSION['er'][$t[1]][$val]:'';
				}
			}else{
				while(list($key,$val)=each($t2)){ $$val=''; }
				$date=date('Y-m-d');
			}

			//--- выводим сообщение с ошибкой
			$data1[]=$err_msg[$t[1]];
			
			if(isset($err)){
				$data1[]=err_show($err);
			}else{
				$j1=0;
				$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create_save" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center" width="700px">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>наименование</td>'.
									 '<td><input style="width: 500px" type="text" name="name" value="'.$name.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>качество</td>'.
									 '<td>'.
									     '<select style="width: 500px" name="quantity">'.
										     '<option value="">---</option>'.
										     '<option value="Пруф" '.($quantity=='Пруф'?'selected':'').' >Пруф</option>'.
										     '<option value="АЦ" '.($quantity=='АЦ'?'selected':'').' >АЦ</option>'.
										 '</select>'.
									 '</td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>металл, проба</td>'.
									 '<td><input style="width: 500px" type="text" name="metal" value="'.$metal.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>содержание<br />химически чистого металла<br />не менее, г.</td>'.
									 '<td><input style="width: 500px" type="text" name="weight" value="'.$weight.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>описание монеты</td>'.
									 '<td><input style="width: 500px" type="text" name="comments" value="'.$comments.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>ссылка на<br />описание монеты</td>'.
									 '<td><input style="width: 500px" type="text" name="uri" value="'.$uri.'"></td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><input type="submit" value="Ок"></p>'.
						 '</form>';
			}


			
		break;
		
		case 'edit':
			$data1[]='<p align="center"><b>Редактировать</b></p>';

			//--- служебные кнопки
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}

			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				if(isset($_SESSION['er'][$t[2]])){
					while(list($key,$val)=each($t2)){
						$$val=isset($_SESSION['er'][$t[2]][$val])?$_SESSION['er'][$t[2]][$val]:'';
					}
				}else{
					$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.$_GET['id'].'" limit 1';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_num_rows($res)>0){
							$row=mysql_fetch_assoc($res);
							while(list($key,$val)=each($t2)){ $$val=isset($row[$val])?trim($row[$val]):''; }
						}else{ $err=$_comvars['err'][7]; }
					}else{ $err=$_comvars['err'][11]; }
				}
			}else{ $err=$_comvars['err'][1]; }

			//--- выводим сообщение с ошибкой
			$data1[]=$err_msg[$t[2]];
			
			if(isset($err)){
				$data1[]=err_show($err);
			}else{
				$j1=0;
				$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m='.$t[2].'" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="id" value="'.trim($_GET['id']).'">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center" width="700px">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>наименование</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[0].'" value="'.$$t2[0].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>качество</td>'.
									 '<td>'.
									     '<select style="width: 500px" name="'.$t2[1].'">'.
										     '<option value="">---</option>'.
										     '<option value="Пруф" '.($$t2[1]=='Пруф'?'selected':'').' >Пруф</option>'.
										     '<option value="АЦ" '.($$t2[1]=='АЦ'?'selected':'').' >АЦ</option>'.
										 '</select>'.
									 '</td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>металл, проба</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[2].'" value="'.$$t2[2].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>содержание<br />химически чистого металла<br />не менее, г.</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[3].'" value="'.$$t2[3].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>описание монеты</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[4].'" value="'.$$t2[4].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>ссылка на<br />описание монеты</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[5].'" value="'.$$t2[5].'"></td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><input type="submit" value="Ок"></p>'.
						 '</form>';
			}
		break;
		
		

		
		
//--- ОБРАБОТКА ---
		case 'create_save':
			//--- добавление БАЗА
			if(isset($_POST['name']) && isset($_POST['quantity']) && isset($_POST['metal']) && isset($_POST['weight']) && isset($_POST['comments']) && isset($_POST['uri'])){
				if(trim($_POST['name'])!='' && trim($_POST['quantity'])!='' && trim($_POST['metal'])!='' && trim($_POST['weight'])!='' && trim($_POST['comments'])!='' && trim($_POST['uri'])!=''){
					$q='insert into `'.$_modvars['mysql']['table'].'` set
					    `date`=NOW(),
						`name`="'.addslashes(trim($_POST['name'])).'",
						`quantity`="'.addslashes(trim($_POST['quantity'])).'",
						`metal`="'.addslashes(trim($_POST['metal'])).'",
						`weight`="'.addslashes(trim($_POST['weight'])).'",
						`comments`="'.addslashes(trim($_POST['comments'])).'",
						`url`="'.addslashes(trim($_POST['uri'])).'"';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_affected_rows()<1){ $err=$_comvars['err'][4]; }
					}else{ $err=mysql_error(); }
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }
			
			//--- стандартная часть
			if(isset($_POST['back'])){ $_SESSION['back']=trim($_POST['back']); }
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'visibility':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='update `'.$_modvars['mysql']['table'].'` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			//--- стандартная часть
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'delete':
			//--- удаление БАЗА + ФАЙЛ
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_GET['id']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()>0){
						$row=mysql_fetch_assoc($res);
						$fln=$_dir['site'].$_modvars['place']['store'].'/'.stripslashes(trim($row['file']));
						if(file_exists($fln) && is_writable($fln)){
							unlink($fln);
						}else{ $err=$_comvars['err'][10]; }
					}else{ $err=$_comvars['err'][9]; }
						
					if(!isset($err)){
						$q='delete from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_GET['id']).'"';
						$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][9]; }
						}else{ $err=mysql_error(); }
					}
				}
			}
			
			//--- стандартная часть
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'edit_save':
			if(isset($_POST['id']) && trim($_POST['id'])!=''){
				$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_POST['id']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_num_rows($res)>0){
						$row=mysql_fetch_assoc($res);
					}else{ $err=$_comvars['err'][7]; }
				}else{ $err=mysql_error(); }
				
				//--- изменить БАЗА
				if(isset($_POST[$t2[0]]) && isset($_POST[$t2[1]]) && isset($_POST[$t2[2]]) && isset($_POST[$t2[3]]) && isset($_POST[$t2[4]]) && isset($_POST[$t2[5]])){
					if(trim($_POST[$t2[0]])!='' && trim($_POST[$t2[1]])!='' && trim($_POST[$t2[2]])!='' && trim($_POST[$t2[3]])!='' && trim($_POST[$t2[4]])!='' && trim($_POST[$t2[5]])!=''){
						$q='update `'.$_modvars['mysql']['table'].'`
							set
							`'.$t2[0].'`="'.addslashes(trim($$t2[0])).'",
							`'.$t2[1].'`="'.addslashes(trim($$t2[1])).'",
							`'.$t2[2].'`="'.addslashes(trim($$t2[2])).'",
							`'.$t2[3].'`="'.addslashes(trim($$t2[3])).'",
							`'.$t2[4].'`="'.addslashes(trim($$t2[4])).'",
							`'.$t2[5].'`="'.addslashes(trim($$t2[5])).'" 
							where `id`="'.trim($_POST['id']).'"';

							$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
						}else{ $err=mysql_error(); }
					}else{ $err=$_comvars['err'][2]; }
				}else{ $err=$_comvars['err'][1]; }
			}else{ $err=$_comvars['err'][1]; }
			
			//--- стандартная часть
			if(isset($_POST['back'])){ $_SESSION['back']=trim($_POST['back']); }
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		
		

//--- системные секции
		case 'secure_01': //--- пришли со строки адреса
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
			exit();
		break;
		case 'secure_02': //--- допускается только ADMIN - если есть ограничение
			$data1='<p align="center">- доступ только администраторам -</p>';
		break;
		default: //--- ОШИБОЧНО-СТАРТОВАЯ секция
			$data1[]='<p align="center">- WELCOME screen -</p>';
		break;
	}
	
	//--- удаление служебных переменных
	if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
	if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
	
	//--- вывод интерфейса модуля
	if(isset($data1)){ print (is_array($data1)?implode('',$data1):$data1); }

	close($link);
	
?>
