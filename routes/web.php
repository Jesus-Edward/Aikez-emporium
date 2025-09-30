<?php

use App\Http\Controllers\Backend\AbilityController;
use App\Http\Controllers\Backend\AboutAreaController;
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\GeneralSettingsController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    Route::get('/admin/login/page', [AdminDashboardController::class, 'login'])->name('admin.login.page');
    Route::get('/admin/forgot-password', [AdminDashboardController::class, 'forgotPassword'])->name('admin.forgot-password');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/profile', [AdminAuthController::class, 'profile'])->name('profile');
        Route::put('/profile/{id}/update', [AdminAuthController::class, 'updateProfile'])->name('profile.update');
        Route::put('/password/update', [AdminAuthController::class, 'updateAdminPassword'])->name('password.update');
        Route::get('/general-settings', [GeneralSettingsController::class, 'index'])->name('general-settings.index');
        Route::put('/basic-settings/update', [GeneralSettingsController::class, 'storeBasicSettings'])->name('basic-settings.update');
        Route::put('/mail-settings/update', [GeneralSettingsController::class, 'storeMailSettings'])->name('mail-settings.update');
        Route::put('/logo-settings/update', [GeneralSettingsController::class, 'storeLogoSettings'])->name('logo-settings.update');
        Route::put('/seo-settings/update', [GeneralSettingsController::class, 'storeSeoSettings'])->name('seo-settings.update');
        Route::resource('banner', BannerController::class);
        Route::resource('about', AboutAreaController::class);
        Route::resource('service', ServiceController::class);
        Route::get('ability/index', [AbilityController::class, 'index'])->name('ability.index');
        Route::get('ability/create', [AbilityController::class, 'create'])->name('ability.create');
        Route::post('ability/store', [AbilityController::class, 'store'])->name('ability.store');
        Route::get('ability/{id}/edit', [AbilityController::class, 'edit'])->name('ability.edit');
        Route::put('ability/{id}/update', [AbilityController::class, 'update'])->name('ability.update');
        Route::delete('ability/{id}/destroy', [AbilityController::class, 'destroy'])->name('ability.destroy');
        Route::put('ability-stat/store', [AbilityController::class, 'storeUpdate'])->name('ability-stat.store');
    });
});

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
