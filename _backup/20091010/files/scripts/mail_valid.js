function validmail(adr) {
	var result=false;
	if(typeof(adr)!="undefined"){
		//alert(mailstring.indexOf ('@'));
		if(adr.indexOf ("@")!=-1 && adr.indexOf (".")!=-1 && adr.length>5){ result=true; }
	}
	return result;
}