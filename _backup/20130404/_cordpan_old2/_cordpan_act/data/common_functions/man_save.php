<?php

	function man_q1_add($data=null){ //--- заводчик
		if($data!=null){
			$ans=man_add(array('screenName'=>$data['manufacturer_add'],'manufacturer'=>'true'));
		}else{ $erm='Данные для записи отсутствуют'; }
		return isset($ans)?$ans:array(false,$erm,false);
	}

	function man_q2_add($data=null){ //--- владелец
		if($data!=null){
			$ans=man_add(array('screenName'=>$data['owner_add'],'owner'=>'true'));
		}else{ $erm='Данные для записи отсутствуют'; }
		return isset($ans)?$ans:array(false,$erm,false);
	}

	function man_q3_add($data=null){ //--- владелец
		if($data!=null){
			$ans=man_add(array('screenName'=>$data['sowner_add'],'owner'=>'true'));
		}else{ $erm='Данные для записи отсутствуют'; }
		return isset($ans)?$ans:array(false,$erm,false);
	}

	function man_add($data=null,$ext='unt'){
		global $_glovars,$_modvars,$_dir;
		if(!function_exists('data_save')){ include($_dir['common_func'].'/data_save.php'); }

		$val1=$_POST;

		if(is_array($data)){
			$unit_content=array('name','surname','patronymic','screenName','phone','email','owner','manufacturer');
			while(list($key,$val)=each($unit_content)){
				$data2save[]=$val.':'.(isset($data[$val])?trim($data[$val]):'');
			}
		}
		
		list($ans,$erm,$cur_id)=data_save((isset($data2save)?$data2save:null),$_dir['site'].$_glovars['dir_mans'],$val1);
		return array($ans,$erm,$cur_id);
	}

?>