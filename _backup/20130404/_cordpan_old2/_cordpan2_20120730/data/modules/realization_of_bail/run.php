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
	$ans=path_create($_modvars['place']['files']);
	$ans=path_create($_modvars['place']['pages']);
	$ans=path_create($_modvars['place']['images']);
	
	//--- ��������� ������ ��� ������ ������
	// $_modvars['btn'][<$_GET['m']>][]=array(<������ ������>,<��� ������>);
	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=templates','�������');
//	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=categories','��������� ���������');
	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail','��������� ���������');
	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=files','�����');

	$_modvars['btn']['templates'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=categories','��������� ���������');
	$_modvars['btn']['templates'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail','��������� ���������');
	$_modvars['btn']['templates'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=files','�����');

	$_modvars['btn']['categories'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=templates','�������');
	$_modvars['btn']['categories'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail','��������� ���������');
	$_modvars['btn']['categories'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=files','�����');

	$_modvars['btn']['bail'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=templates','�������');
	$_modvars['btn']['bail'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=categories','��������� ���������');
	$_modvars['btn']['bail'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=files','�����');

	$_modvars['btn']['files'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=templates','�������');
	$_modvars['btn']['files'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=categories','��������� ���������');
	$_modvars['btn']['files'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail','��������� ���������');

	$_modvars['btn']['category_edit'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'�����');
	$_modvars['btn']['categories_create'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'�����');


	//���������� ������
	$data1[]='<script type="text/javascript" src="'.$_dir['mod_scripts_http'].'/jquery.js"></script>';
	$data1[]='<script type="text/javascript" src="'.$_dir['mod_scripts_http'].'/script.js"></script>';
	//--- ��������� ��������
	$data1[]='<h1>'.$mod->box[$_GET['dr']]['info']['title'].'</h1>';
	//--- ��������� ������
	include($_dir['common_code'].'bl_top_btn.php');	
	
	switch ($_GET['m']){
//--- ���������������� ������
//--- ��������� ---
		case 'start':	//--- ��������� ������ 
		default:		//--- ������, ����������� � ��� ������ ���� ����������� �������� ������ �����������
		case 'categories':
			$data1[]='<p align="center"><b>��������� ���������</b></p>';
			
			$data1[]='<p align="center">'.
						 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=categories_create" class="hrf2">������� ����� ���������</a>'.
					 '</p>';
			
			//--- ���������� ������ ���������
			include($_dir['mod_func'].'/cat_list.inc');
			
			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }

		break;
		case 'categories_create':
			$data1[]='<p align="center"><b>��������� ���������</b></p>';
			$data1[]='<p align="center">�������� ����� ���������</p>';

			include($_dir['mod_func'].'/cat_create.inc');

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }

		break;
		case 'category_edit':
			$data1[]='<p align="center"><b>��������� ���������</b></p>';
			$data1[]='<p align="center">�������������� ���������</p>';

			include($_dir['mod_func'].'/cat_edit.inc');

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }

		break;
		case 'templates':
			$data1[]='<p align="center"><b>�������������� �������</b></p>';

			include($_dir['mod_func'].'/template_edit.inc');

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;
		
		case 'bail':
			$data1[]='<p align="center"><b>��������� ���������</b></p>';

			$data1[]='<p align="center">'.
						 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail_create" class="hrf2">�������� ���������</a>'.
					 '</p>';
			
			//--- ���������� ������ ���������
			include($_dir['mod_func'].'/bail_list.inc');


			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;
		case 'bail_create':
			$data1[]='<p align="center"><b>�������� ���������� �� ���������</b></p>';

			//--- ���������� ������ ���������
			include($_dir['mod_func'].'/bail_create.inc');


			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;
		
		case 'files':
			$data1[]='<p align="center"><b>���������� �������</b></p>';
			
			if (!isset($_GET['t'])){ $_GET['t']='pictures'; }
			switch ($_GET['t']){
				default:
				case 'pictures':
					$data1[]='<p align="center">'.
								 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&t=description" class="hrf2">����� �������� ���������</a>'.
							 '</p>';
					include($_dir['mod_func'].'/files_pictures.inc');
				break;
				case 'description':
					$data1[]='<p align="center">'.
								 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&t=pictures" class="hrf2">����� ��������</a>'.
							 '</p>';
					include($_dir['mod_func'].'/files_descriptions.inc');
				break;
			}

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;


		

		
		
//--- ��������� ---
		case 'categories_create_save':
			if (isset($_POST['title'])){
				if (''!=trim($_POST['title'])){
					$q='insert into `'.$_modvars['mysql']['table'].'`
					    (`on`,`date`,`type`,`title`)
					    values
					    ("1", NOW(),"cat","'.input($_POST['title']).'")';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_affected_rows()>0){
							$err='��������� �������';
						}else{ $err=$_comvars['err'][4]; }
					}else{ $err=mysql_error(); }
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }

			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			$_SESSION['back']=$_POST['back'];
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'category_update':
			if (isset($_POST['title']) && isset($_POST['pid'])){
				if (''!=trim($_POST['title']) && ''!=trim($_POST['pid'])){
					$q='update `'.$_modvars['mysql']['table'].'`
					    set `title`="'.input($_POST['title']).'"
					    where `id`="'.input($_POST['pid']).'"
					    limit 1';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_affected_rows()>0){
							$err='��������� ���������';
						}else{ $err=$_comvars['err'][4]; }
					}else{ $err=mysql_error(); }
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }

			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			$_SESSION['back']=$_POST['back'];
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'category_delete':
			if (isset($_GET['pid'])){
				$q='delete from `'.$_modvars['mysql']['table'].'` where `id`="'.input($_GET['pid']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()>0){
						$err='��������� �������';
					}else{ $err=$_comvars['err'][4]; }
				}else{ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][1]; }

			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'bail_delete':
			if (isset($_GET['pid'])){
				$q='delete from `'.$_modvars['mysql']['table'].'` where `id`="'.input($_GET['pid']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()>0){
						$fln='pool/docs/rp/'.$_GET['pid'].'.html';
						if (file_exists($fln) && filesize($fln)){
							$ans=unlink($fln);
							if ($ans){
								$err='��� ��������� ���������� �� ��������� �������';
							}else{ $err='��������� ���������� �� ��������� � ���� �������, �������� #'.$_GET['id'].' � ������� �� �������'; }
						}else{
							$err='��������� ���������� �� ��������� � ���� �������';
						}
					}else{ $err=$_comvars['err'][4]; }
				}else{ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][1]; }

			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			if (isset($_POST['back'])){ $_SESSION['back']=$_POST['back']; }
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;


		case 'template_update':

			$r=array('top','bottom');
			for ($i=0; $i<count($r); $i++){
				$v=$r[$i];
				if (isset($_POST['rp_text_'.$v]) && ''!=trim($_POST['rp_text_'.$v])){
					$fln='../pool/docs/realization_of_bail_'.$v.'-part.php';
					$fp=fopen($fln,'w');
					$ans=fwrite($fp,$_POST['rp_text_'.$v]);
					fclose($fp);
				}
			}
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			if (isset($_POST['back'])){ $_SESSION['back']=$_POST['back']; }
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
			if (isset($_POST['back'])){ $_SESSION['back']=$_POST['back']; }
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'visibility_file':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['fln']) && trim($_GET['fln'])!=''){
				if (file_exists(trim($_GET['fln'])) && filesize(trim($_GET['fln']))){
					$tmp=pathinfo(trim($_GET['fln']));
					switch(trim($_GET['v'])){
						case '1':
							if ('-'==$tmp['basename'][0]){
								$fln2=$tmp['dirname'].'/'.substr($tmp['basename'],1);
								$ans=rename( trim($_GET['fln']), $fln2);
								if (!$ans){ $err=''; }
							}else{ $err='��������������� ���� �� ����� ���� �������'; }
						break;
						case '0':
							if ('-'!=$tmp['basename'][0]){
								$fln2=$tmp['dirname'].'/-'.$tmp['basename'];
								$ans=rename( trim($_GET['fln']), $fln2);
							}else{ $err='��������������� ���� ��� ��������'; }
						break;
					}
				}else{ $err='����������� ���� �� ������'; }
			}else{ $err=$_comvars['err'][3]; }
			
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			if (isset($_POST['back'])){ $_SESSION['back']=$_POST['back']; }
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
