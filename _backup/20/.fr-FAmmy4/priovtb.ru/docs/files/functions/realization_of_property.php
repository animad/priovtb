<?php

	class rp{
	
		function categ_list1(){
//--- выводит список категорий залогового имущества
			
			$q='select * from `rp_list` where `on`="1" and `type`="cat"';
			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				while($row=mysql_fetch_assoc($res)){
					$q1='select * from `rp_list` where `on`="1" and `parent`="'.$row['id'].'"';
					$res1=mysql_query($q1);
					print mysql_error();
					if(mysql_errno()<1 && mysql_num_rows($res1)>0){
						$data[]='<span href="?dr='.$_GET['dr'].'#'.$row['type'].'_'.$row['id'].'" class="btn"><span>'.output($row['title']).'</span></span>';
					}
				}
			}
			
			if (isset($data)){
				$data2='<div class="rp_filter">'.
						   '<span href="#all" class="btn dec2"><span>Полный список</span></span>'.
						   implode(' ',$data).
					   '</div>';
				return array(true,$data2,$data);
				
			}else{
				return array(false,null);
			}
		}
		
		function property_list1(){
//--- выводит полный список залогового имущества
		
			$d['cur']['rur']='РУБ';
			$d['cur']['usd']='USD';
			$d['cur']['eur']='EUR';
			
			$q='select * from `rp_list` where `on`="1" and (`type`="obj" or `type`="doc")';
			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				while($row=mysql_fetch_assoc($res)){
					if (''!=trim($row['val'])){
						$tmp1=parse_ini_string(trim($row['val']));
					}
					if (isset($tmp1['price'])){
						$val1['price']=strrev(chunk_split(strrev($tmp1['price']),3,' ')).(isset($tmp1['currency'])?' <br />('.$d['cur'][trim($tmp1['currency'])].')':'');
					}else{ $val1['price']=''; }

					$info='<div class="info">Узнать подробнее ...</div>';
					if (''!=trim($row['filename'])){
						$href=' href="/pool/files/rp/'.trim($row['filename']).'"';
					}else{
						$fln2='pool/docs/rp/'.$row['id'].'.html';
						if (file_exists($fln2) && filesize($fln2)){
							$href=' href="?dr='.$_GET['dr'].'&p='.$row['id'].'"';
						}else{
							$info='';
							$href='';
						}
					}
					
					$data[]='<div class="row r'.$row['id'].(null!=$row['parent']?' cat_'.$row['parent']:'').'"'.$href.'>'.
								'<div class="col_10 num"></div>'.
								'<div class="col_20">'.
									'<div class="title">'.output($row['title']).'</div>'.
									'<table class="table1"><tr>'.
										'<td class="col_22 about">'.output($row['text']).$info.'</td>'.
										(''!=$val1['price']?'<td class="col_23 price">'.$val1['price'].'</td>':'').
									'</tr></table>'.
								'</div>'.
							'</div>';
					unset($tmp1);
				}
			}
			
			if (isset($data)){
				$data2='<div class="rp_list">'.
						   implode("\r\n",$data).
						   '<div class="rp_list_absent hide">В выбранной категории залоговое имущество отсутствует</div>'.
					   '</div>';
				return array(true,$data2,$data);
				
			}else{
				return array(false,null);
			}
			
		}

		function property_list2(){
//--- выводит полный список залогового имущества
		
			$d['cur']['rur']='РУБ';
			$d['cur']['usd']='USD';
			$d['cur']['eur']='EUR';
			
			
			$q='select * from `rp_list` where `on`="1" and `type`="cat" order by `order` asc, `id` asc';
			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				while($cat=mysql_fetch_assoc($res)){
					
					
					$q1='select * from `rp_list` where `on`="1" and `type`="obj" and `parent`="'.$cat['id'].'" order by `order` asc, `id` asc';
					$res1=mysql_query($q1);
					print mysql_error();
					if(mysql_errno()<1 && mysql_num_rows($res1)>0){
						$data3[]='<div class="h1">'.output($cat['title']).'</div>';
						while($row=mysql_fetch_assoc($res1)){

							if (''!=trim($row['val'])){
								$tmp1=parse_ini_string(trim($row['val']));
							}
							if (isset($tmp1['price'])){
								$val1['price']=strrev(chunk_split(strrev($tmp1['price']),3,' ')).(isset($tmp1['currency'])?' <br />('.$d['cur'][trim($tmp1['currency'])].')':'');
							}else{ $val1['price']=''; }

							if (''!=trim($row['filename'])){
								$href=' href="/pool/files/rp/'.trim($row['filename']).'"';
							}else{
								$fln2='pool/docs/rp/'.$row['id'].'.html';
								if (file_exists($fln2) && filesize($fln2)){
									$href=' href="?dr='.$_GET['dr'].'&p='.$row['id'].'"';
								}else{
									$href='';
								}
							}

							$data3[]='<div class="row"'.$href.'>'.output($row['title']).' <span class="info">&nbsp;&raquo;&nbsp;<em>Узнать подробнее</em></span></div>';
						}
					}
					
				}
			}
			
			if (isset($data3)){
				$data[]=implode('',$data3);
			}
/*
			
			$q='select * from `rp_list` where `on`="1" and (`type`="obj" or `type`="doc")';
			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				while($row=mysql_fetch_assoc($res)){
					if (''!=trim($row['val'])){
						$tmp1=parse_ini_string(trim($row['val']));
					}
					if (isset($tmp1['price'])){
						$val1['price']=strrev(chunk_split(strrev($tmp1['price']),3,' ')).(isset($tmp1['currency'])?' <br />('.$d['cur'][trim($tmp1['currency'])].')':'');
					}else{ $val1['price']=''; }

					$info='<div class="info">Узнать подробнее ...</div>';
					if (''!=trim($row['filename'])){
						$href=' href="/pool/files/rp/'.trim($row['filename']).'"';
					}else{
						$fln2='pool/docs/rp/'.$row['id'].'.html';
						if (file_exists($fln2) && filesize($fln2)){
							$href=' href="?dr='.$_GET['dr'].'&p='.$row['id'].'"';
						}else{
							$info='';
							$href='';
						}
					}
					
					$data[]='<div class="row r'.$row['id'].(null!=$row['parent']?' cat_'.$row['parent']:'').'"'.$href.'>'.
								'<div class="col_10 num"></div>'.
								'<div class="col_20">'.
									'<div class="title">'.output($row['title']).'</div>'.
									'<table class="table1"><tr>'.
										'<td class="col_22 about">'.output($row['text']).$info.'</td>'.
										(''!=$val1['price']?'<td class="col_23 price">'.$val1['price'].'</td>':'').
									'</tr></table>'.
								'</div>'.
							'</div>';
					unset($tmp1);
				}
			}
*/
			if (isset($data)){
				$data2='<div class="rp_list">'.
						   implode("\r\n",$data).
						   '<div class="rp_list_absent hide">В выбранной категории залоговое имущество отсутствует</div>'.
					   '</div>';
				return array(true,$data2,$data);
				
			}else{
				return array(false,null);
			}
			
		}
		
		function property_get($_arg=null){
//--- выбирает данные по указанному залоговому объекту
			
			if ($_arg['pid']){
				$q='select * from `rp_list` where `id`="'.input($_arg['pid']).'" and `on`="1" and (`type`="obj" or `type`="doc") limit 1';
				$res=mysql_query($q);
				print mysql_error();
				if (mysql_errno()<1 && mysql_num_rows($res)>0){
					$data=mysql_fetch_assoc($res);
				
					$fln='pool/docs/rp/'.$data['id'].'.html';
					if(file_exists($fln) && filesize($fln)){
						$fp=fopen($fln,'a+');
						$data['page']=fread($fp,filesize($fln));
						fclose($fp);
					}else{ $data['page']=''; }
				}
				
				///--- получаем информацию о КАТЕГОРИИ
				$q='select * from `rp_list` where `id`="'.$data['parent'].'" limit 1';
				$res=mysql_query($q);
				print mysql_error();
				if (mysql_errno()<1 && mysql_num_rows($res)>0){
					$data['parent']=mysql_fetch_assoc($res);
				}
				
				//--- выбираем картинки
				$q='select * from `rp_pics` where `rp_list_parent`="'.$data['id'].'" and `on`="1" order by `order` asc, `id` asc';
				$res=mysql_query($q);
				print mysql_error();
				if (mysql_errno()<1 && mysql_num_rows($res)>0){
					while($row=mysql_fetch_assoc($res)){
						$data['images'][]=$row;
					}
				}
				
			}

			if (isset($data)){
				return array(true,$data);
			}else{
				return array(false,$_arg);
			}
		}
	
	}
	
?>
