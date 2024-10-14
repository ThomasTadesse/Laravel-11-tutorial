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

    $jobs = Job::with('employer')->latest()->cursorPaginate(3);

    // Paginate shows numbers of pages.
    
    // simplePaginate only shows next and previous buttons.

    // cusorPaginate is used for large data sets 
    // keep in mind that the url will display the entire data set.

    // latest() is used to sort the data in chronological descending order.

    return view('jobs.index', [
        'jobs' => $jobs
     ]);
});



Route::get('/jobs/create', function () {
    return view('jobs.create');
});


Route::get('/jobs/{id}', function ($id){
    $job = Job::find($id);
    
        return view('jobs.show', [
            'job' => $job,
        ]);
});

Route::post('/jobs', function () {
    // validateion for later...

    Job::create([
        'title' => request('title'),
        'description' => request('description'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
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
