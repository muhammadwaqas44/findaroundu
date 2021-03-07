@extends('layout.app')

@section('content')

    <section class="dir-alp-1 dir-pa-sp-top">
        <div class="container">
            <div class="row">
                <div class="dir-alp-con dir-alp-con-1">
                    <div class="col-md-3 dir-alp-con-left">
                        <div class="dir-alp-con-left-1">
                            <h3>Nearby Hotels(07)</h3></div>
                        <div class="dir-hom-pre dir-alp-left-ner-notb">
                            <ul>
                                <!--==========NEARBY LISTINGS============-->
                                <li>
                                    <a href="listing-details.html">
                                        <div class="list-left-near lln1"><img src="images/services/s1.jpg" alt=""></div>
                                        <div class="list-left-near lln2">
                                            <h5>Property Getaways</h5> <span>City: illunois, United States</span></div>
                                        <div class="list-left-near lln3"><span>5.0</span></div>
                                    </a>
                                </li>
                                <!--==========END NEARBY LISTINGS============-->
                                <!--==========NEARBY LISTINGS============-->
                                <li>
                                    <a href="listing-details.html">
                                        <div class="list-left-near lln1"><img src="images/services/s2.jpg" alt=""></div>
                                        <div class="list-left-near lln2">
                                            <h5>Home Trends</h5> <span>City: illunois, United States</span></div>
                                        <div class="list-left-near lln3"><span>4.0</span></div>
                                    </a>
                                </li>
                                <!--==========END NEARBY LISTINGS============-->
                                <!--==========NEARBY LISTINGS============-->
                                <li>
                                    <a href="listing-details.html">
                                        <div class="list-left-near lln1"><img src="images/services/s3.jpg" alt=""></div>
                                        <div class="list-left-near lln2">
                                            <h5>Security System</h5> <span>City: illunois, United States</span></div>
                                        <div class="list-left-near lln3"><span>4.4</span></div>
                                    </a>
                                </li>
                                <!--==========END NEARBY LISTINGS============-->
                                <!--==========NEARBY LISTINGS============-->
                                <li>
                                    <a href="listing-details.html">
                                        <div class="list-left-near lln1"><img src="images/services/s4.jpg" alt=""></div>
                                        <div class="list-left-near lln2">
                                            <h5>Distance Educations</h5> <span>City: illunois, United States</span>
                                        </div>
                                        <div class="list-left-near lln3"><span>3.8</span></div>
                                    </a>
                                </li>
                                <!--==========END NEARBY LISTINGS============-->
                                <!--==========NEARBY LISTINGS============-->
                                <li>
                                    <a href="listing-details.html">
                                        <div class="list-left-near lln1"><img src="images/services/s5.jpg" alt=""></div>
                                        <div class="list-left-near lln2">
                                            <h5>Fresh Cake Shops</h5> <span>City: illunois, United States</span></div>
                                        <div class="list-left-near lln3"><span>4.8</span></div>
                                    </a>
                                </li>
                                <!--==========END NEARBY LISTINGS============-->
                                <!--==========NEARBY LISTINGS============-->
                                <li>
                                    <a href="listing-details.html">
                                        <div class="list-left-near lln1"><img src="images/services/s6.jpg" alt=""></div>
                                        <div class="list-left-near lln2">
                                            <h5>Chicago Automobiles</h5> <span>City: illunois, United States</span>
                                        </div>
                                        <div class="list-left-near lln3"><span>5.0</span></div>
                                    </a>
                                </li>
                                <!--==========END NEARBY LISTINGS============-->
                                <!--==========NEARBY LISTINGS============-->
                                <li>
                                    <a href="listing-details.html">
                                        <div class="list-left-near lln1"><img src="images/services/s7.jpg" alt=""></div>
                                        <div class="list-left-near lln2">
                                            <h5>Bike Service Centers</h5> <span>City: illunois, United States</span>
                                        </div>
                                        <div class="list-left-near lln3"><span>5.0</span></div>
                                    </a>
                                </li>
                                <!--==========END NEARBY LISTINGS============-->
                            </ul>
                        </div>
                        <!--==========Sub Category Filter============-->
                        <div class="dir-alp-l3 dir-alp-l-com">
                            <h4>Sub Category Filter</h4>
                            <div class="dir-alp-l-com1 dir-alp-p3">
                                <form action="#">
                                    <ul>
                                        <li>
                                            <input type="checkbox" id="scf1">
                                            <label for="scf1">Hortels &amp; Resorts</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="scf2">
                                            <label for="scf2">Fitness Care</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="scf3">
                                            <label for="scf3">Educations</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="scf4">
                                            <label for="scf4">Property</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="scf5">
                                            <label for="scf5">Home Services</label>
                                        </li>
                                    </ul>
                                </form>
                                <a href="#!" class="list-view-more-btn">view more</a></div>
                        </div>
                        <!--==========End Sub Category Filter============-->
                        <!--==========Sub Category Filter============-->
                        <div class="dir-alp-l3 dir-alp-l-com">
                            <h4>Distance</h4>
                            <div class="dir-alp-l-com1 dir-alp-p3">
                                <form>
                                    <ul>
                                        <li>
                                            <input class="with-gap" name="group1" type="radio" id="ldis1">
                                            <label for="ldis1">00 to 02km</label>
                                        </li>
                                        <li>
                                            <input class="with-gap" name="group1" type="radio" id="ldis2">
                                            <label for="ldis2">02 to 05km</label>
                                        </li>
                                        <li>
                                            <input class="with-gap" name="group1" type="radio" id="ldis3">
                                            <label for="ldis3">05 to 10km</label>
                                        </li>
                                        <li>
                                            <input class="with-gap" name="group1" type="radio" id="ldis4">
                                            <label for="ldis4">10 to 20km</label>
                                        </li>
                                        <li>
                                            <input class="with-gap" name="group1" type="radio" id="ldis5">
                                            <label for="ldis5">20 to 30km</label>
                                        </li>
                                    </ul>
                                </form>
                                <a href="#!" class="list-view-more-btn">view more</a></div>
                        </div>
                        <!--==========End Sub Category Filter============-->
                        <!--==========Sub Category Filter============-->
                        <div class="dir-alp-l3 dir-alp-l-com">
                            <h4>Ratings</h4>
                            <div class="dir-alp-l-com1 dir-alp-p3">
                                <form>
                                    <ul>
                                        <li>
                                            <input type="checkbox" class="filled-in" id="lr1">
                                            <label for="lr1"> <span class="list-rat-ch"> <span>5.0</span> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> </span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" class="filled-in" id="lr2">
                                            <label for="lr2"> <span class="list-rat-ch"> <span>4.0</span> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> </span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" class="filled-in" id="lr3">
                                            <label for="lr3"> <span class="list-rat-ch"> <span>3.0</span> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> </span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" class="filled-in" id="lr4">
                                            <label for="lr4"> <span class="list-rat-ch"> <span>2.0</span> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> </span>
                                            </label>
                                        </li>
                                        <li>
                                            <input type="checkbox" class="filled-in" id="lr5">
                                            <label for="lr5"> <span class="list-rat-ch"> <span>1.0</span> <i
                                                            class="fa fa-star" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> <i
                                                            class="fa fa-star-o" aria-hidden="true"></i> </span>
                                            </label>
                                        </li>
                                    </ul>
                                </form>
                                <a href="javascript:void(0);" class="list-view-more-btn">view more</a></div>
                        </div>
                        <!--==========End Sub Category Filter============-->
                    </div>
                    <div class="col-md-9 dir-alp-con-right">
                        <div class="dir-alp-con-right-1">
                            <div class="row">

                                @foreach($data['all_services'] as $service)
                                    @component('User.Services.Partials.front-listing-services-partial',['service' => $service])
                                    @endcomponent

                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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