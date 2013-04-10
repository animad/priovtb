<?php
	function user_getInfo_id($uid=null){
		global $_dir;		if($uid!=null){			$d=dir($_dir['users']);
			while(false!==($entry=$d->read())) {				if(filesize($_dir['users'].$entry) && strrchr($entry,'.')=='.php' && substr($entry,0,1)!='-'){					$t=user_parse($_dir['users'].$entry);
					if($t!=null && ($uid==null || $uid!=null && $uid==$t['uid'])){						$data=$t;
						break;
					}
				}			}
			$d->close();
		}
		if(isset($data)){ return array($data,0); }else{ return array(null,3); }
	}
	
	function user_getInfo_auth($login=null,$passw=null){		global $_dir;
		if($login!=null && $passw!=null){
			$d=dir($_dir['users']);
			while(false!==($entry=$d->read())) {
				if(filesize($_dir['users'].$entry) && strrchr($entry,'.')=='.php' && substr($entry,0,1)!='-'){
					$t=user_parse($_dir['users'].$entry);
					if($t!=null && ($login==$t['login'] && md5($passw)==$t['passw'])){						$data=$t;
						break;
					}
				}
			}
			if(isset($data)){ return array($data,0); }else{ return array(null,'Пользователь не найден'); }
			$d->close();
		}
	}
	
	function user_parse($fln=null){		if($fln!=null){			$data=file($fln);
			unset($data[0]);
			$data1['fln']=substr(strrchr($fln,'/'),1);
			foreach($data as $val){				if(trim($val)!=''){					$key1=trim(substr($val,0,strpos($val,':')));					$val1=trim(substr(strstr($val,':'),1));
					$data1[$key1]=$val1;
				}
			}
		}
		return isset($data1)?$data1:null;
	}
	
	function user_store($uid=null){		if($uid!=null){			if(isset($_SESSION['user'])){ user_forget(); }
			$u=user_getInfo_id($uid);
			if($u[1]==0){
				$_SESSION['user']=$u[0];
				setcookie('user_uid',$_SESSION['user']['uid'], time()+3600*24*30*5, '/');
			}else{ user_forget(); }
		}	}
	
	function user_forget(){		if(isset($_SESSION['user'])){			unset($_SESSION['user']);
			unset($_COOKIE['user_id']);
			setcookie ('user_uid', '', time()-3600, '/');
		}
	}
	
	function user_save($fln=null,$user=null,$rc=false){
print '<pre>';
print_r ($user);
print '</pre>';
	
	
		if($fln!=null && $user!=null){
			global $_dir;
			if(isset($user['fln'])){ unset($user['fln']); }
			
			//---обработка данных
			if(isset($rc['passw'])){
				if(isset($user['passw']) && trim($user['passw']!='')){
					if(!isset($user['passw2']) || isset($user['passw2']) && trim($user['passw2'])!=trim($user['passw'])){
						$erm='ВНИМАНИЕ! Поля "пароль" и "пароль (повторите)" не совпадают.';
					}
				}
			}
			
			if(isset($user['email']) && trim($user['email']!='')){
				if(!eregi("^[a-z0-9\._-]+@[a-z0-9\._-]+\.[a-z]{2,4}\$", trim($user['email']))){ $erm='ВНИМАНИЕ! Поле "почта" содержит некорректный адрес.'; }
			}
			if(isset($user['site_url']) && trim($user['site_url']!='')){
				if(!eregi("^((http|ftp|https)://)?[a-zA-Z0-9%\._\?\&#=-]+$", trim($user['site_url']))){ $erm='ВНИМАНИЕ! Поле "сайт" содержит некорректный адрес.'; }
			}
			
			
			if(!isset($erm)){
				if(isset($rc['passw'])){
					//---шифруем пароль
					if(isset($user['passw']) && trim($user['passw']!='')){ $user['passw']=md5(trim($user['passw'])); }
				}
				$data=user_template($user,$_dir['users'].$fln);

				if($data && trim($data)!=''){
					$fln1=$_dir['users'].$fln;
					$fp=fopen($fln1,'w+');
					if($fp){
						fwrite($fp,$data);
						fclose($fp);
						@chmod($fln1, 0777);
					}else{ $erm='Невозможно открыть для записи'; }
				}else{ $erm='data is clear'; }
			}
			
			if(isset($erm)){
				$_SESSION['erm']=$_POST;
				$_SESSION['erm']['msg']=$erm;
			}
		}
	}
	
	function user_template($user=null,$fln){
		global $_comvars;
		
		if($user!=null){
			if(file_exists($fln) && filesize($fln)){
				$user2=user_parse($fln);
				//--- если пароль не менялся, вставляем старый
				if(isset($user2['passw']) && trim($user2['passw'])!='' && trim($user['passw'])==''){
					$user['passw']=$user2['passw'];
				}
				
			}else{ $user2=false; }

			$data[]='<?die;?>';
			reset($_comvars['user_f2sv']);
			while(list($i,$val)=each($_comvars['user_f2sv'])){
				if($i=='passw' && trim($user[$i])==''){
					$user[$i]=$user2['passw'];
				}
				$data[]=$i.':'.(isset($user[$i]) && trim($user[$i])!=''?$user[$i]:'');
			}
			return implode("\r\n",$data);
		}else{ return false; }
	}
	
	function user_drop($fln=null,$check=false){
		global $_dir;
		if(file_exists($_dir['users'].$fln)){
			if($check){
				$user=user_parse($_dir['users'].$fln);
				if(isset($user['on']) && $user['on']==0){
					$ok=true;
				}else{ $ok=false; }
			}else{ $ok=true; }
			
			if($ok){
				$ans=rename($_dir['users'].$fln,$_dir['users'].'-'.$fln);
			}else{ $ans=false; }
		}
	}
	
	function users_drop($check=false){
		global $_dir;		$d=dir($_dir['users']);
		while(false!==($entry=$d->read())) {			if(filesize($_dir['users'].$entry) && strrchr($entry,'.')=='.php' && substr($entry,0,1)!='-'){
				user_drop($entry,$check);
			}		}
		$d->close();
	}
	
?>
