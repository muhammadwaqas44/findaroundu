<div class="home-list-pop list-spac list-spac-1">
    <!--LISTINGS IMAGE-->
    <div class="col-md-3"><img src="{{$service->profile_image}}" alt=""></div>
    <!--LISTINGS: CONTENT-->
    <div class="col-md-9 home-list-pop-desc inn-list-pop-desc"><a href="{{route('user.front-services.detail',[$service->id])}}">
            <h3>{{$service->title}}</h3></a>
        <h4>{{$service->address->country->name}}, {{$service->address->city->name}}</h4>
        <p><b>Address:</b> {{$service->address->address}}</p>
        <div class="list-number">
            <ul>
                <li><img src="images/icon/phone.png" alt=""> {{$service->createdBy->phone}}
                </li>
                <li><img src="images/icon/mail.png" alt=""> {{$service->createdBy->email}}</li>
            </ul>
        </div>
        <span class="home-list-pop-rat">4.2</span>
        <div class="list-enqu-btn">
            <ul>
                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i>
                        Write Review</a></li>
                <li><a href="#"><i class="fa fa-commenting-o"
                                   aria-hidden="true"></i> Send SMS</a></li>
                <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Call
                        Now</a></li>
                <li><a href="#" data-dismiss="modal" data-toggle="modal"
                       data-target="#list-quo"><i class="fa fa-usd"
                                                  aria-hidden="true"></i> Get Quotes</a>
                </li>
            </ul>
        </div>
    </div>
</div>