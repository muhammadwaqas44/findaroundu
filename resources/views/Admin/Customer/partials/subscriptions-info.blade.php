<div class="menu-setup-main">
    <div class="group-btn-main">
        <span class="all-setup-text">Subscriptions</span>


        <div class="btn-group fa-pull-right listing-btn2">
            <a href="{{route('admin.all-subscription',['user_id'=>$data['user_detail']->id])}}" class="btn">
                <i class="fas fa-plus"></i> View Subscriptions
            </a>

        </div>


    </div>


    <div class="menu-setup-left2">
        <div class="setup-tab2">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">


                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"
                       href="#All"><span>{{$data['all_subscriptions']['all_subscriptions_count']}}</span>All
                        Subscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                       href="#Approved"><span>{{$data['all_subscriptions']['all_subscriptions']->where('active','=','active')->count()}}</span>Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"
                       href="#NotApproved"><span>{{$data['all_subscriptions']['all_subscriptions']->where('active','=','cancel')->count()}}</span>Deactive</a>
                </li>


            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div id="All" class="tab-pane active">

                     @component('Admin.Customer.partials.subscription-component',['data' => $data])@endcomponent


                </div>
                <div id="Approved" class="tab-pane">

                    @component('Admin.Customer.partials.subscription-component',['data' => ['user_detail' => $data['user_detail'] ,'all_subscriptions' => ['all_subscriptions' => $data['all_subscriptions']['all_subscriptions']->where('active','=','active')->take(5), 'all_subscriptions_count' => $data['all_subscriptions']['all_subscriptions']->where('active','=','active')->count() ]]])@endcomponent


                </div>
                <div id="NotApproved" class="tab-pane">

                     @component('Admin.Customer.partials.subscription-component',['data' => ['user_detail' => $data['user_detail'] ,'all_subscriptions'=>['all_subscriptions' => $data['all_subscriptions']['all_subscriptions']->where('active','=','cancel')->take(5),'all_subscriptions_count'=> $data['all_subscriptions']['all_subscriptions']->where('active','=','cancel')->count()]]])@endcomponent


                </div>


            </div>
        </div>
    </div>
</div>
