<?php

	//--- ОБЩИЕ переменные МОДУЛЕЙ
	$_comvars=vars_parse_batch($_dir['common_vars'],array('mysql.inc','globals.inc','dir.inc'));
	//--- переменные МОДУЛЯ
	$_modvars=vars_parse_batch($_dir['mod'],array('vars.inc'));

	if($mod->box[$_GET['dr']]['func']){
	
		while(list($key,$val)=each($mod->box[$_GET['dr']]['func'])){
			eval('$val='.$val.';');
			if(file_exists($val) && filesize($val)){ include($val); }
		}
	}

	//--- создание необходимых пуей
	$ans=fcc($_dir['site'].'/'.$_comvars['paths']['images'],'folder');
	
	//--- переход по УМОЛЧАНИЮ
	if(!isset($_GET['m'])){ $_GET['m']=$mod->box[$_GET['dr']]['config']['default_section']; }
//	if(!isset($_SESSION['user']['status']) || trim($_SESSION['user']['status'])!='admin'){ $_GET['m']='secure_02'; } //---сюда допускается только ADMIN
	if(!isset($_SERVER['HTTP_REFERER'])){ $_GET['m']='secure_01'; } //---на страничку пришли со строки адреса
	
	switch ($_GET['m']){
		case 'main':
			$data1=mainw_draw();
		break;
		case 'secure_01':
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
		break;
	}
	
	print $data1;

?>
