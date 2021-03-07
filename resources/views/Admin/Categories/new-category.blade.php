@extends('layout-admin.app')

@section('content')

    <div class="body-container">
        @include('Admin.Categories.Partials.add-category-menu-partial')

        <div class="right-rable-main" style="margin-bottom:0px;">
            <div class="row">
                <div class="col-lg-12 col9-padding">
                    <div class="details-tabs-main">
                        <div class="detail-tab-main">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="create-adds" class="tab-pane active">
                                    <form method="post" action="{{route('admin.add-category')}}"
                                          enctype="multipart/form-data">

                                        @csrf
                                        <div class="first-tab-form-main">
                                            <div class="border-box">
                                                <span class="holiday-text">Create Category</span>
                                                <div class="row">
                                                    <div class="col-lg-5 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Category Name<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="name"
                                                                       placeholder="Enter Category Name"
                                                                       class="enter-text-field">
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
                                                                    <option value="{{$parent_category->id}}">{{$parent_category->name}}</option>
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
                                                                    <option value="Individual">Individual</option>
                                                                    <option value="Company">Company</option>
                                                                    <option value="Adds">Adds</option>

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
                                                                   class="enter-text-field" required >
	                                            		</span>

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

    @include('layout-admin.setup-js')
@endsection