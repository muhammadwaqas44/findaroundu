<!DOCTYPE html>
<html lang="en">
<head>

    <title>Plan Packages</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="s
    tylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{asset('project-assets/packages/css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('MainSite/Assets/packages/css/front.css')}}">
@include('layout-admin.css')
</head>

<body>
<div class="inner-pages-wrapper22">
    <div class="container">
        <h1 class="pricing-page-heading">Find the perfect plan for <br>your business</h1>
        <div class="pricing-page-table">

            @foreach($data['packages'] as $package)
                <div class="row">
                    <div class="col-md-4">
                        <div class="standard-div">
                            <div class="standard-icon-div bg-green clr-white">
                                <i class="fas fa-shopping-bag"></i>
                                <span>{{ $package->plan->name }}</span>
                            </div>
                            {{--<div>--}}
                            @foreach($package->plan->planFeatures as $planFeatures)
                                {{ $planFeatures->quantity .' '. $planFeatures->name }}<br>
                            @endforeach
                            {{--</div>--}}
                            <p>{{ $package->plan->description }}</p>
                            <span class="mails-15">{{ $package->plan->pricingModel->first()->pivot->price }}
                                InMails</span>
                            <span class="months-spn">${{ $package->plan->pricingModel->first()->pivot->price }}
                                / {{ $package->plan->bill_period_unit }}</span>
                            <a href="#" data-toggle="modal" data-target="#signup-popup" class="select-plan-btn"
                               package-id="{{ $package->id }}">Select Plan</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v2/"></script>
<script>
    $(document).ready(function () {

        $(document).on('click', '.select-plan-btn', function () {
            var packageId = $(this).attr("package-id");
            $('#package_id').val(packageId);
        });

        $('#sbt_btn').click(function () {

            let email = $('#email_r').val();
            let companyName = $('#company_name_r').val();
            let rootUrl = window.location.origin;
            let userExist = 0;
            let password = $('#password').val();
            let confirmPassword = $('#confirm_password').val();
            let passwordValidation = 1;

            if(password != confirmPassword){
                passwordValidation = 0;
            }

            if(passwordValidation){
                $('#user_error').text('');

                $.ajax({
                    type: "GET",
                    url: rootUrl + '/check-user/' + email + '/' + companyName,
                    success: function (response) {
                        if (response == 1) {
                            userExist = 1;
                            $('#user_error').text('User Already Exist');
                        } else {
                                    {{--var stripe = Stripe({{ config('services.stripe.key')  }});--}}
                                    {{--Stripe.setPublishableKey({{ config('services.stripe.key')  }});--}}
                            var stripe = Stripe('pk_test_TCRoAW9MC7l5qWCRSgFgM1Lw');
                            Stripe.setPublishableKey('pk_test_TCRoAW9MC7l5qWCRSgFgM1Lw');

                            Stripe.card.createToken({
                                number:$('#card_number').val(),
                                cvc:$('#cvc').val(),
                                // exp_month:$('#exp_month').val(),
                                exp:$('#exp').val(),
                                name:$('#full_name').val()
                            },  stripeResponseHandler);

                            function stripeResponseHandler(status,response) {
                                if (response.error) {
                                    $('#stripe_error').text(response.error.message);
                                    return false;
                                }
                                else{
                                    var token = response.id;
                                    $('#stripe_error').text("");
                                    $('#stripe_token').val(token);
                                    $('#signupForm').submit();

                                }
                            }
                        }
                    }
                });
            }else{
                $('#user_error').text('Password and conform password does not match');
            }

        });
    });
</script>
</body>

</html>