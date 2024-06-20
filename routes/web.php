<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengeluaranController;
use App\Models\Pengguna;
use Illuminate\Auth\Events\Login;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;
use App\http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    //dasboard
    // Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/login',[LoginController::class,'index']);
    Route::get('/laporan',[LaporanController::class,'index']);
    Route::get('/profil',[ProfilController::class,'index'])->name('profil');
    Route::post('/profil',[ProfilController::class,'update']);

});

// Route::get('/login', [LoginController::class, 'index']);
// Route::post('/login', [LoginController::class, 'store']);
// Route::post('/daftar', [DaftarController::class, 'store']);
// Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/daftar', [RegisteredUserController::class, 'create']);
    Route::post('/daftar', [RegisteredUserController::class, 'store']);

Route::get('/', function () {
    return view('auth/login');
});
// Route::get('/daftar', function () {
//     return view('c_daftar');
// });
// Route::get('/dash', function () {
//     return view('/user/c_dashboard');
// });
Route::get('/user/laporan', function () {
    return view('/user/c_laporan');
});
Route::get('/user/profil', function () {
    return view('/user/c_profil');
});

require __DIR__.'/auth.php';