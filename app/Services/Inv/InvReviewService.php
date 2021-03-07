<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 3/5/2019
 * Time: 8:20 PM
 */

namespace App\Services\Inv;


use App\Inv\InvProduct;
use App\Inv\InvProductReview;
use Illuminate\Support\Facades\Auth;

class InvReviewService
{
    public function giveInvProductReview($request)
    {
        $id = 0;
        $columName = "";


        InvProductReview::create(['user_id' => Auth::user()->id, 'product_id' => $id, 'rating' => $request->rating, 'review' => $request->review, 'name' => Auth::user()->name, 'phone_number' => Auth::user()->phone, 'email' => Auth::user()->email]);
        return 'success';
    }


    public function getAllProductReviewsDetail($productId)
    {
        $id = 0;
        $reviews = null;


        if (!empty($productId)) {
            $id = $productId;

            $reviews = InvProduct::withoutGlobalScopes()->find($id)->reviews;
        }

        $data = null;
        $excellent = 0;
        $good = 0;
        $satisfactory = 0;
        $average = 0;
        $poor = 0;


        $excellent = $reviews->where('rating',5)->count('rating');
        $good = $reviews->where('rating',4)->count('rating');
        $satisfactory = $reviews->where('rating',3)->count('rating');
        $average = $reviews->where('rating',2)->count('rating');
        $poor = $reviews->where('rating',1)->count('rating');



        $totalReviews = $reviews->count('rating');
        if($totalReviews == 0)
        {
            $totalReviews = 1;
        }

        $data['excellent'] = number_format(($excellent/$totalReviews)*100,1);
        $data['good'] = number_format(($good/$totalReviews)*100,1);
        $data['satisfactory'] = number_format(($satisfactory/$totalReviews)*100,1);
        $data['average'] = number_format(($average/$totalReviews)*100,1);
        $data['poor'] = number_format(($poor/$totalReviews)*100,1);
        $data['total_reviews'] = $totalReviews;
        $data['reviews_average'] = number_format($reviews->avg('rating'),1);

        return $data;
    }
}