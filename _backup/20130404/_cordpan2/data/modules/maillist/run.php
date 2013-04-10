<?php

	//--- переменные ПАНЕЛИ
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ОБЩИЕ переменные МОДУЛЕЙ
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc','mysql.inc','err.inc','globals.inc'));
	//--- переменные МОДУЛЯ
	$_modvars=vars_parse_batch($_dir['mod'],array('vars.inc'));
	
	if($mod->box[$_GET['dr']]['func']){
		while(list($key,$val)=each($mod->box[$_GET['dr']]['func'])){
			eval('$val='.$val.';');
			if(file_exists($val) && filesize($val)){ include($val); }
		}
	}
	$link=connect($_comvars['mysql']);
	
	if(!isset($_GET['m'])){ $_GET['m']=$mod->box[$_GET['dr']]['config']['default_section']; }
//	if(!isset($_SESSION['user']['status']) || trim($_SESSION['user']['status'])!='admin'){ $_GET['m']='secure_02'; } //---сюда допускается только ADMIN
	if(!isset($_SERVER['HTTP_REFERER'])){ $_GET['m']='secure_01'; } //---на страничку пришли со строки адреса

	//--- создание путей
	$ans=path_create($_modvars['place']['store']);
//	$ans=path_create($_modvars['place']['log']);

	//--- данные полей и секций
	$t=array('visibility','create_save','edit_save');	//--- имена отработанных секций
	$t2=array('usermail','fam','im','ot');				//--- передаваемые значения
	$t3=array('theme','text');

	//--- сообщения об отработанных ошибках
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){ $err_msg[$t[$i]]=err_show($_SESSION['er'][$t[$i]]['erm']); }else{ $err_msg[$t[$i]]=''; }
	}
	
	//--- служебные кнопки под разные секции
	// $_modvars['btn'][<$_GET['m']>][]=array(<ссылка кнопки>,<имя кнопки>);
	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create_ui','Создать адрес');
	$_modvars['btn']['start'][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create_ui_letter','Создать рассылку');
	$_modvars['btn']['create_ui'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'Назад');
	$_modvars['btn']['edit'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'Назад');
	$_modvars['btn']['create_ui_letter'][]=array((isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']),'Назад');


	
	//--- заголовок страницы
	$data1[]='<h1>'.$mod->box[$_GET['dr']]['info']['title'].'</h1>';

	switch ($_GET['m']){
//--- пользовательские секции
//--- ИНТЕРФЕЙС ---
		case 'start':
			
			//--- служебные кнопки
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}
	
			//--- создание информационного списка
			$q='select * from `'.$_modvars['mysql']['table'].'` order by `id` desc';
			$res=mysql_query($q);
			if(mysql_errno()>0){ $err=mysql_error(); }
			
			//--- вывод ошибки или информационного списка
			if(isset($err)){
				$data1[]=err_show($err);
			}else{
				if(mysql_num_rows($res)>0){
					$t=array('y'=>0,'x'=>0,'h'=>30,'w'=>395,'i'=>0,'hcnt'=>10,'wcnt'=>2,'line'=>0,'col'=>0,'spacer'=>4,'rows'=>0);
					
					$num_rows=mysql_num_rows($res);
					$pglist=new pageList();
					$pglist->get($res,$t['hcnt']*$t['wcnt'],$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),10,'desc');

					reset($pglist->list);
					while(list($key,$row)=each($pglist->list)){
						$n=array(stripslashes(trim($row['fam'])),stripslashes(trim($row['im'])),stripslashes(trim($row['ot'])));
						if($row['on']==1){
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=0" class="hrf6" title="вылючить">выкл</a>';
						}else{
							$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=1" class="hrf6" title="включить">вкл</a>';
						}
						$data2[]='<div class="cell'.($row['on']==0?' red':'').'" style="top: '.$t['y'].'px; left: '.$t['x'].'px; width: '.$t['w'].'px; height: '.$t['h'].'px;">'.
						             '<div style="position: absolute; top: 0; left: 52px; width: '.($t['w']-52-62).'px; height: '.$t['h'].'px; line-height: '.$t['h'].'px; overflow: hidden;"><a href="mailto:'.stripslashes(trim($row['usermail'])).'" title="'.implode(' ',$n).'" class="hrf7">'.implode(' ',$n).'</a></div>'.
									 '<div style="position: absolute; top: 0; right: 2px; width: 28px; text-align: right; line-height: '.$t['h'].'px;">'.
									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=delete&id='.$row['id'].'" title="delete" class="hrf6" onClick="return confirm(\'Адрес для '.implode(' ',$n).'\r\n\r\nУдалить?\')">XX</a>'.
									 '</div>'.
									 '<div style="position: absolute; top: 0; right: 32px; width: 28px; text-align: right; line-height: '.$t['h'].'px;">'.
									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit&id='.$row['id'].'" title="edit" class="hrf6">РР</a>'.
									 '</div>'.
									 '<div style="position: absolute; top: 0; left: 2px; width: 43px; line-height: '.$t['h'].'px;">'.
									     $t_show.
									 '</div>'.
								 '</div>';
						$t['i']++;
						$t['line']++;
						if($t['line']>$t['rows']){ $t['rows']=$t['line']; }
						if($t['line']==$t['hcnt']){
							$t['line']=0;
							$t['col']++;
						}
						$t['y']=(($t['h']+$t['spacer'])*$t['line']);
						$t['x']=(($t['w']+$t['spacer'])*$t['col']);
					}
					
					
					
					if(isset($data)){
						$data1[]=(trim($pglist->pglist)!=''?$pglist->pglist.'<br />':'').
						         '<div align="center" style="margin: 10px 0;">Всего адресов в базе: '.$num_rows.'</div>'.
						         '<div class="clist" style="height: '.(($t['h']+$t['spacer'])*$t['rows']).'px;">'.
						             '<div style="position: relative; width: 800px; margin: 0 auto;">'.implode('',$data2).'</div>'.
								 '</div>'.
								 (trim($pglist->pglist)!=''?'<br />'.$pglist->pglist:'');
					}
				}
			}
			
		break;
		case 'create_ui':
			$data1[]='<p align="center"><b>Создать</b></p>';

			//--- служебные кнопки
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}
			
			if(isset($_SESSION['er'][$t[1]])){
				while(list($key,$val)=each($t2)){
					$$val=isset($_SESSION['er'][$t[1]][$val])?$_SESSION['er'][$t[1]][$val]:'';
				}
			}else{
				while(list($key,$val)=each($t2)){ $$val=''; }
				$date=date('Y-m-d');
			}

			//--- выводим сообщение с ошибкой
			$data1[]=$err_msg[$t[1]];
			
			if(isset($err)){
				$data1[]=err_show($err);
			}else{
				$j1=0;
				$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create_save" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>эл.почта</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[0].'" value="'.$$t2[0].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>фамилия</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[1].'" value="'.$$t2[1].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>имя</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[2].'" value="'.$$t2[2].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>отчество</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[3].'" value="'.$$t2[3].'"></td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><input type="submit" value="Ок"></p>'.
						 '</form>';
			}


			
		break;
		case 'create_ui_letter':
			$data1[]='<p align="center"><b>Создать рассылку</b></p>';

			//--- служебные кнопки
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}
			
			if(isset($_SESSION['er'][$t[1]])){
				while(list($key,$val)=each($t2)){
					$$val=isset($_SESSION['er'][$t[1]][$val])?$_SESSION['er'][$t[1]][$val]:'';
				}
			}else{
				while(list($key,$val)=each($t2)){ $$val=''; }
				$date=date('Y-m-d');
			}

			//--- выводим сообщение с ошибкой
			$data1[]=$err_msg[$t[1]];
			
			if(isset($err)){
				$data1[]=err_show($err);
			}else{
				$j1=0;
				$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create_save" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>тема</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t3[0].'" value="'.$$t3[0].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td valign="top">текст</td>'.
									 '<td><textarea style="width: 500px; height: 300px" name="'.$t3[1].'">'.$$t3[1].'</textarea></td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><input type="submit" value="Ок"></p>'.
						 '</form>';
			}


			
		break;
		
		case 'edit':
			$data1[]='<p align="center"><b>Редактировать</b></p>';

			//--- служебные кнопки
			if(isset($_modvars['btn'][$_GET['m']])){
				for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
					$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
				}
				if(isset($data3)){
					$data1[]='<p align="center">'.implode('',$data3).'</p>';
					unset($data3);
				}
			}

			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				if(isset($_SESSION['er'][$t[2]])){
					while(list($key,$val)=each($t2)){
						$$val=isset($_SESSION['er'][$t[2]][$val])?$_SESSION['er'][$t[2]][$val]:'';
					}
				}else{
					$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.$_GET['id'].'" limit 1';
					$res=mysql_query($q);
					if(mysql_errno()<1){
						if(mysql_num_rows($res)>0){
							$row=mysql_fetch_assoc($res);
							while(list($key,$val)=each($t2)){ $$val=isset($row[$val])?trim($row[$val]):''; }
						}else{ $err=$_comvars['err'][7]; }
					}else{ $err=$_comvars['err'][11]; }
				}
			}else{ $err=$_comvars['err'][1]; }

			//--- выводим сообщение с ошибкой
			$data1[]=$err_msg[$t[2]];
			
			if(isset($err)){
				$data1[]=err_show($err);
			}else{
				$j1=0;
				$data1[]='<form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit_save" method="post" style="padding: 0;">'.
							 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
							 '<input type="hidden" name="id" value="'.$_GET['id'].'">'.
				             '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>эл.почта</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[0].'" value="'.$$t2[0].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>фамилия</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[1].'" value="'.$$t2[1].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>имя</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[2].'" value="'.$$t2[2].'"></td>'.
								 '</tr>'.
								 '<tr'.colrow($j1++).'>'.
									 '<td>отчество</td>'.
									 '<td><input style="width: 500px" type="text" name="'.$t2[3].'" value="'.$$t2[3].'"></td>'.
								 '</tr>'.
							 '</table>'.
							 '<p align="center"><input type="submit" value="Ок"></p>'.
						 '</form>';
			}
		break;
		
		

		
		
//--- ОБРАБОТКА ---
		case 'create_save':
			//--- добавление БАЗА
			if(isset($_POST[$t2[0]]) && isset($_POST[$t2[1]])){
				if(trim($_POST[$t2[0]])!='' && trim($_POST[$t2[1]])!=''){
					if(check('email',$$t2[0])){
						$i=0;
						$q1=array(
							'`'.$t2[$i].'`="'.addslashes(trim($_POST[$t2[$i++]])).'"',
							'`'.$t2[$i].'`="'.addslashes(trim($_POST[$t2[$i++]])).'"',
							'`'.$t2[$i].'`="'.addslashes(trim($_POST[$t2[$i++]])).'"',
							'`'.$t2[$i].'`="'.addslashes(trim($_POST[$t2[$i++]])).'"'
						);
						
						$q='insert into `'.$_modvars['mysql']['table'].'` set '.implode(', ',$q1);
						$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][4]; }
						}else{ $err=mysql_error(); }
					}else{ $err=$_comvars['err'][12]; }
				}else{ $err=$_comvars['err'][2]; }
			}else{ $err=$_comvars['err'][1]; }
			
			//--- стандартная часть
			if(isset($_POST['back'])){ $_SESSION['back']=trim($_POST['back']); }
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'visibility':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='update `'.$_modvars['mysql']['table'].'` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $err=mysql_error(); }
			}else{ $err=$_comvars['err'][3]; }
			
			//--- стандартная часть
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'delete':
			//--- удаление БАЗА + ФАЙЛ
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_GET['id']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()>0){
						$row=mysql_fetch_assoc($res);
						$fln=$_dir['site'].$_modvars['place']['store'].'/'.stripslashes(trim($row['file']));
						if(file_exists($fln) && is_writable($fln)){
							unlink($fln);
						}else{ $err=$_comvars['err'][10]; }
					}else{ $err=$_comvars['err'][9]; }
						
					if(!isset($err)){
						$q='delete from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_GET['id']).'"';
						$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][9]; }
						}else{ $err=mysql_error(); }
					}
				}
			}
			
			//--- стандартная часть
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		case 'edit_save':
			if(isset($_POST['id']) && trim($_POST['id'])!=''){
				$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.trim($_POST['id']).'" limit 1';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_num_rows($res)>0){
						$row=mysql_fetch_assoc($res);
					}else{ $err=$_comvars['err'][7]; }
				}else{ $err=mysql_error(); }
				
				//--- изменить БАЗА
				if(isset($_POST[$t2[0]]) && isset($_POST[$t2[1]])){
					if(trim($_POST[$t2[0]])!='' && trim($_POST[$t2[1]])!=''){
						$i=0;
						$q1=array(
							'`'.$t2[$i].'`="'.addslashes(trim($_POST[$t2[$i++]])).'"',
							'`'.$t2[$i].'`="'.addslashes(trim($_POST[$t2[$i++]])).'"',
							'`'.$t2[$i].'`="'.addslashes(trim($_POST[$t2[$i++]])).'"',
							'`'.$t2[$i].'`="'.addslashes(trim($_POST[$t2[$i++]])).'"'
						);

						$q='update `'.$_modvars['mysql']['table'].'`
							set '.implode(', ',$q1).' 
							where `id`="'.trim($_POST['id']).'"';
							
							$res=mysql_query($q);
						if(mysql_errno()<1){
							if(mysql_affected_rows()<1){ $err=$_comvars['err'][8]; }
						}else{ $err=mysql_error(); }
					}else{ $err=$_comvars['err'][2]; }
				}else{ $err=$_comvars['err'][1]; }
			}else{ $err=$_comvars['err'][1]; }
			
			//--- стандартная часть
			if(isset($_POST['back'])){ $_SESSION['back']=trim($_POST['back']); }
			if(isset($err)){
				$_SESSION['er'][$_GET['m']]=$_POST;
				$_SESSION['er'][$_GET['m']]['erm']=$err;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
			exit();
		break;
		
		

//--- системные секции
		case 'secure_01': //--- пришли со строки адреса
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
			exit();
		break;
		case 'secure_02': //--- допускается только ADMIN - если есть ограничение
			$data1='<p align="center">- доступ только администраторам -</p>';
		break;
		default: //--- ОШИБОЧНО-СТАРТОВАЯ секция
			$data1[]='<p align="center">- WELCOME screen -</p>';
		break;
	}
	
	//--- удаление служебных переменных
	if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
	if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
	
	//--- вывод интерфейса модуля
	if(isset($data1)){ print (is_array($data1)?implode('',$data1):$data1); }

	close($link);
	
?>
