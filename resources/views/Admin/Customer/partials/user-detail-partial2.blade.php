<div class="doctor-body-main" style="margin-top: 20px">

    <div class="demographics-se1">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-3 col-sm-12 remove-pad-profile">
                    <div class="first-sec-new-user-left2" id="collapse-div">
                        <div class="center-align">
                            <div class="ed-profile2" title="Change">
                                <img id="image_upload_preview" alt="img" src="{{$data['user_detail']->profile_image}}">
                                <div class="edit-pencil">
                                    <label>
                                        <input onchange="readURL(this);" id="inputFile" type="file">
                                        <i class="fas fa-pencil-alt"></i> </label>
                                </div>
                            </div>
                            <span class="nam-user-text">{{$data['user_detail']->name}}</span>

                            <h3 class="patient-name"><span class="info">
                                <a data-toggle="modal" data-target="#changePasswordModal">Change Password</a></span>
                            </h3>

                            <div class="edit-user-name collapse" id="edit-field">
                                <input type="text" placeholder="Type Here" class="edit-gender-field">
                                <span class="edit-gender">
                    <select>
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                    </span> </div>
                        </div>
                        <ul class="edit-p-ul">
                            <li>
                                <a href="#" title="Edit" data-toggle="collapse" data-target="#edit-field" class="collapsed" aria-expanded="false"><i class="fas fa-pen"></i></a>
                            </li>

                            <li>

                                <a href="javascript:void(0)">
                                    @if($data['user_detail']->is_active == 1)
                                        ACTIVE

                                    @else
                                        DEACTIVE
                                    @endif
                                </a>
                            </li>
                            <li>
                                <a href="#" title="More" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu">
                                     @if($data['user_detail']->is_active == 1)
                                        <a class="dropdown-item" href="{{route('admin.change-status.user',[$data['user_detail']->id])}}">Dective</a>
                                    @else
                                        <a class="dropdown-item" href="{{route('admin.change-status.user',[$data['user_detail']->id])}}">Active</a>
                                    @endif
                                    <a class="dropdown-item" href="#">Transection History</a>
                                    <a class="dropdown-item" href="#">Medication List</a>
                                    <a class="dropdown-item" href="#">Alergy List</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 remove-pad-profile">
                    <div class="first-sec-new-user-left2">
                        <ul class="job-info-ul">
                            <li> <span class="job-info-text">Phone <span>{{$data['user_detail']->phone}}</span></span> </li>
                            <li> <span class="job-info-text">Email <span>{{$data['user_detail']->email}}</span></span> </li>
                            <li>
                                <span class="job-info-text">Address

                                        <span>
                                            @if(!empty($data['user_detail']->address->country))
                                            {{$data['user_detail']->address->country->name}}
                                            @endif
                                                @if(!empty($data['user_detail']->address->city))
                                                ,{{$data['user_detail']->address->city->name}}
                                                    @endif
                                        </span>

                                </span>
                            </li>
                            <li> <span class="job-info-text">UserName <span>{{$data['user_detail']->name}}</span></span> </li>
                            <li> <span class="job-info-text">First Name <span>{{$data['user_detail']->userInfo->first_name}}</span></span> </li>
                            <li> <span class="job-info-text">Last Name <span>{{$data['user_detail']->userInfo->last_name}}</span></span> </li>
                            <li> <span class="job-info-text">Account Type <span>

                                        @if(!empty($data['user_detail']->userInfo->account_type))
                                        {{$data['user_detail']->userInfo->account_type}}
                                            @endif
                                    </span></span> </li>

                            <li> <span class="job-info-text">Created By<span>@if(!empty($data['user_detail']->createdBy)){{$data['user_detail']->createdBy->name}} @else Self Signed up @endif</span></span> </li>

                        </ul>
                    </div>
                </div>
                <div class="col-md-5 col-sm-12 remove-pad-profile">
                    <div class="first-sec-new-user-left2">
                        <ul class="rounded-ul">
                                <li>
                                    <div class="rounded-box">
                                        <div class="rounded-box-inner"> <span class="basic-amount">{{$data['all_adds']['all_adds_count'] }}</span> <span class="basic-salary">Ads</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="rounded-box">
                                        <div class="rounded-box-inner"> <span class="basic-amount">{{$data['all_services']['all_services_count'] }} </span> <span class="basic-salary">Services</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="rounded-box">
                                        <div class="rounded-box-inner"> <span class="basic-amount">{{$data['all_business']['all_business_count'] }}  </span> <span class="basic-salary">Business</span> </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="rounded-box">
                                        <div class="rounded-box-inner"> <span class="basic-amount">0$</span> <span class="basic-salary">Leave Balance</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="rounded-box">
                                        <div class="rounded-box-inner"> <span class="basic-amount">0$</span> <span class="basic-salary">Long Balance</span> </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="rounded-box">
                                        <div class="rounded-box-inner"> <span class="basic-amount">0$</span> <span class="basic-salary">Advance</span> </div>
                                    </div>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="" style="margin-top:10px;">

        <div class="col-12 col9-padding">
            <div class="details-tabs-main">
                <div class="detail-tab-main">
                   @component('Admin.Customer.partials.tabs-component')@endcomponent
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div id="general-info" class="tab-pane active">
                            @include('Admin.Customer.partials.general-info')
                        </div>

                        <div id="business" class="tab-pane fade">
                            @include('Admin.Customer.partials.business-info')
                        </div>

                        <div id="service" class="tab-pane fade">
                            @include('Admin.Customer.partials.service-info')
                        </div>

                        <div id="adds" class="tab-pane fade">
                            @include('Admin.Customer.partials.ads-info')
                        </div>

                        <div id="subscriptions" class="tab-pane fade">
                            @include('Admin.Customer.partials.subscriptions-info')
                        </div>

                        <div id="packages" class="tab-pane fade">
                            @include('Admin.Customer.partials.package-info')
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="changePasswordModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="{{route('admin.customer.change-password',[$data['user_detail']->id])}}">
            @csrf

            <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3"><span class="primary-doctor-text">New Password<sup>*</sup></span></div>
                        <div class="col-7">
                            <input type="password" name="password" placeholder="Type here" class="enter-text-field">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3"><span class="primary-doctor-text">Confirm Password<sup>*</sup></span></div>
                        <div class="col-7">
                            <input type="password" name="password_confirmation" placeholder="Type here" class="enter-text-field">
                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"  >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var ext = input.files[0].name.split('.').pop().toLowerCase();

            if (ext == "jpg" || ext == "png") {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image_upload_preview')
                        .attr('src', e.target.result);

                    var formData = new FormData(this);
                    formData.append('image_profile', $('input[type=file]')[0].files[0]);
                    formData.append('user_id',{{$data['user_detail']->id}});
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                        url: "{{route('admin.change-image')}}",
                        type: "POST",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,

                        success: function (response, status) {

                            if(response.result == 'success')
                            {
                                alert(response.message);
                            }


                        }


                    });


                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

</script>