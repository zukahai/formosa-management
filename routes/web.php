<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;


Route::get('/', function () {
    return view('welcome')->name('login');
});

Route::group(['prefix' => 'files', 'middleware' => ['web']], function () {
    \FileManager::routes();
    Route::get('/', [FileController::class, 'index'])->name('file.index');
    Route::get('/upload', [FileController::class, 'viewUpload'])->name('file.upload');
    Route::post('/upload', [FileController::class, 'upload'])->name('file.upload.post');
});
Route::group(['prefix' => 'file-management', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});