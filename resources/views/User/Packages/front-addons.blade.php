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
                    <span class="add-listing-heading">ADDONS Listing</span>
                    <span class="get-more-exposure">Get more exposure</span>
                    <div class="row">
                        @foreach($data['addons'] as $addon)

                            <div class="col-lg-3 col-sm-12">
                                <div class="pkg-listing-main">
                                    <span class="pkg-name">
                                    <a data-toggle="modal" data-target="#addon-popup-{{$addon->id}}"
                                       href="addon-popup-{{$addon->id}}">    {{$addon->name}}</a>
                                        @php
                                            $addonId = $addon->id;
                                        @endphp



                                        @if(Auth::user()->subscriptions()->where('active','active')->whereNull('cancelled_at')->count() != 0 )
                                            @if(Auth::user()->subscriptions()->where('active','active')->whereNull('cancelled_at')->first()->whereHas('addons',function($query) use ($addonId){$query->where('subscription_addon_id',$addonId);})->get()->count() > 0)
                                                <small>Current</small>
                                            @endif
                                        @endif

                                    </span>
                                    <span class="pkg-price">${{$addon->total_price}}</span>
                                    <span class="stndard-pkg">
                                    {{$addon->description}}
                                    </span>
                                    <ul class="pkg-listing-ul">
                                        <li>{{$addon->pricingModel->first()->name}}</li>

                                    </ul>

                                    @if(Auth::user()->subscriptions()->where('active','active')->whereNull('cancelled_at')->count() != 0 )
                                        @if(Auth::user()->subscriptions()->where('active','active')->whereNull('cancelled_at')->first()->whereHas('addons',function($query) use ($addonId){$query->where('subscription_addon_id',$addonId);})->get()->count() == 0)
                                            <a  addon-id="{{$addon->id}}" onclick="popup()" data-toggle="modal" href="#"
                                                data-target="#signup-popup-{{$addon->id}}"    class="start-now-btn on-apply">Apply </a>
                                        @endif
                                    @endif


                                </div>

                            </div>
                            @component('popups.addon-detail',['addonFeature'=>$addon])
                            @endcomponent

                            @component('popups.select-addon-details',['addonFeature'=>$addon, 'data'=>$data])
                            @endcomponent


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



    <script>
        $(document).ready(function () {

            $(document).on('click', '.on-apply', function () {
                var packageId = $(this).attr("addon-id");
                $('#addon_id').val(packageId);

            });

//            $('#sbt_btn').click(function () {
//
//                let email = $('#email_r').val();
//
//                let rootUrl = window.location.origin;
//                let userExist = 0;
//
//
//                $('#user_error').text('');
//
//                var stripe = Stripe('pk_test_TCRoAW9MC7l5qWCRSgFgM1Lw');
//                Stripe.setPublishableKey('pk_test_TCRoAW9MC7l5qWCRSgFgM1Lw');
//
//                Stripe.card.createToken({
//                    number: $('#card_number').val(),
//                    cvc: $('#cvc').val(),
//                    // exp_month:$('#exp_month').val(),
//                    exp: $('#exp').val(),
//                    name: $('#full_name').val()
//                }, stripeResponseHandler);
//
//                function stripeResponseHandler(status, response) {
//                    if (response.error) {
//                        $('#stripe_error').text(response.error.message);
//                        return false;
//                    }
//                    else {
//                        var token = response.id;
//                        $('#stripe_error').text("");
//                        $('#stripe_token').val(token);
//                        $('#signupForm').submit();
//
//                    }
//                }
//
//
//            });
        });
    </script>

    <script src="{{asset('main-assets/js/smartwizard.min.js')}}"></script>
    <!-- Include jQuery Validator plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>

    <script src="https://js.stripe.com/v2/"></script>

    <script>

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

//                console.log($('#addon_id').val($(this).attr('addon-id')));
                $('#signup-popup').modal('show');

            }

            //   popup();
        });

        function add_on_popup(id) {

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




@endsection