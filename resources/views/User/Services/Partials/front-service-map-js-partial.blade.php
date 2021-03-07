<script>
    flagMap = 0;
    latLong = null;
    mapResult = null;

    function loadScript(result) {

        if (flagMap == 1) {
            return;
        }

        @if(app('request')->input('country_id') != "" && app('request')->input('city_id') == "" && app('request')->input('search_location') == '')
            zoom = 5;
        latLong = {
            lat: parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCountry::find(app('request')->input('country_id'))->name)->lat}}),
            lng: parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCountry::find(app('request')->input('country_id'))->name)->lng}})
        }

        @elseif(app('request')->input('country_id') == "" && app('request')->input('city_id') != "" && app('request')->input('search_location') == '')
            zoom = 7;
        latLong = {
            lat: parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCity::find(app('request')->input('city_id')))->lat}}),
            lng: parseFloat({{\App\Helpers\MapHelper::cityLatLong(\App\MainCity::find(app('request')->input('city_id')))->lng}})
        }

        @elseif(app('request')->input('country_id') == "" && app('request')->input('city_id') == "" && app('request')->input('search_location') != '')

            zoom = 7;
        latLong = {
            lat: parseFloat({{\App\Helpers\MapHelper::cityLatLong(app('request')->input('search_location'))->lat}}),
            lng: parseFloat({{\App\Helpers\MapHelper::cityLatLong(app('request')->input('search_location'))->lng}})
        }

        @else

        if (result.all_services.length != 0) {
            zoom = 4;
            latLong = {
                lat: parseFloat(result.all_services[0].lat),
                lng: parseFloat(result.all_services[0].long)
            }

        }

                @endif

        var myKey = "{{env('GOOGLE_KEY')}}";
        var script = document.createElement('script');
        script.type = 'text/javascript';
        string = "hey it works";   //////////// here take the coordinates
        script.src = "https://maps.googleapis.com/maps/api/js?key="+"{{env('GOOGLE_KEY')}}"+"&callback=initMap";

        document.body.appendChild(script);
        flagMap = 1;
    }


    function initMap() {


        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5,
            center: latLong,
            clickableIcons: true,
            clickable: true,
            gestureHandling: 'cooperative',
        });


        for (i = 0; i < mapResult.all_services.length; i++) {
            Popup = createPopupClass();

            popup = new Popup(
                new google.maps.LatLng(parseFloat(mapResult.all_services[i].lat), parseFloat(mapResult.all_services[i].long)),
                document.getElementById('content_' + mapResult.all_services[i].service_id)
            )
            ;
            popup.setMap(map);
            marker = new google.maps.Marker({
                map: map,
                position: {lat: parseFloat(mapResult.all_services[i].lat), lng: parseFloat(mapResult.all_services[i].long)}
            });

            var stars = mapResult.all_services[i].stars_html;
            serviceLink = "{{url('service-detail')}}" + '/' + mapResult.all_services[i].service_id;
            var popUpId = "popup_" + mapResult.all_services[i].service_id;
            var contentString = `
                    <div  id='` + popUpId + `'  >
                        <img style="width:125px;height:125px" src="` + mapResult.all_services[i].profile_image + `">
                        <div id="bodyContent">
                            <p><b><a href="` + serviceLink + `">` + mapResult.all_services[i].profile_image + `</a></b>
                        </div>
                        ` + stars + `
                    </div>`;
            createInfoWindow(marker, contentString);

        }


        infowindow = new google.maps.InfoWindow();
        function createInfoWindow(marker, popupContent) {
            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(popupContent);
                infowindow.open(map, this);
            });
        }


        function createPopupClass() {

            function Popup(position, content) {
                this.position = position;

                content.classList.add('popup-bubble');

                // This zero-height div is positioned at the bottom of the bubble.
                var bubbleAnchor = document.createElement('div');
                bubbleAnchor.classList.add('popup-bubble-anchor');
                bubbleAnchor.appendChild(content);

                // This zero-height div is positioned at the bottom of the tip.
                this.containerDiv = document.createElement('div');
                this.containerDiv.classList.add('popup-container');
                this.containerDiv.appendChild(bubbleAnchor);

                // Optionally stop clicks, etc., from bubbling up to the map.
                google.maps.OverlayView.preventMapHitsAndGesturesFrom(this.containerDiv);
            }

            // ES5 magic to extend google.maps.OverlayView.
            Popup.prototype = Object.create(google.maps.OverlayView.prototype);


            Popup.prototype.onAdd = function () {
                this.getPanes().floatPane.appendChild(this.containerDiv);
            };


            Popup.prototype.onRemove = function () {
                if (this.containerDiv.parentElement) {
                    this.containerDiv.parentElement.removeChild(this.containerDiv);
                }
            };


            Popup.prototype.draw = function () {
                var divPosition = this.getProjection().fromLatLngToDivPixel(this.position);

                // Hide the popup when it is far out of view.
                var display =
                    Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
                        'block' :
                        'none';

                if (display === 'block') {
                    this.containerDiv.style.left = divPosition.x + 'px';
                    this.containerDiv.style.top = divPosition.y + 'px';
                }
                if (this.containerDiv.style.display !== display) {
                    this.containerDiv.style.display = display;
                }
            };

            return Popup;
        }

    }


    function check(value, miniDiv) {
        document.getElementById(miniDiv).style.maxHeight = "auto";
        document.getElementById(miniDiv).style.display = "block";
        document.getElementById(value).style.display = 'block';
        document.getElementById(value).style.display = 'block';
        document.getElementById(miniDiv).removeAttribute("data-target");
    }




    function mousehover(value, flag) {


        if (flag == "in") {
            document.getElementById('content_' + value).style.border = "2px solid rgb(251, 57, 125)";
        } else if (flag == "out") {
            document.getElementById('content_' + value).style.border = "0px solid red";
        }
    }



</script>


<script>


    $(document).ready(function(){
        $("body").append(`<div id='for_content'></div>`);
        $("body").append(`<div id='for_popup'></div>`);
    });





    function bsinessListingHtml(data) {


        serviceHtml = '';

        if (data.all_services.length == 0) {
            return `<p>No Record Found</p>`;
        }


        contentHtmlToReplace = document.getElementById('for_content');
        popupHtmlToReplace = document.getElementById('for_popup');

        contentHtml = '';
        popupHtml = '';
        for (i = 0; i < data.all_services.length; i++) {

            serviceLink = "{{url('service-detail')}}" + '/' + data.all_services[i].service_id;

            contentHtml = contentHtml+`<div id ='content_`+data.all_services[i].service_id+`' style = 'max-height: max-content;z-index:10000'
                       onclick = "check('content_`+data.all_services[i].service_id+`','popup_`+data.all_services[i].service_id+`')" >
                       `+data.all_services[i].price_type+`
<div id = 'popup_`+data.all_services[i].service_id+`' style = 'display: none;' >
                            <img style = 'width:125px;height:125px' src = '`+data.all_services[i].profile_image+`' >
                            <div id = 'bodyContent' >
                                <p ><b ><a href = '`+serviceLink+`' >`+data.all_services[i].title+`</a ></b >
                            </div >
                             `+data.all_services[i].stars+`
                            </div >
                    </div >
</div>`;

countryAndCity = '';
            if(data.all_services[i].verify == false){
                countryAndCity = `<a href="` + data.all_services[i].location_url + `">`+  data.all_services[i].location +`</a>`;
            }else{
                countryAndCity =`<a href="` + data.all_services[i].country_url + `">` + data.all_services[i].country_name + `</a>,
            <a href="` + data.all_services[i].city_url + `">` + data.all_services[i].city_name + `</a>`
            }


            serviceHtml = serviceHtml + `
                         <div class="listing-2-lists" onmouseout="mousehover('` + data.all_services[i].service_id + `','out')" onmouseover="mousehover('` + data.all_services[i].service_id + `','in')">
                                <div class="listing2-img" style="background: url(` + data.all_services[i].profile_image + `) center;">
                                </div>
                                <div class="listing2-right">
                                    <div class="clearfix">
                                        <span class="beauty-spa-2">
                                            <i class="fa fa-map-marker"aria-hidden="true"></i>
                                            `+countryAndCity+`
                                        </span>
                                    </div>
                                    <a class="listing2-parlour" href="` + data.all_services[i].service_detail_url + `">` + data.all_services[i].title + `</a>
                                    <p class="listing2-para">` + data.all_services[i].description + `</p>
                                    <span class=" rating-count padding-top2  ">` + data.all_services[i].reviews_avg + `</span>` + data.all_services[i].approve_html + `
                                    <span class="beauty-spa2"><i class="fas fa-clock"></i>` + data.all_services[i].timing_status + `</span>
                                    <span class="prple-doller">
                                        ` + data.all_services[i].rate_html + `
                                    </span>
                                </div>
                          </div>`;
        }
        contentHtmlToReplace.innerHTML = contentHtml;
        return serviceHtml;

    }

    $(document).ready(function() {
        businesListing();
        function businesListing() {

            categoryId = '';
            nearMe = '';
            availebleNow = '';
            postedByMe = '';
            sortBy = '';
            searchLocation = '';
            @if(app('request')->input('category_id') != "")
                categoryId = '&category_id=' +{{app('request')->input('category_id')}};
            @endif

                    @if(app('request')->input('near_me') != "")
                nearMe = "&near_me={{app('request')->input('near_me')}}";
            @endif

                    @if(app('request')->input('available_now') != "")
                availebleNow = "&available_now={{app('request')->input('available_now')}}";
            @endif

                    @if(app('request')->input('posted_by_me') != "")
                postedByMe = "&posted_by_me={{app('request')->input('posted_by_me')}}";
            @endif

                    @if(app('request')->input('sort_by') != "")
                sortBy = "&sort_by={{app('request')->input('sort_by')}}";
            @endif

                    @if(app('request')->input('search_location') != "")
                searchLocation = "&search_location={{app('request')->input('search_location')}}";
            @endif


                serviceUrl = "{{route('user.front-services.data')}}?" + categoryId + nearMe + availebleNow + postedByMe + sortBy + searchLocation;

            serviceHtml = document.getElementById('service-data');
            serviceHtml.innerHTML = 'Loading...'
            $.ajax({
                url: serviceUrl, success: function (result) {


                    serviceHtml.innerHTML = bsinessListingHtml(result);

                    mapResult = result;
                }
            });


        }
    });

</script>