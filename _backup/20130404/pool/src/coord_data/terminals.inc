<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту  (начало) -->
<script src="http://api-maps.yandex.ru/1.1/?key=AJ9D0UsBAAAAWwtGHAIAT1CfawFEnHDkDRuH1peKENqgF98AAAAAAAAAAADSvxJLq9plruBxuZeEu2haYJfQ-g==~AOyVrUwBAAAAv9WzNwIAqQP1nYmZWvJz632tqZktqQprSJwAAAAAAAAAAADloKxo2FCP8Zb708EiyB8lSNr_Sg==~AMUgUU0BAAAA_J1GAAIAcNk1NAZvCCXxqAq_mUAolrKXsksAAAAAAAAAAACihNWVxL0mGn8D3jsnNr34a4WoLQ==~ADchUU0BAAAAnrn_LQIAewArExbwxOyPZ0Sp9xFpSbsgUjMAAAAAAAAAAACJ5e_fLOm-XDcMO8LumTgiJWnTsw==&wizard=constructor" type="text/javascript"></script>
<script type="text/javascript">
    YMaps.jQuery(window).load(function () {
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID-1357")[0]);
        map.setCenter(new YMaps.GeoPoint(39.703373,54.644961), 12, YMaps.MapType.MAP);
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

       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.752522,54.6206), "constructor#pmgrm1Placemark", "Прио-Внешторгбанк, ЦО<br/><br/>Рязань, ул.Есенина, 82/26<br /><br />GPS координаты:<br />Долгота: 39&deg;45&prime;9.38&Prime;<br />Широта: 54&deg;37&prime;13.98&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.759871,54.625151), "constructor#pmgrm5Placemark", "Центральный Дворец детского творчества, главный корпус<br/><br/>Рязань, Ул.Есенина, 46<br /><br />GPS координаты:<br />Долгота: 39&deg;45&prime;35.23&Prime;<br />Широта: 54&deg;37&prime;30.81&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.758948,54.625269), "constructor#pmgrm2Placemark", "Центральный Дворец детского творчества, спортивный зал<br/><br/>Рязань, Ул.Есенина, 46<br /><br />GPS координаты:<br />Долгота: 39&deg;45&prime;32.14&Prime;<br />Широта: 54&deg;37&prime;30.99&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.713254,54.609305), "constructor#pmgrm3Placemark", "Прио-Внешторгбанк, ОПК 6<br/><br/>Рязань, ул.Черновицкая, 1/77<br /><br />GPS координаты:<br />Долгота: 39&deg;42&prime;47.53&Prime;<br />Широта: 54&deg;36&prime;33.59&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.657174,54.644663), "constructor#pmgrm4Placemark", "Прио-Внешторгбанк, ОПК 8<br/><br/>Рязань, ул.Московское шоссе, 51/2<br /><br />GPS координаты:<br />Долгота: 39&deg;39&prime;25.95&Prime;<br />Широта: 54&deg;38&prime;40.74&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.642744,54.677683), "constructor#pmgrm7Placemark", "\"Рязань-лада\"<br/><br/>Рязань, ул.Бирюзова, д.1Г<br /><br />GPS координаты:<br />Долгота: 39&deg;38&prime;33.96&Prime;<br />Широта: 54&deg;40&prime;39.93&Prime;"));
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.712417,54.62751), "constructor#pmgrm6Placemark", "ДО Промышленное отделение<br/><br/>Рязань, пр.Завражнова, д.5<br /><br />GPS координаты:<br />Долгота: 39&deg;42&prime;45.36&Prime;<br />Широта: 54&deg;37&prime;38.99&Prime;"));
	   map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.756266,54.616429), "constructor#pmgrm8Placemark", "Областная налоговая консультанция<br/><br/>Рязань, ул.Новая, 69/12<br /><br />GPS координаты:<br />Долгота: 39&deg;45&prime;22.13&Prime;<br />Широта: 54&deg;36&prime;59.38&Prime;"));
	   map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.724144,54.613583), "constructor#pmgrm9Placemark", "Рязанский государственный радиотехнический университет<br /><br />Рязань, ул.Гагарина, 59/1<br /><br />GPS координаты:<br />Долгота: 39&deg;43&prime;26.92&Prime;<br />Широта: 54&deg;36&prime;48.9&Prime;"));
   
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
	<div id="YMapsID-1357" style="width:600px;height:450px"></div>
</div>
<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) -->