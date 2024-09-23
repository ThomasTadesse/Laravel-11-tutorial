<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
        [
                 'id' => 1,
                 'title' => 'Web Developer',
                 'description' => 'We are looking for a web developer to join our team.',
        ],
        [
                'id' => 2,
                 'title' => 'Web Designer',
                 'description' => 'We are looking for a web designer to join our team.',
        ],
        [
                  'id' => 3,
                  'title' => 'Project Manager',
                  'description' => 'We are looking for a project manager to join our team.',
        ],
     ]
     ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = [
        [
                 'id' => 1,
                 'title' => 'Web Developer',
                 'description' => 'We are looking for a web developer to join our team.',
        ],
        [
                'id' => 2,
                 'title' => 'Web Designer',
                 'description' => 'We are looking for a web designer to join our team.',
        ],
        [
                  'id' => 3,
                  'title' => 'Project Manager',
                  'description' => 'We are looking for a project manager to join our team.',
        ],
     ];

     $job = \Illuminate\Support\Arr :: first($job, fn($job) => $job['id'] == $id);

        return view('job', [
            'job' => $job,
        ]);


});

Route::get('/contact', function () {
    return view('contact');
});



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
