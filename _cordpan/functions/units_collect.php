<?php

/*
�������� �����-�������� �� ���������� ��������

$place - ������� ��� ������
$unt_ext - ���������� ������ � ������� ������
$param - array - ��� ���������� �������� � �������� (������ �������� - 'uid:45', 'uid:' - ���� ����-�� ��������, ':45' - ���� ��������) ��������� ������� ���� � ������ ���������

*/
	
	function units_collect($place=null,$unt_ext='unt',$param=null){
			while(false!==($entry=$d->read())){
								$param_val=trim(substr(strstr($val1,':'),1));
							
								$tmp=units_parse(array($place.$entry));
								$tmp1=current($tmp);
								if($param_key!='' && $param_val!=''){
								}elseif($param_key!='' && $param_val==''){
								}elseif($param_key=='' && $param_val!=''){
								}
						}elseif(!is_array($param) && $param=null){
						}else{ $ok=false; }
					
						if(is_array($param) && count($param)>0 && $ok || !is_array($param)){
						}
					}
			}
			$d->close();
		}
		return(isset($data)?$data:null);
	}

?>