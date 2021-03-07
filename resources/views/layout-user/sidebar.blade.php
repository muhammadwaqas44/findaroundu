<div class="fix-header3">
    <ul class="menu3-account-ul">
        <li><a href="{{route('user.dashboard')}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">Dashboard</span>
            </a>
            <div class="fix-menu3-sub-menu">
                <ul class="inner-ul">
                    <li>
                        <ul>
                           <li><a href="{{route('user.dashboard')}}"><i class="fas fa-user"></i> Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Search For</li>
                            <li><a href="#">Top Selected Suppliers</a></li>
                            <li><a href="#">Suppliers by Regions</a></li>
                            <li><a href="#">Top Selected Suppliers</a></li>
                            <li><a href="#">Suppliers by Regions</a></li>
                            <li><a href="#">Top Selected Suppliers</a></li>
                            <li><a href="#">Suppliers by Regions</a></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li>Search For</li>
                            <li><a href="#">Top Selected Suppliers</a></li>
                            <li><a href="#">Suppliers by Regions</a></li>
                            <li><a href="#">Top Selected Suppliers</a></li>
                            <li><a href="#">Suppliers by Regions</a></li>
                            <li><a href="#">Top Selected Suppliers</a></li>
                            <li><a href="#">Suppliers by Regions</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </li>
        @if(Auth::check())
        <li><a href="{{route('user.profile',["userId" => Auth::user()->id])}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">User Profile</span>
            </a></li>
        @endif
        <li><a href="{{route('user.front-adds')}}">
                <span class="menu3-icon"><i class="fas fa-user-md"></i></span>
                <span class="Learning-text">Ads</span>
            </a></li>

        <li><a href="{{route('user.business')}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">Business</span>
            </a></li>

        <li><a href="{{route('user.front-services')}}">
                <span class="menu3-icon"><i class="fas fa-cog"></i></span>
                <span class="Learning-text">Services</span>
            </a></li>
        <li><a href="{{route('user.front-packages')}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">Packages</span>
            </a></li>

        <li><a href="{{route('user.front-addons')}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">Ad-Ons</span>
            </a></li>

        <li><a href="{{route('user.front-message')}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">Chat</span>
            </a></li>

        <li><a href="{{route('jobs')}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">Job Listing</span>
            </a></li>

        <li><a href="{{route('user.all-products')}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">Products</span>
            </a></li>

        <li><a href="{{route('product-listing')}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">Products Listing</span>
            </a></li>

        <li><a href="{{route('logout')}}">
                <span class="menu3-icon"><i class="fas fa-chalkboard-teacher"></i></span>
                <span class="Learning-text">Logout</span>
            </a></li>

    </ul>
</div>



