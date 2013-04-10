<?php

	class mail extends tools{
		var $res;
		var $_err;
		var $_vars;
		
		function mail(){
			parent::tools();
			
			$this->res=null;
			$this->_err=null;
		
//			$this->_vars['mail']['headers'] ="MIME Version: 1.0\r\n";

			$this->_vars['mail']['headers'].="Content-type: text/html; ";
			$this->_vars['mail']['headers'].="charset=windows-1251\r\n";
//			$this->_vars['mail']['headers'].="charset=\"koi8-r\"\r\n";

//			$this->_vars['mail']['headers'].="format=flowed;\r\n";
//			$this->_vars['mail']['headers'].="Content-Transfer-Encoding: 7bit\r\n";

//			$this->_vars['mail']['headers'].="To: title <adr>\r\n";
			$this->_vars['mail']['headers'].="From: (ОАО) Прио-Внешторгбанк <support@priovtb.com>\r\n";
//			$this->_vars['mail']['headers'].="Cc: title <adr>\r\n";
//			$this->_vars['mail']['headers'].="Bcc: title <adr>\r\n";
		}
	
		public function send($to=null,$subject=null,$message=null){
			$this->res=null;
			
			if($to!=null && $subject!=null && $message!=null){
				if(is_array($to)){ $to=implode(', ',$to); }
				$message=wordwrap($message,70);
				$this->res=mail($to,$subject,$message,$this->_vars['mail']['headers']);
				return $this->res;
			}
		}
	
	}
?>