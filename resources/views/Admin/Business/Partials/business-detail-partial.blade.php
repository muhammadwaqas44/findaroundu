<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Business Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['business']->title}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['business']->id}}</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Invoice Name</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['business']->invoice_name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Description</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['business']->description}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Status</span></div>
                            <div class="col-6">
                                @if($data['business']->is_active == 1)
                                    <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                @else
                                    <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                @endif

                                @if($data['business']->is_approve != "Not Approve")
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
                                        class="custom-right-text2">{{$data['business']->email}}
                                    ,{{$data['business']->email}}  </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Phone</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['business']->phone}}
                                    ,{{$data['business']->phone}}  </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Country and City</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['business']->address->country->name}}
                                    ,{{$data['business']->address->city->name}}  </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Address</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['business']->address->address}}
                                    s</span></div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Facebook Url</span></div>
                            <div class="col-6"><span class="custom-right-text">
                                                @if(!empty($data['business']->facebook_url))
                                        {{$data['business']->facebook_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Gmail Url</span></div>
                            <div class="col-6"> <span class="custom-right-text">
                                                @if(!empty($data['business']->gmail_url))
                                        {{$data['business']->gmail_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Twitter Url</span></div>
                            <div class="col-6"> <span class="custom-right-text">
                                                @if(!empty($data['business']->twitter_url))
                                        {{$data['business']->twitter_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Video Link</span></div>
                            <div class="col-6">

                                <span class="custom-right-text">
                                                @if(!empty($data['business']->video_url))
                                        {{$data['business']->video_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>


                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Services Included</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">

                            @foreach($data['business']->services as $service)
                                <div class="col-6"><span class="customer-id2">Service name</span></div>

                                <div class="col-6">
                                    <a href="#">
                                <span class="custom-right-text2">
                                    {{$service->title}}
                                </span>
                                    </a>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>


            </div>


            <div class="row">
                <span class="customer-details">Working Hours</span>
            </div>
            <div class="row">

                <div class="events-tab-main">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Day</th>
                            <th>From</th>
                            <th>To</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data['business']->timings as $timing)
                            <tr>
                                <td>{{$timing->day}}</td>
                                <td>{{$timing->_from}}</td>
                                <td>{{$timing->_to}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        <div class="col-md-12 col-lg-4">
            <div class="col-10">
                <div class="business-right-main">
                    <h6 style="margin-bottom:15px; ">Actions</h6>
                    <ul class="action-tab-ul">
                        <li>
                            <a href="#" class="create-form-btn">Edit Business</a>
                            <span class="create-form-content">Make changes to this business.</span>
                        </li>
                        @if($data['business']->is_approve == 'Not Approve')
                            <li><a class="create-form-btn"
                                   href="{{route('admin.approve-business',[$data['business']->id])}}">
                                    Approve Business
                                </a>
                                <span class="create-form-content">Make changes to this business.</span>
                            </li>
                            <li><a class="create-form-btn"
                                   href="{{route('admin.reject-business',[$data['business']->id])}}">
                                    Reject Business
                                </a>
                                <span class="create-form-content">Make changes to this business.</span>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

