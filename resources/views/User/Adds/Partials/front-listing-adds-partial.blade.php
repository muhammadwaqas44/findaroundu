<div class="col-xl-3 col-lg-6 col-md-12 width-full" onmouseout="mousehover({{$add->id}},'out')"
     onmouseover="mousehover({{$add->id}},'in')">
        <div class="sell-product">
            <div class="sell-img">
                <img src="{{$add->profile_image}}">

            </div>
            <span class="price-product"><span>${{ $add->price }}</span></span>
            <p class="amazing-things-pera">
                <a class="listing2-parlour" href="{{route('user.front-add.detail',[$add->id])}}">
                    <strong>{{$add->title}}</strong>
                </a>
            </p>
            <p class="amazing-things-pera">
                {{$add->description}}
            </p>

            <div class="product-rate-main">
                <div class="second-rate">
                    <span class="rate-text">Rating:</span>
                    {!! \App\Helpers\ReviewHelper::reviewStars($add) !!}
                </div>

            </div>
        </div>
    </div>
