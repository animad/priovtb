<?php

	if(isset($_POST['back'])){ $_SESSION['back']=trim($_POST['back']); }
	if(isset($err)){
		$_SESSION['er'][$_GET['m']]=$_GET;
		$_SESSION['er'][$_GET['m']]['erm']=$err;
	}
	Header('Location: '.$_SERVER['HTTP_REFERER']);
	exit();

?>