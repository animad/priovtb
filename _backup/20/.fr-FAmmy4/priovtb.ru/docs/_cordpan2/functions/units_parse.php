<?php

/*
ðàçðåçàåò äàííûå èç ôàéëà ÎÏÈÑÀÍÈß è ñêëàäûâàåò â ìàññèâ
*/

	function units_parse($fln=null,$key2=null){		if($fln!=null && is_array($fln)){			while(list($key1,$val1)=each($fln)){				if($key2==null || $key2!=null && $key1==$key2){					if(file_exists($val1) && filesize($val1)){						$data=file($val1);
						unset($data[0]);
						$data1[$key1]['file']=$val1;
						foreach($data as $val){							if(trim($val)!=''){								$key3=trim(substr($val,0,strpos($val,':')));								$val1=trim(substr(strstr($val,':'),1));
								$data1[$key1][$key3]=$val1;
							}
						}
					}
				}
			}
		}
		return isset($data1)?$data1:null;
	}

/*
ïàêåòíûé ðåçàëüùèê íà ïåðåìåííûå
*/

	function vars_parse_batch($prefix=null, $fln=null){
		if(is_array($fln)){
			for($i=0; $i<count($fln); $i++){
				$t1=vars_parse(($prefix!=null?$prefix:'').$fln[$i]);
				if($t1!=null){
					reset($t1);
					while(list($key,$val)=each($t1)){ $t[$key]=$val; }
				}
				unset($t1);
			}
			return isset($t)?$t:null;
		}else{
			return vars_parse(($prefix!=null?$prefix:'').$fln);
		}
	}
	
/*
ðàçðåçàåò óêàçàííûé ôàéë è ñêëàäûâàåò åãî â ìàññèâ
*/
	function vars_parse($fln=null,$tag=null){
		if($fln!=null){			if($tag!=null){				$data1=file_get_contents($fln);
				
				$pattern="/\[".$tag."\][\t\r\n]*".
				         "([\w ".
	         			 "a-zA-Z0-9".
			             "àáâãäå¸æçèéêëìíîïðñòóôõö÷øùüûúýþÿ".
			             "ÀÁÂÃÄÅ¨ÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÜÛÚÝÞß".
			             "\<\>\«\»\=\"\'`\:\.\,\-\–".
			             "\r\n\t".
			             "\/\\%\@\?\[\]\(\);\#\&\!_\$&infin;¹".
				         " ".
			             "]+)*".
			             "[\t\r\n]*\[\/".$tag."\]/";
				$cnt=preg_match_all($pattern,$data1,$match);
				if(count($match[1])>0){					$j1=0;
					while(list($key,$val)=each($match[1])){
						$tmp1=explode("\n",$val);
						for($i=0;$i<count($tmp1);$i++){							$data[$j1++]=$tmp1[$i];
						}
					}
				}
				unset($data1);
			}else{
				$data=file($fln);
				unset($data[0]);
			}
			
			if($data!=null && count($data)>0){
				foreach($data as $val){
				
				
					if(trim($val)!=''){						$val=trim($val);
						$key3=trim(substr($val,0,strpos($val,':')));
						$val1=trim(substr(strstr($val,':'),1));
						if(strrpos($key3,'[') && strrpos($key3,']')){
							$k=1;
														$k3[$k++]=substr(trim($key3),0,strrpos(trim($key3),'['));
							$k3[$k++]=substr(trim($key3),strrpos(trim($key3),'[')+1,(strrpos(trim($key3),']')-1)-strrpos(trim($key3),'['));

							$v='$data1["'.implode('"]["',$k3).'"]="'.$val1.'";';
							eval($v);
						}else{							$data1[$key3]=$val1;
						}
					}
				}
			}
		}
		
		return isset($data1)?$data1:null;
	}


?>
