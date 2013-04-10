<h1>Вспомнить пароль</h1>
<br />
<?php
	if(isset($_SESSION['er']['remember1']['msg'])){
		print '<div align="center">'.output($_SESSION['er']['remember1']['msg']).'</div>';
	
	}else{
		print '<div align="center">На адрес электронной почты, указанный Вами при регистрации,<br />выслано письмо, которое содержит новые данные по регистрации.</div>';
	}
?>
<br />
