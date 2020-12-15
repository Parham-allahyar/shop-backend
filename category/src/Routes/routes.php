<?php


use Illuminate\Support\Facades\Route;
use Category\Http\Controllers\CategoryController;


Route::POST('/category/create', [CategoryController::class, 'store']);
Route::GET('/category', [CategoryController::class, 'index']);
Route::PUT('/category/{category}/update', [CategoryController::class, 'update']);
Route::DELETE('/category/{category}/delete', [CategoryController::class, 'delete']);