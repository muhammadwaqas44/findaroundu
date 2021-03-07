<style>
    .pac-logo {
        z-index: 999999 !important;
    }

    #map-business {
        height: 250px;
    }

    .select2-container {
        width: 100% !important;
    }

</style>

<div class="modal" id="business_popup" role="dialog"
     style="background: rgba(0, 0, 0, 0.9); padding-right: 17px; ">
    <div class="ad-port-popup">
        <form method="post" action="{{route('user.business-post')}}"
              enctype="multipart/form-data" id="create_business">
            <input type="hidden" name="front" value="front">
            <h1 class="auto-collection-text">Add Business
                <button id="closeBusinessModel" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </h1>
            <div class="add-portfolio-pad">
                @csrf



                    <div class="step-popup-main">
                        <ul class="steps steps-5">
                            <li><a href="#" id="one-step-business" title=""><em>Step 1: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a>
                            </li>
                            <li><a href="#" id="two-step-business" title=""><em>Step 2: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a>
                            </li>
                            <li id="three-step-business"><a href="#" title=""><em>Step 3: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a>
                            </li>
                            <li id="forth-step-business"><a href="#" title=""><em>Step 4: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a>
                            </li>

                            <li id="fifth-step-business"><a href="#" title=""><em>Step 5: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a>
                            </li>
                        </ul>
                    </div>


                    <div id="step1-business" class="step4-main-popup">
                        <div class="step1-main">

                            <span class="want-sell-text">Select Categories</span>
                            <span class="search-drop-down7 ">
							<select multiple id="business_categories" name="category_ids[]" onchange="getTag()"
                                    class="selection_box_business_tag">
                                {{--{{dd($data['individual_popular'])}}--}}
                                <option value="" disabled>Select Work</option>

                                @foreach($data['category'] as $key=>$professional)
                                    <option value="{{$professional->id}}">{{$professional->name}}</option>
                                @endforeach

							</select>
						</span>
                            <span class="category_id_error_business"
                                  style="display: none">Please select the value.</span>


                            <span class="tast-title">Business Title <small>*</small></span>
                            <input type="text" placeholder="" class="tast-input-field title-business" name="title">
                            <span class="task_name_error_business"
                                  style="display: none">Please enter business title.</span>


                            <div class="popup-tabs-main">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#text">Text  <small>*</small><i
                                                    class="fas fa-text-height"></i></a>
                                    </li>

                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="text" class="tab-pane active">
                                        <textarea class="step1-textarea" style="height:100px;"
                                                  id="step1-textarea-business" name="description"
                                                  placeholder="Business Description"></textarea>
                                    </div>


                                </div>
                                <span class="video_audio_error_business" style="display: none">Please enter atlease one of these fields.</span>

                            </div>

                            <span class="tast-title">Business Tags <small>*</small></span>
                            <span class="search-drop-down7">
						<select multiple name="tags[]" id="tags_business">
                            <option value="" disabled>Select Tag</option>

						</select>
                       <span class="tags_error_business" style="display: none">Please select tag.</span>

					</span>

                        </div>
                        <a href="#" class="arrow-right" id="first-step-btn-business"><i class="fas fa-arrow-right"></i></a>
                    </div>

                    <div id="step2-business" class="step3-main-popup" style="display:none;">


                        <div class="showHideDiv">

                            <div style="width: 100%;float: left;">
                                <div class="row">

                                    <div class="col-6">

                                        <span class="coun-text"> Country</span>
                                        <span class="select-country-drop-down">
                                        <select name="main_country_id" id="country_business"
                                                class=" ">
                                            @foreach($data['country'] as $country)
                                                @if(Session::has('location.country'))
                                                    <option value="{{$country->id}}" {{ $country->name == Session::get('location.country') ? 'selected':''  }}>{{$country->name}}</option>
                                                @else
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        </span>


                                        <span class="coun-text"> City</span>
                                        <span class="select-country-drop-down">
                                        <select name="main_city_id" id="city_business"
                                                class="selection_box_business ">
                                            @foreach($data['city'] as $city)
                                                @if(Session::has('location.cityId'))
                                                    <option value="{{$city->id}}" {{ $city->id == Session::get('location.cityId') ? 'selected':''  }}>{{$city->name}}</option>
                                                @else

                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        </span>


                                        <span class="tast-title"> Location <small>*</small></span>
                                        <input type="search" id="location_business" placeholder=""
                                               class="tast-input-field" name="location" id="fau_business_location">
                                    </div>

                                    <div class="col-6">

                                        <div class="step2-map">
                                            <div id="map-business"></div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                            <span class="location_error" style="display: none">Please location.</span>


                            <input type="hidden" id="business_lat" name="lat" class="lat">
                            <input type="hidden" id="business_long" name="lng" class="lng">


                        </div>


                        <a href="#" class="arrow-right" id="second-step-btn-business"><i class="fas fa-arrow-right"></i></a>
                        <a href="#" class="arrow-right2" onclick="backOnStep2()"><i class="fas fa-arrow-left"></i></a>
                    </div>

                    <div id="step3-business" style="display:none;">


                        <div class="row">
                            <div class="col-md-6 col-sm-12">

                                <span class="tast-title">Founded At <small>*</small></span>
                                <input type="text" class="tast-input-field founded_in" name="founded_in">
                                <span class="founded_in_error" style="display: none">Please enter Founded At.</span>
                                <span class="tast-title">Website <small>*</small></span>
                                <input type="text" class="tast-input-field website_business" style=""
                                       name="website_url">
                                <span class="website_address" style="display: none">Please enter Webstie Address</span>

                                <span class="tast-title">Total Employees</span>
                                <select type="text" class="tast-input-field employee_count_id" name="employee_count_id">
                                    @foreach($data['employee_count'] as $employees)
                                        <option value="{{$employees->id}}">{{$employees->name}}</option>
                                    @endforeach

                                </select>


                                <span class="tast-title">Video Link</span>
                                <input type="text" class="tast-input-field website_business" style=""
                                       name="video_url">
                                <span class="tast-title">Phone <small>*</small></span>
                                <input type="text" class="tast-input-field phone_business" style=""
                                       name="phone">
                                <span class="phone_business_error"
                                      style="display: none">Please enter Phone Number</span>


                            </div>
                            <div class="col-md-6 col-sm-12">

                                <span class="tast-title">Email <small>*</small></span>
                                <input type="text" class="tast-input-field email_business" style=""
                                       name="email">
                                <span class="email_business_error"
                                      style="display: none">Please enter Email Address</span>

                                <span class="tast-title">Facebook Url</span>
                                <input type="text" class="tast-input-field " name="facebook_url">


                                <span class="tast-title">Gmail Url</span>
                                <input type="text" class="tast-input-field " style="" name="gmail_url">


                                <span class="tast-title">Twitter Url</span>
                                <input type="text" class="tast-input-field " style="" name="twitter_url">


                            </div>
                        </div>

                        <!--
                                               <span class="tast-title" style="margin-top: 20px;">Do you have promo code?</span>
                                               <input type="text" class="required-man">
                                               <button type="button" value="send" class="apply-btn-popup">Apply</button>
                        -->


                        </span>

                        <a href="#" class="arrow-right2" onclick="backOnStep3()"><i class="fas fa-arrow-left"></i></a>
                        <a href="#" class="arrow-right" id="third-step-next"><i class="fas fa-arrow-right"></i></a>
                    </div>

                    <div id="step4-business" class="step4-main-popup"style="display:none;">
                        <div class="row no-gutters">
                            <span class="upload-photo">1 PROFILE IMAGE AND ATLEAST 1 GALLERY IMAGE IS NECESSARY TO UPLOAD</span>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="ed-profile2">
                                    <img id="header-preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                    <div class="edit-pencil2">
                                        <label>
                                            <input class="title-image" name="profile_image" onchange="readURL(this,'header-preview')" accept="image/*" type="file" >
                                            <i class="fas fa-pencil-alt"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <ul class="upload-ul ui-sortable" id="sortable">



                                    <li class="ui-sortable-handle">
                                        <div class="ed-profile3">
                                            <img id="gallery-business-1" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                            <div class="edit-pencil3">
                                                <label>
                                                    <input name="gallery_images[]" onchange="readURL(this,'gallery-business-1')" class="inputFile" type="file" required>
                                                    <i class="fas fa-pencil-alt"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ui-sortable-handle">
                                        <div class="ed-profile3">
                                            <img id="gallery-business-2" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                            <div class="edit-pencil3">
                                                <label>
                                                    <input class="inputFile"name="gallery_images[]"  onchange="readURL(this,'gallery-business-2')" type="file">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ui-sortable-handle">
                                        <div class="ed-profile3">
                                            <img id="gallery-business-3" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                            <div class="edit-pencil3">
                                                <label>
                                                    <input class="inputFile" name="gallery_images[]" onchange="readURL(this,'gallery-business-3')" type="file">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ui-sortable-handle">
                                        <div class="ed-profile3">
                                            <img id="gallery-business-4" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                            <div class="edit-pencil3">
                                                <label>
                                                    <input class="inputFile" name="gallery_images[]" onchange="readURL(this,'gallery-business-4')" type="file">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ui-sortable-handle">
                                        <div  class="ed-profile3">
                                            <img id="gallery-business-5" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                            <div class="edit-pencil3">
                                                <label>
                                                    <input class="inputFile" name="gallery_images[]" onchange="readURL(this,'gallery-business-5')" type="file">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="ui-sortable-handle">
                                        <div class="ed-profile3" >
                                            <img id="gallery-business-6" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                            <div class="edit-pencil3">
                                                <label>
                                                    <input class="inputFile" name="gallery_images[]"onchange="readURL(this,'gallery-business-6')" type="file">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                            <a href="#" class="arrow-right2" onclick="backOnStep4()"><i
                                        class="fas fa-arrow-left"></i></a>
                            <a href="#" class="arrow-right" onclick="nextOnStep5()"><i
                                        class="fas fa-arrow-right"></i></a>
                    </div>

                    <div id="step5-business" style="display:none;">
                        <div cass="row">

                            <span class="listing-title">Pick Working Days</span>
                            <span class="question-icon">*</span>

                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i
                                        class="far fa-question-circle"></i></a>
                            <div class="col-md-12">
                                <ul class="working-day-ul">
                                    <li><a href="javascript:void(0)" class="days">Monday</a></li>
                                    <li><a href="javascript:void(0)" class="days">Tuesday</a></li>
                                    <li><a href="javascript:void(0)" class="days">Wednesday</a></li>
                                    <li><a href="javascript:void(0)" class="days">Thursday</a></li>
                                    <li><a href="javascript:void(0)" class="days">Friday</a></li>
                                    <li><a href="javascript:void(0)" class="days">Saturday</a></li>
                                    <li><a href="javascript:void(0)" class="days">Sunday</a></li>
                                </ul>
                            </div>

                            <ul class="form-radio-ul Monday">
                                <input type="hidden" name="monday[day]" class="day_hidden">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input id="click-maindiv" type="radio" name="monday[day_category]"
                                                   value="enter_time">
                                            Enter Times<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="monday[day_category]" value="open_day">
                                            Open All Day<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="monday[day_category]" value="close_day">
                                            Closed All Day<span></span></label>
                                    </div>

                                </li>


                                <div class="main-click-add Monday" style="display:none">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="listing-title">Time From</span>
                                            <input type="time" placeholder="" name="monday[_from]"
                                                   class="listing-title-input">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="listing-title">Time To</span>
                                            <input type="time" placeholder="" name="monday[_to]"
                                                   class="listing-title-input">
                                        </div>

                                    </div>
                                </div>


                            </ul>

                            <ul class="form-radio-ul Tuesday" style="display:none">
                                <input type="hidden" name="tuesday[day]" class="day_hidden">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input id="click-maindiv" type="radio" name="tuesday[day_category]"
                                                   value="enter_time">
                                            Enter Times<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="tuesday[day_category]" value="open_day">
                                            Open All Day<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="tuesday[day_category]" value="close_day">
                                            Closed All Day<span></span></label>
                                    </div>

                                </li>
                                <div class="main-click-add Tuesday" style="display:none">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="listing-title">Time From</span>
                                            <input type="time" placeholder="" name="tuesday[_from]"
                                                   class="listing-title-input">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="listing-title">Time To</span>
                                            <input type="time" placeholder="" name="tuesday[_to]"
                                                   class="listing-title-input">
                                        </div>

                                    </div>
                                </div>

                            </ul>


                            <ul class="form-radio-ul Wednesday" style="display:none">
                                <input type="hidden" name="wednesday[day]" class="day_hidden">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input id="click-maindiv" type="radio" name="wednesday[day_category]]"
                                                   value="enter_time">
                                            Enter Times<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="wednesday[day_category]" value="open_day">
                                            Open All Day<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="wednesday[day_category]" value="close_day">
                                            Closed All Day<span></span></label>
                                    </div>

                                </li>

                                <div class="main-click-add Wednesday" style="display:none">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="listing-title">Time From</span>
                                            <input type="time" placeholder="" name="wednesday[_from]"
                                                   class="listing-title-input">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="listing-title">Time To</span>
                                            <input type="time" placeholder="" name="wednesday[_to]"
                                                   class="listing-title-input">
                                        </div>

                                    </div>
                                </div>

                            </ul>


                            <ul class="form-radio-ul Thursday" style="display:none">
                                <input type="hidden" name="thursday[day]" class="day_hidden">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input id="click-maindiv" type="radio" name="thursday[day_category]"
                                                   value="enter_time">
                                            Enter Times<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="thursday[day_category]" value="open_day">
                                            Open All Day<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="thursday[day_category]" value="close_day">
                                            Closed All Day<span></span></label>
                                    </div>

                                </li>
                                <div class="main-click-add Thursday" style="display:none">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="listing-title">Time From</span>
                                            <input type="time" placeholder="" name="thursday[_from]"
                                                   class="listing-title-input">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="listing-title">Time To</span>
                                            <input type="time" placeholder="" name="thursday[_to]"
                                                   class="listing-title-input">
                                        </div>

                                    </div>
                                </div>

                            </ul>


                            <ul class="form-radio-ul Friday" style="display:none">
                                <input type="hidden" name="friday[day]" class="day_hidden">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input id="click-maindiv" type="radio" name="friday[day_category]"
                                                   value="enter_time">
                                            Enter Times<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="friday[day_category]" value="open_day">
                                            Open All Day<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="friday[day_category]" value="close_day">
                                            Closed All Day<span></span></label>
                                    </div>

                                </li>
                                <div class="main-click-add Friday" style="display:none">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="listing-title">Time From</span>
                                            <input type="time" placeholder="" name="friday[_from]"
                                                   class="listing-title-input">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="listing-title">Time To</span>
                                            <input type="time" placeholder="" name="friday[_to]"
                                                   class="listing-title-input">
                                        </div>

                                    </div>
                                </div>

                            </ul>


                            <ul class="form-radio-ul Saturday" style="display:none">
                                <input type="hidden" name="saturday[day]" class="day_hidden">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input id="click-maindiv" type="radio" name="saturday[day_category]"
                                                   value="enter_time">
                                            Enter Times<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="saturday[day_category]" value="open_day">
                                            Open All Day<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="saturday[day_category]" value="close_day">
                                            Closed All Day<span></span></label>
                                    </div>

                                </li>

                                <div class="main-click-add Saturday" style="display:none">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="listing-title">Time From</span>
                                            <input type="time" placeholder="" name="saturday[_from]"
                                                   class="listing-title-input">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="listing-title">Time To</span>
                                            <input type="time" placeholder="" name="saturday[_to]"
                                                   class="listing-title-input">
                                        </div>

                                    </div>
                                </div>

                            </ul>


                            <ul class="form-radio-ul Sunday" style="display:none">
                                <input type="hidden" name="sunday[day]" class="day_hidden">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input id="click-maindiv" type="radio" name="sunday[day_category]"
                                                   value="enter_time">
                                            Enter Times<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="sunday[day_category]" value="open_day">
                                            Open All Day<span></span></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <label class="collection-radio">
                                            <input type="radio" name="sunday[day_category]" value="close_day">
                                            Closed All Day<span></span></label>
                                    </div>

                                </li>
                                <div class="main-click-add Sunday" style="display:none">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span class="listing-title">Time From</span>
                                            <input type="time" placeholder="" name="sunday[_from]"
                                                   class="listing-title-input">
                                        </div>
                                        <div class="col-md-4">
                                            <span class="listing-title">Time To</span>
                                            <input type="time" placeholder="" name="sunday[_to]"
                                                   class="listing-title-input">
                                        </div>

                                    </div>
                                </div>

                            </ul>


                            <div class="" style="width:100%;float:left;">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <span class="listing-title">Rate</span>
                                        <span class="question-icon">*</span>

                                        <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i
                                                    class="far fa-question-circle"></i></a>
                                        <input type="text" name="project_price" placeholder=""
                                               class="listing-title-input"
                                               required="" value="">
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <span class="listing-title">Hourly</span>

                                        <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i
                                                    class="far fa-question-circle"></i></a>
                                        <input type="text" name="project_base" placeholder=""
                                               class="listing-title-input"
                                               value="Project Base" readonly="">
                                    </div>
                                </div>
                            </div>
                            <div class="" style="width:100%;float:left;">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <span class="listing-title">Rate</span>
                                        <span class="question-icon">*</span>

                                        <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i
                                                    class="far fa-question-circle"></i></a>
                                        <input type="text" name="hourly_price" placeholder=""
                                               class="listing-title-input"
                                               required="" value="">
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <span class="listing-title">Hourly</span>
                                        <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i
                                                    class="far fa-question-circle"></i></a>
                                        <input type="text" name="price_type[]" placeholder=""
                                               class="listing-title-input"
                                               readonly="" value="Hourly Base">
                                    </div>


                                </div>
                            </div>

                            <input type="submit" value="Submit" class="submit_btn save_btn_business">


                            <a href="#" class="arrow-right" onclick="backOnStep5()"><i
                                        class="fas fa-arrow-left"></i></a>
                        </div>
                    </div>


            </div>
        </form>
    </div>
</div>


<link rel="stylesheet" href="{{asset('main-assets/css/demo.css')}}">
<link rel="stylesheet" href="{{asset('main-assets/icons/style.css')}}">

<script src="{{asset('main-assets/js/audiorecorder.js')}}"></script>
<script src="{{asset('main-assets/js/timer.js')}}"></script>

<script src="{{asset('main-assets/js/audiorecorder_worker_mp3.js')}}"></script>
<script src="{{asset('main-assets/js/audiorecorder.js')}}"></script>

<script>

    var recorder;

    @if(Auth::check())
        $(document).on('click', '#openBusinessModel', function () {
                $('#business_popup').modal();
        });

    @endif

    var date = new Date();
    date.setDate(date.getDate() - 1);
    $('.founded_in').datepicker({maxDate: new Date(), endDate: "today"});


    $('#first-step-btn-business').click(function () {
        var flag = 0;



        if ($('.title-business').val() == '') {
            $('.task_name_error_business').show();
            flag++;
        }
        else {
            $('.task_name_error_business').hide();
        }

        if ($('.selection_box_business_tag :selected').length == 0) {
            $('.category_id_error_business').show();
            flag++;
        }
        else {
            $('.category_id_error_business').hide();
        }



        if ($('#tags_business').val() == '') {
            $('.tags_error_business').show();
            flag++;
        }
        else {
            $('.tags_error_business').hide();
        }


        if ($('#step1-textarea-business').val().length == 0) {
            $('.video_audio_error_business').show();
            flag++;
        }
        else {
            $('.video_audio_error_business').hide();
        }

        if (flag != 0) {
            return false;
        }

        $('#step1-business').hide();
        $('#step2-business').show();
        $('#one-step-business').removeClass('active');
        $('#two-step-business').addClass('active');
        business_map();
    });

    $('#second-step-btn-business').click(function () {
        var flag = 0;


        if ($('#location_business').val() == '') {
            $('.location_error').show();
            flag++;
        }
        else {
            $('.location_error').hide();
        }


        if ($('#business_lat').val() == '' || $('#business_long').val() == '') {
            alert($('#business_lat').val() + 'lat');
            $('.location_error').show();
            flag++;
        }
        else {
            $('.location_error').hide();
        }


        if (flag != 0) {
            return false;
        }

        $('#step2-business').hide();
        $('#step3-business').show();
        $('#two-step-business').removeClass('active');
        $('#three-step-business').addClass('active');
    });


    $('#third-step-next').click(function () {
        var flag = 0;


        if ($('.founded_in').val() == '') {
            $('.founded_in_error').show();
            flag++;
        }
        else {
            $('.founded_in_error').hide();
        }


        if ($('.email_business').val() == '') {
            $('.email_business_error').show();
            flag++;
        }
        else {
            $('.email_business_error').hide();
        }


        if ($('.phone_business').val() == '') {
            $('.phone_business_error').show();
            flag++;
        }
        else {
            $('.phone_business_error').hide();
        }


        if ($('.website_business').val() == '') {

            $('.website_address').show();
            flag++;
        }
        else {
            $('.website_address').hide();
        }


        if (flag != 0) {
            return false;
        }

        $('#step3-business').hide();
        $('#step4-business').show();
        $('#three-step-business').removeClass('active');
        $('#forth-step-business').addClass('active');
    });


    function backOnStep4() {
        $('#step4-business').hide();
        $('#step3-business').show();
        $('#forth-step-business').removeClass('active');
        $('#three-step-business').addClass('active');
    }

    function nextOnStep5(){
        $('#step4-business').hide();
        $('#step5-business').show();
        $('#forth-step-business').removeClass('active');
        $('#fifth-step-business').addClass('active');
    }

    function backOnStep5() {
        $('#step5-business').hide();
        $('#step4-business').show();
        $('#fifth-step-business').removeClass('active');
        $('#forth-step-business').addClass('active');
    }

    function backOnStep2() {
        $('#step2-business').hide();
        $('#step1-business').show();
        $('#two-step-business').removeClass('active');
        $('#one-step-business').addClass('active');
    }
    function backOnStep3() {
        $('#step3-business').hide();
        $('#step2-business').show();
        $('#three-step-business').removeClass('active');
        $('#two-step-business').addClass('active');
    }


</script>


<script>


    $(document).ready(function () {

        $(".select2-multiple").select2({});
        $("#tags_business").select2({
            maximumSelectionLength: 7
        });

        $("#business_categories").select2({

        });

//        var globalFormData = new FormData();
        $('#video').change(function (event) {
            var files = event.target.files[0];              // also use like    var files = $('#imgInp')[0].files[0];
            var fileName = files.name;
            var fsize = files.size;
            var tmppath = URL.createObjectURL(files);
            var ext = fileName.split('.').pop().toLowerCase();

            if (ext == 'mp4') {
//                globalFormData.append('video',files);
                alert('save in form data');
            }

        });

        $('.submit_btn').click(function () {

            var flag = 0;

            if ($('input[name="number_of_people"]').val() == '') {
                $(".number_error").show();
                flag++;
            }
            else {
                $(".number_error").hide();
            }

            if ($('input[name="budget"]').val() == '') {
                $(".budget_error").show();
                flag++;
            }
            else {
                $(".budget_error").hide();
            }

            if (flag != 0) {
                return false;
            }


            var token = '{!! csrf_token() !!}';

            var globalFormData = new FormData($('.form_fau_job')[0]);


            $.ajax({

                type: "POST",
                url: "{{route('createJob')}}",
                data: globalFormData,
                cache: false,
                contentType: false,
                processData: false,

                success: function (response, status) {

                    if (response.result == 'success') {
                        alert(response.message);
                        $('.form_fau_job')[0].reset();
                        $('#main-gl-account').modal('hide');
                        $('#step3-business').hide();
                        $('#step1-business').show();
                        $('input[name="audio"]').remove();
                    }

                }
            });
        });


    });


    function getTag() {
        console.log($('#business_categories').val());


        var urld = "{{url('get-categories-tags')}}";
        console.log(urld);

        var token = '{!! csrf_token() !!}';

        var businessFormData = new FormData();
        businessFormData.append("categories[]", $('#business_categories').val());
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

                    alltags += ' <option value="' + value.id + '" >' + value.name + '</option>';

                });

                $("#tags_business").html(alltags);


            },
            error: function (data) {
                console.log(data)
            }
        });


    }


    function locationCheck(value) {
        if (value == 'physical') {
            $('.showHideDiv').show();
        }
        else {
            $('.showHideDiv').hide();
        }

    }

</script>


<script>   $('.days').click(function () {
        $('.working-day-ul').find('a').removeClass('active');
        $(this).addClass('active');

        $('.form-radio-ul').hide();
        $(this).parents('div').siblings('ul.' + $(this).text()).show();

        $(this).parents('div').siblings('ul.' + $(this).text()).children('.day_hidden').val($(this).text());

    });

    $("input[type='radio']").click(function () {
        var name = $(this).val();
        $('div .main-click-add').find('input').removeAttr('required');
        if (name == 'enter_time') {
            $(this).parents('ul').children('div .main-click-add').css('display', 'inline-block');
            $(this).parents('ul').children('div .main-click-add').find('input').attr('required', 'true');
        }
        else {
            $('.main-click-add').hide();
        }
    });

    $("#add-another-item").click(function (e) {
        e.preventDefault();
        $("#item-add tbody").append(`<tr>
                                            <td>
                                                <span class="search-drop-down5">
                                                    <select class="form-control" name="day[]" required>
                                                        <option value="Monday">Monday</option>
                                                        <option value="Tuseday">Tuseday</option>
                                                        <option value="Wednesday">Wednesday</option>
                                                        <option value="Thrusday">Thrusday</option>
                                                        <option value="Friday">Friday</option>
                                                        <option value="Saturday">Saturday</option>
                                                        <option value="Sunday">Sunday</option>
                                                    </select>
                                                </span>
                                            </td>
                                            <td>
                                                <input type="number" min="0" name="_to[]" max="12"class="search-item-name">
                                            </td>
                                            <td>
                                                <input type="number" min="0" name="_from[]" max="12"class="search-item-name">
                                            </td>
                                          </tr>`);
        $(".form-control").select2();
    });


    $('.save_btn_business').click(function (e) {

        var valid = $("#create_business").valid();

        if (valid) {
            var flag = true;

            if ($('input[name^="monday"]').val() != '') {
                flag = false;
            }
            else {

            }

            if ($('input[name^="tuesday"]').val() != '') {

                flag = false;

            }
            else {

            }

            if ($('input[name^="wednesday"]').val() != '') {

                flag = false;


            }
            else {

            }

            if ($('input[name^="thursday"]').val() != '') {

                flag = false;

            }
            else {

            }

            if ($('input[name^="friday"]').val() != '') {
                flag = false;
            }
            else {

            }

            if ($('input[name^="saturday"]').val() != '') {
                flag = false;
            }
            else {

            }

            if ($('input[name^="sunday"]').val() != '') {
                flag = false;
            }
            else {
            }

            if (flag == true) {

                alert('atleast 1 of day is selected');
                return false;
            }
        }
        else {

        }
        $("#create_business").submit();
    });


</script>

<script>
    function readURL(input,preview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+preview).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<script src="{{asset('main-assets/js/demo.js')}}"></script>




