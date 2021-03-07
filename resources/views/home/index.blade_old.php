@extends('layout.app')

@section('content')

    <header class="header-container">
    @include('layout-user.front-top-menu')
    <!--BANNER AND SERACH BOX-->
        @include('home.Partials.front-home-banner-main-partial')
    </header>
    <!--TOP SEARCH SECTION-->

    <!--HOME PROJECTS-->
    <div class="body-container">
        <div class="custom-container">
            <div class="index-sec1-slider">
                <ul id="flexiselDemo4">
                    @foreach($data['stats'] as $stat)
                    <li>
                        <div class="sec1-slider-bg">
                            <span class="sec1-img"><img style="" src="{{$stat->image}}"
                                                        alt="no img"></span>
                            <span class="sec1-img-hover"><img style="" src="{{$stat->image}}"
                                                              alt="no img"></span>
                            <h3 class="million-business">{{$stat->title}}</h3>
                            <p class="millon-busines-pera">{{$stat->description}}</p>

                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!--Find Your Servicec-->

        @include('home.Partials.front-home-services-partial')

        <!--Explore Your Business-->

        @include('home.Partials.front-home-business-partial')

            <!--Explore Your City Listings-->
        @include('home.Partials.front-home-cities-partial')
        <!--How It Works-->
        <div class="index-sec5">
            <div class="custom-container">
                <h2 class="general-heading">How It Works</h2>
                <p class="general-pera">Explore some of the best Buisness from around the world from our partners and
                    friends.</p>
                <div class="how-it-works">
                    <img src="main-assets/images/how-it-works.png" alt="no img">
                </div>
            </div>
        </div>


    <!--Buy And Sell Products-->
        @include('home.Partials.front-home-products-partail')

        <div class="index-sec7">

            <div class="custom-container">
                <h2 class="general-heading">Create A Free Account</h2>
                <p class="general-pera">Explore some of the best Buisness from around the world from our partners and
                    friends.</p>
                <div class="row">
                    <div class="col-lg-7 col-sm-12">
                        <span class="few-reasion">A few reasion you you love online</span>
                        <span class="business-directory">Business Directory</span>
                        <span class="benefits-text">5 benefits of listing your business to a local online directory</span>
                        <ul class="busines-directory-ul">
                            <li>
                                <span class="enhance-img"><img src="main-assets/images/enhance-busines.png"
                                                               alt="no img"></span>
                                <div class="enhance-busines-right">
                                    <h3 class="enhancing-busines">Enhancing your Business</h3>
                                    <p class="enhancing-busines-pera">Lorem Ipsum is simply dummy text of the printing
                                        and typesetting industry. </p>
                                </div>
                            </li>
                            <li>
                                <span class="enhance-img"><img src="main-assets/images/advertising-busines.png"
                                                               alt="no img"></span>
                                <div class="enhance-busines-right">
                                    <h3 class="enhancing-busines">Advertising YourBusiness</h3>
                                    <p class="enhancing-busines-pera">Lorem Ipsum is simply dummy text of the printing
                                        and typesetting industry. </p>
                                </div>
                            </li>
                            <li>
                                <span class="enhance-img"><img src="main-assets/images/develop-brand.png" alt="no img"></span>
                                <div class="enhance-busines-right">
                                    <h3 class="enhancing-busines">Develop Brand Image</h3>
                                    <p class="enhancing-busines-pera">Lorem Ipsum is simply dummy text of the printing
                                        and typesetting industry. </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-5 col-sm-12">
                        <form action="{{route('register')}}"
                        method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="index-contact-form">
                            <ul class="index-form-ul">
                                <li>
                                    <input type="text" placeholder="Name" name="name">
                                </li>
                                <li>
                                    <input type="tel" placeholder="Mobile" name="phone">
                                </li>
                                <li>
                                    <input type="text" placeholder="Email" name="email">
                                </li>
                                <li>
                                    <input type="password" placeholder="Password" name="password">
                                </li>
                                <li>
                                    <input type="password" placeholder="Confirm Password" name="password_confirmation">
                                </li>
                            </ul>
                            <label  class="payment-check">
                                <input type="checkbox">By signing up, you agree to the terms and Conditions and Privacy
                                policy, you also agree to receive product-related emails <span></span>
                            </label>
                            <input type="submit" value="Submit Now" class="index-submit-btn">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="index-sec8">
            <div class="custom-container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="get-app"><img src="main-assets/images/app.jpg" alt="no img"></div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="app-right-sec">
                            <h4 class="best-app-text">Looking for the Best Service Provider? <span>Get The App!</span>
                            </h4>
                            <ul class="get-app-ul">
                                <li>Find near by listing</li>
                                <li>Easy Service Enquiry</li>
                                <li>Listing Reviews andrating</li>
                                <li>Manage your Listing, enquiry and reviews</li>
                            </ul>
                            <span class="download-link">we'll send youa link, open it on your phone to download the app</span>
                            <form>
                                <div class="app-link-main">
                                    <span class="number-text">+92</span>
                                    <input type="text" placeholder="Enter Mobile Number" class="mobile-text-field">
                                </div>
                                <input type="submit" value="Get App Link" class="get-app-linka-btn">
                            </form>
                            <span class="google-play-img"><img src="main-assets/images/google-play.jpg"
                                                               alt="no img"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--FOOTER SECTION-->

    <!--SCRIPT FILES-->

    <script src="{{asset('project-assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('project-assets/js/scrollreveal.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            if ($('.home-slider').length > 0) {
                $(".home-slider").owlCarousel({
                    dots: true,
                    loop: true,
                    autoplay: true,
                    slideSpeed: 2000,
                    margin: 0,
                    //animateOut: 'fadeOut',
                    responsiveClass: true,
                    nav: false,
                    navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
                    responsive: {
                        0: {
                            items: 1,
                            nav: true
                        },
                        480: {
                            items: 1,
                            nav: true
                        },
                        600: {
                            items: 1,
                            nav: true
                        },
                        1000: {
                            items: 1,
                            nav: true,
                            loop: true,
                            margin: 0
                        }
                    }

                });
            }

            if ($('.prd-slider').length > 0) {
                $(".prd-slider").owlCarousel({
                    dots: true,
                    loop: true,
                    autoplay: true,
                    slideSpeed: 2000,
                    margin: 0,
                    //animateOut: 'fadeOut',
                    responsiveClass: true,
                    nav: false,
                    navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        480: {
                            items: 1,
                            nav: false
                        },
                        600: {
                            items: 1,
                            nav: false
                        },
                        1000: {
                            items: 1,
                            nav: true,
                            loop: true,
                            margin: 0
                        }
                    }

                });
            }

            if ($('.categories-slider').length > 0) {
                $(".categories-slider").owlCarousel({
                    dots: true,
                    loop: true,
                    autoplay: true,
                    slideSpeed: 2000,
                    margin: 0,
                    //animateOut: 'fadeOut',
                    responsiveClass: true,
                    nav: false,
                    navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
                    responsive: {
                        0: {
                            items: 2,
                            nav: false
                        },
                        480: {
                            items: 4,
                            nav: false
                        },
                        600: {
                            items: 5,
                            nav: false
                        },
                        1000: {
                            items: 7,
                            nav: false,
                            loop: true,
                            margin: 0
                        }
                    }

                });
            }
            if ($('.categories-slider-new').length > 0) {
                $(".categories-slider-new").owlCarousel({
                    dots: true,
                    loop: true,
                    autoplay: true,
                    slideSpeed: 2000,
                    margin: 0,
                    //animateOut: 'fadeOut',
                    responsiveClass: true,
                    nav: false,
                    navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        480: {
                            items: 1,
                            nav: false
                        },
                        600: {
                            items: 2,
                            nav: false
                        },
                        1000: {
                            items: 2,
                            nav: false,
                            loop: true,
                            margin: 0
                        }
                    }

                });
            }

            if ($('.categories-slider2').length > 0) {
                $(".categories-slider2").owlCarousel({
                    dots: true,
                    loop: true,
                    autoplay: true,
                    slideSpeed: 2000,
                    margin: 0,
                    //animateOut: 'fadeOut',
                    responsiveClass: true,
                    nav: false,
                    navText: ["<i class=\"fa fa-angle-left\" aria-hidden=\"true\"></i>", "<i class=\"fa fa-angle-right\" aria-hidden=\"true\"></i>"],
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        480: {
                            items: 1,
                            nav: false
                        },
                        600: {
                            items: 2,
                            nav: false
                        },
                        1000: {
                            items: 4,
                            nav: false,
                            loop: true,
                            margin: 0
                        }
                    }

                });
            }

        });


    </script>

    <script>
        window.sr = ScrollReveal();

        sr.reveal('.img-left', {
            duration: 2000,
            origin: 'left',
            viewFactor: 0.2,
            distance: '250px',
            rotate: {x: 0, y: 0, z: 0},
            useDelay: 'always',
            opacity: .60,
            reset: true,
        });

        sr.reveal('.paraa-right', {
            duration: 2000,
            origin: 'right',
            viewFactor: 0.2,
            distance: '250px',
            rotate: {x: 0, y: 0, z: 0},
            useDelay: 'always',
            opacity: .60,
            reset: true,
        });

        sr.reveal('.col-plus', {
            duration: 2000,
            origin: 'top',
            viewFactor: 0.2,
            distance: '120px',
            rotate: {x: 0, y: 0, z: 0},
            useDelay: 'always',
            opacity: .60,
            reset: true,
        });

        sr.reveal('.col-plus2', {
            duration: 2000,
            origin: 'bottom',
            viewFactor: 0.2,
            distance: '120px',
            rotate: {x: 0, y: 0, z: 0},
            useDelay: 'always',
            opacity: .60,
            reset: true,
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.mega-container .border-lft a').hover(function () {
                var target = $(this).attr('href');
                $(this).parents('.mega-container').find('.novis-img').hide();
                $('#' + target).show();
            });

        });
    </script>

@endsection