<h1>������� ����</h1>
<br>
<div align="center">��� �����: <?php print $_SESSION['file_download']['fln']; ?></div>
<div align="center">- OK -</div>
<br />
<script>
//	alert(window.location);
	t="/d_<?php print $_SESSION['file_download']['fln']; ?>";
	window.location=t;
</script>
