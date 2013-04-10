<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту  (начало) -->
<script src="http://api-maps.yandex.ru/1.1/?key=AJ9D0UsBAAAAWwtGHAIAT1CfawFEnHDkDRuH1peKENqgF98AAAAAAAAAAADSvxJLq9plruBxuZeEu2haYJfQ-g==~AOyVrUwBAAAAv9WzNwIAqQP1nYmZWvJz632tqZktqQprSJwAAAAAAAAAAADloKxo2FCP8Zb708EiyB8lSNr_Sg==~AMUgUU0BAAAA_J1GAAIAcNk1NAZvCCXxqAq_mUAolrKXsksAAAAAAAAAAACihNWVxL0mGn8D3jsnNr34a4WoLQ==~ADchUU0BAAAAnrn_LQIAewArExbwxOyPZ0Sp9xFpSbsgUjMAAAAAAAAAAACJ5e_fLOm-XDcMO8LumTgiJWnTsw==&wizard=constructor" type="text/javascript"></script>
<script type="text/javascript">
    YMaps.jQuery(window).load(function () {
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID-4638")[0]);
//        map.setCenter(new YMaps.GeoPoint(39.695283,54.643905), 11, YMaps.MapType.MAP);
        map.setCenter(new YMaps.GeoPoint(39.69362,54.623134), 11, YMaps.MapType.MAP);
        map.addControl(new YMaps.Zoom());
        map.addControl(new YMaps.ToolBar());
        map.addControl(new YMaps.TypeControl());

        YMaps.Styles.add("constructor#pmgrm1Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm1.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm2Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm2.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm3Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm3.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm4Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm4.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm5Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm5.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm6Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm6.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm7Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm7.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm8Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm8.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm9Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm9.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm10Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm10.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm11Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm11.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm12Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm12.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm13Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm13.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm14Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm14.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm15Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm15.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm16Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm16.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm17Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm17.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm18Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm18.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm19Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm19.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });


        YMaps.Styles.add("constructor#pmgrm20Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm20.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });
		
        YMaps.Styles.add("constructor#pmgrm21Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm21.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });

        YMaps.Styles.add("constructor#pmgrm22Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm22.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });

        YMaps.Styles.add("constructor#pmgrm23Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm23.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });
		
		YMaps.Styles.add("constructor#pmgrm30Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm30.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });
		
		YMaps.Styles.add("constructor#pmgrm24Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm24.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });

		YMaps.Styles.add("constructor#pmgrm25Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgrm25.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });

       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.701946,54.625066), "constructor#pmgrm1Placemark", "ф-ка «Красный октябрь»<br />(<em>находится в закрытой зоне</em>)<br /><br />GPS координаты:<br />Долгота: 39&deg;41&prime;45.06&Prime;<br />Широта: 54&deg;37&prime;18.2&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.715507,54.610191), "constructor#pmgrm2Placemark", "тц «Полетаевский»<br /><br />GPS координаты:<br />Долгота: 39&deg;42&prime;55.9&Prime;<br />Широта: 54&deg;36&prime;36.99&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.713222,54.609307), "constructor#pmgrm3Placemark", "Дополнительный офис ОПК6<br /><br />GPS координаты:<br />Долгота: 39&deg;42&prime;47.67&Prime;<br />Широта: 54&deg;36&prime;33.48&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.655243,54.673855), "constructor#pmgrm4Placemark", "м-н «Подсолнух»<br /><br />GPS координаты:<br />Долгота: 39&deg;39&prime;18.8&Prime;<br />Широта: 54&deg;40&prime;26&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.782112,54.547979), "constructor#pmgrm5Placemark", "з-д «Тангстоун»<br />(<em>находится в закрытой зоне</em>)<br /><br />GPS координаты:<br />Долгота: 39&deg;46&prime;56.25&Prime;<br />Широта: 54&deg;32&prime;52.92&Prime;"));
	   map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.667377,54.662873), "constructor#pmgrm6Placemark", "м-н «Сорока»<br /><br />GPS координаты:<br />Долгота: 39&deg;40&prime;2.48&Prime;<br />Широта: 54&deg;39&prime;46.4&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.712578,54.627481), "constructor#pmgrm7Placemark", "Дополнительный офис<br />Промышленное отделение<br /><br />GPS координаты:<br />Долгота: 39&deg;42&prime;45.05&Prime;<br />Широта: 54&deg;37&prime;39.06&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.810071,54.608292), "constructor#pmgrm8Placemark", "м-н «Подсолнух»<br /><br />GPS координаты:<br />Долгота: 39&deg;48&prime;36.14&Prime;<br />Широта: 54&deg;36&prime;29.91&Prime;"));

	   map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.652293,54.636896), "constructor#pmgrm9Placemark", "тц «Московский»<br /><br />GPS координаты:<br />Долгота: 39&deg;39&prime;8.25&Prime;<br />Широта: 54&deg;38&prime;12.83&Prime;"));

       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.645769,54.659278), "constructor#pmgrm10Placemark", "Дополнительный офис ОПК5<br /><br />GPS координаты:<br />Долгота: 39&deg;38&prime;35.73&Prime;<br />Широта: 54&deg;39&prime;40.22&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.66771,54.605676),  "constructor#pmgrm11Placemark", "м-н «Магнит»<br /><br />GPS координаты:<br />Долгота: 39&deg;40&prime;3.56&Prime;<br />Широта: 54&deg;36&prime;20.49&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.626908,54.688153), "constructor#pmgrm12Placemark", "м-н «Сорока»<br /><br />GPS координаты:<br />Долгота: 39&deg;37&prime;37.1&Prime;<br />Широта: 54&deg;41&prime;17.61&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.802335,54.621175), "constructor#pmgrm13Placemark", "гипермаркет «Глобус»<br /><br />GPS координаты:<br />Долгота: 39&deg;48&prime;43.89&Prime;<br />Широта: 54&deg;37&prime;413.87&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.692901,54.616045), "constructor#pmgrm14Placemark", "м-н «Продукты»<br /><br />GPS координаты:<br />Долгота: 39&deg;41&prime;34.41&Prime;<br />Широта: 54&deg;36&prime;57.82&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.796853,54.611679), "constructor#pmgrm15Placemark", "м-н «XXI век»<br /><br />GPS координаты:<br />Долгота: 39&deg;47&prime;48.53&Prime;<br />Широта: 54&deg;36&prime;42.01&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.726032,54.62956),  "constructor#pmgrm16Placemark", "тц «Соната»<br /><br />GPS координаты:<br />Долгота: 39&deg;43&prime;55.16&Prime;<br />Широта: 54&deg;37&prime;45.96&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.586686,54.657188), "constructor#pmgrm17Placemark", "м-н «Сорока»<br /><br />GPS координаты:<br />Долгота: 39&deg;35&prime;11.96&Prime;<br />Широта: 54&deg;39&prime;25.9&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.633506,54.675428), "constructor#pmgrm18Placemark", "з-д «ТЯЖПРЕССМАШ»<br />(<em>находится в закрытой зоне</em>)<br /><br />GPS координаты:<br />Долгота: 39&deg;38&prime;0.76&Prime;Широта: 54&deg;40&prime;31.45&Prime;"));
//       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.57438,54.657623), "constructor#pmgrm19Placemark", "360 АРЗ<br /><br />GPS координаты:<br />Долгота: 39&deg;34&prime;27.67&Prime;<br />Широта: 54&deg;39&prime;27.51&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.723875,54.614544), "constructor#pmgrm19Placemark", "м-н «Сорока»<br /><br />GPS координаты:<br />Долгота: 39&deg;43&prime;26.05&Prime;<br />Широта: 54&deg;36&prime;52.45&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.752661,54.620638), "constructor#pmgrm20Placemark", "Прио-Внешторгбанк,<br />центральный офис<br /><br />GPS координаты:<br />Долгота: 39&deg;45&prime;9.64&Prime;<br />Широта: 54&deg;37&prime;14.26&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.803848,54.610559), "constructor#pmgrm21Placemark", "Дополнительный офис ОПК7<br /><br />GPS координаты:<br />Долгота: 39&deg;48&prime;13.99&Prime;<br />Широта: 54&deg;36&prime;37.92&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.657056,54.644086), "constructor#pmgrm22Placemark", "м-н «Алфавит»<br /><br />GPS координаты:<br />Долгота: 39&deg;39&prime;25.54&Prime;<br />Широта: 54&deg;38&prime;38.75&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.752618,54.620588), "constructor#pmgrm23Placemark", "Прио-Внешторгбанк,<br />центральный офис<br /><br />GPS координаты:<br />Долгота: 39&deg;45&prime;9.56&Prime;<br />Широта: 54&deg;37&prime;14.05&Prime;"));
	   map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.815285,54.59149),  "constructor#pmgrm24Placemark", "ТЦ «Зельгрос»,<br />GPS координаты:<br />Долгота: 39&deg;48&prime;55.03&Prime;<br />Широта: 54&deg;35&prime;29.36&Prime;"));
	   
	   map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.511106,54.725576), "constructor#pmgrm29Placemark", "Рыбное, <br />м-н «Универмаг»<br /><br />GPS координаты:<br />Долгота: 39&deg;50&prime;96&Prime;<br />Широта: 54&deg;72&prime;51&Prime;"));
	   
        function createObject (type, point, style, description) {
            var allowObjects = ["Placemark", "Polyline", "Polygon"],
                index = YMaps.jQuery.inArray( type, allowObjects),
                constructor = allowObjects[(index == -1) ? 0 : index];
                description = description || "";
            
            var object = new YMaps[constructor](point, {style: style, hasBalloon : !!description});
            object.description = description;
            
            return object;
        }
    });
</script>

<div style="position: relative; text-align: center; padding: 20px 0;">
	<div id="YMapsID-4638" style="width:600px; height:450px; margin: 0 auto;"></div>
</div>

<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) -->