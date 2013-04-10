<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	function vaclist(){
		$q='select * from `vacancy` where `on`="1" order by `date` desc, `id` desc';
		$res=mysql_query($q);
		if(mysql_errno()<1 && mysql_num_rows($res)>0){
			while($row=mysql_fetch_assoc($res)){
				$data[]='<p>'.date2str($row['date']).' - <b>'.output($row['title']).'</b></p>'.
						pr($row['requirement']);
//						'<p><i>Адрес для отправки резюме: <a href="mailto:'.$row['email'].'" class="hrf7">'.trim($row['email']).'</a></i></p>';
			}
		}
		return (isset($data)?implode('<div style="margin: 20px 0 10px 0; text-align: center; line-height: 2px; font-size: 0px;"><img src="files\images\point_blank.gif" style="background-color: #E8F2ED; width: 90%; height: 2px;" border="0"></div>',$data):'');
	}
	
?>
<div id="col_r">
<!-- BEGIN submenu --><script type="text/javascript">submenu_create("about",0,"<?=$_GET['dr'];?>");</script><!-- END submenu -->
</div>
<div id="data_place">
<!-- BEGIN page title -->
<script type="text/javascript">
	if(current_page!=null && typeof(current_page.title_p)!="undefined"){ tp=current_page.title_p+"<br />"; }else{ tp=""; }
	if(current_page!=null && typeof(current_page.title)!="undefined"){
		document.writeln("<h1>"+tp+current_page.title+"</h1>");
		document.title=document.title+" | "+(current_page!=null && typeof(current_page.title_p)!="undefined"?current_page.title_p+", ":"")+current_page.title;
	}
</script>
<!-- END page title -->

<!-- BEGIN -->

<?php

	$data1=vaclist();
	if(trim($data1)!=''){
		print '<p align="center">Все резюме отправляются на адрес <a href="mailto:job@priovtb.ru" class="hrf7">job@priovtb.ru</a></p>';
		print '<p align="center" style="background-color: #E8F2ED; padding: 10px 0;">На сегодняшний день в банке открыты следующие вакансиии:</p>';
		print $data1;
		print '<p align="center" style="background-color: #E8F2ED; padding: 10px 0;">Если вы не нашли для себя подходящей вакансии,<br />то все равно можете отправить свое резюме на адрес<br /><a href="mailto:job@priovtb.ru" class="hrf7">job@priovtb.ru</a></p>';
	}else{
		print '<p align="center" style="background-color: #E8F2ED; padding: 10px 0;">На сегодняшний день вакансии отсутствуют,<br />но Вы все равно можете отправить свое резюме на адрес<br /><a href="mailto:job@priovtb.ru" class="hrf7">job@priovtb.ru</a></p>';
	}

?>

<!-- END -->
</div>