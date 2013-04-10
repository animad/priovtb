<?php

	function connect(){
		global $globals;
				$link=mysql_connect($globals['mysql']['host'],$globals['mysql']['user'],$globals['mysql']['passw']) or die ("Could not connect to MySQL");
		mysql_select_db ($globals['mysql']['db']) or die ("Could not select database");
		$res=mysql_query('set character set cp1251'); //cp1251_utf8
		return $link;
	}
	
	function close($link){		return mysql_close($link);
	}

?>
