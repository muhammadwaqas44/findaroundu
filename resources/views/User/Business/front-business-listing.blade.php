@extends('layout-user.app')

@section('content')
<style>
.filter_active{background-color: #e6347b !important;color: #fff !important;}
</style>

    <header class="header-container">
        @include('layout-user.header')
        <div id="business_head_filter" class="filter_area_head {{($data["listing_type"] == "Business Directory")? 'd-block':'d-none'}}">
            @include('layout-user.search-header-business')
        </div>
        <div id="job_head_filter" class="filter_area_head {{($data["listing_type"] == "Tasks / Jobs / Work")? 'd-block':'d-none'}}">
            Job Filter Here
        </div>
        <div id="services_head_filter" class="filter_area_head {{($data["listing_type"] == "Professional / Services")? 'd-block':'d-none'}}">
            Service Filter Here
        </div>
        <div id="classified_head_filter" class="filter_area_head {{($data["listing_type"] == "Classified")? 'd-block':'d-none'}}">
            @include('layout-user.search-header-ads')
        </div>
     {{--   <div id="shopping_head_filter" class="filter_area_head {{($data["listing_type"] == "Shopping")? 'd-block':'d-none'}}">
            Shopping Filter Here
        </div>--}}
    </header>


    <div class="body-container ">
        <div class="professionals-page-main">


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2 hide-col-map">
                        <div class="related-p-div-main">
                            <div id="business_sidebar_filter" class="sidebar_filter {{($data["listing_type"] == "Business Directory")? 'd-block':'d-none'}}">
                                {!! \App\Helpers\SetupsHelper::getSideBarCate('Business', $data["category_id"]) !!}
                            </div>
                            <div id="job_sidebar_filter" class="sidebar_filter {{($data["listing_type"] == "Tasks / Jobs / Work")? 'd-block':'d-none'}}">
                                Job Filter Here
                            </div>
                            <div id="services_sidebar_filter" class="sidebar_filter {{($data["listing_type"] == "Professional / Services")? 'd-block':'d-none'}}">
                                Service Filter Here
                            </div>
                            <div id="classified_sidebar_filter" class="sidebar_filter {{($data["listing_type"] == "Classified")? 'd-block':'d-none'}}">
                                {!! \App\Helpers\SetupsHelper::getSideBarCate('Adds', $data["category_id"]) !!}
                            </div>
                            <div id="shopping_sidebar_filter" class="sidebar_filter {{($data["listing_type"] == "Shopping")? 'd-block':'d-none'}}">
                                Shopping Filter Here
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="product-main-sec">
                            <ul class="nav nav-tabs" role="tablist">
                               {{-- <li class="nav-item">
                                    <a class="nav-link {{($data["listing_type"] == "Tasks / Jobs / Work")? 'active':''}}" href="javascript:void(0)">Jobs / Work</a>
                                </li>--}}
                                <li class="nav-item">
                                    <a class="nav-link {{($data["listing_type"] == "Professional / Services")? 'active':''}}" href="javascript:void(0)">Professionals &amp; Servicess</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{($data["listing_type"] == "Business Directory")? 'active':''}}" href="javascript:void(0)">Business Directory</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{($data["listing_type"] == "Classified")? 'active':''}}" href="javascript:void(0)">Adds</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{($data["listing_type"] == "Shopping")? 'active':''}}" href="#shopping">Shopping</a>
                                </li>

                            </ul>
                            <div class="tab-content"  id="business-data">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="map-div-main">
                <div class="iframe-div">
                    <div id="map"></div>
                </div>
                {{--{{\App\Helpers\MapHelper::mapHelper($data['all_business']['all_business'],'business')}}--}}
            </div>

        </div>
    </div>
    <script>
        $('.show-map').click(function (e) {
            $('.map-div-main, .body-container').toggleClass('map-rapper');
        });

        $('.nav-link').click(function(){
            console.log($(this).text());
            if($(this).text() == 'Adds')
            {
                $('.nav-link').removeClass('active')
                $('.filter_area_head.d-block').removeClass('d-block').addClass('d-none');
                $('.sidebar_filter.d-block').removeClass('d-block').addClass('d-none');

                $(this).addClass('active');
                $('#classified_head_filter').removeClass('d-none').addClass('d-block');

                $('#classified_sidebar_filter').removeClass('d-none').addClass('d-block');
                $("#ads_filter_search_form").submit();
            }
            else if($(this).text() == 'Business Directory')
            {
                $('.nav-link').removeClass('active')
                $('.filter_area_head.d-block').removeClass('d-block').addClass('d-none');
                $('.sidebar_filter.d-block').removeClass('d-block').addClass('d-none');

                $(this).addClass('active');
                $('#business_head_filter').removeClass('d-none').addClass('d-block');

                $('#business_sidebar_filter').removeClass('d-none').addClass('d-block');
                $("#business_filter_search_form").submit();
            }


        });
    </script>



    @include('User.Business.Partials.front-business-map-js-partial')
{{--    @include('User.Adds.Partials.front-add-map-js-new-partial')--}}

@endsection
