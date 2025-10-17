<?php

use App\Http\Controllers\Backend\AbilityController;
use App\Http\Controllers\Backend\AboutAreaController;
use App\Http\Controllers\Backend\AdminAuthController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\FAQAnswerController;
use App\Http\Controllers\Backend\FAQQuestionController;
use App\Http\Controllers\Backend\GeneralSettingsController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\TermsAndConditionController;
use App\Http\Controllers\Backend\TestimonialController;

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
        Route::resource('team', TeamController::class);
        Route::resource('testimonial', TestimonialController::class);
        Route::resource('faq', FAQQuestionController::class);
        Route::resource('faq-answer', FAQAnswerController::class);
        Route::get('contact/index', [ContactController::class, 'index'])->name('contact.index');
        Route::put('contact/update', [ContactController::class, 'update'])->name('contact.update');
        Route::get('t&c/index', [TermsAndConditionController::class, 'index'])->name('t&c.index');
        Route::put('t&c/update', [TermsAndConditionController::class, 'update'])->name('t&c.update');
        Route::resource('category', CategoryController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('size', SizeController::class);
        Route::resource('product', ProductController::class);
    });
});

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile/dashboard', [ProfileController::class, 'profileDashboard'])->name('user.profile.dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/contact/send/message', [FrontendController::class, 'contactMessage'])->name('frontend.contact.message');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/faq', [FrontendController::class, 'faq'])->name('frontend.faq');
Route::get('/team', [FrontendController::class, 'team'])->name('frontend.team');
Route::get('/testimonial', [FrontendController::class, 'testimonial'])->name('frontend.testimonial');
Route::get('/terms/conditions', [FrontendController::class, 'termsConditions'])->name('frontend.terms.conditions');
Route::get('tiles/size', [FrontendController::class, 'productBySize'])->name('tiles.size');
Route::get('tiles/category', [FrontendController::class, 'productByCategory'])->name('tiles.category');
Route::get('/categories/{categoryId}/brands', [FrontendController::class, 'brandProductsPerBrand']);
Route::get('/brands/{brandId}/products', [FrontendController::class, 'brandProducts']);

require __DIR__.'/auth.php';
