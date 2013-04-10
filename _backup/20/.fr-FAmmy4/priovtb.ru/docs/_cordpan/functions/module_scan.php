<?php

	class module{
		var $cnt=0;			//--- количество найденых модулей
		var $box;			//--- массив модулей
		var $cmd_line;		//--- 
		var $cmd_dop_info;	
		var $gro;			//--- группы сортировки
		
		function scan($uid=null){
			global $_dir,$_globals;
			
			//---данные для доступа
			if(isset($_SESSION['user']['status']) && trim($_SESSION['user']['status'])!=''){ $ustatus=explode(' ',trim($_SESSION['user']['status'])); }
			
			$d=dir($_dir['modplace']);
			while(false!==($entry=$d->read())){
				if(is_dir($_dir['modplace'].$entry) && $entry!='.' && $entry!='..' && substr(trim($entry),0,1)!='-'){
					$fln1=$_dir['modplace'].$entry.'/mod.ini';
					if(file_exists($fln1) && filesize($fln1)>0){
						$tmp1=parse_ini_file($fln1,true);
						if($uid==null || $uid!=null && $uid==$tmp1['info']['uId']){
							//---управление доступом
							if(isset($tmp1['run']['access']) && trim($tmp1['run']['access'])!='' && isset($ustatus)){
								$ok=false;
								for($i=0;$i<count($ustatus);$i++){
									if(strpos(trim($tmp1['run']['access']),$ustatus[$i])!==false){
										$ok=true;
										break;
									}
								}
							}else{ $ok=true; }
							
							if($ok){
								$this->box[$tmp1['info']['uId']]=$tmp1;
								if(!isset($this->box[$tmp1['info']['uId']]['config']['order'])){
									$this->box[$tmp1['info']['uId']]['config']['order']='default';
								}
								$this->cnt+=1;
								$this->gro[$_globals['modbox_order'][$this->box[$tmp1['info']['uId']]['config']['order']]][$tmp1['info']['title']]=&$this->box[$tmp1['info']['uId']];
							}
						}
						unset($tmp1);
					}
				}
			}
			$d->close();
		}
		
		//--- формирование списка модулей
		function mmenu_create(){
			global $_dir;
			
			reset($this->box);
			ksort($this->gro);
			//--- проверяем права чел. на работу с модулем
			if(is_array($this->box)){
				while(list($key,$mod)=each($this->box)){
					if(isset($_SESSION['user']) && ( trim($_SESSION['user']['mallow'])=='all' || !isset($_SESSION['user']['mallow']) || isset($_SESSION['user']['mallow']) && strpos($_SESSION['user']['mallow'],$mod['info']['uId'])!==false)){
						$mod_allow[$mod['info']['uId']]=true;
					}
				}
			}
			
			$wcnt=4;			//--- модулей в строке
			$t['spacer']=10;	//--- расстояние между кнопками
			$t['w']=230;		//--- ширина кнопки
			$t['h']=70;			//--- высота кнопки
			$j=0;				//--- указатель строки
			$gno=0;				//--- номер группы

			$k=0;
			$ext=false;
			
			while(list($key,$group)=each($this->gro)){
				reset($group);
				ksort($group);
				$t['x']=0;			//--- начальная позиция
				$t['y']=0;			//--- начальная позиция
				$i=0;				//--- указатель номера модуля в строке
				while(list($key,$mod)=each($group)){
					if(isset($mod_allow[$mod['info']['uId']])){
						if($i<$wcnt){
							$t['x']=($t['w']+$t['spacer'])*$i;
							$i++;
						}else{
							$i=1;
							$j++;
							$t['y']=($t['h']+$t['spacer'])*$j;
							$t['x']=0;
						}

						if(isset($mod['run']['place'])){
							$fln1=$_dir['modplace_http'].$mod['run']['place'].'/icon.gif';
							$fln2=$_dir['modplace_http'].$mod['run']['place'].'/icon.png';
							if(file_exists($fln1)){
								$mod_icon='<img src="'.$fln1.'" width="64" height="64" alt="'.$mod['info']['title'].'" border="0">';
							}elseif(file_exists($fln2)){
								$mod_icon='<img src="'.$fln2.'" width="64" height="64" alt="'.$mod['info']['title'].'" border="0">';
							}
						}

						if(!isset($mod_icon)){ $mod_icon=''; }

						
						//---
						if(isset($mod['run']['execute']) && isset($mod['run']['place']) && file_exists($_dir['modplace'].$mod['run']['place'].'/'.$mod['run']['execute']) && filesize($_dir['modplace'].$mod['run']['place'].'/'.$mod['run']['execute'])){
							$data[]='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$mod['info']['uId'].'" class="modlist_btn" style="top: '.$t['y'].'px; left: '.$t['x'].'px;">'.
										'<div class="modlist_pic">'.$mod_icon.'</div>'.
										'<div class="modlist_text">'.addslashes(trim($mod['info']['title'])).
											(isset($mod['info']['about']) && trim($mod['info']['about'])!=''?'<div class="modlist_about">'.addslashes(trim($mod['info']['about'])).'</div>':'').
										'</div>'.
									'</a>';
						}else{
							$data[]='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$mod['info']['uId'].'" class="modlist_btn" style="top: '.$t['y'].'px; left: '.$t['x'].'px;">'.
										'<div class="modlist_pic"></div>'.
										'<div class="modlist_text">...'.
											'<div class="modlist_about">модуль не может быть запущен</div>'.
										'</div>'.
									'</a>';
						}
						unset($mod_icon);


					}
				}
				$j++;
				if(isset($data)){ $data2[]='<div class="colbox1" style="height: '.(($t['spacer']*$j)+($t['h']*$j)).'px;"><div class="colbox2">'.implode('',$data).'</div></div>'; }
				unset($data);
				$gno++;
				$j=0;
			}
			if(isset($data2)){ return '<div style="position: relative; height: 10px;"></div>'.implode('',$data2); }
		}
		
		function cmd_line_cr($mCur=null,$login=false){
			$point['arrow_01_right']='<img src="images/point_arrow1.gif" class="point_arrow1" width="4" height="8" align="absmiddle" border="0">';
			$point['plank']='<img src="images/point_blank.gif" width="1" height="1" border="0">';
		
			if(isset($_SERVER['SERVER_NAME'])){
				$this->cmd_line[]='<li class="i1">'.$_SERVER['SERVER_NAME'].'</li>';
			}

			if(isset($_SESSION['user'])){
				$this->cmd_line[]='<li>'.
				                      '<a href="'.$_SERVER['PHP_SELF'].'?logout" title="IP:'.$_SERVER['SERVER_ADDR'].'">выход</a>- '.
									  '<b>'.htmlspecialchars(trim($_SESSION['user']['showname'])).'</b> '.
								  '</li>';
				$this->cmd_line[]='<li><a href="'.$_SERVER['PHP_SELF'].'">модули ...</a></li>';
			}
		
			if($mCur!=null){
				if(isset($this->box[$mCur])){
					$this->cmd_line[]='<li><a href="'.$_SERVER['PHP_SELF'].'?dr='.$this->box[$mCur]['info']['uId'].'">'.$this->box[$mCur]['info']['title'].'</a></li>';
				}
			}
			if($login){
				$this->cmd_line[]='<li class="i1">LOGIN</li>';
			}
			return null;
		}
		
		function cmd_line_show(){
			$point['blank']='<img src="images/point_blank.gif" width="1" height="1" border="0">';
			$data[]='<div class="cmd_line">';
			$data[]='<ul class="left">'.implode("",$this->cmd_line).'</ul>';
			$data[]='<ul class="right"><li><a href="#">help</a></li></ul>';
			$data[]='</div>';
			return implode("",$data);
		}
	
	}

?>
