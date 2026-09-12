<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\Admin\StatusController;
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
Route::get('/favicon.png', [FrontendController::class, 'favicon'])->name('favicon');

Route::post('/kontak/kirim', [FrontendController::class, 'sendMessage'])->name('contact.send');

// Auth
Route::get('/admin', function () {
    if (auth()->check()) {
        return redirect()->route('admin.dashboard');
    }
    return view('admin.login');
})->name('login');

Route::post('/admin', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/status/toggle', [StatusController::class, 'toggle'])->name('status.toggle');
    Route::resource('hero-sections', HeroSectionController::class);
    Route::resource('banners', BannerController::class);
    Route::resource('about-sections', AboutSectionController::class);
    Route::resource('project-categories', ProjectCategoryController::class);
    Route::delete('projects/{project}/images/{image}', [ProjectController::class, 'destroyImage'])->name('projects.images.destroy');
    Route::resource('projects', ProjectController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('messages', MessageController::class)->except(['create', 'store', 'edit', 'update']);
    Route::patch('messages/{message}/toggle-read', [MessageController::class, 'toggleRead'])->name('messages.toggle-read');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/seo', [SeoController::class, 'index'])->name('seo.index');
    Route::put('/seo', [SeoController::class, 'update'])->name('seo.update');
    Route::resource('users', UserController::class)->middleware('super_admin');
});
