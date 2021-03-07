



<script>
    $(document).ready(function() {
        <!--drop down-->
        $(".form-control").select2();
        <!--scroll-->
        $('.toggle-side-bar').click(function(e) {
            $('.left-side-bar, .body-container').toggleClass('active');
        });
        $('.nav-main li a[data-target]').click(function(e) {

            if($(window).width() < 769 && !$(this).hasClass('collapsed'))
            {
                $('.left-side-bar, .body-container').addClass('active');
            }
        });
    });
</script>

<script>

    var locationBox = '';
    var servicePortion = '';
    var firstCityPortion = '';
    var otherCityPortion = '';


    function getLocation() { //alert(1);
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getCurrentLocationRecords,showError);
//            alert(navigator.geolocation.getCurrentPosition(showPosition,showError));
        } else {
            alert("Geolocation is not supported by this browser");
        }
    }


    function getCurrentLocationRecords(position) {
        var GEOCODING = 'https://maps.googleapis.com/maps/api/geocode/json?key={{env("GOOGLE_KEY")}}&latlng=' + position.coords.latitude + '%2C' + position.coords.longitude + '&language=en';

        var country = '';
        var state = '';
        var city = '';
        var address = '';
        var latitude = '';
        var longitude = '';
        $.getJSON(GEOCODING).done(function(location) {

            address = location.results[0].formatted_address;
            $.each(location.results[0].address_components, function (key, index) {

                if (index.types[0] == 'country') {
                    country = index.long_name;
                }
                else if (index.types[0] == "locality") {
                    city = index.long_name;
                }
                else if (index.types[0] == 'administrative_area_level_1') {
                    state = index.long_name;
                }
                else if (index.types[0] == '') {
                    latitude = position.coords.latitude;
                }
                else if (index.types[0] == '') {
                    longitude = position.coords.longitude;
                }

            });
            $.ajax({
                type: "POST",
                url: "{{route('user.create-session')}}",
                data: {
                    '_token': '{{csrf_token()}}',
                    'latitude':position.coords.latitude,
                    'longitude':position.coords.longitude,
                    'city': city,
                    'country':country,
                    'address':address
                },
                async: false,

                success: function (response, status) {

                    if(response.result == 'success')
                    {
                        console.log(response.data);


                        getFlagHtml(response.data.allCountries,response.data.countryFlag);


                        getSearchAreaHtml(response.data.allCities,response.data.cityId,response.data.city,response.data.country)


                        getServiceHtml(response.data.services);

                        getCityHtml(response.data.cities);


                    }
                    else{

                    }
                }
            });
        });


    }

    function showError(error) {
        switch(error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }


    function getFlagHtml(allCountries,countryFlag) {
        if(allCountries.length > 0)
        {

            var countryDropDown = '';

            if(countryFlag != '') {
                var flag = countryFlag;
                countryDropDown += '<a class="flag-imgs" href="#" data-toggle="dropdown" aria-expanded="false">';
                countryDropDown += '<img src="'+flag+'" alt="imgs">';
                countryDropDown += '</a>';
            }

            countryDropDown += '<ul class="dropdown-menu new-flgsdrop" x-placement="bottom-start" style="position: absolute; transform: translate3d(30px, 47px, 0px); top: 0px; left: 0px; will-change: transform;">';
            if(allCountries.length != 0) {
                $.each(allCountries, function (key, countryData) {

                    countryDropDown += '<li>';
                    countryDropDown += '<a href="javascript:void(0)" class="changeCountry">';
                    countryDropDown += '<img src="' + countryData.flag + '" alt="imgs">';
                    countryDropDown += countryData.name;
                    countryDropDown += '</a>';
                    countryDropDown += '<input type="hidden" name="country_id" value="' + countryData.id + '">';
                    countryDropDown += '</li>';

                });
                countryDropDown += '</ul>';

                $('#countryDropDown').html(countryDropDown);
            }

        }
    }

    function getSearchAreaHtml(allCities,cityId,city,country)
    {
        var cityBox = '';

        cityBox += '<select>';
        if(allCities.length != 0) {
            $.each(allCities, function (key, cityData) {

                if (cityData.id == cityId) {
                    cityBox += '<option value="' + cityData.id + '" selected>' + cityData.name + '</option>';
                }
                else {
                    cityBox += '<option value="' + cityData.id + '"  >' + cityData.name + '</option>';
                }

            });
        }
        else{

            cityBox += '<option value=""  ></option>';
        }
        cityBox += '</select>';

        $('.citySelectBox').html(cityBox);
        if(city != null && country != null) {
            $('.search-here').attr('placeholder', city + ',' + country);
        }
        else if(city == null && country != null){
            $('.search-here').attr('placeholder', country);
        }
        else if(city != null && country == null){
            $('.search-here').attr('placeholder', city );
        }
        else{
            $('.search-here').attr('placeholder', 'Type any location to search');
        }

    }

    function getServiceHtml(services)
    {
        if(services.length != 0) {
            $.each(services, function (key, serviceRecords) {

                servicePortion += '<div class="col-lg-2 col-md-3 col-sm-6 col-12">';
                servicePortion += '<div class="services-img-main">';
                servicePortion += '<span class="tailer-img">';
                servicePortion += '<img src="' + serviceRecords.image + '" alt="no img">';
                servicePortion += '</span>';
                servicePortion += '<span class="tailer-text">';
                servicePortion += '<a  href="' + serviceRecords.route + '">';
                servicePortion += serviceRecords.name;
                servicePortion += '</a>';
                servicePortion += '<span>Show All (' + serviceRecords.count + ')</span>';
                servicePortion += '</span></div></div>';

            });
        }
        else{
            servicePortion = '<h3>No Records to Display.</h3>';
        }

        $('#servicePortion').html(servicePortion);
    }

    function getCityHtml(cities)
    {
        if(cities.length != 0) {

            $.each(cities, function (key, cityRecords) {
//console.log(cityRecords);
                if (key == 0) {

                    firstCityPortion += '<div class="united-state-img">';
                    if (cityRecords.image != '') {
                        firstCityPortion += '<img src="' + cityRecords.image + '" alt="no img">';
                    }
                    else {
                        firstCityPortion += '<img src="" alt="no img">';
                    }
                    firstCityPortion += '<div class="img-content">';
                    if (cityRecords.name) {
                        firstCityPortion += '<span class="state-text">' + cityRecords.name + '</span>';
                    }
                    else {
                        firstCityPortion += '<span class="state-text"></span>';
                    }
                    otherCityPortion += '<span class="state-loc">' + cityRecords.adds_count;
                    otherCityPortion += '<a href="' + cityRecords.add_route + '">Adds</a>';
                    otherCityPortion += ',' + cityRecords.business_count + '<a href="' + cityRecords.business_route + '">Businesses</a>';
                    otherCityPortion += ',' + cityRecords.services_count + '<a href="' + cityRecords.service_route + '">Services</a>';
                    otherCityPortion += '</span>';
                    firstCityPortion += '</div></div>';

                    $('#first_city').html(firstCityPortion);
                }
                else {
                    otherCityPortion += '<div class="col-sm-6 col-12">';
                    otherCityPortion += '<div class="united-state-img">';
                    otherCityPortion += '<img src="' + cityRecords.image + '" alt="no img">';
                    otherCityPortion += '<div class="img-content">';
                    otherCityPortion += '<span class="state-text">' + cityRecords.name + '</span>';
                    otherCityPortion += '<span class="state-loc">' + cityRecords.adds_count;
                    otherCityPortion += '<a href="' + cityRecords.add_route + '">Adds</a>';
                    otherCityPortion += ',' + cityRecords.business_count + '<a href="' + cityRecords.business_route + '">Businesses</a>';
                    otherCityPortion += ',' + cityRecords.services_count + '<a href="' + cityRecords.service_route + '">Services</a>';
                    otherCityPortion += '</span>';
                    otherCityPortion += '</div>';
                    otherCityPortion += '</div>';
                    otherCityPortion += '</div>';
                }

            });
            $('#other_city').html(otherCityPortion);
        }
        else{
            firstCityPortion = '';
            otherCityPortion = '';
            $('#first_city').html(firstCityPortion);
            $('#other_city').html(otherCityPortion);
        }

    }
</script>

<script src="{{asset('main-admin/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('main-admin/js/select2.full.min.js')}}"></script>

<script src="{{asset('main-assets/js/block_ui.min.js')}}"></script>

