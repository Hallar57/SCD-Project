<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Restaurants;
use App\Http\Controllers\Menus;

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

Route::get('/admin/edit/{id}', [Restaurants::class, 'edit'])
    ->name('admin.edit');

Route::post('/admin/update/{id}', [Restaurants::class, 'update'])
    ->name('admin.update');

Route::get('/admin/create', function () {
    return view('admin/create');
})->name('admin.create');

Route::post('/admin/create', [Restaurants::class, 'create'])
    ->name('admin.createPost');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('restaurants', Restaurants::class);
});

Route::delete('/admin/delete/{id}', [Restaurants::class, 'destroy'])
    ->name('admin.restaurants.destroy');

Route::get(
    '/admin/restaurants/{id}/menu',
    [Menus::class, 'index']
)->name('admin.menu.edit');

Route::post(
    '/admin/restaurants/{id}/menu',
    [Menus::class, 'update']
)->name('admin.menu.update');

Route::delete('/admin/restaurants/{id}/menu', [Menus::class, 'destroy'])
    ->name('admin.menu.destroy');
