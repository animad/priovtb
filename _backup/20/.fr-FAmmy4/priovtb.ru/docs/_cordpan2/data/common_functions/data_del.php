<?php

//del_unit($dir_data,$id);

	function del_unit($dir_data=null,$id=null,$ext='.unt'){		if($dir_data!=null && $id!=null){			$fln1=$dir_data.'/'.$id.$ext;
			$fln2=$dir_data.'/'.$id.'.del';
			if(file_exists($fln1)){				rename($fln1,$fln2);			}		}
	}

?>