<?php

	if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
		$q='update `'.$_modvars['mysql']['table'].'` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
		$res=mysql_query($q);
		if(mysql_errno()>0){ $err=mysql_error(); }
	}else{ $err=$_comvars['err'][3]; }

?>