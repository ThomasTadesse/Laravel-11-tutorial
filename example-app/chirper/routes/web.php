<?php


use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;

Route::get('/home', function () {
    return view('home');
});


// index
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


// create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});


// show
Route::get('/jobs/{id}', function ($id){
    $job = Job::find($id);
    
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
Route::get('/jobs/{id}/edit', function ($id){
    $job = Job::find($id);
    
        return view('jobs.edit', [
            'job' => $job,
        ]);
});


// Update
Route::patch('/jobs/{id}', function ($id){
    // validation
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => ['required'],
    ]);

    // authorization (on hold for now.)

    $job = Job::findOrFail($id); //nullable

    $job->update([
        'title' => request('title'),
        'description' => request('description'),
    ]);

    return redirect("/jobs/{$job->id}");

});

// Destroy
Route::delete('/jobs/{id}', function ($id){

    // authorization (on hold for now.)

    Job::findOrFail($id)->delete();

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
