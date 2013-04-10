<?php
	if(isset($_SESSION['er'])){		if(isset($_SESSION['er']['login']) && trim($_SESSION['er']['login'])!=''){ $login=trim($_SESSION['er']['login']); }else{ $login=''; }
		if(isset($_SESSION['er']['message']) && trim($_SESSION['er']['message'])!=''){ $ermes=trim($_SESSION['er']['message']); }else{ $ermes=''; }
		unset($_SESSION['er']);
	}else{		$login='';
		$ermes='';
	}
?>
<form action="loginout.php?login" method="post">
	<input name="return_url" type="hidden" value="<?=$_SERVER['REQUEST_URI'];?>">
	<div align="center">
		<table style="margin-top: 20px">
			<tr>
				<td>Логин</td>
				<td><input name="login" type="text" class="input2" value="<?=$login;?>"></td>
			</tr>
			<tr>
				<td>Пароль</td>
				<td><input name="passw" type="password" class="input2"></td>
			</tr>
<?php
	if($ermes!=''){		print '<tr><td colspan="2" align="center">'.$ermes.'</td></tr>';
	}
?>
		</table>
		<br>
		<input type="submit" value="Send">
	</div>
</form>
