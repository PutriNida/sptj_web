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
Route::get('/master_agama', \App\Http\Controllers\MasterControllers\AgamaController::class .'@index')->name('agama.index');
Route::get('/master_agama/create', \App\Http\Controllers\MasterControllers\AgamaController::class . '@create')->name('agama.create');
Route::post('/master_agama/save', \App\Http\Controllers\MasterControllers\AgamaController::class .'@store')->name('agama.store');
Route::get('/master_agama/edit/{kd_agama}', \App\Http\Controllers\MasterControllers\AgamaController::class . '@edit')->name('agama.edit');
Route::put('/master_agama/update', \App\Http\Controllers\MasterControllers\AgamaController::class .'@update')->name('agama.update');
Route::delete('/master_agama/destroy/{kd_agama}', \App\Http\Controllers\MasterControllers\AgamaController::class .'@destroy')->name('agama.destroy');
// master golongan darah
Route::get('/master_golongan_darah', \App\Http\Controllers\MasterControllers\GolonganDarahController::class .'@index')->name('gol_darah.index');
Route::get('/master_golongan_darah/create', \App\Http\Controllers\MasterControllers\GolonganDarahController::class . '@create')->name('gol_darah.create');
Route::post('/master_golongan_darah/save', \App\Http\Controllers\MasterControllers\GolonganDarahController::class .'@store')->name('gol_darah.store');
Route::get('/master_golongan_darah/edit/{kd_gol_darah}', \App\Http\Controllers\MasterControllers\GolonganDarahController::class . '@edit')->name('gol_darah.edit');
Route::put('/master_golongan_darah/update', \App\Http\Controllers\MasterControllers\GolonganDarahController::class .'@update')->name('gol_darah.update');
Route::delete('/master_golongan_darah/destroy/{kd_gol_darah}', \App\Http\Controllers\MasterControllers\GolonganDarahController::class .'@destroy')->name('gol_darah.destroy');
//master jenis kelamin
Route::get('/master_jenis_kelamin', \App\Http\Controllers\MasterControllers\JenisKelaminController::class .'@index')->name('jenis_kelamin.index');
Route::get('/master_jenis_kelamin/create', \App\Http\Controllers\MasterControllers\JenisKelaminController::class . '@create')->name('jenis_kelamin.create');
Route::post('/master_jenis_kelamin/save', \App\Http\Controllers\MasterControllers\JenisKelaminController::class .'@store')->name('jenis_kelamin.store');
Route::get('/master_jenis_kelamin/edit/{kd_jenis_kelamin}', \App\Http\Controllers\MasterControllers\JenisKelaminController::class . '@edit')->name('jenis_kelamin.edit');
Route::put('/master_jenis_kelamin/update', \App\Http\Controllers\MasterControllers\JenisKelaminController::class .'@update')->name('jenis_kelamin.update');
Route::delete('/master_jenis_kelamin/destroy/{kd_jenis_kelamin}', \App\Http\Controllers\MasterControllers\JenisKelaminController::class .'@destroy')->name('jenis_kelamin.destroy');
// master pendidikan
Route::get('/master_pendidikan', \App\Http\Controllers\MasterControllers\PendidikanController::class .'@index')->name('pendidikan.index');
Route::get('/master_pendidikan/create', \App\Http\Controllers\MasterControllers\PendidikanController::class . '@create')->name('pendidikan.create');
Route::post('/master_pendidikan/save', \App\Http\Controllers\MasterControllers\PendidikanController::class .'@store')->name('pendidikan.store');
Route::get('/master_pendidikan/edit/{kd_pendidikan}', \App\Http\Controllers\MasterControllers\PendidikanController::class . '@edit')->name('pendidikan.edit');
Route::put('/master_pendidikan/update', \App\Http\Controllers\MasterControllers\PendidikanController::class .'@update')->name('pendidikan.update');
Route::delete('/master_pendidikan/destroy/{kd_pendidikan}', \App\Http\Controllers\MasterControllers\PendidikanController::class .'@destroy')->name('pendidikan.destroy');
// master status perkawinan
Route::get('/master_status_perkawinan', \App\Http\Controllers\MasterControllers\StatusPerkawinanController::class .'@index')->name('status_perkawinan.index');
Route::get('/master_status_perkawinan/create', \App\Http\Controllers\MasterControllers\StatusPerkawinanController::class . '@create')->name('status_perkawinan.create');
Route::post('/master_status_perkawinan/save', \App\Http\Controllers\MasterControllers\StatusPerkawinanController::class .'@store')->name('status_perkawinan.store');
Route::get('/master_status_perkawinan/edit/{kd_status_perkawinan}', \App\Http\Controllers\MasterControllers\StatusPerkawinanController::class . '@edit')->name('status_perkawinan.edit');
Route::put('/master_status_perkawinan/update', \App\Http\Controllers\MasterControllers\StatusPerkawinanController::class .'@update')->name('status_perkawinan.update');
Route::delete('/master_status_perkawinan/destroy/{kd_status_perkawinan}', \App\Http\Controllers\MasterControllers\StatusPerkawinanController::class .'@destroy')->name('status_perkawinan.destroy');
// master status kartawan
Route::get('/master_status_karyawan', \App\Http\Controllers\MasterControllers\StatusKaryawanController::class .'@index')->name('status_karyawan.index');
Route::get('/master_status_karyawan/create', \App\Http\Controllers\MasterControllers\StatusKaryawanController::class . '@create')->name('status_karyawan.create');
Route::post('/master_status_karyawan/save', \App\Http\Controllers\MasterControllers\StatusKaryawanController::class .'@store')->name('status_karyawan.store');
Route::get('/master_status_karyawan/edit/{kd_status_karyawan}', \App\Http\Controllers\MasterControllers\StatusKaryawanController::class . '@edit')->name('status_karyawan.edit');
Route::put('/master_status_karyawan/update', \App\Http\Controllers\MasterControllers\StatusKaryawanController::class .'@update')->name('status_karyawan.update');
Route::delete('/master_status_karyawan/destroy/{kd_status_karyawan}', \App\Http\Controllers\MasterControllers\StatusKaryawanController::class .'@destroy')->name('status_karyawan.destroy');
// master Tipe Kontak
Route::get('/master_tipe_kontak', \App\Http\Controllers\MasterControllers\TipeKontakController::class .'@index')->name('tipe_kontak.index');
Route::get('/master_tipe_kontak/create', \App\Http\Controllers\MasterControllers\TipeKontakController::class . '@create')->name('tipe_kontak.create');
Route::post('/master_tipe_kontak/save', \App\Http\Controllers\MasterControllers\TipeKontakController::class .'@store')->name('tipe_kontak.store');
Route::get('/master_tipe_kontak/edit/{kd_tipe_kontak}', \App\Http\Controllers\MasterControllers\TipeKontakController::class . '@edit')->name('tipe_kontak.edit');
Route::put('/master_tipe_kontak/update', \App\Http\Controllers\MasterControllers\TipeKontakController::class .'@update')->name('tipe_kontak.update');
Route::delete('/master_tipe_kontak/destroy/{kd_tipe_kontak}', \App\Http\Controllers\MasterControllers\TipeKontakController::class .'@destroy')->name('tipe_kontak.destroy');
// master lokasi kerja
Route::get('/master_lokasi_kerja', \App\Http\Controllers\MasterControllers\LokasiKerjaController::class .'@index')->name('lokasi_kerja.index');
Route::get('/master_lokasi_kerja/create', \App\Http\Controllers\MasterControllers\LokasiKerjaController::class . '@create')->name('lokasi_kerja.create');
Route::post('/master_lokasi_kerja/save', \App\Http\Controllers\MasterControllers\LokasiKerjaController::class .'@store')->name('lokasi_kerja.store');
Route::get('/master_lokasi_kerja/edit/{kd_lokasi_kerja}', \App\Http\Controllers\MasterControllers\LokasiKerjaController::class . '@edit')->name('lokasi_kerja.edit');
Route::put('/master_lokasi_kerja/update', \App\Http\Controllers\MasterControllers\LokasiKerjaController::class .'@update')->name('lokasi_kerja.update');
Route::delete('/master_lokasi_kerja/destroy/{kd_lokasi_kerja}', \App\Http\Controllers\MasterControllers\LokasiKerjaController::class .'@destroy')->name('lokasi_kerja.destroy');
// master direktorat
Route::get('/master_direktorat', \App\Http\Controllers\MasterControllers\DirektoratController::class .'@index')->name('direktorat.index');
Route::get('/master_direktorat/create', \App\Http\Controllers\MasterControllers\DirektoratController::class . '@create')->name('direktorat.create');
Route::post('/master_direktorat/save', \App\Http\Controllers\MasterControllers\DirektoratController::class .'@store')->name('direktorat.store');
Route::get('/master_direktorat/edit/{kd_direktorat}', \App\Http\Controllers\MasterControllers\DirektoratController::class . '@edit')->name('direktorat.edit');
Route::put('/master_direktorat/update', \App\Http\Controllers\MasterControllers\DirektoratController::class .'@update')->name('direktorat.update');
Route::delete('/master_direktorat/destroy/{kd_direktorat}', \App\Http\Controllers\MasterControllers\DirektoratController::class .'@destroy')->name('direktorat.destroy');
// master divisi
Route::get('/master_divisi', \App\Http\Controllers\MasterControllers\DivisiController::class .'@index')->name('divisi.index');
Route::get('/master_divisi/create', \App\Http\Controllers\MasterControllers\DivisiController::class . '@create')->name('divisi.create');
Route::post('/master_divisi/save', \App\Http\Controllers\MasterControllers\DivisiController::class .'@store')->name('divisi.store');
Route::get('/master_divisi/edit/{kd_divisi}', \App\Http\Controllers\MasterControllers\DivisiController::class . '@edit')->name('divisi.edit');
Route::put('/master_divisi/update', \App\Http\Controllers\MasterControllers\DivisiController::class .'@update')->name('divisi.update');
Route::delete('/master_divisi/destroy/{kd_divisi}', \App\Http\Controllers\MasterControllers\DivisiController::class .'@destroy')->name('divisi.destroy');
// master departemen
Route::get('/master_departemen', \App\Http\Controllers\MasterControllers\DepartemenController::class .'@index')->name('departemen.index');
Route::get('/master_departemen/create', \App\Http\Controllers\MasterControllers\DepartemenController::class . '@create')->name('departemen.create');
Route::post('/master_departemen/save', \App\Http\Controllers\MasterControllers\DepartemenController::class .'@store')->name('departemen.store');
Route::get('/master_departemen/edit/{kd_departemen}', \App\Http\Controllers\MasterControllers\DepartemenController::class . '@edit')->name('departemen.edit');
Route::put('/master_departemen/update', \App\Http\Controllers\MasterControllers\DepartemenController::class .'@update')->name('departemen.update');
Route::delete('/master_departemen/destroy/{kd_departemen}', \App\Http\Controllers\MasterControllers\DepartemenController::class .'@destroy')->name('departemen.destroy');
// master jabatan
Route::get('/master_jabatan', \App\Http\Controllers\MasterControllers\JabatanController::class .'@index')->name('jabatan.index');
Route::get('/master_jabatan/create', \App\Http\Controllers\MasterControllers\JabatanController::class . '@create')->name('jabatan.create');
Route::post('/master_jabatan/save', \App\Http\Controllers\MasterControllers\JabatanController::class .'@store')->name('jabatan.store');
Route::get('/master_jabatan/edit/{kd_jabatan}', \App\Http\Controllers\MasterControllers\JabatanController::class . '@edit')->name('jabatan.edit');
Route::put('/master_jabatan/update', \App\Http\Controllers\MasterControllers\JabatanController::class .'@update')->name('jabatan.update');
Route::delete('/master_jabatan/destroy/{kd_jabatan}', \App\Http\Controllers\MasterControllers\JabatanController::class .'@destroy')->name('jabatan.destroy');
//master hubungan keluarga
Route::get('/master_hub_keluarga', \App\Http\Controllers\MasterControllers\HubunganKeluargaController::class .'@index')->name('hub_keluarga.index');
Route::get('/master_hub_keluarga/create', \App\Http\Controllers\MasterControllers\HubunganKeluargaController::class . '@create')->name('hub_keluarga.create');
Route::post('/master_hub_keluarga/save', \App\Http\Controllers\MasterControllers\HubunganKeluargaController::class .'@store')->name('hub_keluarga.store');
Route::get('/master_hub_keluarga/edit/{kd_hub_keluarga}', \App\Http\Controllers\MasterControllers\HubunganKeluargaController::class . '@edit')->name('hub_keluarga.edit');
Route::put('/master_hub_keluarga/update', \App\Http\Controllers\MasterControllers\HubunganKeluargaController::class .'@update')->name('hub_keluarga.update');
Route::delete('/master_hub_keluarga/destroy/{kd_hub_keluarga}', \App\Http\Controllers\MasterControllers\HubunganKeluargaController::class .'@destroy')->name('hub_keluarga.destroy');
