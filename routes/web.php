<?php

use App\Http\Controllers\Admin\AdmPengaduanController;
use App\Http\Controllers\Admin\AdmTanggapanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MasyarakatController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaduanController;
use App\Http\Middleware\AdministratorValidate;
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
})->name('landing');

Route::get('/login', [AuthenticationController::class, 'MasyarakatLoginForm']);
Route::get('/register', function () {
    return view('register');
});
Route::get('/logout', [AuthenticationController::class, 'Logout']);

Route::post('/register', [AuthenticationController::class, 'Register']);
Route::post('/login', [AuthenticationController::class, 'MasyarakatLogin']);

Route::middleware('auth:masyarakats')->group(function () {
    Route::get('/home', [HomeController::class, 'home']);
    Route::get('/new_aduan', [PengaduanController::class, 'index']);
    Route::post('/new_aduan', [PengaduanController::class, 'store']);
    Route::get('/detail_aduan/{id}', [PengaduanController::class, 'show']);
    Route::get('/batalkan_aduan/{id}', [PengaduanController::class, 'CancelAduan']);
    Route::get('/edit_aduan/{id}', [PengaduanController::class, 'updateForm']);
    Route::post('/edit_aduan/{id}', [PengaduanController::class, 'update']);
});




//  Petugas
Route::get('/login-petugas', [AuthenticationController::class, 'PetugasLoginForm']);
Route::post('/login-petugas', [AuthenticationController::class, 'PetugasLogin']);

Route::middleware('auth:petugas')->prefix('admin')->group(function () {
    Route::middleware(AdministratorValidate::class)->group(function () {
        // petugas
        Route::get('/petugas', [PetugasController::class, 'index']);
        Route::get('/add_petugas', [PetugasController::class, 'create']);
        Route::post('/add_petugas', [PetugasController::class, 'store']);
        Route::get('/edit_petugas/{id}', [PetugasController::class, 'updateForm']);
        Route::post('/edit_petugas/{id}', [PetugasController::class, 'update']);
        Route::get('/delete_petugas/{id}', [PetugasController::class, 'destroy']);

        // masyarakat
        Route::get('/masyarakat', [MasyarakatController::class, 'index']);
        Route::get('/add_masyarakat', [MasyarakatController::class, 'create']);
        Route::post('/add_masyarakat', [AuthenticationController::class, 'register']);
        Route::get('/edit_masyarakat/{id}', [MasyarakatController::class, 'updateForm']);
        Route::post('/edit_masyarakat/{id}', [MasyarakatController::class, 'update']);
        Route::get('/delete_masyarakat/{id}', [MasyarakatController::class, 'destroy']);
    });
    Route::get('/home', [DashboardController::class, 'index']);

    // aduan
    Route::get('/verif_aduan', [AdmPengaduanController::class, 'index']);
    Route::get('/cek_aduan/{id}', [AdmPengaduanController::class, 'cekAduan']);
    Route::get('/aduan_approve/{id}', [AdmPengaduanController::class, 'approve']);
    Route::get('/aduan_reject/{id}', [AdmPengaduanController::class, 'reject']);
    Route::get('/aduan/butuh_tanggapan', [AdmTanggapanController::class, 'butuhTanggapan']);
    Route::get('/aduan/beri_tanggapan/{id}', [AdmTanggapanController::class, 'tanggapanPage']);
    Route::post('/aduan/beri_tanggapan/{id}', [AdmTanggapanController::class, 'beriTanggapan']);
});
