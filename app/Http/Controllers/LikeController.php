<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function makeLike(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $ip = $request->ip();

        if ($post->likes()->where('userIp', $ip)->exists()) {
            $post->likes()->where('userIp', $ip)->delete();
            return 0;
        }

        if ($post->dislikes()->where('userIp', $ip)->exists()) {
            $post->dislikes()->where('userIp', $ip)->delete();
            $post->likes()->create([
                'userIp' => $ip,
            ]);
            return 1;
        }

        $post->likes()->create([
            'userIp' => $ip,
        ]);

        return 2;
    }
}
