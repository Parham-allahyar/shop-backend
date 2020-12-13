<?php


use Illuminate\Support\Facades\Route;
use Auth\Http\Controllers\AuthController;




Route::Post('/login', [AuthController::class, 'login']);
Route::Post('/auth', [AuthController::class, 'auth']);