<?php
	
	session_start();
	include('../../files/functions/tools.php');

	
	$tools=new tools;

	//--- ���⢥ত��� ����� ������

	$uid=$_SESSION['store']['user']['id'];
	$forget_code=md5(uniqid(rand(), true));

	$q='update `users` set `forget_code`="'.$forget_code.'" where `id`="'.$uid.'"';
	$res=mysql_query($q);
	if(mysql_errno()<1){
		if(mysql_affected_rows()>0){

			$m['to']=trim($_SESSION['store']['user']['email']);
			$m['subject']='���⢥ত���� ������ ������';
					
			$fln='../mails/mail4.html';
			if(file_exists($fln) && filesize($fln)){
				$fp=fopen($fln,'r');
				$m['message']=fread($fp,filesize($fln));
				fclose($fp);
								
				//--- ������ � ���쬥
				$m['message']=str_replace('%forget_link%',$forget_code,$m['message']);
									
				if($this->mail($m['to'],$m['subject'],$m['message'])){
					$q='update `users` set `email_send`=`email_send`+1 where `id`="'.$uid.'"';
					$res=mysql_query($q);
				}
								
			}else{ $this->err=$this->_erm[11]; }
		}
	}


?>