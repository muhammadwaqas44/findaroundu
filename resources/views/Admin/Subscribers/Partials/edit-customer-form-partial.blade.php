<form method="post" action="{{route('user.post-edit-customer',[$data['customer']->id])}}">
@csrf
    <div class="right-rable-main">
        <div class="new-customer-main">

            <input style="display: none;" name="role_id" value="3">
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">First Name</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="first_name" value="{{$data['customer']->first_name}}" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Last Name</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="last_name" value="{{$data['customer']->last_name}}" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Company</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="company_name" value="{{$data['customer']->company_name}}" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Email</label></div>
                <div class="col-12 col-sm-10">
                    <input type="email" name="email"  value="{{$data['customer']->email}}" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Phone</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" value="{{$data['customer']->phone}}" name="phone_number" class="new-customer-input">
                </div>
            </div>



            <div class="new-customer-btn-main">
                <button href="{{route('user.post-add-new-customer')}}" type="submit" class="create-cus-btn btn btn-primary">Create Customer</button>
                <a href="{{route('user.customer-detail',[$data['customer']->id])}}">Cancel</a>
            </div>
        </div>
    </div>
</form>