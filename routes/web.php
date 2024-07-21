<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\FileUploadController::class, 'index'])->name('index');
Route::post('/upload', [\App\Http\Controllers\FileUploadController::class, 'upload'])->name('upload');
