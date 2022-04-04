<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\SimulasiTransaksiController;
use App\Http\Controllers\SimulasiAksesorisController;
use App\Http\Controllers\SimulasiGajiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;

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


Route::resource('/member', MemberController::class);
Route::resource('/outlet', OutletController::class);
Route::resource('/paket', PaketController::class);
Route::resource('/inventaris', InventarisController::class);
Route::resource('/transaksi', TransaksiController::class);
Route::resource('/penjemputan', PenjemputanController::class);
Route::resource('/barang', BarangController::class);
Route::resource('/absen', AbsenController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});
Route::get('member/export/xls',[MemberController::class, 'exportToExcel']);
Route::get('paket/export/xls',[PaketController::class, 'exportToExcel']);
Route::get('outlet/export/xls',[OutletController::class, 'exportToExcel']);
Route::get('inventaris/export/xls',[InventarisController::class, 'exportToExcel']);
Route::get('gaji/export/xls',[SimulasiGajiController::class, 'exportToExcel']);
Route::get('penjemputan/export/xls',[PenjemputanController::class, 'exportToExcel']);
Route::get('absen/export/xls',[AbsenController::class, 'exportToExcel']);
Route::post('/member/import', [MemberController::class, 'importData']);
Route::post('/paket/import', [PaketController::class, 'importData']);
Route::post('/absen/import', [AbsenController::class, 'importData']);
Route::post('/outlet/import', [OutletController::class, 'importData']);
Route::get('/member', [MemberController::class, 'index']);
Route::get('/member/cetakPDF', [MemberController::class, 'cetakPDF']);
// Route::get('export/paket', [PaketController::class, 'exportData'])->name('export-paket');

Route::middleware(['auth'])->group(function () {
    Route::get('home',[HomeController::class, 'index'])->name('a.home');
    Route::resource('member', MemberController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('outlet', OutletController::class);
    Route::get('transaksi', [TransaksiController::class, 'index']);
    Route::resource('/penjemputan', PenjemputanController::class);
    Route::get('laporan',[LaporanController::class, 'index']);
    Route::get('member/export/xls',[MemberController::class, 'exportToExcel']);
    Route::get('/member', [MemberController::class, 'index']);
    Route::get('/member/cetakPDF', [MemberController::class, 'cetakPDF']);
});

//Route::group(['prefix'=>'a','middleware'=>['isAdmin','auth']], function(){
//     Route::get('home',[HomeController::class, 'index'])->name('a.home');
//     Route::resource('member', MemberController::class);
//     Route::resource('paket', PaketController::class);
//     Route::resource('outlet', OutletController::class);
//     Route::get('transaksi',[TransaksiController::class]);
//     Route::get('laporan',[LaporanController::class, 'index']);
//     Route::get('member/export/xls',[MemberController::class, 'exportToExcel']);
//     Route::get('/member', [MemberController::class, 'index']);
//     Route::get('/member/cetakPDF', [MemberController::class, 'cetakPDF']);
// });

// Route::group(['prefix'=>'k','middleware'=>['isKasir','auth']], function(){
//     Route::get('home',[HomeController::class, 'index'])->name('k.home');
//     Route::resource('member', MemberController::class);
//     Route::resource('paket', PaketController::class);
//     Route::get('transaksi',[TransaksiController::class]);
//     Route::get('laporan',[LaporanController::class, 'index']);
//     Route::get('member/export/xls',[MemberController::class, 'exportToExcel']);
//     Route::get('/member', [MemberController::class, 'index']);
//     Route::get('/member/cetakPDF', [MemberController::class, 'cetakPDF']);
// });

// Route::group(['prefix'=>'o','middleware'=>['isOwner','auth']], function(){
//     Route::get('home',[HomeController::class, 'index'])->name('o.home');
//     Route::get('laporan',[LaporanController::class, 'index']);
//     Route::get('member/export/xls',[MemberController::class, 'exportToExcel']);
//     Route::get('/member', [MemberController::class, 'index']);
//     Route::get('/member/cetakPDF', [MemberController::class, 'cetakPDF']);
// });

Route::get('data_karyawan', [SimulasiController::class, 'index']);
Route::get('gaji_karyawan', [SimulasiGajiController::class, 'index']);
Route::get('simulasi_transaksi', [SimulasiTransaksiController::class, 'index']);
Route::get('aks', [SimulasiAksesorisController::class, 'index']);
