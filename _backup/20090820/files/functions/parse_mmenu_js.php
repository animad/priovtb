<?php
//  $Id$

/**
 * работает с JavaScript меню
 */

	function parse_mmenu_js($plist=null){
		if($plist!=null){
			//--- подгружаем JS данные
			$fln='pool/vars/mmenu.js';
			$fln_data=file($fln);
			
			//--- выбираем интересующие нас строки
			for($i=0; $i<count($fln_data); $i++){
				reset($plist);
				while(list($key,$val)=each($plist)){
					if(strpos($fln_data[$i],$key)){
						$data1[$key]=trim(str_replace('\"','&quot;',$fln_data[$i]));
						$data1[$key]=trim(str_replace('-','&#x2015;',$data1[$key]));
					}
				}
			}
		}
		
		if(isset($data1)){
			//--- разбираем загруженные JS строки данных дл€ работы в PHP
			reset($data1);
			while(list($key,$val)=each($data1)){
				$pat='/([a-zA-Z0-9\_\-]+):\"([a-zA-Z0-9а-€ј-я…®йЄ \_\-\,\:\Ђ\ї\&\;\#]+)\"/'; //\\\"
				preg_match_all($pat, trim($val), $matches); //, PREG_OFFSET_CAPTURE
				for($i=0; $i<count($matches[0]); $i++){
					$data[$key][$matches[1][$i]]=$matches[2][$i];
				}
			}
		}

		//--- делаем „≈Ћќ¬≈ ќѕќЌя“Ќџ… список
		if(isset($data)){
			reset($plist);
			$j1=0;
			while(list($key,$val)=each($plist)){
				if(isset($data[$key]['title_p']) && trim($data[$key]['title_p'])!=''){ $data[$key]['title']=trim($data[$key]['title_p'].' '.$data[$key]['title']); }
				if(trim($data[$key]['title'])!='' && isset($data[$key]['raiting']) && trim($data[$key]['raiting'])=="1"){ //--- страницы без названи€ ”Ѕ»–ј≈ћ
//					$pwr_list[]='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$key.'" class="cell" title="рейтинг: '.$val.'">'.str_replace(' ','&nbsp;',trim($data[$key]['title'])).'</a>';
$pwr_list[]='ob'.($j1++).':{ text:"'.str_replace(' ','&nbsp;',trim($data[$key]['title'])).'", href:"'.$_SERVER['PHP_SELF'].'?dr='.$key.'", rate:"'.$val.'" }';
				}
			}
		}
//		return isset($pwr_list)?implode(' ',$pwr_list):null;
		return (isset($pwr_list)?'<script>l1=new Object();l1={'.implode(',',$pwr_list).'}</script>':null);
	}

?>