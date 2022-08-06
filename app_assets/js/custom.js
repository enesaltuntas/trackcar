const pointsForJson = [
    [32.80661392 ,39.63966752]
];

$(document).ready(function () {

    var map = L.map('map');

    pointsForJson.forEach(function(lngLat) {
        L.marker(lngLatToLatLng(lngLat)).addTo(map);
    });

    $.ajax({
        'cache': false,
        'dataType': "json",
        "async": true,
        "crossDomain": true,
        "url": "http://iot.deepsystem.space:8034/events-api?i=DCECC4D88E830095&limit=50",
        "method": "GET",
        "headers": {
            "accept": "application/json",
            "Access-Control-Allow-Origin":"*"
        },
        success: function (data) {
            $.each(data, function() {
                $.each(this, function(k, v) {
                    var _Longitude = v.Longitude;
                    var _Latitude  = v.Latitude;

                    pointsForJson.push([_Latitude , _Longitude]);

                    L.marker(lngLatToLatLng([_Longitude , _Latitude])).addTo(map);
                });
            });
        }
    });

    var polyline = L.polyline(lngLatArrayToLatLng(pointsForJson)).addTo(map);
    console.log(pointsForJson);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

    }).addTo(map);

    map.fitBounds(polyline.getBounds());

    function lngLatArrayToLatLng(lngLatArray) {
        return lngLatArray.map(lngLatToLatLng);
    }

    function lngLatToLatLng(lngLat) {
        return [lngLat[1], lngLat[0]];
    }

});
