<?php
	session_start();

	//--- ��������� ����������
	$fln='files/vars/glovars.ini';
	$globals=parse_ini_file($fln,true);
	@include('files/vars/glovars.php');
	@include('files/vars/mysql.php');

	//--- ��������� �������
	@include('files/functions/mysql.php');

	if(isset($globals['skin'])){

		//--- ������� ����� �� �����
		ob_start();
		include('files/skin/'.$globals['skin']['name'].'/tpl/blank.html');
		$maindata=ob_get_contents();
		ob_end_clean();

		if($_POST['action']=='save'){
			
			$link=connect();
			
			//--- ��������� �������� � ��
			$q='insert into `maillist`
			    set `date`=NOW(),
				`usermail`="'.addslashes($_POST['usermail']).'",
				`fam`="'.addslashes($_POST['fam']).'",
				`im`="'.addslashes($_POST['im']).'",
				`ot`="'.addslashes($_POST['ot']).'"';
			$res=mysql_query($q);
			
			if(mysql_errno()<1 && mysql_affected_rows()){
				//--- ������� � �������� ������
				$headers  = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/html; charset=windows-1251\r\n";
				$headers .= "From: listmanager@priovtb.ru\r\n";
				$title ="�������� ���������";
				$alltext="������� ��� ����������� �� ������� ���������.<br>���� ������ ���������� �� ��������, �� �������� listmanager@priovtb.ru.";
				$title ='=?koi8-r?B?'.base64_encode(convert_cyr_string($title , "w","k")).'?=';	
				@mail($_POST['usermail'],$title,$alltext,$headers);

				//--- �������� �����������
				ob_start();
				print '<h2 style="color: #ffffff; text-align: center; font-size: 14px; padding-top: 15px; height: 30px">������� �������</h1>';
				print '<div align="center" style="margin-top: 20px">�� �����������<br />�� ������� ����-�������������</div>';
				print '<div style="margin-top: 20px; text-align: center;"><a href="#" onClick="window.close(); return false;" class="hrf1">�������</a></div>';
				$data['content']=ob_get_contents();
				ob_end_clean();
			}else{
				//--- �������� �����������
				ob_start();
				print '<h2 style="color: #ffffff; text-align: center; font-size: 14px; padding-top: 15px; height: 30px">��������</h1>';
				print '<div align="center" style="margin-top: 20px">������ �������� �� ��������. ���������� �����.</div>';
				print '<div style="margin-top: 20px; text-align: center;"><a href="#" onClick="window.close(); return false;" class="hrf1">�������</a></div>';
				$data['content']=ob_get_contents();
				ob_end_clean();
			}
			
			close($link);
			
		}else{
			$t='usermail';
			$$t=isset($_GET[$t])?trim($_GET[$t]):'';
			
			//--- �������� �����������
			ob_start();
			$fln='pool/docs/get_mail_adr.php';
			if(file_exists($fln) && filesize($fln)){
				include($fln);
			}else{ print '<br /><br /><br /><br /><b>��������!</b> ���� �� ������.<br /><br /><br /><br />'; }
			$data['content']=ob_get_contents();
			ob_end_clean();
		}
		
		//--- ������� �������� � �������
		$rpc[]=array('%skin%',$globals['skin']['name']);
		$rpc[]=array('%charset%',$globals['site']['charset']);
		$rpc[]=array('%title%',$globals['site']['title']);
		$rpc[]=array('%doctype1%',$globals['site']['doctype1']);
		$rpc[]=array('%doctype2%',$globals['site']['doctype2']);
		$rpc[]=array('%meta%',$globals['site']['meta']);
		$rpc[]=array('%keywords%',$globals['site']['keywords']);
		$rpc[]=array('%description%',$globals['site']['description']);
		$rpc[]=array('%dr%',$_GET['dr']);
		$rpc[]=array('%content%',$data['content']);
			
		for($i=0;$i<count($rpc);$i++){ $maindata=str_replace($rpc[$i][0],$rpc[$i][1],$maindata); }

		//--- ������� �� �����
		print $maindata;
		
	}else{
		print '��� �������';
	}
?>