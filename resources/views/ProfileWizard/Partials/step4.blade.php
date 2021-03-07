<h3 class="professionak-busines-text">Write About Services</h3>
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
    <div class="row no-gutters" id="step4-form">

    </div>
    <ul class="step-pre-next">
        <li><a href="#" id="pre-four">Previus</a></li>
        <li><a href="#" id="next4">Next</a></li>
    </ul>
</div>


<script>

    $(document).ready(function(){

        $('#next4').click(function(){


            $('#step5-wizard').show();
            $('#step4-wizard').hide();
        });



    });

    function step5Html(value,name)
    {
        var html = '';
        html += '<div class="col-md-4 col-sm-12  abc-' + value + '">';
        html += '<div class="speciality-step">';
        html += '<label class="wizard-radio">';
        html += '<span><i class="fas fa-user-md"></i></span>';
        html += '<p class="wizard-checked-text">'+ name +'</p>';
        html += '</label>';
        html += ' <ul class="listing-add-ul2">';
        html += ' <li>';
        html += '<div class="socials-inputs-fields2">';
        html += '<input type="text" placeholder="" name="facebook[]" class="socials-inputs2">';
        html += '<span class="facebook-spans2"><i class="fab fa-facebook-square"></i></span>';
        html += '</div>';
        html += '</li>';
        html += ' <li><div class="socials-inputs-fields2">';
        html += '<input type="text" placeholder="" name="instagram[]" class="socials-inputs2">';
        html += '<span class="facebook-spans2 insta-spans2"><i class="fab fa-instagram"></i></span>';
        html += '</div></li>';

        html += ' <li><div class="socials-inputs-fields2">';
        html += '<input type="text" placeholder="" name="youtube[]" class="socials-inputs2">';
        html += '<span class="facebook-spans2 utube-spans2"><i class="fab fa-youtube"></i></span>';
        html += '</div></li>';

        html += ' <li><div class="socials-inputs-fields2">';
        html += '<input type="text" placeholder="" name="pinterest[]" class="socials-inputs2">';
        html += '<span class="facebook-spans2 interest--spans2"><i class="fab fa-pinterest"></i></span>';
        html += '</div></li>';

        html += ' <li><div class="socials-inputs-fields2">';
        html += '<input type="text" placeholder="" name="linkedin[]" class="socials-inputs2">';
        html += '<span class="facebook-spans2 in-spans2"><i class="fab fa-linkedin"></i></span>';
        html += '</div></li>';



        html += '</ul></div></div>';

        $('#step5-form').append(html);
    }


</script>