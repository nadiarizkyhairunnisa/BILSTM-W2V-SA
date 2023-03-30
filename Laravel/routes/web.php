<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\ModelingController;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/dataset', [DatasetController::class, 'index'])->name('dataset');
Route::get('/demo', [DemoController::class, 'index'])->name('demo');
Route::post('/demo', [DemoController::class, 'getData'])->name('demo.post');
Route::get('/modeling', [ModelingController::class, 'index'])->name('modeling');
Route::post('/modeling', [ModelingController::class, 'getTableData'])->name('modeling.post');
