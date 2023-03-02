<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\ModelingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/dataset', [DatasetController::class, 'index'])->name('dataset');
Route::get('/demo', [DemoController::class, 'index'])->name('demo');
Route::get('/modeling', [ModelingController::class, 'index'])->name('modeling');

// Route::get('/', function () {return view('index');
// });

// Route::get('/dataset', function () {
//     return view('dataset');
// });

// Route::get('/demo', function () {
//     return view('demo');
// });

// Route::get('/modeling', function () {
//     return view('modeling');
// });
