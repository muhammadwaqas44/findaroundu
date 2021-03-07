@extends('layout.app')

@section('content')

@include('layout-user.front-top-menu')

<div class="body-container">
    <div class="custom-container">
        <div class="add-listing2">
            <form method="post" action="{{route('user.insert_product')}}"
                  enctype="multipart/form-data">
                @csrf
                <span class="add-listing-heading">Product Creation</span>
                <span class="get-more-exposure">Get more exposure</span>
                <div class="add-listing-details">
                    <span class="submit-listing">Submit your Add listing</span>
                    <p class="still-not-signed">You are still not <a href="#">signed in</a>: sign in, or if you don't have an account you can create one below by entering your email address/username. Your account details will be confirmed via email.</p>
                    <span class="submit-listing">Product Details</span>
                    <ul class="listing-add-ul">
                        <li>
                            <span class="listing-title">Product Name</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <input type="text" placeholder="" name="product_name" class="listing-title-input" required>
                        </li>
                        <li>
                            <span class="listing-title">Product Description</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <textarea class="listing-title-input" name="description" style="height:150px;" required></textarea>
                        </li>

                        <li>

                        </li>


                    </ul>

                    <span class="submit-listing">Product Specification</span>
                    <ul class="listing-add-ul">

                        <li>
                            <span class="listing-title">Business</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <span class="search-drop-down5">
                                <select class="form-control" name="business_id"  required>
                                    @foreach($data['business'] as $business)
                                        <option value="{{$business->id}}">{{$business->title}}</option>
                                    @endforeach
                                </select>
                            </span>
                        </li>


                        <li>
                            <span class="listing-title">Product Categories</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <span class="search-drop-down5">
                                <select class="form-control" name="category_id[]" onChange="getSubCategories(this.value)" required>
                                    <option value="">Select</option>
                                    @foreach($data['categories'] as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </span>
                        </li>

                        <div class="subCategories_field" style="display: none">
                            <li>
                                <span class="listing-title">Product SubCategories</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                    <select class="form-control" name="category_id[]" onChange="getSubSubCategories(this.value)" id="subCategory" >

                                    </select>
                                </span>
                            </li>
                        </div>

                        <div class="sub_subCategories_field" style="display: none">

                            <li>
                                <span class="listing-title">Product SubCategories</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                    <select class="form-control" name="category_id[]" id="sub_subCategory" >

                                    </select>
                                </span>
                            </li>
                        </div>

                        <li>
                            <span class="listing-title">Product Price</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <input type="number" name="price" class="listing-title-input" required>
                        </li>

                        <li>
                            <span class="listing-title">Product Currency</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <span class="search-drop-down5">
                                <select class="form-control" name="currency_id"  required>
                                    @foreach($data['currency'] as $currency)
                                        <option value="{{$currency->id}}">{{$currency->currency}}</option>
                                    @endforeach
                                </select>
                            </span>
                        </li>


                        <li>
                            <span class="listing-title">Product SKU</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <input type="number" name="sku" class="listing-title-input" required>
                        </li>

                        <li>
                            <span class="listing-title">Product Quantity</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <input type="number" name="quantity" class="listing-title-input" required>
                        </li>


                    </ul>

                    <span class="submit-listing">Product Media</span>
                    <ul class="listing-add-ul last-ul">

                        <li>
                            <span class="listing-title">Product Featured Image</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <input name="profile_image"  type="file" required>

                        </li>
                        <li>
                            <span class="listing-title">Product Gallery</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <input name="gallery_images[]" multiple type="file" required>
                        </li>

                    </ul>

                    <span class="submit-listing">Sale</span>
                    <ul class="listing-add-ul">

                        <li>
                            <span class="listing-title">Sale</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <label class="payment-check">
                                <input type="checkbox" name="sale" value="1" class="sale">
                                <span></span>
                            </label>

                        </li>

                        <div class="sale_options" style="display: none;">
                            <li>
                                <span class="listing-title">Sale Percentage</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="number" name="sale_percentage" class="listing-title-input sale_percentage">
                            </li>

                            <li>
                                <span class="listing-title">Sale From</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="date" name="sale_from" class="listing-title-input sale_from">
                            </li>

                            <li>
                                <span class="listing-title">Sale To</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <input type="date" name="sale_to" class="listing-title-input sale_to">
                            </li>
                        </div>


                    </ul>

                    <span class="submit-listing">Return And Warranty</span>
                    <ul class="listing-add-ul">

                        <li>
                            <span class="listing-title">Return</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <label class="payment-check">
                                <input type="checkbox" name="return" value="1" class="return">
                                <span></span>
                            </label>

                        </li>

                        <div class="return_option" style="display: none">
                            <li>
                                <span class="listing-title">Return Days</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                    <select class="form-control" name="return_date">
                                        @for($i=1;$i<61;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </span>

                            </li>

                            <li>
                                <span class="listing-title">Return Interval</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                    <select class="form-control" name="return_interval">
                                        <option value="hours">Hours</option>
                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </span>
                            </li>
                        </div>

                        <li>
                            <span class="listing-title">Warranty</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <label class="payment-check">
                                <input type="checkbox" name="warranty" value="1" class="warranty">
                                <span></span>
                            </label>

                        </li>

                        <div class="warranty_option" style="display: none">
                            <li>
                                <span class="listing-title">Warranty Days</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                    <select class="form-control" name="warranty_claim_date">
                                        @for($i=1;$i<61;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </span>

                            </li>

                            <li>
                                <span class="listing-title">Warranty Interval</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                    <select class="form-control" name="warranty_claim_interval">
                                        <option value="hours">Hours</option>
                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </span>
                            </li>
                        </div>

                    </ul>


                    <span class="submit-listing">Delivery Options</span>
                    <ul class="listing-add-ul">

                        <li>
                            <span class="listing-title">Cash on Delivery</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <label class="payment-check">
                                <input type="checkbox" name="cash_on_delivery" value="1">
                                <span></span>
                            </label>

                        </li>

                        <li>
                            <span class="listing-title">Home Delivery</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <label class="payment-check">
                                <input type="checkbox" name="home_delivery" value="1" class="home_delivery">
                                <span></span>
                            </label>

                        </li>

                        <div class="home_delivery_options" style="display: none">
                            <li>
                                <span class="listing-title">Home Delivery To</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                    <select class="form-control" name="home_delivery_to">
                                        @for($i=1;$i<61;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </span>

                            </li>

                            <li>
                                <span class="listing-title">Home Delivery From</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                    <select class="form-control" name="home_delivery_from">
                                        @for($i=1;$i<61;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </span>

                            </li>



                            <li>
                                <span class="listing-title">Return Interval</span>
                                <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                                <span class="search-drop-down5">
                                    <select class="form-control" name="home_delivery_interval">
                                        <option value="hours">Hours</option>
                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </span>
                            </li>
                        </div>

                        <li>
                            <span class="listing-title">Delivery Charges</span>
                            <a class="question-icon" data-toggle="tooltip" title="please choose" href="#"><i class="far fa-question-circle"></i></a>
                            <input type="text" name="delivery_charges"  class="listing-title-input">

                        </li>

                    </ul>

                    <button class="preview-btn" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



@include('layout-user.setup-js')

    <script>

        function getSubCategories(value)
        {
            var urld = "{{url('user/get-sub-category')}}/" + value;

            if(value != '')
            {
                $.get(urld, function (data, status) {

                    if(data.length > 0) {

                        $('.subCategories_field').show();

                        var subcategory = '<option value="">Select</option>';
                        $.each(data, function (index, value) {
                            subcategory += '<option value="' + value.id + '" >' + value.name + '</option>';
                        });
                    }
                    $('#subCategory').html(subcategory);

                });
            }

        }

        function getSubSubCategories(value) {
            var urld = "{{url('user/get-sub-category')}}/" + value;

            if(value != '')
            {
                $.get(urld, function (data, status) {

                    if(data.length > 0) {
                        $('.sub_subCategories_field').show();

                        var subcategory = '<option value="">Select</option>';
                        $.each(data, function (index, value) {
                            subcategory += '<option value="' + value.id + '" >' + value.name + '</option>';
                        });
                    }
                    $('#sub_subCategory').html(subcategory);

                });
            }

        }

        $('.sale').click(function(){

            if($('input[name="sale"]').is(":checked"))
            {
                $('.sale_options').show();
            }
            else{
                $('.sale_options').hide();
            }

        });

        $('.return').click(function(){

            if($('input[name="return"]').is(":checked"))
            {
                $('.return_option').show();
            }
            else{
                $('.return_option').hide();
            }

        });

        $('.warranty').click(function(){

            if($('input[name="warranty"]').is(":checked"))
            {
                $('.warranty_option').show();
            }
            else{
                $('.warranty_option').hide();
            }

        });

        $('.home_delivery').click(function(){

            if($('input[name="home_delivery"]').is(":checked"))
            {
                $('.home_delivery_options').show();
            }
            else{
                $('.home_delivery_options').hide();
            }

        });




    </script>


@endsection