<?php

/*
	$type - 'folder' -
	      - 'file'   -
*/

	function fcc($path=null,$type=null,$data=''){
		$tl=array('folder','files');
		$rights=0777;
		$erm='';
		$ans=false;

		if($path!=null && $type!=null){

			//--- �������� �����/��������
			if(!file_exists($path)){
				if($type==$tl[0]){
					if(is_writeable($path)){
						$ans=mkdir($path);
					}else{ $erm='���������� ������� �������'; }
				}else{
					$fln=$path;
					$fp=fopen($fln,'w+');
					if($fp){
						$ans=fwrite($fln,$data);
						fclose($fp);
					}else{ $erm='���������� ������� ��� ������'; }
				}
			}

			//--- ���������� �������
			$ans=@chmod($path,$rights);


		}else{
			$erm='����������� ������ �����������.';
		}
		
		return array($ans,$erm);
	}
?>
