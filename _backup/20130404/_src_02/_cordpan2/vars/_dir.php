<?php
	$_dir['root']=getcwd().'/'; //������ ������

	chdir('..');
	$_dir['site']=getcwd().'/'; //������ �����
	$_dir['tmp']=$_dir['root'].'tmp/'; //��������� ������� ������

	chdir($_dir['root']);
	$_dir['common_func']=$_dir['root'].'data/common_functions/'; //����� ������� ������
	$_dir['common_vars']=$_dir['root'].'data/common_vars/'; //����� ���������� ������
	$_dir['common_code']=$_dir['root'].'data/common_code/'; //����� ������� ���� ������
	$_dir['modplace_http']='data/modules/'; //������� �� HTTP ��� ������������ ������� ������
	$_dir['modplace']=$_dir['root'].$_dir['modplace_http']; //������� ��� ������������ ������� ������
	$_dir['users']=$_dir['root'].'data/users/'; //������������ ������

	$_dir['func']=$_dir['root'].'functions/'; //����� ������� ������

	$_dir['site_prefix']=''; //������� ������
	$_dir['site_postfix']=''; //�������� �����
//	$_dir['site_postfix']='/imho';

?>
