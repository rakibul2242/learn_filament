<?php

// use App\Livewire\Settings\Appearance;
// use App\Livewire\Settings\Password;
// use App\Livewire\Settings\Profile;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('settings.profile');
//     Route::get('settings/password', Password::class)->name('settings.password');
//     Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });

use Illuminate\Support\Facades\Route;
use App\Livewire\CoursesList;
use App\Livewire\CourseDetail;
use App\Livewire\EnrolledStudents;
use App\Livewire\SignupForm;

Route::get('/signup', SignupForm::class);

Route::get('/', CoursesList::class);
Route::get('/courses', CoursesList::class)->name('courses.list');
Route::get('/courses/{course}', CourseDetail::class)->name('courses.show');
Route::get('/courses/{course}/enrolled', EnrolledStudents::class)->name('courses.enrolled');
