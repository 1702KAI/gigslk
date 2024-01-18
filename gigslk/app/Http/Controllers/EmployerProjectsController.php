<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Job;
use Auth;

class EmployerProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get the current user's ID
        $userId = Auth::id();
    
        // Fetch jobs where the freelancer is involved
        $jobIds = Job::where('user_id', $userId)->pluck('id');
    
        // Fetch projects where the job is associated with the current user
        $ongoingProjects = Project::whereIn('job_id', $jobIds)
            ->where('status', 'in-progress')
            ->get();
    
        $rejectedProjects = Project::whereIn('job_id', $jobIds)
            ->where('status', 'active')
            ->get();
    
        $completedProjects = Project::whereIn('job_id', $jobIds)
            ->where('status', 'completed')
            ->get();
    
        return view('employer.manageProjects.index', compact('ongoingProjects', 'rejectedProjects', 'completedProjects'));
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
     * Display the specified resource.
     */
    public function show(string $id)
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
