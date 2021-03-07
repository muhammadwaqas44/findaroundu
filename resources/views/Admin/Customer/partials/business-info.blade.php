<div class="menu-setup-main">
    <div class="group-btn-main">
        <span class="all-setup-text">Employees Listing</span>


        <div class="btn-group fa-pull-right listing-btn2">
            <a href="{{route('admin.new-business')}}" title="Create new" class="btn"><i class="fas fa-plus"></i> Create New Business</a>

        </div>




    </div>

    <div class="menu-setup-left2">
        <div class="setup-tab2">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"  href="#AllSubscription"><span>{{$data['all_business']['all_business_count']}}</span>All Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#ApprovedSubscription"><span>{{$data['all_business']['all_business']->where('is_active','=',1)->count()}}</span>Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#NotApprovedSubscription"><span>{{$data['all_business']['all_business']->where('is_active','=',0)->count()}}</span>Deactive</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div id="AllSubscription" class="tab-pane active">

                    @component('Admin.Customer.partials.business-component',['data' => $data])@endcomponent



                </div>
                <div id="ApprovedSubscription" class="tab-pane">

                    @component('Admin.Customer.partials.business-component',['data' => ['user_detail' => $data['user_detail'] ,'all_business' => ['all_business' => $data['all_business']['all_business']->where('is_active','=',1)->take(5), 'all_business_count' => $data['all_business']['all_business']->where('is_active','=',1)->count() ]]])@endcomponent




                        </div>
                <div id="NotApprovedSubscription" class="tab-pane">

                    @component('Admin.Customer.partials.business-component',['data' => ['user_detail' => $data['user_detail'] ,'all_business'=>['all_business' => $data['all_business']['all_business']->where('is_active','=',0)->take(5),'all_business_count'=> $data['all_business']['all_business']->where('is_active','=',0)->count()]]])@endcomponent




                </div>


            </div>
        </div>
    </div>
</div>
