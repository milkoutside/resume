<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
class User extends AuthenticatableUser implements Authenticatable

{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $guarded = false;

}
