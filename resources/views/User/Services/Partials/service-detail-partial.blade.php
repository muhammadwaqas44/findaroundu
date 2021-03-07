<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Service Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['service_detail']->title}}
                                    @if($data['service_detail']->is_approve == "Approve")
                                        <a href="{{route('user.front-services.detail',[$data['service_detail']->id])}}">
                                        <i class="far fa-eye" title="view details"> </i> </a>

                                    @else
                                        <a href="" data-toggle="modal" data-target="#notApprove{{$data['service_detail']->id}}">
                                        <i class="far fa-eye" title="view details" > </i> </a>
                                    @endif



                                </span>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="notApprove{{$data['service_detail']->id}}" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Not Approve</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>The service is not approved by the admin yet.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>





                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['service_detail']->id}}</span></div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Description</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['service_detail']->description}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Status</span></div>
                            <div class="col-6">
                                @if($data['service_detail']->is_active == 1)
                                    <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                @else
                                    <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                @endif

                                @if($data['service_detail']->is_approve != "Not Approve")
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
                                        class="custom-right-text2">{{$data['service_detail']->createdBy->email}}
                                    ,{{$data['service_detail']->createdBy->email}}  </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Phone</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['service_detail']->createdBy->phone}}
                                    ,{{$data['service_detail']->createdBy->phone}}  </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Country and City</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['service_detail']->address->country->name}}
                                    ,{{$data['service_detail']->address->city->name}}  </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Address</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['service_detail']->address->address}}
                                    </span></div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Facebook Url</span></div>
                            <div class="col-6"><span class="custom-right-text">
                                                @if(!empty($data['service_detail']->facebook_url))
                                        {{$data['service_detail']->facebook_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Gmail Url</span></div>
                            <div class="col-6"> <span class="custom-right-text">
                                                @if(!empty($data['service_detail']->gmail_url))
                                        {{$data['service_detail']->gmail_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Twitter Url</span></div>
                            <div class="col-6"> <span class="custom-right-text">
                                                @if(!empty($data['service_detail']->twitter_url))
                                        {{$data['service_detail']->twitter_url}}
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
                                                @if(!empty($data['service_detail']->video_url))
                                        {{$data['service_detail']->video_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>


                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Rate</span>
                </div>


                <div class="row">
                    <div class="col-6"><span class="customer-id2">Hourly Price</span></div>
                    <div class="col-6"> <span class="custom-right-text">
                           {{$data['service_detail']->hourly_price}}$

                        </span><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6"><span class="customer-id2">Project Price</span></div>
                    <div class="col-6"> <span class="custom-right-text">
                           {{$data['service_detail']->project_price}}$

                        </span><br>
                    </div>
                </div>

                {{--<div class="row">--}}
                    {{--<div class="col-12 col-lg-8">--}}
                        {{--<div class="row">--}}
                            {{--@foreach($data['service_detail']->services as $service)--}}
                                {{--<div class="col-6"><span class="customer-id2">Service name</span></div>--}}
                                {{--<div class="col-6">--}}
                                    {{--<a href="#">--}}
                                {{--<span class="custom-right-text2">--}}
{{--{{$service->title}}--}}
                                {{--</span>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}


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

                        @foreach($data['service_detail']->timings as $timing)
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

            <div class="row">
                <span class="customer-details">Gallery</span>
            </div>

            <ul class="all_adds_ul">
                @foreach($data['service_detail']->gallery as $gallery)
                    <li class="">
                        <img src="{{ $gallery->name }}" >
                        <a href="{{route('user.delete-gallery-image-services',[$gallery->id ])}}"><i class="fas fa-trash-alt fa-pull-right"></i></a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="col-10">
                <div class="service_detail-right-main">
                    <h6 style="margin-bottom:15px; ">Actions</h6>
                    <ul class="action-tab-ul">
                       {{-- <li>
                            <a href="#" class="create-form-btn">Edit Service</a>
                            <span class="create-form-content">Make changes to this service_detail.</span>
                        </li>--}}
                        @if($data['service_detail']->is_active == 0)
                            <li>
                                <a href="{{route('user.change-status.service',[$data['service_detail']->id])}} " class="create-form-btn">Active Business</a>
                                <span class="create-form-content">Active this service</span>
                            </li>
                        @else
                            <li>
                                <a href=" {{route('user.change-status.service',[$data['service_detail']->id])}}" class="create-form-btn">Deactive Business</a>
                                <span class="create-form-content">Deactivate this service</span>
                            </li>
                        @endif

                        <li>
                            <a href=" " class="create-form-btn">Delete Service</a>
                            <span class="create-form-content">Delete this service_detail. No new subscriptions can be created using this service_detail.</span>
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
        <form method="post" action="{{route('user.add-services',[$data['service_detail']->id])}}"
              enctype="multipart/form-data">

            <h1 class="auto-collection-text" style="color: #fa6164;">Add Services</h1>
            @csrf
            <div class="confirm-archive-pad">


                {{--<div class="col-lg-12">--}}

                    {{--<select name="service_id[]" class="select2-multiple form-control" style="width:100%;" multiple--}}
                            {{--required>--}}
                        {{--@foreach($data['all_services'] as $service)--}}
                            {{--<option value="{{$service->id}}"--}}
                                    {{--@if($data['service_detail']->services->where('id' , $service->id)->count() >0) selected @endif>{{$service->title}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}

                {{--</div>--}}


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
