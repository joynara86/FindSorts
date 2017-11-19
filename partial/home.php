
<script>
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var map;
    var infoWindow;
    var service;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 16,
            styles: [{
                    stylers: [{visibility: 'simplified'}]
                }, {
                    elementType: 'labels',
                    stylers: [{visibility: 'on'}]
                }]
        });
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                map.setCenter(pos);
            }, function () {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
        infoWindow = new google.maps.InfoWindow();
        service = new google.maps.places.PlacesService(map);

// The idle event is a debounced event, so we can query & listen without
// throwing too many requests at the server.
        map.addListener('idle', performSearch);
    }

    function performSearch() {
        var request = {
            bounds: map.getBounds(),
            keyword: 'quadra'
        };
        service.radarSearch(request, callback);
        var request = {
            bounds: map.getBounds(),
            keyword: 'pista'
        };
        service.radarSearch(request, callback);
        
        var request = {
            bounds: map.getBounds(),
            keyword: 'esporte'
        };
        service.radarSearch(request, callback);
        var request = {
            bounds: map.getBounds(),
            keyword: 'volei'
        };
        service.radarSearch(request, callback);
        
        var request = {
            bounds: map.getBounds(),
            keyword: 'basquete'
        };
        service.radarSearch(request, callback);
        
    }

    function callback(results, status) {
        if (status !== google.maps.places.PlacesServiceStatus.OK) {
            console.error(status);
            return;
        }
        for (var i = 0, result; result = results[i]; i++) {
            addMarker(result);
        }
    }

    function addMarker(place) {
        var marker = new google.maps.Marker({
            map: map,
            position: place.geometry.location,
            icon: {
                url: 'https://developers.google.com/maps/documentation/javascript/images/circle.png',
                anchor: new google.maps.Point(10, 10),
                scaledSize: new google.maps.Size(10, 17)
            }
        });

        google.maps.event.addListener(marker, 'click', function () {
            service.getDetails(place, function (result, status) {
                if (status !== google.maps.places.PlacesServiceStatus.OK) {
                    console.error(status);
                    return;
                }
                infoWindow.setContent(result.name);
                infoWindow.open(map, marker);
            });
        });
    }
</script>
<div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWTNHzXS4X_wYgN5ZWmHYY217fmtGv8OQ&callback=initMap&libraries=places,visualization" async defer></script>