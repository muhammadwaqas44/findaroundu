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
    <div class="row no-gutters" id="step3-form">

    </div>
    <ul class="step-pre-next">
        <li><a href="#" id="pre-two">Previus</a></li>
        <li><a href="#" id="next3">Next</a></li>
    </ul>
</div>



<script>

    $(document).ready(function(){
        $('#next3').click(function(){

//            var flag = 0;
////            $("select[name*='city_id']").each(function(){
////                if($(this).is(':selected')){
////
////                }
////                else{
////                    flag++;
////                    alert('Please select city');
////                }
////            });
//
//            $("input[name*='email']").each(function(){
//                if($(this).val() == ''){
//                    flag++;
//                    $(this).siblings('.email_error').show();
//                }
//                else{
//                    $(this).siblings('.email_error').hide();
//
//                }
//            });
//
//
//            $("input[name*='phone']").each(function(){
//                console.log('hello');
//
//                if($(this).val() == ''){
//                    flag++;
//                    $(this).siblings('.phone_error').show();
//                }
//                else{
//                    $(this).siblings('.phone_error').hide();
//
//                }
//            });
//
//
//            $("input[name*='location']").each(function(){
//                if($(this).val() == ''){
//                    flag++;
//                    $(this).siblings('.location_error').show();
//
//                }
//                else{
//                    $(this).siblings('.location_error').hide();
//                }
//            });
//
//            if(flag != 0)
//            {
//                return false;
//            }



            $('#step4-wizard').show(0);
            $('#step3-wizard').hide(0);
        })



    });

   $(document).on('click','.get_checkbox',function(){

       console.log($(this).parents('.row').find('.from_class').val());
       if($(this).is(":checked")){
           $(this).parents('.row').find('.from_class').prop("disabled", true);
           $(this).parents('.row').find('.from_class').val("");
           $(this).parents('.row').find('.to_class').prop("disabled", true);
           $(this).parents('.row').find('.to_class').val("");

       }
       else{
           $(this).parents('.row').find('.from_class').prop("disabled", false);
           $(this).parents('.row').find('.to_class').prop("disabled", false);
       }


   });


    function step4Html(value,name)
    {

        var html = '';
        html += '<div class="col-md-4 col-sm-12  abc-' + value + '">';
        html += '<div class="speciality-step">';
        html += '<label class="wizard-radio">';
        html += '<span><i class="fas fa-user-md"></i></span>';
        html += '<p class="wizard-checked-text">'+ name +'</p>';
        html += '</label>';
        html += '<div class="row">';
        html += '<div class="col-3">';
        html += '<span class="weeks-text">Days</span>';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<span class="weeks-text">Close</span>';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<span class="weeks-text">From</span>';
        html += '</div>';
        html += '<div class="col-3">';
        html += '<span class="weeks-text">To</span>';
        html += '</div>';
        html += '</div>';
        html += '<div class="row">';
        html += '<div class="col-3">';
        html += '<ul class="week-ul">';
        html += '<li>Monday</li>';
        html += '</ul></div>';

        html += '<div class="col-3">';
        html += '<input type="checkbox" checked name="monday_checkbox[]"  class="date-wizard get_checkbox"  value="close" >';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<input type="time" name="monday_from[]" disabled class="date-wizard from_class">';
        html += '</div>';
        html += '<div class="col-3">';
        html += '<input type="time" name="monday_to[]" disabled class="date-wizard to_class">';
        html += '</div></div>';

        html += '<div class="row">';
        html += '<div class="col-3">';
        html += '<ul class="week-ul">';
        html += '<li>Tuesday</li>';
        html += '</ul></div>';

        html += '<div class="col-3">';
        html += '<input type="checkbox"  checked name="tuesday_checkbox[]"  class="date-wizard get_checkbox" value="close" >';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<input type="time" name="tuesday_from[]" disabled class="date-wizard from_class">';
        html += '</div>';
        html += '<div class="col-3">';
        html += '<input type="time" name="tuesday_to[]" disabled class="date-wizard to_class">';
        html += '</div></div>';

        html += '<div class="row">';
        html += '<div class="col-3">';
        html += '<ul class="week-ul">';
        html += '<li>Wednesday</li>';
        html += '</ul></div>';

        html += '<div class="col-3">';
        html += '<input type="checkbox" checked name="wednesday_checkbox[]" class="date-wizard get_checkbox" value="close" >';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<input type="time" name="wednesday_from[]" disabled class="date-wizard from_class">';
        html += '</div>';
        html += '<div class="col-3">';
        html += '<input type="time" name="wednesday_to[]" disabled class="date-wizard to_class">';
        html += '</div></div>';

        html += '<div class="row">';
        html += '<div class="col-3">';
        html += '<ul class="week-ul">';
        html += '<li>Thursday</li>';
        html += '</ul></div>';

        html += '<div class="col-3">';
        html += '<input type="checkbox" checked name="thursday_checkbox[]" class="date-wizard get_checkbox" value="close" >';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<input type="time" name="thursday_from[]" disabled class="date-wizard from_class">';
        html += '</div>';
        html += '<div class="col-3">';
        html += '<input type="time" name="thursday_to[]" disabled class="date-wizard to_class">';
        html += '</div></div>';

        html += '<div class="row">';
        html += '<div class="col-3">';
        html += '<ul class="week-ul">';
        html += '<li>Friday</li>';
        html += '</ul></div>';

        html += '<div class="col-3">';
        html += '<input type="checkbox"  checked name="friday_checkbox[]" class="date-wizard get_checkbox" value="close" >';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<input type="time" name="friday_from[]" disabled class="date-wizard from_class">';
        html += '</div>';
        html += '<div class="col-3">';
        html += '<input type="time" name="friday_to[]" disabled class="date-wizard to_class">';
        html += '</div></div>';

        html += '<div class="row">';
        html += '<div class="col-3">';
        html += '<ul class="week-ul">';
        html += '<li>Saturday</li>';
        html += '</ul></div>';

        html += '<div class="col-3">';
        html += '<input type="checkbox"  checked name="saturday_checkbox[]" class="date-wizard get_checkbox" value="close" >';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<input type="time" name="saturday_from[]" disabled class="date-wizard from_class">';
        html += '</div>';
        html += '<div class="col-3">';
        html += '<input type="time" name="saturday_to[]" disabled class="date-wizard to_class">';
        html += '</div></div>';

        html += '<div class="row">';
        html += '<div class="col-3">';
        html += '<ul class="week-ul">';
        html += '<li>Sunday</li>';
        html += '</ul></div>';

        html += '<div class="col-3">';
        html += '<input type="checkbox" checked name="sunday_checkbox[]" class="date-wizard get_checkbox" value="close" >';
        html += '</div>';

        html += '<div class="col-3">';
        html += '<input type="time" name="sunday_from[]" disabled class="date-wizard from_class">';
        html += '</div>';
        html += '<div class="col-3">';
        html += '<input type="time" name="sunday_to[]" disabled class="date-wizard to_class">';
        html += '</div></div>';

        html += '</div> </div>';

        $('#step4-form').append(html);

    }


    var check_flag1 = 0;
    var check_flag2 = 0;

    $(document).on('keypress','.email-1',function(evt){

        check_flag1 = 1;

    });

    $(document).on('keypress','.email-2',function(evt){

        check_flag2 = 1;

    });

    $(document).on('keyup','.email-0',function(evt){

        if(check_flag1 == 0) {
            var val = $(this).val();
            $('.email-1').val(val);
        }

        if(check_flag2 == 0) {
            var val = $(this).val();
            $('.email-2').val(val);
        }

    });




</script>