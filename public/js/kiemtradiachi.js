var map_check;
var marker_check;

function initialize() {
    mapOptions = {
        center: {lat: 12.256442, lng: 109.171656},
        zoom: 17
    };
    map_check = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);
            // Get GEOLOCATION
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = new google.maps.LatLng(position.coords.latitude,
                        position.coords.longitude);
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({
                        'latLng': pos
                    }, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                console.log(results[0].formatted_address);
                            } else {
                                console.log('No results found');
                            }
                        } else {
                            console.log('Geocoder failed due to: ' + status);
                        }
                    });
                    map_check.setCenter(pos);
                    marker_check = new google.maps.Marker({
                        position: pos,
                        map: map_check,
                        draggable: true
                    });
                }, function () {
                    handleNoGeolocation(true);
                });
            } else {
                // Browser doesn't support Geolocation
                handleNoGeolocation(false);
            }

            function handleNoGeolocation(errorFlag) {
                if (errorFlag) {
                    var content = 'Error: The Geolocation service failed.';
                } else {
                    var content = 'Error: Your browser doesn\'t support geolocation.';
                }
                var lat = $('#txtlat').val();
                var lng = $('#txtlng').val();
                var options;
                if (lat != '' && lng != '') {
                    options = {
                        map: map_check,
                        zoom: 17,
                        position: new google.maps.LatLng(lat, lng),
                        content: content
                    };

                }
                else {
                    options = {
                        map: map_check,
                        zoom: 17,
                        position: new google.maps.LatLng(10.769444, 106.681944),
                        content: content
                    };
                }

                map_check.setCenter(options.position);
                marker_check = new google.maps.Marker({
                    position: options.position,
                    map: map_check,
                    zoom: 19,
                    draggable: true
                });
                /* Dragend Marker */
                google.maps.event.addListener(marker_check, 'dragend', function () {
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({'latLng': marker_check.getPosition()}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                $('#diachi').val(results[0].formatted_address.replace(", Việt Nam", ""));
                                $('#txtaddress').val(results[0].formatted_address.replace(", Việt Nam", ""));
                                $('#map').val(marker_check.getPosition().lat() + ";" + marker_check.getPosition().lng());
                                infowindow.setContent(results[0].formatted_address);
                                infowindow.open(map_check, marker_check);
                            }
                        }
                    });
                });
                /* End Dragend */

            }

            // get places auto-complete when user type in diachi
            var input = /** @type {HTMLInputElement} */
            (
                document.getElementById('diachi'));
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map_check);

            var infowindow = new google.maps.InfoWindow();
            marker_check = new google.maps.Marker({
                map: map_check,
                anchorPoint: new google.maps.Point(0, -29),
                draggable: true
            });

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                infowindow.close();
                marker_check.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({'latLng': place.geometry.location}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#txtaddress').val(results[0].formatted_address.replace(", Việt Nam", ""));
                            $('#map').val(marker_check.getPosition().lat() + ";" + marker_check.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map_check, marker_check);
                        }
                    }
                });
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map_check.fitBounds(place.geometry.viewport);
                } else {
                    map_check.setCenter(place.geometry.location);
                    map_check.setZoom(17); // Why 17? Because it looks good.
                }
                document.getElementById('txtlat').value = place.geometry.location.lat();
                document.getElementById('txtlng').value = place.geometry.location.lng();
                console.log(place.geometry.location.lat());
                marker_check.setPosition(place.geometry.location);
                marker_check.setVisible(true);


                var address = '';
                if (place.address_components) {
                    address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }
                /* Dragend Marker */
                google.maps.event.addListener(marker_check, 'dragend', function () {
                    var geocoder = new google.maps.Geocoder();
                    geocoder.geocode({'latLng': marker_check.getPosition()}, function (results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                $('#diachi').val(results[0].formatted_address);
                                $('#txtlat').val(marker_check.getPosition().lat());
                                $('#txtlng').val(marker_check.getPosition().lng());
                                $('#map').val(marker_check.getPosition().lat() + ";" + marker_check.getPosition().lng());
                                infowindow.setContent(results[0].formatted_address);
                                infowindow.open(map_check, marker_check);
                            }
                        }
                    });
                });
                /* End Dragend */
            });
        }