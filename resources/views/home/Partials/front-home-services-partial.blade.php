<div class="index-sec2">
    <h2 class="general-heading">Find Your Services</h2>
    <p class="general-pera">Explore some of the best Buisness from around the world from our Partners and friends.</p>
    <div class="main_class">
        <div class="row" id="servicePortion">

        </div>
        <span class="register-services-main">
            <a href="@if(!empty(Auth::user())) {{route('user.add-service')}} @else {{route('login',['redirect_flag'=>'service'])}} @endif">
                Register Your Services
            </a>
        </span>
    </div>
</div>