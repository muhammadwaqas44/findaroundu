<div class="custom-container">
    <div class="index-sec6">
        <h2 class="general-heading">Buy And Sell Products</h2>
        <p class="general-pera">Explore some of the best Buisness from around the world from our partners and
            friends.</p>
        <div class="index-nav-tab">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#All-Products">Most Viewed Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#Recent-Products">Top Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#Latest-Products">Latest Products</a>
                </li>
                {{-- <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#Featured-Products">Featured Products</a>
                 </li>--}}
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="All-Products" class="tab-pane active">
                    <div class="index-tab-in-main">
                        <div class="row">

                            @foreach($data['top_viewed_adds'] as $topViewedAdd)
                                @component('User.Adds.Partials.front-listing-adds-partial',['add' => $topViewedAdd])
                                @endcomponent
                            @endforeach


                        </div>

                    </div>
                </div>
                <div id="Recent-Products" class="tab-pane fade">
                    <div class="index-tab-in-main">
                        <div class="row">
                            @foreach($data['top_ranked_adds'] as $topRankeddAdd)
                                @component('User.Adds.Partials.front-listing-adds-partial',['add' => $topRankeddAdd])
                                @endcomponent
                            @endforeach
                        </div>

                    </div>
                </div>
                <div id="Latest-Products" class="tab-pane fade">
                    <div class="index-tab-in-main">
                        <div class="row">
                            @foreach($data['top_latest_adds'] as $topLatestAdd)
                                @component('User.Adds.Partials.front-listing-adds-partial',['add' => $topLatestAdd])
                                @endcomponent
                            @endforeach
                        </div>

                    </div>
                </div>
                {{--<div id="Featured-Products" class="tab-pane fade">
                    <div class="index-tab-in-main">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="sell-product">
                                    <div class="sell-img">
                                        <img src="main-assets/images/buy-sell-1.jpg" alt="no img">
                                        <span class="featured-text">Featured</span>
                                        <span class="likes">(121) <i class="far fa-heart"></i></span>
                                    </div>
                                    <span class="price-product">Rs 1486.5% <span>Rs.700</span></span>
                                    <p class="amazing-things-pera">Amazinng thing for sell products and
                                        Details</p>
                                    <div class="product-rate-main">
                                        <div class="second-rate">
                                            <span class="rate-text">Rating:</span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <span class="new-york-p">New York <i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="sell-product">
                                    <div class="sell-img">
                                        <img src="main-assets/images/buy-sell-2.jpg" alt="no img">
                                        <span class="featured-text">Featured</span>
                                        <span class="likes">(121) <i class="far fa-heart"></i></span>
                                    </div>
                                    <span class="price-product">Rs 1486.5% <span>Rs.700</span></span>
                                    <p class="amazing-things-pera">Amazinng thing for sell products and
                                        Details</p>
                                    <div class="product-rate-main">
                                        <div class="second-rate">
                                            <span class="rate-text">Rating:</span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <span class="new-york-p">New York <i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="sell-product">
                                    <div class="sell-img">
                                        <img src="main-assets/images/buy-sell-3.jpg" alt="no img">
                                        <span class="featured-text">Featured</span>
                                        <span class="likes">(121) <i class="far fa-heart"></i></span>
                                    </div>
                                    <span class="price-product">Rs 1486.5% <span>Rs.700</span></span>
                                    <p class="amazing-things-pera">Amazinng thing for sell products and
                                        Details</p>
                                    <div class="product-rate-main">
                                        <div class="second-rate">
                                            <span class="rate-text">Rating:</span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <span class="new-york-p">New York <i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="sell-product">
                                    <div class="sell-img">
                                        <img src="main-assets/images/buy-sell-4.jpg" alt="no img">
                                        <span class="featured-text">Featured</span>
                                        <span class="likes">(121) <i class="far fa-heart"></i></span>
                                    </div>
                                    <span class="price-product">Rs 1486.5% <span>Rs.700</span></span>
                                    <p class="amazing-things-pera">Amazinng thing for sell products and
                                        Details</p>
                                    <div class="product-rate-main">
                                        <div class="second-rate">
                                            <span class="rate-text">Rating:</span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <span class="new-york-p">New York <i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="sell-product">
                                    <div class="sell-img">
                                        <img src="main-assets/images/buy-sell-5.jpg" alt="no img">
                                        <span class="featured-text">Featured</span>
                                        <span class="likes">(121) <i class="far fa-heart"></i></span>
                                    </div>
                                    <span class="price-product">Rs 1486.5% <span>Rs.700</span></span>
                                    <p class="amazing-things-pera">Amazinng thing for sell products and
                                        Details</p>
                                    <div class="product-rate-main">
                                        <div class="second-rate">
                                            <span class="rate-text">Rating:</span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <span class="new-york-p">New York <i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="sell-product">
                                    <div class="sell-img">
                                        <img src="main-assets/images/buy-sell-6.jpg" alt="no img">
                                        <span class="featured-text">Featured</span>
                                        <span class="likes">(121) <i class="far fa-heart"></i></span>
                                    </div>
                                    <span class="price-product">Rs 1486.5% <span>Rs.700</span></span>
                                    <p class="amazing-things-pera">Amazinng thing for sell products and
                                        Details</p>
                                    <div class="product-rate-main">
                                        <div class="second-rate">
                                            <span class="rate-text">Rating:</span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <span class="new-york-p">New York <i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="sell-product">
                                    <div class="sell-img">
                                        <img src="main-assets/images/buy-sell-7.jpg" alt="no img">
                                        <span class="featured-text">Featured</span>
                                        <span class="likes">(121) <i class="far fa-heart"></i></span>
                                    </div>
                                    <span class="price-product">Rs 1486.5% <span>Rs.700</span></span>
                                    <p class="amazing-things-pera">Amazinng thing for sell products and
                                        Details</p>
                                    <div class="product-rate-main">
                                        <div class="second-rate">
                                            <span class="rate-text">Rating:</span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <span class="new-york-p">New York <i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="sell-product">
                                    <div class="sell-img">
                                        <img src="main-assets/images/buy-sell-8.jpg" alt="no img">
                                        <span class="featured-text">Featured</span>
                                        <span class="likes">(121) <i class="far fa-heart"></i></span>
                                    </div>
                                    <span class="price-product">Rs 1486.5% <span>Rs.700</span></span>
                                    <p class="amazing-things-pera">Amazinng thing for sell products and
                                        Details</p>
                                    <div class="product-rate-main">
                                        <div class="second-rate">
                                            <span class="rate-text">Rating:</span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                        </div>
                                        <span class="new-york-p">New York <i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-main-index">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>


    </div>
</div>