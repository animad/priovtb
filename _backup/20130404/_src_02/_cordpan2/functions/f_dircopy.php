<?php

	function dir_copy($source,$target){
		if(is_dir($source)){
			@mkdir($target);
			$d=dir($source);
			while(FALSE!==($entry = $d->read())){
				if($entry=='.' || $entry=='..'){ continue; }
				$Entry=$source .'/'.$entry;
				if(is_dir($Entry)){
					dir_copy($Entry, $target.'/'.$entry);
					continue;
				}
				copy( $Entry, $target . '/' . $entry );
			}
			$d->close();
		}else{ copy( $source, $target ); }
	}

?>
