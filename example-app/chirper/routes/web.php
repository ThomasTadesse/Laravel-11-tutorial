<?php


use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;
use App\Http\Controllers\JobController;

Route::get('/home', function () {
    return view('home');
});


// index
Route::get('/jobs', [JobController::class, 'index']);


// create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});


// show
Route::get('/jobs/{job}', function (job $job){
   // your parameter name should match the wildcard name.
   // so in this case: {job} should match $job.
   // easy.
   

    
        return view('jobs.show', [
            'job' => $job,
        ]);
});


// store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => ['required'],
    ]);

    Job::create([
        'title' => request('title'),
        'description' => request('description'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{job}/edit', function (job $job){
    
        return view('jobs.edit', [
            'job' => $job,
        ]);
});


// Update
Route::patch('/jobs/{job}', function (job $job){
    // validation
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => ['required'],
    ]);

    // authorization (on hold for now.)

    $job->update([
        'title' => request('title'),
        'description' => request('description'),
    ]);

    return redirect("/jobs/{$job->id}");

});

// Destroy
Route::delete('/jobs/{job}', function (job $job){

    ($job)->delete();

    return redirect('/jobs');   

});

// keep in mind that get, post, put, patch, delete are all methods that can be used in the routes.
// so theres no need to use add them at the end of the route.
// good example: look above.
// bad example: Route::get('/jobs/{id}/edit', function ($id){




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
