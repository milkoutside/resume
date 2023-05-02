<?php

namespace App\Models;
use App\Models\DisLike;
use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = false;

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function dislikes()
    {
        return $this->hasMany('App\Models\DisLike');
    }
}
