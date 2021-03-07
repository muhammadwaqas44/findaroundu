<div class="fix-header">
    <div class="custom-container">
        <div class="logo-main-div">
            <a href="{{route('home')}}" class="logo-img">
                <img src="{{asset('main-assets/images/logo.png')}}" alt="logo">
            </a>
            @if(Route::currentRouteName() != 'home')

                @include('home.Partials.front-search-partial')
            @endif
        </div>
        <div class="header-right-main">

            {{--{{dd(Session::get('location'))}}--}}
           {{-- <ul class="navigation-main">


                <li>
                    <a href="#" href="javascript:void(0)" id="openBusinessModel" data-toggle="modal"
                       data-target="#business_popup">Businesses</a>

                </li>






                <li class="dropdown" id="countryDropDown">

                </li>

            </ul>--}}
            <span class="menu"><i class="fas fa-bars"></i> Menu</span>


            @if(Auth::check())

                <span class="profile-spanns">
                    <a class="img-profile" href="#"><img src="{{Auth::user()->profile_image}}" alt="imgs"></a>
                    <div class="menu-drop-profile">
                        <ul class="main-profile-ul">

                            <li><a href="{{route('user.dashboard')}}"><i
                                            class="fas fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fas fa-list-ul"></i> My Listing</a></li>

                            {{--<li><a href="javascript:void(0)" id="openModal" data-toggle="modal" data-target="#main-gl-account"><i class="fas fa-list-ul"></i>Create Jobs</a></li>--}}
                            <li><button class="logout-btn"><a href="{{route('logout')}}">Logout <i
                                                class="fas fa-sign-out-alt"></i></a></button></li>
                        </ul>
                    </div>
                </span>
                <ul class="header-right-login-btn">
                    <li class="dropdown">
                        <a href="#" class="flag-imgs" data-toggle="dropdown"><i class="fas fa-plus"></i> Post / Book Appointment</a>






                        <div class="dropdown-menu new-post-drop dropdown-menu-right">
                            <div class="popup-post-top-right-main">
                                <div class="row no-gutters">
                                    <div class="col-md-6 col-sm-12 post-pad">
                                        <div class="slide_1" href="javascript:void(0)" id="openQuoteModal" data-toggle="modal"
                                             data-target="#main-gl-account"><img class="img1" src="{{asset('main-assets/images/icon0.png')}}"><img class="img2" src="{{asset('main-assets/images/icon00.png')}}"><h2>Post Task / Job</h2><p>Lorem ipsum dolor sit amet
                                                consectetur adipiscing elit</p></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 post-pad">
                                        <div class="slide_1"><img class="img1" src="{{asset('main-assets/images/icon.png')}}"><img class="img2" src="{{asset('main-assets/images/icon10.png')}}"><h2>Post Quotation</h2><p>Lorem ipsum dolor sit amet
                                                consectetur adipiscing elit</p></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 post-pad">
                                        <div class="slide_1" href="javascript:void(0)" id="add-portfolio" data-toggle="modal"
                                             data-target="#create-add-popup"><img class="img1" src="{{asset('main-assets/images/icon1.png')}}"><img class="img2" src="{{asset('main-assets/images/icon11.png')}}"><h2>Post Free Add</h2><p>Lorem ipsum dolor sit amet
                                                consectetur adipiscing elit</p></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 post-pad">
                                        <div class="slide_1" href="javascript:void(0)" id="openBusinessModel" data-toggle="modal"
                                             data-target="#business_popup"><img class="img1" src="{{asset('main-assets/images/icon2.png')}}"><img class="img2" src="{{asset('main-assets/images/icon12.png')}}"><h2>Registered Your Business</h2><p>Lorem ipsum dolor sit amet
                                                consectetur adipiscing elit</p></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 post-pad">
                                        <div class="slide_1"><img class="img1" src="{{asset('main-assets/images/icon3.png')}}"><img class="img2" src="{{asset('main-assets/images/icon13.png')}}"><h2>Registered Your Services</h2><p>Lorem ipsum dolor sit amet
                                                consectetur adipiscing elit</p></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 post-pad">
                                        <div class="slide_1"><img class="img1" src="{{asset('main-assets/images/icon4.png')}}"><img class="img2" src="{{asset('main-assets/images/icon14.png')}}"><h2>Book Appointments</h2><p>Lorem ipsum dolor sit amet
                                                consectetur adipiscing elit</p></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>

                </ul>



            @else
                <ul class="header-right-login-btn">


                    <li><a class="bg-pnk" href="javascript:void(0)" id="openLoginPopup" data-toggle="modal"
                           data-target="#loginModal"><i class="fas fa-user"></i>Login</a></li>
                </ul>
            @endif

        </div>
    </div>
</div>


@include('home.Partials.login_popup')
{{--@include('home.Partials.request_quote_popup')--}}


<script>
    $(document).ready(function () {
        $(document).on('click', '#openLoginPopup', function () {

            $('input[name="openJobModal"]').remove();

        });

    });
</script>


<script>


    $(document).on('click', '.selected_category_top', function () {
        var categoryId = $(this).attr('cat-id-top');
        $('#category_id_top').val(categoryId);
        $('#selected-category-text-top').html($(this).attr('cat-name-top'));
    });

    $(document).on('click', '.changeCountry', function () {

        var country_name = $(this).text();
        var country_id = $(this).siblings('input').val();

        var para = {
            _token: "{{ csrf_token() }}",

            country : country_name,
            country_id : country_id,

        };


        if (country_id != '' && country_name != '') {

            var urld = "{{route('user.create-session')}}";

            $.post(urld, para, function (data, status) {


                getFlagHtml(data.data.allCountries,data.data.countryFlag);


                getSearchAreaHtml(data.data.allCities,data.data.cityId,data.data.city,data.data.country)


                getServiceHtml(data.data.services);

                getCityHtml(data.data.cities);
//                window.location.reload();
            });
        }
    });

    function getHomePageRecords() {
        var country_name = '{{Session::get('location.country')}}';
        var country_id = '{{Session::get('location.countryId')}}';

        var para = {
            _token: "{{ csrf_token() }}",
            country : country_name,
            country_id : country_id,
        };


        if(country_id != '' && country_name != '')
        {

            var urld = "{{route('user.create-session')}}";

            $.post(urld,para ,function (data, status) {


                getFlagHtml(data.data.allCountries,data.data.countryFlag);


                getSearchAreaHtml(data.data.allCities,data.data.cityId,data.data.city,data.data.country)


                getServiceHtml(data.data.services);

                getCityHtml(data.data.cities);
//                window.location.reload();
            });
        }
    }

</script>
<script>

    function valueReplace(name, id, hidden, cateId = null, parent = null) {

        if (parent != null) {
            document.getElementById('business-cat').innerHTML = name;
            document.getElementById("for_redirect").value = name;
            return;
        }

        if (cateId == null) {

            document.getElementById("for_redirect").value = name;

        } else {document.getElementById(id).innerHTML = name;
            document.getElementById(hidden).value = cateId;
        }
    }

</script>


