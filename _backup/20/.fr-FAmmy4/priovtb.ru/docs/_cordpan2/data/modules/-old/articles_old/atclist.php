<?php
	function atclist(){
		global $_comvars,$mod,$_dir;
		
		$uId['editor']='c1af3547cafa189df8c2a846e37a9479';
		
		$link=connect($_comvars['mysql']);
		$pglist=new pageList;

		//--- дополнение КОМАНДНОЙ СТРОКИ		$mod->cmd_dop_info[]='<div class="dop_info">'.							     '<table border="0" cellspacing="0" cellpadding="0"><tr>'.									 '<td>'.									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=add" title="Новая статья">'.
										     '<div class="dop_info_box" onmouseover="className=\'dop_info_box_hover\'" onmouseout="className=\'dop_info_box\'">'.										         'Новая статья'.											 '</div>'.										 '</a>'.									 '</td>'.									 '<td class="dop_info_separator"><img src="images/point_blank.gif" border="0"></td>'.									 '<td>'.									     '<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=drop" title="Удалить все скрытые">'.
										     '<div class="dop_info_box" onmouseover="className=\'dop_info_box_hover\'" onmouseout="className=\'dop_info_box\'">'.										         'Удалить все скрытые'.											 '</div>'.										 '</a>'.									 '</td>'.								 '</tr></table>'.							 '</div>';		//----------------------------------------


		//--- список статей
		$q='select * from `docs` order by `date` desc';
		$res=mysql_query($q);
		print mysql_error();
		if(mysql_errno()<1 && mysql_num_rows($res)>0){
			while($row=mysql_fetch_assoc($res)){ $docs[]=$row; }

			//--- список меток
			$q='select `id`,`title` as "title" from `mmenu`';
			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				while($row=mysql_fetch_assoc($res)){
					$lables[$row['id']]=stripslashes($row['title']);
				}
			}
		
			//--- список привязок МЕТКА ДОКУМЕНТ
			$q='select * from `label2doc`';
			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				while($row=mysql_fetch_assoc($res)){ $l2d[]=$row; }
			}

			$pglist->get($docs,$_comvars['pglist']['lines_pp'],$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),$_comvars['pglist']['pages_pp'],$_comvars['pglist']['order']);

			if(is_array($pglist->list)){ reset($pglist->list); }
			$j1=0;
			while(list($key,$val)=each($pglist->list)){
				if(($j1++)%2){
					if($val['on']==1){ $bg='class="table1_rowOdd"'; }else{ $bg='class="table1_rowOdd_red"'; }
				}else{
					if($val['on']==1){ $bg='class="table1_rowEven"'; }else{ $bg='class="table1_rowEven_red"'; }
				}

				reset($l2d);
				while(list($key,$val2)=each($l2d)){
					if($val2['did']==$val['id'] && isset($lables[$val2['lid']])){
						$lab_list[]=$lables[$val2['lid']];
					}
				}
				if(!isset($lab_list)){ $lab_list[]='---'; }

				if($val['on']==1){
					$tool_sh='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=hide&id='.$val['id'].'" class="hrf">'.
						         'hide'.
						     '</a>';
				}else{
					$tool_sh='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=show&id='.$val['id'].'" class="hrf">'.
						         'show'.
						     '</a>';
				}

				//--- информация о файле СТАТЬИ
				$fln1=$_comvars['paths']['data'].'/'.$val['id'].'.html';
				$fln=$_dir['site'].'/'.$fln1;
				if(!file_exists($fln)){ fcc($fln,'file',''); }
				$fileinfo=filesize($fln);
				
				//--- 
				if(trim($val['href'])!='' && $val['href']!=null){
					$doc_href='<a href="'.$val['href'].'" target="_blank" class="hrf_href">'.
						          output($val['title']).
						      '</a>';
				}else{
					if(isset($mod->box[$uId['editor']])){
						$doc_href='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$uId['editor'].'&f2edit='.$fln1.'" class="hrf_edit">'.
							          output($val['title']).
							      '</a>';
					}else{
						$doc_href='<div style="margin-left: 15px;">'.output($val['title']).'</div>';
					}
				}
				
				
				$data_list[]='<tr '.$bg.'>'.
					             '<td align="center">'.$val['lineId'].'</td>'.
					             '<td class="pad1">'.$doc_href.'</td>'.
					             '<td class="pad1"><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=edit&id='.$val['id'].'" class="hrf"><img src="images/ico/b_edit.png" border="0" hspace="5"></a></td>'.
					             '<td>'.output(implode(', ',$lab_list)).'</td>'.
					             '<td>'.$fileinfo.'</td>'.
					             '<td align="center">'.date2str($val['date'],1).'</td>'.
					             '<td class="pad1">'.
					                 $tool_sh.
					             '</td>'.
					             
					         '</tr>';
				unset($lab_list);
			}
		}
		if(isset($data_list)){
			$data_header='<tr class="table1_header">'.
			                 '<td width="30">#</td>'.
			                 '<td width="350">статья (редактировать содержимое)</td>'.
			                 '<td>&nbsp;</td>'.
			                 '<td>метки</td>'.
			                 '<td width="50">размер</td>'.
			                 '<td>дата<br>размещения</td>'.
			                 '<td>&nbsp;</td>'.
			             '</tr>';
		
		
			$data_list='<table border="0" cellspacing="1" cellpadding="5" class="table1" align="center">'.$data_header.implode('',$data_list).'</table>';
		
			$data=($pglist->pglist!=null?$pglist->pglist.'<br>':'').
				  $data_list.
				  ($pglist->pglist!=null?'<br>'.$pglist->pglist:'');
		
			return $data;
		}else{ return ''; }
		
		close($link);
	}
?>
