<?php

	class users extends tools{
		var $res;
		var $err;
		var $data;
		var $vars;
	
		function users(){
			parent::tools();
			$this->err=null;
			
			$this->db_connect();
			
			$this->vars['form1']['width1']='100%';
			$this->vars['form1']['width2']='150px';
			$this->vars['form1']['hidden']['back']='<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['REQUEST_URI']).'#form_login">';
			$this->vars['form1']['hidden']['forward']='<input type="hidden" name="forward" value="'.$_SERVER['REQUEST_URI'].'">';
			$this->vars['form1']['action']='tool-user_login.php';
			
		}

		
		function form1($width1='100%'){
			if(isset($_SESSION['er']['user_login'])){
				$login=isset($_SESSION['er']['user_login']['login'])?trim($_SESSION['er']['user_login']['login']):'';
				$erm=isset($_SESSION['er']['user_login']['msg'])?'<p align="center" style="color: red;">'.trim($_SESSION['er']['user_login']['msg']).'</p>':'';
				unset($_SESSION['er']['user_login']);
			}else{
				$login='';
				$erm='<br />';
			}
			
			$data='<div class="block1">'.
			              '<a name="form_login"></a>'.
				      '<table class="table1" width="'.$this->vars['form1']['width1'].'" align="center">'.
					      '<tr class="header1"><td class="tl"></td><td class="t"></td><td class="tr"></td></tr>'.
					      '<tr class="header1"><td class="l"></td><td class="data">'.
						       'вход для клиентов'.
					      '</td><td class="r"></td></tr>'.
					      '<tr><td class="l"></td><td class="data">'.
							  '<form id="f_user_login" action="tool-user_login.php" method="post" style="margin: 0; padding: 0;">'.
							  implode('',$this->vars['form1']['hidden']).
						      '<table class="table2" cellpadding="2" cellspacing="0" border="0" width="'.$this->vars['form1']['width1'].'">'.
							      '<tr>'.
								      '<td>Логин</td>'.
									  '<td width="'.$this->vars['form1']['width2'].'"><input type="text" style="width: '.$this->vars['form1']['width2'].';" id="user_login" value="'.$login.'" name="user_login"></td>'.
								  '</tr>'.
							      '<tr>'.
								      '<td>Пароль</td>'.
									  '<td width="'.$this->vars['form1']['width2'].'"><input type="password" style="width: '.$this->vars['form1']['width2'].';" id="user_passw" value="" name="user_passw"></td>'.
						      '</table>'.
							  '<br />'.
							  '<div align="center">'.
								  '<input type="submit" value="Войти" class="hrf1">'.
								  $erm.
							      '<a href="tool_user_reg.php" class="hrf5">Зарегистрироваться</a>'.
								  '<br />'.
							      '<a href="tool_user_remember.php" class="hrf5">Забыли пароль?</a>'.
							  '</div>'.
							  '</form>'.
					      '</td><td class="r"></td></tr>'.
					      '<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>'.
				      '</table>'.
//			              $erm.
			      '</div>';
			
			$this->res=$data;
			return $this->res;
		}
		
		//-- приветствие 1
		function form2(){
		
			$data='<div class="block1">'.
				      '<table class="table1" width="100%">'.
					      '<tr class="header1"><td class="tl"></td><td class="t"></td><td class="tr"></td></tr>'.
					      '<tr class="header1"><td class="l"></td><td class="data">'.
						       'Здравствуйте!'.
					      '</td><td class="r"></td></tr>'.
					      '<tr><td class="l"></td><td class="data">'.
						      '<div style="text-align: center; margin: 5px 0;">'.output($_SESSION['user']['fio']).'<br />'.output($_SESSION['user']['org']).'</div>'.
							  '<a href="/tool-user_logout.php" class="hrf5">Выход</a>'.
					      '</td><td class="r"></td></tr>'.
					      '<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>'.
				      '</table>'.
			      '</div>';
			
			$this->res=$data;
			return $this->res;
		}


		//--- вспомнить пароль

		function form3($width1='100%'){
			if(isset($_SESSION['er']['user_remember'])){
				$login=isset($_SESSION['er']['user_remember']['login'])?trim($_SESSION['er']['user_remember']['login']):'';
				$erm=isset($_SESSION['er']['user_remember']['msg'])?'<p align="center" style="color: red;">'.trim($_SESSION['er']['user_remember']['msg']).'</p>':'';
				unset($_SESSION['er']['user_remember']);
			}else{
				$login='';
				$erm='<br />';
			}
			
			$data='<div class="block1">'.
			              '<a name="form_login"></a>'.
				      '<table class="table1" width="'.$this->vars['form1']['width1'].'" align="center">'.
					      '<tr class="header"><td class="tl"></td><td class="t"></td><td class="tr"></td></tr>'.
					      '<tr><td class="l"></td><td class="data">'.
							  '<form id="f_user_login" action="tool-user_remember1.php" method="post" style="margin: 0; padding: 0;">'.
							  implode('',$this->vars['form1']['hidden']).
						      '<table class="table2" cellpadding="2" cellspacing="0" border="0" width="'.$this->vars['form1']['width1'].'">'.
							      '<tr>'.
								      '<td>Ваш логин</td>'.
									  '<td width="'.$this->vars['form1']['width2'].'"><input type="text" style="width: '.$this->vars['form1']['width2'].';" id="user_login" value="'.$login.'" name="user_login"></td>'.
								  '</tr>'.
						      '</table>'.
							  '<br />'.
							  '<div align="center">'.
								  '<input type="submit" value="Проверка" class="hrf1">'.
								  $erm.
							      '<a href="tool_user_reg.php" class="hrf5">Зарегистрироваться</a>'.
							  '</div>'.
							  '</form>'.
					      '</td><td class="r"></td></tr>'.
					      '<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>'.
				      '</table>'.
			      '</div>'.
			      '<br />';
			
			$this->res=$data;
			return $this->res;
		}
		



		//--- форма регистрации
		function registration(){
			$j1=0;
			$sect='user_reg';

			//--- имена передаваемых полей
			$f['n']=array('login','org','inn','fio','email');

			for($i=0;$i<count($f['n']);$i++){
				if(isset($_SESSION['er'][$sect])){
					$$f['n'][$i]=isset($_SESSION['er'][$sect][$f['n'][$i]])?trim($_SESSION['er'][$sect][$f['n'][$i]]):'';
				}else{
					$$f['n'][$i]='';
				}
			}
			
			if(isset($_SESSION['er'][$sect])){
				$erm=isset($_SESSION['er'][$sect]['msg'])?'<p align="center" style="color: red;">'.trim($_SESSION['er'][$sect]['msg']).'</p><br />':'';
				unset($_SESSION['er'][$sect]);
			}else{
				$erm='<br />';
			}
			
			if(!isset($_SESSION['back'])){ $_SESSION['back']=$_SERVER['HTTP_REFERER']; }
			
			$data=
				      '<h1>Регистрация пользователя</h1>'.
//					  '<div align="center"><i>первый этап регистрации</i></div>'.
					  '<div align="center"><i>все поля обязательны для заполнения</i></div>'.
					  '<br />'.
					  '<form id="f_user_register" action="tool-user_create.php" method="post" style="margin: 0; padding: 0;">'.
					      '<input type="hidden" name="back" value="'.$_SESSION['back'].'">'.
						  '<table class="table5" cellpadding="5" cellspacing="1" border="0" align="center">'.
							  '<tr'.$this->colrow($j1++).'>'.
								  '<td align="left">Логин</td>'.
								  '<td width="250"><input type="text" style="width: 250px;" id="'.$f['n'][0].'" value="'.$$f['n'][0].'" name="'.$f['n'][0].'"></td>'.
							  '</tr>'.
							  '<tr'.$this->colrow($j1++).'><td colspan="2" style="height: 5px; line-height: 5px; font-size: 0; padding: 0; margin: 0;"><img src="files/images/point1.gif" width="95%" height="1" border="0"></td></tr>'.
							  '<tr'.$this->colrow($j1++).'>'.
								  '<td align="left">Название<br />организации</td>'.
								  '<td width="250"><input type="text" style="width: 250px;" id="'.$f['n'][1].'" value="'.$$f['n'][1].'" name="'.$f['n'][1].'"></td>'.
							  '</tr>'.
							  '<tr'.$this->colrow($j1++).'>'.
								  '<td align="left">ИНН</td>'.
								  '<td width="250"><input type="text" style="width: 250px;" id="'.$f['n'][2].'" value="'.$$f['n'][2].'" name="'.$f['n'][2].'"></td>'.
							  '</tr>'.
							  '<tr'.$this->colrow($j1++).'>'.
								  '<td align="left">Ф.И.О.</td>'.
								  '<td width="250"><input type="text" style="width: 250px;" id="'.$f['n'][3].'" value="'.$$f['n'][3].'" name="'.$f['n'][3].'"></td>'.
							  '</tr>'.
							  '<tr'.$this->colrow($j1++).'>'.
								  '<td align="left">Эл.почта</td>'.
								  '<td width="250"><input type="text" style="width: 250px;" id="'.$f['n'][4].'" value="'.$$f['n'][4].'" name="'.$f['n'][4].'"></td>'.
							  '</tr>'.
						  '</table>'.
					  '<br />'.
					  '<div align="center">'.
						  '<input type="submit" value="Зарегистрироваться" class="hrf4"><br />'.
						  $erm.
						  '<a href="tool_user_remember.php" class="hrf5">Забыли пароль?</a>'.
					  '</div>'.
					  '</form>'.
					  '<br />';
			
			$this->res=$data;
			return $this->res;
		}
		
		//--- авторизация пользователя по ЛОГИНУ И ПАРОЛЮ
		public function authorize(){
			if(isset($_POST['user_login']) && isset($_POST['user_passw'])){
				if(trim($_POST['user_login'])!='' && trim($_POST['user_passw'])!=''){
					$this->find_lp(trim($_POST['user_login']),trim($_POST['user_passw']));
					if($this->err==null){
						if($this->res['on']==1){
							$sc=md5(uniqid(rand(),true));
							$q='update `users` set `session_code`="'.$sc.'" where `id`="'.$this->res['id'].'"';
							$res=mysql_query($q);
							setcookie('session_code',$sc,time()+3600*24*2);

							unset($this->res['passw']); //--- на всякий случай
							$_SESSION['user']=$this->res;

							unset($_SESSION['user']['passw']);
						}else{ $this->err=$this->_erm[5]; }
					}
				}else{ $this->err=$this->_erm[2]; }
			}else{ $this->err=$this->_erm[1]; }
		}
		
		//--- ЗАБЫТЬ пользователя
		public function logout(){
			$sc=$_COOKIE['session_code'];

			$q='update `users` set `session_code`=NULL where `session_code`="'.$sc.'" limit 1';
			$res=mysql_query($q);
			if(mysql_errno()>0){ $this->err=mysql_error(); }
			
			unset($_SESSION['user']);
			
			setcookie('session_code','',time()-3600);
			unset($_COOKIE['session_code']);

		}
		
		//--- создание пользователя
		public function create(){
			$this->err=null;
			
			if(isset($_POST['login']) && isset($_POST['inn']) && isset($_POST['fio']) && isset($_POST['org']) && isset($_POST['email'])){
				if(trim($_POST['login'])!='' && trim($_POST['inn'])!='' && trim($_POST['fio'])!='' && trim($_POST['org'])!='' && trim($_POST['email'])!=''){
					//--- проверяем логин, есть ли такой
					$q='select * from `users` where `login` like "'.trim($_POST['login']).'" limit 1';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_num_rows($res)<1){
							//--- проверяем размер ИНН
							if(strlen(trim($_POST['inn'])) >= $this->_vars['inn_size_min'] && strlen(trim($_POST['inn'])) <= $this->_vars['inn_size_max']){
								//--- проверяем e-mail
								if(ereg($this->_vars['email_mask'],trim($_POST['email']))){
									
									$act_code=md5(uniqid(rand(), true));
									
									//--- регистрируем
									$q='insert into `users` set
									    `date_reg`=NOW(),
										`login`="'.addslashes(trim($_POST['login'])).'",
										`org`="'.addslashes(trim($_POST['org'])).'",
										`inn`="'.addslashes(trim($_POST['inn'])).'",
										`fio`="'.addslashes(trim($_POST['fio'])).'",
										`email`="'.addslashes(trim($_POST['email'])).'",
										`act_code`="'.$act_code.'"
										';
									$res=mysql_query($q);
									if(mysql_errno()<1){
										if(mysql_affected_rows()>0){
											
											//--- ID нового пользователя
											$uid=mysql_insert_id();
											
											//--- проверяем АДРЕС ЭЛ.ПОЧТЫ письмом
											$m['to']=trim($_POST['email']);
											$m['subject']='Подтверждение регистрации';
											
											$fln='../mails/mail1.html';
											if(file_exists($fln) && filesize($fln)){
												$fp=fopen($fln,'r');
												$m['message']=fread($fp,filesize($fln));
												fclose($fp);
												
												//--- замены в письме
												$m['message']=str_replace('%activate_link%',$act_code,$m['message']);
												
												if($this->mail($m['to'],$m['subject'],$m['message'])){
													$q='update `users` set `email_send`=`email_send`+1 where `id`="'.$uid.'"';
													$res=mysql_query($q);

//--- информационное письмо в банк о новом клиенте
$fln='../mails/mail6.html';
if(file_exists($fln) && filesize($fln)){
	$fp=fopen($fln,'r');
	$m['message']=fread($fp,filesize($fln));
	fclose($fp);
	$this->mail('kb@priovtb.com','Список клиентов, ожидающих регистрацию на priovtb.com, обновился',$m['message']);
}
												}
												
											}else{ $this->err=$this->_erm[11]; }
										}else{ $this->err=$this->_erm[10]; }
									}else{ $this->err=$this->_erm[6].' '.mysql_error(); }
								}else{ $this->err=$this->_erm[9]; }
							}else{ $this->err=$this->_erm[8]; }
						}else{ $this->err=$this->_erm[7]; }
					}else{ $this->err=$this->_erm[6].' '.mysql_error(); }
				}else{ $this->err=$this->_erm[2]; }
			}else{ $this->err=$this->_erm[1]; }
			
			if($this->err!=null){
				$_SESSION['er']['user_reg']['login']=trim($_POST['login']);
				$_SESSION['er']['user_reg']['org']=trim($_POST['org']);
				$_SESSION['er']['user_reg']['inn']=trim($_POST['inn']);
				$_SESSION['er']['user_reg']['fio']=trim($_POST['fio']);
				$_SESSION['er']['user_reg']['email']=trim($_POST['email']);
				$_SESSION['er']['user_reg']['msg']=trim($this->err);

				$_SESISON['back']=$_POST['back'];
			}
		}
		
		//--- подтверждение регистрации
		public function confirm($act_code=null){
			$this->err=null;
			
			$q='update `users` set `date_act`=NOW(), `email_check`="1" where `act_code`="'.$act_code.'" and `date_act` is NULL';
			$res=mysql_query($q);
			if(mysql_errno()<1){
				if(mysql_affected_rows()<1){ $this->err=$this->_erm[13]; }
			}else{ $this->err=$this->_erm[6].' '.mysql_error(); }
		}
		
		
		//--- поиск ПОЛЬЗОВАТЕЛЯ по ЛОГИНУ И ПАРОЛЮ
		public function find_lp($login=null,$passw=null){
			if($login!=null && trim($login)!='' && $passw!=null && trim($passw)!=''){
				$q='select * from `users` where `login` like "'.addslashes(trim($login)).'" and `passw` like "'.md5(trim($passw)).'" limit 1';
				$this->find_res(mysql_query($q));
			}else{ $this->err=$this->_erm[1]; }
		}
		
		//--- поиск ПОЛЬЗОВАТЕЛЯ по SESSION_CODE
		public function find_sc($sc=null,$on=null){
			if($sc!=null && trim($sc)!=''){
				$q='select * from `users` where '.($on!=null?'`on`="'.$on.'" and ':'').'`session_code` like "'.addslashes(trim($sc)).'" limit 1';
				$this->find_res(mysql_query($q));
			}else{ $this->err=$this->_erm[1]; }
		}

		//--- поиск ПОЛЬЗОВАТЕЛЯ по ЛОГИНУ
		public function find_l($login=null,$on=null){
			if($login!=null && trim($login)!=''){
				$q='select * from `users` where '.($on!=null?'`on`="'.$on.'" and ':'').'`login` like "'.addslashes(trim($login)).'" limit 1';
				$this->find_res(mysql_query($q));
			}else{ $this->err=$this->_erm[1]; }
		}

		//--- поиск ПОЛЬЗОВАТЕЛЯ по ID
		public function find_id($id=null,$on=null){
			if($id!=null && trim($id)!=''){
				$q='select * from `users` where '.($on!=null?'`on`="'.$on.'" and ':'').'`id`="'.$id.'" limit 1';
				$this->find_res(mysql_query($q));
			}else{ $this->err=$this->_erm[1]; }
		}

		//--- обработка результата поиска
		public function find_res($res){
			if(mysql_errno()<1){
				if(mysql_num_rows($res)>0){
					$this->res=mysql_fetch_assoc($res);
					unset($this->res['passw']);
				}else{ $this->err=$this->_erm[4]; }
			}else{ $this->err=mysql_error(); }
		}


		//--- обновление DATE_ONLINE
		public function online_update(){
			if(isset($_SESSION['user'])){
				$q='update `users` set `date_online`=NOW() where `id`="'.$_SESSION['user']['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $this->err=mysql_error(); }
			}
		}

	}

?>
