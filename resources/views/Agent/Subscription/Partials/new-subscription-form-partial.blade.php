<form method="post" action="{{route('main-admin.subscriber.create-new-subscription',$data['customer']->id)}}">
    @csrf

    <div class="right-rable-main">
        <div class="new-customer-main">

            {{--<div class="row">--}}
            {{--<span class="customer-details">Customer Details</span>--}}
            {{--<span class="multiple-subscriptions"><i class="fas fa-question-circle"></i> To create multiple subscriptions for an existing customer, open the particular customer's details and use the "Create New Subscription" option.</span>--}}
            {{--</div>--}}
            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id"> Name</label></div>
                <div class="col-12 col-sm-8 col-md-10">

                    <input type="text" name="name" placeholder="" class="new-customer-input" required>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Plan Name</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                        <span class="new-customer-country">
                            <select name="plan_id" required>

                                @foreach($data['plan'] as $plan)
                                    <option value="{{$plan->id}}">{{$plan->name}}</option>
                                @endforeach
                            </select>
                        </span>
                </div>
            </div>


            <div class="row">
                <span class="customer-details" style="margin-top: 30px;">Subscription Details</span>
            </div>

            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Recurring Addons</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                    <a href="#" style="font-size:13px;">Add Addon</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Non recurring addons</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                    <a href="#" style="font-size:13px;">Add Addon</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">PO Number</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                    <input type="text" name="po_number" placeholder="" class="new-customer-input">
                    <a href="#" class="tooltip-tag"><i class="fas fa-question-circle" data-toggle="tooltip"
                                                       data-placement="right"
                                                       data-original-title="Id used to uniquely identify the customer. If not provided, it is auto generated"></i></a>
                </div>
            </div>
            <div class="row">
                <span class="customer-details" style="margin-top: 30px;">Billing</span>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Start Date</label></div>
                <div class="col-12 col-sm-8 col-md-10">

                    <input class="new-customer-input" type="date" name="start_date">
                    <a href="#" class="tooltip-tag"><i class="fas fa-question-circle" data-toggle="tooltip"
                                                       data-placement="right"
                                                       data-original-title="Id used to uniquely identify the customer. If not provided, it is auto generated"></i></a>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">No. of Billing Cycles</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                    <input type="number" name="billing_count_cycles" placeholder="" class="new-customer-input">
                    <a href="#" class="tooltip-tag"><i class="fas fa-question-circle" data-toggle="tooltip"
                                                       data-placement="right"
                                                       data-original-title="Id used to uniquely identify the customer. If not provided, it is auto generated"></i></a>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Auto Collection</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                        <span class="new-customer-country">
                            <select name="auto_collection" required>


                                    <option value="default">Use Customer's default </option>
 <option value="on">Always On</option>
                                 <option value="off">Always Off</option>
                            </select>
                        </span>
                </div>
            </div>

            <br>


            <div class="row">
                <span class="customer-details">Shipping Info</span>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Shipping Info</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                    <label class="">
                        <input checked value="1" name="shipping_to_bill_address" type="checkbox" style="margin-right:5px;" data-toggle="collapse" data-target="#shipping-info">Ship to billing address<span></span>
                    </label>
                </div>
            </div>
            <div id="shipping-info" class="collapse">
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">First Name</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                        <input type="text" placeholder="" name="first_name" class="new-customer-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Last Name</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                        <input type="text" placeholder="" name="last_name" class="new-customer-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Email</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                        <input type="email" placeholder="" name="email"  class="new-customer-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Company</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                        <input type="text" placeholder="" name="company_name"  class="new-customer-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Phone</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                        <input type="text" placeholder="" name="phone"  class="new-customer-input">
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Address</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                        <input type="text" name="address"  placeholder="" class="new-customer-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">City</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                        <input type="text" name="city"  placeholder="" class="new-customer-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Zip/Postal Code</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                        <input type="text" name="zip"  placeholder="" class="new-customer-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Country</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                            <span class="new-customer-country">
                                <select name="country_id">
                                    @foreach($data['countries'] as $country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                </select>
                            </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">State / County /
                            Province</label></div>
                    <div class="col-12 col-sm-8 col-md-10">
                        <input type="text" placeholder="" class="new-customer-input">
                    </div>
                </div>
            </div>
            <div class="row">
                <span class="customer-details" style="margin-top: 30px;">Invoicing options</span>
                <span class="any-charge">If there are any charges, you can either generate an invoice immediately, or add it to <a
                            href="#"> unbilled charges</a> and invoice them later.</span>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id"></label></div>
                <div class="col-12 col-sm-8 col-md-10">
                    <label class="new-customer-label">
                        <input type="radio" value="now" name="invoice_now"  checked>Invoice now
                    </label>
                    <label class="new-customer-label">
                        <input type="radio" value="unbilled" name="invoice_now">Add to unbilled charges
                    </label>
                </div>
            </div>


            <div class="new-customer-btn-main">
                <button type="submit" class="create-cus-btn btn btn-primary">Create Subscription</button>
                <a href="{{route('main-admin.subscriber-detail',[$data['customer']->id])}}">Cancel</a>
            </div>
        </div>
    </div>
</form>