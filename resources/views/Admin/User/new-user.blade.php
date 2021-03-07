@extends('layout-admin.app')

@section('content')

    <div class="body-container">

        <div class="right-rable-main" style="margin-bottom:0px;">
            <div class="row">
                <div class="col-lg-12 col9-padding">
                    <div class="details-tabs-main">
                        <div class="detail-tab-main">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="create-adds" class="tab-pane active">
                                    <form method="post" action="{{route('admin.add-user')}}"
                                          enctype="multipart/form-data">

                                        @csrf
                                        <div class="first-tab-form-main">
                                            <div class="border-box">
                                                <span class="holiday-text">Create User</span>
                                                <div class="row">
                                                    <div class="col-lg-5 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">User Name<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="name"
                                                                       placeholder="Enter User Name"
                                                                       class="enter-text-field">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Email </span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="email" name="email"
                                                                       placeholder="Enter Email"
                                                                       class="enter-text-field">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">First Name<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="first_name"
                                                                       placeholder="Enter First Name"
                                                                       class="enter-text-field" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Last Name<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="last_name"
                                                                       placeholder="Enter Last Name"
                                                                       class="enter-text-field" required>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Phone </span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="number" name="phone"
                                                                       placeholder="Enter Phone"
                                                                       class="enter-text-field">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Password <sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="password" name="password"
                                                                       placeholder="Enter Password"
                                                                       class="enter-text-field" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Roles <sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <select class="form-control" name="role_id">


                                                                    <option value="2">User</option>
                                                                    <option value="3">Agent</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <span class="primary-doctor-text">Cities <sup>*</sup></span>
                                                                </div>
                                                                <div class="col-8">
                                                                    <select class="form-control" name="main_city_id">
                                                                        @foreach($data['cities'] as $city)
                                                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                                                        @endforeach


                                                                    </select>
                                                                </div>

                                                            </div>


                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <span class="primary-doctor-text">Countries <sup>*</sup></span>
                                                                </div>

                                                            <div class="col-8">
                                                                <select class="form-control" name="main_country_id">
                                                                    @foreach($data['countries'] as $country)
                                                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                                                    @endforeach


                                                                </select>
                                                            </div>
                                                            </div>



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
    </script>

    @include('layout-user.setup-js')
@endsection