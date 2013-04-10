<?php

	$p=array(
		array( val:'1', title:'Нет' ),
		array( val:'2', title:'Не вполне' ),
		array( val:'3', title:'Да' ),
		array( val:'4', title:'Затрудняюсь ответить' )
	);
	
	print '<pre>';
	var_dump (serialize($p));
	print '</pre>';
	
?>