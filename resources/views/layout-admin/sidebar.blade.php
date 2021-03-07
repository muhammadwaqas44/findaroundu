<header class="left-side-bar">
    	<div class="logo-main">
        	<a href="#" class="logo"><img src="{{asset('main-admin/images/logo.png')}}" alt="no img"><span class="menu-hide">Chargebee</span></a>
        </div>
        <a href="#" class="mobile-name">M</a>
        <div class="naigation-refrence">
        <ul class="nav-main">

				<li style="color: #3a008c;font-weight: 600;border-bottom: 1px solid #edeaea;">
					<a href="#">
                    	<span class="nav-icon"><i class="far fa-flag"></i></span>
                        <span class="get-start menu-hide" title="Get Started">KPI Dashboard</span>

                    </a>

				</li>
                <li>
					<a href="#" title="Home">
                    	<span class="nav-icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="get-start menu-hide">Home</span>
                    </a>
				</li>


                <li>
					<a data-toggle="collapse" data-target="#sub-menu" href="#" title="Invoices & Credit Notes">
                    	<span class="nav-icon"><i class="far fa-file"></i></span>
                        <span class="get-start menu-hide">Subscriptions</span>
                        <span class="icon-nav menu-hide"><i class="fas fa-angle-down"></i></span>
                    </a>
                    <ul id="sub-menu" class="collapse sub-menu menu-hide">
                        <li><a href="{{route('admin.all-modules')}}">Modules</a></li>
                        <li><a href="{{route('admin.all-addons')}}">Addons</a></li>
                        <li><a href="{{route('admin.all-plans')}}">Plans</a></li>
                        <li><a href="{{route('admin.all-packages')}}">Packages</a></li>
                        <li><a href="{{route('admin.all-subscription')}}">Subscriptions</a></li>
                        <li><a href="#">Invoices</a></li>
                        <li><a href="#">Reports</a></li>
                    </ul>
				</li>





                <li>
					<a href="{{route('admin.all-users')}}" title="Reports">
                    	<span class="nav-icon"><i class="fas fa-signal"></i></span>
                        <span class="get-start menu-hide">Customer</span>
                    </a>
				</li>

            <li>
                <a data-toggle="collapse" data-target="#sub-menu2" href="#" title="Categories">
                    <span class="nav-icon"><i class="fas fa-signal"></i></span>
                    <span class="get-start menu-hide">Categories</span>
                    <span class="icon-nav menu-hide"><i class="fas fa-angle-down"></i></span>
                </a>
                <ul id="sub-menu2" class="collapse sub-menu menu-hide">
                    <li><a href="{{route('admin.all-categories',["All"])}}">All Categories</a></li>
                    <li><a href="{{route('admin.countriesCategories', ["countryId" => 166])}}">Country Wise Categories</a></li>
                </ul>
            </li>

            <li>
                <a data-toggle="collapse" data-target="#sub-menu3" href="#" title="Cities">
                    <span class="nav-icon"><i class="fas fa-signal"></i></span>
                    <span class="get-start menu-hide">Countries</span>
                    <span class="icon-nav menu-hide"><i class="fas fa-angle-down"></i></span>
                </a>
                <ul id="sub-menu3" class="collapse sub-menu menu-hide">
                    <li><a href="{{route('admin.countriesCities', ["countryId" => 166])}}">Country Wise Cities</a></li>
                </ul>
            </li>

            <li>
                <a href="{{route('admin.services')}}" title="Reports">
                    <span class="nav-icon"><i class="fas fa-signal"></i></span>
                    <span class="get-start menu-hide">Services</span>
                </a>
            </li>
            <li>
                <a href="{{route('admin.all-business')}}" title="Reports">
                    <span class="nav-icon"><i class="fas fa-signal"></i></span>
                    <span class="get-start menu-hide">Business</span>
                </a>
            </li>

                 <li>
					<a href="{{route('admin.adds')}}" title="Reports">
                    	<span class="nav-icon"><i class="fas fa-signal"></i></span>
                        <span class="get-start menu-hide">Adds</span>
                    </a>
				</li>

            <li>

                <a href="{{route('admin.all-agents')}}" title="Reports">
                    <span class="nav-icon"><i class="fas fa-signal"></i></span>
                    <span class="get-start menu-hide">Agents</span>
                </a>
            </li>

            <li>
                <a href="{{route('admin.all-stats')}}" title="Reports">
                    <span class="nav-icon"><i class="fas fa-signal"></i></span>
                    <span class="get-start menu-hide">Stats</span>
                </a>
            </li>
                <li>
					<a  href="{{route('admin.all-settings')}}" title="Settings">
                    	<span class="nav-icon"><i class="fas fa-cog"></i></span>
                        <span class="get-start menu-hide">Settings</span></a>

				</li>

			</ul>
        <div class="bottom-nav-main">
            <ul class="nav-main2">
            	<li class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-expanded="true" title="Need Help?">
                        <span class="nav-icon"><i class="far fa-question-circle"></i></span>
                       	<span class="get-start menu-hide">Need Help?</span>
                        <span class="icon-nav menu-hide"><i class="fas fa-ellipsis-h"></i></span>
                        <ul class="dropdown-menu">
                            <li><a href="#">Help Documentation</a></li>
                            <li><a href="#">API Reference </a></li>
                            <li><a href="#">Knowledge Base/FAQs</a></li>
                            <li><a href="#">Write to us</a></li>
                            <li><a href="#">Request a Callback</a></li>
                        </ul>
                    </a>
            	</li>
            </ul>
        </div>
        </div>
        <span class="toggle-side-bar"></span>
    </header>
