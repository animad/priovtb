<?php

	session_start();


	include('../../files/vars/mysql.php');
	$err=parse_ini_file('../../pool/vars/errors.ini');

	
	include('../../files/functions/mysql.php');
	$link=connect();
	

	if(isset($_GET['fln']) && trim($_GET['fln'])!=''){
		if(isset($_SESSION['user'])){
			$fln1='../files/share/'.$_GET['fln'];
			if(file_exists($fln1) && filesize($fln1)){

				//--- ¤¥« ¥¬ § ―¨αμ Ά ‘’ ‘€—‚€
				$q='insert into `share_log` set
				    date=NOW(),
				    fln="'.addslashes(trim($_GET['fln'])).'",
				    client_id="'.$_SESSION['user']['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()<1){ $erm=16; }
				}else{ $erm=6; }
			}else{ $erm=15; }
		}else{ $erm=14; }
	}else{ $erm=1; }


	if(isset($erm)){
		$_SESSION['er']['erm']=$err[$erm];
		$_SESSION['er']['erno']=$erm;
		$_SESSION['er']['fln']=$_GET['fln'];
		Header('Location: /e_file_download.php');
	}else{

		//--- ®β¤ ¥¬ δ ©«
		$_baseFiles['zip']='application/octet-stream';
		$_baseFiles['rar']='application/octet-stream';
		$_baseFiles['txt']='text/plain';
		$_baseFiles['mp3']='audio/mpeg';
		$_baseFiles['pdf']='application/pdf';
		$_baseFiles['doc']='application/msword';
		$_baseFiles['xls']='application/vnd.ms-excel';	
	
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-Disposition: attachment; filename="'.basename($fln1).'"');
		header('Content-type: '.$_baseFiles[trim($tmp[1])]);
		header('Content-Length: '.filesize($fln1));
		header('Content-Transfer-Encoding: binary');
		readfile($fln1);

	}

	close($link);

?>
