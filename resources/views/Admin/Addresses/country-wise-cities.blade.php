@extends('layout-admin.app')

@section('content')
<style>
    .cat_scroll_area{height: 400px;overflow-y: auto;}
    .main_cat_list {width: 100%;display: inline-block;}
    .main_cat_list li{width: 100%;margin-bottom: 10px;float: left;}
    .cat_child_list{padding-left: 50px !important;width: 100%;display: inline-block;}
    ol li{list-style: decimal}
</style>

    <div class="body-container">
        <div class="right-rable-main" style="margin-bottom:0px;">
            <div class="row">
                <div class="col-lg-12 col9-padding">
                    <div class="details-tabs-main">
                        <div class="detail-tab-main">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active">
                                    <div class="first-tab-form-main">
                                        <div class="border-box">
                                            <span class="holiday-text">Country Wise Cities</span>
                                            <div class="row">
                                                <div class="col-lg-5 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <span class="primary-doctor-text">Selected Country</span>
                                                        </div>
                                                        <div class="col-8">
                                                             <span class="search-drop-down5">
                                                                <select class="form-control" id="countryIdSelect" name="country_id">
                                                                    @foreach($data["countries"] as $country)
                                                                        <option value="{{$country->id}}" {{($country->id == $countryId)? "selected": ""}}>{{$country->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button id="selectBtn" type="type" class="btn-sm btn btn-primary">Select</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 30px;">
                        <div class="col-lg-6">
                            <div class="details-tabs-main">
                                <div class="first-tab-form-main">
                                    <div class="border-box">
                                        <span class="holiday-text">All Cities</span>
                                        <ul class="cat_scroll_area main_cat_list">
                                            @foreach($data["all_cities"] as $city)
                                                <li>
                                                    <div class="cat_area border-box" id="drag-{{$city->id}}" draggable="true" ondragstart="drag(event)" style="{{(in_array($city->id, $data["count_city_ids"]))? "display:none": ""}}">
                                                        <form class="updateCatForm">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$city->id}}">
                                                            <div class="car_img_area">
                                                                <img draggable="false" class="img-thumbnail" src="{{ $city->image }}" alt="{{$city->name}}">
                                                            </div>
                                                            <input type="file" name="image" class="catImg">
                                                            <div class="form-group">
                                                                <input type="text" name="name" class="" placeholder="City Name" value="{{$city->name}}" required>
                                                                <button type="submit" class="btn-sm btn btn-primary catUpdateBtn">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="details-tabs-main">
                                <div class="first-tab-form-main">
                                    <div class="border-box">
                                        <span class="holiday-text">Selected Cities (<span id="liCounter">{{sizeof($data["country_cities"])}}</span>)</span>
                                        <form id="selectedCatForm">
                                            @csrf
                                            <input type="hidden" name="country_id" value="{{$countryId}}">
                                            <ol class="cat_scroll_area main_cat_list" id="dropEvent" ondrop="drop(event)" ondragover="allowDrop(event)">
                                                @foreach($data["country_cities"] as $city)
                                                    <li>
                                                        <div class="border-box">
                                                            <input type="hidden" name="id[]" value="{{$city->cities->id}}">
                                                            <button type="button" class="btn-sm btn btn-danger removeElement" data-id="drag-{{$city->cities->id}}">Remove</button>
                                                            <div class="car_img_area">
                                                                <img draggable="false" src="{{$city->cities->image}}" alt="{{$city->cities->name}}" class="img-thumbnail">
                                                            </div>
                                                            <p>{{$city->cities->name}}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            // country change
            $("#selectBtn").click(function (e) {
                var countryId = $("#countryIdSelect").val();
                window.location.href = "/admin/country-wise-cities/"+countryId;
                showLoader();
            });

            // image change preview
            $('.catImg').change( function(event) {
                var parentDiv = $(this).parents("form");
                parentDiv.find(".catUpdateBtn").removeAttr("disabled");
                var files = event.target.files[0];
                var fileName = files.name;
                var fsize = files.size;
                var tmppath = URL.createObjectURL(files);
                var ext = fileName.split('.').pop().toLowerCase();
                switch(ext){
                    case 'jpg': case 'jpeg': case 'png':
                        break;
                    default:
                        errorMsg('invalid file');
                        parentDiv.find(".catUpdateBtn").attr("disabled", "disabled");
                        return false
                }
                if(fsize>1048576){
                    errorMsg('invalid size');
                    parentDiv.find(".catUpdateBtn").attr("disabled", "disabled");
                    return false
                }
                parentDiv.find(".car_img_area img").attr('src',tmppath);
            });

            // update category data
            $(".updateCatForm").submit(function (e) {
                e.preventDefault();
                showLoader();
                var parentForm = $(this);
                var formData = new FormData(parentForm[0]);
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.city-data-update')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response, status) {
                        hideLoader();
                        if(response.result == 'success')
                        {
                            successMsg(response.message);
                        }
                    }
                });
            });

            // sortable
            $( "#dropEvent" ).sortable();
            $( "#dropEvent" ).disableSelection();

            // remove element from selected categories section
            $("body").on("click", ".removeElement", function (e) {
                var containerId = $(this).data("id");
                $(this).parents("li").remove();
                $("#"+containerId).show();
                countFinalLi();
            });

            // update selected category data
            $("#selectedCatForm").submit(function (e) {
                e.preventDefault();
                showLoader();
                var parentForm = $(this);
                var formData = new FormData(parentForm[0]);
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.country-selected-city-update')}}",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response, status) {
                        hideLoader();
                        if(response.result == 'success')
                        {
                            successMsg(response.message);
                        }
                    }
                });
            });
        });

        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("listId", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            counter = $("#dropEvent li").length;
            if(counter < 5) {
                var data = ev.dataTransfer.getData("listId");
                var parentLi = $("#" + data);
                var catId = parentLi.find("[name=id]").val();
                var imgSrc = parentLi.find(".car_img_area img").attr("src");
                var caption = parentLi.find("[name=name]").val();
                var newLi = `
                    <li>
                        <div class="border-box">
                            <input type="hidden" name="id[]" value="`+catId+`">
                            <button type="button" class="btn-sm btn btn-danger removeElement" data-id="`+data+`">Remove</button>
                            <div class="car_img_area">
                                <img draggable="false" src="` + imgSrc + `" alt="` + caption + `" class="img-thumbnail">
                            </div>
                            <p>` + caption + `</p>
                        </div>
                    </li>
                    `;
                $("#" + data).hide();
                $("#dropEvent").append(newLi);
                countFinalLi();
            } else {
                errorMsg("Please remove already added cities for add more.");
            }
        }

        function countFinalLi() {
            counter = $("#dropEvent li").length;
            $("#liCounter").text(counter);
        }
    </script>
@endsection
