<?php
	$j1=0;
	
	function rclr($j1){ return ' class="'.($j1%2?'odd':'even').'"'; }
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
	}
</script>
<!-- END page title -->

<!-- BEGIN -->

<h2>����� �45 (������� �������� ���� ����������)</h2>
<table border="0" cellspacing="1" cellpadding="5" class="table4" width="100%">
	<tr class="header">
		<td width="40">��</td>
		<td>���</td>
		<td width="70">�������</td>
		<td width="200">�������� ������</td>
	</tr>
	<tr<?=rclr($j1++);?>><td align="center">1</td><td>���������� ����</td><td>10 ���</td><td>��������� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">2</td><td>������ ����</td><td>9 ���</td><td>�������� ��� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">3</td><td>�������� ��������</td><td>9 ���</td><td>������� "��� �������"</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">4</td><td>������ ������</td><td>9 ���</td><td>����� ������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">5</td><td>�������� ����</td><td>11 ���</td><td>������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">6</td><td>�������� ����</td><td>11 ���</td><td>�����-��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">7</td><td>�������� ���</td><td>11 ���</td><td>������� ��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">8</td><td>�������� �����</td><td>11 ���</td><td>���������� ��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">9</td><td>��������� �����</td><td>13 ���</td><td>��������� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">10</td><td>���������� ���</td><td>13 ���</td><td>������� ��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">11</td><td>��������� ����</td><td>13 ���</td><td>��������� �����</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">12</td><td>�������� ����</td><td>13 ���</td><td>������� ��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">13</td><td>�������� ������</td><td>13 ���</td><td>�������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">14</td><td>�������� ����</td><td>13 ���</td><td>��������� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">15</td><td>������� ����</td><td>13 ���</td><td>������� ��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">16</td><td>������ ����</td><td>14 ���</td><td>������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">17</td><td>��������� ������</td><td>14 ���</td><td>��� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">18</td><td>������� ����</td><td>14 ���</td><td>��������� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">19</td><td>��������� �����</td><td>13 ���</td><td>������� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">20</td><td>������� �������</td><td>14 ���</td><td>���������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">21</td><td>������ ����</td><td>14 ���</td><td>�����</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">22</td><td>����������� �����</td><td>14 ���</td><td>������ ����</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">23</td><td>�������� ���������</td><td>12 ���</td><td>��������� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">24</td><td>������� �����</td><td>12 ���</td><td>�����-��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">25</td><td>�������� ����</td><td>12 ���</td><td>������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">26</td><td>�������� ���</td><td>12 ���</td><td>������� ��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">27</td><td>���������� ����</td><td>12 ���</td><td>������� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">28</td><td>��������� ������</td><td>13 ���</td><td>������� ��������</td></tr>
</table>
<br />
<h2>��� "�����������" (������� ���������� �.�.)<br />��� ������ "��������"</h2>
<table border="0" cellspacing="1" cellpadding="5" class="table4" width="100%">
	<tr class="header">
		<td width="40">��</td>
		<td>���</td>
		<td width="70">�������</td>
		<td width="200">�������� ������</td>
	</tr>
	<tr<?=rclr($j1++);?>><td align="center">29</td><td>���������� ���</td><td>7 ���</td><td>����� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">30</td><td>�������� ���</td><td>6 ���</td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">31</td><td>������� ���</td><td>10 ���</td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">32</td><td>������ ����</td><td>9 ���</td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">33</td><td>������� ����</td><td>9 ���</td><td></td></tr>
</table>
<br />
<h2>������-������ "������" ��� (�������� �������)</h2>
<table border="0" cellspacing="1" cellpadding="5" class="table4" width="100%">
	<tr class="header">
		<td width="40">��</td>
		<td>���</td>
		<td width="70">�������</td>
		<td width="200">�������� ������</td>
	</tr>
	<tr<?=rclr($j1++);?>><td align="center">35</td><td>����������� �����</td><td>7 �����</td><td>������� ���</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">36</td><td>�������� ����</td><td>7 �����</td><td>����������� ������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">37</td><td>������� ����</td><td>7 �����</td><td>��������� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">38</td><td>�������� �������</td><td>7 �����</td><td>���������� ������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">39</td><td>�������� �������</td><td>8 �����</td><td>������ ��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">40</td><td>������ �����</td><td>14 ���</td><td>����������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">41</td><td>������� ������</td><td>16 ���</td><td>�������� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">42</td><td>������ ������</td><td>16 ���</td><td>������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">43</td><td>�������� ������</td><td>8 �����</td><td>������� ������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">44</td><td>�������� ���������</td><td>17 ���</td><td>�������������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">45</td><td>���������� ��������</td><td>7 �����</td><td>� ���� ��������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">46</td><td>������� �������</td><td>13 ���</td><td>����� �������</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">47</td><td>�������� ����</td><td></td><td>"������"</td></tr>
	<tr<?=rclr($j1++);?>><td align="center">48</td><td>������ ������� ����������� (���.)</td><td></td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">49</td><td>�������� ������� �������� (������.)</td><td>��������.</td><td>��� ������</td></tr>
</table>
<br />
<h2>����� �13 (��������� �.�.)</h2>
<table border="0" cellspacing="1" cellpadding="5" class="table4" width="100%">
	<tr class="header">
		<td width="40">��</td>
		<td>���</td>
		<td width="70">�������</td>
		<td width="200">�������� ������</td>
	</tr>
	<tr<?=rclr($j1++);?>><td align="center">50</td><td>�������� ������</td><td>6 �����</td><td></td></tr>
	<tr<?=rclr($j1++);?>><td align="center">51</td><td>�������� �����</td><td>10 �����</td><td></td></tr>
</table>


<!-- END -->
</div>