opros_selection_check=function(obj1){
	if ("undefined"!=typeof(obj1)){
		if (0<$("."+obj1+" :checked").size()){
			return true;
		}else{
			alert("Выделение пусто");
			return false;
		}
	}
}

opros_list_form_go=function(obj1,t){
	if ("undefined"==typeof(t)){ t="all"; }
	if ("undefined"!=typeof(obj1)){
		if (false!=obj1){
			$("#opros_list").children().filter("[name='t']").val(t);
			$("#opros_list").submit();
			return true;
		}else{ return false; }
	}else{ return false; }
}