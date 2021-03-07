<h3 class="professionak-busines-text">Choose Your 3 Professional Business</h3>
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
    <div class="row no-gutters">

        @foreach($data['category'] as $category)
            <div class="col-lg-1 col-md-2 col-sm-3 col-6">
                <label class="wizard-radio">
                    <input type="checkbox" class="category-selection" name="category[]" value="{{$category->id}}">
                    <span><i class="fas fa-user-md"></i></span>
                    <p class="wizard-checked-text">{{$category->name}}</p>
                </label>
            </div>
        @endforeach



    </div>
    <ul class="step-pre-next">
        <li><a href="#" id="next1">Next</a></li>
    </ul>
</div>


<script>

    var numberChecked = 0;
    var favorite = [];
    var i;
    var html = '';

    var category_array = [];

    $(document).ready(function() {

        $('.category-selection').click(function () {
            numberChecked = $('.category-selection:checked').length;

            if (numberChecked > 3) {
                alert('You can not select more than 3 categories');
                return false;

            }

            var value_checked = $(this).val();
            var name = $(this).siblings('.wizard-checked-text').text();

            var result = $.grep(favorite, function (e) {
                return e.id == value_checked
            });
            var resultCat = $.grep(category_array, function (e) {
                return e.id == 'abc-' + value_checked
            });

            if (result.length == 0 && resultCat.length == 0) {
                favorite.push({
                    id: $(this).val(),
                    text: name
                });

                category_array.push({
                    id: 'abc-' + $(this).val()
                });

                create_html(value_checked, name);

            }
            else if (result.length == 1) {
                var removeIndex = favorite.map(function (x) {
                    return x.id;
                })
                    .indexOf(value_checked);


                console.log(removeIndex);
                if (removeIndex !== -1) favorite.splice(removeIndex, 1);

                var removeIndexCat = category_array.map(function (x) {
                    return x.id;
                })
                    .indexOf('abc-' + value_checked);

                if (removeIndexCat !== -1) category_array.splice(removeIndexCat, 1);

                console.log(favorite, category_array);

                $('.abc-' + value_checked).remove();

            }

        });

        $('#next1').click(function () {

            if(numberChecked <=0)
            {
                alert('Please select category');
                return false;
            }
            $('#step2-wizard').show();
            $('#step1-wizard').hide();
            initSelect2Widgets();


        });

        function create_html(value, name) {
            var html = '';
            html += '<div class="col-md-4 col-sm-12 abc-' + value + '">';
            html += '<div class="speciality-step">';
            html += '<label class="wizard-radio">';
            html += '<span><i class="fas fa-user-md"></i></span>';
            html += '<p class="wizard-checked-text">' + name + '</p>';
            html += '</label>';
            html += '<span class="speciality-text">Skills</span>';
            html += '<span class="wizard-drop-down">';

            html += '<select name="sub_category_id[]" required id="cat_'+value+'">';
            html += '</select>';
            html += '</span>';


            html += '<span class="speciality-text">Specialities  (optional)</span>';
            html += '<span class="search-drop-down8">';
            html += '<select class="form-control" multiple name="tag_id[]" id="tag_id_'+value+'" >';

            html += '</select></span>';

            html += '<span class="speciality-text">Description</span>';
            html += '<textarea required name="description[]" placeholder="Type here..." class="wizard-textarea"></textarea>';
            html += '<span class="description_error" style="display: none">required field</span>'

            html += '<span class="speciality-text">Hourly Price</span>';
            html += '<input type="text" name="hourly_price[]" placeholder="Type here..."  class="input-type-btn">';
            html += '<span class="hour_error" style="display: none">required field</span>'

            html += '<span class="speciality-text">Project Price</span>';
            html += '<input type="text" name="project_price[]" placeholder="Type here..."  class="input-type-btn">';
            html += '<span class="project_error" style="display: none">required field</span>'

            html += '</div></div>';


            $('#step2-form').append(html);
            getSubCat(value);
            getTagProfile(value);
            step3Html(value,name);
            step4Html(value,name);
            step5Html(value,name);
            step6Html(value,name);
            initAutocomplete();

        }

    });


    function getSubCat(value){

        var urld = "{{url('get-sub-category')}}/" + value;
        $.ajax({
            type: "GET",
            url: urld,

            success: function (response, status) {
                var subCat = '';
                $.each(response.data, function (index1, value1) {
                    subCat += ' <option value="' + value1.id + '" >' + value1.name + '</option>';
                });

                $('#cat_'+value).append(subCat);


            }

        });

    }


    function getTagProfile(value) {

        var tagurld = "{{url('get-tag')}}/" + value;
        var tags = '';

        $.ajax({

            type: "GET",
            url: tagurld,

            success: function (response, status) {
                $.each(response.data, function (index1, value1) {
                    tags += ' <option value="' + value1.id + '" >' + value1.name + '</option>';
                });

                $('#tag_id_' + value).append(tags);

                $('#tag_id_' + value).trigger('change');

            }

        });
    }



</script>


