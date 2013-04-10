<?php
	$j1=0;

	//--- сообщени€ об отработанных ошибках
	$t=array('visibility','delete');
	for($i=0;$i<count($t);$i++){
		if(isset($_SESSION['er'][$t[$i]]['erm'])){
			$data1[]=err_show($_SESSION['er'][$t[$i]]['erm']);
		}
	}
			
	//--- список
	$q='select * from `opros` order by `date` desc, `id` desc';
	$res=mysql_query($q);
	print mysql_error();
	$j1=0;
	if(mysql_errno()<1){
		if(mysql_num_rows($res)>0){
			
			$pglist=new pageList;
			$pglist->get($res,$_comvars['pglist']['lines_pp'],$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),$_comvars['pglist']['pages_pp'],'desc');

			$data1[]='<p align="center">'.
						 '<a href="#" onClick="return opros_list_form_go(opros_selection_check(\'opros_list\'),\'new\');" class="hrf2">Ёкспорт новых ответов</a>'.
						 '<a href="#" onClick="return opros_list_form_go(opros_selection_check(\'opros_list\'),\'all\');" class="hrf2">Ёкспорт ¬—≈’ ответов</a>'.
					 '</p>';
			
			if($pglist->pglist!=''){ $data1[]=$pglist->pglist.'<br />'; }
			
			reset($pglist->list);
			$i=0;
			while(list($key,$row)=each($pglist->list)){
				if($row['on']==1){
					$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=0" class="hrf3"
title="вылючить">выкл</a>';
					$cl[]='';
				}else{
					$t_show='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$row['id'].'&v=1" class="hrf3" title="включить">вкл</a>';
					$cl[]='off';
				}
				if (($i++)%2){
					$cl[]='even';
				}else{
					$cl[]='odd';
				}
				
				$q='select * from `opros_answers` where `opros_id`="'.$row['id'].'" and `on`="1"';
				$res1=mysql_query($q);
				$answers_count=(0==mysql_error()?mysql_num_rows($res1):0);

				$q='select * from `opros_answers` where `opros_id`="'.$row['id'].'" and `on`="1" and `export_count`="0"';
				$res1=mysql_query($q);
				$new_answers_count=(0==mysql_error()?mysql_num_rows($res1):0);
				
				$data3[]='<tr class="'.implode(' ',$cl).' opros_list">'.
							 '<td><input type="checkbox" value="'.$row['id'].'" name="oid[]" style="width: 20px;"></td>'.
							 '<td style="width: 30px; text-align: center;">'.$row['id'].'</td>'.
							 '<td>'.$t_show.'</td>'.
							 '<td>'.output($row['title']).'</td>'.
							 '<td>'.date2str($row['date'],2).'</td>'.
							 '<td style="text-align: center;">'.$answers_count.'</td>'.
							 '<td style="text-align: center;">'.$new_answers_count.'</td>'.
							 '<td>'.(''!=trim($row['export_count'])?$row['export_count']:'').'</td>'.
							 '<td>'.(''!=trim($row['export_date'])?date2str($row['export_date'],2):'').'</td>'.
						 '</tr>';
				
				unset($cl);
			}
			$data1[]='<form id="opros_list" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=export" method="post">'.
			             '<input type="hidden" name="t" value="">'.
				         '<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.
								 '<tr class="header">'.
									 '<td>&nbsp;</td>'.
									 '<td>#</td>'.
									 '<td>show</td>'.
									 '<td>тема опроса</td>'.
									 '<td>начало</td>'.
									 '<td>кол-во<br />ответов</td>'.
									 '<td>кол-во<br />новых<br />ответов</td>'.
									 '<td>экспорт<br />(кол-во)</td>'.
									 '<td>экспорт<br />(дата)</td>'.
								 '</tr>'.
								 implode('',$data3).
							'</table>'.
						'</form>';
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
