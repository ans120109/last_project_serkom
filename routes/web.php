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
use App\Http\Controllers\GaleriController;



Route::view('/', 'welcome')->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.process');

Route::view('/profil', 'profile')->name('profil');
Route::view('/akademik', 'akademik')->name('akademik');

Route::get('/profile-sekolah', [ProfilSekolahController::class, 'index'])
    ->name('profile-sekolah');

Route::middleware(['auth', 'role:admin,operator'])->group(function () {

    Route::get('/profile-sekolah/edit', [ProfilSekolahController::class, 'edit'])
        ->name('profile-sekolah.edit');

    Route::put('/profile-sekolah', [ProfilSekolahController::class, 'update'])
        ->name('profile-sekolah.update');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');

        Route::middleware('role:admin')->group(function () {
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        });

        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    });

Route::view('/profile', 'profile')->middleware('auth')->name('profile');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/tambah', [GaleriController::class, 'create'])->name('galeri.create');
Route::post('/galeri/simpan', [GaleriController::class, 'store'])->name('galeri.store');
Route::get('/galeri/{galeri}', [GaleriController::class, 'show'])->name('galeri.show');
Route::delete('/galeri/{galeri}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])
    ->name('ekstrakurikuler.index');
Route::get('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'show'])
    ->name('ekstrakurikuler.show');

Route::middleware('auth')->group(function () {
    Route::get('/ekstrakurikuler-create', [EkstrakurikulerController::class, 'create'])
        ->name('ekstrakurikuler.create');
    Route::post('/ekstrakurikuler', [EkstrakurikulerController::class, 'store'])
        ->name('ekstrakurikuler.store');
    Route::get('/ekstrakurikuler/{ekstrakurikuler}/edit', [EkstrakurikulerController::class, 'edit'])
        ->name('ekstrakurikuler.edit');
    Route::put('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'update'])
        ->name('ekstrakurikuler.update');
    Route::delete('/ekstrakurikuler/{ekstrakurikuler}', [EkstrakurikulerController::class, 'destroy'])
        ->name('ekstrakurikuler.destroy');
});

Route::resource('berita', BeritaController::class)
    ->parameters(['berita' => 'berita']);

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::resource('users', UserController::class);
});

Route::middleware(['auth', 'role:admin,operator'])
    ->prefix('siswa-guru')
    ->name('siswa-guru.')
    ->group(function () {

        Route::get('/', [DataUserController::class, 'create'])->name('create');

        Route::post('/siswa', [DataUserController::class, 'store'])->name('store');
        Route::get('/siswa/{siswa}/edit', [DataUserController::class, 'editSiswa'])->name('siswa.edit');
        Route::put('/siswa/{siswa}', [DataUserController::class, 'updateSiswa'])->name('siswa.update');
        Route::delete('/siswa/{siswa}', [DataUserController::class, 'destroySiswa'])->name('siswa.destroy');

        Route::post('/guru', [DataUserController::class, 'storeGuru'])->name('guru.store');
        Route::get('/guru/{guru}/edit', [DataUserController::class, 'editGuru'])->name('guru.edit');
        Route::put('/guru/{guru}', [DataUserController::class, 'updateGuru'])->name('guru.update');
        Route::delete('/guru/{guru}', [DataUserController::class, 'destroyGuru'])->name('guru.destroy');
    });
