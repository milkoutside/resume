<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisLike extends Model
{
    protected $table = 'dislikes';
    protected $guarded = false;
    use HasFactory;
}
