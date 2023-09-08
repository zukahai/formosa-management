<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('file')->group(function () {
    Route::get('/', [FileController::class, 'index']);
    Route::get('/upload', [FileController::class, 'viewUpload']);
    Route::post('/upload', [FileController::class, 'upload']);
});
