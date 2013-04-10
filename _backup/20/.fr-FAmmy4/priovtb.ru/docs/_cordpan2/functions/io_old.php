<?php
	function output($text=null,$len=null,$conv1=false){		if($text!=null){			if($len!=null && is_integer($len)){				if(strlen($text)>$len){ $suffix='...'; }else{ $suffix=''; }				$text=substr($text,0,$len).$suffix;
			}			$text=htmlspecialchars(stripslashes(trim($text)));
		}
		return $text;
	}
	
	function covert1($text=null){
		if($text!=null){
			//--- ������ \r\n �� <br> ������ [text]...[/text]
			//		$pattern='/\[text\][ \r\n]*([a-zA-Z�-��-�0-9�� _.,;:!-=\r\n\t\#�%"&@#40;&#41;&#91;&#93;&#60;&#62;?\/&#38;]*)[ \r\n]*\[\/text\]/';
			//		$pattern='/\[text\][ \r\n]*([a-zA-Z�-��-�0-9�� _.,;:!-=\r\n\t&#35;�%"@&#40;&#41;&#91;&#93;&#60;&#62;?&#47;&#38;]*)/';
					$pattern='/\[text\][ \r\n]*([a-zA-Z�-��-�0-9��:_!\"\t\r\n\$\-\�<>\(\)\[\]#�@*`\�\�\/\\&infin;,;.=& ]*)[ \r\n]*\[\/text\]/';
					while(preg_match($pattern,$text,$match,PREG_OFFSET_CAPTURE)){
						$size=strlen($match[1][0]);
						$tmp1=str_replace("\n",'<br>',$match[1][0]);
						$text=substr($text,0,$match[1][1]-8).$tmp1.substr($text,$match[1][1]+$size+7);
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

					$text=html_entity_decode($text);

					
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

			$m1[]='[pnt1]'; //--- ico ��� ������ - ��������� ��������� ������
			$m2[]='<img src="/images/point_arrow1.gif" width="4" height="8" border="0" hspace="5">';

			$m1[]='[hr1]'; //--- ����� ��� ���������� ��������
			$m2[]='<hr color="#fee1bc" style="margin: 0px">';

			$m1[]='[br]'; //--- 
			$m2[]='<br>'; 
			$m1[]='[2br]'; //--- 
			$m2[]='<br><br>';
			
			$text=str_replace($m1,$m2,$text);
		}
		return $text;
	}

?>