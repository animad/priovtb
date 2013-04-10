<?php

	class coord_info extends gps{
		
		public function init($_arg=null){
			if ('info'==trim($_arg)){
				
			}else{

				$f=(isset($_arg['f'])?$_arg['f']:'').__METHOD__;
				global $gStore;
				
				$v1=array(
					'trm'=>'./pool/vars/terminals.ini',
					'atm'=>'./pool/vars/bankomats.ini'
				);
				
				if (isset($_arg['obj']) && ''!=trim($_arg['obj']) && isset($v1[$_arg['obj']])){
					$res=parse_ini_file(trim($v1[$_arg['obj']]),true);
					if (false!==$res){
						$gStore['coord_info'][trim($_arg['obj'])]=$res;
					}
				}

			}
		}

		public function map_lables($_arg=null){
			if('info'==trim($_arg)){
			
			}else{
				$f=(isset($_arg['f'])?$_arg['f']:'').__METHOD__;
				global $gStore;
				$t=$gStore['coord_info'][trim($_arg['obj'])];
				
				
				reset ($t);
				while (list($key,$row)=each($t)){
					if (isset($row['show']) && isset($row['c_show']) && 1==trim($row['c_show'])){
						$g=self::coord_convert(array($row['c_gps_latitude'],$row['c_gps_longitude'],'t'=>0));
						if (isset($row['c_gps_latitude']) && ''!=trim($row['c_gps_latitude']) && isset($row['c_gps_longitude']) && ''!=trim($row['c_gps_longitude'])){
							$gStore['coord_info']['ymaps']['label'][]='YMaps.Styles.add("constructor#pmgrm'.$row['c_id'].'Placemark", {'.
									  'iconStyle : {'.
										  'href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm'.$row['c_id'].'.png",'.
										  'size : new YMaps.Point(28,29),'.
										  'offset: new YMaps.Point(-8,-27)'.
									  '}'.
								  '});';
							$gStore['coord_info']['ymaps']['overlay'][]='map.addOverlay('.
									  'createObject("Placemark", new YMaps.GeoPoint('.$row['c_gps_longitude'].','.$row['c_gps_latitude'].'),'.
									  '"constructor#pmgrm'.$row['c_id'].'Placemark",'.
									  '"'.$row['place'].'<br/><br/>'.$row['adr'].'<br /><br />GPS координаты:<br />Долгота: '.$g['out'][2]['longitude'].'<br />Широта: '.$g['out'][2]['latitude'].'"'.
								  '));';
						}
					}
				}
				


			}
		}
	}

?>