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
	
	//--- ��������� �� ������������ �������
	$t=array('visibility','edit_save');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$err_msg['start']=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}

	//--- ��������� ������ ��� ������ ������
	// $_modvars['btn'][<$_GET['m']>][]=array(<������ ������>,<��� ������>);
	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create_ui','�������');
	$_modvars['btn']['create_ui'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'�����');
	$_modvars['btn']['edit'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'�����');

	//--- ��������� ��������
	$data1[]='<h1>'.$mod->box[$_GET['dr']]['info']['title'].'</h1>';

	switch ($_GET['m']){
//--- ���������������� ������
//--- ��������� ---
		case 'start':

			//--- ������� �������
			
			//--- ��������� ������
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}
	
			//--- �������� ��������������� ������
			$q='select * from `smi` order by `id` desc';
			$res=mysql_query($q);
			if(mysql_errno()>0){ $err=mysql_error(); }
			
			//--- ����� ������ ��� ��������������� ������
			if(isset($err)){
				$data1[]=err_show($err);
			}else{
				if(mysql_num_rows($res)>0){
					$j1=0;
					while($row=mysql_fetch_assoc($res)){
						if($row['on']==1){
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=0" class="hrf3" title="��������">����</a>';
						}else{
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=1" class="hrf3" title="��������">���</a>';
						}

						$data2[]='<tr '.colrow($j1++,$row['on']).' valign="top">'.
						             '<td>'.$row['id'].'</td>'.
									 '<td style="padding: 0;">'.$t_show.'</td>'.
						             '<td>'.date2str($row['date']).'</td>'.
						             '<td width="150">'.output($row['publicate']).'</td>'.
						             '<td width="150">'.output($row['title'],true,50).'</td>'.
						             '<td width="150">'.output($row['story'],true,50).'</td>'.
						             '<td style="padding: 0;"><a href="/pool/files/smi/'.stripslashes(trim($row['file'])).'" target="_blank" class="hrf3">'.output($row['file']).'</a></td>'.
						             '<td style="padding: 0;">'.
									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit&id='.$row['id'].'" title="edit" class="hrf5">��</a>'.
									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=delete&id='.$row['id'].'" title="delete" class="hrf5" onClick="return confirm(\'���������� � ��� �� '.date2str($row['date']).'.\r\n\r\n�������?\')">XX</a>'.
									 '</td>'.
								 '</tr>';
					}
					if(isset($data2)){
						$data1[]='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
						             '<tr class="header">'.
						                 '<td>#</td>'.
						                 '<td>show</td>'.
						                 '<td>����</td>'.
						                 '<td>����� ����������</td>'.
						                 '<td>���������</td>'.
						                 '<td>������� ��������</td>'.
						                 '<td>����</td>'.
						                 '<td>&nbsp;</td>'.
									 '</tr>'.implode('',$data2).
								 '</table>';
						unset($data2);
					}
				}
			}
			
			if(isset($err_msg)){ $data1[]=$err_msg; }
			
		break;
		case 'create_ui':
			$data1[]='<p align="center"><b>�������</b></p>';

			//--- ��������� ������
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}
			
			$t1=array('create_save');
			$t2=array('date','title','story','publicate');
			if(isset($_SESSION['er'][$t[1]])){
				while(list($key,$val)=each($t2)){
					$$val=isset($_SESSION['er'][$t[1]][$val])?$_SESSION['er'][$t[1]][$val]:'';
				}
			}else{
				while(list($key,$val)=each($t2)){ $$val=''; }
				$date=date('Y-m-d');
			}

			if(isset($err)){
				$data1[]=err_show($err);
			}else{
				$j1=0;
				$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create_save" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center" width="700px">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">����</td>'.
									 '<td align="left"><input style="width: 100%" type="text" name="date" value="'.$date.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td valign="top" width="150">����� ����������</td>'.
									 '<td align="left"><textarea style="width: 100%; height: 100px;" name="publicate">'.$publicate.'</textarea></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">���������</td>'.
									 '<td align="left"><input style="width: 100%" type="text" name="title" value="'.$title.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td valign="top" width="150">������� ��������</td>'.
									 '<td align="left"><textarea style="width: 100%; height: 100px;" name="story">'.$story.'</textarea></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" valign="top" width="150">����</td>'.
									 '<td align="left"><input type="file" name="file" style="width: 100%;"></td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><i>��������. ����� ������ ������������ ����� �� ������ ��������� 2 ��.</i></p>'.
							 '<p align="center"><input type="submit" value="��"></p>'.
						 '</form>';
			}


			
		break;
		
		case 'edit':
			$data1[]='<p align="center"><b>�������������</b></p>';

			//--- ��������� ������
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}

			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				//--- ��������� �� ������������ �������
//				$t=array('save');
				for($i=0;$i<count($t);$i++){
					if(isset($_SESSION['er'][$t[$i]]['erm'])){
						$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
					}
				}

			$t1=array('edit_save');
			$t2=array('date','title','story','publicate');
				if(isset($_SESSION['er'][$t[1]])){
					while(list($key,$val)=each($t2)){
						$$val=isset($_SESSION['er'][$t[1]][$val])?stripslashes(trim($_SESSION['er'][$t[1]][$val])):'';
					}
				}else{
					$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.$_GET['id'].'" limit 1';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_num_rows($res)>0){
							$row=mysql_fetch_assoc($res);
							while(list($key,$val)=each($t2)){ $$val=isset($row[$val])?stripslashes(trim($row[$val])):''; }
							
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
				$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit_save" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="id" value="'.trim($_GET['id']).'">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center" width="700px">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">����</td>'.
									 '<td align="left"><input style="width: 100%" type="text" name="date" value="'.$date.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td valign="top" width="150">����� ����������</td>'.
									 '<td align="left"><textarea style="width: 100%; height: 100px;" name="publicate">'.$publicate.'</textarea></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">���������</td>'.
									 '<td align="left"><input style="width: 100%" type="text" name="title" value="'.$title.'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td valign="top" width="150">������� ��������</td>'.
									 '<td align="left"><textarea style="width: 100%; height: 100px;" name="story">'.$story.'</textarea></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td align="left" width="150">����</td>'.
									 '<td align="left" style="padding: 0;">'.
									     '<table border="0" cellspacing="0" cellpadding="5" width="100%">'.
										     '<td><a href="/pool/files/smi/'.stripslashes(trim($row['file'])).'" target="_blank" title="������ ����" class="hrf3">'.output($row['file']).'</a></td>'.
										     '<td><input type="file" name="file" style="width: 100%;"></td>'.
										 '</table>'.
									 '</td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><input type="submit" value="��"></p>'.
						 '</form>';
			}
		break;
		
		

		
		
//--- ��������� ---
		case 'create_save':
			//--- ���������� ���� + �������� ����
			if(isset($_POST['title']) && isset($_POST['date']) && isset($_POST['publicate']) && isset($_POST['story'])){
				if(trim($_POST['title'])!='' && trim($_POST['date'])!='' && trim($_POST['publicate'])!='' && trim($_POST['story'])!=''){
					$q='insert into `'.$_modvars['mysql']['table'].'` set
					    `date`="'.trim($_POST['date']).'",
						`title`="'.addslashes(input($_POST['title'])).'",
						`publicate`="'.addslashes(input($_POST['publicate'])).'",
						`story`="'.addslashes(input($_POST['story'])).'"'.
						(isset($_FILES['file']) && trim($_FILES['file']['name'])!=''?',`file`="'.addslashes(($_FILES['file']['name'])).'"':'');
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_affected_rows()>0){

							//--- ����������� �����
							if(trim($_FILES['file']['name'])!=''){
								if($_FILES['file']['error']<1){
									if($_FILES['file']['size']<'1500000'){
										$ud=$_modvars['place']['store'];
										if(isset($ud) && trim($ud!='')){
											file_upload($ud);
										}else{ $err='������� �������� �� ���������'; }
									}else{ $err='������ ����� ��������� ���������� �������'; }
								}else{ $err='���� �� ��������'; }
							}else{ $err=$_comvars['err'][2]; }

						}else{ $err=$_comvars['err'][4]; }
					}else{ $err=mysql_error(); }
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }
			
			if(isset($_POST['back'])){ $_SESSION['back']=trim($_POST['back']); }
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}else{ unset($_SESSION['er']); }
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
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
			}else{ unset($_SESSION['er']); }
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'delete':
			//--- �������� ���� + ����
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_GET['id']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()>0){
						$row=mysql_fetch_assoc($res);
						$fln=$_dir['site'].$_modvars['place']['store'].'/'.stripslashes(trim($row['file']));
						if(file_exists($fln) && is_writable($fln)){
							unlink($fln);
						}else{ $err=$_comvars['err'][10]; }
					}else{ $err=$_comvars['err'][9]; }
						
					if(!isset($err)){
						$q='delete from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_GET['id']).'"';
						$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][9]; }
						}else{ $err=mysql_error(); }
					}
				}
			}
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}else{ unset($_SESSION['er']); }
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'edit_save':
			if(isset($_POST['id']) && trim($_POST['id'])!=''){
				$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_POST['id']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_num_rows($res)>0){
						$row=mysql_fetch_assoc($res);
					}else{ $err=$_comvars['err'][7]; }
				}else{ $err=mysql_error(); }

				//--- ����������� �����
				if(!isset($err)){
					if(trim($_FILES['file']['name'])!=''){
						if($_FILES['file']['error']<1){
							if($_FILES['file']['size']<'1500000'){
								$ud=$_modvars['place']['store'];
								if(isset($ud) && trim($ud!='')){
									file_upload($ud);
								}else{ $err='������� �������� �� ���������'; }
							}else{ $err='������ ����� ��������� ���������� �������'; }
						}else{ $err='���� �� ��������'; }
					}
				}
				
				

				//--- �������� ���� + ����
				if(isset($_POST['title']) && isset($_POST['date']) && isset($_POST['publicate']) && isset($_POST['story'])){
					if(trim($_POST['title'])!='' && trim($_POST['date'])!='' && trim($_POST['publicate'])!='' && trim($_POST['story'])!=''){
						$q='update `'.$_modvars['mysql']['table'].'`
							set
							`title`="'.addslashes(trim($_POST['title'])).'",
							`date`="'.addslashes(trim($_POST['date'])).'",
							`publicate`="'.addslashes(trim($_POST['publicate'])).'",
							`story`="'.addslashes(trim($_POST['story'])).'"'.
							(trim($_FILES['file']['name'])!=''?',`file`="'.trim($_FILES['file']['name']).'" ':'').
							'where `id`="'.trim($_POST['id']).'"';
						$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
						}else{ $err=mysql_error(); }
					}else{ $err=$_comvars['err'][2]; }
				}else{ $err=$_comvars['err'][1]; }
			}else{ $err=$_comvars['err'][1]; }
			
			if(isset($_POST['back'])){ $_SESSION['back']=trim($_POST['back']); }
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
				$_SESSION['er'][$_GET['m']]['q']=$q;
			}else{ unset($_SESSION['er']); }
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		
		

//--- ��������� ������
		case 'secure_01': //--- ������ �� ������ ������
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
			exit();
		break;
		case 'secure_02': //--- ����������� ������ ADMIN - ���� ���� �����������
			$data1='<p align="center">- ������ ������ ��������������� -</p>';
		break;
		default: //--- ��������-��������� ������
			$data1[]='<p align="center">- WELCOME screen -</p>';
		break;
	}
	
	//--- �������� ��������� ����������
	if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
	if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
	
	//--- ����� ���������� ������
	if(isset($data1)){ print (is_array($data1)?implode('',$data1):$data1); }

	close($link);
	
?>
