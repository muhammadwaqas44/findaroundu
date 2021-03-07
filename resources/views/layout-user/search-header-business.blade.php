<div class="fix-header2">
    <div class="custom-container">
        <form id="business_filter_search_form">
            <input type="hidden" name="listing_type" value="Business Directory">
            <input type="hidden" name="city_id" value="{{$data["city_id"]}}">
            <input type="hidden" name="search_location" value="{{$data["search_location"]}}">
            <input type="hidden" name="search" value="{{$data["keyword"]}}">
            <input type="hidden" name="available_now" value="">
            <input type="hidden" name="posted_by_me" value="">
            <input type="hidden" name="sort_by" value="">
            <input type="hidden" name="type" value="">
            <input type="hidden" name="near_me" value="">
            <input type="hidden" name="lat" value="">
            <input type="hidden" name="lng" value="">
        </form>
        <ul class="range-ul">
            <li>
                <a class="headFilterBtn" href="javascript:void(0)" onclick="submitFunction('business_filter_search_form', 'available_now', 'available', null)"><i class="far fa-clock"></i>Open Now</a>
            </li>
            <li>
                <a class="near_by_me_business_dropdown" href="javascript:void(0)"><i class="fas fa-map-marker-alt"></i> Near Me</a>
                <ul class="dropdown-menu">
                    <li>
                        <div id="near_me_business_slider">
                            <div id="near_me_business_handle" class="ui-slider-handle" ></div>
                            <br>
                            <button class="apply_business_near_me_btn">Apply</button>
                        </div>
                    </li>

                </ul>
            </li>



            @if(Auth::check())
                <li>
                    <a class="headFilterBtn" href="javascript:void(0)" onclick="submitFunction('business_filter_search_form', 'posted_by_me', 'me', null)">
                        Posted By Me
                    </a>
                </li>
            @endif
            <li class="dropdown">
                <a href="#" type="button" data-toggle="dropdown"><i class="fas fa-bars"></i> <span>Sort By</span></a>
                <ul class="dropdown-menu menu-drop3">
                    <li>
                        <span class="icons-left"><i class="far fa-calendar-alt" title="Sort by date"></i></span>
                        <div class="orderby-item">
                            <label class="child_selected" onclick="dropdownSubmitFunction('business_filter_search_form', 'sort_by', 'newer', null)">
                                Newer
                            </label>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <label class="child_selected" onclick="dropdownSubmitFunction('business_filter_search_form', 'sort_by', 'older', null)">
                                Older
                            </label>
                        </div>
                    </li>
                    <li>
                        <span class="icons-left"><i class="fas fa-dollar-sign" title="Sort by Price"></i></span>
                        <div class="orderby-item">
                            <label class="child_selected" onclick="dropdownSubmitFunction('business_filter_search_form', 'sort_by', 'a-z',null)">
                                A-Z
                            </label>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <label class="child_selected" onclick="dropdownSubmitFunction('business_filter_search_form', 'sort_by', 'z-a',null)">
                                Z-A
                            </label>
                        </div>
                    </li>
                    <li>
                        <span class="icons-left"><i class="fas fa-dollar-sign" title="Sort by Price"></i></span>
                        <div class="orderby-item">
                            <label class="child_selected" onclick="dropdownSubmitFunction('business_filter_search_form', 'sort_by', 'highest-lowest','hourly')">
                                Highest-Lowest (Hourly)
                            </label>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <label class="child_selected" onclick="dropdownSubmitFunction('business_filter_search_form', 'sort_by', 'highest-lowest','project')">
                                Highest-Lowest (Project)
                            </label>
                        </div>
                    </li>
                    <li>
                        <span class="icons-left"><i class="fas fa-dollar-sign" title="Sort by Price"></i></span>
                        <div class="orderby-item">
                            <label class="child_selected" onclick="dropdownSubmitFunction('business_filter_search_form', 'sort_by', 'lowest-highest','hourly')">
                                Lowest-Highest (Hourly)
                            </label>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <label class="child_selected" onclick="dropdownSubmitFunction('business_filter_search_form', 'sort_by', 'lowest-highest','project')">
                                Lowest-Highest (Project)
                            </label>
                        </div>
                    </li>
                </ul>
            </li>
            <li><a href="{{route('user.front-business')}}" style="background: #07f0ff;"><i class="fas fa-redo"></i></a></li>
            <li><a href="javascript:void(0)"><i class="fas fa-list-ul"></i></a></li>
            <li><a href="javascript:void(0)"><i class="fas fa-th-large"></i></a></li>
        </ul>
        <a href="javascript:void(0)" onclick="loadScript()" type="button" data-toggle="dropdown"
           class="show-map dropdown headFilterBtn">Show Map <i
                class="fas fa-map-signs"></i></a>

    </div>
</div>


<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    /* The popup bubble styling. */
    .popup-bubble {
        /* Position the bubble centred-above its parent. */
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, -100%);
        /* Style the bubble. */
        background-color: white;
        padding: 5px;
        border-radius: 5px;
        font-family: sans-serif;
        overflow-y: auto;
        max-height: 60px;
        box-shadow: 0px 2px 10px 1px rgba(0, 0, 0, 0.5);
    }

    /* The parent of the bubble. A zero-height div at the top of the tip. */
    .popup-bubble-anchor {
        /* Position the div a fixed distance above the tip. */
        position: absolute;
        width: 100%;
        bottom: /* TIP_HEIGHT= */ 8px;
        left: 0;
    }

    /* This element draws the tip. */
    .popup-bubble-anchor::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        /* Center the tip horizontally. */
        transform: translate(-50%, 0);
        /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
        width: 0;
        height: 0;
        /* The tip is 8px high, and 12px wide. */
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: /* TIP_HEIGHT= */ 8px solid white;
    }

    /* JavaScript will position this div at the bottom of the popup tip. */
    .popup-container {
        cursor: auto;
        height: 0;
        position: absolute;
        /* The max width of the info window. */
        width: 200px;
    }
</style>


<script>
    function initialize() {
        geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var mapOptions = {
            zoom: 8,
            center: latlng
        }
        map = new google.maps.Map(document.getElementById('map'), mapOptions);
    }

</script>

<script>
    $( function() {
        var handle = $( "#near_me_business_handle" );
        $( "#near_me_business_slider" ).slider({

            min: 1,
            max: 10,
            step: 1,

            create: function() {
                handle.text( $( this ).slider( "value" ) );
            },
            slide: function( event, ui ) {
                handle.text( ui.value );
            }
        });
    } );


    var country = '';
    var state = '';
    var city = '';
    var address = '';
    var slider_value = '';

    $('.apply_business_near_me_btn').click(function(){

//        alert('came_here');
        slider_value = $(this).siblings('#near_me_business_handle').text();
        navigator.geolocation.getCurrentPosition(getCurrentAddress);

    });

    $('.near_by_me_business_dropdown').click(function(){

        $(this).next('ul').toggle();

    });



    function getCurrentAddress(position)
    {
        var GEOCODING = 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyAmcXGV-K2DIGzcf435S_I5RbcW7JT5qPQ&latlng=' + position.coords.latitude + '%2C' + position.coords.longitude + '&language=en';

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


            });

            var inputName1 = $('#business_filter_search_form').find("[name=lat]");
            inputName1.val(position.coords.latitude);

            var inputName2 = $('#business_filter_search_form').find("[name=lng]");
            inputName2.val(position.coords.longitude);
//
            dropdownSubmitFunction('business_filter_search_form', 'near_me',slider_value ,null);
            $(this).parents('ul').toggle();


        });
    }
</script>




