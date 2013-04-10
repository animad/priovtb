function numbersOnly(evt){
	evt=(evt)?evt:((window.event)?event:null);
	if(evt){
		var elem=(evt.target)?evt.target:((evt.srcElement)?evt.srcElement:null);
		if(elem){
			var charCode=(evt.charCode)?evt.charCode:((evt.which)?evt.which:evt.keyCode);
			if((charCode<32) || (charCode>44 && charCode<47) || (charCode>47 && charCode<58)){
				return true;
			}else{ return false; }
		}
	}
}
