
<!--==========NEARBY LISTINGS============-->
<div class="dir-alp-con-left-1">
    <h3>Latest Adds</h3></div>
<div class="dir-hom-pre dir-alp-left-ner-notb">
    <ul>
        @foreach($data as $latest_adds)
            <li>
                <a href="listing-details.html">
                    <div class="list-left-near lln1"><img src="{{$latest_adds->profile_image}}" alt=""></div>
                    <div class="list-left-near lln2">
                        <h5>{{$latest_adds->title}}</h5> <span>{{$latest_adds->description}}</span></div>
                    <div class="list-left-near lln3"><span>{{number_format($latest_adds->reviews()->avg('rating'),1)}}</span></div>
                </a>
            </li>
        @endforeach

    </ul>
</div>
<!--==========END NEARBY LISTINGS============-->

