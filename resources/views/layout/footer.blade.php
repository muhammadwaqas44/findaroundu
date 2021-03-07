<footer class="footer-containrer">
    <div class="custom-container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-12">
                <a href="#" class="footer-logo"><img src="{{asset('main-assets/images/logo.png')}}" alt="no img"></a>
                {{--<span class="local-business">Worlds's No. 1 Local Business  Directory Website. Directory Website</span>--}}
                <span class="established-text">{{$footerSetting['footer_seetings']->left_paragraph}}</span>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-12">
                <span class="footer-heading">Support & Help</span>
                <ul class="footer-link-ul">
                    <li><a href="#">Advertise us</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Review</a></li>
                    <li><a href="#">Quick Enquiry</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Rating</a></li>
                    <li><a href="#">Add Business</a></li>
                    <li><a href="#">Top trends</a></li>
                    <li><a href="#">Advertise us</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">About us</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-12">
                <span class="footer-heading">Popular Services</span>
                <ul class="footer-link-ul">
                    <li><a href="#">Advertise us</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Review</a></li>
                    <li><a href="#">Quick Enquiry</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Rating</a></li>
                    <li><a href="#">Add Business</a></li>
                    <li><a href="#">Top trends</a></li>
                    <li><a href="#">Advertise us</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">About us</a></li>
                </ul>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-12">
                <span class="footer-heading">Cities Covered</span>
                <ul class="footer-link-ul">
                    <li><a href="#">Advertise us</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Review</a></li>
                    <li><a href="#">Quick Enquiry</a></li>
                    <li><a href="#">How It Works</a></li>
                    <li><a href="#">Rating</a></li>
                    <li><a href="#">Add Business</a></li>
                    <li><a href="#">Top trends</a></li>
                    <li><a href="#">Advertise us</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">About us</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <span class="footer-heading">Payment Options</span>
                <span class="payment-get-way"><img src="{{asset('main-assets/images/payment.PNG')}}" alt="noimg"></span>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <span class="footer-heading">Address</span>
                <span class="address-text"> {{$footerSetting['footer_seetings']->address}}
                    <p> <span class="strong">Phone: </span> <span class="highlighted"> {{$footerSetting['footer_seetings']->phone}}</span> </p>
                                </span>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <span class="footer-heading">Follow with us</span>
                <span class="address-text"> {{$footerSetting['footer_seetings']->follow_with_us}}</span>
                <ul class="footer-social-media">
                    <li><a href="{{$footerSetting['footer_links']->facebook_url}}"><i class="fab fa-facebook" aria-hidden="true"></i></a> </li>
                    <li><a href="{{$footerSetting['footer_links']->gmail_url}}"><i class="fab fa-google-plus" aria-hidden="true"></i></a> </li>
                    <li><a href="{{$footerSetting['footer_links']->twitter_url}}"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
                    <li><a href="{{$footerSetting['footer_links']->linkedin_url}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a> </li>
                    <li><a href="{{$footerSetting['footer_links']->youtube_url}}"><i class="fab fa-youtube" aria-hidden="true"></i></a> </li>
                    <li><a href="{{$footerSetting['footer_links']->whats_app}}"><i class="fab fa-whatsapp" aria-hidden="true"></i></a> </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="copy-right-text-main">
        <div class="custom-container">
            <span class="copy-right-text">copyrights © 2017 RN53Themes.net.   All rights reserved.</span>
        </div>
    </div>
</footer>