
<div class="modal" id="signup-popup-{{$addonFeature->id}}" role="dialog" style="background: rgba(0,0,0,.9);">

    <div class="modal-dialog model-dlg1">
        <span class="close_popup" data-dismiss="modal"><i class="fas fa-times"></i></span>
        <form id="signupForm-{{$addonFeature->id}}" method="POST" action="{{route('user.apply-addon')}}">
            <!-- Hidden Fields -->

            <input type="hidden" name="payment_method" value="1">

            <input type="hidden" name="stripe_token" id="stripe_token-{{$addonFeature->id}}">

            <input name="addon_id" id="addon_id" value="{{$addonFeature->id}}">

            <input type="hidden" name="primary" value="1">

            <input type="hidden" name="shipping_to_bill_address" value="0">

            @csrf

            <div id="smartwizard-{{$addonFeature->id}}" >
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
                    @if($addonFeature->price_model_id != '1')
                        <li><a href="#form-step-3">Step 4<br/>
                                <small>This is step description</small>
                            </a></li>
                    @endif
                </ul>

                <div>
                    <div id="form-step-0" role="form" data-toggle="validator" novalidate="true">

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
                            <input maxlength="100" type="text" id="card_number-{{$addonFeature->id}}" name="card_number"
                                   required="required"
                                   class="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">CVC</label>
                            <input maxlength="100" type="text" onkeypress="return isNumber(event)" id="cvc-{{$addonFeature->id}}"
                                   name="cvv" required="required"
                                   class="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Expiry</label>
                            <input maxlength="100" type="text" id="exp-{{$addonFeature->id}}" name="expiry" required="required"
                                   class="">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input maxlength="100" type="text" id="full_name-{{$addonFeature->id}}" value="{{Auth::user()->name}}"
                                   required="required" class="">
                        </div>
                        <div class="form-group" id="stripe_error" style="color: red;">
                        </div>
                        <div class="form-group pull-right">


                            <div id="user_error" style="color: red;"></div>

                        </div>
                    </div>


                    @if($addonFeature->price_model_id != '1')
                        <div id="form-step-3" role="form" data-toggle="validator" novalidate="true">
                        <h3 class="border-bottom border-gray pb-2">Select Add on</h3>

                        <div class="form-group">
                            <div class="col-12 col-lg-8">

                                @foreach($addonFeature->addonFeatures as $addonFeatured)

                                    <div class="row" style="padding:10px;    background: #dae0ea;margin-top:10px;">

                                        <div class="col-6">
                                            <span class="customer-id2">Feature Name</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="custom-right-text2">
                                                <label style="font-weight:bold;">{{$addonFeatured->site->name}}</label>
                                            </span>
                                        </div>

                                        <div class="col-12" style="margin-bottom:10px;border-bottom:1px solid #bac0ca"></div>

                                        @foreach($addonFeatured->unit as $unit)

                                            <div class="col-6">
                                                <input type="checkbox" name="selected_feature[]" value="{{$unit->id}}">
                                                <span class="customer-id2">Price According to Unit</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="custom-right-text2">{{$unit->price}}</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="customer-id2">Feature Quantity</span>
                                            </div>
                                            <div class="col-6">
                                                <span class="custom-right-text2">
                                                    @if($loop->index == 0) 1
                                                        to {{$unit->qty}}
                                                    @else {{$addonFeatured->unit[$loop->index-1]->qty+1}}
                                                        to {{$unit->qty}}
                                                    @endif
                                                </span>
                                            </div>

                                        @endforeach
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="form-group pull-right">
                            <button type="button" class="btn btn-info pull-right" id="sbt_btn-{{$addonFeature->id}}">Save</button>


                            <div id="user_error" style="color: red;"></div>

                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>


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
        $('#smartwizard-{{$addonFeature->id}}').smartWizard({
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

        $("#smartwizard-{{$addonFeature->id}}").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
//            alert('123');
//            alert(stepNumber);

            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            if (stepDirection === 'forward' && elmForm) {
                elmForm.validator('validate');
                var elmErr = elmForm.children('.has-error');
                console.log(elmErr);
//                if (elmErr && elmErr.length > 0) {
//                    // Form validation failed
//                    return false;
//                }
            }
            return true;
        });

        $("#smartwizard-{{$addonFeature->id}}").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
//            alert('345');
//            alert(stepNumber);
            if (stepNumber == 3) {
                $('.btn-finish').removeClass('disabled');
            } else {
                $('.btn-finish').addClass('disabled');
            }
        });

        $('#sbt_btn-{{$addonFeature->id}}').click(function () {

            let email = $('#email_r').val();

            let rootUrl = window.location.origin;
            let userExist = 0;


            $('#user_error').text('');


            var stripe = Stripe('pk_test_TCRoAW9MC7l5qWCRSgFgM1Lw');
            Stripe.setPublishableKey('pk_test_TCRoAW9MC7l5qWCRSgFgM1Lw');



            Stripe.card.createToken({
                number: $('#card_number-{{$addonFeature->id}}').val(),
                cvc: $('#cvc-{{$addonFeature->id}}').val(),
                // exp_month:$('#exp_month').val(),
                exp: $('#exp-{{$addonFeature->id}}').val(),
                name: $('#full_name-{{$addonFeature->id}}').val()
            }, stripeResponseHandler);

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('#stripe_error').text(response.error.message);
                    return false;
                }
                else {
                    var token = response.id;
                    $('#stripe_error').text("");
                    $('#stripe_token-{{$addonFeature->id}}').val(token);
                    $('#signupForm-{{$addonFeature->id}}').submit();

                }
            }


        });


    });

</script>
