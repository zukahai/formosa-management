<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('file')->group(function () {
    Route::get('/', [FileController::class, 'index'])->name('file.index');
    Route::get('/upload', [FileController::class, 'viewUpload'])->name('file.upload');
    Route::post('/upload', [FileController::class, 'upload'])->name('file.upload.post');
});
