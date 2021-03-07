<form method="post" action="{{route('admin.post-add-new-package')}}">
    @csrf
    <div class="right-rable-main">
        <div class="new-customer-main">
            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Name*</label></div>
                <div class="col-12 col-sm-10">
                    <input type="text" name="name" class="new-customer-input" required>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Module</label></div>
                <div class="col-12 col-sm-10">
                        <span class="new-customer-country">
                            <select name="module_id">

                    @foreach($data['modules'] as $module)
                                    <option value="{{$module->id}}">{{$module->name}}</option>
                                @endforeach

                            </select>
                        </span>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-sm-2"><label class="new-customer-id">Plans</label></div>
                <div class="col-12 col-sm-10">
                    @foreach($data['plans'] as $plan)
                        <input type="checkbox" name="plan_id[]" value="{{ $plan->id }}"> {{ $plan->name }}<br>
                     @endforeach
                </div>
            </div>
            <div class="row">
                <div class="new-customer-btn-main">
                    <button type="submit" class="create-cus-btn btn btn-primary">Save</button>
                    <a href="#" class="create-cus-btn btn btn-primary">Save & Create New</a>
{{--                    <a href="{{route('admin.all-plans')}}">Cancel</a>--}}
                </div>
            </div>
        </div>
    </div>
</form>

