<?php

	function browse_list(){		global $mod,$_modvars,$_glovars,$_dir;
//		ob_start();
	
	
		if(!isset($_GET['cdir']) || trim($_GET['cdir'])=='' || trim($_GET['cdir'])=='/'){ $_GET['cdir']=$mod->box[$_GET['dr']]['config']['dir_dest']; }
		$ok=false;
		reset($_modvars['fav_dir']);
		while(list($key,$val)=each($_modvars['fav_dir'])){			if(strpos($_GET['cdir'],trim($key))!==false){ $ok=true; }
		}
		if(!$ok){ $_GET['cdir']=$mod->box[$_GET['dr']]['config']['dir_dest']; }

		$flist_data=files_list($_GET['cdir'].'/');
		$fav_dir_list[]='<option value=""></option>';
		if(isset($_modvars['fav_dir'])){			reset($_modvars['fav_dir']);			while(list($key,$val)=each($_modvars['fav_dir'])){				$fav_dir_list[]='<option value="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&cdir='.$key.'" '.($_GET['cdir']==$key?'selected':'').'>'.output($val).'</option>';
			}
		}
		
		if(isset($_SESSION['er']['upload'])){
			$erm=output($_SESSION['er']['upload']['message']);
			unset($_SESSION['er']);
		}

		//--- дополнение КОМАНДНОЙ СТРОКИ
		$mod->cmd_dop_info[]='<div class="dop_info">'.
							     '<table border="0" cellspacing="0" cellpadding="0"><tr>'.
									 '<td>'.
									     '<a href="#" onClick="dir_create(\''.$_GET['cdir'].'\'); return false;" title="Создать каталог">'.
											 '<div class="dop_info_box" onmouseover="className=\'dop_info_box_hover\'" onmouseout="className=\'dop_info_box\'">'.
												'+<img src="images/b_folder_new.png" border="0" align="absmiddle">'.
											 '</div>'.
										 '</a>'.
									 '</td>'.
									 '<td class="dop_info_separator"><img src="images/point_blank.gif" border="0"></td>'.
									 '<td width="30" align="center"><img src="images/ico/b_favicon.png" width="16" height="16" border="0"></rd>'.
									 '<td width="70">Закладки:</rd>'.
									 '<td>'.
										 '<select name="favPlace" id="favPlace" onChange="MM_jumpMenu(\'parent\',this,0)">'.
											implode('',$fav_dir_list).
										 '</select>'.
									 '</td>'.
									 '<td width="30" align="center">'.
									     '<a href="#" onClick="fav_dir_del(); return false;" title="Удалить закладку">'.
											 '<div class="dop_info_box" onmouseover="className=\'dop_info_box_hover\'" onmouseout="className=\'dop_info_box\'">'.
												'<img src="images/ico/b_drop.png" width="16" height="16" alt="Удалить" border="0">'.
											 '</div>'.
										 '</a>'.
									 '</rd>'.
									 '<td class="dop_info_separator"><img src="images/point_blank.gif" border="0"></td>'.
									 '<td>'.
		              '<form enctype="multipart/form-data" name="fileUpload" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=upload" method="post" style="padding: 0px; margin: 0px">'.
		                  '<input name="uploaddir" type="hidden" value="'.$_GET['cdir'].'">'.
		                  '<table border="0" cellspacing="0" cellpadding="0"><tr>'.
		                      '<td width="120" style="padding-left: 10px"><label for="file1">Загрузить файл:</label></td>'.
		                      '<td><input type="file" name="file1" id="file1" class="input2"></td>'.
		                      '<td><input type="submit" value="ок" class="input2" style="width: 50px"></td>'.
		                  '</tr></table>'.
		              '</form>'.
									 '</td>'.
								 '</tr></table>'.
							 '</div>';
		//----------------------------------------

		$j1=0;
		$data='<form name="do_01" action="" method="get" style="margin: 0px; padding: 0px">'.
		          '<input name="dr" type="hidden" value="'.$_GET['dr'].'">'.
		          '<input name="m" type="hidden" value="fav_dir">'.
		      '</form>'.
		      '<form name="FfavPlace" id="FfavPlace" style="margin: 0px; padding: 0px">'.
		          '<input name="cdir" type="hidden" value="'.$_GET['cdir'].'">'.
		      '</form>'.
			  (isset($erm)?'<div align="center" class="errormsg"><b>ВНИМАНИЕ</b>! '.$erm.'</div>':'').
		      '<table width="800" border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
				  
		          '<tr><td '.(($j1++)%2?'class="table1_rowOdd"':'class="table1_rowEven"').' style="paddig: 0px">'.
		              $flist_data.
		          '</td></tr>'.
		      '</table><br /><br />';
	
//		$data=ob_get_contents();
		//ob_end_clean();
		
		return $data;
	}
	
	function files_list($dir=null,$prefix=null){		global $mod,$_modvars,$_dir,$glovars;
	
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
		
		$j2=0;
		if($parent_dir){
			$tmp1=explode('/',substr($dir,0,strlen($dir)-1));
			array_pop($tmp1);
			$data[]='<tr><td class="table2_rows">'.
						'<a name="dir_parent"></a>'.
						'<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=browse&cdir='.implode('/',$tmp1).'">&nbsp;&nbsp;..&nbsp;&nbsp;</a>'.
					'</td></tr>';
			$j2++;
		}

		if(isset($data1)){			for($i=1;$i<=2;$i++){				if(isset($data1[$i])){					reset($data1[$i]);					while(list($key,$val)=each($data1[$i])){						if(is_dir($path.'/'.$val)){
							$fname='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=browse&cdir='.$dir.$val.'">'.
							           '<img src="images/b_folder_new.png" border="0" hspace="5" align="absmiddle">'.
							           '<b>'.$val.'</b>'.
							           '<img src="images/point_blank.gif" width="16" height="16" border="0" align="absmiddle">'.
							       '</a>';
							if(!isset($_modvars['fav_dir'][$dir.$val])){
								$favdir='<a onClick="fav_dir(\''.$dir.$val.'\'); return false;" style="cursor: pointer" title="Добавить в закладки">'.
								            '<img src="images/ico/b_favicon.png" width="16" height="16" border="0">'.
								        '</a>';
							}else{ $favdir=''; }
							$filesize='&nbsp;';
//							$fedit='&nbsp;';
						}elseif(is_file($path.'/'.$val)){
							$fname='<img src="images/point_blank.gif" width="16" height="16" hspace="5" border="0" align="absmiddle">'.
							       $val.
							       '<img src="images/point_blank.gif" width="16" height="16" border="0" align="absmiddle">';
							$favdir='&nbsp;';
							
							$filesize=strrev(chunk_split(strrev(filesize($path.'/'.$val)),3,' '));
							
//							$fedit='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'"></a>';
						}

						if(isset($_SESSION['file_upload'][$val])){							$bg='table2_rows2';
							if($_SESSION['file_upload'][$val]['old']-date('YmdHis')>1800){ unset($_SESSION['file_upload'][$val]); }
						}else{ $bg='table2_rows1'; }
						
						$data[]='<tr>'.
						            (isset($fedit)?'<td class="'.$bg.'" width="30" align="center">'.$fedit.'</td>':'').
						            '<td class="'.$bg.'" width="300"><a name="'.$val.'"></a>'.$fname.'</td>'.
						            '<td class="'.$bg.'" width="80" align="right">'.$filesize.'</td>'.
						            '<td class="'.$bg.'" width="30" align="center">'.$favdir.'</td>'.
						            '<td class="'.$bg.'" width="30" align="center">'.
						                '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=del&fln='.$dir.$val.'" onclick="return confirm(\''.$val.' - Желаете удалить?\');">'.
						                    '<img src="images/ico/b_drop.png" width="16" height="16" alt="Удалить" border="0">'.
						                '</a>'.
						            '</td>'.
						            '<td class="'.$bg.'">&nbsp;</td>'.
						        '</tr>';
					}
				}
			}
		}
		
		if(isset($data)){ $data='<table border="0" cellspacing="0" cellpadding="5" width="100%">'.implode('',$data).'</table>'; }else{ $data=null; }
		
		return $data;
	}

?>