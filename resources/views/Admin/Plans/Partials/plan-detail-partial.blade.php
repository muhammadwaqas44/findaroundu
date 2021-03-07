<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">

                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['plan']->name}}</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['plan']->id}}</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Invoice Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['plan']->invoice_name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Description</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['plan']->description}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Status</span></div>
                            <div class="col-6">
                                @if($data['plan']->active == 1)
                                    <span class="btn btn-success">ACTIVE</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Pricing & Billing Interval</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Pricing model</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['plan']->pricingModel->first()->name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Bill Every</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['plan']->bill_every_count}}  {{$data['plan']->bill_period_unit}}
                                    s</span></div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Price</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">USD {{$data['plan']->pricingModel->first()->pivot->price}} </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Setup Price</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">USD {{$data['plan']->pricingModel->first()->pivot->setup_price}} </span>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Trial & Freemium</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Trial Period</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['plan']->trial_limit_count}} {{$data['plan']->trial_period_unit}}
                                    s </span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Addons</span>
                </div>
                <div class="row">
                    <span class="Contacts-not-present">Select the addons that are applicable with this plan. Applicable addons can be attached with the plan as mandatory, recommended or optional.</span>

                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Applicable addons</span></div>
                            @foreach($data['plan']->planAddOn as $addOn)
                                <div class="col-3">
                                    <span class="custom-right-text2"><a href="{{route('admin.addon-detail',['addonId'=>$addOn->id])}}">{{$addOn->name}}</a></span>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </div>
                <div class="row">
                    <span class="customer-details">Hosted Page & Customer Portal</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Display in Customer Portal</span></div>
                            <div class="col-6"><span class="custom-right-text2">Enabled </span>
                                <span class="custom-right-text2" style="margin-bottom: 10px;font-style: italic;">If enabled, users can switch to this plan using the 'Edit Subscription' option.</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Checkout using Hosted Page</span></div>
                            <div class="col-6"><span class="custom-right-text2">Enabled </span>
                                <span class="custom-right-text2" style="font-style: italic;">If enabled, users can access the checkout page via drop-in script. To change, <a
                                            href="#"> click here.</a> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <span class="customer-details">Plan Features</span>
            </div>
            <div class="row">

                <div class="events-tab-main">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Feature</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['plan']->planFeatures as $planFeature)
                        <tr>
                            <td><a href="javascript:void(0)">{{ $planFeature->site->name }}</a></td>
                            <td>{{ $planFeature->quantity }}</td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="margin-top: 30px;">
                        <span class="customer-details">Invoice Notes <a href="#"><i class="fas fa-question-circle"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="right"
                                                                                    data-original-title="click for help"></i></a>
                            @if(empty($data['plan']->invoice_name))
                                <a href="#" style="float:right;" data-toggle="collapse"
                                   data-target="#add-note" onclick="hide('invoice-note')">Add Note</a>
                            @else
                                <a style="float:right;"
                                   href="{{route('admin.plan.delete-invoice-note',[$data['plan']->id])}}">Delete Invoice Note</a>
                            @endif
                        </span>
                @if(empty($data['plan']->invoice_name))
                    <span id="invoice-note" class="present-comment">No Invoice notes present for this customer</span>
                    <div class="toggle-textarea collapse" id="add-note">
                        <form method="post" action="{{route('admin.plan.add-invoice',[$data['plan']->id])}}">
                            @csrf
                            <textarea name="invoice_name" placeholder="Add a notes"></textarea>
                            <ul class="textarea-ul">
                                <li>
                                    <a href="#" data-toggle="collapse" onclick="show('invoice-note')"
                                       data-target="#add-note">cancel</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                @else
                    {{$data['plan']->invoice_name}}
                @endif
            </div>
            <div class="row" style="margin-top: 30px;">
                        <span class="customer-details">Comments & Attachments <a href="#"><i
                                        class="fas fa-question-circle" data-toggle="tooltip" data-placement="right"
                                        data-original-title="click for help"></i></a>
                            @if(empty($data['plan']->comment))
                                <a href="#" onclick="hide('comment-notes')" style="float:right;" data-toggle="collapse"
                                   data-target="#add-coment">
                                Add Comment
                            </a>
                            @else
                                <a href="{{route('admin.plan.delete-comment',[$data['plan']->id])}}" onclick="hide('comment-notes')" style="float:right;"
                                   >
                                Delete Comment
                            </a>
                            @endif
                            </span>
                @if(empty($data['plan']->comment))
                <span id="comment-notes" class="present-comment">No comments present for this customer</span>
                <div class="toggle-textarea collapse" id="add-coment">
                    <form method="post" action="{{route('admin.plan.add-comment',[$data['plan']->id])}}">
                        @csrf
                        <textarea name="comment" placeholder="Add a notes"></textarea>
                        <ul class="textarea-ul">
                            <li>
                                <a href="#" onclick="show('comment-notes')" data-toggle="collapse" onclick="show('comment-notes')"
                                   data-target="#add-coment">cancel</a>
                            </li>
                            <li>
                                <button type="submit" class="btn btn-primary btn-sm">Add</button>
                            </li>
                        </ul>
                    </form>
                </div>
                    @else
                    {{$data['plan']->comment}}
                @endif
            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="col-10">
                <div class="plan-right-main">
                    <h6 style="margin-bottom:15px; ">Actions</h6>
                    <ul class="action-tab-ul">
                        <li>
                            <a href="#" class="create-form-btn">Edit Plan</a>
                            <span class="create-form-content">Make changes to this plan.</span>
                        </li>
                        <li>
                            <a href="#" class="create-form-btn">Clone Plan</a>
                            <span class="create-form-content">Copy the current plan configurations and create a new one.</span>
                        </li>
                        <li>
                            <a href="{{route('admin.plan-delete',[$data['plan']->id])}}" class="create-form-btn">Delete Plan</a>
                            <span class="create-form-content">Delete this plan. No new subscriptions can be created using this plan.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>