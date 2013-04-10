<?php
	session_name('cordpan');
	session_start();

	//--- загружаем переменные
	include('vars/_dir.php');

	//--- подключаем функции
	include('functions/users.php');

	if(isset($_GET['login'])){
		if(isset($_POST['login']) && isset($_POST['passw'])){
			if(trim($_POST['login'])!='' && trim($_POST['passw'])!=''){
				$usr=user_getInfo_auth(trim($_POST['login']),trim($_POST['passw']));
				if(!is_array($usr[0]) && ($usr[0]==null || trim($usr[0])=='')){ $er2=$usr[1]; }
			}else{ $er2='Пустые поля не допускаются'; }
		}else{ $er2='Параметры не определены'; }
		if(isset($er2)){
			$_SESSION['er']['login']=trim($_POST['login']);
			$_SESSION['er']['message']=$er2;
		}else{
			user_store($usr[0]['uid']);
		}
	}elseif(isset($_GET['logout'])){
		user_forget();
	}
	if(isset($_POST['return_url'])){
		header('Location: '.$_POST['return_url']);
	}else{
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
?>
