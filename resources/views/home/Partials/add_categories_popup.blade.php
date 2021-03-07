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



<div class="modal fade" id="add-categories-business" role="dialog"
     style="background: rgba(0, 0, 0, 0.9); padding-right: 17px; ">
    <div class="modal-dialog modal-lg">

        <form id="add-categories-form-busienss" method="post"
              action="{{route('user.add-categories.business',[$data['business_detail']->id])}}"
              enctype="multipart/form-data">

            <h1 class="auto-collection-text">Add Categories & Tags
                <button id="closeBusinessModel" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </h1>
            <div class="add-portfolio-pad">
                @csrf

                <div class="step4-main-popup">

                    <div class="row">

                        <div class="col-12" id="load-categories-and-tags">




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




    $("#add-categories-form-busienss").submit(function (event) {
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
                $('#add-categories-business').modal('hide');
                $('#add-categories-form-busienss')[0].reset();
                console.log(data);
                document.getElementById('show-categories-boxes').innerHTML = data.response_html;
                document.getElementById('show-tags-boxes').innerHTML = data.reponse_tags_html;

                alert(data.message);

            },
            error: function (data) {

            }
        });

    });
</script>

