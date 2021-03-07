<div class="listing-2-lists" onmouseout="mousehover({{$business->id}},'out')"
     onmouseover="mousehover({{$business->id}},'in')">
    <div class="listing2-img" style="background: url({{"$business->profile_image"}}) center;">
    </div>
    <div class="listing2-right">
        <div class="clearfix">
            <span class="beauty-spa-2"><i class="fa fa-map-marker"
                                          aria-hidden="true"></i>

                <a href="{{route('user.front-business',['country_id'=>$business->address->main_country_id])}}">{{$business->address->country->name}}</a>,
                <a href="{{route('user.front-business',['city_id'=>$business->address->main_city_id])}}">{{$business->address->city->name}}</a></span>
       {{--     <span class="else-dotted">
                                <a href="#" data-toggle="dropdown" class="new-icns " aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </a>
                                <ul class="dropdown-menu new-drop-listing2">
                                    <li>
                                        <a href="#">Muzamil</a>
                                    </li>
                                </ul>
                            </span>--}}

        </div>
        <a class="listing2-parlour" href="{{route('front-business.detail',[$business->id])}}">{{$business->title}}</a>
        <p class="listing2-para"> {{$business->description}}</p>
        <span class=" rating-count padding-top2  ">{{number_format($business->reviews()->avg('rating'),1)}}</span>

        @if($business->is_approve == "Approve")
            <span class="prple-doller " style="border-right: 1px solid;
    border-left: 1px solid;border-color: #ececec;">Approved</span>
        @else
            <span class="prple-doller " style="border-right: 1px solid;
    border-left: 1px solid;border-color: #ececec;color:#f0ad4e;">Not Approved</span>

        @endif




        @php
            $rate = $business->rates->where('price_type','Hourly Base')->first()
        @endphp

        <span class="beauty-spa2"><i class="fas fa-clock"></i>{{$business->TimingStatus}}</span>


        <span class="prple-doller">
        @if($rate)
                {{ $rate->rate }} <i class="fas fa-dollar-sign"></i> / h
            @endif
        </span>
    </div>
</div>