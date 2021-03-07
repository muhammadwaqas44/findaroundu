@extends('layout-agent.app')

@section('content')

    <div class="body-container">
        @include('User.Business.Partials.add-business-menu-partial')
        <div class="right-rable-main">
            @if(!empty(Request::old('title')))
                <div class="alert alert-warning">
                    Please Enter correct address..!!
                </div>
            @endif
            <div class="col-lg-12 col9-padding">
                <div class="details-tabs-main">
                    <div class="detail-tab-main">

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="create-adds" class="tab-pane active">
                                <form method="post" action="{{route('agent.business-post')}}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="first-tab-form-main">
                                        <div class="border-box">
                                            <span class="holiday-text">Create Business</span>
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-12">

                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span class="primary-doctor-text">For User<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                                            <label class="payment-check">
                                                                <input type="checkbox" name="user_checkbox" value="1" class="user_checkbox">
                                                                <span></span>
	                                            			</label>

                                                        </div>
                                                    </div>





                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span class="primary-doctor-text">Business Title<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="text" name="title" placeholder="Enter Title" class="enter-text-field" value="{{Request::old('title')}}">
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


                                                </div>
                                                <div class="col-lg-7 col-sm-12">

                                                    <div class="row" id="user-information" style="display:none">
                                                        <div class="col-4">
                                                            <span class="primary-doctor-text">Users<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                                            <span class="search-drop-down5">

                                                                <select class="form-control" name="created_by" onchange="getUser(this.value)">
                                                                    <option value="">Select User </option>
                                                                    @foreach($data['users'] as $user)
                                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                                    @endforeach

                                                                </select>
	                                            			</span>

                                                        </div>
                                                    </div>

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
                                                            <span class="primary-doctor-text">Email<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                               			<span class="search-drop-down5">
                                                            <input   name="email"
                                                                     class="enter-text-field" required value="{{Request::old('email')}}">
	                                            		</span>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span class="primary-doctor-text">Phone<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                               			<span class="search-drop-down5">
                                                            <input   name="phone"
                                                                     class="enter-text-field" required value="{{Request::old('phone')}}">
	                                            		</span>

                                                        </div>
                                                    </div>
                                                </div>







                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="border-box">
                                                    <span class="holiday-text">Address</span>
                                                    <div class="row">
                                                        <div class="col-2">
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
                                                        <div class="col-2">
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
                                                        <div class="col-2">
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
                                                        <div class="col-2">
                                                            <span class="primary-doctor-text">Address<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="text" name="address"
                                                                   placeholder="Enter Address" id="address"
                                                                   class="enter-text-field" required value="{{Request::old('address')}}">
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-2">
                                                            <span class="primary-doctor-text">Facebook Url<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="text" name="facebook_url"
                                                                   placeholder="Facebook Url"
                                                                   class="enter-text-field" value="{{Request::old('facebook_url')}}">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-2">
                                                            <span class="primary-doctor-text">Twitter Url<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="text" name="twitter_url"
                                                                   placeholder="Twitter Url"
                                                                   class="enter-text-field" value="{{Request::old('twitter_url')}}">
                                                        </div>
                                                    </div>




                                                    <div class="row">
                                                        <div class="col-2">
                                                            <span class="primary-doctor-text">Gmail Url<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="text" name="gmail_url"
                                                                   placeholder="Gmail Url"
                                                                   class="enter-text-field" value="{{Request::old('gmail_url')}}">
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-2">
                                                            <span class="primary-doctor-text">Youtube Video Url<sup>*</sup></span>
                                                        </div>
                                                        <div class="col-8">
                                                            <input type="text" name="video_url"
                                                                   placeholder="Youtube Code"
                                                                   class="enter-text-field" value="{{Request::old('video_url')}}">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="border-box">
                                                    <span class="holiday-text">Working Hours</span>
                                                    <div class="sales-order">
                                                        <table class="table" id="item-add">
                                                            <thead>
                                                            <tr>
                                                                <th style="min-width:150px;">DAY</th>
                                                                <th style="width: 200px">Category</th>
                                                                <th style="width:200px;">FROM</th>
                                                                <th style="width:200px;">TO</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                        <span class="search-drop-down5">
                                                                            <select class="form-control" name="timing[day][]" required>
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
                                                                    <select class="form-control day_category" name="timing[day_category][]" required>
                                                                        <option value="enter_time">Enter Time</option>
                                                                        <option value="open_day">Open All Day</option>
                                                                        <option value="close_day">Closed All Day</option>

                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="number" name="timing[_from][]" min="0" max="12" class="search-item-name">
                                                                </td>
                                                                <td>
                                                                    <input type="number" min="0" name="timing[_to][]" max="12" class="search-item-name">
                                                                </td>

                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <a href="#" class="ad-row-text" id="add-another-item"><i
                                                                    class="fas fa-plus"></i> Add another item</a>
                                                        <table class="table" id="custom-line">
                                                            <tbody>
                                                            <!-- <tr>
                                                               <td style="min-width:150px;"><input type="search" placeholder="Search item name" class="search-item-name"></td>
                                                               <td style="width:70px;"><input type="number" placeholder="1" class="search-item-name"></td>
                                                               <td style="width:100px;">......</td>
                                                               <td style="min-width:100px;"><input type="number" placeholder="1" class="search-item-name"></td>
                                                               <td style="width:70px;"><input type="number" placeholder="1" class="search-item-name"></td>
                                                               <td style="width:70px;"><input type="number" placeholder="1" class="search-item-name"></td>
                                                               <td style="width:100px;"><span class="total-price">Rs 152.00 </span> <a href="#" class="close-row"><i class="fas fa-times"></i> </a></td>
                                                             </tr>-->
                                                            </tbody>
                                                        </table>

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
                                                                      class="enter-text-field">{{Request::old('video_url')}}</textarea>
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


    <script>

        $(document).on('click', '.browse', function () {
            var file = $(this).parent().parent().parent().find('.file2');
            file.trigger('click');
        });
        $(document).on('change', '.file2', function () {
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });


        $("#add-another-item").click(function (e) {
            e.preventDefault();
            $("#item-add tbody").append(`<tr>
                                            <td>
                                                <span class="search-drop-down5">
                                                    <select class="form-control" name="timing[day][]" required>
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
                                                <span class="search-drop-down5">
                                                    <select class="form-control day_category" name="timing[day_category][]"  required>
                                                        <option value="enter_time">Enter Time</option>
                                                        <option value="open_day">Open All Day</option>
                                                        <option value="close_day">Closed All Day</option>
                                                    </select>
                                                </span>
                                            </td>

                                            <td>
                                                <input type="number" min="0" name="timing[_to][]" max="12" class="search-item-name">
                                            </td>
                                            <td>
                                                <input type="number" min="0" name="timing[_from][]" max="12" class="search-item-name">
                                            </td>
                                          </tr>`);
            $(".form-control").select2();
        });


        $(document).ready(function(){
            $('body').on('change','.day_category',function(){
                var value = $(this).val();
                if(value ==  'open_day')
                {
                    $(this).parents('td').siblings('td').find(':input[type="number"]').hide();
                }
                else if(value ==  'close_day')
                {
                    $(this).parents('td').siblings('td').find(':input[type="number"]').hide();
                }
                else{
                    $(this).parents('td').siblings('td').find(':input[type="number"]').show();
                }
            });
        });
            function getUser (data) {
                if(data != '') {
                    $.ajax({
                        type: 'POST',
                        url: '{{route('get-user-address')}}',
                        data: {
                            '_token': '{{csrf_token()}}',
                            'user_id': data
                        },

                        success: function (response, status) {

                            if (response.result == 'success') {
                                $('#address').val(response.data.address);


                            }
                        }
                    });
                }
                else{
                }
            }
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
                var input = document.getElementById("address");
                autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */(document.getElementById('address')),
                    {types: ['geocode']});

            });

        }

        $('.user_checkbox').click(function(){

            if ($('input[name="user_checkbox"]').is(':checked')) {
                $('#user-information').show();
            }
            else{
                $('#user-information').hide();
            }

        });

    </script>


    @include('layout-agent.setup-js')
@endsection