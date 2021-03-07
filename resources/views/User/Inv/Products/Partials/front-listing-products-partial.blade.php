


<div class="col-lg-3 col-sm-6 col-12">
    <div class="sell-product">
        <div class="sell-img">

            <img src="/{{$product->profile_image}}" alt="no img">
            <span class="featured-text">Featured</span>
            <span class="likes">(121) <i class="far fa-heart"></i></span>
        </div>
        <span class="price-product">Price <span>Rs.{{$product->price}}</span></span>
        <p class="amazing-things-pera">

            <a href="{{route('user.product.detail',[$product->id])}}">{{$product->product_name}}

                @if($product->is_approve != "Approve")
                    <small>(Not Approve)</small>
                    @endif
            </a>


        </p>
        <div class="product-rate-main">
            <div class="second-rate">
                <span class="rate-text">Rating:</span>
                <div class="rating-main-div">


                    @if($product->reviews()->avg('rating') == 0 )
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    @elseif($product->reviews()->avg('rating') >= 1 && $product->reviews()->avg('rating') < 2)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    @elseif($product->reviews()->avg('rating') >= 2 && $product->reviews()->avg('rating') < 3)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>

                    @elseif($product->reviews()->avg('rating') >= 3 && $product->reviews()->avg('rating') < 4)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    @elseif($product->reviews()->avg('rating') >= 4 && $product->reviews()->avg('rating') < 5)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    @elseif($product->reviews()->avg('rating') == 5 )
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                            @endif




                </div>
            </div>
            {{--<span class="new-york-p">--}}
                {{--<a href="{{route('user.front-adds',['city_id'=>$add->address->city->id])}}">--}}
                    {{--{{$a->address->city->name}}--}}
                    {{--<i class="fas fa-map-marker-alt"></i>--}}
                {{--</a>--}}
            {{--</span>--}}
        </div>
    </div>
</div>
