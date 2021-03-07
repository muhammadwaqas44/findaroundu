<style>
    .pac-logo {
        z-index: 999999 !important;
    }

    #map-business {
        height: 250px;
    }

    .select2-container {
        width: 100% !important;
    }

</style>

{{--<div class="modal fade" id="add-portfolio" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the modal.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>--}}

<div class="modal fade" id="add-portfolio" role="dialog"
     style="background: rgba(0, 0, 0, 0.9); padding-right: 17px; ">
    <div class="modal-dialog modal-lg">

        <form id="add-portfolio-form" method="post"
              action="{{route('user.add-portfolio.business',[$data['business_detail']->id])}}"
              enctype="multipart/form-data">

            <h1 class="auto-collection-text">Add Portfolio
                <button id="closeBusinessModel" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </h1>
            <div class="add-portfolio-pad">
                @csrf

                <div class="step4-main-popup">
                    <div class="row no-gutters">
                        <span class="upload-photo">UPLOAD UP TO IMAGE*</span>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="ed-profile2">
                                <img id="header-preview-port" src="{{asset('main-assets/images/upload-icon.png')}}"
                                     alt="img">
                                <div class="edit-pencil2">
                                    <label>
                                        <input class="inputFilePortFolio" name="profile_image"
                                               onchange="readURLPort(this,'header-preview-port')" type="file" required>
                                        <i class="fas fa-pencil-alt"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <span class="tast-title">Title <small>*</small></span>
                            <input type="text" placeholder="Title" class="tast-input-field" name="title" required>
                            <span class="tast-title">Website  </span>
                            <input type="text" placeholder="Website" class="tast-input-field" name="website_url">

                            <span class="tast-title">Description <small>*</small></span>
                            <textarea type="text" placeholder="Website" class="tast-input-field"
                                      name="description" required></textarea>

                        </div>
                    </div>

                </div>


            </div>
            <div class="close-update-btn">
                <ul class="close-update-btnul">
                    <li>
                        <button class="btn btn-secondary btn-md" data-dismiss="modal">Close</button>
                    </li>
                    <li>
                        <button type="submit" class="btn btn-primary btn-md" style="background:#160e39;">Save</button>
                    </li>
                </ul>
            </div>
        </form>

    </div>
</div>


<script>


    @if(Auth::check())



    /*$(document).on('click', '#portfolio-btn', function () {
     //  $('#add-portfolio').modal();

     });*/


    @endif
    function readURLPort(input, preview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#' + preview).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#add-portfolio-form").submit(function (event) {
        event.preventDefault();
        var thisObj = $(this);
        $.ajax({
            url: $(thisObj).attr('action'),
            type: "POST", // Type of request to be send, called as method
            //data: formData,
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            //data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false, // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                $('#add-portfolio').modal('hide');
                $('#add-portfolio-form')[0].reset();
                console.log(data);
                document.getElementById('show-portfiolo-boxes').innerHTML = data.response_html;

                alert(data.message);

            },
            error: function (data) {

            }
        });

    });
</script>

