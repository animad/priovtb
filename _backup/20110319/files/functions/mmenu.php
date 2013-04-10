<?php
	function mmenu_create(){
		$t=array('left','right');
		for($i=0; $i<count($t); $i++){
		
			$q='select * from `mmenu` where `on`="1" and `parent`="'.$t[$i].'" order by `id` asc';
			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				while($row=mysql_fetch_assoc($res)){
					$data1[]='title:"'.htmlspecialchars($row['title']).'"';
					$data1[]='alt:"'.htmlspecialchars($row['alt']).'"';
					$data1[]='href:"'.$row['href'].'"';
					$data1[]='def:'.($row['default']==1?'true':'false').'';

					if(isset($data1)){
						$data2[]=$row['label'].":{\r\n".implode(",\r\n",$data1)."\r\n}\r\n";
						unset($data1);
					}
				}
			}
			
			if(isset($data2)){
				$data[]=$t[$i].":{\r\n".implode(",\r\n",$data2)."\r\n}\r\n";
				unset($data2);
			}
		}
		
		if(isset($data)){
			$data='var mmenu=new Object();mmenu={'."\r\n".implode(",\r\n",$data)."\r\n}";
			
			$fln='files/vars/mmenu.js';
			if(is_writable($fln)) {
				if(!$fp=fopen($fln,'w')){
					echo 'Не могу открыть файл ('.$fln.')';
					exit;
				}
				if (fwrite($fp,$data)===false){
					echo 'Не могу произвести запись в файл ('.$fln.')';
					exit;
				}
				fclose($fp);
				
//				chmod($fln,0777);
			}else{ echo 'Файл '.$fln.' недоступен для записи'; }
		}
	}
?>
