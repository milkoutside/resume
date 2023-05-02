<?php

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('main');
})->name('home');

Route::get('/blog', [\App\Http\Controllers\PostController::class, 'index'])->name('blog');

Route::get('/admin', function () {
    return view('/admin/auth/login');
})->name('admin');

Route::get('/admin/check', [\App\Http\Controllers\AuthController::class, 'checkStatus']);
Route::get('/post', [\App\Http\Controllers\PostController::class, 'index']);
Route::post('/create-new', [\App\Http\Controllers\PostController::class, 'create']);

Route::group(['prefix' => 'comments'], function () {
    Route::get('/{id}', 'App\Http\Controllers\CommentController@index')->name('comments.show');
    Route::post('/{postId}/{name}/{text}', 'App\Http\Controllers\CommentController@makeComment');
    Route::post('/delete/{commentId}', 'App\Http\Controllers\CommentController@deleteComment');
});

Route::group(['prefix' => 'like'], function () {
    Route::post('/{id}', 'App\Http\Controllers\LikeController@makeLike')->name('comments.show');
});

Route::group(['prefix' => 'dislike'], function () {
    Route::post('/{id}', 'App\Http\Controllers\DisLikeController@makeDislike')->name('comments.show');
});

Route::post('/login', 'App\Http\Controllers\AuthController@login')->name('login');

Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');

Route::get('/locale', [\App\Http\Controllers\LocaleController::class, 'changeLocale'])->name('locale');

