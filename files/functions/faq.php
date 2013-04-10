<?php
	
	class faq{
		var $out;
		
		function collect($id=null){
			
			if($id!=null){
				$q='select * from `faq_question` where `on`="1" and `theme`="'.$id.'" order by `id` desc';
				$res=mysql_query($q);
				if(mysql_errno()<1){
					if(mysql_num_rows($res)>0){
						$pglist=new pageList;
						$pglist->get($res,20,$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),10,'desc');
						
						$j1=0;
						reset($pglist->list);
						while(list($key,$row)=each($pglist->list)){
							$data[]='<tr'.colrow($j1++).'>'.
							            '<td width="25" align="center" valign="top">'.$row['lineId'].'</td>'.
							            '<td width="325" valign="top">'.pr($row['question'],null,15,true).'</td>'.
							            '<td valign="top">'.pr($row['answer'],null,15,true).'</td>'.
							        '</tr>';
						}
					}
				}
			}

			if(isset($data)){
				return '<table width="100%" border="0" cellspacing="1" cellpadding="10" class="table5">'.implode('',$data).'</table>';
			}else{
				return '<div style="text-align: center; margin-top: 150px;">- список пуст -</div>';
			}
		}
	}
	
?>