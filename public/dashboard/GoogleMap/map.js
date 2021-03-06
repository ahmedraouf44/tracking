function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 30.0595581,
            lng: 31.2233591
        },
        zoom: 7,
        mapTypeId: 'roadmap'
    });

    var input = document.getElementById('searchMapInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();

        /* If the place has a geometry, then present it on a map. */
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);


        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);


        /* Location details */
        $('#lat').val(marker.getPosition().lat());
        $('#lng').val(marker.getPosition().lng());

        document.getElementById('location-snap').innerHTML = place.formatted_address;
        document.getElementById('lat').innerHTML = place.geometry.location.lat();
        document.getElementById('lng').innerHTML = place.geometry.location.lng();
    });

    // Create the search box and link it to the UI element.
    var marker = new google.maps.Marker({
        position: {
            lat: 30.0595581,
            lng: 31.2233591
        },
        map: map,
        draggable: false,
        animation: google.maps.Animation.DROP
    });

    google.maps.event.addListener(map, 'click', function(event) {
        if (marker) {
            marker.setMap(null);
            var myLatLng = event.latLng;
        }
        marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });
            var geocoder;

            // 

            var reverseGeocoder = new google.maps.Geocoder();
            var currentPosition = new google.maps.LatLng(marker.getPosition().lat(), marker.getPosition().lng());
        
            reverseGeocoder.geocode({'latLng': currentPosition}, function(results, status) {
                console.log(results[0].formatted_address ,'7777777777777');
                $('#searchMapInput').val(results[0].formatted_address);

    
            });
    
        // console.log(event.latLng);
        $('#lat').val(marker.getPosition().lat());
        $('#lng').val(marker.getPosition().lng());
        console.log(marker.getPosition().lat());
        console.log(marker.getPosition().lng());
    })

    google.maps.event.addListener(map, 'zoom_changed', function() {
        $('#zoom').val(map.getZoom())
    });

}


