<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return  redirect()->route('posts.index');
});


Route::resource("posts", PostController::class)
->only(['index', 'show', 'create']);

Route::resource("posts.comments", CommentController::class)
->scoped(['comment' => 'post'])
->only(['store']);