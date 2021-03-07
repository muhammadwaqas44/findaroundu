@extends('layout-admin.app')

@section('content')

    <div class="body-container">
        @include('Admin.Categories.Partials.edit-category-menu-partial')

        <div class="right-rable-main" style="margin-bottom:0px;">
            <div class="row">
                <div class="col-lg-12 col9-padding">
                    <div class="details-tabs-main">
                        <div class="detail-tab-main">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="create-adds" class="tab-pane active">
                                    <form method="post" action="{{route('admin.update-category')}}"
                                          enctype="multipart/form-data">

                                        @csrf
                                        <div class="first-tab-form-main">
                                            <div class="border-box">
                                                <span class="holiday-text">Edit Category</span>
                                                <div class="row">
                                                    <div class="col-lg-5 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Category Name<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="name"
                                                                       placeholder="Enter Category Name"
                                                                       class="enter-text-field" value="{{$data['category']->name}}">
                                                                <input type="hidden" name="id"
                                                                       placeholder="Enter Category Name"
                                                                       class="enter-text-field" value="{{$data['category']->id}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Select Parent Category </span>
                                                            </div>

                                                            <div class="col-8">
                                                                 <span class="search-drop-down5">
                                                                <select class="form-control" name="parent_id">
                                                                    <option disabled selected value>--select any parent category--</option>
                                                                    @foreach($data['parent_categories'] as $parent_category)
                                                                    <option @if($data['category']->parent_id == $parent_category->id ) selected @endif  value="{{$parent_category->id}}">{{$parent_category->name}}</option>
                                                                        @endforeach

                                                                </select>
                                            				</span>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Type </span>
                                                            </div>
                                                            <div class="col-8">
                                                                <span class="search-drop-down5">
                                                                <select class="form-control" name="type">
                                                                    <option  @if($data['category']->type == "Individual") selected @endif value="Individual" >Individual</option>
                                                                    <option  @if($data['category']->type == "Company") selected @endif value="Company">Company</option>
                                                                    <option  @if($data['category']->type == "Adds") selected @endif value="Adds">Adds</option>

                                                                </select>
                                            				</span>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Profile Image<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                               			<span class="search-drop-down5">
                                                            <input type="file" name="profile_image"
                                                                   class="enter-text-field" >
                                                           
	                                            		</span>

                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>

                                            </div>

                                            <hr>
                                            <button type="submit" class="btn-sm btn btn-primary">Update</button>
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

    @include('layout-admin.setup-js')
@endsection