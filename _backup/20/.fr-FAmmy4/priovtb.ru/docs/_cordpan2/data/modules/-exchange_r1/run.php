<?php

	//--- переменные ПАНЕЛИ
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ОБЩИЕ переменные МОДУЛЕЙ
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc','mysql.inc'));
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
/*	if(isset($_modvars['place']) && count($_modvars['place'])>0){
		reset($_modvars['place']);
		while(list($key,$val)=each($_modvars['place'])){
			$ans=path_create($_modvars['place'][$key]);
		}
	}*/
	
	switch ($_GET['m']){
//--- пользовательские секции
		case 'start':
			
		break;
	

//--- системные секции
		case 'secure_01': //--- пришли со строки адреса
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
		break;
		case 'secure_02': //--- допускается только ADMIN
			$data1='<p align="center">- доступ только администраторам -</p>';
		break;
		default: //стартовая секция
			print '<p align="center">- WELCOME screen -</p>';
		break;
	}
	if(isset($data1)){ print (is_array($data1)?implode('',$data1):$data1); }

	close($link);
	
?>
