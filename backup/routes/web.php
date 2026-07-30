<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

// Public landing page and section shortcuts
Route::get('/', function () {
    return view('frontend.home');
})->name('home');
Route::view('/about-us', 'frontend.about')->name('about');
Route::view('/contact-us', 'frontend.contact')->name('contact');
Route::view('/terms-and-conditions', 'frontend.terms')->name('terms');

// QR Code Verification Flow
Route::get('/verify', [VerificationController::class, 'lookup'])->name('verify.lookup');
Route::get('/verify/{uuid}', [VerificationController::class, 'showCaptcha'])->name('verify.captcha');
Route::post('/verify/{uuid}', [VerificationController::class, 'verifyAndAccess'])->name('verify.submit');

// Admin Management Group
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/documents', [AdminController::class, 'storeDocument'])->name('admin.doc.store');
    Route::post('/documents/{id}/toggle', [AdminController::class, 'toggleVisibility'])->name('admin.doc.toggle');
});
