<?php
	
	$r=array('top','bottom');
	for ($i=0; $i<count($r); $i++){
		$v=$r[$i];
		$rp_text[$v]['name']='../pool/docs/realization_of_bail_'.$v.'-part.php';
		if(file_exists($rp_text[$v]['name']) && filesize($rp_text[$v]['name'])){
			$fp=fopen($rp_text[$v]['name'],'a+');
			$rp_text[$v]['text']=fread($fp,filesize($rp_text[$v]['name']));
			fclose($fp);
		}else{ $rp_text[$v]['text']=''; }
	}

	
	
	//--- определяем, какой РЕДАКТОР выводить
	if(isset($_modvars['use_external_editorHTML']) && $_modvars['use_external_editorHTML'] && isset($mod->tools['editorHTML']['uId'])){
		$k=1;
		$editor[$k]['jsinit']='<script type="text/javascript">'.$mod->tools['editorHTML']['js']['init']['minimal'].'</script>';
		$editor[$k]['html']=$mod->tools['editorHTML']['html']['textarea'];
		$editor[$k]['r']['sz_height']='300px';
		$editor[$k]['r']['sz_width']='700px';
		$editor[$k]['r']['work_element']='rp_text_top';
		$editor[$k]['r']['css_body']='';
		$editor[$k]['r']['work_text']=$rp_text['top']['text'];

		$k=2;
		$editor[$k]['jsinit']='<script type="text/javascript">'.$mod->tools['editorHTML']['js']['init']['minimal'].'</script>';
		$editor[$k]['html']=$mod->tools['editorHTML']['html']['textarea'];
		$editor[$k]['r']['sz_height']='300px';
		$editor[$k]['r']['sz_width']='700px';
		$editor[$k]['r']['work_element']='rp_text_bottom';
		$editor[$k]['r']['css_body']='';
		$editor[$k]['r']['work_text']=$rp_text['bottom']['text'];

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

		$val_2_editor_init=$mod->tools['editorHTML']['js']['load'].$editor[2]['jsinit'];
		$val_2_editor=$editor[2]['html'];

	}else{
		$val_1_editor_init='';
		$val_1_editor='<textarea style="width: 500px" type="text" name="rp_text_top">'.$rp_text['top']['text'].'</textarea>';

		$val_2_editor_init='';
		$val_2_editor='<textarea style="width: 500px" type="text" name="rp_text_bottom">'.$rp_text['bottom']['text'].'</textarea>';
	}

	$data1[]=$val_1_editor_init;
	$data1[]=$val_2_editor_init;
	
	$j1=0;
	$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=template_update" method="post" style="padding: 0;">'.
				 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
	             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
					 '<tr'.colrow($j1++).'>'.
						 '<td align="left" valign="top" width="150">Текст шаблона<br />ДО списка</td>'.
						 '<td align="left">'.$val_1_editor.'</td>'.
					 '</tr>'.
					 '<tr'.colrow($j1++).'>'.
						 '<td align="left" valign="top" width="150">Текст шаблона<br />ПОСЛЕ списка</td>'.
						 '<td align="left">'.$val_2_editor.'</td>'.
					 '</tr>'.
				 '</table>'.
				 '<p align="center"><input type="submit" value="Ок"></p>'.
			 '</form>';

?>
