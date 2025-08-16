<?php

use App\Models\Student;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Student routes - protected by authentication
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get(
        'students/trash/{id}',
        [StudentController::class, 'trash']
    )->name('students.trash');

    Route::get(
        'students/trashed/',
        [StudentController::class, 'trashed']
    )->name('students.trashed');

    Route::get(
        'students/restore/{id}',
        [StudentController::class, 'restore']
    )->name('students.restore');

    Route::resource('students', StudentController::class);

    // Course routes
    Route::get(
        'courses/trashed/',
        [CourseController::class, 'trashed']
    )->name('courses.trashed');

    Route::get(
        'courses/trash/{id}',
        [CourseController::class, 'trash']
    )->name('courses.trash');

    Route::patch(
        'courses/restore/{id}',
        [CourseController::class, 'restore']
    )->name('courses.restore');

    Route::delete(
        'courses/force-delete/{id}',
        [CourseController::class, 'forceDelete']
    )->name('courses.forceDelete');

    Route::resource('courses', CourseController::class);

    // Professor routes  
    Route::resource('professors', ProfessorController::class);
});

require __DIR__.'/auth.php';
