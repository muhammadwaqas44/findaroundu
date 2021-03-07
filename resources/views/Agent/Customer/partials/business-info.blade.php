<div class="menu-setup-main">
    <div class="group-btn-main">
        <span class="all-setup-text">Business Listing</span>


        <div class="btn-group fa-pull-right listing-btn2">
            <a href="{{route('agent.new-business')}}" title="Create new" class="btn"><i class="fas fa-plus"></i> Create New Business</a>

        </div>




    </div>

    <div class="menu-setup-left2">
        <div class="setup-tab2">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"  href="#AllBusiness"><span>{{$data['all_business']['all_business_count']}}</span>All Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#ApprovedBusiness"><span>{{$data['all_business']['all_business']->where('is_active','=',1)->count()}}</span>Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#NotApprovedBusiness"><span>{{$data['all_business']['all_business']->where('is_active','=',0)->count()}}</span>Deactive</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                <div id="AllBusiness" class="tab-pane active">

                    @component('Agent.Customer.partials.business-component',['data' => $data])@endcomponent



                </div>
                <div id="ApprovedBusiness" class="tab-pane">

                    @component('Agent.Customer.partials.business-component',['data' => ['user_detail' => $data['user_detail'] ,'all_business' => ['all_business' => $data['all_business']['all_business']->where('is_active','=',1)->take(5), 'all_business_count' => $data['all_business']['all_business']->where('is_active','=',1)->count() ]]])@endcomponent




                </div>
                <div id="NotApprovedBusiness" class="tab-pane">

                    @component('Agent.Customer.partials.business-component',['data' => ['user_detail' => $data['user_detail'] ,'all_business'=>['all_business' => $data['all_business']['all_business']->where('is_active','=',0)->take(5),'all_business_count'=> $data['all_business']['all_business']->where('is_active','=',0)->count()]]])@endcomponent




                </div>


            </div>
        </div>
    </div>
</div>
