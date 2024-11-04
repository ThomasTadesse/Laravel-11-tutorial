<?php
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;


Route::view('/home', 'home');

// Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Route::resource('jobs', JobController::class)->except(['index', 'show'])->middleware('auth');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);

Route::post('/jobs', [JobController::class, 'store'])
->middleware('auth');

Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
// improves clarity

Route::view('/contact','contact');

// Auth
Route::get('/register',[RegisteredUserController::class, 'create']);
Route::post('/register',[RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login'); // this is diffferent because of the authorization we provided in resource.
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);



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
