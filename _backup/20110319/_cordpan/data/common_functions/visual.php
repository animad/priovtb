<?php
	
	//--- расцветка строчной информации
	function colrow($j1,$on=1,$color='red'){
		return ' class="'.($j1%2?'even'.($on!=1?'_'.$color:''):'odd'.($on!=1?'_'.$color:'')).'"';
	}
	
?>