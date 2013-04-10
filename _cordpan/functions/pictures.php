<?php

	class picture{
		function pic_resize($w1=null,$h1=null,$w2=null,$h2=null){
			if($w1!=null && $h1!=null){
				$w3=$w1;
				$h3=$h1;

				if($w2!=null && $w2>10 && $w2<$w1){                 //--- нужно ли уменьшать по ширине
					if($w2<$w1){ $dx=$w3-$w2; }elseif($w2>$w1){ $dx=$w3+$w2; }
					$x1=$dx/$w3*100;
					$dy=$x1/100*$h3;

					if($w2>0){ $w3=$w2; }
					$h3=$h3-floor($dy);       //--- новая высота
				}

				if($h2!=null && $h2>10 && $h2<$h1 && $h3>$h2){            //--- нужно ли уменьшать по высоте
					if($h2<$h1){ $dy=$h3-$h2; }elseif($h2>$h1){ $dy=$h3+$h2; }
					$y1=$dy/$h3*100;
					$dx=$y1/100*$w3;

					$w3=$w3-floor($dx);       //--- новая ширина
					if($w2>0){ $h3=$h2; }
				}
			}

			return isset($w3) && isset($h3)?array('width'=>$w3, 'height'=>$h3):array('width'=>null, 'height'=>null);
		}

		function pic_rebuild($fln=null,$pre='',$w2=null,$h2=null,$img_save=true){			if($fln!=null){				$path=pathinfo($fln);
				$file_name=basename($path['basename'],'.'.$path['extension']);
				$fln1=$fln;
				$fl_info=getimagesize($pre.$fln1);
				$new_size=$this->pic_resize($fl_info[0],$fl_info[1],$w2,$h2);

				$im2=imagecreatetruecolor($new_size['width'],$new_size['height']);   //--- картинка с новыми размерами

				switch(trim($fl_info['mime'])){                                             //--- определяем тип исходника и загружаем
					case 'image/gif':
						$im1=imagecreatefromgif($pre.$fln1);
						break;
					case 'image/jpeg':
						$im1=imagecreatefromjpeg($pre.$fln1);
						break;
					case 'image/pjpeg':
						$im1=imagecreatefromjpeg($pre.$fln1);
						break;
				}
				imagecopyresampled($im2,$im1,0,0,0,0,$new_size['width'],$new_size['height'],$fl_info[0],$fl_info[1]);

				if($img_save){					$ans=imagejpeg($im2,$fln,80);
					chmod($fln1,0777);
				}else{ $ans=imagejpeg($im2); }
			}
			return isset($ans)?$ans:false;
		}

		
	}
?>