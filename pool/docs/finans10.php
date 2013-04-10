<?php
	$j1=0;
	
	function colrow($j1){
		return ' class="'.($j1%2?'odd':'even').'"';
	}
	
	$_pagevars['col'][1]=array(0,1,7);
	$_pagevars['align'][1]=array('left','left','right');
	$_pagevars['valign'][1]=array('top','top','top');

	$_pagevars['col'][2]=array(0,1,2);
	$_pagevars['align'][2]=array('left','left','right');
	$_pagevars['valign'][2]=array('top','top','middle');

	$_pagevars['col'][3]=array(0,1,2,3,4);
	$_pagevars['align'][3]=array('left','left','right','right','right');
	$_pagevars['valign'][3]=array('top','top','middle','middle','middle');
	
	$_pagevars['row_decor']['odd']=array(' bgcolor=#eeeeee',' bgcolor=#eeeeee',' bgcolor=#cccccc',' bgcolor=#cccccc',' bgcolor=#cccccc');
	$_pagevars['row_decor']['even']=array(' bgcolor=#ffffff',' bgcolor=#ffffff',' bgcolor=#eeeeee',' bgcolor=#eeeeee',' bgcolor=#eeeeee');


    function draw_otch1($fln=null,$k=null){
    	global $_pagevars;
    	
    	if($fln!=null && $k!=null){
    	
			$fl=file($fln);
		
			for($i=0;$i<count($fl);$i++){
				$tmp=explode("\t",trim($fl[$i]));
				for($j=0;$j<count($_pagevars['col'][$k]);$j++){
					$data2[]='<td valign="'.$_pagevars['valign'][$k][$j].'" align="'.$_pagevars['align'][$k][$j].'"'.$_pagevars['row_decor'][($i%2?'odd':'even')][$j].'>'.trim($tmp[$_pagevars['col'][$k][$j]]).'</td>';
				}
				$data1[]='<tr>'.implode('',$data2).'</tr>';
				unset($data2);
			}
		
			return implode('',$data1);
		}
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
<h1>������� ����� ���������� ���������� ��� 2010</h1>

<h1>����� � �������� � �������</h1>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>&nbsp;</td>
		<td width="100">���. ���.</td>
	</tr>
	<?php print draw_otch1('pool/src/finans2010/otch_prib_ubytk.csv',1); ?>
</table>

<br />
<h1>������ �� 1 ������ 2011 ����</h1>
<table border="0" cellspacing="1" cellpadding="5" class="table5">

	<?php print draw_otch1('pool/src/finans2010/balans.csv',2); ?>
</table>

<br />
<h1>����� �� ������ ������������� ��������, �������� �������� ����������Š������������ ���� � ���� �������</h1>
<p align="center">�� ��������� �� 1 ������ 2011 ����</p>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<?php print draw_otch1('pool/src/finans2010/form_808_2010.csv',3); ?>
</table>

<h1>����� � �������� �������� ������� �� 2010 ���</h1>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<?php print draw_otch1('pool/src/finans2010/form_1_2010.csv',3); ?>
</table>



<h1>����� �� ������������ ���������� �� 1 ������ 2011 ����</h1>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<?php print draw_otch1('pool/src/finans2010/form_2_2010.csv',3); ?>
</table>

<h1>����������� ����������</h1>
<p>�� ������  ��� "����������-���������������� �����" "����"  ������������� ���������� �������� ���������� �� ���� ������������ ���������� ���������� ��������� ����� "����-������������"  (�������� ����������� ��������) �� ���������  �� 31 ������� 2010 ���� � ���������� ��� ���������-������������� ������������ � �������� �������� ������� ��  2010 ���  � ������������  � �������������� ��������� ����������� ������������� ���������� ���������� ���������.</p>
<table border="0" cellspacing="1" cellpadding="5">
	<tr valign="top">
		<td>������������ ����������� �����������:</td><td>�������� ����������� �������� "����������-���������������� ����� "����"</td>
	</tr>
	<tr valign="top">
		<td colspan="2">��������  ������������ �������� ���������� ��������� � � 000942</td>
	</tr>
	<tr valign="top">
		<td>���� ������:</td><td>25.06.2002�.</td>
	</tr>
	<tr valign="top">
		<td>���� �������� ��������:</td><td>25.06.2012 �.</td>
	</tr>
	<tr valign="top">
		<td>�������, ���, �������� ������������:</td><td>�������� ������ ����������</td>
	</tr>
	<tr valign="top">
		<td>������ ����, ����������� ����������� ����������:</td><td>����������� ��������  ��� "����������-���������������� �����" "����" �������� ������ ����������</td>
	</tr>
	<tr valign="top">
		<td>������������, ����� ���������, ��������������� ����������:</td><td>������ � ���������� � 20 �� 08.07.1997�.</td>
	</tr>
</table>


<!-- END -->
</div>
