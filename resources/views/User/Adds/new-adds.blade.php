@extends('layout-user.app')

@section('content')

    {{--<div class="body-container">
        @include('User.Adds.Partials.add-adds-menu-partial')
        <div class="right-rable-main" style="margin-bottom:0px;">

            <div class="row">

                <div class="col-lg-12 col9-padding">
                    <div class="details-tabs-main">
                        <div class="detail-tab-main">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="create-adds" class="tab-pane active">
                                    <form method="post" action="{{route('user.add-post')}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="first-tab-form-main">
                                            <div class="border-box">
                                                <span class="holiday-text">Create Adds</span>
                                                <div class="row">
                                                    <div class="col-lg-5 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Add Title<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="title"
                                                                       placeholder="Enter Title"
                                                                       class="enter-text-field">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Condition<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                            <span class="search-drop-down5">
                                                                <select class="form-control" name="condition">
                                                                    <option value="Used">Used</option>
                                                                    <option value="New">New</option>
                                                                </select>
                                            				</span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Price<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="number" name="price"
                                                                       placeholder="Enter Price"
                                                                       class="enter-text-field" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Categories<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                            <span class="search-drop-down5">
                                                                <select class="form-control" name="category_id[]"
                                                                        multiple>
                                                                    @foreach($data['categories'] as $category)
                                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                                    @endforeach

                                                                </select>
	                                            			</span>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Gallery Images<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                               			<span class="search-drop-down5">
                                                            <input type="file" name="gallery_images[]"
                                                                   class="enter-text-field" required multiple>
	                                            		</span>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Facebook Url<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="facebook_url"
                                                                       placeholder="Facebook Url"
                                                                       class="enter-text-field">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Twitter Url<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="twitter_url"
                                                                       placeholder="Twitter Url"
                                                                       class="enter-text-field">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-7 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Main Image<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                               			<span class="search-drop-down5">
                                                            <input type="file" name="profile_image"
                                                                   class="enter-text-field" required>
	                                            		</span>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Country<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                               			<span class="search-drop-down5">
                                                            <select class="form-control" name="main_country_id"
                                                                    required>
                                                                @foreach($data['countries'] as $country)
                                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                                @endforeach
                                                            </select>
	                                            		</span>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">State<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                            <span class="search-drop-down5">
                                                            <select class="form-control" name="main_state_id">
                                                                @foreach($data['states'] as $state)
                                                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                                                @endforeach
                                                            </select>
	                                            		</span>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">City<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                            <span class="search-drop-down5">
                                                            <select class="form-control" name="main_city_id">
                                                                @foreach($data['cities'] as $city)
                                                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                                                @endforeach
                                                            </select>
	                                            		</span>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Address<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="address"
                                                                       placeholder="Enter Address"
                                                                       class="enter-text-field">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Gmail Url<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="gmail_url"
                                                                       placeholder="Gmail Url"
                                                                       class="enter-text-field">
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Youtube Video Url<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="video_url"
                                                                       placeholder="Youtube Code"
                                                                       class="enter-text-field">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>










                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="border-box">
                                                        <span class="holiday-text">Description</span>
                                                        <ul class="holiday-ul">
                                                            <textarea type="text" name="description"
                                                                      placeholder="Enter Description"
                                                                      class="enter-text-field"></textarea>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn-sm btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>--}}




    <div class="body-container">
        @include('layout-user.header')
        <div class="custom-container">
            <div class="add-listing2">
                <form method="post" action="{{route('user.add-post')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <span class="add-listing-heading">Add Listing</span>
                    <span class="get-more-exposure">Get more exposure</span>

                    @if(!empty(Request::old('title')))
                        <div class="alert alert-warning">
                            Please Enter correct address..!!
                        </div>
                    @endif


                    <div class="add-listing-details">
                        <span class="submit-listing">Submit your Add listing</span>
                        <p class="still-not-signed">You are still not <a href="#">signed in</a>: sign in, or if you don't have an account you can create one below by entering your email address/username. Your account details will be confirmed via email.</p>
                        <span class="submit-listing">Listing Add Details</span>
                        <ul class="listing-add-ul">
                            <li>
                                <span class="listing-title">Listing Title</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="text" placeholder="" name="title" class="listing-title-input" required value="{{Request::old('title')}}">
                            </li>
                            <li>
                                <span class="listing-title">Listing Description</span>
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
                                <span class="listing-title"> Address</span>
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
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="email" name="email" placeholder="" class="listing-title-input" required value="{{Request::old('email')}}">
                            </li>
                            <li>
                                <span class="listing-title">Listing Phone</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="text" name="phone" placeholder="" class="listing-title-input" required value="{{Request::old('phone')}}">
                            </li>


                        </ul>
                        <span class="submit-listing">Listing Specific</span>
                        <ul class="listing-add-ul">


                            <li>
                                <span class="listing-title">Add Categories</span>
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
                                    <span class="listing-title">Price </span>
                                    <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                    <input type="number" name="price" placeholder="" class="listing-title-input" required value="{{Request::old('price')}}">
                                </div>

                            </div>
                        </div>


                        <span class="submit-listing">Listing Media</span>
                        <ul class="listing-add-ul last-ul">

                            <li>
                                <span class="listing-title">Listing Featured Image</span>
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
                                <span class="listing-title">Listing Vedio</span>
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
                                <button class="preview-btn" type="submit">Save</button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>


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