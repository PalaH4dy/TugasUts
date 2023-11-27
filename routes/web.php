<?php

use App\Http\Controllers\BagianController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\KatagoriController;
use App\Http\Controllers\KebutuhanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenanggungJawabController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProgresController;
use App\Models\PengajuanKebutuhan;
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
    return view('layout.main');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [LoginController::class, 'authenticate'])->name('auth');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashbord', [DashbordController::class, 'index'])->name('dashbord')->middleware('auth');
//register
Route::get('/register', [LoginController::class, 'register'])->name('register')->middleware('auth');
Route::get('/user', [LoginController::class, 'dataPengguna'])->name('pengguna')->middleware('auth');
Route::post('store/register', [LoginController::class, 'store'])->name('storeregister')->middleware('auth');
Route::delete('user/{id}', [LoginController::class, 'deleteuser'])->name('deluser')->middleware('auth');


// Route Bagian
Route::controller(BagianController::class)->group(function () {
    Route::get('/bagian', 'index')->name('bagian')->middleware('auth');
    Route::post('/bagian/store', 'store')->name('store')->middleware('auth');
    Route::put('bagian/update/{id}', 'update')->name('update')->middleware('auth');
    Route::delete('bagian/delete/{id}', 'delete')->name('delete')->middleware('auth');
});

// Route Katagori
Route::controller(KatagoriController::class)->group(function () {
    Route::get('/katagori', 'index')->name('katagori')->middleware('auth');
    Route::post('/katagori/store', 'store')->name('storeKatagori')->middleware('auth');
    Route::put('/katagori/update/{id}', 'update')->name('updateKatagori')->middleware('auth');
    Route::delete('/katagori/delete/{id}', 'delete')->name('deleteKatagori')->middleware('auth');
});
//Route Progres

Route::controller(ProgresController::class)->group(function () {
    Route::get('/progres', 'index')->name('progres')->middleware('auth');
    Route::post('/progres/store', 'store')->name('storeprogres')->middleware('auth');
    Route::put('/progres/update/{id}', 'update')->name('updateprogres')->middleware('auth');
    Route::delete('/progres/delete/{id}', 'delete')->name('deleteprogres')->middleware('auth');
});

// Route Penanggung Jawab

Route::controller(PenanggungJawabController::class)->group(function () {
    Route::get('/pic', 'index')->name('pic')->middleware('auth');
    Route::post('/pic/store', 'store')->name('storepic')->middleware('auth');
    Route::put('/pic/update/{id}', 'update')->name('updatepic')->middleware('auth');
    Route::delete('/pic/delete/{id}', 'delete')->name('deletepic')->middleware('auth');
});

//Route pegawai
Route::controller(PegawaiController::class)->group(function () {
    Route::get('/pegawai', 'index')->name('pegawai')->middleware('auth');
    Route::post('/pegawai/isertData', 'insertData')->name('insertData')->middleware('auth');
    Route::put('/pegawai/updata/{id}', 'update')->name('updatepegawai')->middleware('auth');
    Route::delete('/pegawai/delete/{id}', 'delete')->name('deletepegawai')->middleware('auth');
});

// kebutuhan
Route::controller(KebutuhanController::class)->group(function () {
    Route::get('/kebutuhan', 'index')->name('kebutuhan')->middleware('auth');
    Route::post('/kebutuhan/store', 'store')->name('storekebutuhan')->middleware('auth');
    Route::put('/kebutuhan/update/{id}', 'update')->name('updatekebutuhan')->middleware('auth');
    Route::delete('/kebutuhan/delete/{id}', 'delete')->name('deletekebutuhan')->middleware('auth');
});

// route Pengajuan

Route::controller(PengajuanController::class)->group(function () {
    Route::get('/pengajuan', 'index')->name('pengajuan')->middleware('auth');
    Route::post('/pengajuan/store', 'store')->name('storepengajuan')->middleware('auth');
    Route::put('/pengajuan/update/{id}', 'update')->name('updatepengajuan')->middleware('auth');
    Route::delete('/pengjuan/delete/{id}', 'delete')->name('deletepengajuan')->middleware('auth');
    Route::get('/pegawai/cetak', 'cetak')->name('cetak')->middleware('auth');
});
