<?php
/*
	експорт списк ответов на ОПРОС
*/
	
	
print '<pre>';
print_r ($_POST);
print '</pre>';
	$data1[]='<div style="position: relative; text-align: center;">'.
	             '<div style="position: relative; width: 900px; margin: 0 auto; text-align: left;">';
	
	while (list($key,$oid)=each($_POST['oid'])){
		$q='select * from `opros` where `id`="'.$oid.'" limit 1';
		$res=mysql_query($q);
		if (0==mysql_errno()){
			if (0<mysql_num_rows($res)){
				while ($row=mysql_fetch_assoc($res)){
					$data1[]='<p><strong>ОПРОС #'.$row['id'].'</strong>: '.output($row['title']).'</p>';

					$q='select * from `opros_fields` where `on`="1" and `opros_id`="'.$row['id'].'" order by `sort` asc, `id` asc';
					$res1=mysql_query($q);
					if (0==mysql_errno()){
						if (0<mysql_num_rows($res1)){
							$i=1;
							while ($row1=mysql_fetch_assoc($res1)){
								$data2[]='<li>'.output($row1['title']).(1==$row1['comment']?' (+ комментарий)':'').'</li>';
								$chk['opros_fields'][$row1['id']]=$row1;
								if (1==$row1['comment']){
									$cols_header[]='<td colspan="2">-'.($i++).'-</td>';
								}else{
									$cols_header[]='<td>-'.($i++).'-</td>';
								}
							}
							
							if (1==$row['callback_request']){
								$data2[]='<li>Контактные данные для обратного звонка.</li>';
								$cols_header[]='<td>-'.($i++).'-</td>';
							}
							$data1[]='<ol>'.implode('',$data2).'</ol>';
							unset($data2);
						}
					}else{ print mysql_error(); }
					
					if ('new'==$_POST['t']){
						$q='select * from `opros_answers` where `on`="1" and `opros_id`="'.$row['id'].'" and `export_count`="0" order by `id` asc';
					}elseif ('all'==$_POST['t']){
						$q='select * from `opros_answers` where `on`="1" and `opros_id`="'.$row['id'].'" order by `id` asc';
					}
					$res3=mysql_query($q);
					if (0==mysql_errno()){
						if (0<mysql_num_rows($res3)){
							$q='update `opros` set `export_count`=`export_count`+1, `export_date`=NOW() where `id`="'.$oid.'"';
							$res4=mysql_query($q);
							$i=0;
							while ($row3=mysql_fetch_assoc($res3)){
								//обновляем данные об экспорте ответа на опрос
								$q='update `opros_answers` set `export_count`=`export_count`+1, `export_date`=NOW() where `id`="'.$row3['id'].'" limit 1';
								$res4=mysql_query($q);
								
								$row_values=unserialize($row3['value']);
								
								reset($row_values);
								while (list($v_id,$v_data)=each($row_values)){
									if ('request'==trim($v_id)){
										$data3[]='<td>'.$v_data['callback_data'].'</td>';
									}else{
										if (isset($v_data['value']) && !is_array($v_data['value'])){
											$data3[]='<td>'.$v_data['value'].'</td>';
										}elseif (is_array($v_data)){
											while (list($key,$val)=each($v_data)){
												if (isset($val['value']) && ''!=trim($val['value'])){ $v_collect[]=trim($val['value']); }
											}
											$data3[]='<td>'.implode(', ',$v_collect).'</td>';
											unset($v_collect);
										}else{
											
										}
										if (isset($v_data['comment'])){
											$data3[]='<td>'.output($v_data['comment']).'</td>';
										}
									}
								}
								$data2[]='<tr '.(($i++)%2?'class="odd"':'class="even"').'>'.implode('',$data3).'</tr>';
								unset($data3);
							}
							$data1[]='<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1">'.
							             '<tr class="header">'.implode('',$cols_header).'</tr>'.
										 implode('',$data2).
									 '</table>';
							unset($data2);
						}
					}	
				}
			}else{ $data1[]='<!-- opros #'.$oid.' - not found -->'; }
		}

	}

	$data1[]='</div></div>';
	
