<?php
	$j1=0;

	//--- сообщения об отработанных ошибках
	$t=array('bail_delete','bail_edit');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}
	
	$filter_cat=false;
	if (isset($_GET['cat']) && ''!=trim($_GET['cat'])){
		//--- получаем КАТЕГОРИЮ, в каторой распологается имущество
		$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.input($_GET['cat']).'" and `type`="cat" limit 1';
		$res1=mysql_query($q);
		if (0==mysql_error() && 0<mysql_num_rows($res1)){
			$filter_cat=mysql_fetch_assoc($res1);
		}
	}

	if ($filter_cat){
		$filter_cat_q=' and `parent`="'.$filter_cat['id'].'"';
		$filter_cat_info='<p style="text-align: center;">'.
							 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m='.$_GET['m'].(isset($_GET['page'])?'&page='.$_GET['page']:'').(isset($_GET['seek'])?'&page='.$_GET['seek']:'').'" class="hrf2" title="отключить фильтр">'.
								 'Отключить фильтр: <strong>'.output($filter_cat['title']).'</strong>'.
							 '</a>'.
						 '</p>';
	}else{
		$filter_cat_q='';
		$filter_cat_info='';
	}

	$data1[]=$filter_cat_info;
	
	//--- список
	$q='select * from `'.$_modvars['mysql']['table'].'` where `type`="obj"'.$filter_cat_q.' order by `order` desc, `id` desc';
	$res=mysql_query($q);
	print mysql_error();
	$j1=0;
	if(mysql_errno()<1){
		if(mysql_num_rows($res)>0){
			
			$pglist=new pageList;
			$pglist->get($res,$_comvars['pglist']['lines_pp'],$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),$_comvars['pglist']['pages_pp'],'desc');

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
				
				//--- получаем КАТЕГОРИЮ, в каторой распологается имущество
				$q='select * from `'.$_modvars['mysql']['table'].'` where `id`="'.$row['parent'].'" and `on`="1" limit 1';
				$res1=mysql_query($q);
				$parent_category=(0==mysql_error() && 0<mysql_num_rows($res1)?mysql_fetch_assoc($res1):'');

				$data3[]='<tr class="'.implode(' ',$cl).'">'.
							 '<td style="width: 30px; text-align: center;">'.$row['id'].'</td>'.
							 '<td>'.$t_show.'</td>'.
							 '<td>'.output($row['title']).'</td>'.
							 (''==trim($filter_cat_info)?'<td style="text-align: center;">'.output($parent_category['title']).'</td>':'').
							 '<td>'.
								 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail_edit&pid='.$row['id'].'" title="редактировать">&nbsp;РР&nbsp;</a>'.
								 ' '.
								 '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=bail_delete&pid='.$row['id'].'" title="удалить" onclick="return confirm(\'Вы уверены, что хотите удалить информацию об имуществе?\');">&nbsp;XX&nbsp;</a>'.
							 '</td>'.
						 '</tr>';
				
				unset($cl);
			}
			$data1[]=         '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
								 '<tr class="header">'.
									 '<td>#</td>'.
									 '<td>show</td>'.
									 '<td>название имущества</td>'.
									 (''==trim($filter_cat_info)?'<td>категория</td>':'').
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
