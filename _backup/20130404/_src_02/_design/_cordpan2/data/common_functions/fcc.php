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

			//--- создание файла/каталога
			if(!file_exists($path)){
				if($type==$tl[0]){
					if(is_writeable($path)){
						$ans=mkdir($path);
					}else{ $erm='Невозможно создать каталог'; }
				}else{
					$fln=$path;
					$fp=fopen($fln,'w+');
					if($fp){
						$ans=fwrite($fln,$data);
						fclose($fp);
					}else{ $erm='Невозможно открыть для записи'; }
				}
			}

			//--- дополнение ПРАВАМИ
			$ans=@chmod($path,$rights);


		}else{
			$erm='Необходимые данные отсутствуют.';
		}
		
		return array($ans,$erm);
	}
?>
