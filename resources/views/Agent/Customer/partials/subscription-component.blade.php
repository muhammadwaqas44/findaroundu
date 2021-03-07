<div class="menu-setup-right2">
    <div class="all-setup-table2">


        @if($data['all_subscriptions']['all_subscriptions_count'] < 5)
            <div class="table-sec-main">
                <div class="table-first-sec">
                    <ul class="table-left-ul">
                        <li>
                            <a href="#" class="send-main-btn"><i class="fas fa-envelope"></i> Send
                                Email</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="export-btn" data-toggle="dropdown"
                                        aria-expanded="true"><i
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


                        @if($data['all_subscriptions']['all_subscriptions_count'] == 0 )
                            0
                            -{{$data['all_subscriptions']['all_subscriptions_count']}}

                            of {{$data['all_subscriptions']['all_subscriptions_count']}}

                        @else


                            1
                            - @if($data['all_subscriptions']['all_subscriptions_count'] > 5 )
                                5
                            @else
                                {{$data['all_subscriptions']['all_subscriptions_count']}}
                            @endif
                            of {{$data['all_subscriptions']['all_subscriptions_count']}}





                        @endif  </span>
                      {{--  @if(!app('request')->input('sort_by'))
                            {{$data['all_subscriptions']['all_subscriptions']->links()}}
                        @else
                            {{$data['all_subscriptions']['all_subscriptions']->appends(['sort_by' => app('request')->input('sort_by')])->links()}}
                        @endif--}}
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




            @foreach($data['all_subscriptions']['all_subscriptions'] as $subscription)
                    <div class="start-table">
                        <div class="start-table-main">

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Name</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6">
                                            <span class="custom-right-text">
                                                <a href="{{route('agent.subscription.subscription-detail',[$subscription->id])}}">{{$subscription->name}}</a>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Status</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">@if($subscription->active == "active")
                                                    <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                                @else
                                                    <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                                @endif



                                                </span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Plan</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">
                                                <a href="{{route('agent.plan-detail',[$subscription->plan->id])}}">{{$subscription->plan->name}}</a></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Customer</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">
                                                <a href="{{route('agent.user-detail',[$subscription->subscriber->id])}}">{{$subscription->subscriber->name}}</a></span>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Location</span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">{{$subscription->user->address->country->name}}
                                                , {{$subscription->user->address->city->name}}
                                         </span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">
                                                Address
                                            </span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">
                                                @if(!empty($subscription->user->address->address))
                                                    {{$subscription->user->address->address}}
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
                                                    class="customer-id">Phone</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">
                                               {{$subscription->subscriber->phone}} </span>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id"> Created At</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                               {{$subscription->created_at}}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <ul class="table-icon-ul">
                                <li>
                                    <a href="{{route('user.front-add.detail',[$subscription->id])}}"><i
                                                class="far fa-eye" title="view details"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" aria-expanded="true"
                                       title="actions"><i
                                                class="fas fa-cog"></i> <i
                                                class="fas fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">

                                        <li><a href="#">Add New Subscription</a></li>
                                        <li><a href="#">Request Primary Payment Method</a></li>
                                        <li><a href="#">Add Billing Info</a></li>


                                    </ul>
                                </li>
                            </ul>


                        </div>


                    </div>
                @endforeach
                @if($data['all_subscriptions']['all_subscriptions_count'] == 0)
                    <div class="table-sec-main">

                        <div class="no-content">
                            <span class="oops-text">Oops! no data found for your search.</span>
                        </div>
                    </div>
                @endif
            </div>
            @else
            <div class="table-sec-main">
                <div class="table-first-sec">
                    <ul class="table-left-ul">
                        <li>
                            <a href="#" class="send-main-btn"><i class="fas fa-envelope"></i> Send
                                Email</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="export-btn" data-toggle="dropdown"
                                        aria-expanded="true"><i
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



                            @if($data['all_subscriptions']['all_subscriptions_count'] == 0 )
                                0
                            -{{$data['all_subscriptions']['all_subscriptions_count']}}
                                of {{$data['all_subscriptions']['all_subscriptions_count']}}

                            @else


                                1
                                - @if($data['all_subscriptions']['all_subscriptions_count'] > 5 )
                                5
                            @else
                                {{$data['all_subscriptions']['all_subscriptions_count']}}
                            @endif
                                of {{$data['all_subscriptions']['all_subscriptions_count']}}

                            <a href="{{route('agent.all-subscribers',['user_id' => $data['user_detail']->id])}}" class="btn btn-primary">Show more</a>




                            @endif  </span>

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




                @foreach($data['all_subscriptions']['all_subscriptions'] as $subscription)
                    <div class="start-table">
                        <div class="start-table-main">

                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Name</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6">
                                            <span class="custom-right-text">
                                                <a href="{{route('agent.subscription.subscription-detail',[$subscription->id])}}">{{$subscription->name}}</a>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Status</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">@if($subscription->active == "active")
                                                    <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span>

                                                @else
                                                    <span class="custom-right-text btn btn-danger btn-sm"> DEACTIVE</span>
                                                @endif



                                                </span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Plan</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">
                                                <a href="{{route('agent.plan-detail',[$subscription->plan->id])}}">{{$subscription->plan->name}}</a></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Customer</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">
                                                <a href="{{route('agent.user-detail',[$subscription->subscriber->id])}}">{{$subscription->subscriber->name}}</a></span>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">Location</span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">{{$subscription->user->address->country->name}}
                                                , {{$subscription->user->address->city->name}}
                                         </span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id">
                                                Address
                                            </span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">
                                                @if(!empty($subscription->user->address->address))
                                                    {{$subscription->user->address->address}}
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
                                                    class="customer-id">Phone</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6"><span
                                                    class="custom-right-text">
                                               {{$subscription->subscriber->phone}} </span>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span
                                                    class="customer-id"> Created At</span>
                                        </div>
                                        <div class="col-md-7 col-sm-6 col-6">
                                                <span class="custom-right-text">
                                               {{$subscription->created_at}}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <ul class="table-icon-ul">
                                <li>
                                    <a href="{{route('user.front-add.detail',[$subscription->id])}}"><i
                                                class="far fa-eye" title="view details"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown" aria-expanded="true"
                                       title="actions"><i
                                                class="fas fa-cog"></i> <i
                                                class="fas fa-caret-down"></i></a>
                                    <ul class="dropdown-menu">

                                        <li><a href="#">Add New Subscription</a></li>
                                        <li><a href="#">Request Primary Payment Method</a></li>
                                        <li><a href="#">Add Billing Info</a></li>


                                    </ul>
                                </li>
                            </ul>


                        </div>


                    </div>
                @endforeach

            </div>

        @endif



    </div>

</div>
