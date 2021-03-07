<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Module Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['module_detail']->id}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Module Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['module_detail']->name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Status</span></div>
                            <div class="col-6"><span class="custom-right-text2">
                                     @if($data['module_detail']->active == "Active")
                                        <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>
                                    @else
                                        <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                    @endif
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Icon code</span></div>
                            <div class="col-6"><span class="custom-right-text2">
                                    @if(!empty($data['module_detail']->icon_code ))
                                        {{$data['module_detail']->icon_code}}
                                    @else
                                        <span
                                                class="custom-right-text">-Not available-</span>
                                    @endif
                                </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Icon Image</span></div>
                            <div class="col-6"><span class="custom-right-text2">
                                    @if(!empty($data['module_detail']->icon_image_url ))
                                        <a href="{{url($data['module_detail']->icon_image_url)}}"
                                           _blank>{{$data['module_detail']->icon_image_url}}</a>
                                    @else
                                        <span
                                                class="custom-right-text">-Not available-</span>
                                    @endif
                                </span>
                            </div>
                        </div>




                        <div class="row">
                            <span class="customer-details" style="margin-top: 40px;">Associated Pckages</span>
                        </div>
                        @foreach($data['module_detail']->packages as $packages)
                            <label style="margin-right:5px;border-radius:5px;font-size:11px;" class="custom-right-text btn btn-success btn-sm">{{$packages->name}}</label>
                        @endforeach

                    </div>
                </div>


            </div>


        </div>
        <div class="col-md-12 col-lg-4">
            <div class="col-10">
                <div class="plan-right-main">
                    <h6 style="margin-bottom:15px; ">Actions</h6>
                    <ul class="action-tab-ul">
                        <li>
                            <a href="#" class="create-form-btn">Edit Module</a>
                            <span class="create-form-content">Edit this Module</span>
                        </li>
                        <li>
                            <a href="#" class="create-form-btn">Delete Module</a>
                            <span class="create-form-content">Delete this Module</span>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>.body{background-color: #fff !important;}</style>