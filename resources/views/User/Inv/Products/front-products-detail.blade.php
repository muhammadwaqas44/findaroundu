@extends('layout.app')

@section('content')


    @include('layout-user.front-top-menu')
    <div class="fix-header2 no-padding1">
        <div class="custom-container">
            <div class="clearfix">
                <div class="abour-left">
                    <ul>
                        <li class="active-list"><a href="#id-1"><i class="fa fa-user"></i> About</a>
                        </li>
                        <li><a href="#id-2"><i class="fa fa-cog"></i> Services</a>
                        </li>
                        <li><a href="#id-3"><i class="fa fa-photo"></i> Gallery</a>
                        </li>
                        <li><a href="#id-4"><i class="fa fa-ticket"></i> Room Booking</a>
                        </li>
                        <li><a href="#id-5"><i class="fa fa-street-view"></i> 360 View</a>
                        </li>
                        <li><a href="#id-6"><i class="fa fa-edit"></i> Write Review</a>
                        </li>
                        <li><a href="#id-7"><i class="fa fa-star-half-o"></i> User Review</a>
                        </li>


                    </ul>
                </div>
                <div class="right-form">
                    <ul>
                        <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li>
                        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Call Now</a> </li>
                        <li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-usd" aria-hidden="true"></i> Get Quotes</a> </li>
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
                            <div class="border-div">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a class="home-class" href="{{route('home')}}"><i class="fas fa-home"></i> Home </a>
                                        {{--<a class="home-class2" href="#">Beauty & Spa</a>--}}
                                    </div>
                                    <div class="col-md-7">
                                        <div class="listing-bookmark dropdown">
                                            <span class="bookmark">Bookmark <i class="fas fa-eye"></i></span>
                                            <span class="bookmark bookmark2"><i class="fas fa-eye"></i> 3212</span>

                                            <span class="bookmark bookmark-icns"><i class="fas fa-share-alt"></i></span>
                                            <a href="#" data-toggle="dropdown" class="new-icns "><i class="fas fa-ellipsis-h"></i></a>
                                            <ul class="dropdown-menu new-drop">
                                                <li><a href="#">Report Listing</a></li>
                                                <li><a href="{{route('user.edit-product',['id'=>$data['add_detail']->id])}}">Edit Product</a></li>
                                                <li><a href="{{route('user.delete-product',['id'=>$data['add_detail']->id])}}">Delete Product</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nxt-listing" id="id-1">
                                <h1>{{$data['add_detail']->title}}</h1>
                                <div class="similar-icons">

                                    <span class="rating-count padding-top2">{{$data['reviews_detail']['reviews_average']}}</span>

                                    <span class="beauty-spa2"><i class="fas fa-clock"></i> Closed</span>
                                    <span class="prple-doller">
                                        <i class="fas fa-dollar-sign"></i>

                                        {{$data['add_detail']->price}}

                                    </span>
                                    {{--<a class="beauty-spa33" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>--}}

                                        {{--<a href="{{route('user.front-adds',['city_id' => $data['add_detail']->address->city->id] )}}">--}}
                                            {{--{{$data['add_detail']->address->city->name}}</a>,--}}
                                        {{--<a href="{{route('user.front-adds',['country_id' => $data['add_detail']->address->country->id] )}}">--}}
                                            {{--{{$data['add_detail']->address->country->name}}</a>--}}
                                    {{--</a>--}}

                                </div>
                                <p class="para">{{$data['add_detail']->description}}</p>
                            </div>
                            {{--<div class="nxt-listing" id="id-2">--}}
                                {{--<h3 class="watch-vedio">Watch Video</h3>--}}
                                {{--<div class="vedio-div">--}}
                                    {{--<iframe width="560" height="315" src="https://www.youtube.com/embed/zocngunDY34" frameborder="0"--}}
                                            {{--allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="nxt-listing" id="id-2">
                                <h3 class="watch-vedio">Photo Gallery</h3>
                                <div class="vedio-div">

                                    <div id="demo">


                                        <div id="owl-demo" class="owl-carousel  "  >
                                            @foreach($data['add_detail']->gallery as $gallery)
                                                <div class="item @if($loop->index == 1) active @endif">
                                                    <img src="/{{$gallery->name}}">
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="nxt-listing" id="id-3">
                                <h3 class="watch-vedio">Categories</h3>
                                <div class="row">
                                    @foreach($data['add_detail']->categories as $category)
                                        <label style="padding:5px;display: inline-block;margin-right: .9375rem;  line-height: 38px;text-align: center;background-color: #faf5fa;border: 1px solid;border-color: #ececec;border-radius: 4px;color: #3d0941;">
                                            <a href="{{route('user.front-adds',['category_id' => $category->id] )}}">
                                                {{$category->name}}</a>

                                        </label>
                                    @endforeach
                                </div>
                            </div>



                            @include('User.Inv.Products.Reviews.all-reviews-partial')



                        </div>
                    </div>
                    {{--<div class="col-xl-4">--}}
                        {{--<div class="listing-map">--}}

                            {{--@php--}}
                                {{--$embed= str_replace(",", "", str_replace(" ", "+", $data['add_detail']->address->address));--}}

                                    {{--$address = 'https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . $embed . '&z=14&output=embed';--}}
                            {{--@endphp--}}
                            {{--<iframe src="{{$address}}" allowfullscreen=""></iframe>--}}
                        {{--</div>--}}


                        {{--<ul class="listing-map-sec2">--}}

                            {{--<li>--}}
                                {{--<span class="listing-left-span"><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</span>--}}
                                {{--<a href="#" class="web-link">{{$data['add_detail']->address->address}}</a>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<span class="listing-left-span"><i class="fas fa-phone fone"></i>Phone:</span>--}}
                                {{--<div class="web-link2"><span>{{$data['add_detail']->createdBy->phone}}  </span></div>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<span class="listing-left-span"><i class="far fa-star"></i> Rating:</span>--}}
                                {{--<div class="rating-main-div">--}}
                                    {{--<span class="rating-count">{{$data['reviews_detail']['reviews_average']}}</span>--}}

                                    {{--@if($data['reviews_detail']['reviews_average'] == 0 )--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                    {{--@elseif($data['reviews_detail']['reviews_average'] >= 1 && $data['reviews_detail']['reviews_average'] < 2)--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                    {{--@elseif($data['reviews_detail']['reviews_average'] >= 2 && $data['reviews_detail']['reviews_average'] < 3)--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}

                                    {{--@elseif($data['reviews_detail']['reviews_average'] >= 3 && $data['reviews_detail']['reviews_average'] < 4)--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                    {{--@elseif($data['reviews_detail']['reviews_average'] >= 4 && $data['reviews_detail']['reviews_average'] < 5)--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star"></span>--}}
                                    {{--@elseif($data['reviews_detail']['reviews_average'] == 5 )--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                        {{--<span class="fa fa-star checked"></span>--}}
                                    {{--@endif--}}
                                    {{--<small>({{$data['reviews']->count()}})</small>--}}
                                {{--</div>--}}
                            {{--</li>--}}
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
                                        {{--<li><a href="{{$data['add_detail']->twitter_url}}"><i class="fab fa-twitter"></i></a></li>--}}
                                    {{--@endif--}}
                                    {{--@if(!empty($data['add_detail']->gmail_url))--}}
                                        {{--<li><a href="{{$data['add_detail']->gmail_url}}"><i class="fas fa-at" aria-hidden="true"></i></a></li>--}}
                                    {{--@endif--}}



                                {{--</ul>--}}
                            {{--</li>--}}



                        {{--</ul>--}}
                        {{--<div class="single-bar">--}}
                        {{--<span class="claim-label">Own this place?</span>--}}
                        {{--<a href="#" class="claim-link">Claim It Now!</a>--}}
                        {{--</div>--}}
                        {{--<a class="img-anchr" href="#">--}}
                            {{--<span class="new-img">--}}
                                {{--<span class="widget-promo-ad">Ad</span>--}}
                                {{--<span class="widget-promo-address"><i class="fas fa-map-marker-alt"></i>place</i>S Capitol Ave, Indianapolis, IN, USA</span>--}}
                                {{--<h3 class="widget-promo-title">Top Gym<i class="fas fa-check-circle"></i></h3>--}}
                            {{--</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

            var owl = $("#owl-demo");

            owl.owlCarousel({

                // Define custom and unlimited items depending from the width
                // If this option is set, itemsDeskop, itemsDesktopSmall, itemsTablet, itemsMobile etc. are disabled
                // For better preview, order the arrays by screen size, but it's not mandatory
                // Don't forget to include the lowest available screen size, otherwise it will take the default one for screens lower than lowest available.
                // In the example there is dimension with 0 with which cover screens between 0 and 450px

                itemsCustom : [
                    [0, 1],
                    [450, 1],
                    [600, 1],
                    [700, 1],
                    [1000, 1],
                    [1200, 1],
                    [1400, 1],
                    [1600, 1]
                ],
                navigation : true,
                autoPlay: false, //Set AutoPlay to 3 seconds

            });



        });
    </script>

@endsection