<?php

	function file_del($fln=null){
		global $_dir;		if($fln!=null){			if(file_exists($_dir['site'].$fln)){				if(is_file($_dir['site'].$fln)){
					$ans=unlink($_dir['site'].$fln);
				}elseif(is_dir($_dir['site'].$fln)){
					$ans=rmdir($_dir['site'].$fln);
				}			}
		}
		return $ans;
	}

?>