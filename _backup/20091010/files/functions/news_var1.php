<?php

	class news{
		var $lines;
		var $pr;
		var $rows;
		
		function collect($on=1,$id=null, $limit=10, $order='desc', $order_by='date'){
			$q='select * from `news` where `on`="'.$on.'"'.($id!=null?' and `id`="'.$id.'"':'').' order by `'.$order_by.'` '.$order.' limit '.$limit;

			$res=mysql_query($q);
			print mysql_error();
			if(mysql_errno()<1 && mysql_num_rows($res)>0){
				while($row=mysql_fetch_assoc($res)){ $this->lines[]=$row; }
			}
		}
		
		function create_row($row=null,$j1=0,$skin=1){
			if($j1%2){ $bg=' class="even"'; }else{ $bg=' class="odd"'; }
			
			switch($skin){
				case 1:
					$this->rows[]='<tr'.$bg.'">'.
							          '<td class="l"></td>'.
									  '<td class="data">'.
									      '<a href="'.$row['hrf'].'" class="h1"><b>'.date2str($row['date']).'</b> - '.$row['title'].'</a>'.
									  '</td>'.
									  '<td class="r"></td>'.
								  '</tr>';
				break;
				case 2:
					$this->rows[]='<tr'.$bg.'">'.
							          '<td class="l"></td>'.
									  '<td class="data">'.
									      '<a href="'.$row['hrf'].'" class="h1"><b>'.date2str($row['date']).'</b> - '.$row['title'].'</a>'.
									  '</td>'.
									  '<td class="r"></td>'.
								  '</tr>';
				break;
			}
		}
		
		function output($title=null,$width="100%",$skin=1){

			switch($skin){
				case 1:
					if($title!=null){
						$title='<tr class="header1"><td class="tl"></td><td class="t"></td><td class="tr"></td></tr>'.
					              '<tr class="header1"><td class="l"></td><td class="data">'.$title.'</td><td class="r"></td></tr>';
					}else{
						$title='<tr><td class="tl"></td><td class="t"></td><td class="tr"></td></tr>';
					}
					
					
					$this->pr='<div class="block_news">'.
					          '<table class="table1" width="'.$width.'">'.
					              $title.
					              ($this->rows!=null?implode('',$this->rows):'').
					              '<tr class="footer"><td class="l"></td><td class="data">'.
					                  '<form name="" action="" style="margin: 0; padding: 0;">'.
					                      '<table class="form1" cellpadding="2"><tr>'.
					                          '<td width="160" class="text1">����������� �� �������</td>'.
					                          '<td width="5">&nbsp;</td>'.
					                          '<td width="150"><input name="email" id="email" type="text" value="" class="input"></td>'.
					                          '<td width="5">&nbsp;</td>'.
					                          '<td width="40"><a href="#" onClick="get_news(document.getElementById(\'email\').value); return false;">��</a></td>'.
					                          '<td></td>'.
					                          '<td width="120"><a href="?dr=news_all.php">����� ��������</a></td>'.
									      '</tr></table>'.
								      '</form>'.
							      '</td><td class="r"></td></tr>'.
							      '<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>'.
						      '</table>'.
					      '</div>';
				break;
				case 2:
					if($title!=null){
						$title='<tr class="header1"><td class="tl"></td><td class="t"></td><td class="tr"></td></tr>'.
					              '<tr class="header1"><td class="l"></td><td class="data">'.$title.'</td><td class="r"></td></tr>';
					}else{
						$title='<tr><td class="tl"></td><td class="t"></td><td class="tr"></td></tr>';
					}
					
					
					$this->pr='<div class="block1">'.
					          '<table class="table1" width="'.$width.'">'.
					              $title.
					              ($this->rows!=null?implode('',$this->rows):'').
							      '<tr><td class="bl"></td><td class="b"></td><td class="br"></td></tr>'.
						      '</table>'.
					      '</div>';
				break;

			}
		}
		
		function read($id=null){
			if($id!=null){
				//--- ������� �� ��
				$this->collect(1,$id);
				//--- �������� �����������
				$fln='pool/news/'.$this->lines[0]['id'].'.php';
				if(file_exists($fln) && filesize($fln)){
					$fp=fopen($fln,"r");
					$this->pr=fread($fp,filesize($fln));
					fclose ($fp);
				}else{ $this->pr='���� �� ������'; } //--- ���� ����� �� ������
			}else{ $this->pr='������ �� �������'; } //--- ������ �� �������
		}
		
		function nlist(){
			global $globals;

			$this->collect();
			$pageList=new pageList();
			$pageList->get($this->lines,$globals['pglist']['lines_pp'],$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),$globals['pglist']['pages_pp'],'desc');
			
			$i=0;
			reset($pageList->list);
			while(list($key,$val)=each($pageList->list)){
				$this->create_row(array('date'=>$val['date'],'title'=>$val['title'],'hrf'=>'?dr=news.php&id='.$val['id']),$i++,2);
			}
			
			$this->output(null,'100%',2);
			if($pageList->pglist!=null){ $this->pr=$pageList->pglist."\r\n".$this->pr."\r\n".$pageList->pglist; }
		}
	}
	
?>