<?php

	function fav_dir($do=null,$dir=null,$title=null){

	
			switch ($do) {
				case 'add':
					var_add($file,array($dir=>$title),'fav_dir');
				break;
				case 'edit':
					var_edit($file,array($dir=>$title),'fav_dir');
				break;
				case 'del':
					var_del($file,array($dir=>''),'fav_dir');
				break;
			}
	}

?>