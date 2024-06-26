<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CertificateController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('studysmart.about');
})->name('about');

Route::get('/courses', function () {
    return view('studysmart.courses');
})->middleware(['auth', 'verified'])->name('courses');

Route::get('/courses', [CourseController::class, 'index'])->middleware(['auth', 'verified'])->name('courses');

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

Route::get('/courses/{id}', [CourseController::class, 'show'])->name('Studysmart.lessons');
Route::get('/courses-view/{id}', [CourseController::class, 'show_details'])->name('courses.view');

// Route::get('/lessons/{id}/{module_id}', [EventsController::class, 'show'])->name('lessons.show');

// Route::get('/lessons/{course_id}', [LessonController::class, 'show'])->name('Studysmart.lessons');

Route::get('/lessons/{course_id}', [LessonController::class, 'showQuestion'])->name('lessons.show');

Route::get('/lessons/{course_id}/next', [LessonController::class, 'nextQuestion'])->name('lessons.next');

Route::post('/lessons/{course_id}/submit', [LessonController::class, 'submitAnswer'])->name('lessons.submit');

// Route::get('/profile-page', function () {
//     return view('profile.edit');
// })->middleware(['auth', 'verified'])->name('profile');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/admin/courses', [CourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/admin/courses/{course}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/admin/courses/{course}', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/admin/courses/{course}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');
    Route::get('/admin/courses/{course}', [CourseController::class, 'show'])->name('admin.courses.show');
});

Route::get('/admin/courses', [CourseController::class, 'indexAdmin'])->name('admin.courses.index');

Route::get('/admin/courses/{course}', [CourseController::class, 'show'])->name('admin.courses.show');

Route::resource('courses.lessons', LessonController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/courses/{course}/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('/courses/{course}/lessons', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('/courses/{course}/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('lessons.edit');
    Route::put('/courses/{course}/lessons/{lesson}', [LessonController::class, 'update'])->name('lessons.update');
    Route::delete('/courses/{course}/lessons/{lesson}', [LessonController::class, 'destroy'])->name('lessons.destroy');
});

Route::get('/certificate/{course}', [CertificateController::class, 'show'])->name('certificate.show');

Route::resource('courses.lessons', LessonController::class);

require __DIR__.'/auth.php';
