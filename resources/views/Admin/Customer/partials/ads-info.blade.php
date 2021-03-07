<div class="menu-setup-main">
    <div class="group-btn-main">
        <span class="all-setup-text">Employees Listing</span>


        <div class="btn-group fa-pull-right listing-btn2">
            <a href="{{route('admin.new-add')}}" class="btn">
                <i class="fas fa-plus"></i> Create New Ads
            </a>

        </div>

    </div>

    <div class="menu-setup-left2">
        <div class="setup-tab2">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">

                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab"  href="#AllAds"><span>{{$data['all_adds']['all_adds_count']}}</span>All Ads</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#AdsApproved"><span>{{$data['all_adds']['all_adds']->where('is_active','=',1)->count()}}</span>Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab"  href="#AdsNotApproved"><span>{{$data['all_adds']['all_adds']->where('is_active','=',0)->count()}}</span>Deactive</a>
                </li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">





                <div id="AllAds" class="tab-pane active">

                    @component('Admin.Customer.partials.ads-component',['data' => $data])@endcomponent

                </div>

                <div id="AdsApproved" class="tab-pane">

                    @component('Admin.Customer.partials.ads-component',['data' => ['user_detail' => $data['user_detail'] ,'all_adds' => ['all_adds' => $data['all_adds']['all_adds']->where('is_active','=',1)->take(5), 'all_adds_count' => $data['all_adds']['all_adds']->where('is_active','=',1)->count() ]]])@endcomponent

                </div>

                <div id="AdsNotApproved" class="tab-pane">

                    @component('Admin.Customer.partials.ads-component',['data' => ['user_detail' => $data['user_detail'] ,'all_adds'=>['all_adds' => $data['all_adds']['all_adds']->where('is_active','=',0)->take(5),'all_adds_count'=> $data['all_adds']['all_adds']->where('is_active','=',0)->count()]]])@endcomponent

                </div>



        </div>

</div>
</div>
</div>