<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;

// Public
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/portfolio', [FrontendController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [FrontendController::class, 'portfolioDetail'])->name('portfolio.detail');
Route::get('/layanan', [FrontendController::class, 'services'])->name('services');
Route::get('/tentang-kami', [FrontendController::class, 'about'])->name('about');
Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
Route::get('/kontak', [FrontendController::class, 'contact'])->name('contact');
Route::get('/kebijakan-privasi', [FrontendController::class, 'privacyPolicy'])->name('privacy');
Route::get('/syarat-ketentuan', [FrontendController::class, 'terms'])->name('terms');

Route::post('/kontak/kirim', [FrontendController::class, 'sendMessage'])->name('contact.send');
Route::post('/newsletter', [FrontendController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('services', ServiceController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('messages', MessageController::class)->except(['create', 'store', 'edit', 'update']);
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::resource('users', UserController::class);
});
