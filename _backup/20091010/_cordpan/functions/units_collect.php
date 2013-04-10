<?php

/*
собирает файлы-ОПИСАНИЯ из указанного каталога

$place - каталог ГДЕ искать
$unt_ext - расширение файлов в которых искать
$param - array - при совпадении парамера и значения (пример указания - 'uid:45', 'uid:' - ищет ЕСТЬ-ЛИ ПАРАМЕТР, ':45' - ищет значение) добавляем искомый ФАЙЛ в список НАЙДЕННЫХ

*/
	
	function units_collect($place=null,$unt_ext='unt',$param=null){		if($place!=null){			$d=dir($place);
			while(false!==($entry=$d->read())){				if(!is_dir($place.$entry) && $entry!='.' && $entry!='..'){					if(substr(strrchr($entry,'.'),1)==$unt_ext){						if(is_array($param) && count($param)>0){							foreach($param as $val1){								$ok=false;								$param_key=trim(substr($val1,0,strpos($val1,':')));
								$param_val=trim(substr(strstr($val1,':'),1));
							
								$tmp=units_parse(array($place.$entry));
								$tmp1=current($tmp);
								if($param_key!='' && $param_val!=''){									if(isset($tmp1[$param_key]) && $tmp1[$param_key]==$param_val){ $ok=true; }
								}elseif($param_key!='' && $param_val==''){									if(isset($tmp1[$param_key])){ $ok=true; }
								}elseif($param_key=='' && $param_val!=''){									if(array_search($param_val,$tmp1)){ $ok=true; }
								}							}
						}elseif(!is_array($param) && $param=null){							$ok=true;
						}else{ $ok=false; }
					
						if(is_array($param) && count($param)>0 && $ok || !is_array($param)){							$data[substr($entry,0,strpos($entry,'.'))]=$place.$entry;
						}
					}				}
			}
			$d->close();
		}
		return(isset($data)?$data:null);
	}

?>