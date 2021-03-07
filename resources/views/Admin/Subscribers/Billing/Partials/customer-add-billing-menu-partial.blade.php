<div class="right-sec1">
    <div class="customer-detail-left">
        <a href="#" class="pre-icon"><i class="fas fa-chevron-left"></i></a>
        <div class="left-com-main">
            <a href="{{route('main-admin.all-subscribers')}}" class="customer-text">Customers</a> <small style="float:left;padding-left:5px;padding-right:5px;"><a> / </a></small>
            <a href="{{route('main-admin.all-subscribers',[$data['customer']->id])}}" class="customer-text">
                {{$data['customer']->full_name}}
            </a><br>
            <span class="com-name">Add Billing Info - {{$data['customer']->full_name}}</span>
        </div>
    </div>
</div>


