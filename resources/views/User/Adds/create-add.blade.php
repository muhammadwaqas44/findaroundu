
<style>
    .pac-logo {
        z-index: 999999 !important;
    }

    #map-add {
        height: 250px;
    }

    .select2-container {
        width: 100% !important;
    }

</style>



<div class="modal" id="create-add-popup" role="dialog" style="background: rgba(0,0,0,.9);">
    <div class="ad-port-popup">
        <form class="add_form">
            @csrf
            <h1 class="auto-collection-text">Create Adds</h1>
            <div class="add-portfolio-pad">
                <div class="step-popup-main">
                    <ul class="steps steps-5">
                        <li><a href="#" title=""><em>Step 1: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a></li>
                        <li><a href="#" title=""><em>Step 2: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a></li>
                        <li class="current"><a href="#" title=""><em>Step 3: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a></li>
                        <li><a href="#" title=""><em>Step 4: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a></li>
                        <li><a href="#" title=""><em>Step 5: XXXXXXXX</em><span>Et nequ a quam turpis duisi</span></a></li>
                    </ul>
                </div>
                <!--step1-->
                <div class="step1-main-popup" >
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <span class="make-type">Categories</span>
                            <ul class="step-1-in-main categories_ul">

                            </ul>
                            <input type="hidden" class="category_hidden_field" name="category" value="">

                        </div>
                        <div class="col-lg-4 col-md-12">
                            <span class="make-type">Sub Categories</span>
                            <ul class="step-1-in-main sub_categories_ul">

                            </ul>

                            <input type="hidden" class="sub_category_hidden_field" name="sub_category" value="">
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <span class="make-type">Make / Type</span>
                            <ul class="step-1-in-main maker_ul">

                            </ul>
                            <input type="hidden" class="maker_hidden_field" name="maker" value="">
                        </div>
                        <div class="close-update-btn">
                            <ul class="close-update-btnul">
                                <li>
                                    <a href="#" class="btn btn-primary btn-md next-section-1" style="background:#160e39;">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--step1 end-->
                <!--step 2-->
                <div class="step2-main-popup" style="display: none">
                    <div class="step-2-main">
                        <div class="row">
                            <div class="col-md-8 col-sm-12">
                                <div class="left-colum-popup">
                                    <span class="popup-title">Title</span>
                                    <input type="text" id="create-add-title" name="title" placeholder="Type here..." class="popup-field">
                                    <span class="popup-title">Description</span>
                                    <textarea id="create-add-description" name="description" placeholder="Type here..." class="popup-textarea"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 border-colum">
                                <div class="right-colum-popup">
                                    <div class="condition_div">
                                        <span class="condition-popup">Condition</span>
                                        <ul class="type-ul2">
                                            <li>
                                                <label class="type-check">
                                                    <input value="New" name="condition" type="radio">New<span></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="type-check">
                                                    <input value="Used" name="condition" type="radio">Used<span></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <span class="condition-popup">Price</span>
                                    <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="currency">
               										<option value="dollar">$</option>
               										<option value="Rs">Rs</option>
               									</select>
               								</span>
                                        <input name="price" id="create-add-price" onkeypress="return isNumberKey(event)" type="number" placeholder="" class="currency-input">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-------------- vehicle section start--------------------------}}
                        <div class="vehicle-section" style="display:none;">

                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Year</span>
                                <input type="text" name="additional[vehicle][year]" onkeypress="return isNumberKey(event)" class="popup-field">
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Kilometer Driven</span>
                                <input type="text" name="additional[vehicle][kilometer]" onkeypress="return isNumberKey(event)" class="popup-field">
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Fuel</span>
                                <div class="price-drop-down-main">
                                    <span class="step2-drop-down">
                                        <select name="additional[vehicle][fuel]">
                                            <option value="CNG">CNG</option>
                                            <option value="Diesel">Diesel</option>
                                            <option value="Hybrid">Hybrid</option>
                                            <option value="LPG">LPG</option>
                                            <option value="Pertrol">Pertrol</option>
                                        </select>
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Registered In</span>
                                <div class="city_register_drop_down">
               								<span class="step2-drop-down">
               									<select name="additional[vehicle][registered_in]" id="city_registered">

               									</select>
               								</span>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Transaction Type</span>
                                <div class="city_register_drop_down">
               								<span class="step2-drop-down">
               									<select name="additional[vehicle][transaction_type]">
                                                    <option value="Cash">Cash</option>
                                                    <option value="Installment/Leasing">Installment/Leasing</option>
               									</select>
               								</span>
                                </div>
                            </div>
                        </div>


                        {{-------------- bus section rickshaw section tractor section start--------------------------}}
                        <div class="buses-section" style="display:none;">

                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Year</span>
                                <input type="text" name="additional[bus][year]" onkeypress="return isNumberKey(event)" class="popup-field">
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Kilometer Driven</span>
                                <input type="text" name="additional[bus][kilometer]" onkeypress="return isNumberKey(event)" class="popup-field">
                            </div>

                        </div>

                        {{-------------- land plot section, shops office and commercial space section start--------------------------}}
                        <div class="land-plot-section" style="display:none;">


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Area Unit</span>
                                <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="additional[land][area_unit]">
               										<option value="Kanal">Kanal</option>
               										<option value="Marla">Marla</option>
                                                    <option value="Square Feet">Square Feet</option>
                                                    <option value="Square Meter">Square Meter</option>
                                                    <option value="Square Yards">Square Yards</option>
               									</select>
               								</span>

                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Area</span>
                                <input type="text" name="additional[land][area]" class="popup-field">
                            </div>



                        </div>


                        {{-------------- houses section start--------------------------}}
                        <div class="house-section" style="display:none;">


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Bedrooms</span>
                                <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="additional[houses][bedroom]">
               										<option value="1">1</option>
               										<option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6+">6+</option>
                                                    <option value="studio">Studio</option>
               									</select>
               								</span>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Bathrooms</span>
                                <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="additional[houses][bathroom]">
               										<option value="1">1</option>
               										<option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7+">7+</option>
               									</select>
               								</span>
                                </div>
                            </div>



                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Area Unit</span>
                                <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="additional[houses][area_unit]">
               										<option value="Kanal">Kanal</option>
               										<option value="Marla">Marla</option>
                                                    <option value="Square Feet">Square Feet</option>
                                                    <option value="Square Meter">Square Meter</option>
                                                    <option value="Square Yards">Square Yards</option>
               									</select>
               								</span>

                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Area</span>
                                <input type="text" name="additional[houses][area]" class="popup-field">
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Furnished</span>
                                <div class="price-drop-down-main">
                                    <span class="step2-drop-down">
                                        <select name="additional[houses][furnished]">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </span>
                                </div>
                            </div>



                        </div>


                        {{-------------- portion and floors,apartment and flat  section start-------------------------}}
                        <div class="portion-floor-section" style="display:none;">


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Bedrooms</span>
                                <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="additional[portion][bedroom]">
               										<option value="1">1</option>
               										<option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6+">6+</option>
                                                    <option value="studio">Studio</option>
               									</select>
               								</span>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Bathrooms</span>
                                <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="additional[portion][bathroom]">
               										<option value="1">1</option>
               										<option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7+">7+</option>
               									</select>
               								</span>
                                </div>
                            </div>



                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Area Unit</span>
                                <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="additional[portion][area_unit]">
               										<option value="Kanal">Kanal</option>
               										<option value="Marla">Marla</option>
                                                    <option value="Square Feet">Square Feet</option>
                                                    <option value="Square Meter">Square Meter</option>
                                                    <option value="Square Yards">Square Yards</option>
               									</select>
               								</span>

                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Area</span>
                                <input type="text" name="additional[portion][area]" class="popup-field">
                            </div>



                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Floor Level</span>
                                <div class="price-drop-down-main">
                                    <span class="step2-drop-down">
                                        <select name="additional[portion][floor_level]">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7+">7</option>
                                            <option value="Ground">Ground</option>
                                        </select>
                                    </span>
                                </div>
                            </div>



                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Furnished</span>
                                <div class="price-drop-down-main">
                                    <span class="step2-drop-down">
                                        <select name="additional[portion][furnished]">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </span>
                                </div>
                            </div>



                        </div>

                        {{-------------- shops office and commerical use  section start-------------------------}}
                        <div class="commerical-use-section" style="display:none;">


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Bathrooms</span>
                                <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="additional[commercial][bathroom]">
               										<option value="1">1</option>
               										<option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7+">7+</option>
               									</select>
               								</span>
                                </div>
                            </div>



                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Area Unit</span>
                                <div class="price-drop-down-main">
               								<span class="step2-drop-down">
               									<select name="additional[commercial][bedroom]">
               										<option value="Kanal">Kanal</option>
               										<option value="Marla">Marla</option>
                                                    <option value="Square Feet">Square Feet</option>
                                                    <option value="Square Meter">Square Meter</option>
                                                    <option value="Square Yards">Square Yards</option>
               									</select>
               								</span>

                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Area</span>
                                <input type="text" name="additional[commercial][area]" class="popup-field">
                            </div>



                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Floor Level</span>
                                <div class="price-drop-down-main">
                                    <span class="step2-drop-down">
                                        <select name="additional[commercial][floor_level]">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7+">7</option>
                                            <option value="Ground">Ground</option>
                                        </select>
                                    </span>
                                </div>
                            </div>


                        </div>



                        {{-------------- rommate and paying guest section start-------------------------}}
                        <div class="paying-guest-section" style="display:none;">

                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Furnished</span>
                                <div class="price-drop-down-main">
                                    <span class="step2-drop-down">
                                        <select name="additional[paying_guest][furnished]">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                        </div>

                        {{-------------- vacation and guest house section start-------------------------}}
                        <div class="guest-house-section" style="display:none;">
                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Bedrooms</span>
                                <div class="price-drop-down-main">
                                    <span class="step2-drop-down">
                                        <select name="additional[guest_house][bedroom]">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6+">6+</option>
                                            <option value="studio">Studio</option>
                                        </select>
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Bathrooms</span>
                                <div class="price-drop-down-main">
                                    <span class="step2-drop-down">
                                        <select name="additional[guest_house][bathroom]">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7+">7+</option>
                                        </select>
                                    </span>
                                </div>
                            </div>


                        </div>


                        {{-------------- motorcycle section start--------------------------}}
                        <div class="motorcycle-section" style="display:none;">

                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Make</span>
                                <div class="price-drop-down-main">
                                    <span class="step2-drop-down">
                                        <select name="additional[motorcycle][make]">
                                            <option value="crown">Crown</option>
                                            <option value="eagle">Eagle</option>
                                            <option value="ghani-automobiles">Ghani</option>
                                            <option value="habib-motorcycles">Habib</option>
                                            <option value="harley-davidson">Harley Davidson</option>
                                            <option value="motorcycles-other">Other Brands</option>
                                            <option value="atlas-honda">Honda</option>
                                            <option value="kawasaki">Kawasaki</option>
                                            <option value="metro">Metro</option>
                                            <option value="power">Power</option>
                                            <option value="ravi">Ravi</option>
                                            <option value="road-prince">Road Prince</option>
                                            <option value="sohrab-motorcycles">Sohrab</option>
                                            <option value="heavy-bikes">Sports &amp; Heavy Bikes</option>
                                            <option value="super-power">Super Power</option>
                                            <option value="super-star">Super Star</option>
                                            <option value="suzuki-pakistan-motorcycles">Suzuki</option>
                                            <option value="unique">Unique</option>
                                            <option value="united">United</option>
                                            <option value="vespa">VESPA</option>
                                            <option value="dawood-yamaha-group">Yamaha</option>
                                        </select>
                                    </span>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12">
                                <span class="condition-popup">Year</span>
                                <input type="text" onkeypress="return isNumberKey(event)" name="additional[motorcycle][year]" class="popup-field">
                            </div>

                        </div>

                    </div>
                    <div class="close-update-btn">
                        <ul class="close-update-btnul">

                            <li>
                                <a href="#" class="btn btn-secondary btn-md previous-section-2" >Back</a>
                            </li>

                            <li>
                                <a href="#" class="btn btn-primary btn-md next-section-2" style="background:#160e39;">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
                </div>
                <!--step 2 end-->
                <!--step 3-->
                <div class="step3-main-popup" style="display: none">
                    <div class="row">
                        <div class="col-md-6">

                            <span class="coun-text">Country</span>
                            <span class="select-country-drop-down">
                                <select name="country_id" id="country-ads" class="selection_box">

                                </select>
                            </span>


                            <span class="coun-text">City</span>
                            <span class="select-country-drop-down">
                                <select name="city_id" id="city-ads" class="selection_box">

                                </select>
                            </span>

                            <span class="coun-text">Location</span>
                            <input type="search" placeholder="Type here..." class="popup-field2" name="location" id="location_add">

                        </div>
                        <div class="col-md-6">
                            <div class="create-add-map">
                                <div id="map-add"></div>
                            </div>
                        </div>

                        <input type="hidden" name="lat" class="add_lat">
                        <input type="hidden" name="lng" class="add_lng">

                        {{--<div class="col-md-12">--}}
                            {{----}}
                        {{--</div>--}}

                        <div class="close-update-btn">
                            <ul class="close-update-btnul">
                                <li>
                                    <a href="#" class="btn btn-secondary btn-md previous-section-3">Back</a>
                                </li>
                                <li>
                                    <a href="#" class="btn btn-primary btn-md next-section-3" style="background:#160e39;">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--step 3 end-->
                <!--step 4-->
                <div class="step4-main-popup" style="display: none">
                    <div class="row no-gutters">
                        <span class="upload-photo">UPLOAD UP TO 10 PHOTOS</span>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="ed-profile2">
                                <img id="gallery-1" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                <div class="edit-pencil2">
                                    <label>
                                        <input class="inputFile" type="file" id="profile_picture" name="profile_picture" onchange="readURL(this,'gallery-1')">
                                        <i class="fas fa-pencil-alt"></i>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <ul class="upload-ul" id="sortable">
                                <li>
                                    <div class="ed-profile3">
                                        <img id="gallery-2" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery[]" onchange="readURL(this,'gallery-2')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-profile3">
                                        <img id="gallery-3" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery[]" onchange="readURL(this,'gallery-3')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-profile3">
                                        <img id="gallery-4" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery[]" onchange="readURL(this,'gallery-4')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-profile3">
                                        <img id="gallery-5" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery[]" onchange="readURL(this,'gallery-5')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-profile3">
                                        <img id="gallery-6" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery[]" onchange="readURL(this,'gallery-6')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-profile3">
                                        <img id="gallery-7" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery[]" onchange="readURL(this,'gallery-7')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-profile3">
                                        <img id="gallery-8" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery[]" onchange="readURL(this,'gallery-8')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-profile3">
                                        <img id="gallery-9" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery[]" onchange="readURL(this,'gallery-9')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="ed-profile3">
                                        <img id="gallery-10" class="image_upload_preview" src="{{asset('main-assets/images/upload-icon.png')}}" alt="img">
                                        <div class="edit-pencil3">
                                            <label>
                                                <input class="inputFile gallery_picture" type="file" name="gallery[]" onchange="readURL(this,'gallery-10')">
                                                <i class="fas fa-pencil-alt"></i>
                                            </label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="close-update-btn">
                        <ul class="close-update-btnul">
                            <li>
                                <a href="#" class="btn btn-secondary btn-md previous-last">Back</a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-primary btn-md submitBtn" style="background:#160e39;">Save</a>
                            </li>
                        </ul>
                    </div>

                    <input type="hidden" class="condition_check" name="condition" >
                    <input type="hidden" name="additional_check" class="additional">
                    <input type="hidden" name="make" class="make">
                    <input type="hidden" name="sub_category_name" class="sub_category_name">

                </div>
                <!--step 4 end-->
        </form>

    </div>

    </div>
</div>



<script>

    $(document).ready(function(){
        getAdsCategories();


        $('#postAds').click(function(){

            $('#create-add-popup').modal('show');

        });

        $(document).on('click','.selected_category',function(){

            var category = $(this).data('id');

            var hidden_input = $('.category_hidden_field').val(category);

//            $('.categories_ul').append(hidden_input);

            var html = '';

            $.ajax({

                type: "GET",
                url: "{{url('user/getAdsSubCategories')}}/"+category,

                success: function (response, status) {

                    if (response.result == 'success') {

                        $.each(response.data,function(key,index){

                            html += '<li class="sub_selected_category" data-id="'+index.id+'" >'+index.name+'</li>';

                        });

                        $('.sub_categories_ul').html(html);

                    }

                }

            });


        });

        var isAdditionalFieldReq = '';
        var isCondition = '';
        var sub_cat_name = '';

        $(document).on('click','.sub_selected_category',function(){

            var category = $(this).data('id');

            sub_cat_name = $(this).text();

            $('.sub_category_name').val(sub_cat_name);

            var hidden_input = $('.sub_category_hidden_field').val(category)

//            $('.categories_ul').append(hidden_input);

            var html = '';

            $.ajax({

                type: "GET",
                url: "{{url('user/getAdsMaker/')}}/"+category,

                success: function (response, status) {

                    if (response.result == 'success') {

                        if (response.data.maker != '') {
                            $.each(response.data.maker, function (key, index) {

                                html += '<li class="maker_tags" data-id="' + index.id + '">' + index.name + '</li>';

                            });

                            $('.maker_ul').html(html);

                            isCondition = response.data.isAdCond;
                            isAdditionalFieldReq = response.data.additionalField;

                            var isCondition_hidden = $('.condition').val(isCondition_hidden);
                            var isAdditional_hidden = $('.additional').val(isAdditionalFieldReq);
                            var isType_hidden = $('.make').val(response.data.isAdType);

//                            alert(isCondition);
                            if(isCondition != null)
                            {

                                $('.condition_div').show();

                            }
                            else{
                                $('.condition_div').hide();
                            }

                            if(isAdditionalFieldReq == 1)
                            {

                                if(sub_cat_name == 'Vehicle')
                                {
                                    $('.vehicle-section').show();
                                }
                                else{
                                    $('.vehicle-section').hide();
                                }


                                if(sub_cat_name == 'Buses, Vans & Trucks' || sub_cat_name == 'Rickshaw & Chingchi' || sub_cat_name == 'Tractors & Trailers' || sub_cat_name == 'Scooters')
                                {
                                    $('.buses-section').show();
                                }
                                else{
                                    $('.buses-section').hide();
                                }


                                if(sub_cat_name == 'Land & Plots' || sub_cat_name == 'Shops - Offices - Commercial Space')
                                {
                                    $('.land-plot-section').show();
                                }
                                else{
                                    $('.land-plot-section').hide();
                                }

                                if(sub_cat_name == 'Houses')
                                {
                                    $('.house-section').show();
                                }
                                else{
                                    $('.house-section').hide();
                                }

                                if(sub_cat_name == 'Apartments & Flats' || sub_cat_name == 'Portions & Floors')
                                {
                                    $('.portion-floor-section').show();
                                }
                                else{
                                    $('.portion-floor-section').hide();
                                }


                                if(sub_cat_name == 'Shops - Offices - Commercial Space - Rent')
                                {
                                    $('.commerical-use-section').show();
                                }
                                else{
                                    $('.commerical-use-section').hide();
                                }


                                if(sub_cat_name == 'Roommates & Paying Guests')
                                {
                                    $('.paying-guest-section').show();
                                }
                                else{
                                    $('.paying-guest-section').hide();
                                }


                                if(sub_cat_name == 'Vacation Rentals - Guest Houses')
                                {
                                    $('.guest-house-section').show();
                                }
                                else{
                                    $('.guest-house-section').hide();
                                }



                                if(sub_cat_name == 'Motorcycles')
                                {
                                    $('.motorcycle-section').show();
                                }
                                else{
                                    $('.motorcycle-section').hide();
                                }

                            }
                            else{

                            }

                        }
                    }

                }

            });

        });

        $(document).on('click','.maker_tags',function(){

            var category = $(this).data('id');
            var hidden_input = $('.maker_hidden_field').val(category)


        });

        $('.next-section-1').click(function(){

            var flag = 0;


            if ($('.category_hidden_field').val() == '') {
                alert('cateogory required');
                flag++;
            }
            else {
                $(".profile_picture_error").hide();
            }


            if($('.sub_category_hidden_field').val() == '')
            {
                alert('sub cat req');
                flag++;
            }
            else {
                $(".gallery_picture_error").hide();
            }

            if (flag != 0) {
//                alert('here');
                return false;
            }


            $('.step1-main-popup').hide();
            $('.step2-main-popup').show();
            getCity();


        });

        $('.next-section-2').click(function(){

            var flag = 0;


            if ($('#create-add-title').val() == '') {
                alert('title required');
                flag++;
            }
            else {
              //  $(".profile_picture_error").hide();
            }


            if($('#create-add-description').val() == '')
            {
                alert('descruption req');
                flag++;
            }
            else {
              //  $(".gallery_picture_error").hide();
            }

            if($($('#create-add-price')).val() == '')
            {
                alert('price req');
                flag++;
            }
            else {
         //       $(".gallery_picture_error").hide();
            }


            if(isAdditionalFieldReq == 1)
            {

                if(sub_cat_name == 'Vehicle')
                {

                    $('.vehicle-section input').each(function(key,index){

                    console.log(index);
                        if(index.value == '')
                        {
                            alert('field is req');
                            flag++;
                        }

                    });

                }



                if(sub_cat_name == 'Buses, Vans & Trucks' || sub_cat_name == 'Rickshaw & Chingchi' || sub_cat_name == 'Tractors & Trailers' || sub_cat_name == 'Scooters')
                {
                    $('.buses-section input').each(function(key,index){

                        if(index.value == '')
                        {
                            alert('field is req');
                            flag++;
                        }

                    });
                }


                if(sub_cat_name == 'Land & Plots' || sub_cat_name == 'Shops - Offices - Commercial Space')
                {
                    $('.land-plot-section input').each(function(key,index){

                        if(index == '')
                        {
                            alert('field is req');
                            flag++;
                        }

                    });
                }


                if(sub_cat_name == 'Houses')
                {
                    $('.house-section input').each(function(key,index){

                        if(index == '')
                        {
                            alert('field is req');
                            flag++;
                        }

                    });
                }


                if(sub_cat_name == 'Apartments & Flats' || sub_cat_name == 'Portions & Floors')
                {
                    $('.portion-floor-section input').each(function(key,index){

                        if(index == '')
                        {
                            alert('field is req');
                            flag++;
                        }

                    });
                }

                if(sub_cat_name == 'Shops - Offices - Commercial Space - Rent')
                {
                    $('.commerical-use-section input').each(function(key,index){

                        if(index == '')
                        {
                            alert('field is req');
                            flag++;
                        }

                    });
                }



                if(sub_cat_name == 'Roommates & Paying Guests')
                {
                    $('.paying-guest-section input').each(function(key,index){

                        if(index == '')
                        {
                            alert('field is req');
                            flag++;
                        }

                    });
                }



                if(sub_cat_name == 'Vacation Rentals - Guest Houses')
                {
                    $('.guest-house-section input').each(function(key,index){

                        if(index == '')
                        {
                            alert('field is req');
                            flag++;
                        }

                    });
                }


                if(sub_cat_name == 'Motorcycles')
                {
                    $('.motorcycle-section input').each(function(key,index){

                        if(index == '')
                        {
                            alert('field is req');
                            flag++;
                        }

                    });
                }


            }
            else{

            }


            if (flag != 0) {

                return false;
            }

            $('.step2-main-popup').hide();
            $('.step3-main-popup').show();
            getCountry();
            add_map();
        });

        $('.next-section-3').click(function(){


            var flag = 0;


            if ($('#location_add').val() == '') {
                alert('location required');
                flag++;
            }
            else {
                $(".profile_picture_error").hide();
            }


            if (flag != 0) {

                return false;
            }

            $('.step3-main-popup').hide();
            $('.step4-main-popup').show();

        });


        $('.previous-last').click(function(){

            $('.step4-main-popup').hide();
            $('.step3-main-popup').show();
//            getCity();
        });

        $('.previous-section-2').click(function(){

            $('.step2-main-popup').hide();
            $('.step1-main-popup').show();

        });

        $('.previous-section-3').click(function(){

            $('.step3-main-popup').hide();
            $('.step2-main-popup').show();

        });


        $('.submitBtn').click(function(e){

            e.preventDefault();
            var flag = 0;


            if ($('#profile_picture').val() == '') {
                alert('profile picture req');
//                $('.profile_picture_error').show();
                flag++;
            }
            else {
//                $(".profile_picture_error").hide();
            }


            $('.gallery_picture').each(function(key,index){

                if(index.value == '')
                {
                    alert('atleast one of the image in gallery is required');
                    flag++;
                }
                else{
                    flag = 0;
                    return false;
                }

            });

            if (flag != 0) {
                alert('here');
                return false;
            }

//alert('good to go');
            var token = '{!! csrf_token() !!}';

            var globalFormData = new FormData($('.add_form')[0]);


            $.ajax({

                type: "POST",
                url: "{{route('user.saveAds')}}",
                data: globalFormData,
                cache: false,
                contentType: false,
                processData: false,

                success: function (response, status) {

                    if (response.result == 'success') {
                        alert(response.message);
                        $('.add_form')[0].reset();
                        $('#create-add-popup').modal('hide');
                        $('.step4-main-popup').hide();
                        $('.step1-main-popup').show();
                    }

                }
            });
        });


    });


    function getAdsCategories() {

        var html = '';
        $.ajax({

            type: "GET",
            url: "{{route('user.getAdsCategories')}}",

            success: function (response, status) {

                if (response.result == 'success') {

                    $.each(response.data,function(key,index){

                      html += '<li class="selected_category" data-id="'+index.id+'">'+index.name+'</li>';

                    });

                    $('.categories_ul').html(html);

                }

            }

        });

    }


    function getCity()
    {
        var value = "{{Session::get('location.countryId')}}";
        var city = '';
        var urld = "{{route('get-cities',['countryId'=>Session::get('location')['countryId']])}}";
        $.ajax({

            type: "GET",
            url: urld,

            success: function (response, status) {

                $.each(response.data, function (index1, value1) {


                    city += ' <option value="' + value1.id + '" >' + value1.name + '</option>';
                });

                $('#city-ads').html(city);
                $('#city_registered').html(city);
            }

        });
    }

    function getCountry() {

        var selectedCountry = {{Session::get('location.countryId')}};
        var urld = "{{route('user.getCountries')}}";
        var country = '';
        $.ajax({

            type: "GET",
            url: urld,

            success: function (response, status) {

                $.each(response.country, function (index1, value1) {

                    if(selectedCountry == value1.id) {
                        country += ' <option value="' + value1.id + '" selected >' + value1.name + '</option>';
                    }
                    else{
                        country += ' <option value="' + value1.id + '"  >' + value1.name + '</option>';
                    }
                });
                $('#country-ads').html(country);

            }

        });

    }


</script>


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


    function isNumberKey(evt) {      //onkeypress="return isNumberKey(event)"
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        } else {
            return true;
        }
    }


</script>