<?php

	function browse_list($width=800,$height=null,$columns=null,$favorites=true,$upload=true,$append_style='',$fmark=''){		ob_start();
	
		global $mod,$_modvars;

		//--- колонки по умолчанию
		if(!is_array($columns)){ array('fname'=>'300','filesize'=>'80','favdir'=>'30','edit'=>'30','delete'=>'30',null=>null); }
	
		if(!isset($_GET['cdir']) || trim($_GET['cdir'])=='' || trim($_GET['cdir'])=='/'){ $_GET['cdir']=$mod->box[$_GET['dr']]['config']['dir_dest']; }
		$ok=false;
		reset($_modvars['fav_dir']);
		while(list($key,$val)=each($_modvars['fav_dir'])){			if(strpos($_GET['cdir'],trim($key))!==false){ $ok=true; }
		}
		if(!$ok){ $_GET['cdir']=$mod->box[$_GET['dr']]['config']['dir_dest']; }

		$flist_data=files_list($_GET['cdir'].'/',null,$columns,$append_style,$fmark);
		
		$fav_dir_list[]='<option value=""></option>';
		if(isset($_modvars['fav_dir'])){			reset($_modvars['fav_dir']);			while(list($key,$val)=each($_modvars['fav_dir'])){				$fav_dir_list[]='<option value="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&cdir='.$key.'" '.($_GET['cdir']==$key?'selected':'').'>'.output($val).'</option>';
			}
		}
	
		$j1=0;
		print '<form name="do_01" action="" method="get" style="margin: 0px; padding: 0px">'.
		          '<input name="dr" type="hidden" value="'.$_GET['dr'].'">'.
		          '<input name="m" type="hidden" value="fav_dir">'.
		      '</form>'.
		      '<form name="FfavPlace" id="FfavPlace" style="margin: 0px; padding: 0px">'.
		          '<input name="cdir" type="hidden" value="'.$_GET['cdir'].'">'.
		      '</form>'.
			  '<div class="table1" '.($height!=null?'style="height: '.$height.'; overflow: auto"':'').'>'.
		      '<table '.($width!=null?'width="'.$width.'"':'').' border="0" cellspacing="1" cellpadding="5" align="center">'.
		          ($favorites?'<tr><td '.(($j1++)%2?'class="table1_rowOdd"':'class="table1_rowEven"').'>'.
		                  '<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr>'.
		                      '<td width="20"><img src="images/ico/b_favicon.png" width="16" height="16" border="0"></td>'.
		                      '<td width="80">Закладки:</td>'.
		                      '<td>'.
		                              '<select name="favPlace" id="favPlace" onChange="MM_jumpMenu(\'parent\',this,0)" class="input3">'.
		                                  implode('',$fav_dir_list).
		                              '</select>'.
		                      '</td>'.
		                     '<td width="25" align="right">'.
		                         '<a href="#" onClick="fav_dir_del(); return false;" title="Удалить закладку"><img src="images/ico/b_drop.png" width="16" height="16" alt="Удалить" border="0"></a>'.
		                     '</td>'.
		                  '</tr></table>'.
		          '</td></tr>'.
		          '<tr><td style="margin: 0px; padding: 0px"><img src="images/point_blank.gif" width="100%" height="1" style="background-color: #000000" border="0"></td></tr>':'').
		          ($upload?'<tr><td '.(($j1++)%2?'class="table1_rowOdd"':'class="table1_rowEven"').'>'.
		              '<form enctype="multipart/form-data" name="fileUpload" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=upload" method="post" style="padding: 0px; margin: 0px">'.
		                  '<input name="uploaddir" type="hidden" value="'.$_GET['cdir'].'">'.
		                  '<table border="0" width="100%" cellspacing="0" cellpadding="0"><tr>'.
		                      '<td width="120"><label for="file1">Загрузить файл:</label></td>'.
		                      '<td><input type="file" style="width: 600px" name="file1" id="file1" class="input1"></td>'.
		                      '<td><input type="submit" value="ок" class="input2" style="width: 50px"></td>'.
		                  '</tr></table>'.
		              '</form>'.
		          '</td></tr>':'').
		          '<tr><td '.(($j1++)%2?'class="table1_rowOdd"':'class="table1_rowEven"').' style="paddig: 0px">'.
		              $flist_data.
		          '</td></tr>'.
		      '</table>'.
		      '</div>';
	
		$data=ob_get_contents();
		ob_clean();
		
		return $data;
	}
	
	function files_list($dir=null,$prefix=null,$columns=null,$append_style,$fmark=null){		global $mod,$_modvars,$_dir;
	
		if(isset($_modvars['fav_dir'][$_GET['cdir']])){
			$parent_dir=false;
		}else{
			$parent_dir=true;
		}
		if($dir!=null){			$path=$_dir['site'].$dir;
			if(file_exists($path)){				$d=dir($path);				while(false!==($entry=$d->read())){					if(trim($entry)!='..' && trim($entry)!='.'){						if(is_dir($path.'/'.$entry)){
							$data1[1][trim($entry)]=trim($entry);
						}elseif(is_file($path.'/'.$entry)){
							$data1[2][trim($entry)]=trim($entry);
						}
					}
									
									}
				$d->close();
			}
					}

		if(isset($data1[1]) && is_array($data1[1]) && count($data1[1])>0){ ksort($data1[1]); }
		if(isset($data1[2]) && is_array($data1[2]) && count($data1[2])>0){ ksort($data1[2]); }

		if(isset($data1)){			$j2=0;			for($i=1;$i<=2;$i++){				if(isset($data1[$i])){					reset($data1[$i]);					while(list($key,$val)=each($data1[$i])){						if($parent_dir && $j2<1){							$tmp1=explode('/',substr($dir,0,strlen($dir)-1));
							array_pop($tmp1);
							$data[]='<tr><td class="table2_rows">'.
							            '<a name="dir_parent"></a>'.
							            '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&cdir='.implode('/',$tmp1).(isset($_GET['f2edit']) && trim($_GET['f2edit'])!=''?'&f2edit='.trim($_GET['f2edit']):'').'">&nbsp;&nbsp;..&nbsp;&nbsp;</a>'.
							        '</td></tr>';
							$j2++;
						}						if(is_dir($path.'/'.$val)){
							$fname='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&cdir='.$dir.$val.(isset($_GET['f2edit']) && trim($_GET['f2edit'])!=''?'&f2edit='.trim($_GET['f2edit']):'').'">'.
							           '<img src="images/point_blank.gif" width="16" height="16" border="0" align="absmiddle">'.
							           '<b>'.$val.'</b>'.
							           //'<img src="images/point_blank.gif" width="16" height="16" border="0" align="absmiddle">'.
							       '</a>';
							if(!isset($_modvars['fav_dir'][$dir.$val])){
								$favdir='<a onClick="fav_dir(\''.$dir.$val.'\'); return false;" style="cursor: pointer" title="Добавить в закладки">'.
								            '<img src="images/ico/b_favicon.png" width="16" height="16" border="0">'.
								        '</a>';
							}else{ $favdir=''; }
							$filesize='&nbsp;';
							$edit='&nbsp;';
						}elseif(is_file($path.'/'.$val)){
						
							$fname='<img src="images/point_blank.gif" width="16" height="16" border="0" align="absmiddle">'.
							       $val.
							       //'<img src="images/point_blank.gif" width="16" height="16" border="0" align="absmiddle">';
							$favdir='&nbsp;';
							$edit='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&f2edit='.$dir.$val.'"><img src="images/ico/b_edit.png" border="0"></a>';
							$filesize=strrev(chunk_split(strrev(filesize($path.'/'.$val)),3,' '));
						}

						if(isset($_SESSION['file_upload'][$val])){							$bg='table2_rows2';
							if($_SESSION['file_upload'][$val]['old']-date('YmdHis')>1800){ unset($_SESSION['file_upload'][$val]); }
						}else{ $bg='table2_rows1'; }

						if($dir.$val==$fmark){ $bg='table2_rows2'; }
						//--- собираем колонки
						reset($columns);
						while(list($key_col,$val_col)=each($columns)){
							switch($key_col){
								case 'fname':
									$coldata[]='<td class="'.$bg.'" '.(isset($val_col) && $val_col!=null && trim($val_col)!=''?'width="'.trim($val_col).'"':'').' style="'.$append_style.' overflow: hidden"><a name="'.$val.'"></a>'.$fname.'</td>';
								break;
								case 'filesize':
									$coldata[]='<td class="'.$bg.'" '.(isset($val_col) && $val!=null && trim($val_col)!=''?'width="'.trim($val_col).'"':'').' align="right" style="'.$append_style.'">'.$filesize.'</td>';
								break;
								case 'favdir':
									$coldata[]='<td class="'.$bg.'" '.(isset($val_col) && $val!=null && trim($val_col)!=''?'width="'.trim($val_col).'"':'').' align="center">'.$favdir.'</td>';
								break;
								case 'edit':
									$coldata[]='<td class="'.$bg.'" '.(isset($val_col) && $val!=null && trim($val_col)!=''?'width="'.trim($val_col).'"':'').' align="center">'.$edit.'</td>';
								break;
								case 'delete':
									$coldata[]='<td class="'.$bg.'" '.(isset($val_col) && $val!=null && trim($val_col)!=''?'width="'.trim($val_col).'"':'').' align="center">'.
									               '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=del&fln='.$dir.$val.'" onclick="return confirm(\''.$val.' - Желаете удалить?\');">'.
						                               '<img src="images/ico/b_drop.png" width="16" height="16" alt="Удалить" border="0">'.
						                           '</a>'.
									           '</td>';
								break;
								case '':
									$coldata[]='<td class="'.$bg.'">&nbsp;</td>';
								break;
							}
						}
						
						if(isset($coldata)){
							$data[]='<tr>'.implode('',$coldata).'</tr>';
							unset($coldata);
						}
					}
				}
			}
		
			$data='<table border="0" cellspacing="0" cellpadding="5" width="100%">'.implode('',$data).'</table>';
		}else{ $data=null; }
		
		return $data;
	}

?>
