<?php
	function hide(){
		if(isset($_GET['id']) && $_GET['id']!=null){
			global $_comvars;
			$link=connect($_comvars['mysql']);

			$q='update `docs` set `on`="0" where `id`="'.$_GET['id'].'"';
			$res=mysql_query($q);
			if(mysql_errno()>0){
				return array(false,'������ '.mysql_error(),null);
			}else{ return array(true,null,null); }

			close($link);
		}else{ return array(false,'����������� ��������� �����������',null); }
	}

	function show(){
		if(isset($_GET['id']) && $_GET['id']!=null){
			global $_comvars;
			$link=connect($_comvars['mysql']);

			$q='update `docs` set `on`="1" where `id`="'.$_GET['id'].'"';
			$res=mysql_query($q);
			if(mysql_errno()>0){
				return array(false,'������ '.mysql_error(),null);
			}else{ return array(true,null,null); }

			close($link);
		}else{ return array(false,'����������� ��������� �����������',null); }
	}



?>
