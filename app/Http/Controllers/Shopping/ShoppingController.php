<?php

namespace App\Http\Controllers\Shopping;

use App\Services\Inv\ProductsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingController extends Controller
{

    public function product_listing(Request $request, ProductsService $productsService)
    {
        $data['all_products'] = $productsService->getAllProducts($request);

        return view('User.Shopping.product-listing',compact('data'));
    }

}
