<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/team', function () {
    return view('Studysmart.team');
})->name('team');

Route::get('/testimonial', function () {
    return view('Studysmart.testimonial');
})->name('testimonial');

Route::get('/courses', function () {
    return view('Studysmart.courses');
})->middleware(['auth', 'verified'])->name('courses');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return view('Studysmart.about');
})->name('about');

Route::get('/contact', function () {
    return view('Studysmart.contact');
})->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
