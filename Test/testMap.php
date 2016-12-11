<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Polygon arrays</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    // This example requires the Geometry library. Include the libraries=geometry
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=geometry">

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 24.886, lng: -70.269},
            zoom: 5,
        });

        var triangleCoords = [
            {lat: 50.321, lng: -105.757},
            {lat: 36.321, lng: -89.757},
            {lat: 25.774, lng: -80.19},
            {lat: 18.466, lng: -66.118},
            {lat: 32.321, lng: -64.757},

        ];

        var bermudaTriangle = new google.maps.Polygon({paths: triangleCoords});

        google.maps.event.addListener(map, 'click', function(e) {
            var resultColor =
                google.maps.geometry.poly.containsLocation(e.latLng, bermudaTriangle) ?
                    'red' :
                    'green';

            new google.maps.Marker({
                position: e.latLng,
                map: map,
                icon: {
                    path: google.maps.SymbolPath.CIRCLE,
                    fillColor: resultColor,
                    fillOpacity: .2,
                    strokeColor: 'white',
                    strokeWeight: .5,
                    scale: 10
                }
            });
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpG0X3mLqEju5PBCEV4IyjOJc7vAnUTbM&libraries=geometry&callback=initMap"
        async defer></script>
</body>
</html>