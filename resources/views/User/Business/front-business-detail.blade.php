@extends('layout-user.app')

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
                            @if($data['business_detail']->video_url)
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
                                            @if($data['business_detail']->created_by_status == "Posted By Me")
                                                <span class="badge"> Posted By Me</span>
                                            @endif
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
                            <div class="nxt-listing" id="about-section">
                                {{--<h1>{{$data['business_detail']->title}}</h1>--}}

                                {{--{{dd($data['user_detail']->userInfo->profile_image)}}--}}

                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-md-4">
                                        <div class="mssge-list-left">
                                            <a class="profile-nme" href="#">
                                                <img src="{{$data['user_detail']->userInfo->profile_image}}" alt="logo">
                                            </a>
                                            <div class="name-list">
                                                <span class="author">{{$data['user_detail']->userInfo->first_name}} {{$data['user_detail']->userInfo->last_name}}</span>
                                                {{--                                                <span class="author">{{$data['business_detail']->title}}</span>--}}

                                                <span class="time33">{{$data['business_detail']->created_at->diffForHumans() }}</span>
                                                <div class="rating-main-div new-stars">
                                                    {!! \App\Helpers\ReviewHelper::reviewStars($data['business_detail']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="listing-detail-step4ul">
                                            <li>

                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="similar-icons">


                                    <span class="rating-count padding-top2">{{$data['reviews_detail']['reviews_average']}}</span>
                                    <a class="beauty-spa" href="#"><i
                                                class="fas fa-newspaper"></i> {{$data['business_detail']->title}}</a>
                                    <span class="beauty-spa2"><i
                                                class="fas fa-clock"></i> {{$data['business_detail']->TimingStatus}}</span>

                                    <a class="beauty-spa33" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <a href="{{route('user.front-business',['city_id' => $data['business_detail']->address->city->id] )}}">
                                            {{$data['business_detail']->address->city->name}}</a>,
                                        <a href="{{route('user.front-business',['country_id' => $data['business_detail']->address->country->id] )}}">
                                            {{$data['business_detail']->address->country->name}}</a>
                                        <i class="fas fa-level-down-alt"></i>
                                    </a>

                                </div>


                                <div class="newp-text">
                                    @if(Auth::check())
                                        @if($data['business_detail']->created_by == Auth::user()->id)
                                            <a href="javascript:void(0)" class="edit-desc description_edit">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        @endif
                                    @endif
                                    <input type="hidden" class="business_id" name="business_id" value="{{$data['business_detail']->id}}">
                                    <p class="para description_para">{{$data['business_detail']->description}}</p>
                                    <textarea name="description" class="para-edit" readonly style="display: none">{{$data['business_detail']->description}}</textarea>
                                </div>
                                {{--<p class="para"> {{$data['business_detail']->description}}</p>--}}
                            </div>
                        </div>


                        <div class="listing-left" id="video-section">

                            <div class="nxt-listing" id="">
                                <div class="row no-gutters">
                                    <div class="head-bg">
                                        <h3 class="watch-vedio">Services</h3>
                                        {{--{{dd($data['business_detail']->created_by )}}--}}
                                        @if(Auth::check())

                                            @if($data['business_detail']->created_by == Auth::user()->id)

                                                <a href="#" data-toggle="modal"
                                                   data-target="#add-services"
                                                   class="ad-portfolio"><i class="fas fa-plus"></i></a>



                                            @endif

                                        @endif


                                    </div>
                                </div>
                                <div class="row">
                                    @forelse ($data['all_services'] as $service)
                                        <div class="col-md-4">
                                            <div class="services-div-sec"
                                                 style="background: {{$service->profile_image}}"></div>
                                            <span class="rstrnt-bar">{{$service->title}}</span>
                                        </div>
                                    @empty
                                        <div class="col-lg-12 "><p>No Services</p></div>

                                    @endforelse
                                </div>

                            </div>

                        </div>

                        <div class="listing-left">
                            <div class="nxt-listing" id="">
                                <div class="row no-gutters">
                                    <div class="head-bg">

                                        <h3 class="watch-vedio">Jobs Post</h3>

                                        @if(Auth::check())

                                            @if($data['business_detail']->created_by == Auth::user()->id)

                                                <a href="#" data-toggle="modal"
                                                   data-target="#add-business-job"
                                                   class="ad-portfolio"><i class="fas fa-plus"></i></a>


                                            @endif

                                        @endif


                                    </div>
                                </div>

                                <div class="main-job" id="show_ajax_jobs">
                                    @forelse($data['business_detail']->jobs as $job)
                                        <div class="row no-gutters">

                                            <div class="col-lg-9 col-md-8 col-sm-12 pad-5px">
                                                <div class="row no-gutters">
                                                    <!--progress-->
                                                    <div class="progress-bar-main">
                                                        <ul class="breadcrumb2">
                                                            <li><a href="#">open</a></li>
                                                            <li><a href="#">assigned</a></li>
                                                            <li><a href="#">inprogress</a></li>
                                                            <li><a href="#">completed</a></li>
                                                            <li><a href="#">reviewed</a></li>
                                                            <li><a href="#"></a></li>
                                                        </ul>
                                                    </div>

                                                    <a href="#" class="p-pic-right-text"></a>
                                                </div>
                                                <div class="row no-gutters">
                                                    <div class="col-12">
                                                        <span class="col-left-pera">{{$job->task}}<a
                                                                    href="#">Read More</a></span>
                                                    </div>

                                                </div>
                                                <div class="work-links-div2">
                                                    @foreach($job->fauTags as $tag)
                                                        <a href="#">{{$tag->name}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12 pad-5px">
                                                <div class="p-pic-last-sec">
                                                    <span class="company-name-text">
                                                        <a href="#"><i class="far fa-heart"></i></a>
                                                        Rs {{$job->budget}}
                                                    </span>
                                                    <div class="p-pic-sec3">
                                                        <span class="posted-by-text"><strong>Posted</strong>{{$job->created_by}}</span>
                                                        <span class="posted-by-text"><strong>Task Location</strong>{{$job->city->name}}</span>
                                                        <span class="posted-by-text"><strong>Task Type</strong>{{$job->type}}</span>
                                                        <span class="posted-by-text"><strong>Due Date</strong>{{$job->date}}</span>
                                                        <span class="posted-by-text"><strong>Total Person</strong>{{$job->number_of_people}}</span>
                                                        <span class="posted-by-text"><strong>Task Time</strong>{{$job->date}}</span>
                                                        <span class="posted-by-text"><strong>Categories</strong>


                                                            @foreach($job->categories as $cateogory)
                                                                @if($loop->last)
                                                                    {{$cateogory->name}}
                                                                @else
                                                                    {{$cateogory->name}},
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </div>
                                                    <ul class="supplier-btn-ul">
                                                        <li><a href="#">Apply</a></li>
                                                        <li><a href="#">Similar Jobs</a></li>

                                                    </ul>

                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-lg-12 "><p>No Jobs</p></div>
                                    @endforelse
                                </div>


                            </div>
                        </div>

                        <div class="listing-left">
                            <div class="nxt-listing">
                                <div class="row no-gutters">
                                    <div class="head-bg">
                                        <h3 class="watch-vedio">Portfolio</h3>

                                        @if($data['business_detail']->created_by_status == "Posted By Me")
                                            @if($data['business_detail']->portfolios()->count()>6)
                                                <a onclick="alert('you can not add more than 6 portfolios')"
                                                   class="ad-portfolio"><i class="fas fa-plus"></i></a>
                                            @else
                                                <a href="#" id="portfolio-btn" data-toggle="modal"
                                                   data-target="#add-portfolio"
                                                   class="ad-portfolio"><i class="fas fa-plus"></i></a>
                                            @endif
                                        @endif

                                    </div>
                                </div>
                                <div class="row" id="show-portfiolo-boxes">

                                    @forelse($data['business_detail']->portfolios as $portfolio)
                                        <div id="portfolio-id-{{$portfolio->id}}" class="col-md-4"
                                             onclick="deleteListingData({{$portfolio->id}},{{$data['business_detail']->id}},'portfolio')">
                                            <div class="services-div-sec"
                                                 style="background: url({{$portfolio->profile_image}}) no-repeat center;
                                                         background-size: cover;">
                                                <span class="rgb-span">
                                        		<a href="#" class="trash-pic"><i class="fas fa-times"></i></a>
                                        	</span>
                                            </div>
                                            <span class="rstrnt-bar">{{$portfolio->title}}</span>
                                        </div>
                                    @empty
                                        <div class="col-md-4">
                                            <p>No Portfolios Added</p>
                                        </div>
                                    @endforelse

                                </div>

                            </div>
                        </div>

                        <div class="listing-left" id="gallery-section">
                            <div class="nxt-listing" id="">
                                <div class="row no-gutters">
                                    <div class="head-bg">
                                        <h3 class="watch-vedio">Gallery</h3>
                                    </div>
                                </div>

                                <div class="cart-slider2">
                                    <!--Carousel Wrapper-->
                                    <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
                                         data-ride="carousel">
                                        <!--Slides-->
                                        <div class="carousel-inner" role="listbox">
                                            @foreach($data['business_detail']->gallery as $gallery)
                                                @if($loop->first)
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="{{$gallery->name}}"
                                                             alt="First slide">
                                                    </div>
                                                @else
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="{{$gallery->name}}"
                                                             alt="First slide">
                                                    </div>
                                                @endif
                                            @endforeach

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
                                            @foreach($data['business_detail']->gallery as $key=>$gallery)
                                                <li data-target="#carousel-thumb" data-slide-to="{{$key}}"
                                                    class="active">
                                                    <img class="d-block w-100" src="{{$gallery->name}}"
                                                         class="img-fluid">
                                                </li>
                                            @endforeach

                                        </ol>
                                    </div>
                                    <!--/.Carousel Wrapper-->

                                </div>


                            </div>
                        </div>

                        <div class="listing-details-sec1">
                            <div class="nxt-listing" id="id-31">
                                <div class="row no-gutters">
                                    <div class="head-bg">
                                        <h3 class="watch-vedio">Categories </h3>
                                        @if($data['business_detail']->created_by_status == "Posted By Me")


                                            <a href="#" id="add-categories-btn"
                                               onclick="loadAndCategories({{$data['business_detail']->id}})"
                                               data-toggle="modal"
                                               data-target="#add-categories-business"
                                               class="ad-portfolio"><i class="fas fa-plus"></i></a>

                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tags-list">
                                        <div class="col-lg-12 " id="show-categories-boxes">
                                            @forelse($data['business_detail']->categories as $category)
                                                <a href="#">{{$category->name}}</a>
                                            @empty
                                                <p>No Categories</p>

                                            @endforelse
                                        </div>
                                    </div>

                                </div>
                                <br>
                            </div>

                            <div class="nxt-listing" id="id-31">
                                <div class="row no-gutters">
                                    <div class="head-bg">
                                        <h3 class="watch-vedio">Tags</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="tags-list">
                                        <div class="col-lg-12 " id="show-tags-boxes">
                                            @forelse($data['business_detail']->tags as $tag)
                                                <a href="#">{{$tag->name}}</a>
                                            @empty
                                                <p>No Tags</p>

                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        @include('User.Business.Reviews.all-reviews-partial')
                    </div>

                    <div class="col-xl-4">
                        <div class="listing-map">

                            @php
                                $embed= str_replace(",", "", str_replace(" ", "+", $data['business_detail']->address->address));

                                $address = 'https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . $embed . '&z=14&output=embed';
                            @endphp
                            <iframe src="{{$address}}" allowfullscreen=""></iframe>
                        </div>

                        <ul class="listing-map-sec2">


                            <li>
                                <span class="listing-left-span"><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</span>
                                <a href="#" class="web-link">{{$data['business_detail']->address->address}} </a>
                            </li>
                            <li>

                                <span class="listing-left-span"><i class="fas fa-phone fone"></i>Phone:</span>

                                    <span class="web-link-edit">
                                    @if(Auth::check())
                                        @if($data['business_detail']->created_by == Auth::user()->id)
                                            <a href="javascript:void(0)" class="edit-desc2 edit-price">
                                                <i class="far fa-edit "></i>
                                            </a>
                                        @endif
                                    @endif

                                    {{--<div class="web-link"><span class=" price_description">{{$data['business_detail']->phone}}</span></div>--}}
                                    <p class="web-link price_description">{{$data['business_detail']->phone}}</p>
                                    <input class="phone-edit" style="text-align: right; display: none; border: 1px solid #ececec!important; max-width:120px" value="{{$data['business_detail']->phone}}" name="phone" readonly type="text">
                                </span>

                            </li>
                            <li>
                                <span class="listing-left-span"><i class="far fa-star"></i> Rating:</span>
                                <div class="rating-main-div">
                                    <span class="rating-count">{{$data['reviews_detail']['reviews_average']}}</span>
                                    {!! \App\Helpers\ReviewHelper::reviewStars($data['business_detail']) !!}
                                    <small>({{$data['reviews']->count()}})</small>
                                </div>
                            </li>

                            <li>
                                <span class="listing-left-span"><i class="fas fa-dollar-sign"></i>Price:</span>
                                <div class="price-right">
                                <span data-toggle="collapse" data-target="#rates" class="plus-deta">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                </div>

                                <ul class="work-time-colaps collapse" id="rates">
                                    @foreach($data['business_detail']->rates as $rate)
                                        @if($rate->price_type == "Hourly Base")
                                            <li>
                                                <span class="colaps-left-time">Hourly Base</span>
                                                <span class="colaps-right-time">${{$rate->rate}}</span>
                                            </li>
                                        @else
                                            <li>
                                                <span class="colaps-left-time">Project Base</span>
                                                <span class="colaps-right-time">${{$rate->rate}}</span>
                                            </li>
                                        @endif
                                    @endforeach


                                </ul>
                            </li>
                            <li>
                                <span class="listing-left-span"><i class="far fa-clock"></i> Work Time</span>
                                <div class="work-time">
                                    <span style="color: #f54444;"
                                          class="closed-time">{{$data['business_detail']->TimingStatus}}</span>

                                    <span data-toggle="collapse" data-target="#work-time" class="plus-deta"><i
                                                class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                </div>
                                <ul class="work-time-colaps collapse" id="work-time">
                                    @foreach($data['business_detail']->timings as $timing)

                                        @if($timing->_from == "24 hours closed" || $timing->_from == "24 hours open")
                                            <li>
                                                <span class="colaps-left-time">{{$timing->day}}</span>
                                                <span class="colaps-left-time">{{$timing->day}}</span>
                                                <span class="colaps-right-time">{{$timing->_from}}</span>
                                            </li>
                                        @else

                                            <li>
                                                <span class="colaps-left-time">{{$timing->day}}</span>
                                                <span class="colaps-right-time">{{$timing->_from}}
                                                    - {{$timing->_to}}</span>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <span class="listing-left-span">... Social:</span>
                                <ul class="listing-social-ul">
                                    @if(!empty($data['business_detail']->facebook_url))
                                        <li><a href="{{$data['business_detail']->facebook_url}}">
                                                <i class="fab fa-facebook"></i></a></li>
                                    @endif
                                    @if(!empty($data['business_detail']->twitter_url))
                                        <li><a href="{{$data['business_detail']->twitter_url}}">
                                                <i class="fab fa-twitter"></i></a></li>
                                    @endif
                                    @if(!empty($data['business_detail']->gmail_url))
                                        <li><a href="{{$data['business_detail']->gmail_url}}">
                                                <i class="fas fa-at" aria-hidden="true"></i></a>
                                        </li>
                                    @endif


                                </ul>
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
    </script>

    @if(!empty($data['all_services']))
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
    @endif


   {{-- <div class="modal" id="add-business-job" role="dialog" style="background: rgba(0,0,0,.9);">
        <div class="auto-collection">
            <span class="close_popup" data-dismiss="modal"><i class="fas fa-times"></i></span>
            <form method="post" enctype="multipart/form-data" class="add-job-form">

                <h1 class="auto-collection-text" style="color: #fa6164;">Add Jobs</h1>
                @csrf
                <div class="confirm-archive-pad">


                    <div class="col-lg-12">

                        <select name="job_id[]" class="select2-multiple form-control" style="width:100%;"
                                multiple required>

                            @if(sizeof($data['jobs']) > 0)
                                @foreach($data['jobs'] as $job)
                                    <option value="{{$job->id}}"
                                            @if($data['business_detail']->jobs->where('business_id' , $data['business_detail']->id)->count() >0) selected @endif>{{$job->task}}</option>
                                @endforeach
                            @endif
                        </select>

                    </div>


                </div>


                <div class="close-update-btn">
                    <ul class="close-update-btnul">
                        <li>
                            <a href="#" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</a>
                        </li>
                        <li>
                            <button type="button" class="btn btn-danger btn-md addJobs">Add Jobs</button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>--}}


    <script>
        $(document).ready(function () {

            $(".select2-multiple").select2({});

            $('.addJobs').click(function(){

                var urlId ="{{route('user.addJobs',[$data['business_detail']->id])}}";

                var data = $('.add-job-form').serialize();

                $.ajax({
                    type: "POST",
                    url: urlId,
                    data: data,

                    success: function (response, status) {
                        console.log(response.message);

                        $('#add-business-job').modal('hide');


                        document.getElementById('show_ajax_jobs').innerHTML = response.response_html;


                    },
                    error: function (data) {
                        console.log(data);
                    }
                });

            });


            $('.description_edit').click(function(){
                $('.description_para').hide();
                $(this).siblings('textarea').show();
                $(this).siblings('textarea').removeAttr('readonly');
                $(this).html('<i class="fa fa-check" id="save-desc-id"></i>');
                $(this).attr('data-link','{{route('editBusinessDescription')}}');
                $(this).removeClass('description_edit').addClass('save-desc');
            });


            $('.edit-price').click(function(){
                $('.price_description').hide();
                $(this).siblings('input').show();
                $(this).siblings('input').removeAttr('readonly');
                $(this).html('<i class="fa fa-check  save-price-field" id="save-price-field"></i>');
                $(this).attr('data-link','{{route('editBusinessPhone')}}');
                $(this).removeClass('edit-price').addClass('save-price');

            });


            $(document).on('click','#save-desc-id',function(){

                var urlId = $('.save-desc').data('link');

                $.ajax({
                    type: "POST",
                    url: urlId,
                    data: {
                        '_token':'{{csrf_token()}}',
                        'description': $('.para-edit').val(),
                        'business_id':{{$data['business_detail']->id}}
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

            $(document).on('click','#save-price-field',function(){

                var urlPriceId = $('.save-price').data('link');

//                console.log(urlId);

                $.ajax({
                    type: "POST",
                    url: urlPriceId,
                    data: {
                        '_token':'{{csrf_token()}}',
                        'phone': $('.phone-edit').val(),
                        'business_id':{{$data['business_detail']->id}}
                    },

                    success: function (response, status) {
                        alert(response.message);
                        $('.save-price').html('<i class="far fa-edit"></i>');
                        $('.save-price').siblings('input').attr('readonly','true');
                        $('.save-price').removeClass('save-price').addClass('edit-price');
                        $('.edit-price').siblings('input').hide();
                        $('.price_description').show();
                        $('.price_description').text( $('.phone-edit').val());
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });


            });






        });
    </script>



    @if(Auth::check())


        @if($data['business_detail']->created_by_status == "Posted By Me")


            <script>


                function getTagEditBusiness() {

                    var urld = "{{url('get-categories-tags')}}";

                    var token = '{!! csrf_token() !!}';

                    var businessFormData = new FormData();
                    businessFormData.append("categories[]", $('#business_categories_load').val());
                    businessFormData.append("_token", token);

                    $.ajax({
                        type: "POST",
                        url: urld,
                        data: businessFormData,
                        cache: false,
                        contentType: false,
                        processData: false,

                        success: function (response, status) {
                            var alltags = '';

                            $.each(response.data, function (index, value) {
                                if (value.selected != true) {
                                    alltags += ' <option value="' + value.id + '" )>' + value.name + '</option>';
                                }else{
                                    alltags += ' <option value="' + value.id + '" )   selected>' + value.name + '</option>';
                                }


                            });

                            $("#tags_business_load").html(alltags);


                        },
                        error: function (data) {
                            console.log(data)
                        }
                    });


                }


                function loadAndCategories(busienssId) {
                    document.getElementById('load-categories-and-tags').innerHTML = "loading...";
                    $.get("{{url('user/business/load-categories')}}" + "/" + busienssId, function (data, status) {

                        document.getElementById('load-categories-and-tags').innerHTML = data.response_html;
                        $("#business_categories_load").select2({});
                        $("#tags_business_load").select2({
                            maximumSelectionLength: 7
                        });

                    });
                }


                function deleteListingData(id, elementId, elementName) {
                    if (elementName == 'portfolio') {
                        $('#portfolio-id-' + id).fadeOut();
                        $.get("{{url('user/delete-portfolio/')}}" + "/" + id + "?business_id=" + elementId, function (data, status) {
                            document.getElementById('show-portfiolo-boxes').innerHTML = data.response_html;
                            alert(data.message);
                        });
                    }
                }







            </script>




            @include('home.Partials.add_portfolio_popup')
            @include('home.Partials.add_categories_popup')
        @endif
    @endif
@endsection