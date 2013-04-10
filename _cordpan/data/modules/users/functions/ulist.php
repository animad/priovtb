<?php
	
	class ulist{
		var $raw;
		var $outp;
		
		function get_list(){
			global $_dir;
			
			if(file_exists($_dir['users']) && is_dir($_dir['users'])){
				$d=dir($_dir['users']);
				while(false!==($entry=$d->read())) {					if(filesize($_dir['users'].$entry) && strrchr($entry,'.')=='.php' && substr($entry,0,1)!='-'){
						$t[$entry]=user_parse($_dir['users'].$entry);
					}
				}
				
				reset($t);
				krsort($t);
				while(list($key,$val)=each($t)){ $data[]=$val; }
				
				if(isset($data)){ $this->raw=$data; }
			}
		}
		
//--- краткий список зарегистрированных пользователей
		function create_table(){
			if(is_array($this->raw) && count($this->raw)>0){
				for($i=0;$i<count($this->raw);$i++){

					//--- раскрашивание четных и не четных строчек
					if($i%2){
						if($this->raw[$i]['on']==1){ $bg='class="table1_rowOdd"'; }else{ $bg='class="table1_rowOdd_red"'; }
						if($this->raw[$i]['uid']==$_SESSION['user']['uid']){
							$bg='class="table1_rowOdd_green"';
						}
					}else{
						if($this->raw[$i]['on']==1){ $bg='class="table1_rowEven"'; }else{ $bg='class="table1_rowEven_red"'; }
						if($this->raw[$i]['uid']==$_SESSION['user']['uid']){
							$bg='class="table1_rowEven_green"';
						}
					}
					
					//--- кн. ВКЛ/ВЫКЛ - разрешено выключать ВСЕХ КРОМЕ СЕБЯ
					if($this->raw[$i]['uid']==$_SESSION['user']['uid']){
						$btn_show='<img src="images/point_blank.gif" width="4" hspace="5" border="0">'.($this->raw[$i]['on']==1?'вкл':'выкл');
					}else{
						$btn_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=show&uid='.$this->raw[$i]['uid'].'&v='.($this->raw[$i]['on']==1?'0':'1').'"><img src="images/point_arrow1.gif" hspace="5" border="0">'.($this->raw[$i]['on']==1?'вкл':'выкл').'</a>';
					}
					
					//--- редактировать данные 
					$btn_edit='<td style="margin: 0; padding: 0;"><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit&uid='.$this->raw[$i]['uid'].'" title="Редактировать данные пользователя"><img src="images/b_usredit.png" hspace="5" border="0"></a></td>';
					
					//--- ограничение доступа к модулям
					$btn_mallow='<td style="margin: 0; padding: 0;"><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=mallow&uid='.$this->raw[$i]['uid'].'" title="Изменить доступ к модулям"><img src="images/s_rights.png" hspace="5" border="0"></a></td>';
					
					//--- строка таблицы
					$data[]='<tr '.$bg.'>'.
					            '<td>'.str_replace('.php','',$this->raw[$i]['fln']).'</td>'.
						        '<td>'.$btn_show.'</td>'.
						        '<td>'.$this->raw[$i]['showname'].'</td>'.
						        '<td>'.$this->raw[$i]['status'].'</td>'.
						        $btn_edit.
						        $btn_mallow.
						    '</tr>';
					
				}
				if(isset($data)){
					$this->outp='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
					                '<tr class="header">'.
					                    '<td>#</td>'.
					                    '<td>on</td>'.
					                    '<td>showname</td>'.
					                    '<td>status</td>'.
					                    '<td>&nbsp;</td>'.
					                    '<td>&nbsp;</td>'.
					                '</tr>'.
					                implode('',$data).
					            '</table>';
				}
				
			}else{
				$this->outp='<br /><br /><br /><div align="center">- список пуст -</div>';
			}
		}
		
//--- полная информация о пользователе +-edit / create
		function user_info($uid=null,$mode='info',$user=null){
			global $_comvars;
			
			function row_set($j1, $_comvars, $key, $mode, $val){
				if($j1%2){ $bg='class="odd"'; }else{ $bg='class="even"'; }
				if($mode=='info' && isset($_comvars['user_fro'][$key]) && $_comvars['user_fro'][$key][0]==1 ||
				   $mode=='edit' && isset($_comvars['user_fro'][$key]) && $_comvars['user_fro'][$key][1]==1 ||
				   $mode=='create' && isset($_comvars['user_fro'][$key]) && $_comvars['user_fro'][$key][2]==1){ $fro=' readonly'; }else{ $fro=''; }
				if(isset($_SESSION['erm'][$key])){
					$fval=trim($_SESSION['erm'][$key]);
				}else if(trim($val)!='' && isset($_comvars['user_fshow'][$key]) && $_comvars['user_fshow'][$key]!='blank'){
					$fval=trim($val);
				}else{ $fval=''; }
				return  '<tr '.$bg.'>'.
						    '<td style="width: 150px">'.(isset($_comvars['user_fname'][$key])?$_comvars['user_fname'][$key]:$key).'</td>'.
						    ($mode=='edit' || $mode=='create'?'<td style="width: 70px; text-align: right; color: #aaaaaa">'.(isset($_comvars['user_fhlp'][$key]) && trim($_comvars['user_fhlp'][$key])!=''?trim($_comvars['user_fhlp'][$key]):'&nbsp;').'</td>':'').
						    '<td style="width: 300px; padding: 0;"><input type="text" name="'.$key.'" value="'.$fval.'"'.$fro.' class="input3"></td>'.
						'</tr>';
				
			}


			if($uid!=null){
				list($user,$err)=user_getInfo_id($uid);
			}
			
			if($user!=null){
				$uid=$user['uid'];
				$j1=0;
				while(list($key,$val)=each($user)){
					if(isset($_comvars['user_fshow'][$key]) && $_comvars['user_fshow'][$key]!='false'){
						if($_comvars['user_fshow'][$key]!='hide'){
							$data[]=row_set(($j1++), $_comvars, $key, $mode, $val);
							if($mode!='info' && isset($_comvars['user_fconfr'][$key]) && trim($_comvars['user_fconfr'][$key])!=''){
								$data[]=row_set(($j1++), $_comvars, trim($_comvars['user_fconfr'][$key]), $mode, trim($val));
							}
						}else if($_comvars['user_fshow'][$key]=='hide'){
							$data[]='<input type="hidden" name="'.$key.'" value="'.(trim($val)!=''?trim($val):'').'">';
						}
					}
				}
				if(isset($data)){
					$this->outp='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m='.$mode.'_save&uid='.$uid.'" method="post">'.
					            '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
					            '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.implode("\r\n",$data).'</table>'.
					            '<p align="center"><input type="submit" value="Ок"></p>'.
					            '</form>';
				}else{ $this->outp='<br /><br /><br /><div align="center">- ОШИБКА! Список полей не найден. -</div>'; }
				
				
				
				
			}
			
		}
		
		function create(){
			global $_comvars,$_dir;
			
			//--- заполняем значения ПО УМОЛЧАНИЮ
			reset($_comvars['user_fdef']);
			while(list($key,$val)=each($_comvars['user_fdef'])){ $user[$key]=(trim($val)!=''?$val:''); }
			
			//--- заполняем 
			$user['uid']=md5(uniqid(rand(), true));
			list($user['fln'],$err)=gen_fln($_dir['users']);
			
			$this->user_info(null,'create',$user);
		}

//--- дополнение КОМАНДНОЙ СТРОКИ		
		function cmd_dop_01(){
			global $mod;
			
			$mod->cmd_dop_info[]='<div class="dop_info">'.
									 '<table border="0" cellspacing="0" cellpadding="0"><tr>'.
										 '<td>'.
											 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create" title="Создать пользователя">'.
												 '<div class="dop_info_box" onmouseover="className=\'dop_info_box_hover\'" onmouseout="className=\'dop_info_box\'">'.
													'<img src="images/b_usradd.png" border="0">'.
												 '</div>'.
											 '</a>'.
										 '</td>'.
										 '<td>'.
											 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=drop" onClick="ans=confirm(\'Удалить всех отключенных пользователей?\'); return ans;" title="Удалить отключенных">'.
												 '<div class="dop_info_box" onmouseover="className=\'dop_info_box_hover\'" onmouseout="className=\'dop_info_box\'">'.
													'<img src="images/b_usrdrop.png" border="0">'.
												 '</div>'.
											 '</a>'.
										 '</td>'.
										 '<td class="dop_info_separator"><img src="images/point_blank.gif" border="0"></td>'.
									 '</tr></table>'.
								 '</div>';
		}
		
		
		function mod_list($user=null){
			if($user!=null){
				global $mod;
				
				reset($mod->box);
				$j1=0;
				while(list($key,$val)=each($mod->box)){
					//--- сисок модулей в зависимости от ПРАВ ДОСТУПА
					if(isset($user['status']) && trim($user['status'])=='admin'){
						$ok=true;
					}elseif(isset($val['run']['access']) && strpos($val['run']['access'],$user['status'])===false){
						$ok=false;
					}else{ $ok=true; }
					
					if($ok){
						if(($j1++)%2){ $bg='class="odd"'; }else{ $bg='class="even"'; }
						
						if(isset($user['mallow']) && trim($user['mallow'])!='' && ( strpos($user['mallow'],$key)!==false || trim($user['mallow'])=='all')){
							$status='checked';
						}else{ $status=''; }
						
						$data[]='<tr '.$bg.'>'.
						            '<td width="30"><input type="checkbox" name="mod[]" value="'.$key.'" id="mod['.$key.']" '.$status.'></td>'.
						            '<td><label for="mod['.$key.']">'.output($val['info']['title']).'</label></td>'.
						        '</tr>';
					}
				}
			}
			
			if(isset($data)){
				$data='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=mallow_save&uid='.$user['uid'].'" method="post">'.
				          '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				          '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.implode("\r\n",$data).'</table>'.
				          '<p align="center"><input type="submit" value="Сохранить"></p>'.
				      '</form>';
				
			}else{ $data=''; }
			
			return $data;
		}
		
		
	}
	
?>
