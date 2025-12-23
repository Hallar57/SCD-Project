<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Restaurants;


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('/registration',[AuthManager::class , 'registrationPost'])->name('registration.post');

route::post('/login',[AuthManager::class , 'loginPost'
])->name('login.post');

Route::get('/auth/google/redirect', [GoogleController::class, 'redirectToGoogle'])
    ->name('auth.google.redirect');

Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])
    ->name('auth.google.callback');

Route::get('/logout', [AuthManager::class , 'logout'])->name('logout');

Route::get('/', [Restaurants::class, 'index'])->name('home');

Route::get('/restaurant/{id}', [Restaurants::class, 'show'])
    ->name('restaurant.show');

Route::get('/admin', [Restaurants::class, 'adminHome'])
    ->name('admin.home');

