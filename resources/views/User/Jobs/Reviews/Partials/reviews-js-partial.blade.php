<script>
    function getReviews(id) {

        baseUrl = "{{url('user/adds/')}}" + "/" + id + "/reviews";



        $.get(baseUrl, function (data, status) {

            liHtml = "";
            if (data.reviews != null) {

                for (i = 0; i < data.reviews.length; i++) {

                    likeBy = "";
                    likeColor = "";
                    borderBottom = ""
                    if (data.reviews.length == 1) {
                        borderBottom = "style='border-bottom:0px;'";
                    }

                    @if(Auth::check())


                    if (data.reviews[i].like_by == "me") {
                        likeColor = "style='color: #3dbbd0;'";
                    }

                    likeHtml = `<li><a id="like-color-` + data.reviews[i].review_id + `" ` + likeColor + `  onclick="addLike(` + data.reviews[i].review_id + `)"><span ` + likeColor + `>Like ( <span id="like_count_post_` + data.reviews[i].review_id + `">` + data.reviews[i].review_likes + `</span> )</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>`;
                    commentHtml = `<li><a onclick="loadComments(` + data.reviews[i].review_id + `)" data-toggle="collapse" data-target="#coment-` + data.reviews[i].review_id + `"><span>Comments ( <span id="comment_count_post_` + data.reviews[i].review_id + `">` + data.reviews[i].reviews_comments_count + `</span> )</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>`;

                    @else
                        likeHtml = `<li><a  href="{{route('login')}}"><span>Like ( <span id="like_count_post_` + data.reviews[i].review_id + `">` + data.reviews[i].review_likes + `</span> )</span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> </li>`;
                    commentHtml = `  <li><a href="{{route('login')}}"><span>Comments ( <span id="comment_count_post_` + data.reviews[i].review_id + `">` + data.reviews[i].reviews_comments_count + `</span> )</span> <i class="fa fa-commenting-o" aria-hidden="true"></i></a> </li>`;
                    @endif



                    if (data.reviews[i].rating == 5) {
                        reviewBg = "style='background: #55bf15;';";
                    }
                    else if (data.reviews[i].rating == 4) {
                        reviewBg = "style='background: #73ca14;'";
                    }
                    else if (data.reviews[i].rating == 3) {
                        reviewBg = "style='background: #3dbbd0;'";
                    }
                    else if (data.reviews[i].rating == 2) {
                        reviewBg = "style='background: #ca7224;'";
                    }
                    else if (data.reviews[i].rating == 1) {
                        reviewBg = "style='background: #de382c;'";
                    }

                    ratingHtml = "";
                    if(data.reviews[i].rating  == 1){
                        ratingHtml = `
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                     `;
                    }else if(data.reviews[i].rating  == 2){
                        ratingHtml = `
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star "></span>
                                      `;
                    }
                    else if(data.reviews[i].rating  == 3){
                        ratingHtml = `
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star "></span>
                                      `;
                    }
                    else if(data.reviews[i].rating  == 4){
                        ratingHtml = `
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star "></span>
                                      `;
                    }
                    else if(data.reviews[i].rating  == 5){
                        ratingHtml = `
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                      `;
                    }

                    commentInputHtml = `<div class="collapse" id="coment-` + data.reviews[i].review_id + `">
                                    			<div class="coment_white_sec">
                                        	<input type="text" id="comment_input_id_` + data.reviews[i].review_id + `" placeholder="Add a comment" class="ad_coment_text">
                                            <div class="browse_coment_main">

                                                <input type="submit" value="Comment" class="post_com_btn"  onclick="postComment(` + data.reviews[i].review_id + `)">
                                            </div>
                                        </div>
                                        <ul class="comments-ul" id="post_comments_` + data.reviews[i].review_id + `">

                                        </ul>

                                    		</div>`;


                    liHtml = liHtml + ` <div class="nxt-listing">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mssge-list-left">
                            <a class="profile-nme"  ><img src="` + data.reviews[i].user_img + `" alt="logo"></a>
                                <div class="name-list">
                                      <span class="author">` + data.reviews[i].posted_user_name + `</span>
                                      <span class="time33">` + data.reviews[i].created_at + `</span>
                                      <div class="rating-main-div new-stars">
                                          `+ratingHtml+`
                                      </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                          <p class="profile-para">` + data.reviews[i].review + `</p>
                    </div>

                </div> <ul class="next-ul" style="margin-top: 15px !important;">` + likeHtml + commentHtml + `
                        <li><a href="#!"><span>Share Now</span>  <i class="fab fa-facebook" aria-hidden="true"></i></a> </li>
                        <li><a href="#!"><i class="fab fa-google-plus" aria-hidden="true"></i></a> </li>
                        <li><a href="#!"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
                        <li><a href="#!"><i class="fab fa-linkedin" aria-hidden="true"></i></a> </li>
                     </ul>
                     `+commentInputHtml+` </div>`;
                }


            }
         //   console.log(data);
            document.getElementById('posts_url_review').innerHTML = liHtml;

        });
    }


    @if(Auth::check())
    function addLike(reviewId = null, commentId = null) {
        userId = {{Auth::user()->id}};
        if (reviewId != null) {
            baseUrl = "{{url('user/review')}}" + "/" + reviewId + "/like";
        }

        if (commentId != null) {
            baseUrl = "{{url('user/review-comment')}}" + "/" + commentId + "/like";
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                data = JSON.parse(this.responseText);

                if (reviewId != null) {
                    document.getElementById("like_count_post_" + reviewId).innerHTML = data.likes_count;
                    if (data.status == 'like') {
                        document.getElementById("like-color-" + reviewId).classList.add("like-styling");
                    } else {
                        document.getElementById("like-color-" + reviewId).classList.remove("like-styling");
                    }
                } else if (commentId != null) {
                    document.getElementById("comment_like_count_" + commentId).innerHTML = data.likes_count;
                    if (data.status == 'like') {
                        document.getElementById("comment-like-color-" + commentId).classList.add("like-styling");
                    } else {
                        document.getElementById("comment-like-color-" + commentId).classList.remove("like-styling");
                    }
                }

                console.log(this.responseText);
            }

        }
        xhttp.open("GET", baseUrl, true);
        xhttp.send();
    }
    @endif

    function postComment(reviewId) {

        commentInput = document.getElementById("comment_input_id_" + reviewId).value;
        if (commentInput == "") {
            return;
        }
        baseUrl = "{{url('user/review')}}" + "/" + reviewId + "/comment?comment=" + commentInput;

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                commentHtml = "";
                data = JSON.parse(this.responseText);
                //alert(1);
               // alert(document.getElementById('comment_count_post_' + reviewId).innerHTML);
                document.getElementById('comment_count_post_' + reviewId).innerHTML = data.comments_count;

                loadComments(reviewId);
            }
        };
        xhttp.open("GET", baseUrl, true);
        xhttp.send();
        document.getElementById("comment_input_id_" + reviewId).value = "";

    }

    function loadComments(reviewId) {

        commentInput = document.getElementById("comment_input_id_" + reviewId).value;
        baseUrl = "{{url('user/review')}}" + "/" + reviewId + "/load-comments";

        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                commentHtml = "";

                data = JSON.parse(this.responseText);
                console.log(data);
                //
                if (data[0] != null) {
                    console.log(data[0].comments);
                    for (i = 0; i < data[0].comments.length; i++) {

                        if (data[0].comments[i].like_by == "me") {
                            likeColor = "style='color: #3dbbd0;'";
                        }


                        commentId = data[0].comments[i].comment_id;
                        deleteUrl = "{{url('user/post/comment/')}}" + "/" + data[0].comments[i].comment_id + "/delete";
                        likeBy = "";
                        if (data[0].comments[i].like_by == "by_me") {
                            likeBy = `
<a id="comment_id_` + data[0].comments[i].comment_id + `" onclick="UnLikeComment(` + data[0].comments[i].comment_id + `)"  style="color:blue">Like ` + likeBy +
                                `<small id="small_like_count_` + data[0].comments[i].comment_id + `" >(<span id="comment_like_count_` + data[0].comments[i].comment_id + `">` + data[0].comments[i].likes + `</span>)</small>
                                 </a>`;
                        }
                        else {
                            likeBy = `<a id="comment_id_` + data[0].comments[i].comment_id + `" onclick="likeComment(` + data[0].comments[i].comment_id + `)"  >` + likeBy +
                                `<small id="small_like_count_` + data[0].comments[i].comment_id + `" id="comment_like_count_` + data[0].comments[i].comment_id + `">Like (<span id="comment_like_count_` + data[0].comments[i].comment_id + `">` + data[0].comments[i].likes + `</span>)</small>
                                </a>`;
                        }

                        commentHtml = commentHtml + ` <ul class="comments-ul">
                                        	<li>
                                            	<span class="coment-img"><img src="` + data[0].comments[i].user_image + `" alt="no img"></span>
                                                <div class="coment-right-main">
                                                	<span class="comen-name">` + data[0].comments[i].user_name + `</span>
                                                    <p class="coment-pera">` + data[0].comments[i].comment + `</p>
                                                    <div class="like-coment">
                                                    	<a ` + likeColor + ` id="comment-like-color-` + data[0].comments[i].comment_id + `" onclick="addLike(null,` + data[0].comments[i].comment_id + `)" style="margin-left:0px;">Like (<span ` + likeColor + ` id="comment_like_count_` + data[0].comments[i].comment_id + `">` + data[0].comments[i].likes + `</span>)</a>

                                                    </div>
                                                    <div class="position-realitive">
                                                   		<div class="dropdown">
                                                        	 <span>` + data[0].comments[i].created_at + `</span>
                                                    		<span class="ellipsis" data-toggle="dropdown"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></span>
                                                        <div class="dropdown-menu">
                                                           <div class="links-main">
                                                           		<a href="#">Delete Comment</a>
                                                           </div>
                                                        </div>
                                                        </div>
                                                    </div>




                                                </div>
                                            </li>
                                        </ul>

`;
                    }
                    if (commentHtml != "") {
                        document.getElementById('post_comments_' + reviewId).innerHTML = commentHtml;
                        document.getElementById('post_comments_' + reviewId).style.display = "block";
                    } else {
                        document.getElementById('post_comments_' + reviewId).style.display = "none";
                    }

                }
            }
        };
        xhttp.open("GET", baseUrl, true);
        xhttp.send();
    }
</script>


<style>
    .like-styling {
        color: #3dbbd0 !important;

    }

    .like-styling > a {
        color: #3dbbd0 !important;

    }

    .like-styling > span {
        color: #3dbbd0 !important;

    }

    .lr-user-wr-con ul li a span {
        padding-right: 0px;
    }

</style>