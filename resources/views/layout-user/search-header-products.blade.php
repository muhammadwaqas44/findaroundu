<div class="fix-header2">
    <div class="custom-container">
        <ul class="range-ul">
            <li class="dropdown">
                <a href="#" type="button" data-toggle="dropdown"><i class="fas fa-dollar-sign"></i> Price Range</a>
                <ul class="dropdown-menu menu-drop2">
                    <li>
                        <div class="bg-clr clearfix active-div">
                            <div class="leftdoller"><i class="fas fa-dollar-sign"></i></div>
                            <div class="righttext">Cheap</div>
                        </div>
                    </li>
                    <li>
                        <div class="bg-clr clearfix">
                            <div class="leftdoller"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="righttext">Moderate</div>
                        </div>
                    </li>
                    <li>
                        <div class="bg-clr clearfix">
                            <div class="leftdoller"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i
                                        class="fas fa-dollar-sign"></i></div>
                            <div class="righttext">Expensive</div>
                        </div>
                    </li>
                    <li>
                        <div class="bg-clr clearfix">
                            <div class="leftdoller"><i class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i><i
                                        class="fas fa-dollar-sign"></i><i class="fas fa-dollar-sign"></i></div>
                            <div class="righttext">Ultra</div>
                        </div>
                    </li>
                    <li><span class="reset"><i class="fas fa-power-off"></i> reset</span></li>
                </ul>


            </li>
            <li><a href="#"><i class="far fa-clock"></i> Open Now</a></li>
            <li><a href="#"><i class="fas fa-map-marker-alt"></i> Near Me</a></li>

            @if(Auth::check())
                @php
                    $postedByMeUrl = "";

                    if(!empty(app('request')->input('category_id')))
                    {
                    $postedByMeUrl = "&category_id=".app('request')->input('category_id');
                    }
                    if(!empty(app('request')->input('city_id')))
                    {
                    $postedByMeUrl = $postedByMeUrl . "&city_id=".app('request')->input('city_id');
                    }
                    if(!empty(app('request')->input('country_id')))
                    {
                    $postedByMeUrl = $postedByMeUrl . "&country_id=".app('request')->input('country_id');
                    }
                    if(!empty(app('request')->input('address')))
                    {
                    $postedByMeUrl = $postedByMeUrl . "&address=".app('request')->input('address');
                    }
                    if(!empty(app('request')->input('search')))
                    {
                    $postedByMeUrl = $postedByMeUrl . "&search=".app('request')->input('search');
                    }

                    //dd ($postedByMeUrl);

                @endphp
                <li>
                    <a href="{{url()->current()}}?posted_by=me{{$postedByMeUrl}}"  @if(app('request')->input('posted_by')== "me") style="border:1px solid #aaaaaa" @endif> Posted By Me</a>
                </li> @endif
            <li class="dropdown">
                <a href="#" type="button" data-toggle="dropdown"><i class="fas fa-bars"></i> Sort By</a>

                <ul class="dropdown-menu menu-drop3">
                    <li>
                        <span class="icons-left"><i class="far fa-calendar-alt" title="Sort by date"></i></span>
                        <div class="orderby-item">
                            <input type="radio" id="orderby_date_desc" name="search_orderby" value="date_desc">
                            <label for="orderby_date_desc">Newer</label>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <input type="radio" id="orderby_date_desc" name="search_orderby" value="date_desc">
                            <label for="orderby_date_desc">Older</label>
                        </div>
                    </li>
                    <li>
                        <span class="icons-left"><i class="fas fa-dollar-sign" title="Sort by Price"></i></span>
                        <div class="orderby-item">
                            <input type="radio" id="orderby_date_desc" name="search_orderby" value="date_desc">
                            <label for="orderby_date_desc">Lower</label>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <input type="radio" id="orderby_date_desc" name="search_orderby" value="date_desc">
                            <label for="orderby_date_desc">Higher</label>
                        </div>
                    </li>
                    <li>
                        <span class="icons-left"><i class="fas fa-location-arrow" title="Sort by distance"></i></span>
                        <div class="orderby-item">
                            <input type="radio" id="orderby_date_desc" name="search_orderby" value="date_desc">
                            <label for="orderby_date_desc">Nearer</label>
                        </div>
                        <span class="divider">or</span>
                        <div class="orderby-item">
                            <input type="radio" id="orderby_date_desc" name="search_orderby" value="date_desc">
                            <label for="orderby_date_desc">Further</label>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="show-menu-drop">More Filters <i class="fas fa-plus-circle"></i></a>
                <div class="menu-drop4">
                    <h2 class="amenities">Amenities</h2>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>

                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="check-box-div">
                        <label class="remember-me-btn">
                            <input type="checkbox">baby toilet<span></span>
                        </label>
                    </div>
                    <div class="margin-top">
                        <h2 class="amenities">Tags</h2>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beauity<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beauity<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beauity<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beauity<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">bar<span></span>
                            </label>
                        </div>
                        <div class="check-box-div">
                            <label class="remember-me-btn">
                                <input type="checkbox">beach<span></span>
                            </label>
                        </div>

                    </div>
                </div>
            </li>
            <li><a href="{{route('user.front-adds')}}"><i class="fas fa-redo"></i></a></li>

            <li><a href="{{route('user.create-product')}}">Post Products</a></li>

        </ul>
        <a href="#" type="button" data-toggle="dropdown" class="show-map dropdown">Show Map <i
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


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_KEY')}}&callback=initMap">
</script>




<script>    function initMap() {

        latLong = null;

        @if(!empty($data['all_products']['all_products']->first()))
            latLong = {lat: {{$data['all_products']['all_products']->first()->lat}}, lng:  {{$data['all_products']['all_products']->first()->long}}};
        @endif

            map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: latLong,
            clickableIcons: true,
            clickable: true,
            gestureHandling: 'cooperative',
        });


        @foreach($data['all_products']['all_products'] as $myDataAdd)


            marker = new google.maps.Marker({
            map: map,

            position: {lat: {{$myDataAdd->lat}}, lng: {{$myDataAdd->long}} }
        });

                @if($myDataAdd->reviews()->avg('rating') == 0 )
        var stars = `<span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>`;
                @elseif($myDataAdd->reviews()->avg('rating') >= 1 && $myDataAdd->reviews()->avg('rating') < 2)
        var stars = `<span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>`;
                @elseif($myDataAdd->reviews()->avg('rating') >= 2 && $myDataAdd->reviews()->avg('rating') < 3)
        var stars = `<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>`;

                @elseif($myDataAdd->reviews()->avg('rating') >= 3 && $myDataAdd->reviews()->avg('rating') < 4)
        var stars = `<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>`;
                @elseif($myDataAdd->reviews()->avg('rating') >= 4 && $myDataAdd->reviews()->avg('rating') < 5)
        var stars = '<span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span> <span class="fa fa-star"></span>';
                @elseif($myDataAdd->reviews()->avg('rating') == 5 )
        var stars = `<span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span><span class="fa fa-star checked"></span>`;
        @endif
            serviceLink = "{{route('user.front-services.detail',[$myDataAdd->id])}}";
        var contentString = `
                                <div id="content">
                                 <img style="width:125px;height:125px" src="{{$myDataAdd->profile_image}}">
                                    <div id="bodyContent">
                                        <p><b><a href="` + serviceLink + `">{{$myDataAdd->title}}</a></b>
                                    </div>
` + stars + `
                                </div>`;


        createInfoWindow(marker, contentString);


        @endforeach

            infowindow = new google.maps.InfoWindow();
        function createInfoWindow(marker, popupContent) {
            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(popupContent);
                infowindow.open(map, this);
            });
        }


    }</script>
