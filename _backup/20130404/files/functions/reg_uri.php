<?php
// $Id$

/**
 * сохраняет историю посещений по страницам
 */
function reg_uri(){
	$q='insert into `reg_uri` set
	    `date`=CURDATE(),
		`time`=CURTIME(),
		`uri`="'.$_SERVER['REQUEST_URI'].'",
		`page`="'.$_GET['dr'].'",
		`ip`="'.$_SERVER['REMOTE_ADDR'].'",
		`memory`="'.memory_get_usage().'"';
	$res=mysql_query($q);
	print mysql_error();
	if(mysql_errno()<1 && mysql_affected_rows()>0){ $ans=true; }else{ $ans=false; }
	
	return $ans;
}

function get_uri($_arg=null){
	if (!isset($_arg['limit'])){ $_arg['limit']=20; }
	if (isset($_arg['limit'])){ $sql_limit=' limit '.$_arg['limit']; }

	$q='select `page`,count(*) as pwr from `reg_uri` where `page`!="" group by `page` order by `pwr` desc'.$sql_limit;
//	$q='select `page`,count(*) as pwr from `reg_uri` where `page`!="" group by `page` order by `pwr` desc';
	$res=mysql_query($q);
	print mysql_error();
	if (!mysql_errno() && mysql_num_rows($res)){
		while($row=mysql_fetch_assoc($res)){ $data[trim($row['page'])]=$row['pwr']; }
	}
	
	return isset($data)?$data:null;
}
 
?>