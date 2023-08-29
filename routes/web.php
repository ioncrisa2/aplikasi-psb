<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DPPController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PerlengkapanController;
use App\Http\Controllers\SistemBayarController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FormController::class,'index']);
Route::post('/jenjang',[FormController::class,'jenjangInput'])->name('jenjang-input');
Route::get('identitas-siswa',[FormController::class,'dataSiswa'])->name('identitas-siswa');
Route::get('upload-rapot',[FormController::class,'uploadRapot'])->name('upload-rapot');
Route::get('detail-biaya',[FormController::class,'detailBiaya'])->name('detail-biaya');
Route::get('sistem-bayar',[FormController::class,'sistemBayar'])->name('sistem-bayar');

Route::group(['middleware' => 'auth'], function() {
    //route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('siswa',[SiswaController::class,'index'])->name('siswa');

    Route::prefix('biaya')->group(function(){
        Route::get('perlengkapan', [PerlengkapanController::class,'index'])->name('perlengkapan.index');
        Route::get('perlengkapan/create',[PerlengkapanController::class,'create'])->name('perlengkapan.create');
        Route::post('perkengkapan/store', [PerlengkapanController::class,'store'])->name('perlengkapan.store');
        Route::delete('perlengkapan/{bmp}', [PerlengkapanController::class,'destroy'])->name('perlengkapan.destroy');
        Route::get('perlengkapan/{bmp}', [PerlengkapanController::class,'edit'])->name('perlengkapan.edit');
        Route::put('perlengkapan/{bmp}',[PerlengkapanController::class,'update'])->name('perlengkapan.update');

        Route::get('dana-pendidikan', [DPPController::class,'index'])->name('dana-pendidikan.index');
        Route::get('dana-pendidikan/create',[DPPController::class,'create'])->name('dana-pendidikan.create');
        Route::post('dana-pendidikan/store',[DPPController::class,'store'])->name('dana-pendidikan.store');
        Route::delete('dana-pendidikan/{dpp}',[DPPController::class,'destroy'])->name('dana-pendidikan.destroy');
        Route::get('dana-pendidikan/{dpp}',[DPPController::class,'edit'])->name('dana-pendidikan.edit');
        Route::put('dana-pendidikan/{dpp}',[DPPController::class,'update'])->name('dana-pendidikan.update');

        Route::get('sistem-bayar', [SistemBayarController::class,'index'])->name('sistem-bayar.index');
        Route::get('sistem-bayar/create',[SistemBayarController::class,'create'])->name('sistem-bayar.create');
        Route::post('sistem-bayar/store',[SistemBayarController::class,'store'])->name('sistem-bayar.store');
        Route::delete('sistem-bayar/{sistembayar}',[SistemBayarController::class,'destroy'])->name('sistem-bayar.destroy');
        Route::get('sistem-bayar/{sistembayar}',[SistemBayarController::class,'edit'])->name('sistem-bayar.edit');
        Route::put('sistem-bayar/{sistembayar}',[SistemBayarController::class,'update'])->name('sistem-bayar.update');


    });

});
