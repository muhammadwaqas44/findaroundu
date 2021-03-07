<script>

    $(document).ready(function () {


        var placeSearch, autocomplete;
        var autocomplete1;

        var autocomplete2;
        var autocomplete3;
        var autocomplete4;

        var map;

        var map1;
        var map2;
        var map3;

        var marker;

        var marker1;
        var marker2;
        var marker3;

        var city = '';
        var previousMarker; // global variable to store previous marker

        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };
        initAutocomplete();
    });
        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            $(function () {


                if (document.getElementById("job_location")) {
                    var input = document.getElementById("job_location");
                    autocomplete = new google.maps.places.Autocomplete(
                    (document.getElementById('job_location')),
                        {types: ['geocode']});
                }

                if (document.getElementById("profile-wizard-location-0")) {
                    var countryCode = '{{Session::get('location')['countryCode']}}';

                    map1 = new google.maps.Map(document.getElementById('map-0'), {
                        center: {lat: -33.8688, lng: 151.2195},
                        zoom: 5
                    });
                    $("#city").change(function () {
                        city = $("#city :selected")[0].text;
                        geocodeAddress1(city, geocoder, map1);
                    });


                    var geocoder = new google.maps.Geocoder();
                    geocodeAddress1(city, geocoder, map1);

                    var options = {
                        types: ['geocode'],
                        componentRestrictions: {country: countryCode}
                    };

                    var input = document.getElementById("profile-wizard-location-0");


                    autocomplete2 = new google.maps.places.Autocomplete(
                        document.getElementById('profile-wizard-location-0'), options);

                    autocomplete2.setFields(['address_component', 'place_id', 'geometry', 'name']);
                    marker1 = new google.maps.Marker({map: map1, draggable: true,});
                    autocomplete2.addListener('place_changed', fillInAddress1);

                }

                if (document.getElementById("profile-wizard-location-1")) {
                    var countryCode = '{{Session::get('location')['countryCode']}}';

                    map2 = new google.maps.Map(document.getElementById('map-1'), {
                        center: {lat: -33.8688, lng: 151.2195},
                        zoom: 5
                    });
                    $("#city").change(function () {
                        city = $("#city :selected")[0].text;
                        geocodeAddress2(city, geocoder, map2);
                    });


                    var geocoder = new google.maps.Geocoder();
                    geocodeAddress2(city, geocoder, map2);

                    var options = {
                        types: ['geocode'],
                        componentRestrictions: {country: countryCode}
                    };

                    var input1 = document.getElementById("profile-wizard-location-1");


                    autocomplete3 = new google.maps.places.Autocomplete(
                        document.getElementById('profile-wizard-location-1'), options);
                    autocomplete3.setFields(['address_component', 'place_id', 'geometry', 'name']);
                    marker2 = new google.maps.Marker({map: map2, draggable: true,});
                    autocomplete3.addListener('place_changed', fillInAddress2);

                }

                if (document.getElementById("profile-wizard-location-2")) {
                    var countryCode = '{{Session::get('location')['countryCode']}}';

                    map3 = new google.maps.Map(document.getElementById('map-2'), {
                        center: {lat: -33.8688, lng: 151.2195},
                        zoom: 5
                    });
                    $("#city").change(function () {
                        city = $("#city :selected")[0].text;
                        geocodeAddress3(city, geocoder, map3);
                    });


                    var geocoder = new google.maps.Geocoder();
                    geocodeAddress3(city, geocoder, map3);

                    var options = {
                        types: ['geocode'],
                        componentRestrictions: {country: countryCode}
                    };


                    var input2 = document.getElementById("profile-wizard-location-2");

                    autocomplete4 = new google.maps.places.Autocomplete(
                        document.getElementById('profile-wizard-location-2'), options);
                    autocomplete4.setFields(['address_component', 'place_id', 'geometry', 'name']);
                    marker3 = new google.maps.Marker({map: map3, draggable: true,});
                    autocomplete4.addListener('place_changed', fillInAddress3);
                }

                if (document.getElementById("job_location_adds")) {
                    var input = document.getElementById("job_location_adds");
                    autocomplete = new google.maps.places.Autocomplete(
               (document.getElementById('job_location_adds')),
                        {types: ['geocode']});
                }

                var input2 = document.getElementById("job_location_top");

                if(input2){
                    autocomplete = new google.maps.places.Autocomplete(
                        (document.getElementById('job_location_top')),
                        {types: ['geocode']});
                }


            });
        }

        function fillInAddress() {
            var place = autocomplete1.getPlace();

            var lat = autocomplete1.getPlace().geometry.location.lat();
            var long = autocomplete1.getPlace().geometry.location.lng();

            $('.lat').val(lat);
            $('.lng').val(long);

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }


            marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location,
                draggable: true
            });

            marker.setVisible(true);

            google.maps.event.addListener(marker, 'dragend', function (evt) {
                var lat = evt.latLng.lat().toFixed(3);
                var lng = evt.latLng.lng().toFixed(3);

                $('.lat').val(lat);
                $('.lng').val(lng);

                showPosition(lat, lng)
            });

        }

        function fillInAddress1() {
            var place = autocomplete2.getPlace();

            var lat = autocomplete2.getPlace().geometry.location.lat();
            var long = autocomplete2.getPlace().geometry.location.lng();

            $('.lat-0').val(lat);
            $('.lng-0').val(long);

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map1.fitBounds(place.geometry.viewport);
            } else {
                map1.setCenter(place.geometry.location);
                map1.setZoom(17);
            }


            marker = new google.maps.Marker({
                map: map1,
                position: place.geometry.location,
                draggable: true
            });

            marker.setVisible(true);

            google.maps.event.addListener(marker, 'dragend', function (evt) {
                var lat = evt.latLng.lat().toFixed(3);
                var lng = evt.latLng.lng().toFixed(3);

                $('.lat-0').val(lat);
                $('.lng-0').val(lng);

                showPosition1(lat, lng)
            });

        }

        function fillInAddress2() {
            var place = autocomplete3.getPlace();

            var lat = autocomplete3.getPlace().geometry.location.lat();
            var long = autocomplete3.getPlace().geometry.location.lng();

            $('.lat-1').val(lat);
            $('.lng-1').val(long);

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map2.fitBounds(place.geometry.viewport);
            } else {
                map2.setCenter(place.geometry.location);
                map2.setZoom(17);
            }


            marker = new google.maps.Marker({
                map: map2,
                position: place.geometry.location,
                draggable: true
            });

            marker.setVisible(true);

            google.maps.event.addListener(marker, 'dragend', function (evt) {
                var lat = evt.latLng.lat().toFixed(3);
                var lng = evt.latLng.lng().toFixed(3);

                $('.lat-1').val(lat);
                $('.lng-1').val(lng);

                showPosition2(lat, lng)
            });

        }

        function fillInAddress3() {
            var place = autocomplete4.getPlace();

            var lat = autocomplete4.getPlace().geometry.location.lat();
            var long = autocomplete4.getPlace().geometry.location.lng();

            $('.lat-2').val(lat);
            $('.lng-2').val(long);

            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map3.fitBounds(place.geometry.viewport);
            } else {
                map3.setCenter(place.geometry.location);
                map3.setZoom(17);
            }


            marker = new google.maps.Marker({
                map: map3,
                position: place.geometry.location,
                draggable: true
            });

            marker.setVisible(true);

            google.maps.event.addListener(marker, 'dragend', function (evt) {
                var lat = evt.latLng.lat().toFixed(3);
                var lng = evt.latLng.lng().toFixed(3);

                $('.lat-2').val(lat);
                $('.lng-2').val(lng);

                showPosition3(lat, lng)
            });

        }

        function geocodeAddress(city, geocoder, resultsMap) {

                    @if(Session::has('location.city'))

            var address = "{{Session::get('location')['city']}}";
            if (city != '') {
                if (city != address) {
                    address = city;
                }
            }
                    @else
            var address = "{{Session::get('location')['country']}}";
            @endif

geocoder.geocode({'address': address}, function (results, status) {

                if (marker)
                    marker.setMap(null);

                if (status === 'OK') {

                    resultsMap.setCenter(results[0].geometry.location);
                    marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location,
                        draggable: true,

                    });
                    map.setZoom(14);
                    marker.setVisible(true);

                    google.maps.event.addListener(marker, 'dragend', function (evt) {
                        var lat = evt.latLng.lat().toFixed(3);
                        var lng = evt.latLng.lng().toFixed(3);

                        $('.lat').val(lat);
                        $('.lng').val(lng);

                        showPosition(lat, lng)
                    });

                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        function geocodeAddress1(city, geocoder, resultsMap) {

          @if(Session::has('location.city'))
            var address = "{{Session::get('location')['city']}}";
            //console.log(city);
            if (city != '') {
                if (city != address) {
                    address = city.options[city.selectedIndex].text;
                }
            }
                    @else
            var address = "{{Session::get('location')['country']}}";

            @endif

//            alert(city.options[city.selectedIndex].text);
//            console.log(address);

            geocoder.geocode({'address': address}, function (results, status) {

                if (marker1)
                    marker1.setMap(null);

                if (status === 'OK') {

                    resultsMap.setCenter(results[0].geometry.location);
                    marker1 = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location,
                        draggable: true,

                    });
                    map1.setZoom(14);
                    marker1.setVisible(true);

                    google.maps.event.addListener(marker1, 'dragend', function (evt) {
                        var lat = evt.latLng.lat().toFixed(3);
                        var lng = evt.latLng.lng().toFixed(3);

                        $('.lat-0').val(lat);
                        $('.lng-0').val(lng);

                        showPosition1(lat, lng)
                    });

                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        function geocodeAddress2(city, geocoder, resultsMap) {

           @if(Session::has('location.city'))
            var address = "{{Session::get('location')['city']}}";
            //console.log(city);
            if (city != '') {
                if (city != address) {
                    address = city.options[city.selectedIndex].text;
                }
            }
                    @else
            var address = "{{Session::get('location')['country']}}";

            @endif


geocoder.geocode({'address': address}, function (results, status) {

                if (marker2)
                    marker2.setMap(null);

                if (status === 'OK') {

                    resultsMap.setCenter(results[0].geometry.location);
                    marker2 = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location,
                        draggable: true,
                    });
                    map2.setZoom(14);
                    marker2.setVisible(true);

                    google.maps.event.addListener(marker2, 'dragend', function (evt) {
                        var lat = evt.latLng.lat().toFixed(3);
                        var lng = evt.latLng.lng().toFixed(3);

                        $('.lat-1').val(lat);
                        $('.lng-1').val(lng);

                        showPosition2(lat, lng)
                    });

                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        function geocodeAddress3(city, geocoder, resultsMap) {

                    @if(Session::has('location.city'))
            var address = "{{Session::get('location')['city']}}";
            //console.log(city);
            if (city != '') {
                if (city != address) {
                    address = city.options[city.selectedIndex].text;
                }
            }
                    @else
            var address = "{{Session::get('location')['country']}}";
            @endif
geocoder.geocode({'address': address}, function (results, status) {

                if (marker3)
                    marker3.setMap(null);

                if (status === 'OK') {

                    resultsMap.setCenter(results[0].geometry.location);
                    marker3 = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location,
                        draggable: true,

                    });
                    map3.setZoom(14);
                    marker3.setVisible(true);

                    google.maps.event.addListener(marker3, 'dragend', function (evt) {
                        var lat = evt.latLng.lat().toFixed(3);
                        var lng = evt.latLng.lng().toFixed(3);

                        $('.lat-2').val(lat);
                        $('.lng-2').val(lng);

                        showPosition3(lat, lng)
                    });

                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        function showPosition(lat, lng) {

            var geocoder = new google.maps.Geocoder;

            var latlng = new google.maps.LatLng(lat, lng);

            geocoder.geocode({
                'location': latlng
            }, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {
//                    input.value = results[0].formatted_address;
                        console.log(results[0].formatted_address);
                        $('#fau_job_location').val(results[0].formatted_address);
                    }
                }
            });

        }

        function showPosition1(lat, lng) {

            var geocoder = new google.maps.Geocoder;

            var latlng = new google.maps.LatLng(lat, lng);

            geocoder.geocode({
                'location': latlng
            }, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {
//                    input.value = results[0].formatted_address;
                        console.log(results[0].formatted_address);
                        $('#profile-wizard-location-0').val(results[0].formatted_address);
                    }
                }
            });

        }

        function showPosition2(lat, lng) {

            var geocoder = new google.maps.Geocoder;

            var latlng = new google.maps.LatLng(lat, lng);

            geocoder.geocode({
                'location': latlng
            }, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {
//                    input.value = results[0].formatted_address;
                        console.log(results[0].formatted_address);
                        $('#profile-wizard-location-1').val(results[0].formatted_address);
                    }
                }
            });

        }

        function showPosition3(lat, lng) {

            var geocoder = new google.maps.Geocoder;

            var latlng = new google.maps.LatLng(lat, lng);

            geocoder.geocode({
                'location': latlng
            }, function (results, status) {
                if (status === 'OK') {
                    if (results[0]) {
//                    input.value = results[0].formatted_address;
                        console.log(results[0].formatted_address);
                        $('#profile-wizard-location-2').val(results[0].formatted_address);
                    }
                }
            });

        }

        function job_map() {
            if (document.getElementById("fau_job_location")) {

                var countryCode = '{{Session::get('location')['countryCode']}}';

                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: -33.8688, lng: 151.2195},
                    zoom: 5
                });

                $("#city").change(function () {
                    city = $("#city :selected")[0].text;
                    geocodeAddress(city, geocoder, map);
                });


                var geocoder = new google.maps.Geocoder();
                geocodeAddress(city, geocoder, map);

                var options = {
                    types: ['geocode'],
                    componentRestrictions: {country: countryCode}
                };

                var input = document.getElementById("fau_job_location");
                autocomplete1 = new google.maps.places.Autocomplete(
                    document.getElementById('fau_job_location'), options);
                autocomplete1.setFields(['address_component', 'place_id', 'geometry', 'name']);
                marker = new google.maps.Marker({map: map, draggable: true,});
                autocomplete1.addListener('place_changed', fillInAddress);

            }

        }


      //






</script>







