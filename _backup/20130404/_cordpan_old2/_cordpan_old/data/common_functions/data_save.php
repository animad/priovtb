<?php

	function data_save($data2save=null,$dest_dir=null,$val,$ext='unt'){
		if($dest_dir!=null){
			if($data2save!=null){
				//--- ���� ������
				$test_val=md5(uniqid(rand(),true));
				$fln=$dest_dir.'write_test.txt';
				$fp=fopen($fln, 'w+');
				fwrite ($fp, $test_val);
				fclose ($fp);
				$fp=fopen ($fln, 'r');
				$test_val2=fread($fp,filesize($fln));
				fclose ($fp);
				if($test_val2==$test_val){
					$data='<?die;?>'."\r\n".implode("\r\n",$data2save);
					
					//--- ���������� ... ����� � ������ ����? ��� ������� �����...
					if(isset($val['id']) && $val['id']!=null && file_exists($dest_dir.$val['id'].'.unt') && filesize($dest_dir.$val['id'].'.unt')){
						$fln=$dest_dir.$val['id'].'.unt';
						$cur_id=$val['id'];
					}else{
						//--- �������� ID � ������� ��������� �����
						$fln=$dest_dir.'count.txt';
						$fp=fopen ($fln, 'r');
						$id=fread($fp,filesize($fln));
						fclose ($fp);
						$fp=fopen($fln, 'w+');
						fwrite ($fp, ($id+1));
						fclose ($fp);

						$fln=$dest_dir.$id.'.'.$ext;
						
						$cur_id=$id;
					}
					
					//--- ��������� ������
					$fp=fopen($fln, 'w+');
					$ans=fwrite ($fp, $data);
					fclose ($fp);
					chmod($fln, 0777);

					$ans=true;
					$erm='';
				}else{
					$ans=false;
					$erm='������ ����������';
				}
			}else{
				$ans=false;
				$erm='������ ��� ������ �����������';
			}
		}else{
			$ans=false;
			$erm='���� ��� ������ �� ������';
		}
		return array($ans,$erm,$cur_id);
	}

?>