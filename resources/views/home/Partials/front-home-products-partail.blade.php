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
                 <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#Featured-Products">Featured Products</a>
                 </li>
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
            </div>
        </div>


    </div>
</div>
