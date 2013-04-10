<?php

	function check($m=null,$text){
		if($m!=null && trim($text)!=''){
			switch($m){
				case 'email':
					$pat='/^[a-zA-Z0-9_.]+@[a-zA-Z0-9_.]+[a-zA-Z]{2,6}$/';
				break;
			}
			return (preg_match($pat, trim($text))==1?true:false);
		}else{ return null; }
	}

?>