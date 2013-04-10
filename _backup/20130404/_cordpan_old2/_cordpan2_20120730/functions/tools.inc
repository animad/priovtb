<?php

	class tools{
		var $_vars;
		var $_dir;
		var $_er;
		
		function tools(){
			$this->dir_init();
			$this->db_connect();
			$this->vars_init();
			
			$this->_vars['erm']=parse_ini_file($this->_dir['svars'].'/er_msg.ini');
		}
		function __destruct(){
			$this->db_close();
		}
		
		function dir_init(){
			$this->_dir['cordpan']=getcwd();
			chdir('..');
			$this->_dir['site']=getcwd();
			chdir($this->_dir['cordpan']);
			$this->_dir['svars']=$this->_dir['site'].'/files/vars';

			$this->_dir['svars']=$this->_dir['site'].'/files/vars';
		}
		function vars_init(){
			$this->_vars['email'][0]="^[0-9a-zA-Z\.-\_]+@[0-9a-zA-Z\.-\_]+\.[0-9a-zA-Z]{2,4}\$";
			
			$this->_vars['email']['headers'][]='MIME-Version: 1.0';
			$this->_vars['email']['headers'][]='Content-type: text/html; charset=windows-1251';
			$this->_vars['email']['headers'][]='From: imhoc post <post@imhoc.org>';

		}
		
		
//--- MySQL
		
		function db_connect(){
			include($this->_dir['svars'].'/mysql.php');
			$this->_vars['link']=mysql_connect($globals['mysql']['host'],$globals['mysql']['user'],$globals['mysql']['passw']) or die ("Could not connect to MySQL");			$ans=mysql_select_db($globals['mysql']['db'],$this->_vars['link']) or die ("Could not select database");
			mysql_query('set character set cp1251'); //cp1251_utf8
			
		}			function db_close(){
			$ans=null;
			if(isset($this->_vars['link']) && is_resource($this->_vars['link'])){
				$ans=mysql_close($this->_vars['link']);
			}else{ $ans=false; }
			return $ans;		}
		
		function db_query($q=null,$f=''){
			//log - последовательность вызовов
			$f=(isset($f['f'])?trim($f['f']):'').' ## '.__METHOD__;
			
			if($q!=null){
				$res=mysql_query(trim($q));
				if(mysql_errno()<1){
					if(stripos($q,'select')!==false){
						if(mysql_num_rows($res)>0){
							while($row=mysql_fetch_assoc($res)){ $res1[]=$row; }
						}else{ $res1=null; }
					}elseif(stripos($q,'insert')!==false){
						if(mysql_affected_rows()>0){
							$res1=$res;
						}else{ $erm=$this->err_log(4,$f); }
					}elseif(stripos($q,'update')!==false){
						if(mysql_affected_rows()>0){
							$res1=$res;
						}else{ $res1=null; }
					}else{ $erm=$this->err_log(3,$f); }
				}else{ $erm=$this->err_log(2,$f,'<em>'.mysql_error().'</em>'); }
			}else{ $erm=$this->err_log(1,$f); }
			
			if(isset($erm)){
				return array(false,$erm);
			}else{
				return ($res1==null?array(null,null):array(true,$res1));
			}
		}
		
//--- LOG
		
		function err_log($id=null,$f='',$append=null){
			//log - последовательность вызовов
			$f=(isset($f['f'])?trim($f['f']):'').' ## '.__METHOD__;
			
			//формируем текстовое сообщение
			if($id!=null){
				if(isset($this->_vars['erm'][$id])){
					$ans=true;
					$msg='(#'.$id.') '.output($this->_vars['erm'][$id]).($append!=null?output($append):'');
				}else{ $ans=-1; }
			}else{ $ans=null; }
			
			if($ans==true){
				// сохраняем сообщение об ошибке
				$q='insert into `log` set
					`date`=NOW(),
					`uid`="'.$_SESSION['user']['id'].'",
					`tool`="'.input($f).'",
					`msg`="'.input($msg).'"';
				$res=$this->db_query($q,$f);
			}
			return ($ans==true?$msg:$ans);
		}
		
		//log - последовательность вызовов функций
		function log_f($f='',$cur='*no name*'){
			return trim($f.($f!=''?' ## ':'').$cur);
		}
		
		//ОШИБКА - оформление текстовой строки
		function err_log_show($msg=null){
			return ($msg!=null?'<div class="err_msg">'.input($msg).'</div>':'');
		}
		
//--- validator

		function mail_valid($adr=null,$f=''){
			//log - последовательность вызовов
			$f=(isset($f['f'])?trim($f['f']):'').' ## '.__METHOD__;
			
			if($adr!=null){
				$res=ereg($this->_vars['email'][0],trim($adr));
				return array($res,($res?trim($adr):$this->err_log(8,$f)));
			}else{ return array(null,null); }
		}
		
//--- посыл письма

		function mail_send($_arg=null){
			//log - последовательность вызовов
			$f=(isset($_arg['f'])?trim($_arg['f']):'').' ## '.__METHOD__;
			
			if(isset($_arg['adr']) && isset($_arg['subject']) && isset($_arg['text'])){
				$res=$this->mail_valid($_arg['adr'],$f);
				if($res[0]==true){
					
					mail(trim($_arg['adr']),trim($_arg['subject']),trim($_arg['text']),implode("\r\n",$this->_vars['email']['headers']));
					
				}else{ $erm=$res[1]; }
			}else{ $erm=$mtool->err_log(1,$f); }
			
			if(isset($erm)){
				return array(false,$erm,array($_arg));
			}else{ return $res; }

		}
		
//--- input/output
		
		function io_rowcol($_arg=null){
			//log - последовательность вызовов
			$f=(isset($_arg['f'])?trim($_arg['f']):'').' ## '.__METHOD__;
			
			if(isset($_arg['i'])){
				return ($_arg['i']%2?'odd':'even');
			}else{ $erm=$mtool->err_log(1,$f); }
		}
	}
