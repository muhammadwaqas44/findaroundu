@extends('layout-user.app')
@section('title','Login')

@section('content')


    @include('layout-user.header')

    <div class="sign-upmain">
        <div class="container">
            <div class="sign-up-mrgn">
                <div class="sign-up-right">
                    <div id="shw-divasa1" class="shw-divsa">
                        <h1 class="login-head">Log In</h1>


                        <ul class="form-radio-ul form-radio-ul2">
                            <li>
                                <div class="custom-control custom-radio">
                                    <label id="chckedd1" class="collection-radio-signupfrm">
                                        <i class="fas fa-envelope"></i>
                                        <input type="radio" name="login_type" value="by_email" checked="checked">
                                        By Email<span></span></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <label id="chckedd2" class="collection-radio-signupfrm collection-radio-signupfrm23">
                                        <i class="fas fa-phone"></i>
                                        <input id="click-maindiv" type="radio" name="login_type" value="by_phone">
                                        By Phone<span></span></label>
                                </div>
                            </li>
                        </ul>


                        <form method="post" action="{{route('login-user')}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="email">
                            <ul id="frst-class-ul" class="sign-up-ul">
                                <li>
                                    <input type="text" name="email" placeholder="Email" class="sign-up-input">
                                </li>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <li>
                                    <input type="text" name="password" placeholder="Password" class="sign-up-input">
                                </li>
                                <li>
                                  <span class="new-lbl-span">
                                      <label class="remember-me-btn">
                                          <input type="checkbox">Remember Me<span></span>
                                      </label>
                                    </span>
                                    <a class="forgot-password" href="#">Forgot Password</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn-signup">Log In With Email</button>
                                </li>
                            </ul>
                        </form>
                        <form method="post" action="{{route('login-user')}}" enctype="multipart/form-data">

                            @csrf
                            <input type="hidden" name="type" value="telephone">
                            <ul id="second-ul" class="sign-up-ul">
                                <li>
                                    <div class="clearfix"></div>
                                    <input type="hidden" name="phoneb" value="">
                                    <input type="tel" class="sign-up-input phone1" name="phone">
                                    <div class="field-notice" rel="phone"></div>
                                </li>
                                <li>
                                    <input type="text" name="password" placeholder="Password" class="sign-up-input">
                                </li>
                                <li>
                                <span class="new-lbl-span">
                                  <label class="remember-me-btn">
                                      <input type="checkbox">Remember Me<span></span>
                                  </label>
                                </span>
                                    <a class="forgot-password" href="#">Forgot Password</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn-signup">Log In With Phone</button>
                                </li>
                            </ul>
                        </form>
                    </div>

                    <div id="shw-divasa2" class="shw-divsa">
                        <h1 class="login-head">Sign Up</h1>
                        <ul class="form-radio-ul form-radio-ul2">
                            <li>
                                <div class="custom-control custom-radio">
                                    <label id="chckedd3" class="collection-radio-signupfrm">
                                        <i class="fas fa-envelope"></i>
                                        <input type="radio" name="same" value="enter_time" checked="checked">
                                        By Email<span></span></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <label id="chckedd4" class="collection-radio-signupfrm collection-radio-signupfrm23">
                                        <i class="fas fa-phone"></i>
                                        <input id="click-maindiv" type="radio" name="same" value="enter_time">
                                        By Phone<span></span></label>
                                </div>
                            </li>
                        </ul>
                        <form action="{{route('register')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="type" value="email">
                            <ul id="third-ul" class="sign-up-ul">
                                <li>
                                    <input type="text" name="name" placeholder="Username" class="sign-up-input">
                                </li>
                                <li>
                                    <input type="text" name="email" placeholder="Email" class="sign-up-input">
                                </li>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <li>
                                    <input type="text" name="password" placeholder="Password" class="sign-up-input">
                                </li>
                                <li>
                                    <span class="new-lbl-span">
                                    <label class="remember-me-btn">
                                              <input type="checkbox">Remember Me<span></span>
                                          </label>
                                        </span>
                                    <a class="forgot-password" href="#">Forgot Password</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn-signup">Sign Up With Email</button>
                                </li>
                            </ul>
                        </form>

                        <form action="{{route('register')}}" method="post" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="type" value="phone">
                            <ul id="fourth-ul" class="sign-up-ul">
                                <li>
                                    <input type="text" name="name" placeholder="Username" class="sign-up-input">
                                </li>
                                <li>
                                    <div class="clearfix"></div>
                                    <input type="hidden" name="phoneb" value="">
                                    <input type="tel" class="sign-up-input phone1" name="phone">
                                    <div class="field-notice" rel="phone"></div>
                                </li>
                                <li>
                                    <input type="text" name="password" placeholder="Password" class="sign-up-input">
                                </li>
                                <li>
                                <span class="new-lbl-span">
                                  <label class="remember-me-btn">
                                      <input type="checkbox">Remember Me<span></span>
                                  </label>
                                </span>
                                    <a class="forgot-password" href="#">Forgot Password</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn-signup">SIgn Up With Phone</button>
                                </li>
                            </ul>
                        </form>
                    </div>

                    {{--    forget password div     --}}
                    <div id="shw-divasa3" class="shw-divsa">
                        <h1 class="login-head">Forgot Password</h1>
                        <ul class="form-radio-ul form-radio-ul2">
                            <li>
                                <div class="custom-control custom-radio">
                                    <label id="chckedd5" class="collection-radio-signupfrm">
                                        <i class="fas fa-envelope"></i>
                                        <input type="radio" name="same3" value="enter_time" checked="checked">
                                        By Email<span></span></label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <label id="chckedd6" class="collection-radio-signupfrm collection-radio-signupfrm23">
                                        <i class="fas fa-phone"></i>
                                        <input id="click-maindiv" type="radio" name="same3" value="enter_time">
                                        By Phone<span></span></label>
                                </div>
                            </li>
                        </ul>
                        <form>
                            <ul id="fifth-ul" class="sign-up-ul">
                                <li>
                                    <input type="text" placeholder="Password" class="sign-up-input">
                                </li>
                                <li>
                                <span class="new-lbl-span">
                                    <label class="remember-me-btn">
                                              <input type="checkbox">Remember Me<span></span>
                                          </label>
                                        </span>
                                    <a class="forgot-password" href="#">Forgot Password</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn-signup">Forgot Password Email</button>
                                </li>
                            </ul>
                            <ul id="sixth-ul" class="sign-up-ul">
                                <li>
                                    <div class="clearfix"></div>
                                    <input type="hidden" name="phoneb" value="">
                                    <input type="tel" class="sign-up-input phone1" name="phone">
                                    <div class="field-notice" rel="phone"></div>
                                </li>
                                <li>
                                    <input type="text" placeholder="Password" class="sign-up-input">
                                </li>
                                <li>
                                <span class="new-lbl-span">
                                  <label class="remember-me-btn">
                                      <input type="checkbox">Remember Me<span></span>
                                  </label>
                                </span>
                                    <a class="forgot-password" href="#">Forgot Password</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn-signup">Forgot Password Phone</button>
                                </li>
                            </ul>
                        </form>
                    </div>

                    <div class="new-btns-divss-q">
                        <a id="create-accountnew" class="create-account" href="#">Create Account</a>
                        <a id="create-accountnew1" class="create-account234" href="#">Another Account</a>
                    </div>

                    <span class="or-signup">OR</span>
                </div>
                <div class="sign-up-left">
                    <h2 class="hello-wrd">Hello..</h2>
                    <p class="acoount-para">Don't have an account? Create your account. It's take less then a
                        minutes</p>
                    <div class="sign-up-social-main">
                        <a class="social-fb" href="#">
                            <span class="fb-span"><i class="fab fa-facebook-f"></i></span>
                            <span class="sign-infb">Sign in with facebook</span>
                        </a>
                        <a class="social-fb social-google" href="#">
                            <span class="fb-span google-spn"><i class="fab fa-google-plus-g"></i></span>
                            <span class="sign-infb">Sign in with facebook</span>
                        </a>
                        <a class="social-fb social-twitter" href="#">
                            <span class="fb-span twiiter-spn"><i class="fab fa-twitter"></i></span>
                            <span class="sign-infb">Sign in with facebook</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="main-assets/js/phonecodes.js"></script>
    <script src="main-assets/js/ddslick.js"></script>
    <script>
        $(document).ready(function(){

            $('#chckedd2').click(function(){
                alert('123');
                $('#frst-class-ul').hide();
                $('#second-ul').show();
            });
            $('#chckedd1').click(function(){
                $('#second-ul').hide();
                $('#frst-class-ul').show();
            });
            $('#chckedd4').click(function(){
                $('#third-ul').hide();
                $('#fourth-ul').show();
            });
            $('#chckedd3').click(function(){
                $('#fourth-ul').hide();
                $('#third-ul').show();
            });
            $('#chckedd6').click(function(){
                $('#fifth-ul').hide();
                $('#sixth-ul').show();
            });
            $('#chckedd5').click(function(){
                $('#sixth-ul').hide();
                $('#fifth-ul').show();
            });

            $(".phone1").phoneInput({
                allowDropdown: false,
                autoHideDialCode: false,
                dropdownContainer: "body",
                excludeCountries: ["am"],
                geoIpLookup: function(callback) {
                    $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                        var countryCode = (resp && resp.country) ? resp.country : "";
                        callback(countryCode);
                    });
                },
                initialCountry: "auto",
                nationalMode: false,
                //numberType: "MOBILE",
                //onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
                preferredCountries: ['az','tr'],
                separateDialCode: true,
                utilsScript: "http://phonecodes.webcoder.az/js/utils.js"
            });
            //country flags
            $('#basic').flagStrap();
            $("#phone").on("countrychange", function(e, countryData) {
                $("input[name='phoneb']").val(countryData.dialCode);
            });

            $("input[name='phoneb']").change(function() {
                $("#phone").phoneInput("setCountry", $(this).val());
            });
            $('#phone').change(function(){
                console.log($("#phone").phoneInput("getNumber"));
            });
            $(function() {

                if($('#phonenumber').length){
                    $('#phonenumber').ddslick({
                        onSelected: function(data){
                            $("input[name='phoneb']").val(data.selectedData.description);

                            console.log(data.selectedData.description);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#create-accountnew').click(function(){
                $('#shw-divasa1').hide();
                $('#shw-divasa2').show();
                $('#shw-divasa3').hide();
            });
            $('#create-accountnew1').click(function(){
                $('#shw-divasa1').show();
                $('#shw-divasa2').hide();
                $('#shw-divasa3').hide();
            });
            $('.forgot-password').click(function(){
                $('#shw-divasa1').hide();
                $('#shw-divasa3').show();
                $('#shw-divasa2').hide();
            });
        });
    </script>


@endsection