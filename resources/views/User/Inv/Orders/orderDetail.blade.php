@extends('layout.app')
@section('title','Order Detail')
@section('content')

    @include('layout-user.front-top-menu')

    <div class="body-container dashboard-bg">
        <div class="custom-container">
            <div class="right-rable-main">
                <div class="table-sec-main">
                    <div class="table-first-sec">
                        Order Summery
                    </div>
                    <div class="start-table">
                        <div class="start-table-main">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Order No</span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$data->order_no}}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Status</span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text btn {{($data->status == "In-progress")? "btn-info": (($data->status == "Delivered")? "btn-success": "btn-danger")}} btn-sm">{{$data->status}}</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Created At</span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$data->created_date}}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Total Items</span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$data->orderDetail->count()}}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Total Price</span></div>
                                        <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$data->total_price}} {{$data->currencyDetail->currency}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-sec-main">
                    <div class="table-first-sec">
                        Order Detail
                    </div>
                    <div class="start-table">
                        @forelse($data->orderDetail as $record)
                            <div class="start-table-main">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Product Name</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->product->product_name}}</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Total Quantity</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->quantity}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Price</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->product_price}} {{$data->currencyDetail->currency}}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="start-table-main">
                                No Record Found.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

