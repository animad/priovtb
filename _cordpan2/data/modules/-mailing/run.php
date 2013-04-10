<?php

	//--- переменные ПАНЕЛИ
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ОБЩИЕ переменные МОДУЛЕЙ
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc'));
	//--- переменные МОДУЛЯ
	$_modvars=vars_parse_batch($_dir['mod'],array('vars.inc'));
	
	if($mod->box[$_GET['dr']]['func']){
		while(list($key,$val)=each($mod->box[$_GET['dr']]['func'])){
			eval('$val='.$val.';');
			if(file_exists($val) && filesize($val)){ include($val); }
		}
	}
	
	if(!isset($_GET['m'])){ $_GET['m']=$mod->box[$_GET['dr']]['config']['default_section']; }
	if(!isset($_SESSION['user']['status']) || trim($_SESSION['user']['status'])!='admin'){ $_GET['m']='secure_02'; } //---сюда допускается только ADMIN
	if(!isset($_SERVER['HTTP_REFERER'])){ $_GET['m']='secure_01'; } //---на страничку пришли со строки адреса

	//--- создание путей
	$ans=path_create($_modvars['place']['store']);
	$ans=path_create($_modvars['place']['log']);

	//--- данные полей и секций
	$s=array(
		'interface'=>array(
			'archive'=>array('m'=>'archive','title'=>'архив рассылки','title2'=>'детальная информация'),
			'subscribers'=>array('m'=>'subscribers','title'=>'подписчики'),
			'new_delivery'=>array('m'=>'new_delivery','title'=>'новая рассылка'),
			'info'=>array('m'=>'info','title'=>'подписчики<br />персональная информация')
		),
		'process'=>array(),
		'fields'=>array()
	);
	$s['link']=array(
		&$s['interface']['archive'],
		&$s['interface']['subscribers'],
		&$s['interface']['new_delivery'],
		&$s['interface']['info']
	);
	
	//--- служебные кнопки под разные секции
	// $_modvars['btn'][<$_GET['m']>][]=array(<ссылка кнопки>,<имя кнопки>);
	$_modvars['btn'][$s['link'][0]['m']][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=subscribers','подписчики');
	$_modvars['btn'][$s['link'][0]['m']][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=new_delivery','новая рассылка');
	
	$_modvars['btn'][$s['link'][1]['m']][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=archive','архив рассылок');
	$_modvars['btn'][$s['link'][1]['m']][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=new_delivery','новая рассылка');
	
	$_modvars['btn'][$s['link'][2]['m']][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=subscribers','подписчики');
	$_modvars['btn'][$s['link'][2]['m']][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=archive','архив рассылок');

	$_modvars['btn'][$s['link'][3]['m']][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=archive','архив рассылок');
	$_modvars['btn'][$s['link'][3]['m']][]=array($_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=new_delivery','новая рассылка');

	//--- постоянный заголовок страницы
	$data1[]='<h1>'.$mod->box[$_GET['dr']]['info']['title'].'</h1>';
	$j1=0;
	$mtool=new mod_tool;
	
	switch ($_GET['m']){
		
//пользовательские секции
		
		//архив рассылки
		case 'archive':
			
			//--- служебные кнопки
			include($_dir['common_code'].'bl_top_btn.php');
			
			if(!isset($_GET['fln'])){
				$data1[]='<h2>'.$s['interface'][$_GET['m']]['title'].'</h2>';
				$data1[]=$mtool->archive_list();
			}else{
				$data1[]='<h2>'.$s['interface'][$_GET['m']]['title2'].'</h2>';
				$data1[]='<div style="text-align: center; margin-bottom: 10px;"><a href="'.$_SERVER['HTTP_REFERER'].'" class="hrf2">назад</a></div>';
				$data1[]=$mtool->archive_detales($_GET['fln']);
			}
			
		break;
		
		//подписчики
		case 'subscribers':
			
			//--- служебные кнопки
			include($_dir['common_code'].'bl_top_btn.php');
			$data1[]='<h2>'.$s['interface'][$_GET['m']]['title'].'</h2>';
			
			$data1[]=$mtool->subscribers();
			
		break;

		//новая рассылка
		case 'new_delivery':
			
			//--- служебные кнопки
			include($_dir['common_code'].'bl_top_btn.php');
			$data1[]='<h2>'.$s['interface'][$_GET['m']]['title'].'</h2>';
			
			$data1[]=$mtool->new_delivery();
			
		break;
		
		//информация о подписчике
		case 'info':
			
			//--- служебные кнопки
			include($_dir['common_code'].'bl_top_btn.php');
			$data1[]='<h2>'.$s['interface'][$_GET['m']]['title'].'</h2>';
			
			$res=$mtool->info();
			if($res[0]==true){
				$data1[]=$res[1];
			}else{ $data1[]='error'; }
			
		break;
		

//секции обработки

		case 'new_delivery_process':
			//log - последовательность вызовов
			$f=(isset($f['f'])?trim($f['f']):'').' ## '.$_GET['m'];
			
			if(isset($_POST['subject']) && isset($_POST['text'])){
				if(trim($_POST['subject'])!='' && trim($_POST['text'])!=''){
					//собираем адреса email
					$q='select `email` from `users` where `on`="1" and `email` is not NULL order by `id`';
					$res=$mtool->db_query($q,$f);
					if($res[0]==true){
						while(list($key,$val)=each($res[1])){
							$p_arg=array(
								'f'=>$f,
								'adr'=>$val['email'],
								'subject'=>$_POST['subject'],
								'text'=>$_POST['text']
							);
							//шлем
							$res1=$mtool->mail_send($p_arg);
							
							//store to log
							if($res1[0]==true){
								$l['ok'][]=$val['email'];
							}else{
								$l['bad'][]=$val['email'];
							}
						}

						//compose log file
						$tm=date('YmdHis');
						$data=array(
							$tm=>array(
								'title'=>(isset($_POST['subject']) && trim($_POST['subject'])!=''?input($_POST['subject']):null),
								'text'=>input($_POST['text']),
								'log'=>$l
							)
						);
			
						//write log file
						$fln=$_dir['site'].$_modvars['place']['store'].'/'.$tm;
						$fp = fopen($fln, 'w+');
						fwrite($fp, serialize($data));
						fclose($fp);
					}
				}else{ $erm=$mtool->err_log(5,$f); }
			}else{ $erm=$mtool->err_log(1,$f); }
			
			//--- стандартная часть
			include($_dir['common_code'].'stnd_ssbl_end.php');
		break;


		case 'visibility':
			include($_dir['common_code'].'visibility.php');
			//--- стандартная часть
			include($_dir['common_code'].'stnd_ssbl_end.php');
		break;

//стартовая секция
		default:
			$data1[]='<p align="center">- WELCOME screen -</p>';
		
	}
	if(isset($data1)){ print implode('',$data1); }

?>
