@extends('layout.app')

@section('content')




    <header class="header-container">
        @include('layout-user.header')
        <div class="fix-header2 no-padding1">
            <div class="custom-container">
                <div class="clearfix">
                    <div class="abour-left">
                        <ul>
                            <li class="header-menu active-list"><a href="#about-section"><i class="fa fa-user"></i>
                                    About</a>
                            </li>
                            @if($data['add_detail']->video_url)
                                <li class="header-menu"><a href="#video-section"><i class="fas fa-video"></i>
                                        Services</a>
                                </li>
                            @endif
                            <li class="header-menu"><a href="#gallery-section"><i class="fas fa-file"></i> Gallery</a>
                            </li>
                            <li class="header-menu"><a href="#user-review-section"><i class="fas fa-align-justify"></i>
                                    User
                                    Review</a>
                            </li>
                            <li class="header-menu"><a href="#write-review-section"><i class="fa fa-edit"></i> Write
                                    Review</a>
                            </li>

                        </ul>
                    </div>
                    <div class="right-form">
                        <ul>
                            <li><a href="javascript:void(0)" data-toggle="modal" data-target="#smsModel"><i
                                            class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a></li>
                            <li><a href="javascript:void(0)" title="Call Us 123456" class="call_tool_tip"><i
                                            class="fa fa-phone" aria-hidden="true"></i> Call Now</a></li>
                            <li><a href="#send_mesage"><i class="fa fa-usd" aria-hidden="true"></i> Send Message</a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <div class="body-container">
        <div class="custom-container">
            <div class="detail-listing-main">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="listing-details-sec1">
                            <div class="border-div">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a class="home-class" href="{{route('home')}}"><i class="fas fa-home"></i> Home
                                        </a>
                                        {{--<a class="home-class2" href="#">Beauty & Spa</a>--}}
                                    </div>
                                    <div class="col-md-7">

                                        <div class="listing-bookmark dropdown">
                                            <span class="bookmark">Bookmark <i class="fas fa-eye"></i></span>
                                            <span class="bookmark bookmark2"><i class="fas fa-eye"></i> 3212</span>

                                            <span class="bookmark bookmark-icns"><i class="fas fa-share-alt"></i></span>
                                            {{-- <a href="#" data-toggle="dropdown" class="new-icns "><i class="fas fa-ellipsis-h"></i></a>
                                             <ul class="dropdown-menu new-drop">
                                                 <li><a href="#">Report Listing</a></li>
                                             </ul>--}}



                                        </div>


                                        {{--     <a href="#" data-toggle="dropdown" class="new-icns "><i
                                                         class="fas fa-ellipsis-h"></i></a>
                                             <ul class="dropdown-menu new-drop">
                                                 <li><a href="#">Report Listing</a></li>
                                             </ul>
 --}}
                                    </div>
                                </div>
                            </div>
                            {{--<div class="nxt-listing" id="about-section">--}}
                                {{--<h1>{{$data['business_detail']->title}}</h1>--}}

                                {{--{{dd($data['user_detail']->userInfo->profile_image)}}--}}

                                {{--<div class="row" style="margin-bottom: 20px;">--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="mssge-list-left">--}}
                                            {{--<a class="profile-nme" href="#">--}}
                                                {{--<img src="{{$data['user_detail']->userInfo->profile_image}}" alt="logo">--}}
                                            {{--</a>--}}
                                            {{--<div class="name-list">--}}
                                                {{--<span class="author">{{$data['user_detail']->userInfo->first_name}} {{$data['user_detail']->userInfo->last_name}}</span>--}}
                                                {{--                                                <span class="author">{{$data['business_detail']->title}}</span>--}}

                                                {{--<span class="time33">{{$data['add_detail']->created_at }}</span>--}}
                                                {{--<div class="rating-main-div new-stars">--}}
                                                    {{--{!! \App\Helpers\ReviewHelper::reviewStars($data['add_detail']) !!}--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<ul class="listing-detail-step4ul">--}}
                                            {{--<li>--}}

                                            {{--</li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="similar-icons">--}}


                                    {{--<span class="rating-count padding-top2">{{$data['reviews_detail']['reviews_average']}}</span>--}}
                                    {{--<a class="beauty-spa" href="#"><i--}}
                                                {{--class="fas fa-newspaper"></i> {{$data['add_detail']->title}}</a>--}}
                                    {{--<span class="beauty-spa2"><i--}}
                                                {{--class="fas fa-clock"></i> {{$data['add_detail']->TimingStatus}}</span>--}}

                                    {{--<a class="beauty-spa33" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>--}}
                                        {{--<a href="{{route('user.front-business',['city_id' => $data['add_detail']->address->city->id] )}}">--}}
                                            {{--{{$data['add_detail']->address->city->name}}</a>,--}}
                                        {{--<a href="{{route('user.front-business',['country_id' => $data['add_detail']->address->country->id] )}}">--}}
                                            {{--{{$data['add_detail']->address->country->name}}</a>--}}
                                        {{--<i class="fas fa-level-down-alt"></i>--}}
                                    {{--</a>--}}

                                {{--</div>--}}

                                {{--<p class="para"> {{$data['add_detail']->description}}</p>--}}
                            {{--</div>--}}
                        </div>




                        <div class="listing-left" id="gallery-section">
                            <div class="nxt-listing" id="">
                                <div class="row no-gutters">
                                    <div class="head-bg">
                                        <h3 class="watch-vedio">Gallery</h3>
                                        @if(Auth::check())
                                            @if($data['add_detail']->created_by == Auth::user()->id)
                                                <a href="#" data-toggle="modal" data-target="#gallery" class="ad-portfolio"><i class="fas fa-plus"></i></a>
                                            @endif
                                        @endif

                                    </div>
                                </div>

                                <div class="cart-slider2">
                                    <!--Carousel Wrapper-->
                                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                                         data-ride="carousel">
                                        <!--Slides-->
                                        <div class="carousel-inner" role="listbox">


                                            @foreach($data['add_detail']->gallery as $gallery)
                                                    <div class="carousel-item ">
                                                        <img class="d-block w-100" src="{{$gallery->name}}"
                                                             alt="First slide">
                                                    </div>
                                            @endforeach

                                                <div class="carousel-item active">
                                                    <img class="d-block w-100" src="{{$data['add_detail']->profile_image}}"
                                                         alt="First slide">
                                                </div>
                                        </div>
                                        <!--/.Slides-->
                                        <!--Controls-->
                                        <a class="carousel-control-prev" href="#carousel-thumb" role="button"
                                           data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-thumb" role="button"
                                           data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                        <!--/.Controls-->
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-thumb" data-slide-to="0"class="active">
                                                <img class="d-block w-100 img-fluid" src="{{$data['add_detail']->profile_image}}">
                                            </li>

                                        @foreach($data['add_detail']->gallery as $key=>$gallery)
                                                <li data-target="#carousel-thumb" data-slide-to="{{$key+1}}">
                                                    <img class="d-block w-100 img-fluid" src="{{$gallery->name}}">
                                                </li>
                                            @endforeach


                                        </ol>
                                    </div>
                                    <!--/.Carousel Wrapper-->

                                </div>


                            </div>
                        </div>

                        {{--<div class="listing-details-sec1">--}}
                            {{--<div class="nxt-listing" id="id-31">--}}
                                {{--<div class="row no-gutters">--}}
                                    {{--<div class="head-bg">--}}
                                        {{--<h3 class="watch-vedio">Categories</h3>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="row">--}}
                                    {{--@foreach($data['add_detail']->categories as $category)--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<div class="tags-list">--}}
                                                {{--<a href="#">{{$category->name}}</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--@if($data['add_detail']->category_maker_id != null)--}}
                                {{--<div class="nxt-listing" id="id-31">--}}
                                    {{--<div class="row no-gutters">--}}
                                        {{--<div class="head-bg">--}}
                                            {{--<h3 class="watch-vedio">Maker</h3>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--<div class="tags-list">--}}
                                                {{--<a href="#">{{$data['add_detail']->makers->name}}</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}



                        {{--</div>--}}


                        <div class="listing-details-sec1">
                            <div class="nxt-listing" id="id-31">
                                <div class="row no-gutters">
                                    <div class="head-bg">
                                        <h3 class="watch-vedio">Description</h3>
                                    </div>
                                </div>


                                <div class="newp-text">
                                    @if(Auth::check())
                                        @if($data['add_detail']->created_by == Auth::user()->id)
                                            <a href="javascript:void(0)" class="edit-desc description_edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        @endif
                                    @endif
                                    <input type="hidden" class="add_id" name="add_id" value="{{$data['add_detail']->id}}">
                                    <p class="para description_para">{{$data['add_detail']->description}}</p>
                                    <textarea name="description" class="para-edit" readonly style="display: none">{{$data['add_detail']->description}}</textarea>
                                </div>

                            </div>



                        </div>


                        @include('User.Adds.Reviews.all-reviews-partial')
                    </div>

                    <div class="col-xl-4">
                        <div class="listing-map">

                            @php
                                $embed= str_replace(",", "", str_replace(" ", "+", $data['add_detail']->address->address));

                                $address = 'https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . $embed . '&z=14&output=embed';
                            @endphp
                            <iframe src="{{$address}}" allowfullscreen=""></iframe>
                        </div>

                        <ul class="listing-map-sec2">

                            <li>
                                <span class="listing-left-span"><i class="fa fa-map-marker" aria-hidden="true"></i> Created At:</span>
                                <a href="#" class="web-link"> {{$data['add_detail']->created_at}} </a>
                            </li>



                            <li>
                                <span class="listing-left-span"><i class="far fa-star"></i> Rating:</span>
                                <div class="rating-main-div">
                                    <span class="rating-count">{{$data['reviews_detail']['reviews_average']}}</span>
                                    {!! \App\Helpers\ReviewHelper::reviewStars($data['add_detail']) !!}
                                    <small>({{$data['reviews']->count()}})</small>
                                </div>
                            </li>

                            <li>
                                <span class="listing-left-span"><i class="fas fa-dollar-sign"></i>Price:</span>
                                @if($data['add_detail']->currency == 'dollar')
                                    <span class="web-link-edit">
                                         @if(Auth::check())
                                            @if($data['add_detail']->created_by == Auth::user()->id)
                                                <a href="javascript:void(0)" class="edit-desc2 edit-price">
                                                     <i class="far fa-edit "></i>
                                                </a>
                                            @endif
                                         @endif
                                        <p class="price_description">{{$data['add_detail']->price}}</p>

                                        <input class="price-edit" style="text-align: right; display: none; border: 1px solid #ececec!important; max-width:60px" value="{{$data['add_detail']->price}}" name="price" readonly type="text">
                                    </span>
                                @else
                                    <span class="web-link-edit">
                                         @if(Auth::check())
                                            @if($data['add_detail']->created_by == Auth::user()->id)
                                                <a href="javascript:void(0)" class="edit-desc2 edit-price">
                                                    <i class="far fa-edit "></i>
                                                </a>
                                            @endif
                                         @endif
                                        <p class="price_description">{{$data['add_detail']->price}}</p>
                                        <input class="price-edit" style="text-align: right; display: none;" value="{{$data['add_detail']->price}}" name="price" readonly type="text">
                                    </span>
                                @endif

                            </li>

                            <li>
                                <div class="nxt-div ">
                                    <h3>Seller Description</h3>

                                {{--{{dd($data['user_detail']->userInfo->profile_image)}}--}}

                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-12">
                                            <div class="mssge-list-left">

                                                <a class="profile-nme" href="#">
                                                    <img src="{{$data['user_detail']->userInfo->profile_image}}" alt="logo">
                                                </a>

                                                <div class="name-list">
                                                    <span class="author">{{$data['user_detail']->userInfo->first_name}} {{$data['user_detail']->userInfo->last_name}}</span>
                                                    <span>{{$data['add_detail']->phone_number}}</span>
                                                    <span>{{$data['user_detail']->email}}</span>
                                                </div>

                                                <div>
                                                    <button class="btntype">Chat With Seller</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>





                            <li>
                                <div class="nxt-div">
                                    <h3>SPA Treatment</h3>
                                    <label class="type">Type</label>
                                    <select class="select-box">
                                        <option>Maria - Nails Treatment (+$13.00 per day)</option>
                                        <option>Gordon - Body Massage (+$8.00 per day)</option>
                                        <option>Simon - Acupuncture (+$43.00 per day)</option>
                                    </select>
                                    <span class="date">Date</span>
                                    <div class="calender-div">

                                    </div>
                                    <span class="book-now">
                                        Booking cost:
                                        <strong>$13.00</strong>
                                    </span>
                                    <button class="btntype">Book Now!</button>
                                </div>
                            </li>
                            <li>
                                <form>
                                    <div class="form-group-form">
                                        <span class="icons-user"><i class="fas fa-user"></i></span>
                                        <input type="text" placeholder="your name here..">
                                    </div>
                                    <div class="form-group-form">
                                        <span class="icons-user"><i class="fas fa-envelope"></i></span>
                                        <input type="text" placeholder="your email address..">
                                    </div>
                                    <div class="form-group-form">
                                        <span class="icons-user"><i class="fas fa-newspaper"></i></span>
                                        <textarea placeholder="your message"></textarea>
                                    </div>
                                    <button class="btn btn-primary btn-grey">Send Message</button>
                                </form>
                            </li>


                        </ul>

                        <div class="single-bar">
                            <span class="claim-label">Own this place?</span>
                            <a href="#" class="claim-link">Claim It Now!</a>
                        </div>
                        <a class="img-anchr" href="#">
                            <span class="new-img">
                                <span class="widget-promo-ad">Ad</span>
                                <span class="widget-promo-address"><i class="fas fa-map-marker-alt"></i>place</i>S Capitol Ave, Indianapolis, IN, USA</span>
                                <h3 class="widget-promo-title">Top Gym<i class="fas fa-check-circle"></i></h3>
                            </span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            var owl = $("#owl-demo");

            owl.owlCarousel({

                // Define custom and unlimited items depending from the width
                // If this option is set, itemsDeskop, itemsDesktopSmall, itemsTablet, itemsMobile etc. are disabled
                // For better preview, order the arrays by screen size, but it's not mandatory
                // Don't forget to include the lowest available screen size, otherwise it will take the default one for screens lower than lowest available.
                // In the example there is dimension with 0 with which cover screens between 0 and 450px

                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [600, 1],
                    [700, 1],
                    [1000, 1],
                    [1200, 1],
                    [1400, 1],
                    [1600, 1]
                ],
                navigation: true,
                autoPlay: false, //Set AutoPlay to 3 seconds

            });


        });
    </script>



    {{--@if(!empty($data['all_services']))
        <div class="modal" id="add-services" role="dialog" style="background: rgba(0,0,0,.9);">
            <div class="auto-collection">
                <span class="close_popup" data-dismiss="modal"><i class="fas fa-times"></i></span>
                <form method="post" action="{{route('user.add-services',[$data['business_detail']->id])}}"
                      enctype="multipart/form-data">

                    <h1 class="auto-collection-text" style="color: #fa6164;">Add Services</h1>
                    @csrf
                    <div class="confirm-archive-pad">


                        <div class="col-lg-12">

                            <select name="service_id[]" class="select2-multiple form-control" style="width:100%;"
                                    multiple
                                    required>
                                @foreach($data['all_services'] as $service)
                                    <option value="{{$service->id}}"
                                            @if($data['business_detail']->services->where('id' , $service->id)->count() >0) selected @endif>{{$service->title}}</option>
                                @endforeach
                            </select>

                        </div>


                    </div>


                    <div class="close-update-btn">
                        <ul class="close-update-btnul">
                            <li>
                                <a href="#" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</a>
                            </li>
                            <li>
                                <button type="submit" class="btn btn-danger btn-md">Add Service</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    @endif--}}

    @include('popups.send-sms')


    <script>
        $('.call_tool_tip').on({
            "click": function () {
                $(this).tooltip({items: "#tt", content: "Displaying on click"});
                $(this).tooltip("open");
            },
            "mouseout": function () {
                $(this).tooltip("disable");
            }
        });


        $('.call_tool_tip').tooltip({

            disabled: true,
            close: function (event, ui) {
                $(this).tooltip('disable');
            }
        });

        $('.call_tool_tip').on('click', function () {
            $(this).tooltip('enable').tooltip('open');
        });


        $(document).on('click', '.header-menu', function () {
            $('.header-menu').removeClass('active-list');
            $(this).addClass('active-list');
        });

        $('.btntype').click(function(){
            var login = {{Auth::check()}};
            if(!login) {
                $('#loginModal').modal('show');
            }

        });

    </script>

    @if(!empty($data['all_services']))
        <div class="modal" id="add-services" role="dialog" style="background: rgba(0,0,0,.9);">
            <div class="auto-collection">
                <span class="close_popup" data-dismiss="modal"><i class="fas fa-times"></i></span>
                <form method="post" action="{{route('user.add-services',[$data['add_detail']->id])}}"
                      enctype="multipart/form-data">

                    <h1 class="auto-collection-text" style="color: #fa6164;">Add Services</h1>
                    @csrf
                    <div class="confirm-archive-pad">


                        <div class="col-lg-12">

                            <select name="service_id[]" class="select2-multiple form-control" style="width:100%;"
                                    multiple
                                    required>
                                @foreach($data['all_services'] as $service)
                                    <option value="{{$service->id}}"
                                            @if($data['add_detail']->services->where('id' , $service->id)->count() >0) selected @endif>{{$service->title}}</option>
                                @endforeach
                            </select>

                        </div>


                    </div>


                    <div class="close-update-btn">
                        <ul class="close-update-btnul">
                            <li>
                                <a href="#" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</a>
                            </li>
                            <li>
                                <button type="submit" class="btn btn-danger btn-md">Add Service</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    @endif
    <script>
        $(document).ready(function () {

            $(".select2-multiple").select2({

            });

            $('.description_edit').click(function(){
                $('.description_para').hide();
                $(this).siblings('textarea').show();
               $(this).siblings('textarea').removeAttr('readonly');
               $(this).html('<i class="fa fa-check" id="save-desc-id"></i>');
               $(this).attr('data-link','{{route('editAddDescription')}}');
               $(this).removeClass('description_edit').addClass('save-desc');
            });

            $(document).on('click','#save-price-field',function(){

                var urlPriceId = $('.save-price').data('link');

//                console.log(urlId);

                $.ajax({
                    type: "POST",
                    url: urlPriceId,
                    data: {
                        '_token':'{{csrf_token()}}',
                        'price': $('.price-edit').val(),
                        'add_id':$('.add_id').val()
                    },

                    success: function (response, status) {
                        alert(response.message);
                        $('.save-price').html('<i class="far fa-edit"></i>');
                        $('.save-price').siblings('input').attr('readonly','true');
                        $('.save-price').removeClass('save-price').addClass('edit-price');
                        $('.edit-price').siblings('input').hide();
                        $('.price_description').show();
                        $('.price_description').text( $('.price-edit').val());
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });


            });


            $('.edit-price').click(function(){
                $('.price_description').hide();
                $(this).siblings('input').show();
                $(this).siblings('input').removeAttr('readonly');
                $(this).html('<i class="fa fa-check  save-price-field" id="save-price-field"></i>');
                $(this).attr('data-link','{{route('editAddPrice')}}');
                $(this).removeClass('edit-price').addClass('save-price');

            });




            $(document).on('click','#save-desc-id',function(){

                var urlId = $('.save-desc').data('link');

                console.log(urlId);

                $.ajax({
                    type: "POST",
                    url: urlId,
                    data: {
                        '_token':'{{csrf_token()}}',
                        'description': $('.para-edit').val(),
                        'add_id':$('.add_id').val()
                    },

                    success: function (response, status) {
                        alert(response.message);
                        $('.save-desc').html('<i class="far fa-edit"></i>');
                        $('.save-desc').siblings('textarea').attr('readonly','true');
                        $('.save-desc').removeClass('save-desc').addClass('description_edit');
                        $('.description_edit').siblings('textarea').hide();
                        $('.description_para').show();
                        $('.description_para').text($('.para-edit').val());

                    },
                    error: function (data) {
                        console.log(data);
                    }
                });


            });

        });
    </script>


    @include('User.Adds.Partials.gallery_popup')

@endsection