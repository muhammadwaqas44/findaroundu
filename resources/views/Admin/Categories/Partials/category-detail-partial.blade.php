<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">

                <div class="row">
                    <span class="customer-details">Category Detailed Information</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Category Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['category']->name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['category']->id}}</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Parent Category Id</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['category']->parent_id}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Type</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['category']->type}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Status</span></div>
                            <div class="col-6">
                                @if($data['category']->is_active == 1)
                                    <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                @else
                                    <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                @endif



                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Category Image</span>
                </div>




                <div class="col-6"><span
                            class="custom-right-text2"><img src="{{ $data['category']->profile_image }}" ></span>
                </div>



            </div>






        </div>
        <div class="col-md-12 col-lg-4">
            <div class="col-10">
                <div class="business-right-main">
                    <h6 style="margin-bottom:15px; ">Actions</h6>
                    <ul class="action-tab-ul">
                        {{--<li>
                            <a href="#" class="create-form-btn">Edit Business</a>
                            <span class="create-form-content">Make changes to this business.</span>
                        </li>--}}
                        @if($data['category']->is_active == 0)
                            <li>
                                <a href="{{route('admin.change-status.category',[$data['category']->id])}} " class="create-form-btn">Active Category</a>
                                <span class="create-form-content">Active this add</span>
                            </li>
                        @else
                            <li>
                                <a href=" {{route('admin.change-status.category',[$data['category']->id])}}" class="create-form-btn">Deactive Category</a>
                                <span class="create-form-content">Deactivate this add</span>
                            </li>
                        @endif


                        <li>
                            <a href="{{route('admin.delete-category',[$data['category']->id])}} " class="create-form-btn">Delete Category</a>
                            <span class="create-form-content">Delete this category. No new subscriptions can be created using this category.</span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

