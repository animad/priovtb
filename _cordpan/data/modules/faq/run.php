<?php

	//--- ���������� ������
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ����� ���������� �������
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc','mysql.inc','err.inc'));
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
	$data1[]='<h1>'.$mod->box[$_GET['dr']]['info']['title'].'</h1>';
	//--- ��������� �� ������������ �������
	$t=array('visibility','delete','theme_change','delete_theme');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}

	switch ($_GET['m']){
//--- ���������������� ������
//--- ��������� ---
		case 'start':

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

			//--- �������������� ����
			if(isset($_GET['theme_id']) && trim($_GET['theme_id'])!=''){

				//--- ����������� ����� ��������-�������
				$data2='';
				$j1=0;
				$q='select * from `faq_question` where `theme`="'.trim($_GET['theme_id']).'" order by `id` desc';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_num_rows($res)>0){
						while($row=mysql_fetch_assoc($res)){
							if($row['on']==1){
								$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_question&id='.$row['id'].'&v=0" class="hrf2" title="��������">����</a>';
							}else{
								$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_question&id='.$row['id'].'&v=1" class="hrf3" title="��������">���</a>';
							}
							$data2[]='<tr'.colrow($j1++,$row['on']).'>'.
										 '<td style="vertical-align: top; width: 20px;">'.$row['id'].'</td>'.
										 '<td style="padding: 0; vertical-align: top; text-align: left;">'.$t_show.'</td>'.
							             '<td><textarea name="question['.$row['id'].']" style="width: 270px; height: 50px;">'.stripslashes(trim($row['question'])).'</textarea></td>'.
							             '<td><textarea name="answer['.$row['id'].']" style="width: 270px; height: 50px;">'.stripslashes(trim($row['answer'])).'</textarea></td>'.
										 '<td style="padding: 0; vertical-align: top;">'.
										     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=qa_delete&id='.$row['id'].'" class="hrf4" title="�������" onClick="return confirm(\'������� ������-����� �'.$row['id'].'?\')?true:false;">XX</a>'.
										 '</td>'.
									 '</tr>';
						}
						$data2='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=qa_change" method="post">'.
						       '<p align="center"><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=qa_add&theme_id='.trim($_GET['theme_id']).'" class="hrf2">�������� ������ ������-�����</a></p>'.
						       '<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1" style="width: 730px; background-color: white;">'.
						           '<tr class="header">'.
								       '<td>#</td>'.
								       '<td>show</td>'.
								       '<td>������</td>'.
								       '<td>�����</td>'.
								       '<td>&nbsp;</td>'.
								   '</tr>'.
							       implode('',$data2).
							   '</table>'.
							   '<p align="center"><input type="submit" value="��"></p>'.
							   '</form>';
					}else{ $data2='<p align="center">- �������-������ ��� ���� �� ������ -</p>'; }
				}else{ $err=mysql_error(); }

				//--- ����������� ����
				$q='select * from `faq_theme` where `id`="'.trim($_GET['theme_id']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_num_rows($res)>0){
						$j1=0;
						$row=mysql_fetch_assoc($res);
						if(true){
							$tool='<div style="position: relative; line-height: 20px; width: 350px; text-align: right;">'.
									 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=delete_theme&id='.$row['id'].'" class="hrf1" title="�������" onClick="return confirm(\'���� ������ &quot;'.output($row['theme']).'&quot; \r\n\r\n������� � ��������� � ��������?\')">x</a>'.
									 '<div style="position: absolute; top: 0; left: 0; padding: 0;">'.
										 ($row['on']==1?'<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_theme&v=0&id='.$row['id'].'" class="hrf1" title="��� / ����">����</a>':
														'<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_theme&v=1&id='.$row['id'].'" class="hrf1" title="��� / ����">���</a>').
									 '</div>'.
								 '</div>';
						}else{ $tool=''; }
						
						$data1[]='<div style="position: relative; padding: 10px 0; left: 0; width: 100%; background-color: #DBF5D6; text-align: center;">'.
									 '<p align="center"><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'" class="hrf2">������� ������������� ������</a></p>'.
									 '<div'.($row['on']==0?' class="off"':'').'>'.
										 $tool.
										 '<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=theme_change" method="post" style="padding: 0; margin: 0;">'.
											 '<input type="hidden" name="id" value="'.$row['id'].'">'.
											 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
											 '<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1" width="700px">'.
											     '<tr class="header"><td>����</td></tr>'.
												 '<tr '.colrow($j1++).'>'.
													 '<td align="center"><input style="width: 670px" type="text" name="theme" value="'.trim($row['theme']).'"></td>'.
												 '</tr>'.
											 '</table>'.
											 '<p align="center"><input type="submit" value="��"></p>'.
										 '</form>'.
									 $data2.
									 (isset($_SESSION['er']['qa_add']['erm'])?err_show($_SESSION['er']['qa_add']['erm']):'').
									 '</div>'.
								 '</div>';
					}else{ $err=$_comvars['err'][6]; }
				}else{ $err=mysql_error(); }
			}
			unset($data2);



			//--- ������ ��� ��� �������
			$j1=0;
			$q='select * from `faq_theme` order by `id` desc';
			$res=mysql_query($q);
			if(mysql_errno()<1){
				if(mysql_num_rows($res)>0){
					while($row=mysql_fetch_assoc($res)){
						if($row['on']==1){
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_theme&id='.$row['id'].'&v=0" class="hrf3" title="��������">����</a>';
						}else{
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility_theme&id='.$row['id'].'&v=1" class="hrf3" title="��������">���</a>';
						}
						$data2[]='<tr '.colrow($j1++,$row['on']).'>'.
						             '<td align="center">'.$row['id'].'</td>'.
						             '<td style="padding: 0;">'.$t_show.'</td>'.
						             '<td style="padding: 0;"><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&theme_id='.$row['id'].'" class="hrf3">'.(trim($row['theme'])!=''?output($row['theme']):'&nbsp;').'</a></td>'.
								 '</tr>';
					}
					if(isset($data2)){
						$data1[]='<p align="center"><b>���� �������</b></p>';
						$data1[]='<p align="center">'.
						             '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=theme_add" class="hrf2">����� ����</a>'.
								 '</p>';
						$data1[]='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.implode('',$data2).'</table>';
						unset($data2);
					}
				}else{ $err=$_comvars['err'][6]; }
			}else{ $err=mysql_error(); }
			
			
			
			if(isset($err)){
				$data1[]=err_show($err);
				unset($err);
			}elseif(isset($data2)){
				$data1[]='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.implode('',$data2).'</table>';
				unset($data2);
			}
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
				$j1=0;
				$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=save" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="id" value="'.$_GET['id'].'">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center" width="700px">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">����</td>'.
									 '<td align="left"><input style="width: 100%" type="text" name="date" value="'.$date.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">���������</td>'.
									 '<td align="left"><input style="width: 100%" type="text" name="title" value="'.$title.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">������� ����������</td>'.
									 '<td align="left"><input style="width: 100%" type="text" name="preview" value="'.$preview.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" valign="top" width="150">������ �����</td>'.
									 '<td align="left"><textarea style="width: 100%" type="text" name="text">'.$text.'</textarea></td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><input type="submit" value="��"></p>'.
						 '</form>';
			}
		break;
		
		

		
		
//--- ��������� ---
		case 'create':
			//--- ���������� ���� + ����
			if(isset($_POST['title']) && isset($_POST['date']) && isset($_POST['preview']) && isset($_POST['text'])){
				if(trim($_POST['title'])!='' && trim($_POST['date'])!='' && trim($_POST['preview'])!='' && trim($_POST['text'])!=''){
					$q='insert into `'.$_modvars['mysql']['table'].'` set
					    `date`="'.trim($_POST['date']).'",
						`title`="'.addslashes(input($_POST['title'])).'",
						`preview`="'.addslashes(trim($_POST['preview'])).'"';
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
			exit();
		break;
		case 'visibility_theme':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='update `'.$_modvars['mysql']['table_theme'].'` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'visibility_question':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='update `'.$_modvars['mysql']['table_question'].'` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
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
			exit();
		break;
		case 'delete_theme':
			//--- �������� ����
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='delete from `'.$_modvars['mysql']['table_theme'].'` where `id`="'.trim($_GET['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()>0){
						$q='delete from `'.$_modvars['mysql']['table_question'].'` where `theme`="'.trim($_GET['id']).'"';
						$res=mysql_query($q);
						if(mysql_errno()>0){ $err=mysql_error(); }
					}else{ $err=$_comvars['err'][9]; }
				}else{ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr']);
			exit();
		break;
		case 'theme_change':
			//--- �������� ����
			if(isset($_POST['id']) && trim($_POST['id'])!=''){
				$q='update `'.$_modvars['mysql']['table_theme'].'`
					set `theme`="'.addslashes(trim($_POST['theme'])).'"
					where `id`="'.trim($_POST['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
				}else{ $err=mysql_error(); }
				
				$_SESSION['back']=$_POST['back'];
			}else{ $err=$_comvars['err'][1]; }

			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'theme_add':
			//--- ��������� ������ ���� ��� ������-����� - ����
			$q='insert into `'.$_modvars['mysql']['table_theme'].'` set `theme`="***"';
			$res=mysql_query($q);
			if(mysql_errno()<1){
				if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
			}else{ $err=mysql_error(); }

			$_SESSION['back']=$_POST['back'];
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'qa_change':
			//--- �������� ����
			if(isset($_POST['question']) && count($_POST['question'])>0){
				$v1=array('question','answer');
				for($i=0;$i<count($v1);$i++){
					while(list($key,$val)=each($_POST[$v1[$i]])){
						$q='update `'.$_modvars['mysql']['table_question'].'`
							set `'.$v1[$i].'`="'.addslashes(trim($_POST[$v1[$i]][$key])).'"
							where `id`="'.trim($key).'"';
						$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
						}else{ $err=mysql_error(); }
					}
				}
				$_SESSION['back']=$_POST['back'];
			}else{ $err=$_comvars['err'][1]; }

			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'qa_add':
			//--- ��������� ������ ������-����� - ����
			if(isset($_GET['theme_id']) && trim($_GET['theme_id'])!=''){
				$q='insert into `'.$_modvars['mysql']['table_question'].'`
					set `theme`="'.trim($_GET['theme_id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
				}else{ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][1]; }
			$_SESSION['back']=$_POST['back'];

			if(isset($err)){
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'qa_delete':
			//--- ������� ������-����� - ����
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='delete from `'.$_modvars['mysql']['table_question'].'` where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
				}else{ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][1]; }
			$_SESSION['back']=$_POST['back'];

			if(isset($err)){
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'save':
			//--- �������� ���� + ����
			if(isset($_POST['id']) && trim($_POST['id'])!=''){
				$q='update `'.$_modvars['mysql']['table'].'`
					set
					`title`="'.addslashes(trim($_POST['title'])).'",
					`date`="'.addslashes(trim($_POST['date'])).'",
					`preview`="'.addslashes(trim($_POST['preview'])).'"
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

			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		
		

//--- ��������� ������
		case 'secure_01': //--- ������ �� ������ ������
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
			exit();
		break;
		case 'secure_02': //--- ����������� ������ ADMIN
			$data1='<p align="center">- ������ ������ ��������������� -</p>';
		break;
		default: //��������� ������ �� ���������
			$data1[]='<p align="center">- WELCOME screen -</p>';
		break;
	}
	
	if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
	if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
	if(isset($data1)){ print (is_array($data1)?implode('',$data1):$data1); }

	close($link);
	
?>
