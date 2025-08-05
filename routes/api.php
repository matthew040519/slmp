<?php

use App\Http\Controllers\Api\AlbumsController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TodoController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    // Protected routes go here
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::post('/users', [UserController::class, 'create']);
    Route::delete('users/{id}', [UserController::class, 'delete']);
    Route::put('/users/{id}', [UserController::class, 'update']);

    Route::get('/todos', [TodoController::class, 'index']);
    Route::get('/todos/{id}', [TodoController::class, 'show']);
    Route::post('/todos', [TodoController::class, 'create']);
    Route::delete('todos/{id}', [TodoController::class, 'delete']);
    Route::put('/todos/{id}', [TodoController::class, 'update']);

    Route::get('/albums', [AlbumsController::class, 'index']);
    Route::get('/albums/{id}', [AlbumsController::class, 'show']);
    Route::post('/albums', [AlbumsController::class, 'create']);
    Route::delete('albums/{id}', [AlbumsController::class, 'delete']);
    Route::put('/albums/{id}', [AlbumsController::class, 'update']);

    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/comments/{id}', [CommentController::class, 'show']);
    Route::post('/todos', [CommentController::class, 'create']);
    Route::delete('comments/{id}', [CommentController::class, 'delete']);
    Route::put('/comments/{id}', [CommentController::class, 'update']);

    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/posts/{id}', [PostController::class, 'show']);
    Route::delete('posts/{id}', [PostController::class, 'delete']);
    Route::put('/posts/{id}', [PostController::class, 'update']);

    Route::get('/photos', [PhotoController::class, 'index']);
    Route::get('/photos/{id}', [PhotoController::class, 'show']);
    Route::delete('photos/{id}', [PhotoController::class, 'delete']);
    Route::put('/photos/{id}', [PhotoController::class, 'update']);


    Route::get('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    });
});