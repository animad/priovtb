<?php

	session_start();
	include('../../files/functions/tools.php');
	include('../../files/functions/users.php');

	$user=new users;
	$user->authorize();
	
	if($user->err==null){
		$_SESSION['file_download']['fln']=$_SESSION['er']['fln'];
		unset($_SESSION['er']);
		Header('Location: '.$_POST['forward']);
	}else{
		$_SESSION['er']['user_login']['login']=trim($_POST['login']);
		$_SESSION['er']['user_login']['msg']=$user->err;

		Header('Location: '.$_POST['back']);
	}

?>