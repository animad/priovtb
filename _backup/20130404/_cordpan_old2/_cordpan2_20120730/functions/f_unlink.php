<?php

	function file_del($fln=null){
		global $_dir;
					$ans=unlink($_dir['site'].$fln);
				}elseif(is_dir($_dir['site'].$fln)){
					$ans=rmdir($_dir['site'].$fln);
				}
		}
		return $ans;
	}

?>