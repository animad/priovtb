<?php
	if(isset($_SESSION['er'])){
		if(isset($_SESSION['er']['message']) && trim($_SESSION['er']['message'])!=''){ $ermes=trim($_SESSION['er']['message']); }else{ $ermes=''; }
		unset($_SESSION['er']);
	}else{
		$ermes='';
	}
?>
<form action="loginout.php?login" method="post">
	<input name="return_url" type="hidden" value="<?=$_SERVER['REQUEST_URI'];?>">
	<div align="center">
		<table style="margin-top: 20px">
			<tr>
				<td>�����</td>
				<td><input name="login" type="text" value="<?=$login;?>"></td>
			</tr>
			<tr>
				<td>������</td>
				<td><input name="passw" type="password"></td>
			</tr>
<?php
	if($ermes!=''){
	}
?>
		</table>
		<br>
		<input type="submit" value="Send">
	</div>
</form>