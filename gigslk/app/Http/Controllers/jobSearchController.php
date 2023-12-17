<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\User;

class jobSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $jobs = Job::all();
    //     // dd($jobs);
    //     return view('jobSearch.index', compact('jobs'));
    // }

    public function index(Request $request)
    {
        $query = $request->input('q'); // Get the search query from the request

        // Retrieve jobs with optional keyword search
        $jobs = Job::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('skills', 'like', '%' . $query . '%');
        })->get();

        // dd($jobs);

        return view('jobSearch.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        // dd($job);
        
        // dd((new Job())->find($job));
        //nothing wrong here 
        $employer = User::find($job->user_id);
        return view('jobSearch.show', compact('job','employer'));
    }

        /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
