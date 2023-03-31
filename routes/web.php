<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::post('/auth', 'App\Http\Controllers\UserController@authenticate');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/karyawan', 'App\Http\Controllers\UserController@index');
    Route::resource('karyawan', UserController::class);

});
