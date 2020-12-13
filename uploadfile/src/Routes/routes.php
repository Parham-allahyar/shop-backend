<?php


use Illuminate\Support\Facades\Route;
use Uploadfile\Http\Controllers\UploadFileController;




Route::Post('/upload', [UploadFileController::class, 'create']);
