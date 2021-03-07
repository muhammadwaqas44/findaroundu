@extends('layout-admin.app')

@section('content')

    <div class="body-container">
        @include('Admin.Adds.Partials.all-adds-menu-partial')
        <div class="right-rable-main">

            @if(session()->has('status'))
                <div class="{{session()->get('alert-class')}}">
                    {{session()->get('status')}}
                </div>
            @endif

            <form id="form_submit_onchange" method="get"
                  action="{{route('admin.adds')}}">
                <div class="search-drop-down-main">

                    <div class="search-left">

                        <input type="text" name="search" value="{{ old('search') }}" placeholder="By Add Name"
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





            @if($data['all_adds']['all_adds_count'] > 0)
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
                                <a href="{{route('admin.approve-all-adds')}}" class="send-main-btn"> Approve All Adds</a>
                            </li>
                        </ul>
                        <div class="pagination-top-main">
                    <span class="pagination-text">Showing


                        @if($data['all_adds']['total_adds']->total() > 5 )
                            {{$data['all_adds']['all_adds']->firstItem()}}
                            - {{$data['all_adds']['total_adds']->lastItem()}}
                            of {{$data['all_adds']['all_adds_count']}}

                        @else


                            {{$data['all_adds']['all_adds']->firstItem()}}
                            - {{$data['all_adds']['total_adds']->lastItem()}}
                            of {{$data['all_adds']['all_adds_count']}}

                            <ul class="pagination-ul">
                            <li><a href="#"><i class="fas fa-caret-left"></i></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i></a></li>
                        </ul>



                        @endif  </span>
                            @if(!app('request')->input('sort_by'))
                                {{$data['all_adds']['all_adds']->links()}}
                            @else
                                {{$data['all_adds']['all_adds']->appends(['sort_by' => app('request')->input('sort_by')])->links()}}
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

                    @foreach($data['all_adds']['all_adds'] as $add)

                        <div class="start-table">
                            <div class="start-table-main">

                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Add Name</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                            <span class="custom-right-text">
                                                <a href="{{route('user.front-add.detail',[$add->id])}}">{{$add->title}}</a>
                                            </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Status</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">@if($add->is_active == 1)
                                                        <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                                    @else
                                                        <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                                    @endif

                                                    @if($add->is_approve == "Approve")
                                                        <span class="custom-right-text btn btn-success btn-sm"> APPROVED</span>

                                                    @elseif($add->is_approve == "Not Approve")
                                                        <span class="custom-right-text btn btn-warning btn-sm"> NOT APPROVE</span>
                                                    @elseif($add->is_approve == "Rejected")
                                                        <span class="custom-right-text btn btn-danger btn-sm"> Rejected</span>
                                                    @endif

                                                </span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6">
                                                <span class="customer-id">Rates</span>
                                            </div>

                                            <div class="col-md-7 col-sm-6 col-6">

                                                        <span class="custom-right-text">Pricee : {{$add->price}}
                                                            $ </span><br>


                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">
                                                Id
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">{{$add->id}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Location</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">
                                                    @if(!empty($add->address->country))
                                                        {{$add->address->country->name}}
                                                    @endif
                                                    ,
                                                        @if(!empty($add->address->city))
                                                            {{$add->address->city->name}}
                                                        @endif
                                         </span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">
                                                Address
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">
                                                @if(!empty($add->address->address))
                                                        {{$add->address->address}}
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
                                                    @if(!empty($add->facebook_url) && !empty($add->gmail_url) && !empty($add->twitter_url))
                                                        {{$add->address->address}}
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
                                               @foreach($add->categories as $category)
                                                        <label class="badge badge-info"
                                                               style="margin-right:5px;">{{$category->name}}</label>
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
                                               {{$add->created_at}}
                                            </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <ul class="table-icon-ul">
                                    <li><a href="{{route('user.front-add.detail',[$add->id])}}"><i
                                                    class="far fa-eye" title="view details"></i></a></li>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="true" title="actions"><i
                                                    class="fas fa-cog"></i> <i class="fas fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                @if($add->is_approve == 'Not Approve')
                                                    <a href="{{route('admin.approve-add',[$add->id])}}">Approve
                                                        Add</a>
                                                    <a href="{{route('admin.reject-add',[$add->id])}}">Reject
                                                        Add</a>
                                                @endif
                                            </li>
                                            <li><a href="#">Add New Subscription</a></li>
                                            <li><a href="#">Request Primary Payment Method</a></li>
                                            <li><a href="#">Add Billing Info</a></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>

                        </div>
                    @endforeach
                    <span class="showing-text">{{$data['all_adds']['all_adds']->firstItem()}}
                        - {{$data['all_adds']['total_adds']->lastItem()}}
                        of {{$data['all_adds']['all_adds_count']}} </span>
                </div>
            @endif

            @if($data['all_adds']['all_adds_count'] ==0)
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