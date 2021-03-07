<form    action="{{route('admin.add-module')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="right-rable-main">
        <div class="new-customer-main">

            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Module Name</label></div>
                <div class="col-12 col-sm-8 col-md-10">

                    <input type="text" name="name" placeholder="" class="new-customer-input" required>

                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Module Icon</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                        <span class="new-customer-country">
                            <select name="module_icon_option" required onchange="imageOrCode(this.value)">
                                <option value="class_code"> Class Code</option>
                                <option value="image">Image</option>

                            </select>
                        </span>
                </div>
            </div>

            <div class="row" id="icon_class" >
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Icon Class</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                    <input type="text" name="icon_code" placeholder="" class="new-customer-input">
                    <a href="#" class="tooltip-tag"><i class="fas fa-question-circle" data-toggle="tooltip"
                                                       data-placement="right"
                                                       data-original-title="Id used to uniquely identify the customer. If not provided, it is auto generated"></i></a>
                </div>
            </div>
            <div class="row" id="icon_image" style="display:none;">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Icon Image</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                    <input type="file" name="icon_image" placeholder="" class="new-customer-input">
                    <a href="#" class="tooltip-tag"><i class="fas fa-question-circle" data-toggle="tooltip"
                                                       data-placement="right"
                                                       data-original-title="Id used to uniquely identify the customer. If not provided, it is auto generated"></i></a>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-4 col-md-2"><label class="new-customer-id">Active</label></div>
                <div class="col-12 col-sm-8 col-md-10">
                        <span class="new-customer-country">
                            <select name="active" required>
<option value="1">Active</option>
                                <option value="0">Deactive</option>

                            </select>
                        </span>
                </div>
            </div>
            <br>


            <div class="new-customer-btn-main">
                <button type="submit" class="create-cus-btn btn btn-primary">Add Module</button>
                <a href=" ">Cancel</a>
            </div>
        </div>
    </div>
</form>


<script>
    function imageOrCode(value) {
        if (value == "class_code") {
            document.getElementById('icon_image').style.display = 'none';
            document.getElementById('icon_class').style.display = 'flex';
        } else {
            document.getElementById('icon_image').style.display = 'flex';
            document.getElementById('icon_class').style.display = 'none';
        }
    }
</script>
