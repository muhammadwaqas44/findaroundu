<form method="post" action="{{route('admin.post-add-new-plan')}}">
    @csrf
    <div class="right-rable-main">
        <div class="new-customer-main">
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Name*</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="name" class="new-customer-input" required>
                    <span class="uniquely-identify">A descriptive name for this plan. Please note that this will be displayed to customers, in case "Invoice Name" field is not provided.</span>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Invoice Name</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="invoice_name" class="new-customer-input" required>
                    <span class="uniquely-identify">Name displayed to your customers on the hosted pages, customer portal and invoices.
</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Description</label></div>
                <div class="col-12 col-sm-10">
                    <textarea name="description" class="new-customer-input" style="height: 100px;" required></textarea>
                    <span class="uniquely-identify">Description about the plan to show in the hosted pages & customer portal.</span>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Plan Types</label></div>
                <div class="col-12 col-sm-10">
                        <span class="new-customer-country">
                            <select name="plan_type_id">
                                @foreach($data['planTypes'] as $planType)
                                    <option value="{{$planType->id}}">{{$planType->name}}</option>
                                @endforeach

                            </select>
                        </span>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Add Ons</label></div>
                <div class="col-12 col-sm-10">
                        <span class="new-customer-country">
                            <select name="subscription_addon_id[]" class="form-control" multiple>
                                @foreach($data['add_ons'] as $add_on)
                                    <option value="{{$add_on->id}}">{{$add_on->name}}</option>
                                @endforeach

                            </select>
                        </span>
                </div>
            </div>



            <div class="row">
                <span class="customer-details" style="margin-top: 40px;">Billing Interval</span>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Bill Every*</label></div>
                <div class="col-12 col-sm-10">
                    <input style="margin: 5px; width: auto;" type="text" name="bill_every_count" value="1"
                           class="new-customer-input">
                    <span style="margin: 5px; width: auto;" class="new-customer-country">
                                    <select name="bill_period_unit" required style="min-width:80px;"
                                            onChange="billingInterval(this.value)" id="bill_period_unit">
                                        <option value="">Select</option>
                                        <option value="Month"> Month </option>
                                        <option value="Year">Year </option>
                                        <option value="Week"> Week</option>

                                    </select>
                                </span>
                    <span class="uniquely-identify">Ex: To bill quarterly: $30 every 3 months. To bill monthly: $9 every 1 month.</span>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">No. of Billing Cycles</label></div>
                <div class="col-12 col-sm-10">
                    <input type="number" placeholder="Forever" name="bill_cycle" class="new-customer-input">
                    <span class="uniquely-identify">Default number of billing cycles the subscriptions of this plan should run.</span>
                </div>
            </div>


            <div class="row">
                <span class="customer-details" style="margin-top: 40px;">Plan Features</span>
            </div>
            <div id="feature_section">
                <div class="row" id="new-div-0">
                    <div class="col-12 col-sm-2"><label class="new-customer-id">Feature</label></div>
                    <div class="col-12 col-sm-10">

                        <select class="new-customer-input select_name" name="feature_name[]" required>
                            @foreach($data['sites'] as $site)
                                <option value="{{$site->id}}">
                                    {{$site->name}}
                                </option>
                            @endforeach
                        </select>


                        <span style="margin: 5px; width: auto;">
                        <input style="margin: 5px; width: auto;" placeholder="Quantity" type="number"
                               name="feature_quantity[]" class="new-customer-input" required>
                        </span>

                        <span style="margin: 5px; width: auto;">
                            <select class="new-customer-input feature_duration" name="feature_duration[]" required>
                                <option value="week">Week</option>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                        </span>

                        {{--<span id="add_feature" class="glyphicon glyphicon-plus"></span>--}}
                        <span id="add_feature">Add</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <span class="customer-details" style="margin-top: 40px;">Pricing</span>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Pricing Model</label></div>
                <div class="col-12 col-sm-10">
                        <span class="new-customer-country">
                            <select name="pricing_model_id">
                                @foreach($data['pricing_modal'] as $pricingModal)
                                    <option value="{{$pricingModal->id}}">{{$pricingModal->name}}</option>
                                @endforeach

                            </select>
                        </span>
                    <span class="uniquely-identify">Ex: To bill quarterly: $30 every 3 months. To bill monthly: $9 every 1 month.</span>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Price*</label></div>
                <div class="col-12 col-sm-10">
                    <input type="number" name="price" placeholder="USD" class="new-customer-input">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Setup Cost</label></div>
                <div class="col-12 col-sm-10">
                    <input type="number" name="setup_cost" placeholder="No setup cost" class="new-customer-input">
                    <span class="uniquely-identify">One-time setup fee charged as part of the first invoice.</span>
                </div>
            </div>

            <div class="row">
                <span class="customer-details" style="margin-top: 40px;">Trial</span>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Free Trial</label></div>
                <div class="col-12 col-sm-10">
                    <input style="margin: 5px;" type="number" name="trial_limit_count" placeholder="No trial"
                           class="new-customer-input">
                    <span style="margin: 5px;" class="new-customer-country">
                                    <select name="trial_period_unit">
                                        <option value="Day">Day(s)</option>
                                        <option value="Month"> Month(s) </option>
                                    </select>
                                </span>
                    <span class="uniquely-identify">Specify trial period. Leave it empty if you don't want to provide trial. Note: You can extend the trial period for certain users before it expires.</span>
                </div>
            </div>

            <div class="row">
                <span class="customer-details" style="margin-top: 40px;">Redirects</span>
            </div>


            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Redirect URL</label></div>
                <div class="col-12 col-sm-10">
                    <textarea class="new-customer-input" name="redirect_url" style="height: 100px;"></textarea>
                    <span class="uniquely-identify">The url to redirect on successful checkout. Eg : https://acmeinc.com/success.</span>

                </div>
            </div>


            <div class="row">
                <div class="new-customer-btn-main">
                    <button type="submit" class="create-cus-btn btn btn-primary">Save</button>
                    <a href="#" class="create-cus-btn btn btn-primary">Save & Create New</a>
                    <a href="{{route('admin.all-plans')}}">Cancel</a>
                </div>
            </div>

        </div>
    </div>
</form>
<div style="display: none;" id="add_features_html">
    <div class="row appended_section">
        <div class="col-12 col-sm-2"><label class="new-customer-id">Feature</label></div>
        <div class="col-12 col-sm-10">
            <select class="new-customer-input" name="feature_name[]" required>

            </select>

            <span style="margin: 5px; width: auto;">
                        <input style="margin: 5px; width: auto;" placeholder="Quantity" type="number"
                               name="feature_quantity[]" class="new-customer-input" required>
                                </span>

            <span style="margin: 5px; width: auto;">
                            <select class="new-customer-input" name="feature_duration[]" required>
                                <option value="month">Month</option>
                                <option value="year">Year</option>
                            </select>
                        </span>

        </div>
        <span class="remove_feature">Remove</span>
    </div>

</div>
<script>

    function billingInterval(value) {

        if (value == 'Month') {

            var html = '<option value="week">Week</option>';
            html += '<option value="month">Month</option>';
            $('.feature_duration').html(html);

        }
        else if (value == 'Week') {
            var html = '<option value="week">Week</option>';
            $('.feature_duration').html(html);
        }
        else if (value == 'Year') {
            var html = '<option value="week">Week</option>';
            html += '<option value="month">Month</option>';
            html += '<option value="month">Year</option>';
            $('.feature_duration').html(html);
        }

    }


    window.global_array = new Array();
    window.all_array = [
            @foreach($data['sites'] as $site)

        {
            'id': '{{$site->id}}',
            'name': '{{$site->name}}'
        },

        @endforeach
    ];

    var i = 0;


    $(document).on('click', '#add_feature', function () {

        var length = {{$data['sites']->count()}};

        if ($('#feature_section').children().length == length - 1) {
            $('#add_feature').css('display', 'none');
        }

        var parent_div = $('#new-div-' + i);
        global_array.push(parent_div.find('.select_name').val());

        i++;

        var html = '<div class="row appended_section" id="new-div-' + i + '">';
        html += '<div class="col-12 col-sm-2"><label class="new-customer-id">Feature</label></div>';
        html += '<div class="col-12 col-sm-10">';
        html += '<select class="new-customer-input select_name" name="feature_name[]" required>';
        $.each(all_array, function (key, index) {

            if (jQuery.inArray(index.id, global_array) == -1) {
                html += '<option value="' + index.id + '">' + index.name + '</option> '
            }
        });


        html += '</select>';
        html += '<span style="margin: 5px; width: auto;">';
        html += '<input style="margin: 5px; width: auto;" placeholder="Quantity" type="number"  name="feature_quantity[]" class="new-customer-input" required>';
        html += '</span>';
        html += '<span style="margin: 5px; width: auto;">';
        html += '<select class="new-customer-input feature_duration" name="feature_duration[]" required>';

        if ($("#bill_period_unit").val() == "Year") {
            html += '<option value="week">Week</option>';
            html += '<option value="month">Month</option>';
            html += '<option value="year">Year</option>';
        }
        else if ($("#bill_period_unit").val() == "Month") {
            html += '<option value="week">Week</option>';
            html += '<option value="month">Month</option>';
        }
        else if ($("#bill_period_unit").val() == "Week") {
            html += '<option value="week">Week</option>';
        }

        html += '</select></span>';
        html += '</div><span class="remove_feature">Remove</span></div>';


        $('#feature_section').append(html);
    });

    $(document).on('click', '.remove_feature', function () {
        var parent_div = $('#new-div-' + i);

        var id = $(this).siblings('div').find('.select_name').val();

        $('#add_feature').css('display', 'inline-block');

        global_array = jQuery.grep(global_array, function (value) {
            return value != id;
        });

        $(this).closest('.appended_section').remove();

    });
</script>