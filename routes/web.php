<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::middleware([])->group(function () {
    Route::get('/', [WebController::class, 'homePage'])->name('web.home');
    Route::get('/projects', [WebController::class, 'projectsPage'])->name('web.projects');
    Route::get('/projects/{post}', [WebController::class, 'contentDetailPage'])->name('web.project-details');
    Route::get('/blog', [WebController::class, 'blogPage'])->name('web.blog');
    Route::get('/blog/{post}', [WebController::class, 'contentDetailPage'])->name('web.blog-details');
    Route::get('/news/{post}', [WebController::class, 'contentDetailPage'])->name('web.news-details');
    Route::get('/about', [WebController::class, 'aboutPage'])->name('web.about');
    Route::get('/contact', [WebController::class, 'contactPage'])->name('web.contact');
    Route::resource('contacts', ContactController::class)->only(['store']);
});

Route::middleware('auth')->prefix('offices')->group(function () {
    Route::get('/', function () {
        return view('pages.admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('contacts', ContactController::class)->except(['edit', 'update', 'store']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
