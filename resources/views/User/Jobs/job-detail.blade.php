@extends('layout-user.app')

@section('content')
    @include('layout-user.header')
    <div class="fix-header2 no-padding1">
        <div class="custom-container">
            <div class="clearfix">
                <div class="abour-left">
                    <ul>
                        <li class="header-menu active-list"><a href="#about-section"><i class="fa fa-user"></i>
                                About</a>
                        </li>
                        @if($data['job_detail']->video != '')
                            <li class="header-menu"><a href="#video-section"><i class="fas fa-video"></i> Video</a>
                            </li>
                        @endif
                        <li class="header-menu"><a href="#gallery-section"><i class="fas fa-file"></i> Gallery</a>
                        </li>
                        <li class="header-menu"><a href="#write-review-section"><i class="fa fa-edit"></i> Write Review</a>
                        </li>
                        <li class="header-menu"><a href="#user-review-section"><i class="fas fa-align-justify"></i> User
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
                        <li><a href="#send_mesage"><i class="fa fa-usd" aria-hidden="true"></i> Send Message</a></li>
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
                        <div class="listing-left">
                            <div class="border-div" id="about-section">
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
                                            {{--<a href="#" data-toggle="dropdown" class="new-icns "><i
                                                        class="fas fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu new-drop">
                                                <li><a href="#">Report Listing</a></li>
                                            </ul>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nxt-listing">
                                <h1>{{$data['job_detail']->task}}</h1>
                                <div class="similar-icons">

                                    <span class="rating-count padding-top2">{{$data['reviews_detail']['reviews_average']}}</span>

                                    <span><i class="fas fa-clock"></i> {{$data['job_detail']->created_at}}</span>

                                    <span class="prple-doller">
                                        <i class="fas fa-dollar-sign"></i>

                                        {{$data['job_detail']->price}}

                                    </span>
                                    <a class="beauty-spa33" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>

                                        <a href="{{route('user.front-adds',['city_id' => $data['job_detail']->city->name] )}}">
                                            {{$data['job_detail']->city->name}}</a>,
                                        {{--<a href="{{route('user.front-adds',['country_id' => $data['add_detail']->address->country->id] )}}">--}}
                                            {{--{{$data['add_detail']->address->country->name}}</a>,--}}
                                        {{--<a href="{{route('user.front-adds',['search_location' => $data['add_detail']->address->address] )}}">--}}
                                            {{--{{$data['add_detail']->address->address}}</a>--}}
                                    </a>

                                </div>
                                <p class="para">{{$data['job_detail']->description}}</p>
                            </div>

                            @if($data['job_detail']->video)

                                <div class="nxt-listing" id="video-section">
                                    <h3 class="watch-vedio">Watch Video</h3>
                                    <div class="vedio-div">
                                        <video controls>
                                            <source src="{{ asset($data['job_detail']->video) }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>

                            @endif

                            @if($data['job_detail']->audio)

                                <div class="nxt-listing" id="audio-section">
                                    <h3 class="watch-vedio">Audio Clip</h3>
                                    <div class="vedio-div">
                                        <source src="{!! $data['job_detail']->audio !!}">
                                    </div>
                                </div>

                            @endif


                            {{--<div class="nxt-listing" id="gallery-section">--}}
                                {{--<h3 class="watch-vedio">Photo Gallery</h3>--}}
                                {{--<div class="vedio-div">--}}

                                    {{--<div id="demo">--}}


                                        {{--<div id="owl-demo" class="owl-carousel  ">--}}
                                            {{--@foreach($data['add_detail']->gallery as $gallery)--}}
                                                {{--<div class="item @if($loop->index == 1) active @endif">--}}
                                                    {{--<img src="{{$gallery->name}}">--}}
                                                {{--</div>--}}
                                            {{--@endforeach--}}


                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="nxt-listing" id="id-3">
                                <h3 class="watch-vedio">Categories</h3>
                                <div class="row">
                                    @foreach($data['job_detail']->categories as $category)
                                        <label style="padding:5px;display: inline-block;margin-right: .9375rem;  line-height: 38px;text-align: center;background-color: #faf5fa;border: 1px solid;border-color: #ececec;border-radius: 4px;color: #3d0941;">
                                            <a href="#">{{$category->name}}</a>
                                        </label>
                                    @endforeach
                                </div>
                            </div>


                            @include('User.Jobs.Reviews.all-reviews-partial')


                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="listing-map">

                            @php
                                $embed= str_replace(",", "", str_replace(" ", "+", $data['job_detail']->location));

                                $address = 'https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . $embed . '&z=14&output=embed';
                            @endphp
                            <iframe src="{{$address}}" allowfullscreen=""></iframe>
                        </div>


                        <ul class="listing-map-sec2">

                            <li>
                                <span class="listing-left-span"><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</span>
                                <a href="#" class="web-link">{{$data['job_detail']->location}}</a>
                            </li>
                            <li>
                                <span class="listing-left-span"><i class="fas fa-phone fone"></i>Budget:</span>
                                <div class="web-link2"><span>{{$data['job_detail']->budget}}  </span></div>
                            </li>
                            <li>
                                <span class="listing-left-span"><i class="fas fa-phone fone"></i>Number of People:</span>
                                <div class="web-link2"><span>{{$data['job_detail']->number_of_people}}  </span></div>
                            </li>

                            <li>
                                <span class="listing-left-span"><i class="far fa-star"></i> Rating:</span>
                                <div class="rating-main-div">
                                    <span class="rating-count">{{$data['reviews_detail']['reviews_average']}}</span>

                                    {!! \App\Helpers\ReviewHelper::reviewStars($data['job_detail']) !!}
                                    <small>({{$data['reviews']->count()}})</small>
                                </div>
                            </li>
                            {{--<li>--}}
                                {{--<span class="listing-left-span"><i class="fas fa-dollar-sign"></i> Price:</span>--}}
                                {{--<div class="price-right">--}}


                                    {{--<span><i class="fas fa-dollar-sign"></i></span>{{$data['add_detail']->price}}--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<span class="listing-left-span"><i class="far fa-clock"></i> Work Time</span>--}}
                            {{--<div class="work-time">--}}
                            {{--<span style="color: #f54444;" class="closed-time">Closed</span>--}}
                            {{--<span class="closed-time">09:00am</span>--}}
                            {{--<span class="closed-time">-</span>--}}
                            {{--<span class="closed-time">05:00pm</span>--}}
                            {{--<span  data-toggle="collapse" data-target="#work-time" class="plus-deta"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>--}}
                            {{--</div>--}}
                            {{--<ul class="work-time-colaps collapse" id="work-time">--}}
                            {{--@foreach($data['add_detail']->timings as $timing)--}}
                            {{--<li>--}}
                            {{--<span class="colaps-left-time">{{$timing->day}}</span>--}}
                            {{--<span class="colaps-right-time">{{$timing->_from}} - {{$timing->_to}}</span>--}}
                            {{--</li>--}}
                            {{--@endforeach--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<span class="listing-left-span">... Social:</span>--}}
                                {{--<ul class="listing-social-ul">--}}
                                    {{--@if(!empty($data['add_detail']->facebook_url))--}}
                                        {{--<li><a href="{{$data['add_detail']->facebook_url}}"><i class="fab fa-facebook">--}}
                                                {{--</i></a></li>--}}
                                    {{--@endif--}}
                                    {{--@if(!empty($data['add_detail']->twitter_url))--}}
                                        {{--<li><a href="{{$data['add_detail']->twitter_url}}"><i--}}
                                                        {{--class="fab fa-twitter"></i></a></li>--}}
                                    {{--@endif--}}
                                    {{--@if(!empty($data['add_detail']->gmail_url))--}}
                                        {{--<li><a href="{{$data['add_detail']->gmail_url}}"><i class="fas fa-at"--}}
                                                                                            {{--aria-hidden="true"></i></a>--}}
                                        {{--</li>--}}
                                    {{--@endif--}}


                                {{--</ul>--}}
                            {{--</li>--}}


                        </ul>
                        {{--<div class="single-bar">--}}
                        {{--<span class="claim-label">Own this place?</span>--}}
                        {{--<a href="#" class="claim-link">Claim It Now!</a>--}}
                        {{--</div>--}}
                        <a class="img-anchr" href="#" id="send_mesage">
                            <span class="new-img">
                                <span class="widget-promo-ad">Ad</span>
                                <span class="widget-promo-address"><i class="fas fa-map-marker-alt"></i>place</i>S Capitol Ave, Indianapolis, IN, USA</span>
                                <h3 class="widget-promo-title">Top Gym<i class="fas fa-check-circle"></i></h3>
                            </span>
                        </a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('popups.send-sms')

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
    </script>

@endsection