@extends('layout.app')
@section('title','My Orders')
@section('content')

    @include('layout-user.front-top-menu')

    <div class="body-container dashboard-bg">
        <div class="custom-container">
            <div class="right-rable-main">
                <div class="search-drop-down-main">

                    @if(session()->has('status'))
                        <div class="{{session()->get('alert-class')}}">
                            {{session()->get('status')}}
                        </div>
                    @endif

                    <form id="formSearch" method="get" action="{{route('user.my-orders')}}">
                        <div class="search-drop-down-main">
                            <div class="search-left">
                                <input type="text" name="search" value="{{ old('search') }}" placeholder="By Order Number" name="search">
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
                        My Orders
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
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->order_no}}</span></div>
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
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Total Items</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->orderDetail->count()}}</span></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5 col-sm-6 col-6"><span class="customer-id">Total Price</span></div>
                                            <div class="col-md-7 col-sm-6 col-6"><span class="custom-right-text">{{$record->total_price}} {{$record->currencyDetail->currency}}</span></div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="table-icon-ul">
                                    <li><a href="{{route('user.order-detail',[$record->id])}}"><i class="far fa-eye" title="view details"></i></a></li>
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
