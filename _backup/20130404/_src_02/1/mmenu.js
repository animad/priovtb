/*
	exclude - �� ���� ��������� ������ �� ������������, ����� ������ ��������� ���������
	br1:{ br:true }, - ������� �� ����� ������
*/

var mmenu_pool=new Object();
mmenu_pool={
	main:{ nm:"main", on:"1", show:"1", active:"1", def:"1", raiting:"0", title:"�������", href:"main.php", smenu:"" },
	news:{ nm:"news", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������", href:"news_all.php", smenu:"" },
	about:{ nm:"about", on:"1", show:"1", active:"1", def:"0", raiting:"1", raiting:"0", title:"� �����", href:"history.php",
		smenu:{
			history:{ nm:"history", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"������� �����", href:"history.php", smenu:"" },
			rukov:{ nm:"rukov", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�����������", href:"rukov.php", smenu:"" },
			let15:{ nm:"let15", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"��������������� ����-�������������", href:"15let.php",
				smenu:{
					s1:{ nm:"s1", on:"1", show:"0", active:"0", def:"1", raiting:"1", order:"20041117", title_p:"��������������� ����-�������������", title:"17 ������. � ���� ������ ���� �������� ������.", href:"15let.php&s=1", smenu:"" },
					s2:{ nm:"s2", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041130", title_p:"��������������� ����-�������������", title:"30 ������ - 6 �������. ����� ��������� ����������", href:"15let.php&s=2", smenu:"" },
					s3:{ nm:"s3", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041203", title_p:"��������������� ����-�������������", title:"3 �������. ������� ��� �����-���������", href:"15let.php&s=3", smenu:"" },
					s4:{ nm:"s4", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041203", title_p:"��������������� ����-�������������", title:"3 �������. ������ � ���", href:"15let.php&s=4", smenu:"" },
					s5:{ nm:"s5", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041203", title_p:"��������������� ����-�������������", title:"3 �������. �����������", href:"15let.php&s=5", smenu:"" },
					s6:{ nm:"s6", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041204", title_p:"��������������� ����-�������������", title:"4 �������. ������ �� ���������� ������� ������ ����-�������������", href:"15let.php&s=6", smenu:"" },
					s7:{ nm:"s7", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041204", title_p:"��������������� ����-�������������", title:"4 �������. ������ � ���", href:"15let.php&s=7", smenu:"" },
					s8:{ nm:"s8", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041204", title_p:"��������������� ����-�������������", title:"4 �������. �����������", href:"15let.php&s=8", smenu:"" },
					s9:{ nm:"s9", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041206", title_p:"��������������� ����-�������������", title:"6 �������. ����������� ������� ����-������������� �� ������������� �������� �������� ������� � ����� �� ��. ������", href:"15let.php&s=9", smenu:"" },
					s10:{ nm:"s10", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041206", title_p:"��������������� ����-�������������", title:"6 �������. ������ � ���", href:"15let.php&s=10", smenu:"" },
					s11:{ nm:"s11", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041206", title_p:"��������������� ����-�������������", title:"6 �������. ���������", href:"15let.php&s=11", smenu:"" },
					s12:{ nm:"s12", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041206", title_p:"��������������� ����-�������������", title:"6 �������. �����������", href:"15let.php&s=12", smenu:"" },
					s13:{ nm:"s13", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041209", title_p:"��������������� ����-�������������", title:"9 �������. � ����-������������� ��������� �������� ���� �� ���� ��������������� ���������� ��������-���������� ����������. ���������� ������� �������������� ����� � ���.�", href:"15let.php&s=13", smenu:"" },
					s14:{ nm:"s14", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041209", title_p:"��������������� ����-�������������", title:"9 �������. ���������", href:"15let.php&s=14", smenu:"" },
					s15:{ nm:"s15", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20041209", title_p:"��������������� ����-�������������", title:"9 �������. �����������", href:"15let.php&s=15", smenu:"" }
				}
			},
			let18:{ nm:"let18", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"����������������� ����-�������������", href:"18let.php",
				smenu:{
					s1:{ nm:"s1", on:"1", show:"0", active:"0", def:"1", raiting:"1", order:"20071019", title_p:"����������������� ����-�������������", title:"19 �������. ��������� � ��������, ���������� ����-�������������� (���) � ������ ��������ܻ � ����� � 18-�� ������ �� ��� ��������.", href:"18let.php&s=1", smenu:"" },
					s2:{ nm:"s2", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20071025", title_p:"����������������� ����-�������������", title:"25 �������. 1-� ���� �������� (��������).", href:"18let.php&s=2", smenu:"" },
					s3:{ nm:"s3", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20071025", title_p:"����������������� ����-�������������", title:"25 �������. ���������� 1-�� ���� ���������.", href:"18let.php&s=3", smenu:"" },
					s4:{ nm:"s4", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20071101", title_p:"����������������� ����-�������������", title:"1 ������. 2-� ���� �������� (��������).", href:"18let.php&s=4", smenu:"" },
					s5:{ nm:"s5", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20071201", title_p:"����������������� ����-�������������", title:"1 ������. ���������� 2-�� ���� ���������.", href:"18let.php&s=5", smenu:"" },
					s6:{ nm:"s6", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20071208", title_p:"����������������� ����-�������������", title:"8 ������. 3-� ���� �������� (��������).", href:"18let.php&s=6", smenu:"" },
					s7:{ nm:"s7", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20071208", title_p:"����������������� ����-�������������", title:"8 ������. ���������� 3-�� ���� ���������.", href:"18let.php&s=7", smenu:"" },
					s8:{ nm:"s8", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20071215", title_p:"����������������� ����-�������������", title:"15 ������. ���������� 4-�� ���� ���������.", href:"18let.php&s=8", smenu:"" },
					s9:{ nm:"s9", on:"1", show:"0", active:"0", def:"0", raiting:"1", order:"20071223", title_p:"����������������� ����-�������������", title:"23 ������. ���������� 5-�� ���� ���������.", href:"18let.php&s=9", smenu:"" }
				}
			},
			maslennica:{ nm:"maslennica", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������� ���������", href:"",
				smenu:{
					maslenica08:{ nm:"maslenica08", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"�������� ���������", title:"��� 2008", href:"maslenica08.php", smenu:"" },
					maslenica07:{ nm:"maslenica07", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"�������� ���������", title:"��� 2007", href:"maslenica07.php", smenu:"" },
					maslenica06:{ nm:"maslenica06", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"�������� ���������", title:"��� 2006", href:"maslenica06.php", smenu:"" },
					maslenica05:{ nm:"maslenica05", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"�������� ���������", title:"��� 2005", href:"maslenica05.php", smenu:"" }
				}
			},
			childrentown:{ nm:"childrentown", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"����� �������", href:"childrentown.php",
				smenu:{
					ct_about:{ nm:"childrentown/about", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"� �������", href:"childrentown/about.php", smenu:"" },
					ct_members:{ nm:"childrentown/members", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"������ ���������� �������", href:"childrentown/members.php", smenu:"" },
					ct_news1:{ nm:"childrentown/news1", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"\"��������\", 6-12 ������� 2004 ����", href:"childrentown/news1.htm", smenu:"" },
					ct_news2:{ nm:"childrentown/news2", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"���� \"7 ��������\", 6 ������� 2004�", href:"childrentown/news2.htm", smenu:"" },
					ct_news3:{ nm:"childrentown/news3", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"��������, 13-19 ������� 2004�", href:"childrentown/news3.htm", smenu:"" },
					ct_news4:{ nm:"childrentown/news4", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"������������� ������, 10 ������� 2004�", href:"childrentown/news4.htm", smenu:"" },
					ct_news5:{ nm:"childrentown/news5", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"����� ����������, 13 ������� 2004 ����", href:"childrentown/news5.htm", smenu:"" },
					ct_news6:{ nm:"childrentown/news6", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"����� ����������, 20 ���� 2005 ����", href:"childrentown/news6.htm", smenu:"" },
					ct_news7:{ nm:"childrentown/news7", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"��������� �������, 22 ���� 2005 ����", href:"childrentown/news7.htm", smenu:"" },
					ct_news8:{ nm:"childrentown/news8", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"����� �������", title:"��������� ���������, 22 ���� 2005 ����", href:"childrentown/news8.htm", smenu:"" }
				}
			},
			elbrus:{ nm:"elbrus/page1", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������ \"������ � ��������\"", href:"elbrus/page1.htm",
				smenu:{
					elbrus_02:{ nm:"elbrus/page2", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page2.htm", smenu:"" },
					elbrus_03:{ nm:"elbrus/page3", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page3.htm", smenu:"" },
					elbrus_04:{ nm:"elbrus/page4", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page4.htm", smenu:"" },
					elbrus_05:{ nm:"elbrus/page5", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page5.htm", smenu:"" },
					elbrus_06:{ nm:"elbrus/page6", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page6.htm", smenu:"" },
					elbrus_07:{ nm:"elbrus/page7", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page7.htm", smenu:"" },
					elbrus_08:{ nm:"elbrus/page8", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page8.htm", smenu:"" },
					elbrus_09:{ nm:"elbrus/page9", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page9.htm", smenu:"" },
					elbrus_10:{ nm:"elbrus/page10", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page10.htm", smenu:"" },
					elbrus_11:{ nm:"elbrus/page11", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page11.htm", smenu:"" },
					elbrus_12:{ nm:"elbrus/page12", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page12.htm", smenu:"" },
					elbrus_13:{ nm:"elbrus/page13", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page13.htm", smenu:"" },
					elbrus_14:{ nm:"elbrus/page14", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page14.htm", smenu:"" },
					elbrus_15:{ nm:"elbrus/page15", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"������ \"������ � ��������\"", title:"����� �� �������", href:"elbrus/page15.htm", smenu:"" }
				}
			},
			coord:{ nm:"coord", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"���� ����������", href:"coord.php", smenu:"" },
			rekvizit:{ nm:"rekvizit", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"���������, ��������, ��������", href:"rekvizit.php",
				smenu:{
					promnewphone:{ nm:"promnewphone", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������������ ���������", href:"promnewphone.php", smenu:"" }
				}
			},
			finres:{ nm:"finres", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"���������� � ���������� ����������", href:"",
				smenu:{
					finans07:{ nm:"finans07", on:"1", show:"1", active:"1", def:"0", raiting:"1", title_p:"���������� � ���������� ����������", title:"��� 2007", href:"finans07.php", smenu:"" },
					finans06:{ nm:"finans06", on:"1", show:"1", active:"1", def:"0", raiting:"1", title_p:"���������� � ���������� ����������", title:"��� 2006", href:"finans06.php", smenu:"" },
					finans05:{ nm:"finans05", on:"1", show:"1", active:"1", def:"0", raiting:"1", title_p:"���������� � ���������� ����������", title:"��� 2005", href:"finans05.php", smenu:"" },
					finans04:{ nm:"finans04", on:"1", show:"1", active:"1", def:"0", raiting:"1", title_p:"���������� � ���������� ����������", title:"��� 2004", href:"finans04.php", smenu:"" },
					finans03:{ nm:"finans03", on:"1", show:"1", active:"1", def:"0", raiting:"1", title_p:"���������� � ���������� ����������", title:"��� 2003", href:"finans03.php", smenu:"" },
					finans02:{ nm:"finans02", on:"1", show:"1", active:"1", def:"0", raiting:"1", title_p:"���������� � ���������� ����������", title:"��� 2002", href:"finans02.php", smenu:"" },
					finans01:{ nm:"finans01", on:"1", show:"1", active:"1", def:"0", raiting:"1", title_p:"���������� � ���������� ����������", title:"��� 2001", href:"finans01.php", smenu:"" }
				}
			},
			eotchet:{ nm:"eotchet", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������������� ����� �� ������ �������", href:"eotchet.php", smenu:"" },
			gotchet:{ nm:"gotchet", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������� �����", href:"gotchet.php", smenu:"" },
			facts:{ nm:"facts", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"��������� � ������������ ������", href:"facts.php", smenu:"" },
			ustav:{ nm:"ustav", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"����� � ���������� ���������", href:"ustav.php", smenu:"" },
			order:{ nm:"order", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������� �������������� ����� ����������", href:"order.php", smenu:"" },
			affil:{ nm:"affil", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������������� ����", href:"affil.php", smenu:"" },
			smi:{ nm:"smi", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"����-������������ � ���", href:"smi.php", smenu:"" },
			vacancy:{ nm:"vacancy", on:"1", show:"1", active:"1", raiting:"1", def:"0", title:"��������", href:"vacancy.php", smenu:"" }
		}
	},
	contacts:{ nm:"contacts", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"��������", href:"rekvizit.php", smenu:"" },
	br1:{ br:true },
	superiority:{ nm:"superiority", on:"0", show:"0", active:"1", def:"0", raiting:"1", title:"���� ������������", href:"superiority.php", smenu:"" },
	fiz:{ nm:"fiz", on:"1", show:"1", active:"1", def:"0", raiting:"1", raiting:"0", title:"������ ��� ���", href:"vklad.php", exclude:"main.php",
		smenu:{
			vkladn_op:{ nm:"vkladn_op", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������� ��������", href:"",
				smenu:{
					vklad:{ nm:"vklad", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"���� �������", href:"vklad.php", smenu:"" },
					strahovka:{ nm:"strahovka", on:"1", show:"1", active:"0", def:"1", raiting:"1", title:"���������� � ����������� �������", href:"strahovka.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"������� � ������", title2:"<br />�� �������� ���������", href:"faq_vkladnop.php", smenu:"" }
				}
			},
			plateg_perev:{ nm:"plateg_perev", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������� � ��������", href:"",
				smenu:{
					plateg:{ nm:"plateg", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������� ��������", href:"plateg.php", smenu:"" },
					comun:{ nm:"comun", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������ ������������ �����", href:"comun.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"������� � ������", title2:"<br />�� ��������", href:"faq_plateg.php", smenu:"" }
				}
			},
			wu:{ nm:"wu", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Western Union", href:"",
				smenu:{
					western:{ nm:"western", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������ Western Union", href:"western.php", smenu:"" },
					westernt:{ nm:"westernt", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������ Western Union", href:"westernt.php", smenu:"" }
				}
			},
			contact:{ nm:"contact", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������� Contact", href:"contact.php", smenu:"" },
			valutpunkt:{ nm:"valutpunkt", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������-�������� ��������", href:"valutpunkt.php", smenu:"" },
			monet:{ nm:"monet", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������� ����� �� ����������� ��������", href:"monet.php", smenu:"" },
			karta:{ nm:"karta", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"����������� �����", href:"karta.php", smenu:"" },
			seif_fiz:{ nm:"seif_fiz", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������������� ���������� �����", href:"seif_fiz.php", smenu:"" },
			tarif1:{ nm:"tarif1", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������", href:"",
				smenu:{
					ktarifr:{ nm:"ktarifr", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������� � �������", title2:"<br />������", href:"ktarifr.php", smenu:"" },
					ktarifval:{ nm:"ktarifval", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������� � ����������� ������", title2:"<br />������", href:"ktarifval.php", smenu:"" },
					ktarifp:{ nm:"ktarifp", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"����-�����", title2:"<br />������", href:"ktarifp.php", smenu:"" },
					ktarifm:{ nm:"ktarifm", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������������� �����", title2:"<br />������", href:"ktarifm.php", smenu:"" }
				}
			}
		}
	},
	biz:{ nm:"biz", on:"1", show:"1", active:"1", def:"0", raiting:"1", raiting:"0", title:"������ ��� ������ �������", href:"rko.php", exclude:"main.php",
		smenu:{
			rko:{ nm:"rko", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"��������-�������� ������������", href:"",
				smenu:{
					rko_about:{ nm:"rko_about", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"� ��������-�������� ������������", href:"rko.php", smenu:"" },
					opens:{ nm:"opens", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"��� ������� ���� � �����", href:"opens.php", smenu:"" },
					blanki:{ nm:"blanki", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"����� ��������� ����������", href:"blanki.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"������� � ������", title2:"<br />�� ��������", href:"faq_rko.php", smenu:"" }
				}
			},
			remote:{ nm:"remote", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"��������� ���������� ������", href:"",
				smenu:{
					kb_about:{ nm:"kb_about", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"� ������� �������-����", href:"kb_about.php", smenu:"" },
					kb_con:{ nm:"kb_con", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"��� ������������ � ������� �������-����", href:"kb_con.php", smenu:"" },
					kb_recom:{ nm:"kb_recom", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������������ �� ����������� �������������� ������������", href:"kb_recom.php", smenu:"" },
					kb_docs:{ nm:"kb_docs", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������������ �� ������� �������-����", href:"kb_docs.php", smenu:"" },
					kb_prog:{ nm:"kb_prog", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"���������� ����������� �� ������� �������-����", href:"kb_prog.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"������� � ������", title2:"<br />�� ������� �������-����", href:"faq_kb.php", smenu:"" }
				}
			},
			megdu:{ nm:"megdu", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������������� ������� � �������� ��������", href:"megdu.php", smenu:"" },
			dragmet:{ nm:"dragmet", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������� � ������������ ���������", href:"dragmet.php", smenu:"" },
			garant:{ nm:"garant", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"��������� � ����������� ��������", href:"garant.php", smenu:"" },
			cb:{ nm:"cb", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������� � ������� ��������", href:"cb.php", smenu:"" },
			seif_biz:{ nm:"seif_biz", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"�������������� ���������� �����", href:"seif_biz.php", smenu:"" },
			kart:{ nm:"kart", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"����������� �����", href:"",
				smenu:{
					kartvid:{ nm:"kartvid", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"���� ����������� ����", href:"kartvid.php", smenu:"" },
					zarpl:{ nm:"zarpl", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"���������� �������", href:"zarpl.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"������� � ������", title2:"<br />�� ����������� ������", href:"faq_kart.php", smenu:"" }
				}
			},
			inkas:{ nm:"inkas", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"����������", href:"inkas.php", smenu:"" },
			tarif:{ nm:"tarif", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"������� ������", title2:"<br />�� �������� ���������� �������", href:"tarif.php", smenu:"" }
		}
	},
	strahovka:{ nm:"strahovka", on:"1", show:"0", active:"1", def:"0", raiting:"1", title:"���������� � ����������� �������", href:"strahovka.php", smenu:"" },
	pwr_list:{ nm:"pwr_list", on:"1", show:"0", active:"1", def:"0", raiting:"0", title:"������� �������� �����", href:"pwr_list.php", smenu:"" }
}
