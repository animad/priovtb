<?php
	coord_info::init(array('obj'=>'trm'));
	coord_info::map_lables(array('obj'=>'trm'));
	
	if (0<count($gStore['coord_info']['ymaps']['label']) && 0<count($gStore['coord_info']['ymaps']['overlay'])){
?>
<!-- ���� ���� ���� ����� �������� � �� ����� ��������, ��� �� ������ ���������� �����  (������) -->
<script src="http://api-maps.yandex.ru/1.1/?key=AJ9D0UsBAAAAWwtGHAIAT1CfawFEnHDkDRuH1peKENqgF98AAAAAAAAAAADSvxJLq9plruBxuZeEu2haYJfQ-g==~AOyVrUwBAAAAv9WzNwIAqQP1nYmZWvJz632tqZktqQprSJwAAAAAAAAAAADloKxo2FCP8Zb708EiyB8lSNr_Sg==~AMUgUU0BAAAA_J1GAAIAcNk1NAZvCCXxqAq_mUAolrKXsksAAAAAAAAAAACihNWVxL0mGn8D3jsnNr34a4WoLQ==~ADchUU0BAAAAnrn_LQIAewArExbwxOyPZ0Sp9xFpSbsgUjMAAAAAAAAAAACJ5e_fLOm-XDcMO8LumTgiJWnTsw==&wizard=constructor" type="text/javascript"></script>
<script type="text/javascript">
    YMaps.jQuery(window).load(function () {
        var map = new YMaps.Map(YMaps.jQuery("#YMapsID-1357")[0]);
        map.setCenter(new YMaps.GeoPoint(39.703373,54.644961), 11, YMaps.MapType.MAP);
        map.addControl(new YMaps.Zoom());
        map.addControl(new YMaps.ToolBar());
        map.addControl(new YMaps.TypeControl());

<?php
	print implode("\r\n",$gStore['coord_info']['ymaps']['label']);
	print "\r\n\r\n";
	print implode("\r\n",$gStore['coord_info']['ymaps']['overlay']);
	print "\r\n\r\n";
?>

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
	<div id="YMapsID-1357" style="width:600px;height:450px; margin: 0 auto;"></div>
</div>
<!-- ���� ���� ���� ����� �������� � �� ����� ��������, ��� �� ������ ���������� ����� (�����) -->

<?php
	}
?>