<form method="post" action="{{route('main-admin.post-add-new-subscriber')}}">
@csrf
    <div class="right-rable-main">
        <div class="new-customer-main">

            <input style="display: none;" name="role_id" value="3">
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">First Name</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="first_name" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Last Name</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="last_name" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Company</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="company_name" class="new-customer-input" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Email</label></div>
                <div class="col-12 col-sm-10">
                    <input type="email" name="email" class="new-customer-input" required>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Password</label></div>
                <div class="col-12 col-sm-10">
                    <input type="password" name="password" class="new-customer-input" required>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Phone</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="phone_number" onkeypress="return isNumber(event)" class="new-customer-input">
                </div>
            </div>
            <div class="row">
                <span class="customer-details" style="margin-top: 40px;">Configurations</span>
            </div>

            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Auto Collection*</label></div>
                <div class="col-12 col-sm-10">
                    <label class="new-customer-label">
                        <input type="radio" value="1" name="auto_collection" checked>On
                    </label>
                    <span class="uniquely-identify">Whenever an invoice is created, an automatic attempt to charge the customer's payment method is made.</span>
                    <label class="new-customer-label">
                        <input type="radio" value="0" name="auto_collection">Off
                    </label>
                    <span class="uniquely-identify">Automatic collection of charges will not be made. All payments must be recorded offline.</span>

                </div>
            </div>
            <div class="new-customer-btn-main">
                <button  type="submit" class="create-cus-btn btn btn-primary">Add Subscriber</button>
                <a href="{{route('user.all-customers')}}">Cancel</a>
            </div>
        </div>
    </div>
</form>

<script>
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
</script>