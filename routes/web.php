<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\AbsenController;


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
    Route::get('/announcement', 'App\Http\Controllers\AnnouncementController@index');
    Route::get('/announcement/create', 'App\Http\Controllers\AnnouncementController@create');
    Route::post('/announcement/create', 'App\Http\Controllers\AnnouncementController@store');
    Route::delete('/delete_announcement/{id}','App\Http\Controllers\AnnouncementController@delete_announcement');
    Route::get('/lembur','App\Http\Controllers\LemburController@index');
    Route::resource('lembur', LemburController::class);
    Route::get('/lembur/{id}','App\Http\Controllers\LemburController@show');
    Route::post('/lembur/{id}', 'App\Http\Controllers\LemburController@update');
    Route::get('/cuti','App\Http\Controllers\CutiController@index');
    Route::resource('cuti', CutiController::class);
    Route::get('/cuti/{id}','App\Http\Controllers\CutiController@show');
    Route::post('/cuti/{id}', 'App\Http\Controllers\CutiController@update');
    Route::get('/absen','App\Http\Controllers\AbsenController@show');
    Route::delete('/delete_announcement/{id}','App\Http\Controllers\AnnouncementController@delete');

    Route::get('/karyawan/hrd/{id}', 'App\Http\Controllers\UserController@show_karyawan');
    Route::post('update/hrd/{id}', 'App\Http\Controllers\UserController@update_hrd');
});

Route::get('/keluar',function(){
    Auth::logout();
    return redirect('/login');
});




/*Route::get('/announcement',function() {
    return view('announcement.index');
});*/
