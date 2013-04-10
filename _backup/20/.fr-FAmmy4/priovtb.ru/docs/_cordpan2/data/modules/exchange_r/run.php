<?php

	//--- переменные ПАНЕЛИ
//	$_glovars=vars_parse_batch($_dir['site'],array('vars/global.vars'));
	//--- ОБЩИЕ переменные МОДУЛЕЙ
	$_comvars=vars_parse_batch($_dir['common_vars'],array('users.inc','mysql.inc'));
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
	
	switch ($_GET['m']){
		case 'c_rate':
			$limit=isset($_GET['limit'])?trim($_GET['limit']):10; //--- количество выбранных результатов

			$data1[]='<h1>Курсы валют</h1>';
			$data1[]='<p align="center">последние '.$limit.' изменений</p>';
			
			$data1[]='<p align="center"><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=create" class="hrf2">новый курс</a></p>';

			$q='select * from `exchange_r` where `on`="1" order by `date` desc, `id` desc limit 1';
			$res=mysql_query($q);
			if(mysql_error()<1){
				if(mysql_num_rows($res)>0){
					$exchange_r['current']=mysql_fetch_assoc($res);
				}else{ $er='Внимание! Действующий курс не найден.'; }
			}else{ $er='Ошибка при определении действующего курса.'; }
			if(isset($er)){
				$data1[]='<p align="center" style="background-color: red; line-height: 30px;">'.$er.'</p>';
				unset($er);
			}
			
			$t=array('ur'=>'USD/RUB','er'=>'EUR/RUB','eu'=>'EUR/USD');
			$q='select * from `exchange_r` order by `date` desc, `id` desc limit '.$limit;
			$res=mysql_query($q);
			print mysql_error();
			$j1=0;
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				while($row=mysql_fetch_assoc($res)){
					if(true){
						$tool='<div style="position: relative; line-height: 20px; width: 350px; text-align: right; margin: 0 auto;">'.
										 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=del&id='.$row['id'].'" class="hrf1" title="удалить" onClick="return confirm(\'Обменный курс за '.date2str($row['date'],2).'\r\n\r\nУдалить?\')">x</a>'.
										 '<div style="position: absolute; top: 0; left: 0; padding: 0;">'.
											 ($row['on']==1?'<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=show&v=0&id='.$row['id'].'" class="hrf1" title="вкл / ВЫКЛ">выкл</a>':
											                '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=show&v=1&id='.$row['id'].'" class="hrf1" title="ВКЛ / выкл">вкл</a>').
											 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit&id='.$row['id'].'" class="hrf1" title="изменить данные">изменить</a>'.
										 '</div>'.
									 '</div>';
					}else{ $tool=''; }
					
					if($j1<1 && $row['on']==1){
						$bg1='background-color: #DBF5D6;';
						$t1='<div style="position: absolute; top: 5px; left: 5px;">активный курс</div>';
						$j1++;
					}else{
						$bg1='';
						$t1='';
					}
					
					$data1[]='<div style="position: relative; padding: 10px 0; left: 0; width: 100%; '.$bg1.' text-align: center;">'.
								 $t1.
								 '<div'.($row['on']==0?' class="off"':'').'>'.
									 $tool.
									 '<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1">'.
										 '<tr class="header">'.
											 '<td width="150"><b>'.date2str($row['date'],2).'</b></td>'.
											 '<td width="100">покупка</td>'.
											 '<td width="100">продажа</td>'.
										 '</tr>'.
										 '<tr class="odd">'.
											 '<td>'.$t['ur'].'</td>'.
											 '<td align="center">'.sprintf("%.2f",$row['pokup_ur']).'</td>'.
											 '<td align="center">'.sprintf("%.2f",$row['prod_ur']).'</td>'.
										 '</tr>'.
										 '<tr class="even">'.
											 '<td>'.$t['er'].'</td>'.
											 '<td align="center">'.sprintf("%.2f",$row['pokup_er']).'</td>'.
											 '<td align="center">'.sprintf("%.2f",$row['prod_er']).'</td>'.
										 '</tr>'.
										 '<tr class="odd">'.
											 '<td>'.$t['eu'].'</td>'.
											 '<td align="center">'.sprintf("%.4f",$row['pokup_eu']).'</td>'.
											 '<td align="center">'.sprintf("%.4f",$row['prod_eu']).'</td>'.
										 '</tr>'.
									 '</table>'.
								 '</div>'.
							 '</div>';
				}
			}

			if(isset($_SESSION['er'][$_GET['m']]['erm'])){
				$data1[]='<p align="center">'.output($_SESSION['er'][$_GET['m']]['erm']).'</p>';
			}

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
		break;
		case 'edit':
			
			if(isset($_SESSION['er'][$_GET['m']])){
				$date=isset($_SESSION['er'][$_GET['m']]['date'])?$_SESSION['er'][$_GET['m']]['date']:'';
				$prod_ur=isset($_SESSION['er'][$_GET['m']]['prod_ur'])?$_SESSION['er'][$_GET['m']]['prod_ur']:'';
				$pokud_ur=isset($_SESSION['er'][$_GET['m']]['pokud_ur'])?$_SESSION['er'][$_GET['m']]['pokud_ur']:'';
				$prod_er=isset($_SESSION['er'][$_GET['m']]['prod_er'])?$_SESSION['er'][$_GET['m']]['prod_er']:'';
				$pokup_er=isset($_SESSION['er'][$_GET['m']]['pokup_er'])?$_SESSION['er'][$_GET['m']]['pokup_er']:'';
				$prod_eu=isset($_SESSION['er'][$_GET['m']]['prod_eu'])?$_SESSION['er'][$_GET['m']]['prod_eu']:'';
				$pokup_eu=isset($_SESSION['er'][$_GET['m']]['pokup_eu'])?$_SESSION['er'][$_GET['m']]['pokup_eu']:'';
				
				$id=isset($_SESSION['er'][$_GET['m']]['id'])?$_SESSION['er'][$_GET['m']]['id']:'';
				
			}elseif(isset($_GET['id']) && trim($_GET['id'])!=''){

				$q='select * from `exchange_r` where `id`="'.trim($_GET['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_num_rows($res)>0){
						$row=mysql_fetch_assoc($res);

						$date=$row['date'];
						$prod_ur=$row['prod_ur'];
						$pokup_ur=$row['pokup_ur'];
						$prod_er=$row['prod_er'];
						$pokup_er=$row['pokup_er'];
						$prod_eu=$row['prod_eu'];
						$pokup_eu=$row['pokup_eu'];
						
						$id=$row['id'];

					}else{ $erm='Курс с указанным номером не найден.'; }
				}else{ $erm=mysql_error(); }

			}else{ $erm='Не указан порядковый номер Обменного курса.'; }

			$data1[]='<h1>Курсы валют</h1>';
			$data1[]='<p align="center"><b>Редактирование курса №'.$row['id'].'</b> за '.date2str($row['date'],2).' число</p>';
			
			if(isset($_SERVER['HTTP_REFERER']) || isset($_SESSION['back'])){
				$data1[]='<p align="center"><a href="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'" class="hrf2">назад</a></p>';
			}
			
			$t=array('ur'=>'USD/RUB','er'=>'EUR/RUB','eu'=>'EUR/USD');

			$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=save" method="post" style="padding: 0; margin: 0;">'.
					 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
					 '<input type="hidden" name="id" value="'.$row['id'].'">'.
					 '<div'.($row['on']==0?' class="off"':'').'>'.
						 '<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1">'.
							 '<tr class="header">'.
								 '<td width="150"><b>'.date2str($date,2).'</b></td>'.
								 '<td width="100">покупка</td>'.
								 '<td width="100">продажа</td>'.
							 '</tr>'.
							 '<tr class="odd">'.
								 '<td>'.$t['ur'].'</td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="pokup_ur" value="'.sprintf("%.2f",$pokup_ur).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="prod_ur" value="'.sprintf("%.2f",$prod_ur).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
							 '</tr>'.
							 '<tr class="even">'.
								 '<td>'.$t['er'].'</td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="pokup_er" value="'.sprintf("%.2f",$pokup_er).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="prod_er" value="'.sprintf("%.2f",$prod_er).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
							 '</tr>'.
							 '<tr class="odd">'.
								 '<td>'.$t['eu'].'</td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="pokup_eu" value="'.sprintf("%.4f",$pokup_eu).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="prod_eu" value="'.sprintf("%.4f",$prod_eu).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
							 '</tr>'.
						 '</table>'.
					 '</div>'.
					 '<p align="center"><input type="submit" value="Изменить"> <input type="reset" value="Сброс"></p>'.
					 '</form>';

			if(isset($_SESSION['er'][$_GET['m']]['erm'])){
				$data1[]='<p align="center">'.output($_SESSION['er'][$_GET['m']]['erm']).'</p>';
			}

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;
		case 'create':
			
			if(isset($_SESSION['er'][$_GET['m']])){
				$date=isset($_SESSION['er'][$_GET['m']]['date'])?$_SESSION['er'][$_GET['m']]['date']:'';
				$prod_ur=isset($_SESSION['er'][$_GET['m']]['prod_ur'])?$_SESSION['er'][$_GET['m']]['prod_ur']:'';
				$pokud_ur=isset($_SESSION['er'][$_GET['m']]['pokud_ur'])?$_SESSION['er'][$_GET['m']]['pokud_ur']:'';
				$prod_er=isset($_SESSION['er'][$_GET['m']]['prod_er'])?$_SESSION['er'][$_GET['m']]['prod_er']:'';
				$pokup_er=isset($_SESSION['er'][$_GET['m']]['pokup_er'])?$_SESSION['er'][$_GET['m']]['pokup_er']:'';
				$prod_eu=isset($_SESSION['er'][$_GET['m']]['prod_eu'])?$_SESSION['er'][$_GET['m']]['prod_eu']:'';
				$pokup_eu=isset($_SESSION['er'][$_GET['m']]['pokup_eu'])?$_SESSION['er'][$_GET['m']]['pokup_eu']:'';
				
			}else{

				$date=date('Y-m-d H:i:s');
				$prod_ur=0;
				$pokup_ur=0;
				$prod_er=0;
				$pokup_er=0;
				$prod_eu=0;
				$pokup_eu=0;

			}

			$data1[]='<h1>Курсы валют</h1>';
			$data1[]='<p align="center"><b>Новый курс</b> на '.date2str($date,2).' число</p>';
			
			if(isset($_SERVER['HTTP_REFERER']) || isset($_SESSION['back'])){
				$data1[]='<p align="center"><a href="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'" class="hrf2">назад</a></p>';
			}

			$data1[]='<form action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=save_new" method="post" style="padding: 0; margin: 0;">'.
					 '<input type="hidden" name="back" value="'.(isset($_SESSION['back'])?$_SESSION['back']:$_SERVER['HTTP_REFERER']).'">'.
					 '<input type="hidden" name="date" value="'.$date.'">'.
					 '<div class="off">'.
						 '<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1">'.
							 '<tr class="header">'.
								 '<td width="150"><b>'.date2str($date,2).'</b></td>'.
								 '<td width="100">покупка</td>'.
								 '<td width="100">продажа</td>'.
							 '</tr>'.
							 '<tr class="odd">'.
								 '<td>USD/RUB</td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="pokup_ur" value="'.sprintf("%.2f",$pokup_ur).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="prod_ur" value="'.sprintf("%.2f",$prod_ur).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
							 '</tr>'.
							 '<tr class="even">'.
								 '<td>EUR/RUB</td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="pokup_er" value="'.sprintf("%.2f",$pokup_er).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="prod_er" value="'.sprintf("%.2f",$prod_er).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
							 '</tr>'.
							 '<tr class="odd">'.
								 '<td>EUR/USD</td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="pokup_eu" value="'.sprintf("%.4f",$pokup_eu).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
								 '<td align="center" style="padding: 0;"><input type="text" name="prod_eu" value="'.sprintf("%.4f",$prod_eu).'" style="height: 18px; width: 95px; border: 1px solid black; text-align: center;"/></td>'.
							 '</tr>'.
						 '</table>'.
					 '</div>'.
					 '<p align="center"><input type="submit" value="Создать"> <input type="reset" value="Сброс"></p>'.
					 '</form>';

			if(isset($_SESSION['er'][$_GET['m']]['erm'])){
				$data1[]='<p align="center">'.output($_SESSION['er'][$_GET['m']]['erm']).'</p>';
			}

			if(isset($_SESSION['er'])){ unset($_SESSION['er']); }
			if(isset($_SESSION['back'])){ unset($_SESSION['back']); }
		break;


		case 'show':
			if(isset($_GET['v']) && trim($_GET['v'])!='' && isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='update `exchange_r` set `on`="'.$_GET['v'].'" where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $erm=mysql_error(); }
			}else{ $erm='Ошибочные входяшие параметры.'; }
			
			if(isset($erm)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$erm;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'del':
			if(isset($_GET['id']) && trim($_GET['id'])!=''){
				$q='delete from `exchange_r` where `id`="'.$_GET['id'].'"';
				$res=mysql_query($q);
				if(mysql_errno()>0){ $erm=mysql_error(); }
			}else{ $erm='Ошибочные входяшие параметры.'; }
			
			if(isset($erm)){
				$_SESSION['er'][$_GET['m']]=$_GET;
				$_SESSION['er'][$_GET['m']]['erm']=$erm;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'save':
			if(isset($_POST['id']) && trim($_POST['id'])!=''){
				$q='update `exchange_r`
					set
					`prod_ur`="'.trim($_POST['prod_ur']).'",
					`pokup_ur`="'.trim($_POST['pokup_ur']).'",
					`prod_er`="'.trim($_POST['prod_er']).'",
					`pokup_er`="'.trim($_POST['pokup_er']).'",
					`prod_eu`="'.trim($_POST['prod_eu']).'",
					`pokup_eu`="'.trim($_POST['pokup_eu']).'"
					where `id`="'.trim($_POST['id']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()<1){ $erm='Изменения не внесены'; }
				}else{ $erm=mysql_error(); }
				
				$_SESSION['back']=$_POST['back'];
			}else{ $erm='Обязательный параметр отсутствует'; }
			if(isset($erm)){
				$_SESSION['er']['edit']=$_POST;
				$_SESSION['er']['edit']['erm']=$erm;
			}
			Header('Location: '.$_SERVER['HTTP_REFERER']);
		break;
		case 'save_new':
			if(array_search('0.0',array($_POST['prod_ur'],$_POST['pokup_ur'],$_POST['prod_er'],$_POST['pokup_er'],$_POST['prod_eu'],$_POST['pokup_eu']))!==false){
				$erm='Нуливые значения не допустимы';
			}
			$_SESSION['back']=$_POST['back'];

			if(!isset($erm)){
				$q='insert into `exchange_r` set
					`date`="'.trim($_POST['date']).'",
					`prod_ur`="'.trim($_POST['prod_ur']).'",
					`pokup_ur`="'.trim($_POST['pokup_ur']).'",
					`prod_er`="'.trim($_POST['prod_er']).'",
					`pokup_er`="'.trim($_POST['pokup_er']).'",
					`prod_eu`="'.trim($_POST['prod_eu']).'",
					`pokup_eu`="'.trim($_POST['pokup_eu']).'"';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_affected_rows()<1){ $erm='Изменения не внесены'; }else{ unset($_SESSION['back']); }
				}else{ $erm=mysql_error(); }
			}

			if(isset($erm)){
				$_SESSION['er']['create']=$_POST;
				$_SESSION['er']['create']['erm']=$erm;
				Header('Location: '.$_SERVER['HTTP_REFERER']);
			}else{
				Header('Location: '.$_POST['back']);
			}
		break;
		case 'secure_01': //--- пришли со строки адреса
			user_forget();
			Header('Location: '.$_SERVER['PHP_SELF']);
		break;
		case 'secure_02': //--- допускается только ADMIN
			$data1='<p align="center">- доступ только администраторам -</p>';
		break;
		default: //стартовая секция
			print '<p align="center">- WELCOME screen -</p>';
		break;
	}
	if(isset($data1)){ print (is_array($data1)?implode('',$data1):$data1); }

	close($link);
	
?>
