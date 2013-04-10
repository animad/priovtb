<?php

	function get_flist($path=null,$ext=null,$wcnt=5,$disabled=false,$http_prefix='./',$notinuse=false,$uid=null){
		global $_glovars,$_dir,$_modvars,$mod;			$erm=null;
		
		$postfix['thmb']='_thmb';
		$postfix['cordpan']='_cordpan';
		
		$preview['h']=100;
		$preview['w']=100;
		
		ob_start();
		if($path!=null && $ext!=null){			if(file_exists($path)){				$d=dir($path);
				$j1=0;
				$j2=0;
				
				//--- выбираем UNIT
				if($uid!=null){
					$cats_plist=units_parse(array($_dir['site'].$mod->box[$_GET['dr']]['config']['dir_dest'].'/'.$uid.'.unt'));
					//--- выбираем фотки
					while(list($key,$val)=each($cats_plist)){						$tmp1=explode(' ',$val['photo']);
						for($i=0; $i<count($tmp1); $i++){
							$self_pic[trim($tmp1[$i])]=$key;
						}
					}
				}else{ $self_pic[]=null; }

				//--- ищем занятые фотки
				$cats_list=units_collect($_dir['site'].$mod->box[$_GET['dr']]['config']['dir_dest'].'/','unt');
				$cats_plist=units_parse($cats_list);
				while(list($key,$val)=each($cats_plist)){					if(isset($val['photo']) && trim($val['photo'])!=''){						$tmp1=explode(' ',$val['photo']);
						for($i=0;$i<count($tmp1);$i++){							if(!isset($self_pic[trim($tmp1[$i])])){								$photos_ex[trim($tmp1[$i])]=$key;
							}
						}					}
				}
				while(false !== ($entry = $d->read())) {					$cats_list[]=$entry;
				}
				$pic=new picture;
				while(list($key,$entry)=each($cats_list)){
					if(!is_dir($path.'/'.$entry) && $entry!='.' && $entry!='..'){					
						$cur_fln=substr(trim($entry),0,strrpos(trim($entry),'.'));
						$cur_ext=substr(trim($entry),strrpos(trim($entry),'.')+1);
//						$fln_cordpan=$path.'/'.$cur_fln.$postfix['cordpan'].'.'.$cur_ext;
						$fln_cordpan=$http_prefix.$_glovars['dir_cats'].'pics/'.$cur_fln.$postfix['cordpan'].'.'.$cur_ext;
						if(!isset($photos_ex[trim($entry)])){							if($cur_ext==$ext && strpos($cur_fln,$postfix['thmb'])===false){								if(strpos($cur_fln,$postfix['cordpan'])==false){									if(!file_exists($fln_cordpan)){										if(strpos($cur_fln,$postfix['cordpan'])==true){ unlink($fln_cordpan); }										copy($path.'/'.$cur_fln.'.'.$cur_ext,$fln_cordpan);
										chmod($fln_cordpan,0777);
										$res=$pic->pic_rebuild($fln_cordpan,'',$preview['w'],$preview['h'],true);
									}
									$cur_pic=getimagesize($fln_cordpan);
									if(($j1++)%2){ $bg='class="table1_rowOdd"'; }else{ $bg='class="table1_rowEven"'; }

									$data1[]='<td valign="top" '.$bg.'><table border="0" cellspacing="0" cellpadding="3" width="100%"><tr>'.
									             '<td valign="top" width="20"><input id="sel_'.$cur_fln.'" name="photo['.$j1.']" type="checkbox" value="'.$entry.'" '.($disabled?'disabled':'').' '.(isset($self_pic[$entry])?'checked':'').'></td>'.
									             '<td valign="top" align="center"><label for="sel_'.$cur_fln.'"><img src="'.$http_prefix.$fln_cordpan.'" alt="'.$entry.'" border="0"></label></td>'.
									         '</tr></table></td>';
									$j2++;
								}
							}
						}
					}
					if($j2==$wcnt){						$j2=0;
						$data2[]='<tr>'.implode('',$data1).'</tr>';
						unset($data1);
					}
				}
				if(isset($data1) && $j2>0){ $data2[]='<tr>'.implode('',$data1).'</tr>'; }
				$d->close();
			}else{ $erm='путь не найден'; }
		}else{ $erm='путь и расширение не должны быть пустыми'; }
		
		if(isset($data2)){ print '<table border="0" cellspacing="1" cellpadding="3" width="100%" style="background-color: #ffffff">'.implode('',$data2).'</table>'; }
		
		$data=ob_get_contents();
		ob_end_clean();
		
		return array($data,$erm);
	}
	
?>