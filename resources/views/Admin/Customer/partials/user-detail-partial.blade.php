<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">User Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['user_detail']->name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['user_detail']->id}}</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">First Name</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['user_detail']->userInfo->first_name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Last Name</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['user_detail']->userInfo->last_name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Account Type</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['user_detail']->userInfo->account_type}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Created At</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['user_detail']->created_at}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Status</span></div>
                            <div class="col-6">
                                @if($data['user_detail']->is_active == 1)
                                    <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                @else
                                    <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                @endif

                                @if($data['user_detail']->is_approve != "Not Approve")
                                    <span class="custom-right-text btn btn-success btn-sm"> APPROVED</span>

                                @else
                                    <span class="custom-right-text btn btn-warning btn-sm"> NOT APPROVE</span>
                                @endif


                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Address & Contact Information</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Email</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['user_detail']->email}}
                                     </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Phone</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['user_detail']->phone}}
                                     </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Country and City</span></div>
                            <div class="col-6"><span
                                        @foreach($data['user_detail']->address as $address)
                                        class="custom-right-text2">{{$address->country->name}}
                                    ,{{$address->city->name}}  </span>
                                       @endforeach
                            </div>
                        </div>



                    </div>
                </div>

                <div class="row">
                    <span class="customer-details">Other Details</span>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Business</span></div>
                            <div class="col-6">
                                <a href="{{route('admin.all-business', ['user_id' => $data['user_detail']->id])}}">    <span class="custom-right-text2">{{$data['user_detail']->businesses()->count()}}  </a>
                                     </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Services</span></div>
                            <div class="col-6">
                                <a href="{{route('admin.services', ['user_id' => $data['user_detail']->id])}}">    <span class="custom-right-text2">{{$data['user_detail']->services()->count()}}  </a>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Adds</span></div>
                            <div class="col-6">
                                <a href="{{route('admin.adds', ['user_id' => $data['user_detail']->id])}}">    <span class="custom-right-text2">{{$data['user_detail']->adds()->count()}}  </a>
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>





        </div>
        <div class="col-md-12 col-lg-4">
            <div class="col-10">
                <div class="user_detail-right-main">
                    <h6 style="margin-bottom:15px; ">Actions</h6>
                    <ul class="action-tab-ul">
                        <li>
                            <a href="#" class="create-form-btn">Edit Customer</a>
                            <span class="create-form-content">Make changes to this customer.</span>
                        </li>

                        @if($data['user_detail']->is_active == 1)
                        <li>
                            <a href="#" class="create-form-btn">Deactive</a>
                            <span class="create-form-content">Deactivate this customer.</span>
                        </li>
                        @endif

                        @if($data['user_detail']->is_active == 0)
                            <li>
                                <a href="#" class="create-form-btn">Active</a>
                                <span class="create-form-content">Activate this customer.</span>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('admin.delete-user',[$data['user_detail']->id])}}" class="create-form-btn">Delete Customer</a>
                            <span class="create-form-content">Delete this customer.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal" id="add-services" role="dialog" style="background: rgba(0,0,0,.9);">
    <div class="auto-collection">
        <span class="close_popup" data-dismiss="modal"><i class="fas fa-times"></i></span>

    </div>
</div>