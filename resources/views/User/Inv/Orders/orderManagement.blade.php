@extends('layout.app')
@section('title','Order Management')
@section('content')

    @include('layout-user.front-top-menu')

    <div class="body-container dashboard-bg">
        <div class="custom-container">
            <div class="right-rable-main">
                <div class="search-drop-down-main">

                    @if(session()->has('status'))
                        <div class="alert {{session()->get('alert-class')}}">
                            {{session()->get('status')}}
                        </div>
                    @endif

                    <form id="formSearch" method="get" action="{{route('user.order-management')}}">
                        <div class="search-drop-down-main">
                            <div class="search-left">
                                <input type="text" name="search" value="{{ old('search') }}" placeholder="By Product Name" name="search">
                                <input type="submit" value="">
                            </div>
                            <div class="drop-down-right-main">
                                <span class="sort-name">Sort By</span>
                                <span class="search-drop-down2">
                                    <select class="form-control" name="sort_by" onchange="this.form.submit()">
                                        <option value="latest"
                                            {{(app('request')->input('sort_by') == "latest")? "selected":"" }} >Created At : (Latest First)</option>
                                        <option value="oldest"
                                            {{(app('request')->input('sort_by') == "oldest")? "selected":"" }} >Created At : (Oldest First)</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-sec-main">
                    <div class="table-first-sec">
                        Order Management
                        <div class="pagination-top-main">
                            {{ $data->links('layouts.customPagination') }}
                        </div>
                    </div>
                    <div class="start-table">
                        @forelse($data as $record)
                            <div class="start-table-main">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Order No</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->order->order_no}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Product Name</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->product->product_name}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Status</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text btn {{($record->status == "In-progress")? "btn-info": (($record->status == "Delivered")? "btn-success": "btn-danger")}} btn-sm">{{$record->status}}</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Created At</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->created_date}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Price</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->product_price}} {{$record->order->currencyDetail->currency}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Quantity</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->quantity}}</span></div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="table-icon-ul">
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" aria-expanded="true" title="actions">
                                            <i class="fas fa-cog"></i> <i class="fas fa-caret-down"></i></a>
                                        <ul class="dropdown-menu">
                                            @if($record->status != "Pending")
                                                <li>
                                                    <form id="pendingForm{{$record->id}}" method="post" action="{{route("user.order-status-update")}}">
                                                        @csrf
                                                        <input type="hidden" name="order_detail" value="{{$record->id}}">
                                                        <input type="hidden" name="order_status" value="Pending">
                                                        <a href="javascript:void(0)" onclick="document.getElementById('pendingForm{{$record->id}}').submit()">Pending</a>
                                                    </form>
                                                </li>
                                            @endif
                                            @if($record->status != "In-progress")
                                                <li>
                                                    <form id="progressForm{{$record->id}}" method="post" action="{{route("user.order-status-update")}}">
                                                        @csrf
                                                        <input type="hidden" name="order_detail" value="{{$record->id}}">
                                                        <input type="hidden" name="order_status" value="In-progress">
                                                        <a href="javascript:void(0)" onclick="document.getElementById('progressForm{{$record->id}}').submit()">In-progress</a>
                                                    </form>
                                                </li>
                                            @endif
                                            @if($record->status != "Delivered")
                                                <li>
                                                    <form id="deliveredForm{{$record->id}}" method="post" action="{{route("user.order-status-update")}}">
                                                        @csrf
                                                        <input type="hidden" name="order_detail" value="{{$record->id}}">
                                                        <input type="hidden" name="order_status" value="Delivered">
                                                        <a href="javascript:void(0)" onclick="document.getElementById('deliveredForm{{$record->id}}').submit()">Delivered</a>
                                                    </form>
                                                </li>
                                            @endif
                                            @if($record->status != "Cancelled")
                                                <li>
                                                    <form id="cancelledForm{{$record->id}}" method="post" action="{{route("user.order-status-update")}}">
                                                        @csrf
                                                        <input type="hidden" name="order_detail" value="{{$record->id}}">
                                                        <input type="hidden" name="order_status" value="Cancelled">
                                                        <a href="javascript:void(0)" onclick="document.getElementById('cancelledForm{{$record->id}}').submit()">Cancelled</a>
                                                    </form>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                </ul>
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
