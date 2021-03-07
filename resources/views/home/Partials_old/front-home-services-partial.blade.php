<div class="index-sec2">
    <h2 class="general-heading">Find Your Services</h2>
    <p class="general-pera">Explore some of the best Buisness from around the world from our Partners and
        friends.</p>
    <div class="row">

        @foreach($data['individual'] as $individualCat)
        <div class="col-lg-2 col-md-4 col-sm-6 col-12">
            <div class="services-img-main">
                        	<span class="tailer-img">
                            	<img src="{{$individualCat->profile_image}}" alt="">
                            </span>
                <span class="tailer-text"><a href="{{route('user.front-services',['category_id' => $individualCat->id])}}">{{$individualCat->name}} </a><span>Show All (940)</span></span>



            </div>
        </div>
        @endforeach

        <span class="register-services-main">
                    	<a href="@if(!empty(Auth::user())) {{route('user.add-service')}} @else {{route('login',['redirect_flag'=>'service'])}} @endif">Register Your Services</a>
                    </span>
    </div>
</div>
