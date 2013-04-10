// параметры анимации
var m=new Object;
m={
	width:702,
	height: 39,
	content:{
		speed:{
			start1:10,
			start2:1,
			finish:1000
		},
		step:{
			start1:20,
			start2:1,
			finish:1
		},
		
		pos1:{ start:710, finish:0 },
		pos2:{ start:0,   finish:"-250" },
		
		pos3:{ start:710, finish:234 },
		pos4:{ start:234, finish:"-250" },
		
		pos5:{ start:710, finish:468 },
		pos6:{ start:468, finish:"-250" },
		
		width:230,
		height:39,
		left:0,
		tick:0,
		timeshift:20000,
		viewcount:0,
		viewcount_max:3
	}
}

//--- данные рекламных блоков
var banlist=new Object;
banlist={
	ban1:{
		on:1,
		shown:0,
		bgcolor:"red",
		text:"banner 1",
		pos:1,
		pos1_scheme:"pos1",
		pos2_scheme:"pos2"
	},
	
	ban2:{
		on:1,
		shown:0,
		bgcolor:"yellow",
		text:"banner 2",
		pos:1,
		pos1_scheme:"pos3",
		pos2_scheme:"pos4"
	},

	ban3:{
		on:1,
		shown:0,
		bgcolor:"blue",
		text:"banner 3",
		pos:1,
		pos1_scheme:"pos5",
		pos2_scheme:"pos6"
	}
}

function running_ban(on){
	if(typeof(on)=="undefined"){ on=true; }
	
	//--- инициализация КОНТЕЙНЕРА бегуна
	if(on){
		document.write("<div id=\"running_ban\"></div>");
		document.getElementById("running_ban").style.position="absolute";
		document.getElementById("running_ban").style.bottom="4px";
		document.getElementById("running_ban").style.left="4px";
		document.getElementById("running_ban").style.height=m.content.height+"px";
		document.getElementById("running_ban").style.width="702px";
		document.getElementById("running_ban").style.overflow="hidden";

		ban_init();
	}
}

function ban_init(){
	document.getElementById("running_ban").innerHTML="";
	
	for(i in banlist){
		curban=banlist[i];
		if(curban.on==1 && curban.shown==0){
			v=new Object;
			v={
				speed:m.content.speed.start1,
				step:m.content.step.start1,
				pos:{
					start:m.content[curban["pos"+curban.pos+"_scheme"]].start,
					finish:m.content[curban["pos"+curban.pos+"_scheme"]].finish
				},
				left:m.content[curban["pos"+curban.pos+"_scheme"]].start,
				dist:0
			}

			document.getElementById("running_ban").innerHTML+="<div id=\""+i+"\"></div>";
			document.getElementById(i).style.background=curban.bgcolor;
			document.getElementById(i).style.position="absolute";
			document.getElementById(i).style.top="0px";
			document.getElementById(i).style.left=v.left+"px";
			document.getElementById(i).style.height=m.content.height+"px";
			document.getElementById(i).style.width=m.content.width+"px";

			//--- вычисляем расстояние для торможения
			for(q=0,j=v.step;q<v.step;q++){ v.dist+=(j--); }
			
			banlist[i]
			ban_go(i,v);

			m.content.tick++;
			m.content.viewcount++;
		}
		if(m.content.viewcount>=m.content.viewcount_max){
			break;
		}
	}
}

function ban_go(i,v){
	document.getElementById(i).style.left=v.left+"px";
	document.getElementById(i).innerHTML=banlist[i].text+"<br />"+v.left+" - "+v.step;
	window.setTimeout(function(){ban_recalc1(i,v)},m.content.speed.current);
}

function ban_recalc1(i,v){
	if(v.left>v.pos.finish && v.step>0){
		if(v.left-v.pos.finish<v.dist && banlist[i].pos==1){ v.step-=1; }
		if(v.left-v.pos.finish>v.dist && banlist[i].pos==2){ v.step+=1; }
		
		v.left-=v.step;
		ban_go(i,v);
		return;
	}
	
	if(banlist[i].pos==1){
		
		banlist[i].pos=2;
		
		v=new Object;
		v={
			speed:m.content.speed.start2,
			step:m.content.step.start2,
			pos:{
				start:m.content[curban["pos"+banlist[i].pos+"_scheme"]].start,
				finish:m.content[curban["pos"+banlist[i].pos+"_scheme"]].finish
			},
			left:m.content[curban["pos"+banlist[i].pos+"_scheme"]].start,
			dist:0
		}
		for(q=0,j=20;q<20;q++){ v.dist+=(j--); }

		window.setTimeout(function(){ban_go(i,v)},m.content.timeshift);
	}else{
		banlist[i].pos=1;
	}
	
}

running_ban();