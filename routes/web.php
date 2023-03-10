<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\MainController::class, 'index']);
Route::post('/attempt-word',[\App\Http\Controllers\MainController::class, 'attempt'])->name('attempt-word');

Route::get('/wiki',[\App\Http\Controllers\MainController::class, 'wiki'])->name('wiki');

//Route::get('/', function () {
//    return view('welcome');
//});
