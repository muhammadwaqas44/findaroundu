@extends('layout-admin.app')
@section('title','All Settings')

@section('content')

    <div class="body-container">
        @include('Admin.Settings.Partials.add-setting-menu-partial')

        <div class="right-rable-main">

            <form id="form_submit_onchange" method="get" action="{{route('admin.all-settings')}}">
                <div class="search-drop-down-main">

                    <div class="search-left">

                        <input type="text" name="search" value="{{ old('search') }}" placeholder="By Plan Name"
                               name="search">
                        <input type="submit" value="">

                    </div>

                    <div class="drop-down-right-main">
                        <span class="sort-name">Sort By</span>
                        <span class="search-drop-down2">
                            <select class="form-control" name="sort_by" onchange="formSubmit()">
                                <option value="latest" @if(app('request')->input('sort_by') == "latest") selected @endif >Created At : (Latest First)</option>
                                <option value="oldest" @if(app('request')->input('sort_by') == "oldest") selected @endif >Created At : (Oldest First)</option>
                            </select>
                        </span>
                    </div>


                </div>
            </form>


            @if($data['all_settings']['all_settings_count'] > 0)
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


                        @if($data['all_settings']['total_pages']->total() > 5 )
                            {{$data['all_settings']['all_settings']->firstItem()}}
                            - {{$data['all_settings']['total_pages']->lastItem()}}
                            of {{$data['all_settings']['all_settings_count']}}

                        @else


                            {{$data['all_settings']['all_settings']->firstItem()}}
                            - {{$data['all_settings']['total_pages']->lastItem()}}
                            of {{$data['all_settings']['all_settings_count']}}

                            <ul class="pagination-ul">
                            <li><a href="#"><i class="fas fa-caret-left"></i></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i></a></li>
                        </ul>



                        @endif  </span>
                            @if(!app('request')->input('sort_by'))
                                {{$data['all_settings']['all_settings']->links()}}
                            @else
                                {{$data['all_settings']['all_settings']->appends(['sort_by' => app('request')->input('sort_by')])->links()}}
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
                    @foreach($data['all_settings']['all_settings'] as $setting)
                        <div class="start-table">
                            <div class="start-table-main">

                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Setting Name</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                            <span class="custom-right-text">
                                                {{$setting->title}}
                                            </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Status</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">
                                                    @if($setting->is_active == 1)
                                                        <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                                    @else
                                                        <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                                    @endif</span></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">
                                                    User
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                                    @if($setting->is_user == 1)
                                                        Applied
                                                    @else
                                                        Not Applied
                                                    @endif
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Business
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                                    @if($setting->is_business == 1)
                                                        Applied
                                                    @else
                                                        Not Applied
                                                    @endif
                                                </span>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">
                                                Ads
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                                    @if($setting->is_adds == 1)
                                                        Applied
                                                    @else
                                                        Not Applied
                                                    @endif
                                                </span>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">
                                                Service
                                            </span></div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                                    @if($setting->is_service == 1)
                                                        Applied
                                                    @else
                                                        Not Applied
                                                    @endif
                                                </span>
                                            </div>
                                        </div>


                                    </div>

                                <ul class="table-icon-ul">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="true" title="actions"><i
                                                    class="fas fa-cog"></i> <i class="fas fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            @if($setting->is_active == 1)
                                                <li><a href="{{route('admin.change_status',['id'=>$setting->id])}}" class="status_btn">Deactive</a></li>
                                            @else
                                                <li><a  href="{{route('admin.change_status',['id'=>$setting->id])}}" class="status_btn">Active</a></li>
                                            @endif
                                            <li><a href="{{route('admin.delete_setting',['id'=>$setting->id])}}" class="status_btn">Delete</a></li>
                                        </ul>
                                    </li>
                                </ul>


                            </div>


                        </div>
                    @endforeach
                    <span class="showing-text">{{$data['all_settings']['all_settings']->firstItem()}}
                        - {{$data['all_settings']['total_pages']->lastItem()}}
                        of {{$data['all_settings']['all_settings_count']}} </span>
                </div>
            @endif

            @if($data['all_settings']['all_settings_count'] ==0)
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
    </div>
@endsection
