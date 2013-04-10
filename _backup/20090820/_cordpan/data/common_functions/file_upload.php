<?php

	function file_upload($dest_dir=null,$ffld=null){
		global $_dir,$_comvars;
		if(isset($_FILES) && count($_FILES)>0 && $dest_dir!=null){
			//--- подготовка описания подгруженных файлов
			if($ffild!=null && isset($_FILES[$ffld])){
				$f1[]=$_FILES[$ffld];
			}else{ while(list($key,$val)=each($_FILES)){ $f1[]=$val; } }

			//--- перебор подготовленных описаний
			while(list($key,$val)=each($f1)){
				if($val['error']==0 && is_uploaded_file($val['tmp_name']) && $val['size']>0){
					$dest_fln=$_dir['site'].$dest_dir.'/'.$val['name'];
					if(move_uploaded_file($val['tmp_name'],$dest_fln)){
						if(!chmod($dest_fln, 0777)){ $err=$_comvars['err'][15]; }
					}else{ $err=$_comvars['err'][16]; }
				}else{ $err=$_comvars['err'][14]; }
			}
		}else{ $err=$_comvars['err'][13]; }
		return isset($err)?$err:true;
	}

?>