<?php
	
	function keygen($count=1,$src=null,$len=10,$unique=true){
		
		//--- значения используемые для генерации
		if($src==null){
			$k2['src']=array('letters_eng_small','letters_eng_big','numbers');
		}else{ $k2['src']=$src; }
		$k2['len']=$len;
		$k2['count']=$count;
		$k2['unique']=$unique;

		//--- источник генерации
		$k['letters_eng_small']='abcdefghijklmnopqrstuvwxyz';
		$k['letters_eng_big']='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$k['letters_rus_small']='абвгдеёжзийклмнопрстуфхцчшщьыъэюя';
		$k['letters_rus_big']='АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЬЫЪЭЮЯ';
		$k['numbers']='0123456789';
		$k['ch_space']=' ';
		$k['ch_undeline']='_';
		$k['ch_minus']='-';
		$k['ch_special']='!@#$%^&*~+*=;:№?';
		$k['ch_brackets']='(){}[]<>«»';

		//--- собираем и размешиваем массив для генерации
		for($i=0,$t1='';$i<count($k2['src']);$i++){ $t1.=$k[$k2['src'][$i]]; }
		$v['src']=str_split($t1);

		//--- генерация
		$k3=array('time_start'=>0,'time_stop'=>0,'src'=>implode('',$v['src']));
		$k3['time_start']=date('YmdHis');
		for($i=0;$i<$k2['count'];$i++){
			shuffle($v['src']);
			$src=$v['src'];
			$k3['dest'][$i]='';
			for($j=0;$j<$k2['len'] && count($src)>0;$j++){
				$st=rand(0,count($src)-1);
				$k3['dest'][$i].=$src[$st];
				if($k2['unique']){
					unset($src[$st]);
					$src=str_split(implode('',$src));
				}
			}
		}
		$k3['time_stop']=date('YmdHis');

		return $k3;
	}
?>