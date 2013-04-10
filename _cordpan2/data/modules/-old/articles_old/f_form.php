<?php
	
	function form_draw(){
		function rows($i){
			return ($i)%2?'class="table1_rowOdd"':'class="table1_rowEven"';
		}
	
		global $_comvars;
		$link=connect($_comvars['mysql']);

		$j1=0;
		$w1='width="150"';
		$w2='width="20" align="center"';

		//--- список меток
		$q='select `id`,`title` as "title",`parent` from `mmenu`';
		$res=mysql_query($q);
		print mysql_error();
		if(mysql_errno()<1 && mysql_num_rows($res)>0){
			while($row=mysql_fetch_assoc($res)){
				$lables[$row['parent']][$row['id']]=stripslashes($row['title']);
			}
		}

		if(isset($_GET['id']) || isset($_SESSION['er']['id'])){
			$title1='<h1>Редактирование ссылки на статью</h1>';
			$btn='<div align="center" style="margin-top: 5px; margin-bottom: 5px"><input type="submit" value="Сохранить"></div>';
		}else{
			$title1='<h1>Создание ссылки на статью</h1>';
			$btn='<div align="center" style="margin-top: 5px; margin-bottom: 5px"><input type="submit" value="Ok"></div>';
		}

		if(isset($_SESSION['er'])){

			$dest1=isset($_SESSION['er']['dest1'])?trim($_SESSION['er']['dest1']):'';
			$dest2=isset($_SESSION['er']['dest2'])?trim($_SESSION['er']['dest2']):'';

			if(isset($_SESSION['er']['id'])){
				$q='select * from `docs` where `id`="'.$_SESSION['er']['id'].'"';
				$res=mysql_query($q);
				print mysql_error();
				if(mysql_errno()<1 && mysql_num_rows($res)>0){
					$doc=mysql_fetch_assoc($res);

					$q='select `mmenu`.`parent` as "parent",
						       `mmenu`.`id` as "id"
						from `label2doc`, `mmenu`
						where `label2doc`.`did`="'.$_GET['id'].'"
						and `mmenu`.`id`=`label2doc`.`lid`';
					$res=mysql_query($q);
					print mysql_error();
					if(mysql_errno()<1 && mysql_num_rows($res)>0){
						while($row=mysql_fetch_assoc($res)){
							$lables1[$row['parent']]=$row['id'];
						}
					}

				}
			}
			

			$title=isset($_SESSION['er']['title'])?trim($_SESSION['er']['title']):'';
			$href=isset($_SESSION['er']['href'])?trim($_SESSION['er']['href']):'';

			//---
			$t1[]='<option value=""></option>';
			while(list($key,$val)=each($lables['left'])){ $t1[]='<option value="'.$key.'" '.(isset($_SESSION['er']['theme']) && $_SESSION['er']['theme']==$key?'selected':'').'>'.output($val).'</option>'; }
			if(isset($t1)){	$theme='<select id="theme" name="theme">'.implode('',$t1).'</select>'; unset($t1); }
			
			//---
			$t1[]='<option value=""></option>';
			while(list($key,$val)=each($lables['right'])){ $t1[]='<option value="'.$key.'" '.(isset($_SESSION['er']['section']) && $_SESSION['er']['section']==$key?'selected':'').'>'.output($val).'</option>'; }
			if(isset($t1)){	$section='<select id="section" name="section">'.implode('',$t1).'</select>'; unset($t1); }

			//---
			$t1[]='<option value="1" '.(isset($_SESSION['er']['show']) && $_SESSION['er']['show']==1?'selected':'').'>Вкл</option>';
			$t1[]='<option value="0" '.(isset($_SESSION['er']['show']) && $_SESSION['er']['show']==0?'selected':'').'>Выкл</option>';
			$show='<select id="show" name="show">'.implode('',$t1).'</select>';
			unset($t1);

			$overview=isset($_SESSION['er']['overview'])?trim($_SESSION['er']['overview']):'';
			
			$erm=isset($_SESSION['er']['msg'])?'<div class="errormsg">'.output($_SESSION['er']['msg']).'</div>':'';

			unset($_SESSION['er']);
		}
		
		if((!isset($erm) || isset($erm) && trim($erm)=='') &&  !isset($_SESSION['er']) && isset($_GET['id'])){

			$dest1=isset($_POST['dest1'])?$_POST['dest1']:'save';
			$dest2=isset($_POST['dest2'])?$_POST['dest2']:'edit';

			$q='select * from `docs` where `id`="'.$_GET['id'].'"';
			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				$doc=mysql_fetch_assoc($res);
				
				$q='select `mmenu`.`parent` as "parent",
				           `mmenu`.`id` as "id"
				    from `label2doc`, `mmenu`
				    where `label2doc`.`did`="'.$_GET['id'].'"
				    and `mmenu`.`id`=`label2doc`.`lid`';
				$res=mysql_query($q);
				print mysql_error();
				if(mysql_errno()<1 && mysql_num_rows($res)>0){
					while($row=mysql_fetch_assoc($res)){
						$lables1[$row['parent']]=$row['id'];
					}
				}
				
				//---
				$t1[]='<option value=""></option>';
				while(list($key,$val)=each($lables['left'])){ $t1[]='<option value="'.$key.'" '.(isset($lables1['left']) && $lables1['left']==$key?'selected':'').'>'.output($val).'</option>'; }
				if(isset($t1)){	$theme='<select id="theme" name="theme">'.implode('',$t1).'</select>'; unset($t1); }
		
				//---
				$t1[]='<option value=""></option>';
				while(list($key,$val)=each($lables['right'])){ $t1[]='<option value="'.$key.'" '.(isset($lables1['right']) && $lables1['right']==$key?'selected':'').'>'.output($val).'</option>'; }
				if(isset($t1)){	$section='<select id="section" name="section">'.implode('',$t1).'</select>'; unset($t1); }
		
				//---
				$t1[]='<option value="1" '.($doc['on']==1?'selected':'').'>Вкл</option>';
				$t1[]='<option value="0" '.($doc['on']==0?'selected':'').'>Выкл</option>';
				$show='<select id="show" name="show">'.implode('',$t1).'</select>';
				unset($t1);
		
		
				//---
				$title=stripslashes($doc['title']);
				$href=stripslashes($doc['href']);
				$overview=stripslashes($doc['overview']);
		
				$erm='';
			
			}else{ unset($_GET['id']); }
		}
		
		if((!isset($erm) || isset($erm) && trim($erm)=='') && !isset($_SESSION['er']) && !isset($_GET['id'])){
			$dest1=isset($_POST['dest1'])?$_POST['dest1']:'create';
			$dest2=isset($_POST['dest2'])?$_POST['dest2']:'add';

			//---
			$t1[]='<option value=""></option>';
			while(list($key,$val)=each($lables['left'])){ $t1[]='<option value="'.$key.'">'.output($val).'</option>'; }
			if(isset($t1)){	$theme='<select id="theme" name="theme">'.implode('',$t1).'</select>'; unset($t1); }
		
			//---
			$t1[]='<option value=""></option>';
			while(list($key,$val)=each($lables['right'])){ $t1[]='<option value="'.$key.'">'.output($val).'</option>'; }
			if(isset($t1)){	$section='<select id="section" name="section">'.implode('',$t1).'</select>'; unset($t1); }
		
			//---
			$t1[]='<option value="1" selected>Вкл</option>';
			$t1[]='<option value="0">Выкл</option>';
			$show='<select id="show" name="show">'.implode('',$t1).'</select>';
			unset($t1);
		
		
			//---
			$title='';
			$href='';
			$overview='';
		
			$erm='';
		}
		
		$data=$title1.
		      '<form id="do" name="do" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m='.$dest1.'" method="post">'.
		          '<input type="hidden" name="dest2" value="'.$dest2.'">'.
		          (isset($_GET['id'])?'<input type="hidden" name="id" value="'.$_GET['id'].'">':'').
		      '<table border="0" width="500" cellspacing="1" cellpadding="5" class="table1" align="center">'.
		          '<tr '.rows($j1++).'>'.
		              '<td '.$w1.'>- отображать -</td>'.
		              '<td '.$w2.'>&nbsp;</td>'.
		              '<td>'.$show.'</td>'.
		          '</tr>'.
		          '<tr '.rows($j1++).'>'.
		              '<td '.$w1.'>Заголовок</td>'.
		              '<td '.$w2.'>*</td>'.
		              '<td><input id="title" name="title" type="text" value="'.$title.'"></td>'.
		          '</tr>'.
		          '<tr '.rows($j1++).'>'.
		              '<td '.$w1.'>Тема (левый)</td>'.
		              '<td '.$w2.'>*</td>'.
		              '<td>'.$theme.'</td>'.
		          '</tr>'.
		          '<tr '.rows($j1++).'>'.
		              '<td '.$w1.'>Раздел (правый)</td>'.
		              '<td '.$w2.'>*</td>'.
		              '<td>'.$section.'</td>'.
		          '</tr>'.
		          '<tr '.rows($j1++).'>'.
		              '<td '.$w1.' valign="top">Краткий обзор</td>'.
		              '<td '.$w2.'>&nbsp;</td>'.
		              '<td><textarea id="overview" name="overview">'.$overview.'</textarea></td>'.
		          '</tr>'.
		          '<tr '.rows($j1++).'>'.
		              '<td '.$w1.'>Ссылка на сатью</td>'.
		              '<td '.$w2.'>&nbsp;</td>'.
		              '<td><input id="href" name="href" type="text" value="'.$href.'"></td>'.
		          '</tr>'.
		      '</table>'.
		      $btn.
		      $erm.
		      '</form>';

		return $data;
		
		close($link);

	}
	
?>
