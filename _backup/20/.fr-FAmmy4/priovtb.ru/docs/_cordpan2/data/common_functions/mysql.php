<?php

	function connect($param=null){
		if($param!=null){
			$link=mysql_connect($param['host'],$param['user'],$param['passw']) or die ("Could not connect to MySQL");
			mysql_select_db ($param['db']) or die ("Could not select database");
			$res=mysql_query('set character set cp1251'); //cp1251_utf8
			return $link;
		}else{ return null; }
	}
	
	function close($link){		return mysql_close($link);
	}

?>
