<?php

	function var_add($file=null,$var=null,$arrname=null){		if($file!=null && $var!=null){			global $mod,$_modvars;
			
			if(file_exists($file) && filesize($file)){				$key=trim(key($var));
				$val=trim(current($var));				if($arrname!=null){					$data=$arrname.'['.$key.']:'.$val;
				}else{ $data=$key.':'.$val; }
			
				$fp=fopen($file, 'a');
				fwrite ($fp, "\r\n".$data);
				fclose ($fp);
			}
		}
	}

	function var_edit($file=null,$var=null,$arrname=null){
		if($file!=null && $var!=null){
			global $mod,$_modvars;
			
			if(file_exists($file) && filesize($file)){				$dump=file($file);
				unset($dump[0]);

				$key=trim(key($var));
				$val=trim(current($var));
				if($arrname!=null){
					$data=$arrname.'['.$key.']:';
				}else{ $data=$key.':'; }

				while(list($key1,$val1)=each($dump)){					if(strpos(trim($val1),$data)===0){						$dump[$key1]=trim($data.$val);
					}else{ $dump[$key1]=trim($dump[$key1]); }
				}

				$fp=fopen($file, 'w');
				fwrite ($fp, "<?die;?>\r\n".implode("\r\n",$dump));
				fclose ($fp);
			}
		}
	}

	function var_del($file=null,$var=null,$arrname=null){
		if($file!=null && $var!=null){
			global $mod,$_modvars;
			
			if(file_exists($file) && filesize($file)){
				$dump=file($file);
				unset($dump[0]);

				$key=trim(key($var));
				$val=trim(current($var));
				if($arrname!=null){
					$data=$arrname.'['.$key.']:';
				}else{ $data=$key.':'; }

				while(list($key1,$val1)=each($dump)){
					if(strpos(trim($val1),$data)===0){
						unset($dump[$key1]);
					}else{ $dump[$key1]=trim($dump[$key1]); }
				}

				$fp=fopen($file, 'w');
				fwrite ($fp, "<?die;?>\r\n".implode("\r\n",$dump));
				fclose ($fp);
			}
		}
	}

?>