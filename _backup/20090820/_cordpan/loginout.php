<?php
	session_name('cordpan');
	session_start();

	//--- ��������� ����������
	include('vars/_dir.php');

	//--- ���������� �������
	include('functions/users.php');

	if(isset($_GET['login'])){
		if(isset($_POST['login']) && isset($_POST['passw'])){
			if(trim($_POST['login'])!='' && trim($_POST['passw'])!=''){
				$usr=user_getInfo_auth(trim($_POST['login']),trim($_POST['passw']));
				if($usr[0]==null || trim($usr[0])==''){ $er=$usr[1]; }
			}else{ $er='������ ���� �� �����������'; }
		}else{ $er='��������� �� ����������'; }
		if(isset($er)){
			$_SESSION['er']['login']=trim($_POST['login']);
			$_SESSION['er']['message']=$er;
		}else{
			user_store($usr[0]['uid']);
		}
	}elseif(isset($_GET['logout'])){
		user_forget();
	}
	if(isset($_POST['return_url'])){
		header('Location: '.$_POST['return_url']);
	}else{
		header('Location: '.$_SERVER['HTTP_REFERER']);
	}
?>
