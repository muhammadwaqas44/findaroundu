<div class="dir-alp-con-left-1">
    <h3>Latest Businesses</h3></div>
<div class="dir-hom-pre dir-alp-left-ner-notb">
    <ul>
        <!--==========NEARBY LISTINGS============-->
        @foreach($data as $latest_business)
            <li>
                <a href="listing-details.html">
                    <div class="list-left-near lln1"><img src="{{$latest_business->profile_image}}" alt=""></div>
                    <div class="list-left-near lln2">
                        <h5>{{$latest_business->title}}</h5> <span>{{$latest_business->description}}</span></div>
                    <div class="list-left-near lln3"><span>{{number_format($latest_business->reviews()->avg('rating'),1)}}</span></div>
                </a>
            </li>
    @endforeach
    <!--==========END NEARBY LISTINGS============-->
    </ul>
</div>