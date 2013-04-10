function mmenu_create(){
	btn_show=false;

	o1=document.getElementById("mmenu");
	if(typeof mmenu_pool!="undefined"){
		data=new Array();
		j1=0;
		for(i in mmenu_pool){
			if(mmenu_pool[i].on==1){
				if(mmenu_pool[i].show==1){
					t1=mmenu_pool[i].title.split(" ");
					t2=t1.join("&nbsp;");
					t3="<b>"+t2.substr(0,1)+"</b>"+t2.substr(1);
					
					if(mmenu_pool[i].active==1){
//						data[j1++]="<td><a href=\"?dr="+mmenu_pool[i].href+"\">"+mmenu_pool[i].title+"</a></td>";
						data[j1++]="<a href=\"?dr="+mmenu_pool[i].href+"\">"+t3+"</a>";
					}else{
//						data[j1++]="<td class=\"no_act\">"+mmenu_pool[i].title+"</td>";
						data[j1++]="<span class=\"no_act\">"+t3+"</span>";
					}
				}
			}
		}
		if(j1>0){
//			document.write("<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr>"+data.join("")+"</tr></table>");
			document.write(data.join(" "));
		}else{ document.write("<div align=\"center\">- список пунктов пуст -</div>"); }
		delete data;
	}else{ document.write("<div align=\"center\">- меню не найдено -</div>"); }
}

function submenu_create(parent,level,act,j1,show,sk){
	var data;
	var set_def=false;
	
	if(typeof(show)=="undefined"){
		show=1;
/*
1 - отображать с SHOW=1
2 - отображать с SHOW=1 и SHOW=0
*/
	}

	if(typeof(sk)=="undefined"){ sk=1; } //--- вариант отображения меню
	if(typeof(level)!="number"){ level=0; }
	if(typeof(act)=="undefined"){ act=""; }

	if(typeof(data1)!="array"){ var data1=new Array(); }
	if(typeof(data1[level])=="undefined"){ data1[level]=""; }
	if(level==0){ j1=0; }else{ j1++; }
	
	if(typeof obj=="undefined"){ obj=new Array(); }
	if(typeof parent=="string"){ obj[level]=mmenu_pool[parent]; }
	if(typeof parent=="object"){
		obj[level]=parent;
	}
	
	
	if(level==0 && typeof(obj[level].smenu)=="object" || level>0){
		for(i in obj[level]["smenu"]){
			current_page=obj[level]["smenu"][i];
			if(show==2 || show==1 && obj[level]["smenu"][i].show==1 || obj[level]["smenu"][i].show!=0){ //--- отображать ПУНКТ
				if((j1++)%2){ bg=" class=\"odd\""; }else{ bg=" class=\"even\""; }

				if(!set_def && act==obj[level]["smenu"][i].href || !set_def && act=="" && act!=obj[level]["smenu"][i].href && obj[level]["smenu"][i].def==1){
					bg=" class=\"act\"";
					set_def=true;
					hrf_c="hrf3";
					current_page=obj[level]["smenu"][i];
				}else{
					hrf_c="hrf2";
				}
				if(level>0){ addsub_place=" style=\"margin-left: "+(level*15)+"px\""; }else{ addsub_place=""; }
				
				if(obj[level]["smenu"][i].href==""){ hrf1="#"; }else{ hrf1="?dr="+obj[level]["smenu"][i].href; }
				
				if(sk==1){
					data1[level]+="<li"+bg+">"+
					     "<div"+addsub_place+">"+
						     "<a href=\""+hrf1+"\" class=\""+hrf_c+"\">"+obj[level]["smenu"][i].title+"</a>"+
							 "</div>"+
						          "</li>";
				}
				if(sk==2){
					data1[level]+="<li"+bg+">"+
						              "<a href=\""+hrf1+"\" onClick=\"change_layer('layer_"+i+"'); return false;\">"+obj[level]["smenu"][i].title+"111</a>"+
					              "</li>";
				}
				if(typeof(obj[level]["smenu"][i]["smenu"])=="object"){
					data1[level]+=submenu_create(obj[level]["smenu"][i],level+1,act,j1+1,show);
					delete data1[level+1];
				}
			}
		}
	}

	if(level==0){
		if(sk==1){
			data="<div class=\"block1\">"+
					 "<table class=\"table3\" width=\"100%\">"+
					 "<tr class=\"header1\"><td class=\"tl\"></td><td class=\"t\"></td><td class=\"tr\"></td></tr>"+
					 "<tr class=\"header1\"><td class=\"l\"></td><td class=\"data\">"+
					 mmenu_pool[parent].title+
					 "</td><td class=\"r\"></td></tr>"+
					 data1.join("")+
					 "<tr><td class=\"bl\"></td><td class=\"b\"></td><td class=\"br\"></td></tr>"+
					 "</table>"+
				 "</div>";
		}
		if(sk==2){
			data="<ul class=\"smenu2\">"+data1.join("\r\n")+"</ul>";
		}
		document.writeln(data);
	}else{ return data1.join(""); }
}

function addsub(cnt,c){
	t="";
	if(typeof c=="undefined"){ c="&nbsp;&nbsp;&nbsp;&nbsp;"; }
	if(typeof cnt!="undefined"){ for(var i=0; i<cnt; i++){ t+=c; } }
	return t;
}

//--- поиск пункта в меню

function mmenu_seek(name,object,level){
	if(typeof(name)!="undefined"){

		if(typeof(level)=="undefined"){ level=0; }

		if(typeof obj=="undefined"){ obj=new Array(); }
		if(typeof object=="object"){
			obj[level]=object;
		}else if(typeof object=="undefined" && typeof mmenu_pool[name]!="undefined"){
			obj[level]=mmenu_pool[name];
		}else{
			obj[level]=mmenu_pool;
		}

		if(typeof(i)!="object"){ var i=new Array(); }
		if(typeof(i[level])=="undefined"){ i[level]==""; }
	
		for(i[level] in obj[level]){
			if(i[level]==name){
				ans=obj[level][i[level]];
			}else{
				if(typeof(obj[level][i[level]].smenu)=="object"){
					ans=mmenu_seek(name,obj[level][i[level]].smenu,level+1);
				}
			}
		}
	}
	
	if(typeof(ans)!="undefined"){ return ans; }else{ return false; }
}