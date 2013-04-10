<?php

	//--- переменные ПАНЕЛИ
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ОБЩИЕ переменные МОДУЛЕЙ
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc','mysql.inc','err.inc','globals.inc'));
	//--- переменные МОДУЛЯ
	$_modvars=vars_parse_batch($_dir['mod'],array('vars.inc'));
	
	if($mod->box[$_GET['dr']]['func']){
		while(list($key,$val)=each($mod->box[$_GET['dr']]['func'])){
			eval('$val='.$val.';');
			if(file_exists($val) && filesize($val)){ include($val); }
		}
	}
	$link=connect($_comvars['mysql']);
	
	$conv=new convert;
	
	if(!isset($_GET['m'])){ $_GET['m']=$mod->box[$_GET['dr']]['config']['default_section']; }
//	if(!isset($_SESSION['user']['status']) || trim($_SESSION['user']['status'])!='admin'){ $_GET['m']='secure_02'; } //---сюда допускается только ADMIN
	if(!isset($_SERVER['HTTP_REFERER'])){ $_GET['m']='secure_01'; } //---на страничку пришли со строки адреса

	//--- создание путей
//	$ans=path_create($_modvars['place']['store']);
//	$ans=path_create($_modvars['place']['log']);

	//--- данные полей и секций
	$t=array('visibility','create_save','edit_save'); //--- имена отработанных секций
	$t2=array('title','section');

	//--- сообщения об отработанных ошибках
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){ $err_msg[$t[$i]]=err_show($_SESSION['er'][$t[$i]]['erm']); }else{ $err_msg[$t[$i]]=''; }
	}
	
	//--- служебные кнопки под разные секции
	// $_modvars['btn'][<$_GET['m']>][]=array(<ссылка кнопки>,<имя кнопки>);
	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=accept_waiting','Список для подтверждения');
	$_modvars['btn']['accept_waiting'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=start','Список активных');

	$_modvars['btn']['create_ui'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'Назад');
	$_modvars['btn']['edit'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'Назад');

	//--- заголовок страницы
	$data1[]='<h1>'.$mod->box[$_GET['dr']]['info']['title'].'</h1>';

	switch ($_GET['m']){
//--- пользовательские секции
//--- ИНТЕРФЕЙС ---
		case 'start':
			$j1=0;
			
			//--- служебные кнопки
			include($_dir['common_code'].'bl_top_btn.php');
			
			//--- список ОЖИДАЮЩИХ клиентов
			$q='select * from `'.$_modvars['mysql']['table'].'` where `date_act` is not NULL and `email_check`="1" and `passw` is NULL and `date_passw` is NULL and `access` is NULL order by `id` desc';
			$res=mysql_query($q);
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				$data1[]='<div style="background-color: #BFE5AD; padding: 10px 0;">';
				$data1[]='<div align="center"><i>Внимание! Есть Клиенты ожидающие подтверждения специалиста на доступ</i></div>';
				$data1[]='</div>';
			}
			
			//--- список АКТИВНЫХ клиентов
			$q='select * from `'.$_modvars['mysql']['table'].'` where `access` like "accept" order by `id` desc';
			$res=mysql_query($q);
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				$pglist=new pageList;
				$pglist->get($res,$_modvars['pglist1']['rpl'],$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),10,'desc');
				
				reset($pglist->list);
				while(list($key,$row)=each($pglist->list)){
					if($row['on']==1){
						$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=0" class="hrf3" title="вылючить">выкл</a>';
					}else{
						$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=1" class="hrf3" title="включить">вкл</a>';
					}

					$data2[]='<tr'.colrow($j1++,$row['on']).'>'.
								 '<td>'.$row['id'].'</td>'.
								 '<td style="padding: 0;">'.$t_show.'</td>'.
								 '<td>'.output($row['fio']).'</td>'.
								 '<td>'.output($row['org']).'</td>'.
								 '<td>'.output($row['inn']).'</td>'.
								 '<td><a href="mailto:'.trim($row['email']).'">'.htmlspecialchars(trim($row['email'])).'</a></td>'.
								 '<td style="padding: 0; text-align: center;">'.
									 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=access&id='.$row['id'].'&v=accept" title="СМЕНА ПАРОЛЯ с отсылкой письма" onClick="return confirm(\'Вы желаете сменть пароль доступа клиенту &quot;'.output($row['fio']).'&quot;\r\nПри согласии, клиенту будет выслано письмо с новым паролем.\r\n\r\nСогласны?\');" class="hrf6">**</a>'.
									 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=access&id='.$row['id'].'&v=deny" title="ЗАКРЫТЬ ДОСТУП" onClick="return confirm(\'Вы желаете ЗАПРЕТИТЬ доступ к архиву клиенту &quot;'.output($row['fio']).'&quot;\r\nПри согласии, кроме запрета доступа, так же будет блокирована поврорная регистрация с подобными реквизитами.\r\n\r\nСогласны?\');" class="hrf6">xx</a>'.
								 '</td>'.
							 '</tr>';
				}
				
				$data1[]='<div style="padding: 10px 0;">';
				$data1[]='<div align="center"><i>Список активных клиентов</i></div>';
				$data1[]='<br />';
				if($pglist->pglist!=''){ $data1[]=$pglist->pglist.'<br />'; }
				$data1[]='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center" style="background-color: #ffffff;">'.
							 '<tr class="header">'.
								 '<td>#</td>'.
								 '<td>вкл/выкл</td>'.
								 '<td>фио</td>'.
								 '<td>организация</td>'.
								 '<td>инн</td>'.
								 '<td>эл.почта</td>'.
								 '<td>&nbsp;</td>'.
							 '</tr>'.
				             implode('',$data2).
						 '</table>';
				if($pglist->pglist!=''){ $data1[]='<br />'.$pglist->pglist; }
				$data1[]='</div>';
			}



			
		break;


		case 'accept_waiting':
			$j1=0;
			
			//--- служебные кнопки
			include($_dir['common_code'].'bl_top_btn.php');
			
			//--- список ОЖИДАЮЩИХ клиентов
			$q='select * from `'.$_modvars['mysql']['table'].'` where `date_act` is not NULL and `email_check`="1" and `passw` is NULL and `date_passw` is NULL and `access` is NULL';
			$res=mysql_query($q);
			if(mysql_errno()<1){
				if(mysql_num_rows($res)>0){
					while($row=mysql_fetch_assoc($res)){
						$data2[]='<tr'.colrow($j1++).'>'.
						             '<td>'.$row['id'].'</td>'.
						             '<td>'.output($row['fio']).'</td>'.
						             '<td>'.output($row['org']).'</td>'.
									 '<td>'.htmlspecialchars(trim($row['inn'])).'</td>'.
									 '<td><a href="mailto:'.trim($row['email']).'">'.htmlspecialchars(trim($row['email'])).'</a></td>'.
						             '<td style="padding: 0; text-align: center;">'.
									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=access&id='.$row['id'].'&v=accept" title="ПОДТВЕРДИТЬ" class="hrf6">++</a>'.
									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=access&id='.$row['id'].'&v=deny" title="ОТКЛОНИТЬ" class="hrf6" onClick="return confirm(\''.htmlspecialchars(trim($row['fio'])).'\r\n'.htmlspecialchars(trim($row['org'])).'\r\n'.htmlspecialchars(trim($row['inn'])).'\r\n\r\nОтклонить подтверждение на доступ к файлам?\');">––</a>'.
									 '</td>'.
								 '</tr>';
					}
				}
			}
			
			if(isset($data2)){
			
				$data1[]='<div style="background-color: #BFE5AD; padding: 10px 0;">';
				$data1[]='<div align="center"><i>Клиенты, ожидающие подтверждения специалиста на доступ</i></div>';
				$data1[]='<br />';
				$data1[]='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center" style="background-color: #ffffff;">'.
							 '<tr class="header">'.
								 '<td>#</td>'.
								 '<td>фио</td>'.
								 '<td>организация</td>'.
								 '<td>инн</td>'.
								 '<td>эл.почта</td>'.
								 '<td>подтвердить</td>'.
							 '</tr>'.
				             implode('',$data2).
						 '</table>';
				$data1[]='</div>';
				unset($data2);
			}else{ $data1[]='<p align="center"><i>Нет клиентов, ожидающих подтверждения доступа</i></p>'; }


			
		break;


		
		
//--- ОБРАБОТКА ---
		case 'create_save':
			if(isset($_FILES) && isset($_POST[$t2[0]]) && isset($_POST[$t2[1]])){
				if(trim($_POST[$t2[0]])!='' && trim($_POST[$t2[1]])!=''){

					//--- сохранение ФАЙЛА
					$ans=file_upload($_modvars['place']['store'],'file1');
					if($ans!==true){ $err=$ans; }
					if(!isset($err)){
						//--- добавление БАЗА
						$q='insert into `'.$_modvars['mysql']['table'].'` set
							`date`=NOW(),
							`file`="'.$_FILES['file1']['name'].'",
							`'.$t2[0].'`="'.addslashes(trim($_POST[$t2[0]])).'",
							`'.$t2[1].'`="'.addslashes(trim($_POST[$t2[1]])).'"';
						$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][4]; }
						}else{ $err=mysql_error(); }
					}
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }
			
			//--- стандартная часть
			include($_dir['common_code'].'stnd_ssbl_end.php');

		break;
		case 'visibility':
			include($_dir['common_code'].'visibility.php');
			
			//--- стандартная часть
			include($_dir['common_code'].'stnd_ssbl_end.php');
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
			include($_dir['common_code'].'stnd_ssbl_end.php');
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
				if(isset($_POST[$t2[0]]) && isset($_POST[$t2[1]])){
					if(trim($_POST[$t2[0]])!='' && trim($_POST[$t2[1]])!=''){
						$q='update `'.$_modvars['mysql']['table'].'`
							set
							`'.$t2[0].'`="'.addslashes(trim($$t2[0])).'",
							`'.$t2[1].'`="'.addslashes(trim($$t2[1])).'"
							where `id`="'.trim($_POST['id']).'"';

							$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
						}else{ $err=mysql_error(); }
					}else{ $err=$_comvars['err'][2]; }
				}else{ $err=$_comvars['err'][1]; }
			}else{ $err=$_comvars['err'][1]; }
			
			//--- стандартная часть
			include($_dir['common_code'].'stnd_ssbl_end.php');
		break;
//--- управление доступом КЛИЕНТАМ
		case 'access':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				if(trim($_GET['v'])=='accept'){
					$r['on']=1;
					$gen_val=keygen();
					$r['passw']=$gen_val['dest'][0];
					$r['date_act']='NOW()';
					$r['date_passw']='NOW()';
				}elseif(trim($_GET['v'])=='deny'){
					$r['on']=0;
				}

				$q='update `'.$_modvars['mysql']['table'].'` set '.
				    (isset($r['on'])?'`on`="'.$r['on'].'",':'').
				    (isset($r['passw'])?'`passw`="'.md5($r['passw']).'",':'').
				    (isset($r['date_act'])?'`date_act`='.$r['date_act'].',':'').
				    (isset($r['date_passw'])?'`date_passw`='.$r['date_passw'].',':'').
					'`access`="'.$_GET['v'].'",
					 `access_checker`="'.trim($_SESSION['user']['showname']).'",
					 `access_date`=NOW()
					 where `id`="'.$_GET['id'].'"';

				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()>0){
						if(trim($_GET['v'])=='accept'){
							//--- отсылка ПОЧТЫ
							
							$mail=new mail;

							$q='select * from `users` where `id`="'.$_GET['id'].'" limit 1';
							$res=mysql_query($q);
							$row=mysql_fetch_assoc($res);

							$ml['to']=trim($row['email']);
							$ml['subject']='Подтверждение доступа';

							$fln=$_dir['site'].'pool/mails/mail2.html';
							if(file_exists($fln) && filesize($fln)){
								$fp=fopen($fln,'r');
								$ml['message']=fread($fp,filesize($fln));
								fclose($fp);
								
								//--- замены в письме
								$ml['message']=str_replace('%login_info%',trim($row['login']),$ml['message']);
								$ml['message']=str_replace('%passw_info%',trim($r['passw']),$ml['message']);
								
								if($mail->send($ml['to'],$ml['subject'],$ml['message'])){
									$q='update `users` set `email_send`=`email_send`+1 where `id`="'.$_GET['id'].'"';
									$res=mysql_query($q);
								}
								
							}else{ $err=$_comvars['err'][17]; }
						}elseif(trim($_GET['v'])=='deny'){
							//--- отсылка ПОЧТЫ
							
							$mail=new mail;

							$q='select * from `users` where `id`="'.$_GET['id'].'" limit 1';
							$res=mysql_query($q);
							$row=mysql_fetch_assoc($res);

							$ml['to']=trim($row['email']);
							$ml['subject']='Отклонение доступа';

							$fln=$_dir['site'].'pool/mails/mail3.html';
							if(file_exists($fln) && filesize($fln)){
								$fp=fopen($fln,'r');
								$ml['message']=fread($fp,filesize($fln));
								fclose($fp);
								
								if($mail->send($ml['to'],$ml['subject'],$ml['message'])){
									$q='update `users` set `email_send`=`email_send`+1 where `id`="'.$_GET['id'].'"';
									$res=mysql_query($q);
								}
								
							}else{ $err=$_comvars['err'][17]; }
						}
					}else{ $err=$_comvars['err'][4]; }
				}else{ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			//--- стандартная часть
			include($_dir['common_code'].'stnd_ssbl_end.php');
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
