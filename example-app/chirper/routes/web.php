<?php


use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;

Route::view('/home', 'home');

Route::resource('jobs', JobController::class);
// why is this more efficient?
// because it allows you to create a resource controller with a single line of code.
// even if you remove the JobController class, the resource controller will still work.
// neat.

// Route::resource('jobs', JobController::class)
//     ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
//     or
//     ->except(['edit', 'update', 'destroy']);

// only and except, as it says, only allows you to use the methods you want to use.


Route::view('/contact','contact');

// Auth
Route::get('/register',[RegisteredUserController::class, 'create']);



// Route::get('/login', function () {
//     return view('login');
// })->name('login');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// Route::resource('chirps', ChirpController::class)
//     ->only(['index', 'store', 'edit', 'update', 'destroy'])
//     ->middleware(['auth', 'verified']);

// require __DIR__.'/auth.php';
