<?php

	function connect(){
		global $globals;
		
		mysql_select_db ($globals['mysql']['db']) or die ("Could not select database");
		$res=mysql_query('set character set cp1251'); //cp1251_utf8
		return $link;
	}
	
	function close($link){
	}

?>