<style>

    #map-0 {
        height: 425px;
    }
    #map-1 {
        height: 425px;
    }
    #map-2 {
        height: 425px;
    }
</style>



<h3 class="professionak-busines-text">Choose Your speciality</h3>
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
    <div class="row no-gutters" id="step2-form">

    </div>
    <ul class="step-pre-next">
        <li><a href="#" id="pre-one">Previus</a></li>
        <li><a href="#" id="next2">Next</a></li>
    </ul>
</div>


<script>

    $(document).ready(function(){
        $('#next2').click(function(){

            var flag = 0;
//            $("select[name*='sub_category_id']").each(function(){
//                if($(this).is(':selected')){
//                    $(this).parents('span').siblings('.skills_error').hide()
//
//                }
//                else{
//                    flag++;
////                    alert('Please select sub_cateogry');
//                    $(this).parents('span').siblings('.skills_error').show()
//                }
//            });

//            $(".wizard-textarea").each(function(){
//                if($(this).val() == ''){
//                    flag++;
//                    $(this).siblings('.description_error').show();
//
//                }
//                else{
//                    $(this).siblings('.description_error').hide();
//
//                }
//            });
//
//
//            $("input[name*='hourly_price']").each(function(){
//                console.log('hello');
//
//                if($(this).val() == ''){
//                    flag++;
//                    $(this).siblings('.hour_error').show();
//                }
//                else{
//
//                    $(this).siblings('.hour_error').hide();
//
//                }
//            });
//
//
//            $("input[name*='project_price']").each(function(){
//                if($(this).val() == ''){
//                    flag++;
//                    $(this).siblings('.project_error').show();
//                }
//                else{
//
//
//                    $(this).siblings('.project_error').hide();
//
//                }
//            });
//
//            if(flag != 0)
//            {
//                return false;
//            }
//            console.log(flag);





            $('#step3-wizard').show(0);
            $('#step2-wizard').hide(0);
//            map_1();
        });

    });


    function step3Html(value,name)
    {


        var html = '';


            html += '<div class="col-md-4 col-sm-12 abc-' + value + '">';
            html += '<div class="speciality-step">';
            html += '<label class="wizard-radio">';
            html += '<span><i class="fas fa-user-md"></i></span>';
            html += '<p class="wizard-checked-text">'+ name +'</p>';
            html += '</label>';
            html += '<span class="speciality-text">Email</span>';
            html += '<input type="text" name="email[]" placeholder="Type here..."  class="input-type-btn email-'+j+'">';
            html += '<span class="email_error" style="display: none">required field</span>'
            html += '<span class="speciality-text">Phone</span>';
            html += '<input type="text" name="phone[]" placeholder="Type here..."  class="input-type-btn">';
            html += '<span class="phone_error" style="display: none">required field</span>'
            html += '<span class="speciality-text">City</span>';
            html += '<span class="wizard-drop-down">';

            html += '<select name="city_id[]" id="city_'+value+'">'

            html += '</select>';
            html += '</span>';
            html += '<span class="city_error" style="display: none">required field</span>'


        html += '<span class="speciality-text">Location</span>';
        html += '<input type="text" name="location[]" placeholder="Type here..." ' +
                'class="input-type-btn" id="profile-wizard-location-'+i+'">';
        html += '<span class="location_error" style="display: none">required field</span>'

            html += '<div class="wizard-loc-map">';
            html += '<div id="map-'+i+'"></div>';
            html += '</div>';
            html += '<input type="hidden" name="lat[]" class="lat-'+i+'">';
            html += '<input type="hidden" name="lng[]" class="lng-'+i+'">';

            html += '</div>';
            html += '</div>';

            i++;
            j++;

        $('#step3-form').append(html);


        getServiceCity(value);

        $('#city_'+value).append(city);
    }


    function getServiceCity(value)
    {

       var city = '';
        var urld = "{{route('get-cities',['countryId'=>Session::get('location')['countryId']])}}";
        $.ajax({

            type: "GET",
            url: urld,

            success: function (response, status) {

                $.each(response.data, function (index1, value1) {

                    city += ' <option value="' + value1.id + '" >' + value1.name + '</option>';

                });


                $('#city_'+value).append(city);
            }

        });
    }






</script>