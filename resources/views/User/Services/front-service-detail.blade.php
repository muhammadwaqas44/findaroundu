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
                        @if($data['service_detail']->video_url)
                            <li class="header-menu"><a href="#video-section"><i class="fas fa-video"></i> Video</a>
                            </li>
                        @endif
                        <li class="header-menu"><a href="#gallery-section"><i class="fas fa-file"></i> Gallery</a>
                        </li>
                        <li class="header-menu"><a href="#user-review-section"><i class="fas fa-align-justify"></i> User
                                Review</a>
                        </li>
                        <li class="header-menu"><a href="#write-review-section"><i class="fa fa-edit"></i> Write Review</a>
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
                            <div class="border-div">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a class="home-class" href="#"><i class="fas fa-home"></i> Home </a>

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
                                    </div>
                                </div>
                            </div>
                            <div class="nxt-listing" id="about-section">
                                <h1>{{$data['service_detail']->title}}</h1>
                                <div class="similar-icons">



                                    <span class="rating-count padding-top2">{{$data['reviews_detail']['reviews_average']}}</span>

                                    <span class="beauty-spa2" style="border-left: 1px solid;
    border-color: #ececec;"><i class="fas fa-clock"></i> {{$data['service_detail']->TimingStatus}}</span>

                                    <a class="beauty-spa33" href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <a href="{{route('user.front-services',['city_id' => $data['service_detail']->address->city->id] )}}" >
                                            {{$data['service_detail']->address->city->name}}</a>,
                                        <a href="{{route('user.front-services',['country_id' => $data['service_detail']->address->country->id] )}}" >
                                            {{$data['service_detail']->address->country->name}}</a>
                                    </a>

                                </div>
                                <p class="para">{{$data['service_detail']->description}}</p>
                            </div>

                            @if($data['service_detail']->video_url)
                            <div class="nxt-listing" id="video-section">
                                <h3 class="watch-vedio">Watch Video   </h3>
                                <div class="vedio-div">
                                {!!  $data['service_detail']->video_url !!}
                                </div>
                            </div>
                            @endif

                            <div class="nxt-listing" id="gallery-section">
                                <h3 class="watch-vedio">Photo Gallery</h3>
                                <div class="vedio-div">
                                    <div id="demo">
                                        <div id="owl-demo" class="owl-carousel">

                                            @foreach($data['service_detail']->gallery as $gallery)
                                                <div class="item @if($loop->index == 1) active @endif">
                                                    <img src="{{$gallery->name}}">
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nxt-listing">
                                <h3 class="watch-vedio">Categories</h3>
                                <div class="row">
                                    @foreach($data['service_detail']->categories as $category)
                                        <label style="padding:5px;display: inline-block;margin-right: .9375rem;  line-height: 38px;text-align: center;background-color: #faf5fa;border: 1px solid;border-color: #ececec;border-radius: 4px;color: #3d0941;">

                                            <a href="{{route('user.front-services',['category_id' => $category->id] )}}">

                                                {{$category->name}}</a>



                                        </label>
                                    @endforeach






                                </div>
                            </div>

                            @include('User.Services.Reviews.all-reviews-partial')



                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="listing-map">

                            @php
                                $embed= str_replace(",", "", str_replace(" ", "+", $data['service_detail']->address->address));

                                    $address = 'https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . $embed . '&z=14&output=embed';
                            @endphp
                            <iframe src="{{$address}}" allowfullscreen=""></iframe>
                        </div>
                        <ul class="listing-map-sec2">

                            <li>
                                <span class="listing-left-span"><i class="fa fa-map-marker" aria-hidden="true"></i> Address:</span>
                                <a href="#" class="web-link">{{$data['service_detail']->address->address}} </a>
                            </li>
                            <li>
                                <span class="listing-left-span"><i class="fas fa-phone fone"></i>Phone:</span>
                                <div class="web-link2"><span>{{$data['service_detail']->createdBy->phone}}</span>      </div>
                            </li>
                            <li>
                                <span class="listing-left-span"><i class="far fa-star"></i> Rating:</span>
                                <div class="rating-main-div">
                                    <span class="rating-count">{{$data['reviews_detail']['reviews_average']}}</span>
                                    {!! \App\Helpers\ReviewHelper::reviewStars($data['service_detail']) !!}
                                    <small>(5)</small>
                                </div>
                            </li>
                            <li>
                                <span class="listing-left-span"><i class="fas fa-dollar-sign"></i> Price:</span>
                                <div class="price-right">
                                    <span  data-toggle="collapse" data-target="#rates" class="plus-deta"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                </div>
                                <ul class="work-time-colaps collapse" id="rates">

                                        <li>
                                            <span class="colaps-left-time">Project Price</span>
                                            <span class="colaps-right-time">${{$data['service_detail']->project_price}}</span>
                                        </li>

                                    <li>
                                        <span class="colaps-left-time">Hourly Price</span>
                                        <span class="colaps-right-time">${{$data['service_detail']->hourly_price}}</span>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <span class="listing-left-span"><i class="far fa-clock"></i> Work Time</span>
                                <div class="work-time">
                                    <span style="color: #f54444;" class="closed-time">{{$data['service_detail']->TimingStatus}}</span>
                                    <span class="closed-time">09:00am</span>
                                    <span class="closed-time">-</span>
                                    <span class="closed-time">05:00pm</span>
                                    <span  data-toggle="collapse" data-target="#work-time" class="plus-deta"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                                </div>
                                <ul class="work-time-colaps collapse" id="work-time">
                                    @foreach($data['service_detail']->timings as $timing)
                                        @if($timing->_from == "24 hours closed" || $timing->_from == "24 hours open")
                                            <li>
                                                <span class="colaps-left-time">{{$timing->day}}</span>
                                                <span class="colaps-right-time">{{$timing->_from}}</span>
                                            </li>
                                        @else
                                        <li>
                                            <span class="colaps-left-time">{{$timing->day}}</span>
                                            <span class="colaps-right-time">{{$timing->_from}} - {{$timing->_to}}</span>
                                        </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </li>
                            <li>
                                <span class="listing-left-span"> Social:</span>
                                <ul class="listing-social-ul">

                                    @if(!empty($data['service_detail']->facebook_url))
                                        <li><a href="{{$data['service_detail']->facebook_url}}"><i class="fab fa-facebook">
                                                </i></a></li>   @endif

                                    @if(!empty($data['service_detail']->twitter_url))
                                        <li><a href="{{$data['service_detail']->twitter_url}}"><i class="fab fa-twitter">
                                                </i></a></li> @endif
                                    @if(!empty($data['service_detail']->gmail_url))
                                        <li><a href="{{$data['service_detail']->gmail_url}}"><i class="fas fa-at" aria-hidden="true">
                                                </i></a></li> @endif

                                </ul>
                            </li>
                            {{--  <li>
                                  <span class="listing-left-span"><i class="fas fa-paperclip"></i> Documents</span>
                                  <div class="work-time">
                                      <a class="downloaded-items clearfix" href="#">
                                          <span class="left-1">Certi...ate-Of-Awes.jpg</span>
                                          <span class="right-2"><i class="fas fa-download"></i></span>
                                      </a>
                                      <a class="downloaded-items" href="#">
                                          <span class="left-1">Certification-Of<br>-Beauty.docx</span>
                                          <span class="right-2"><i class="fas fa-download"></i></span>
                                      </a>
                                  </div>
                              </li>--}}
                            {{-- <li>
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
                             </li>--}}
                        </ul>
                        {{-- <div class="single-bar">
                             <span class="claim-label">Own this place?</span>
                             <a href="#" class="claim-link">Claim It Now!</a>
                         </div>--}}
                        <a class="img-anchr" href="javascript:void(0)" id="send_mesage">
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


            $(document).on('click', '.header-menu', function () {
                $('.header-menu').removeClass('active-list');
                $(this).addClass('active-list');
            });

        });
    </script>
@endsection