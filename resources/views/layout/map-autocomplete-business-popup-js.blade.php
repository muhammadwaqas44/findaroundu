
<script>
    $(document).ready(function () {
        var placeSearch;
        var autocompleteBusinessCreatePopup;
        var mapBusinesCreatePopup;
        var markerBusinesCreatePopup;
        var city = '';


        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocompleteBusiness() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            $(function () {

                if (document.getElementById('location_business')) {
                    autocompleteBusinessCreatePopup = new google.maps.places.Autocomplete(
                        /** @type {!HTMLInputElement} */(document.getElementById('location_business')),
                        {types: ['geocode']});
                }


            });
        }










        initAutocompleteBusiness();
    });

    function fillInAddressBusiness() {
        var place = autocompleteBusinessCreatePopup.getPlace();
        console.log(autocompleteBusinessCreatePopup.getPlace());
        var lat = autocompleteBusinessCreatePopup.getPlace().geometry.location.lat();
        var long = autocompleteBusinessCreatePopup.getPlace().geometry.location.lng();

        $('#business_lat').val(lat);
        $('#business_long').val(long);

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            mapBusinesCreatePopup.fitBounds(place.geometry.viewport);
        } else {
            mapBusinesCreatePopup.setCenter(place.geometry.location);
            mapBusinesCreatePopup.setZoom(17);
        }

        markerBusinesCreatePopup = new google.maps.Marker({
            map: mapBusinesCreatePopup,
            position: place.geometry.location,
            draggable: true
        });

        markerBusinesCreatePopup.setVisible(true);

        google.maps.event.addListener(markerBusinesCreatePopup, 'dragend', function (evt) {
            var lat = evt.latLng.lat().toFixed(3);
            var lng = evt.latLng.lng().toFixed(3);

            $('#business_lat').val(lat);
            $('#business_long').val(lng);

            showPositionJob(lat, lng)
        });

    }

    function geocodeAddress(city, geocoder, resultsMap) {

        if (city == "") {


                    @if(Session::has('location.city'))

            var address = "{{Session::get('location')['city']}}";
            alert(address);
            if (city != '') {
                if (city != address) {
                    address = city.value;
                }
            }
                    @else
            var address = "{{Session::get('location')['country']}}";
            @endif
        } else {
            var address = city.value;
        }

        geocoder.geocode({'address': address}, function (results, status) {

            if (markerBusinesCreatePopup) {
                markerBusinesCreatePopup.setMap(null);
            }

            if (status === 'OK') {

                resultsMap.setCenter(results[0].geometry.location);
                markerBusinesCreatePopup = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location,
                    draggable: true,

                });
                mapBusinesCreatePopup.setZoom(14);
                markerBusinesCreatePopup.setVisible(true);

                $('#business_lat').val(results[0].geometry.location.lat);
                $('#business_long').val(results[0].geometry.location.lat);

                google.maps.event.addListener(markerBusinesCreatePopup, 'dragend', function (evt) {
                    var lat = evt.latLng.lat().toFixed(3);
                    var lng = evt.latLng.lng().toFixed(3);

                    $('#business_lat').val(lat);
                    $('#business_long').val(lng);

                    showPositionJob(lat, lng)
                });

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    function showPositionJob(lat, lng) {

        var geocoder = new google.maps.Geocoder;

        var latlng = new google.maps.LatLng(lat, lng);

        geocoder.geocode({
            'location': latlng
        }, function (results, status) {
            if (status === 'OK') {
                if (results[0]) {
//                    input.value = results[0].formatted_address;
                    console.log(results[0].formatted_address);
                    $('#location_business').val(results[0].formatted_address);
                }
            }
        });


    }

    function business_map() {
        var countryCode = '{{Session::get('location')['countryCode']}}';

        mapBusinesCreatePopup = new google.maps.Map(document.getElementById('map-business'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 7
        });

        $("#city_business").change(function () {
            city = $("#city_business :selected")[0].text;

            geocodeAddress(city, geocoder, mapBusinesCreatePopup);
        });


        var geocoder = new google.maps.Geocoder();
        geocodeAddress($("#city_business :selected")[0].text, geocoder, mapBusinesCreatePopup);

        var options = {
            types: ['geocode'],
            componentRestrictions: {country: countryCode}
        };


        autocompleteBusinessCreatePopup = new google.maps.places.Autocomplete(
            document.getElementById('location_business'), options);
        autocompleteBusinessCreatePopup.setFields(['address_component', 'place_id', 'geometry', 'name']);
        markerBusinesCreatePopup = new google.maps.Marker({map: mapBusinesCreatePopup, draggable: true,});
        autocompleteBusinessCreatePopup.addListener('place_changed', fillInAddressBusiness);
    }
</script>





