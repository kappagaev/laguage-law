<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logging', function () {
    return view('layouts/logging');
});

Route::post('/loging/submit', function () {
    return view('welcome');
})->name('logging-form');

Route::apiResource('user', UserController::class);

Route::resource('request', \App\Http\Controllers\RequestController::class);

