@extends('layout-user.app')

@section('content')


    <header class="header-container">
         @include('layout-user.header')
        @include('layout-user.search-header')
    </header>



    <div class="body-container ">
        <div class="custom-container">
            @include('layout-user.services-category')
            <div class="listing2-main">
                <div class="row">
                    <div class="col-2">
                        <div class="cat-main-div">
                            <ul class="cat-main-ul">
                                {!! \App\Helpers\SetupsHelper::getSideBarCate(app('request')->input('category_id')) !!}
                            </ul>
                        </div>
                    </div>
                    <div class="col-10" id="service-data">

                    </div>
                </div>

            </div>

            <div class="map-div-main">
                <div class="iframe-div">
                    <div id="map"></div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $('.show-map').click(function (e) {
            $('.map-div-main, .body-container').toggleClass('map-rapper');
        });


    </script>




    @include('User.Services.Partials.front-service-map-js-partial')

@endsection