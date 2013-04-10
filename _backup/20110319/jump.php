<?php
/*
	Скрипт осуществляет переход+учет перехода ... с других сайтов на страницу сайта PRIOVTB.COM по заданным правилам
*/
	session_start();

	include('files/vars/mysql.php');
	include('files/functions/mysql.php');
	$link=connect();
	
	if (isset($_SERVER['HTTP_REFERER'])){ //--- произведен переход С САЙТА?
		$rd=parse_url($_SERVER['HTTP_REFERER']);

		//--- выбираем ВКЛЮЧЕННЫЕ правила, связанные с ХОСТОМ
		$q='select * from `jump_rules`
		    where 1
			and `on`="1"
			and `host`="'.addslashes(trim($rd['host'])).'"
			order by `order` asc
			';
		$res=mysql_query($q);
		if (!mysql_errno()){
			if (mysql_num_rows($res)){
				while ($row=mysql_fetch_assoc($res)){ //--- перебираем найденные варианты
					if ('host'==$row['rule']){ //-- подготавливаем значения для хоста
						$v1=trim($rd['host']);
						$v2=trim($row['value']);
					}elseif ('url'==$row['rule']){ //-- подготавливаем значения для всей ссылки
						$v1=trim($_SERVER['HTTP_REFERER']);
						$v2=trim($row['value']);
					}
					if ($v1==$v2){ //--- проверяем совпадения
						//--- лог
						$q='insert into `jump_log`
						    (`date`,`host_referer`,`http_referer`,`rule`,`jump_to`)
							values
							(NOW(),"'.addslashes(trim($rd['host'])).'","'.addslashes(trim($_SERVER['HTTP_REFERER'])).'","'.$row['id'].'","'.addslashes(trim($row['href'])).'")';
						$res=mysql_query($q);
						//--- переходим в соответствии с правилом
						header('location: '.trim($row['href']));
						exit();
					}
				}
			}else{ //---если варианты не найдены, ЛОГИРУЕМ и переходим в корень
				$q='insert into `jump_log`
					(`date`,`host_referer`,`http_referer`,`rule`,`jump_to`)
					values
					(NOW(),"'.addslashes(trim($rd['host'])).'","'.addslashes(trim($_SERVER['HTTP_REFERER'])).'",NULL,"/")';
				$res=mysql_query($q);
				header('location: /');
			}
		}
	}else{
		$q='insert into `jump_log`
			(`date`,`host_referer`,`http_referer`,`rule`,`jump_to`)
			values
			(NOW(),NULL,NULL,NULL,"/")';
		$res=mysql_query($q);
		header('location: /');
	}
	close($link);
?>