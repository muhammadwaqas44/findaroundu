

<script>


    jsonForMap = [];
    flagMap = 0;
    zoom = 5;
    lat = "";
    lng = "";
    var markers = [];


    $(document).ready(function () {



        var mapBusinessListing = new google.maps.Map(document.getElementById('map'), {

            zoom: zoom,

            maxZoom: 21,

            minZoom: 1,

            streetViewControl: false,

            center: new google.maps.LatLng(lat, lng),

            mapTypeId: google.maps.MapTypeId.ROADMAP

        });










        $(".child_selected").click(function (e) {
            var clickText = $(this).text();
            var parentContainer = $(this).parents("li.dropdown").find("[data-toggle=dropdown]");
            if (!parentContainer.hasClass("filter_active")) {
                parentContainer.addClass("filter_active");
            }
            parentContainer.find("span").text(clickText);
        });

        $(".headFilterBtn").click(function (e) {
            $(this).toggleClass("filter_active");
        });

        $("#business_filter_search_form").submit(function (e) {
            e.preventDefault();
            var formDataString = $("#business_filter_search_form").serialize() + "&" + $("#business_filter_sidebar_form").serialize();

            businessUrl = "{{route('user.front-business.data')}}?" + formDataString;

            businessHtml = document.getElementById('business-data');
            businessHtml.innerHTML = 'Loading...'
            $.ajax({
                url: businessUrl, success: function (result) {
                    businessHtml.innerHTML = bsinessListingHtml(result);
                    setMarkers(jsonForMap);


                }
            });
        });

        @if($data["listing_type"] == "Business Directory")
            $("#business_filter_search_form").submit();
        @endif

        $("#ads_filter_search_form").submit(function (e) {
            e.preventDefault();
            var formDataString = $("#ads_filter_search_form").serialize() + "&" + $("#ads_filter_sidebar_form").serialize();

            businessUrl = "{{route('user.front-adds.data')}}?" + formDataString;

            businessHtml = document.getElementById('business-data');
            businessHtml.innerHTML = 'Loading...';
            $.ajax({
                url: businessUrl, success: function (result) {
                    businessHtml.innerHTML = adsListingHtml(result);
                    console.log(jsonForMap);
                    setMarkers(jsonForMap);


                }
            });
        });

        @if($data["listing_type"] == "Classified")
            $("#ads_filter_search_form").submit();
        @endif



        function setMarkers(locObj) {
            deleteMarkers();
            $.each(locObj, function (key, loc) {
                //Create marker
                var location = {lat: loc.lat, lng: loc.lng}
                addMarker(location, loc.info);
            });
            //showMarkers();
        }

        // Adds a marker to the map and push to the array.
        function addMarker(location, info) {

            var marker = new google.maps.Marker({
                position: location,
                map: mapBusinessListing
            });
            markers.push(marker);

            var infowindow = new google.maps.InfoWindow();
            infowindow.setContent('<span style="color:#EA2E49;font-weight:bold">' + info + '</span>');
            infowindow.open(mapBusinessListing, marker);

            //Attach click listener to marker
            marker.addListener('click', function () {
                //    infowindow.setContent( info);
                //        infowindow.setContent("hello " + info);
                infowindow.open(mapBusinessListing, this);
            });
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
            console.log("testingafter", markers);
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Shows any markers currently in the array.
        function showMarkers() {
            setMapOnAll(mapBusinessListing);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            jsonForMap = [];
            clearMarkers();
            markers = [];
        }
    });




    function loadScript(result) {


        console.log(jsonForMap);
        if (flagMap == 1) {
            return;
        }

        @if(app('request')->input('country_id') != "" && (empty(app('request')->input('city_id')) || app('request')->input('city_id') == "") && (empty(app('request')->input('search_location')) || app('request')->input('search_location') == ''))

            zoom = 5;


        lat = parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCountry::find(app('request')->input('country_id'))->name)->lat}});
        lng = parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCountry::find(app('request')->input('country_id'))->name)->lng}});


        @elseif((empty(app('request')->input('country_id')) || app('request')->input('country_id') == "") && app('request')->input('city_id') != "" && (empty(app('request')->input('search_location')) || app('request')->input('search_location') == ''))

            zoom = 1;


        lat = parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCity::find(app('request')->input('city_id'))->name)->lat}});
        lng = parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCity::find(app('request')->input('city_id'))->name)->lng}});


        @elseif((empty(app('request')->input('country_id')) || app('request')->input('country_id') == "") && (empty(app('request')->input('city_id')) || app('request')->input('city_id') == "") && app('request')->input('search_location') != '')

            zoom = 7;

        lat = parseFloat({{\App\Helpers\MapHelper::cityLatLong(app('request')->input('search_location'))->lat}});
        lng = parseFloat({{\App\Helpers\MapHelper::cityLatLong(app('request')->input('search_location'))->lng}});




        @endif


        // var myKey = "AIzaSyBuUN0YrQ-AAXx0SHcea3nN_aD25M28AGw";
        // var script = document.createElement('script');
        //script.type = 'text/javascript';
        //string = "hey it works";   //////////// here take the coordinates
        //   script.src = "http://maps.googleapis.com/maps/api/js?key="+myKey+"&js?sensor=false&extn=.js";
        // document.body.appendChild(script);


        //setMarkers(jsonForMap);


        flagMap = 1;


    }

    function mousehover(value, flag) {

        if (flag == "in") {
            document.getElementById('content_' + value).style.border = "2px solid rgb(251, 57, 125)";
        } else if (flag == "out") {
            document.getElementById('content_' + value).style.border = "0px solid red";
        }
    }


    function bsinessListingHtml(data) {


        businessHtml = '';

        if (data.all_business.length == 0) {
            return `<p>No Record Found</p>`;
        }


        contentHtml = '';
        popupHtml = '';


        for (i = 0; i < data.all_business.length; i++) {
            stars = data.all_business[i].stars_html;
            businessLink = "{{url('business-detail')}}" + '/' + data.all_business[i].business_id;
            var popUpId = "popup_" + data.all_business[i].business_id;

            jsonForMap.push({


                "info": `<div id ='content_` + data.all_business[i].business_id + `' style = 'max-height: max-content;z-index:10000'
                       onclick = "check('content_` + data.all_business[i].business_id + `','popup_` + data.all_business[i].business_id + `')" >
                       ` + data.all_business[i].price_type + `
<div id = 'popup_` + data.all_business[i].business_id + `' style = 'display: none;' >
                            <img style = 'width:125px;height:125px' src = '` + data.all_business[i].profile_image + `' >
                            <div id = 'bodyContent' >
                                <p ><b ><a href = '` + businessLink + `' >` + data.all_business[i].title + `</a ></b >
                            </div >
                             ` + data.all_business[i].stars + `
                            </div >
                    </div >
</div>`,
                lat: parseFloat(data.all_business[i].lat),
                lng: parseFloat(data.all_business[i].long)
            });

            businessLink = "{{url('business-detail')}}" + '/' + data.all_business[i].business_id;

            contentHtml = contentHtml + `<div id ='content_` + data.all_business[i].business_id + `' style = 'max-height: max-content;z-index:10000'
                       onclick = "check('content_` + data.all_business[i].business_id + `','popup_` + data.all_business[i].business_id + `')" >
                       ` + data.all_business[i].price_type + `
<div id = 'popup_` + data.all_business[i].business_id + `' style = 'display: none;' >
                            <img style = 'width:125px;height:125px' src = '` + data.all_business[i].profile_image + `' >
                            <div id = 'bodyContent' >
                                <p ><b ><a href = '` + businessLink + `' >` + data.all_business[i].title + `</a ></b >
                            </div >
                             ` + data.all_business[i].stars + `
                            </div >
                    </div >
</div>`;

            countryAndCity = '';
            if (data.all_business[i].verify == false) {
                countryAndCity = `<a href="` + data.all_business[i].location_url + `">` + data.all_business[i].location + `</a>`;
            } else {
                countryAndCity = `<a href="` + data.all_business[i].country_url + `">` + data.all_business[i].country_name + `</a>,
            <a href="` + data.all_business[i].city_url + `">` + data.all_business[i].city_name + `</a>`
            }


            businessHtml = businessHtml + `
             <div class="row">
                <div class="col-12">
                   <div class="listing-in-main" onmouseout="mousehover('` + data.all_business[i].business_id + `','out')" onmouseover="mousehover('` + data.all_business[i].business_id + `','in')">

                                <div class="listing3-img" style="background: url(` + data.all_business[i].profile_image + `) no-repeat center;    background-size: cover;">
                                </div>
                                <div class="listing3-right">
                                    <div class="clearfix" style="margin-bottom: 10px;">
                                        <span class="beauty-spa-2">
                                            <i class="fa fa-map-marker"aria-hidden="true"></i>
                                            ` + countryAndCity + `
                                        </span>
                                         ` + data.all_business[i].created_by_status_html + `
                                        <span class="established-com"style='margin-right:10px;font-size:11px;'>` + data.all_business[i].founded_in + `</span>


                                    </div>
                                    <div class="parlor-left">
                                        <a class="listing2-parlour" href="` + data.all_business[i].business_detail_url + `">` + data.all_business[i].title + `</a>
                                        <p class="listing3-para">` + data.all_business[i].description + `</p>
                                        ` + data.all_business[i].tags_html + `
                                        <ul class="view-like-ul">
                                            <li><span>` + data.all_business[i].reviews_avg + `</span></li>
                                            <li> ` + data.all_business[i].approve_html + `</li>
                                            <li ><i class="fas fa-clock"></i>` + data.all_business[i].timing_status + `</li>
                                            <li  >
                                                ` + data.all_business[i].rate_html + `
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="parlour-right">
																	<a href="#" class="save-or-like"><i class="fas fa-mobile-alt"></i> ` + data.all_business[i].phone + `</a>
																	<a href="#" class="save-or-like"><i class="fas fa-envelope"></i> ` + data.all_business[i].email + `</a>
																	<a href="#" class="save-or-like"><i class="fab fa-pagelines"></i> ` + data.all_business[i].website + `</a>
																	<a href="#" class="save-or-like"><i class="fas fa-heart"></i> Portfolio</a>
																	<a href="#" class="save-or-like"><i class="fas fa-shield-alt"></i> ` + data.all_business[i].services + `</a>
																	<a href="#" class="save-or-like"><i class="far fa-calendar-alt"></i> ` + data.all_business[i].employees + `</a>
																	<a href="#" class="save-or-like"><i class="fas fa-globe-americas"></i> Report this Ad</a>
																	<a href="#" class="save-or-like"><i class="fas fa-globe-americas"></i> Book an Appointment</a>
																	<span class="send-msg-btn">
																		<a href="#">Send Message</a>
																	</span>
																</div>
                                </div>

                   </div>
                </div>
             </div>`;
        }

        return businessHtml;

    }


    function adsListingHtml(data) {


        businessHtml = '';

        if (data.all_adds.length == 0) {
            return `<p>No Record Found</p>`;
        }


        contentHtml = '';
        popupHtml = '';


        for (i = 0; i < data.all_adds.length; i++) {
            stars = data.all_adds[i].stars_html;
            businessLink = "{{url('add-detail')}}" + '/' + data.all_adds[i].add_id;
            var popUpId = "popup_" + data.all_adds[i].add_id;

            jsonForMap.push({


                "info": `<div id ='content_` + data.all_adds[i].add_id + `' style = 'max-height: max-content;z-index:10000'
                       onclick = "check('content_` + data.all_adds[i].add_id + `','popup_` + data.all_adds[i].add_id + `')" >
                       ` + data.all_adds[i].price_type + `
<div id = 'popup_` + data.all_adds[i].add_id + `' style = 'display: none;' >
                            <img style = 'width:125px;height:125px' src = '` + data.all_adds[i].profile_image + `' >
                            <div id = 'bodyContent' >
                                <p ><b ><a href = '` + businessLink + `' >` + data.all_adds[i].title + `</a ></b >
                            </div >
                             ` + data.all_adds[i].stars + `
                            </div >
                    </div >
</div>`,
                lat: parseFloat(data.all_adds[i].lat),
                lng: parseFloat(data.all_adds[i].long)
            });

            businessLink = "{{url('add-detail')}}" + '/' + data.all_adds[i].add_id;

            contentHtml = contentHtml + `<div id ='content_` + data.all_adds[i].add_id + `' style = 'max-height: max-content;z-index:10000'
                       onclick = "check('content_` + data.all_adds[i].add_id + `','popup_` + data.all_adds[i].add_id + `')" >
                       ` + data.all_adds[i].price_type + `
<div id = 'popup_` + data.all_adds[i].add_id + `' style = 'display: none;' >
                            <img style = 'width:125px;height:125px' src = '` + data.all_adds[i].profile_image + `' >
                            <div id = 'bodyContent' >
                                <p ><b ><a href = '` + businessLink + `' >` + data.all_adds[i].title + `</a ></b >
                            </div >
                             ` + data.all_adds[i].stars + `
                            </div >
                    </div >
</div>`;

            countryAndCity = '';
            if (data.all_adds[i].verify == false) {
                countryAndCity = `<a href="` + data.all_adds[i].location_url + `">` + data.all_adds[i].location + `</a>`;
            } else {
                countryAndCity = `<a href="` + data.all_adds[i].country_url + `">` + data.all_adds[i].country_name + `</a>,
            <a href="` + data.all_adds[i].city_url + `">` + data.all_adds[i].city_name + `</a>`
            }


            businessHtml = businessHtml + `
             <div class="row">
                <div class="col-12">
                   <div class="listing-in-main" onmouseout="mousehover('` + data.all_adds[i].add_id + `','out')" onmouseover="mousehover('` + data.all_adds[i].add_id + `','in')">

                                <div class="listing3-img" style="background: url(` + data.all_adds[i].profile_image + `) no-repeat center;    background-size: cover;">
                                </div>
                                <div class="listing3-right">
                                    <div class="clearfix" style="margin-bottom: 10px;">
                                        <span class="beauty-spa-2">
                                            <i class="fa fa-map-marker"aria-hidden="true"></i>
                                            ` + countryAndCity + `
                                        </span>

                                    </div>
                                    <div class="parlor-left">
                                        <a class="listing2-parlour" href="` + data.all_adds[i].add_detail_url + `">` + data.all_adds[i].title + `</a>
                                        <p class="listing3-para">` + data.all_adds[i].description + `</p>

                                        <ul class="view-like-ul">
                                            <li><span>` + data.all_adds[i].reviews_avg + `</span></li>
                                            <li> ` + data.all_adds[i].approve_html + `</li>
                                            <li  >
                                                ` + data.all_adds[i].rate_html + `
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="parlour-right">
																	<a href="#" class="save-or-like"><i class="fas fa-mobile-alt"></i> ` + data.all_adds[i].phone_number + `</a>
																	<a href="#" class="save-or-like"><i class="fas fa-globe-americas"></i> Report this Ad</a>
																	<a href="#" class="save-or-like"><i class="fas fa-globe-americas"></i> Book an Appointment</a>
																	<span class="send-msg-btn">
																		<a href="#">Send Message</a>
																	</span>
																</div>
                                </div>

                   </div>
                </div>
             </div>`;
        }

        return businessHtml;

    }

    {{--$(document).ready(function () {--}}
        {{--$(".child_selected").click(function (e) {--}}
            {{--var clickText = $(this).text();--}}
            {{--var parentContainer = $(this).parents("li.dropdown").find("[data-toggle=dropdown]");--}}
            {{--if (!parentContainer.hasClass("filter_active")) {--}}
                {{--parentContainer.addClass("filter_active");--}}
            {{--}--}}
            {{--parentContainer.find("span").text(clickText);--}}
        {{--});--}}

        {{--$(".headFilterBtn").click(function (e) {--}}
            {{--$(this).toggleClass("filter_active");--}}
        {{--});--}}

        {{--$("#business_filter_search_form").submit(function (e) {--}}
            {{--e.preventDefault();--}}
            {{--var formDataString = $("#business_filter_search_form").serialize() + "&" + $("#business_filter_sidebar_form").serialize();--}}

            {{--businessUrl = "{{route('user.front-business.data')}}?" + formDataString;--}}

            {{--businessHtml = document.getElementById('business-data');--}}
            {{--businessHtml.innerHTML = 'Loading...'--}}
            {{--$.ajax({--}}
                {{--url: businessUrl, success: function (result) {--}}
                    {{--businessHtml.innerHTML = bsinessListingHtml(result);--}}
                    {{--setMarkers(jsonForMap);--}}


                {{--}--}}
            {{--});--}}
        {{--});--}}

        {{--@if($data["listing_type"] == "Business Directory")--}}
            {{--$("#business_filter_search_form").submit();--}}
        {{--@endif--}}

        {{----}}
    {{--});--}}

    function submitFunction(formId, name, value, type) {
        var inputName = $("#" + formId).find("[name=" + name + "]");
        var inputType = $("#" + formId).find("[name=type]");
        if (inputName.val() == "") {
            inputName.val(value);
            inputType.val(type);
        } else {
            inputName.val("");
            inputType.val("");
        }
        $("#" + formId).submit();
    }

    function dropdownSubmitFunction(formId, name, value, type) {
        $("#" + formId).find("[name=" + name + "]").val(value);
        $("#" + formId).find("[name=type]").val(type);
        $("#" + formId).submit();
    }

    function formSubmitById(formId) {
        setTimeout(function () {
            $("#" + formId).submit();
        }, 200);
    }

    function check(value, miniDiv) {
        document.getElementById(miniDiv).style.maxHeight = "auto";
        document.getElementById(miniDiv).style.display = "block";
        document.getElementById(value).style.display = 'block';
        document.getElementById(value).style.display = 'block';
        document.getElementById(miniDiv).removeAttribute("data-target");
    }

</script>
