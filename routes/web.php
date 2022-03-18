<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\SimulasiGajiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

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
Route::middleware(['guest'])->group(function () {
    Route::get('login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
});
Route::get('member/export/xls',[MemberController::class, 'exportToExcel']);
Route::get('/member', [MemberController::class, 'index']);
Route::get('/member/cetakPDF', [MemberController::class, 'cetakPDF']);

Route::middleware(['auth'])->group(function () {
    Route::get('home',[HomeController::class, 'index'])->name('a.home');
    Route::resource('member', MemberController::class);
    Route::resource('paket', PaketController::class);
    Route::resource('outlet', OutletController::class);
    Route::get('transaksi', [TransaksiController::class, 'index']);
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

Route::post('/member/import', [MemberController::class, 'importData']);
Route::get('data_karyawan', [SimulasiController::class, 'index']);
Route::get('gaji_karyawan', [SimulasiGajiController::class, 'index']);