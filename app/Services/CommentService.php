<?php
/**
 * Created by PhpStorm.
 * User: bilal
 * Date: 4/27/18
 * Time: 12:22 PM
 */

namespace App\Services;

use App\Comment;
use Auth;
use App\Review;

class CommentService
{

    public function reviewComment($id,$request){
        $comment = Comment::create(['review_id'=>$id,'comment'=>$request->comment,'user_id' => Auth::user()->id]);
        $data = null;
        foreach(Review::find($id)->comments()->orderBy('id','desc')->get() as $comment){

            $data['comments'][] = ['review_id'=>Review::find($id)->id,'user_name'=>$comment->user->name,'comment' => $comment->comment, 'created_at' => $comment->created_at, 'comment_id' => $comment->id, 'user_id' => $comment->user_id, 'user_image' => asset($comment->user->profile_image)];
        }

        return response()->json([
            $data,
            'comments_count' => Review::find($id)->comments()->count()
        ]);

    }


    public function loadComments($id){
        $data = null;
        foreach (Review::find($id)->comments()->orderBy('id', 'desc')->get() as $comment) {
            $likeByMe ="not_by_me";
            if($comment->likes()->where('user_id',Auth::user()->id)->get()->count() > 0){
                $likeByMe ="me";
            }


            $data['comments'][] = [
                'like_by' => $likeByMe,
                'likes' => $comment->likes()->count(),
                'replies_count'=>$comment->replies()->count(),
                'post_id' => Review::find($id)->id,
                'user_name' => $comment->user->name,
                'comment' => $comment->comment,
                'created_at' => $comment->created_at,
                'comment_id' => $comment->id,
                'user_id' => $comment->user_id,
                'user_image' => $comment->user->profile_image
            ];
        }

        return response()->json([
            $data
        ]);
    }

}