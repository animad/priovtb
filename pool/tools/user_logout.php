<?php

	session_start();
	include('../../files/functions/tools.php');
	include('../../files/functions/users.php');

	$user=new users;
	$user->logout();

	if(isset($_SERVER['HTTP_REFERER'])){
		Header('Location: '.$_SERVER['HTTP_REFERER']);
	}else{
		Header('Location: /');
	}

?>