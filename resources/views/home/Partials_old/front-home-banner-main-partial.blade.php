<form method="get" action="{{route('user.front-services')}}">

    <div class="banner-main">
        <video autoplay muted loop id="myVideo">
            <source src="{{ asset('main-assets/vedio/vedio.mp4') }}" type="video/mp4">
        </video>
        <div class="custom-container">

            <span class="right-services">Connect With The Right Service Experts</span>
            <span class="find-busines">Find B2B & B2C business contact addresses, Phone number user ra</span>
            <div class="banner-slider">
                <ul id="flexiselDemo3">
                    @foreach($data['individual_popular'] as $popular)
                    <li>
                    <a href="{{route('user.front-services',['category_id' => $popular->id ])}}">   <div class="slider-hover">
                            <div class="doctor-main-hover">
                                    <span class="slider-img"><img src="{{$popular->icon_image}}"
                                                                  alt="no image"></span>
                                <span class="tutur-text">{{$popular->name}}</span>
                            </div>
                        </div>
                    </a>
                    </li>
                        @endforeach
                </ul>
            </div>
            <style>
                .location-input-banner2:before {
                    content: "";
                    font-weight: 600;
                    font-family: 'Font Awesome 5 Free';
                    position: absolute;
                    top: 50%;
                    left: 8px;
                    font-size: 20px;
                    color: #884cdf;
                    line-height: 20px;
                    margin-top: -10px;
                }
            </style>
            <ul class="banner-search-main">
                <li>
                    <div class="location-input-banner2">
                        <input type="search" id="tags" name="search" placeholder="KeyWord" class="banner-autocomplete">
                    </div>
                </li>
                <li>
                    <div class=" location-input-banner">
                        <input type="search" id="job_location" name="address" placeholder="Select Location"
                               class="select-category">
                        <button type="submit" class="btn btn-sm btn-danger message-btn">Search</button>
                    </div>
                </li>
            </ul>
        </div>


    </div>
</form>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuUN0YrQ-AAXx0SHcea3nN_aD25M28AGw&libraries=places&callback=initAutocomplete"
        async defer></script>
<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };
</script>


<script>
    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        $(function () {
            var input = document.getElementById("job_location");
            autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('job_location')),
                {types: ['geocode']});

        });





    }
</script>