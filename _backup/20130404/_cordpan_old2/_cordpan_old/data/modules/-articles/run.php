<?php

	//--- ���������� ������
//	$_glovars=vars_parse_batch($_dir['common_vars'],array('vars/global.vars'));
	//--- ����� ���������� �������
	$_comvars=vars_parse_batch($_dir['common_vars'],array('mysql.inc','globals.inc','dir.inc'));
	//--- ���������� ������
	$_modvars=vars_parse_batch($_dir['mod'],array('vars.inc'));


	include($_dir['mod'].'/atclist.php');
	include($_dir['mod'].'/f_create.php');
	include($_dir['mod'].'/f_save.php');
	include($_dir['mod'].'/f_drop.php');
	include($_dir['common_func'].'/mysql.php');
	include($_dir['common_func'].'/pglist.php');
	include($_dir['common_func'].'/fcc.php');

	if(!function_exists('var_add') || !function_exists('var_modif') || !function_exists('var_edit')){ include($_dir['root'].'/functions/f_vars.php'); }
	if(!function_exists('form_draw')){ include($_dir['mod'].'/f_form.php'); }
	if(!function_exists('delete') || !function_exists('hide')  || !function_exists('show')){ include($_dir['mod'].'/f_oper1.php'); }
	if(!function_exists('check_val')){ include($_dir['common_func'].'/check_val.php'); }
	
	//--- �������� ����������� ����
	$ans=fcc($_dir['site'].'/'.$_comvars['paths']['data'],'folder');


	if(!isset($_GET['m'])){ $_GET['m']='list'; }

	switch ($_GET['m']){
		case 'list':
			$data1=atclist();
		break;
		case 'add':
			$data1=form_draw();
		break;
		case 'edit':
			$data1=form_draw();
		break;
		case 'create':
			$v_exists=array('show','title','theme','section','overview');
			$v_empty=array('title','theme','section');
			if(check_val('_POST',$v_exists,$v_empty,null,null)){
				if(create($_POST['show'], $_POST['title'], $_POST['theme'], $_POST['section'], $_POST['overview'])){
					header('Location: '.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=list');
					exit();
				}
			}
			header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'hide':
			list($ans,$erm,$data2return)=hide();
			if(!$ans){ $_SESSION['er']=$data2return; }
			header('Location: '.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=list');
			exit();		break;
		case 'show':
			list($ans,$erm,$data2return)=show();
			if(!$ans){ $_SESSION['er']=$data2return; }
			header('Location: '.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=list');
			exit();		break;
		case 'drop':
			$ans=drop();
			header('Location: '.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=list');
			exit();
		break;
		case 'save':
			$v_exists=array('show','title','theme','section','overview');
			$v_empty=array('title','theme','section');
			if(check_val('_POST',$v_exists,$v_empty,null,null)){
				if(save($_POST['show'], $_POST['title'], $_POST['theme'], $_POST['section'], $_POST['overview'])){
					header('Location: '.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=list');
					exit();
				}
			}
			header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;	}
	if(isset($data1) && trim($data1)!=''){ print $data1; }else{ print '<div align="center">- ������ ���� -</div>'; }

?>
