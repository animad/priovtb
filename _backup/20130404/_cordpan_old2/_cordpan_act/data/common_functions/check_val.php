<?php
	function check_val($var=null,$exists=null,$empty=null,$email=null,$href=null){
		if($var!=null){
			$box=$GLOBALS;
			$ans=0; //--- если 0 то ОК

			if($exists!=null && is_array($exists)){
				for($i=0;$i<count($exists);$i++){
					if(!isset($box[$var][$exists[$i]])){
						$ans++;
						if(!isset($erm)){ $erm='Отсутствуют необходимые параметры'; }
					}
				}
			}
		
			if($empty!=null && is_array($empty)){
				for($i=0;$i<count($empty);$i++){
					if(trim($box[$var][$empty[$i]])==''){
						$ans++;
						if(!isset($erm)){ $erm='Поля указанные (*) обязательны для заполнения'; }
					}
				}
			}

			if($email!=null && is_array($email)){
				for($i=0;$i<count($email);$i++){
					//---
//					if(!isset($erm)){ $erm='Адрес e-mail введен с ошибкой'; }
				}
			}

			if($href!=null && is_array($href)){
				for($i=0;$i<count($href);$i++){
					//---
//					if(!isset($erm)){ $erm='Ссылка в интернете введена с ошибкой'; }
				}
			}
			if($ans>0){
				$_SESSION['er']['msg']=$erm;

				$_SESSION['er']['show']=$_POST['show'];
				$_SESSION['er']['title']=$_POST['title'];
				$_SESSION['er']['href']=$_POST['href'];
				$_SESSION['er']['theme']=$_POST['theme'];
				$_SESSION['er']['section']=$_POST['section'];
				$_SESSION['er']['overview']=$_POST['overview'];
				if(isset($_GET['m'])){ $_SESSION['er']['dest1']=$_GET['m']; }
				if(isset($_POST['dest2'])){ $_SESSION['er']['dest2']=$_POST['dest2']; }

				return false;
			}else{ return true; }
		}else{ return false; }
		
	}
?>
