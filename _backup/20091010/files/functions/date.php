<?php

	function date2str($text=null,$m=1){		if($text!=null){			$tmp1=explode(' ',$text);
			$tmp1_dt=explode('-',$tmp1[0]);
			$tmp1_tm=explode(':',$tmp1[1]);
			
			switch($m) {
				case 1: //--- d.m.Y
					$tmp2=$tmp1_dt[2].'.'.$tmp1_dt[1].'.'.$tmp1_dt[0];
				break;
				case 2: //--- d.m.Y H:i
					$tmp2=$tmp1_dt[2].'.'.$tmp1_dt[1].'.'.$tmp1_dt[0].' '.$tmp1_tm[0].':'.$tmp1_tm[1];
				break;
			}			$text=$tmp2;
		}
		return $text;
	}

?>
