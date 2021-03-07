@extends('MainSite-layouts.main-site-app')
@section('title','All Subscribers')

@section('content')


    @include('MainSite.Subscribers.Partials.add-customer-menu-partial')

    <div class="right-rable-main">

        <form id="form_submit_onchange" method="get" action="{{route('main-admin.all-subscribers')}}">
            <div class="search-drop-down-main">

                <div class="search-left">

                    <input type="text" name="search" value="{{ old('search') }}"
                           placeholder="By Subscriber Name / Company" name="search">
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

        @if($data['all_customers']['all_customers_count'] > 0)
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


                        @if($data['all_customers']['total_pages']->total() > 5 )
                            {{$data['all_customers']['all_customers']->firstItem()}}
                            - {{$data['all_customers']['total_pages']->lastItem()}}
                            of {{$data['all_customers']['all_customers_count']}}

                        @else


                            {{$data['all_customers']['all_customers']->firstItem()}}
                            - {{$data['all_customers']['total_pages']->lastItem()}}
                            of {{$data['all_customers']['all_customers_count']}}

                            <ul class="pagination-ul">
                            <li><a href="#"><i class="fas fa-caret-left"></i></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i></a></li>
                        </ul>



                        @endif  </span>
                        @if(!app('request')->input('sort_by'))
                            {{$data['all_customers']['all_customers']->links()}}
                        @else
                            {{$data['all_customers']['all_customers']->appends(['sort_by' => app('request')->input('sort_by')])->links()}}
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

                @foreach($data['all_customers']['all_customers'] as $customer)
                    <div class="start-table">
                        <div class="start-table-main">

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">First Name</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">{{$customer->first_name}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Subscription(s)</span></div>
                                        <div class="col-md-7 col-sm-6 col-6">
                                            @if($customer->subscriptions()->count() == 0)
                                                <span
                                                        class="custom-right-text">-Not available-</span>
                                            @else

                                                @if($customer->subscriptions()->where('active','cancel')->get()->count() > 0)

                                                    <span style="margin-right:5px;" class="custom-right-text btn btn-danger btn-sm">{{$customer->subscriptions()->where('active','cancel')->get()->count()}}
                                                        CANCELLED</span>
                                                @endif

                                                @if($customer->subscriptions()->where('active','active')->get()->count() > 0)
                                                    <span style="margin-right:5px;" class="custom-right-text btn btn-success btn-sm">{{$customer->subscriptions()->where('active','active')->get()->count()}}
                                                        ACTIVE</span>
                                                @endif
                                            @endif

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Payment Method</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">-Not available-</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">References</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6">
                                            @if($customer->subscriptions()->count() != 0)
                                                <a href="{{route('admin.all-subscription')}}?user_id={{$customer->id}}" class="anker-text">
                                                    Subscriptions</a>
                                            @else
                                                <span
                                                        class="custom-right-text">-Not available-</span>

                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id"><i
                                                        class="far fa-user"></i></span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">{{$customer->full_name}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id"><i
                                                        class="far fa-envelope"></i></span></div>
                                        <div class="col-md-7 col-sm-6 col-6">
                                            <span class="custom-right-text">
                                                <a href="{{route('main-admin.subscriber-detail',[$customer->id])}}">{{$customer->email}}</a>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id"><i
                                                        class="far fa-building"></i></span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">{{$customer->company_name}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id"><i
                                                        class="fas fa-phone"></i></span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">
                                            @if(!empty($customer->phone))
                                                    {{$customer->phone}}
                                                @else
                                                    -Not available-
                                                @endif

                                            </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Created At</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">{{$customer->created_at}}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Net Payment</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">USD 0.00</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Total Unpaid</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">USD 0.00</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Excess Payments</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">USD 0.00</span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <ul class="table-icon-ul">
                                <li><a href="{{route('main-admin.subscriber-detail',[$customer->id])}}"><i class="far fa-eye" title="view details"></i></a></li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" aria-expanded="true" title="actions"><i
                                                class="fas fa-cog"></i> <i class="fas fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Change Details</a></li>
                                        <li>
                                            <a href="{{route('main-admin.subscriber.create-new-subscription',[$customer->id])}}">Add
                                                New Subscription</a></li>
                                        <li><a href="#">Request Primary Payment Method</a></li>
                                        <li><a href="#">Add Billing Info</a></li>
                                    </ul>
                                </li>
                            </ul>


                        </div>


                    </div>
                @endforeach
                <span class="showing-text">{{$data['all_customers']['all_customers']->firstItem()}}
                    - {{$data['all_customers']['total_pages']->lastItem()}}
                    of {{$data['all_customers']['all_customers_count']}} </span>
            </div>
        @endif

        @if($data['all_customers']['all_customers_count'] ==0)
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


    <script>
        function formSubmit() {
            document.getElementById('form_submit_onchange').submit();
        }
    </script>

@endsection
