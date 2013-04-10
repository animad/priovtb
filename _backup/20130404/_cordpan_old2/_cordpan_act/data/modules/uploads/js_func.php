function fav_dir(dir){	if(typeof dir!="undefined"){		ans=prompt("Каталог: "+dir+"\r\nУкажите название закладки:");
		if(ans!=null && ans!=""){					adr=encodeURI("<?=$_SERVER['PHP_SELF'];?>");

			var elem=document.createElement("input");
			elem.setAttribute("type","hidden");
			elem.setAttribute("value","<?=$_GET['dr'];?>");
			elem.setAttribute("name","dr");
			document.do_01.appendChild(elem);

			var elem=document.createElement("input");
			elem.setAttribute("type","hidden");
			elem.setAttribute("value",dir);
			elem.setAttribute("name","cdir");
			document.do_01.appendChild(elem);

			var elem=document.createElement("input");
			elem.setAttribute("type","hidden");
			elem.setAttribute("value",ans);
			elem.setAttribute("name","cdir_title");
			document.do_01.appendChild(elem);

			document.do_01.action=adr;
			document.do_01.submit(true);
		
		}
	}
}

function fav_dir_del(){	o_form=document.getElementById("FfavPlace");
	o_dlist1=document.getElementById("favPlace");
	o_dlist2=o_dlist1.options[o_dlist1.selectedIndex];
	
	if(o_dlist2.text!=""){
		if(confirm("Закладка \""+o_dlist2.text+"\". Удалить?")){
			var elem=document.createElement("input");
			elem.setAttribute("type","hidden");
			elem.setAttribute("value","fav_dir_del");
			elem.setAttribute("name","m");
			o_form.appendChild(elem);

			var elem=document.createElement("input");
			elem.setAttribute("type","hidden");
			elem.setAttribute("value","<?=$_GET['dr'];?>");
			elem.setAttribute("name","dr");
			o_form.appendChild(elem);

			o_form.method="get";
			o_form.action="<?$_SERVER['PHP_SELF']?>";
			o_form.submit(true);
//alert(o_dlist2.value);

		}
	}
}function dir_create(dir){	if(typeof dir!="undefined"){		ans=prompt("Активный каталог: "+dir+"\r\nУкажите название нового каталога:");		if(ans!=null && ans!=""){			var elem=document.createElement("input");			elem.setAttribute("type","hidden");			elem.setAttribute("value","mkdir");			elem.setAttribute("name","m");			document.do_01.appendChild(elem);			var elem=document.createElement("input");			elem.setAttribute("type","hidden");			elem.setAttribute("value","<?=$_GET['dr'];?>");			elem.setAttribute("name","dr");			document.do_01.appendChild(elem);			var elem=document.createElement("input");			elem.setAttribute("type","hidden");			elem.setAttribute("value",dir);			elem.setAttribute("name","cdir");			document.do_01.appendChild(elem);			var elem=document.createElement("input");			elem.setAttribute("type","hidden");			elem.setAttribute("value",ans);			elem.setAttribute("name","new_dir");			document.do_01.appendChild(elem);			document.do_01.method="get";			document.do_01.action="<?$_SERVER['PHP_SELF']?>";			document.do_01.submit(true);		}	}}