<?php
	$_dir['root']=getcwd().'/'; //корень ПАНЕЛИ

	chdir('..');
	$_dir['site']=getcwd().'/'; //корень САЙТА
	$_dir['tmp']=$_dir['root'].'tmp/'; //временный каталог ПАНЕЛИ

	chdir($_dir['root']);
	$_dir['common_func']=$_dir['root'].'data/common_functions/'; //общие функции ПАНЕЛИ
	$_dir['common_vars']=$_dir['root'].'data/common_vars/'; //общие переменные ПАНЕЛИ
	$_dir['common_code']=$_dir['root'].'data/common_code/'; //общие участки кода ПАНЕЛИ
	$_dir['modplace_http']='data/modules/'; //каталог из HTTP для подключаемых модулей ПАНЕЛИ
	$_dir['modplace']=$_dir['root'].$_dir['modplace_http']; //каталог для подключаемых модулей ПАНЕЛИ
	$_dir['users']=$_dir['root'].'data/users/'; //пользователи ПАНЕЛИ

	$_dir['func']=$_dir['root'].'functions/'; //общие функции ПАНЕЛИ

	$_dir['site_prefix']=''; //префикс адреса
	$_dir['site_postfix']=''; //постфикс сайта
//	$_dir['site_postfix']='/imho';

?>
