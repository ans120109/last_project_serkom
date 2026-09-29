<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SiswaGuruController;


// =====================================================
// HOME / AKADEMIK
// =====================================================

Route::get('/', function () {
    return view('akademik');
})->name('akademik');


// =====================================================
// LOGIN
// =====================================================

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');


// =====================================================
// LOGOUT
// =====================================================

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


// =====================================================
// REGISTER
// =====================================================

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.process');


// =====================================================
// PROFILE USER
// =====================================================

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');


// =====================================================
// PROFILE SEKOLAH
// =====================================================

Route::get('/profile-sekolah', function () {
    return view('profile-sekolah');
})->name('profile-sekolah');


// =====================================================
// EKSTRAKURIKULER
// =====================================================

// Bisa dilihat semua orang
Route::get('/ekstrakurikuler', [
    EkstrakurikulerController::class,
    'index'
])->name('ekstrakurikuler.index');

Route::get('/ekstrakurikuler/{ekstrakurikuler}', [
    EkstrakurikulerController::class,
    'show'
])->name('ekstrakurikuler.show');


// Hanya user yang login
Route::middleware('auth')->group(function () {

    Route::get('/ekstrakurikuler-create', [
        EkstrakurikulerController::class,
        'create'
    ])->name('ekstrakurikuler.create');

    Route::post('/ekstrakurikuler', [
        EkstrakurikulerController::class,
        'store'
    ])->name('ekstrakurikuler.store');

    Route::get('/ekstrakurikuler/{ekstrakurikuler}/edit', [
        EkstrakurikulerController::class,
        'edit'
    ])->name('ekstrakurikuler.edit');

    Route::put('/ekstrakurikuler/{ekstrakurikuler}', [
        EkstrakurikulerController::class,
        'update'
    ])->name('ekstrakurikuler.update');

    Route::delete('/ekstrakurikuler/{ekstrakurikuler}', [
        EkstrakurikulerController::class,
        'destroy'
    ])->name('ekstrakurikuler.destroy');
});


// =====================================================
// BERITA & PENGUMUMAN
// =====================================================

// Bisa dilihat semua orang
Route::get('/berita', [
    BeritaController::class,
    'index'
])->name('berita');


// Hanya ADMIN dan OPERATOR
Route::middleware(['auth', 'role:admin,operator'])->group(function () {

    Route::get('/berita/tambah', [
        BeritaController::class,
        'create'
    ])->name('berita.create');

    Route::post('/berita', [
        BeritaController::class,
        'store'
    ])->name('berita.store');

    Route::get('/berita/{berita}/edit', [
        BeritaController::class,
        'edit'
    ])->name('berita.edit');

    Route::put('/berita/{berita}', [
        BeritaController::class,
        'update'
    ])->name('berita.update');

    Route::delete('/berita/{berita}', [
        BeritaController::class,
        'destroy'
    ])->name('berita.destroy');
});


// =====================================================
// ADMIN
// =====================================================

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // =================================================
        // DATA USER
        // =================================================

        Route::resource('users', UserController::class);


        // =================================================
        // DATA SISWA & GURU LAMA
        // =================================================

        Route::get('/tambah', [
            DataUserController::class,
            'create'
        ])->name('create');

        Route::post('/', [
            DataUserController::class,
            'store'
        ])->name('store');


        // =================================================
        // SISWA
        // =================================================

        Route::get('/siswa/{siswa}/edit', [
            DataUserController::class,
            'editSiswa'
        ])->name('siswa.edit');

        Route::put('/siswa/{siswa}', [
            DataUserController::class,
            'updateSiswa'
        ])->name('siswa.update');

        Route::delete('/siswa/{siswa}', [
            DataUserController::class,
            'destroySiswa'
        ])->name('siswa.destroy');


        // =================================================
        // GURU
        // =================================================

        Route::get('/guru/{guru}/edit', [
            DataUserController::class,
            'editGuru'
        ])->name('guru.edit');

        Route::put('/guru/{guru}', [
            DataUserController::class,
            'updateGuru'
        ])->name('guru.update');

        Route::delete('/guru/{guru}', [
            DataUserController::class,
            'destroyGuru'
        ])->name('guru.destroy');
    });


// =====================================================
// SISWA & GURU
// =====================================================

// Menu ini menggunakan SiswaGuruController
Route::resource('siswa-guru', SiswaGuruController::class);
