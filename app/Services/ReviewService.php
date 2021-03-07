<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use App\Business;
use App\FauJob;
use App\Inv\InvProduct;
use App\Inv\InvProductReview;
use App\Service;
use Auth;
use App\Add;
use App\Review;

class ReviewService
{

    public function giveServiceReview($request, $flag = 'service')
    {
        $id = 0;
        $columName = "";
        if($flag == 'service'){
            $columName = "service_id";
            $id = $request->service_id;
        }
        if($flag == 'business' || !empty($request->business_id)){

            $id = $request->business_id;
            $columName = "business_id";
        }
        else if($flag == 'add'){
            $id = $request->add_id;
            $columName = "add_id";
        }


        if($flag == 'add' || !empty($request->add_id)){

            $id = $request->add_id;
            $columName = "add_id";
        }

        Review::create(['user_id' => Auth::user()->id, $columName => $id, 'rating' => $request->rating, 'review' => $request->review, 'name' => Auth::user()->name, 'phone' => Auth::user()->phone, 'email' => Auth::user()->email]);
        return 'success';
    }

    public function getAllReviewsDetail($serviceId, $addId, $businessId,$jobId)
    {
        $id = 0;
        $reviews = null;


        if (!empty($serviceId)) {
            $id = $serviceId;
          // dd($id);
            $reviews = Service::withoutGlobalScopes()->find($id)->reviews;
        } else if (!empty($addId)) {
            $id = $addId;

            $reviews = Add::withoutGlobalScopes()->find($id)->reviews;
        }else if (!empty($jobId)) {
            $id = $jobId;

            $reviews = FauJob::find($id)->reviews;
        }
        else {
            $id = $businessId;
            $reviews = Business::withoutGlobalScopes()->find($id)->reviews;
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

    public function getReviews($serviceId, $addId, $businessId)
    {
        $id = 0;
        $reviews = null;
        if (!empty($serviceId)) {
            $id = $serviceId;

            $reviews = Service::withoutGlobalScopes()->find($id)->reviews;
        } else if (!empty($addId)) {
            $id = $addId;
            $reviews = Add::withoutGlobalScopes()->find($id)->reviews;
        } else {
            $id = $businessId;
            $reviews = Business::withoutGlobalScopes()->find($id)->reviews;
        }

        $data = null;

        foreach ($reviews as $review) {

            $userStatus = null;
            $deletePostUrl = null;
            $likeBy = "not_me";
            $deleteReviewUrl = "";

            if (Auth::check()) {
                if ($review->likes->where('review_id', $review->id)->where('user_id', Auth::user()->id)->count() == 1) {
                    $likeBy = "me";
                }
                if ($review->user_id == Auth::user()->id) {
                    $userStatus = "me";
                    $deleteReviewUrl = route('user.review-delete', [ $review->id]);
                }
            }





            $data['reviews'][] = [
                'reviews_comments_count' => $review->comments->count(),
                'posted_by' => $userStatus,
                'review_delete_url' => $deleteReviewUrl,
                'review_likes' => $review->likes->count(),
                'like_by' => $likeBy,
                'created_at' => $review->created_at,
                'user_id' => $review->user->id,
                'posted_user_name' => $review->user->name,
                'user_img' => $review->user->profile_image,
                'rating' => $review->rating,
                'review' => $review->review,
                'desc' => $review->review,
                'review_id' => $review->id
            ];
        }

        return $data;
    }






}