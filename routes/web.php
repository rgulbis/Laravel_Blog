<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

// Posts

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}', [PostController::class, 'show']);

Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);

Route::delete('/posts/{post}', [PostController::class, 'destroy']);

// Categorys

Route::get('/categorys', [CategoryController::class, 'index']);

Route::get('/categorys/create', [CategoryController::class, 'create']);
Route::post('/categorys', [CategoryController::class, 'store']);

Route::get('/categorys/{category}', [CategoryController::class, 'show']);

Route::get('/categorys/{category}/edit', [CategoryController::class, 'edit']);
Route::put('/categorys/{category}', [CategoryController::class, 'update']);

Route::delete('/categorys/{category}', [CategoryController::class, 'destroy']);

// Comments 

Route::get('/comments/create', [CommentController::class, 'create']);
Route::post('/comments', [CommentController::class, 'store']);

Route::get('/comments/{comment}/edit', [CommentController::class, 'edit']);
Route::put('/comments/{comment}', [CommentController::class, 'update']);

Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);