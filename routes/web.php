<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\SearchController;

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
Route::post('/http://127.0.0.1:8000/listing', [BusinessController::class, 'sort'])->name('listing.sort');

// Route::resource('business', BusinessController::class)->middleware(['auth', 'IsConsumer']);


Route::middleware(['auth', 'IsConsumer'])->group(function () {
    Route::get('/business', [BusinessController::class, 'index'])->name('business.index');
    Route::post('/business', [BusinessController::class, 'store'])->name('business.store');
    Route::get('/business/{business}/edit', [BusinessController::class, 'edit'])->name('business.edit');
    Route::patch('/business/{business}', [BusinessController::class, 'update'])->name('business.update');
    Route::get('/business/{id}/remove', [BusinessController::class, 'removeImage'])->name('business.removeImage');
    Route::delete('/business/{id}', [BusinessController::class, 'destroy'])->name('business.destroy');
});

Route::get('/business/detail/{id}', [BusinessController::class, 'show'])->name('business.detail');



Route::middleware(['auth', 'IsConsumer'])->group(function () {
    Route::get('/myAccount', [StaticController::class, 'show'])->name('myAccount');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});



Route::get('/auth/google/redirect', [GoogleController::class, 'handleGoogleRedirect'])->name('google-auth');

Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);



require __DIR__ . '/auth.php';
