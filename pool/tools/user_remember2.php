<?php

	session_start();
	chdir('../..');
	include('files/functions/tools.php');
	include('files/functions/users.php');
	include('files/functions/mysql.php');
	include('files/functions/keygen.php');
	include('files/vars/mysql.php');
	$erm=parse_ini_file('pool/vars/errors.ini');

	$link=connect();

	$q='select * from `users` where `on`="1" and `forget_code`="'.trim($_GET['forget_code']).'"';
	$res=mysql_query($q);
	
	if(mysql_errno()<1){
		if(mysql_num_rows($res)>0){
			$get_pas=keygen();
			$q='update `users` set
			    `forget_code`=NULL,
			    `passw`="'.md5($get_pas['dest'][0]).'"
			    where `on`="1" and `forget_code`="'.trim($_GET['forget_code']).'"';
			$res=mysql_query($q);
			if(mysql_errno()<1){
				
				$user1=new users;
				$user1->find_id($_SESSION['store']['user']['id']);
				
				$m['to']=trim($_SESSION['store']['user']['email']);
				$m['subject']='Новый пароль';
					
				$fln='pool/mails/mail5.html';
				if(file_exists($fln) && filesize($fln)){
					$fp=fopen($fln,'r');
					$m['message']=fread($fp,filesize($fln));
					fclose($fp);
								
					//--- замены в письме
					$m['message']=str_replace('%login_info%',$user1->res['login'],$m['message']);
					$m['message']=str_replace('%passw_info%',$get_pas['dest'][0],$m['message']);
									
					if($user1->mail($m['to'],$m['subject'],$m['message'])){
						$q='update `users` set `email_send`=`email_send`+1 where `id`="'.$uid.'"';
						$res=mysql_query($q);
					}
								
				}else{ $err=$erm[11]; }
			}else{ $err=$erm[6].mysql_error(); }
		}else{ $err=$erm[13]; }
	}else{ $err=$erm[6].mysql_error(); }

	close($link);

	if(isset($err)){
		$_SESSION['er']['remember2']['erm']=$err;
	}
	Header('Location: /tool_user_remember6.php');

?>
