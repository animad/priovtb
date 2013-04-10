<?php

/*
 *отображает сообщение об ошибке
 */
 
	function err_show($text=null,$errno=null,$color='red'){
		global $_modvars;
		
		if($text==null){
			if($errno!=null && isset($_modvars['erm'][$errno])){
				$text=output($_modvars['erm'][$errno]);
			}
		}
		
		if($text!=null && trim($text)!=''){
			return '<p align="center" style="background-color: '.$color.'; line-height: 30px;">'.output($text).'</p>';
		}
		
	}

?>