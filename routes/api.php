<?php

use App\Http\Controllers\Category\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Tag\TagController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('tasks', TaskController::class);
Route::apiResource('categories', CategoryController::class)
    ->only(['index', 'show']);
Route::apiResource('tags', TagController::class)
    ->only(['index', 'show']);
