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

Route::group(['middleware' => 'auth'], function() {
    //route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('siswa',[SiswaController::class,'index'])->name('siswa');

    Route::prefix('biaya')->group(function(){
        Route::get('perlengkapan', [PerlengkapanController::class,'index'])->name('perlengkapan.index');
        Route::get('perlengkapan/create',[PerlengkapanController::class,'create'])->name('perlengkapan.create');
        Route::post('perkengkapan/store', [PerlengkapanController::class,'store'])->name('perlengkapan.store');

        Route::get('dana-pendidikan', [DPPController::class,'index'])->name('data-pendidikan.index');
        Route::get('sistem-bayar', [SistemBayarController::class,'index'])->name('sistem-bayar.index');
    });

});
