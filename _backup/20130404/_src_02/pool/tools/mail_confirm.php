<?php

	if(isset($_GET['act_code']) && trim($_GET['act_code'])!=''){
	
		session_start();
		include('../../files/functions/tools.php');
		include('../../files/functions/users.php');

		$user=new users;
		$user->confirm(trim($_GET['act_code']));
		
		if($user->err==null){
			Header('Location: /tool_confirm_success.php');
		}else{
			Header('Location: /tool_confirm_fail.php');
		}


	}else{ Header('Location: /'); }

?>