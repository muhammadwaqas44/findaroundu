@extends('layout-admin.app')

@section('content')

    <div class="body-container">
        @include('Admin.Categories.Partials.all-categories-menu-partial')

        <div class="right-rable-main">

            <form id="form_submit_onchange" method="get"
                  action="#">
                <div class="search-drop-down-main">

                    <div class="search-left">

                        <input type="text" name="search" value="{{ old('search') }}" placeholder="By Category Name"
                               name="search">
                        <input type="submit" value="">

                    </div>
                    <div class="drop-down-right-main">
                        <span class="sort-name">Sort By</span>
                        <span class="search-drop-down2">
                            <select class="form-control" name="sort_by" onchange="formSubmit()">
                                <option value="latest"
                                        @if(app('request')->input('sort_by') == "latest") selected @endif >Created At : (Latest First)</option>
                                <option value="oldest"
                                        @if(app('request')->input('sort_by') == "oldest") selected @endif >Created At : (Oldest First)</option>
                            </select>
                        </span>
                    </div>

                </div>
            </form>

            @if($data['all_categories']['all_categories_count'] > 0)
                <div class="table-sec-main">
                    <div class="table-first-sec">
                        <ul class="table-left-ul">
                            <li>
                                <a href="#" class="send-main-btn"><i class="fas fa-envelope"></i> Send Email</a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button class="export-btn" data-toggle="dropdown" aria-expanded="true"><i
                                                class="fas fa-file-export"></i> Export
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Export as CSV</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <select id="type">
                                        <option @if($data['all_categories']['type'] == "All") selected @endif value="All">All</option>
                                        <option @if($data['all_categories']['type'] == "Individual") selected @endif value="Individual">Individual</option>
                                       <option @if($data['all_categories']['type'] == "Company") selected @endif value="Company">Company</option>
                                     <option @if($data['all_categories']['type'] == "Adds") selected @endif value="Adds">Adds</option>
                                    </select>
                                </div>
                            </li>

                        </ul>
                        <div class="pagination-top-main">
                    <span class="pagination-text">Showing


                        @if($data['all_categories']['total_pages']->total() > 5 )
                            {{$data['all_categories']['all_categories']->firstItem()}}
                            - {{$data['all_categories']['total_pages']->lastItem()}}
                            of {{$data['all_categories']['all_categories_count']}}

                        @else


                            {{$data['all_categories']['all_categories']->firstItem()}}
                            - {{$data['all_categories']['total_pages']->lastItem()}}
                            of {{$data['all_categories']['all_categories_count']}}

                            <ul class="pagination-ul">
                            <li><a href="#"><i class="fas fa-caret-left"></i></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i></a></li>
                        </ul>



                        @endif  </span>
                            @if(!app('request')->input('sort_by'))
                                {{$data['all_categories']['all_categories']->links()}}
                            @else
                                {{$data['all_categories']['all_categories']->appends(['sort_by' => app('request')->input('sort_by')])->links()}}
                            @endif
                        </div>
                    </div>

                    <style>
                        .pagination-top-main .pagination .page-item {
                            font-size: 12px;
                        }

                        .pagination-top-main .pagination .page-item {
                            margin-left: 6px;
                        }

                        .pagination-top-main .pagination .page-item:first-child {
                            margin-left: 0px;
                        }

                        .pagination-top-main .pagination .page-item span {
                            padding: 5px 10px;
                            border-radius: inherit;
                        }

                        .pagination-top-main .pagination .page-item a {
                            padding: 5px 10px;
                            border-radius: inherit;
                        }
                    </style>

                    @foreach($data['all_categories']['all_categories'] as $category)
                        <div class="start-table">
                            <div class="start-table-main">

                                <div class="row">
                                    <div class="col-lg-3 col-sm-12">

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-6"><span
                                                        class="customer-id">Category Title</span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-6">
                                            <span class="custom-right-text">
                                                <a href="{{route('admin.category-detail',[$category->id])}}">{{$category->name}}</a>
                                            </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-6"><span
                                                        class="customer-id">Status</span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-6"><span
                                                        class="custom-right-text">@if($category->is_active == 1)
                                                        <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                                    @else
                                                        <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                                    @endif



                                                </span></div>
                                        </div>
                                        @if($category->parent_id == NULL)
                                            <div class="row">
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6 col-sm-12 col-12">
                                                    <a href="{{route('admin.sub-categories',[$category->id])}}" ><span class="custom-right-text btn btn-primary btn-lg"> Sub Categories</span></a>
                                                </div>
                                            </div>
                                            @endif

                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">
                                                Id
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">{{$category->id}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">
                                                Parent 1D
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">{{$category->parent_id}}</span>
                                            </div>
                                        </div>




                                    </div>
                                    <div class="col-lg-3 col-sm-12">
                                    <div class="row">

                                        <div  style="height:100px;width: 100px; background-image: url('{{$category->profile_image}}');background-size:cover;">

                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12">

                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Type</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                               {{$category->type}}
                                            </span>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id"> Created At</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                               {{$category->created_at}}
                                            </span>
                                            </div>
                                        </div>


                                </div>
                                <ul class="table-icon-ul">

                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="true" title="actions"><i
                                                    class="fas fa-cog"></i> <i class="fas fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{route('admin.edit-category',[$category->id])}}">Edit Category</a>
                                            </li>
                                            <li><a href="{{route('admin.delete-category',[$category->id])}}">Delete Category</a>
                                            </li>
                                            @if($category->is_active == 1)
                                                <li><a href="{{route('admin.change-status.category',[$category->id])}}">Deactive</a></li>
                                            @endif
                                            @if($category->is_active == 0)
                                                <li><a href="{{route('admin.change-status.category',[$category->id])}}">Active</a></li>
                                            @endif
                                            <li><a href="#">Add New Subscription</a></li>
                                            <li><a href="#">Request Primary Payment Method</a></li>
                                            <li><a href="#">Add Billing Info</a></li>
                                        </ul>
                                    </li>
                                </ul>


                            </div>


                        </div>
                    @endforeach
                    <span class="showing-text">{{$data['all_categories']['all_categories']->firstItem()}}
                        - {{$data['all_categories']['total_pages']->lastItem()}}
                        of {{$data['all_categories']['all_categories_count']}} </span>
                </div>
            @endif

            @if($data['all_categories']['all_categories_count'] ==0)
                <div class="table-sec-main">
                    <div class="table-first-sec">
                        <ul class="table-left-ul">
                            <li>
                                <a class="send-main-btn" style="background: #fbfcfc;color: #a2a3a3 !important;"><i
                                            class="fas fa-envelope"></i> Send Email</a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <button disabled style="background: #fbfcfc;color: #a2a3a3 !important;"
                                            class="export-btn"
                                            data-toggle="dropdown" aria-expanded="true"><i
                                                class="fas fa-file-export"></i>
                                        Export
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Export as CSV</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div class="no-content">
                        <span class="oops-text">Oops! no data found for your search.</span>
                    </div>
                </div>
            @endif
        </div>

    </div>
    <script>
        function formSubmit() {
            document.getElementById('form_submit_onchange').submit();
        }
    </script>
        <script>
            $("#type").change(function () {
                var basePath = "{{URL('/admin/all-categories/')}}"+"/"+$(this).val();

                window.location.assign(basePath);

            });
        </script>

    <script>
        $(document).on('click', '.browse', function () {
            var file = $(this).parent().parent().parent().find('.file2');
            file.trigger('click');
        });
        $(document).on('change', '.file2', function () {
            $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
        });


        $("#add-another-item").click(function (e) {
            e.preventDefault();
            $("#item-add tbody").append(`<tr>
                                            <td>
                                                <span class="search-drop-down5">
                                                    <select class="form-control" name="day" required>
                                                        <option value="Monday">Monday</option>
                                                        <option value="Tuseday">Tuseday</option>
                                                        <option value="Wednesday">Wednesday</option>
                                                        <option value="Thrusday">Thrusday</option>
                                                        <option value="Friday">Friday</option>
                                                        <option value="Saturday">Saturday</option>
                                                        <option value="Sunday">Sunday</option>
                                                    </select>
                                                </span>
                                            </td>
                                            <td>
                                                <input type="number" min="0" name="to[]" max="12"class="search-item-name">
                                            </td>
                                            <td>
                                                <input type="number" min="0" name="from[]" max="12"class="search-item-name">
                                            </td>
                                          </tr>`);
            $(".form-control").select2();
        });

    </script>


@endsection