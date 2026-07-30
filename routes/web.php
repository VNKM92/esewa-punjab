<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminContentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

// Public landing page and section shortcuts
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/contact-us', [ContactController::class, 'create'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');
Route::get('/terms-and-conditions', [PageController::class, 'terms'])->name('terms');
Route::get('/migration-insights', [PostController::class, 'index'])->name('posts.index');
Route::get('/migration-insights/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// QR Code Verification Flow
Route::get('/verify', [VerificationController::class, 'lookup'])->name('verify.lookup');
Route::get('/verify/{uuid}', [VerificationController::class, 'showCaptcha'])->name('verify.captcha');
Route::post('/verify/{uuid}', [VerificationController::class, 'verifyAndAccess'])->name('verify.submit');

// Admin access and authentication
Route::get('/login', [AdminAuthController::class, 'create'])->name('admin.login');
Route::post('/login', [AdminAuthController::class, 'store'])->name('admin.login.store');

// Password Reset Routes (Forgot Password & Reset Password)
Route::get('/forgot-password', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.update');

Route::prefix('admin')->middleware('guest')->group(function () {
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
    Route::get('/settings', [AdminSettingsController::class, 'edit'])->name('admin.settings.edit');
    Route::put('/settings', [AdminSettingsController::class, 'update'])->name('admin.settings.update');
    Route::get('/change-password', [ChangePasswordController::class, 'edit'])->name('admin.password.change');
    Route::put('/change-password', [ChangePasswordController::class, 'update'])->name('admin.password.update');
    Route::post('/documents', [AdminController::class, 'storeDocument'])->name('admin.doc.store');
    Route::post('/documents/{id}/toggle', [AdminController::class, 'toggleVisibility'])->name('admin.doc.toggle');
    Route::delete('/messages/{id}', [AdminController::class, 'destroyMessage'])->name('admin.messages.destroy');
    Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('admin.logout');
    Route::get('/content', [AdminContentController::class, 'index'])->name('admin.content.index');
    Route::get('/content/pages/{page}/edit', [AdminContentController::class, 'editPage'])->name('admin.content.pages.edit');
    Route::put('/content/pages/{page}', [AdminContentController::class, 'updatePage'])->name('admin.content.pages.update');
    Route::post('/content/navigation', [AdminContentController::class, 'storeNavigation'])->name('admin.content.navigation.store');
    Route::put('/content/navigation/{navigationItem}', [AdminContentController::class, 'updateNavigation'])->name('admin.content.navigation.update');
    Route::delete('/content/navigation/{navigationItem}', [AdminContentController::class, 'destroyNavigation'])->name('admin.content.navigation.destroy');
    Route::resource('/content/posts', AdminPostController::class)->except('show')->names('admin.posts');
});
