
        <!--==========NEARBY LISTINGS============-->
        <div class="dir-alp-con-left-1">
            <h3>Latest Services</h3></div>
        <div class="dir-hom-pre dir-alp-left-ner-notb">
            <ul>
        @foreach($data as $latest_service)
            <li>
                <a href="listing-details.html">
                    <div class="list-left-near lln1"><img src="{{$latest_service->profile_image}}" alt=""></div>
                    <div class="list-left-near lln2">
                        <h5>{{$latest_service->title}}</h5> <span>{{$latest_service->description}}</span></div>
                    <div class="list-left-near lln3"><span>{{number_format($latest_service->reviews()->avg('rating'),1)}}</span></div>
                </a>
            </li>
    @endforeach

            </ul>
        </div>
    <!--==========END NEARBY LISTINGS============-->

