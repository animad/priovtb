<?php

/**
 * выборка КУРСОВ
 **/

	function get_kurs(){
		$q='select * from `exchange_r` where `on`="1" order by `date` desc limit 1';
		$res=mysql_query($q);
		print mysql_error();
		if(mysql_errno()<1 && mysql_num_rows($res)>0){
			$row=mysql_fetch_assoc($res);
		}
		return (isset($row)?$row:null);
	}

?>