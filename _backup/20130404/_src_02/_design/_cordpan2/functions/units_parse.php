<?php

/*
��������� ������ �� ����� �������� � ���������� � ������
*/

	function units_parse($fln=null,$key2=null){
						unset($data[0]);
						$data1[$key1]['file']=$val1;
						foreach($data as $val){
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
�������� ��������� �� ����������
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
��������� ��������� ���� � ���������� ��� � ������
*/
	function vars_parse($fln=null,$tag=null){
		if($fln!=null){
				
				$pattern="/\[".$tag."\][\t\r\n]*".
				         "([\w ".
	         			 "a-zA-Z0-9".
			             "��������������������������������".
			             "�����Ũ��������������������������".
			             "\<\>\�\�\=\"\'`\:\.\,\-\�".
			             "\r\n\t".
			             "\/\\%\@\?\[\]\(\);\#\&\!_\$&infin;�".
				         " ".
			             "]+)*".
			             "[\t\r\n]*\[\/".$tag."\]/";
				$cnt=preg_match_all($pattern,$data1,$match);
				if(count($match[1])>0){
					while(list($key,$val)=each($match[1])){
						$tmp1=explode("\n",$val);
						for($i=0;$i<count($tmp1);$i++){
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
				
				
					if(trim($val)!=''){
						$key3=trim(substr($val,0,strpos($val,':')));
						$val1=trim(substr(strstr($val,':'),1));
						if(strrpos($key3,'[') && strrpos($key3,']')){
							$k=1;
							
							$k3[$k++]=substr(trim($key3),strrpos(trim($key3),'[')+1,(strrpos(trim($key3),']')-1)-strrpos(trim($key3),'['));

							$v='$data1["'.implode('"]["',$k3).'"]="'.$val1.'";';
							eval($v);
						}else{
						}
					}
				}
			}
		}
		
		return isset($data1)?$data1:null;
	}


?>