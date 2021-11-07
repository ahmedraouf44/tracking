
@extends('layouts.layouts')

@section('js')

    <script type="text/javascript">
        // check DOM Ready
        $(document).ready(function() {
            // execute
            var orderId = document.getElementById("orderId").value;
            var clientName = document.getElementById("clientName").value;
            var orderName = document.getElementById("orderName").value;
            var clientLat = document.getElementById("clientLat").value;
            var clientLong = document.getElementById("clientLong").value;
            var orderLat = document.getElementById("orderLat").value;
            var orderLong = document.getElementById("orderLong").value;

            let markers= [];

            var locations = [
                [clientName, clientLat, clientLong],
                [orderName, orderLat, orderLong],
            ];

            var options = {
                center: {
                    lat: 30.0595581,
                    lng: 31.2233591
                },
                zoom: 9,
                mapTypeId: 'roadmap'
            };

            // init map
            var map = new google.maps.Map(document.getElementById('map_canvas'), options);

            function getTrackingData() {

                $.ajax({
                    type:'GET',
                    url:'/trackingData/'+ orderId,
                    success:function(data) {
                        ajaxCallBack(data);
                    }
                });

                // function to update order location from ajax
                function ajaxCallBack(data){
                    orderLat = data['lat'];
                    orderLong = data['long'];

                    locations[1] = [orderName, orderLat, orderLong];
                }

                // remove all markers on the map
                for (var x = 0; x < markers.length; x++) {
                    markers[x].setMap(null);
                }
                markers = [];

                // set multiple marker
                for (var i = 0; i < locations.length; i++) {
                    // init markers
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                        map: map,
                        title: 'Click Me ' + i
                    });
                    markers.push(marker);

                    // process multiple info windows
                    (function(marker, i) {
                        // add click event
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow = new google.maps.InfoWindow({
                                content: locations[i][0]
                            });
                            infowindow.open(map, marker);
                        });
                    })(marker, i);
                }

            }

            // update the order location every 5 sec for one min and the loop will be stoped
            var repeating = 0;
            var intervalId = window.setInterval(function(){
                if (repeating > 11){
                    console.log(repeating);
                    clearInterval(intervalId);
                }
                repeating = repeating+1;
                getTrackingData();
            }, 5000);

        } );
    </script>
@endsection

@section('content')
    <div class="m-auto" id="map_canvas" style="width: 800px; height:500px;"></div>

    <input id="orderId" value="{{@$order->id}}" hidden readonly>
    <input id="clientName" value="{{@$order->client->name}}" hidden readonly>
    <input id="orderName" value="{{@$order->name}}" hidden readonly>
    <input id="clientLat" value="{{@$order->client->lat}}" hidden readonly>
    <input id="clientLong" value="{{@$order->client->long}}" hidden readonly>
    <input id="orderLat" value="{{@$order->lat}}" hidden readonly>
    <input id="orderLong" value="{{@$order->long}}" hidden readonly>
@endsection

