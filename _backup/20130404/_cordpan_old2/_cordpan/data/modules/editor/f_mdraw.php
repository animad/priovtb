<?php
	function mainw_draw(){
		global $_modvars,$_dir,$mod;
		
		//--- если ОШИБКА!!!
		if(isset($_SESSION['er'])){
			$er['message']='<div class="errormsg"><b>ВНИМАНИЕ</b>! '.output($_SESSION['er']['message']).'</div>';
			$er['f_prefix']=$_SESSION['er']['f_prefix'];
			$er['f_name']=$_SESSION['er']['f_name'];
			$er['f_ext']=$_SESSION['er']['f_ext'];
			$er['elm1']=$_SESSION['er']['elm1'];
			unset($_SESSION['er']);
		}

		$fln=$_dir['mod'].'/skin/'.$_modvars['skin'].'/main.html';
		
		if(file_exists($fln) && filesize($fln)){
			$fp=fopen($fln,'r');
			$data=fread($fp, filesize($fln));
			fclose($fp);
		}else{ $data=null; }
		
		ob_start();
		$fln=$_dir['mod'].'/editor.php';
		if(file_exists($fln) && filesize($fln)){
			include($fln);
			$editor=ob_get_contents();
		}else{ $editor=null; }
		ob_clean();

		if(isset($mod->box[$_GET['dr']]['config']['dir_dest']) && $mod->box[$_GET['dr']]['config']['dir_dest']=='true'){
			$flist=browse_list(null,'600px',array('edit'=>'30','fname'=>'300'),false,false,'font-size: 8pt;',(isset($_GET['f2edit'])?trim($_GET['f2edit']):''));
		}else{ $flist='&nbsp;'; }
		
		//--- загружаю страничку для редакирования
		if(!isset($er['elm1']) || trim($er['elm1'])==''){
			if(isset($_GET['f2edit']) && trim($_GET['f2edit'])!=''){
				$fln=$_dir['site'].$_GET['f2edit'];
				if(file_exists($fln)){
					if(filesize($fln)){
						$info_fname=$_GET['f2edit'];
						$fp=fopen($fln,'r');
						$page2edit=fread($fp, filesize($fln));
						fclose($fp);
					}
					$f2e['name_full']=trim($_GET['f2edit']);
					$f1=explode('.',$_GET['f2edit']);
					end($f1);
					$f2e['ext']=current($f1);
					unset($f1[key($f1)]);
					$f2e['name']=str_replace($mod->box[$_GET['dr']]['config']['dir_dest'].'/','',implode('.',$f1));
				}
			}
		}else{ $page2edit=$er['elm1']; }
		$info_fname=$mod->box[$_GET['dr']]['config']['dir_dest'].'/<input class="input1" type="text" name="f_name" id="f_name" value="'.(isset($er['f_name'])?trim($er['f_name']):(isset($f2e['name'])?trim($f2e['name']):'')).'" '.(isset($f2e['name'])?'disabled':'').'>';
		
		if(!isset($page2edit)){ $page2edit=''; }
		
		

		//--- допустимые расширения файлов
		$t=$_modvars['ext'];
		while(list($key,$val)=each($t)){
			$fln_type_list[]='<option value="'.$key.'" '.(isset($er['f_ext']) && trim($er['f_ext'])==$key?'selected':(isset($f2e['ext']) && $key==$f2e['ext']?'selected':'')).'>'.output($val).'</option>';
		}
		if(isset($fln_type_list) && count($fln_type_list)>0){ $fln_type_list='<select name="f_ext" id="f_ext" class="input2" '.(isset($f2e['name'])?'disabled':'').'>'.implode('',$fln_type_list).'</select>'; }

		//--- дополнение КОМАНДНОЙ СТРОКИ
		$mod->cmd_dop_info[]='<div class="dop_info">'.
							     '<table border="0" cellspacing="0" cellpadding="0"><tr>'.
									 '<td>'.
									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'" title="Новый файл">'.
										     '<div class="dop_info_box" onmouseover="className=\'dop_info_box_hover\'" onmouseout="className=\'dop_info_box\'">'.
											     '<img src="images/ico/b2_new.gif" border="0">'.
											 '</div>'.
										 '</a>'.
									 '</td>'.
									 '<td class="dop_info_separator"><img src="images/point_blank.gif" border="0"></td>'.
									 '<td>'.
									     '<a href="#" onClick="f_save(); return false;" title="Сохранить файл">'.
										     '<div class="dop_info_box" onmouseover="className=\'dop_info_box_hover\'" onmouseout="className=\'dop_info_box\'">'.
											     '<img src="images/ico/b2_save.gif" border="0">'.
											 '</div>'.
										 '</a>'.
									 '</td>'.
									 '<td class="dop_info_separator"><img src="images/point_blank.gif" border="0"></td>'.
								     '<td>'.
									     '<div class="dop_info_box">'.
											 '<input type="hidden" id="f_prefix" name="f_prefix" value="'.$mod->box[$_GET['dr']]['config']['dir_dest'].'">'.
											 'файл: '.$info_fname.
											 (isset($fln_type_list) && trim($fln_type_list)!=''?'.'.$fln_type_list:'').
										 '</div>'.
									 '</td>'.
									 '<td class="dop_info_separator"><img src="images/point_blank.gif" border="0"></td>'.
								 '</tr></table>'.
							 '</div>';
		//----------------------------------------
		
		$data=str_replace('%file_info%','',$data);
		$data=str_replace('%text_editor%',$editor,$data);
		$data=str_replace('%files_list%',$flist,$data);
		$data=str_replace('%page2edit%',output($page2edit),$data);
		$data=str_replace('%errormsg%',(isset($er)?$er['message']:''),$data);
		
		return isset($data)?$data:null;
	}
?>
