$(document).ready(function(){
	
	//--- подгрузка картинок только на ГЛАВНОЙ странице
	if(typeof(dr)=="undefined" || typeof(dr)!="undefined" && dr=="main.php"){
		MM_preloadImages(
			"banner_bankomats_01_over.png",
			"banner_pdd_06_over.png",
			"banner_terminals_01_over.png",
			"files/images/btn_startpage_btn2_over.png",
			"files/images/btn_startpage_btn1_over.png",
			"quick_contact_01_over.png",
			"point_arrow1.gif",
			"banner_2009_premija_over.png");
	}

	//--- инициализация MOUSEOVER на баннерах

	$('.jbtn').bind('mouseover',function(){
		$(this).children().filter('.box').addClass('over');
	});
	$('.jbtn').bind('mouseout',function(){
		$(this).children().filter('.box').removeClass('over');
	});
	
	//--- пересчет высоты DATAFRAME
	
	$('#dataframe').css('height',$('#dataframe').get(0).scrollHeight+'px');

	
});

$('.scroll_box').ready(function(){
	
	var p=5000;
	var slide_w=235;
	
	run = function(){
		$('.slide').slice(0,3).each(function(){
			$(this).clone().appendTo('.slider');
		});
		
		$('.slider').animate({marginLeft:"-="+slide_w*3},1000,function(){
			$('.slide').slice(0,3).each(function(){
				$(this).remove();
			});
			$(this).css('margin-left',0);
			t = setTimeout('run()',p)
		});
	}
	t = setTimeout('run()',p);
});