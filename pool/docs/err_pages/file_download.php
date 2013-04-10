<h1>Скачать файл</h1>
<br>
<?php
	
if(isset($_SESSION['er'])){
	if($_SESSION['er']['erno']==14){
		print '<div align="center">'.$_SESSION['er']['fln'].'</div>';
		print '<br />';
		
		$user1=new users;
		$user1->vars['form1']['width1']='300px';
		$user1->vars['form1']['width2']='200px';
		$user1->vars['form1']['hidden']['forward']='<input type="hidden" name="forward" value="/e_file_downloadok.php">';
		print $user1->form1();
	}else{
		print '<div align="center" class="err">'.output($_SESSION['er']['erm']).'</div>';
	}
}

?>
<br />
