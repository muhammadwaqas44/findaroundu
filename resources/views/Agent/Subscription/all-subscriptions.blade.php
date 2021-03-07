@extends('layout-agent.app')
@section('title','All Subscriptions')

@section('content')

    <div class="body-container">
        @include('Agent.Subscription.Partials.all-subscription-menu-partial')
        <div class="right-rable-main">

            <form id="form_submit_onchange" method="get"
                  action="{{route('agent.subscription.all-subscription')}}">
                @if(app('request')->input('user_id'))
                    <input style="display:none;" name="user_id" value="{{app('request')->input('user_id')}}">
                @endif
                <div class="search-drop-down-main">

                    <div class="search-left">

                        <input type="text" name="search" value="{{ old('search') }}"
                               placeholder="By Subscription Name" name="search">
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

            @if($data['all_subscriptions']['all_subscriptions_count'] > 0)
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


                        @if($data['all_subscriptions']['total_pages']->total() > 5 )
                            {{$data['all_subscriptions']['all_subscriptions']->firstItem()}}
                            - {{$data['all_subscriptions']['total_pages']->lastItem()}}
                            of {{$data['all_subscriptions']['all_subscriptions_count']}}

                        @else


                            {{$data['all_subscriptions']['all_subscriptions']->firstItem()}}
                            - {{$data['all_subscriptions']['total_pages']->lastItem()}}
                            of {{$data['all_subscriptions']['all_subscriptions_count']}}

                            <ul class="pagination-ul">
                            <li><a href="#"><i class="fas fa-caret-left"></i></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i></a></li>
                        </ul>



                        @endif  </span>
                            @if(!app('request')->input('sort_by') && !app('request')->input('user_id') && !app('request')->input('search'))
                                {{$data['all_subscriptions']['all_subscriptions']->links()}}
                            @elseif(!app('request')->input('sort_by') && app('request')->input('user_id') && !app('request')->input('search'))
                                {{$data['all_subscriptions']['all_subscriptions']->appends(['user_id' => app('request')->input('user_id')])->links()}}
                            @elseif(app('request')->input('sort_by') && !app('request')->input('user_id') && !app('request')->input('search'))
                                {{$data['all_subscriptions']['all_subscriptions']->appends(['sort_by' => app('request')->input('sort_by')])->links()}}
                            @elseif(app('request')->input('sort_by') && app('request')->input('user_id') && !app('request')->input('search'))
                                {{$data['all_subscriptions']['all_subscriptions']->appends(['sort_by' => app('request')->input('sort_by'),'user_id'=> app('request')->input('user_id') ])->links()}}
                            @elseif(app('request')->input('sort_by') && app('request')->input('user_id') && app('request')->input('search'))
                                {{$data['all_subscriptions']['all_subscriptions']->appends(['sort_by' => app('request')->input('sort_by'),'user_id'=> app('request')->input('user_id'),'search' => app('request')->input('search')])->links()}}
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

                    @foreach($data['all_subscriptions']['all_subscriptions'] as $fronData)
                        <div class="start-table">
                            <div class="start-table-main">

                                <div class="row">
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Name</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                            <span class="custom-right-text">
                                                <a href="{{route('agent.subscription.subscription-detail',[$fronData->id])}}">{{$fronData->name}}</a>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Status</span></div>
                                            <div class="col-md-7 col-sm-6 col-6">

                                                @if($fronData->active == 'active')
                                                    <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span> @elseif($fronData->active == 'cancel')
                                                    <span class="custom-right-text btn btn-danger btn-sm"> CANCELLED</span> @endif


                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Plan</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">
                                               <a href="{{--{{route('agent.plan-detail',[$fronData->plan->id])}}--}}">{{$fronData->plan->name}}</a></span>
                                           </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Refrences</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">
                                               <a href="{{--{{route('agent.subscriber-detail',[$fronData->subscriber->id])}}--}}">Customer</a></span>
                                           </div>
                                        </div>


                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id"><i
                                                            class="far fa-user"></i></span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">
                                             {{$fronData->subscriber->first_name .' '.$fronData->subscriber->last_name}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id"><i
                                                            class="far fa-envelope"></i></span></div>
                                            <div class="col-md-7 col-sm-6 col-6">
                                            <span class="custom-right-text">
                                                <a href="{{--{{route('agent.subscriber-detail',[$fronData->subscriber->id])}}--}}">{{$fronData->subscriber->email}}</a>
                                        </span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id"><i
                                                            class="far fa-building"></i></span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                       class="custom-right-text">{{$fronData->subscriber->company_name}}</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id"><i
                                                            class="fas fa-phone"></i></span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">
                                           @if(!empty($fronData->subscriber->phone_number))
                                                        {{$fronData->subscriber->phone_number}}
                                                    @else
                                                        -Not available-
                                                    @endif

                                            </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span
                                                        class="customer-id">Created At</span>
                                            </div>
                                            <div class="col-md-7 col-sm-6 col-6"><span
                                                        class="custom-right-text">{{$fronData->created_at}}</span>
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
                                    <li><a href="#"><i class="far fa-eye" title="view details"></i></a></li>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="true" title="actions"><i
                                                    class="fas fa-cog"></i> <i class="fas fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Change Details</a></li>

                                            <li><a href="#">Request Primary Payment Method</a></li>
                                            <li><a href="#">Add Billing Info</a></li>
                                        </ul>
                                    </li>
                                </ul>


                            </div>


                        </div>
                    @endforeach
                    <span class="showing-text">{{$data['all_subscriptions']['all_subscriptions']->firstItem()}}
                        - {{$data['all_subscriptions']['total_pages']->lastItem()}}
                        of {{$data['all_subscriptions']['all_subscriptions_count']}} </span>
                </div>
            @endif

            @if($data['all_subscriptions']['all_subscriptions_count'] ==0)
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

@endsection
