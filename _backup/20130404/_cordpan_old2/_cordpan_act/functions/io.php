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


//--- замена \r\n на <br> внутри [text]...[/text]
//		$pattern='/\[text\][ \r\n]*([a-zA-Zа-€ј-я0-9Є® _.,;:!-=\r\n\t\#є%"&@#40;&#41;&#91;&#93;&#60;&#62;?\/&#38;]*)[ \r\n]*\[\/text\]/';
//		$pattern='/\[text\][ \r\n]*([a-zA-Zа-€ј-я0-9Є® _.,;:!-=\r\n\t&#35;є%"@&#40;&#41;&#91;&#93;&#60;&#62;?&#47;&#38;]*)/';
		$pattern='/\[text\][ \r\n]*([a-zA-Zа-€ј-я0-9Є®:_!\"\t\r\n\$\-\Ц<>\(\)\[\]#є@*`\Ђ\ї\/\\&infin;,;.=& ]*)[ \r\n]*\[\/text\]/';
		while(preg_match($pattern,$text,$match,PREG_OFFSET_CAPTURE)){
			$size=strlen($match[1][0]);
			$tmp1=str_replace("\n",'<br>',$match[1][0]);
			$text=substr($text,0,$match[1][1]-8).$tmp1.substr($text,$match[1][1]+$size+7);
		}

//--- убиваем содержимое тэга []...[/]
		$tl1=array('code','vars');
		while(list($key,$val)=each($tl1)){
			$pattern='/\['.$val.'\][\r\n]*([a-zA-Zа-€ј-я0-9Є®:_!\"\t\r\n\$\-\Ц<>\(\)#є@*`\Ђ\ї\/\\&infin;,;.=& ]+)*[\r\n]*\[\/'.$val.'\]/';
			while(preg_match($pattern,$text,$match,PREG_OFFSET_CAPTURE)){
				$text=str_replace($match[0][0],'',$text);
			}
		}

//--- создание ссылки -> template.php --------------------------------------
		// [hr1 pnt1 "file" "title1" _blank]
		// pnt1 - указатель ћјЋ≈Ќ№ јя —“–≈Ћќ„ ј ¬ѕ–ј¬ќ
		// file - им€ файла будет преобразовано в index.php?dr=file ... (расширение не указывать, грузитс€ *.tpl)
		// title1 - преобразовываетс€ в параметр тэга... title="title1"
		$pattern='/\[[ ]*hr1[ ]*&quot;([a-zA-Z0-9_\-.\?\&]+)&quot;[ ]*&quot;([a-zA-Z0-9а-€ј-я_ #:.\/\'=]+)&quot;[ ]*([\w_]*)[ ]*\]/';
		$replacement='<a href="'.$_SERVER['PHP_SELF'].'?dr=$1" title="$2" target="$3">$2</a>';
		$text=preg_replace($pattern, $replacement, $text);

//--- создание ссылки -> index.php --------------------------------------
		// [hr2 pnt1 "file" "title1" _blank]
		// pnt1 - указатель ћјЋ≈Ќ№ јя —“–≈Ћќ„ ј ¬ѕ–ј¬ќ
		// file - им€ файла будет преобразовано в index.php?dr=file ... (расширение не указывать, грузитс€ *.tpl)
		// title1 - преобразовываетс€ в параметр тэга... title="title1"
		$pattern='/\[[ ]*hr2[ ]*&quot;([a-zA-Z0-9_\-.\?\&]+)&quot;[ ]*&quot;([a-zA-Z0-9а-€ј-я_ #:.\/\'=]+)&quot;[ ]*([\w_]*)[ ]*&quot;([\w._]+)&quot;\]/';
		$replacement='<a href="'.$_SERVER['PHP_SELF'].'?dr=$1&tpl=$4" title="$2" target="$3">$2</a>';
		$text=preg_replace($pattern, $replacement, $text);

//--- создание ссылки -> href="ссылки" --------------------------------------
		// [hr3 pnt1 "file" "title1" _blank]
		// pnt1 - указатель ћјЋ≈Ќ№ јя —“–≈Ћќ„ ј ¬ѕ–ј¬ќ
		// file - им€ файла будет преобразовано в index.php?dr=file ... (расширение не указывать, грузитс€ *.tpl)
		// title1 - преобразовываетс€ в параметр тэга... title="title1"
		$pattern='/\[hr3[ ]*&quot;([\w:\/._\-]+)&quot;[ ]*&quot;([\wа-€ј-я.\-\/\\=#&!?:; ]+)&quot;[ ]*([\w]+)[ ]*\]/';
		$replacement='<a href="$1" title="$2" target="$3">$2</a>';
		$text=preg_replace($pattern, $replacement, $text);

//--- делаем из user@mail.ru -> <a href="mailto:user@mail.ru">user@mail.ru</a>
		$pattern='/([\w._-]+@(?:[\w_-]+).[\w_-]{1,3})/';
		$replacement='<a href="mailto:$1" title="ќтправить сообщение">$1</a>';
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

	$m1[]='[hr1]'; //--- черта под заголовком страницы
	$m2[]='<hr color="#fee1bc" style="margin: 0px">';

	$m1[]='[br]'; //--- 
	$m2[]='<br>'; 
	$m1[]='[2br]'; //--- 
	$m2[]='<br><br>';

	$m1[]='[pnt1]'; //--- ico дл€ ссылки - маленька€ стрелочка вправо
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
