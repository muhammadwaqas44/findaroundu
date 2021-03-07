@extends('layout.app')

@section('content')






    <div class="body-container">
        @include('layout-user.header')
        <div class="custom-container">
            <div class="add-listing2">
                <form method="post" action="{{route('user.business-post')}}"
                      enctype="multipart/form-data" id="create_business">
                    @csrf
                    <span class="add-listing-heading">Business Listing</span>
                    <span class="get-more-exposure">Get more exposure</span>
                    @if(!empty(Request::old('title')))
                        <div class="alert alert-warning">
                            Please Enter correct address..!!
                        </div>
                    @endif
                    <div class="add-listing-details">
                        <span class="submit-listing">Submit your Business listing</span>
                        <p class="still-not-signed">You are still not <a href="#">signed in</a>: sign in, or if you don't have an account you can create one below by entering your email address/username. Your account details will be confirmed via email.</p>
                        <span class="submit-listing">Listing Business Details</span>
                        <ul class="listing-add-ul">
                            <li>
                                <span class="listing-title">Listing Title</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="text" placeholder="" name="title" class="listing-title-input" required value="{{Request::old('title')}}">
                            </li>
                            <li>
                                <span class="listing-title">Listing Description</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <textarea class="listing-title-input" name="description" style="height:150px;" required>{{Request::old('description')}}</textarea>
                            </li>

                            <li>
                                <span class="listing-title">Enter City</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                   <select class="form-control" name="main_city_id" required>
                                                                @foreach($data['cities'] as $city)
                                           <option value="{{$city->id}}">{{$city->name}}</option>
                                       @endforeach
                                                            </select>
                            </span>
                            </li>


                            <li>
                                <span class="listing-title">Enter Country</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                   <select class="form-control" name="main_country_id"
                                           required>
                                    @foreach($data['countries'] as $country)
                                           <option value="{{$country->id}}">{{$country->name}}</option>
                                       @endforeach
                                </select>
                            </span>
                            </li>




                            <li>
                                <span class="listing-title">Listing Address</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="search"  name="address" id="job_location" class="listing-title-input" required value="{{Request::old('address')}}">
                            </li>
                            {{-- <li>
                                 <div class="iframe-listing">
                                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d217759.48983041072!2d74.21138241839253!3d31.48315688388588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190483e58107d9%3A0xc23abe6ccc7e2462!2sLahore%2C+Punjab%2C+Pakistan!5e0!3m2!1sen!2s!4v1550234485632" allowfullscreen></iframe>
                                 </div>
                             </li>--}}

                            <li>
                                <span class="listing-title">Listing Email Address</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="email" placeholder="" class="listing-title-input" name="email" required value="{{Request::old('email')}}">
                            </li>
                            <li>
                                <span class="listing-title">Listing Phone</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="text" name="phone" placeholder="" class="listing-title-input" required value="{{Request::old('phone')}}">
                            </li>



                        </ul>

                        <span class="listing-title">Pick Working Days</span>
                        <span class="question-icon">*</span>

                        <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                        <div class="col-md-8">
                            <ul class="working-day-ul">
                                <li><a href="javascript:void(0)" class="days">Monday</a></li>
                                <li><a href="javascript:void(0)"  class="days">Tuesday</a></li>
                                <li><a href="javascript:void(0)"  class="days">Wednesday</a></li>
                                <li><a href="javascript:void(0)"  class="days">Thursday</a></li>
                                <li><a href="javascript:void(0)"  class="days">Friday</a></li>
                                <li><a href="javascript:void(0)"  class="days">Saturday</a></li>
                                <li><a href="javascript:void(0)"  class="days">Sunday</a></li>
                            </ul>
                        </div>

                        <ul class="form-radio-ul Monday" >
                            <input type="hidden" name="monday[day]" class="day_hidden">
                            <li>
                                <div class="custom-control custom-radio">
                                    <label class="collection-radio">
                                        <input id="click-maindiv" type="radio" name="monday[day_category]" value="enter_time">
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
                                        <input type="time" placeholder="" name="monday[_from]" class="listing-title-input">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="listing-title">Time To</span>
                                        <input type="time" placeholder="" name="monday[_to]" class="listing-title-input">
                                    </div>

                                </div>
                            </div>


                        </ul>

                        <ul class="form-radio-ul Tuesday" style="display:none">
                            <input type="hidden" name="tuesday[day]" class="day_hidden">
                            <li>
                                <div class="custom-control custom-radio" >
                                    <label class="collection-radio">
                                        <input id="click-maindiv" type="radio" name="tuesday[day_category]" value="enter_time">
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
                                        <input type="time" placeholder="" name="tuesday[_from]" class="listing-title-input">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="listing-title">Time To</span>
                                        <input type="time" placeholder="" name="tuesday[_to]" class="listing-title-input">
                                    </div>

                                </div>
                            </div>

                        </ul>


                        <ul class="form-radio-ul Wednesday" style="display:none">
                            <input type="hidden" name="wednesday[day]" class="day_hidden">
                            <li>
                                <div class="custom-control custom-radio">
                                    <label class="collection-radio">
                                        <input id="click-maindiv" type="radio" name="wednesday[day_category]]" value="enter_time">
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
                                        <input type="time" placeholder="" name="wednesday[_from]" class="listing-title-input">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="listing-title">Time To</span>
                                        <input type="time" placeholder="" name="wednesday[_to]" class="listing-title-input">
                                    </div>

                                </div>
                            </div>

                        </ul>


                        <ul class="form-radio-ul Thursday" style="display:none">
                            <input type="hidden" name="thursday[day]" class="day_hidden">
                            <li>
                                <div class="custom-control custom-radio">
                                    <label class="collection-radio">
                                        <input id="click-maindiv" type="radio" name="thursday[day_category]" value="enter_time">
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
                                        <input type="time" placeholder="" name="thursday[_from]" class="listing-title-input">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="listing-title">Time To</span>
                                        <input type="time" placeholder="" name="thursday[_to]" class="listing-title-input">
                                    </div>

                                </div>
                            </div>

                        </ul>


                        <ul class="form-radio-ul Friday" style="display:none">
                            <input type="hidden" name="friday[day]" class="day_hidden">
                            <li>
                                <div class="custom-control custom-radio">
                                    <label class="collection-radio">
                                        <input id="click-maindiv" type="radio" name="friday[day_category]" value="enter_time">
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
                                        <input type="time" placeholder="" name="friday[_from]" class="listing-title-input">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="listing-title">Time To</span>
                                        <input type="time" placeholder="" name="friday[_to]" class="listing-title-input">
                                    </div>

                                </div>
                            </div>

                        </ul>


                        <ul class="form-radio-ul Saturday" style="display:none">
                            <input type="hidden" name="saturday[day]" class="day_hidden">
                            <li>
                                <div class="custom-control custom-radio">
                                    <label class="collection-radio">
                                        <input id="click-maindiv" type="radio" name="saturday[day_category]" value="enter_time">
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
                                        <input type="time" placeholder="" name="saturday[_from]" class="listing-title-input">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="listing-title">Time To</span>
                                        <input type="time" placeholder="" name="saturday[_to]" class="listing-title-input">
                                    </div>

                                </div>
                            </div>

                        </ul>


                        <ul class="form-radio-ul Sunday" style="display:none">
                            <input type="hidden" name="sunday[day]" class="day_hidden">
                            <li>
                                <div class="custom-control custom-radio">
                                    <label class="collection-radio">
                                        <input id="click-maindiv" type="radio" name="sunday[day_category]" value="enter_time">
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
                                        <input type="time" placeholder="" name="sunday[_from]" class="listing-title-input">
                                    </div>
                                    <div class="col-md-4">
                                        <span class="listing-title">Time To</span>
                                        <input type="time" placeholder="" name="sunday[_to]" class="listing-title-input">
                                    </div>

                                </div>
                            </div>

                        </ul>


                        <span class="submit-listing">Listing Specific</span>
                        <ul class="listing-add-ul">


                            <li>
                                <span class="listing-title">Add Categories</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                <select class="form-control" name="category_id[]" required>
                                    @foreach($data['categories'] as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </span>
                            </li>
                        </ul>
                        <div class="" style="width:100%;float:left;">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <span class="listing-title">Rate</span>
                                    <span class="question-icon">*</span>

                                    <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                    <input type="text" name="project_price" placeholder="" class="listing-title-input" required value="{{Request::old('project_price')}}">
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <span class="listing-title">Hourly</span>

                                    <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                    <input type="text" name="project_base" placeholder="" class="listing-title-input" value="Project Base" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="" style="width:100%;float:left;">
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <span class="listing-title">Rate</span>
                                    <span class="question-icon">*</span>

                                    <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                    <input type="text" name="hourly_price" placeholder="" class="listing-title-input" required value="{{Request::old('hourly_price')}}">
                                </div>

                                <div class="col-lg-4 col-sm-12">
                                    <span class="listing-title">Hourly</span>
                                    <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                    <input type="text" name="price_type[]" placeholder="" class="listing-title-input" readonly value="Hourly Base">
                                </div>


                            </div>
                        </div>



                        <span class="submit-listing">Listing Media</span>
                        <ul class="listing-add-ul last-ul">

                            <li>
                                <span class="listing-title">Listing Featured Image</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <label class="file-upload-media clearfix">
                                    <input name="profile_image"  type="file" required>
                                    <div class="imgs-media">Image :
                                        <span>No file Choosen</span>
                                    </div>
                                    <span class="camera-icon"><i class="fa fa-camera" aria-hidden="true"></i></span>
                                    <span class="maximum-size">Maximum image size: 64 MB</span>
                                </label>
                            </li>
                            <li>
                                <span class="listing-title">Listing Gallery</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <label class="file-upload-media clearfix">
                                    <input name="gallery_images[]" multiple type="file" required>
                                    <div class="imgs-media">Image :
                                        <span>No file Choosen</span>
                                    </div>
                                    <span class="camera-icon"><i class="fa fa-camera" aria-hidden="true"></i></span>
                                    <span class="maximum-size">Maximum image size: 64 MB</span>
                                </label>
                            </li>
                            <li>
                                <span class="listing-title">Listing Video</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <div class="camera-vedio">
                                    <input type="tel" name="video_url" placeholder="https://www.youtube.com/watch?v=xDHpcAFSMr0" class="listing-title-input" value="{{Request::old('video_url')}}">
                                    <span class="camera-span"><i class="fas fa-video"></i></span>
                                </div>

                            </li>

                        </ul>
                        <span class="submit-listing">Listing Social</span>
                        <ul class="listing-add-ul">
                            <li>
                                <span class="listing-title">Listing Social Networks</span>
                                <span class="question-icon">*</span>

                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            </li>
                            <li>
                                <div class="socials-inputs-fields">
                                    <input type="text" placeholder="" name="facebook_url"class="socials-inputs" value="{{Request::old('facebook_url')}}">
                                    <span class="facebook-spans"><i class="fab fa-facebook-square"></i></span>
                                </div>
                            </li>
                            <li>
                                <div class="socials-inputs-fields">
                                    <input type="text" placeholder="" name="twitter_url" class="socials-inputs" value="{{Request::old('twitter_url')}}">
                                    <span class="facebook-spans twitter-spans"><i class="fab fa-twitter"></i></span>
                                </div>
                            </li>
                            <li>
                                <div class="socials-inputs-fields">
                                    <input type="text" placeholder="" name="gmail_url" class="socials-inputs" value="{{Request::old('gmail_url')}}">
                                    <span class="facebook-spans google-spans"><i class="fab fa-google"></i></span>
                                </div>
                            </li>




                            <li>
                                <button class="preview-btn save_btn_business" type="button">Save</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        $('.days').click(function(){
            $('.working-day-ul').find('a').removeClass('active');
            $(this).addClass('active');

            $('.form-radio-ul').hide();
            $(this).parents('div').siblings('ul.'+$(this).text()).show();

            $(this).parents('div').siblings('ul.'+$(this).text()).children('.day_hidden').val($(this).text());

        });

        $("input[type='radio']").click(function(){
            var name = $(this).val();
            $('div .main-click-add').find('input').removeAttr('required');
            if(name ==  'enter_time')
            {
                $(this).parents('ul').children('div .main-click-add').css('display','inline-block');
                $(this).parents('ul').children('div .main-click-add').find('input').attr('required','true');
            }
            else{
                $('.main-click-add').hide();
            }
        });




        $().ready(function() {
            // validate the comment form when it is submitted

        });



        $('.save_btn_business').click(function(e){

            var  valid = $("#create_business").valid();

            if(valid) {
                var flag = true;

                if($('input[name^="monday"]').val() != '') {
                    flag =false;
                }
                else {

                }

                if($('input[name^="tuesday"]').val() != '') {

                    flag =false;

                }
                else {

                }

                if($('input[name^="wednesday"]').val() != '') {

                    flag =false;


                }
                else {

                }

                if($('input[name^="thursday"]').val() != '') {

                    flag =false;

                }
                else {

                }

                if($('input[name^="friday"]').val() != '') {
                    flag =false;
                }
                else {

                }

                if($('input[name^="saturday"]').val() != '') {
                    flag =false;
                }
                else {

                }

                if($('input[name^="sunday"]').val() != '') {
                    flag = false;
                }
                else {
                }

                if (flag == true) {

                    alert('atleast 1 of day is selected');
                    return false;
                }
            }
            else{

            }
            $("#create_business").submit();
        });

    </script>




    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuUN0YrQ-AAXx0SHcea3nN_aD25M28AGw&libraries=places&callback=initAutocomplete"
            async defer></script>
    <script>
        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };
    </script>


    <script>
        var placeSearch, autocomplete;
        var componentForm = {
            street_number: 'short_name',
            route: 'long_name',
            locality: 'long_name',
            administrative_area_level_1: 'short_name',
            country: 'long_name',
            postal_code: 'short_name'
        };

        function initAutocomplete() {
            // Create the autocomplete object, restricting the search to geographical
            // location types.
            $(function () {
                var input = document.getElementById("job_location");
                autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('job_location')),
                    {types: ['geocode']});

            });





        }
    </script>

    @include('layout-user.setup-js')
@endsection