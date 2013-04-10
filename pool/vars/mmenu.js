/*
	exclude - на этих страницах пункты не отображаются, имена файлов разделены пробелами
	br1:{ br:true }, - перенос на новую строку
*/

var mmenu_pool=new Object();
mmenu_pool={
	main:{ nm:"main", on:"1", show:"1", active:"1", def:"1", raiting:"0", title:"Главная", href:"main.php", smenu:"" },
	news:{ nm:"news", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Новости", href:"news_all.php", smenu:"" },
	about:{ nm:"about", on:"1", show:"1", active:"1", def:"0", raiting:"1", raiting:"0", title:"О банке", href:"history.php",
		smenu:{
			history:{ nm:"history", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"История банка", href:"history.php", smenu:"" },
			rukov:{ nm:"rukov", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Руководство", href:"rukov.php", smenu:"" },
			let15:{ nm:"let15", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Пятнадцатилетие Прио-Внешторгбанка", href:"15let.php",
				smenu:{
					s1:{ nm:"s1", on:"1", show:"0", active:"0", def:"1", raiting:"0", order:"20041117", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"17 ноября. В ПВТБ прошел день открытых дверей.", href:"15let.php&s=1", smenu:"" },
					s2:{ nm:"s2", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041130", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"30 ноября - 6 декабря. Акция «Сувениры вкладчикам»", href:"15let.php&s=2", smenu:"" },
					s3:{ nm:"s3", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041203", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"3 декабря. Концерт для детей-инвалидов", href:"15let.php&s=3", smenu:"" },
					s4:{ nm:"s4", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041203", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"3 декабря. Статьи в СМИ", href:"15let.php&s=4", smenu:"" },
					s5:{ nm:"s5", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041203", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"3 декабря. Фотогалерея", href:"15let.php&s=5", smenu:"" },
					s6:{ nm:"s6", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041204", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"4 декабря. Турнир по спортивным бальным танцам Прио-Внешторгбанка", href:"15let.php&s=6", smenu:"" },
					s7:{ nm:"s7", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041204", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"4 декабря. Статьи в СМИ", href:"15let.php&s=7", smenu:"" },
					s8:{ nm:"s8", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041204", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"4 декабря. Фотогалерея", href:"15let.php&s=8", smenu:"" },
					s9:{ nm:"s9", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041206", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"6 декабря. Презентация проекта Прио-Внешторгбанка по строительству детского игрового городка в парке на ул. Ленина", href:"15let.php&s=9", smenu:"" },
					s10:{ nm:"s10", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041206", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"6 декабря. Статьи в СМИ", href:"15let.php&s=10", smenu:"" },
					s11:{ nm:"s11", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041206", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"6 декабря. Положение", href:"15let.php&s=11", smenu:"" },
					s12:{ nm:"s12", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041206", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"6 декабря. Фотогалерея", href:"15let.php&s=12", smenu:"" },
					s13:{ nm:"s13", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041209", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"9 декабря. В Прио-Внешторгбанке состоялся «круглый стол» на тему «Информационная открытость кредитно-финансовых учреждений. Актуальные вопросы взаимодействия Банка и СМИ.»", href:"15let.php&s=13", smenu:"" },
					s14:{ nm:"s14", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041209", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"9 декабря. Положение", href:"15let.php&s=14", smenu:"" },
					s15:{ nm:"s15", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20041209", title_p:"Пятнадцатилетие Прио-Внешторгбанка", title:"9 декабря. Фотогалерея", href:"15let.php&s=15", smenu:"" }
				}
			},
			let18:{ nm:"let18", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Восемнадцатилетие Прио-Внешторгбанка", href:"18let.php",
				smenu:{
					s1:{ nm:"s1", on:"1", show:"0", active:"0", def:"1", raiting:"0", order:"20071019", title_p:"Восемнадцатилетие Прио-Внешторгбанка", title:"19 октября. Положение о конкурсе, проводимом Прио-Внешторгбанком (ОАО) в газете «ТЕЛЕСЕМЬ» в связи с 18-ти летием со дня создания.", href:"18let.php&s=1", smenu:"" },
					s2:{ nm:"s2", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20071025", title_p:"Восемнадцатилетие Прио-Внешторгбанка", title:"25 октября. 1-й этап конкурса (ТЕЛЕСЕМЬ).", href:"18let.php&s=2", smenu:"" },
					s3:{ nm:"s3", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20071025", title_p:"Восемнадцатилетие Прио-Внешторгбанка", title:"25 октября. Победитель 1-го тура викторины.", href:"18let.php&s=3", smenu:"" },
					s4:{ nm:"s4", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20071101", title_p:"Восемнадцатилетие Прио-Внешторгбанка", title:"1 ноября. 2-й этап конкурса (ТЕЛЕСЕМЬ).", href:"18let.php&s=4", smenu:"" },
					s5:{ nm:"s5", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20071201", title_p:"Восемнадцатилетие Прио-Внешторгбанка", title:"1 ноября. Победитель 2-го тура викторины.", href:"18let.php&s=5", smenu:"" },
					s6:{ nm:"s6", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20071208", title_p:"Восемнадцатилетие Прио-Внешторгбанка", title:"8 ноября. 3-й этап конкурса (ТЕЛЕСЕМЬ).", href:"18let.php&s=6", smenu:"" },
					s7:{ nm:"s7", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20071208", title_p:"Восемнадцатилетие Прио-Внешторгбанка", title:"8 ноября. Победитель 3-го тура викторины.", href:"18let.php&s=7", smenu:"" },
					s8:{ nm:"s8", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20071215", title_p:"Восемнадцатилетие Прио-Внешторгбанка", title:"15 ноября. Победитель 4-го тура викторины.", href:"18let.php&s=8", smenu:"" },
					s9:{ nm:"s9", on:"1", show:"0", active:"0", def:"0", raiting:"0", order:"20071223", title_p:"Восемнадцатилетие Прио-Внешторгбанка", title:"23 ноября. Победитель 5-го тура викторины.", href:"18let.php&s=9", smenu:"" }
				}
			},
			maslennica:{ nm:"maslennica", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Праздник Масленица", href:"",
				smenu:{
				    maslenica12:{ nm:"maslenica12", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"Праздник Масленица", title:"год 2012", href:"maslenica12.php", smenu:"" },
				    maslenica11:{ nm:"maslenica11", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"Праздник Масленица", title:"год 2011", href:"maslenica11.php", smenu:"" },
					maslenica10:{ nm:"maslenica10", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"Праздник Масленица", title:"год 2010", href:"maslenica10.php", smenu:"" },
					maslenica09:{ nm:"maslenica09", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"Праздник Масленица", title:"год 2009", href:"maslenica09.php", smenu:"" },
					maslenica08:{ nm:"maslenica08", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"Праздник Масленица", title:"год 2008", href:"maslenica08.php", smenu:"" },
					maslenica07:{ nm:"maslenica07", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"Праздник Масленица", title:"год 2007", href:"maslenica07.php", smenu:"" },
					maslenica06:{ nm:"maslenica06", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"Праздник Масленица", title:"год 2006", href:"maslenica06.php", smenu:"" },
					maslenica05:{ nm:"maslenica05", on:"1", show:"1", active:"1", def:"0", raiting:"0", title_p:"Праздник Масленица", title:"год 2005", href:"maslenica05.php", smenu:"" }
				}
			},
			childrentown:{ nm:"childrentown", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Город детства", href:"childrentown.php",
				smenu:{
					ct_about:{ nm:"childrentown/about", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"О проекте", href:"childrentown/about.php", smenu:"" },
					ct_members:{ nm:"childrentown/members", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"Список участников проекта", href:"childrentown/members.php", smenu:"" },
					ct_news1:{ nm:"childrentown/news1", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"\"ТелеСемь\", 6-12 декабря 2004 года", href:"childrentown/news1.htm", smenu:"" },
					ct_news2:{ nm:"childrentown/news2", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"Сайт \"7 новостей\", 6 декабря 2004г", href:"childrentown/news2.htm", smenu:"" },
					ct_news3:{ nm:"childrentown/news3", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"ТелеСемь, 13-19 декабря 2004г", href:"childrentown/news3.htm", smenu:"" },
					ct_news4:{ nm:"childrentown/news4", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"Комсомольская правда, 10 декабря 2004г", href:"childrentown/news4.htm", smenu:"" },
					ct_news5:{ nm:"childrentown/news5", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"Совет директоров, 13 декабря 2004 года", href:"childrentown/news5.htm", smenu:"" },
					ct_news6:{ nm:"childrentown/news6", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"Совет Директоров, 20 июня 2005 года", href:"childrentown/news6.htm", smenu:"" },
					ct_news7:{ nm:"childrentown/news7", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"Рязанская семерка, 22 июня 2005 года", href:"childrentown/news7.htm", smenu:"" },
					ct_news8:{ nm:"childrentown/news8", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Город детства", title:"Рязанские ведомости, 22 июня 2005 года", href:"childrentown/news8.htm", smenu:"" }
				}
			},
			elbrus:{ nm:"elbrus/page1", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Проект \"Вместе к вершинам\"", href:"elbrus/page1.htm",
				smenu:{
					elbrus_02:{ nm:"elbrus/page2", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page2.htm", smenu:"" },
					elbrus_03:{ nm:"elbrus/page3", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page3.htm", smenu:"" },
					elbrus_04:{ nm:"elbrus/page4", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page4.htm", smenu:"" },
					elbrus_05:{ nm:"elbrus/page5", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page5.htm", smenu:"" },
					elbrus_06:{ nm:"elbrus/page6", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page6.htm", smenu:"" },
					elbrus_07:{ nm:"elbrus/page7", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page7.htm", smenu:"" },
					elbrus_08:{ nm:"elbrus/page8", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page8.htm", smenu:"" },
					elbrus_09:{ nm:"elbrus/page9", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page9.htm", smenu:"" },
					elbrus_10:{ nm:"elbrus/page10", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page10.htm", smenu:"" },
					elbrus_11:{ nm:"elbrus/page11", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page11.htm", smenu:"" },
					elbrus_12:{ nm:"elbrus/page12", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page12.htm", smenu:"" },
					elbrus_13:{ nm:"elbrus/page13", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page13.htm", smenu:"" },
					elbrus_14:{ nm:"elbrus/page14", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page14.htm", smenu:"" },
					elbrus_15:{ nm:"elbrus/page15", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Проект \"Вместе к вершинам\"", title:"Поход на Эльбрус", href:"elbrus/page15.htm", smenu:"" }
				}
			},
			coord:{ nm:"coord", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Наши координаты", href:"coord.php", smenu:"" },
			rekvizit:{ nm:"rekvizit", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Реквизиты, лицензии, контакты", href:"rekvizit.php",
				smenu:{
					promnewphone:{ nm:"promnewphone", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Промышленное отделение", href:"promnewphone.php", smenu:"" }
				}
			},
			finres:{ nm:"finres", on:"1", show:"0", active:"1", def:"0", raiting:"1", title:"Отчетность и финансовые результаты<br />Отчет о прибылях и убытках", href:"",
				smenu:{
					finans08:{ nm:"finans08", on:"1", show:"0", active:"1", def:"0", raiting:"1", title_p:"Годовая форма финансовой отчетности", title:"год 2008", href:"finans08.php", smenu:"" },
					finans07:{ nm:"finans07", on:"1", show:"0", active:"1", def:"0", raiting:"1", title_p:"Годовая форма финансовой отчетности", title:"год 2007", href:"finans07.php", smenu:"" },
					finans06:{ nm:"finans06", on:"1", show:"0", active:"1", def:"0", raiting:"1", title_p:"Годовая форма финансовой отчетности", title:"год 2006", href:"finans06.php", smenu:"" },
					finans05:{ nm:"finans05", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Годовая форма финансовой отчетности", title:"год 2005", href:"finans05.php", smenu:"" },
					finans04:{ nm:"finans04", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Годовая форма финансовой отчетности", title:"год 2004", href:"finans04.php", smenu:"" },
					finans03:{ nm:"finans03", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Годовая форма финансовой отчетности", title:"год 2003", href:"finans03.php", smenu:"" },
					finans02:{ nm:"finans02", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Годовая форма финансовой отчетности", title:"год 2002", href:"finans02.php", smenu:"" },
					finans01:{ nm:"finans01", on:"1", show:"0", active:"1", def:"0", raiting:"0", title_p:"Годовая форма финансовой отчетности", title:"год 2001", href:"finans01.php", smenu:"" }
				}
			},
			gotchet:{ nm:"gotchet", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Годовая отчетность", href:"gotchet.php", smenu:"" },
			eotchet:{ nm:"eotchet", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Квартальная отчетность", href:"eotchet.php", smenu:"" },
			facts:{ nm:"facts", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Сообщения о существенных фактах", href:"facts.php", smenu:"" },
			ustav:{ nm:"ustav", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Устав и внутренние документы", href:"ustav.php", smenu:"" },
			info_for_shareholders:{ nm:"info_for_shareholders", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Информация для акционеров", href:"info_for_shareholders.php", smenu:"" },
			order:{ nm:"order", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Порядок предоставления копий документов", href:"order.php", smenu:"" },
			affil:{ nm:"affil", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Аффилированные лица", href:"affil.php", smenu:"" },
			vlijanie_na_priovtb:{ nm:"vlijanie_na_priovtb", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Список лиц, оказывающих существенное (прямое и косвенное) влияние на решения, принимаемые органами управления банка", href:"vlijanie_na_priovtb.php", smenu:"" },
			smi:{ nm:"smi", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Прио-Внешторгбанк в СМИ", href:"smi.php", smenu:"" },
			vacancy:{ nm:"vacancy", on:"1", show:"1", active:"1", raiting:"0", def:"0", title:"Вакансии", href:"vacancy.php", smenu:"" },
			feedback:{ nm:"feedback", on:"1", show:"1", active:"1", raiting:"0", def:"0", title:"Отзывы о качестве обслуживания", href:"feedback.php", smenu:"" }
		}
	},
	contacts:{ nm:"contacts", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Контакты", href:"rekvizit.php", smenu:"" },
	br1:{ br:true },
	superiority:{ nm:"superiority", on:"0", show:"0", active:"1", def:"0", raiting:"1", title:"Наше приемущество", href:"superiority.php", smenu:"" },
	fiz:{ nm:"fiz", on:"1", show:"1", active:"1", def:"0", raiting:"1", raiting:"0", title:"Услуги для Вас", href:"vklad.php", exclude:"main.php",
		smenu:{
			vkladn_op:{ nm:"vkladn_op", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Вкладные операции", href:"",
				smenu:{
					vklad:{ nm:"vklad", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"Виды вкладов", href:"vklad.php", smenu:"" },
					strahovka:{ nm:"strahovka", on:"1", show:"1", active:"0", def:"1", raiting:"1", title:"Информация о страховании вкладов", href:"strahovka.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"Вопросы и ответы", title2:"<br />по вкладным операциям", href:"faq_vkladnop.php", smenu:"" }
				}
			},
			plateg_perev:{ nm:"plateg_perev", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Платежи и переводы", href:"",
				smenu:{
					plateg:{ nm:"plateg", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Денежные переводы", href:"plateg.php", smenu:"" },
					comun:{ nm:"comun", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Оплата коммунальных услуг", href:"comun.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"Вопросы и ответы", title2:"<br />по платежам", href:"faq_plateg.php", smenu:"" }
				}
			},
			wu:{ nm:"wu", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Western Union", href:"",
				smenu:{
					western:{ nm:"western", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Услуги Western Union", href:"western.php", smenu:"" },
					westernt:{ nm:"westernt", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Тарифы Western Union", href:"westernt.php", smenu:"" }
				}
			},
			contact:{ nm:"contact", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Переводы Contact", href:"contact.php", smenu:"" },
			unistream:{ nm:"unistream", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Переводы Unistream", href:"unistream.php", smenu:"" },
			korona:{ nm:"korona", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Переводы Золотая Корона", href:"korona.php", smenu:"" },
			valutpunkt:{ nm:"valutpunkt", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Валютно-обменные операции", href:"valutpunkt.php", smenu:"" },
			monet:{ nm:"monet", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Продажа монет из драгоценных металлов", href:"monet.php", smenu:"" },
			karta:{ nm:"karta", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Пластиковые карты", href:"karta.php", smenu:"" },
			seif_fiz:{ nm:"seif_fiz", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Индивидуальные банковские сейфы", href:"seif_fiz.php", smenu:"" },
			tarif1:{ nm:"tarif1", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Тарифы", href:"",
				smenu:{
					ktarifr:{ nm:"ktarifr", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Операции с рублями", title2:"", href:"ktarifr.php", smenu:"" },
					ktarifval:{ nm:"ktarifval", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Операции в иностранной валюте", title2:"<br />Тарифы", href:"ktarifval.php", smenu:"" },
					ktarifp:{ nm:"ktarifp", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"ПРИО-карты", title2:"<br />Тарифы", href:"ktarifp.php", smenu:"" },
					ktarifm:{ nm:"ktarifm", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Международные карты", title2:"<br />Тарифы", href:"ktarifm.php", smenu:"" }
				}
			},
			cred_fiz:{ nm:"cred_fiz", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Кредитование физических лиц", href:"",

				smenu:{
                                        cred_prioteka:{ nm:"cred_prioteka", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Приотека", title2:"Кредитование физических лиц", href:"cred_prioteka.php", smenu:"" },
					cred_zhilischn:{ nm:"cred_zhilischn", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Жилищный кредит", title2:"Кредитование физических лиц", href:"cred_zhilischn.php", smenu:"" },
					cred_potreb:{ nm:"cred_potreb", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Потребительское кредитование", title2:"Кредит для физических лиц", href:"cred_potreb.php", smenu:"" },
					cred_realestate:{ nm:"cred_realestate", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Потребительский кредит под залог недвижимости", href:"cred_realestate.php", smenu:"" },
					cred_AIGK:{ nm:"cred_AIGK", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Ипотечная программа по стандартам АИЖК", href:"cred_AIGK.php", smenu:"" },
					cred_RIF:{ nm:"cred_RIF", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Ипотечная программа по стандартам РИФ", href:"cred_RIF.php", smenu:"" },
					cred_avto:{ nm:"cred_avto", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Автокредитование", href:"cred_avto.php", smenu:"" },
					cred_dok:{ nm:"cred_dok", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Предоставляемые документы", href:"cred_dok.php", smenu:"" },
					recomend_cb:{ nm:"recomend_cb", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Рекомендации ЦБ", title2:"Кредитование физических лиц", href:"recomend_cb.php", smenu:"" } ,
				    akkredit_object:{ nm:"akkredit_object", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Аккредитованные объекты", title2:"Аккредитованные объекты", href:"akkredit_object.php", smenu:"" }

				}
			}
		}
	},
	biz:{ nm:"biz", on:"1", show:"1", active:"1", def:"0", raiting:"1", raiting:"0", title:"Услуги для Вашего бизнеса", href:"rko.php", exclude:"main.php",
		smenu:{
			rko:{ nm:"rko", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Расчетно-кассовое обслуживание", href:"",
				smenu:{
					rko_about:{ nm:"rko_about", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"О расчетно-кассовом обслуживании", href:"rko.php", smenu:"" },
					opens:{ nm:"opens", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Как открыть счет в банке", href:"opens.php", smenu:"" },
					uan:{ nm:"opens", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Расчетные счета в юанях", href:"uan.php", smenu:"" },
					forms_of_contracts:{ nm:"forms_of_contracts", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Формы договоров банковского счета для перезаключения", href:"forms_of_contracts.php", smenu:"" },
					blanki:{ nm:"blanki", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Формы платежных документов", href:"blanki.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"Вопросы и ответы", title2:"<br />по платежам", href:"faq_rko.php", smenu:"" }
				}
			},
			remote:{ nm:"remote", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Удаленное управление счетом", href:"",
				smenu:{
					kb_about:{ nm:"kb_about", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"О системе «Клиент-Банк»", href:"kb_about.php", smenu:"" },
					kb_con:{ nm:"kb_con", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Как подключиться к системе «Клиент-Банк»", href:"kb_con.php", smenu:"" },
					kb_recom:{ nm:"kb_recom", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Рекомендации по обеспечению информационной безопасности", href:"kb_recom.php", smenu:"" },
					kb_docs:{ nm:"kb_docs", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Документация по системе «Клиент-Банк»", href:"kb_docs.php", smenu:"" },
					kb_prog:{ nm:"kb_prog", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Програмное обеспечение по системе «Клиент-Банк»", href:"kb_prog.php", smenu:"" },
					aps_data:{ nm:"aps_data", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Программное обеспечение «АПС-Печать»", href:"aps_data.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"Вопросы и ответы", title2:"<br />по системе «Клиент-Банк»", href:"faq_kb.php", smenu:"" }
				}
			},
			megdu:{ nm:"megdu", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Международные расчеты и валютный контроль", href:"megdu.php", smenu:"" },
			dragmet:{ nm:"dragmet", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Операции с драгоценными металлами", href:"dragmet.php", smenu:"" },
			garant:{ nm:"garant", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Кредитные и гарантийные операции", href:"garant.php", smenu:"" },
			realization_of_bail:{ nm:"realization_of_bail", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Реализация залогового имущества клиентами Прио-Внешторгбанка", href:"realization_of_bail.php", smenu:"" },
			cb:{ nm:"cb", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Операции с ценными бумагами", href:"cb.php", smenu:"" },
			seif_biz:{ nm:"seif_biz", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Индивидуальные банковские сейфы", href:"seif_biz.php", smenu:"" },
			kart:{ nm:"kart", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Пластиковые карты", href:"",
				smenu:{
					kartvid:{ nm:"kartvid", on:"1", show:"1", active:"1", def:"1", raiting:"1", title:"Виды пластиковых карт", href:"kartvid.php", smenu:"" },
					zarpl:{ nm:"zarpl", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Зарплатные проекты", href:"zarpl.php", smenu:"" },
					faq:{ nm:"faq", on:"1", show:"1", active:"1", def:"0", raiting:"0", title:"Вопросы и ответы", title2:"<br />по пластиковым картам", href:"faq_kart.php", smenu:"" }
				}
			},
			inkas:{ nm:"inkas", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Инкассация", href:"inkas.php", smenu:"" },
			tarif:{ nm:"tarif", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Базовые тарифы", title2:"<br />на расчетно-кассовое обслуживание юридических лиц и индивидуальных предпринимателей г. Рязани", href:"tarif.php", smenu:"" },
			tarif_moscow:{ nm:"tarif_moscow", on:"1", show:"1", active:"1", def:"0", raiting:"1", title:"Московский филиал. Тарифы на услуги", title2:"<br />по операциям в рублях и иностранной валюте", href:"tarif_moscow.php", smenu:"" }
		}
	},
	strahovka:{ nm:"strahovka", on:"1", show:"0", active:"1", def:"0", raiting:"1", title:"Информация о страховании вкладов", href:"strahovka.php", smenu:"" },
	pwr_list:{ nm:"pwr_list", on:"1", show:"0", active:"1", def:"0", raiting:"0", title:"Рейтинг разделов сайта", href:"pwr_list.php", smenu:"" }
}
