$("#banner_04").ready(function(){
	$("#banner_04").bind("mouseover",function(){
		$(this).addClass("over");
	});
	$("#banner_04").bind("mouseout",function(){
		$(this).removeClass("over");
	});

	$("#banner_04").bind("click",function(){
		window.location=$(this).attr("href");
	});
	
	
});
