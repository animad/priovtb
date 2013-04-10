<?php

	session_start();
//	include('../../files/functions/tools.php');
//	include('files/functions/users.php');

	$user=new users;
	print $user->registration();

?>
