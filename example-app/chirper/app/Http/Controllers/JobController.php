<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Mail;
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
    
        $job = Job::create([
            'title' => request('title'),
            'description' => request('description'),
            'employer_id' => 1
        ]);

        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );
        // Laravel will automatically grab the email off the user.

        return redirect('/jobs');
    }

    public function edit(job $job)
    {

        return view('jobs.edit', ['job' => $job,]);
    }

    public function update(job $job)
    {
           // validation
    request()->validate([
        'title' => ['required', 'min:3'],
        'description' => ['required'],
    ]);

    // authorization
    Gate::authorize('edit-job', $job);


    $job->update([
        'title' => request('title'),
        'description' => request('description'),
    ]);

    return redirect("/jobs/{$job->id}");

    }

    public function destroy(job $job)
    {
        // authorize
        Gate::authorize('edit-job', $job);
        // a bit of a redundancy but it's good to have it.

        $job->delete();

        return redirect('/jobs');   
    }
}

// keep in mind that get, post, put, patch, delete are all methods that can be used in the routes.
// so theres no need to use add them at the end of the route.
// good example: look above.
// bad example: Route::get('/jobs/{id}/edit', function ($id){