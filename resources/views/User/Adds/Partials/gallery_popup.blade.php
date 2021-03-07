<div class="modal" id="gallery" role="dialog" style="background: rgba(0,0,0,.9);">

    <div class="ad-port-popup">
        <div class="row no-gutters">
            <span class="upload-photo">UPLOAD UP TO 10 PHOTOS</span>
        </div>

        <form method="post" class="gallery_form">
            @csrf
            <input type="hidden" name="add_id" value="{{$data['add_detail']->id}}">
            <div class="row">
                <div class="col-4">
                    <div class="ed-profile2">
                        @if($data['add_detail']->profile_image)
                            <img id="gallery-1" class="image_upload_preview"
                                 src="{{$data['add_detail']->profile_image}}" alt="img">
                            <div class="edit-pencil2">
                                <label>
                                    <input class="inputFile" type="file" id="profile_picture" name="profile_picture" onchange="readURL(this,'gallery-1')" value="{{$data['add_detail']->profile_image}}">
                                    <i class="fas fa-pencil-alt"></i>
                                </label>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-8">
                    <ul class="upload-ul" id="sortable">

                        @for($i=0;$i<9;$i++)

                                <li>
                                    <div class="ed-profile3">
                                        @if(!isset($data['add_detail']->gallery[$i]))
                                            <img id="gallery-{{$i+2}}" class="image_upload_preview" src="/main-assets/images/upload-icon.png" alt="img">
                                        @else
                                            <img id="gallery-{{$i+2}}" class="image_upload_preview" src="{{$data['add_detail']->gallery[$i]->name}}" alt="img">
                                        @endif
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery-{{$i+1}}" onchange="readURL(this,'gallery-{{$i+2}}')" value="{{isset($data['add_detail']->gallery[$i]->name) ? $data['add_detail']->gallery[$i]->name:''}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>


                        @endfor
                    </ul>
                </div>
            </div>
        </form>
        <div class="close-update-btn">
            <ul class="close-update-btnul">

                <li>
                    <a href="#" class="btn btn-primary btn-md submitBtnGallery" style="background:#160e39;">Save</a>
                </li>
            </ul>
        </div>




    </div>
</div>



<script>

    function readURL(input,preview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+preview).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function(){


        $('.submitBtnGallery').click(function(e){

            var token = '{!! csrf_token() !!}';

            var globalFormData = new FormData($('.gallery_form')[0]);


            $.ajax({

                type: "POST",
                url: "{{route('user.front-add.gallery')}}",
                data: globalFormData,
                cache: false,
                contentType: false,
                processData: false,

                success: function (response, status) {

                    if (response.result == 'success') {
                        alert(response.message);
                        $('#gallery').modal('hide');
                        htmlMake(response.data);

                    }

                }
            });
        });


    });


    function htmlMake(data) {

        alert('came in ');
        console.log(data);
        var html = '';


        html += ' <div class="carousel-item active">';
        html += '<img class="d-block w-100" src="' + data.profile_picture + '" alt="First slide">';
        html += '</div>';


        $.each(data.gallery,function(key,index){


                html += ' <div class="carousel-item">';
                html += '<img class="d-block w-100" src="' + index.name + '" alt="First slide">';
                html += '</div>';

        });

        $('.carousel-inner').html(html);


        var html_2 = '';

        html_2 += '<li data-target="#carousel-thumb" data-slide-to="0" class="active">';
        html_2 += '<img class="d-block w-100 img-fluid" src="' + data.profile_picture+ '" alt="First slide">';
        html_2 += '</li>';


        $.each(data.gallery,function(key,index){

                html_2 += '<li data-target="#carousel-thumb" data-slide-to="'+(key+1)+'" >';
                html_2 += '<img class="d-block w-100 img-fluid" src="' + index.name + '" alt="First slide">';
                html_2 += '</li>';


        });

        $('.carousel-indicators').html(html_2);

    }



</script>