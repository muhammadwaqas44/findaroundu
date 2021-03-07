<?php

namespace App\Http\Controllers\Inv;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Inv\OrdersService;

class OrderController extends Controller
{
    // order listing
    public function index(Request $request, OrdersService $ordersService){
        $data = $ordersService->getMyOrders($request);
        return view("User.Inv.Orders.myOrders", compact(["data"]));
    }

    public function orderManagement(Request $request, OrdersService $ordersService){
        $data = $ordersService->orderManagement($request);
        return view("User.Inv.Orders.orderManagement", compact(["data"]));
    }

    public function orderDetail($id, OrdersService $ordersService){
        $data = $ordersService->orderDetail($id);
        if($data){
            return view("User.Inv.Orders.orderDetail", compact(["data"]));
        } else {
            abort("404");
        }
    }

    public function orderStatusUpdate(Request $request, OrdersService $ordersService){
        $data = $ordersService->updateUserOrderStatus($request);
        if($data){
            return back()->with(["status" => "Order status update successfully.", "alert-class" => "alert-success"]);
        } else {
            return back()->with(["status" => "Order status update failed.", "alert-class" => "alert-danger"]);
        }
    }

    public function adminAllOrders(Request $request, OrdersService $ordersService){
        $data = $ordersService->getMyOrders($request);
        return view("Admin.Inv.Orders.all-orders", compact(["data"]));
    }
}
