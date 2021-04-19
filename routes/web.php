<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DatatokoController;
use App\Http\Controllers\LastdataController;
use App\Http\Controllers\DataprodiController;
use App\Http\Controllers\DatapegawaiController;
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

Route::get('/login/{data}', [BarangController::class, 'login']);

Auth::routes();

Route::group(['middleware' => ['auth', 'CheckRole:super_admin']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/add-admin', [AdminController::class, 'create']);
    Route::post('/add-admin/register', [AdminController::class, 'store']);
    Route::get('/add-barang', [BarangController::class, 'create']);
    Route::post('/add-barang/store', [BarangController::class, 'store']);
    Route::get('/update-barang/{kode_barang}/{barang}', [BarangController::class, 'edit']);
    Route::patch('/update-barang/update/{barang}', [BarangController::class, 'update']);
    Route::delete('/delete-barang/{kode_barang}/{barang}', [BarangController::class, 'destroy']);

    Route::post('/search-barang', [BarangController::class, 'search']);

    Route::delete('/selected-barang', [BarangController::class, 'deleteBarangSelected'])->name('barang.deleteSelected');

    Route::get('/jenis-barang/{jenis}', [BarangController::class, 'jenis_barang']);
    Route::get('/kondisi-barang/{kondisi}', [BarangController::class, 'kondisi_barang']);

    Route::get('/data-toko', [DatatokoController::class, 'index']);
    Route::post('/add-datatoko', [DatatokoController::class, 'store']);

    Route::delete('/delete-lastData/{kode_barang}/{lastData}', [LastdataController::class, 'destroy']);
    Route::post('/back-lastData/{kode_barang}/{lastData}', [LastdataController::class, 'store']);

    Route::post('/send-barang/{kode_barang}/{barang}', [BarangController::class, 'send_data']);

    Route::post('/add-tahun', [BarangController::class, 'add_tahun']);

    Route::post('/update-akun/{admin}/{NIP}', [AdminController::class, 'update']);
    Route::post('/update-gambar/akun/{admin}', [AdminController::class, 'update_gambar']);
});

Route::group(['middleware' => ['auth', 'CheckRole:super_admin,mini_admin']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/data-prodi/{prodi}', [DataprodiController::class, 'index']);
    Route::get('/data-barang', [BarangController::class, 'index']);
    Route::get('/last-data', [LastdataController::class, 'index']);

    Route::get('/detail-barang/{nama_barang}/{barang}', [BarangController::class, 'show']);
    Route::get('/detail-barang-prodi/{nama_barang}/{dataProdi}', [DataprodiController::class, 'show']);
    Route::get('/detail-lastdata/{kode_barang}/{lastData}', [LastdataController::class, 'show']);

    Route::get('/export-data', [BarangController::class, 'export']);

    Route::get('/export-data-barang/{data}', [BarangController::class, 'export_barang']);
    Route::get('/export-data-barang/kondisi/{data}', [BarangController::class, 'export_barang_kondisi']);
    Route::get('/export-data/data/{data}', [BarangController::class, 'export_upi']);

    Route::get('/export-data-barang/pdf/{data}', [BarangController::class, 'export_pdf']);
});

Route::group(['middleware' => ['auth', 'CheckRole:super_admin,mini_admin,admin_pegawai']], function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile/{admin}', [AdminController::class, 'show']);

    Route::get('/add-akun/adminKepegawaian', [AdminController::class, 'create_pegawai']);
    Route::post('/add-akun/adminKepegawaian/register', [AdminController::class, 'store_pegawai']);

    Route::get('/add-dataPegawai', [DatapegawaiController::class, 'create']);
    Route::post('/add-dataPegawai/store', [DatapegawaiController::class, 'store']);
});
