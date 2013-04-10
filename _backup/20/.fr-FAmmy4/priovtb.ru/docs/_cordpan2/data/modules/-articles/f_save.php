<?php
	function save($show,$title,$theme,$section,$overview){
		global $_comvars,$mod;

		if(isset($_POST['id'])){
		
			$link=connect($_comvars['mysql']);

			$q='select * from `docs` where `id`="'.$_POST['id'].'"';
			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){

				$q='update `docs` set
				   `on`="'.$show.'",
				   `title`="'.addslashes(trim($title)).'",
				   `overview`="'.addslashes(trim($overview)).'"
				   where `id`="'.$_POST['id'].'"';
				$res=mysql_query($q);
				print mysql_error();
			
				$q='delete from `label2doc` where `did`="'.$_POST['id'].'"';
				$res=mysql_query($q);
				print mysql_error();
			
				$q='insert into `label2doc` set
				   `did`="'.$_POST['id'].'",
				   `lid`="'.$theme.'"';
				$res=mysql_query($q);
				print mysql_error();

				$q='insert into `label2doc` set
				   `did`="'.$_POST['id'].'",
				   `lid`="'.$section.'"';
				$res=mysql_query($q);
				print mysql_error();

				return true;
			}

			$_SESSION['er']['msg']='Ссылка не найдена. Информация не сохранена';

			close($link);
		}else{
			$_SESSION['er']['msg']='Отсутствует указатель на изменяемую ссылку';
		}
		
		$_SESSION['er']['show']=$show;
		$_SESSION['er']['title']=$title;
		$_SESSION['er']['theme']=$theme;
		$_SESSION['er']['section']=$section;
		$_SESSION['er']['overview']=$overview;
		if(isset($_GET['m'])){ $_SESSION['er']['dest1']=$_GET['m']; }
		if(isset($_POST['dest2'])){ $_SESSION['er']['dest2']=$_POST['dest2']; }
		if(isset($_POST['id'])){ $_SESSION['er']['id']=$_POST['id']; }
		return false;
	}
 
	
?>
