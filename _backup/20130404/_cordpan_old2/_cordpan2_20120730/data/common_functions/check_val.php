<?php
	function check_val($var=null,$exists=null,$empty=null,$email=null,$href=null,$v_or=null){
		if($var!=null){
			$box=$GLOBALS;
			$ans=0; //--- ���� 0 �� ��

			if($exists!=null && is_array($exists)){
				for($i=0;$i<count($exists);$i++){
					if(!isset($box[$var][$exists[$i]])){
						$ans++;
						if(!isset($erm)){ $erm='����������� ����������� ���������'; }
					}
				}
			}
		
			if($empty!=null && is_array($empty)){
				for($i=0;$i<count($empty);$i++){
					if(trim($box[$var][$empty[$i]])==''){
						$ans++;
						if(!isset($erm)){ $erm='���� ��������� (*) ����������� ��� ����������'; }
					}
				}
			}

			if($email!=null && is_array($email)){
				for($i=0;$i<count($email);$i++){
					//---
//					if(!isset($erm)){ $erm='����� e-mail ������ � �������'; }
				}
			}

			if($href!=null && is_array($href)){
				for($i=0;$i<count($href);$i++){
					//---
//					if(!isset($erm)){ $erm='������ � ��������� ������� � �������'; }
				}
			}
			
			if($v_or!=null && is_array($v_or)){ // ��������� ��� ������ ������ �������� �������� � ������� �� ������
				reset($variant);
				$j2=0;
				$j3=0;
				while(list($key,$val)=each($v_or)){
					if(is_array($val)){
						$val1=array_flat($val);
						$j1[$j2]=count($val1);
						while(list($key2,$val2)=each($val1)){
							if(trim($box[$var][$val2])!=''){ $j1[$j2]--; }
						}
						if($j1[$j2]>0 && $j1[$j2]!=count($val1)){
							$ans++;
							$erm='������ ����� ������ ** ��� ���� ������ ���� ���������';
							break;
						}
					}else{ $j1[$j2]=(trim($box[$var][$val])!=''?0:1); }
					if($j1[$j2]==0){ $j3++; }
					$j2++;
				}
				
				if(!isset($erm) && $j3==0){
					$ans++;
					$erm='��������� �� ����� � ** ������� ���� �� ���� �������';
				}elseif(!isset($erm) && $j3>1){
					$ans++;
					$erm='��������� �� ����� � ** ������� �� ����� ������ ��������';
				}
			}
			
			if($ans>0){
				$_SESSION['er']['msg']=$erm;

				$_SESSION['er']['show']=$_POST['show'];
				$_SESSION['er']['title']=$_POST['title'];
				$_SESSION['er']['href']=$_POST['href'];
				$_SESSION['er']['theme']=$_POST['theme'];
				$_SESSION['er']['section']=$_POST['section'];
				$_SESSION['er']['overview']=$_POST['overview'];
				$_SESSION['er']['single']=$_POST['single'];
				if(isset($_GET['m'])){ $_SESSION['er']['dest1']=$_GET['m']; }
				if(isset($_POST['dest2'])){ $_SESSION['er']['dest2']=$_POST['dest2']; }

				return false;
			}else{ return true; }
		}else{ return false; }
		
	}
?>
