<?php
	$j1=0;

	//--- сообщения об отработанных ошибках
	$t=array('visibility','delete');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}
			
	//--- список
	$q='select * from `'.$_modvars['mysql']['table'].'` where `type`="cat" order by `order` asc, `id` asc';
	$res=mysql_query($q);
	print mysql_error();
	$j1=0;
	if(mysql_errno()<1){
		if(mysql_num_rows($res)>0){
			
			$pglist=new pageList;
			$pglist->get($res,$_comvars['pglist']['lines_pp'],$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),$_comvars['pglist']['pages_pp'],'desc');
/*
			$data1[]='<p align="center">'.
						 '<a href="#" onClick="return opros_list_form_go(opros_selection_check(\'opros_list\'),\'new\');" class="hrf2">Экспорт новых ответов</a>'.
						 '<a href="#" onClick="return opros_list_form_go(opros_selection_check(\'opros_list\'),\'all\');" class="hrf2">Экспорт ВСЕХ ответов</a>'.
					 '</p>';
*/
			if($pglist->pglist!=''){ $data1[]=$pglist->pglist.'<br />'; }
			
			reset($pglist->list);
			$i=0;
			while(list($key,$row)=each($pglist->list)){
				if($row['on']==1){
					$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=0" class="hrf3"
title="выключить">выкл</a>';
					$cl2['show']='';
				}else{
					$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=1" class="hrf3" title="включить">вкл</a>';
					$cl2['show']='off';
				}
				$cl[]=(($i++)%2?'even':'odd').(''!=trim($cl2['show'])?'_'.$cl2['show']:'');
				
				//--- количество ДЕЙСТВУЮЩЕГО имущества в категории
				$q='select * from `'.$_modvars['mysql']['table'].'` where `parent`="'.$row['id'].'" and `on`="1"';
				$res1=mysql_query($q);
				$properties_count='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail&c='.$row['id'].'">&nbsp;'.(0==mysql_error()?mysql_num_rows($res1):0).'&nbsp;</a>';

				$data3[]='<tr class="'.implode(' ',$cl).'">'.
							 '<td style="width: 30px; text-align: center;">'.$row['id'].'</td>'.
							 '<td>'.$t_show.'</td>'.
							 '<td><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail&cat='.$row['id'].'" title="отобразить залоговое имущество в данной категории" class="hrf3">'.output($row['title']).'</a></td>'.
							 '<td style="text-align: center;">'.$properties_count.'</td>'.
							 '<td>'.
								 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=category_edit&pid='.$row['id'].'" title="редактировать">&nbsp;РР&nbsp;</a>'.
								 ' '.
								 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=category_delete&pid='.$row['id'].'" title="удалить" onclick="return confirm(\'Вы уверены, что хотите удалить категорию?\');">&nbsp;XX&nbsp;</a>'.
							 '</td>'.
						 '</tr>';
				
				unset($cl);
			}
			$data1[]=         '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
								 '<tr class="header">'.
									 '<td>#</td>'.
									 '<td>show</td>'.
									 '<td>название категории</td>'.
									 '<td>кол-во имущества<br />отображаемого клиентам<br />в данной категории</td>'.
									 '<td>&nbsp;</td>'.
								 '</tr>'.
								 implode('',$data3).
							'</table>';
			unset($data3);
			if($pglist->pglist!=''){ $data1[]='<br />'.$pglist->pglist; }
		}//else{ $err=$_comvars['err'][6]; }
	}else{ $err=$_comvars['err'][5]; }
	
	if(isset($err)){
		$data1[]=err_show($err);
		unset($err);
	}elseif(isset($data2)){
		$data1[]='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.implode('',$data2).'</table>';
		unset($data2);
	}
