<h1>��������� ������</h1>
<br />
<?php
	if(isset($_SESSION['er']['remember1']['msg'])){
		print '<div align="center">'.output($_SESSION['er']['remember1']['msg']).'</div>';
	
	}else{
		print '<div align="center">�� ����� ����������� �����, ��������� ���� ��� �����������,<br />������� ������, ������� �������� ����� ������ �� �����������.</div>';
	}
?>
<br />
