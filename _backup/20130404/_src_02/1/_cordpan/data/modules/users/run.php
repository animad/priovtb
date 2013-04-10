<?php

	//--- переменные ПАНЕЛИ
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ОБЩИЕ переменные МОДУЛЕЙ
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc'));
	//--- переменные МОДУЛЯ
	$_modvars=vars_parse_batch($_dir['mod'],array('vars.inc'));
	
	if($mod->box[$_GET['dr']]['func']){
		while(list($key,$val)=each($mod->box[$_GET['dr']]['func'])){
			eval('$val='.$val.';');
			if(file_exists($val) && filesize($val)){ include($val); }
		}
	}
	
	if(!isset($_GET['m'])){ $_GET['m']=$mod->box[$_GET['dr']]['config']['default_section']; }
	if(!isset($_SESSION['user']['status']) || trim($_SESSION['user']['status'])!='admin'){ $_GET['m']='secure_02'; } //---сюда допускается только ADMIN
	if(!isset($_SERVER['HTTP_REFERER'])){ $_GET['m']='secure_01'; } //---на страничку пришли со строки адреса
	
	switch ($_GET['m']){
		case 'welcome': //стартовая секция
			print '<p align="center">- WELCOME screen -</p>';
		break;
		case 'ulist':
			$ulist=new ulist();
			$ulist->get_list();
			$ulist->create_table();
			$ulist->cmd_dop_01();
			$data1='<h1>Пользователи CORDPAN</h1>'.
			       $ulist->outp;
			if(isset($_SESSION['erm'])){
				if(isset($_SESSION['erm']['msg'])){ $data1.='<p align="center">'.$_SESSION['erm']['msg'].'</p>'; }
				unset($_SESSION['erm']);
			}
		break;
		case 'show':
			if(isset($_GET['uid']) && isset($_GET['v'])){
				list($user,$err)=user_getInfo_id($_GET['uid']);
				if($err==null){
					$user['on']=$_GET['v'];
					user_save($user['fln'],$user);
				}else{ $_SESSION['erm']['msg']='ОШИБКА! Пользователь не найден.'; }
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'edit':
			if(isset($_GET['uid'])){
				$ulist=new ulist();
				$ulist->user_info($_GET['uid'],$_GET['m']);
			}
			$data1='<h1>Редактировать данные пользователя CORDPAN</h1>'.
			       '<p align="center">'.
			           '<a href="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'"><img src="images/point_arrow1.gif" hspace="5" border="0">назад</a>'.
			       '</p>'.$ulist->outp;
			if(isset($_SESSION['erm'])){
				if(isset($_SESSION['erm']['msg'])){ $data1.='<p align="center">'.$_SESSION['erm']['msg'].'</p>'; }
				unset($_SESSION['erm']);
			}
		break;
		case 'edit_save':
			if(isset($_GET['uid'])){
				list($user,$err)=user_getInfo_id($_GET['uid']);
				if($err==null){
					if($_POST['fln']){
						$rc=(isset($_POST['passw']) && trim($_POST['passw'])!=''?array('passw'=>1):null);
						user_save($_POST['fln'],$_POST,$rc);
					}else{ $_SESSION['erm']['msg']='ОШИБКА! Имя файла не найдено.'; }
				}
			}
			if(isset($_POST['back'])){ $_SESSION['back']=$_POST['back']; }
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'secure_01':
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
		break;
		case 'secure_02':
			$data1='<p align="center">- доступ только администраторам -</p>';
		break;
		case 'create':
			$ulist=new ulist();
			$ulist->create();
			
			$data1='<h1>Создание нового пользователя CORDPAN</h1>'.
			       '<p align="center">'.
			           '<a href="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'"><img src="images/point_arrow1.gif" hspace="5" border="0">назад</a>'.
			       '</p>'.$ulist->outp;
			if(isset($_SESSION['erm'])){
				if(isset($_SESSION['erm']['msg'])){ $data1.='<p align="center">'.$_SESSION['erm']['msg'].'</p>'; }
				unset($_SESSION['erm']);
			}
		break;
		case 'create_save':
			if($_POST['fln']){ user_save($_POST['fln'].'.php',$_POST,array('passw'=>1)); }else{ $_SESISON['erm']['msg']='ОШИБКА! Имя файла не найдено.'; }
			if(isset($_SESSION['erm']) || !isset($_POST['back'])){
				if(isset($_POST['back'])){ $_SESSION['back']=$_POST['back']; }
				Header('Location: '.$_SERVER['HTTP_REFERER']);
			}else{ Header('Location: '.$_POST['back']); }
		break;
		case 'drop':
			users_drop(true);
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'mallow': //изменение доступа к модулям
			if(isset($_GET['uid'])){
				list($user,$erm)=user_getInfo_id($_GET['uid']);
			}else{
				$erm='ОШИБКА! UID пользователя не указан.';
			}
			
			$data1='<h1>Изменение доступа к модулям CORDPAN</h1>'.
			       (isset($user) && $user!=null?'<h3 align="center">... для пользователя <u>'.output($user['showname']).'</u></h3>':'').
			       '<p align="center">'.
			           '<a href="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'"><img src="images/point_arrow1.gif" hspace="5" border="0">назад</a>'.
			       '</p>';

			if(isset($user) && $user!=null){
				$ulist=new ulist();
				$data1.=$ulist->mod_list($user);
				
				
			}
			
			if(isset($erm) && $erm!=0){
				$data1.='<p align="center">'.$erm.'</p>';
			}
		break;
		case 'mallow_save':
			if(isset($_GET['uid'])){
				list($user,$err)=user_getInfo_id($_GET['uid']);
				if($err==null){
					$user['mallow']=implode(' ',$_POST['mod']);
					user_save($user['fln'],$user);
				}
			}
			if(isset($_POST['back'])){ $_SESSION['back']=$_POST['back']; }
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
	}
	if(isset($data1)){ print $data1; }

?>
