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

Route::get('/', function () {
    return view('test');
});
Route::get('/recoverpw', function () {
    return view('pages/auth/recoverpw');
});
Route::get('/registration', function () {
    return view('pages/auth/registration');
});
Route::get('/master_jenis_kelamin', \App\Http\Controllers\JenisKelaminController::class .'@index')->name('jenis_kelamin.index');
Route::get('/master_jenis_kelamin/create', \App\Http\Controllers\JenisKelaminController::class . '@create')->name('jenis_kelamin.create');
Route::post('/master_jenis_kelamin/save', \App\Http\Controllers\JenisKelaminController::class .'@store')->name('jenis_kelamin.store');
Route::get('/master_jenis_kelamin/edit/{kd_jenis_kelamin}', \App\Http\Controllers\JenisKelaminController::class . '@edit')->name('jenis_kelamin.edit');
Route::put('/master_jenis_kelamin/update', \App\Http\Controllers\JenisKelaminController::class .'@update')->name('jenis_kelamin.update');
Route::delete('/master_jenis_kelamin/destroy/{kd_jenis_kelamin}', \App\Http\Controllers\JenisKelaminController::class .'@destroy')->name('jenis_kelamin.destroy');
