<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\CutiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('announcement', AnnouncementController::class);
Route::resource('karyawan', UserController::class);
Route::resource('cuti', CutiController::class);
Route::resource('lembur', LemburController::class);
Route::post('/login', 'App\Http\Controllers\UserController@login');

