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
<h1>Годовая форма финансовой отчетности год 2009</h1>

<h1>Отчет о прибылях и убытках</h1>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<tr class="header">
		<td width="50" align="center">&nbsp;</td>
		<td>&nbsp;</td>
		<td width="100">тыс. руб.</td>
	</tr>
	<?php print draw_otch1('pool/src/finans2009/otch_prib_ubytk.csv',1); ?>
</table>

<br />
<h1>БАЛАНС НА 1 ЯНВАРЯ 2010 ГОДА</h1>
<table border="0" cellspacing="1" cellpadding="5" class="table5">

	<?php print draw_otch1('pool/src/finans2009/balans.csv',2); ?>
</table>

<br />
<h1>ОТЧЕТ ОБ УРОВНЕ ДОСТАТОЧНОСТИ КАПИТАЛА, ВЕЛИЧИНЕ РЕЗЕРВОВ НА ПОКРЫТИЕ СОМНИТЕЛЬНЫХ ССУД И ИНЫХ АКТИВОВ</h1>
<p align="center">по состоянию на 1 января 2010 года</p>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<?php print draw_otch1('pool/src/finans2009/form_808_2009.csv',3); ?>
</table>

<h1>Отчет О ДВИЖЕНИИ ДЕНЕЖНЫХ СРЕДСТВ ЗА 2009 ГОД</h1>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<?php print draw_otch1('pool/src/finans2009/form_1_2009.csv',3); ?>
</table>



<h1>Отчет ОБ ОБЯЗАТЕЛЬНЫХ НОРМАТИВАХ НА 1 ЯНВАРЯ 2010 ГОДА</h1>
<table border="0" cellspacing="1" cellpadding="5" class="table5">
	<?php print draw_otch1('pool/src/finans2009/form_2_2009.csv',3); ?>
</table>

<h1>Аудиторское заключение</h1>
<p>По мнению  ЗАО "Аудиторско-Консультационная фирма" "МИАН"  финансовая (бухгалтерская) отчетность  ПРИО-ВНЕШТОРГБАНКА  (ОТКРЫТОЕ АКЦИОНЕРНОЕ ОБЩЕСТВО) отражает достоверно во всех существенных отношениях финансовое положение на 31 декабря 2009 года и результаты его финансово-хозяйственной деятельности за период с 01 января 2009 года по 31 декабря 2009 года включительно, в соответствии  с требованиями законодательства Российской Федерации в части подготовки финансовой (бухгалтерской) отчетности, а также Указания Банка России от 08.10.2008  №2089-У «О порядке составления кредитными организациями годового отчета», Указания Банка России от 16.01.2004 №1376-У «О перечне, формах и порядке составления и представления форм отчетности кредитных организаций в Центральный Банк Российской Федерации».</p>
<table border="0" cellspacing="1" cellpadding="5">
	<tr valign="top">
		<td>Наименование аудиторской организации:</td><td>Закрытое акционерное общество "Аудиторско-Консультационная фирма "МИАН"</td>
	</tr>
	<tr valign="top">
		<td colspan="2">Лицензия  Министерства Финансов Российской Федерации № Е 000942</td>
	</tr>
	<tr valign="top">
		<td>Дата выдачи:</td><td>25.06.2002г.</td>
	</tr>
	<tr valign="top">
		<td>срок действия лицензии:</td><td>25.06.2012 г.</td>
	</tr>
	<tr valign="top">
		<td>Фамилия, имя, отчество руководителя:</td><td>Левкович Галина Николаевна</td>
	</tr>
	<tr valign="top">
		<td>Данные лица, заверившего публикуемую отчетность:</td><td>генеральный директор  ЗАО "Аудиторско-консультационная фирма" "МИАН" Левкович Галина Николаевна</td>
	</tr>
	<tr valign="top">
		<td>наименование, номер документа, подтверждающего полномочия:</td><td>приказ о назначении № 20 от 08.07.1997г.</td>
	</tr>
</table>


<!-- END -->
</div>
