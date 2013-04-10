<?php

	//--- ïåðåõîä ïî ÓÌÎË×ÀÍÈÞ
	if(!isset($_GET['m'])){ $_GET['m']='main'; }

	include($_dir['common_func'].'/fcc.php');
	if(!function_exists('mainw_draw')){ include($_dir['mod'].'/f_mdraw.php'); }
	if(!function_exists('browse_list')){ include($_dir['mod'].'/f_browse.php'); }
	if(!function_exists('dir_copy')){ include($_dir['root'].'/functions/f_dircopy.php'); }
	if(!function_exists('list_img')){ include($_dir['mod'].'/f_list_img.php'); }

	//	if(!function_exists('get_flist')){ include($dir_root.'/functions/f_file_add.php'); }
	

	//--- ïåðåìåííûå ÏÀÍÅËÈ//	$_glovars=vars_parse_batch($_dir['common_vars'],array('vars/global.vars'));
	//--- ÎÁÙÈÅ ïåðåìåííûå ÌÎÄÓËÅÉ
	$_comvars=vars_parse_batch($_dir['common_vars'],array('mysql.inc','globals.inc','dir.inc'));
	//--- ïåðåìåííûå ÌÎÄÓËß	$_modvars=vars_parse_batch($_dir['mod'],array('vars.inc'));
	
	//--- ñîçäàíèå íåîáõîäèìûõ ïóåé
	$ans=fcc($_dir['site'].'/'.$_comvars['paths']['images'],'folder');

	switch ($_GET['m']){
		case 'main':
			$data1=mainw_draw();
		break;
	}
	
	print $data1;

?>
