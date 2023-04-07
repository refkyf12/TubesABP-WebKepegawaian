<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    Route::delete('/delete/{id}','App\Http\Controllers\UserController@delete');
    Route::get('/karyawan/{id}', [UserController::class], 'show')->name('show');
    Route::post('/update/{id}', 'App\Http\Controllers\UserController@update');
    Route::get('/karyawan/hrd/{id}', 'App\Http\Controllers\UserController@show_karyawan');
    Route::post('update/hrd/{id}', 'App\Http\Controllers\UserController@update_hrd');
});

Route::get('/keluar',function(){
    Auth::logout();
    return redirect('/login');
});
