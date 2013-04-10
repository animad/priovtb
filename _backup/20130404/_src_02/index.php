<?php
	
	session_start();
	
	global $gStore;
	
	//--- ��������� ����������
	$fln='files/vars/glovars.ini';
	$globals=parse_ini_file($fln,true);
	
	$globals['bankomats']=parse_ini_file('pool/vars/bankomats.ini',true);
	$globals['terminals']=parse_ini_file('pool/vars/terminals.ini',true);
	$globals['towns']=parse_ini_file('pool/vars/towns.ini',true);
	$globals['usl']=parse_ini_file('pool/vars/usl.ini',true);
	$globals['regions']=parse_ini_file('pool/vars/regions.ini',true);
	
	include('files/vars/glovars.php');
	include('files/vars/mysql.php');
	
	//--- �������� �� ���������
	if(!isset($_GET['dr'])){ $_GET['dr']=$globals['site']['default_page']; }

	//--- ��������� �������
	include('files/functions/tools.php');
	include('files/functions/users.php');
	include('files/functions/gps.php');
	
	include('files/functions/mysql.php');
	include('files/functions/news.php'); //--- ������ �������
	include('files/functions/date.php'); //--- ������ � �����
	include('files/functions/pglist.php'); //--- ��������� ������ ������ �� �������� + ��������� �������� �������
	include('files/functions/mmenu.php');
	include('files/functions/reg_uri.php'); //--- ���� �������� �������
	include('files/functions/parse_mmenu_js.php'); //--- ���� �������� �������
	include('files/functions/coord_list.php');
	include('files/functions/io.php');		//--- �����/����
	
	$link=connect();
	
	//--- ������������� ���������
	gps::init();
	
	//--- ������ ������������
	if(isset($_COOKIE['session_code'])){
		$user1=new users;
		$user1->find_sc($_COOKIE['session_code']);
		unset($user1->res['passw']); //--- �� ������ ������
		if($user1->res!=null){ $_SESSION['user']=$user1->res; }
	}

	if(isset($globals['skin'])){
		//--- �������� ������
		ob_start();
		include('files/skin/'.$globals['skin']['name'].'/tpl/main.html');
		$maindata=ob_get_contents();
		ob_end_clean();
	
		//--- �������� �����������
		ob_start();
		$fln='pool/docs/'.$_GET['dr'];
		if(file_exists($fln) && filesize($fln)){
			include($fln);
		}else{ print '<br /><br /><br /><br /><b>��������!</b> ���� �� ������.<br /><br /><br /><br />'; }
		$data['content']=ob_get_contents();
		ob_end_clean();

		//--- ������� �������� � �������
		$rpc[]=array('%charset%',$globals['site']['charset']);
		$rpc[]=array('%title%',$globals['site']['title']);
		$rpc[]=array('%doctype1%',$globals['site']['doctype1']);
		$rpc[]=array('%doctype2%',$globals['site']['doctype2']);
		$rpc[]=array('%meta%',$globals['site']['meta']);
		$rpc[]=array('%keywords%',$globals['site']['keywords']);
		$rpc[]=array('%description%',$globals['site']['description']);
		$rpc[]=array('%dr%',$_GET['dr']);
		$rpc[]=array('%content%',$data['content']);
		$rpc[]=array('%skin%',$globals['skin']['name']);
			
		for($i=0;$i<count($rpc);$i++){ $maindata=str_replace($rpc[$i][0],$rpc[$i][1],$maindata); }

		//--- ������� �� �����
		print $maindata;
	}else{
		print '��� �������';
	}
	
	//--- ���� �������� �������
	$ans=reg_uri();

	close($link);
?>
