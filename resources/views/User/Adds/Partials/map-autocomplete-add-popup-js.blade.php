
<script>
    var autocomplete_add;
    var map_add;
    var marker_add;
    var city_add = '';
    var previousMarker_add; // global variable to store previous marker

    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocompleteAdd() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        $(function () {


            autocomplete_add= new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('location_add')),
                {types: ['geocode']});


            });
    }






    function fillInAddressAdd() {
        var place = autocomplete_add.getPlace();
        console.log(autocomplete_add.getPlace());
        var lat = autocomplete_add.getPlace().geometry.location.lat();
        var long = autocomplete_add.getPlace().geometry.location.lng();

        $('.add_lat').val(lat);
        $('.add_lng').val(long);

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map_add.fitBounds(place.geometry.viewport);
        } else {
            map_add.setCenter(place.geometry.location);
            map_add.setZoom(17);
        }

        marker_add = new google.maps.Marker({
            map: map_add,
            position: place.geometry.location,
            draggable: true
        });

        marker_add.setVisible(true);

        google.maps.event.addListener(marker_add, 'dragend', function(evt){
            var lat = evt.latLng.lat().toFixed(3);
            var lng = evt.latLng.lng().toFixed(3);

            $('.add_lat').val(lat);
            $('.add_lng').val(lng);

            showPositionAdd(lat,lng)
        });

    }





    function geocodeAddress(city_add,geocoder,resultsMap) {

        if (city_add == "") {

           @if(Session::has('location.city'))
                var address = "{{Session::get('location')['city']}}";
                if (city_add != '') {
                    if (city_add != address) {
                        address = city_add;
                    }
                }
           @else
                var address = "{{Session::get('location')['country']}}";
           @endif
        }
        else{
            var address = city_add;
        }

        geocoder.geocode({'address': address}, function(results, status) {

            if (marker_add)
            {marker_add.setMap(null);}

            if (status === 'OK') {

                resultsMap.setCenter(results[0].geometry.location);
                marker_add = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location,
                    draggable: true,

                });
                map_add.setZoom(14);
                marker_add.setVisible(true);

                $('.add_lat').val(results[0].geometry.location.lat);
                $('.add_lng').val(results[0].geometry.location.lat);

                google.maps.event.addListener(marker_add, 'dragend', function(evt){
                    var lat = evt.latLng.lat().toFixed(3);
                    var lng = evt.latLng.lng().toFixed(3);

                    $('.add_lat').val(lat);
                    $('.add_lng').val(lng);

                    showPositionAdd(lat,lng)
                });

            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }

    function showPositionAdd(lat,lng)
    {

        var geocoder = new google.maps.Geocoder;

        var latlng = new google.maps.LatLng(lat, lng);

        geocoder.geocode({
            'location': latlng
        }, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
//                    input.value = results[0].formatted_address;
                    console.log(results[0].formatted_address);
                    $('#location_add').val(results[0].formatted_address);
                }
            }
        });



    }

    function add_map()
    {
        var countryCode = '{{Session::get('location')['countryCode']}}';

        map_add = new google.maps.Map(document.getElementById('map-add'), {
            center: {lat: -33.8688, lng: 151.2195},
            zoom: 5
        });

        $("#city-ads").change(function() {
            city_add = $("#city-ads :selected")[0].text;
            geocodeAddress(city_add, geocoder, map_add);
        });


        var geocoder = new google.maps.Geocoder();
        geocodeAddress(city_add,geocoder,map_add);

        var options = {
            types: ['geocode'],
            componentRestrictions: {country: countryCode}
        };


        autocomplete_add = new google.maps.places.Autocomplete(
            document.getElementById('location_add'), options);

        autocomplete_add.setFields(['address_component','place_id', 'geometry', 'name']);
        marker_add = new google.maps.Marker({map: map_add,draggable: true,});
        autocomplete_add.addListener('place_changed', fillInAddressAdd);
    }


    initAutocompleteAdd();

</script>





