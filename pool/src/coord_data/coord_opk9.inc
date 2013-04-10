<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту  (начало) -->
<script src="http://api-maps.yandex.ru/1.1/?key=AJ9D0UsBAAAAWwtGHAIAT1CfawFEnHDkDRuH1peKENqgF98AAAAAAAAAAADSvxJLq9plruBxuZeEu2haYJfQ-g==~AOyVrUwBAAAAv9WzNwIAqQP1nYmZWvJz632tqZktqQprSJwAAAAAAAAAAADloKxo2FCP8Zb708EiyB8lSNr_Sg==~AMUgUU0BAAAA_J1GAAIAcNk1NAZvCCXxqAq_mUAolrKXsksAAAAAAAAAAACihNWVxL0mGn8D3jsnNr34a4WoLQ==~ADchUU0BAAAAnrn_LQIAewArExbwxOyPZ0Sp9xFpSbsgUjMAAAAAAAAAAACJ5e_fLOm-XDcMO8LumTgiJWnTsw==&wizard=constructor" type="text/javascript"></script>
<script type="text/javascript">
    YMaps.jQuery(function () {
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID-4734")[0]);
        map.setCenter(new YMaps.GeoPoint(39.725375,54.629901), 15, YMaps.MapType.MAP);
//        map.addControl(new YMaps.Zoom());
//        map.addControl(new YMaps.ToolBar());
//        map.addControl(new YMaps.TypeControl());

        YMaps.Styles.add("constructor#pmgnm9Placemark", {
            iconStyle : {
                href : "http://api-maps.yandex.ru/i/0.3/placemarks/pmgnm9.png",
                size : new YMaps.Point(28,29),
                offset: new YMaps.Point(-8,-27)
            }
        });
		
       map.addOverlay(createObject("Placemark", new YMaps.GeoPoint(39.726234,54.629764), "constructor#pmgnm9Placemark", "ОАО «Прио-внешторгбанк», ОПК №9<br/><br/>г. Рязань, Первомайский пр-т, 34<br /><br />"));
        
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
	<div id="YMapsID-4734" style="width:260px;height:260px; margin: 0 auto;"></div>
</div>

<!-- Этот блок кода нужно вставить в ту часть страницы, где вы хотите разместить карту (конец) -->