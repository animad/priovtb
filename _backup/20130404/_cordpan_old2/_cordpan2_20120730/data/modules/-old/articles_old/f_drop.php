<?php
	function drop(){
		global $_comvars,$mod;
		
		$link=connect($_comvars['mysql']);

		$q='select * from `docs` where `on`="0"';
		$res=mysql_query($q);
		print mysql_error();
		if(mysql_errno()<1 && mysql_num_rows($res)>0){
			while($row=mysql_fetch_assoc($res)){
				$q='delete from `label2doc` where `did`="'.$row['id'].'"';
				$res1=mysql_query($q);
				print mysql_error();
				
				$q='delete from `docs` where `id`="'.$row['id'].'"';
				$res1=mysql_query($q);
				print mysql_error();
			}
		}

		close($link);
	}
?>
