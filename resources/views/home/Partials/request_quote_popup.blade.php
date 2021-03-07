
<div class="modal" id="quoteModal" role="dialog" style="background: rgba(0,0,0,.9);">
    <div class="account-popup">
        <form class="form_fau_quote">
            @csrf
            <h1 class="task-title">Lorem Ipsum is simply Dummy Text</h1>
            <div class="popup-form-main">
                {{--<div class="flex-container">--}}
                    {{--<div class="flexible">--}}
                        {{--<a href="#" id="one-step" class="active">1<br> Step</a>--}}
                    {{--</div>--}}
                    {{--<div class="flexible">--}}
                        {{--<a href="#" id="two-step">2<br> Step</a>--}}
                    {{--</div>--}}
                    {{--<div class="flexible">--}}
                        {{--<a href="#" id="three-step">3<br> Step</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div id="step1">
                    <div class="step1-main">

                        <span class="tast-title">Title</span>
                        <input type="text" placeholder="" class="tast-input-field" name="title">
                        <span class="task_name_error" style="display: none">Please enter task name.</span>

                        <span class="want-sell-text">Category</span>
                        <span class="drop-down-popup">
							<select name="category_id" id="category_id" onchange="getSubCategory(this.value)" class="selection_box">
                                <option value="">Select Category</option>
                                @foreach($data['categories'] as $key=>$professional)
                                    <option value="{{$professional->id}}">{{$professional->name}}</option>
                                @endforeach
							</select>
						</span>

                        <span class="want-sell-text">Sub-Category</span>
                        <span class="drop-down-popup">
							<select name="sub_category_id" id="sub_category" class="selection_box">

							</select>
						</span>

                        <span class="want-sell-text">Quantity</span>
                        <span class="drop-down-popup">
							<input type="number" name="quantity">
						</span>

                        <span class="want-sell-text">Inventory Unit</span>
                        <span class="drop-down-popup">
							<select name="inventory_packing_unit_id" id="packing_unit_id" class="selection_box">

							</select>
						</span>


                        <span class="want-sell-text">Description</span>
                        <span class="drop-down-popup">
							<textarea name="description" class="message-box" rows=1 placeholder="Type your message..."></textarea>
						</span>

                        <span class="want-sell-text">Attachments</span>
                        <span class="drop-down-popup">
							<input type="file"  id="inputFile">
						</span>

                        <span class="want-sell-text">Currency</span>
                        <span class="drop-down-popup">
							<select name="currency_id" id="currency_id" class="selection_box">
                                @foreach($currencies as $currency)
                                    <option value="{{$currency->id}}">{{$currency->currency}}</option>
                                @endforeach
							</select>
						</span>

                    </div>
                </div>


                <span class="submit-formpopup">
               			<input type="button" value="Submit" class="submit_btn_quote">
                </span>

            </div>
        </form>
    </div>
</div>




<script>


    $(document).on('click','#openQuoteModal',function(){
        alert('13');
        $('#quoteModal').open();

    });
</script>

<script>


    window.onload=function() { getInventoyUnit() }

    $(document).ready(function () {

        var i = 0;
        var globalFormData = new FormData();

        $('#inputFile').change( function(event) {
            var files = event.target.files[0];              // also use like    var files = $('#imgInp')[0].files[0];
            var fileName = files.name;
            var fsize = files.size;
            var tmppath = URL.createObjectURL(files);
            var ext = fileName.split('.').pop().toLowerCase();

            if(i==5)
            {
                alert('unable to load another image');
                return false;
            }

            if(ext == 'jpg' || ext == 'png')
            {
//                $('.min-iddiv').show();
//                var html = '<span class="close-spn-close"><img class="preview-imgs" src="'+tmppath+'"></span>';
                globalFormData.append('attachment[]',files);
                i++;
                alert('image upload');
//                $('.min-iddiv').append(html);
            }
            else{
//                $('.min-iddiv').show();
//                var html = '<a class="downloaded-items1234 clearfix file_download" href="#"><span class="left-1">'+fileName+'</span></a>';
                globalFormData.append('attachment[]',files);
                alert('file upload');
                i++;
//                $('.min-iddiv').append(html);
            }

        });


        $('.submit_btn_quote').click(function(){

            var token = '{!! csrf_token() !!}';

            globalFormData.append('_token',token);

            globalFormData.append('title',$('input[name="title"]').val());
            globalFormData.append('category_id',$('#category_id').val());
            globalFormData.append('sub_category_id',$('#sub_category').val());
            globalFormData.append('quantity',$('input[name="quantity"]').val());
            globalFormData.append('inventory_packing_unit_id',$('#packing_unit_id').val());
            globalFormData.append('currency_id',$('#currency_id').val());


            $.ajax({

                type: "POST",
                url: "{{route('createQuote')}}",
                data: globalFormData,
                cache: false,
                contentType: false,
                processData: false,

                success: function (response, status) {

                    if(response.result == 'success')
                    {
                        alert(response.message);
                        $('.form_fau_quote')[0].reset();
                        window.location.reload();
                        $('#quoteModal').modal('hide');
                    }

                }
            });
        });
    });


    function getSubCategory(value) {
        if(value != '')
        {
            var urld = "{{url('get-sub-category')}}/" + value;
            $.get(urld, function (data, status) {
                var allSub = '';
                $.each(data, function (index, value) {
                    $.each(value, function (index1, value1) {
                        allSub += ' <option value="' + value1.id + '" >' + value1.name + '</option>';
                    });
                });
                $("#sub_category").html(allSub);
            });
        }
    }


   /* function getInventoyUnit() {

        if(cate == "busines"){
            {{--{{\App\Helpers\MapHelper::cityLatLong(\App\MainCountry::find(app('request')->input('country_id'))->name)->lat}}--}}
        }else{}

return 1 ;
        var urld = "{{url('get-inventory_unit')}}";
        $.get(urld, function (data, status) {
            var allInventory = '';
            $.each(data, function (index, value) {
                $.each(value, function (index1, value1) {
                    allInventory += ' <option value="' + value1.id + '" >' + value1.name + '</option>';
                });
            });
            $("#packing_unit_id").html(allInventory);
        });
    }*/

</script>



