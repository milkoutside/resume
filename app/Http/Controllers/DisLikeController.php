<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DisLikeController extends Controller
{
    public function makeDislike(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $ip = $request->ip();

        if ($post->likes()->where('userIp', $ip)->exists()) {
            $post->likes()->where('userIp', $ip)->delete();
            $post->dislikes()->create([
                'userIp' => $ip,
            ]);
            return 0;
        }

        if ($post->dislikes()->where('userIp', $ip)->exists()) {
            $post->dislikes()->where('userIp', $ip)->delete();
            return 1;
        }

        $post->dislikes()->create([
            'userIp' => $ip,
        ]);

        return 2;
    }
}
