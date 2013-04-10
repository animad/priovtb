<?php

	class mod_tool extends tools{
		
		function mod_tool(){
			parent::tools();
		}
		
		//архив - список
		function archive_list(){
			global $_modvars,$_dir;
			
			//достаем список рассылки
			$d = dir($_dir['site'].$_modvars['place']['store']);
			while (false !== ($entry = $d->read())) {
				$fln=$_dir['site'].$_modvars['place']['store'].'/'.$entry;
				if(!is_dir($fln)){
					if(file_exists($fln) && filesize($fln)){
						$fp = fopen($fln, 'r');
						$data = unserialize(fread($fp, filesize($fln)));
						fclose($fp);
						$list[key($data)]=$data[key($data)];
					}
				}
			}
			$d->close();
			if(isset($data)){ unset($data); }
			
			if(isset($list)){
				reset($list);
				krsort($list);
				$j1=0;
				while(list($date,$val)=each($list)){
					if(($j1++)%2){ $bg='class="odd"'; }else{ $bg='class="even"'; }
					$data[]='<tr '.$bg.'>'.
					            '<td>'.date2str($date,3).'</td>'.
					            '<td>'.(isset($val['title']) && trim($val['title'])!=''?output($val['title']):'<div align="center">---</div>').'</td>'.
					            '<td align="center">'.(isset($val['log']['ok'])?count($val['log']['ok']):0).'</td>'.
					            '<td align="center">'.(isset($val['log']['bad'])?count($val['log']['bad']):0).'</td>'.
					            '<td class="pad1"><a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m='.$_GET['m'].'&fln='.$date.'" class="hrf">подробнее</a></td>'.
					        '</tr>';
				}
			}
			
			if(isset($data)){
				return '<table class="table1" border="0" cellspacing="1" cellpadding="5" align="center">'.
				            '<tr class="header">'.
				                '<td>дата</td>'.
				                '<td>тема</td>'.
				                '<td>успешно</td>'.
				                '<td>ошибок</td>'.
				                '<td>&nbsp;</td>'.
				            '</tr>'.
				            implode('',$data).
				        '</table>';
			}else{ return null; }
			
		}
		
		function archive_detales($fln){
			global $_modvars,$_dir;
			
			$fln = $_dir['site'].$_modvars['place']['store'].'/'.$fln;
			if(file_exists($fln) && filesize($fln)){
				$fp = fopen($fln, 'r');
				$data1 = fread($fp, filesize($fln));
				fclose($fp);
			}
			
			if(isset($data1)){
				$data1=unserialize($data1);
				$data[]='<table class="table1" border="0" cellspacing="1" cellpadding="5" align="center">'.
				            '<tr class="odd"><td>дата</td><td>'.date2str(key($data1),3).'</td></tr>'.
				            '<tr class="even"><td>тема</td><td>'.(isset($data1[key($data1)]['title']) && trim($data1[key($data1)]['title'])!=''?output($data1[key($data1)]['title']):'---').'</td></tr>'.
				            '<tr class="odd"><td style="vertical-align: top;">текст</td><td>'.pr($data1[key($data1)]['text']).'</td></tr>'.
				            '<tr class="even"><td>успешно</td><td>'.(isset($data1[key($data1)]['log']['ok'])?$this->get_emails($data1[key($data1)]['log']['ok']):'---').'</td></tr>'.
				            '<tr class="odd"><td>не отправлено</td><td>'.(isset($data1[key($data1)]['log']['bad'])?$this->get_emails($data1[key($data1)]['log']['bad']):'---').'</td></tr>'.
				        '</table>';
				return implode('',$data);
			}else{ return null; }
		}
		
		//новая рассылка
		function new_delivery(){
			global $mod;
		
			//задаем переменные ЭКЗЕМПЛЯРА редактора
			//--- jscript инициализации
			$k=1;
			$editor[$k]['jsinit']='<script type="text/javascript">'.$mod->tools['editorHTML']['js']['init']['minimal'].'</script>';
			$editor[$k]['html']=$mod->tools['editorHTML']['html']['textarea'];
			$editor[$k]['r']['sz_height']='200px';
			$editor[$k]['r']['sz_width']='500px';
			$editor[$k]['r']['work_element']='text';
			$editor[$k]['r']['css_body']='';
			$editor[$k]['r']['work_text']='';

			//--- производим замены переменных
			reset($editor);
			while(list($key1,$val1)=each($editor)){
				while(list($key,$val)=each($val1['r'])){
					$editor[$key1]['jsinit']=str_replace('%'.$key.'%',$val,$editor[$key1]['jsinit']);
					$editor[$key1]['html']=str_replace('%'.$key.'%',$val,$editor[$key1]['html']);
				}
			}
	
			//-- выводим в HTML jscript редактора
			$data[]=$mod->tools['editorHTML']['js']['load'];
			$data[]=$editor[1]['jsinit'];
			$data[]='<form name="editorDO" id="editorDO" method="post" action="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=new_delivery_process" style="margin: 0px; padding: 0px">';
			$data[]='<div style="text-align: center; position: relative;">';
			$data[]='<div style="text-align: left; position: relative; width: 500px; margin: 0 auto;">';
			$data[]='<div>тема рассылки</div>';
			$data[]='<br />';
			$data[]='<div><input name="subject" value="" class="input1"></div>';
			$data[]='<br />';
			$data[]='<div>текст рассылки</div>';
			$data[]='<br />';
			$data[]=$editor[1]['html'];
			$data[]='<br />';
			$data[]='<div style="text-align: center;"><input type="submit" value="ok"></div>';
			$data[]='</div>';
			$data[]='</div>';
			$data[]='</form>';

			return implode('',$data);
		}
		
		//--- получаем список адресов почты
		function get_emails($list,$view_limit=8){
			if(is_array($list) && count($list)>0){
				$t='`id`="'.implode('" or `id`="',$list).'"';
				
				$q='select * from `users` where '.$t;
				$res=$this->db_query($q);
				if($res[0]==true){
					while(list($key,$val)=each($res[1])){
						$data[$val['id']]=output($val['email']);
					}
				}
				
				for($i=0;$i<count($list);$i++){
					$t2[]=(isset($data[$list[$i]])?$data[$list[$i]]:$list[$i]);
				}
				return implode(', ',$t2);
			}
		}
		
		//--- управление подписчиками
		function subscribers(){
			$q='select * from `users` order by `id` desc';
			$res=$this->db_query($q);
			if($res[0]==true){
				for($i=0, $receive=0; $i<count($res[1]); $i++){ if($res[1][$i]['email']!=null && $res[1][$i]['on']==1){ $receive++; } }

				$data[]='<div>всего: '.count($res[1]).' | получают почту: '.$receive.'</div>';
				
				for($i=0; $i<count($res[1]); $i++){
//					$t_info='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=subscriber_info&id='.$res[1][$i]['id'].'" class="hrf81">i</a>';
					$t_info='';
					
					if($res[1][$i]['email']!=null){
						$st_bg=' background-color: #55B655;';
					}else{
						$st_bg=' background-color: white;';
					}
					
					if($res[1][$i]['on']==1){
						$t_on='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$res[1][$i]['id'].'&v=0" class="hrf81">выкл</a>';
					}else{
						$st_bg=' background-color: red;';
						$t_on='<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&m=visibility&id='.$res[1][$i]['id'].'&v=1" class="hrf81">вкл</a>';
					}
					if($res[1][$i]['email']!=null){
						if($res[1][$i]['show_name']!=null){
							$t=output($res[1][$i]['show_name']);
						}else{ $t=$res[1][$i]['email']; }
						$data[]='<span class="hrf_block1" style="'.$st_bg.'">'.$t_on.'|<a href="'.$_SERVER['PHP_SELF'].'?dr='.$_GET['dr'].'&id='.$res[1][$i]['id'].'&m=info"  class="hrf8" title="Подробнее">'.$t.'</a>'.$t_info.'</span>';
					}else{
						$data[]='<span class="hrf_block2" style="'.$st_bg.'">'.$t_on.'| ... '.$t_info.'</span>';
					}
				}
			}
			
			return isset($data)?'<div style="line-height: 25px; text-align: center;">'.implode(' ',$data).'</div>':null;
		}

		function info(){
			if(isset($_GET['id']) && $_GET['id']!=''){
				$q='select * from `users` where `id`="'.$_GET['id'].'"';
				$res=$this->db_query($q);
				if($res[0]==true){
					$u1=$res[1][0];
					$i=0;
				
					$data[]='<div style="text-align: center; margin-bottom: 10px;"><a href="'.$_SERVER['HTTP_REFERER'].'" class="hrf2">назад</a></div>';
				
					$data[]='<table border="0" cellspacing="1" cellpadding="5" align="center" class="table1">';
					$data[]='<col width="150px">';
					$data[]='<tr class="'.$this->io_rowcol(array('i'=>$i++)).'"><td>id</td><td>'.$u1['id'].'</td></tr>';
					$data[]='<tr class="'.$this->io_rowcol(array('i'=>$i++)).'"><td>состояние</td><td>'.($u1['on']==1?'ВКЛ':'ВЫКЛ').'</td></tr>';
					$data[]='<tr class="'.$this->io_rowcol(array('i'=>$i++)).'"><td>дата регистрации</td><td>'.date2str($u1['date'],2).'</td></tr>';
					$data[]='<tr class="'.$this->io_rowcol(array('i'=>$i++)).'"><td>отображаемое имя</td><td>'.($u1['show_name']!=null?output($u1['show_name']):'---').'</td></tr>';
					$data[]='<tr class="'.$this->io_rowcol(array('i'=>$i++)).'"><td>адрес e-mail</td><td><a href="mailto:'.$u1['email'].'">'.output($u1['email']).'</td></tr>';
					$data[]='</table>';
					
					
				}else{ $err=$this->err_log(7); }
			}else{ $err=$this->err_log(1); }
			
			if(isset($err)){
				return array(false,$err);
			}else{
				return array(true,implode('',$data));
			}
		}
		
	}
