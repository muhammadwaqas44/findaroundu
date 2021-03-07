<?php

namespace App\Services\Inv;

use App\Inv\InvProductOrder as Order;
use App\Inv\InvProductOrderDetail;
use Auth;

class OrdersService
{
    private $orderPagination = 2;

    public function getMyOrders($request)
    {
        $data = Order::with(['orderDetail', 'currencyDetail'])->where('user_id', Auth::user()->id);

        if ($request->filled('search')) {
            $data = $data->where('order_no', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('sort_by')) {
            if($request->sort_by == "latest"){
                $data = $data->latest();
            } else {
                $data = $data->oldest();
            }
        } else {
            $data = $data->latest();
        }

        $data = $data->paginate($this->orderPagination);

        $request->flash();
        return $data;
    }

    public function orderManagement($request){
        $data = InvProductOrderDetail::with(['order.currencyDetail', 'product'])->whereHas('product', function ($query) {
            $query->where('created_by', '=', Auth::user()->id);
        });

        if ($request->filled('search')) {
            $data = $data->whereHas('product', function ($query) use ($request) {
                $query->where('product_name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('sort_by')) {
            if($request->sort_by == "latest"){
                $data = $data->latest();
            } else {
                $data = $data->oldest();
            }
        } else {
            $data = $data->latest();
        }

        $data = $data->paginate($this->orderPagination);

        $request->flash();
        return $data;
    }

    public function orderDetail($orderId){
        $data = Order::with(['orderDetail.product', 'currencyDetail'])->where(['user_id' => Auth::user()->id, "id" => $orderId])->first();
        return $data;
    }

    public function updateUserOrderStatus($request){
        $data = InvProductOrderDetail::where("id", $request->order_detail)->whereHas('product', function ($query) {
            $query->where('created_by', '=', Auth::user()->id);
        })->first();
        if($data){
            $data->status = $request->order_status;
            if($data->save()){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
