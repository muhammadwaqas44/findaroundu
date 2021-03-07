<div class="right-rable-main">
    <div class="row">
        <div class="col-md-12 col-lg-8">
            <div class="btn-styling-refrence">
                <div class="row">
                    <span class="customer-details">Customer Details</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Customer Id</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['customer']->id}}</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">First Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['customer']->first_name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Last Name</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['customer']->last_name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Company</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['customer']->company_name}}</span></div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Email</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['customer']->email}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Phone</span></div>
                            <div class="col-6"><span class="custom-right-text2">
                                    @if(!empty($data['customer']->phone))
                                        {{$data['customer']->phone}}
                                    @else
                                        -Not Available-
                                    @endif
                                </span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Configurations</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Auto Collection</span></div>
                            <div class="col-6"><span class="custom-right-text2">{{$data['customer']->auto_collection}}
                                    &nbsp; <a href="#" data-toggle="modal"
                                              data-target="#auto-collection">Change</a></span></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Billing Info</span>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-8">
                        @if($data['customer']->billingInfo()->count() == 0)
                            <a href="{{route('main-admin.subscriber.add-billing',[$data['customer']->id])}}"
                               class="ad-bilibg-text">Add Billing Info</a>
                        @else
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">First Name</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['customer']->billingInfo->first_name}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Last Name</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['customer']->billingInfo->last_name}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Email</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['customer']->billingInfo->email}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Phone</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['customer']->billingInfo->phone}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Address</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['customer']->billingInfo->phone}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">City</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['customer']->billingInfo->phone}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Zip</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['customer']->billingInfo->phone}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">State</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['customer']->billingInfo->phone}}</span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Additional Contacts <a href="#" style="float:right;"
                                                                          data-toggle="modal"
                                                                          data-target="#add-contact">Add Contact</a></span>
                </div>
                <div class="row">
                    @if($data['customer']->customerContact()->count() == 0)
                        <span class="Contacts-not-present">Additional Contacts not present</span>
                    @else
                        <div class="events-tab-main">
                            <table class="table">
                                <thead>

                                <tr>
                                    <th>Email</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data['customer']->customerContact as $contact)
                                    <tr>
                                        <td>{{$contact->email}}
                                            @if($contact->active == 1)
                                                <a href="{{route('user.customer.disable-contact',[$contact->id])}}">disable</a>
                                            @else
                                                <a href="{{route('user.customer.enable-contact',[$contact->id])}}">enable</a>
                                            @endif

                                            @if($contact->is_primary == 0)
                                                <a href="{{route('user.billing-add-primary',[$data['customer']->id, $contact->id])}}">-
                                                    Add Primary</a>
                                            @else
                                                <span class="primary-content btn btn-primary">Primary</span>
                                            @endif
                                        </td>
                                        <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                                        <td>{{$contact->phone}} </td>
                                        <td style="text-align: right;"><a href="#" data-toggle="modal"
                                                                          data-target="#edit-contact_{{$contact->id}}">
                                                Edit </a>&nbsp <a
                                                    href="{{route('user.customer.delete-contact',[$contact->id])}}"
                                            >Remove </a>
                                        </td>
                                    </tr>
                                    @include('MainSite.Popups.Customer.edit-contact-popup',['editContact' => $contact])
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
                <div class="row">
                    <span class="customer-details">Payment Methods ({{$data['customer']->cards()->count()}}) <a
                                href="{{route('main-admin.subscriber.add-card',[$data['customer']->id])}}"
                                style="float:right;">Add Card</a></span>
                </div>
                @foreach($data['customer']->cards as $card)
                    <div class="row">
                        <div class="white-border">
                            <div class="col-12 col-lg-8">

                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">Card#</span></div>
                                    <div class="col-6"><span class="custom-right-text2">{{$card->card_number}}</span>
                                    </div>
                                </div>
                                {{--<div class="row">--}}
                                {{--<div class="col-6"><span class="customer-id2">via Chargebee</span>--}}
                                {{--</div>--}}
                                {{--<div class="col-6"><span class="custom-right-text2">Test Gateway</span></div>--}}
                                {{--</div>--}}
                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">Id</span></div>
                                    <div class="col-6"><span class="custom-right-text2">{{$card->id}}</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">First Name</span></div>
                                    <div class="col-6"><span class="custom-right-text2">{{$card->first_name}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">Last Name</span></div>
                                    <div class="col-6"><span class="custom-right-text2">{{$card->last_name}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">Card Expiry</span></div>
                                    <div class="col-6"><span class="custom-right-text2">{{$card->expiry}}</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">CVV</span></div>
                                    <div class="col-6"><span class="custom-right-text2">{{$card->cvv}}</span>
                                    </div>
                                </div>

                            </div>
                            <div class="primary-main">
                                <div class="drop-down-realitive">
                                    <div class="dropdown">
                                        <a href="#" class="ellipses" data-toggle="dropdown" aria-expanded="true"><i
                                                    class="fas fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Update Payment Method</a></li>
                                            <li>
                                                <a href="{{route('main-admin.subscriber.delete-payment-method',[$data['customer']->id, $card->id])}}">Remove
                                                    Payment Method</a></li>
                                            <li>
                                                <a href="{{route('main-admin.subscriber.payment-method.make-primary',[$data['customer']->id,$card->id])}}">Make
                                                    it Primary</a></li>
                                        </ul>
                                    </div>

                                </div>
                                @if($card->primary == 1)<span
                                        class="primary-content btn btn-primary">Primary</span> @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                @if($data['customer']->cards()->count() == 0)
                    <div class="row">
                        <span class="Contacts-not-present">No Payment method added till yet.</span>

                    </div>

                @endif

                <div class="row">
                    <span class="customer-details">Subscriptions ( {{$data['customer']->subscriptions()->count()}} ) </span>
                </div>
                @foreach($data['customer']->subscriptions()->orderBy('id','desc')->take(3)->get() as $subscription)
                    <div class="row">
                        <div class="white-border">
                            <div class="col-12 col-lg-8">
                                <div class="row">
                                    <div class="col-6"><span
                                                class="customer-id2"><strong>ID : {{$subscription->id}}</strong> </span>
                                    </div>
                                    <div class="col-6"><span class="custom-right-text2"><a
                                                    href="{{route('main-admin.subscription.subscription-detail',[$subscription->id])}}">View Details </a>  </span></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">Status</span>
                                    </div>
                                    <div class="col-6"> @if($subscription->active == 'active')
                                            <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span> @elseif($subscription->active == 'cancel')
                                            <span class="custom-right-text btn btn-danger btn-sm"> CANCELLED</span> @endif</div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">Id</span></div>
                                    <div class="col-6"><span class="custom-right-text2">pm_Hr550zuRBHEM7k7WF</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">Plan</span></div>
                                    <div class="col-6"><span class="custom-right-text2"> <a href="{{route('main-admin.plan-detail',[$subscription->plan->id])}}">{{$subscription->plan->name}}</a></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">Expiry Date</span></div>
                                    <div class="col-6"><span class="custom-right-text2">Jan-2019</span></div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span class="customer-id2">Gateway Account</span></div>
                                    <div class="col-6"><span class="custom-right-text2">Chargebee Test Gateway</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6"><span class="customer-id2"></span></div>
                                    <div class="col-6"><span class="custom-right-text2">  </span>
                                    </div>
                                </div>

                            </div>
                            <div class="primary-main">
                                <div class="drop-down-realitive">
                                    <div class="dropdown">
                                        <a href="#" class="ellipses" data-toggle="dropdown" aria-expanded="true"><i
                                                    class="fas fa-ellipsis-v"></i></a>
                                        <ul class="dropdown-menu">
                                            <li><a @if($subscription->active != "cancel") href="{{route('main-admin.subscription.cancel-subscription',[$subscription->id])}}" @endif @if($subscription->active == "cancel") style="background-color: #d9534f!important;color:white;" disbaled @endif> @if($subscription->active == "cancel")Cancelled @else Cancel @endif Subscription</a></li>
                                            <li>   <a
                                                            href="{{route('main-admin.subscriber.add-billing',[$subscription->user->id,"flag"=>"billing"])}}">@if(!empty($subscription->user->billingInfo))
                                                            Update Billing @else Add Billing @endif </a></li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

                @if($data['customer']->subscriptions()->orderBy('id','desc')->count() > 3)
                    <div class="row">
                        <div class="white-border" style="padding: 6px 0px;">
                            <div class="col-12 col-lg-12" style="text-align:center;">
                                <span style="float:none;" class="custom-right-text2"> <a href="{{route('admin.all-subscription')}}?user_id={{$data['customer']->id}}">Show More ( {{$data['customer']->subscriptions()->count()}} )</a></span>

                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="tab-chargbe">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Invoices</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu1">Credit Notes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Transactions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu3">Promotional Credits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu4">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu5">Emails</a>
                            </li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="home" class="container tab-pane active"><br>
                                <div class="center-div">
                                    <span class="no-promotional">No <strong>promotional credits</strong> found for this customer</span>
                                </div>
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                                <div class="center-div">
                                    <span class="no-promotional">No <strong>promotional credits</strong> found for this customer</span>
                                </div>
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                <div class="center-div">
                                    <span class="no-promotional">No <strong>promotional credits</strong> found for this customer</span>
                                </div>
                            </div>
                            <div id="menu3" class="container tab-pane fade"><br>
                                <div class="center-div">
                                    <span class="no-promotional">No <strong>promotional credits</strong> found for this customer</span>
                                </div>
                            </div>
                            <div id="menu4" class="container tab-pane fade"><br>
                                <div class="events-tab-main">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Event Id</th>
                                            <th>Event Type</th>
                                            <th>Occurred At <i class="fas fa-arrow-down"></i></th>
                                            <th>Webhook Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>John</td>
                                            <td>Doe</td>
                                            <td>john@example.com</td>
                                            <td>john@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>Mary</td>
                                            <td>Moe</td>
                                            <td>john@example.com</td>
                                            <td>mary@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>July</td>
                                            <td>john@example.com</td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="menu5" class="container tab-pane fade"><br>
                                <div class="center-div">
                                    <span class="no-promotional">No <strong>promotional credits</strong> found for this customer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                        <span class="customer-details">Invoice Notes <a href="#"><i class="fas fa-question-circle"
                                                                                    data-toggle="tooltip"
                                                                                    data-placement="right"
                                                                                    data-original-title="click for help"></i></a>
                            @if(empty($data['customer']->invoice_notes))
                                <a href="#" onclick="hide('no-invoice-comments')" style="float:right;"
                                   data-toggle="collapse"
                                   data-target="#add-note">Add Note</a>
                            @else
                                <a href="{{route('user.customer.delete-invoice-note',[$data['customer']->id])}}"
                                   style="float:right;">Delete Note</a>
                            @endif
                        </span>

                @if(empty($data['customer']->invoice_notes))
                    <span id="no-invoice-comments"
                          class="present-comment">No Invoice Notes present for this customer</span>
                    <div class="toggle-textarea collapse" id="add-note">
                        <form method="post"
                              action="{{route('main-admin.customer.add-invoice-note',[$data['customer']->id])}}">
                            @csrf
                            <textarea placeholder="Add a notes" name="invoice_notes" required></textarea>
                            <ul class="textarea-ul">
                                <li>
                                    <a onclick="show('no-invoice-comments')" data-toggle="collapse"
                                       data-target="#add-note">cancel</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                @else
                    {{$data['customer']->invoice_notes}}
                @endif
            </div>
            <div class="row" style="margin-top: 30px;">
                        <span class="customer-details">Comments & Attachments <a href="#"><i
                                        class="fas fa-question-circle" data-toggle="tooltip" data-placement="right"
                                        data-original-title="click for help"></i></a>
                            @if(empty($data['customer']->comments))
                                <a href="#" style="float:right;" onclick="hide('comments-notes')" data-toggle="collapse"
                                   data-target="#add-coment">Add Comment</a>
                            @else
                                <a href="{{route('user.customer.delete-comments',[$data['customer']->id])}}"
                                   style="float:right;">Delete Comment</a>
                            @endif
                            </span>
                @if(empty($data['customer']->comments))
                    <span id="comments-notes" class="present-comment">No comments present for this customer</span>
                    <form style="width:100%;" action="{{route('main-admin.subscriber.add-comments',[$data['customer']->id])}}"
                          method="post">
                        @csrf
                        <div class="toggle-textarea collapse" id="add-coment">
                            <textarea placeholder="Add a notes" name="comments" required></textarea>
                            <ul class="textarea-ul">
                                <li>
                                    <a href="#" onclick="show('comments-notes')" data-toggle="collapse"
                                       data-target="#add-coment">cancel</a>
                                </li>
                                <li>
                                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                @else
                    {{$data['customer']->comments}}
                @endif

            </div>
        </div>
        <div class="col-md-12 col-lg-4">
            <div class="right-menu-tab">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#Actions"><i class="fas fa-cog"></i> Actions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Add-Charge"><i class="fab fa-stack-exchange"></i>
                            Add Charge</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Add-Addon"><i class="fas fa-box"></i> Add Addon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Promotional-Credits"><i class="fas fa-coins"></i>
                            Promotional Credits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Record-Payment"><i class="fas fa-coins"></i> Record
                            Payment</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="Actions" class="container tab-pane active"><br>
                        <ul class="action-tab-ul">
                            <li>
                                <a href="{{route('user.delete.customer',[$data['customer']->id])}}"
                                   class="create-form-btn">Delete Customer</a>
                                <span class="create-form-content">Delete this customer</span>
                            </li>
                            <li>
                                <a href="{{route('main-admin.subscriber.add-billing',[$data['customer']->id])}}"
                                   class="create-form-btn">Add Billing Info</a>
                                <span class="create-form-content">Update the billing address details being used for this customer</span>
                            </li>
                            <li>
                                <a href="{{route('main-admin.subscriber.update-detail',[$data['customer']->id])}}"
                                   class="create-form-btn">Change Customer Details</a>
                                <span class="create-form-content">Update customer details like name, email and company</span>
                            </li>
                            <li>
                                <a href="{{route('main-admin.subscriber.create-new-subscription',[$data['customer']->id])}}"
                                   class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                        </ul>
                    </div>
                    <div id="Add-Charge" class="container tab-pane fade"><br>
                        <ul class="action-tab-ul">
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                        </ul>
                    </div>
                    <div id="Add-Addon" class="container tab-pane fade"><br>
                        <ul class="action-tab-ul">
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                        </ul>
                    </div>
                    <div id="Promotional-Credits" class="container tab-pane fade"><br>
                        <ul class="action-tab-ul">
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                        </ul>
                    </div>
                    <div id="Record-Payment" class="container tab-pane fade"><br>
                        <ul class="action-tab-ul">
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                            <li>
                                <a href="#" class="create-form-btn">Create New Subscription</a>
                                <span class="create-form-content">Create a new subscription for this customer</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@include('MainSite.Popups.Customer.auto-contact-popup')