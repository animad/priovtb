<?php
	
	session_start();
	chdir('../..');
	include('files/functions/tools.php');
	include('files/functions/mysql.php');
	include('files/vars/mysql.php');

	$link=connect();
	

	
	$tools=new tools;

	//--- подтверждаем СБРОС ПАРОЛЯ

	$uid=$_SESSION['store']['user']['id'];
	$forget_code=md5(uniqid(rand(), true));

	$q='update `users` set `forget_code`="'.$forget_code.'" where `id`="'.$uid.'"';
	$res=mysql_query($q);
	if(mysql_errno()<1){
		if(mysql_affected_rows()>0){

			$m['to']=trim($_SESSION['store']['user']['email']);
			$m['subject']='Подтверждение СБРОСА ПАРОЛЯ';
					
			$fln='pool/mails/mail4.html';
			if(file_exists($fln) && filesize($fln)){
				$fp=fopen($fln,'r');
				$m['message']=fread($fp,filesize($fln));
				fclose($fp);
								
				//--- замены в письме
				$m['message']=str_replace('%forget_link%',$forget_code,$m['message']);
									
				if($tools->mail($m['to'],$m['subject'],$m['message'])){
					$q='update `users` set `email_send`=`email_send`+1 where `id`="'.$uid.'"';
					$res=mysql_query($q);
				}
								
			}else{ $err=$erm[11]; }
		}else{ $err=$erm[10]; }
	}else{ $err=$erm[6].mysql_error(); }

	close($link);

	if(isset($err)){
		$_SESSION['er']['remember1']['erm']=$err;
	}
	Header('Location: /tool_user_remember5.php');

?>