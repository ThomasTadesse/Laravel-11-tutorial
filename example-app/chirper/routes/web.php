<?php


use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Http\Controllers\JobController;

Route::view('/home', function () {
    return view('home');
});

Route::resource('jobs', JobController::class);
// why is this more efficient?
// because it allows you to create a resource controller with a single line of code.
// even if you remove the JobController class, the resource controller will still work.
// neat.

// Route::resource('jobs', JobController::class)
//     ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']);
//     ->except(['edit', 'update', 'destroy']);

// only and except, as it says, only allows you to use the methods you want to use.


Route::view('/contact','contact');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('chirps', ChirpController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
