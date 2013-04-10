<?php

	function coord_list($towns=null){
		global $globals, $gStore;
		reset($towns);
		while(list($key,$tval)=each($towns)){
			reset($globals['towns']);
			print '<h1>'.$globals['regions'][$tval]['title'].'</h1>';
			while(list($pkey,$pval)=each($globals['towns'])){
				if($pval['town']==$tval && $pval['show']==1){
					
if (isset($pval['gps_latitude']) && isset($pval['gps_longitude']) && ''!=trim($pval['gps_latitude']) && ''!=trim($pval['gps_longitude'])){
	$res=gps::coord_convert(array($pval['gps_latitude'],$pval['gps_longitude'],'t'=>0));
	$c='<div style="color: gray;">Координаты GPS: '.$res['out'][$gStore['gps']['out_format']]['latitude'].'; '.$res['out'][$gStore['gps']['out_format']]['longitude'].'</div>';
}else{ $c=''; }
					
					print '<p>'.
					          '<h3>'.$pval['place'].'</h3>'.
					          '<div align="center">'.
							      (trim($pval['post'])!=''?$pval['post'].', ':'').
							      (trim($globals['regions'][$tval]['region'])!=''?$globals['regions'][$tval]['region'].', ':'').
							      (trim($globals['regions'][$tval]['title'])!=''?$globals['regions'][$tval]['title'].', ':'').
								  $pval['adr'].
								  $c.
							  '</div>'.
					          ($pval['jur_l']?'<p align="center"><table border="0" cellspacing="0" cellpadding="3" class="border_01"><tr><td><img src="pool/images/map/'.$pval['map'].'" border="0"></td></tr></table></p>':'<br />').
					          '<table border="0" cellspacing="0" cellpadding="3" align="center"><tr>';

					if($pval['jur_l']==1){
						print '<td valign="top" width="50%">'.
						      '<div align="center"><b>Юридические лица</b></div>'.
						      '<ul>'.
						          '<li><i>Телефон</i></li>'.
						              '<ul><li>'.
									      (trim($globals['regions'][$tval]['phone_code'])!=''?'('.$globals['regions'][$tval]['phone_code'].') ':'').
										  $pval['jur_phone'].
									  '</li></ul>'.
						          '<li><i>Время работы</i></li>'.
						              '<ul><li>'.$pval['jur_serve_time'].'</li><li>'.$pval['jur_break'].'</li></ul>';
						if(trim($pval['jur_usl'])!=''){
							print '<li><i>Услуги</i></li>'.
							          '<ul>';
							$tmp=explode(' ',$pval['jur_usl']);
							for($i=0;$i<count($tmp);$i++){
								print     '<li><a href="'.$_SERVER[PHP_SELF].'?dr='.$globals['usl'][$tmp[$i]]['url'].'">'.$globals['usl'][$tmp[$i]]['title'].'</a></li>';
							}
							print     '</ul>';
						}
						if(trim($pval['jur_dop_info'])!=''){
							print '<li>'.trim($pval['jur_dop_info']).'</li>';
						}
						print     '</ul>'.
						       '</td>';
					}else{
						print '<td valign="top" width="50%" align="center"><br /><table border="0" cellspacing="0" cellpadding="3" class="border_01"><tr><td>'.
						          '<br /><img src="pool/images/map/'.$pval['map'].'" border="0">'.
						      '</td></tr></table></td>';
					}
					
					if($pval['fiz_l']==1){
						print '<td valign="top">'.
						      '<div align="center"><b>Физические лица</b></div>'.
						      '<ul>'.
						          '<li><i>Телефон</i></li>'.
						              '<ul><li>'.
									      (trim($globals['regions'][$tval]['phone_code'])!=''?'('.$globals['regions'][$tval]['phone_code'].') ':'').
										  $pval['fiz_phone'].
									  '</li></ul>'.
						          '<li><i>Время работы</i></li>'.
						              '<ul><li>'.$pval['fiz_serve_time'].'</li><li>'.$pval['fiz_break'].'</li></ul>';
						if(trim($pval['fiz_usl'])!=''){
							$tmp=explode(' ',$pval['fiz_usl']);
							print '<li><i>Услуги</i></li>'.
							          '<ul>';
							for($i=0;$i<count($tmp);$i++){
								print     '<li><a href="'.$_SERVER[PHP_SELF].'?dr='.$globals['usl'][$tmp[$i]]['url'].'">'.$globals['usl'][$tmp[$i]]['title'].'</a></li>';
							}
							print     '</ul>';
						}
					}

					if(trim($pval['fiz_dop_info'])!=''){
						print '<li>'.trim($pval['fiz_dop_info']).'</li>';
					}
					print '</ul></td></tr></table>'.
					      '</p>';
				}
			}
		}
	}
	
	function coord_list2($t2=null){
		global $globals;
		
		if(is_array($t2)){
			reset($t2);
			while(list($key,$val)=each($t2)){
				$data2[]='<tr'.colrow($j1++).'>'.
				           '<td>'.
						       output((isset($globals['towns'][$val]['place2'])?
						        $globals['towns'][$val]['place2']:
								$globals['towns'][$val]['place'])).
						   '</td>'.
				           '<td>'.
							   output($globals['regions'][$globals['towns'][$val]['town']]['title'].', '.$globals['towns'][$val]['adr']).
						   '</td>'.
				           '<td>'.
							   output((isset($globals['towns'][$val]['fiz_phone'])?'('.$globals['regions'][$globals['towns'][$val]['town']]['phone_code'].') '.$globals['towns'][$val]['fiz_phone']:'')).
						   '</td>'.
				         '</tr>';
			}
			if(isset($data2)){
				print '<table border="0" cellspacing="1" cellpadding="5" class="table5" width="100%">'.
			              '<tr class="header"><td>Наименование</td><td>Адрес</td><td>Телефон</td></tr>'.
						  implode('',$data2).
					  '</table>';
				unset($data2);
			}
		}
	}

//--- адреса банкоматов
	function coord_list3($t2=null){
		global $globals;
		$type=array('bankomats','terminals');
		$j2=$type[0];
		
		if(is_array($t2)){
			reset($t2);
			while(list($key,$val)=each($t2)){
				$data2[]='<tr'.colrow($j1++).'>'.
				           '<td>'.
						       output((isset($globals[$j2][$val]['place2'])?
						        $globals[$j2][$val]['place2']:
								$globals[$j2][$val]['place'])).
						   '</td>'.
				           '<td>'.
							   output($globals['regions'][$globals[$j2][$val]['town']]['title'].', '.$globals[$j2][$val]['adr']).
						   '</td>'.
						   '<td>'.
						       output($globals[$j2][$val]['serve_time']).
						   '</td>'.
				         '</tr>';
			}
			if(isset($data2)){
				print '<table border="0" cellspacing="1" cellpadding="5" class="table5" width="100%">'.
			              '<tr class="header"><td>Расположение</td><td>Адрес</td><td>Режим работы</td></tr>'.
						  implode('',$data2).
					  '</table>';
				unset($data2);
			}
		}
	}
	
//--- список офисов банкома
	function office_selector($_arg=null){
		if ('info'==$_arg){
		
		
		}else{
			$f=(isset($_arg['f']) && ''!=trim($_arg['f'])?$_arg['f'].' # ':'').__METHOD__;
			
			global $globals;
			$towns=&$globals['towns'];
			reset($towns);
			
			while(list($key,$val)=each($towns)){
				if (1==$val['show']){
					$data[]='<option value="'.$key.'">'.output($val['place']).(isset($val['adr']) && ''!=trim($val['adr'])?' ('.output($globals['regions'][$val['town']]['title']).', '.output($val['adr'].')'):'').'</option>';
				}
			}
			
			if (isset($data)){
				$data='<select id="office_list" name="office">'.
					      '<option value="">---</option>'.
						  implode('',$data).
					  '</select>';
				return $data;
			}else{ return '<!-- Список офисов не выбран -->'; }
		}
	}

	
?>