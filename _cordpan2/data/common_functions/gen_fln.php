<?php
	
/*
	
*/	

	function gen_fln($place,$step=1){
		$fln['last']=$place.'usn.last'; //---��������� �����
		$fln['test']=$place.'usn.test'; //---���� ������ ������ ������
		
		if(is_dir($place)){
			if(file_exists($fln['last']) && filesize($fln['last'])){
				$tmp=file($fln['last']);
				if($tmp!==false){
					$cur=trim($tmp[0])+$step;
					
					//---��������� �������� ��������
					$fp=fopen($fln['test'],'w+');
					if($fp){
						fwrite($fp,$cur);
						fclose($fp);
					}else{ $erm='���������� ������� ��� ������'; }
					
					//---�������� ��������� �������� � ��������� �������
					$tmp=file($fln['test']);
					if($tmp!==false){
						if($cur==trim($tmp[0])){
							
							//---��������� ������� ��������
							$fp=fopen($fln['last'],'w+');
							if($fp){
								fwrite($fp,$cur);
								fclose($fp);
							}else{ $erm='���������� ������� ��� ������'; }
							
						}else{ $erm='������! ���������� �������� �� ������������'; }
					}else{ $erm='������! �� ������� ��������� ���� ��������� ��������'; }
				}else{ $erm='������! �� ������� ��������� ���� ���������� ��������'; }
			}else{ $erm='������! ���� �������� �������� �� ���������'; }
		}else{ $erm='������! ���� �� ������'; }
		
		return array((isset($cur)?$cur:false),(isset($erm)?$erm:null));
		
	}
	
?>
