function page_load(){
	var t=new Array();
	j1=0;
	for(i in mm_active){ t[j1++]=i+"="+mm_active[i]; }

	t2="preload.php?"+t.join("&");
	parent.frames["frame1"].location=t2;
//	document.getElementById("frame1").location=t2;
}

function get_content(o1){
//	var t=o1.document.body.innerHTML;
//	o2=o1["contentDocument"];
//	for(i in o2){ t+=i+"="+o2[i]+"<br><br>"; }





	document.getElementById("dataframe").innerHTML=o1;
}

