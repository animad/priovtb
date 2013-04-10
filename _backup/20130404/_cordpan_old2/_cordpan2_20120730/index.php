<?php
	session_name('cordpan');
	session_start();
	
	//--- загружаем переменные
	include('vars/_dir.php');
	$_globals=parse_ini_file('vars/global.ini',true);

	//--- подключаем функции
	include('functions/tools.inc');
	include('functions/units_parse.php');
	include('functions/units_collect.php');

	include('functions/module_scan.php');
	include('functions/users.php');
	include('functions/io.php');
	include('functions/date.php');
	include('functions/err.php');

	$mod=new module();
	$mod->scan();
	$data_modlist=$mod->mmenu_create();
	
	//--- значения по умолчанию
	if(false && !isset($_GET['dr'])){
		reset($mod->box);
		$_GET['dr']=key($mod->box);
	}
	
	if(isset($_GET['dr'])){
		//--- загружаем переменные
		include('vars/_dir_mod.php');
	}
	if(isset($_GET['logout'])){		user_forget();
		header('Location: '.$_SERVER['PHP_SELF']);
	}


	//--- узнаем пользователя
	if(isset($_SESSION['user']['uid'])){ user_store($_SESSION['user']['uid']); }
	if(isset($_COOCKIE['user_id'])){ user_store($_COOCKIE['user_id']); }

	if(!isset($_SESSION['user'])){		$data=$mod->cmd_line_cr(null,true);
		ob_start();
		include('data/skin/standart/login.php');
		$data.=ob_get_contents();
		ob_end_clean();
	}else{		if(isset($_GET['dr']) && isset($mod->box[$_GET['dr']])){			$mod->cmd_line_cr($_GET['dr']);
			$data='';

			if(isset($mod->box[$_GET['dr']]['run']['execute']) && file_exists($_dir['modplace'].$mod->box[$_GET['dr']]['run']['place'].'/'.$mod->box[$_GET['dr']]['run']['execute']) && filesize($_dir['modplace'].$mod->box[$_GET['dr']]['run']['place'].'/'.$mod->box[$_GET['dr']]['run']['execute'])){				ob_start();
				$t=$_dir['modplace'].$mod->box[$_GET['dr']]['run']['place'].'/'.$mod->box[$_GET['dr']]['run']['execute'];
				include($t);
				
				$data2=ob_get_contents();
				ob_end_clean();

				if(isset($mod->cmd_dop_info) && is_array($mod->cmd_dop_info) && count($mod->cmd_dop_info)>0){
					$data.=implode('',$mod->cmd_dop_info);
				}
				$data.='<img src="images/point_blank.gif" height="5" border="0">';
				$data.=$data2;
			}else{				$data.='<div class="box3" align="center"><b>ОШИБКА</b>! Модуль не можт быть выполнен.</div>'.
				       '<br \>';			}
		}else{			$data=$mod->cmd_line_cr().
			      $data_modlist;
		}
	}
	
	$data=$mod->cmd_line_show().$data;

	ob_start();
	include('data/skin/standart/template.html');
	$maindata=ob_get_contents();
	ob_end_clean();
	$maindata=str_replace('%title%','_cordpan - '.$_SERVER['SERVER_NAME'].(isset($_GET['dr'])?' - '.output($mod->box[$_GET['dr']]['info']['title']):''),$maindata);
	$maindata=str_replace('%data%',$data,$maindata);
	print $maindata;
	
?>
