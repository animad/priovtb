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
		bgimage:"/pool/images/banners/runaway/wu_01.png",
		url:"/?dr=western.php",
		title:"Денежные переводы по России и за рубеж. Система WESTRN UNION. &raquo;Подробнее...",
		pos:1,
		pos_place:0
	},
	
	ban2:{
		on:1,
		shown:0,
		bgimage:"/pool/images/banners/runaway/contact_01.png",
		url:"/?dr=contact.php",
		title:"Денежные переводы по России и за рубеж. Система CONTACT. &raquo;Подробнее...",
		pos:1,
		pos_place:0
	},

	ban3:{
		on:1,
		shown:0,
		bgimage:"/pool/images/banners/runaway/strachovka_01.png",
		url:"/?dr=strahovka.php",
		title:"Система Страхования Вкладов. Ваши влады застрахованы. &raquo;Подробнее...",
		pos:1,
		pos_place:0
	},
	
	ban4:{
		on:1,
		shown:0,
		bgimage:"/pool/images/banners/runaway/monet_01.png",
		url:"/?dr=monet.php",
		title:"Продажа монет из драгоценных металлов. &raquo;Подробнее...",
		pos:1,
		pos_place:0
	},

	ban5:{
		on:1,
		shown:0,
		bgimage:"/pool/images/banners/runaway/ipoteka.png",
		url:"/?dr=cred_prioteka.php",
		title:"Ипотечное кредитование. &raquo;Подробнее...",
		pos:1,
		pos_place:0
	},
//
	ban6:{
		on:1,
		shown:0,
		bgimage:"/pool/images/banners/runaway/unistream_01.png",
		url:"/?dr=unistream.php",
		title:"Денежные переводы UNIStream. &raquo;Подробнее...",
		pos:1,
		pos_place:0
	},

	ban7:{
		on:1,
		shown:0,
		bgimage:"/pool/images/banners/runaway/korona_01.png",
		url:"/?dr=korona.php",
		title:"Денежные переводы Золотая Корона. &raquo;Подробнее...",
		pos:1,
		pos_place:0
	},

	ban8:{
		on:1,
		shown:0,
		bgimage:"/pool/images/banners/runaway/potreb-credit_01.png",
		url:"/?dr=cred_potreb.php",
		title:"Потребительское кредитование. &raquo;Подробнее...",
		pos:1,
		pos_place:0
	},

	ban9:{
		on:1,
		shown:0,
		bgimage:"/pool/images/banners/runaway/house_credit_01.png",
		url:"/?dr=cred_zhilischn.php",
		title:"Жилищное кредитование. &raquo;Подробнее...",
		pos:1,
		pos_place:0
	},

	ban10:{
		on:1,
		shown:0,
		bgimage:"/pool/images/banners/runaway/prio-client_01.png",
		url:"https://pc.priovtb.com",
		title:"Прио-клиент.",
		pos:1,
		pos_place:0
	}

}

//--- значения координат МЕСТ-ЯЧЕЕК рекламных блоков
var pos=new Object;
pos={
	1:{
		before: { start:710, finish:0      },
		post:   { start:0,   finish:"-250" },
		free:1
	},
	2:{
		before: { start:710, finish:234    },
		post:   { start:234, finish:"-250" },
		free:1
	},
	3:{
		before: { start:710, finish:468    },
		post:   { start:468, finish:"-250" },
		free:1
	}
}

function running_ban(on){
	if(typeof(on)=="undefined"){ on=true; }
	
	//--- инициализация КОНТЕЙНЕРА бегуна
	if(on){
		document.write("<div id=\"running_ban\"></div>");
		document.getElementById("running_ban").style.position="absolute";
//		document.getElementById("running_ban").style.bottom="4px";
		document.getElementById("running_ban").style.left="4px";
		document.getElementById("running_ban").style.height=m.content.height+"px";
		document.getElementById("running_ban").style.width="702px";
		document.getElementById("running_ban").style.overflow="hidden";

		ban_init();
	}
}

function ban_init(){
//	document.getElementById("running_ban").innerHTML="";
	
	for(i in banlist){
		curban=banlist[i];
		if(curban.on==1 && curban.shown==0){
			
			for(j in pos){
				if(pos[j].free==1){
					banlist[i].pos_place=j;
					pos[j].free=0;
					break;
				}
			}
			
			v=new Object;
			v={
				speed:m.content.speed.start1,
				step:m.content.step.start1,
				pos:{
					start:pos[j].before.start,
					finish:pos[j].before.finish
				},
				left:pos[j].before.start,
				dist:0
			}

			document.getElementById("running_ban").innerHTML+="<a "+(typeof(curban.url)!="undefined" && curban.url!=""?"href=\""+curban.url+"\"":"")+" id=\""+i+"\" title=\""+curban.title+"\">"+
//			                                                      "<div style=\"position: relative; margin-left: 67px; font-size: 10px; color: white; margin-top: 5px;\">"+
//			                                                          curban.text+
//			                                                      "</div>"+
			                                                  "</a>";
			document.getElementById(i).style.backgroundImage="url("+curban.bgimage+")";
			document.getElementById(i).style.backgroundPosition="top left";
			document.getElementById(i).style.backgroundRepeat="no-repeat";
//			document.getElementById(i).style.backgroundColor="#aaaaaa";
			document.getElementById(i).style.position="absolute";
			document.getElementById(i).style.top="0px";
			document.getElementById(i).style.left=v.left+"px";
			document.getElementById(i).style.height=m.content.height+"px";
			document.getElementById(i).style.width=m.content.width+"px";
			document.getElementById(i).style.display="block";

		

			//--- вычисляем расстояние для торможения
			for(q=0,j=v.step;q<v.step;q++){ v.dist+=(j--); }
			
			ban_go(i,v);

			m.content.tick++;
			m.content.viewcount++;
			
			//--- баннер показали
			banlist[i].shown=1;
		}
		
		if(m.content.viewcount>=m.content.viewcount_max){
			stop=true;
			break;
		}else{ stop=false; }
	}
	
	if(stop==false){
		
		//--- список завершился, а мы еще не набрали КОМПЛЕКТ баннеров
		for(i in banlist){
			banlist[i].shown=0;
		}
		ban_init();
	}else{
		//--- набрали КОМПЛЕКТ и список не закончился
		window.setTimeout(function(){ban_init()},(m.content.timeshift+4000));
	}
}

function ban_go(i,v){
	document.getElementById(i).style.left=v.left+"px";
	window.setTimeout(function(){ban_recalc1(i,v)},m.content.speed.current);
}

function ban_recalc1(i,v){
	//--- проверяем КОНЕЦ БЛОКА ДВИЖЕНИЯ
	if(v.left>v.pos.finish && v.step>0){
		//--- ВХОД -- уменьшение скорости
		if(v.left-v.pos.finish<v.dist && banlist[i].pos==1){ v.step-=1; }
		//--- ВЫХОД - увеличиваем плавно
		if(v.left-v.pos.finish>v.dist && banlist[i].pos==2){ v.step+=1; }
		//--- сдвигаем координату баннера
		v.left-=v.step;

		//--- отрисовываем баннер
		ban_go(i,v);
		
		work=true;
	}else{ work=false; }
	
	
	if(!work){
		if(banlist[i].pos==1){
			banlist[i].pos=2;

			v.speed=m.content.speed.start2;
			v.step=m.content.step.start2;
			v.pos.start=pos[banlist[i].pos_place].post.start;
			v.pos.finish=pos[banlist[i].pos_place].post.finish;
			v.left=pos[banlist[i].pos_place].post.start;
			for(q=0,v.dist=0,j=20;q<20;q++){ v.dist+=(j--); }

			window.setTimeout(function(){ban_go(i,v)},m.content.timeshift);
		
		}else if(banlist[i].pos==2){
			banlist[i].pos=1;

			pos[banlist[i].pos_place].free=1;
			banlist[i].pos_place=0;

			m.content.viewcount--;
		}
	}
	
}

running_ban();
