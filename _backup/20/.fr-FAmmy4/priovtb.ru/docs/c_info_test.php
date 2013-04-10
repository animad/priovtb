<?php
	global $gStore;

	include('files/functions/tools.php');

	include('files/functions/gps.php');
	include('files/functions/coord_info.php');
	
	coord_info::init(array('obj'=>'trm'));
	coord_info::map_lables(array('obj'=>'trm'));

	print_r($gStore['coord_info']['ymaps']);

	
?>