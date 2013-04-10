<?php

//	$res=gps::coord_convert(array('54.62039','39.75292','t'=>0));
//	$res=gps::coord_convert(array('54,37.224','39,45.175','t'=>1));
//	$res=gps::coord_convert(array('54,37,13.4','39,45,10.5','t'=>2));

	class gps{
		
		public function init($_arg=null){
			global $gStore;
			if (!isset($_COOKIE['data']['gps_out_format'])){
				$gStore['gps']['out_format']=2;
				$_COOKIE['data']['gps_out_format']=$gStore['gps']['out_format'];
			}else{ $gStore['gps']['out_format']=$_COOKIE['data']['gps_out_format']; }
		}
		
		public function coord_convert($_arg=null){
			if ('info'==$_arg){
				$i[]='';
				$i[]='---';
				$i[]='[0] - широта';
				$i[]='[1] - долгота';
				$i[]='t - формат координат на входе';
				
				print '<pre>';
				print_r(implode("\r\n",$i));
				print '</pre>';
			}else{
				$f=(isset($_arg['f'])?$_arg['f']:'').__METHOD__;

				$coords[0]='latitude';
				$coords[1]='longitude';
/*				
				$ans[0]['format']='&plusmn;DDD.ddddd&deg;';
				$ans[0]['mask_out']='%s%d.%05d&deg;';
				$ans[0]['mask_in']='%s%d.%05d';
				$ans[1]['format']='&plusmn;DDD&deg;MM.mmm&prime;';
				$ans[1]['mask_out']='%s%d&deg;%02d.%03d&prime;';
				$ans[1]['mask_in']='%s%d,%02d.%03d';
				$ans[2]['format']='&plusmn;DDD&deg;MM&prime;SS.s&Prime;';
				$ans[2]['mask_out']='%s%d&deg;%d&prime;%02d.%02d&Prime;';
				$ans[2]['mask_in']='%s%d,%d,%02d.%02d';
*/
				$ans[0]['format']='&plusmn;DDD.ddddd&deg;';
				$ans[0]['mask_out']='%s%s.%s&deg;';
				$ans[0]['mask_in']='%s%s.%s';
				$ans[1]['format']='&plusmn;DDD&deg;MM.mmm&prime;';
				$ans[1]['mask_out']='%s%s&deg;%s&prime;';
				$ans[1]['mask_in']='%s%s,%s';
				$ans[2]['format']='&plusmn;DDD&deg;MM&prime;SS.s&Prime;';
				$ans[2]['mask_out']='%s%s&deg;%s&prime;%s&Prime;';
				$ans[2]['mask_in']='%s%s,%s,%s';
				
				if (isset($_arg[0]) && ''!=trim($_arg[0])){
					$d[$coords[0]]=&$_arg[0];
				}else{ $d[$coords[0]]=0; }
				if (isset($_arg[1]) && ''!=trim($_arg[1])){
					$d[$coords[1]]=&$_arg[1];
				}else{ $d[$coords[1]]=0; }
				
				$ans['prefix'][$coords[0]]=('-'==substr($d[$coords[0]],0,1)?'S':'N');
				$ans['prefix'][$coords[1]]=('-'==substr($d[$coords[1]],0,1)?'W':'E');

				$ans['sign'][$coords[0]]=('-'==substr($d[$coords[0]],0,1)?'-':'');
				$ans['sign'][$coords[1]]=('-'==substr($d[$coords[1]],0,1)?'-':'');
				
				switch ($_arg['t']){
					default:
					case 0:
						for ($i=0;$i<2;$i++){
							$p=&$coords[$i];
							if ('-'==substr($d[$p],0,1)){ $d[$p]=substr($d[$p],1); }

							$res=self::get_int_part(array($d[$p],$f));
							if (true===$res[0]){
								
								$tmp=explode('.',$d[$p]);
								$ans[0][$p]['D']=$tmp[0];
								$ans[0][$p]['d']=$tmp[1];
								
								$ans[1][$p]['D']=$res[1];
								$ans[1][$p]['M']=floor(($d[$p]-$ans[1][$p]['D'])*60);
								$ans[1][$p]['m']=round(($d[$p]-$ans[1][$p]['D']-$ans[1][$p]['M']/60)*60,3);
								
								$ans[2][$p]['D']=$res[1];
								$ans[2][$p]['M']=floor(($d[$p]-$ans[2][$p]['D'])*60);
								$ans[2][$p]['S']=floor(($d[$p]-$ans[2][$p]['D']-($ans[1][$p]['M']/60))*3600);
								$ans[2][$p]['S']=floor(($d[$p]-$ans[2][$p]['D']-($ans[1][$p]['M']/60))*3600);
								$ans[2][$p]['s']=round(($d[$p]-$ans[2][$p]['D']-($ans[1][$p]['M']/60)-($ans[2][$p]['S']/3600))*3600,2);
							}
							$ans['out'][0][$p]=sprintf($ans[0]['mask_out'],$ans['prefix'][$p],$ans[0][$p]['D'],$ans[0][$p]['d']);
							$ans['out'][1][$p]=sprintf($ans[1]['mask_out'],$ans['prefix'][$p],$ans[1][$p]['D'],$ans[1][$p]['M']+$ans[1][$p]['m']);
							$ans['out'][2][$p]=sprintf($ans[2]['mask_out'],$ans['prefix'][$p],$ans[2][$p]['D'],$ans[2][$p]['M'],$ans[2][$p]['S']+$ans[2][$p]['s']);
						}
					break;
					case 1:
						for ($i=0;$i<2;$i++){
							$p=&$coords[$i];
							if ('-'==substr($d[$p],0,1)){ $d[$p]=substr($d[$p],1); }

							$tmp=explode(',',$d[$p]);
							$ans[0][$p]['D']=trim($tmp[0]);
							$ans[0][$p]['d']=round((floor($tmp[1])+($tmp[1]-floor($tmp[1])))/60,5)*100000;
							
							$ans[1][$p]['D']=$tmp[0];
							$ans[1][$p]['M']=floor($tmp[1]);
							$ans[1][$p]['m']=round(($tmp[1]-floor($tmp[1])),3);

							$ans[2][$p]['D']=$tmp[0];
							$ans[2][$p]['M']=floor($tmp[1]);
							$ans[2][$p]['S']=floor(($tmp[1]-floor($tmp[1]))*60);
							$ans[2][$p]['s']=round(((($tmp[1]-floor($tmp[1]))-$ans[2][$p]['S']/60)*60),2);

							$ans['out'][0][$p]=sprintf($ans[0]['mask_out'],$ans['prefix'][$p],$ans[0][$p]['D'],$ans[0][$p]['d']);
							$ans['out'][1][$p]=sprintf($ans[1]['mask_out'],$ans['prefix'][$p],$ans[1][$p]['D'],$ans[1][$p]['M']+$ans[1][$p]['m']);
							$ans['out'][2][$p]=sprintf($ans[2]['mask_out'],$ans['prefix'][$p],$ans[2][$p]['D'],$ans[2][$p]['M'],$ans[2][$p]['S']+$ans[2][$p]['s']);
						}
					break;
					case 2:
						for ($i=0;$i<2;$i++){
							$p=&$coords[$i];
							if ('-'==substr($d[$p],0,1)){ $d[$p]=substr($d[$p],1); }

							$tmp=explode(',',$d[$p]);
							$ans[0][$p]['D']=trim($tmp[0]);
							$ans[0][$p]['d']=round(((60*floor($tmp[1])+floor($tmp[2])+($tmp[2]-floor($tmp[2])))/3600)*100000);

							$ans[1][$p]['D']=$tmp[0];
							$ans[1][$p]['M']=$tmp[1];
//							$ans[1][$p]['m']=round(((floor($tmp[2])+($tmp[2]-floor($tmp[2])))/60)*1000);
							$ans[1][$p]['m']=round(((floor($tmp[2])+($tmp[2]-floor($tmp[2])))/60),3);

							$ans[2][$p]['D']=$tmp[0];
							$ans[2][$p]['M']=$tmp[1];
							$ans[2][$p]['S']=floor($tmp[2]);
//							$ans[2][$p]['s']=round(($tmp[2]-floor($tmp[2]))*100);
							$ans[2][$p]['s']=round($tmp[2]-floor($tmp[2]),2);

							$ans['out'][0][$p]=sprintf($ans[0]['mask_out'],$ans['prefix'][$p],$ans[0][$p]['D'],$ans[0][$p]['d']);
							$ans['out'][1][$p]=sprintf($ans[1]['mask_out'],$ans['prefix'][$p],$ans[1][$p]['D'],$ans[1][$p]['M']+$ans[1][$p]['m']);
							$ans['out'][2][$p]=sprintf($ans[2]['mask_out'],$ans['prefix'][$p],$ans[2][$p]['D'],$ans[2][$p]['M'],$ans[2][$p]['S']+$ans[2][$p]['s']);
						}
					break;
				}
				return $ans;
			}
		}
		
		private function get_int_part($_arg=null){
			$f=(isset($_arg['f'])?$_arg['f']:'').__METHOD__;

			if (isset($_arg[0]) && ''!=trim($_arg[0])){ $v=explode('.',trim($_arg[0])); }
			if (isset($v) && is_array($v)){
				return array(true,$v[0]);
			}else{
				return array(false,null,$_arg);
			}
		}

		private function get_float_part($_arg=null){
			$f=(isset($_arg['f'])?$_arg['f']:'').__METHOD__;

			if (isset($_arg[0]) && ''!=trim($_arg[0])){ $v=explode('.',trim($_arg[0])); }
			if (isset($v) && is_array($v)){
				return array(true,$v[1]);
			}else{
				return array(false,null,$_arg);
			}
		}
		
	}
?>