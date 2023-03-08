<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TanggapanController;
use App\Http\Controllers\Authentication\AuthController;
use App\Http\Controllers\Authentication\MasyarakatAuthController;
use App\Http\Controllers\Masyarakat\HomeController;
use App\Http\Controllers\Masyarakat\PengaduanController;
use App\Http\Middleware\AdminGuard;
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

Route::get('/', function () {
    return view('landing');
});

Route::get('/login', [MasyarakatAuthController::class, 'createFormLogin'])->name('login');
Route::get('/register', [MasyarakatAuthController::class, 'createFormRegister']);
Route::post('/register', [MasyarakatAuthController::class, 'register']);
Route::post('/login', [MasyarakatAuthController::class, 'login']);
Route::get('/login-petugas', [AuthController::class, 'createFormLogin']);
Route::post('/login-petugas', [AuthController::class, 'login']);

Route::middleware('auth:masyarakat')->group(function () {
    Route::get('/logout', [MasyarakatAuthController::class, 'logout']);
    Route::get('/home', [HomeController::class, 'index'])->name('masyarakat_home');
    Route::get('/new-pengaduan', [PengaduanController::class, 'create']);
    Route::post('/new-pengaduan', [PengaduanController::class, 'store']);
    Route::get('/aduan', [PengaduanController::class, 'index']);
    Route::get('/aduan-detail/{id}', [PengaduanController::class, 'show']);
});

Route::middleware('auth:petugas')->prefix('/petugas')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::middleware(AdminGuard::class)->group(function () {
        Route::get('/kelola_petugas', [PetugasController::class, 'index'])->name('kelola_petugas');
        Route::get('/add_petugas', [PetugasController::class, 'create'])->name('add_petugas');
        Route::post('/add_petugas', [PetugasController::class, 'store'])->name('add_petugas');
        Route::get('/edit_petugas/{id}', [PetugasController::class, 'edit'])->name('edit_petugas');
        Route::post('/edit_petugas/{id}', [PetugasController::class, 'update'])->name('edit_petugas');
        Route::get('/delete_petugas/{id}', [PetugasController::class, 'destroy'])->name('delete_petugas');

        Route::get('/kelola_masyarakat', [MasyarakatController::class, 'index'])->name('kelola_masyarakat');
        Route::get('/edit_masyarakat/{id}', [MasyarakatController::class, 'edit'])->name('edit_masyarakat');
        Route::post('/edit_masyarakat/{id}', [MasyarakatController::class, 'update'])->name('edit_masyarakat');
    });

    Route::get('/aduan/verif', [AdminPengaduanController::class, 'index'])->name('verifikasi');
    Route::get('/aduan/detail/{id}', [AdminPengaduanController::class, 'show'])->name('detail_aduan');
    Route::get('/aduan/verif/{id}', [AdminPengaduanController::class, 'accept'])->name('verif_aduan');
    Route::get('/aduan/reject/{id}', [AdminPengaduanController::class, 'reject'])->name('tolak_aduan');
    Route::get('/butuh-tanggapan', [TanggapanController::class, 'index'])->name('butuh-tanggapan');
    Route::get('/butuh-tanggapan/tanggapi/{id}', [TanggapanController::class, 'create'])->name('tanggapi');
    Route::post('/butuh-tanggapan/tanggapi/{id}', [TanggapanController::class, 'store'])->name('tanggapi');
    Route::get('/aduan-selesai', [TanggapanController::class, 'finished'])->name('aduan-selesai');
    Route::get('/aduan-selesai/{id}', [TanggapanController::class, 'show'])->name('aduan-selesai-detail');
});
