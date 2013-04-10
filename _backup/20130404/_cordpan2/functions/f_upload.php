<?php

	function file_upload($dest_dir=null){
		global $_dir;
		
		if(isset($_FILES) && count($_FILES)>0 && $dest_dir!=null){
			while(list($key,$val)=each($_FILES)){

				if($val['error']==0 && is_uploaded_file($val['tmp_name'])){
					$dest_fln=$_dir['site'].$dest_dir.'/'.$val['name'];
					$ans=move_uploaded_file($val['tmp_name'],$dest_fln);
					if ($ans){
						if(chmod($dest_fln, 0777)){
							$_SESSION['file_upload'][$val['name']]['status']='ok';
							$_SESSION['file_upload'][$val['name']]['old']=date('YmdHis');
						}
					}else{ $err=$ans; }
				}else{ $err=$_comvars['err'][14]; }
			}
		}else{ $err=$_comvars['err'][13]; }
		return isset($err)?$err:true;
	}

?>
