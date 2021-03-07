<form method="post" action="{{route('admin.post-add-new-setting')}}" class="setting-form">
    @csrf
    <div class="right-rable-main">
        <div class="new-customer-main">
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Name*</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="title" class="new-customer-input" required>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-2 checkboxes-div">
                    <p>Permission:</p>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_user" value="1">User
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_business" value="1">Business
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_adds" value="1">Ads
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="is_service" value="1">Service
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="new-customer-btn-main">
                    <button type="button" class="create-cus-btn btn btn-primary">Save</button>
                    <a href="{{route('admin.all-settings')}}">Cancel</a>
                </div>
            </div>

        </div>
    </div>
</form>

<script>

    $(".btn").click(function(e){
        e.preventDefault()
        var checked = $(".checkboxes-div input:checked").length > 0;
        if (!checked){
            alert("Please check at least one checkbox");
            return false;
        }

        $('.setting-form').submit();

    });


</script>