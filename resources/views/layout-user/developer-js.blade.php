<script>
    function editProfileImage() {
        imageValue = $('input[type=file]')[0].files[0].size;
        fileInput = jQuery(document).find('#image_profile').val();
        FileUploadPath = fileInput;
        var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
        if (Extension != "png" && Extension != "jpeg" && Extension != "jpg") {
            jQuery(document).find('#image_profile').val("");// ="";
            document.getElementById('for_alert').innerHTML = `<div class="alert alert-warning">
  <strong>Warning!</strong> Only .PNG, .JPG, and JPEG files are allowed.
</div>`;
            alert('Correct Image Extension');
            /*   setTimeout(function () {
             $('#for_alert').fadeOut('slow');
             }, 5000);*/
            return;
        }
        if (imageValue > 1000000) {
            alert('image size is very large');
            /*     document.getElementById('for_alert').innerHTML = `<div class="alert alert-warning">
             <strong>Warning!</strong> Maximum Image Size which is alowed is 1 MB.
             </div>`;
             setTimeout(function () {
             $('#for_alert').fadeOut('slow');
             }, 5000);*/

            return;

        }
        var formData = new FormData(this);
        formData.append('image_profile', $('input[type=file]')[0].files[0]);
        document.getElementById("img_preview").innerHTML = `<div style="
    margin-top: 50px;
    ">Loading ... </div>`;
        baseUrl = "";
        baseUrl = "<?php echo e(url('user/edit/profile-image')); ?>";

        $.ajax({
            type: 'POST',
            url: baseUrl,
            data: formData,
            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},

            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                document.getElementById("img_preview").innerHTML = `<img src="` + data[0] + `"   >`;
            },
            error: function (data) {
                console.log("error");
            }
        });

    }


    function getReviews(pageId = null) {
        baseUrl = "{{url('user/business-page/')}}" + "/" + pageId + "/reviews-api";


        $.get(baseUrl, function (data, status) {

            if (data.reviews != null) {
                liHtml = "";
                likeBy = "";
                for (i = 0; i < data.reviews.length; i++) {
                    postedByDeleteReview = "";

                    @if(Auth::check())

                    if (data.reviews[i].posted_by == "me") {
                        postedByDeleteReview = ` <ul class="drop_down_main2">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle drop_down_anker2" data-toggle="dropdown"  >
                    <i class="fas fa-ellipsis-h"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="` + data.reviews[i].review_delete_url + `">Delte Review</a></li>
                 </ul>
            </li>
        </ul>`;
                    }

                    @endif

                    if (data.reviews[i].like_by == "me") {//
                        likeBy = "style='color:blue;'";
                    } else {
                        likeBy = "";
                    }

                    @if(Auth::check())
                        authUserId = {{Auth::user()->id}};
                    @else
                        authUserId = 0;
                    @endif
                        postContentPadding = "";
                    commentShowPadding = "";
                    adCommentMain = "";
                    @if(Auth::check())

                        commentInput = `
                                        <div class="coment_white_sec">
                                        	<input type="text" placeholder="Add a comment" class="ad_coment_text" onkeydown="return postCommentsOnEnter(` + data.reviews[i].review_id + `, authUserId, event)" id="comment_input_id_` + data.reviews[i].review_id + `" id="comment_input_id_` + data.reviews[i].review_id + `">
                                            <div class="browse_coment_main">
                                            	<label class="file_upload_btn2">
                                            	    <input name="myFile" multiple="" type="file"><span><i class="fas fa-camera"></i> </span>
                                            	</label>
                                                <input onclick="postComment(` + data.reviews[i].review_id + `, ` + authUserId + `)" type="submit" value="Comment" class="post_com_btn" >
                                            </div>
                                        </div>`;
                    @else
                        postContentPadding = `style="padding: 25px 30px 0px 30px;"`;
                    commentShowPadding = `style="padding-top:0px;padding-bottom:10px;  "`;
                    adCommentMain = `style="padding-top:0px; margin-top: -10px;padding: 0px 31px; "`;
                    commentInput = `<div class="coment_white_sec" style="padding:0px;height:0px;border-top:0px;"></div>`;
                    @endif
                        pageHtml = `<a href="{{route('user.business-member-page',[$data['business_page']->url])}}">{{$data['business_page']->name}}</a>`;
                    liHtml = liHtml + `<li>
                                <div class="coment_sec1">
                                    <div class="coment_sec1_left">
                                        <span class="coment_img"><img src="` + data.reviews[i].user_img + `" alt="error img"></span>

                                        <div class="coment_content_right">
                                            <a href="#" class="post_name">` + data.reviews[i].posted_user_name + `</a>
                                            <span class="recommend-energy-zone">recommends <a h href="#">` + pageHtml + `</a></span>
                                            <p class="post_date">` + data.reviews[i].created_at + `</p>
                                        </div>
                                    </div>
                                   ` + postedByDeleteReview + `
                                </div>
                                <div class="post_content" ` + postContentPadding + `>
                                    <p class="post_pera">` + data.reviews[i].desc + `</p>

                                    <ul class="comments_ul business-page"  >








                                        <li>
                                            <a @if(Auth::check()) onclick="addLikeReview(` + data.reviews[i].review_id + `,` + authUserId + `)" @endif><span id="like_status_post_` + data.reviews[i].review_id + `"   ><i id="like_thumb_post_` + data.reviews[i].review_id + `" ` + likeBy + `   class="fas fa-thumbs-up"></i> Like </span> &nbsp;( <span id="like_count_post_` + data.reviews[i].review_id + `">  ` + data.reviews[i].review_likes + ` </span> )</a></li>
                                        <li>
                                            <a  data-toggle="collapse" data-target="#coment_` + data.reviews[i].review_id + `" onclick="loadCommentsReview( ` + data.reviews[i].review_id + `,` + authUserId + `)">
                                                <i class="fas fa-comment"></i> Comments &nbsp; ( <span id="comment_count_post` + data.reviews[i].review_id + `">` + data.reviews[i].reviews_comments_count + ` </span> )
                                            </a>

                                        </li>

                                    </ul>
                                </div>

                                    <div class="collapse" id="coment_` + data.reviews[i].review_id + `">
                                    <div class="ad_coment_main bg-white" ` + adCommentMain + `>
                                    	` + commentInput + `
                                            <div class="commentshow clearfix" ` + commentShowPadding + `>
                                               <div class="man-cmment">
                                                    <div id="review_comments_` + data.reviews[i].review_id + `" style="display:none">
                                                        Loading ...
                                                    </div>
                                               </div>
                                            </div>
                                    </div>



                            </li>`;
                }
            }
            document.getElementById('posts_url_review').innerHTML = liHtml;
            //     alert(status);
        });
    }

</script>