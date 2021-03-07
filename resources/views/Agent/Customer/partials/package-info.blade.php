<div class="menu-setup-main">
    <div class="group-btn-main">
        <span class="all-setup-text">Packages</span>
    </div>

    <div class="tab-content">
            <!-- Example row of columns -->
        @foreach($data['front_packages']['all_packages'] as $package)



            <div class="col-md-12">
                <h2>@if(!empty($package->subscription()->where('user_id',$data['user_detail']->id)->where('subscription_status','active')->where('active','active')->first()))
                        @if($package->subscription()->where('user_id',$data['user_detail']->id)->where('subscription_status','active')->where('active','active')->first()->plan->id == $data['user_detail']->subscriptions()->where('subscription_status','active')->where('active','active')->first()->plan->id)
                        @endif
                    @endif
                </h2>
                <p>{{$package->plan->name}}</p>
                @if(!empty($package->subscription()->where('user_id',$data['user_detail']->id)->where('subscription_status','active')->where('active','active')->first()))
                    @if($package->subscription()->where('user_id',$data['user_detail']->id)->where('subscription_status','active')->where('active','active')->first()->plan->id == $data['user_detail']->subscriptions()->where('subscription_status','active')->where('active','active')->first()->plan->id)
                        <small>Current</small>
                    @endif
                @endif

                <p>${{$package->plan->pricingModel->first()->pivot->price}}</p>
                <p> {{$package->plan->description}}</p>

                <ul class="pkg-listing-ul">
                    @foreach($package->plan->planFeatures as $features)
                        <li>
                            <strong>{{$package->plan->planFeatures->first()->quantity}}</strong>
                            {{$package->plan->planFeatures->first()->site->name}}
                            Posts
                        </li>
                    @endforeach
                </ul>

                @if(!empty($package->subscription()->where('user_id',$data['user_detail']->id)->where('subscription_status','active')->where('active','active')->first()))
                    <p>
                        <a href="#" class="start-now-btn btn btn-primary btn-lg">
                            @if(!empty($package->subscription()->where('user_id',$data['user_detail']->id)->where('subscription_status','active')->where('active','active')->first()))
                                @if($package->subscription()->where('user_id',$data['user_detail']->id)->where('subscription_status','active')->where('active','active')->first()->plan->id == $data['user_detail']->subscriptions()->where('subscription_status','active')->where('active','active')->first()->plan->id)
                                    <small>Current</small>
                                @endif

                            @endif

                        </a>
                    </p>
                @else
                  <p>
                      <a package-id="{{$package->id}}" onclick="popup()" data-toggle="modal" href="#"
                       data-target="#signup-popup"
                       class="start-now-btn on-apply btn btn-primary btn-lg">Apply </a>
                  </p>
                @endif


            </div>
<br>
        @endforeach

    </div>



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



        <div class="modal" id="signup-popup" role="dialog" style="background: rgba(69,61,61,.9);">

            <div class="modal-dialog model-dlg1">
                <span class="close_popup" data-dismiss="modal"><i class="fas fa-times"></i></span>
                <form id="signupForm" method="POST" action="{{route('agent.apply-subscription')}}">
                    <!-- Hidden Fields -->

                    <input type="hidden" name="user_id" value="{{$data['user_detail']->id}}">
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
                                <h3 class="border-bottom border-gray pb-2">Step 1 Content</h3>
                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input maxlength="100" type="text" name="first_name"
                                           value="{{$data['user_detail']->userInfo->first_name}}" required id="first_name" class="">

                                </div>
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input maxlength="100" type="text" name="last_name"
                                           value="{{$data['user_detail']->userInfo->last_name}}" required="required" class="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    {{--<input type="email" class="form-control" name="email" id="email" placeholder="Write your email address" required="">--}}
                                    <input maxlength="100" type="text" id="email_r" name="email_r" required="required"
                                           value="{{$data['user_detail']->email}}" class="">
                                    @if ($errors->has('email_r'))
                                        <span class="bg-danger error-email">{{ $errors->first('email_r') }}</span>
                                    @endif
                                </div>


                            </div>
                            {{--<div id="step-2" class="">--}}
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

                                    {{--<input maxlength="100" type="text" name="country_id"  required="required"--}}
                                    {{--class="form-control">--}}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">City</label>
                                    <select class="" id="city" name="city">
                                        <option value="1">Lahore</option>
                                    </select>
                                    {{--<input maxlength="100" type="text" id="city" name="city" required="required" class="form-control">--}}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Phone</label>
                                    <input maxlength="100" onkeypress="return isNumber(event)" type="text" name="phone"
                                           value="{{$data['user_detail']->phone}}" required="required" class="">
                                </div>

                            </div>
                            {{--<div id="step-3" class="">--}}
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
                                    <input maxlength="100" type="text" name="name" id="full_name" value="{{$data['user_detail']->name}}"
                                           required="required" class="">
                                </div>
                                <div class="form-group" id="stripe_error" style="color: red;">
                                </div>
                                <div class="form-group pull-right">
                                    <button type="button" class="btn btn-info pull-right" id="sbt_btn">Save</button>
                                    {{--<button type="button" class="btn btn-info pull-right submit_btn" id="sbt_btn">Save</button>--}}
                                    <div id="user_error" style="color: red;"></div>

                                </div>
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
                    success: function (response) {console.log(response);
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
            });
        </script>

        @if($errors->has('register_error'))
            <script>
                popup();
            </script>
        @endif

</div>

