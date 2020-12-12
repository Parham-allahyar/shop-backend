<?php


use Illuminate\Support\Facades\Route;
use AdminAuth\Http\Controllers\AuthController;




Route::Post('/login', [AuthController::class, 'login']);
