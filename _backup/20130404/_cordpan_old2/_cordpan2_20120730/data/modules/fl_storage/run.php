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
	
	$conv=new convert;
	
	if(!isset($_GET['m'])){ $_GET['m']=$mod->box[$_GET['dr']]['config']['default_section']; }
//	if(!isset($_SESSION['user']['status']) || trim($_SESSION['user']['status'])!='admin'){ $_GET['m']='secure_02'; } //---���� ����������� ������ ADMIN
	if(!isset($_SERVER['HTTP_REFERER'])){ $_GET['m']='secure_01'; } //---�� ��������� ������ �� ������ ������

	//--- �������� �����
	$ans=path_create($_modvars['place']['store']);
//	$ans=path_create($_modvars['place']['log']);

	//--- ������ ����� � ������
	$t=array('visibility','create_save','edit_save'); //--- ����� ������������ ������
	$t2=array('title','section');

	//--- ��������� �� ������������ �������
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){ $err_msg[$t[$i]]=err_show($_SESSION['er'][$t[$i]]['erm']); }else{ $err_msg[$t[$i]]=''; }
	}
	
	//--- ��������� ������ ��� ������ ������
	// $_modvars['btn'][<$_GET['m']>][]=array(<������ ������>,<��� ������>);
//	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create_ui','���������� ����');
	$_modvars['btn']['create_ui'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'�����');
	$_modvars['btn']['edit'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'�����');

	//--- ��������� ��������
	$data1[]='<h1>'.$mod->box[$_GET['dr']]['info']['title'].'</h1>';

	switch ($_GET['m']){
//--- ���������������� ������
//--- ��������� ---
		case 'start':
			
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
			$p=$_dir['site'].$_modvars['place']['store'];
			$d=dir($p);
			$j1=0;
			while(false!==($entry=$d->read())){
				$fln=$p.'/'.$entry;
				if(is_file($fln)){
					$q='select * from `'.$_modvars['mysql']['table'].'` where `fln`="'.trim($entry).'"';
					$res=mysql_query($q);
					if(mysql_errno()<1 && mysql_num_rows($res)){
						$ans1=mysql_num_rows($res);
					}else{ $ans1=0; }
					
					
					$data2[]='<tr'.colrow($j1++).'>'.
					             '<td>'.date('d.m.Y H:i:s',filemtime($fln)).'</td>'.
					             '<td>'.trim($entry).'</td>'.
					             '<td>'.$conv->bytes(filesize($fln),'b','mb').'</td>'.
					             '<td align="center">'.$ans1.'</td>'.
							 '</tr>';
				}
			}
			$d->close();
		
			if(isset($data2)){
				$data1[]='<p align="center">����� ����������� ����� FTP ������</p>'.
				         '<p align="center"><i>����� ������: '.$j1.'</i></p>'.
						 '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
							 '<tr class="header">'.
								 '<td>����</td>'.
								 '<td>����</td>'.
								 '<td>������</td>'.
								 '<td>������<br />���</td>'.
							 '</tr>'.implode('',$data2).
						 '</table>';
				unset($data2);
			}

			
		break;


		
		
//--- ��������� ---
		case 'create_save':
			if(isset($_FILES) && isset($_POST[$t2[0]]) && isset($_POST[$t2[1]])){
				if(trim($_POST[$t2[0]])!='' && trim($_POST[$t2[1]])!=''){

					//--- ���������� �����
					$ans=file_upload($_modvars['place']['store'],'file1');
					if($ans!==true){ $err=$ans; }
					if(!isset($err)){
						//--- ���������� ����
						$q='insert into `'.$_modvars['mysql']['table'].'` set
							`date`=NOW(),
							`file`="'.$_FILES['file1']['name'].'",
							`'.$t2[0].'`="'.addslashes(trim($_POST[$t2[0]])).'",
							`'.$t2[1].'`="'.addslashes(trim($_POST[$t2[1]])).'"';
						$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][4]; }
						}else{ $err=mysql_error(); }
					}
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }
			
			//--- ����������� �����
			if(isset($_POST['back'])){ $_SESSION['back']=trim($_POST['back']); }
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'visibility':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='update `'.$_modvars['mysql']['table'].'` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			//--- ����������� �����
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
			
			//--- ����������� �����
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
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
				
				//--- �������� ����
				if(isset($_POST[$t2[0]]) && isset($_POST[$t2[1]])){
					if(trim($_POST[$t2[0]])!='' && trim($_POST[$t2[1]])!=''){
						$q='update `'.$_modvars['mysql']['table'].'`
							set
							`'.$t2[0].'`="'.addslashes(trim($$t2[0])).'",
							`'.$t2[1].'`="'.addslashes(trim($$t2[1])).'"
							where `id`="'.trim($_POST['id']).'"';

							$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
						}else{ $err=mysql_error(); }
					}else{ $err=$_comvars['err'][2]; }
				}else{ $err=$_comvars['err'][1]; }
			}else{ $err=$_comvars['err'][1]; }
			
			//--- ����������� �����
			if(isset($_POST['back'])){ $_SESSION['back']=trim($_POST['back']); }
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
