<script src="{{asset('main-assets/js/jquery.raty.js')}}"></script>
@if(session()->has('error'))
    <div class="alert alert-warning">
        {{session()->get('error')}}
    </div>
@endif


<div class="listing-details-sec1" id="user-review-section">


    <div id="posts_url_review">

    </div>


</div>


<div class="listing-details-sec1" id="write-review-section">
    <div class="nxt-listing">
        <div class="row no-gutters">
            <div class="head-bg">
                <h3 class="watch-vedio">
                    <a @if(!Auth::check()) href="@if(Auth::check()) {{route('user.dashboard')}} @else {{route('login')}} @endif" @endif>Leave
                        Review</a>
                </h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if(Auth::check())
                    <form method="post" action="{{route('user.give-review')}}">
                        @csrf
                        <input name="rating" id="rating" style="display:none;">
                        <input name="add_id" value="{{$data['add_detail']->id}}" style="display:none;">

                        <ul class="last-ul">
                            <li>
                                <div class="rating-last-div transparent-bg clearfix">
                                    <div class="rating-last-left">

                                        <label class="label-rating">Rating :</label>
                                        <div class="left-main-div">
                                            <span id="default" class="fshn_raty"></span>

                                        </div>
                                    </div>

                                    <div class="rating-last-right">
                                        <span>{!! \App\Helpers\ReviewHelper::reviewStars($data['add_detail']) !!}</span>
                                        {{$data['reviews_detail']['reviews_average']}} out of
                                        <span>{{$data['reviews']->count()}}</span>
                                    </div>

                                </div>
                            </li>
                            <li>
                                <div class="rating-last-div">
                                    <span class="fas fa-envelope grey"></span>
                                    <label class="label-rating">Email :</label>
                                    <input class="input-last" type="text" value="{{Auth::user()->email}}" disabled
                                           placeholder="Your email address">
                                </div>
                            </li>
                            <li>
                                <div class="rating-last-div">
                                    <span class="fas fa-user grey"></span>
                                    <label class="label-rating">Name :</label>
                                    <input class="input-last" value="{{Auth::user()->name}}" type="text" disabled
                                           placeholder="Your Name">
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
                            <button type="submit" class="leave-review-btn">Leave Review</button>
                        </li>
                    </form>
                @else
                    <ul class="last-ul">
                        <li>
                            <div class="rating-last-div transparent-bg clearfix">
                                <div class="rating-last-left">

                                    <label class="label-rating">Rating :</label>
                                    <div class="left-main-div">


                                    </div>
                                </div>

                                <div class="rating-last-right">
                                    <span>{!! \App\Helpers\ReviewHelper::reviewStars($data['add_detail']) !!}</span>
                                    {{$data['reviews_detail']['reviews_average']}} out of
                                    <span>{{$data['reviews']->count()}}</span>
                                </div>

                            </div>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>

@include('User.Adds.Reviews.Partials.reviews-js-partial')

<script>

    function setInput(id){
        document.getElementById('rating').value = id;
    }

    $('#default').raty({ number:5 });

    getReviews( {{$data['add_detail']->id}});
</script>