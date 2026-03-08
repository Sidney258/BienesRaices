<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties/search', [PropertyController::class, 'search'])->name('properties.search');
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/create', [PropertyController::class, 'create'])->name('create')->middleware('auth');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/properties/{property}/edit', [PropertyController::class, 'edit'])->name('properties.edit')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register', [LoginController::class, 'store'])->name('register.store');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
});

Route::post('/create', [PropertyController::class, 'store'])->name('properties.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');
