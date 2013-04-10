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
//	$ans=path_create($_modvars['place']['store']);
//	$ans=path_create($_modvars['place']['log']);
	
	switch ($_GET['m']){
//--- пользовательские секции
//--- ИНТЕРФЕЙС ---
		case 'start':
			$data1[]='<h1>Вакансии</h1>';

			//--- сообщения об отработанных ошибках
			$t=array('create');
			for($i=0;$i<count($t);$i++){
				if(isset($_SESSION['er'][$t[$i]]['erm'])){
					$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
				}
			}

			$t=array('create');
			if(isset($_SESSION['er'][$t[0]])){
				$title=isset($_SESSION['er'][$t[0]]['title']) && trim($_SESSION['er'][$t[0]]['title'])!=''?trim($_SESSION['er'][$t[0]]['title']):'';
				$requirement=isset($_SESSION['er'][$t[0]]['requirement']) && trim($_SESSION['er'][$t[0]]['requirement'])!=''?trim($_SESSION['er'][$t[0]]['requirement']):'';
				$email=isset($_SESSION['er'][$t[0]]['email']) && trim($_SESSION['er'][$t[0]]['email'])!=''?trim($_SESSION['er'][$t[0]]['email']):'';
			}else{
				$title='';
				$requirement='';
				$email='';
			}
			$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create" method="post" style="padding: 0;">'.
			             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
						     '<tr class="odd"><td>Должность</td><td><input type="text" name="title" style="width: 500px" value="'.$title.'"></td></tr>'.
						     '<tr class="even"><td valign="top">Требования</td><td><textarea style="width: 500px; height: 200px" name="requirement">'.$requirement.'</textarea></td></tr>'.
						     '<tr class="odd"><td>E-mail</td><td><input type="text" style="width: 500px" name="email" value="'.$email.'"></td></tr>'.
						 '</table>'.
						 '<p align="center"><input type="submit" value="Ок"></p>'.
					 '</form>';

			//--- список вакансий
			$q='select * from `vacancy` order by `date` desc, `id` desc';
			$res=mysql_query($q);
			print mysql_error();
			$j1=0;
			if(mysql_errno()<1){
				if(mysql_num_rows($res)>0){
					while($row=mysql_fetch_assoc($res)){
						//--- строка инструментов
						if(true){
							$tool='<div style="position: relative; line-height: 20px; width: 350px; text-align: right;">'.
											 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=delete&id='.$row['id'].'" class="hrf1" title="удалить" onClick="return confirm(\'Вакансия '.output($row['title']).' \r\n\r\nУдалить?\')">x</a>'.
											 '<div style="position: absolute; top: 0; left: 0; padding: 0;">'.
												 ($row['on']==1?'<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&v=0&id='.$row['id'].'" class="hrf1" title="вкл / ВЫКЛ">выкл</a>':
												                '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&v=1&id='.$row['id'].'" class="hrf1" title="ВКЛ / выкл">вкл</a>').
												 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit&id='.$row['id'].'" class="hrf1" title="изменить данные">изменить</a>'.
											 '</div>'.
										 '</div>';
						}else{ $tool=''; }
						
						if($j1<1 && $row['on']==1){
							$j1++;
						}else{
							$bg1='';
						}
						
						$data1[]='<div style="position: relative; padding: 10px 0; left: 0; width: 100%; '.$bg1.' text-align: center;">'.
									 '<div'.($row['on']==0?' class="off"':'').'>'.
										 $tool.
										 '<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1" width="800">'.
											 '<tr class="odd">'.
												 '<td align="left" width="150">Должность</td>'.
												 '<td align="left">'.output($row['title']).'</td>'.
											 '</tr>'.
											 '<tr class="even">'.
												 '<td align="left" width="150" valign="top">Требования</td>'.
												 '<td align="left">'.pr($row['requirement']).'</td>'.
											 '</tr>'.
											 '<tr class="odd">'.
												 '<td align="left" width="150">E-mail</td>'.
												 '<td align="left">'.output($row['email']).'</td>'.
											 '</tr>'.
										 '</table>'.
									 '</div>'.
								 '</div>';
					}
				}//else{ $err=$_comvars['err'][6]; }
			}else{ $err=$_comvars['err'][5]; }

			if(isset($_SESSION['er'][$_GET['m']]['erm'])){
				$data1[]='<p align="center">'.output($_SESSION['er'][$_GET['m']]['erm']).'</p>';
			}
			
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
		case 'edit':
			$data1[]='<h1>Вакансии</h1>';
			
			//--- сообщения об отработанных ошибках
			$t=array('save');
			for($i=0;$i<count($t);$i++){
				if(isset($_SESSION['er'][$t[$i]]['erm'])){
					$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
				}
			}

			if(isset($_SESSION['er'][$t[0]])){
				$t2=array('title','id','requirement','email');
				while(list($key,$val)=each($t2)){
					$$val=isset($_SESSION['er'][$t[0]][$val])?$_SESSION['er'][$t[0]][$val]:'';
				}
			}elseif(isset($_GET['id']) && trim($_GET['id'])!=''){

				$q='select * from `vacancy` where `id`="'.trim($_GET['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_num_rows($res)>0){
						$row=mysql_fetch_assoc($res);

						$id=$row['id'];
						$title=$row['title'];
						$requirement=$row['requirement'];
						$email=$row['email'];

					}else{ $err=$_comvars['err'][7]; }
				}else{ $err=mysql_error(); }

			}else{ $err=$_comvars['err'][1]; }
			
			if(isset($_SERVER['HTTP_REFERER']) || isset($_SESSION['back'])){
				$data1[]='<p align="center"><a href="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'" class="hrf2">назад</a></p>';
			}
			
			if(isset($err)){ $data1[]=err_show($err); }

			$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=save" method="post" style="padding: 0; margin: 0;">'.
					 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
					 '<input type="hidden" name="id" value="'.$id.'">'.
						 '<div'.($row['on']==0?' class="off"':'').'>'.
							 '<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1">'.
								 '<tr class="odd">'.
									 '<td align="left" width="150">Должность</td>'.
									 '<td align="left"><input style="width: 500px" type="text" name="title" value="'.trim($title).'"></td>'.
								 '</tr>'.
								 '<tr class="even">'.
									 '<td align="left" width="150" valign="top">Требования</td>'.
									 '<td align="left"><textarea style="width: 500px" name="requirement">'.trim($requirement).'</textarea></td>'.
								 '</tr>'.
								 '<tr class="odd">'.
									 '<td align="left" width="150">E-mail</td>'.
									 '<td align="left"><input style="width: 500px" type="text" name="email" value="'.trim($email).'"></td>'.
								 '</tr>'.
							 '</table>'.
						 '</div>'.
						 '<p align="center"><input type="submit" value="Изменить"> <input type="reset" value="Сброс"></p>'.
					 '</form>';

			if(isset($_SESSION['er'][$t[0]]['erm'])){
				$data1[]=err_show($_SESSION['er'][$_GET['m']]['erm']);
			}

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;
		
		

		
		
//--- ОБРАБОТКА ---
		case 'create':
			if(isset($_POST['title']) && isset($_POST['requirement']) && isset($_POST['email'])){
				if(trim($_POST['title'])!='' && trim($_POST['requirement'])!='' && trim($_POST['email'])!=''){
					$q='insert into `vacancy` set
					    `date`=NOW(),
						`title`="'.addslashes($_POST['title']).'",
						`requirement`="'.addslashes($_POST['requirement']).'",
						`email`="'.addslashes($_POST['email']).'"';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_affected_rows()<1){ $err=$_comvars['err'][4]; }
					}else{ $err=mysql_error(); }
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'visibility':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='update `vacancy` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='delete from `vacancy` where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'save':
			if(isset($_POST['id']) && trim($_POST['id'])!=''){
				$q='update `vacancy`
					set
					`title`="'.trim($_POST['title']).'",
					`email`="'.trim($_POST['email']).'",
					`requirement`="'.trim($_POST['requirement']).'"
					where `id`="'.trim($_POST['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
				}else{ $err=mysql_error(); }
				
				$_SESSION['back']=$_POST['back'];
			}else{ $err=$_comvars['err'][1]; }

			if(isset($erm)){
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
