<script>

    jsonForMapAdd = [];
    flagMapAdd = 0;
    zoomAdd = 5;
    lat_add = "";
    lng_add = "";
    var markers_add = [];

    function loadScriptAdd() {

        alert('123');
        console.log(jsonForMapAdd);

        if (flagMapAdd == 1) {
            return;
        }

        @if(app('request')->input('country_id') != "" && (empty(app('request')->input('city_id')) || app('request')->input('city_id') == "") && (empty(app('request')->input('search_location')) || app('request')->input('search_location') == ''))

            zoomAdd = 5;


        lat_add = parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCountry::find(app('request')->input('country_id'))->name)->lat}});
        lng_add = parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCountry::find(app('request')->input('country_id'))->name)->lng}});


        @elseif((empty(app('request')->input('country_id')) || app('request')->input('country_id') == "") && app('request')->input('city_id') != "" && (empty(app('request')->input('search_location')) || app('request')->input('search_location') == ''))

            zoomAdd = 1;


        lat_add = parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCity::find(app('request')->input('city_id'))->name)->lat}});
        lng_add = parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCity::find(app('request')->input('city_id'))->name)->lng}});


        @elseif((empty(app('request')->input('country_id')) || app('request')->input('country_id') == "") && (empty(app('request')->input('city_id')) || app('request')->input('city_id') == "") && app('request')->input('search_location') != '')

            zoomAdd = 7;

        lat_add = parseFloat({{\App\Helpers\MapHelper::cityLatLong(app('request')->input('search_location'))->lat}});
        lng_add = parseFloat({{\App\Helpers\MapHelper::cityLatLong(app('request')->input('search_location'))->lng}});




        @endif


        // var myKey = "AIzaSyBuUN0YrQ-AAXx0SHcea3nN_aD25M28AGw";
        // var script = document.createElement('script');
        //script.type = 'text/javascript';
        //string = "hey it works";   //////////// here take the coordinates
        //   script.src = "http://maps.googleapis.com/maps/api/js?key="+myKey+"&js?sensor=false&extn=.js";
        // document.body.appendChild(script);


        //setMarkers(jsonForMap);


        flagMapAdd = 1;


    }

    var mapBusinessListing = new google.maps.Map(document.getElementById('map_add'), {

        zoom: zoomAdd,

        maxZoom: 21,

        minZoom: 1,

        streetViewControl: false,

        center: new google.maps.LatLng(parseFloat(lat_add), parseFloat(lng_add)),

        mapTypeId: google.maps.MapTypeId.ROADMAP

    });
    function check(value, miniDiv) {
        document.getElementById(miniDiv).style.maxHeight = "auto";
        document.getElementById(miniDiv).style.display = "block";
        document.getElementById(value).style.display = 'block';
        document.getElementById(value).style.display = 'block';
        document.getElementById(miniDiv).removeAttribute("data-target");
    }


    function mousehoverAdd(value, flag) {

        console.log(document.getElementById('content_' + value));
        if (flag == "in") {
            document.getElementById('content_' + value).style.border = "2px solid rgb(251, 57, 125)";
        } else if (flag == "out") {
            document.getElementById('content_' + value).style.border = "0px solid red";
        }
    }


</script>



<script>

function adsListingHtml(data) {


    businessHtml = '';

    if (data.all_adds.length == 0) {
    return `<p>No Record Found</p>`;
    }


    contentHtml = '';
//    popupHtml = '';


    for (i = 0; i < data.all_adds.length; i++) {
        stars = data.all_adds[i].stars_html;
        businessLink = "{{url('add-detail')}}" + '/' + data.all_adds[i].add_id;
        var popUpId = "popup_" + data.all_adds[i].add_id;

        jsonForMapAdd.push({


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
            <div class="listing-in-main" onmouseout="mousehoverAdd('` + data.all_adds[i].add_id + `','out')" onmouseover="mousehoverAdd('` + data.all_adds[i].add_id + `','in')">

                <div class="listing3-img" style="background: url(` + data.all_adds[i].profile_image + `) no-repeat center;    background-size: cover;">
                </div>
                <div class="listing3-right">
                    <div class="clearfix" style="margin-bottom: 10px;">
                                            <span class="beauty-spa-2">
                                                <i class="fa fa-map-marker"aria-hidden="true"></i>
                                                ` + countryAndCity + `
                                            </span>
                        ` + data.all_adds[i].created_by_status_html + `
                        <span class="established-com"style='margin-right:10px;font-size:11px;'>` + data.all_adds[i].founded_in + `</span>


                    </div>
                    <div class="parlor-left">
                        <a class="listing2-parlour" href="` + data.all_adds[i].add_detail_url + `">` + data.all_adds[i].title + `</a>
                        <p class="listing3-para">` + data.all_adds[i].description + `</p>

                        <ul class="view-like-ul">
                            <li><span>` + data.all_adds[i].reviews_avg + `</span></li>
                            <li> ` + data.all_adds[i].approve_html + `</li>
                            <li ><i class="fas fa-clock"></i>` + data.all_adds[i].timing_status + `</li>
                            <li  >
                                ` + data.all_adds[i].rate_html + `
                            </li>
                        </ul>
                    </div>
                    <div class="parlour-right">
                        <a href="#" class="save-or-like"><i class="fas fa-mobile-alt"></i> ` + data.all_adds[i].phone + `</a>
                        <a href="#" class="save-or-like"><i class="fas fa-envelope"></i> ` + data.all_adds[i].email + `</a>
                        <a href="#" class="save-or-like"><i class="fab fa-pagelines"></i> ` + data.all_adds[i].website + `</a>
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

$(document).ready(function(){

    $("#ads_filter_search_form").submit(function (e) {
        e.preventDefault();
        var formDataString = $("#ads_filter_search_form").serialize() + "&" + $("#ads_filter_sidebar_form").serialize();

        businessUrl = "{{route('user.front-adds.data')}}?" + formDataString;

        businessHtml = document.getElementById('business-data');
        businessHtml.innerHTML = 'Loading...';
        $.ajax({
            url: businessUrl, success: function (result) {
                businessHtml.innerHTML = adsListingHtml(result);
                console.log(adsListingHtml(result));
                setMarkers(jsonForMapAdd);
            }
        });
    });

    @if($data["listing_type"] == "Classified")
            $("#ads_filter_search_form").submit();
    @endif
})

function setMarkersAdd(locObj) {
    deleteMarkersAdd();
    $.each(locObj, function (key, loc) {
        //Create marker
        var location = {lat: loc.lat, lng: loc.lng}
        addMarkerAdd(location, loc.info);
    });
    //showMarkers();
}

// Adds a marker to the map and push to the array.
function addMarkerAdd(location, info) {

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
    function setMapOnAllAdd(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
        console.log("testingafter", markers);
    }

// Removes the markers from the map, but keeps them in the array.
    function clearMarkersAdd() {
        setMapOnAllAdd(null);
    }

// Shows any markers currently in the array.
    function showMarkersAdd() {
        setMapOnAllAdd(mapBusinessListing);
    }

// Deletes all markers in the array by removing references to them.
    function deleteMarkersAdd() {
        jsonForMap = [];
        clearMarkersAdd();
        markers = [];
    }



</script>