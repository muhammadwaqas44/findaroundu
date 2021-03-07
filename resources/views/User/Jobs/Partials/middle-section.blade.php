<div class="col-md-8">
    <div class="product-main-sec">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#Products">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#Supplies">Supplies</a>
            </li>

        </ul>

        <!-- Tab panes -->
        <div class="tab-content">


            <div id="Products" class="tab-pane active show">
                <div class="products-tab-main">
                    <div class="sec1-product-type">
                        <h1 style="margin-top: 20px;">coming soon</h1>
                    </div>
                    <div class="sec2-view-product">
                        <div class="row">
                            <div class="col-md-5 col-sm-12">
                                <span class="view-p-list">View <strong>{{sizeof($data['all_jobs']['all_jobs'])}}</strong> Product(s)</span>
                            </div>

                            <div class="col-md-7 col-sm-12">
                                <div class="sort-by-main">
                                    <span class="sort-by-text">Sort By : </span>
                                    <span class="sort-by-drop-down">
								 							<select>
								 								<option>Best Match</option>
								 								<option>Best Match</option>
								 								<option>Best Match</option>
								 								<option>Best Match</option>
								 							</select>
								 						</span>
                                    <a href="#" class="list-grid-icon"><i class="fas fa-list"></i></a>
                                    <a href="#" class="list-grid-icon"><i class="fas fa-th-large"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div id="add-data">

                    </div>


                </div>
            </div>
            <div id="Supplies" class="tab-pane fade">
                <div class="sec1-product-type">
                    <h1>coming soon</h1>
                </div>
            </div>
        </div>




    </div>
</div>


@include('User.Jobs.Partials.map-popup')