<?php
	
	$j1=0;

	//--- сообщения об отработанных ошибках
	$t=array('visibility_file','delete_file','upload');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}

	
	//--- получаем список файлов каталога с картинками
	$files['dir']=$_modvars['place']['files'];
	$d = dir($files['dir']);
	$i=0;
	while (false !== ($entry = $d->read())) {
		if (is_file($_modvars['place']['files'].'/'.$entry)){
			$t=date('YmdHis',filemtime($_modvars['place']['files'].'/'.$entry)).sprintf('%05d',$i++);
			$files['list'][$t]=$entry;
		}
	}
	$d->close();
	krsort($files['list']);

	$pglist=new pageList;
	$pglist->get($files['list'],150,$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),$_comvars['pglist']['pages_pp'],'desc');

			$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=upload" method="post" style="padding: 0;">'.
//						 '<input type="hidden" name="MAX_FILE_SIZE" value="1500000">'.
						 '<input type="hidden" name="place" value="files">'.
			             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
						     '<tr><th>Загрузка нового файла</th></tr>'.
						     '<tr class="odd"><td><input type="file" style="width: 600px" name="file"></td></tr>'.
						     '<tr class="even"><td align="center"><i>ВНИМАНИЕ. Объем одного файла не должен превышать 2 Мб.</i></td></tr>'.
						 '</table>'.
						 '<p align="center"><input type="submit" value="Ок"></p>'.
					 '</form>';

	if($pglist->pglist!=''){ $data1[]=$pglist->pglist.'<br />'; }
	
	reset($pglist->list);
	$i=0;
	while(list($key,$row)=each($pglist->list)){
		if('-'!=substr($row,-1,1)){
			$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_file&fln='.$files['dir'].'/'.$row.'&v=0" class="hrf3"
title="выключить">выкл</a>';
			$cl2['show']='';
		}else{
			$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_file&fln='.$files['dir'].'/'.$row.'&v=1" class="hrf3" title="включить">вкл</a>';
			$cl2['show']='off';
		}
		$cl[]=(($i++)%2?'even':'odd').(''!=trim($cl2['show'])?'_'.$cl2['show']:'');

		$dm=date('H:i:s d.m.Y',filemtime($files['dir'].'/'.$row));
		
		$data3[]='<tr class="'.implode(' ',$cl).'">'.
					 '<td>'.$t_show.'</td>'.
					 '<td>'.output($row).'</td>'.
					 '<td>'.output($dm).'</td>'.
					 '<td>'.
						 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=delete_file&fln='.$files['dir'].'/'.$row.'" title="удалить" onclick="return confirm(\'Вы уверены, что хотите удалить файл?\');">&nbsp;XX&nbsp;</a>'.
					 '</td>'.
				 '</tr>';
		unset($cl);
	}
	

	$data1[]=         '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
						 '<col>'.
						 '<col width="500">'.
						 '<tr class="header">'.
							 '<td>show</td>'.
							 '<td>файлы описаний</td>'.
							 '<td>дата<br />изменения файла</td>'.
							 '<td>&nbsp;</td>'.
						 '</tr>'.
						 implode('',$data3).
					'</table>';
	unset($data3);
	
	if($pglist->pglist!=''){ $data1[]='<br />'.$pglist->pglist; }
	
	
?>
