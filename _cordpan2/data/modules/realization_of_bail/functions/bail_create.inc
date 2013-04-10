<?php
	$j1=0;
	
	
	//--- сообщения об отработанных ошибках
	$t=array('bail_update','bail_create');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}

	$v1=array('show'=>'0','parent'=>'','title'=>'','text'=>'','descr_f'=>'');
	if(isset($_SESSION['er'][$t[0]])){
		while(list($key,$val)=each($v1)){
			$v[$key]=isset($_SESSION['er'][$t[0]][$key]) && trim($_SESSION['er'][$t[0]][$key])!=''?trim($_SESSION['er'][$t[0]][$key]):'';
		}
	}else{
		if (isset($_GET['pid']) && ''!=trim($_GET['pid'])){
			$q='select * from `rp_list` where `id`="'.input($_GET['pid']).'" limit 1';
			$res=mysql_query($q);
			print mysql_error();
			$j1=0;
			if (mysql_errno()<1 && mysql_num_rows($res)>0){
				while ($row=mysql_fetch_assoc($res)){
					$v['show']=$row['on'];
					$v['title']=output($row['title']);
					$v['parent']=output($row['parent']);
					$v['text']='';
					$v['descr_f']=(''!=$row['filename']?output($row['filename']):'');
				}
			}
		}
		
		if (!isset($v)){
			while (list($key,$val)=each($v1)){
				$v[$key]=$val;
			}
		}
	}
	
	//--- получаем список файлов каталога с файлами описаний
	$files['dir']=$_modvars['place']['files'];
	$d = dir($files['dir']);
	$i=0;
	while (false !== ($entry = $d->read())) {
		if (is_file($_modvars['place']['files'].'/'.$entry) && '-'!=substr($entry,-1)){
			$t=date('YmdHis',filemtime($_modvars['place']['files'].'/'.$entry)).sprintf('%05d',$i++);
			$files['list'][$t]=$entry;
		}
	}
	$d->close();
	krsort($files['list']);
	$rp_df_list[]='<option value="">---</option>';
	while (list($key,$val)=each($files['list'])){
		$rp_df_list[]='<option value="'.$val.'"'.(''!=$v['descr_f'] && $val==$v['descr_f']?' selected':'').'>'.$val.'</option>';
	}
	if (isset($rp_df_list)){
		$rp_df_list='Выберите файл: '.
					'<select name="descr_f">'.
						implode('',$rp_df_list).
					'</select>';
	}else{
		$rp_df_list=err_show('Файлы не найдены');
	}
	
	//--- получаем список категорий
	$q='select * from `rp_list` where `type`="cat" order by `order` asc, `id` asc';
	$res=mysql_query($q);
	print mysql_error();
	if (mysql_errno()<1 && mysql_num_rows($res)>0){
		while ($row=mysql_fetch_assoc($res)){
			$cat_list[]='<option value="'.$row['id'].'"'.($row['id']==$v['parent']?' selected':'').'>'.output($row['title']).'</option>';
		}
	}
	if (isset($cat_list)){
		$cat_list='<select name="parent">'.
					  '<option>---</option>'.
					  implode('',$cat_list).
				  '</select>';
	}else{ $cat_list=err_show('Список категорий не задан'); }
	
	//--- загружаем файт с текстом имущества
	if (isset($_GET['pid']) && ''!=trim($_GET['pid']) && ''==trim($v['text'])){
		$fln=$_modvars['place']['pages'].'/'.trim($_GET['pid']).'.html';
		if(file_exists($fln) && filesize($fln)){
			$fp=fopen($fln,'a+');
			$bail_text=fread($fp,filesize($fln));
			fclose($fp);
		}else{ $bail_text=''; }
	}else{ $bail_text=$v['text']; }
	
	//--- определяем, какой РЕДАКТОР выводить
	if(isset($_modvars['use_external_editorHTML']) && $_modvars['use_external_editorHTML'] && isset($mod->tools['editorHTML']['uId'])){
		$k=1;
		$editor[$k]['jsinit']='<script type="text/javascript">'.$mod->tools['editorHTML']['js']['init']['minimal'].'</script>';
		$editor[$k]['html']=$mod->tools['editorHTML']['html']['textarea'];
		$editor[$k]['r']['sz_height']='300px';
		$editor[$k]['r']['sz_width']='500px';
		$editor[$k]['r']['work_element']='bail_text';
		$editor[$k]['r']['css_body']='';
		$editor[$k]['r']['work_text']=$bail_text;

		//--- производим замены переменных
		reset($editor);
		while(list($key1,$val1)=each($editor)){
			while(list($key,$val)=each($val1['r'])){
				$editor[$key1]['jsinit']=str_replace('%'.$key.'%',$val,$editor[$key1]['jsinit']);
				$editor[$key1]['html']=str_replace('%'.$key.'%',$val,$editor[$key1]['html']);
			}
		}
	
		$val_1_editor_init=$mod->tools['editorHTML']['js']['load'].$editor[1]['jsinit'];
		$val_1_editor=$editor[1]['html'];

	}else{
		$val_1_editor_init='';
		$val_1_editor='<textarea style="width: 500px" type="text" name="bail_text">'.$bail_text.'</textarea>';
	}

	$bail_text_editor[]=$val_1_editor_init;
	$bail_text_editor[]=$val_1_editor;
	
	$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail_update" method="post" class="bail_form" style="padding: 0;">'.
				 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				 (isset($_GET['pid']) && ''!=trim($_GET['pid'])?'<input type="hidden" name="pid" value="'.trim($_GET['pid']).'">':'').
				 
	             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
				     '<tr class="'.(($j1++)%2?'even':'odd').'">'.
				     	'<td>Отображать клиентам</td>'.
				     	'<td>'.
				     		'<select name="show">'.
				     			'<option value="1"'.(1==$v['show']?' selected':'').'>Да</option>'.
				     			'<option value="0"'.(0==$v['show']?' selected':'').'>Нет</option>'.
				     		'</select>'.
				     	'</td>'.
				     '</tr>'.
				     '<tr class="'.(($j1++)%2?'even':'odd').'">'.
				     	'<td>Категория для размещения</td>'.
				     	'<td>'.$cat_list.'</td>'.
				     '</tr>'.
				     '<tr class="'.(($j1++)%2?'even':'odd').'">'.
				     	'<td>Название объекта</td>'.
				     	'<td><input type="text" name="title" value="'.$v['title'].'"></td>'.
				     '</tr>'.
				     '<tr class="'.(($j1++)%2?'even':'odd').'">'.
				     	'<td>Содержание</td>'.
				     	'<td>'.
				     		'<select name="bail_content_type">'.
				     			'<option'.(''==$v['descr_f']?' selected':'').' value="text">Текст</option>'.
				     			'<option'.(''!=$v['descr_f']?' selected':'').' value="file">Подключенный файл</option>'.
				     		'</select>'.
				     		'<div class="bail_content file" style="display: none;">'.$rp_df_list.'</div>'.
				     		'<div class="bail_content text" style="display: none;">'.implode('',$bail_text_editor).'</div>'.
				     	'</td>'.
				     '</tr>'.
				 '</table>'.
	
				 '<p align="center"><input type="submit" value="Ок"></p>'.
			 '</form>';

?>
