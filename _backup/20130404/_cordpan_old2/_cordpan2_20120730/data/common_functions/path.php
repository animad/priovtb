<?php

/*
 *создает путь с общими правами
 */

	function path_create($path=null,$acc=0777){
		global $_dir;
		$ok=false;

		if($path!=null && trim($path)!=''){
			if(!file_exists($_dir['site'].$path)){
				$t=explode('/',$path);
				$t2='';
				for($i=0;$i<count($t);$i++){
					if(trim($t[$i])!=''){
						$t2.='/'.trim($t[$i]);
						if(!file_exists($_dir['site'].$t2)){
							mkdir($_dir['site'].$t2);
							chmod($_dir['site'].$t2, $acc);
							$ok=true;
						}
					}
				}
			}
		}
		
		return $ok;
	}

/*
 *создает пустой текстовый файл с общими правами
 */
	
	function file_create($file=null,$acc=0777){
		global $_dir;
		$ok=false;
		
		if($file!=null && trim($file)!=''){
			if(!file_exists($_dir['site'].$file)){
				$fln=$_dir['site'].$file;
				$fp=fopen($fln,'w+');
				if($fp){
					fwrite($fp,'');
					fclose($fp);
					chmod($fln, $acc);
					$ok=true;
				}else{
					$ok=false;
					$erm='Невозможно открыть для записи';
				}
				
			}else{ $ok=true; }
		}
		
		return $ok;
	}

?>
