@forelse($data['business_detail']->portfolios as $portfolio)
    <div class="col-md-4" onclick="deleteListingData({{$portfolio->id}},{{$data['business_detail']->id}},'portfolio')">
        <div class="services-div-sec"
             style="background: url({{$portfolio->profile_image}}) no-repeat center;
                     background-size: cover;">
                                                            <span class="rgb-span">
                                        		<a href="javascript:void(0)" class="trash-pic"><i
                                                            class="fas fa-times"></i></a>
                                        	</span>

        </div>
        <span class="rstrnt-bar">{{$portfolio->title}}</span>
    </div>
@empty
    <div class="col-md-4">
        <p>No Portfolios Added</p>
    </div>
@endforelse