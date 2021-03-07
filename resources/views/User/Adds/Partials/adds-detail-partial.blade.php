<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Add Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['add_detail']->title}}
                                    @if($data['add_detail']->is_approve == "Approve")
                                        <a href="{{route('user.front-add.detail',[$data['add_detail']->id])}}">
                                        <i class="far fa-eye" title="view details"> </i> </a>

                                    @else
                                        <a href="" data-toggle="modal" data-target="#notApprove{{$data['add_detail']->id}}">
                                        <i class="far fa-eye" title="view details" > </i> </a>
                                    @endif



                                </span>

                            </div>

                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="notApprove{{$data['add_detail']->id}}" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Not Approve</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>The add is not approved by the admin yet.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>




                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['add_detail']->id}}</span></div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Description</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['add_detail']->description}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Status</span></div>
                            <div class="col-6">
                                @if($data['add_detail']->is_active == 1)
                                    <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                @else
                                    <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                @endif

                                @if($data['add_detail']->is_approve != "Not Approve")
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
                                        class="custom-right-text2">{{$data['add_detail']->createdBy->email}}
                                    ,{{$data['add_detail']->createdBy->email}}  </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Phone</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['add_detail']->createdBy->phone}}
                                    ,{{$data['add_detail']->createdBy->phone}}  </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Country and City</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['add_detail']->address->country->name}}
                                    ,{{$data['add_detail']->address->city->name}}  </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Address</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['add_detail']->address->address}}
                                    </span></div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Facebook Url</span></div>
                            <div class="col-6"><span class="custom-right-text">
                                                @if(!empty($data['add_detail']->facebook_url))
                                        {{$data['add_detail']->facebook_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Gmail Url</span></div>
                            <div class="col-6"> <span class="custom-right-text">
                                                @if(!empty($data['add_detail']->gmail_url))
                                        {{$data['add_detail']->gmail_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Twitter Url</span></div>
                            <div class="col-6"> <span class="custom-right-text">
                                                @if(!empty($data['add_detail']->twitter_url))
                                        {{$data['add_detail']->twitter_url}}
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
                                                @if(!empty($data['add_detail']->video_url))
                                        {{$data['add_detail']->video_url}}
                                    @else
                                        -Not Configured-
                                    @endif
                                            </span>


                            </div>
                        </div>


                    </div>
                </div>


                <div class="row">
                    <span class="customer-details">gallery</span>
                </div>
                <ul class="all_adds_ul">
                    @foreach($data['add_detail']->gallery as $gallery)
                        <li class="">
                            <img src="{{ $gallery->name }}" >
                            <a href="{{route('user.delete-gallery-image-adds',[$gallery->id ])}}"><i class="fas fa-trash-alt fa-pull-right"></i></a>
                            {{--<a href="#" data-toggle="dropdown" class="btn btn-primary btn-sm fa-pull-right">Dropdown</a>--}}
                            {{--<div class="dropdown-menu">--}}
                            {{--<a class="dropdown-item" href="#">Link 1</a>--}}
                            {{--<a class="dropdown-item" href="#">Link 2</a>--}}
                            {{--<a class="dropdown-item" href="#">Link 3</a>--}}
                            {{--</div>--}}
                        </li>
                    @endforeach
                </ul>



            </div>




        </div>
        <div class="col-md-12 col-lg-4">
            <div class="col-10">
                <div class="add_detail-right-main">
                    <h6 style="margin-bottom:15px; ">Actions</h6>
                    <ul class="action-tab-ul">
                       {{-- <li>
                            <a href="#" class="create-form-btn">Edit Add</a>
                            <span class="create-form-content">Make changes to this add_detail.</span>
                        </li>--}}
                        @if($data['add_detail']->is_active == 0)
                            <li>
                                <a href="{{route('user.change-status.add',[$data['add_detail']->id])}} " class="create-form-btn">Active Business</a>
                                <span class="create-form-content">Active this add</span>
                            </li>
                        @else
                            <li>
                                <a href=" {{route('user.change-status.add',[$data['add_detail']->id])}}" class="create-form-btn">Deactive Business</a>
                                <span class="create-form-content">Deactivate this add</span>
                            </li>
                        @endif

                        <li>
                            <a href="{{route('user.delete-add',[$data['add_detail']->id])}} " class="create-form-btn">Delete Add</a>
                            <span class="create-form-content">Delete this add_detail. No new subscriptions can be created using this add_detail.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

