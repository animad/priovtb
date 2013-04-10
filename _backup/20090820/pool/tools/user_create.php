<?php

	session_start();
	include('../../files/functions/tools.php');
	include('../../files/functions/users.php');

	$user=new users;
	$user->create();

	if($user->err==null){
		Header('Location: /tool_create_success.php');
	}else{
		Header('Location: '.$_SERVER['HTTP_REFERER']);
	}
	
?>