
function pr_title(){
	if(current_page!=null && typeof(current_page.title_p)!="undefined"){ tp=current_page.title_p+"<br />"; }else{ tp=""; }
	if(current_page!=null && typeof(current_page.title)!="undefined"){
		document.writeln("<h1>"+tp+current_page.title+(typeof(current_page.title2)!="undefined"?current_page.title2:"")+"</h1>");
		document.title=document.title+" | "+(current_page!=null && typeof(current_page.title_p)!="undefined"?current_page.title_p+", ":"")+current_page.title;
	}
}

$(document).ready(function(){
	$(".btn_customize").bind("click",function(){
		t=$(this).attr("var");
		if (typeof(t)!="undefined" && ""!=t){
			d_customize({type:$(this).attr('var'), title:"Настройка. Раздел: GPS"});
		}
	});
});

d_customize=function(_arg){
	alert(_arg.type+" - "+_arg.title);
}