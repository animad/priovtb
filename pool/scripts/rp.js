var img=null;

$(document).ready(function(){
	$(".rp_filter .btn").bind("mouseover",function(){
		$(this).addClass("over");
	});
	$(".rp_filter .btn").bind("mouseout",function(){
		$(this).removeClass("over");
	});

	$(".rp_list .row[href]").bind("mouseover",function(){
		$(this).addClass("over");
	});
	$(".rp_list .row[href]").bind("mouseout",function(){
		$(this).removeClass("over");
	});

	$(".rp_filter .btn").bind("click",function(){
		window.location=$(this).attr("href");
		filter_change();
	});
	$(".rp_list .row[href]").bind("click",function(){
		window.location=$(this).attr("href");
	});
	
	$(".property_pics .btn_image").bind("mouseover",function(){
		if ($(this).children(".img_preview")){
			$(this).addClass("over");
		}
	});
	$(".property_pics .btn_image").bind("mouseout",function(){
		if ($(this).children(".img_preview")){
			$(this).removeClass("over");
		}
	});

	$(".property_pics .btn_image").bind("click",function(){
		if ($(this).children(".img_preview")){
			property_list_pics_preview_show($(this));
		}
	});
	
	$(".property_pics .btn_close, .property_pics .btn_next, .property_pics .btn_prev").bind("mouseover",function(){
		$(this).addClass("over");
	});
	$(".property_pics .btn_close, .property_pics .btn_next, .property_pics .btn_prev").bind("mouseout",function(){
		$(this).removeClass("over");
	});
	$(".preview_box .btn_close").bind("click",function(){
		property_list_pics_preview_close();
	});
	$(".preview_box .btn_next").bind("click",function(){
		property_list_pics_preview_next();
	});
	$(".preview_box .btn_prev").bind("click",function(){
		property_list_pics_preview_prev();
	});

	$(window).bind("resize",function(){
		set_prev_btn_width();
	});
	
	$(".rp_list .row:odd").addClass("odd");
	$(".rp_list .row:even").addClass("even");

	
});

//--- просматривает картинку в увеличенном режиме
property_list_pics_preview_show = function(o1){
	$(".property_pics .btn_image").each(function(i){
		if ($(o1).children(".img_preview").attr("src")==$(this).children(".img_preview").attr("src")){
			img=i;
			return false;
		}
	});
	set_prev_btn_width();
	
	property_list_pics_preview_change();
	$(".preview_box").fadeIn("fast");
}
set_prev_btn_width = function(){
	var	img1=$(".property_pics").children(".btn_image").get(img);
	$(".property_pics .btn_prev").css("width",(($(window).width()-$(img1).children(".img_preview").width())/2)+"px");
}

property_list_pics_preview_close = function(){
	$(".preview_box").fadeOut("fast");
	$(".preview_box .img").css("background-image","none");
}

property_list_pics_preview_change = function(){
	var	o1=$(".property_pics").children(".btn_image").get(img);
	$(".preview_box .img").css("background-image","url("+$(o1).children(".img_preview").attr("src")+")");
}
property_list_pics_preview_next = function(){
	img++;
	if (typeof($(".property_pics").children(".btn_image").get(img))=="undefined"){
		img=0;
	}
	property_list_pics_preview_change();
}
property_list_pics_preview_prev = function(){
	img--;
	if (img<0){
		img=$(".property_pics").children(".btn_image").length-1;
	}
	property_list_pics_preview_change();
}
