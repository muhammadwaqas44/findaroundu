@extends('layout-user.app')
@section('user-portal-heading','My Dashboard')
@section('content')


    @include('layout-user.user-portal-heading')

    <div class="body-container">
        @include('layout-user.header')
        <div class="dashboard-main">
            @include('layout-user.sidebar')
            <div class="dashboard-right-main">


                        <div class="col-md-12" style="padding:0px;">
                            <div class="card" style="border:0px;">
                                <div class="card-header" style="background:white;">{{ __('Verify Your Email Address') }}</div>

                                <div class="card-body">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            {{ __('A fresh verification link has been sent to your email address.') }}
                                        </div>
                                    @endif
<br>
                                    {{ __('Before proceeding, please check your email for a verification link...') }}
                                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.<br>
                                </div>
                            </div>
                        </div>


            </div>
        </div>

    </div>



@endsection

{{--
--}}
