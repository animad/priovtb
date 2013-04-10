<?php

/*
--- список страниц
	$pglist->get($res,20,$_SERVER['REQUEST_URI'],(isset($_GET['page'])?$_GET['page']:0),10,'desc');
		res ------------------------------------ результат запроса mysql
		20 ------------------------------------- кол-во записей на страницу
		$_SERVER['REQUEST_URI'] ---------------- ссылка на себя, нужна для генерации ссылок на страницы
		(isset($_GET['page'])?$_GET['page']:0) - номер выбранной страницы
		10 ------------------------------------- кол-во номеров страниц, видимых за 1 раз
		desc ----------------------------------- desc/asc - порядок нумирации записей в результирующем списке

--- рассчет положения текущей сраницы
	list($total,$page,$pages,$first)=$pglist->calc($total,$per_page,(isset($_GET['page'])?$_GET['page']:0));

--- доступ к результату
	==> $pglist->pglist; //--- список сраниц
	==> $pglist->list;   //--- список записей

*/


	class pageList{
		var $pglist=null;
		var $list=null;
		var $ansErr=null;
	
		function calc($total=null,$per_page=null,$page1=0){ 
	
			if($total!=null && $per_page!=null){
				$pages=floor($total/$per_page); // Всего страниц
				if($page1>$pages || $page1<0){ $page1=0; }
				if(($total%$per_page)!=0){ $pages++; }
				if($page1==='last'){ $page1=$pages-1; }
				if($page1==='begin'){ $page1=0; }
				$first=$page1*$per_page; // С какой записи выводим
				
				return array($total,$page1,$pages,$first);
			}
		}
	
		function get($res=null,$per_page=20,$url=null,$page1=0,$pnppage=10,$numOrder='desc',$ancor=''){
			global $_comvars;
			
			$css_btn1=$_comvars['pglist']['css_btn1'];
			$css_btn1Active=$_comvars['pglist']['css_btn1Active'];
		
			if($res!=null && $url!=null){
				if(is_resource($res)){
					while($row=mysql_fetch_assoc($res)){ $res1[]=$row; }
					$res=$res1;
					unset($res1);
				}
			
				list($total,$page1,$pages,$first)=$this->calc(count($res),$per_page,$page1);

				//--- выбираем нужные строки
				if($per_page>$total){ $lim=$total; }else{ $lim=$per_page; }
				
				reset($res);
				for($i=0;$i<$first;$i++){ next($res); }
				$j1=0;
				do{
					$list_new[key($res)]=current($res);
					$j1++;
				}while($j1<$lim && next($res));

				if(isset($list_new)){
					//--- определение НУМИРАЦИИ
					reset($list_new);
					if($numOrder=='asc'){
						$j2=$first+1;
					}elseif($numOrder=='desc'){ $j2=$total-$first; }
					//--- расстановка номеров
					while(list($key,$val)=each($list_new)){
						if (is_array($list_new[$key])){
							$list_new[$key]['lineId']=($numOrder=='asc'?($j2++):($j2--));
						}
					}

					//--- изменяем ссылку на сраничке
					$url1=parse_url($url);
					if(isset($url1['query'])){
						parse_str($url1['query'],$url2);
						if(isset($url2['page'])){
							$s1='page='.$url2['page'];
							$url3=str_replace($s1,'page=%page%',$url);
						}else{ $url3=$url.'&page=%page%'; }
					}else{ $url3=$url.'?page=%page%'; }
				}

				//--- формирование списка страниц
				if(isset($pages) && $pages>1){
					if($pnppage>=$pages){
						$num_begin=0;
						$num_count=$pages;
					}else{
						$t1=floor($page1/$pnppage);
						$num_begin=$t1*$pnppage;
						$num_count=$num_begin+$pnppage;
					}
					if($num_begin>0){
						$href=str_replace('%page%',$num_begin-1,$url3);
						$pnprevious='<a href="'.$href.'#'.$ancor.'" class="'.$css_btn1.'" title="Перейти к странице #'.($num_begin).'"><b><</b></a>';
					}else{ $pnprevious=''; }

					if($num_count<$pages){
						$href=str_replace('%page%',$num_count,$url3);
						$pnnext='<a href="'.$href.'#'.$ancor.'" class="'.$css_btn1.'" title="Перейти к странице #'.($num_count+1).'"><b>></b></a>';
					}else{ $pnnext=''; }

					for($i=$num_begin;$i<$num_count && $i<$pages;$i++){
						if($page1==$i){
							$pglist[]='<span class="'.$css_btn1Active.'" title="Текущая страница.">'.($i+1).'</span>';
						}else{
							$href=str_replace('%page%',$i,$url3);
							$pglist[]='<a href="'.$href.'#'.$ancor.'" class="'.$css_btn1.'" title="Перейти к странице #'.($i+1).'">'.($i+1).'</a>';
						}
					}
				
					$href_begin=str_replace('%page%','begin',$url3);
					$href_last=str_replace('%page%','last',$url3);
					$pglist='<div align="center">'.
					            ($page1!=0?'<a href="'.$href_begin.'#'.$ancor.'" class="'.$css_btn1.'" title="Перейти к ПЕРВОЙ странице"><b>1</b> ...</a> ':'').
					            $pnprevious.' &nbsp; '.implode('',$pglist).' &nbsp; '.$pnnext.
					            ($page1!=($pages-1)?' &nbsp; <a href="'.$href_last.'#'.$ancor.'" class="'.$css_btn1.'" title="Перейти к ПОСЛЕДНЕЙ странице">... <b>'.($pages).'</b></a>':'').
					        '</div>';
				}else{ $pglist=''; }

				$this->pglist=$pglist;
				if(isset($list_new)){ $this->list=$list_new; }

			}else{ $this->ansErr='на вх. обязательно: ресурс MySQL, и ссылка текущей страницы'; }
		}
		
	}
?>
