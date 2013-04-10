<?php

	session_start();
	include('../../files/functions/tools.php');
	include('../../files/functions/users.php');

	$err=parse_ini_file('../../pool/vars/errors.ini');
	

	if(isset($_POST['user_login'])){
		if(trim($_POST['user_login'])!=''){
			$user=new users;
			$user->find_l($_POST['user_login'],1);
		}else{ $user->err=$err[2]; }
	}else{ $user->err=$err[1]; }

	if($user->err==null){
		unset($_SESSION['er']);
		$_SESSION['store']['user']=$user->res;
		Header('Location: '.$_POST['forward']);
	}else{
		$_SESSION['er']['user_remember']['login']=trim($_POST['user_login']);
		$_SESSION['er']['user_remember']['msg']=$user->err;
		Header('Location: '.$_POST['back']);
	}

?>
