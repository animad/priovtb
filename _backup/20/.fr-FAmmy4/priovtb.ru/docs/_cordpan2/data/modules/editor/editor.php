<?php
	$p1='data/modules/editor';
	
	$data_ilist=list_img('/pool/images');
	$fln=$p1.'/lists/image_list.js';
	$fp=fopen($fln, 'w+');
	$ans=fwrite ($fp, $data_ilist);
	fclose ($fp);
	@chmod($fln, 0777);
	unset($data_ilist);

	//������ ���������� ���������� ���������
	//--- jscript �������������
	$k=1;
	$editor[$k]['jsinit']='<script type="text/javascript">'.$mod->tools['editorHTML']['js']['init']['maximal'].'</script>';
	//--- HTML ���������
	$editor[$k]['html']=$mod->tools['editorHTML']['html']['textarea'];
	//--- ������ ����
	$editor[$k]['r']['sz_height']='500px';
	//--- ������ ����
	$editor[$k]['r']['sz_width']='950px';
	//--- ��� ��� NAME, ID, CLASS
	$editor[$k]['r']['work_element']='elm1';
	//--- ����� ��� ���� BODY, ������ ���������
	$editor[$k]['r']['css_body']='';
	//--- ����� ������� ���������� ������ ���������
	$editor[$k]['r']['work_text']='%page2edit%';

	//--- ���������� ������ ����������
	reset($editor);
	while(list($key1,$val1)=each($editor)){
		while(list($key,$val)=each($val1['r'])){
			$editor[$key1]['jsinit']=str_replace('%'.$key.'%',$val,$editor[$key1]['jsinit']);
			$editor[$key1]['html']=str_replace('%'.$key.'%',$val,$editor[$key1]['html']);
		}
	}
	
	//-- ������� � HTML jscript ���������
	print $mod->tools['editorHTML']['js']['load'];
	print $editor[1]['jsinit'];
//	print $editor[2]['jsinit'];
	
	
	print '<form name="editorDO" id="editorDO" method="post" action="'.$p1.'/save.php" onsubmit="return f_save();" style="margin: 0px; padding: 0px">';
	print '<div align="center">';
	
	//--- ������� HTML ���������
	print $editor[1]['html'];
//	print $editor[2]['html'];
	
	print '</div>';
	print '</form>';
	
?>


<script type="text/javascript">
	function f_save(){
		t="f_prefix";
		t2="editorDO";
		var elem=document.createElement("input");
		elem.setAttribute("type","hidden");
		elem.setAttribute("name",t);
		elem.setAttribute("value",document.getElementById(t).value);
		document.getElementById(t2).appendChild(elem);

		t="f_name";
		var elem=document.createElement("input");
		elem.setAttribute("type","hidden");
		elem.setAttribute("name",t);
		elem.setAttribute("value",document.getElementById(t).value);
		document.getElementById(t2).appendChild(elem);

		t="f_ext";
		var elem=document.createElement("input");
		elem.setAttribute("type","hidden");
		elem.setAttribute("name",t);
		elem.setAttribute("value",document.getElementById(t).value);
		document.getElementById(t2).appendChild(elem);

		document.getElementById(t2).submit("true");
	}
</script>

