

<footer id="colophon" class="site-footer clearfix">
    <div id="quaternary" class="sidebar-container " role="complementary">
        <div class="sidebar-inner">
            <div class="widget-area clearfix">
                <div id="azh_widget-2" class="widget widget_azh_widget">
                    <div data-section="section">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 foot-logo"> <img src="{{'project-assets/images/foot-logo.png'}}" alt="logo">
                                    <p class="hasimg"> {{$footerSetting['footer_seetings']->left_paragraph}}</p>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <h4>Support & Help</h4>
                                    <ul class="two-columns">
                                        <li> <a href="advertise.html">Advertise us</a> </li>
                                        <li> <a href="about-us.html">About Us</a> </li>
                                        <li> <a href="customer-reviews.html">Review</a> </li>
                                        <li> <a href="how-it-work.html">How it works </a> </li>
                                        <li> <a href="add-listing.html">Add Business</a> </li>
                                        <li> <a href="#!">Register</a> </li>
                                        <li> <a href="#!">Login</a> </li>
                                        <li> <a href="#!">Quick Enquiry</a> </li>
                                        <li> <a href="#!">Ratings </a> </li>
                                        <li> <a href="trendings.html">Top Trends</a> </li>
                                    </ul>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <h4>Popular Services</h4>
                                    <ul class="two-columns">
                                        <li> <a href="#!">Hotels</a> </li>
                                        <li> <a href="#!">Hospitals</a> </li>
                                        <li> <a href="#!">Transportation</a> </li>
                                        <li> <a href="#!">Real Estates </a> </li>
                                        <li> <a href="#!">Automobiles</a> </li>
                                        <li> <a href="#!">Resorts</a> </li>
                                        <li> <a href="#!">Education</a> </li>
                                        <li> <a href="#!">Sports Events</a> </li>
                                        <li> <a href="#!">Web Services </a> </li>
                                        <li> <a href="#!">Skin Care</a> </li>
                                    </ul>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <h4>Cities Covered</h4>
                                    <ul class="two-columns">
                                        <li> <a href="#!">Atlanta</a> </li>
                                        <li> <a href="#!">Austin</a> </li>
                                        <li> <a href="#!">Baltimore</a> </li>
                                        <li> <a href="#!">Boston </a> </li>
                                        <li> <a href="#!">Chicago</a> </li>
                                        <li> <a href="#!">Indianapolis</a> </li>
                                        <li> <a href="#!">Las Vegas</a> </li>
                                        <li> <a href="#!">Los Angeles</a> </li>
                                        <li> <a href="#!">Louisville </a> </li>
                                        <li> <a href="#!">Houston</a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-section="section" class="foot-sec2">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h4>Payment Options</h4>
                                    <p class="hasimg"> <img src="{{'project-assets/images/payment.png'}}" alt="payment"> </p>
                                </div>
                                <div class="col-sm-4">
                                    <h4>Address</h4>
                                    <p> {{$footerSetting['footer_seetings']->address}}</p>
                                    <p> <span class="strong">Phone: </span> <span class="highlighted"> {{$footerSetting['footer_seetings']->phone}}</span> </p>
                                </div>
                                <div class="col-sm-5 foot-social">
                                    <h4>Follow with us</h4>
                                    <p>
                                        {{$footerSetting['footer_seetings']->follow_with_us}}
                                    </p>
                                    <ul>
                                        <li><a href="{{$footerSetting['footer_links']->facebook_url}}"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                        <li><a href="{{$footerSetting['footer_links']->gmail_url}}"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                        <li><a href="{{$footerSetting['footer_links']->twitter_url}}"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                        <li><a href="{{$footerSetting['footer_links']->linkedin_url}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                        <li><a href="{{$footerSetting['footer_links']->youtube_url}}"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                        <li><a href="{{$footerSetting['footer_links']->whats_app}}"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .widget-area -->
        </div>
        <!-- .sidebar-inner -->
    </div>
    <!-- #quaternary -->
</footer>
<!--COPY RIGHTS-->
<section class="copy">
    <div class="container">
        <p>{{$footerSetting['footer_seetings']->copy_right}}</p>
    </div>
</section>
<!--QUOTS POPUP-->
<section>
    <!-- GET QUOTES POPUP -->
    <div class="modal fade dir-pop-com" id="list-quo" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header dir-pop-head">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Get a Quotes</h4>
                    <!--<i class="fa fa-pencil dir-pop-head-icon" aria-hidden="true"></i>-->
                </div>
                <div class="modal-body dir-pop-body">
                    <form method="post" class="form-horizontal">
                        <!--LISTING INFORMATION-->
                        <div class="form-group has-feedback ak-field">
                            <label class="col-md-4 control-label">Full Name *</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="fname" placeholder="" required> </div>
                        </div>
                        <!--LISTING INFORMATION-->
                        <div class="form-group has-feedback ak-field">
                            <label class="col-md-4 control-label">Mobile</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="mobile" placeholder=""> </div>
                        </div>
                        <!--LISTING INFORMATION-->
                        <div class="form-group has-feedback ak-field">
                            <label class="col-md-4 control-label">Email</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" placeholder=""> </div>
                        </div>
                        <!--LISTING INFORMATION-->
                        <div class="form-group has-feedback ak-field">
                            <label class="col-md-4 control-label">Message</label>
                            <div class="col-md-8 get-quo">
                                <textarea class="form-control"></textarea>
                            </div>
                        </div>
                        <!--LISTING INFORMATION-->
                        <div class="form-group has-feedback ak-field">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" value="SUBMIT" class="pop-btn"> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- GET QUOTES Popup END -->
</section>