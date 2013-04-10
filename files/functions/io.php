<?php

function pr($text,$cut=null,$wordSplit=15,$html=false){
	return str_replace("\r\n",'<br>',output($text,$cut,$wordSplit,$html));
}

function output($text,$cut=null,$wordSplit=15,$html=false){
	if($cut!=null){ $text=strCut($text,$cut); }
	if($wordSplit){
		$tmp1=explode("\r\n",$text);
		for($i=0; $i<count($tmp1); $i++){
			if(trim($tmp1[$i])!=''){
				$tmp2=explode(' ',trim($tmp1[$i]));
				for($l=0; $l<count($tmp2); $l++){
					if(trim($tmp2[$l])!='' && strlen(trim($tmp2[$l]))>=$wordSplit){
						$tmp3=chunk_split(trim($tmp2[$l]),$wordSplit,'');
						$text=str_replace(trim($tmp2[$l]),trim($tmp3),$text);
					}
				}
			}
		}
	}
	
	if(!$html){ $text=htmlspecialchars($text); }
	return conv(stripslashes(trim($text)));
	
}

function input($text){
	return addslashes(trim($text));
}

function conv($text){
	$m1[]=':)';
	$m2[]='<img src="pool/images/smiles/smile.gif" border="0">';

	$m1[]=':-)';
	$m2[]='<img src="pool/images/smiles/smile.gif" border="0">';

	$m1[]=':(';
	$m2[]='<img src="pool/images/smiles/frown.gif" border="0">';

	$m1[]=':-(';
	$m2[]='<img src="pool/images/smiles/frown.gif" border="0">';

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

/*	for($i=0; $i<count($m1); $i++){
		$tmp=explode($m1[$i],$text);
		$text=implode($m2[$i],$tmp);
	}*/

	$text=str_replace($m1,$m2,$text);

	return $text;
}

	function strCut($text=null,$len=null){
		if($text!=null && $len!=null){
			$len1=0;
			$text2=str_replace("\r\n",' ',$text);
			$tmp=explode(' ',trim($text2));
			for($i=0; $i<count($tmp); $i++){
				if(trim($tmp[$i])!=''){
					$text1[]=trim($tmp[$i]);
					$len1+=strlen(trim($tmp[$i]));
					if($len1>=$len){ break; }
				}
			}
			if(isset($text1)){
				$text1=implode(' ',$text1);
				if(strlen($text2)!=strlen($text1)){ $text1.='...'; }
				$text=$text1;
			}
		}
		
		return $text;
	}
	
	function filesize_convert($size=null,$tr='kb',$num=2){
		if($size!=null){
			$p=1024;
			$size1=$size;
			$size1=$size1/$p;
			if($tr=='kb'){ return round($size1,$num).' Êב'; }
			$size1=$size1/$p;
			if($tr=='mb'){ return round($size1,$num).' Ìב'; }
		}
	}
?>
