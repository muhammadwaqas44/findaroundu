<div class="menu-setup-main">
    <div class="group-btn-main">
        <span class="all-setup-text">Employees Listing</span>


        <div class="btn-group fa-pull-right listing-btn2">
            <a href="{{route('admin.new-service')}}" title="Create new" class="btn"><i class="fas fa-plus"></i> Create New Service</a>

        </div>




    </div>

    <div class="menu-setup-left2">
        <div class="setup-tab2">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"  href="#AllService"><span>{{$data['all_services']['all_services_count']}}</span>All Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#ServiceApproved"><span>{{$data['all_services']['all_services']->where('is_active','=',1)->count()}}</span>Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#ServiceNotApproved"><span>{{$data['all_services']['all_services']->where('is_active','=',0)->count()}}</span>Deactive</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div id="AllService" class="tab-pane active">

                    @component('Admin.Customer.partials.service-component',['data' => $data])@endcomponent

                </div>

                <div id="ServiceApproved" class="tab-pane">

                    @component('Admin.Customer.partials.service-component',['data' => ['user_detail' => $data['user_detail'] ,'all_services' => ['all_services' => $data['all_services']['all_services']->where('is_active','=',1)->take(5), 'all_services_count' => $data['all_services']['all_services']->where('is_active','=',1)->count() ]]])@endcomponent</div>

                <div id="ServiceNotApproved" class="tab-pane">

                    @component('Admin.Customer.partials.service-component',['data' => ['user_detail' => $data['user_detail'] ,'all_services'=>['all_services' => $data['all_services']['all_services']->where('is_active','=',0)->take(5),'all_services_count'=> $data['all_services']['all_services']->where('is_active','=',0)->count()]]])@endcomponent



                </div>

            </div>
        </div>
    </div>
</div>
