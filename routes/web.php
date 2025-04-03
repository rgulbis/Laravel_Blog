<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;


// Auth

Route::get('/', [PostController::class, 'index']);

Route::get('/login', [SessionController::class, 'create'])->name("login")->middleware("guest");
Route::post('/login', [SessionController::class, 'store'])->middleware("guest");

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware("auth");

Route::get('/register', [RegisterController::class, 'create'])->middleware("guest");
Route::post('/register', [RegisterController::class, 'store'])->middleware("guest");


// Posts

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create'])->middleware("auth");
Route::post('/posts', [PostController::class, 'store'])->middleware("auth");

Route::get('/posts/{post}', [PostController::class, 'show'])->middleware("auth");

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->middleware("auth");
Route::put('/posts/{post}', [PostController::class, 'update'])->middleware("auth");

Route::delete('/posts/{post}', [PostController::class, 'destroy'])->middleware("auth");

// Categorys

Route::get('/categorys', [CategoryController::class, 'index']);

Route::get('/categorys/create', [CategoryController::class, 'create'])->middleware("auth");
Route::post('/categorys', [CategoryController::class, 'store'])->middleware("auth");

Route::get('/categorys/{category}', [CategoryController::class, 'show'])->middleware("auth");

Route::get('/categorys/{category}/edit', [CategoryController::class, 'edit'])->middleware("auth");
Route::put('/categorys/{category}', [CategoryController::class, 'update'])->middleware("auth");

Route::delete('/categorys/{category}', [CategoryController::class, 'destroy'])->middleware("auth");

// Comments 

Route::get('/comments/create', [CommentController::class, 'create'])->middleware("auth");
Route::post('/comments', [CommentController::class, 'store'])->middleware("auth");

Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->middleware("auth");
Route::put('/comments/{comment}', [CommentController::class, 'update'])->middleware("auth");

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->middleware("auth");