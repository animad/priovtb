function get_news(adr){
	if(typeof(adr)!="undefined"){ ans=validmail(adr); }else{ ans=false; }
	if(ans){
		new_window=open('sendmail.php?usermail='+adr,'New','width=300,height=250');
	}else{
		alert("��������� ���� ����� \""+adr+"\"\r\n �� �������� ���������� ������� ����������� �����");
	}
}