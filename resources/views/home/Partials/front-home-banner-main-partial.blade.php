<div class="banner-main">
    <video autoplay muted loop id="myVideo">
        <source src="{{ asset('main-assets/vedio/vedio.mp4') }}" type="video/mp4">
    </video>
    <div class="absolute-new-bnnr">
        <div class="new-bg-clr">
            <div class="container">
                <span class="right-services animation pulse">Connect With The Right Service Experts</span>
                <span class="find-busines">Find B2B & B2C business contact addresses, Phone number user ra</span>


                <ul class="nav nav-tabs padd-ultabs" role="tablist">

                    <li class="nav-item selected_category" cat-id="Professionals" cat-name="Professionals">
                        <a class="nav-link active" data-toggle="tab" href="#home">
                            <i class="fas fa-user-tie"></i> Professionals
                        </a>
                    </li>

                    <li class="nav-item selected_category" cat-id="Business" cat-name="Business"
                        onclick="addRedirect('business-hidden-for-redirect','Business Directory')">
                        <a class="nav-link" data-toggle="tab" href="#home1"><i class="fas fa-users"></i>
                            Business</a>
                    </li>

                    <li class="nav-item selected_category"
                        onclick="addRedirect('classified-hidden-for-redirect','Classified')" cat-id="Classified"
                        cat-name="Adds">
                        <a class="nav-link" data-toggle="tab" href="#home2"><i class="fab fa-buysellads"></i>
                            Classified</a>
                    </li>

                    {{--   <li class="nav-item selected_category" cat-id="Shopping" cat-name="Shopping">
                           <a class="nav-link" data-toggle="tab" href="#home3"><i class="fas fa-shopping-cart"></i>
                               Shopping</a>
                       </li>

                       <li class="nav-item selected_category" cat-id="Adds" cat-name="Adds">
                           <a class="nav-link" data-toggle="tab" href="#home4"><i class="fas fa-building"></i> Work</a>
                       </li>--}}

                </ul>

                <div class="banner-search-main">
                    <div class="tab-content">
                        <div id="home" class="tab-pane active">
                            <div class="location-input-banner2">
                                <div class="select-category-drop">
                                    <div class="cat-select">
                                        <a href="#" style="color: #fff;"><i class="fas fa-bars"></i> Category
                                            <i class="fas fa-angle-down angle-dwn"></i></a>
                                        <div class="mega-cat-main">
                                            <div class="row">
                                                <div class="colum-ul" style="box-shadow:none;column:4">
                                                    @foreach($data['professional'] as $professional)
                                                        <div class="colim-li" style="">
                                                            <span class="cat-heading">{{$professional->name}}</span>


                                                            {{--{{dd($adds->childCate)}}--}}
                                                            @foreach($professional->childCate as $childCategory)
                                                                <a href="javascript:void(0)"
                                                                   class="colum-in-text selected_category"
                                                                   cat-id="{{ $childCategory->id }}"
                                                                   cat-name="{{ $childCategory->name }}">
                                                                    {{--<img src="{{$childCategory->icon_image}}" alt="tutor">--}}
                                                                    {{ $childCategory->name }}
                                                                </a>
                                                            @endforeach

                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="search-right-main-index">
												<span class="country-drop-down citySelectBox">


												<span class="absolute-country-text"><i class="far fa fa-flag"></i> Choose City</span>
										   </span>
                                        <span class="input-calc-width">{{--{{dd(Session::get('location'))}}--}}
                                            <input type="search" id="home_page_autofill"
                                                   placeholder="@if(Session::has('location')) {{Session::get('location')['city']}}, {{Session::get('location')['country']}} @else Lahore, Pakistan @endif"
                                                   class="search-here">
                                            <!--<span class="absolute-country-text2"><i class="fas fa-search"></i></span>-->
												<span class="absolute-country-text"><i class="far fa fa-map-marker"></i> Choose Location</span>
										   </span>

                                        <button type="submit" class="message-btn"><i class="fas fa-search"></i>
                                        </button>

                                    </div>
                                    {{--<input type="hidden" id="category_id" name="category_id" value="">--}}

                                </div>

                            </div>
                        </div>
                        <div id="home1" class="tab-pane fade">
                            <form method="get" action="{{route('user.front-business')}}">
                                <input type="hidden" name="category_id" id="business-hidden-category">
                                <input type="hidden" name="for_redirect" id="business-hidden-for-redirect">
                                <div class="location-input-banner2">
                                    <div class="select-category-drop">
                                        <div class="cat-select">
                                            <a href="#" style="color: #fff;">

                                                <i class="fas fa-bars"></i> <span
                                                        id="business-cat-name">Category  </span>

                                                <i class="fas fa-angle-down angle-dwn"></i></a>
                                            <div class="mega-cat-main">
                                                <div class="row">
                                                    <div class="colum-ul" style="box-shadow:none;column:4">
                                                        @foreach($data['business'] as $business)
                                                            <div class="colim-li" style="">
                                                                <span class="cat-heading"
                                                                      onclick="valueReplaceMain('{{$business->name}}',{{$business->id}},'business-cat-name','business-hidden-category','business-hidden-for-redirect','Business Directory')">{{$business->name}}</span>


                                                                {{--{{dd($adds->childCate)}}--}}
                                                                @foreach($business->childCate as $childCategoryB)
                                                                    <a href="javascript:void(0)"
                                                                       class="colum-in-text selected_category"
                                                                       onclick="valueReplaceMain('{{$childCategoryB->name}}',{{$childCategoryB->id}},'business-cat-name','business-hidden-category','business-hidden-for-redirect','Business Directory')">
                                                                        {{--<img src="{{$childCategory->icon_image}}" alt="tutor">--}}
                                                                        {{ $childCategoryB->name }}
                                                                    </a>
                                                                @endforeach

                                                            </div>
                                                        @endforeach
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="search-right-main-index">

												<span class="country-drop-down citySelectBox">


												<span class="absolute-country-text"><i class="far fa fa-flag"></i> Choose City</span>
										   </span>
                                            <span class="input-calc-width">
                                            <input type="search" id="home1_page_autofill" name="search_location"
                                                   placeholder="Lahore, Pakistan"
                                                   class="search-here">
                                                <!--<span class="absolute-country-text2"><i class="fas fa-search"></i></span>-->
												<span class="absolute-country-text"><i class="far fa fa-map-marker"></i> Choose Location</span>
										   </span>

                                            <button type="submit" class="message-btn"><i class="fas fa-search"></i>
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div id="home2" class="tab-pane fade">
                            <div class="location-input-banner2">
                                <form method="get" action="{{route('user.front-business')}}">
                                    <input type="hidden" name="category_id" id="classified-hidden-category">
                                    <input type="hidden" name="for_redirect" id="classified-hidden-for-redirect">
                                    <div class="select-category-drop">
                                        <div class="cat-select">
                                            <a href="#" style="color: #fff;"><i class="fas fa-bars"></i> <span
                                                        id="classified-cat-name">Category</span>
                                                <i class="fas fa-angle-down angle-dwn"></i></a>
                                            <div class="mega-cat-main">
                                                <div class="row">


                                                    <div class="colum-ul" style="box-shadow:none;column:4">
                                                        @foreach($data['classified'] as $classified)
                                                            <div class="colim-li" style="">
                                                                <span class="cat-heading"
                                                                      onclick="valueReplaceMain('{{$classified->name}}',{{$classified->id}},'classified-cat-name','classified-hidden-category','classified-hidden-for-redirect','Classified')">{{$classified->name}}</span>


                                                                {{--{{dd($adds->childCate)}}--}}
                                                                @foreach($classified->childCate as $childCategoryC)
                                                                    <a href="javascript:void(0)"
                                                                       class="colum-in-text selected_category"
                                                                       onclick="valueReplaceMain('{{$childCategoryC->name}}',{{$childCategoryC->id}},'classified-cat-name','classified-hidden-category','classified-hidden-for-redirect','Classified')">
                                                                        {{--<img src="{{$childCategory->icon_image}}" alt="tutor">--}}
                                                                        {{ $childCategoryC->name }}
                                                                    </a>
                                                                @endforeach

                                                            </div>
                                                        @endforeach
                                                    </div>


                                                </div>
                                            </div>


                                        </div>
                                        <div class="search-right-main-index">
												<span class="country-drop-down citySelectBox">


												<span class="absolute-country-text"><i class="far fa fa-flag"></i> Choose City</span>
										   </span>
                                            <span class="input-calc-width">
                                            <input type="search" id="home2_page_autofill" placeholder="Lahore, Pakistan"
                                                   class="search-here">
                                                <!--<span class="absolute-country-text2"><i class="fas fa-search"></i></span>-->
												<span class="absolute-country-text"><i class="far fa fa-map-marker"></i> Choose Location</span>
										   </span>

                                            <button type="submit" class="message-btn"><i class="fas fa-search"></i>
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div id="home3" class="tab-pane fade">
                            <div class="location-input-banner2">
                                <div class="select-category-drop">
                                    <div class="cat-select">
                                        <a href="#" style="color: #fff;"><i class="fas fa-bars"></i> Category
                                            <i class="fas fa-angle-down angle-dwn"></i></a>
                                        <div class="mega-cat-main">
                                            <div class="row">
                                                <div class="col-2">
                                                    <span class="cat-heading">Mobiles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Tablets</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                        <li><a href="#">Mobile Phones</a></li>
                                                    </ul>
                                                    <span class="cat-heading">Vehicles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Car</a></li>
                                                        <li><a href="#">Car Accessories</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                        <li><a href="#">Buses, Van & Trucks</a></li>
                                                        <li><a href="#">Rikshaw & chingchi</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-2">
                                                    <span class="cat-heading">Mobiles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Tablets</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                        <li><a href="#">Mobile Phones</a></li>
                                                    </ul>
                                                    <span class="cat-heading">Vehicles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Car</a></li>
                                                        <li><a href="#">Car Accessories</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                        <li><a href="#">Buses, Van & Trucks</a></li>
                                                        <li><a href="#">Rikshaw & chingchi</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-2">
                                                    <span class="cat-heading">Mobiles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Tablets</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                        <li><a href="#">Mobile Phones</a></li>
                                                    </ul>
                                                    <span class="cat-heading">Vehicles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Car</a></li>
                                                        <li><a href="#">Car Accessories</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                        <li><a href="#">Buses, Van & Trucks</a></li>
                                                        <li><a href="#">Rikshaw & chingchi</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-2">
                                                    <span class="cat-heading">Mobiles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Tablets</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                        <li><a href="#">Mobile Phones</a></li>
                                                    </ul>
                                                    <span class="cat-heading">Vehicles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Car</a></li>
                                                        <li><a href="#">Car Accessories</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                        <li><a href="#">Buses, Van & Trucks</a></li>
                                                        <li><a href="#">Rikshaw & chingchi</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-2">
                                                    <span class="cat-heading">Mobiles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Tablets</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                        <li><a href="#">Mobile Phones</a></li>
                                                    </ul>
                                                    <span class="cat-heading">Vehicles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Car</a></li>
                                                        <li><a href="#">Car Accessories</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                        <li><a href="#">Buses, Van & Trucks</a></li>
                                                        <li><a href="#">Rikshaw & chingchi</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-2">
                                                    <span class="cat-heading">Mobiles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Tablets</a></li>
                                                        <li><a href="#">Accessories</a></li>
                                                        <li><a href="#">Mobile Phones</a></li>
                                                    </ul>
                                                    <span class="cat-heading">Vehicles</span>
                                                    <ul class="mega-cat-ul">
                                                        <li><a href="#">Car</a></li>
                                                        <li><a href="#">Car Accessories</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                        <li><a href="#">Buses, Van & Trucks</a></li>
                                                        <li><a href="#">Rikshaw & chingchi</a></li>
                                                        <li><a href="#">Spare Parts</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="search-right-main-index">
												<span class="country-drop-down">
												<select>
                                                    @foreach($data['city'] as $city)
                                                        <option {{$city->id}}>{{$city->name}}</option>
                                                    @endforeach

												</select>
												<span class="absolute-country-text"><i class="far fa fa-flag"></i> Choose City</span>
										   </span>
                                        <span class="input-calc-width">
                                            <input type="search" id="home3_page_autofill" placeholder="Lahore, Pakistan"
                                                   class="search-here">
                                            <!--<span class="absolute-country-text2"><i class="fas fa-search"></i></span>-->
												<span class="absolute-country-text"><i class="far fa fa-map-marker"></i> Choose Location</span>
										   </span>

                                        <button type="submit" class="message-btn"><i class="fas fa-search"></i>
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="home4" class="tab-pane fade">
                            <div class="location-input-banner2">
                                <div class="select-category-drop">
                                    <div class="cat-select">
                                        <a href="#" style="color: #fff;"><i class="fas fa-bars"></i> Category
                                            <i class="fas fa-angle-down angle-dwn"></i></a>
                                        <div class="mega-cat-main">
                                            <div class="row">
                                                @foreach($data['professional'] as $professional)
                                                    <div class="col-2">
                                                        <span class="cat-heading">{{$professional->name}}</span>

                                                        <ul class="mega-cat-ul">
                                                            {{--{{dd($adds->childCate)}}--}}
                                                            @foreach($professional->childCate as $childCategory)
                                                                <li class="selected_category"
                                                                    cat-id="{{ $childCategory->id }}"
                                                                    cat-name="{{ $childCategory->name }}">
                                                                    <a href="javascript:void(0)">
                                                                        {{--<img src="{{$childCategory->icon_image}}" alt="tutor"> --}}
                                                                        {{ $childCategory->name }}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="search-right-main-index">
												<span class="country-drop-down citySelectBox">


												<span class="absolute-country-text"><i class="far fa fa-flag"></i> Choose City</span>
										   </span>
                                            <span class="input-calc-width">
                                            <input type="search" id="home4_page_autofill" placeholder="Lahore, Pakistan"
                                                   class="search-here">
                                                <!--<span class="absolute-country-text2"><i class="fas fa-search"></i></span>-->
												<span class="absolute-country-text"><i class="far fa fa-map-marker"></i> Choose Location</span>
										   </span>

                                            <button type="submit" class="message-btn"><i class="fas fa-search"></i>
                                            </button>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-slider">
                    <div id="owl-demo" class="owl-carousel">
                        @foreach($data['individual_popular'] as $popular)
                            <div class="item">
                                <div class="slider-hover">
                                    <a href="{{route('user.front-services',['category_id' => $popular->id ])}}"
                                       class="doctor-main-hover">
                                            <span class="slider-img"><img src="{{$popular->icon_image}}"
                                                                          alt="tutor"></span>
                                        <span class="tutur-text">{{$popular->name}}</span>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        initAutocompleteBusinessMain();
    });

    function valueReplaceMain(categoryName, categoryId, categoryMainNameReplace, hiddenInputCategoryId, hiddenInputForRedirect, redirectInputName) {
        document.getElementById(hiddenInputCategoryId).value = categoryId;
        document.getElementById(categoryMainNameReplace).innerHTML = categoryName;
        document.getElementById(hiddenInputForRedirect).value = redirectInputName;
    }

    function initAutocompleteBusinessMain() {


        if (document.getElementById("home1_page_autofill")) {
            //alert(1);
            autocompletechecking = new google.maps.places.Autocomplete(
                document.getElementById('home1_page_autofill'), {types: ['geocode']});
            console.log(autocompletechecking);
        }
    }


    function addRedirect(inputValue, redirectKey) {
        document.getElementById(inputValue).value = redirectKey;
    }

</script>