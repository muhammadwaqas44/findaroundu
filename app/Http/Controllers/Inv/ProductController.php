<?php

namespace App\Http\Controllers\Inv;

use App\Business;
use App\Category;
use App\Inv\InvProduct;
use App\Inv\InvProductReview;
use App\MainCity;
use App\MainCountry;
use App\MainCurrency;
use App\MainState;
use App\Services\Inv\InvReviewService;
use App\Services\Inv\ProductsService;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function index(Request $request, ProductsService $productsService)
    {
        $data['all_products'] = $productsService->getAllProducts($request);

        return view('User.Inv.Products.all-products',compact('data'));
    }

    public function viewProducts(Request $request, ProductsService $productsService)
    {
        if($request->posted_by == "me") {
            $data['all_products'] = $productsService->getAllAddsDataUser($request);
        }else{
            $data['all_products'] = $productsService->getAllProductsFront($request);
            $data['latest_products']= InvProduct::all()->sortByDesc('id')->take(5);
        }

        return view('User.Inv.Products.front-products-listing',compact('data'));
    }


    public function createProduct()
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::shopping()->whereNull('parent_id')->get();
        $data['currency'] = MainCurrency::all();
        $data['business'] = Business::all();

        return view('User.Inv.Products.create-products',compact('data'));
    }

    public function editProduct($id)
    {
        $data['countries'] = MainCountry::all();
        $data['cities'] = MainCity::all();
        $data['states'] = MainState::all();
        $data['categories'] = Category::company()->get();
        $data['currency'] = MainCurrency::all();
        $data['business'] = Business::all();
        $data['product'] = InvProduct::find($id);

        return view('User.Inv.Products.edit-products',compact('data'));
    }

    public function getSubCategory($id)
    {
        $category = Category::where('parent_id','=',$id)->get();

        return response()->json($category);
    }

    public function insertProduct(Request $request, ProductsService $productsService)
    {
        $product = $productsService->saveProduct($request);
        return redirect()->route('user.create-product');
    }

    public function productDetail($id, InvReviewService $reviewService)
    {
        $data['add_detail'] = InvProduct::find($id);
        $data['flag'] = 'Product';
        $data['reviews'] = $data['add_detail']->reviews();
        $data['reviews_detail'] = $reviewService->getAllProductReviewsDetail($id);
        return view('User.Inv.Products.front-products-detail', compact('data'));
    }

    public function saveReview(Request $request, InvReviewService $reviewService)
    {
        $reviewService->giveInvProductReview($request);
        return redirect()->back();
    }

    public function updateProduct(Request $request, ProductsService $productsService)
    {

        $product = $productsService->updateProduct($request);
        return redirect()->route('user.all-products');
    }

    public function deleteProduct($id, ProductsService $productsService)
    {
        $product = $productsService->deleteProduct($id);
        if($product == 'success') {
            return redirect()->route('user.all-products');
        }
    }
}
