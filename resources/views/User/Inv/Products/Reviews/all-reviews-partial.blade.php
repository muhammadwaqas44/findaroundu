<script src="{{asset('main-assets/js/jquery.raty.js')}}"></script>
<div class="nxt-listing" id="id-5">
    <h3 class="watch-vedio">Reviews</h3>
    <div class="left-main-div">
        <span class="rating-count count2">{{$data['reviews_detail']['reviews_average']}}</span>
        @if($data['reviews_detail']['reviews_average'] == 0 )
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        @elseif($data['reviews_detail']['reviews_average'] >= 1 && $data['reviews_detail']['reviews_average'] < 2)
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        @elseif($data['reviews_detail']['reviews_average'] >= 2 && $data['reviews_detail']['reviews_average'] < 3)
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>

        @elseif($data['reviews_detail']['reviews_average'] >= 3 && $data['reviews_detail']['reviews_average'] < 4)
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
            <span class="fa fa-star"></span>
        @elseif($data['reviews_detail']['reviews_average'] >= 4 && $data['reviews_detail']['reviews_average'] < 5)
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star"></span>
        @elseif($data['reviews_detail']['reviews_average'] == 5 )
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
            <span class="fa fa-star checked"></span>
        @endif
        <small>({{$data['reviews']->count()}})</small>
        <a class="leave-review1" href="#leave-review">Leave Review <i class="fas fa-level-down-alt"></i></a>
    </div>
    <div id="posts_url_review">

    </div>


</div>
<div class="nxt-listing" id="leave-review">
    <h3 class="watch-vedio">Leave Review</h3>
    <div class="row">
        <div class="col-md-7">
            @if(Auth::check())
                <form method="post" action="{{route('user.give-inv-product-review')}}"> @csrf
                    <input name="rating"  id="rating" style="display:none;">
                    <input name="add_id" value="{{$data['add_detail']->id}}"  style="display:none;">
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

                </form>
            @else
                <li>
                    <button class="leave-review-btn" type="submit">Give Review</button>
                </li>
            @endif
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