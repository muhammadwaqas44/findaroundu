<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Addon Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['addon_detail']->id}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Addon Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['addon_detail']->name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Invoice Name</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['addon_detail']->invoice_name}}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Charge Type</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['addon_detail']->charge_type}}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Total Price</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['addon_detail']->total_price}}</span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Pricing Model</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['addon_detail']->pricingModel->first()->name}}</span>
                            </div>
                        </div>


                        @if($data['addon_detail']->charge_type == "Recurring")
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Period</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['addon_detail']->period}} {{$data['addon_detail']->period_unit}}</span>
                                </div>
                            </div>



                        @endif
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Description</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['addon_detail']->description}}</span></div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Features</span>
                </div>
                <div class="col-12 col-lg-8">

                    @if($data['addon_detail']->price_model_id == 1)
                        @foreach($data['addon_detail']->addonFeatures as $addonFeature)

                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Feature Name</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$addonFeature->site->name}}</span>
                                </div>
                                <div class="col-6"><span class="customer-id2">Feature Price</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$addonFeature->price}}</span>
                                </div>
                                <div class="col-6"><span class="customer-id2">Feature Quantity</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$addonFeature->quantity}}</span>
                                </div>
                            </div>
                        @endforeach
                    @else

                        @foreach($data['addon_detail']->addonFeatures as $addonFeature)

                            <div class="row" style="padding:10px;    background: #dae0ea;margin-top:10px;">

                                <div class="col-6"><span class="customer-id2">Feature Name</span></div>
                                <div class="col-6">
                                    <span class="custom-right-text2"><label style="font-weight:bold;">{{$addonFeature->site->name}}</label></span>
                                </div>
                                <div class="col-12" style="margin-bottom:10px;border-bottom:1px solid #bac0ca"></div>
                                @foreach($addonFeature->unit as $unit)

                                        <div class="col-6"><span class="customer-id2">Price According to Unit</span></div>
                                        <div class="col-6">
                                            <span class="custom-right-text2">  {{$unit->price}}</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="customer-id2">Feature Quantity</span>
                                        </div>
                                        <div class="col-6">
                                            <span class="custom-right-text2">
                                                @if($loop->index == 0) 1 to {{$unit->qty}}  @else {{$addonFeature->unit[$loop->index-1]->qty+1}} to {{$unit->qty}} @endif </span>
                                        </div>

                                @endforeach
                            </div>
                        @endforeach
                    @endif
                </div>

            </div>


        </div>
        <div class="col-md-12 col-lg-4">
            <div class="col-10">
                <div class="plan-right-main">
                    <h6 style="margin-bottom:15px; ">Actions</h6>
                    <ul class="action-tab-ul">
                        <li>
                            <a href="#" class="create-form-btn">Edit Addon</a>
                            <span class="create-form-content">Edit this Addon</span>
                        </li>
                        <li>
                            <a href="{{route('admin.delete-addon',[$data['addon_detail']->id,'flag'=>'all-addons'])}}" class="create-form-btn">Delete Addon</a>
                            <span class="create-form-content">Delete this Addon</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>.body {
        background-color: #fff !important;
    }</style>