function clear(){
	for(i in pool){
		document.getElementById(pool[i]).style.display="none";
	}
}
function show_layer(o1){
	if(typeof(o1)!="undefined"){
		document.getElementById(o1).style.display="block";
	}
}

function change_layer(o1){
	clear();
	show_layer(o1);
}
