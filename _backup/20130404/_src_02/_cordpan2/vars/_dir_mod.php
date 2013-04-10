<?php

//çàâèñÿò îò ÀÊÒÈÂÍÎÃÎ ìîäóëÿ

	$_dir['mod']=$_dir['modplace'].$mod->box[$_GET['dr']]['run']['place'].'/';
	$_dir['data']=$_dir['site'].'/'.$mod->box[$_GET['dr']]['config']['dir_dest'];
	
	$_dir['mod_func']=$_dir['modplace'].$mod->box[$_GET['dr']]['run']['place'].'/functions';
	$_dir['mod_vars']=$_dir['modplace'].$mod->box[$_GET['dr']]['run']['place'].'/vars';
	$_dir['mod_scripts_http']=$_dir['modplace_http'].$mod->box[$_GET['dr']]['run']['place'].'/scripts';

	

?>
