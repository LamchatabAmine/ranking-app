<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\Auth\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you caddn register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StaticController::class, 'home'])->name('home-page');
Route::get('/about', [StaticController::class, 'about'])->name('about-page');
Route::get('/listing', [StaticController::class, 'listing'])->name('listing-page');
Route::get('/contact', [StaticController::class, 'contact'])->name('contact-page');

Route::get('/search', [SearchController::class, 'index'])->name('search');




Route::middleware(['auth', 'IsConsumer'])->group(function () {
    Route::get('/business', [BusinessController::class, 'index'])->name('business.index');
    Route::post('/business', [BusinessController::class, 'store'])->name('business.store');
    Route::get('/business/{business}/edit', [BusinessController::class, 'edit'])->name('business.edit');
    Route::patch('/business/{business}', [BusinessController::class, 'update'])->name('business.update');
    Route::get('/business/{id}/remove', [BusinessController::class, 'removeImage'])->name('business.removeImage');
    Route::delete('/business/{id}', [BusinessController::class, 'destroy'])->name('business.destroy');
    Route::post('/save', [BusinessController::class, 'save'])->name('save');
    Route::delete('/saved/{saved}', [BusinessController::class, 'UnSave'])->name('saved.destroy');
});

Route::get('/business/detail/{id}', [BusinessController::class, 'show'])->name('business.detail');
Route::post('/business/detail/{business_id}', [ReviewController::class, 'store'])
    ->name('review.store')
    ->middleware(['auth', 'IsConsumer']);




Route::middleware(['auth', 'IsConsumer'])->group(function () {
    Route::get('/myAccount', [StaticController::class, 'show'])->name('myAccount');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});


Route::middleware(['auth', 'IsManager'])->group(function () {
    Route::get('/manage', [StaticController::class, 'manager'])->name('manage');
    Route::post('/manage/confirm/{id}', [BusinessController::class, 'confirmChange'])->name('business.confirm');
});

Route::middleware(['auth', 'IsAdmin'])->group(function () {
    Route::get('dashboard',  [AdminController::class, 'index'])->name('admin');
    Route::get('listings',  [AdminController::class, 'listings'])->name('dashboardListings');
    Route::delete('/listings/{id}', [BusinessController::class, 'destroy'])->name('listings.destroy');
    Route::get('/admin',  [AdminController::class, 'profile'])->name('profile');
    Route::patch('/admin', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/addUser', [AdminController::class, 'addUser'])->name('addUser');
    Route::post('/addUser', [AdminController::class, 'store'])->name('addUser.store');
});




Route::get('/auth/google/redirect', [GoogleController::class, 'handleGoogleRedirect'])->name('google-auth');

Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



require __DIR__ . '/auth.php';
