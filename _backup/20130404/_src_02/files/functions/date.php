<?php

	function date2str($text=null,$m=1){		if($text!=null){			$tmp1=explode(' ',$text);
			$tmp1_dt=explode('-',$tmp1[0]);
			
			switch($m) {
				case 1: //--- dd.mm.yyyy
					$tmp2=$tmp1_dt[2].'.'.$tmp1_dt[1].'.'.$tmp1_dt[0];
				break;
			}			$text=$tmp2;
		}
		return $text;
	}

?>