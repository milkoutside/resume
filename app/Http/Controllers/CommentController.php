<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($id){
        $comments = Comment::where('post_id', $id)->get();
        return $comments->toArray();
    }
    public function makeComment($postId,$name,$text){
        if($postId->isNotEmpty()
            && $name->isNotEmpty() && mb_strlen($name) > 3
            && $text->isNotEmpty() && mb_strlen($text) > 3
        ) {
            $comment =
                Comment::create([
                    'userName' => $name,
                    'post_id' => $postId,
                    'comment' => $text
                ]);

            return $comment;

        }
    }
    public function deleteComment($commentId){
        if (Auth::check() && $commentId->isNotEmpty())
        {
            Comment::where('id',$commentId)->delete();
        }
    }

}
