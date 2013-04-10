<?php
	
	$j1=0;

	//--- сообщения об отработанных ошибках
	$t=array('visibility_file');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}

	
	//--- получаем список файлов каталога с картинками
	$files['dir']=$_modvars['place']['images'];
	$d = dir($files['dir']);
	while (false !== ($entry = $d->read())) {
		if (is_file($_modvars['place']['images'].'/'.$entry)){
			$files['list'][]=$entry;
		}
	}
	$d->close();

	$pglist=new pageList;
	$pglist->get($files['list'],$_comvars['pglist']['lines_pp'],$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),$_comvars['pglist']['pages_pp'],'desc');

	if($pglist->pglist!=''){ $data1[]=$pglist->pglist.'<br />'; }
	
	reset($pglist->list);
	$i=0;
	while(list($key,$row)=each($pglist->list)){
		if('-'!=substr($row,0,1)){
			$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_file&fln='.$files['dir'].'/'.$row.'&v=0" class="hrf3"
title="выключить">выкл</a>';
			$cl2['show']='';
		}else{
			$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_file&fln='.$files['dir'].'/'.$row.'&v=1" class="hrf3" title="включить">вкл</a>';
			$cl2['show']='off';
		}
		$cl[]=(($i++)%2?'even':'odd').(''!=trim($cl2['show'])?'_'.$cl2['show']:'');

		$data3[]='<tr class="'.implode(' ',$cl).'">'.
					 '<td>'.$t_show.'</td>'.
					 '<td>'.output($row).'</td>'.
					 '<td>'.
						 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=category_delete&pid='.$row['id'].'" title="удалить" onclick="return confirm(\'Вы уверены, что хотите удалить категорию?\');">&nbsp;XX&nbsp;</a>'.
					 '</td>'.
				 '</tr>';
		unset($cl);
	}
	$data1[]=         '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
						 '<tr class="header">'.
							 '<td>show</td>'.
							 '<td>файл</td>'.
							 '<td>&nbsp;</td>'.
						 '</tr>'.
						 implode('',$data3).
					'</table>';
	unset($data3);
	
	if($pglist->pglist!=''){ $data1[]='<br />'.$pglist->pglist; }
	
	
?>
