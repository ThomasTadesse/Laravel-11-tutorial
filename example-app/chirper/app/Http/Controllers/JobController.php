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
        
    }

    public function show()
    {
        
    }

    public function store()
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
