<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        

    $jobs = Job::with('employer')->latest()->cursorPaginate(3);

    // Paginate shows numbers of pages.
    
    // simplePaginate only shows next and previous buttons.

    // cusorPaginate is used for large data sets 
    // keep in mind that the url will display the entire data set.

    // latest() is used to sort the data in chronological descending order.

    return view('jobs.index', [
        'jobs' => $jobs
     ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(job $job)
    // your parameter name should match the wildcard name.
    // so in this case: {job} should match $job.
    // easy.
   
    {
   
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    public function store()
    {
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
    }

    public function edit(job $job)
    {
        return view('jobs.edit', [
            'job' => $job,
        ]);
    }

    public function update(job $job)
    {
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

    }

    public function destroy(job $job)
    {
        ($job)->delete();

        return redirect('/jobs');   
    }
}

// keep in mind that get, post, put, patch, delete are all methods that can be used in the routes.
// so theres no need to use add them at the end of the route.
// good example: look above.
// bad example: Route::get('/jobs/{id}/edit', function ($id){