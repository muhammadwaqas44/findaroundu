@extends('layout-admin.app')

@section('content')

    <div class="body-container">
        @include('admin.Stats.Partials.add-stat-menu-partial')

        <div class="right-rable-main" style="margin-bottom:0px;">
            <div class="row">
                <div class="col-lg-12 col9-padding">
                    <div class="details-tabs-main">
                        <div class="detail-tab-main">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="create-adds" class="tab-pane active">
                                    <form method="post" action="{{route('admin.add-stat')}}"
                                          enctype="multipart/form-data">

                                        @csrf
                                        <div class="first-tab-form-main">
                                            <div class="border-box">
                                                <span class="holiday-text">Create Stat</span>
                                                <div class="row">
                                                    <div class="col-lg-5 col-sm-12">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Stat Title<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="title"
                                                                       placeholder="Enter Stat Title"
                                                                       class="enter-text-field" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Description<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                                                <input type="text" name="description"
                                                                       placeholder="Enter Stat Description"
                                                                       class="enter-text-field" required>
                                                            </div>
                                                        </div>




                                                        <div class="row">
                                                            <div class="col-4">
                                                                <span class="primary-doctor-text">Image<sup>*</sup></span>
                                                            </div>
                                                            <div class="col-8">
                                               			<span class="search-drop-down5">
                                                            <input type="file" name="image"
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