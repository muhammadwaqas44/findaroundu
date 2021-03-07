
<script>
    flagMap = 0;
    zoom = 5;
    latLong = null;
    mapResult = null;
    {{--{{\App\Helpers\MapHelper::cityLatLong(\App\MainCountry::find(app('request')->input('country_id'))->name)}}--}}
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

        if (result.all_jobs.length != 0) {
            zoom = 4;
            latLong = {
                lat: parseFloat(result.all_jobs[0].lat),
                lng: parseFloat(result.all_jobs[0].lng)
            }

        }
       @endif


        var myKey = "{{env('GOOGLE_KEY')}}";
        var script = document.createElement('script');
        script.type = 'text/javascript';
        string = "hey it works";   //////////// here take the coordinates
        script.src = "https://maps.googleapis.com/maps/api/js?key=" + "{{env('GOOGLE_KEY')}}" + "&callback=initMap";

        document.body.appendChild(script);
        flagMap = 1;
    }

    function initMap() {


        map = new google.maps.Map(document.getElementById('map-id'), {
            zoom: zoom,
            center: latLong,
            clickableIcons: true,
            clickable: true,
            gestureHandling: 'cooperative',
        });


        for (i = 0; i < mapResult.all_jobs.length; i++) {
            Popup = createPopupClass();

            popup = new Popup(
                new google.maps.LatLng(parseFloat(mapResult.all_jobs[i].lat), parseFloat(mapResult.all_jobs[i].lng)),
                document.getElementById('content_' + mapResult.all_jobs[i].job_id)
            );
            popup.setMap(map);
            marker = new google.maps.Marker({
                map: map,
                position: {lat: parseFloat(mapResult.all_jobs[i].lat), lng: parseFloat(mapResult.all_jobs[i].lng)}
            });

            var stars = mapResult.all_jobs[i].stars_html;
            addLink = "{{url('add-detail')}}" + '/' + mapResult.all_jobs[i].job_id;
            var popUpId = "popup_" + mapResult.all_jobs[i].job_id;
            var contentString = `
                    <div  id='` + popUpId + `'  >
                        <img style="width:125px;height:125px" src="` + mapResult.all_jobs[i].profile_image + `">
                        <div id="bodyContent">
                            <p><b><a href="` + addLink + `">` + mapResult.all_jobs[i].profile_image + `</a></b>
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


    $(document).ready(function () {
        $("body").append(`<div id='for_content'></div>`);
        $("body").append(`<div id='for_popup'></div>`);
    });


    function bsinessListingHtml(data) {

//        console.log(data);

        addHtml = '';

        if (data.all_jobs.length == 0) {
            return `<p>No Record Found</p>`;
        }


        contentHtmlToReplace = document.getElementById('for_content');
        popupHtmlToReplace = document.getElementById('for_popup');

        contentHtml = '';
        popupHtml = '';
//        console.log(111);
//        console.log(data.all_jobs.length);
//        console.log(data.length);
        var html = '';
        for (i = 0; i < data.all_jobs.length; i++) {
//            console.log(data.all_jobs[0]);
            addLink = "{{url('add-detail')}}" + '/' + data.all_jobs[i].job_id;

            contentHtml = contentHtml + `<div id ='content_` + data.all_jobs[i].job_id + `' style = 'max-height: max-content;z-index:10000'
                       onclick = "check('content_` + data.all_jobs[i].job_id + `','popup_` + data.all_jobs[i].job_id + `')" >
                       ` + data.all_jobs[i].budget + `
<div id = 'popup_` + data.all_jobs[i].job_id + `' style = 'display: none;' >
                            <img style = 'width:125px;height:125px' src = '` + data.all_jobs[i].profile_image + `' >
                            <div id = 'bodyContent' >
                                <p ><b ><a href = '` + addLink + `' >` + data.all_jobs[i].task + `</a ></b >
                            </div >
                             ` + data.all_jobs[i].stars + `
                            </div >
                    </div >
</div>`;



            html += '<div class="sec3list-view-main">';
            html += '<div class="row no-gutters">';
            html += '<div class="col-lg-2 col-md-6 col-sm-12 pad-5px">';
            html += '<div class="profile-main"><span class="posted-by-user">Posted by</span><div class="p-pic-min-div"> <span class="p-pic">';
            html += '<img src="'+data.all_jobs[i].profile_image+'" alt="no img">';
            html += '<span class="dot-online"></span></span>';
            html += '<div class="p-pic-right-main">';
            html += '<span class="verified-text2"><strong>'+data.all_jobs[i].fullName+'</strong></span>';
            html += '<span class="verified-text2">'+data.all_jobs[i].created_at+'</span>';
            html += '<div class="rate-prof"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span> </div>';
            html += '</div> </div>';
            html += '<div class="about-client-tags">';
            html += '<h6>'+data.all_jobs[i].city_name+' <a href="javascript:void(0)" id="mapModal" data-toggle="modal" data-target="#mapModal">View Location on Map</a>';
            html += '<input type="hidden" name="lat" value="'+data.all_jobs[i].lat+'"> <input type="hidden" name="lng" value="'+data.all_jobs[i].lng+'"> <input type="hidden" name="location" value="'+data.all_jobs[i].location+'"> </h6>';
            html += '<a href="#">'+data.all_jobs[i].location+' 11:22 am</a>';
            html += '<h6>15 jobs posted</h6>';
            html += '<a href="#">80% hire rate, 1 open job</a>';
            html += '<h6>$6,893 total spent</h6>';
            html += '<a href="#">12 hire, 5 active</a></div>';
            html += '<span class="verified-text">Verified</span>';
            html += '<ul class="verified-by-ul">';
            html += '<li> <span data-toggle="tooltip" title="" class="verified" data-original-title="Verified by email"><i class="fas fa-envelope"></i></span> </li>';
            html += '<li><span data-toggle="tooltip" title="" class="verified" data-original-title="Verified by phone"><i class="fas fa-mobile-alt"></i></span></li>';
            html += '<li><span data-toggle="tooltip" title="" data-original-title="Not Verified CNIC"><i class="fas fa-id-card"></i></span></li>';
            html += '<li><span data-toggle="tooltip" title="" data-original-title="Not Verified Money"><i class="fas fa-money-bill-alt"></i></span></li>';
            html += '</ul>';
            html += '<ul class="froup-btn-ul"><li><a href="#" data-toggle="modal" data-target="#delete-addon">Chat With User</a></li></ul>';
            html += '</div></div>';
            html += '<div class="col-lg-7 col-md-6 col-sm-12 pad-5px"><div class="row no-gutters">';
            html += '<div class="progress-bar-main"><ul class="breadcrumb2">';
            html += '<li><a href="#">open</a></li>';
            html += '<li><a href="#">assigned</a></li>';
            html += '<li><a href="#">inprogress</a></li>';
            html += '<li><a href="#">completed</a></li>';
            html += '<li><a href="#">reviewed</a></li>';
            html += '<li><a href="#"></a></li>';
            html += '</ul></div>';

            html += '<a href="{{url('job-detail')}}/'+data.all_jobs[i].job_id+'" class="p-pic-right-text">'+data.all_jobs[i].task+'</a></div>';
            html += '<div class="row no-gutters"><div class="col-6">';
            html += '<span class="col-left-pera">'+data.all_jobs[i].description+'<a href="{{url('job-detail')}}/'+data.all_jobs[i].job_id+'">Read More</a></span>';
            html += '</div><div class="col-6"><div class="p-pic-sec3">';
            html += '<span class="posted-by-text"><strong>Posted</strong>'+data.all_jobs[i].created_at+'</span>';
            html += '<span class="posted-by-text"><strong>Task Location</strong>'+data.all_jobs[i].city_name+' </span>';
            html += '<span class="posted-by-text"><strong>Task Type</strong> '+data.all_jobs[i].type+'</span>';
            html += '<span class="posted-by-text"><strong>Due Date</strong>'+data.all_jobs[i].date+'</span>';
            html += '<span class="posted-by-text"><strong>Total Person</strong>'+data.all_jobs[i].number_of_people+'</span>';
            html += '<span class="posted-by-text"><strong>Task Time</strong>'+data.all_jobs[i].task_time+'</span>';
            html += '<span class="posted-by-text"><strong>Categories</strong>'+data.all_jobs[i].category+'</span>';
            html += '</div></div></div>';
            html += '<div class="work-links-div2">';
            for(j=0; j<data.all_jobs[i].tags; j++)
            {
                html += '<a href="#">'+data.all_jobs[i].tags[j].name+'</a>';
            }
            html += '</div></div>';
            html += '<div class="col-lg-3 col-md-6 col-sm-12 pad-5px"><div class="p-pic-last-sec">';
            html += ' <span class="company-name-text"><a href="#"><i class="far fa-heart"></i></a> Rs '+ data.all_jobs[i].number_of_people * data.all_jobs[i].budget +'</span>';
            html += '<div class="view-sec-main-div"><div class="row no-gutters">';
            html += '<div class="col-4 pad-5px">';
            html += '<span class="view-user">View</span> <span class="how-much-views"><i class="fas fa-eye"></i> 20</span></div>';
            html += '<div class="col-4 pad-5px">';
            html += '<span class="view-user">Applicants</span>';
            html += '<span class="how-much-views"><i class="fas fa-user"></i> 10%</span>';
            html += '</div>';
            html += '<div class="col-4 pad-5px"><span class="view-user">Comments</span><span class="how-much-views"><i class="fas fa-comment-dots"></i> 200</span>';
            html += '</div></div></div>';
            html += '<div class="view-sec-main-div"><div class="row no-gutters"><div class="col-4 pad-5px">';
            html += '<span class="view-user">Save</span>';
            html += '<span class="how-much-views"><i class="fas fa-eye"></i> 20</span>';
            html += '</div>';
            html += '<div class="col-4 pad-5px">';
            html += '<span class="view-user">Like</span>';
            html += '<span class="how-much-views"><i class="fas fa-user"></i> 10%</span>';
            html += '</div>';
            html += '<div class="col-4 pad-5px"><span class="view-user">Similar</span>';
            html += '<span class="how-much-views"><i class="fas fa-comment-dots"></i> 200</span></div>';
            html += '</div></div>';
            html += '<ul class="supplier-btn-ul">';
            html += '<li><a href="#">Apply</a></li>';
            html += '<li><a href="#">Similar Jobs</a></li>';
            html += '</ul></div></div></div></div>';
        }

//        contentHtmlToReplace.innerHTML = html;
        contentHtmlToReplace.innerHTML = contentHtml;
        return html;

    }

    $(document).ready(function () {
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


                addUrl = "{{route('jobs.front-jobs.data')}}?" + categoryId + nearMe + availebleNow + postedByMe + sortBy + searchLocation;

            addHtml = document.getElementById('add-data');
            addHtml.innerHTML = 'Loading...'
            $.ajax({
                url: addUrl, success: function (result) {

//                    console.log(result);

                    addHtml.innerHTML = bsinessListingHtml(result);

                    mapResult = result;
                }
            });


        }
    });

</script>