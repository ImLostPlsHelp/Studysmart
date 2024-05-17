<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('studysmart.about');
})->name('about');

Route::get('/courses', function () {
    return view('studysmart.courses');
})->middleware(['auth', 'verified'])->name('courses');

Route::get('/team', function () {
    return view('studysmart.team');
})->name('team');

Route::get('/testimonial', function () {
    return view('studysmart.testimonial');
})->name('testimonial');

Route::get('/contact', function () {
    return view('studysmart.contact');
})->name('contact');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/admin', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
