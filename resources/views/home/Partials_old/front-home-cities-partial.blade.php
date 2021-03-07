<div class="index-sec4">
    <h2 class="general-heading">Explore Your City Listings</h2>
    <p class="general-pera">Explore some of the best Buisness from around the world from our partners and
        friends.</p>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="united-state-img">
                <img src="{{asset('main-assets/images/United-States.jpg')}}" alt="no img">
                <div class="img-content">
                    <span class="state-text">{{$data['business_count_city']->name}}</span>
                    <span class="state-loc">

                      {{$data['business_count_city']->business_count}}
                       <a href="{{route('user.front-business',['city_id' => $data['business_count_city']->id] )}}">
                           Businesses</a>,
                        {{$data['business_count_city']->adds_count}}
                        <a href="{{route('user.front-adds',['city_id' => $data['business_count_city']->id] )}}">
                        Adds</a>,
                        {{$data['business_count_city']->services_count}}
                        <a href="{{route('user.front-services',['city_id' => $data['business_count_city']->id] )}}">
                            Services</a>
         </span>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <div class="united-state-img">
                        <img src="{{asset('main-assets/images/United-Kingdom.jpg')}}" alt="no img">
                        <div class="img-content">

                            <span class="state-text">{{$data['adds_count_city']->name}}</span>
                            <span class="state-loc">
                                {{$data['adds_count_city']->adds_count}}
                                <a href="{{route('user.front-adds',['city_id' => $data['adds_count_city']->id] )}}">
                                Adds</a>,
                                {{$data['adds_count_city']->business_count}}
                               <a href="{{route('user.front-business',['city_id' => $data['adds_count_city']->id] )}}">
                                Businesses</a>,
                                {{$data['adds_count_city']->services_count}}
                                <a href="{{route('user.front-services',['city_id' => $data['adds_count_city']->id] )}}">
                                    Services</a>


                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="united-state-img">
                        <img src="{{asset('main-assets/images/Austalia.jpg')}}" alt="no img">
                        <div class="img-content">

                            <span class="state-text">{{$data['services_count_city']->name}}</span>
                            <span class="state-loc">
                                {{$data['services_count_city']->services_count}}
                                <a href="{{route('user.front-services',['city_id' => $data['services_count_city']->id] )}}">
                                    services</a>,
                                {{$data['services_count_city']->adds_count}}
                                <a href="{{route('user.front-adds',['city_id' => $data['services_count_city']->id] )}}">
                                 Adds</a>,
                                {{$data['services_count_city']->business_count}}
                                <a href="{{route('user.front-business',['city_id' => $data['services_count_city']->id] )}}">
                                    Businesses</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="united-state-img">
                        <img src="{{asset('main-assets/images/germany.jpg')}}" alt="no img">
                        <div class="img-content">

                            <span class="state-text">Germany</span>
                            <span class="state-loc">21 cities, 2045 listings. 3548</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-12">
                    <div class="united-state-img">
                        <img src="{{asset('main-assets/images/India.jpg')}}" alt="no img">
                        <div class="img-content">
                            <span class="state-text">India</span>
                            <span class="state-loc">21 cities, 2045 listings. 3548</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
