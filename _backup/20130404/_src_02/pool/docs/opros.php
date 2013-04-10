<script type="text/javascript" src="files/skin/%skin%/scripts/opros.js"></script>
<link href="files/skin/%skin%/styles/opros.css" rel="stylesheet" type="text/css" media="all">
<![if lt IE 8]>
	<link href="files/skin/%skin%/styles/opros_ie.css" rel="stylesheet" type="text/css" media="all">
<![endif]>

<?php
	//--- обработка формы
	
	if (isset($_POST['do']) && 'store'==trim($_POST['do'])){
		$q='insert
		    into `opros_answers`
		    (`on`,`date`,`opros_id`,`remote_ip`,`user_id`,`value`,`office`)
			values
			(
				"1",
				NOW(),
				"'.$_POST['opros_id'].'",
				"'.$_SERVER['REMOTE_ADDR'].'",
				'.(isset($_SESSION['user']['id'])?'"'.$_SESSION['user']['id'].'"':'null').',
				"'.input(serialize($_POST['r'])).'",
				"'.input($_POST['office']).'"
			)';
		$res=mysql_query($q);
		if (0<mysql_errno()){
			$ans=array(
				'msg_type'=>false,
				'msg'=>'В момент обработки Вашего ответа, произошла ошибка. Пожалуйста, попробуйте позже.'
			);
			$_SESSION['opros']['ret']=$_POST;
			
		}else{
			$ans=array(
				'msg_type'=>true,
				'msg'=>'Спасибо! Ваш ответ сохранен.'
			);
		}
		$_SESSION['opros']['ans']=$ans;
	}
	
?>



<div class="page opros" style="text-align: left;">
	<form id="opros_01" action="<?php print $_SERVER['PHP_SELF']; ?>?dr=<?php print $_GET['dr']; ?>&id=<?php print $_GET['id']; ?>" onSubmit="return opros_form_check('#opros_01');" method="post">
		<input type="hidden" name="do" value="store">
		
<?php
	if (isset($_GET['id'])){
		//--- ответ после обработки запроса
		if (isset($_SESSION['opros']['ans']) && true==$_SESSION['opros']['ans']['msg_type']){
			$q='select * from `opros` where `id`="'.$_GET['id'].'" and `on`="1" limit 1';
			$res=mysql_query($q);
			if (1>mysql_errno()){
				if (0<mysql_num_rows($res)){
					while ($row=mysql_fetch_assoc($res)){
						if (1==$row['on']){
							print '<h1>'.$row['title'].'</h1>';
							print '<div class="message"><div class="ok">'.output($_SESSION['opros']['ans']['msg']).'</div></div>';
							print '<div style="text-align: center; margin: 10px 0;"><a href="'.$_SERVER['URI_REQUEST'].'" class="hrf6">Вернуться</a></div>';
						}
					}
				}
			}
		}else{
			//--- вывод ОПРОСА
			$q='select * from `opros` where `id`="'.$_GET['id'].'" and `on`="1" limit 1';
			$res=mysql_query($q);
			if (1>mysql_errno()){
				if (0<mysql_num_rows($res)){
					while ($row=mysql_fetch_assoc($res)){
						if (1==$row['on']){
							print '<input type="hidden" name="opros_id" value="'.$_GET['id'].'">';

							print '<h1>'.$row['title'].'</h1>';
							//--- выводим список 
							print '<div class="row">'.
								      '<div class="al" style="margin-left: 55px;">Выберите офис банка:&nbsp;</div>'.
									  '<div class="al">'.office_selector().'</div>'.
									  '<div class="collbreak"></div>'.
								  '</div>';
		
							
							$q='select *
								from `opros_fields`
								where 1
								and `on`="1"
								and `opros_id`="'.$row['id'].'"';
							$res2=mysql_query($q);
							if (1>mysql_errno()){
								if (0<mysql_num_rows($res)){
									
									while ($row2=mysql_fetch_assoc($res2)){
										if ('text'==$row2['type'] || 'options'==$row2['type'] && ''!=trim($row2['answers'])){
											if ('options'==$row2['type'] && ''!=trim($row2['answers'])){
												$q='select *
													from `opros_answers_var`
													where 1
													and `grp`="'.$row2['answers'].'"
													and `on`="1"
													order by `order` asc, `id` asc';
												$res3=mysql_query($q);
												if (1>mysql_errno()){
													if (0<mysql_num_rows($res3)){
														$i=0;
														while ($row3=mysql_fetch_assoc($res3)){
															$d[]='<li class="switcher marg1" name="'.$row3['id'].'" value="'.$row3['value'].'" style="'.(''!=trim($row3['width'])?'width: '.$row3['width'].';':'').(0==($i++)?' background-image: none;':'').'">'.$row3['title'].'</li>';
															if ('once'==$row2['answer_variant']){
																$v='<input type="hidden" id="r'.$row2['id'].'_value" name="r['.$row2['id'].'][value]" value="">';
															}elseif ('multiple'==$row2['answer_variant']){
																$v[]='<input type="hidden" id="r'.$row2['id'].'_'.$row3['id'].'_value" name="r['.$row2['id'].']['.$row3['id'].'][value]" value="">';
															}
														}
													}
												}
												if (!isset($d)){
													$d='';
												}else{ $d=implode('',$d); }
											}elseif ('text'==$row2['type']){
												
											}
											
											$l_opt[]='list_'.$row2['type'];
											$l_opt[]='click';
											$l_opt[]=(1==$row2['required']?'required':'');
											$l_opt[]=$row2['answer_variant'];
											$l_opt[]=$row2['position_type'];
										
											print '<div id="r'.$row2['id'].'" class="row">';
												print '<div class="col w1 al tac marg1">'.$row2['id'].'</div>';
												print '<div class="col w2 al marg1" '.(''!=trim($row2['title_width'])?'style="width: '.$row2['title_width'].'"':'').'>'.
													      $row2['title'].
													      (''!=trim($row2['description'])?'<div class="description">'.$row2['description'].'</div>':'').
													  '</div>';
												if ('options'==$row2['type']){
													print '<div class="col answer '.(1==$row2['as_nl']?'nl marg2':'ar').'" style="'.(''!=trim($row2['af_width'])?'width: '.$row2['af_width']:'').'">';
														print '<div class="ans_var">';
															print (is_array($v)?implode('',$v):$v);
															print '<ul id="r['.$row2['id'].'][answer]" name="r'.$row2['id'].'" class="'.implode(' ',$l_opt).'">'.$d.'</ul>';
															print '<div class="collbreak"></div>';
														print '</div>';
													print '</div>';
												}elseif ('text'==$row2['type']){
													if (1==$row2['as_nl']){ print '<div class="collbreak"></div>'; }
													print '<div class="col answer '.(1!=$row2['as_nl']?'ar':'').'" style="'.(''!=trim($row2['af_width'])?'width: '.$row2['af_width']:'').'">';
														print '<div '.(1==$row2['as_nl']?'style="padding-left: 55px;"':'').'>';
															print '<div class="marg_top0"><textarea id="r['.$row2['id'].'][answer]" name="r['.$row2['id'].'][value]" class="marg_top0 inp1 '.implode(' ',$l_opt).'" style="width: 100%; padding: 0;"></textarea></div>';
														print '</div>';
													print '</div>';
												}
												print '<div class="collbreak"></div>';
											print '</div>';
											if (1==$row2['comment']){
												print '<div class="row">'.
												          '<div class="marg2 al">Комментарий:</div>'.
														  '<div class="ar marg1 marg_top0" style="width: 780px;">'.
														      '<textarea class="marg_top0 inp1" style="width: 100%;" name="r['.$row2['id'].'][comment]"></textarea>'.
														  '</div>'.
														  '<div class="collbreak"></div>'.
													  '</div>';
											}
										}else{
											print "\r\n\r\n".'<!-- Внимание! Вопрос№'.$row2['id'].' не содержит вариантов ответа. -->'."\r\n\r\n";
										}
										unset($d);
										unset($v);
										unset($l_opt);
									}
									if (1==$row['callback_request']){
										print '<div class="row" style="margin: 10px 0;">'.
										          '<div class="al col marg1" style="margin-left: 55px;">Вы хотите, чтобы сотрудник банка связался с Вами для обсуждения качества обслуживания?</div>'.
												  '<div class="col answer ar">'.
												      '<div class="ans_var">'.
													      '<input type="hidden" id="r_request_value" name="r[request][value]">'.
													      '<ul name="r_request" class="list_options click once horizontal">'.
														      '<li class="switcher marg1" style="width: 80px;" onClick="request_show_switch(this);" name="show" value="1">Да</li>'.
														      '<li class="switcher marg1 active" style="width: 80px;" onClick="request_show_switch(this);" name="hide" value="0">Нет</li>'.
													      '</ul>'.
														  '<div class="collbreak"></div>'.
													  '</div>'.
												  '</div>'.
												  '<div class="col nl marg2" style="display: none;" id="callback_info"><div>Укажите Ваши Ф.И.О., телефон или электронную почту:</div><textarea style="width: 100%;" class="callback_data inp1" id="callback_data" name="r[request][callback_data]"></textarea></div>'.
												  '<div class="collbreak"></div>'.
											  '</div>';
									}
									
									print '<div style="margin: 5px; text-align: center;"><input type="submit" value="Ответить">&nbsp;&nbsp;<input type="reset" value="Сброс"></div>';
									
									if (isset($_SESSION['opros']['ans']) && false==$_SESSION['opros']['ans']['msg_type']){
										print '<div class="message"><div class="fail">'.output($_SESSION['opros']['ans']['msg']).'</div></div>';
									}
									
								}else{ print '<div>Пункты опроса не найдены.</div>'; }
							}else{ print '<div>Ошибка при выборе пунктов опроса.</div>'; }
						}else{ print '<div>Вы выбрали не корректный опрос.</div>'; }
					}
				}else{ print '<div>Выбранный опрос не найден.</div>'; }
			}else{ print '<div>Ошибка при выборе опроса.</div>'; }
		}
		unset($_SESSION['opros']);
	}else{
		//--- список опросов
		
		$q='select * from `opros` where `on`="1" and `date_end` is null order by `id` desc';
		$res=mysql_query($q);
		if (mysql_errno()<1){
			print '<ul class="list3">';
			while ($row=mysql_fetch_assoc($res)){
				print '<li><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&id='.$row['id'].'">'.$row['title'].'</li>';
			}
			print '</ul>';
		}
	}
?>
	</form>
</div>