<?php

	//--- ���������� ������
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ����� ���������� �������
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc','mysql.inc'));
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
/*	if(isset($_modvars['place']) && count($_modvars['place'])>0){
		reset($_modvars['place']);
		while(list($key,$val)=each($_modvars['place'])){
			$ans=path_create($_modvars['place'][$key]);
		}
	}*/
	
	switch ($_GET['m']){
//--- ���������������� ������
		case 'start':
			
		break;
	

//--- ��������� ������
		case 'secure_01': //--- ������ �� ������ ������
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
		break;
		case 'secure_02': //--- ����������� ������ ADMIN
			$data1='<p align="center">- ������ ������ ��������������� -</p>';
		break;
		default: //��������� ������
			print '<p align="center">- WELCOME screen -</p>';
		break;
	}
	if(isset($data1)){ print (is_array($data1)?implode('',$data1):$data1); }

	close($link);
	
?>
