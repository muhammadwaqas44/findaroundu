<div class="listing-2-lists" onmouseout="mousehover({{$service->id}},'out')"
     onmouseover="mousehover({{$service->id}},'in')">
    <div class="listing2-img" style="background: url({{"$service->profile_image"}}) center;">
    </div>
    <div class="listing2-right">
        <div class="clearfix">
            <span class="beauty-spa-2">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <a href="{{route('user.front-services',['country_id'=>$service->address->main_country_id])}}">{{$service->address->country->name}}</a>,
                 <a href="{{route('user.front-services',['city_id'=>$service->address->main_city_id])}}">
                        {{$service->address->city->name}}
                 </a>
            </span>


        </div>
        <a class="listing2-parlour"
           href="{{route('user.front-services.detail',[$service->id])}}">{{$service->title}}</a>
        <p class="listing2-para">{{$service->description}}</p>
        <span class=" rating-count padding-top2  ">{{number_format($service->reviews()->avg('rating'),1)}}</span>

        @if($service->is_approve == "Approve")
            <span class="prple-doller " style="border-right: 1px solid;
            border-left: 1px solid;border-color: #ececec;">Approved</span>
        @else
            <span class="prple-doller " style="border-right: 1px solid;
    border-left: 1px solid;border-color: #ececec;color:#f0ad4e;">Not Approved</span>

        @endif

        <span class="beauty-spa2"><i class="fas fa-clock"></i>{{$service->TimingStatus}}</span>

        <span class="prple-doller">
            <i class="fas fa-dollar-sign"></i>{{$service->hourly_price}}

        </span>
    </div>
</div>


