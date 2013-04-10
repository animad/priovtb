$(".bail_form").ready(function(){
	$("[name=bail_content_type]").bind("change",function(){
		bail_form_content_type_changer();
	});
	
	bail_form_content_type_changer();
});

bail_form_content_type_changer = function(){
	
	var v=$("[name=bail_content_type] option:selected").attr("value");
	$(".bail_content").hide().filter("."+v).show();
	
}

/* bail_photo_manager */

$(".rp_photo_free").ready(function(){
	bpm_free_list_decorate();
	
	$(".rp_photo_free td input[type='radio']").bind("click",function(){
		bpm_ckick1_react(this);
	});
});

bpm_free_list_decorate = function(){
	$(".rp_photo_free tr").removeClass("odd even");
	$(".rp_photo_free tr:even").addClass("even");
	$(".rp_photo_free tr:odd").addClass("odd");
	
}

bpm_ckick1_react = function(o1){
	var l1=$(o1).attr("name");

//	$(".temp_pic input[name='"+l1+"']:disabled").attr("disabled","");
	$(".temp_pic input[name='"+l1+"']").val($(o1).attr("value"));

	if ('thumb'==l1){
//		$(o1).parent().parent().children().filter("input[name='preview']").attr("set","deb");
	//	$(o1).parent().children("[name='preview']").attr("disabled","disabled");
		$(".temp_pic ."+l1+" td").html("Миниатюра: "+$(o1).attr("value"));
	}else{
//		$(o1).parent().filter("thumb").attr("disabled","disabled");
		$(".temp_pic ."+l1+" td").html("Полная картинка: "+$(o1).attr("value"));
	}
	
	temp_pic_check();
}

temp_pic_check = function(){
	if (''!=$(".temp_pic [name='thumb']").val() && ''!=$(".temp_pic [name='preview']").val()){
		$(".temp_pic table").slideDown();
	}else{
		$(".temp_pic table").slideUp();
	}
}
