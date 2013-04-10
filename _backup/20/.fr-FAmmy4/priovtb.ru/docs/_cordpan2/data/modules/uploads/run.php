<?php

	//--- переменные ПАНЕЛИ
	$fln1=$_dir['site'].'/vars/global.vars';
	if(file_exists($fln1) && filesize($fln1)){
		$_glovars=vars_parse($fln1);
	}else{ $_glovars=null; }

	//--- переменные МОДУЛЯ
	$fln1=$_dir['mod'].'/vars.inc';
	if(file_exists($fln1) && filesize($fln1)){		$_modvars=vars_parse($fln1);
	}else{ $_modvars=null; }

	if(!function_exists('browse_list')){ include($_dir['mod'].'/f_browse.php'); }
	if(!function_exists('fav_dir')){ include($_dir['mod'].'/f_fav_dir.php'); }
	if(!function_exists('file_upload')){ include($_dir['root'].'/functions/f_upload.php'); }
	if(!function_exists('file_del')){ include($_dir['root'].'/functions/f_unlink.php'); }
	if(!function_exists('var_add') || !function_exists('var_modif') || !function_exists('var_edit')){ include($_dir['root'].'/functions/f_vars.php'); }

	if(!isset($_GET['m'])){ $_GET['m']='browse'; }

	switch ($_GET['m']){
		case 'browse':
			$data2=browse_list();
			
			ob_start();
			include($_dir['mod'].'/js_func.php');
			$jsFunc="\r\n<script><!--\r\n".ob_get_contents()."\r\n//-->\r\n</script>";
			ob_end_clean();

			$data1=$jsFunc.$data2;

		break;
		case 'upload':
			if($_FILES['file1']['error']==0){
				if(isset($_POST['uploaddir']) && trim($_POST['uploaddir'])!=''){					$ans=file_upload($_POST['uploaddir']);
					$ok=true;
				}else{ $erm='Каталог загрузки не определен'; }
			}else{ $erm='Файл не загружен'; }
			if(!isset($ok)){				$_SESSION['er']['upload']['message']=$erm;			}
			header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'del':
			if(isset($_GET['fln'])){				if(file_del($_GET['fln'])){
					$ok=true;
				}else{
					$erm='Не могу удалить';
				}
			}else{ $erm='Параметры отсутствуют'; }
			if(!isset($ok)){
				$_SESSION['er']['upload']['message']=$erm;
			}
			header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'fav_dir':
			if(isset($_GET['cdir']) && isset($_GET['cdir_title'])){
				$ans=fav_dir('add',trim($_GET['cdir']),trim($_GET['cdir_title']));
			}
			header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'fav_dir_del':
			if(isset($_GET['cdir'])){
				$ans=fav_dir('del',trim($_GET['cdir']),trim($_GET['cdir_title']));
			}
			header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'mkdir':
			if(isset($_GET['cdir']) && isset($_GET['new_dir'])){
				$fln=$_dir['site'].trim($_GET['cdir']).'/'.trim($_GET['new_dir']);
				if(!mkdir($fln, 0777)){ $_SESSION['er']['upload']['message']='Каталог не создан'; }
			}
			header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
	}
	print $data1;

?>
