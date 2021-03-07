<form method="post" action="{{route('admin.post-edit-addons')}}">
    @csrf
    <div class="right-rable-main">
        <div class="new-customer-main">
           <input type="hidden" name="addon_id" value="{{$data['addon_detail']->id}}">

            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Name*</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="name" value="{{$data['addon_detail']->name}}" class="new-customer-input" required>
                    <span class="uniquely-identify">A descriptive name for this addon. Please note that this will be displayed to customers, in case "Invoice Name" field is not provided.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Invoice Name*</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="invoice_name"  value="{{$data['addon_detail']->invoice_name}}" class="new-customer-input" required>
                    <span class="uniquely-identify">Name displayed to your customers on the hosted pages, customer portal and invoices.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Description</label></div>
                <div class="col-12 col-sm-10">
                    <textarea type="text" name="description" class="new-customer-input">{{$data['addon_detail']->description}}</textarea>
                    <span class="uniquely-identify">Description about the addon to show in the hosted pages & customer portal.</span>
                </div>
            </div>


            {{--<div class="row">--}}
                {{--<span class="customer-details" style="margin-top: 40px;">Pricing</span>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
                {{--<div class="col-12 col-sm-2"><label class="new-customer-id">Pricing Model*</label></div>--}}
                {{--<div class="col-12 col-sm-10">--}}
                        {{--<span class="new-customer-country">--}}
                            {{--<select name="pricing_model_id" @if($data['subscription']->count() != 0) disabled @endif>--}}
                                {{--@foreach($data['pricing_models'] as $pricing_model)--}}
                                    {{--<option value="{{$pricing_model->id}}">{{$pricing_model->name}}</option>--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                        {{--</span>--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 col-sm-2"><label class="new-customer-id">Price*</label></div>--}}
                {{--<div class="col-12 col-sm-10">--}}
                    {{--<input type="number" name="price" value="{{$data['addon_detail']->pricingModel->first()->pivot->price}}"class="new-customer-input" required @if($data['subscription']->count() != 0) disabled @endif>--}}

                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="row">--}}
                {{--<span class="customer-details">Type</span>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 col-sm-2"><label class="new-customer-id">Charge Type*</label></div>--}}
                {{--<div class="col-12 col-sm-10">--}}
                        {{--<span class="new-customer-country">--}}
                            {{--<select name="charge_type" onchange="chargeType(this.value)" @if($data['subscription']->count() != 0) disabled @endif>--}}
                                                                    {{--<option value="recurring">Recurring</option>--}}
{{--<option value="one time payment">One Time Payment</option>--}}
                            {{--</select>--}}
                        {{--</span>--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-12 col-sm-2"><label class="new-customer-id">Addon Type*</label></div>--}}
                {{--<div class="col-12 col-sm-10">--}}
                        {{--<span class="new-customer-country">--}}
                            {{--<select name="addon_type_id" onchange="chargeType(this.value)" @if($data['subscription']->count() != 0) disabled @endif>--}}
                                {{--@foreach($data['addon_types'] as $addon_type)--}}
                                    {{--<option value="{{$addon_type->id}}">{{$addon_type->name}}</option>--}}
                                    {{--@endforeach--}}


                            {{--</select>--}}
                        {{--</span>--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row" id="reaccuring">--}}
                {{--<div class="col-12 col-sm-2"><label class="new-customer-id">Period*</label></div>--}}
                {{--<div class="col-12 col-sm-10">--}}
                    {{--<input style="margin: 5px; width: 15%;margin-left: 0px;" type="text" name="period"--}}
                           {{--value="{{$data['addon_detail']->period}}" class="new-customer-input">--}}
                    {{--<span style="margin: 5px;width: 15.5%;margin-left: 0px;" class="new-customer-country" >--}}
                                    {{--<select name="period_unit" required="" style="min-width:80px;" @if($data['subscription']->count() != 0) disabled @endif>--}}

                                        {{--<option value="Month" selected=""> Month </option>--}}
                                        {{--<option value="Year">Year </option>--}}
                                        {{--<option value="Week"> Week</option>--}}

                                    {{--</select>--}}
                                {{--</span>--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="new-customer-btn-main">--}}
                <button type="submit"
                        class="create-cus-btn btn btn-primary">Edit Addon
                </button>
{{--                <a href="{{route('user.subscriber.all-addons')}}">Cancel</a>--}}
            </div>
        </div>
    </div>
</form>

<script>
    function chargeType(value){
        if(value == 'one time payment'){
            document.getElementById('reaccuring').innerHTML = "";
        }else{
            document.getElementById('reaccuring').innerHTML = ` <div class="col-12 col-sm-2"><label class="new-customer-id">Period*</label></div>
                <div class="col-12 col-sm-10">
                    <input style="margin: 5px; width: 15%;margin-left: 0px;" type="text" name="bill_every_count"
                           value="1" class="new-customer-input">
                    <span style="margin: 5px;width: 15.5%;margin-left: 0px;" class="new-customer-country">
                                    <select name="bill_period_unit" required="" style="min-width:80px;">

                                        <option value="Month" selected=""> Month </option>
                                        <option value="Year">Year </option>
                                        <option value="Week"> Week</option>

                                    </select>
                                </span>

                </div>`;
        }
    }
</script>

