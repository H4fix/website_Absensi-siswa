<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\OrtuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
    return view('index', [
        "menu" => "dashboard"
    ]);
})->name('dashboard-admin');

Route::get('/halaman_login', function () {
    return view('login');
})->name('login');


Route::resource('siswa', SiswaController::class);
Route::resource('local', LocalController::class);
Route::resource('jurusan', JurusanController::class);
Route::resource('guru', GuruController::class);
Route::resource('ortu', OrtuController::class);
Route::resource('user', UserController::class);
