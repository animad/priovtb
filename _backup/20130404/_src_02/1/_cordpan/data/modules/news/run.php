<?php

	//--- ���������� ������
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ����� ���������� �������
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc','mysql.inc','err.inc','globals.inc'));
	//--- ���������� ������
	$_modvars=vars_parse_batch($_dir['mod'],array('vars.inc'));
	
	if($mod->box[$_GET['dr']]['func']){
		while(list($key,$val)=each($mod->box[$_GET['dr']]['func'])){
			eval('$val='.$val.';');
			if(file_exists($val) && filesize($val)){ include($val); }
		}
	}
	$link=connect($_comvars['mysql']);
	
	if(!isset($_GET['m'])){ $_GET['m']=$mod->box[$_GET['dr']]['config']['default_section']; }
//	if(!isset($_SESSION['user']['status']) || trim($_SESSION['user']['status'])!='admin'){ $_GET['m']='secure_02'; } //---���� ����������� ������ ADMIN
	if(!isset($_SERVER['HTTP_REFERER'])){ $_GET['m']='secure_01'; } //---�� ��������� ������ �� ������ ������

	//--- �������� �����
	$ans=path_create($_modvars['place']['store']);
	$ans=path_create($_modvars['place']['log']);
	
	//--- ��������� ��������
	$data1[]='<h1>�������</h1>';
	
	//---
	$data_ilist=list_img('pool/images');
	$fln=$_dir['site'].'pool/vars/image_list.js';
	$fp=fopen($fln, 'w+');
	$ans=fwrite ($fp, $data_ilist);
	fclose ($fp);
	@chmod($fln, 0777);
	unset($data_ilist);

	switch ($_GET['m']){
//--- ���������������� ������
//--- ��������� ---
		case 'start':
			//--- ��������� �� ������������ �������
			$t=array('visibility','delete');
			for($i=0;$i<count($t);$i++){
				if(isset($_SESSION['er'][$t[$i]]['erm'])){
					$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
				}
			}

			//--- ������� �������
			$t=array('create');
			$t2=array('date','title','preview','text');
			if(isset($_SESSION['er'][$t[0]])){
				while(list($key,$val)=each($t2)){
					$$val=isset($_SESSION['er'][$t[0]][$val])?$_SESSION['er'][$t[0]][$val]:'';
				}
			}else{
				while(list($key,$val)=each($t2)){ $$val=''; }
				$date=date('Y-m-d H:i:s');
			}
			$j1=0;
			
			//--- ����������, ����� �������� ��������
			if(isset($_modvars['use_external_editorHTML']) && $_modvars['use_external_editorHTML'] && isset($mod->tools['editorHTML']['uId'])){
				$k=1;
				$editor[$k]['jsinit']='<script type="text/javascript">'.$mod->tools['editorHTML']['js']['init']['minimal'].'</script>'.
				                      $mod->tools['editorHTML']['js']['load_pics'];
				$editor[$k]['html']=$mod->tools['editorHTML']['html']['textarea'];
				$editor[$k]['r']['sz_height']='200px';
				$editor[$k]['r']['sz_width']='500px';
				$editor[$k]['r']['work_element']='text';
				$editor[$k]['r']['css_body']='';
				$editor[$k]['r']['work_text']=$text;

				//--- ���������� ������ ����������
				reset($editor);
				while(list($key1,$val1)=each($editor)){
					while(list($key,$val)=each($val1['r'])){
						$editor[$key1]['jsinit']=str_replace('%'.$key.'%',$val,$editor[$key1]['jsinit']);
						$editor[$key1]['html']=str_replace('%'.$key.'%',$val,$editor[$key1]['html']);
					}
				}
			
				$val_editor_init=$mod->tools['editorHTML']['js']['load'].$editor[1]['jsinit'];
				$val_editor=$editor[1]['html'];
			}else{
				$val_editor_init='';
				$val_editor='<textarea style="width: 500px" type="text" name="text">'.$text.'</textarea>';
			}
			
			$data1[]='<p align="center"><b>������� �������</b></p>';
			$data1[]=$val_editor_init;
			$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create" method="post" style="padding: 0;">'.
			             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
							 '<tr'.colrow($j1++).'>'.
								 '<td align="left" width="150">����</td>'.
								 '<td align="left"><input style="width: 500px" type="text" name="date" value="'.$date.'"></td>'.
							 '</tr>'.
							 '<tr'.colrow($j1++).'>'.
								 '<td align="left" width="150">���������</td>'.
								 '<td align="left"><input style="width: 500px" type="text" name="title" value="'.$title.'"></td>'.
							 '</tr>'.
							 '<tr'.colrow($j1++).'>'.
								 '<td align="left" width="150">������� ����������</td>'.
								 '<td align="left"><input style="width: 500px" type="text" name="preview" value="'.$preview.'"></td>'.
							 '</tr>'.
							 '<tr'.colrow($j1++).'>'.
								 '<td align="left" valign="top" width="150">������ �����</td>'.
								 '<td align="left">'.$val_editor.'</td>'.
							 '</tr>'.
						 '</table>'.
						 '<p align="center"><input type="submit" value="��"></p>'.
					 '</form>';

			//--- ������ ��������
			$q='select * from `news` order by `date` desc, `id` desc';
			$res=mysql_query($q);
			print mysql_error();
			$j1=0;
			if(mysql_errno()<1){
				if(mysql_num_rows($res)>0){
					
					$pglist=new pageList;
					$pglist->get($res,$_comvars['pglist']['lines_pp'],$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),$_comvars['pglist']['pages_pp'],'desc');
				
					$data1[]='<p align="center"><b>����������� �������</b></p>';
					
					if($pglist->pglist!=''){ $data1[]=$pglist->pglist.'<br />'; }
					
					reset($pglist->list);
					while(list($key,$row)=each($pglist->list)){
						//--- ������ ������������
						if(true){
							$tool='<div style="position: relative; line-height: 20px; width: 350px; text-align: right; margin: 0 auto;">'.
											 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=delete&id='.$row['id'].'" class="hrf1" title="�������" onClick="return confirm(\'������� �� '.date2str($row['date']).' \r\n\r\n�������?\')">x</a>'.
											 '<div style="position: absolute; top: 0; left: 0; padding: 0;">'.
												 ($row['on']==1?'<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&v=0&id='.$row['id'].'" class="hrf1" title="��� / ����">����</a>':
												                '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&v=1&id='.$row['id'].'" class="hrf1" title="��� / ����">���</a>').
												 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit&id='.$row['id'].'" class="hrf1" title="�������� ������">��������</a>'.
											 '</div>'.
										 '</div>';
						}else{ $tool=''; }
						
						//--- �������� ������
						$fln=$_dir['site'].$_modvars['place']['store'].'/'.$row['id'].'.html';
						if(file_exists($fln) && filesize($fln)){
							$fp=fopen($fln,'a+');
							$row['text']=fread($fp,filesize($fln));
						}else{ $row['text']=''; }
						
						$data1[]='<div style="position: relative; padding: 10px 0; left: 0; width: 100%; text-align: center;">'.
									 '<div'.($row['on']==0?' class="off"':'').'>'.
										 $tool.
										 '<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1" width="800">'.
											 '<tr'.colrow($j1++).'>'.
												 '<td align="left" width="150">����</td>'.
												 '<td align="left">'.date2str($row['date'],2).'</td>'.
											 '</tr>'.
											 '<tr'.colrow($j1++).'>'.
												 '<td align="left" width="150">���������</td>'.
												 '<td align="left">'.output($row['title']).'</td>'.
											 '</tr>'.
											 '<tr'.colrow($j1++).'>'.
												 '<td align="left" width="150">������� ����������</td>'.
												 '<td align="left">'.output($row['preview']).'</td>'.
											 '</tr>'.
											 '<tr'.colrow($j1++).'>'.
												 '<td align="left" valign="top" width="150">������ �����<br /><i>(������������ <=200&nbsp;������)</i></td>'.
												 '<td align="left">'.pr($row['text'],true,200).'</td>'.
											 '</tr>'.
										 '</table>'.
									 '</div>'.
								 '</div>';
					}
					if($pglist->pglist!=''){ $data1[]='<br />'.$pglist->pglist; }
				}//else{ $err=$_comvars['err'][6]; }
			}else{ $err=$_comvars['err'][5]; }
			
			if(isset($err)){
				$data1[]=err_show($err);
				unset($err);
			}elseif(isset($data2)){
				$data1[]='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.implode('',$data2).'</table>';
				unset($data2);
			}

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }

		break;
		case 'edit':
			$data1[]='<p align="center"><b>������������� �������</b></p>';
			$data1[]='<p align="center"><a href="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'" class="hrf2">�����</a></p>';

			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				//--- ��������� �� ������������ �������
				$t=array('save');
				for($i=0;$i<count($t);$i++){
					if(isset($_SESSION['er'][$t[$i]]['erm'])){
						$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
					}
				}

				$t=array('save');
				$t2=array('date','title','preview','text');
				if(isset($_SESSION['er'][$t[0]])){
					while(list($key,$val)=each($t2)){
						$$val=isset($_SESSION['er'][$t[0]][$val])?$_SESSION['er'][$t[0]][$val]:'';
					}
				}else{
					$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.$_GET['id'].'" limit 1';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_num_rows($res)>0){
							$row=mysql_fetch_assoc($res);
							while(list($key,$val)=each($t2)){ $$val=isset($row[$val])?trim($row[$val]):''; }
							
							$fln=$_dir['site'].$_modvars['place']['store'].'/'.$_GET['id'].'.html';
							if(file_exists($fln) && filesize($fln)){
								$fp=fopen($fln,'a+');
								$text=fread($fp,filesize($fln));
								fclose($fp);
							}else{ $text=''; }
							
						}else{ $err=$_comvars['err'][7]; }
					}else{ $err=$_comvars['err'][11]; }
				}
			}else{ $err=$_comvars['err'][1]; }

			if(isset($err)){
				$data1[]=err_show($err);
			}else{

				//--- ����������, ����� �������� ��������
				if(isset($_modvars['use_external_editorHTML']) && $_modvars['use_external_editorHTML'] && isset($mod->tools['editorHTML']['uId'])){
					$k=1;
					$editor[$k]['jsinit']='<script type="text/javascript">'.$mod->tools['editorHTML']['js']['init']['minimal'].'</script>';
					$editor[$k]['html']=$mod->tools['editorHTML']['html']['textarea'];
					$editor[$k]['r']['sz_height']='200px';
					$editor[$k]['r']['sz_width']='500px';
					$editor[$k]['r']['work_element']='text';
					$editor[$k]['r']['css_body']='';
					$editor[$k]['r']['work_text']=nl2br($text);

					//--- ���������� ������ ����������
					reset($editor);
					while(list($key1,$val1)=each($editor)){
						while(list($key,$val)=each($val1['r'])){
							$editor[$key1]['jsinit']=str_replace('%'.$key.'%',$val,$editor[$key1]['jsinit']);
							$editor[$key1]['html']=str_replace('%'.$key.'%',$val,$editor[$key1]['html']);
						}
					}
				
					$val_editor_init=$mod->tools['editorHTML']['js']['load'].$editor[1]['jsinit'];
					$val_editor=$editor[1]['html'];
				}else{
					$val_editor_init='';
					$val_editor='<textarea style="width: 500px" type="text" name="text">'.$text.'</textarea>';
				}

				$data1[]=$val_editor_init;
				
				$j1=0;
				$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=save" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="id" value="'.$_GET['id'].'">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">����</td>'.
									 '<td align="left"><input style="width: 500px" type="text" name="date" value="'.$date.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">���������</td>'.
									 '<td align="left"><input style="width: 500px" type="text" name="title" value="'.$title.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">������� ����������</td>'.
									 '<td align="left"><input style="width: 500px" type="text" name="preview" value="'.$preview.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" valign="top" width="150">������ �����</td>'.
									 '<td align="left">'.$val_editor.'</td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><input type="submit" value="��"></p>'.
						 '</form>';
			}

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;
		
		

		
		
//--- ��������� ---
		case 'create':
			//--- ���������� ���� + ����
			if(isset($_POST['title']) && isset($_POST['date']) && isset($_POST['preview']) && isset($_POST['text'])){
				if(trim($_POST['title'])!='' && trim($_POST['date'])!='' && trim($_POST['preview'])!='' && trim($_POST['text'])!=''){
					$q='insert into `'.$_modvars['mysql']['table'].'` set
					    `date`="'.trim($_POST['date']).'",
						`title`="'.input($_POST['title']).'",
						`preview`="'.input($_POST['preview']).'"';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_affected_rows()>0){
							$fln=$_dir['site'].$_modvars['place']['store'].'/'.mysql_insert_id().'.html';
							$fp=fopen($fln,'a+');
							fwrite($fp,trim($_POST['text']));
							fclose($fp);
						}else{ $err=$_comvars['err'][4]; }
					}else{ $err=mysql_error(); }
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'visibility':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='update `'.$_modvars['mysql']['table'].'` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'delete':
			//--- �������� ���� + ����
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='delete from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_GET['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()>0){
						$fln=$_dir['site'].$_modvars['place']['store'].'/'.$_GET['id'].'.html';
						if(file_exists($fln) && is_writable($fln)){
							unlink($fln);
						}else{ $err=$_comvars['err'][10]; }
					}else{ $err=$_comvars['err'][9]; }
				}else{ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'save':
			//--- �������� ���� + ����
			if(isset($_POST['id']) && trim($_POST['id'])!=''){
				$q='update `'.$_modvars['mysql']['table'].'`
					set
					`title`="'.trim($_POST['title']).'",
					`date`="'.trim($_POST['date']).'",
					`preview`="'.trim($_POST['preview']).'"
					where `id`="'.trim($_POST['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					$fln=$_dir['site'].$_modvars['place']['store'].'/'.trim($_POST['id']).'.html';
					$fp=fopen($fln,'w');
					fwrite($fp,trim($_POST['text']));
					fclose($fp);
				}else{ $err=mysql_error(); }
				
				$_SESSION['back']=$_POST['back'];
			}else{ $err=$_comvars['err'][1]; }

			if(isset($erm)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		
		

//--- ��������� ������
		case 'secure_01': //--- ������ �� ������ ������
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
		break;
		case 'secure_02': //--- ����������� ������ ADMIN
			$data1='<p align="center">- ������ ������ ��������������� -</p>';
		break;
		default: //��������� ������ �� ���������
			print '<p align="center">- WELCOME screen -</p>';
		break;
	}
	if(isset($data1)){ print (is_array($data1)?implode('',$data1):$data1); }

	close($link);
	
?>
