<?php

use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\Admin\UserController;

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

// Bisa dilihat semua orang
Route::get('/profile-sekolah', [
    ProfilSekolahController::class,
    'index'
])->name('profile-sekolah');


// Hanya ADMIN dan OPERATOR
Route::middleware(['auth', 'role:admin,operator'])->group(function () {

    Route::get('/profile-sekolah/edit', [
        ProfilSekolahController::class,
        'edit'
    ])->name('profile-sekolah.edit');

    Route::put('/profile-sekolah', [
        ProfilSekolahController::class,
        'update'
    ])->name('profile-sekolah.update');
});


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
    });


// =====================================================
// DATA SISWA & GURU
// =====================================================

Route::middleware('auth')
    ->prefix('siswa-guru')
    ->name('siswa-guru.')
    ->group(function () {

        Route::get('/', [
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
