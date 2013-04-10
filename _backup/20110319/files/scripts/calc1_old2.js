//--- счетчик на главной странице

function calc1_field(summa,kurs1,kurs2,typemoney) {
	switch (typemoney){
		case 1:
			document.getElementById('usd_bay').value=Math.round(summa/kurs1*100)/100;
			document.getElementById('eur_bay').value=Math.round(summa/kurs2*100)/100;
			break;
		case 2:
			document.getElementById('rur_bay').value=Math.round(summa*kurs1*100)/100;
			document.getElementById('eur_bay').value=Math.round(summa/kurs2*100)/100;
			break;
		case 3:
			document.getElementById('usd_bay').value=Math.round(summa*kurs1*100)/100;
			document.getElementById('rur_bay').value=Math.round(summa*kurs2*100)/100;
			break;
		case 4:
			document.getElementById('usd_sale').value=Math.round(summa/kurs1*100)/100;
			document.getElementById('eur_sale').value=Math.round(summa/kurs2*100)/100;
			break;
		case 5:
			document.getElementById('rur_sale').value=Math.round(summa*kurs1*100)/100;
			document.getElementById('eur_sale').value=Math.round(summa/kurs2*100)/100;
			break;
		case 6:
			document.getElementById('usd_sale').value=Math.round(summa*kurs1*100)/100;
			document.getElementById('rur_sale').value=Math.round(summa*kurs2*100)/100;
			break;
	}
}

function calc1_clear() {
	document.getElementById('rur_sale').value="";
	document.getElementById('rur_bay').value="";
	document.getElementById('usd_sale').value="";
	document.getElementById('usd_bay').value="";
	document.getElementById('eur_sale').value="";
	document.getElementById('eur_bay').value="";
}

function calc1_key(o1,kurs1,kurs2,type){
//	inpField.onkeyup = function(evt) { reaction(evt); }; 
	
//	alert(o1.evt);
//	evt=(window.event)?event:null;
	if(evt && event.keyCode==13){
		if (isNaN(o1.value)){
			o1.value="";
		}else{
			calc1_field(o1.value,kurs1,kurs2,type);
		}
	}
}

//-------------
