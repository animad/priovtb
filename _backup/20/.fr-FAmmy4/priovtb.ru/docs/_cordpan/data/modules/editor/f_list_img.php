<?php

/*
var tinyMCEImageList = new Array(
	// Name, URL
	["Logo 1", "logo.jpg"],
	["Logo 2 Over", "logo_over.jpg"]
);
*/

	function list_img($path=null,$i=0){
		global $_dir;
		
		if($path!=null){
			$path1=$_dir['site'].'/'.$path;
			if(file_exists($path1)){
				$d = dir($path1);
				while (false !== ($entry = $d->read())) {
					if(trim($entry)!='.' && trim($entry)!='..'){
						if(is_dir($path1.'/'.$entry)){
							$data[]=list_img($path.'/'.$entry,$i+1);
						}else{
							$img=getimagesize($path1.'/'.$entry);
							if($img['mime']=='image/png' || $img['mime']=='image/jpeg' || $img['mime']=='image/gif'){
								$data[]='["'.$entry.'","'.$path.'/'.$entry.'"]';
							}
						}
					}
				}
				$d->close();
			}

			if(isset($data)){
				if($i==0){
					$t='var tinyMCEImageList = new Array('.implode(",\r\n",$data).');';
					return $t;
				}else{
					return implode(",\r\n",$data);
				}
			}else{ return 'var tinyMCEImageList = new Array();'; }
		}
	}

?>
