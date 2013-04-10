<?php
	
	include('../functions/mysql.php');
	include('../vars/mysql.php');
	
	$link=connect();
	
	$q='select * from `news_old` order by `id` asc';
	$res=mysql_query($q);
	if(mysql_errno()<1 && mysql_num_rows($res)>0){
		while($row=mysql_fetch_assoc($res)){
			
			$q1='insert into `news` set
			     `date`="'.trim($row['ndata']).'",
			     `title`="'.trim($row['title']).'",
			     `preview`="'.trim($row['prev']).'"';
			$res1=mysql_query($q1);
			
			$id=mysql_insert_id();
			
			$fln='../../pool/docs/news/'.$id.'.html';
			$fp=fopen($fln,'w');
			$ans=fwrite($fp,trim($row['story']));
			fclose($fp);
			
			chmod($fln, 0777);
			
			print '<pre>';
			print_r($id);
			print '</pre>';
			
		}
		
	}
	
	
	close();
	
	
?>
