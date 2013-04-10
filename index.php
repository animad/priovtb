<?php

	session_start();

	global $gStore;
	
	//--- загружаем переменные
	$fln='files/vars/glovars.ini';
	$globals=parse_ini_file($fln,true);
	
	$globals['bankomats']=parse_ini_file('pool/vars/bankomats.ini',true);
	$globals['terminals']=parse_ini_file('pool/vars/terminals.ini',true);
	$globals['towns']=parse_ini_file('pool/vars/towns.ini',true);
	$globals['usl']=parse_ini_file('pool/vars/usl.ini',true);
	$globals['regions']=parse_ini_file('pool/vars/regions.ini',true);
	
	include('files/vars/glovars.php');
	include('files/vars/mysql.php');

	//инициализация языка
	if (!isset($_GET['lang'])){ $_GET['lang']='ru'; }
	$globals['lang']=$_GET['lang'];
	switch($_GET['lang']){
		case 'eng':
			$globals['skin']['name']=$globals['skin']['name_eng'];
			$globals['site']['title']=$globals['site']['title_eng'];
			$globals['site']['keywords']=$globals['site']['keywords_eng'];
			$globals['site']['description']=$globals['site']['description_eng'];

			//--- страница по умолчанию
			if(!isset($_GET['dr'])){ $_GET['dr']=$globals['site']['default_page_eng']; }
		break;
		default:
		case 'ru':
			//--- страница по умолчанию
			if(!isset($_GET['dr'])){ $_GET['dr']=$globals['site']['default_page']; }
		break;
	}

	//--- страница по умолчанию
	if(!isset($_GET['dr'])){ $_GET['dr']=$globals['site']['default_page']; }

	print '<!-- '.$_GET['dr'].' -->'."\r\n";

	//--- загружаем функции
	include('files/functions/tools.php');
	include('files/functions/users.php');
	include('files/functions/gps.php');
	include('files/functions/coord_info.php');
	
	include('files/functions/mysql.php');
	include('files/functions/news.php'); //--- объект НОВОСТИ
	include('files/functions/date.php'); //--- работа с ДАТОЙ
	include('files/functions/pglist.php'); //--- разбивает массив данных на страницы + формирует перечень страниц
	include('files/functions/mmenu.php');
	include('files/functions/reg_uri.php'); //--- учет открытых страниц
	include('files/functions/parse_mmenu_js.php'); //--- учет открытых страниц
	include('files/functions/coord_list.php');
	include('files/functions/io.php');		//--- вывод/ввод
	
	$link=connect();

	//--- инициализация координат
	gps::init();

	//--- узнаем ПОЛЬЗОВАТЕЛЯ
	if(isset($_COOKIE['session_code'])){
		$user1=new users;
		$user1->find_sc($_COOKIE['session_code']);
		unset($user1->res['passw']); //--- на всякий случай
		if($user1->res!=null){
			$_SESSION['user']=$user1->res;
			$user1->online_update();
		}
	}

	print '<!--'.(isset($data)?'var DATA is set':'var DATA is absent').'-->'."\r\n";
	
	if(isset($globals['skin'])){

		//--- основной шаблон
		ob_start();
		include('files/skin/'.$globals['skin']['name'].'/tpl/main.html');
		$maindata=ob_get_contents();
		ob_end_clean();

		print '<!--'.(isset($data)?'var DATA is set':'var DATA is absent').'-->'."\r\n";
	
		//--- загрузка содержимого
		ob_start();
		$fln='pool/docs/'.$_GET['dr'];
		if(file_exists($fln) && filesize($fln)){
			include($fln);
		}else{ print '<br /><br /><br /><br /><b>ВНИМАНИЕ!</b> Файл не найден.<br /><br /><br /><br />'; }
		$data1['content']=ob_get_contents();
		ob_end_clean();

		print '<!--'.(isset($data)?'var DATA is set':'var DATA is absent').'-->'."\r\n";

		//--- загружаем код GOOGLE ANALYTICS
		$fln='pool/vars/counters/ga.js';
		if(file_exists($fln) && filesize($fln)){
			$fp=fopen($fln,'r');
			$data1['ga']=fread($fp,filesize($fln));
			fclose($fp);
		}else{ $data1['ga']=''; }

		print '<!--'.(isset($data)?'var DATA is set':'var DATA is absent').'-->'."\r\n";

		
		//--- подмена ЗНАЧЕНИЙ в шаблоне
		$rpc[]=array('%charset%',$globals['site']['charset']);
		$rpc[]=array('%title%',$globals['site']['title']);
		$rpc[]=array('%doctype1%',$globals['site']['doctype1']);
		$rpc[]=array('%doctype2%',$globals['site']['doctype2']);
		$rpc[]=array('%meta%',$globals['site']['meta']);
		$rpc[]=array('%keywords%',$globals['site']['keywords']);
		$rpc[]=array('%description%',$globals['site']['description']);
		$rpc[]=array('%dr%',$_GET['dr']);
		$rpc[]=array('%content%',$data1['content']);
		$rpc[]=array('%ga%',$data1['ga']);
		$rpc[]=array('%lang%',$globals['lang']);
		$rpc[]=array('%skin%',$globals['skin']['name']);
			
		for($i=0;$i<count($rpc);$i++){ $maindata=str_replace($rpc[$i][0],$rpc[$i][1],$maindata); }

		//--- выводин на экран
		print $maindata;
	}else{
		print 'нет шаблона';
	}
	
	//--- учет открытых страниц
	$ans=reg_uri();

	close($link);
	
?>
