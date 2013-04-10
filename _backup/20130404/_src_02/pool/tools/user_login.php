<?php

	session_start();
	include('../../files/functions/tools.php');
	include('../../files/functions/users.php');

	$user=new users;
	$user->authorize();
	
	if($user->err==null){
		Header('Location: '.$_SERVER['HTTP_REFERER']);
	}else{
		Header('Location: /tool_user_login.php');
	}

?>