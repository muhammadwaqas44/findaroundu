@extends('layout-user.app')

@section('user-portal-heading','My Profile')

@section('content')
    @include('layout-user.user-portal-heading')

    <div class="body-container">
        @include('layout-user.header')
        <div class="dashboard-main">
            @include('layout-user.sidebar')
            <div class="dashboard-right-main">
                   <span><h2 style="font-size: 22px;
    font-weight: 600 !important;font-family: 'OpenSans-Light';
    color: #3d0941;"> My Profile </h2></span>

                <form action="{{route('user.edit-user')}}"
                method="post" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label class="f-name">First Name<sup>*</sup></label>
                        <input type="text" name="first_name" value="{{Auth::user()->userInfo->first_name}}" class="account-input">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="f-name">Last name<sup>*</sup></label>
                        <input type="text" name="last_name" value="{{Auth::user()->userInfo->last_name}}" class="account-input">
                    </div>
                    <div class="col-12">
                        <label class="f-name">User name<sup>*</sup></label>
                        <input type="text" name="name" class="account-input" value="{{Auth::user()->name}}">
                        <em class="account-section">This will be how your name will be displayed in the account section and in reviews</em>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="f-name">Email address<sup>*</sup></label>
                        <input type="text" @if(!empty(Auth::user()->email)) disabled @endif name="email" class="account-input" value="{{Auth::user()->email}}">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="f-name">Phone number<sup>*</sup></label>
                        <input type="text"  class="account-input"  name="phone" value="{{Auth::user()->phone}}">

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="f-name">Country name<sup>*</sup></label>
                        <span class="search-drop-down6">
                                <select class="form-control" name="main_country_id">
                                    @foreach($data['countries'] as $country)
                                        <option

                                          @if(!empty(Auth::user()->address))      @if(Auth::user()->address->main_country_id == $country->id )
                                                selected="selected"
                                                @endif
                                                        @endif
                                                value="{{$country->id}}"> {{$country->name}}</option>
                                    @endforeach
                                </select>
                            </span>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="f-name">State name<sup>*</sup></label>
                        <span class="search-drop-down6">
                                <select class="form-control" name="main_state_id">
                                    @foreach($data['states'] as $state)
                                        <option

                                                @if(!empty(Auth::user()->address))       @if(Auth::user()->address->main_state_id == $state->id )
                                                selected="selected"
                                                @endif
                                                @endif
                                                value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </span>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="f-name">City Name<sup>*</sup></label>
                        <span class="search-drop-down6">
                                <select class="form-control" name="main_city_id">
                                    @foreach($data['cities'] as $city)
                                        <option

                                                @if(!empty(Auth::user()->address))        @if(Auth::user()->address->main_city_id == $city->id )
                                                selected="selected"
                                                @endif
                                                @endif

                                                value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </span>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label class="f-name">Address<sup>*</sup></label>
                        <input type="text" name="address" id="job_location" class="account-input" value=" @if(!empty(Auth::user()->address)) {{Auth::user()->address->address}} @endif">

                    </div>


                </div>


                <input type="submit" value="Update User" class="save-address-btn">
                </form>
            </div>









       {{-- <div class="right-rable-main" style="margin-bottom:0px;">

                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-9 " style="padding-right:10%; margin-top:-40px;">
                        <div class="details-tabs-main">
                            <div class="detail-tab-main">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#general-info">General </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="general-info" class="tab-pane active">
                                        <div class="first-tab-form-main">


                                            <div class="border-box">
                                                <span class="holiday-text">Basic Information</span>
                                                <form
                                                        action="{{route('user.add-address')}}"
                                                        method="post" enctype="multipart/form-data" >
                                                    @csrf
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-5">
                                                              <span class="primary-doctor-text">Name<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-7">
                                                            <span class="search-drop-down4">
                                                           <input type="text" name="name" value="{{Auth::user()->name}}"/>
                                                            </span>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <span class="primary-doctor-text">Select Country<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-7">
                                                            <span class="search-drop-down4">


                                                                <select class="form-control" name="main_country_id">
                                                                    @foreach($data['countries'] as $country)
                                                     <option
                                                                            @if(Auth::user()->address()->count() != 0)
                                                                              @if(Auth::user()->address()->first()->main_country_id == $country->id )
                                                                              selected="selected"
                                                                              @endif
                                                                            @endif
                                                                            value="{{$country->id}}">
                                                                        {{$country->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </span>

                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-5">
                                                                <span class="primary-doctor-text">State<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-7">
                                                            <span class="search-drop-down4">
                                                                <select class="form-control" name="main_state_id">
                                                                    @foreach($data['states'] as $state)
                                                                        <option
                                                                                @if(Auth::user()->address()->count() != 0)
                                                                                  @if(Auth::user()->address()->first()->main_state_id == $state->id )
                                                                                  selected="selected"
                                                                                  @endif
                                                                                @endif
                                                                                value="{{$state->id}}">{{$state->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </span>

                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-5">
                                                                <span class="primary-doctor-text">City<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-7">
                                                            <span class="search-drop-down4">

                                                                <select class="form-control" name="main_city_id">
                                                                    @foreach($data['cities'] as $city)
                                                                        <option
                                                                                @if(Auth::user()->address()->count() != 0)
                                                                                  @if(Auth::user()->address()->first()->main_city_id == $city->id )
                                                                                        selected="selected"
                                                                                  @endif
                                                                                @endif
                                                                                value="{{$city->id}}">{{$city->name}}</option>

                                                                    @endforeach
                                                                </select>
                                                            </span>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-5">
                                                                <span class="primary-doctor-text">Address<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-7">
                                                            <span class="search-drop-down4">
                                                                  <textarea type="text" name="address"
                                                                            placeholder="Enter Description"
                                                                            class="enter-text-field">
                                                                       @if(Auth::user()->address()->count() != 0)
                                                                      {{Auth::user()->address()->first()->address}}
                                                                      @endif
                                                                  </textarea>
                                                            </span>

                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <button type="submit" class="btn-sm btn btn-primary">Save
                                                        </button>

                                                    </div>

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

        </div>--}}
    </div>

   {{-- <script>
        $(document).on('click', '.browse', function () {
            var file = $(this).parent().parent().parent().find('.file2');
            file.trigger('click');
        });
        $(document).on('change', '.file2', function () {
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });
    </script>--}}
    <script>
        $(document).ready(function(e) {
            $(".form-control").select2({
            });
        });
    </script>

    @include('layout-user.js')
   {{-- @include('layout-user.setup-js')--}}
@endsection