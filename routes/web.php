<?php

use App\Http\Controllers\SimadamController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

// Welcome page with SIMADAM interface
Route::get('/', function () {
    return Inertia::render('welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('home');

// Dashboard - main SIMADAM interface
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [SimadamController::class, 'index'])->name('dashboard');
    
    // Profil Madrasah
    Route::get('/profil', [SimadamController::class, 'show'])->name('profil.index');
    
    // Data Siswa
    Route::resource('siswa', StudentController::class);
    
    // Data Guru
    Route::resource('guru', TeacherController::class);
    
    // Pembayaran SPP
    Route::resource('pembayaran', PaymentController::class);
    
    // Placeholder routes for other modules
    Route::get('/wali-kelas', function () {
        return Inertia::render('wali-kelas/index', [
            'message' => 'Modul Wali Kelas - Dalam Pengembangan'
        ]);
    })->name('wali-kelas.index');
    
    Route::get('/surat', function () {
        return Inertia::render('surat/index', [
            'message' => 'Modul Surat Keluar Masuk - Dalam Pengembangan'
        ]);
    })->name('surat.index');
    
    Route::get('/ijazah', function () {
        return Inertia::render('ijazah/index', [
            'message' => 'Modul Pengambilan Ijazah - Dalam Pengembangan'
        ]);
    })->name('ijazah.index');
    
    Route::get('/penempatan-kelas', function () {
        return Inertia::render('penempatan-kelas/index', [
            'message' => 'Modul Penempatan Kelas - Dalam Pengembangan'
        ]);
    })->name('penempatan-kelas.index');
    
    Route::get('/mutasi', function () {
        return Inertia::render('mutasi/index', [
            'message' => 'Modul Surat Mutasi - Dalam Pengembangan'
        ]);
    })->name('mutasi.index');
    
    Route::get('/kartu-pelajar', function () {
        return Inertia::render('kartu-pelajar/index', [
            'message' => 'Modul Kartu Pelajar - Dalam Pengembangan'
        ]);
    })->name('kartu-pelajar.index');
    
    Route::get('/background-settings', function () {
        return Inertia::render('background-settings/index', [
            'message' => 'Pengaturan Background - Dalam Pengembangan'
        ]);
    })->name('background-settings.index');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
