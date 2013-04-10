<?php

/*
	yyyy-mm-dd hh:ii:ss
*/

	function date2str($text=null,$m=1){		if($text!=null){			$tmp1=explode(' ',$text);
			$tmp1_dt=explode('-',$tmp1[0]);
			if(isset($tmp1[1])){ $tmp1_tm=explode(':',$tmp1[1]); }
			
			switch($m) {
				case 1: //--- dd.mm.yyyy
					$tmp2=$tmp1_dt[2].'.'.$tmp1_dt[1].'.'.$tmp1_dt[0];
				break;
				case 2: //--- dd.mm.yyyy hh:ii
					$tmp2=$tmp1_dt[2].'.'.$tmp1_dt[1].'.'.$tmp1_dt[0].' '.$tmp1_tm[0].':'.$tmp1_tm[1];
				break;
				case 3: //--- YYYYmmddHHiiss -> dd.mm.YYYY HH:ii:ss
					$format='%Y%m%d%H%M%S';
					$tmp1=strptime($text,$format);
					$tmp2=sprintf('%02d',$tmp1['tm_mday']).'.'.sprintf('%02d',($tmp1['tm_mon']+1)).'.'.($tmp1['tm_year']+1900).' '.sprintf('%02d',$tmp1['tm_hour']).':'.sprintf('%02d',$tmp1['tm_min']).':'.sprintf('%02d',$tmp1['tm_sec']);
				break;
			}			$text=$tmp2;
		}
		return $text;
	}

?>
