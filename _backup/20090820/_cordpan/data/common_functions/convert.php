<?php

	class convert extends tools{
		var $res;
		
		function convert(){
			parent::tools();
			$this->res=null;
		}
			
		function bytes($num=null,$in='b',$out='kb'){
			if($num!=null){
				$v1=1024;
				$v=array('mb'=>2,'kb'=>1,'b'=>0);
				$v2=array('mb'=>' Ìב','kb'=>' Êב','b'=>' Á');
				$v3=array('b','kb','mb');
				
				for($i=0;$i<$v[$in];$i++){ $num=$num*$v1; }
				for($i=0;$i<$v[$out];$i++){
					$num=$num/$v1;
					if(floor($num*10)<1){
						$num*=$v1;
						$out=$v3[$i];
						break;
					}
				}
				
				$this->res=floor($num*10)/10;
				return $this->res.$v2[$out];
			}
		}
		
	}

?>