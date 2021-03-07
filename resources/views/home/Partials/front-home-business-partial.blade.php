{{--============================================--}}

<div class="index-sec3">
    <h2 class="general-heading">Explore Your Business</h2>
    <p class="general-pera">Explore some of the best Buisness from around the world from our partners and friends.</p>
    <div class="explore-bsnss-main">
        @foreach($data['companies']->take(9) as $companyCate)
        <div class="explore-business">
            <span class="food-cafe"><span class="food-cafe-img"><img src="{{$companyCate->icon_image}}" alt="no img"></span>
                {{ ucfirst($companyCate->name) }}
            </span>
            <ul class="explore-busines-ul">
                @foreach($companyCate->childCate->take(4) as $childCate)
                <li>
                    <a href="{{route('user.front-business',['category_id' => $childCate->id])}}">
                        {{$childCate->name}}</a>
                    <span>All ( {{$childCate->business->count()}} )</span>
                </li>
                @endforeach
            </ul>
        </div>

        @endforeach

            <span class="register-services-main">
<a href="@if(!empty(Auth::user())) {{route('user.new-business')}} @else {{route('login',['redirect_flag'=>'business'])}} @endif">Register Your Business</a>
</span>
    </div>
</div>