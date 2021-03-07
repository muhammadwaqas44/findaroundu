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
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['subscription_detail']->user->id}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Email</span></div>
                            <div class="col-6"><span class="custom-right-text2"><a
                                            href="{{route('admin.user-detail',[$data['subscription_detail']->user->id])}}">{{$data['subscription_detail']->user->email}}</a></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Name</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['subscription_detail']->user->full_name}}</span>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Configuration</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Payments Method Details</span></div>
                            <div class="col-6 "><span
                                        class="custom-right-text2">
                                    <a href="{{route('admin.plan-detail',[$data['subscription_detail']->plan->id])}}">{{$data['subscription_detail']->plan->name}}</a>
                                </span>
                            </div>
                        </div>
                        {{-- <div class="row">
                             <div class="col-6  "><span class="customer-id2">Billing Info</span></div>
                             <div class="col-6  "><span
                                         class="custom-right-text2">
                                    @if(!empty($data['subscription_detail']->user->billingInfo)) present @endif <a
                                             href="--}}{{--{{route('admin.subscriber.add-billing',[$data['subscription_detail']->user->id,"flag"=>"billing"])}}--}}{{--">@if(!empty($data['subscription_detail']->user->billingInfo))
                                             Update Billing @else Add Billing @endif   </a>
                                 </span>
                             </div>
                         </div>--}}
                        <div class="row">
                            <div class="col-6"><span class="customer-id2"> Auto Collection <small>(Customer)</small></span>
                            </div>
                            <div class="col-6"><span
                                        class="custom-right-text2">
                                    {{$data['subscription_detail']->user->auto_collection}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <span class="customer-details">Subscription Details</span>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-8">





                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Subscription Id</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['subscription_detail']->id}}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Stripe Subscription Id</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['subscription_detail']->stripe_subscription_id}}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Start Date</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['subscription_detail']->start_date}}</span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">End Date</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['subscription_detail']->end_date}}</span>
                            </div>
                        </div>








                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Total Price</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">
                                    @if($data['subscription_detail']->total_price != null)
                                        {{$data['subscription_detail']->total_price}}
                                    @else
                                        Free
                                    @endif

                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Cancelled At</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">{{$data['subscription_detail']->cancelled_at}}</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Status</span></div>
                            <div class="col-6"><span class="custom-right-text2"> @if($data['subscription_detail']->active == 'active')
                                        <span class="custom-right-text btn btn-success btn-sm"> ACTIVE</span> @elseif($data['subscription_detail']->active == 'cancel')
                                        <span class="custom-right-text btn btn-danger btn-sm"> CANCELLED</span> @endif </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Plan</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">
                                    <a href="{{route('admin.plan-detail',[$data['subscription_detail']->plan->id])}}">{{$data['subscription_detail']->plan->name}}</a>
                                </span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Plan Features</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">
                                    <a href="{{route('admin.plan-detail',[$data['subscription_detail']->plan->id])}}">{{$data['subscription_detail']->plan->planFeatures->first()->quantity}}</a>
                                </span>
                            </div>
                        </div>


@foreach($data['subscription_detail']->addons as $addon)

                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Addons</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">
                                    <a href="{{route('admin.addon-detail',[$addon->id])}}">{{$addon->name}} </a> <label class="badge badge-info">Price : {{$addon->total_price}}</label>
                                </span>
                            </div>
                        </div>
@endforeach
                        <div class="row">
                            <div class="col-6"><span class="customer-id2">Payment Method Details</span></div>
                            <div class="col-6"><span
                                        class="custom-right-text2">
                                    <a href="{{route('admin.plan-detail',[$data['subscription_detail']->plan->id])}}">{{$data['subscription_detail']->plan->name}}</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <span class="customer-details">Billing Info</span>

                </div>
                @if(!empty($data['subscription_detail']->billingInfo))
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">First name</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->first_name}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Last name</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->last_name}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Email</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->email}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Phone</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->phone}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Address</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->address}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6"><span class="customer-id2">City</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->city}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Zip</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->zip}}</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6"><span class="customer-id2">State</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->state}}</span>
                                </div>
                            </div>


                        </div>
                    </div>
                @else
                    <div class="row"><span
                                class="Contacts-not-present">No billing info is added against this customer.</span>
                    </div>
                @endif
                <br>
                <div class="row">
                    <span class="customer-details">Unbilled Charges</span>
                </div>
                <div class="row"><span
                            class="Contacts-not-present">No unbilled charges found for this subscription</span></div>
                <div class="row">
                    {{--<div class="col-12 col-lg-8">
                        @if($data['subscription_detail']->billingInfo()->count() == 0)
                            <a href="{{route('user.customer.add-billing',[$data['subscription_detail']->id])}}"
                               class="ad-bilibg-text">Add Billing Info</a>
                        @else
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">First Name</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->first_name}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Last Name</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->last_name}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Email</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->email}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Phone</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->phone}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Address</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->phone}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">City</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->phone}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">Zip</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->phone}}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6"><span class="customer-id2">State</span></div>
                                <div class="col-6"><span
                                            class="custom-right-text2">{{$data['subscription_detail']->billingInfo->phone}}</span>
                                </div>
                            </div>
                        @endif
                    </div>--}}
                </div>

                {{--  <div class="row">
                      @if($data['subscription_detail']->customerContact()->count() == 0)
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
                                  @foreach($data['subscription_detail']->customerContact as $contact)
                                      <tr>
                                          <td>{{$contact->email}}
                                              @if($contact->active == 1)
                                                  <a href="{{route('user.customer.disable-contact',[$contact->id])}}">disable</a>
                                              @else
                                                  <a href="{{route('user.customer.enable-contact',[$contact->id])}}">enable</a>
                                              @endif

                                              @if($contact->is_primary == 0)
                                                  <a href="{{route('user.billing-add-primary',[$data['customer']->id, $contact->id])}}">- Add Primary</a>
                                                  @else
                                                  <span class="primary-content btn btn-primary">Primary</span>
                                              @endif
                                          </td>
                                          <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                                          <td>{{$contact->phone}} </td>
                                          <td style="text-align: right;"><a href="#" data-toggle="modal"
                                                                            data-target="#edit-contact_{{$contact->id}}"> Edit </a>&nbsp <a
                                                      href="{{route('user.customer.delete-contact',[$contact->id])}}"
                                                     >Remove </a>
                                          </td>
                                      </tr>
                                      @include('Popups.Customer.edit-contact-popup',['editContact' => $contact])
                                  @endforeach


                                  </tbody>
                              </table>
                          </div>
                      @endif

                  </div>--}}


                <div class="row">
                    <div class="tab-chargbe">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home">Invoices</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#menu2">Transactions</a>
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

                                    @if($data['subscription_detail']->invoices()->count() == 0)
                                        <span class="no-promotional">No <strong>promotional credits</strong> found for this customer</span>
                                    @else
                                        @foreach($data['subscription_detail']->invoices as $invoice)
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Invoice Id</th>
                                                    <th>Invoice name</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{$invoice->id}}</td>
                                                    <td>
                                                        <a href="{{route('main-admin.invoice-detail',[$invoice->id])}}">{{$invoice->invoice_name}}</a>
                                                    </td>
                                                    <td>{{$invoice->is_paid}}</td>
                                                    <td>{{$invoice->created_at}}</td>
                                                </tr>


                                                </tbody>
                                            </table>
                                        @endforeach
                                    @endif
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
    {{--    @if(empty($data['customer']->invoice_notes))
    <a href="#" onclick="hide('no-invoice-comments')" style="float:right;"
       data-toggle="collapse"
       data-target="#add-note">Add Note</a>
    @else
    <a href="{{route('user.customer.delete-invoice-note',[$data['customer']->id])}}"
       style="float:right;">Delete Note</a>
    @endif--}}
</span>
                {{--
                @if(empty($data['customer']->invoice_notes))
                <span id="no-invoice-comments"
                      class="present-comment">No Invoice Notes present for this customer</span>
                <div class="toggle-textarea collapse" id="add-note">
                    <form method="post"
                          action="{{route('user.customer.add-invoice-note',[$data['customer']->id])}}">
                        @csrf
                        <textarea placeholder="Add a notes" name="invoice_notes"></textarea>
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
                @endif--}}
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
                                <a href="{{route('admin.subscription.delete-subscription',[$data['subscription_detail']->id])}}"
                                   class="create-form-btn">Delete Subscription</a>
                                <span class="create-form-content">Delete this Subscription</span>
                            </li>
                            <li>
                                <a href="{{route('admin.user-detail',[$data['subscription_detail']->user->id])}}"
                                   class="create-form-btn">View Customers Details</a>
                                <span class="create-form-content">View the customer details like name, email and company</span>
                            </li>
                            {{-- <li>
                                 <a href="--}}{{--{{route('main-admin.subscriber.add-billing',[$data['subscription_detail']->user->id,"flag"=>"billing"])}}--}}{{--"
                                    class="create-form-btn">@if(!empty($data['subscription_detail']->user->billingInfo))
                                         Update Billing @else Add Billing @endif  </a>
                                 <span class="create-form-content">Update or Add the billing address details being used for this customer</span>
                             </li>--}}
                            @if($data['subscription_detail']->active == "active")
                                <li>
                                    <a href="{{route('admin.subscription.cancel-subscription',[$data['subscription_detail']->id])}}"
                                       class="create-form-btn">Cancel Immediately</a>
                                    <span class="create-form-content">Create a new subscription for this customer</span>
                                </li>
                            @elseif($data['subscription_detail']->active == "cancel")
                                <li class="bg-danger">
                                    <a style="color:white;" class="create-form-btn">Subscription Cancelled</a>
                                    <a href="{{route('admin.subscription.activate-subscription',[$data['subscription_detail']->id])}}"
                                       class="create-form-btn" style="color:white;"><strong>Reactive
                                            Subscription</strong></a>

                                </li>
                            @endif
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

            <div class="events-tab-main right-menu-tab" style="border:0px;">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Timeline</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Created At: {{$data['subscription_detail']->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Start Date: {{$data['subscription_detail']->start_date}}</td>
                    </tr>
                    @if($data['subscription_detail']->active == 'cancel')
                        <tr>
                            <td>Cancelled At: {{$data['subscription_detail']->cancelled_at}}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<style>.body {
        background-color: #fff !important;
    }</style>

