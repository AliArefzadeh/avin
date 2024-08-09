<?php

use App\Http\Controllers\Api\v1\AuthController;
use App\Http\Controllers\Api\v1\CommentController;
use App\Http\Controllers\Api\v1\PostController;
use App\Http\Controllers\Api\v1\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
//public
Route::post('register',[AuthController::class,'register']);

//global protected
Route::prefix('/v1')->group(function () {
    Route::post('auth/login', [AuthController::class, 'login'])->middleware('guest')->name('auth.login');
    Route::get('auth/me', [AuthController::class, 'me'])->middleware(['auth:sanctum']);
    Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

});

Route::group(['prefix' => 'active','middleware' => ['auth:sanctum']],function () {
    //posts
    Route::get('/posts',[PostController::class,'index'])->name('post.index');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
    Route::post('/posts',[PostController::class,'store'])->name('post.store');
    Route::put('posts/{post}',[PostController::class,'update'])->name('post.update');
    Route::delete('posts/{post}',[PostController::class,'destroy'])->name('post.destroy');

    //video
    Route::get('/videos',[VideoController::class,'index'])->name('video.index');
    Route::get('/videos/{video}',[VideoController::class,'show'])->name('video.show');
    Route::post('/videos',[VideoController::class,'store'])->name('video.store');
    Route::put('videos/{video}',[VideoController::class,'update'])->name('video.update');
    Route::delete('videos/{video}',[VideoController::class,'destroy'])->name('video.destroy');

    //comments
    Route::get('/comments',[CommentController::class,'index'])->name('comment.index');
    Route::get('/comments/{comment}',[CommentController::class,'show'])->name('comment.show');
    Route::post('/comments',[CommentController::class,'store'])->name('comment.store');
    Route::put('comments/{comment}',[CommentController::class,'update'])->name('comment.update');
    Route::delete('comments/{comment}',[CommentController::class,'destroy'])->name('comment.destroy');
});
