	function pwr_generate(m,lim_r,lim_w){
	
		if(typeof(m)=="undefined"){ m=1; }else{ m=2; }
		if(typeof(lim_r)=="undefined"){ lim_r=3; }else{ lim_r=null; }
		if(typeof(lim_w)=="undefined"){ lim_w=null; }else{ lim_w=null; }
		
		limit=new Object();
		limit={
			rows:null,
			words:null
		}
		
		if(m==1){
			limit.rows=lim_r;
			limit.words=lim_w;
		}
		

		oc=document.getElementById("ob_collect");
		b1=document.getElementById("box1");
		oc.innerHTML="";
		t2=new Array(); // ������������� ��������� �����
		t1=new Array(); // ��������� ��������� ��������
		j1=0; // ������� �������� � ������
		j2=0; // ������� �������� ��������
		k1=0; // ������� ������
		
		stp=0; // ���������
		
		for(i in l1){
			v1="<a href=\""+l1[i].href+"\" class=\"cell3\" title=\"�������: "+l1[i].rate+"\">"+l1[i].text+"</a>";
			v2="<a href=\""+l1[i].href+"\" class=\"cell1\" id=\""+i+"\">"+l1[i].text+"</a>";
			oc.innerHTML+=v2;
			
//			if(oc.scrollWidth<b1.scrollWidth){
			if(oc.offsetWidth<b1.offsetWidth){
				t1[j1++]=v1;
				j2++;

				//--- � ������ ������������ ����
				if(limit.words!=null && j2>=limit.words){ break; }
			}else{
				//--- ������� � ��������
				t2[k1++]="<div><table class=\"pwr_ob\"><tr><td align=\"center\">"+t1.join("</td><td align=\"center\">")+"</td></tr></table></div>";
				//--- ������� ��������� ������ �� ������
				oc.innerHTML="";
				t1=new Array(); // ��������� ���������
				j1=0;

				//--- � ������ ������������ ����
				if(limit.rows!=null && k1>=limit.rows){ break; }

				//--- ������ ������� � ����� ��������� ������
				oc.innerHTML+=v2;
				t1[j1++]=v1;
				j2++;

				//--- � ������ ������������ ����
				if(limit.words!=null && j2>=limit.words){ break; }
			}

			
		}
		if(typeof(t1)!="undefined" && j1>0){
			t2[k1++]="<div><table class=\"pwr_ob\"><tr><td align=\"center\">"+t1.join("</td><td align=\"center\">")+"</td></tr></table></div>";
			oc.innerHTML="";
			delete t1;
		}
		
		if(m==1){
			document.getElementById("box1").innerHTML="<div class=\"pwr_topbtn_border\"><div style=\"padding-left: 10px;\">"+
			                                              "<span class=\"btn_act\">���������� ������� �����</span>"+
														  "<a href=\"?dr=pwr_list.php\" class=\"btn\">������ ������� ��������</a>"+
													  "</div></div>";
		}
		document.getElementById("box1").innerHTML+=t2.join("");
	}
