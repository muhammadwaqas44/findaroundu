<?php

namespace App\Http\Controllers;


use App\Services\CommentService;
use Illuminate\Http\Request;
use App\Services\ReviewService;
use App\Services\LikeService;

class ReviewController extends Controller
{
    public function giveServiceReview(Request $request, ReviewService $reviewService)
    {

        if($request->rating !=null && $request->review != null) {
            $reviewService->giveServiceReview($request);
            return redirect()->back();
        }else{
        $request->session()->flash('error','Rating or Review is empty!!');
        return redirect()->back();}
    }


    public function giveBusinessReview(Request $request, ReviewService $reviewService)
    {
        if($request->rating !=null && $request->review != null) {
            $reviewService->giveServiceReview($request, 'business');
            return redirect()->back();
        }else{
        $request->session()->flash('error','Rating or Review is empty!!');
        return redirect()->back();}
    }

    public function giveAddReview(Request $request, ReviewService $reviewService)
    {

        if($request->rating !=null && $request->review != null) {
            $reviewService->giveServiceReview($request, 'add');
            return redirect()->back();
        }else{
        $request->session()->flash('error','Rating or Review is empty!!');
        return redirect()->back();}
    }

    public function getAddsReviews($addId, ReviewService $reviewService)
    {
        return $reviewService->getReviews(null, $addId,null );
    }

    public function getBusinessReviews($businessId, ReviewService $reviewService)
    {
        return $reviewService->getReviews(null, null, $businessId);
    }


    public function getServiceReviews($serviceId, ReviewService $reviewService)
    {
        return $reviewService->getReviews($serviceId, null, null);
    }

    public function giveComment($reviewId, Request $request, CommentService $commentService)
    {
        return $commentService->reviewComment($reviewId, $request);
    }

    public function loadComments($reviewId, CommentService $commentService)
    {
        return $commentService->loadComments($reviewId);
    }


    public function likeReview($reviewId, LikeService $likeService)
    {
        return $likeService->like($reviewId);
    }


    public function likeReviewComment($commentId, LikeService $likeService)
    {
        return $likeService->like(null, $commentId);
    }

}
