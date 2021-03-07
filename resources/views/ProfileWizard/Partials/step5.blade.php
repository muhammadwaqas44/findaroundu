<h3 class="professionak-busines-text">Social Links</h3>
<div class="progress-bar-main2">
    <ul class="breadcrumb3">
        <li><a href="#">open</a></li>
        <li><a href="#">assigned</a></li>
        <li><a href="#">inprogress</a></li>
        <li><a href="#">completed</a></li>
        <li><a href="#">reviewed</a></li>
        <li><a href="#"></a></li>
    </ul>
</div>
<div class="step1-wizard">
    <div class="row no-gutters" id="step5-form">


    </div>
    <ul class="step-pre-next">
        <li><a href="#" id="pre-five">Previus</a></li>
        <li><a href="#" id="next5">Next</a></li>
    </ul>
</div>

<script>

    $(document).ready(function(){

        $('#next5').click(function(){

            $('#step6-wizard').show();
            $('#step5-wizard').hide();
        });



    });


    function step6Html(value,name)
    {
        var html = '';


            html += '<div class="col-md-4 col-sm-12 abc-'+value+'">';
            html += '<div class="speciality-step">';
            html += '<label class="wizard-radio">';
            html += '<span><i class="fas fa-user-md"></i></span>';
            html += '<p class="wizard-checked-text">'+ name +'</p>';
            html += '</label>';
            html += '<div class="ed-profile">';
            html += '<img id="image_upload_preview-'+i+'" src="main-assets/images/banner6.jpg" alt="img">';
            html += '<div class="edit-pencil">';
            html += '<label>';
            html += '<input id="inputFile-'+i+'" type="file" name="profile_image[]">';
            html += '<i class="fas fa-pencil-alt"></i>';
            html += '</label>';
            html += '</div></div>';
            html += '</div></div>';

        $('#step6-form').append(html);
    }


    $(document).on('change','#inputFile-0', function(event) {
        //salert(1);
        var files = event.target.files[0];              // also use like    var files = $('#imgInp')[0].files[0];
        var fileName = files.name;
        var fsize = files.size;
        var tmppath = URL.createObjectURL(files);
        var ext = fileName.split('.').pop().toLowerCase();

        if(ext == 'jpg' || ext == 'png')
        {
            $('#image_upload_preview-0').attr('src',tmppath);
        }

    });


    $(document).on('change','#inputFile-1', function(event) {
        var files = event.target.files[0];              // also use like    var files = $('#imgInp')[0].files[0];
        var fileName = files.name;
        var fsize = files.size;
        var tmppath = URL.createObjectURL(files);
        var ext = fileName.split('.').pop().toLowerCase();

        if(ext == 'jpg' || ext == 'png')
        {
            $('#image_upload_preview-1').attr('src',tmppath);
        }

    });


    $(document).on('change','#inputFile-2', function(event) {
        var files = event.target.files[0];              // also use like    var files = $('#imgInp')[0].files[0];
        var fileName = files.name;
        var fsize = files.size;
        var tmppath = URL.createObjectURL(files);
        var ext = fileName.split('.').pop().toLowerCase();

        if(ext == 'jpg' || ext == 'png')
        {
            $('#image_upload_preview-2').attr('src',tmppath);
            $()
        }

    });






</script>