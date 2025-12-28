<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\MenuController;

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

Route::get('/', [RestaurantController::class, 'index'])->name('home');

Route::get('/restaurant/{id}', [RestaurantController::class, 'show'])
    ->name('restaurant.show');

Route::get('/admin', [RestaurantController::class, 'adminHome'])
    ->name('admin.home');

Route::get('/admin/edit/{id}', [RestaurantController::class, 'edit'])
    ->name('admin.edit');

Route::post('/admin/update/{id}', [RestaurantController::class, 'update'])
    ->name('admin.update');

Route::get('/admin/create', function () {
    return view('admin/create');
})->name('admin.create');

Route::post('/admin/create', [RestaurantController::class, 'create'])
    ->name('admin.createPost');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('restaurants', RestaurantController::class);
});

Route::delete('/admin/delete/{id}', [RestaurantController::class, 'destroy'])
    ->name('admin.restaurants.destroy');

Route::get(
    '/admin/restaurants/{id}/menu',
    [MenuController::class, 'index']
)->name('admin.menu.edit');

Route::post(
    '/admin/restaurants/{id}/menu',
    [MenuController::class, 'update']
)->name('admin.menu.update');

Route::delete('/admin/restaurants/{id}/menu', [MenuController::class, 'destroy'])
    ->name('admin.menu.destroy');

Route::middleware('auth')->group(function () {
    Route::post('/cart/add/{menu}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/item/{id}', [CartController::class, 'remove'])->name('cart.remove');
});
