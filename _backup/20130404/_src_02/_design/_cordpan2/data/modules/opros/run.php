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
	
	if(!isset($_GET['m'])){ $_GET['m']=$mod->box[$_GET['dr']]['config']['default_section']; }
//	if(!isset($_SESSION['user']['status']) || trim($_SESSION['user']['status'])!='admin'){ $_GET['m']='secure_02'; } //---сюда допускается только ADMIN
	if(!isset($_SERVER['HTTP_REFERER'])){ $_GET['m']='secure_01'; } //---на страничку пришли со строки адреса

	//--- создание путей
	$ans=path_create($_modvars['place']['store']);
	$ans=path_create($_modvars['place']['log']);
	
	//--- служебные кнопки под разные секции
	// $_modvars['btn'][<$_GET['m']>][]=array(<ссылка кнопки>,<имя кнопки>);
	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=accept_waiting','Список для подтверждения');
	$_modvars['btn']['export'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'','Полный список опросов');

	$_modvars['btn']['create_ui'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'Назад');
	$_modvars['btn']['edit'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'Назад');
	
	//подключаем скрипт
	$data1[]='<script type="text/javascript" src="'.$_dir['mod_scripts_http'].'/script.js"></script>';
	//--- заголовок страницы
	$data1[]='<h1>'.$mod->box[$_GET['dr']]['info']['title'].'</h1>';
	//--- служебные кнопки
	include($_dir['common_code'].'bl_top_btn.php');	
	
	switch ($_GET['m']){
//--- пользовательские секции
//--- ИНТЕРФЕЙС ---
		case 'start':
		default:
		case 'list':
			$data1[]='<p align="center"><b>Полный список</b></p>';
			include($_dir['mod_func'].'/s_list.inc');
			
			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }

		break;
		case 'export':
			$data1[]='<p align="center"><b>Экспорт ответов опроса</b></p>';
			include($_dir['mod_func'].'/s_export.inc');

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;
		case 'edit':
			$data1[]='<p align="center"><b>редактировать новость</b></p>';
			$data1[]='<p align="center"><a href="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'" class="hrf2">назад</a></p>';

			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				//--- сообщения об отработанных ошибках
				$t=array('save');
				for($i=0;$i<count($t);$i++){
					if(isset($_SESSION['er'][$t[$i]]['erm'])){
						$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
					}
				}

				$t=array('save');
				$t2=array('date','title','preview','text');
				if(isset($_SESSION['er'][$t[0]])){
					while(list($key,$val)=each($t2)){
						$$val=isset($_SESSION['er'][$t[0]][$val])?$_SESSION['er'][$t[0]][$val]:'';
					}
				}else{
					$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.$_GET['id'].'" limit 1';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_num_rows($res)>0){
							$row=mysql_fetch_assoc($res);
							while(list($key,$val)=each($t2)){ $$val=isset($row[$val])?trim($row[$val]):''; }
							
							$fln=$_dir['site'].$_modvars['place']['store'].'/'.$_GET['id'].'.html';
							if(file_exists($fln) && filesize($fln)){
								$fp=fopen($fln,'a+');
								$text=fread($fp,filesize($fln));
								fclose($fp);
							}else{ $text=''; }
							
						}else{ $err=$_comvars['err'][7]; }
					}else{ $err=$_comvars['err'][11]; }
				}
			}else{ $err=$_comvars['err'][1]; }

			if(isset($err)){
				$data1[]=err_show($err);
			}else{

				//--- определяем, какой РЕДАКТОР выводить
				if(isset($_modvars['use_external_editorHTML']) && $_modvars['use_external_editorHTML'] && isset($mod->tools['editorHTML']['uId'])){
					$k=1;
					$editor[$k]['jsinit']='<script type="text/javascript">'.$mod->tools['editorHTML']['js']['init']['minimal'].'</script>';
					$editor[$k]['html']=$mod->tools['editorHTML']['html']['textarea'];
					$editor[$k]['r']['sz_height']='200px';
					$editor[$k]['r']['sz_width']='500px';
					$editor[$k]['r']['work_element']='text';
					$editor[$k]['r']['css_body']='';
					$editor[$k]['r']['work_text']=nl2br($text);

					//--- производим замены переменных
					reset($editor);
					while(list($key1,$val1)=each($editor)){
						while(list($key,$val)=each($val1['r'])){
							$editor[$key1]['jsinit']=str_replace('%'.$key.'%',$val,$editor[$key1]['jsinit']);
							$editor[$key1]['html']=str_replace('%'.$key.'%',$val,$editor[$key1]['html']);
						}
					}
				
					$val_editor_init=$mod->tools['editorHTML']['js']['load'].$editor[1]['jsinit'];
					$val_editor=$editor[1]['html'];
				}else{
					$val_editor_init='';
					$val_editor='<textarea style="width: 500px" type="text" name="text">'.$text.'</textarea>';
				}

				$data1[]=$val_editor_init;
				
				$j1=0;
				$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=save" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="id" value="'.$_GET['id'].'">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">Дата</td>'.
									 '<td align="left"><input style="width: 500px" type="text" name="date" value="'.$date.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">Заголовок</td>'.
									 '<td align="left"><input style="width: 500px" type="text" name="title" value="'.$title.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">Краткое содержание</td>'.
									 '<td align="left"><input style="width: 500px" type="text" name="preview" value="'.$preview.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" valign="top" width="150">Полный текст</td>'.
									 '<td align="left">'.$val_editor.'</td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><input type="submit" value="Ок"></p>'.
						 '</form>';
			}

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;
		
		

		
		
//--- ОБРАБОТКА ---
		case 'create':
			//--- добавление БАЗА + ФАЙЛ
			if(isset($_POST['title']) && isset($_POST['date']) && isset($_POST['preview']) && isset($_POST['text'])){
				if(trim($_POST['title'])!='' && trim($_POST['date'])!='' && trim($_POST['preview'])!='' && trim($_POST['text'])!=''){
					$q='insert into `'.$_modvars['mysql']['table'].'` set
					    `date`="'.trim($_POST['date']).'",
						`title`="'.input($_POST['title']).'",
						`preview`="'.input($_POST['preview']).'"';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_affected_rows()>0){
							$fln=$_dir['site'].$_modvars['place']['store'].'/'.mysql_insert_id().'.html';
							$fp=fopen($fln,'a+');
							fwrite($fp,trim($_POST['text']));
							fclose($fp);
						}else{ $err=$_comvars['err'][4]; }
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
				$q='update `'.$_modvars['mysql']['table'].'` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
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
			//--- удаление БАЗА + ФАЙЛ
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='delete from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_GET['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()>0){
						$fln=$_dir['site'].$_modvars['place']['store'].'/'.$_GET['id'].'.html';
						if(file_exists($fln) && is_writable($fln)){
							unlink($fln);
						}else{ $err=$_comvars['err'][10]; }
					}else{ $err=$_comvars['err'][9]; }
				}else{ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'save':
			//--- изменить БАЗА + ФАЙЛ
			if(isset($_POST['id']) && trim($_POST['id'])!=''){
				$q='update `'.$_modvars['mysql']['table'].'`
					set
					`title`="'.trim($_POST['title']).'",
					`date`="'.trim($_POST['date']).'",
					`preview`="'.trim($_POST['preview']).'"
					where `id`="'.trim($_POST['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					$fln=$_dir['site'].$_modvars['place']['store'].'/'.trim($_POST['id']).'.html';
					$fp=fopen($fln,'w');
					fwrite($fp,trim($_POST['text']));
					fclose($fp);
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
