<!-- Modal -->
<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login Modal</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('login-user')}}" enctype="multipart/form-data">
                    @csrf
                    <ul id="frst-ul" class="sign-up-ul">
                        @if(!empty($data['flag']))
                            <li>
                                <input type="hidden" name="redirect_flag" value="{{$data['flag']}}">
                            </li>
                        @endif
                        <li>
                            <input type="text" placeholder="Email Or Phone" name="email" class="sign-up-input">
                        </li>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                        <li>
                            <input type="password" placeholder="Password" name="password" class="sign-up-input">
                        </li>
                        <li>
                            <label class="remember-me-btn">
                                <input type="checkbox">Remember Me<span></span>
                            </label>
                        </li>
                        <li>
                            <button type="submit" class="btn-signup">Log In</button>
                        </li>
                        <li style="margin-bottom:0px;">
                            <a class="create-account" href="#">Create Account</a>
                        </li>

                        <li>
                            <a style="    float: left;
    font-family: 'OpenSans';
    font-size: 12px;
    color: #fe015b;" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        </li>

                    </ul>


                    </a>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>