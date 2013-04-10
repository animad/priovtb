<?php

	//--- сообщения об отработанных ошибках
	$t=array('visibility_pics');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}
	
	//--- получаем информацию об имуществе
	if (isset($_GET['pid']) && ''!=trim($_GET['pid'])){
		$q='select * from `rp_list` where `id`="'.input($_GET['pid']).'" limit 1';
		$res=mysql_query($q);
		print mysql_error();
		if (0==mysql_errno()){
			if (0<mysql_num_rows($res)){
				$rp_obj=mysql_fetch_assoc($res);
			}else{ $err=''; }
		}else{ $err=mysql_error(); }
	
		if (isset($rp_obj)){
			
			//--- получаем список файлов каталога с картинками
			$files['dir']=$_modvars['place']['images'];
			$d = dir($files['dir']);
			$i=0;
			while (false !== ($entry = $d->read())) {
				if (is_file($files['dir'].'/'.$entry)){
					if ('-'!=substr($entry,-1)){
						$t=date('YmdHis',filemtime($files['dir'].'/'.$entry)).sprintf('%05d',$i++);
						$files['list'][$t]['fln']=$entry;
						$files['list'][$t]['imagesize']=getimagesize($files['dir'].'/'.$entry);
					
						//--- быстрый доступ по имени файла картинки
						$files['qac'][$entry]=&$files['list'][$t];
					}
				}
			}
			$d->close();
			krsort($files['list']);
	
			//--- получаем перечень уже привязанных картинок
			$q='select * from `rp_pics` where `rp_list_parent`="'.input($rp_obj['id']).'" order by `order` asc, `id` asc';
			$res=mysql_query($q);
			print mysql_error();
			if (0==mysql_errno()){
				if (0<mysql_num_rows($res)){
					while ($row=mysql_fetch_assoc($res)){
						$rp_pics[]=$row;
					}
				}else{ $err=''; }
			}else{ $err=mysql_error(); }
			
			$data1[]='<p style="text-align: center;"><strong>Объект:</strong> '.output($rp_obj['title']).'</p>';
			
			for ($i=0; $i<count($rp_pics); $i++){
				$row=$rp_pics[$i];

				if($row['on']==1){
					$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_pics&id='.$row['id'].'&v=0" class="hrf3"
title="выключить">выкл</a>';
					$cl2['show']='';
				}else{
					$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_pics&id='.$row['id'].'&v=1" class="hrf3" title="включить">вкл</a>';
					$cl2['show']='off';
				}
				$cl[]=($i%2?'even':'odd').(''!=trim($cl2['show'])?'_'.$cl2['show']:'');
				
				//--- осуществляем поиск картинок
				if (file_exists($_modvars['place']['images'].'/'.$row['filename_thumb'])){
					$thumb_bg='';
					$thumb_href='<a href="'.$_modvars['place']['images'].'/'.$row['filename_thumb'].'" target="_blank" class="hrf3" title="просмотр">'.output($row['filename_thumb']).'</a>';
				}else{
					$thumb_bg=  ' style="background-color: yellow !important;"';
					$thumb_href='<span title="файл не найден" style="padding-left: 20px;">'.output($row['filename_thumb']).'</span>';
				}
				//--- осуществляем поиск картинок
				if (file_exists($_modvars['place']['images'].'/'.$row['filename_preview'])){
					$preview_bg='';
					$preview_href='<a href="'.$_modvars['place']['images'].'/'.$row['filename_preview'].'" target="_blank" class="hrf3" title="просмотр">'.output($row['filename_preview']).'</a>';
				}else{
					$preview_bg=' style="background-color: yellow !important;"';
					$preview_href='<span title="файл не найден" style="padding-left: 20px;">'.output($row['filename_preview']).'</span>';
				}

				$data2[]='<tr class="'.implode(' ',$cl).'">'.
							 '<td>'.($i+1).'</td>'.
							 '<td>'.$t_show.'</td>'.
							 '<td'.$thumb_bg.'>'.$thumb_href.'</td>'.
							 '<td'.$preview_bg.'>'.$preview_href.'</td>'.
							 '<td>'.
								 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail_photo_unlink&pid='.$row['id'].'" title="отключить от объекта" onclick="return confirm(\'Вы уверены, что хотите отключить фотографии от объекта?\');">&nbsp;XX&nbsp;</a>'.
							 '</td>'.
						 '</tr>';
				unset($cl);
			}
			if (isset($data2)){
				$data1[]='<table cellpadding="5" cellspacing="1" class="table1" align="center">'.
							 '<tr>'.
								 '<th>#</th>'.
								 '<th>show</th>'.
								 '<th>миниатюра</th>'.
								 '<th>полный размер</th>'.
								 '<th>&nbsp;</th>'.
							 '</tr>'.
							 implode('',$data2).
						 '</table>'.
						 '<br /><hr width="700" /><br />';
			}
			
			$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail_photo_add" method="post" style="margin: 0;" class="temp_pic">'.
						 '<table class="table1" cellspacing="1" cellpadding="5" align="center" style="display: none; margin-top: 10px; margin-bottom: 10px;" width="600">'.
							 '<input type="hidden" name="thumb" value="">'.
							 '<input type="hidden" name="preview" value="">'.
							 '<input type="hidden" name="parent" value="'.$_GET['pid'].'">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
							 '<tr><th>Данные для добавления</th></tr>'.
							 '<tr class="thumb"><td></td></tr>'.
							 '<tr class="preview"><td></td></tr>'.
							 '<tr><td><input type="submit" value="Добавить иллюстрацию"></td></tr>'.
						 '</table>'.
					 '</form>';
			$data1[]='<p align="center"><strong>Список не добавленных картинок</strong></p>';
			
			//--- собираем таблицу с неиспользоваными файлами
			unset($data2);
			$i=count($files['list']);
			while (list($key,$row)=each($files['list'])){
				$cl[]=(($i--)%2?'even':'odd').(''!=trim($cl2['show'])?'_'.$cl2['show']:'');

				$data2[]='<tr class="'.implode(' ',$cl).'">'.
							 '<td>'.($i+1).'</td>'.
							 '<td><input type="radio" name="thumb" value="'.output($row['fln']).'"></td>'.
							 '<td><input type="radio" name="preview" value="'.output($row['fln']).'"></td>'.
							 '<td>'.output($row['fln']).'</td>'.
						 '</tr>';
				unset($cl);
				unset($cl2);
			}
			if (isset($data2)){
				$data1[]='<table cellpadding="5" cellspacing="1" class="table1 rp_photo_free" align="center">'.
							 '<col width="50" />'.
							 '<col width="40" />'.
							 '<col width="40" />'.
							 '<col width="500" />'.
							 '<tr>'.
								 '<th>#</th>'.
								 '<th>М</th>'.
								 '<th>П</th>'.
								 '<th>имя файла</th>'.
							 '</tr>'.
							 implode('',$data2).
						 '</table>';
			}
			
		}
	
		
	}else{ $err=$_comvars['err'][1]; }

?>
