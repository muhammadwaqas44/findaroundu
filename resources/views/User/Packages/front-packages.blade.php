@extends('layout-user.app')

@section('user-portal-heading','Packages')
@section('content')




    @include('layout-user.user-portal-heading')

    <div class="body-container">
        @include('layout-user.header')
        <div class="dashboard-main">
            @include('layout-user.sidebar')
            <div class="dashboard-right-main" style="margin-top:-142px;">
                <div class="add-listing">
                    <span class="add-listing-heading">Packages Listing</span>
                    <span class="get-more-exposure">Get more exposure</span>
                    <div class="row">


                        @foreach($data['front_packages']['all_packages'] as $package)

                            <div class="col-lg-3 col-sm-12">
                                <div class="pkg-listing-main"
                                     @if(!empty($package->subscription()->where('user_id',Auth::user()->id)->where('subscription_status','active')->where('active','active')->first())) @if($package->subscription()->where('user_id',Auth::user()->id)->where('subscription_status','active')->where('active','active')->first()->plan->id == Auth::user()->subscriptions()->where('subscription_status','active')->where('active','active')->first()->plan->id) style="border:1px solid red" @endif @endif>


                          <span class="pkg-name">
                                <div>
                                    <span>{{$package->plan->name}}</span>
                                    <span style="font-size:12px;color:red">
                                         @if(!empty($package->subscription()->where('user_id',Auth::user()->id)->where('subscription_status','active')->where('active','active')->first()))
                                            @if($package->subscription()->where('user_id',Auth::user()->id)->where('subscription_status','active')->where('active','active')->first()->plan->id == Auth::user()->subscriptions()->where('subscription_status','active')->where('active','active')->first()->plan->id)
                                                <small>Current</small>
                                            @endif
                                        @endif
                                    </span>
                                </div>
                            </span>


                                    <span class="pkg-price">$<span
                                                id="plan-id-{{$package->id}}">{{$package->plan->pricingModel->first()->pivot->price}}</span></span>
                                    <span class="stndard-pkg"> {{$package->plan->description}}</span>
                                    <ul class="pkg-listing-ul" style="margin-bottom:5px !important;">


                                        {{--PLAN FEATURES--}}

                                        @foreach($package->plan->planFeatures as $features)
                                            <li>
                                                <strong>{{$features->quantity}}</strong> {{$features->site->name}}
                                                Posts
                                            </li>
                                        @endforeach

                                        {{--END PLEAN FEAURES--}}










                                        {{--      ADDONS IF PLAN HAVE ADDONS --}}

                                        @if(count($package->subscription()->where('user_id',Auth::user()->id)->where('active','active')->get()) == 0)

                                            @if($package->plan->planAddOn->count() != 0)
                                                <span class="stndard-pkg"
                                                      style="margin-bottom:0px;"><label><h4>AddOns</h4></label></span>

                                                @foreach($package->plan->planAddOn  as $addonFeature)

                                                    <li class="addon">
                                                        <input onchange="addPrice({{$addonFeature->total_price}},'addon-id-{{$addonFeature->id}}','plan-id-{{$package->id}}',{{$addonFeature->id}});"
                                                               id="addon-id-{{$addonFeature->id}}" type="checkbox">
                                                        <a addon-id="{{$addonFeature->id}}" href="#" data-toggle="modal"
                                                           onclick="add_on_popup({{$addonFeature->id}})"
                                                           data-target="#addon-popup-{{$addonFeature->id}}"><strong>

                                                                {{$addonFeature->name}}</strong></a>

                                                    </li>
                                                    <script>
                                                        document.getElementById('addon-id-{{$addonFeature->id}}').checked = false;
                                                    </script>

                                                    @component('popups.addon-detail',['addonFeature'=>$addonFeature])
                                                    @endcomponent


                                                @endforeach
                                            @endif
                                        @endif
                                        {{--END PLAN HAS ADDONS--}}



                                        @if(count($package->subscription()->where('user_id',Auth::user()->id)->where('active','active')->get()) != 0)

                                            @if($package->subscription()->where('user_id',Auth::user()->id)->where('active','active')->first()->addons->count()!=0)
                                                Addons
                                            @endif


                                            @foreach($package->subscription()->where('user_id',Auth::user()->id)->where('active','active')->first()->addons as $addon)


                                                <li class="addon">
                                                    <a addon-id="{{$addon->id}}" href="#" data-toggle="modal"
                                                       onclick="add_on_popup({{$addon->id}})"
                                                       data-target="#addon-popup-{{$addon->id}}"><strong>

                                                            {{$addon->name}} <label class="badge badge-info">Total
                                                                price: {{$addon->total_price}}</label></strong></a>

                                                </li>

                                                @component('popups.addon-detail',['addonFeature'=>$addon])
                                                    @endcomponent
                                            @endforeach


                                        @endif



                                    </ul>


                                    @if(!empty($package->subscription()->where('user_id',Auth::user()->id)->where('subscription_status','active')->where('active','active')->first()))
                                        <a href="#" class="start-now-btn">
                                            @if(!empty($package->subscription()->where('user_id',Auth::user()->id)->where('subscription_status','active')->where('active','active')->first()))
                                                @if($package->subscription()->where('user_id',Auth::user()->id)->where('subscription_status','active')->where('active','active')->first()->plan->id == Auth::user()->subscriptions()->where('subscription_status','active')->where('active','active')->first()->plan->id)
                                                    <small>Current</small>

                                                @endif

                                            @endif

                                        </a>
                                    @else
                                        <a package-id="{{$package->id}}" onclick="popup()" data-toggle="modal" href="#"
                                           data-target="#signup-popup"
                                           class="start-now-btn on-apply">Apply </a>
                                    @endif


                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout-user.js')
    <script>
        $(document).ready(function () {

            $('.show-menu-drop').click(function (e) {

                e.preventDefault(); // stops link from making page jump to the top
                e.stopPropagation(); // when you click the button, it stops the page from seeing it as clicking the body too
                $('.menu-drop4').toggle();

            });

            $('.menu-drop4').click(function (e) {

                e.stopPropagation(); // when you click within the content area, it stops the page from seeing it as clicking the body too

            });

            $('body').click(function () {

                $('.menu-drop4').hide();

            });

        });
    </script>




    <link rel="stylesheet" type="text/css" href="{{asset('main-assets/css/wizard-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('main-assets/css/wizard-theme-circles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('main-assets/css/wizard-theme-dots.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('main-assets/css/wizard-smart-wizard.css')}}">



    <div class="modal" id="signup-popup" role="dialog" style="background: rgba(0,0,0,.9);">

        <div class="modal-dialog model-dlg1">
            <span class="close_popup" data-dismiss="modal"><i class="fas fa-times"></i></span>
            <form id="signupForm" method="POST" action="{{route('user.apply-subscription')}}">
                <!-- Hidden Fields -->


                <input type="hidden" name="payment_method" value="1">
                <input type="hidden" name="stripe_token" id="stripe_token">
                <input name="package_id" id="package_id">

                <input type="hidden" name="primary" value="1">
                <input type="hidden" name="shipping_to_bill_address" value="0">

                @csrf

                <div id="smartwizard">
                    <ul>
                        <li><a href="#form-step-0">Step 1<br/>
                                <small>This is step description</small>
                            </a></li>
                        <li><a href="#form-step-1">Step 2<br/>
                                <small>This is step description</small>
                            </a></li>
                        <li><a href="#form-step-2">Step 3<br/>
                                <small>This is step description</small>
                            </a></li>
                    </ul>

                    <div>
                        <div id="form-step-0" role="form" data-toggle="validator" novalidate="true">
                            <div id="for-addons"></div>
                            <h3 class="border-bottom border-gray pb-2">Step 1 Content</h3>
                            <div class="form-group">
                                <label class="control-label">First Name</label>
                                <input maxlength="100" type="text" name="first_name"
                                       value="{{Auth::user()->userInfo->first_name}}" required id="first_name" class="">

                            </div>
                            <div class="form-group">
                                <label class="control-label">Last Name</label>
                                <input maxlength="100" type="text" name="last_name"
                                       value="{{Auth::user()->userInfo->last_name}}" required="required" class="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>

                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Write your email address" required="">

                                <input maxlength="100" type="text" id="email_r" name="email_r" required="required"
                                       value="{{Auth::user()->email}}" class="">
                                @if ($errors->has('email_r'))
                                    <span class="bg-danger error-email">{{ $errors->first('email_r') }}</span>
                                @endif
                            </div>


                        </div>


                        <div id="form-step-1" role="form" data-toggle="validator" novalidate="true">
                            <h3 class="border-bottom border-gray pb-2">Step 2 Content</h3>
                            <div class="form-group">
                                <label class="control-label">Zip</label>
                                <input maxlength="100" onkeypress="return isNumber(event)" type="text"
                                       value="{{ old('zip') }}" name="zip" required="required" class="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Country</label>
                                <select class="" name="country_id" id="country_id">
                                    @foreach($data['countries'] as $country)
                                        <option value="{{ $country->id }}"> {{ $country->name }} </option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="form-group">
                                <label class="control-label">City</label>
                                <select class="" id="city" name="city">
                                    <option value="1">Lahore</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone</label>
                                <input maxlength="100" onkeypress="return isNumber(event)" type="text" name="phone"
                                       value="{{Auth::user()->phone}}" required="required" class="">
                            </div>

                        </div>


                        <div id="form-step-2" role="form" data-toggle="validator" novalidate="true">
                            <h3 class="border-bottom border-gray pb-2">Stripe</h3>

                            <div class="form-group">
                                <label class="control-label">Credit Card</label>
                                <input maxlength="100" type="text" id="card_number" name="card_number"
                                       required="required"
                                       class="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">CVC</label>
                                <input maxlength="100" type="text" onkeypress="return isNumber(event)" id="cvc"
                                       name="cvv" required="required"
                                       class="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Expiry</label>
                                <input maxlength="100" type="text" id="exp" name="expiry" required="required"
                                       class="">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input maxlength="100" type="text" id="full_name" value="{{Auth::user()->name}}"
                                       required="required" class="">
                            </div>
                            <div class="form-group" id="stripe_error" style="color: red;">
                            </div>
                            <div class="form-group pull-right">
                                <button type="button" class="btn btn-info pull-right" id="sbt_btn">Save</button>


                                <div id="user_error" style="color: red;"></div>

                            </div>
                        </div>


                    </div>

            </form>
        </div>
    </div>






    <script>
        $(document).ready(function () {

            $(document).on('click', '.on-apply', function () {
                var packageId = $(this).attr("package-id");
                $('#package_id').val(packageId);

            });

            $('#sbt_btn').click(function () {

                let email = $('#email_r').val();

                let rootUrl = window.location.origin;
                let userExist = 0;


                $('#user_error').text('');

                var stripe = Stripe('pk_test_TCRoAW9MC7l5qWCRSgFgM1Lw');
                Stripe.setPublishableKey('pk_test_TCRoAW9MC7l5qWCRSgFgM1Lw');

                Stripe.card.createToken({
                    number: $('#card_number').val(),
                    cvc: $('#cvc').val(),
                    // exp_month:$('#exp_month').val(),
                    exp: $('#exp').val(),
                    name: $('#full_name').val()
                }, stripeResponseHandler);

                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('#stripe_error').text(response.error.message);
                        return false;
                    }
                    else {
                        var token = response.id;
                        $('#stripe_error').text("");
                        $('#stripe_token').val(token);
                        $('#signupForm').submit();

                    }
                }


            });
        });
    </script>

    <script src="{{asset('main-assets/js/smartwizard.min.js')}}"></script>
    <!-- Include jQuery Validator plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

    <script src="https://js.stripe.com/v2/"></script>

    <script>
        $(document).ready(function () {

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                .addClass('btn btn-info')
                .on('click', function () {
                    if (!$(this).hasClass('disabled')) {
                        var elmForm = $("#myForm");
                        if (elmForm) {
                            elmForm.validator('validate');
                            var elmErr = elmForm.find('.has-error');
                            if (elmErr && elmErr.length > 0) {
                                alert('Oops we still have error in the form');
                                return false;
                            } else {
                                alert('Great! we are ready to submit form');
                                elmForm.submit();
                                return false;
                            }
                        }
                    }
                });
            var btnCancel = $('<button></button>').text('Cancel')
                .addClass('btn btn-danger')
                .on('click', function () {
                    $('#smartwizard').smartWizard("reset");
                    $('#myForm').find("input, textarea").val("");
                });


            // Smart Wizard
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'dots',
                transitionEffect: 'fade',
                toolbarSettings: {
                    toolbarPosition: 'bottom',
                    toolbarExtraButtons: [btnFinish, btnCancel]
                },
                anchorSettings: {
                    markDoneStep: true, // add done css
                    markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                    removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                    enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
                }
            });

            $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
                if (stepDirection === 'forward' && elmForm) {
                    elmForm.validator('validate');
                    var elmErr = elmForm.children('.has-error');
                    if (elmErr && elmErr.length > 0) {
                        // Form validation failed
                        return false;
                    }
                }
                return true;
            });

            $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if (stepNumber == 3) {
                    $('.btn-finish').removeClass('disabled');
                } else {
                    $('.btn-finish').addClass('disabled');
                }
            });

        });

        let countryId = $('#country_id').val();
        //   getCities(countryId);

        $(document).on('change', '#country_id', function () {
            let countryId = $(this).val();
            getCities(countryId);
        });

        function getCities(countryId) {
            var rootUrl = window.location.origin;
            $.ajax({
                type: "GET",
                url: rootUrl + '/get-cities/' + countryId,
                success: function (response) {
                    console.log(response);
                    let html = "";
                    $.each(response, function (index, value) {
                        html += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#city').html(html);
                }
            });
        }

        // function to check number of input box
        function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }

    </script>


    <script>
        $(document).ready(function () {
            function popup() {
                $('#signup-popup').modal('show');
            }

            //   popup();
        });

        function add_on_popup(id) {
//            alert(id);
            $('#addon-popup-' + id).attr('display', 'block');
        }
    </script>








    @if($errors->has('register_error'))
        <script>


            //  popup();
        </script>
        @endif


        </div>




        <style>
            .addon::before {
                content: "" !important;
            }
        </style>

        <script>
            function addPrice(addonPrice, checkId, planId, addonId) {

                if (document.getElementById(checkId).checked == true) {//alert(1);
                    document.getElementById(planId).innerHTML = parseInt(document.getElementById(planId).innerHTML) + addonPrice;
                    $('#for-addons').append('<input name="addons[]" style="display:none;" value="' + addonId + '" id="form-inner-addons-' + addonId + '">');
                } else {
                    $('#form-inner-addons-' + addonId).find().remove;
                    document.getElementById(planId).innerHTML = parseInt(document.getElementById(planId).innerHTML) - addonPrice;
                }

            }
        </script>


@endsection