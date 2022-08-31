<?php

use App\Http\Controllers\Anggaran\PaguMurniController;
use App\Http\Controllers\Anggaran\PaguPerubahanController;
use App\Http\Controllers\Anggaran\UraianRekeningController;
use App\Http\Controllers\BendPengeluaran\BuktiGuController;
use App\Http\Controllers\BendPengeluaran\PajakGuController;
use App\Http\Controllers\BendPengeluaran\Sp2dGuController;
use App\Http\Controllers\BendPengeluaran\SpjGuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Parameter\BankTujuanController;
use App\Http\Controllers\Parameter\BentukRekananController;
use App\Http\Controllers\Parameter\JenisBankController;
use App\Http\Controllers\Parameter\JenisPotonganController;
use App\Http\Controllers\Parameter\PotonganController;
use App\Http\Controllers\Parameter\RekananController;
use App\Http\Controllers\Setup\Rekening\Rekening1Controller;
use App\Http\Controllers\Setup\Rekening\Rekening2Controller;
use App\Http\Controllers\Setup\Rekening\Rekening3Controller;
use App\Http\Controllers\Setup\Rekening\Rekening4Controller;
use App\Http\Controllers\Setup\Rekening\Rekening5Controller;
use App\Http\Controllers\Setup\Rekening\Rekening6Controller;
use App\Http\Controllers\Tools\VersioningController;
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

Route::get('/', [DashboardController::class, 'app'])->name('app');


// Route untuk board
Route::middleware(['auth'])->group(function () {
    Route::get('/menu-load/{prefix}', function ($prefix) {
        switch ($prefix) {
            case 'anggaran':
                return view('components.menu.anggaran');
                break;
            default:
                return view('components.menu.penatausahaan');
        }
    })->name('menu');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'penatausahaan'], function () {
        Route::group(['prefix' => 'parameter'], function () {
            Route::resource('jenis-bank', JenisBankController::class)->except(['show']);
            Route::resource('bank-tujuan', BankTujuanController::class)->except(['show']);
            Route::resource('jenis-potongan', JenisPotonganController::class)->except(['show']);
            Route::resource('potongan', PotonganController::class)->except(['show']);
            Route::resource('bentuk-rekanan', BentukRekananController::class)->except(['show']);
            Route::resource('rekanan', RekananController::class)->except(['show']);
        });

        Route::group(['prefix' => 'bendahara-pengeluaran'], function () {

            Route::resource('bukti-gu', BuktiGuController::class)->except(['show']);
            Route::get('bukti-gu/sp2d-gu/create', [BuktiGuController::class, 'createSp2dGu'])->name('bukti-gu.sp2d-gu.create');

            Route::get('pajak-gu/{bukti_gu}', [PajakGuController::class, 'index'])->name('pajak-gu.index');
            Route::get('pajak-gu/{bukti_gu}/create', [PajakGuController::class, 'create'])->name('pajak-gu.create');
            Route::resource('pajak-gu', PajakGuController::class)->except(['index', 'show', 'create']);

            Route::resource('sp2d-gu', Sp2dGuController::class)->except(['show']);

            Route::resource('spj-gu', SpjGuController::class)->except(['show']);

            Route::group(['prefix' => 'print'], function () {
                Route::get('checklist-spp/{spj_gu}', [SpjGuController::class, 'printChecklistSpp'])->name('spj-gu.print.checklist-spp');
                Route::get('surat-pengantar-spp/{spj_gu}', [SpjGuController::class, 'printSuratPengantarSpp'])->name('spj-gu.print.surat-pengantar-spp');
                Route::get('ringkasan-spp/{spj_gu}', [SpjGuController::class, 'printRingkasanSpp'])->name('spj-gu.print.ringkasan-spp');
            });
        });
    });


    Route::group(['prefix' => 'anggaran'], function () {
        Route::resource('uraian-rekening', UraianRekeningController::class)->except(['show']);
        Route::get('pagu-murni/{uraian_rekening}/create', [PaguMurniController::class, 'create'])->name('pagu-murni.create');
        Route::resource('pagu-murni', PaguMurniController::class)->except(['show', 'create']);
        Route::resource('pagu-perubahan', PaguPerubahanController::class)->except(['show', 'create']);

        Route::group(['prefix' => 'rekening'], function () {
            Route::resource('rekening1', Rekening1Controller::class)->except(['show']);
            Route::resource('rekening2', Rekening2Controller::class)->except(['show']);
            Route::resource('rekening3', Rekening3Controller::class)->except(['show']);
            Route::resource('rekening4', Rekening4Controller::class)->except(['show']);
            Route::resource('rekening5', Rekening5Controller::class)->except(['show']);
            Route::resource('rekening6', Rekening6Controller::class)->except(['show']);
        });
    });

    Route::group(['prefix' => 'select2'], function () {
        Route::get('rekening1', [Rekening1Controller::class, 'select'])->name('rekening1.select');
        Route::get('rekening2', [Rekening2Controller::class, 'select'])->name('rekening2.select');
        Route::get('rekening3', [Rekening3Controller::class, 'select'])->name('rekening3.select');
        Route::get('rekening4', [Rekening4Controller::class, 'select'])->name('rekening4.select');
        Route::get('rekening5', [Rekening5Controller::class, 'select'])->name('rekening5.select');
        Route::get('rekening6', [Rekening6Controller::class, 'select'])->name('rekening6.select');
        Route::get('uraian-rekening', [UraianRekeningController::class, 'select'])->name('uraian-rekening.select');
        Route::get('jenis-potongan', [JenisPotonganController::class, 'select'])->name('jenis-potongan.select');
        Route::get('jenis-bank', [JenisBankController::class, 'select'])->name('jenis-bank.select');
        Route::get('potongan', [PotonganController::class, 'select'])->name('potongan.select');
        Route::get('bentuk-rekanan', [BentukRekananController::class, 'select'])->name('bentuk-rekanan.select');
        Route::get('rekanan', [RekananController::class, 'select'])->name('rekanan.select');
    });
});

// Route untuk guest
Route::group(['prefix' => 'tools'], function () {
    Route::get('versioning', [VersioningController::class, 'index'])->name('versioning');
});
require __DIR__ . '/auth.php';
