<?php

	class tools{
		var $_erm;
		var $_dir;
		var $_db;
		var $_vars;
		
		public function tools(){
			$this->_dir();
			$this->get_erm();
			$this->vars_init();
			
			$this->mysql();
		}
		
		public function __destruct (){
			if(isset($_this->_db['link'])){ $this->db_close(); }
		}
		
		//--- данные о путях
		private function _dir(){
			$this->_dir['site']=$_SERVER['DOCUMENT_ROOT'];
			$this->_dir['pubvars']=$this->_dir['site'].'/pool/vars';
		}
		
		//--- инициализация переменных
		public function vars_init(){
			$this->_vars['inn_size_min']=10;
			$this->_vars['inn_size_max']=12;


//			$this->_vars['email_mask']="^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$";
			$this->_vars['email_mask']="^[a-zA-Z0-9_\.\-]+@([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9\-\.]{2,10}$";
			
			//--- параметры письма
			$this->_vars['mail']['headers']='';
//			$this->_vars['mail']['headers'] ="MIME Version: 1.0\r\n";

			$this->_vars['mail']['headers'].="Content-type: text/html; ";
			$this->_vars['mail']['headers'].="charset=windows-1251\r\n";

//			$this->_vars['mail']['headers'].="format=flowed;\r\n";
//			$this->_vars['mail']['headers'].="Content-Transfer-Encoding: 7bit\r\n";

//			$this->_vars['mail']['headers'].="charset=koi8-r\r\n";
			
//			$this->_vars['mail']['headers'].="To: title <adr>\r\n";
			$this->_vars['mail']['headers'].="From: (ОАО) Прио-Внешторгбанк <support@priovtb.com>\r\n";
//			$this->_vars['mail']['headers'].="Cc: title <adr>\r\n";
//			$this->_vars['mail']['headers'].="Bcc: title <adr>\r\n";
		}
		
		//--- сообщения об ошибках
		private function get_erm(){
			$this->_erm=parse_ini_file($this->_dir['pubvars'].'/errors.ini');
		}
		
		//--- параметры соединения с БД
		private function mysql(){
			include($this->_dir['site'].'/files/vars/mysql.php');
			
			$this->_db['host']=$globals['mysql']['host'];
			$this->_db['user']=$globals['mysql']['user'];
			$this->_db['passw']=$globals['mysql']['passw'];
			$this->_db['db']=$globals['mysql']['db'];
		}
		
		// MYSQL - подключение
		function db_connect(){
			$link=mysql_connect($this->_db['host'],$this->_db['user'],$this->_db['passw']) or die ("Could not connect to MySQL");
			mysql_select_db ($this->_db['db']) or die ("Could not select database");
			$res=mysql_query('set character set cp1251'); //cp1251_utf8
			$this->_db['link']=$link;
		}
		// MYSQL - откл.
		function db_close(){
			mysql_close($this->_db['link']);
		}
		
		
		//--- составляем письмо
		public function mail($to=null,$subject=null,$message=null){
			$this->res=null;
			
			if($to!=null && $subject!=null && $message!=null){
				if(is_array($to)){ $to=implode(', ',$to); }
				$message=wordwrap($message,70);
				$this->res=mail($to,$subject,$message,$this->_vars['mail']['headers']);
			}
			//log
			$this->log_store('mail',
			                 array(str_pad(($this->res?'send':'not send'),8),
			                       date('Y.m.d H:i:s'),
			                       'to: '.str_pad(($to!=null?$to:'???'),30),
			                       'text size: '.($message!=null?strlen($message):'???'),
			                       'mail subject: '.($subject!=null?$subject:'???')
			                      )
			                );
			return $this->res;
		}
		
		//log STORE
		public function log_store($place=null,$text=null){
			if($place!=null && $text!=null){
				if(is_array($text)){ $text=implode('  ##  ',$text); }

				switch($place){
					case 'mail':
						$fln='/usr/home/f_prio/public_html/logs/mail_send.log';
					break;
				}

				$fp=fopen($fln,'a');
				$ans=fwrite($fp,$text."\r\n\r\n");
				fclose($fp);
			}
		}
		
// оформление
		function colrow($i=0){
			return ' class="'.($i%2?'odd':'even').'"';
		}
		
		
		
		
	}

?>
