<?php

	$ftp_server='127.0.0.1';
	$ftp_user_name='animad';
	$ftp_user_pass='';
	
	function f_connect($ftp_server=null,$ftp_user_name=null,$ftp_user_pass=null){
		if($ftp_server!==null && $ftp_user_name!==null && $ftp_user_pass!==null){			$conn_id=ftp_connect($ftp_server);
			if($conn_id){
				$login_result=ftp_login($conn_id,$ftp_user_name,$ftp_user_pass);
				if($login_result){ 
					return array($conn_id,'Connected to the '.$ftp_server);
				}else{					ftp_close($con_id);
					return array(null,'Cannot login to the '.$ftp_server);
				}
			}else{ return array(null,'Cannot connect to the '.$ftp_server); }
		}else{ array(null,'Some connecting parametr are absent'); }
	}

	function f_close($conn_id){		ftp_close($conn_id);
	}
	
	function f_file_info($fln_remote=null,$fln_local=null){		
	}
	
	
	list($ftp_link,$ftp_link_mes)=f_connect($ftp_server,$ftp_user_name,$ftp_user_pass);
	$data=ftp_nlist($ftp_link,'/');

	print '<pre>';
	var_export($data);
	print '</pre>';

	f_close($ftp_link);

?>