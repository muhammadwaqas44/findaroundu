<form method="post" action="{{route('main-admin.post.subscriber.add-billing',[$data['customer']->id])}}">
@csrf
    <div class="right-rable-main">
        <div class="new-customer-main">

            <input style="display: none;" name="user_id" value="{{$data['customer']->id}}">
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">First Name</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="first_name" value="@if($data['customer']->billingInfo){{$data['customer']->billingInfo->first_name}} @endif" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Last Name</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="last_name" value="@if($data['customer']->billingInfo){{$data['customer']->billingInfo->last_name}} @endif" class="new-customer-input" required>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Email</label></div>
                <div class="col-12 col-sm-10">
                    <input type="email" name="email" value="@if($data['customer']->billingInfo){{$data['customer']->billingInfo->email}} @endif" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Phone</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="phone" value="@if($data['customer']->billingInfo){{$data['customer']->billingInfo->phone}} @endif" class="new-customer-input">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Address</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="address" value="@if($data['customer']->billingInfo) {{$data['customer']->billingInfo->address}} @endif" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">City</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="city" value="@if($data['customer']->billingInfo) {{$data['customer']->billingInfo->city}} @endif" class="new-customer-input" >
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Zip/Postal Code</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="zip" value="@if($data['customer']->billingInfo) {{$data['customer']->billingInfo->zip}} @endif" class="new-customer-input" >
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">State</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="state" value="@if($data['customer']->billingInfo) {{$data['customer']->billingInfo->state}} @endif" class="new-customer-input" >
                </div>
            </div>

            <div class="new-customer-btn-main">
                <button   type="submit" class="create-cus-btn btn btn-primary">Add Billing Info</button>
                <a href="{{route('main-admin.subscriber-detail',[$data['customer']->id])}}">Cancel</a>
            </div>
        </div>
    </div>
</form>