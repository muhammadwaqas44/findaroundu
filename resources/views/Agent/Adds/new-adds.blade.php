@extends('layout-agent.app')

@section('content')

    <div class="body-container">
        @include('Agent.Adds.Partials.add-adds-menu-partial')
        <div class="right-rable-main" style="margin-bottom:0px;">

            @if(!empty(Request::old('title')))
                <div class="alert alert-warning">
                    Please Enter correct address..!!
                </div>
            @endif

            <div class="row">

                <div class="col-lg-12 col9-padding">
                    <div class="details-tabs-main">
                        <div class="detail-tab-main">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="create-adds" class="tab-pane active">
                                    <form method="post" action="{{route('agent.add-post')}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="first-tab-form-main">
                                            <div class="border-box">
                                                <span class="holiday-text">Create Adds</span>
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
                                                                <span class="primary-doctor-text">Add Title<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="title"
                                                                       placeholder="Enter Title"
                                                                       class="enter-text-field" value="{{Request::old('title')}}">
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
                                                                       class="enter-text-field" value="{{Request::old('price')}}" required>
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
                                                                <input type="text" name="address" id="address"
                                                                       placeholder="Enter Address"
                                                                       class="enter-text-field" value="{{Request::old('address')}}">
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
                                                                      class="enter-text-field">{{Request::old('description')}}</textarea>
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
    </div>

    <script>
        $(document).on('click', '.browse', function () {
            var file = $(this).parent().parent().parent().find('.file2');
            file.trigger('click');
        });
        $(document).on('change', '.file2', function () {
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
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