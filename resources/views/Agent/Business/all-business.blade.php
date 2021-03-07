@extends('layout-agent.app')
@section('title','Business')
@section('content')

    <div class="body-container">
        @include('Agent.Business.Partials.all-business-menu-partial')
        <div class="right-rable-main">

            <form id="form_submit_onchange" method="get"
                  action="{{route('agent.all-business')}}">
                <div class="search-drop-down-main">

                    <div class="search-left">

                        <input type="text" name="search" value="{{ old('search') }}" placeholder="By Business Name"
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

            @if($data['all_business']['all_business_count'] > 0)
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
                        </ul>
                        <div class="pagination-top-main">
                    <span class="pagination-text">Showing


                        @if($data['all_business']['total_pages']->total() > 5 )
                            {{$data['all_business']['all_business']->firstItem()}}
                            - {{$data['all_business']['total_pages']->lastItem()}}
                            of {{$data['all_business']['all_business_count']}}

                        @else


                            {{$data['all_business']['all_business']->firstItem()}}
                            - {{$data['all_business']['total_pages']->lastItem()}}
                            of {{$data['all_business']['all_business_count']}}

                            <ul class="pagination-ul">
                            <li><a href="#"><i class="fas fa-caret-left"></i></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i></a></li>
                        </ul>



                        @endif  </span>
                            @if(!app('request')->input('sort_by'))
                                {{$data['all_business']['all_business']->links()}}
                            @else
                                {{$data['all_business']['all_business']->appends(['sort_by' => app('request')->input('sort_by')])->links()}}
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

                    @foreach($data['all_business']['all_business'] as $business)
                        <div class="start-table">
                            <div class="start-table-main">

                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Business Name</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                            <span class="custom-right-text">
                                                <a href="{{route('agent.business.detail',[$business->id])}}">{{$business->title}}</a>
                                            </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Status</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">
                                                    @if($business->is_active == 1)
                                                        <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                                    @else
                                                        <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                                    @endif

                                                    @if($business->is_approve != "Not Approve")
                                                        <span class="custom-right-text btn btn-success btn-sm"> APPROVED</span>

                                                    @else
                                                        <span class="custom-right-text btn btn-warning btn-sm"> NOT APPROVE</span>
                                                    @endif

                                                </span></div>
                                        </div>


                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">
                                                Id
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">{{$business->id}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Location</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$business->address->country->name}} , {{$business->address->city->name}}
                                         </span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">
                                                Address
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">
                                                @if(!empty($business->address->address))
                                                        {{$business->address->address}}
                                                    @else
                                                        -Not Configured-
                                                    @endif
                                            </span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-4 col-sm-12">

                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Social Media Links</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                                    @if(!empty($business->facebook_url) && !empty($business->gmail_url) && !empty($business->twitter_url))
                                                        {{$business->address->address}}
                                                    @else
                                                        -Not Configured-
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id"> Categories</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                               @foreach($business->categories as $category)
<label class="badge badge-info" style="margin-right:5px;">{{$category->name}}</label>
                                                   @endforeach
                                            </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id"> Created At</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                               {{$business->created_at}}
                                            </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <ul class="table-icon-ul">
                                    <li><a href="{{route('agent.business.detail',[$business->id])}}"><i class="far fa-eye" title="view details"></i></a></li>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="true" title="actions">
                                            <i class="fas fa-cog"></i> <i class="fas fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">



                                            <li><a href="{{route('agent.delete-business',$business->id)}}">Delete Business</a></li>
                                            @if($data['settings'] != NULL)
                                                @if($data['settings']->is_business == 1)
                                            @if($business->is_approve == 'Not Approve')
                                                <li> <a href="{{route('agent.approve-business',[$business->id])}}">
                                                        Approve Business
                                                    </a></li>
                                            @else
                                                <li> <a href="{{route('agent.approve-business',[$business->id])}}">
                                                        DisApprove Business
                                                    </a></li>
                                            @endif
                                                @endif
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
                    <span class="showing-text">{{$data['all_business']['all_business']->firstItem()}}
                        - {{$data['all_business']['total_pages']->lastItem()}}
                        of {{$data['all_business']['all_business_count']}} </span>
                </div>
            @endif

            @if($data['all_business']['all_business_count'] ==0)
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
                                            data-toggle="dropdown" aria-expanded="true"><i class="fas fa-file-export"></i>
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


    @include('layout-user.setup-js')
@endsection