<?php


use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;

Route::get('/home', function () {
    return view('home');
});

Route::get('/jobs', function () {

    $jobs = Job::with('employer')->cursorPaginate(3);

    // Paginate shows numbers of pages.
    
    // simplePaginate only shows next and previous buttons.

    // cusorPaginate is used for large data sets 
    // keep in mind that the url will display the entire data set.

    return view('jobs', [
        'jobs' => $jobs
     ]);
});

Route::get('/jobs/{id}', function ($id){
    $job = Job::find($id);
    
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
