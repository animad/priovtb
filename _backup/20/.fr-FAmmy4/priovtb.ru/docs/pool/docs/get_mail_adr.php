<script Language="JavaScript"><!--
function Validator(theForm){
	if (theForm.fam.value==""){
	    alert('Не все поля заполнены');
	    theForm.fam.focus();
	    return (false);
	}
	if (theForm.im.value==""){
		alert('Не все поля заполнены');
		theForm.im.focus();
		return (false);
	}
	if (theForm.ot.value==""){
		alert('Не все поля заполнены');
		theForm.ot.focus();
		return (false);
	}
	return (true);
}
//--></script>
<h2 style="color: #ffffff; text-align: center; font-size: 14px; margin-top: 5px;">Пожалуйста обязательно<br />заполните следующие поля</h1>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" onsubmit="return Validator(this);" name="form">
	<input type="hidden" name="action" value="save">
	<table border="0" cellspacing="1" cellpadding="5" width="90%" align="center" class="table2">
		<tr>
			<td>Ваш email:</td>
			<td width="180"><input type="text" name="usermail" value="<?=$usermail;?>" readonly style="width: 100%"></td>
		</tr>
		<tr>
			<td>Фамилия:</td>
			<td width="180"><input type="text" name="fam" value="" style="width: 100%"></td>
		</tr>
		<tr>
			<td>Имя:</td>
			<td width="180"><input type="text" name="im" style="width: 100%"></td>
		</tr>
		<tr>
			<td>Отчество:</td>
			<td width="180"><input type="text" name="ot" style="width: 100%"></td>
		</tr>
	</table>
	<div align="center" style="margin-top: 15px">
		<table><tr>
			<td><a href="" class="hrf1" onClick="this.submit(true); return false;">Отправить</a></td>
			<td width="10"></td>
			<td><a href="#" onClick="window.close(); return false;" class="hrf1">Отмена</a></td>
		</tr></table>
	</div>
</form>
