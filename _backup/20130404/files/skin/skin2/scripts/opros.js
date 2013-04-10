	$(document).ready(function(){
		ans_decorate();
		
		$(".click .switcher").bind("mouseover",function(){
			var par=$(this).parent();
			if (!$(this).hasClass("active") || $(par).hasClass("multiple")){
				$(this).addClass("hover");
				$(this).css("cursor","pointer");
			}
		});
		$(".click .switcher").bind("mouseout",function(){
			$(this).removeClass("hover");
			$(this).css("cursor","default");
		});

		$(".click .switcher").bind("click",function(){
			var par=$(this).parent();
			if (!$(this).hasClass("active") || $(par).hasClass("multiple")){
				opros_click_precess(this);
			}
		});
	});
	
	opros_click_precess=function(obj){
		var par=$(obj).parent();
		var par_n=$(par).attr("name");
		
		if ($(par).hasClass("once")){
			var vp=$("#"+par_n+"_value");
			if (0<$(vp).size()){
				$(vp).val($(obj).attr("value"));
				$(obj).parent().children().each(function(){
					$(this).removeClass("active");
				});
				$(obj).addClass("active");
			}
		}
		if ($(par).hasClass("multiple")){
			var vp=$("#"+par_n+"_"+$(obj).attr("name")+"_value");
			if (0<$(vp).size()){
				if ($(obj).hasClass("active")){
					$(vp).val("");
					$(obj).removeClass("active");
				}else{
					$(vp).val($(obj).attr("value"));
					$(obj).addClass("active");
				}
			}
		}
		
	};
	
	ans_decorate=function(){
		$(".ans_var").each(function(){
			$(this).append('<div class="corner_bl"></div><div class="corner_br"></div><div class="corner_tl"></div><div class="corner_tr"></div><div class="border_b"></div><div class="border_t"></div><div class="border_l"></div><div class="border_r"></div>');
		});
	}
	
	opros_form_check=function(obj){
		var ans=false;
		var err=0;
		
		if (''==$("#office_list option:selected").val()){
			err++;
			$("#office_list").parents().filter(".row").addClass("error");
		}else{
			$("#office_list").parents().filter(".row").removeClass("error");
		}
		
		$(obj+" .required").each(function(){
			var r0=$(this);
			if ($(this).hasClass("multiple")){
				var a1=$(this).children().filter(".switcher").size();
				var a2=0;
				var v=$(this).children().filter(".switcher").each(function(r1){
					var r2=$(r0).attr("name")+"_"+$(this).attr("name")+"_value";
					if (''==$("#"+r2).val()){ a2++; }
				});
				if (0==(a1-a2)){
					err++;
					$(this).parents().filter(".row").addClass("error");
				}else{
					$(this).parents().filter(".row").removeClass("error");
				}
			}
			if ($(this).hasClass("once")){
				if ($(this).hasClass("list_options")){
					var v=$("#"+$(this).attr("name")+"_value").val();
					if (""==v){
						err++;
						$(this).parents().filter(".row").addClass("error");
					}else{
						$(this).parents().filter(".row").removeClass("error");
					}
				}
			}
			if ($(this).hasClass("list_text")){
				var v=$(this).val();
				if (''==$(this).val()){
					err++;
					$(this).parents().filter(".row").addClass("error");
				}else{
					$(this).parents().filter(".row").removeClass("error");
				}
			}
			if ($(this).hasClass("callback_data")){
				var v=$(this).val();
				if (''==$(this).val()){
					err++;
					$(this).parents().filter(".row").addClass("error");
				}else{
					$(this).parents().filter(".row").removeClass("error");
				}
			}
		});
		
		if (0<err){ ans=false; }else{ ans=true; }
		return ans;
	}
	
	request_show_switch=function(obj){
		if ('show'==$(obj).attr("name")){
//			$("#callback_info").slideDown();
			$("#callback_info").show();
			$("#callback_data").addClass("required");
		}else if ('hide'==$(obj).attr("name")){
//			$("#callback_info").slideUp();
			$("#callback_info").hide();
			$("#callback_data").removeClass("required");
		}
	}