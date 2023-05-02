<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\DisLike;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();

        // для каждого поста получаем лайки, относящиеся к нему
        $likes = collect();
        $dislikes = collect();
        $comments = collect();
        foreach ($posts as $post) {
            $post_likes = Like::where('post_id', $post->id)->get();
            $likes->put($post->id, $post_likes->count());
            $post_dislikes = DisLike::where('post_id', $post->id)->get();
            $dislikes->put($post->id, $post_dislikes->count());
            $post_comments = Comment::where('post_id', $post->id)->get();
            $comments->put($post->id, $post_comments->count());
        }

        return view('blog', compact('posts', 'likes','dislikes','comments'));
    }
    public function create(Request $request)
    {
        if (Auth::check() && strlen($request->text) > 3) {
            if (!$request->has('text')) {
                return response()->json(['error' => 'Не указан текст поста'], 400);
            }

            // Создаем новый пост
            $post = Post::create([
                'text' => $request->text
            ]);

            // Возвращаем успешный ответ с данными о созданном посте
            return response()->json(['post' => $post], 200);
        }
    }
}
