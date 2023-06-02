<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticController;
use Illuminate\Support\Facades\Route;

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
Route::get('/addListing', [StaticController::class, 'addListing'])->name('addListing-page')->middleware(['auth', 'IsConsumer']);



// Route::get('/login', [StaticController::class, 'login'])->name('login-page');
// Route::get('/register', [StaticController::class, 'register'])->name('register-page');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
