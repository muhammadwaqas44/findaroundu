
<script src="{{asset('main-assets/js/jquery.raty.js')}}"></script>
@if(session()->has('error'))
    <div class="alert alert-warning">
        {{session()->get('error')}}
    </div>
@endif
<div class="nxt-listing" id="user-review-section">
    <h3 class="watch-vedio">Reviews</h3>

    <div class="left-main-div">
        <span class="rating-count count2">{{$data['reviews_detail']['reviews_average']}}</span>

        {!!\App\Helpers\ReviewHelper::reviewStars($data['service_detail'])!!}

        <a class="leave-review1" href="#write-review-section">Leave Review <i class="fas fa-level-down-alt"></i></a>
    </div>
    <div id="posts_url_review">


    </div>


</div>


<div class="nxt-listing" id="write-review-section">
    <h3 class="watch-vedio">
        <a  @if(!Auth::check())  href="@if(Auth::check()) {{route('user.dashboard')}} @else {{route('login')}} @endif"  @endif>Leave Review</a></h3>

    <div class="row">
        <div class="col-md-7">
            @if(Auth::check())
                <form method="post" action="{{route('user.give-review')}}"> @csrf
                    <input name="rating" value="3" id="rating" style="display:none;">
                    <ul class="last-ul">
                        <li>
                            <div class="rating-last-div transparent-bg clearfix">
                                <div class="rating-last-left">

                                    <label class="label-rating">Rating :</label>
                                    <div class="left-main-div">
                                        <span id="default" class="fshn_raty"></span>
                                    </div>
                                </div>

                            </div>
                        </li>
                        <li>
                            <div class="rating-last-div">
                                <span class="fas fa-envelope grey"></span>
                                <label class="label-rating">Email :</label>
                                <input class="input-last" value=" {{Auth::user()->name}}" type="text"
                                       placeholder="Your email address" disabled>
                            </div>
                        </li>
                        <li>
                            <div class="rating-last-div">
                                <span class="fas fa-user grey"></span>
                                <label class="label-rating">Name :</label>
                                <input class="input-last" value=" {{Auth::user()->name}}" type="text"
                                       placeholder="Your Name" disabled>
                            </div>
                        </li>
                        <li>
                            <div class="rating-last-div">
                                <span class="fas fa-newspaper grey"></span>
                                <label class="label-rating">Review :</label>
                                <textarea name="review" class="input-last-textarea"
                                          placeholder="Remember and note that your review is just your experience."></textarea>
                            </div>
                        </li>

                    </ul>
                    <li>
                        <button class="leave-review-btn" type="submit">Leave Review</button>
                    </li>
                    <input name="service_id" value="{{$data['service_detail']->id}}" style="display:none">
                </form>
            @else
                <li>
                    <button class="leave-review-btn" type="submit">Give Review</button>
                </li>
            @endif
        </div>
    </div>
</div>




@include('User.Services.Reviews.Partials.reviews-js-partial')

<script>

    getReviews({{$data['service_detail']->id}});
    $('#default').raty({ number:5 });


    function setInput(id){
        document.getElementById('rating').value = id;
    }

</script>