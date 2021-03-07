<form method="post" action="{{route('admin.add-addon')}}">
    @csrf
    <div class="right-rable-main">
        <div class="new-customer-main">


            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Name*</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="name" class="new-customer-input" required>
                    <span class="uniquely-identify">A descriptive name for this addon. Please note that this will be displayed to customers, in case "Invoice Name" field is not provided.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Invoice Name*</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="invoice_name" class="new-customer-input" required>
                    <span class="uniquely-identify">Name displayed to your customers on the hosted pages, customer portal and invoices.</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Description</label></div>
                <div class="col-12 col-sm-10">
                    <textarea type="text" name="description" class="new-customer-input"></textarea>
                    <span class="uniquely-identify">Description about the addon to show in the hosted pages & customer portal.</span>
                </div>
            </div>

            <div class="row">
                <span class="customer-details">Type</span>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Charge Type*</label></div>
                <div class="col-12 col-sm-10">
                        <span class="new-customer-country">
                            <select name="charge_type" onchange="chargeType(this.value)">
                                                                    <option value="recurring">Recurring</option>
<option value="one time payment">One Time Payment</option>
                            </select>
                        </span>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Addon Type*</label></div>
                <div class="col-12 col-sm-10">
                        <span class="new-customer-country">
                            <select name="addon_type_id" onchange="chargeType(this.value)">
                                @foreach($data['addon_types'] as $addon_type)
                                    <option value="{{$addon_type->id}}">{{$addon_type->name}}</option>
                                @endforeach


                            </select>
                        </span>

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Bill Every*</label></div>
                <div class="col-12 col-sm-10">
                    <input style="margin: 5px; width: auto;" type="text" name="bill_every_count" value="1"
                           class="new-customer-input">
                    <span style="margin: 5px; width: auto;" class="new-customer-country">
                                    <select name="bill_period_unit" required style="min-width:80px;"
                                            id="bill_period_unit">
                                        <option value="">Select</option>
                                        <option value="Month"> Month </option>
                                        <option value="Year">Year </option>
                                        <option value="Week"> Week</option>

                                    </select>
                                </span>
                    <span class="uniquely-identify">Ex: To bill quarterly: $30 every 3 months. To bill monthly: $9 every 1 month.</span>
                </div>
            </div>
            {{-- <div class="row" id="reaccuring">
                 <div class="col-12 col-sm-2"><label class="new-customer-id">Period*</label></div>
                 <div class="col-12 col-sm-10">
                     <input style="margin: 5px; width: 15%;margin-left: 0px;" type="text" name="period"
                            value="1" class="new-customer-input">
                     <span style="margin: 5px;width: 15.5%;margin-left: 0px;" class="new-customer-country">
                                     <select name="period_unit" required="" style="min-width:80px;">

                                         <option value="Month" selected=""> Month </option>
                                         <option value="Year">Year </option>
                                         <option value="Week"> Week</option>

                                     </select>
                                 </span>

                 </div>
             </div>--}}

            <div class="row">
                <span class="customer-details" style="margin-top: 40px;">Pricing</span>
            </div>

            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Pricing Model*</label></div>
                <div class="col-12 col-sm-10">
                        <span class="new-customer-country">
                            <select name="pricing_model_id" onchange="updatePricingModel(this)">
                                @foreach($data['pricing_models'] as $pricing_model)
                                    <option value="{{$pricing_model->id}}">{{$pricing_model->name}}</option>
                                @endforeach
                            </select>
                        </span>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Total Price*</label></div>
                <div class="col-12 col-sm-10">
                    <input type="number" id="price_show_label" name="total_price"readonly class="new-customer-input" value="0" required>

                </div>
            </div>

            <div class="row">
                <span class="customer-details" style="margin-top: 40px;">Addon Features</span>
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
                        <input style="margin: 5px; width: auto;" placeholder="Price" type="number"
                               name="price[]" onkeyup="updatePrice()" class="new-customer-input price" required>
                        </span>

                        {{--<span id="add_feature" class="glyphicon glyphicon-plus"></span>--}}
                        <span id="add_feature">Add</span>
                    </div>
                </div>
            </div>


            <div class="new-customer-btn-main">
                <button type="submit"
                        class="create-cus-btn btn btn-primary">Create Addon
                </button>
                <a>Cancel</a>
            </div>
        </div>
    </div>
</form>

<script>
    addonFeatures = "";


    flatFee = `<div class="row " id="new-div-0">
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
                            <input style="margin: 5px; width: auto;" placeholder="Quantity" type="number"              name="feature_quantity[]"  class="new-customer-input" required>
                        </span>

                        <span style="margin: 5px; width: auto;">
                            <input style="margin: 5px; width: auto;" placeholder="Price" type="number"              name="price[]" onkeyup="updatePrice()" class="new-customer-input" required>
                        </span>



                        <span id="add_feature">Add</span>
                    </div>
                </div>`;


    unitPrice = `<div class="row" id="new-div-0">
                    <div class="col-12 col-sm-2">
                        <label class="new-customer-id">Feature</label>
                    </div>
                    <div class="col-12 col-sm-10">
                        <div style="margin: 5px; width: auto;">
                            <select style="    margin-top: 5px;width: 20%" class="new-customer-input select_name" name="feature_name[]" required>
                            @foreach($data['sites'] as $site)
                                <option value="{{$site->id}}">
                                    {{$site->name}}
                                </option>
                            @endforeach
                            </select>
                        </div>

                        <div style="margin: 5px; width: auto;">
                            <input style="margin: 5px; width: 20%" placeholder="Quantity" type="number"             name="feature_quantity[]" class="new-customer-input" required>
                        </div>

                    <div id="add_feature">Add</div>
                </div>


                <div id="units" class="col-12 col-sm-12">
                    <div class="row first-row">
                        <div class="col-3 col-sm-2 span-unit-js" style="display:inline-block;text-align:right;">
                            <label class="new-customer-id ">Units 1</label>
                        </div>

                        <div class="col-11 col-sm-2 checking"style="display:inline-block;padding:0px;">
                            <div style="margin: 5px; width: auto;">
                                <input onkeyup="updateUnit(this)" onfocusout="disableOnFocusOut(this)" style="margin: 5px;width: 100%" placeholder="& above" type="number"name="unit[{{$data['sites'][0]->name}}][]" onkeyup="updatePrice()" class="new-customer-input" required>
                            </div>
                        </div>

                        <div class="col-11 col-sm-2"style="display:inline-block;padding:0px;">
                            <div style="margin: 5px; width: auto;">
                                <input style="margin: 5px;width: 100%" placeholder="Per Unit Price" type="number"            name="price[{{$data['sites'][0]->name}}][]" onkeyup="updatePrice()" class="new-customer-input price" required>
                            </div>
                        </div>

                        <div class="col-11 col-sm-2 add"style="display:inline-block;padding:0px;">
                            <div style="margin: 5px; width: auto;padding-top: 8px;">
                                <button disabled type="button" class="new-customer-input " onclick="addUnit(this,'{{$data['sites'][0]->name}}')">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>`;

    pricingFlag = false;
    unitToFlag = false;

    function rowHtml(value) {
        if (value == null) {
            checkarrayName = "";
        } else {
            checkarrayName = "["+value+"]";
        }


        return unitRowHtml = `
    <div class="row">
        <div class="col-3 col-sm-2 span-unit-js" style="display:inline-block;text-align:right;">
            <label class="new-customer-id ">Units 1</label>
        </div>

        <div class="col-11 col-sm-2 checking"style="display:inline-block;padding:0px;">
            <div style="margin: 5px; width: auto;">
                <input onkeyup="updateUnit(this)" onfocusout="disableOnFocusOut(this)" style="margin: 5px;width: 100%" placeholder="& above" type="number"name="unit` + checkarrayName + `[]" onkeyup="updatePrice()" class="new-customer-input" required>
            </div>
        </div>

        <div class="col-11 col-sm-2"style="display:inline-block;padding:0px;">
            <div style="margin: 5px; width: auto;">
                <input style="margin: 5px;width: 100%" placeholder="Per Unit Price" type="number"            name="price` + checkarrayName + `[]" onkeyup="updatePrice()" class="new-customer-input price" required>
            </div>
        </div>



        <div class="col-11 col-sm-2 add"style="display:inline-block;padding:0px;">
            <div style="margin: 5px; width: auto;padding-top: 8px;">
                <button style="width:45%;" class="new-customer-input add" onclick="removeUnit(this)">Remove</button>
            </div>
        </div>
    </div>`;
    }


    function addUnit(event, checking = null) {
        $(event).prop('readonly', true);

        $(event).parent().parent().siblings('.checking').children().children().prop('readonly', true);


        $(event).parent().parent().parent().parent().append(rowHtml(checking));
    }


    function removeUnit(event) {

        if (document.getElementsByClassName('checking').length == 2) {
            $(event).parent().parent().parent().siblings('.first-row').children('.add').children().children().prop('readonly', false)
        }
        $(event).parent().parent().parent().remove();

    }


    function disableOnFocusOut(event) {
        if (document.getElementsByClassName('checking').length > 1) {
            event.readOnly = true;
        }

    }


    function updateUnit(event) {

        unitValue = $(event).parent().parent().siblings('.span-unit-js').children();

        if (event.value == "") {

            if (document.getElementsByClassName('checking').length == 1) {
                $(event).parent().parent().siblings('.add').children().children().prop('disabled', true);
                unitToFlag = false;
                unitValue.html("Unit 1");
            } else {
                unitValue.html(unitValue.html());
            }

        } else {
            if (unitToFlag == false) {


                $(event).parent().parent().siblings('.add').children().children().prop('disabled', false);
                unitValue.html(unitValue.html() + " to");

                unitToFlag = true;
            }
            if ($(event).parent().parent().siblings('.add').children().children().html() == "Remove") {
                $(event).parent().parent().parent().siblings('.first-row').children('.add').children().children().prop('disabled', false)
            }

        }

    }


    function updatePrice() {
        defultValue = $('#price_show_label');
console.log(document.getElementsByClassName('price'));
        if (document.getElementsByClassName('price').length == 1) {

            jQuery.each(document.getElementsByClassName('price'), function (key, item) {

                defultValue.val(item.value);
            });

        } else {
            checkPrice = 0;
            jQuery.each(document.getElementsByClassName('price'), function (key, item) {

                if (item.value == "") {
                    featurePrice = 0;
                } else {
                    featurePrice = parseInt(item.value)
                }
                checkPrice = checkPrice + featurePrice;


            });

            defultValue.val(checkPrice);
        }
    }


    function chargeType(value) {
        if (value == 'one time payment') {
            document.getElementById('reaccuring').innerHTML = "";
        } else {
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


    window.global_array = new Array();
    window.all_array = [
            @foreach($data['sites'] as $site)

        {
            'id': '{{$site->id}}',
            'name': '{{$site->name}}'
        },

        @endforeach
    ];


    function updatePricingModel(value) {
        value = value.options[value.selectedIndex].text;

        if (value == "Flat Fee") {
            global_array = [];
            global_array.push($('#new-div-0').find('.select_name').val());
            document.getElementById('feature_section').innerHTML = flatFee;
            document.getElementById('price_show_label').value = "0";
            pricingFlag = false;

        } else {
            document.getElementById('price_show_label').value = "0";
            global_array = [];
            global_array.push($('#new-div-0').find('.select_name').val());
            pricingFlag = true;

            $('#feature_section').html(unitPrice);
        }
    }


    var i = 0;
    $(document).on('click', '#add_feature', function () {

        var length = {{$data['sites']->count()}};

        if ($('#feature_section').children().length == length - 1) {
            $('#add_feature').css('display', 'none');
        }

        var parent_div = $('#new-div-' + i);
        global_array.push(parent_div.find('.select_name').val());


        i++;

        if (pricingFlag) {
            styleWidth = 'width:20%';
        } else {
            styleWidth = '';
        }


        if (!pricingFlag) {
            var html = '<div class="row appended_section" id="new-div-' + i + '">';
            html += '<div class="col-12 col-sm-2"><label class="new-customer-id">Feature</label></div>';
            html += '<div class="col-12 col-sm-10">';
            html += '<select class="new-customer-input select_name" style="' + styleWidth + '"name="feature_name[]" required>';

            $.each(all_array, function (key, index) {
                if (jQuery.inArray(index.id, global_array) == -1) {
                    html += '<option value="' + index.id + '">' + index.name + '</option> '
                }
            });
            html += '</select>';
            html += '<span style="margin: 5px; width: auto;' + styleWidth + '">';
            html += '<input style="margin: 5px; width: auto;' + styleWidth + '" placeholder="Quantity" type="number"  name="feature_quantity[]" class="new-customer-input" required>';
            html += '</span>';

            html += '<span style="margin: 5px; width: auto;">';
            html += '<input onkeyup="updatePrice()"  style="margin: 5px; width: auto;' + styleWidth + '" placeholder="Price" type="number"  name="price[]" class="new-customer-input price" required>';
            html += '</span>';
            html += '<span class="remove_feature">Remove</span></div></div>';
        } else {

            unitToFlag = false;
            var html = '<hr><div style="margin-top:20px;"  class="row appended_section" id="new-div-' + i + '">';
            html += '<div class="col-12 col-sm-2"><label class="new-customer-id">Feature</label></div>';


            html += '<div class="col-12 col-sm-10"><div style="margin: 5px; width: auto;"><select class="new-customer-input select_name" style="' + styleWidth + '"name="feature_name[]" required>';
            indexNameForUnit = "";
            indexCouterForUnit = 0;
            $.each(all_array, function (key, index) {
                if (jQuery.inArray(index.id, global_array) == -1) {
                    if (indexCouterForUnit == 0) {
                        indexNameForUnit = index.name;
                    }
                    html += '<option value="' + index.id + '">' + index.name + '</option> '
                    indexCouterForUnit++;
                }
            });
            html += '</select></div>';

            html += `<div style="margin: 5px; width: auto;">
                            <input style="margin: 5px; width: 20%" placeholder="Quantity" type="number"             name="feature_quantity[]" class="new-customer-input" required>
                        </div></div>`;

            html += `
    <div id="units" class="col-12 col-sm-12">
        <div class="row first-row">
                <div class="col-3 col-sm-2 span-unit-js" style="display:inline-block;text-align:right;">
                    <label class="new-customer-id ">Units 1</label>
                </div>

                <div class="col-11 col-sm-2 checking"style="display:inline-block;padding:0px;">
                    <div style="margin: 5px; width: auto;">
                        <input onkeyup="updateUnit(this)" onfocusout="disableOnFocusOut(this)" style="margin: 5px;width: 100%" placeholder="& above" type="number"name="unit[` + indexNameForUnit + `][]" onkeyup="updatePrice()" class="new-customer-input " required>
                    </div>
                </div>

                <div class="col-11 col-sm-2"style="display:inline-block;padding:0px;">
                    <div style="margin: 5px; width: auto;">
                        <input style="margin: 5px;width: 100%" placeholder="Per Unit Price" type="number"            name="price[` + indexNameForUnit + `][]" onkeyup="updatePrice()" class="new-customer-input price" required>
                    </div>
                </div>



                <div class="col-11 col-sm-2 add"style="display:inline-block;padding:0px;">
                    <div style="margin: 5px; width: auto;padding-top: 8px;">
                        <button disabled type="button" class="new-customer-input " onclick="addUnit(this,'`+indexNameForUnit+`')">Add</button>
                    </div>
                </div>
        </div>
    </div>`;
            html += '<span class="remove_feature">Remove</span></div></div>';


        }


        $('#feature_section').append(html);


    });

    $(document).on('click', '.remove_feature', function () {

        var parent_div = $('#new-div-' + i);

        var id = $(this).siblings('.select_name').val();

        $('#add_feature').css('display', 'inline-block');

        global_array = jQuery.grep(global_array, function (value) {
            return value != id;
        });

        $(this).closest('.appended_section').remove();

        updatePrice();
    });

</script>

