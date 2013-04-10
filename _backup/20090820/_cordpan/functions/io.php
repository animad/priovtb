<?php
	function pr($text,$code=true,$len=null,$maxwlen=null){
		return str_replace("\r\n",'<br \>',output($text,$code,$len,$maxwlen));
	}

	function strcut($text=null,$len=null,$maxwlen=null){
		if($text!=null){
			if($len!=null && is_integer($len)){
				if(strlen($text)>$len){ $suffix='...'; }else{ $suffix=''; }
				$text=substr($text,0,$len).$suffix;
			}
			if($maxwlen!=null && is_integer($maxwlen)){
				$tmp=explode(' ',$text);
				for($i=0;$i<count($tmp);$i++){
					if(strlen(trim($tmp[$i]))>$maxwlen){
						$split_s=true;
						$tmp[$i]=chunk_split($tmp[$i],$maxwlen,' ');
					}
				}
				if(isset($split_s)){
					$text=implode(' ',$tmp);
					unset($tmp);
				}
			}
		}
		return $text;
	}
	
	function input($text=null){
		return addslashes(trim($text));
	}


	function output($text=null,$code=true,$len=null,$maxwlen=null){
		if($text!=null){
			$text=conv(htmlspecialchars(stripslashes(trim(strcut($text,$len,$maxwlen)))),$code);
		}
		return $text;
	}
	
function conv($text,$code){
	if($code){


//--- ������ \r\n �� <br> ������ [text]...[/text]
//		$pattern='/\[text\][ \r\n]*([a-zA-Z�-��-�0-9�� _.,;:!-=\r\n\t\#�%"&@#40;&#41;&#91;&#93;&#60;&#62;?\/&#38;]*)[ \r\n]*\[\/text\]/';
//		$pattern='/\[text\][ \r\n]*([a-zA-Z�-��-�0-9�� _.,;:!-=\r\n\t&#35;�%"@&#40;&#41;&#91;&#93;&#60;&#62;?&#47;&#38;]*)/';
		$pattern='/\[text\][ \r\n]*([a-zA-Z�-��-�0-9��:_!\"\t\r\n\$\-\�<>\(\)\[\]#�@*`\�\�\/\\&infin;,;.=& ]*)[ \r\n]*\[\/text\]/';
		while(preg_match($pattern,$text,$match,PREG_OFFSET_CAPTURE)){
			$size=strlen($match[1][0]);
			$tmp1=str_replace("\n",'<br>',$match[1][0]);
			$text=substr($text,0,$match[1][1]-8).$tmp1.substr($text,$match[1][1]+$size+7);
		}

//--- ������� ���������� ���� []...[/]
		$tl1=array('code','vars');
		while(list($key,$val)=each($tl1)){
			$pattern='/\['.$val.'\][\r\n]*([a-zA-Z�-��-�0-9��:_!\"\t\r\n\$\-\�<>\(\)#�@*`\�\�\/\\&infin;,;.=& ]+)*[\r\n]*\[\/'.$val.'\]/';
			while(preg_match($pattern,$text,$match,PREG_OFFSET_CAPTURE)){
				$text=str_replace($match[0][0],'',$text);
			}
		}

//--- �������� ������ -> template.php --------------------------------------
		// [hr1 pnt1 "file" "title1" _blank]
		// pnt1 - ��������� ��������� ��������� ������
		// file - ��� ����� ����� ������������� � index.php?dr=file ... (���������� �� ���������, �������� *.tpl)
		// title1 - ����������������� � �������� ����... title="title1"
		$pattern='/\[[ ]*hr1[ ]*&quot;([a-zA-Z0-9_\-.\?\&]+)&quot;[ ]*&quot;([a-zA-Z0-9�-��-�_ #:.\/\'=]+)&quot;[ ]*([\w_]*)[ ]*\]/';
		$replacement='<a href="'.$_SERVER['PHP_SELF'].'?dr=$1" title="$2" target="$3">$2</a>';
		$text=preg_replace($pattern, $replacement, $text);

//--- �������� ������ -> index.php --------------------------------------
		// [hr2 pnt1 "file" "title1" _blank]
		// pnt1 - ��������� ��������� ��������� ������
		// file - ��� ����� ����� ������������� � index.php?dr=file ... (���������� �� ���������, �������� *.tpl)
		// title1 - ����������������� � �������� ����... title="title1"
		$pattern='/\[[ ]*hr2[ ]*&quot;([a-zA-Z0-9_\-.\?\&]+)&quot;[ ]*&quot;([a-zA-Z0-9�-��-�_ #:.\/\'=]+)&quot;[ ]*([\w_]*)[ ]*&quot;([\w._]+)&quot;\]/';
		$replacement='<a href="'.$_SERVER['PHP_SELF'].'?dr=$1&tpl=$4" title="$2" target="$3">$2</a>';
		$text=preg_replace($pattern, $replacement, $text);

//--- �������� ������ -> href="������" --------------------------------------
		// [hr3 pnt1 "file" "title1" _blank]
		// pnt1 - ��������� ��������� ��������� ������
		// file - ��� ����� ����� ������������� � index.php?dr=file ... (���������� �� ���������, �������� *.tpl)
		// title1 - ����������������� � �������� ����... title="title1"
		$pattern='/\[hr3[ ]*&quot;([\w:\/._\-]+)&quot;[ ]*&quot;([\w�-��-�.\-\/\\=#&!?:; ]+)&quot;[ ]*([\w]+)[ ]*\]/';
		$replacement='<a href="$1" title="$2" target="$3">$2</a>';
		$text=preg_replace($pattern, $replacement, $text);

//--- ������ �� user@mail.ru -> <a href="mailto:user@mail.ru">user@mail.ru</a>
		$pattern='/([\w._-]+@(?:[\w_-]+).[\w_-]{1,3})/';
		$replacement='<a href="mailto:$1" title="��������� ���������">$1</a>';
		$text=preg_replace($pattern, $replacement, $text);
	}
	
	$text=html_entity_decode($text);


	$m1[]=':)';
	$m2[]='<img src="images/smiles/smile.gif" border="0">';

	$m1[]=':-)';
	$m2[]='<img src="images/smiles/smile.gif" border="0">';

	$m1[]=':(';
	$m2[]='<img src="images/smiles/frown.gif" border="0">';

	$m1[]=':-(';
	$m2[]='<img src="images/smiles/frown.gif" border="0">';

	$m1[]='[c]';
	$m2[]='<div align="center">';
	$m1[]='[/c]';
	$m2[]='</div>';

	$m1[]='[l]';
	$m2[]='<div align="left">';
	$m1[]='[/l]';
	$m2[]='</div>';

	$m1[]='[r]';
	$m2[]='<div align="right">';
	$m1[]='[/r]';
	$m2[]='</div>';

	$m1[]='[j]';
	$m2[]='<div align="justify">';
	$m1[]='[/j]';
	$m2[]='</div>';

	$m1[]='[fc red]';
	$m2[]='<font color="red">';
	$m1[]='[fc blue]';
	$m2[]='<font color="blue">';
	$m1[]='[fc black]';
	$m2[]='<font color="black">';
	$m1[]='[fc green]';
	$m2[]='<font color="green">';
	$m1[]='[fc yellow]';
	$m2[]='<font color="yellow">';

	$m1[]='[/fc]';
	$m2[]='</font>';

	$m1[]='[b]';
	$m2[]='<b>';
	$m1[]='[/b]';
	$m2[]='</b>';

	$m1[]='[i]';
	$m2[]='<i>';
	$m1[]='[/i]';
	$m2[]='</i>';

	$m1[]='[u]';
	$m2[]='<u>';
	$m1[]='[/u]';
	$m2[]='</u>';

	$m1[]='[hr1]'; //--- ����� ��� ���������� ��������
	$m2[]='<hr color="#fee1bc" style="margin: 0px">';

	$m1[]='[br]'; //--- 
	$m2[]='<br>'; 
	$m1[]='[2br]'; //--- 
	$m2[]='<br><br>';

	$m1[]='[pnt1]'; //--- ico ��� ������ - ��������� ��������� ������
	$m2[]='<img src="/images/point_arrow1.gif" width="4" height="8" border="0" hspace="5">';
	
	$m1[]='[ta1]';
	$m2[]='<textarea class="input3" wrap="on" readonly="readonly">';
	$m1[]='[/ta]';
	$m2[]='</textarea>';

	$m1[]='[da1]';
	$m2[]='<div class="input4">';
	$m1[]='[/da]';
	$m2[]='</div>';


	$text=str_replace($m1,$m2,$text);
	

	return $text;
}


?>
