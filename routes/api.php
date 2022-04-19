<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\IntervensiController;
use App\Http\Controllers\KategoriUraianController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\UraianController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RiwayatDataController;
use App\Http\Controllers\RiwayatDiagnosaController;
use App\Http\Controllers\RiwayatUraianController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//akun
Route::get('akun', [AkunController::class, 'index']);
Route::post('akun', [AkunController::class, 'store']);
Route::post('login', [AkunController::class, 'show']); //login
Route::put('/akun/{id}', [AkunController::class, 'update']);
Route::delete('/akun/{id}', [AkunController::class, 'destroy']);

//mahasiswa
Route::get('mahasiswa', [MahasiswaController::class, 'index']);
Route::post('mahasiswa', [MahasiswaController::class, 'store']);
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);

//pasien
Route::get('pasien', [PasienController::class, 'index']);
Route::post('pasien', [PasienController::class, 'store']);
Route::get('pasien/{id}', [PasienController::class, 'show']);
// Route::put('/pasien/{id}', [PasienController::class, 'update']);

//data
Route::get('data', [DataController::class, 'index']);
Route::post('data', [DataController::class, 'store']);
Route::put('/data/{id}', [DataController::class, 'update']);
Route::delete('/data/{id}', [DataController::class, 'destroy']);

//diagnosa
Route::get('diagnosa', [DiagnosaController::class, 'index']);
Route::post('diagnosa', [DiagnosaController::class, 'store']);
Route::put('/diagnosa/{id}', [DiagnosaController::class, 'update']);
Route::delete('/diagnosa/{id}', [DiagnosaController::class, 'destroy']);

//intervensi
Route::get('intervensi', [IntervensiController::class, 'index']);
Route::get('intervensi/{id}', [IntervensiController::class, 'show']);
Route::post('intervensi', [IntervensiController::class, 'store']);
Route::put('/intervensi/{id}', [IntervensiController::class, 'update']);
Route::delete('/intervensi/{id}', [IntervensiController::class, 'destroy']);

//Tipe
Route::get('tipe', [TipeController::class, 'index']);
Route::post('tipe', [TipeController::class, 'store']);
Route::put('/tipe/{id}', [TipeController::class, 'update']);
Route::delete('/tipe/{id}', [TipeController::class, 'destroy']);

//uraian
Route::get('uraian', [UraianController::class, 'index']);
Route::post('uraian', [UraianController::class, 'store']);
Route::put('/uraian/{id}', [UraianController::class, 'update']);
Route::delete('/uraian/{id}', [UraianController::class, 'destroy']);

Route::get('history/{id}', [RiwayatController::class, 'index']);


//ambil data tipe
Route::get('list-tipe', [TipeController::class, 'listTipe']);
Route::get('/tipe-list/{id}', [TipeController::class, 'tipelist']);
Route::get('/data-list/{id}', [DataController::class, 'datalist']);
Route::get('/diagnosa-list/{id}', [DiagnosaController::class, 'diagnosalist']);
Route::get('/intervensi-list/{id}', [IntervensiController::class, 'intervensilist']);
Route::get('/uraian-list/{id}', [UraianController::class, 'uraianlist']);

//untuk ambil data riwayat dengan procedure
Route::get('/riwayat-uraian/{akun}', [RiwayatUraianController::class, 'listRiwayatUraian']);



//api untuk riwayat uraian
Route::post('ruraian-indexx', [RiwayatUraianController::class, 'store']);
Route::get('ruraian-indexx', [RiwayatUraianController::class, 'index']);

//api untuk riwayat data
Route::post('rdata', [RiwayatDataController::class, 'store']);
Route::get('rdata', [RiwayatDataController::class, 'index']);

//untuk ambil data riwayat dengan procedure
Route::get('/riwayat-gejala/{akun}', [RiwayatDataController::class, 'listRiwayatGejala']);
Route::get('/riwayat-uraian/{akun}', [RiwayatController::class, 'listRiwayatUraian']);
Route::get('/riwayat-gejala/{akun}', [RiwayatDataController::class, 'listRiwayatGejala']);

Route::get('/riwayat', [RiwayatDiagnosaController::class, 'index']);
Route::post('/riwayat', [RiwayatDiagnosaController::class, 'store']);
Route::get('/riwayat/{id}', [RiwayatDiagnosaController::class, 'show']);

//kategori uraian
Route::get('kuraian', [KategoriUraianController::class, 'index']);
Route::post('kuraian', [KategoriUraianController::class, 'store']);


//Monitoring
Route::get('monitoring', [MonitoringController::class, 'index']);
Route::post('monitoring', [MonitoringController::class, 'store']);
Route::get('monitoring/{id}', [MonitoringController::class, 'show']);
