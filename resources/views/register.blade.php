@extends('layout.app')
@section('title','Login')

@section('content')

    <section class="tz-register">
        <div class="log-in-pop">
            <div class="log-in-pop-left">
                <h1>Hello... <span></span></h1>
                <p>Don't have an account? Create your account. It's take less then a minutes</p>
                <h4>Login with social media</h4>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                    </li>
                    <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                    </li>
                    <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                    </li>
                </ul>
            </div>
            <div class="log-in-pop-right">
                <a href="#" class="pop-close" data-dismiss="modal"><img src="images/cancel.html" alt="" />
                </a>
                <h4>Login</h4>
                <p>Don't have an account? Create your account. It's take less then a minutes</p>
                <form class="s12 ng-pristine ng-valid" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <div class="input-field s12">
                            <input type="text" data-ng-model="name1"  name="name" class="validate ng-pristine ng-valid ng-empty ng-touched">
                            <label class="">Name</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s12">
                            <input type="text" data-ng-model="name1" name="phone" class="validate ng-pristine ng-valid ng-empty ng-touched">
                            <label class="">Phone</label>
                        </div>
                    </div>

                    <div>
                        <div class="input-field s12">
                            <input type="email" class="validate" name="email">
                            <label>Email</label>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <div>
                        <div class="input-field s12">
                            <input type="password" name="password" class="validate">
                            <label class="">Password</label>
                        </div>
                    </div>
                    <div>
                        <div class="input-field s12">
                            <input type="password" name="password_confirmation" class="validate">
                            <label>Confirm password</label>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                    <div>
                        <div class="input-field s4">
                            <i class="waves-effect waves-light log-in-btn waves-input-wrapper" style=""><input type="submit" value="Register" class="waves-button-input"></i> </div>
                    </div>
                    <div>
                        <div class="input-field s12" style="    font-size: 15px;"> Are you a already member ? <a href="{{route('login')}}">Login</a> </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="web-app com-padd">
        <div class="container">
            <div class="row">
                <div class="col-md-6 web-app-img"> <img src="{{'project-assets/images/mobile.png'}}" alt="" /> </div>
                <div class="col-md-6 web-app-con">
                    <h2>Looking for the Best Service Provider? <span>Get the App!</span></h2>
                    <ul>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Find nearby listings</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Easy service enquiry</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Listing reviews and ratings</li>
                        <li><i class="fa fa-check" aria-hidden="true"></i> Manage your listing, enquiry and reviews</li>
                    </ul> <span>We'll send you a link, open it on your phone to download the app</span>
                    <form>
                        <ul>
                            <li>
                                <input type="text" placeholder="+01" /> </li>
                            <li>
                                <input type="number" placeholder="Enter mobile number" /> </li>
                            <li>
                                <input type="submit" value="Get App Link" /> </li>
                        </ul>
                    </form>
                    <a href="#"><img src="images/android.png" alt="" /> </a>
                    <a href="#"><img src="images/apple.png" alt="" /> </a>
                </div>
            </div>
        </div>
    </section>

@endsection