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
// master agama
Route::get('/master_agama', \App\Http\Controllers\AgamaController::class .'@index')->name('agama.index');
Route::get('/master_agama/create', \App\Http\Controllers\AgamaController::class . '@create')->name('agama.create');
Route::post('/master_agama/save', \App\Http\Controllers\AgamaController::class .'@store')->name('agama.store');
Route::get('/master_agama/edit/{kd_agama}', \App\Http\Controllers\AgamaController::class . '@edit')->name('agama.edit');
Route::put('/master_agama/update', \App\Http\Controllers\AgamaController::class .'@update')->name('agama.update');
Route::delete('/master_agama/destroy/{kd_agama}', \App\Http\Controllers\AgamaController::class .'@destroy')->name('agama.destroy');
// master golongan darah
Route::get('/master_golongan_darah', \App\Http\Controllers\GolonganDarahController::class .'@index')->name('gol_darah.index');
Route::get('/master_golongan_darah/create', \App\Http\Controllers\GolonganDarahController::class . '@create')->name('gol_darah.create');
Route::post('/master_golongan_darah/save', \App\Http\Controllers\GolonganDarahController::class .'@store')->name('gol_darah.store');
Route::get('/master_golongan_darah/edit/{kd_gol_darah}', \App\Http\Controllers\GolonganDarahController::class . '@edit')->name('gol_darah.edit');
Route::put('/master_golongan_darah/update', \App\Http\Controllers\GolonganDarahController::class .'@update')->name('gol_darah.update');
Route::delete('/master_golongan_darah/destroy/{kd_gol_darah}', \App\Http\Controllers\GolonganDarahController::class .'@destroy')->name('gol_darah.destroy');

//master jenis kelamin
Route::get('/master_jenis_kelamin', \App\Http\Controllers\JenisKelaminController::class .'@index')->name('jenis_kelamin.index');
Route::get('/master_jenis_kelamin/create', \App\Http\Controllers\JenisKelaminController::class . '@create')->name('jenis_kelamin.create');
Route::post('/master_jenis_kelamin/save', \App\Http\Controllers\JenisKelaminController::class .'@store')->name('jenis_kelamin.store');
Route::get('/master_jenis_kelamin/edit/{kd_jenis_kelamin}', \App\Http\Controllers\JenisKelaminController::class . '@edit')->name('jenis_kelamin.edit');
Route::put('/master_jenis_kelamin/update', \App\Http\Controllers\JenisKelaminController::class .'@update')->name('jenis_kelamin.update');
Route::delete('/master_jenis_kelamin/destroy/{kd_jenis_kelamin}', \App\Http\Controllers\JenisKelaminController::class .'@destroy')->name('jenis_kelamin.destroy');
// master pendidikan
Route::get('/master_pendidikan', \App\Http\Controllers\PendidikanController::class .'@index')->name('pendidikan.index');
Route::get('/master_pendidikan/create', \App\Http\Controllers\PendidikanController::class . '@create')->name('pendidikan.create');
Route::post('/master_pendidikan/save', \App\Http\Controllers\PendidikanController::class .'@store')->name('pendidikan.store');
Route::get('/master_pendidikan/edit/{kd_pendidikan}', \App\Http\Controllers\PendidikanController::class . '@edit')->name('pendidikan.edit');
Route::put('/master_pendidikan/update', \App\Http\Controllers\PendidikanController::class .'@update')->name('pendidikan.update');
Route::delete('/master_pendidikan/destroy/{kd_pendidikan}', \App\Http\Controllers\PendidikanController::class .'@destroy')->name('pendidikan.destroy');
// master status perkawinan
Route::get('/master_status_perkawinan', \App\Http\Controllers\StatusPerkawinanController::class .'@index')->name('status_perkawinan.index');
Route::get('/master_status_perkawinan/create', \App\Http\Controllers\StatusPerkawinanController::class . '@create')->name('status_perkawinan.create');
Route::post('/master_status_perkawinan/save', \App\Http\Controllers\StatusPerkawinanController::class .'@store')->name('status_perkawinan.store');
Route::get('/master_status_perkawinan/edit/{kd_status_perkawinan}', \App\Http\Controllers\StatusPerkawinanController::class . '@edit')->name('status_perkawinan.edit');
Route::put('/master_status_perkawinan/update', \App\Http\Controllers\StatusPerkawinanController::class .'@update')->name('status_perkawinan.update');
Route::delete('/master_status_perkawinan/destroy/{kd_status_perkawinan}', \App\Http\Controllers\StatusPerkawinanController::class .'@destroy')->name('status_perkawinan.destroy');