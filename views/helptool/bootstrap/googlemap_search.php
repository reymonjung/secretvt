<?php
    //구글지도
    $lat = '21.028275';
    $lng = '105.838706';
    $zoom = 14;
    $map_width = '100%';
    $map_height = '425px';
?>

<style type="text/css">
div#map { position: relative; overflow:hidden; }
div#crosshair {position: absolute;top: 214px;height: 22px;width: 22px;left: 50%;margin-left: -10px;display: block;background-image: url('../img/crosshair.gif');background-position: center center;background-repeat: no-repeat;}
</style>
<script src="https://maps.google.com/maps/api/js?v=3.3&key=AIzaSyC5C3WnSgg9h4otykkgKNuBI49zUsOBe9U&sensor=true&language=ko"></script>
<script type="text/javascript">
var map;
var geocoder;
var centerChangedLast;
var reverseGeocodedLast;
var currentReverseGeocodeResponse;

function addLoadEvent(func) {
    var oldonload = window.onload;
    if (typeof window.onload !== 'function') {
        window.onload = func;
    } else {
        window.onload = function() {
            if (oldonload) {
                oldonload();
            }
            func();
        }
    }
}

function initialize() {
    var latlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lng; ?>);
    var myOptions = {
        zoom: <?php echo $zoom; ?>,
        scaleControl: true,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);
    geocoder = new google.maps.Geocoder();

    google.maps.event.addListener(map, 'zoom_changed', function() {
        document.getElementById('zoom_level').innerHTML = map.getZoom();
        document.getElementById('map_zoom').value = map.getZoom();

        zoomLevel = map.getZoom();
        if (zoomLevel > 19) {
            map.setZoom(19);
        }
        if (zoomLevel < 1) {
            map.setZoom(1);
        }
    });

    setupEvents();
    centerChanged();
}

function setupEvents() {
    reverseGeocodedLast = new Date();
    centerChangedLast = new Date();

    setInterval(function() {
        if ((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
            if (reverseGeocodedLast.getTime() < centerChangedLast.getTime())
            reverseGeocode();
        }
    }, 1000);

    google.maps.event.addListener(map, 'center_changed', centerChanged);

    google.maps.event.addDomListener(document.getElementById('crosshair'), 'dblclick', function() {
        map.setZoom(map.getZoom() + 1);
    });
}

function getCenterLatLngText() {

    var nn = 1000000;
    var tmpLat = Math.round(map.getCenter().lat()*nn)/nn;
    var tmpLng = Math.round(map.getCenter().lng()*nn)/nn;

    document.getElementById('map_lat').value = tmpLat;
    document.getElementById('map_lng').value = tmpLng;

    return tmpLat + ', ' + tmpLng;
}

function centerChanged() {
    centerChangedLast = new Date();
    var latlng = getCenterLatLngText();
    var loc = latlng.split(',');    
    geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);

    document.getElementById('lat').innerHTML = loc[0];
    document.getElementById('lng').innerHTML = loc[1];
    return;
    document.getElementById('formatedAddress').innerHTML = '';
    currentReverseGeocodeResponse = null;
}

function reverseGeocode() {
    reverseGeocodedLast = new Date();
    geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
}

function reverseGeocodeResult(results, status) {
    currentReverseGeocodeResponse = results;
    if (status === 'OK') {
        if (results.length === 0) {
            document.getElementById('formatedAddress').innerHTML = 'None';
        } else {
            document.getElementById('formatedAddress').innerHTML = results[0].formatted_address;
        }
    } else {
        document.getElementById('formatedAddress').innerHTML = 'Error';
    }
}

function geocode() {
    var address = document.getElementById('address').value;

    if(address=="") {
        alert('검색할 도시 및 주소를 입력하세요');
        return;
    }
    geocoder.geocode({
        'address': address,
        'partialmatch': true}, geocodeResult);
}

function geocodeResult(results, status) {
    if (status === 'OK' && results.length > 0) {
        map.fitBounds(results[0].geometry.viewport);
    } else {
        alert('Info : ' + status);
    }
}
</script>

<div class="modal-body">
    <div class="box">
        <div class="box-table">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <colgroup>
                        <col class="col-md-2">
                        <col class="col-md-10">
                    </colgroup>
                    <tbody>
                        <tr>
                            <th style="width:60px">검색</th>
                            <td>
                                <input type="text" id="address" class="form-control" onKeyDown="if (event.keyCode ==13) {geocode();}" />
                                <input type="hidden" id="map_lat" value="<?php echo $lat; ?>" />
                                <input type="hidden" id="map_lng" value="<?php echo $lng; ?>" />
                                <input type="hidden" id="map_zoom" value="<?php echo $zoom;?>" />
                            </td>
                            <td style="width:100px"><button type="button" class="btn btn-success" onclick="geocode()">찾기</button></td>
                        </tr>
                        <tr>
                            <th>위치</th>
                            <td>
                                <span id="formatedAddress"></span><br>
                                (<span id="lat"></span>, <span id="lng"></span>, <span id="zoom_level"><?php echo $zoom; ?>)
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>마커</th>
                            <td>
                                <input type="text" id="map_marker" class="form-control" />
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan=3 style="text-align:center"><button type="button" class="btn btn-primary" onclick="geocode_submit()">등록</button> <button type="button" class="btn btn-danger" onclick="self.close()">닫기</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="map">
    <div id="map_canvas" style="width:<?php echo $map_width; ?>; height:<?php echo $map_height; ?>;"></div>
    <div id="crosshair"></div>
</div>

<script type="text/javascript">
function geocode_submit() {
    var code_lat = document.getElementById('map_lat').value;
    var code_lng = document.getElementById('map_lng').value;
    var code_zoom = document.getElementById('map_zoom').value;
    var code_marker = document.getElementById('map_marker').value;

    var code_geo = " geo=\"" + code_lat + "," + code_lng + "," + code_zoom + "\"";

    if (code_marker) code_marker = " m=\"" + code_marker + "\"";

    var map_code = "{지도:" + code_geo + code_marker + "}";

    opener.document.getElementById('google_map').value = code_lat + "," + code_lng + "," + code_zoom;
}

addLoadEvent(function() {
    initialize();
});
</script>
