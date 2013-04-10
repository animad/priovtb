<?php
	
/*
	
*/	

	function gen_fln($place,$step=1){
		$fln['last']=$place.'usn.last'; //---последний номер
		$fln['test']=$place.'usn.test'; //---тест записи нового номера
		
		if(is_dir($place)){
			if(file_exists($fln['last']) && filesize($fln['last'])){
				$tmp=file($fln['last']);
				if($tmp!==false){
					$cur=trim($tmp[0])+$step;
					
					//---сохраняем тестовое значение
					$fp=fopen($fln['test'],'w+');
					if($fp){
						fwrite($fp,$cur);
						fclose($fp);
					}else{ $erm='Невозможно открыть для записи'; }
					
					//---проверка тестового значения с ВРЕМЕННЫМ рабочим
					$tmp=file($fln['test']);
					if($tmp!==false){
						if($cur==trim($tmp[0])){
							
							//---сохраняем рабочее значение
							$fp=fopen($fln['last'],'w+');
							if($fp){
								fwrite($fp,$cur);
								fclose($fp);
							}else{ $erm='Невозможно открыть для записи'; }
							
						}else{ $erm='ОШИБКА! Сохранение счетчика не подтверждено'; }
					}else{ $erm='ОШИБКА! Не удается прочитать файл тестового СЧЕТЧИКА'; }
				}else{ $erm='ОШИБКА! Не удается прочитать файл последнего СЧЕТЧИКА'; }
			}else{ $erm='ОШИБКА! Файл рабочего счетчика не обнаружен'; }
		}else{ $erm='ОШИБКА! Путь не найден'; }
		
		return array((isset($cur)?$cur:false),(isset($erm)?$erm:null));
		
	}
	
?>
