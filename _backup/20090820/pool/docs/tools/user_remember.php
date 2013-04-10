<h1>Вспомнить пароль</h1>

<?php
	$user1=new users;

	$user1->vars['form1']['width1']='500px';
	$user1->vars['form1']['width2']='400px';
	$user1->vars['form1']['hidden']['forward']='<input type="hidden" name="forward" value="/tool-remember_confirm.php">';
	$user1->vars['form1']['action']='tool-user_remember1.php';
	
	print $user1->form3();
	
?>