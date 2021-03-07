<script src="{{asset('MainSite/Assets/js/creditCardValidator.js')}}"></script>
<link href="{{asset('MainSite/Assets/css/card.css')}} " type="text/css" rel="stylesheet">


<form method="post" autocomplete="off" action="{{route('main-admin.subscriber.add-card',[$data['customer']->id])}}">
    @csrf
    <div class="right-rable-main">
        <div class="new-customer-main">


            <input style="display:none;" name="user_id" value="{{$data['customer']->id}}">

            <div class="row">
                <div class="col-12 col-sm-3"><label class="new-customer-id">First Name*</label></div>
                <div class="col-12 col-sm-9">
                    <input type="text" class="new-customer-input" name="first_name" required/>

                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-3"><label class="new-customer-id">Last Name*</label></div>
                <div class="col-12 col-sm-9">
                    <input type="text" placeholder="" name="last_name" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-3"><label class="new-customer-id">Card Number*</label></div>
                <div class="col-12 col-sm-9">
                    <div class="card-container">
                        <!--- ".card-type" is a sprite used as a background image with associated classes for the major card types, providing x-y coordinates for the sprite --->
                        <div class="card-type"></div>
                        <input placeholder="0000 0000 0000 0000" name="card_number" onkeyup="$cc.validate(event)" required/>
                        <!-- The checkmark ".card-valid" used is a custom font from icomoon.io --->
                        <div class="card-valid">&#xea10;</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-3"><label class="new-customer-id">Card Expiry</label></div>
                <div class="col-12 col-sm-9">
                    <div class="card-details clearfix">

                        <div class="expiration">

                            <input autocomplete="off"  name="expiry" onkeyup="$cc.expiry.call(this,event)" maxlength="7"
                                   placeholder="mm/yyyy"/>
                        </div>


                    </div>

                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-3"><label class="new-customer-id">CVV</label></div>
                <div class="col-12 col-sm-9">
                    <div class="card-details clearfix">


                        <div class="cvv">

                            <input autocomplete="false" name="cvv" placeholder="XXX"/>
                        </div>

                    </div>

                </div>
            </div>

            {{--<div class="row">--}}
            {{--<div class="col-12 col-sm-3"><label class="new-customer-id">Gateway Account*</label></div>--}}
            {{--<div class="col-12 col-sm-9">--}}

            {{--<span class="new-customer-country">--}}
            {{--<select>--}}
            {{--<option value="">01</option>--}}
            {{--<option value="en">02</option>--}}
            {{--</select>--}}
            {{--</span>--}}

            {{--</div>--}}
            {{--</div>--}}
            <div class="new-customer-btn-main">
                <button href="{{route('main-admin.post-add-new-subscriber')}}" type="submit"
                        class="create-cus-btn btn btn-primary">Add Card
                </button>
                <a href="{{route('main-admin.subscriber-detail',[$data['customer']->id])}}">Cancel</a>
            </div>
        </div>
    </div>
</form>