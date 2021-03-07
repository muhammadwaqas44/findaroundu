<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Business Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['business']->title}}
                                    @if($data['business']->is_approve == "Approve")
                                        <a href="{{route('front-business.detail',[$data['business']->id])}}">
                                        <i class="far fa-eye" title="view details"> </i> </a>

                                    @else
                                        <a href="" data-toggle="modal" data-target="#notApprove{{$data['business']->id}}">
                                        <i class="far fa-eye" title="view details" > </i> </a>
                                    @endif
                                </span>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="notApprove{{$data['business']->id}}" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Not Approve</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>The business is not approved by the admin yet.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['business']->id}}</span></div>
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
                                <span class="custom-right-text2">
                                 {{$service->title}}
                                </span>
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
                      {{--  <li>
                            <a href="#" class="create-form-btn">Edit Business</a>
                            <span class="create-form-content">Make changes to this business.</span>
                        </li>--}}
                        <li>
                            <a href="#" data-toggle="modal" data-target="#add-services" class="create-form-btn">Add
                                Services</a>
                            <span class="create-form-content">Add Services.</span>
                        </li>
                        <li>
                            <a href="{{route('agent.delete-business',$data['business']->id)}} " class="create-form-btn">Delete Business</a>
                            <span class="create-form-content">Delete this business_detail. No new subscriptions can be created using this business_detail.</span>
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
        <form method="post" action="{{route('agent.add-services',[$data['business']->id])}}"
              enctype="multipart/form-data">

            <h1 class="auto-collection-text" style="color: #fa6164;">Add Services</h1>
            @csrf
            <div class="confirm-archive-pad">


                <div class="col-lg-12">

                    <select name="service_id[]" class="select2-multiple form-control" style="width:100%;" multiple
                            required>
                        @foreach($data['user_services'] as $service)
                            <option value="{{$service->id}}"
                                    @if($data['business']->services->where('id' , $service->id)->count() >0) selected @endif>{{$service->title}}</option>
                        @endforeach
                    </select>

                </div>


            </div>


            <div class="close-update-btn">
                <ul class="close-update-btnul">
                    <li>
                        <a href="#" class="btn btn-secondary btn-md" data-dismiss="modal">Cancel</a>
                    </li>
                    <li>
                        <button type="submit" class="btn btn-danger btn-md">Add Service</button>
                    </li>
                </ul>
            </div>
        </form>
    </div>
</div>