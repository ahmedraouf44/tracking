<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Multiple Markers Google Maps</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.11&sensor=false" type="text/javascript"></script>
    <script type="text/javascript">
        // check DOM Ready
        $(document).ready(function() {
            // execute
            (function() {
                // map options
                var options = {
                    center: {
                        lat: 30.0595581,
                        lng: 31.2233591
                    },
                    zoom: 7,
                    mapTypeId: 'roadmap'
                };

                // init map
                var map = new google.maps.Map(document.getElementById('map_canvas'), options);

                var locations = [
                    ['El Qantra Shark - Ras Sedr Rd, El Qantara El Sharqiya, Ismailia Governorate, Egypt', 30.69458412564884, 32.37520693935551],
                    ['Al Mafhama, Al Qalg, Al Khankah, Al Qalyubia Governorate, Egypt', 30.5213284, 32.37556029999996],
                    ['Maroubra Beach', -33.950198, 151.259302, 1],
                ];

                // NY and CA sample Lat / Lng
                // var southWest = new google.maps.LatLng(40.744656, -74.005966);
                // var northEast = new google.maps.LatLng(34.052234, -118.243685);
                // var lngSpan = northEast.lng() - southWest.lng();
                // var latSpan = northEast.lat() - southWest.lat();

                console.log(locations[0]);
                // set multiple marker
                for (var i = 0; i < locations.length; i++) {
                    // init markers
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        title: 'Click Me ' + i
                    });

                    // process multiple info windows
                    (function(marker, i) {
                        // add click event
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow = new google.maps.InfoWindow({
                                content: 'Hello, World!!'
                            });
                            infowindow.open(map, marker);
                        });
                    })(marker, i);
                }
            })();
        });
    </script>
</head>

<body>
    <div id="map_canvas" style="width: 800px; height:500px;"></div>
</body>

</html>
