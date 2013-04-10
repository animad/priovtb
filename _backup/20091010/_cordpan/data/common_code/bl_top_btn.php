<?php

	if(isset($_modvars['btn'][$_GET['m']])){
		for($i=0;$i<count($_modvars['btn'][$_GET['m']]);$i++){
			$data3[]='<a href="'.$_modvars['btn'][$_GET['m']][$i][0].'" class="hrf2">'.output($_modvars['btn'][$_GET['m']][$i][1]).'</a>';
		}
		if(isset($data3)){
			$data1[]='<p align="center">'.implode('',$data3).'</p>';
			unset($data3);
		}
	}

?>