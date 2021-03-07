<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use App\Comment;
use App\Like;
use Auth;
use App\Review;

class LikeService
{

    public function like($reviewId = null, $commentId = null){
        $id = 0;
        $columnName = "";
        if(!empty($reviewId)){
            $id =  $reviewId;
            $columnName = "review_id";
        }

        if(!empty($commentId)){
            $id =  $commentId;
            $columnName = "comment_id";
        }


        if (Like::where('user_id', Auth::user()->id)->where($columnName, $id)->count() != 0) {
            Like::where('user_id', Auth::user()->id)->where($columnName, $id)->delete();
            $likesCount = 0;
            if(!empty($reviewId)){
                $id =  $reviewId;
                $likesCount = Review::find($id)->likes()->count();
            }

            if(!empty($commentId)){
                $id =  $commentId;
                $likesCount = Comment::find($id)->likes()->count();
            }

            return response()->json([
                'status' => 'dis_like',
                'likes_count' => $likesCount
            ]);
        } else {
            Like::create(['user_id' => Auth::user()->id, $columnName => $id]);
            if(!empty($reviewId)){
                $id =  $reviewId;
                $likesCount = Review::find($id)->likes()->count();
            }
            if(!empty($commentId)){
                $id =  $commentId;
                $likesCount = Comment::find($id)->likes()->count();
            }
            return response()->json([
                'status' => 'like',
                'likes_count' => $likesCount
            ]);

        }
    }
}